@php

@endphp

@extends('layouts.base')

@section('page-title')
    Locate Us
@stop

@section('content')
<section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('locate-us')}}">LOCATE US</a></li>
                    <li><a href="{{url('customer-service')}}">CUSTOMER SERVICE</a></li>
                    <li><a href="{{url('career')}}">CAREER</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>

<style>
/* overwrite */
    .service-tab-menu {background: #e4e4e4; margin-bottom: 0px;}
    .service-tab-menu ul li a {color: #000;}

/*  Google Trademark  */
#map > div > div > div:nth-child(15) > div {
    transform: translateY(70vh);
}

#map > div > div > div:nth-child(17) > div {
    transform: translateY(70vh);
}

    @media only screen and (max-width: 640px) {
        /* .service-tab-menu {display: none;} */
    }
</style>
</section>


    <section class="locate-us">

        <div id="map" class="map"></div>
        <div class="clearfix"></div>

        <div class="ctas">
            <div class="link cta-gomlk">
                <span>Honda Head Office<br>(Melaka Manufacturing Plant)</span>
            </div>
            <div class="link cta-gopj">
                <span>Honda Sales & Marketing Office</span>
            </div>
        </div>



        <script>
            var loc_pj = {lat:3.117490, lng: 101.636722};
            var loc_mlk = {lat: 2.423076, lng: 102.207146};

            var info_pj =   '<div class="mapwindow">'+
                                '<h3>Honda Sales & Marketing Office</h3>'+
                                '<p>Honda Malaysia Sdn Bhd, P-3-1, Level 3, Pacific Towers Business Hub, Jalan 13/6, Seksyen 13, 46200 Petaling Jaya, Selangor, Malaysia</p>'+
                                '<p><a href="https://maps.google.com/?q='+loc_pj.lat+','+loc_pj.lng+'">Directions</a></p>'+
                            '</div>';

            var info_mlk =   '<div class="mapwindow">'+
                                '<h3>Head Office (Melaka Manufacturing Plant)</h3>'+
                                '<p>Hicom Pegoh Industrial Park, 78000 Alor Gajah, Melaka, Malaysia</p>'+
                                '<p><a href="https://maps.google.com/?q='+loc_mlk.lat+','+loc_mlk.lng+'">Directions</a></p>'+
                            '</div>';

            var map,marker_pj,marker_mlk, infowindow_pj,infowindow_mlk
            // Initialize and add the map
            function initMap() {
              // The map, centered
              map = new google.maps.Map(document.getElementById('map'), {zoom: 15, center: loc_pj, disableDefaultUI: true, zoomControl:true});

              marker_pj = new google.maps.Marker({position: loc_pj, map: map});
              marker_mlk = new google.maps.Marker({position: loc_mlk, map: map});

              infowindow_pj = new google.maps.InfoWindow({ content: info_pj });
              infowindow_mlk = new google.maps.InfoWindow({ content: info_mlk });
            }

            $(document).ready(function(){

                $('.cta-gopj').click(function(){
                    map.setCenter(loc_pj);
                    infowindow_pj.open(map, marker_pj);
                    infowindow_mlk.close();
                    $('.cta-gopj').addClass("active");
                    $('.cta-gomlk').removeClass("active");
                });

                $('.cta-gomlk').click(function(){
                    map.setCenter(loc_mlk);
                    infowindow_mlk.open(map, marker_mlk);
                    infowindow_pj.close();
                    $('.cta-gomlk').addClass("active");
                    $('.cta-gopj').removeClass("active");
                });

                $('.cta-gomlk').trigger('click');

            });
        </script>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFIZDDhBFAH1j3lvDF7OBpxr89HXHN9bE&callback=initMap"></script>


    </section>

    <section>
            <div class="contact-us-footer">
                <div class="contact-us-footer-row">
                    <div class="contact-us-footer-col">
                        <div class="details-content">
                            <img src="{{url('img/contact_us/cust_service/phone.png')}}">
                            <div class="contact-footer-copy">Call Us At</div>
                            <h2 class="left red-font">1800 88 2020</h2>
                            <div>Monday to Friday: 9am - 5pm<br>(Closed during weekends and public holidays)</div>
                        </div>
                    </div>
                    <div class="contact-us-footer-col contact-us-footer-col-custom">
                        <div class="details-content">
                            <img src="{{url('img/contact_us/cust_service/HiP_logo_customer_service_01.png')}}">
                            <div class="contact-footer-copy">24/7 HiP Emergency Assistance</div>
                            <h2 class="left red-font">1800 18 1177</h2>
                            <div>Contact 24/7 HiP Emergency Assistance for your vehicle breakdown and accident assistance services.</div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
    </section>

    <style>

        #map {height: 70vh;;}
        .mapwindow {width:100%; max-width:300px; text-align: left;}
        .mapwindow a {color:red;}

        .ctas .link {cursor: pointer;}
        .ctas {margin: auto;width: 70%;position: absolute;left: 0; right: 0; margin-left: auto;margin-right: auto;bottom: 17px;}
        .link {width: 50%;float: left;text-align: center;height:75px;background-color: white;}
        .link::after {content: url(img/interface/arrow-short-right-red.svg);position: absolute;right: 35px;}
        .cta-gomlk {padding: 19px 10px;}
        .cta-gopj {padding: 30px 10px;}
        .active {background-color: #f1f1f1; color: red;}



            /* contact-us-footer */
            .contact-us-footer-col {float: left;width: 50%;padding: 50px;height: 270px;}
            .contact-us-footer-row:after { content: "";display: table;clear: both;}
            .details-content {margin: auto;width: 75%;}
            .red-font {color:#E01327;}
            .contact-footer-copy {padding: 20px 0px 10px;}

            .faq-details {display: none;}
            .faq-details.active {display: block;}

            .contact-us-footer-col-custom { padding: 32px 50px 50px 50px !important; }
            .contact-us-footer-col-custom .details-content img { max-height: 68px; }
            .contact-us-footer-col-custom .details-content .contact-footer-copy { padding: 6px 0 10px; }

            @media only screen and (max-width: 820px) and (min-width: 600px) {
                .contact-us-footer-col-custom { margin-bottom: 7%; }
            }

            @media only screen and (max-width: 640px) {
               /* contact-us-footer */
                .contact-us-footer {margin-bottom:50px;}
                .contact-us-footer-col {width: 100%; height:unset;}
                .details-content {width: unset;}
                .link::after {right: 20px;}


            .ctas {width: 90%;}
            .link {width: 100%;}

            }
    </style>




@stop

