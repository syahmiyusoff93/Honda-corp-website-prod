@php

    /*

    SAI 20201103 - TO WHOEVER MAINTAINING THIS PROJECT

    I'm pretty dissappointed in account servicing team and client for making this section pretty messed up with customised item everytime they have price updates.
    This section should be a clean and the calculation should be just a guide and not an actual price quotation to purchase the car.

    I'm pretty fed up and I'm just gonna hard code things here for the sake of my own sanity. This is a battle we just could not win.

    NAT 20220214 

    LOL 

    */
    $DEFAULT_REGION = 'peninsular-malaysia';
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'pricing_regions.json', false, $honda_api_context);
    $data = json_decode($data);
    $regions = $data->payload;

    $allmodels = config('global.allmodels');

    $data = file_get_contents($APIPATH.'variants.json', false, $honda_api_context);
    $data = json_decode($data);
    $allvariants = $data->payload;

    $data = file_get_contents($APIPATH.'pricing_retail_allregion_allvariants.json', false, $honda_api_context);
    $data = json_decode($data);
    $allpricings = $data->payload;

    // EXCLUSION LIST - these list will be hidden from dropdown selection
    // $excluded_model_slug = ['type-r', 'odyssey'];
    $excluded_model_slug = ['odyssey'];

@endphp

@extends('layouts.base')

@php
    $metadata['title'] = 'Hire-Purchase Loan Calculator';
    $metadata['description'] = 'Welcome to Honda Malaysia. Browse the latest Honda Models, Book Test Drives, Compare Vehicles & More. Logon To Honda Malaysia Today.';
    $metadata['keywords'] = 'honda, honda Malaysia, malaysia automotive, power of dreams, car dealer, car showroom, car model, test drive, hire-purchase loan, calculator, loan calculator';
    $metadata['image'] = '';
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
    {{$metadata['title']}}
@stop



@section('content')
<script src="/js/currency.min.js"></script>
<script> // 05052021_004 natrev
    var __APIPATH = '{{$APIPATH}}';
    __APIPATH = '/api/';
    var pricings = JSON.parse('{!!json_encode($allpricings)!!}');
    //console.log('alldata', pricings);

    var __region, __model, __mslug, __variant, __tintp, __packagesp, __duration, __total, __baseValue;
    var forced_show_dp = false;
    var fromVariantClick = false;

    $(function(){

        addAbilityToUncheckRadioInput();

        var acc_additional = [
            // ['Honda Recommended Digital Video Recorder',                     749,    ['accord','brv','city','crv','hrv','jazz','odyssey','type-r']],
            ['Honda Recommended Digital Video Recorder',                     749,    ['accord','brv','city','jazz','odyssey']],
            ['Honda Recommended Digital Video Recorder (Front & Rear)',                     1149,    ['city-hatchback', 'civic-modulo', 'civic', 'city', 'crv', 'hrv']],
            /* ['Honda Recommended Digital Video Recorder - Rear DVR',         400,    ['civic-modulo']],
            ['Honda Recommended Digital Video Recorder - Front DVR',         749,    ['civic-modulo']], */
            ['Car Cover',                                  350,     ['accord', 'brv']],
            ['Honda Recommended Advanced 360 HD Camera',  3300,     ['brv']],
            // [' Ultra Glass Body Coating',  2716,     ['civic-modulo', 'civic']]
            [' Ultra Glass Body Coating',  2399,     ['civic-modulo', 'civic']]
            
        ];

        var alltint = [
            // ['Horizon Safety', 1478],
            // ['Horizon Safety+', 2169.8],
            // ['Horizon Security Premium+', 2169.8],
            // ['Ray Barrier 4', 1415],
            // ['Ray Barrier 4+', 1666],
            // ['Ray Barrier 6', 1981.1],
            // ['Ray Barrier 6+', 2263],
            // //['Ray Barrier Premier 6', 2641.5], // 20200518 - Eason asked to remove
            //['Ray Barrier Premier 6+', 2830.1] // 20200518 - Eason asked to remove
            // ['Horizon Safety', 1478],
            ['Smart', 1499],
            ['Premium', 2199]
        ];

        var alltint_typer = [
            // ['Ray Barrier Premier 6', 2264.1],
            // ['Ray Barrier Premier 6+', 2452.8]
        ];

        var alltint_en1 = [
            ['Smart', 1499],
            ['Premium', 2199]
        ];

        var alltint_accord = [
            // ['Horizon Safety', 1478],
            ['Smart', 1499],
            ['Premium', 2199]
        ];

        var alltint_cityhatchback = [
            ['Smart', 1499],
            ['Premium', 2199]
        ];


        var alltint_civicmodulo = [
            // ['Ray Barrier 4 Black Pearl', 1617],
            // ['Ray Barrier 4+', 1666],
            // ['Ray Barrier 6+', 2263],
            // ['Ray Barrier 6 Black Pearl', 2275]
        ];
        
        var alltint_civic = [
            // ['Ray Barrier 4 Black Pearl', 1617],
            // ['Ray Barrier 4+', 1666],
            // ['Ray Barrier 6+', 2263],
            // ['Ray Barrier 6 Black Pearl', 2275]
        ];

        function __calcDP(){

            if(__variant==0 || __region==0){
                return false;
            }
            __baseprice = pricings[__variant][__region];

            $('.err-variant').hide();
            if(__baseprice==undefined || __baseprice==0){
                $('.err-variant').show();
                return false;
            }
            __total = __cleanPrice(__baseprice);
            __total += __cleanPrice(__tintp);
            __total += __cleanPrice(__packagesp);

            __baseValue = __total;

            var dp = __cleanPrice(__total*.1);
            if(__cleanPrice($('#dp-amount').val()) > dp && !fromVariantClick){
                // if input downpayment is more than calculated, use that lah!
                console.log(" more than calced ");
                dp = $('#dp-amount').val();
            }

            if(!$("#dp-amount").is(':focus') || forced_show_dp){
                $('#dp-amount').val(__formatnumberwithcommaandstufflikethatshit(dp));
                forced_show_dp = false;
                console.log('dp_calc', dp)
            }
            fromVariantClick = false;

            console.log(" calcrev 01 ");

        }

        function processInterestInput(){
            var inp=$('#interest-rate').val();
            if(inp=='' || inp==0){
                if(!$('#interest-rate').is(':focus')){
                    $('#interest-rate').val(3)
                }
            }
        }

        function __gocalculate(){
            // if downpayment is empty
            if($('#dp-amount').val().trim()==''){
                if(!__calcDP()){
                    return false;
                }
            }
            if(__total==undefined){
                return false;
            }

            var dp = __cleanPrice($('#dp-amount').val());
            $('.out-downpayment').html(__displayPrice(dp));

            // just for display - sai 20200207
            //$('#dp-amount').val(__formatnumberwithcommaandstufflikethatshit(dp));

            var total = __total;
            $('.out-selling-price').html(__displayPrice(total));

            var loanamount = total-dp;
            $('.out-loan-amount').html(__displayPrice(loanamount));

            processInterestInput();
            var interest = __cleanPrice($('#interest-rate').val())/100 * loanamount * __duration;

            var monthly = (loanamount + interest) / (__duration*12);
            $('.out-monthly-installment').html(__displayPrice(monthly) + ' /month');
        }

        function __formatnumberwithcommaandstufflikethatshit(price){
            price = __cleanPrice(price)
            price = currency(price, { separator: ',' }).format();
            return price;
        }

        function __displayPrice(price){
            price = __formatnumberwithcommaandstufflikethatshit(price);
            return 'RM ' + price;
        }

        function __cleanPrice(price){
            if(price=='' || price == null) {
                price = 0;
            }
            price = currency(price).value;
            return price;
        }

        function __resetcalc(){
            __baseprice = 0;
            __variant = 0;
            __tintp = 0;
            __packagesp = 0;
            $('.sai-variant-li').hide();
            $('.choose-variant-copy').html('Choose Variant');
            $('.choose-tint-copy').html('Standard (No tint)');
            $('#tint-select').html('');
            $('#package-select').html('');
        }
        __resetcalc();

        function __generateAccHTML(eleid, elename, price,title){
            console.log("v:"+__variant );
            console.log("id:"+ eleid );


            if ( __variant == "57" ) {
                if (eleid == "package2030" ) return false;
                if (eleid == "package2045" ) return false;
                if (eleid == "package2046" ) return false;
            }
            else if (( __variant == "55" ) || ( __variant == "56" )) {
                if (eleid == "package2047" ) return false;
                if (eleid == "package2050" ) return false;
            }
            
            else if (( __variant == "42" ) || ( __variant == "43" )) {
                 if (eleid == "package1685" ) return false;
                 if (eleid == "package1687" ) return false;
            }
            else if ( __variant == "44" )  {
                 if (eleid == "package1682" ) return false;
                 if (eleid == "package1683" ) return false;
                 if (eleid == "package1684" ) return false;
            }
            
            else if (( __variant == "8" ) || ( __variant == "9" )) {
                 if (eleid == "package2175" ) return false;
                 if (eleid == "package2176" ) return false;
            }
            else if ( __variant == "10" )  {
                 if (eleid == "package2174" ) return false;
                 if (eleid == "package1448" ) return false;
                 if (eleid == "package1105" ) return false;
            }

            console.log("name:"+ elename ); //package542   // package-additional-05
            var __hrvswitch = false;
            if ( __variant == 48 )  {
                if (eleid == "package542")  __hrvswitch = true;
                if (eleid == "package-additional-05")  __hrvswitch = true;
            }

            if (!__hrvswitch) {

                var t = '';
                t +=' <p>';
                t += '<input class="package-item" type="radio" id="'+eleid+'" name="'+elename+'" data-price="'+price+'">';
                t += '<label for="'+eleid+'">'+title+' (+ '+__displayPrice(price)+')</label>';
                t += '</p>';
                $('#package-select').append(t);
            }
           
        }

        function __loadaccessories(){
            var data,t, gg;

            $('#package-select, .choose-tint-copy').html('Retrieving...');

            $.getJSON(__APIPATH+'model_'+__mslug+'_accessories.json', function(dd) {

                if(dd.payload){

                    $('.choose-tint-copy').html('Standard (No tint)');
                    $('#tint-select').html('<li data-price="0">'+$('.choose-tint-copy').html()+'</li>');
                    $('#package-select').html('');
                    __tintp = 0;
                    __packagesp = 0;

                    for (var i in dd.payload) {
                        data = dd.payload[i]
                        if(data.type == 'tint' ){
                            // from API
                            //$('#tint-select').append('<li data-price="'+data.price_clean+'">'+data.title+' (+ '+__displayPrice(data.price_clean)+')</li>');
                        }

                        if(data.type == 'package' ){
                            //add to package
                            gg = 'radio-group-'+i;
                            if (data.group!=undefined && data.group!=''){
                                gg = data.group;
                            }

                            // t = '';
                            // t +=' <p>';
                            // t += '<input class="package-item" type="radio" id="package'+data.id+'" name="'+gg+'" data-price="'+data.price_clean+'">';
                            // t += '<label for="package'+data.id+'">'+data.title+' (+ '+__displayPrice(data.price_clean)+')</label>';
                            // t += '</p>';
                            // $('#package-select').append(t);
                            if (data.title.trim() != 'Digital Video Recorder') {
                                __generateAccHTML('package'+data.id, gg, data.price_clean,data.title);
                            }
                        }
                    }

                    // addtional hardcoded acceesories to be calculated

                    for (var i in acc_additional) {
                        console.log(i, acc_additional[i]);
                        for(var j in acc_additional[i][2]){
                            if(acc_additional[i][2][j] == __mslug){
                                
                                if(acc_additional[i][2][j] == "brv")  {
                                  if (__variant != 16 ) {
                                    if ( i<2)  
                                    __generateAccHTML('package-additional-'+i+j, 'radio-group-additional-'+i+j, acc_additional[i][1],acc_additional[i][0]);
                                  }
                                  else {
                                    __generateAccHTML('package-additional-'+i+j, 'radio-group-additional-'+i+j, acc_additional[i][1],acc_additional[i][0]);
                                  }
                                }
                                else {
                                  __generateAccHTML('package-additional-'+i+j, 'radio-group-additional-'+i+j, acc_additional[i][1],acc_additional[i][0]);  
                                }
                                
                               
                            }
                        }
                    }

                    // tint
                    var tintlis;

                    switch(__mslug){
                        case 'accord':
                            tintlis = alltint_accord;
                            break;
                        case 'typer':
                        case 'type-r':
                            tintlis = alltint_typer;
                            break;
                        case 'city-hatchback':    
                            tintlis = alltint_cityhatchback;
                            break;
                        case 'civic-modulo':    
                            tintlis = alltint_civicmodulo;
                            break;
                        case 'civic':    
                            tintlis = alltint_civic;
                            break;
                        case 'en1':    
                            tintlis = alltint_en1;
                            break;
                        default:
                            tintlis = alltint;
                    }

                    for (var i in tintlis){
                        $('#tint-select').append('<li data-price="'+tintlis[i][1]+'">'+tintlis[i][0]+' (+ '+__displayPrice(tintlis[i][1])+')</li>');
                    }

                    __assignActionToTintList();
                    __assignActionToPackageList();

                } else {
                    //$('.col'+pos).html('(No data available)');
                }
            });
        }

        function __assignActionToTintList(){
            $('#tint-select li').click(function(){
                $('.choose-tint-copy').html($(this).html());
                __tintp = $(this).data('price')
                //console.log('__tintp', __tintp);
                forced_show_dp = true;
                __calcDP();
                let ori_dp = __cleanPrice(__baseValue*.1);
                $('#dp-amount').val(__formatnumberwithcommaandstufflikethatshit(ori_dp));
                __gocalculate();
            })
        }

        function __assignActionToPackageList(){

            $('#package-select p').on('tap, mouseup',function(){
                __packagesp = 0;
                $(this).toggleClass('flagged');

                $('#package-select p').each(function(){
                    if($(this).hasClass('flagged')) {
                        __packagesp += parseFloat(__cleanPrice($(this).find('.package-item').data('price')));
                     }

                })

                __calcDP();
                let ori_dp = __cleanPrice(__baseValue*.1);
                $('#dp-amount').val(__formatnumberwithcommaandstufflikethatshit(ori_dp));
                __gocalculate();
            });

            addAbilityToUncheckRadioInput();
            {{--  SAI: 'addAbilityToUncheckRadioInput' defined in public/js/hondaweb_global.js  --}}
        }

        $('#dp-amount').blur(__calcDP).keyup(__calcDP);
        $('#interest-rate').blur(processInterestInput).keyup(processInterestInput);
        $('#dp-amount, #interest-rate').blur(__gocalculate);
        $('#dp-amount, #interest-rate').keyup(__gocalculate);

        // ------------

        {{--  STEP 1  --}}
        $('#region-select li').click(function(){
            __region = $(this).data('region')
            $('.choose-region-copy').html($(this).find('a').html())
            console.log('region', __region);
            console.log('__variant', __variant)
            
             // Hide or show the specific model based on region
            if (__region !== 'peninsular-malaysia') {
                $('li[data-modelid="37"][data-modelslug="en1"]').hide();
                 // Automatically select and trigger click on "City" model
                const $cityModel = $('li[data-modelid="3"][data-modelslug="city"]');
                $cityModel.trigger('click');
            } else {
                $('li[data-modelid="37"][data-modelslug="en1"]').show();
            }

            if(__variant>0){
                forced_show_dp = true;
                __calcDP();
                let ori_dp = __cleanPrice(__baseValue*.1);
                $('#dp-amount').val(__formatnumberwithcommaandstufflikethatshit(ori_dp));
                __gocalculate();
            }
        })

        {{--  STEP 2  --}}
        $('#model-select li').click(function(){
            __model = $(this).data('modelid')
            __mslug = $(this).data('modelslug')
            //console.log('model', __model);
            $('#variant-select li').each(function(){
                if($(this).data('modelid')==__model){
                    $(this).show();
                    // if($(this).data('variantid') != 13){
                    // }
                } else {
                    $(this).hide();
                }
            });
            $('.oncegotvariant').slideUp();
            // reset
            __resetcalc();
            $('.sai-variant-li').show();

        });

        $('#variant-select li').click(function(){
            __variant = $(this).data('variantid');
            fromVariantClick = true;
             // load accessories
             __loadaccessories();
            $('.oncegotvariant').slideDown();
            //show base price installment
            forced_show_dp = true;
            __calcDP();
            __gocalculate();
        });


        $('#interest-select li').click(function(){
            __duration = $(this).data('duration')
            var arse = '';
            if(__duration>1) {arse = 's';}
            $('.choose-duration-copy').html(__duration+' year'+arse)
            __gocalculate();
        })

        // init
        $('#region-select li:nth-of-type(1)').trigger('click');
        $('#interest-select li:nth-of-type(1)').trigger('click');
        $('#variant-select li').hide();
        $('.oncegotvariant').slideUp();

        //

        $('.loan-section-m .toggle').click(function(){
            if($('.loan-section-m .sum .details').is(':visible')){
                $('.loan-section-m .sum .details').slideUp();
                $('.toggle').removeClass('active');

            }else{
                $('.loan-section-m .sum .details').slideDown();
                $('.toggle').addClass('active');
            }
        })
    })
</script>

<script>
    /* STYLING RELATED */
    /* LOAN RESULT STICK AT BOTTOM AND ABOVE FOOTER */

    $(window).scroll(function(){

        var windowHeight = $(window).height(),
            footerHeight = $('#footer-wrapper').height();
            documentHeight = $(document).height();

            loanHeight = windowHeight - footerHeight;
            contentHeight = $('.loan-inner').height();

        scrollPosition = $(window).scrollTop();
        //console.log(documentHeight, windowHeight, scrollPosition, footerHeight);

        if(documentHeight - (windowHeight + scrollPosition) >= footerHeight) {
            //console.log('stick bottom');

            $('.loan-section-m .sum .result').css({
                'bottom':'0',
                'position':'fixed',
                'width': '100%',
                'margin-left': '0'
            });

            $('.loan-section-m .sum .details').css({
                'position': 'fixed',
                'bottom' : '95px',
                'padding-left' : '30px',
            }) ;

        } else{

            $('.loan-section-m .sum .result').css({
                'bottom':'-372px',
                'position':'absolute',
                'width': 'calc(100% + 21px)',
                'margin-left': '-10px'
            });

            $('.loan-section-m .sum .details').css({
                'position': 'absolute',
                'bottom' : '-280px',
                'padding-left' : '20px'
            }) ;
        }

    });
</script>

<div class="body-wrapper">
<section class="loan-inner innerpage">
    <div class="inner-container">
        <div class="intro extrapadding">
            <h2>LOAN CALCULATOR</h2>
            <div class="intro-title grey">Estimate your monthly budget by using the tools below.</div>
        </div>

        <div class="stage-contained loan-container">
            <div class="loan-section">
                <div class="sec-title black">1. Car Details</div>
                <ul class="form-item">
                    <li>
                        <div class="select-title">Location</div>
                        <div class="outline-drop">
                                <div class="dropdown-select" data-toggle="toggle5">
                                        <div class="dropdown-box">
                                            <span class="btn choose-region-copy">Peninsular Malaysia</span>
                                            <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>
                                        </div>
                                        <ul id="region-select" class="dropdown-menu hide" data-toggle="toggle5" style="display: none;">
                                            @foreach ($regions as $item)
                                                <li data-region="{{$item->slug}}">{{$item->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            <div class="error-message red"></div>
                        </div>
                    </li>

                    <li>
                        <div class="select-title">Model</div>
                        <div class="outline-drop">
                            <div class="dropdown-select" data-toggle="model">
                                <div class="dropdown-box"><span class="btn">Choose Model</span>   <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                                <ul id="model-select" class="dropdown-menu hide" data-toggle="model">
                                    @foreach ($allmodels as $item)
                                        <script> console.log("{{$item->slug}}") </script>
                                        @if (!in_array($item->slug, $excluded_model_slug))
                                           
                                            <li data-modelid="{{$item->id}}" data-modelslug="{{$item->slug}}">{{$item->name}}</li>
                                           
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="error-message red err-model"></div>
                        </div>
                    </li>

                    <li class="sai-variant-li">
                        <div class="select-title">Variant</div>
                        <div class="outline-drop">
                            <div class="dropdown-select" data-toggle="variant">
                                    <div class="dropdown-box"><span class="btn choose-variant-copy">Choose Variant</span>   <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                                    <ul id="variant-select" class="dropdown-menu hide" data-toggle="variant">
                                        @foreach ($allvariants as $item)
                                                <li data-modelid="{{$item->model_id}}" data-variantid="{{$item->id}}">{{$item->model_name.' '.$item->name}}</li>
                                        @endforeach
                                    </ul>
                            </div>
                            <div class="error-message red err-variant"></div>
                        </div>
                    </li>

                    <li class="oncegotvariant">
                        <div class="select-title">Tint Package</div>
                        <div class="outline-drop">
                            <div class="dropdown-select" data-toggle="tint">
                                <div class="dropdown-box"><span class="btn choose-tint-copy">Standard Car (+RM 0.00)</span>   <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                                <ul id="tint-select" class="dropdown-menu hide" data-toggle="tint">

                                </ul>
                            </div>
                            <div class="error-message red"></div>
                        </div>
                    </li>

                    <li class="oncegotvariant">
                        <div class="select-title">ACCESSORIES (OPTIONAL)</div>
                        <div class="radio" id="package-select"></div>
                        <div class="error-message red"></div>
                    </li>
                </ul>

            </div>


            <div class="loan-section">
                <div class="sec-title black">2. LOAN DETAILS</div>
                <ul class="form-item">
                    <li>
                        <div class="select-title">DOWN PAYMENT</div>
                        <div class="input-box">
                            <input id="dp-amount" type="text" name="downpayment" class="input-text"><span class="unit-front">RM</span>
                            </div>
                        <div class="error-message red"></div>
                    </li>

                    <li>
                        <div class="select-title">Interest Rate (%)</div>
                        <div class="input-box">
                            <input id="interest-rate" type="number" name="downpayment" class="input-text error--" precision="0.01" value="3" style ="padding-left:20px;"><span class="unit-back" style="display:none;">%</span>
                            </div>
                        <div class="error-message red"></div>
                    </li>

                    <li>
                        <div class="select-title">DURATION</div>
                        <div class="outline-drop">
                            <div class="dropdown-select" data-toggle="duration">
                                <div class="dropdown-box"><span class="btn choose-duration-copy">8 years</span><span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                                <ul id="interest-select" class="dropdown-menu hide " data-toggle="duration">
                                    @foreach ([9,8,7,6,5,4,3,2,1] as $item)
                                    @php
                                        $arse = $item>1 ? 's' : '';
                                    @endphp
                                        <li data-duration="{{$item}}">{{$item}} year{{$arse}} </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="error-message red"></div>
                        </div>
                    </li>
                </ul>

            </div>


            <div class="loan-section for-desktop">
                <div class="sum">
                    <div class="details">
                        <ul class="loan-est">
                            <li>
                                <div class="est-title">ESTIMATED RETAIL PRICE WITHOUT INSURANCE</div>
                                <div class="est-copy out-selling-price">RM ---</div>
                            </li>

                            <li>
                                <div class="est-title">DOWN PAYMENT</div>
                                <div class="est-copy red out-downpayment">RM ---</div>
                            </li>

                            <li>
                                <div class="est-title">LOAN REQUIRED</div>
                                <div class="est-copy out-loan-amount">RM ---</div>
                            </li>
                        </ul>
                        <div class="cleafix"></div>
                    </div>
                    <div class="cleafix"></div>
                    <div class="result">
                        <ul class="loan-est">
                            <li>
                                <div class="total">
                                    <div class="est-title">ESTIMATED Monthly Price</div>
                                    <div class="est-copy out-monthly-installment">RM --- /month</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="loan-section-m for-mobile">
                <div class="sum">

                    <div class="result">
                        <ul class="loan-est">
                            <li>
                                <div class="total">
                                    <div class="est-title">Estimated Monthly Installment</div>
                                    <div class="est-copy out-monthly-installment">RM --- /month</div>
                                </div>
                                <div class="toggle"></div>
                                <div class="cleafix"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="details">
                        <ul class="loan-est">
                            <li>
                                <div class="est-title">ESTIMATED RETAIL PRICE WITHOUT INSURANCE</div>
                                <div class="est-copy out-selling-price">RM ---</div>
                            </li>
                            <li>
                                <div class="est-title">DOWN PAYMENT</div>
                                <div class="est-copy red out-downpayment">RM ---</div>
                            </li>

                            <li>
                                <div class="est-title">LOAN REQUIRED</div>
                                <div class="est-copy out-loan-amount">RM ---</div>
                            </li>
                        </ul>
                        <div class="cleafix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
</div>
<div class="bottom-spacer bg-grey"></div>
<script>

    $("document").ready(function(){
            $( "[data-variantid=54]").insertBefore("[data-variantid=41]");
            $( "[data-variantid=58]").insertBefore("[data-variantid=41]");
            $( "[data-variantid=53]").insertBefore("[data-variantid=13]");

            //CRV
            // $( "[data-variantid=53]").insertBefore("[data-variantid=13]");
            // $( "[data-variantid=13]").css("display", "none")
            //CRV

            // $("#variant-select > li:nth-child(12)").insertBefore("#variant-select > li:nth-child(11)");
            
              @php  
                    if  (config('global.STAGE')=='dev') {
                        
                        echo '$( "#variant-select > li:nth-child(19)").insertBefore("#variant-select > li:nth-child(18)");'; // civic modulo 
                        echo '$( "#variant-select > li:nth-child(8)").insertBefore("#variant-select > li:nth-child(7)");';
                        //echo '$("#variant-select>li[data-variantid=41]").remove();';
                    }
                    else {
                        // echo '$("#variant-select > li:nth-child(12)").insertBefore("#variant-select > li:nth-child(11)");'; // CITY HATCHBACK
        
                     //   echo '$( "#variant-select li:nth-child(18)").insertBefore("#variant-select li:nth-child(15)" ); ' // civic modulo to change on STG
                        echo '$( "#variant-select > li:nth-child(9)").insertBefore("#variant-select > li:nth-child(8)");';
                       // echo '$( "[data-variantid=62]").insertBefore("[data-variantid=61]");';
                       // echo '$( "[data-variantid=54]").insertBefore("[data-variantid=41]");';
                        // echo '$("#variant-select>li[data-variantid=61]").remove();';
                    }
              @endphp 

         console.log("loan calc v04");
    })
</script>


@stop

