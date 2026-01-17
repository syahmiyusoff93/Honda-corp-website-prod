<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EmailController; //this is for jobs to repush the unsent email
use App\Http\Controllers\DataController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\MailjetController;


Route::get('/', function () {
    //dd(config('global.APIPATH'));
    session(['site_section' => 'product']);
    return view('index'); /* */
});

// Simple health check endpoint for load balancers / monitoring
Route::get('health', function () {
    return response('OK', 200);
});

Route::get('terms', function () {
    return view('terms-conditions'); /* */
});

Route::get('privacy', function () {
    return view('privacy-policy'); /* */
});

Route::get('code-of-conduct', function () {
    return view('code-of-conduct'); /* */
});

Route::get('download-brochure', function () {
    session(['site_section' => 'product']);
    return view('download'); /* */
});

Route::get('loan-calculator', function () {
    session(['site_section' => 'product']);
    return view('loancalculator-wdata'); /* */
});

Route::get('compare', function () {
    session(['site_section' => 'product']);
    return view('compare'); /* */
});

# BRAND -------------------------------------------------------------------------------- BRAND

Route::get('our-brand', function () {
    // if(config('global.STAGE')=='live'){
    //     return redirect(config('global.OLDURL').'technology/advanced_technology');
    // }
    // set site_section parameter then redirect to the landing page of the section
    session(['site_section' => 'brand']);
    return view('brand.brand-landing'); /* */
});

Route::get('our-products', function () {
    // set site_section parameter then redirect to the landing page of the section
    session(['site_section' => 'product']);
    return redirect('/');
});

Route::get('about-us', function () {
    session(['site_section' => 'brand']);
    return view('brand.about-us'); /* */
});

Route::get('about-us/manufacturing', function () {
    session(['site_section' => 'brand']);
    return view('brand.manufacturing'); /* */
});

Route::get('about-us/founder', function () {
    session(['site_section' => 'brand']);
    return view('brand.founder'); /* */
});

Route::get('about-us/achievements', function () {
    session(['site_section' => 'brand']);
    return view('brand.achievements'); /* */
});

Route::get('discover/dealer-awards', function () {
    /*if(config('global.STAGE')=='live'){
        return redirect(config('global.OLDURL').'dealers/ceo');
    }*/

    session(['site_section' => 'brand']);
    return view('dealer-awards'); /* */
   /* return view('ceo');  OLD */
});

Route::get('press', function () {
    return redirect('press-release');
});

Route::get('press-release', function () {
    /*if(config('global.STAGE')=='live'){
    return redirect(config('global.OLDURL').'corporate/press_release');
    }*/

    session(['site_section' => 'brand']);
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'press_list.json', false, $honda_api_context);
    $data = json_decode($data);
    $newslist = $data->payload;

    return view('brand.press-release', ['newslist'=>$newslist]); /* */
});

Route::get('press-release/page/{page}', function ($page) {

    $page = intval($page);

    if($page==0) return redirect('/press-release');

    session(['site_section' => 'brand']);
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'press_list.json', false, $honda_api_context);
    $data = json_decode($data);
    $newslist = $data->payload;

    return view('brand.press-release', ['newslist'=>$newslist, 'page'=>$page]); /* */
});

Route::get('press-release/view/{id}/{slug}', function ($id, $slug) {
    if(config('global.STAGE')=='live'){
        //return redirect(config('global.OLDURL').'corporate/press_release');
    }

    session(['site_section' => 'brand']);
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'press_id_'.$id.'.json', false, $honda_api_context);

    if($data){

        $data = json_decode($data);

        $item = $data->payload;

        return view('brand.press-release-details', ['item'=>$item, 'slug'=>$slug]); /* */
    }

    abort(404);
});

Route::get('press-release/search', function(){
    return redirect('/press-release');
});
Route::post('press-release/search', function(){

        $keyword = $_POST['keyword'];
        //$keyword = htmlentities($keyword, ENT_QUOTES, 'UTF-8', false);
        $keyword = strip_tags($keyword);

        $auth = base64_decode(config('global.AUTHKEY'));
        $auth = explode(':',$auth);

        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);

        $domain = getenv('APP_API_URL');
        $url = $domain.'press-release/search';
        $jwt = getenv('JWT_SECRET');

        $response = $client->post($url,  [
            'form_params'=>[
                'keyword' => $keyword,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $jwt,
                'Accept'        => 'application/json',
            ]
        ]);

        $data = json_decode($response->getBody()->getContents());


        session(['site_section' => 'brand']);
        $newslist = $data->payload;

        $ss['prsearch_newslist'] = $newslist;
        $ss['prsearch_keyword'] =  $keyword;
        $ss['prsearch_page'] = 1;

        Session::put('hondawebprsearch', $ss);

        //dd( $_SESSION['hondaweb']);

        return redirect('/press-release/result/page/1');

        return view('brand.press-release', ['newslist'=>$newslist, 'keyword'=>$keyword]); /* */
});

Route::get('press-release/result/page/{page}', function($page){
    $ss=Session::get('hondawebprsearch');
    //dd($ss);
    if(empty(@$ss['prsearch_keyword']))  return redirect('/press-release');

    return view('brand.press-release', [
        'newslist'  =>  $ss['prsearch_newslist'],
        'keyword'   =>  $ss['prsearch_keyword'],
        'page'      =>  $page
    ]);
});

Route::get('press-release/view/{id}', function ($id) {
    return redirect("/press-release/view/$id/-/");
});

/* ------ */


Route::get('technology/honda-advanced-technology', function () {
    session(['site_section' => 'brand']);
    return redirect(config('global.OLDURL').'technology/advanced_technology');
});
Route::get('technology/motorsport', function () {
    session(['site_section' => 'brand']);
    return redirect(config('global.OLDURL').'technology/motorsport');
});

/* DROP 3.2 */

Route::get('newsletter/subscribe', function () {
    return view('form.newsletter'); /* */
});
Route::post('newsletter/gosubscribe', [DataController::class, 'processNewsletterSubscription']);
Route::get('newsletter/subscribed', function () {
    return view('form.tq-generic-custom', ['custom_message'=>'We have successfully received your newsletter subscription form. Thank you!']); /* */
});

Route::get('newsletter/subscribed/{code}', function ($code) {
    // same as above just add support to see id for debug
    return view('form.tq-generic-custom', ['custom_message'=>'We have successfully received your newsletter subscription form. Thank you!']); /* */
});

Route::get('career', function () {
    // if(config('global.STAGE')=='live'){
    //     return redirect(config('global.OLDURL').'corporate/careers');
    // }

    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'career_list.json', false, $honda_api_context);
    $data = json_decode($data);

    return view('brand.career', ['career_list'=>$data->payload]); /* */
});

Route::get('career/{id}/{slug}', function ($id, $slug) {
    // if(config('global.STAGE')=='live'){
    //     return redirect(config('global.OLDURL').'corporate/careers');
    // }

    $id = intval($id);

    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'career_id_'.$id.'.json', false, $honda_api_context);
    $data = json_decode($data);

    if($data->meta->response!='success') abort(404);

    //dd($data);
    if (( $id == "155") || ( $id == "156") || ( $id == "157") || ( $id == "71"))  {
        return abort(404);
    }
    else return view('brand.career-details', ['career_data'=>$data->payload]); /* */
});

Route::get('career/155/{slug}', function ($slug) {
    return abort(404);
});

Route::get('career-details', function () {
    return view('brand.career-details'); /* */
});

Route::get('locate-us', function () {
    return view('brand.locate-us'); /* */
});

Route::get('customer-service', function () {
    session(['site_section' => 'brand']);
    return view('brand.customer-service-wdata');
    return view('brand.customer-service'); /* THIS SHOULD NOT BE USED ANYMORE */
});

Route::get('customer-service/2', function () {
    session(['site_section' => 'brand']);
    return view('brand.customer-service-wdata'); /* saiful add */
});

Route::get('customer-service/enquiry', function () {
    session(['site_section' => 'brand']);
    return view('form.enquiry-form'); /* */
});

Route::post('customer-service/contact-us', [DataController::class, 'processContactForm']);

Route::get('customer-service/enquiry/form-submitted', function () {
    session(['site_section' => 'brand']);
    return view('form.tq-generic-custom', [
        'custom_message'=>'We have successfully received your enquiry/feedback and hope to serve you even better. Thank you!',
        'next_cta_copy'=>'BACK TO CUSTOMER SERVICE',
        'next_cta_link'=> url('customer-service')
        ]); /* */
});

/* Remove merchandise route
Route::get('merchandise', function () {
    session(['site_section' => 'product']);
    return view('brand.merchandise.index');
});
Route::get('merchandise/{category}', [MerchandiseController::class, 'showCategory']);
*/

# ------ AMIR LOCAL VIEW PURPOSE ONLY (coz local data using live data) ------ ###

Route::get('local/our-brand', function () {
    // set site_section parameter then redirect to the landing page of the section
    session(['site_section' => 'brand']);
    return view('brand.brand-landing'); /* */
});

Route::get('local/career', function () {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'career_list.json', false, $honda_api_context);
    $data = json_decode($data);

    return view('brand.career', ['career_list'=>$data->payload]); /* */
});

# ------ AMIR LOCAL VIEW END------ ###

 # ----- TECHNOLOGY -------- #
Route::get('technology/advanced-technology', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-overview-adv'); /* */
});
Route::get('technology/hallmark-of-innovations', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-overview-ima'); /* */
});
Route::get('technology/honda-ima', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-honda-ima'); /* */
});
// vtec turbo
Route::get('technology/honda-vtec-turbo', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-vtec-turbo'); /* */
});
Route::get('technology/honda-vtec-turbo/1.5', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-vtec-turbo-details1'); /* */
});
Route::get('technology/honda-vtec-turbo/2.0', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-vtec-turbo-details2'); /* */
});
// hybrid
Route::get('technology/honda-sport-hybrid', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sport-hybrid'); /* */
});
// sensing
Route::get('technology/honda-sensing', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-honda-sensing'); /* */
});
Route::get('technology/honda-sensing/rdm', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-rdm'); /* */
});
Route::get('technology/honda-sensing/cmbs', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-cmbs'); /* */
});
Route::get('technology/honda-sensing/acc', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-acc'); /* */
});
Route::get('technology/honda-sensing/lkas', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-lkas'); /* */
});
Route::get('technology/honda-sensing/multi-view-camera', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-multicamera'); /* */
});
Route::get('technology/honda-sensing/wide-angle-rearview', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-wideangle'); /* */
});
Route::get('technology/honda-sensing/parking-sensor', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-parking-sensor'); /* */
});
Route::get('technology/honda-sensing/backing-out-support', function () {
    session(['site_section' => 'brand']);
    return view('brand.tech-sensing-backingout-support'); /* */
});
// honda connect
Route::get('technology/honda-connect', function () {
    
    session(['site_section' => 'brand']);
    return view('brand.tech-honda-connect'); /* */

});


# AFTERSALES -------------------------------------------------------------------------------- AFTERSALES
    


    Route::get('aftersales/maintenance', function () {
        // if(config('global.STAGE')=='live'){
        //     20200517 - REDIRECT TO OLD SITE FIRST FOR LIVE
        //     return redirect(config('global.OLDURL').'service_maintenance/maintenance');
        // }

        return view('maintenance-v2'); /* */
    });

    Route::get('aftersales/maintenance-faq', function () {
        /*if(config('global.STAGE')=='live'){
            // 20200517 - REDIRECT TO OLD SITE FIRST FOR LIVE
            return redirect(config('global.OLDURL').'service_maintenance/maintenance');
        }*/

        return view('maintenance-faq'); /* */
    });

    Route::get('aftersales/honda-pride', function () {
        // if(config('global.STAGE')=='live'){
        //     return redirect(config('global.OLDURL').'service_maintenance/honda_pride');
        // }
        return view('hondapride'); /* */
    });

    Route::get('aftersales/honda-body-paint', function () {
        return view('hondapride-bodypaint'); /* */
    });

    Route::get('aftersales/service-with-honda', function () {
        if(config('global.STAGE')=='live'){
        return redirect(config('global.OLDURL').'service_maintenance/overview');
        }
        return view('service-reasons'); /* */
    });
                // temporary-will hide later
                Route::get('aftersales/service-with-us/standard-transaction', function () {
                    return view('service-standard'); /* */
                });

                Route::get('aftersales/service-with-us/diagnostic-system', function () {
                    return view('service-diagnostic'); /* */
                });

                Route::get('aftersales/service-with-us/customised-workshop', function () {
                    return view('service-workshop'); /* */
                });

                Route::get('aftersales/service-with-us/team-expert', function () {
                    return view('service-expert'); /* */
                });

                //end

    Route::get('aftersales/update-profile', function () {
        return redirect('https://hondatouch.honda.com.my/login'); /* effective 01 NOV 2020 - as per Honda directive */
       /* if(config('global.STAGE')!='live'){
            return view('form.update-profile');
        }*/
        // return view('form.update-profile');
       // return redirect(config('global.OLDURL').'owner/update_profile');
        return view('form.update-profile');

    });

    Route::get('aftersales/update-profile/form-submitted', function () {
        return view('form.tq-generic-custom', ['custom_message'=>'We have successfully received your updated profile and hope to serve you even better. Thank you!']); /* */
    });

    Route::get('aftersales/update-profile/form-submitted/{code}', function ($code) {
        // this is duplicated route to accomodate response code generated for debug
        return view('form.tq-generic-custom', ['custom_message'=>'We have successfully received your updated profile and hope to serve you even better. Thank you!']); /* */
    });

    Route::get('aftersales/genuine-parts', function () {
        return redirect(config('global.OLDURL').'service_maintenance/genuine_parts');

    });





    Route::get('aftersales/honda-parts', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.landing');
    });
    Route::get('aftersales/honda-parts/value-added-products/dvr', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-digitalvideorecorder');
    });
    Route::get('aftersales/honda-parts/maintenance/gac', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-aircleaner');
    });
    Route::get('aftersales/honda-parts/value-added-products/eot', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-engineoiltreatment');
    });
    Route::get('aftersales/honda-parts/value-added-products/itrk', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-repairkit');
    });
    Route::get('aftersales/honda-parts/value-added-products/vap', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-carbodyconditioner');
    });
    Route::get('aftersales/honda-parts/value-added-products/hpec', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-hpenginecleaner');
    });
    Route::get('aftersales/honda-parts/maintenance/gb', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-genuinebattery');
    });
    Route::get('aftersales/honda-parts/maintenance/wb', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-wiperblade');
    });
    Route::get('aftersales/honda-parts/value-added-products/caf', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-charcoalairfilter');
    });
    Route::get('aftersales/honda-parts/value-added-products/uwc', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-windowcoating');
    });
    Route::get('aftersales/honda-parts/maintenance/gof', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-oilfilter');
    });
    Route::get('aftersales/honda-parts/maintenance/gtf', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-transmissionfluids');
    });
    Route::get('aftersales/honda-parts/maintenance/gsp', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-sparkplug');
    });
    Route::get('aftersales/honda-parts/maintenance/gel', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-enginelubricant');
    });
    Route::get('aftersales/honda-parts/value-added-products/ugbc', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-bodycoating');
    });
    Route::get('aftersales/honda-parts/value-added-products/wln', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-wheellock');
    });
    Route::get('aftersales/honda-parts/maintenance/rb', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-recobatteries');
    });
    Route::get('aftersales/honda-parts/maintenance/grt', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-genuine-reco-tyres');
    });
    Route::get('aftersales/honda-parts/value-added-products/acec', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-airconevaporator');
    });
    Route::get('aftersales/honda-parts/maintenance/llc', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-coolant');
    });
    Route::get('aftersales/honda-parts/maintenance/bps', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.maintenance-brakepad');
    });
    Route::get('aftersales/honda-parts/value-added-products/hcid', function () {
        //session(['site_section' => 'product']);
        //return view('brand.hondaparts.valueadded-products-hcid');
       
         session(['site_section' => 'product']);
         return view('brand.hondaparts.valueadded-products-hcid');
       



    });

    Route::get('aftersales/honda-parts/value-added-products/3m', function () {
       session(['site_section' => 'product']);
       // return view('brand.hondaparts.valueadded-3m-test1');
       return abort(404);
    });

    Route::get('aftersales/honda-parts/value-added-products/ecotint', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-ecotint-new');
    });
    Route::get('aftersales/honda-parts/value-added-products/air-con-additive', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.valueadded-airconadditive');
    });
    Route::get('aftersales/honda-parts/faq', function () {
        session(['site_section' => 'product']);
        return view('brand.hondaparts.faq');
    });

    Route::get('aftersales/hondatouch', function () {
        session(['site_section' => 'product']);
        return view('honda-touch');
    });
    Route::get('aftersales/hondatouch/signup', function () {
        session(['site_section' => 'product']);
        return view('honda-touch-signup');
    });

    // redirect page for external honda touch page based on device (suppose not done by us)
    Route::get('hondatouch/app', function () {
         /* effective 18 feb 2021 - as per Honda directive */
        if (preg_match('/iPhone|iPod|iPad/' , $_SERVER['HTTP_USER_AGENT'])) {
            return redirect('https://apps.apple.com/us/app/id1528936599');
        }if (preg_match('/Android/', $_SERVER['HTTP_USER_AGENT'])) {
            return redirect('https://play.google.com/store/apps/details?id=com.honda.HondaTouch.prod');
        }
        return redirect('https://hondatouch.honda.com.my/login');
    });

    Route::get('manuals', function () {
        session(['site_section' => 'product']);
        return view('manuals');
    });

    Route::get('/manuals/{file}', function ($file) { 
        $filename = $file;
        $path = public_path("pdf/manuals/".$filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    });

# DISCOVER -------------------------------------------------------------------------------- DISCOVER

    Route::get('discover/honda-insurance-plus', function () {
        // if(config('global.STAGE')=='live' || true){
            // 20200517 - REDIRECT TO OLD SITE FIRST FOR LIVE
           // return redirect(config('global.OLDURL').'owner/honda_insurance_plus');
        //}
        /*if(config('global.STAGE')=='live'){
            // 20200517 - REDIRECT TO OLD SITE FIRST FOR LIVE
            return redirect(config('global.OLDURL').'owner/honda_insurance_plus');
        }*/

        return view('hip'); /* */
    });

    Route::get('discover/honda-insurance-plus/form', function () {
        return view('hip-faq'); /* */
    });

    Route::get('discover/honda-insurance-plus/form', function () {
        return view('hip-form'); /* */
    });

    Route::get('discover/honda-insurance-plus/form-submitted', function () {
        return view('hip-thankyou'); /* */
    });

    Route::get('discover/corporate-fleet-sale', function () {
        /*if(config('global.STAGE')=='live'){
        return redirect(config('global.OLDURL').'customer_service/fleet_program');
        }*/
        return view('corp-fleet-sale'); /* */
    });

    Route::get('discover/corporate-fleet-sale/form-submitted', function () {
        return view('corp-fleet-sale-thankyou'); /* */
    });

    Route::get('discover/corporate-fleet-sale/form', function () {
       /* if(config('global.STAGE')=='live'){
            return redirect(config('global.OLDURL').'customer_service/fleet_program');
        }*/
        return view('corp-fleet-sale-form'); /* */
    });

    /* move under about us
    Route::get('discover/dealer-awards', function () {
        if(config('global.STAGE')=='live'){
            return redirect(config('global.OLDURL').'dealers/ceo');
        }

        session(['site_section' => 'product']);
        return view('dealer-awards'); /* */
       /* return view('ceo');*/ /* OLD */
    /*}); */

    /* Remove merchandise route
    Route::get('discover/merchandise', function () {
        // if(config('global.STAGE')=='live'){
        //     return redirect(config('global.OLDURL').'corporate/merchandise');
        // }
        return redirect('merchandise');
    });
    */

    // temporary-will remove later

    Route::get('cfsform', function () {
        return view('cfs-form');
    });

    Route::get('fleetsale', function () {
        return view('corporatesalesfleet');
    });

    Route::get('hip', function () {
        return view('hip');
    });

    Route::get('hondapride', function () {
        return view('hondapride');
    });

    Route::get('dealeraward', function () {
        return view('ceo');
    });

    // end


/*
SUPPLEMENTARY ACCESSORIES PAGE -------------------------------------------------------------------------------------------------
*/
Route::get('accessories/tint/3m',               function () { return view('supplementary-page/tint-3m'); });
Route::get('accessories/tint/ecotint',          function () { return view('supplementary-page/tint-ecotint'); });
Route::get('accessories/coating/ultraglass',    function () { return view('supplementary-page/coating-ultraglass'); });
Route::get('accessories/coating/ultrawindow',   function () { return view('supplementary-page/coating-ultrawindow'); });
Route::get('accessories/wheel-lock-nut',        function () { return view('supplementary-page/wheel-locknut'); });
Route::get('accessories/360hdcamera',        function () { return view('supplementary-page/360hdcamera'); });
Route::get('accessories/dvr',        function () { 
  //  return view('supplementary-page/dvr'); 
  return view('brand.hondaparts.valueadded-digitalvideorecorder');
});





Route::get('happenings', function () {
    return view('happening-wdata'); /* */
});


Route::get('happening/17/make-your-booking-now', function () {
    return abort(404);
});

Route::get('model/brv', function () {
    return abort(404);
});

Route::get('model/brv/{name}', function ($name) {
    return abort(404);
});

Route::get('model/jazz', function () {
    return abort(404);
});

Route::get('model/jazz/{name}', function ($name) {
    return abort(404);
});

// Route::get('model/hrv', function () {
//     return abort(404);
// });


// Route::get('model/hrv/{name}', function($name)
// {
//     return abort(404);
// })
// ->where('name', '[A-Za-z]+');









// Route::get('happening/{id}/{slug}', function ($id, $slug) {
//     $APIPATH = config('global.APIPATH');
//     $honda_api_context = config('global.APICONTEXT');

//     $data = @file_get_contents($APIPATH.'happening_'.$id.'.json', false, $honda_api_context);
//     if($data){
//         $data = json_decode($data);
//         $item = $data->payload;
//         return view('happening-details-wdata', ['item'=>$item]); /* */
//     }
//     return redirect('/happenings');
// });

Route::get('happening/{id}/{slug}', function ($id, $slug) {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    // Get happenings list
    $listData = @file_get_contents($APIPATH.'happenings.json', false, $honda_api_context);
    if(!$listData){
        return redirect('/happenings');
    }

    $listData = json_decode($listData);
    $happenings = $listData->payload ?? [];

    // Check if id exists in the list
    $exists = collect($happenings)->firstWhere('id', (int)$id);

    if(!$exists){
        return redirect('/happenings');
    }

    // Fetch happening details if id is valid
    $data = @file_get_contents($APIPATH.'happening_'.$id.'.json', false, $honda_api_context);
    if($data){
        $data = json_decode($data);
        $item = $data->payload ?? null;
        if ($item) {
            return view('happening-details-wdata', ['item' => $item]);
        }
    }

    return redirect('/happenings');
});



Route::get('dealers', function () {
    return view('findadealer'); /* */
});

/*


MODELS ----------------------------------------------------------------------------------------------------------------- MODELS

*/

Route::get('model/{shortcode}', ['as' => 'modellanding', function ($model_slug) {
    session(['site_section' => 'product']);

    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
    if($data){
        $data = json_decode($data);
        $model_info = $data->model;
        $variant_info = $data->payload;

        // Prevent model shown shown on live site if not published to live
        if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
            return abort(404);
        }
    }

    //api/model/city/page/landing

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_page_landing.json', false, $honda_api_context);
    $data = json_decode($data);

    //dd($data);

    if(!in_array($model_slug, ['type-r'])){ // if not model that spesifically has custom page
        if(!isset($data->payload) || @$data->meta->remarks!='success') return abort(404);
    }

    $story = $data->payload;

    // custom blade switcher
    switch($model_slug){
        case 'en1':  $modellandingblade = 'model.custom-page.ev'; break;
        case 'type-r':  $modellandingblade = 'model.custom-page.type-r'; break;
        case 'accord':  $modellandingblade = 'model.custom-page.accord'; break;
        default:        $modellandingblade = 'model.landing';
    }

    return view($modellandingblade, [
        'model_slug' => $model_slug,
        'model_info' => @$model_info,
        'variant_info' => @$variant_info,
        'story' => $story,
        ]); /* */
}]);


Route::get('model/{shortcode}/gallery', ['as' => 'gallery', function ($shortcode) {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'model_'.$shortcode.'_variants.json', false, $honda_api_context);
    if($data){
        $data = json_decode($data);
        $model_info = $data->model;
        $variant_info = $data->payload;

        // Prevent model shown shown on live site if not published to live
        if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
            return abort(404);
        }
    }

    return view('model.detail1', ['model_slug'=>$shortcode]); /* */
}]);

Route::get('model/{shortcode}/accessories', ['as' => 'accessories', function ($shortcode) {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'model_'.$shortcode.'_variants.json', false, $honda_api_context);
    if ($data) {
        $data = json_decode($data);
        $model_info = $data->model;

        // Prevent model shown shown on live site if not published to live
        if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
            return abort(404);
        }
    }
    return view('model.detail-accessories', ['model_slug'=>$shortcode, 'inner_section'=>'accessories']); /* */
}]);

Route::get('model/{shortcode}/colour', ['as' => 'colour', function ($shortcode) {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'model_'.$shortcode.'_variants.json', false, $honda_api_context);
    if($data){
        $data = json_decode($data);
        $model_info = $data->model;

        // Prevent model shown shown on live site if not published to live
        if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
            return abort(404);
        }
    }

    return view('model.detail-color-wdata', ['model_slug'=>$shortcode]); /* */
}]);

Route::get('model/{shortcode}/packages', ['as' => 'packages', function ($shortcode) {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'model_'.$shortcode.'_variants.json', false, $honda_api_context);
    if($data){
        $data = json_decode($data);
        $model_info = $data->model;

        // Prevent model shown shown on live site if not published to live
        if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
            return abort(404);
        }
    }

    return view('model.2020-packages', ['model_slug'=>$shortcode, 'inner_section'=>'packages']); /* */
    return view('model.detail-color-wdata', ['model_slug'=>$shortcode, 'inner_section'=>'packages']); /* */
}]);

Route::get('model/{shortcode}/spec', ['as' => 'spec', function ($shortcode) {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'model_'.$shortcode.'_variants.json', false, $honda_api_context);
    if($data){
        $data = json_decode($data);
        $model_info = $data->model;

        // Prevent model shown shown on live site if not published to live
        if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
            return abort(404);
        }
    }

    return view('model.detail-spec', ['model_slug'=>$shortcode]); /* */
}]);

Route::get('model/{shortcode}/pricing', ['as' => 'price', function ($shortcode) {
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = @file_get_contents($APIPATH.'model_'.$shortcode.'_variants.json', false, $honda_api_context);
    if($data){
        $data = json_decode($data);
        $model_info = $data->model;

        // Prevent model shown shown on live site if not published to live
        if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
            return abort(404);
        }
    }

    return view('model.detail-price', ['model_slug' => $shortcode, 'inner_section'=>'pricing']); /* */
}]);


# INNER PAGES -----------------------------------------------------------------------
//foreach(['exterior','interior','performance','safety','hybrid', 'petrol'] as $section){

    Route::get('model/{shortcode}/{section}', ['as' => '', function ($shortcode, $ss) {
        if(!in_array($ss, ['exterior','interior','performance','safety','hybrid', 'petrol'])){
            return abort(404);
        }

        $APIPATH = config('global.APIPATH');
        $honda_api_context = config('global.APICONTEXT');

        $data = @file_get_contents($APIPATH.'model_'.$shortcode.'_variants.json', false, $honda_api_context);
        if ($data) {
            $data = json_decode($data);
            $model_info = $data->model;

            // Prevent model shown shown on live site if not published to live
            if (config('global.STAGE')=='live' && isset($model_info->is_live) && $model_info->is_live == 0) {
                return abort(404);
            }
        }

        $data = file_get_contents($APIPATH.'model_'.$shortcode.'_story_inner_page-'.$ss.'.json', false, $honda_api_context);
        $data = json_decode($data);
        if ($data) {
            $pagedata = $data->payload->pagecontent;
            if(count($pagedata)==0) abort(404);
        }

        return view('model.detail-pagebuilder', ['model_slug'=>$shortcode, 'pagedata'=>$pagedata, 'inner_section'=>$ss ]); /* */
    }]);
//}

//

Route::get('/doc/{slug}/brochure', function ($slug) {

    foreach(config('global.allmodels') as $m){
        if($m->slug==$slug){

            if(config('global.STAGE')=='live'){
                return redirect($m->brochure_file);
            }

            $fname = "brochure_".$slug.".pdf";

            $response = getRemotePDF($m->brochure_file, $fname);

            if($response){
                return $response;
            } else {
                abort(404);
            }

            break;
        }
    }

    // if invalid slug, redirect to home
    abort(404);
    return redirect('/');
});

Route::get('/doc/maintenance/{id}', function ($id) {

    switch(config('global.STAGE')){
        case 'local'    : $evault = 'https://honda-revamp-deltaecho.dev/'; break;
        case 'dev'      : $evault = 'https://evault.honda.com.my/'; break;
        case 'stg'      : $evault = 'https://evault.honda.com.my/'; break;
        default         : $evault = 'https://evault.honda.com.my/';
    }

    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'maintenance.json', false, $honda_api_context);
    $data = json_decode($data);

    $allmaintenance = $data->payload;

    foreach($allmaintenance as $item){
        //dd($item->id .' | ' .$id);
        if($item->id==$id){
            //dd($evault.$item->pdf);
            $fname = "maintenance_".$item->variant.".pdf";

            if(substr($item->pdf, 0,4) !='http'){
                $item->pdf = $evault . $item->pdf;
            }

            $response = getRemotePDF($item->pdf, $fname);
            //dd($response);
            if($response){
                return $response;
            } else {
                return redirect($item->pdf);
                return 'file not found: '.$fname;
                abort(404);
            }

            break;
        }
    }
    // if invalid, redirect to home

    //dd($allmaintenance);
    abort(404);
    return redirect('/');
});

//

Route::get('vr/{model}/interior', function ($model_slug) {
    return view('vr-viewer', ['model_slug' => $model_slug]); /* */
});

Route::get('sitemap', function () {
    return view('sitemap2', []); /* */
});

/*


LEGACY REDIRECT
---------------------
use this to redirect link to the ole website, legacy.honda.com.my

*/
    Route::get('customer_service/enquiry', function () {
        return redirect(config('global.OLDURL').'customer_service/enquiry');
    });

    Route::get('contact-us', function () {
        if(config('global.STAGE')=='live'){
            return redirect(config('global.OLDURL').'customer_service/contact');
        }
        return redirect('customer-service/enquiry');
    });
    Route::get('contact-us/location', function () {
        return redirect(config('global.OLDURL').'customer_service/location');
    });


    # promo pages at the time revamo went live
    Route::get('promotions/promotions_details/176', function () { return redirect('/happening/8/the-most-ideal-7-seater-family-crossover'); });
    Route::get('promotions/promotions_details/177', function () { return redirect('/happening/9/our-dealers-are-back-in-business'); });
    Route::get('promotions/promotions_details/178', function () { return redirect('/happening/10/ready-for-the-road-ahead'); });
    Route::get('promotions/promotions_details/179', function () { return redirect('/happening/11/kita-bersama-deals'); });

    # to address broken link to model brochure PDF
    Route::get('uploads/pdf/{mslug}/brochure.pdf', function(){return redirect('/download-brochure'); });


/*
POSTCODE LOOKUP
*/
    Route::get('postcode/get/{postcode}', function($postcode){
        $database = new \Filebase\Database([
            'dir' =>  storage_path('filebase/postcodemy')
        ]);

        $out['response'] = 'failed';

        if($database->has($postcode)){
            $dbi = $database->get($postcode);
            $out['response'] = 'success';
            $out['data']['city'] = $dbi->city;
            $out['data']['state_code'] = $dbi->state_code;
            $out['data']['state_name'] = $dbi->state_name;
        }

        return response()->json($out);
    });

    Route::get('postcode/update', function(){
        $rawjson = file_get_contents(storage_path('my_all_filtered.json'));
        $dataarr = json_decode($rawjson)[2]->data;


        $database = new \Filebase\Database([
            'dir' =>  storage_path('filebase/postcodemy')
        ]);

        foreach($dataarr as $row){
            $dbi = $database->get($row->postcode);
            $dbi->city = $row->city;
            $dbi->state_code = $row->state_code;
            $dbi->state_name = $row->state_name;
            $dbi->save();
        }

        //dd($dataarr);
        return 'postcode updated. <a href="'.url('').'">HOME</a>';
    });

/*
QR CODE REDIRECT
*/
    Route::get('qr/{slug}', function($slug){

        $APIPATH = config('global.APIPATH');
        $honda_api_context = config('global.APICONTEXT');

        try {

            $data = file_get_contents($APIPATH.'qr_'.$slug.'.json', false, $honda_api_context);
            $data = json_decode($data);

            $qrdata = $data->payload;

            if(empty($qrdata)){
                abort(404);
            }

        } catch (Exception $e){
            abort(404);
            dd($e->getMessage());
        }

        return view('qr', ['qrdata'=>$qrdata]);

        dd($qrdata);

    });

/*
MICROSITES REDIRECT
*/

//https://honda.com.my/1milliondreams/entry
//redirect home as campagin ended

Route::get('1milliondreams/entry', function(){
    return redirect('/');
});

Route::get('1milliondreams', function(){
    return redirect('/');
});

Route::get('ms/1milliondreams/main.php', function(){
    return redirect('/');
});

Route::get('ms/1milliondreams', function(){
    return redirect('/');
});

/*
FORM SUBMISSION
*/

Route::post('discover/corporate-fleet-sale/submit', [DataController::class, 'processCorpFleetSubmission']);
Route::post('discover/honda-insurance-plus/submit', [DataController::class, 'processHIPSubmission']);
Route::post('update-my-profile', [DataController::class, 'processProfileUpdate']);

/*
EXTERNAL HEADER FOOTER
*/

Route::get('pagefraction/header/brand', function(){
    return view('modules.header-brand');
});

Route::get('pagefraction/footer', function(){
    return view('modules.footer');
});

/*

TEST AREA
-------------------------------------------------------------------------------------------------------------------------------------
Things that under development or not ready yet for staging


*/

// mail
Route::get('sendmail/cubaan', [MailController::class, 'mailtest']);
Route::get('phpmailer/cubaan', [MailController::class, 'phpMailerTest']);

/*
Route::get('test/ext360', function(){return view('zz_test/ext360');});



//mailjet
Route::get('mailjet/cubaan', [MailjetController::class, 'saitest']);

//shopee
Route::get('shopeeshop/auth', function(){

    // ACTUAL
    $partner_id = '846159';
    $partner_key = '80cb3b416e55bd757982d6f64ca00f270f2cd08b218b140dfe0ef2e25491041a';

    // TEST
    $partner_id = '843616';
    $partner_key = '51d8995f0ac49a2a66663d081d90d273cc78fa3a1b033091d0f2cb3f0f7bc9bf';

    $redirect_uri = 'https://www.honda.com.my/shopeeshop/auth/done/23';

    $token = $partner_key . $redirect_uri;
    $token = hash('sha256', $token);
    //$token = bin2hex($token);

    //

    $endpoint['live'] = "https://partner.shopeemobile.com/api/v1/shop/auth_partner";
    $endpoint['uat'] = "https://partner.uat.shopeemobile.com/api/v1/shop/auth_partner";

    $url = $endpoint['uat'] . "?id=$partner_id&token=$token&redirect=$redirect_uri";

    return 'Shopee Shop Auth URL: <a href="'. $url . '">'. $url . '</a>';

});

Route::get('shopeeshop/auth/done/{code}', function($code){
    //
    $mc = new MailController();
    $mc->sendTheEmail('saiful.yusoff@isobar.com,saiful.yusoff@gmail.com', 'Saiful,Saiful', 'honda.com.my Shopee shop auth', 'Yo: '.$code);
    return 'Shop authorisation completed. Thank you.';
});
*/


//design system
Route::get('design-system', function(){
    return view('form.form-elements');
});

// route for clearing cache from browser
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('/saidebug', function() {

    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    $debug[] = config('global');
    $debug[] = $_SERVER;
    dd($debug);
});

Route::get('/trigger-resend', [EmailController::class, 'triggerResendEmails']);
Route::get('/whoami', function () {
    return shell_exec('whoami');
});