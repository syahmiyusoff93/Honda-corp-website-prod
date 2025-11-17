<?php 
session_start(); 
if( !isset($_SESSION['tk']) )  $_SESSION['tk'] = bin2hex(openssl_random_pseudo_bytes(16));
 
include 'zata_da/loader.index.php'; 

?>
<!DOCTYPE html>
<html lang="en" class="">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NRW6VC6C');</script>
    <!-- End Google Tag Manager -->
    <!-- TikTok Pixel Code Start -->
    <script>
    !function (w, d, t) {
      w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
    var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};ttq.load('CRF8I2BC77UD2MA14E3G');ttq.page();}(window, document, 'ttq');
    </script>
    <!-- TikTok Pixel Code End -->

    <meta charset="UTF-8">
    <title><?php echo $SEO['title'];?></title>
    <meta name="Description" content="<?php echo htmlspecialchars($SEO['description']); ?>">
    <meta name="Keywords" content="<?php echo htmlspecialchars($SEO['keywords']); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($SEO['description']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($SEO['keywords']); ?>">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta name="twitter:card" content="">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" /> 
    <!-- Favicons -->
    <?php 
        //loop of css and js files 
        include_once 'zata_da/genplug/jscss-headloop.php';
    ?>  
<style>
    .pageloader {
        position: fixed;
        z-index: 1000000;
        height: 100vh;
        width: 100vw;
        background-color: var(--clr02);
        color: #fff;
        font-family: var(--font-t2);
        font-size: 120%;
        text-align: center
    }
    .pageloader img {max-height: initial;max-width: 80%}
    .fade-in-loader{-webkit-animation:fade-in 1.2s linear infinite alternate;animation:fade-in 1.2s linear infinite alternate}
    @-webkit-keyframes fade-in{0%{opacity:0}100%{opacity:1}}@keyframes fade-in{0%{opacity:0}100%{opacity:1}}
</style>
</head>

<body class="f <?php echo $dir['clr'];?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRW6VC6C"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
<!--
   <div class="pageloader f f-a-c f-j-c">
       <div class="logo-w wrap">
           <p class="fade-in-loader"><img src="<?php echo $htt[0];?>zata_da/src/default/logoloader.png?p" alt=""></p>
            
       </div>
   </div>
   <script>
    $('html').addClass('fixed');
    $(window).on('load',()=>{
        setTimeout(()=>{
            $('.pageloader').fadeOut(()=>{ 
                if($('.licht').length == 0)
                $('.fixed').removeClass('fixed');
            });
        }, 2000)
    })
    </script>
-->
    <?php $info->frontEndPage($dir['pid'], $_SESSION['query'], $htt, $comp, $dir, $CON);?>
<!--    <div class='scrollTop'><i class='fa fa-sort-up'></i></div>-->
    <div class="foot-res" style="padding: 0;"></div>
    <?php 
        //loop of css and js files
        include_once 'zata_da/genplug/jscss-footloop.php';
    ?>
</body>
</html>