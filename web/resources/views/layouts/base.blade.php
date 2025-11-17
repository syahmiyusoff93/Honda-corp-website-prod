<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, maximum-scale=1.0, user-scalable=no">
    <meta name="sys-gen-en" content="sai=barium">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title', 'The Power of Dreams') | Honda Malaysia</title>
    @yield('page-meta', '')
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NHCJMLM');</script>
    <!-- End Google Tag Manager -->
    <!-- TikTok Pixel Code Start -->
    <script>
    !function (w, d, t) {
      w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
    var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};ttq.load('CRF8I2BC77UD2MA14E3G');ttq.page();}(window, document, 'ttq');
    </script>
    <!-- TikTok Pixel Code End -->
    <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16760589758"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-16760589758'); </script>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '932286008779971'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=932286008779971&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '794330269948308');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=794330269948308&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{versioned_asset('img/icon/honda-favicon.ico')}}" /> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{versioned_asset('img/icon/honda-favicon-v2.ico')}}" />
    {{-- <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{url('css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('css/hamburger.css')}}">
    <link rel="stylesheet" href="{{versioned_asset('css/general.css')}}">
    <link rel="stylesheet" href="{{url('css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{versioned_asset('css/landing.css' )}}">
    <script src="{{url('js/jquery-3.6.0.min.js')}}"></script>
    {!! NoCaptcha::renderJs() !!}
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHCJMLM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @yield('body-top', '')

    @if (session('site_section')=='brand')
        @include('modules.header-brand')
    @else
        @include('modules.header')
    @endif

    <div id="mainstage">
        @yield('content')
    </div>
    <div class="clearfix"></div>

    @yield('body-bottom', '')

    @include('modules.cookie')
    @include('modules.footer')

    <script src="{{url('js/anime.min.js')}}"></script>
    <script src="{{url('js/owl.carousel.js')}}"></script>

    <script src="{{url('js/jquery.detect_swipe.min.js')}}"></script>
    <script src="{{url('js/featherlight.min.js')}}"></script>
    <script src="{{url('js/featherlight.gallery.min.js')}}"></script>

    <script src="{{url('js/lightgallery-all.min.js')}}"></script>
    <script src="{{url('js/jquery.mousewheel.min.js')}}"></script>

    <script src="{{versioned_asset('js/hondaweb_global.js')}}"></script>

    <script src="{{asset('js/lazysizes.min.js')}}" async=""></script>
    <script src="{{versioned_asset('js/hondaweb_global_footer.js')}}"></script>
</body>
</html>
