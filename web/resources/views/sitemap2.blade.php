@php

$menus = config('global.menus');

$brand_menu[] = ['About Us', $menus['aboutus']];
$brand_menu[] = ['Technology', $menus['technology']];
$brand_menu[] = ['Press Release', 'press-release'];
$brand_menu[] = ['Contact Us', $menus['contactus']];
$brand_menu[] = ['Find A Dealer', 'dealers'];

$models = config('global.allmodels');

// FORMAT: link label, page slug, model exception slug (that dont have the page for it)
$model_pages[] = ['Landing page',   '',             []];
$model_pages[] = ['Exterior',       'exterior',     ['type-r']];
$model_pages[] = ['Interior',       'interior',     ['type-r']];
$model_pages[] = ['Performance',    'performance',  ['type-r']];
$model_pages[] = ['Safety',         'safety',       ['type-r']];
$model_pages[] = ['Hybrid',         'hybrid',       ['type-r']];
$model_pages[] = ['Accessories',    'packages',     []];
$model_pages[] = ['Specifications', 'spec',         []];
$model_pages[] = ['Pricing',        'pricing',      ['type-r']];

foreach ($models as $key => $m) {
    $__arr = [];
    $__arr[0] = 'Honda '.$m->name;
    foreach ($model_pages as $k => $p) {
        if(!in_array($m->slug, $p[2])){
            // if its not in exception list, then go ahead
            $__arr[1][] = [$p[0], url('model/'.$m->slug.'/'.$p[1]), $m->icon];
        }
    }
    $model_menu[] = $__arr;
}

// ----------------

function processChild($item){
    $r = '';
    if(is_array($item[1])){
        $r .= '<li><ul>'.'<div class="label">'.$item[0].'</div>';
            foreach ($item[1] as $key => $value) {
                $r .= processChild($value);
            }
        $r .= '</ul></li>';

    } else {
        $r .=  '<li><a href="'.url($item[1]).'">'.$item[0].'</a></li>';
    }
    return '<ul>'.$r.'</ul>';
}


@endphp
@extends('layouts.base')

@section('page-title')
    Sitemap
@stop

@section('content')

<section class="model-inner-container stage-contained">
    <div class="intro">
        <h2>Sitemap</h2>
        <div class="intro-title grey"></div>
    </div>
</section>

<section class="stage-contained sitemap product">
    {!! processChild(['Our Product', $model_menu]) !!}
</section>
<section class="stage-contained sitemap brand">
    {!! processChild(['Our Brand', $brand_menu]) !!}
</section>

<div class="endsection"></div>

<style>
    .sitemap .label {color:green; margin-top: 20px;}
    .sitemap ul {margin-top:10px;}
    .sitemap li {margin-top:10px; padding-left:10px;}

    .sitemap > ul > li > ul > .label {color:red;}

    .endsection{height: 50px; width:100%;}
</style>

@stop
