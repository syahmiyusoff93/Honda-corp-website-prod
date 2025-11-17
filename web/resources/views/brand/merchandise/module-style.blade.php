@php
    $greyshade = ['#282A2F', '#5E6063'];
@endphp
<style>
    section {padding: 50px 20px;}
    section:first-of-type{padding:0}
    section h3, section p, section iframe {margin:auto; max-width: 500px; text-align: center; }
    section>h3 {padding:25px; font-weight: 500;font-size:1.375rem; font-size:1.5rem; letter-spacing:2px; max-width:550px;}
    section p {color:{{ $greyshade[1] }}; line-height:1.8em; margin-bottom:25px;}
    .btn-container {width:100%; text-align: center; padding-bottom:25px;}

    #modelmenu .model-name-inner {margin-top:5px;}

    @media screen and (max-width: 480px) {
        a.prime-cta-black, a.prime-cta-white {width:100%; margin-bottom:10px; line-height:1.5em;}
    }
</style>
