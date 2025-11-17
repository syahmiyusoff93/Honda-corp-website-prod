<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getModelDataSection($model_slug,$section){
        $APIPATH = env('APP_API_URL');
        $honda_api_context = config('global.APICONTEXT');

        $data = file_get_contents($APIPATH.'model/'.$model_slug.'/'.$section, false, $honda_api_context);
        $data = json_decode($data);

        return response()->json($data);
    }

    public function getVariantSpec($id){
        $APIPATH = env('APP_API_URL');
        $honda_api_context = config('global.APICONTEXT');

        $data = file_get_contents($APIPATH.'fullspec/variant/'.$id, false, $honda_api_context);
        $data = json_decode($data);

        return response()->json($data);
    }

    public function getVariantPricing($id,$region){
        $APIPATH = env('APP_API_URL');
        $honda_api_context = config('global.APICONTEXT');

        $data = file_get_contents($APIPATH.'pricing/variant/'.$id.'/'.$region, false, $honda_api_context);
        $data = json_decode($data);

        return response()->json($data);
    }

    public function getModelDataSectionSub($model_slug,$section, $subsection){
        $APIPATH = env('APP_API_URL');
        $honda_api_context = config('global.APICONTEXT');

        $data = file_get_contents($APIPATH.'model/'.$model_slug.'/'.$section.'/'.$subsection, false, $honda_api_context);
        $data = json_decode($data);

        return response()->json($data);
    }
}
