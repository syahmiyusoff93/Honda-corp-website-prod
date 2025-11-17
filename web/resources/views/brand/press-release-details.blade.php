
@extends('layouts.base')
@section('page-title')
{{@$item->title}} | Press Release
@endsection

@php
    /* CONTENT PROCESSING */


    if(is_array($item)){
        $item = @$item[0];
    }

    if($slug=='dev'){
        dd($item);
    }

    $item->content = stripslashes($item->content);
    $item->content = str_replace('/assets/images/newsevent', url('/uploads/newsevent'), $item->content);
    $item->content = str_replace('../pixelvault/', env('AWS_CLOUDFRONT_URL')."pixelvault/", $item->content);

@endphp


@section('content')


<div class="body-wrapper model-inner-container">

    <div style="height: 50px;background: #ececec;margin: -1px;">
        <a href="{{url('press-release')}}" class="">
                <div style="padding: 15px 30px;font-size: 12px;">
                    <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                     <span class="backtocopy" style="color: #565656;padding: 0 5px;width:unset;bottom:3px;">BACK TO PRESS RELEASE</span>
                </div>
            </a>
    </div>

    <section class="inner-container intro">
        <div class="news-details-title">
            <div class="topgap" style="height:0px;"></div>
            <div class="intro-title grey">{!! sai_changeTHsup($item->date_display) !!}</div>
            <h2>{!! sai_changeTHsup(stripslashes($item->title)) !!}</h2>
            @include('components.article-share')


        </div>
    </section>

    <section class="inner-container  bg-grey">
        <div class="news-content-container">
            <article style="text-align: justify;">
                {!! sai_changeTHsup(stripslashes($item->content)) !!}
            </article>
            <!-- end article -->
            <div class="share-article">
                <h2>Share Article</h2>
                @include('components.article-share')
            </div>
        </div>

        <hr>

        {{--
        <div class="news-thumb-container">
            <div class="month-copy">Related Article</div>
            <ul>
                <!-- news july 1 -->
                <li>
                    <a href="{{url('press-release-details')}}">
                        <div class="news_thumb_card">
                            <div class="img_thumb">
                                <img class="thumb_img" src="{{url('img/press_release/thumb/news_thumb.png')}}" alt="">
                            </div>
                            <div class="details_thumb">
                                <div class="news_thumb_date">July 14, 2020</div>
                                <div class="news_thumb_title">New Honda 3S Centre Provides Convenience And Accessibility To Customers In Shah Alam</div>
                                <div class="news_thumb_desc">Honda Malaysia (or the Company) has opened its newest 3S Centre by Elmina Motors Sdn. Bhd. (Elmina Motors), which is located in a strategic area to provide good accessibility and more convenience to the customers in...</div>
                            </div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </li>
                <!-- news july 2 -->
                <li>
                    <a href="{{url('press-release-details')}}">
                        <div class="news_thumb_card">
                            <div class="img_thumb">
                                <img class="thumb_img" src="{{url('img/press_release/thumb/news_thumb.png')}}" alt="">
                            </div>
                            <div class="details_thumb">
                                <div class="news_thumb_date">July 14, 2020</div>
                                <div class="news_thumb_title">New Honda 3S Centre Provides Convenience And Accessibility To Customers In Shah Alam</div>
                                <div class="news_thumb_desc">Honda Malaysia (or the Company) has opened its newest 3S Centre by Elmina Motors Sdn. Bhd. (Elmina Motors), which is located in a strategic area to provide good accessibility and more convenience to the customers in...</div>
                            </div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </li>
            </ul>

        </div>
        --}}


        <style>
            /* news details */
            .news-details-title {max-width: 715px;margin: auto;}
            .news-content-container {max-width: 760px;width: 100%;margin: auto;padding: 30px 0;}
            .news-content-container p {text-align: left;font-size: 16px;color: #5E6063;letter-spacing: 0.25px;line-height: 1.6rem;}
            .news-content-container figcaption {font-style: italic;font-size: 11px;}
            .news-content-container img {width:auto; max-width: 100%;}
            .news-content-container table {margin:auto;}

            .news-details-icon ul {display: inline-flex;}
            .news-details-icon ul li {padding-right: 20px;}
            .center {text-align: center;}
            .share-article {margin-top: 50px;}
            /* end */

            hr {width: 90%; opacity:0.3;}

            .news-thumb-container {padding: 30px 100px;}
            .news-thumb-container ul {padding-bottom: 50px;}
            .news-thumb-container ul li {padding: 10px 0;}
            .news_thumb_card {width:100%;height:auto;}
            .month-copy {font-size:26px; color:#282A2F;padding: 20px 0;}
            .img_thumb {}
            .details_thumb {max-width: 655px;max-height: 175px;overflow: hidden;}
            .thumb_img {float:left;max-width: 267px;margin-right: 30px;}
            .news_thumb_date {font-size:14px; color:#787C7C;padding-bottom: 10px;}
            .news_thumb_title {font-size:18px; color:#282A2F;padding-bottom: 10px;letter-spacing: 0.25px;line-height: 1.5rem;}
            .news_thumb_desc {font-size:16px; color:#5E6063;letter-spacing: 0.25px;line-height: 1.75rem;}

            /* popupcopied container - can be anything you want */
            .popupcopied {position: relative;display: inline-block;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
            /* The actual popupcopied */
            .popupcopied .popupcopiedtext {display:none; width: max-content;background-color: #555;color: #fff;text-align: center;border-radius: 25px; padding: 0 8px; position: absolute;z-index: 1;bottom: -85%;margin-left: -80px;opacity: 90%;line-height: 25px;height: 25px;
                font-size: .6rem; font-weight: 400; letter-spacing: .1em;}
            /* popupcopied arrow */
            .popupcopied .popupcopiedtext::after {content: "";position: absolute;top: -25%;left: 60%;margin-left: -12px;border-width: 5px;border-style: solid;border-color: #555 transparent transparent transparent;-ms-transform: rotate(180deg); /* IE 9 */-webkit-transform: rotate(180deg); /* Safari 3-8 */transform: rotate(180deg);}


            @media only screen and (max-width: 640px) {
                .sortby-column {width:90%;padding-left:0px;float: none; margin:auto;}
                .sortby-copy{padding-right: 0px;width: 100%;position: initial;padding-bottom: 10px;}
                .w20 {width: 45%;margin-right: 10px;}

                .search-bar-column {width:100%;}
                .search-bar-column input {overflow: visible;float: none;width:90%;margin: 0 10px;}

                .news-thumb-container {padding: 30px 10px;}
                .thumb_img {margin-right: 10px;width: 30%;}
                .details_thumb {max-height: none;}
                .news_thumb_title {font-size:14px;font-weight: bold;}
                .news_thumb_desc {display:none;}

                /* news details */
                .news-details-title {padding: 0 20px;}
                .news-content-container {padding: 30px 15px;}

                //

                article img {width:auto; width:100%; }
            }
        </style>

        <script>
            $(document).ready(function(){
                $('article img').removeAttr('width').removeAttr('height');
                console.log('removed')

                let url = window.location.href;
                var viewNumber = url.split("/");
                if(viewNumber[5] == 810){

                    var targetElement = $('.news-details-title');

                    targetElement.find('.intro-title').html(function(index, oldHtml) {
                        return oldHtml.replace("12th", "12<sup>th</sup>");
                    });

                }

                var element = document.querySelector('.intro-title');

                if (element) {
                    var text = element.innerHTML;

                    if (!text.includes('<sup>')) {
                        var superscriptText = text.replace(/(st|nd|rd|th)/, function(match) {
                            return '<sup>' + match + '</sup>';
                        });

                        element.innerHTML = superscriptText;
                    }
                }
            })
        </script>
    </section>

</div>

@stop

