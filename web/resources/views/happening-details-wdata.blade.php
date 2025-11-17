@php

@endphp
@extends('layouts.base')

@php
    $metadata['title'] = $item->title;
    $metadata['description'] = $item->short_desc;
    $metadata['keywords'] = 'honda, honda Malaysia, malaysia automotive, power of dreams, car dealer, car showroom, car model, test drive' . @$item->keywords;
    $metadata['image'] = $item->thumb;
@endphp

@section('page-meta')
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$metadata['title']}}" />
    <meta property="og:description" content="{{$metadata['description']}}" />
    <meta property="og:image" content="{{$metadata['image']}}" />
    <meta name="description" content="{{$metadata['description']}}"/>
    <meta name="keywords" content="{{$metadata['keywords']}}"/>
@stop


@section('page-title')
    {{$item->title}} | Happening
@stop
@section('content')

<div class="body-wrapper">
    <section class="content-inner happening-content-details">
        <div class="inner-content-section content-area">
            <h2>{!! $item->title !!}</h2>
            <div class="content-copy">{!! $item->short_desc !!}</div>
            <div class="clearfix"></div>
        </div>

        <div class="happening-content-container">
            <div class="for-desktop">
                {!!$item->content!!}
            </div>

            <div class="for-mobile">
                {!!$item->content_mobile!!}
            </div>
        </div>

    </section>


    <script>

        $(document).ready(function(){
            if (window.location.href.includes('/95/')) {
                $("h2:contains('Service Win Prosperity')").html("The Results Are In!");
            }

            if (window.location.href.includes('/97/')) {
                $(document.querySelector("#mainstage > div > section > div.inner-content-section.content-area > div.content-copy")).html("Now open for booking.");
            }

            $("h2:contains('The All-New City Hatchback V-SENSING, Most Complete')").html("The All-New City Hatchback V&#8209;SENSING, Most Complete");
            
            $('.happening-tab-header').click(function(){
                var tabname = $(this).data('happening-tab-name');
                $(this).siblings('.happening-tab-header').removeClass('active')
                $(this).addClass('active');

                $(this).siblings('.happening-tab-content').hide();
                $(this).siblings('.happening-tab-content').each(function(){
                    if($(this).data('happening-tab-name')==tabname){
                        $(this).show();
                    }
                })
                console.log('>>', $(this))
            })

            $('.happening-tab-header:nth-of-type(1)').trigger('click');

        })
    </script>
    <style>
        .tab-content {display: none;}
    </style>

</div>

@stop
{{--

        SAI 20200818:
    This is a section to inject script/custom code to the very beginning right after opening of <body>

--}}
@section('body-top')
    @if ($item->id==17)
        {{-- <!--
        Start of Floodlight Tag: Please do not remove
        Activity name of this tag: Honda City Launch_Landing URL_V2
        URL of the webpage where the tag is expected to be placed:
        This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
        Creation Date: 08/14/2020
        --> --}}
        <script type="text/javascript">
            var axel = Math.random() + "";
            var a = axel * 10000000000000;
            document.write('<iframe src="https://9800367.fls.doubleclick.net/activityi;src=9800367;type=invmedia;cat=honda00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=;gdpr_consent=${gdpr_consent_755};ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
            </script>
            <noscript>
            <iframe src="https://9800367.fls.doubleclick.net/activityi;src=9800367;type=invmedia;cat=honda00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=;gdpr_consent=${gdpr_consent_755};ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
            </noscript>
            <!-- End of Floodlight Tag: Please do not remove -->

    @endif
@endsection

