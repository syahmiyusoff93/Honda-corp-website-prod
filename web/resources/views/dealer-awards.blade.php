@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'dealers_all.json', false, $honda_api_context);
    $data = json_decode($data);
    $dealer_list = $data->payload;

    $dealer_elite=[];
    $dealer_elite_display=[[],[],[]];
    $dealer_quality=[];
    $dealer_quality_display=[[],[],[]];

    $siteroot = $_SERVER['DOCUMENT_ROOT'];

    foreach ($dealer_list as $key => $value) {
        $awards = explode(',',$value->awards);

        // remove company number from name display
        $shortname = explode('[',$value->name)[0];

        $shortname = str_ireplace('(3S CENTRE)','', $shortname);
        $value->name = $shortname;

        foreach ($awards as $i => $item) {
            switch(trim($item)){
                case 'top'      : $dealer_top           = $value; break;
                case 'gold'     : $dealer_gold          = $value; break;
                case 'silver'   : $dealer_silver        = $value; break;
                case 'bronze'   : $dealer_bronze        = $value; break;
                case 'top10'    : $dealer_top10[]       = $value; break;
                case 'achiever' : $dealer_achiever[]    = $value; break;
                case 'elite'    : $dealer_elite[]       = $value; break;
                case 'quality'  : $dealer_quality[]     = $value; break;
                case 'sport'    : $dealer_sport[]       = $value; break;
            }
        }
    }

    //

    // to devide the list to a 3-column list
    foreach ($dealer_elite as $key => $value) {
        $dealer_elite_display[$key%3][] = $value;
    }

    // to devide the list to a 3-column list
    foreach ($dealer_quality as $key => $value) {
        $dealer_quality_display[$key%3][] = $value;
    }

    //
    // $award_year = '2019';
    // $award_year = '2022';
    // $award_year = '2023';
    $award_year = '2024';
     

    // $toppers[] = [
    //     'label'=>'Top Dealer',
    //     'img'=> versioned_asset('img/discover/da_01_top.png'),
    //     'name'=> @$dealer_top->name,
    //     'url' => url('dealers/'.@$dealer_top->id),
    //     'color' => '#708CA4'
    //     ];
    // $toppers[] = [
    //     'label'=>'Gold Dealer',
    //     'img'=> versioned_asset('img/discover/da_02_gold.png'),
    //     'name'=> 'Jimisar Motors Sdn Bhd',
    //     // 'name'=> @$dealer_gold->name,
    //     'url' => url('dealers/43'),
    //     // 'url' => url('dealers/'.@$dealer_gold->id),
    //     'color' => '#AF7E01'
    //     ];
    // $toppers[] =[
    //     'label'=>'Silver Dealer',
    //     'img'=> versioned_asset('img/discover/da_03_silv.png'),
    //     'name'=> @$dealer_silver->name,
    //     'url' => url('dealers/'.@$dealer_silver->id),
    //     'color' => '#7D7D7D'
    //     ];
    // $toppers[] = [
    //     'label'=>'Bronze Dealer',
    //     'img'=> versioned_asset('img/discover/da_04_bronz.png'),
    //     'name'=> @$dealer_bronze->name,
    //     'url' => url('dealers/'.@$dealer_bronze->id),
    //     'color' => '#8D5646'
    //     ];

    $toppers[] = [
        'label'=>'Top Dealer',
        'img'=> versioned_asset('img/discover/da_01_top.png'),
        'name'=> 'Tenaga Setia Resources Sdn Bhd',
        // 'name'=> @$dealer_top->name,
        'url' => url('dealers/102'),
        // 'url' => url('dealers/'.@$dealer_top->id),
        'color' => '#708CA4'
        ];
    $toppers[] = [
        'label'=>'Gold Dealer',
        'img'=> versioned_asset('img/discover/da_02_gold.png'),
        'name'=> 'Ban Chu Bee Sdn Bhd',
        // 'name'=> 'Jimisar Motors Sdn Bhd',
        // 'name'=> @$dealer_gold->name,
        'url' => url('dealers/6'),
        // 'url' => url('dealers/'.@$dealer_gold->id),
        'color' => '#AF7E01'
        ];
    $toppers[] =[
        'label'=>'Silver Dealer',
        'img'=> versioned_asset('img/discover/da_03_silv.png'),
        'name'=> 'Ban Lee Heng Motor (Melaka) Sdn Bhd',
        // 'name'=> @$dealer_silver->name,
        'url' => url('dealers/10'),
        // 'url' => url('dealers/'.@$dealer_silver->id),
        'color' => '#7D7D7D'
        ];
    $toppers[] = [
        'label'=>'Bronze Dealer',
        'img'=> versioned_asset('img/discover/da_04_bronz.png'),
        'name'=> 'Macinda Auto Sdn Bhd',
        // 'name'=> @$dealer_bronze->name,
        'url' => url('dealers/67'),
        // 'url' => url('dealers/'.@$dealer_bronze->id),
        'color' => '#8D5646'
        ];

    $toppers = json_decode(json_encode($toppers), false);

    // gallery
    $imglist[] = versioned_asset('img/discover/dealer_award_2019/101-2.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2019/102-2.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2019/103-2.png');
    $imglist[] = versioned_asset('img/discover/dealer_award_2019/104-2.jpg');

    $imglist[] = versioned_asset('img/discover/dealer_award_2018/101.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/102.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/103.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/104.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/201.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/202.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/203.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/204.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/205.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/206.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/207.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/208.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/209.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/210.jpg');
    $imglist[] = versioned_asset('img/discover/dealer_award_2018/211.jpg');

@endphp

@extends('layouts.base')

@section('page-title')
    Honda Dealer Awards
@stop

@section('content')

<div class="body-wrapper">

<section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li><a href="{{url('about-us')}}">About Us</a></li>
                    <li><a href="{{url('about-us/founder')}}">Our Founder</a></li>
                    <li><a href="{{url('about-us/manufacturing')}}">Manufacturing</a></li>
                    <li><a href="{{url('about-us/achievements')}}">Achievements</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('discover/dealer-awards')}}">Honda Dealer Awards</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>

<style>
/* overwrite */
    .service-tab-menu {background: #fff; margin-bottom: -70px;}
    .service-tab-menu ul li a {color: #000;}

    @media only screen and (max-width: 640px) {
        .service-tab-menu {display: none;}
    }
</style>
</section>

<section class="content-inner ceo innerpage" id="ceo">
    <div class="hero-banner">
        <div class="text-container">
            {{-- <div class="cat">DEALER REWARD & RECOGNITION</div> --}}
            {{-- <div class="sub-header">DEALER REWARD & RECOGNITION</div> --}}
            <div class="header">Honda DEALER AWARDS</div>
        </div>
    </div>

    <div class="inner-content-section content-area">
        <div class="ceo-img">
            <img src="{{versioned_asset('img/mock/honda-ceo.png')}}" alt="">
        </div>
        <h2>RECOGNITION OF OUTSTANDING PERFORMANCE</h2>
        <div class="content-copy">
            <p>We are proud to announce this year’s top achiever dealerships who have won the Honda Dealer Awards {{$award_year}}. These dealerships have done exceptionally well over the past year to successfully establish relationships of trust and achieve a high standard of service for their customers. Thank you for your dedication and hard work.</p>
        </div>
    </div>

    <div class="full-banner">
        <div class="stage-contained ">
            <h2 style="padding-bottom: 20px;">2024 CEO Award - 4S</h2>
            <ul class="flex ceo-list">

                @foreach ($toppers as $item)
                    <li>
                        <div class="awards-logo" style="color:{{$item->color}}">
                            <img src="{{$item->img}}" alt="{{$item->label}} Award logo">
                            <div class="logo-label">
                                <div class="aname">{{$item->label}} Award</div>
                                <div class="ayear">{{$award_year}}</div>
                            </div>

                        </div>
                        <div class="title">{{$item->label}}</div>
                        <div class="details"><a href="{{$item->url}}">{{$item->name}}</a></div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

    <div class="inner-content-section stage-contained awards-list">
        <h2 style="padding-bottom: 20px;">Elite Dealer</h2>
        <ul class="flex three-column">
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/34">HZN Cars Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/42">Jimisar Corporation Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/11">Ban Lee Heng Motor Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/92">Sri Utama Auto Sdn Bhd</a>
                </p>
            </li>
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/118">Vimal Auto-Liner Sdn Bhd</a>
                </p>
            </li>
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/112">Tiong Nam Motor (M) Sdn Bhd</a>
                </p>
            </li>
        </ul>
        {{-- <ul class="flex three-column">
                    
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/118">Vimal Auto-Liner Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/94">Sumber Auto Edaran Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/11">Ban Lee Heng Motor Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/102">Tenaga Setia Resources Sdn Bhd</a>
                </p>
            </li>
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/98">Syarikat Tan Eng Ann Sdn Bhd</a>
                </p>
            </li>
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/43">Jimisar Motors Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/31">Haslita Motor Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/117">Vermillion Autohaus Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/10">Ban Lee Heng Motor (Melaka) Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/40">Iptimas Motor Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/8">Ban Hoe Seng (Auto) Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/112">Tiong Nam Motor (M) Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/47">K M Lim Motor Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/67">Macinda Auto Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/14">Belux Auto Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/130">Yong Ming Motor Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/4">Angkasa Motor Sdn Bhd</a>
                </p>
            </li>            
            
            
        </ul> --}}
    </div>

    <div class="full-banner">
        <div class="stage-contained ">
            <h2 style="padding-bottom: 20px;">2024 CEO Award - 3S</h2>
            <ul class="flex ceo-list">

                <li>
                    <div class="awards-logo" style="color:#708CA4">
                        <img src="https://honda.com.my/img/discover/da_01_top.png" alt="Top Dealer Award logo">
                        <div class="logo-label">
                            <div class="aname">Top Dealer Award</div>
                            <div class="ayear">2024</div>
                        </div>

                    </div>
                    <div class="title">Top Dealer</div>
                    <div class="details"><a href="https://honda.com.my/dealers/144">Sri Utama One Auto Sdn Bhd</a></div>
                </li>

                <li>
                    <div class="awards-logo" style="color:#AF7E01">
                        <img src="https://honda.com.my/img/discover/da_02_gold.png" alt="Gold Dealer Award logo">
                        <div class="logo-label">
                            <div class="aname">Gold Dealer Award</div>
                            <div class="ayear">2024</div>
                        </div>

                    </div>
                    <div class="title">Gold Dealer</div>
                    <div class="details"><a href="https://honda.com.my/dealers/127">Weemaju Sabah Sdn Bhd</a></div>
                </li>

                <li>
                    <div class="awards-logo" style="color:#7D7D7D">
                        <img src="https://honda.com.my/img/discover/da_03_silv.png" alt="Silver Dealer Award logo">
                        <div class="logo-label">
                            <div class="aname">Silver Dealer Award</div>
                            <div class="ayear">2024</div>
                        </div>

                    </div>
                    <div class="title">Silver Dealer</div>
                    <div class="details"><a href="https://honda.com.my/dealers/5">AutoWorld Asia Sdn Bhd</a></div>
                </li>

                <li>
                    <div class="awards-logo" style="color:#8D5646">
                        <img src="https://honda.com.my/img/discover/da_04_bronz.png" alt="Bronze Dealer Award logo">
                        <div class="logo-label">
                            <div class="aname">Bronze Dealer Award</div>
                            <div class="ayear">2024</div>
                        </div>

                    </div>
                    <div class="title">Bronze Dealer</div>
                    <div class="details"><a href="https://honda.com.my/dealers/98">Syarikat Tan Eng Ann Sdn Bhd</a></div>
                </li>

            </ul>
        </div>
    </div>

    <div class="inner-content-section stage-contained awards-list">
        <h2 style="padding-bottom: 20px;">Elite Dealer</h2>
        <ul class="flex three-column">
                    
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/99">SYK RW Motor Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/44">Jimisar Samarahan Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/62">Kemena Auto Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/117">Vermillion Autohaus Sdn Bhd</a>
                </p>
            </li>
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/1">Accord Auto Sdn Bhd</a>
                </p>
            </li>
            
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/25">Elmina Motors Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/96">Syarikat Labuan Automobile Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/79">NJ Autoworld Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/8">Ban Hoe Seng (Auto) Sdn Bhd</a>
                </p>
            </li>
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/129">Yong Ming Motor (Pasir Gudang) Sdn Bhd</a>
                </p>
            </li>          
            <li style="padding: 0px 3%;">
                <p style="text-align:center;">
                    <a href="/dealers/32">Heng Ho Hing Co Sdn Bhd</a>
                </p>
            </li>          
            
            
        </ul>
    </div>

    {{-- hide for now
    <div class="inner-content-section stage-contained awards-list">
        <h2>Quality Dealer</h2>
        <ul class="flex three-column">
            <li>
                @foreach (@$dealer_quality_display[0] as $item)
                    <p><a href="{{url('dealers/'.$item->id)}}">{{$item->name}}</a></p>
                @endforeach
            </li>

            <li>
                @foreach (@$dealer_quality_display[1] as $item)
                    <p><a href="{{url('dealers/'.$item->id)}}">{{$item->name}}</a></p>
                @endforeach
            </li>

            <li>
                @foreach (@$dealer_quality_display[2] as $item)
                    <p><a href="{{url('dealers/'.$item->id)}}">{{$item->name}}</a></p>
                @endforeach
            </li>
        </ul>
    </div>
    --}}

    <!-- div class="awards-gallery">
        <div class="owl-carousel owl-theme">
            @foreach ($imglist as $key=>$item)
                <a class="thumbnail gallery" href="{{$item}}"><img class="img" src="{{$item}}" alt="{{$key+1}}"></a>
            @endforeach
            </a>
        </div>
    </div -->
</section>

</div>

<style>
    .sub-header {letter-spacing: .1em;padding:10px 0;}
    .content-inner .hero-banner { 
        
        /* background-image: url({{versioned_asset('img/discover/da_herobanner.png')}}); */
        /* background-image: url({{versioned_asset('img/discover/dealer_award_2020/da_herobannerv3.jpeg')}}); */
        /* background-image: url('../img/discover/dealer_award_2024/VIS03A_HONDA CEO 2023 PPT_AWARD CAT-v2.jpg'); */
        background-image: url('../img/discover/dealer_award_2025/HONDA CEO 2025 banner.jpg');
        /* background-position-y: center; */
    
     } 
    .awards-logo {position: relative; margin-bottom:10px;}
    .awards-logo .logo-label { position: absolute; top:50%; left:50%; transform: translate(-50%,-40%); width: 100px; }
    .awards-logo .aname { font-size: 12px; font-weight: bold;}
    .awards-logo .ayear { font-size: 13.2px; margin-top:5px;}
    .featherlight-content {background: none;}

    .saiowlnumber {display: inline-block; vertical-align: middle; font-size: 1.7rem;}
    .saiowlnumber span {color: #E32119; border-bottom:3px solid #E32119; display:inline-block; padding-bottom: 5px; min-width: 35px; font-weight: 500; text-align: center;}
    .saiowlnumber .num-total {color: #505759; border-color: #505759;}
</style>

<script>
    var owlinitiated = false;
    var owlinitiated_loop,owl_itemtotal;
    $(document).ready(function(){
        
        

        function owl_changenumdisplay(i,total){
            $('.saiowlnumber .num-cur').html(pad(i,2));
            $('.saiowlnumber .num-total').html(pad(total,2));
            owl_itemtotal = total;
        }

        var owl = $('.awards-gallery .owl-carousel').owlCarousel({
            margin: 10,
            dots: false,
            nav: true,
            navText:["<div class='arrow-red-left'></div>","<div class='arrow-red-right'></div>"],
            responsive: {
                0: { items: 1 },
                640: { items: 3, },
                960: { items: 3, },
                1024: { items: 4, stagePadding: 80,},
                1900: { items: 4, stagePadding: 180,}
            },
            onInitialized: function(event) {
                owl_changenumdisplay(event.item.index+1, event.item.count-event.page.size+1);
            }
        })

        owl.on('changed.owl.carousel,initialized.owl.carousel,resize.owl.carousel', function(event) {
            //console.log(event.page.index, event.page.count, event.page.size)
            owl_changenumdisplay(event.item.index+1, event.item.count-event.page.size+1);
        })

        $('.owl-prev').after('<div class="saiowlnumber noselect"><span class="num-cur">00</span> / <span class="num-total">00</span></div>');
        owl_changenumdisplay(1,owl_itemtotal);

    })
</script>

@stop

