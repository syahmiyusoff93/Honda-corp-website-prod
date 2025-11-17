@php



    /* SELECTION DATA */
    $monthlist = explode(',', 'January,February,March,April,May,June,July,August,September,October,November,December');
    foreach ($monthlist as $key => $value) {
        $select['month'][] = [($key+1), $value];
    }

    for($i=date('Y', time()); $i>=2007; $i--){
        $select['year'][] = $i;
    }

    //


    $pr_count= count($newslist);
    foreach ($newslist as $key => $value) {
        $index = $value->date_month .' '. $value->date_year;
        $groupeditem[$index]['month'] = $value->date_month;
        $groupeditem[$index]['year'] = $value->date_year;
        $groupeditem[$index]['label'] = $select['month'][$value->date_month-1][1] .' '. $value->date_year;
        $groupeditem[$index]['data'][] = $value;
        $pr_count++;
    }

    //
    # PAGINATION - added 20201019
    $pagination['result_per_page'] = 25;
    $pagination['total_page'] = ceil(count($newslist)/$pagination['result_per_page']);
    $pagination['current_page'] = empty(@$page) ? 1 : $page;
    $pagination['index_start'] = ($pagination['current_page']-1)*$pagination['result_per_page'];
    $pagination['index_end'] = $pagination['index_start'] + $pagination['result_per_page']-1;

    $pagination['pagebase'] = empty(@$keyword) ? url('/press-release/page/') : url('/press-release/result/page/');
    $pagination['pagebase'] .= '/';

@endphp

@extends('layouts.base')
@section('page-title')
    Press Release
@endsection


@section('content')


<div class="body-wrapper model-inner-container">

    <section class="inner-container intro">
        <div class="topgap" style="height:0px;"></div>
        <h2>PRESS RELEASE</h2>
        <div class="intro-title grey">Get to know all about our latest news and highlights on our upcoming events.</div>
    </section>

    <section class="inner-container  bg-grey">

        <div class="news-maincontainer" style="opacity:0;">

            <div class="sortby-column">
                <div class="clearfilter"><a href="javascript:location.reload()" class="">Clear filter</a></div>
                <div class="sortby-copy">Sort by:</div>
                {{-- START FORM SECTION --}}
                <div class="sortby-select formsection">
                    {{-- EVERY <ul> IS A ROW --}}
                    <ul class="formrow">
                        {!! form_generate_select('', 'imonth', $select['month'], 'w20', '', '', 'Month') !!}
                        {!! form_generate_select('', 'iyear', $select['year'], 'w20', '', '', 'Year') !!}
                    </ul>
                    <div class="clearfix"></div>
                </div>
                {{-- END FORM SECTION --}}
            </div>

            <div class="search-bar-column">
                <form action="{{url('/press-release/search')}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Search Press Release" name="keyword" value="{{@$keyword}}">
                </form>
            </div>
            <div class="clearfix"></div>

            <hr>

            <div class="news-thumb-container noresult" style="display: none;">
                No news found.
            </div>

            @if($pr_count>0)
                @if(@$keyword)
                    <div class="news-thumb-container">
                        Found {{$pr_count}} press release{{$pr_count>1 ? 's' : ''}} for search keyword "{{$keyword}}"
                    </div>
                @endif

                <div class="news-thumb-container thelist">
                    @foreach ($newslist as $key=>$item)
                        @php
                            $display = ($key>=$pagination['index_start'] && $key<=$pagination['index_end']) ? 'block' : 'none';
                            $title = stripslashes($item->title);
                            $title = str_replace(['<br>', '<br/>', '<br />'], '', $title);

                            $title_wtag = sai_changeTHsup($title);

                        @endphp


                        @if (@$clmonth != $item->date_month)
                            <div class="month-copy" data-month="{{$item->date_month}}" data-year="{{$item->date_year}}" style="display:{{$display}}">
                                {{ $monthlist[$item->date_month-1] }} {{$item->date_year}}</div>
                            @php
                                $clmonth = $item->date_month;
                            @endphp
                        @endif

                        <a href="{{url('press-release/view/'.$item->id.'/'.$item->slug)}}" >
                            <div class="news_thumb_card" data-month="{{$item->date_month}}" data-year="{{$item->date_year}}" style="display:{{$display}}">
                                <div class="news_thumb_date for-mobile">{{$item->date_display}}</div>
                                <div class="img_thumb">
                                    <img class="thumb_img" src="{{$item->thumb}}" alt="{{ $title }} - thumbnail">
                                </div>
                                <div class="details_thumb">
                                    <div class="news_thumb_date for-desktop">{!! sai_changeTHsup($item->date_display) !!}</div>
                                    <div class="news_thumb_title">{!! $title_wtag !!}</div>
                                    <div class="news_thumb_desc">{!!stripslashes($item->brief)!!}</div>
                                </div>
                            </div>
                        </a>
                        <div class="clearfix"></div>

                    @endforeach

                    <div class="spacer"></div>
                    <hr>

                    <div class="pagination">
                        @if($pagination['current_page']>1)
                            <a href="{{ $pagination['pagebase'].($pagination['current_page']-1) }}">
                                <img src="{{ versioned_asset('img/interface/arrow-short-right-red.svg') }}" alt="" class="flip-h">
                            </a>
                        @endif

                        @for($i=1; $i<=$pagination['total_page']; $i++)
                            <a href="{{ $pagination['pagebase'].$i }}" class=" {{ $pagination['current_page']==$i ? 'current-page' : ''  }}"> {{$i}} </a>
                        @endfor

                        @if($pagination['current_page']<$pagination['total_page'])
                            <a href="{{ $pagination['pagebase'].($pagination['current_page']+1) }}">
                                <img src="{{ versioned_asset('img/interface/arrow-short-right-red.svg') }}" alt="">
                            </a>
                        @endif
                    </div>
                </div>

            @else
                <div class="news-thumb-container noresult">
                    No news found for search keyword "{{$keyword}}"
                </div>
            @endif

        <style>
            .news-maincontainer {max-width:1200px;margin:auto; min-height: 50vh;}
            .sortby-column {width:45%;padding-left:0px;padding-bottom: 30px;float: left;}
            .sortby-copy {float:left;font-size: 14px;font-weight: bold;top: 20px;padding-right: 30px;}

            .search-bar-column {width:45%;padding-bottom--: 30px;float: right; padding-top:15px;}
            .search-bar-column input {overflow: visible;background: url(/img/press_release/icon/search.png) no-repeat 9px;background-color: white;height: 55px;width:50%;border: solid 1px #cecece;float: right;margin-right: 0px;padding: 0 10px 0 39px;}

            .w20 {width: 33%;float: left;margin-right: 20px;color: #bababa;}

            hr {width: 90%; opacity:0.3;}

            .news-thumb-container {padding-bottom: 30px;}
            /* .news-thumb-container ul {padding-bottom: 50px;}
            .news-thumb-container ul li {padding: 10px 0 50px;} */
            .news_thumb_card {width:100%;height:auto; margin-top:50px;}
            .month-copy {font-size:26px; color:#282A2F;padding: 0 0 20px 0;}

            .month-copy + a .news_thumb_card {margin-top:0px;}
            .thelist a ~ .month-copy {background-:yellow; padding-top:50px;}

            .img_thumb {}
            .details_thumb {max-width: 655px;overflow: hidden;}
            .thumb_img {float:left;max-width: 267px;margin-right: 30px;width: 100%;}
            .news_thumb_date {font-size:14px; color:#787C7C;padding-bottom: 10px;}
            .news_thumb_title {font-size:18px; color:#282A2F;padding-bottom: 10px;letter-spacing: 0.25px;line-height: 1.5rem;}
            .news_thumb_desc {font-size:16px; color:#5E6063;letter-spacing: 0.25px;line-height: 1.75rem;}

            .clearfilter {color: red;font-size: 12px;top: 35px; left: 480px; z-index: 10;}

            .pagination {width:100%; text-align: center; padding: 20px;}
            .pagination * {vertical-align: middle;}
            .pagination a {padding:5px; text-align: center; color:#787C7C; display:inline-block;}
            .current-page {color:green; background-:yellow; color:black; font-size: 1.1em; font-weight: bold;}

            .spacer {height:20px;}

            @media only screen and (min-device-width: 481px) and (max-device-width: 1024px){
                /* For general iPad layouts */
                .news-maincontainer {padding: 40px 20px;}
                .sortby-copy { padding-right: 5px;}
                .w20 {width:34%;}
            }


            @media only screen and (max-width: 640px) {
                .sortby-column {width:90%;padding-left:0px;float: none; margin:auto;}
                .sortby-copy{padding-right: 0px;width: 100%;position: initial;padding-bottom: 10px;}
                .w20 {width: 45%;margin-right: 10px;}

                .search-bar-column {width:100%; padding-top:0;}
                .search-bar-column input {overflow: visible;float: none;width:90%;margin: 0 10px;}

                .news-thumb-container {padding: 30px 10px;}
                .thumb_img {margin-right: 10px;width: 30%;}
                .details_thumb {max-height: none;}
                .news_thumb_title {font-size:14px;font-weight: bold;}
                .news_thumb_desc {display:none;}

                .clearfilter {position: absolute; top: 0px; right:20px; left: unset;}

                .news_thumb_card {background:white; padding:20px; margin-top:0;border-top:2px solid #ECECEC;}
            }

            .flip-h {-webkit-transform: scaleX(-1); transform: scaleX(-1);}
            sup {font-size:.7em;}
        </style>

    </section>

    {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
    @include('form.script-style')

</div>

<script>
    var query_month = null;
    var query_year = null;
    $(document).ready(function(){
        $('.input-imonth .dropdown-menu li').click(function(){
            query_month = ($(this).data('mslug'));
            queryNewsByMonth();
        })
        $('.input-iyear .dropdown-menu li').click(function(){
            query_year = ($(this).data('mslug'));
            queryNewsByMonth();
        })

        function queryNewsByMonth(){
            if(query_month==null || query_year==null){
                return false;
            }

            //
            $('.news_thumb_card, .month-copy').hide();
            var hasresult=false;
            $('.news_thumb_card, .month-copy').each(function(){
                if($(this).data('month')==query_month && $(this).data('year')==query_year){
                    $(this).show();
                    hasresult=true;
                }
            })
            if(!hasresult){
                $('.noresult').show();
            }
            $('.pagination').hide();
        }
        //


        // var firstheaderisfound = false;
        // $('.month-copy').each(function(){
        //     if(!firstheaderisfound && $(this).is(':visible')){
        //         $(this).addClass('first-header');
        //         firstheaderisfound = true;
        //     }
        // })

        var targetElement = $('.news_thumb_card[data-month="6"][data-year="2023"]');

        targetElement.find('.news_thumb_date').html(function(index, oldHtml) {
            return oldHtml.replace("12th", "12<sup>th</sup>");
        });

        $('.news-maincontainer').animate({'opacity':1},0.8);

        var elements = document.querySelectorAll('.news_thumb_date');

        for (var i = 0; i < elements.length; i++) { 
            var element = elements[i];
            var text = element.innerHTML;

            if (!text.includes('<sup>')) {
                // Convert suffix to superscript
                var superscriptText = text.replace(/(st|nd|rd|th)/, function(match) {
                return '<sup>' + match + '</sup>';
                });

                // Update the element with the modified text
                element.innerHTML = superscriptText;
            }
        }
    })
</script>

@if (@$keyword)
{{-- SAI 20200819: TO HIGHLIGHT SEARCH KEYWORD --}}
    <script>
        $(document).ready(function(){
            $('.news_thumb_desc, .news_thumb_title').replaceText(/\b({{$keyword}})\b/gi, '<span class="highlight">$1</span>');
        })
    </script>
@endif

@stop

