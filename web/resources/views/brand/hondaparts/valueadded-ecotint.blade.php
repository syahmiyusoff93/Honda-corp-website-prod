
@extends('layouts.base')


@section('content')

<div style="height: 50px;background: #191616;">
        <a href="{{url('aftersales/honda-parts#valueadded')}}" class="">
            <div style="padding: 15px 30px;font-size: 12px;">
                <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                <span class="backtocopy" style="color: #fff;padding: 0 5px;width:unset;bottom:3px;">BACK TO Honda PARTS</span>
            </div>
        </a>
</div>
<section class="maxw1200">
    <div class="space"></div>
    
    <div class="img-sec img-sec-70prec centerdiv">
        <img src="{{url('img/hondaParts/04_ValueAdded/ecotint-fullimg.jpg')}}" alt="">
    </div>

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


