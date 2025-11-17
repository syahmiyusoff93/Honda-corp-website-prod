@php
    $title_h1 = strtoupper($title);
    //dd(json_encode($merch_data));
@endphp
@extends('layouts.base')

@section('page-title')
{{ $title }} Collection | Merchandise
@endsection

@section('content')

    <div class="body-wrapper bg-grey2">

        <section id="modelmenu" class="model-menu fixed-lower">
            <div class="model-nav">

                    <a href="{{url('merchandise')}}" class="centerme" style="vertical-align: middle; padding:0 20px;">
                        <img src="https://www.honda.com.my/img/interface/back-icon.svg" alt="Back link" class="back-icon" style="vertical-align:middle;">
                        <span class="backtocopy" style="color:#fff; padding: 0 5px; width:unset;vertical-align:middle">BACK TO MERCHANDISE</span>
                    </a>

                <div class="mobile-bar">
                    <div class="toggle-arrow">
                        <div class="arrow-white-down"></div>
                    </div>
                    <div class="current-section"></div>
                </div>

                <div class="smooth-slide for-desktop ">
                    <ul>
                        @foreach (['corporate','lifestyle','activewear','travel'] as $item)
                            <li class="sai-navitem {{ $category==$item ? 'active' : '' }}">
                                <a href="{{url('merchandise/'.$item)}}"><span></span>{{ strtoupper($item) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clearfix"></div>


                <div class="for-mobile">
                    <div class="menu-toggle smooth-slide ">
                        <ul>
                            @foreach (['corporate','lifestyle','activewear','travel'] as $item)
                            <li class="sai-navitem {{ $category==$item ? 'active' : '' }}">
                                <a href="{{url('merchandise/'.$item)}}"><span></span>{{ strtoupper($item) }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </section>

        {{-- CONTENT HERE --}}
        <h2><span class="red">{{$title_h1}}</span> COLLECTION</h2>

        <section class="listing">

            @foreach ($merch_data as $i=>$item)

            <div class="item-card">
                @if (count($item['images'])>0)
                <div class="item-hero" data-numindex="{{$i}}" data-images="{{ implode('|',$item['images']) }}">
                    <img class="hero" src="{{ versioned_asset($item['images'][0]) }}" alt="" >
                    <div class="overlay animate"><div>VIEW MORE<img class="arrow" src="{{versioned_asset('img/interface/arrow-long-right-red.svg')}}" alt=""></div></div>
                </div>
                @endif
                <div class="copy-container">
                    <div class="label labelnum{{$i}}">{!! $item['label'] !!}</div>
                    <div class="price red">RM {!! number_format($item['price'],2) !!}</div>
                    <div class="variant">{!! $item['variant'] !!}</div>
                    <div class="cta measurement{{ empty($item['measurement']) ? '-none' : '' }}" data-img="{{ versioned_asset(end($item['images'])) }}">VIEW MEASUREMENTS <img src="{{ versioned_asset('img/interface/arrow-short-right-red.svg')}}"></div>
                </div>
            </div>

            @endforeach
            <div class="clearfix"></div>

        </section>

        @include('brand.merchandise.module-ctahook')

        <section class="disclaimer" style="">
            <div class="note-container">
                <div class="note-title more">DISCLAIMERS</div>
                <div class=" expand-content" style="display: none;">
                    <ul class="note">
                        <li>Colour of the image on your monitor may vary slightly from the product's actual colour.</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>

    @include('brand.merchandise.module-style')
    <style>

        .makemecenter {display:block; position: absolute !important; top:50% !important; left:50% !important; transform: translate(-50%, -50%) !important;}
        .body-wrapper {min-height:calc(100vh - 0px); margin-top:130px;}
        .red {color:#E01327;}

        h2 {max-width:1128px; padding:70px 40px 0 40px; text-align:left; margin:auto;}

        .listing {max-width:1128px; margin:auto; padding: 0 20px; text-align: left;}

        .item-card {display:inline-block; width:50%; max-width: 267px; padding:20px; padding-bottom:50px; line-height: 1.5em; text-align: left; float: left;}
        .item-hero {width:100%; cursor: pointer; }
        .item-hero .overlay {opacity:0; width:100%; height:100%; background:rgba(0,0,0,.7); font-size:.75rem; letter-spacing:.15em;position:absolute; top:0; left:0; content: 'ok'; color:white; align-self:middle; display:inline-flex; align-items:center; justify-content:center;}
        .item-hero .overlay:hover {opacity:1;}
        img.hero {width:100%;}
        .item-hero .overlay .arrow {display:block; margin:auto;}

        .item-card .label {font-size:1.125rem; font-weight:500; color:#282A2F; min-height: 50px; margin:10px 0;}
        .item-card .price {font-size:1rem; font-weight:500;}
        .item-card .variant {font-size:.75rem; color:#5E6063; height: 1em;}
        .copy-container {padding:0;}

        .cta {text-align: left; color:#1E1E25;}
        #secondmenu {display: none;}

        /* */
        .noscroll {overflow: hidden;}

        .content-lb {width: 100vw; height: 100vh; z-index: 100; position: fixed; top:0; left:0; z-index: 20; display: none;}
        .content-lb .cover {width:100%; height: inherit; background: rgba(0,0,0,.8);}
        .content-lb > div {width:100%; height: inherit; }

        .content-lb > div {position: absolute; top:0; left:0;}

        .content-lb .titlebar {width: 100%; max-width: 1200px; background: #E9E9E9; border-bottom:1px solid #979797; padding:20px; margin:auto; text-align: center;}
        .content-lb .titlebar>span {vertical-align: middle; height: inherit;}
        .content-lb .titlebar .content {width: 100%; display: inline-block; font-size: 1.125rem; }
        .close-btn {position: absolute; right:20px; top:50%; transform: translateY(-50%);}

        .viewarea {height: calc(100vh - 60px);}

        .close-btn {cursor: pointer;}
        .single-close { transform:none; top:10px; right:10px;}
        .centreme {margin-top:50%; margin-left:50%; transform: translate(-50%,-50%);}

        .payload {width: 100%; max-width: 1200px; height:inherit; margin-left:50%; transform: translateX(-50%); background--:white;}

        .mainviewer,
        .zoomviewer {height: inherit;float:left; width:calc(100% - 200px); height: inherit; display: flex; align-content: center; overflow: hidden; background:white;}
        .mainviewer img {width: 100%; height:100%; align-self: center; object-fit:contain;}
        .thumblist {height: inherit; padding:10px 20px; background: white; width:200px;float: left; overflow-y: auto; display: flex; align-content: center; }
        .thumblist img {height: 100%; max-height:120px; cursor: pointer; border:1px solid rgba(0,0,0,0.5); padding:10px 20px; margin-top:10px;}
        .thumblist img.active {border-color: red;}

        .imgnav-left, .imgnav-right {position: absolute; top: 50%; transform: translate(0, -50%); left: 220px; cursor: pointer;}
        .imgnav-right {left: unset; right: 20px; transform: translate(0, -50%) rotate(180deg);}

        section:last-of-type {padding-top:0; padding-bottom:0;}

        .single {display:flex; align-content: center; align-items: center;width: unset !important; height: unset !important; border:1px solid #999999;}
        .single>img {max-height:90vh; align-self: center; display:block;}

        .zoomviewer { position:absolute;top:0; right:0; display:none;}
        .zoomviewer > img {width: fit-content; height: fit-content;}

        .measurement-none {visibility:hidden;}

        section.disclaimer {max-width:1200px; margin:auto; padding-bottom:20px;}
        .note-container {margin-bottom:0;}

        @media only screen and (max-width:480px){
            .payload {background:white;}
            .listing {text-align: center; padding:0;}
            .mainviewer, .thumblist {float: none; width:100%; position: absolute; }
            .thumblist {height: unset; overflow: hidden; overflow-x: auto; top:unset; bottom:0; padding-bottom:20px; z-index:6;}
            .thumblist .holder {width: unset; white-space: nowrap; padding-right: 20px;}
            .thumblist img {margin:0px; padding:5px; width:60px; height: unset;}

            .mainviewer {height: calc(100vh - 60px - 150px); z-index:5;}
            .imgnav-left {left:10px; width:10px;}
            .imgnav-right {right:10px; width:10px;}

            .imgnav-left, .imgnav-right {top: calc(50% - 50px); z-index:7;}
            .close-btn {right:10px;}
            .single-close { top:10px;}

            .single {width:100% !important;}
            .single>img {max-height:unset; width:100% !important;}
            #modelmenu .backtocopy {display:inline-block;}

            .cta {font-size:.65rem; line-height:1.2em; margin-top:25px; letter-spacing:unset; padding-right:20px;}
            .cta img {top:50%; position:absolute; right:0; transform:translateY(-50%);}

            .item-hero .overlay {display:none;}
        }
    </style>
@stop

@section('body-bottom')
    <div class="content-lb">
        <div class="cover"></div>
        <div class="payload">
            <div class="titlebar">
                <span class="label"></span>
                <span class="close-btn"><img src="{{versioned_asset('img/interface/close-x.png')}}" alt="Close lightbox"></span>
            </div>
            <div class="viewarea">
                <div class="thumblist"> <div class="holder"></div> </div>
                <div class="mainviewer"></div>
                <div class="zoomviewer"></div>
                <img class="imgnav-left" src="{{ versioned_asset('img/interface/arrow-red-left.png')}}" alt="">
                <img class="imgnav-right" src="{{ versioned_asset('img/interface/arrow-red-left.png')}}" alt="">
            </div>

        </div>

        <div class="single makemecenter"></div>
        <span class="close-btn single-close"><img src="{{versioned_asset('img/interface/close-x.png')}}" alt="Close lightbox"></span>
    </div>

    <script>
        var baseurl = '{{ url('/') }}/';
        var trace = console.log;
        $(document).ready(function(){
            var lb = $('.content-lb');
            var closebtn = lb.find('.close-btn');
            var title = lb.find('.titlebar .label');
            var thumblist = lb.find('.thumblist .holder');
            var mainviewer = lb.find('.mainviewer');
            var zoomviewer = lb.find('.zoomviewer');
            var totalimage = 0;
            var currentimage = 0;
            var singleview = $('.single')
            var root = $('html,body');

            function panzoom(e=null){
                if(zoomviewer.is(':visible')){
                    var ww = zoomviewer.width();
                    var hh = zoomviewer.height();

                    var parentOffset = zoomviewer.offset();
                    //or $(this).offset(); if you really just want the current element's offset
                    var relX = e.pageX - parentOffset.left;
                    var relY = e.pageY - parentOffset.top;
                    //console.log(relX,relY)
                    var mvmX = relX/ww;
                    var mvmY = relY/hh;
                    //console.log(mvmX,mvmY)
                    // now we have mouse movement calculation, we calculate how to move the image
                    var img = zoomviewer.find('img');
                    var panw = img.width() - ww;
                    var pany = img.height() - hh;
                    //
                    if(img.width() < ww){
                        mvmX = 0.5;
                        mvmY = 0.5;
                    }
                    img.css('marginLeft', -panw * mvmX).css('marginTop', -pany *mvmY);

                }
            }

            $('.cta.measurement').click(function(){
                singleview.html('<img src="'+ $(this).data('img') +'" >');
                root.addClass('noscroll');
                singleview.show();
                singleview.next('.close-btn').show();
                $('.payload').hide();
                lb.fadeIn('fast');
                // close button
                var close = $('.single-close');
                //close.css('left', zoomviewer.width()/2 + singleview.width()/2 );
                //close.css('top', zoomviewer.height()/2 - singleview.height()/2 );
            })

            $('.item-hero').click(function(){

                title.html( $('.labelnum'+$(this).data('numindex')).html() );
                root.addClass('noscroll');



                //console.log($(this).data('images'))
                var images = $(this).data('images').split('|');
                thumblist.html('');
                totalimage = 0;
                images.forEach(function(val,i) {
                    //console.log(val);
                    thumblist.append('<img class="pimg'+(i+1)+'" data-imgnum="'+(i+1)+'" src="'+baseurl+val+'">');
                    totalimage++;
                });
                thumblist.find('img').click(function(){
                    var theimg = '<img class="" src="'+$(this).attr('src')+'">';
                    mainviewer.html(theimg);
                    zoomviewer.html(theimg);
                    thumblist.find('img').removeClass('active');
                    $(this).addClass('active');
                    currentimage = $(this).data('imgnum');
                })

                thumblist.find('img:first-child').trigger('click');
                $('.payload, .titlebar, .viewarea').show();
                singleview.hide();
                singleview.next('.close-btn').hide();
                lb.fadeIn('fast');
                //console.log('tt',$('.titlebar').outerHeight())
                if($(window).innerWidth() < 480){
                    $('.viewarea').css('height', $(window).innerHeight() - $('.titlebar').outerHeight());
                    $('.mainviewer').css('height', $(window).innerHeight() - $('.titlebar').outerHeight() - $('.thumblist').outerHeight());
                }
            })

            $('.imgnav-left').click(function(){
                currentimage--;
                if(currentimage<1){ currentimage=totalimage;}
                $('.pimg'+currentimage).trigger('click');
            })
            $('.imgnav-right').click(function(){
                currentimage++;
                if(currentimage>totalimage){ currentimage=1;}
                $('.pimg'+currentimage).trigger('click');
            })

            closebtn.click(function(){
                $('.titlebar, .viewarea').hide();
                root.removeClass('noscroll');
                singleview.hide();
                lb.fadeOut('fast');
            })
            $('.content-lb .cover').click(function(){
                closebtn.trigger('click');
            })

            zoomviewer.on('mouseout', function(){
                $(this).hide();
            })
            zoomviewer.on('mousemove', panzoom);
            mainviewer.on('mouseover', function(){
                if(zoomviewer.width()>600){
                    // not mobile
                    zoomviewer.show();

                }
                //console.log(zoomviewer.find('img').width(), mainviewer.find('img').outerWidth())

            })

            closebtn.trigger('click');

            function normaliseAllCardHeight(){
                var maxhh = 0;
                var maxhh_title = 0;

                $('.copy-container .label').each(function(){
                    var hh = $(this).outerHeight()
                    if(hh>maxhh_title){
                        maxhh_title = hh;
                    }
                })
                $('.copy-container .label').css('height', maxhh_title+1);
                //

                $('.item-card').each(function(){
                    var hh = $(this).outerHeight()
                    if(hh>maxhh){
                        maxhh = hh;
                    }
                })

                $('.item-card').css('height', maxhh+1);
                //console.log('maxhh_title', maxhh_title);
            }


            $('img.hero').each(function() {
                var tmpImg = new Image() ;
                tmpImg.onload = normaliseAllCardHeight ;
                tmpImg.src = $(this).attr('src') ;
            }) ;
            //normaliseAllCardHeight();

        });
    </script>
@endsection
