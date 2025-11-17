<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class MerchandiseController extends Controller
{
    private function getFileIn($dir, $returnpath='relative', $returntype='array'){
        //dd($dir);
        if(!is_dir(public_path($dir))) return [];
        $ff = File::files(public_path($dir));

        $files = [];
        foreach($ff as $f){
            //dd($f);
            $files[] = $dir.$f->getFilename();
        }
        return $files;
    }

    private function prepData($arr, $cat, $label, $price, $variant,$imgdir){
        $arr[$cat][] = [
            'label' => $label,
            'price' => $price,
            'variant' => $variant,
            'images' => $this->getFileIn($imgdir),
            'measurement' => $this->lookForMEasurementFileIn($imgdir)
        ];
        return $arr;

    }
    private function lookForMEasurementFileIn($dir){
        //dd($dir);
        if(!is_dir(public_path($dir))) return '';
        $ff = File::files(public_path($dir));

        foreach($ff as $f){
            $fname = $dir.$f->getFilename();

            if(stripos($fname, 'measurement') === false){
                // do nothing
            } else {
                return $fname;
            }
        }

        return '';
    }
    private function getMerchandise($type='all'){

        /*
                THIS IS THE DATA PORTION FOR THE MERCHANDISE.
                NO ENTRY FOR THIS IN DATABASE, THIS IS IT.

                HONDA SAID ON 15 SEPT 2020, (Attendee: Adam, Yoke, Patricia, Saiful)
                MERCHANDISE WOULD ONLY BE UPDATED ONCE OR TWICE A YEAR, SO NO POINT OF PULLING OUR HAIR TO DO A SYSTEM JUST FOR THAT.

        */

        $basedir = 'img/merchandise/product/'; // !IMPORTANT! - always end directory name with trailing slash /
        $item = [];

        $category = 'corporate';
        $imgdir = $basedir;
            $item = $this->prepData($item, $category, '<span class="red">Unisex</span> Racing Shirt', 85, 'XXS-XXL', $imgdir.'Corporate_UnisexRacingShirt/');
            $item = $this->prepData($item, $category, '<span class="red">Male</span> Polo Shirt', 60, 'S-XXL', $imgdir.'Corporate_MalePolo/');
            $item = $this->prepData($item, $category, '<span class="red">Female</span> Polo Shirt', 60, 'S-XXL', $imgdir.'Corporate_FemalePolo/');

        $category = 'lifestyle';
        $imgdir = $basedir;
            $item = $this->prepData($item, $category, '<span class="red">Male</span> Reversible Bomber Jacket', 120, 'S-XXL', $imgdir.'LifeStyle_MaleBomber/');
            $item = $this->prepData($item, $category, '<span class="red">Female</span> Reversible Bomber Jacket', 120, 'S-XXL', $imgdir.'LifeStyle_FemaleBomber/');
            $item = $this->prepData($item, $category, '<span class="red">Unisex</span> Hoodie', 78, 'XXS-XXL', $imgdir.'LifeStyle_UnisexHoodie/');
            //
            $item = $this->prepData($item, $category, '<span class="red">Male</span> TEI Graphic Tee', 58, 'S-XXL', $imgdir.'LifeStyle_MaleGraphicTee/');
            $item = $this->prepData($item, $category, '<span class="red">Female</span> TEI Graphic Tee', 58, 'S-XXL', $imgdir.'LifeStyle_FemaleGraphicTee/');
            $item = $this->prepData($item, $category, 'Crossbody Bag', 59, '', $imgdir.'LifeStyle_CrossBodyBag/');
            //
            $item = $this->prepData($item, $category, '30" Umbrella', 50, '', $imgdir.'LifeStyle_Umbrella/');
            $item = $this->prepData($item, $category, 'Cap', 38, '', $imgdir.'LifeStyle_Cap/');
            $item = $this->prepData($item, $category, 'Key Ring and Key Pouch Set', 36, '', $imgdir.'LifeStyle_KeyRing&KeyPouch/');

        $category = 'activewear';
        $imgdir = $basedir;
            $item = $this->prepData($item, $category, '<span class="red">Male</span> Activewear Shirt', 58, 'S-XXL', $imgdir.'ActiveWear_MaleActivewear/');
            $item = $this->prepData($item, $category, '<span class="red">Female</span> Activewear Shirt', 58, 'S-XXL', $imgdir.'ActiveWear_FemaleActivewear/');
            $item = $this->prepData($item, $category, 'Sports Hijab', 40, 'Free Size', $imgdir.'ActiveWear_SportHijab/');

        $category = 'travel';
        $imgdir = $basedir;
            $item = $this->prepData($item, $category, '<span class="red">Unisex</span> Travel Jacket', 112, 'XXS-XXL', $imgdir.'Travel_UnisexTravelJacket/');
            $item = $this->prepData($item, $category, '2-in-1 Detachable Travel Luggage Bag', 320, '', $imgdir.'Travel_2in1Luggage/');
            $item = $this->prepData($item, $category, '2-in-1 Detachable Backpack', 88, '', $imgdir.'Travel_2in1Backpack/');
            //
            $item = $this->prepData($item, $category, 'Mini Travel Pouch', 38, '', $imgdir.'Travel_MiniTravelPouch/');
            $item = $this->prepData($item, $category, 'Shoe Bag', 38, '', $imgdir.'Travel_ShoeBag/');
            $item = $this->prepData($item, $category, 'Collapsible Water Bottle', 32, '', $imgdir.'Travel_Bottle/');

        if(!empty($item[$type])) return $item[$type];
        return $item;

    }

    //--------------

    public function showCategory($cat){

        // only allow input from these categories, else, abort.
        if(!in_array($cat, ['corporate', 'lifestyle', 'activewear', 'travel'])) abort(404);

        $title['corporate'] = 'Corporate';
        $title['lifestyle'] = 'Lifestyle';
        $title['activewear'] = 'Activewear';
        $title['travel'] = 'Travel';

        $merch = $this->getMerchandise($cat);
        session(['site_section' => 'product']);

        //dd($merch);

        return view('brand.merchandise.list', ['category'=>$cat, 'title'=>@$title[$cat], 'merch_data'=>$merch]);

        return json_encode($merch);
    }
}
