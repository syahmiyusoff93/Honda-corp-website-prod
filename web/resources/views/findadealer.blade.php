@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');
    $dealerannouncement = false;

    $data = file_get_contents($APIPATH.'dealers_all.json', false, $honda_api_context);
    $data = json_decode($data);
    $dealer_list = $data->payload;

    $search_radius_km = 50;
    $found_suffix = " DEALERS FOUND.";

    function __notempty($str){

        if(!empty($str) && strtoupper($str) != "NULL" && strtoupper($str) != 'HTTP://NULL') return true;

        return false;
    }

@endphp

@extends('layouts.base')

@section('page-title')
    Find a Dealer
@stop

@section('content')

<style>
    #dealerlist > .result-container > .expand-content > .details:not(:last-child)  > p > span,
    #dealerlist > .result-container > .expand-content > .details:not(:last-child)  > p > br {
        display: none;
    }

    #map > div > div > div:nth-child(15) > div {
        position: relative;
        transform: translateY(88vh);
    }

    #map > div > div > div:nth-child(17) > div {
        transform: translateY(88vh);
    }

    @media screen and (max-width: 1440px) and (min-width: 1439px) {
        #map > div > div > div:nth-child(15) > div {
            position: relative;
            transform: translateY(91vh);
        }

        #map > div > div > div:nth-child(17) > div {
            transform: translateY(91vh);
        }        
    }

    @media screen and (min-width: 1441px) {
        #map > div > div > div:nth-child(15) > div {
            position: relative;
            transform: translateY(93vh);
        }

        #map > div > div > div:nth-child(17) > div {
            transform: translateY(93vh);
        }
    }
    
</style>

{{-- Load Google Maps API asynchronously --}}
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&loading=async&libraries=marker"></script>

<script>
    var user_coords = { lat: 3.1173076, lng: 101.6344652 }; // KUL default

    recalculateEverything = function(){};

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          showPosition,
          handleLocationError,
          { timeout: 10000, maximumAge: 300000 }
        );
      } else {
        console.log('Geolocation is not supported by this browser.');
      }
    }

    function showPosition(position) {
        user_coords = { lat: position.coords.latitude, lng: position.coords.longitude };
        // If map is already initialised, update the user marker and recenter
        try {
            if (typeof map !== 'undefined' && map && map_initiated) {
                if (usermarker && typeof usermarker === 'object') {
                    usermarker.position = user_coords;
                    usermarker.map = map;
                } else {
                    usermarker = addMarker(user_coords, map, ' ', '', true);
                }
                map.setCenter(user_coords);
                map.setZoom(14);
            }
        } catch (e) {
            console.warn('Could not recenter map on location:', e);
        }
    }
    
    function handleLocationError(error) {
      switch(error.code) {
        case error.PERMISSION_DENIED:
          console.warn('User denied geolocation permission. Using default location (KL).');
          break;
        case error.POSITION_UNAVAILABLE:
          console.warn('Location information unavailable. Using default location (KL).');
          break;
        case error.TIMEOUT:
          console.warn('Location request timed out. Using default location (KL).');
          break;
        default:
          console.warn('An unknown error occurred. Using default location (KL).');
          break;
      }
      // user_coords already set to KL default, no need to change
    }

    //This function takes in latitude and longitude of two location and returns the distance between them as directline (in km)
    function calcCrow(lat1, lon1, lat2, lon2){
      var R = 6371; // km
      var dLat = toRad(lat2-lat1);
      var dLon = toRad(lon2-lon1);
      var lat1 = toRad(lat1);
      var lat2 = toRad(lat2);

      var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      var d = R * c;
      return d;
    }

    // Converts numeric degrees to radians
    function toRad(Value){
        return Value * Math.PI / 180;
    }
    getLocation();
</script>

<script>
    var markerlist = [];
    var usermarker = null;
    var map, geocoder, dealers, listscrolloffset,mlabel;
    var dealer_id = {{empty($dealer_id) ? 'null' : $dealer_id }};
    var map_initiated = false;
    var showalldealers = true;
    var searchBounds = null;

    function initialize() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: user_coords,
        mapId: 'HONDA_DEALER_MAP' // Required for AdvancedMarkerElement
        });

        // Add a marker at the center of the map.
        usermarker = addMarker(user_coords, map, ' ', '', true);

        @foreach ($dealer_list as $key=>$item)
            markerlist[{{$item->id}}] = addMarker({lat:{{$item->gps->lat}}, lng:{{$item->gps->long}} }, map, ''+{{$item->id}}, `{{$item->address}}`, false);
        @endforeach
        map_initiated = true;

        recalculateEverything(); // enable this to automatically look for nearby dealership upon page landing
    }

    function scrollDealerListTo(div){
        var target = div.data('ypos');
        $('.result-container, .result-title').removeClass('active');

        var scrolltarget = $('html,body');
        var scrollpos = div.offset().top - $('#mainmenu').outerHeight();
        if($(document).outerWidth()>768){
            scrolltarget = $('.search-result');
            var scrollpos = div.offset().top-$('#dealerlist').offset().top;
        }
        scrolltarget.stop().animate({scrollTop:scrollpos}, 500, 'linear', function(){
            div.find('.intro-title').trigger('click');
        });
    }

    // Adds a marker to the map.
    function addMarker(location, map, label, address, isUserMarker) {
        // Create custom marker content
        const markerContent = document.createElement('div');
        markerContent.style.position = 'relative';
        markerContent.style.cursor = 'pointer';
        
        if (isUserMarker) {
            // User location marker
            const img = document.createElement('img');
            img.src = '{{versioned_asset('img/interface/map-locateme2.png')}}';
            img.style.width = '40px';
            img.style.height = '40px';
            markerContent.appendChild(img);
        } else {
            // Dealer marker with number label
            const img = document.createElement('img');
            img.src = '{{versioned_asset('img/interface/map-mark-g2.png')}}';
            img.style.width = '40px';
            img.style.height = '52px';
            markerContent.appendChild(img);
            
            if (label && label.trim()) {
                const labelDiv = document.createElement('div');
                labelDiv.textContent = label;
                labelDiv.style.position = 'absolute';
                labelDiv.style.top = '10px';
                labelDiv.style.left = '50%';
                labelDiv.style.transform = 'translateX(-50%)';
                labelDiv.style.color = '#fff';
                labelDiv.style.fontSize = '14px';
                labelDiv.style.fontFamily = 'Poppins';
                labelDiv.style.fontWeight = 'bold';
                labelDiv.style.textAlign = 'center';
                markerContent.appendChild(labelDiv);
            }
        }
        
        const marker = new google.maps.marker.AdvancedMarkerElement({
            position: location,
            map: map,
            content: markerContent,
            title: address || ''
        });
        
        // Store custom properties
        marker.customLabel = label;
        marker.address = address;
        marker.isUserMarker = isUserMarker;
        marker.markerContent = markerContent;
        
        if (!isUserMarker) {
            marker.addListener('click', function() {
                map.setCenter(marker.position);
                scrollDealerListTo($('.rdealer'+label));
            });
        }
        
        return marker;
    }

    function locateDealerOnMap(did){
        hideAllMarker();
        showMarker(markerlist[did]);
        $('body').css('opacity', 0.2);
        map.setCenter(markerlist[did].position);
        $('body').css('opacity',1);
    }

    function codeAddress() {
        var address = document.getElementById('address').value;
        var zoomLevel = 12;
        
        // First, search local dealer database
        var foundLocalDealer = searchLocalDealers(address);
        
        if (foundLocalDealer) {
            // Local dealer found, pin to that dealer
            usermarker.map = null; // Hide user marker
            user_coords = {lat: foundLocalDealer.lat, lng: foundLocalDealer.lng};
            
            map.setCenter(user_coords);
            map.setZoom(15); // Closer zoom for specific dealer
            
            // Create new user marker at dealer location
            const markerContent = document.createElement('div');
            const img = document.createElement('img');
            img.src = '{{versioned_asset('img/interface/map-locateme2.png')}}';
            img.style.width = '40px';
            img.style.height = '40px';
            markerContent.appendChild(img);
            
            usermarker = new google.maps.marker.AdvancedMarkerElement({
                position: user_coords,
                map: map,
                content: markerContent
            });
            usermarker.isUserMarker = true;
            
            searchBounds = null; // Clear bounds for local search
            
            recalculateEverything();
            ga('send', 'event', 'find_a_dealer', 'dealer_search','local_dealer', address);
        } else {
            // No local dealer found, use Google Maps geocoding
            geocoder.geocode( { 'address': address+', malaysia'}, function(results, status) {
                if (status == 'OK') {
                    usermarker.map = null; // Hide user marker
                    var loc = results[0].geometry.location;
                    user_coords = {lat: loc.lat(), lng:loc.lng()};

                    searchBounds = results[0].geometry.bounds;
                    if (searchBounds) {
                        let center = searchBounds.getCenter();
                        map.fitBounds(searchBounds);
                        map.setCenter(center)
                    }
                    else {
                        map.setCenter(user_coords);
                        map.setZoom(zoomLevel);
                    }

                    // Create new user marker
                    const markerContent = document.createElement('div');
                    const img = document.createElement('img');
                    img.src = '{{versioned_asset('img/interface/map-locateme2.png')}}';
                    img.style.width = '40px';
                    img.style.height = '40px';
                    markerContent.appendChild(img);
                    
                    usermarker = new google.maps.marker.AdvancedMarkerElement({
                        position: results[0].geometry.location,
                        map: map,
                        content: markerContent
                    });
                    usermarker.isUserMarker = true;
                    
                    recalculateEverything();
                } else {
                    $('#address').addClass('error');
                    $('.found-count').html('Location not found.');
                }
            });
            ga('send', 'event', 'find_a_dealer', 'dealer_search','location', address);
        }
    }
    
    function searchLocalDealers(searchTerm) {
        searchTerm = searchTerm.toLowerCase().trim();
        var dealers = @json($dealer_list);
        var bestMatch = null;
        var highestScore = 0;
        
        dealers.forEach(function(dealer) {
            var dealerName = dealer.name.toLowerCase();
            var dealerAddress = dealer.address.toLowerCase();
            var score = 0;
            
            // Exact match in name (highest priority)
            if (dealerName.includes(searchTerm)) {
                score = 100;
            }
            // Partial word match in name
            else {
                var searchWords = searchTerm.split(' ');
                var nameWords = dealerName.split(' ');
                searchWords.forEach(function(searchWord) {
                    if (searchWord.length > 2) { // Only match words longer than 2 chars
                        nameWords.forEach(function(nameWord) {
                            if (nameWord.includes(searchWord)) {
                                score += 50;
                            }
                        });
                    }
                });
            }
            
            // Match in address (lower priority)
            if (dealerAddress.includes(searchTerm)) {
                score += 30;
            }
            
            // Keep track of best match
            if (score > highestScore && score >= 50) { // Minimum threshold of 50
                highestScore = score;
                bestMatch = {
                    id: dealer.id,
                    name: dealer.name,
                    lat: parseFloat(dealer.gps.lat),
                    lng: parseFloat(dealer.gps.long)
                };
            }
        });
        
        return bestMatch;
    }

    // Initialize Google Maps - called when API loads
    function initMap() {
        initialize();
    }
</script>

<script language="javascript">
    var prev_search_msg = '&nbsp;';

    $(document).ready(function(){
        var annactive = true;

        @if ( $dealerannouncement == true )

           $("#announcementbtn").on("click", function() {
                if (annactive) {
                     annactive = false;
                     //$("#announcementbtn").addClass("anninactive")
                     $(".announcement").slideUp();
                }
                else {
                    annactive  =true;
                   // $("#announcementbtn").removeClass("anninactive")
                    $(".announcement").slideDown();
                }

            })

        @endif  


        listscrolloffset = $('.search-result').offset().top
        function recalculateypos(){
            $('.result-container').each(function(){
                $(this).data('ypos', $(this).offset().top);
            });
        }

        $('#lookup').submit(function(e){
            e.preventDefault();

            var address = document.getElementById('address').value;
            $('#address').removeClass('error');
            if(address.length>3){
                $('.found-count').html('Looking...');
                codeAddress();
            } else {
                $('#address').addClass('error');
            }
        });
        $('.search-btn').click(function(){
            $('#lookup').trigger('submit');
        })
        //
        var filterbuttonclickcatcher = 0;

        $(".radio p").click(function(){
            // this to address the weird double click action
            filterbuttonclickcatcher++
            if(filterbuttonclickcatcher%2==0){
                return false;
            }
            // end weird double click checking

            var filtercrit = [];
            var filterpassed = 0;
            var resultcount = 0;
            $('.radio input').each(function(){
                if($(this).is(':checked')){
                    filtercrit.push($(this).val())
                }
            })

            if(filtercrit.length==0){
                // show all, no filter
                $('.result-container').each(function(){
                    if($(this).data('isfiltered')==1){
                        $(this).show();
                        resultcount++;
                    }
                })
                showAllMarker();
                $('.found-count').html(prev_search_msg);
                recalculateypos();
                return true;
            }

            // hide everything
            $('.result-container').hide();
            hideAllMarker();

            // check each dealer container
            $('.result-container').each(function(){
                filterpassed = 0;
                var ddiv = $(this);

                // check if dealer met all filtered criteria
                filtercrit.forEach(function(item, i){
                    if(ddiv.hasClass('sc-'+item+'1')){
                        filterpassed++;
                    }
                })
                // if it is, show them in result
                if(filterpassed==filtercrit.length && ddiv.data('isfiltered')==1){
                    ddiv.show();
                    var key = ddiv.data('dkey');
                    //markerlist[key].setOptions({visible:true});
                    showMarker(markerlist[key]);
                    resultcount++;
                }
            });
            $('.found-count').html(resultcount+ ' dealers found.');
            recalculateypos();
            //$('.btn-filter').trigger('click');
        });

        $('.locate-dealer').click(function(){
            if($(this).hasClass('active') || true){
                var did = $(this).data('dkey');
                locateDealerOnMap(did);
            }
        })

        recalculateEverything = function(){
            // calculate each dealership from user locations
            var searchRadiusKM = {{$search_radius_km}};
            //
            hideAllMarker();
            var closestcount = 0;

            $('.result-container').each(function(){
                var distance = calcCrow(user_coords.lat, user_coords.lng, $(this).data('gpslat'), $(this).data('gpslong'));
                var dist = distance.toFixed(1);
                $(this).data('distance', dist);
                $(this).find('.distance').html(dist+' km');
                //
                var did = $(this).data('dkey');
                
                // Search by location within boundaries (Min inaccuracy)
                if (searchBounds && searchBounds.contains(markerlist[did].position) == true) {
                    closestcount++;
                    $(this).show().data('isfiltered', 1);
                    showMarker(markerlist[did]);
                } else {
                    if (distance < searchRadiusKM || showalldealers) {
                        closestcount++;
                        $(this).show().data('isfiltered', 1);
                        showMarker(markerlist[did]);
                    } else {
                        $(this).hide().data('isfiltered', 0);
                    }
                }

                // Search by address keywords (Very inaccurate)
                // var searchAddr = document.getElementById('address').value;
                // let address = markerlist[did].address;
                // if (address.toLowerCase().includes(searchAddr.toLowerCase())) {
                //     closestcount++;
                //     $(this).show().data('isfiltered', 1);
                //     showMarker(markerlist[did]);
                // } else {
                //     $(this).hide().data('isfiltered', 0);
                // }

                // Search by location with distance (Inaccurate in certain level of location like state)
                // if (distance < searchRadiusKM || showalldealers){
                //     closestcount++;
                //     $(this).show().data('isfiltered', 1);
                //     showMarker(markerlist[did]);
                // } else {
                //     $(this).hide().data('isfiltered', 0);
                // }
            });
            $('.found-count').html(closestcount+' dealers found.');
            prev_search_msg = $('.found-count').html();
            $('.reset-link').show();
            // sort dealers based on user location
            $(".result-container").sort(function(a,b){
                return parseFloat($(b).data('distance')) < parseFloat($(a).data('distance')) ? 1 : -1;
            }).appendTo('#dealerlist'); // append again to the list

            showalldealers = false;

            recalculateypos();
        }

        hideAllMarker = function(){
            $.each(markerlist, function(k,v){
                if(v!=null && !v.isUserMarker){
                    // Change marker icon to greyed version
                    const img = v.markerContent.querySelector('img');
                    if (img) {
                        img.src = '{{versioned_asset('img/interface/map-mark-g2-greyed.png')}}';
                    }
                }
            })
        }
        showAllMarker = function(){
            $.each(markerlist, function(k,v){
                if(v!=null){
                    showMarker(v)
                }
            })
        }
        var markerzindex = 1000;
        showMarker = function(marker){
            if (marker && !marker.isUserMarker) {
                markerzindex++;
                marker.zIndex = markerzindex;
                // Change marker icon to active version
                const img = marker.markerContent.querySelector('img');
                if (img) {
                    img.src = '{{versioned_asset('img/interface/map-mark-g2.png')}}';
                }
            }
        }

        showResultBar = function(){
            $('.total-result').addClass('shown');
        }

        hideResultBar = function(){
            $('.total-result').removeClass('shown');
        }


        // DEEPLINK TO SPESIFIC DEALER
        if(dealer_id!=null){
            var jumptoinit = setInterval(function(){
                if(map_initiated){

                    new google.maps.event.trigger( markerlist[dealer_id], 'click' );
                    //scrollDealerListTo($('.rdealer'+dealer_id));

                    $('.rdealer'+dealer_id).show();
                    clearInterval(jumptoinit);
                }
            },200);
        }

        // Locate-me button handler: request geolocation and centre map on the user
        $('#locateMeBtn').on('click', function(e){
            e.preventDefault();
            // Trigger browser geolocation
            getLocation();

            // Wait until map is initialised and user_coords is set, then centre
            var tries = 0;
            var wait = setInterval(function(){
                tries++;
                if (typeof map !== 'undefined' && map && map_initiated) {
                    try {
                        map.setCenter(user_coords);
                        map.setZoom(14);
                        if(usermarker && typeof usermarker === 'object'){
                            usermarker.position = user_coords;
                            usermarker.map = map;
                        } else {
                            usermarker = addMarker(user_coords, map, ' ', '', true);
                        }
                    } catch(err) {
                        console.warn('Could not centre map on user:', err);
                    }
                    clearInterval(wait);
                } else if (tries > 30) {
                    clearInterval(wait);
                }
            }, 200);
        });
    })
</script>

<section class="find-a-dealer">
    <div class="info-container">
        <div class="search-container">
            <div class="total-result"><span class="found-count">&nbsp;</span>
                <a class="reset-link" href="javascript:location.reload()">
                    Reset <img class="refresh-btn" src="{{versioned_asset('img/interface/map-refresh.svg')}}" alt="" srcset="">
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="input-box">
                <form id="lookup">
                    <input id="address" type="text" name="" class="input-text" placeholder="Enter location or postcode">

                    <img class="search-btn" src="{{versioned_asset('img/interface/map-search.svg')}}"  alt="" srcset="">
                    
                    <img id="locateMeBtn" class="locate-me-btn" src="{{versioned_asset('img/interface/icon-area2x.png')}}" alt="Locate me">
                </form>
                <div style="text-align: right">

                </div>
            </div>

            <div class="filter-container">
                <div class="expand-content radio">
                    <p data-dservice="showroom">
                        <input id="rshowroom" type="radio" value="showroom" name="radio-group1">
                        <label for="rshowroom">Showroom</label>
                    </p>
                    <p data-dservice="service">
                        <input id="rservicecentre" type="radio" value="service" name="radio-group2">
                        <label for="rservicecentre">Service Centre & Spare Parts</label>
                    </p>
                    <p data-dservice="paint">
                        <input id="rbodypaint" type="radio" value="paint" name="radio-group3">
                        <label for="rbodypaint">Body & Paint Centre</label>
                    </p>
                    <p data-dservice="typeR">
                        <input id="rtypeR" type="radio" value="typeR" name="radio-group5">
                        <label for="rtypeR">Type R Dealer</label>
                    </p>
                    <p data-dservice="mobile">
                        <input id="rmobile" type="radio" value="mobile" name="radio-group4">
                        <label for="rmobile">Mobile Service</label>
                    </p>
                    <p data-dservice="ev">
                        <input id="rev" type="radio" value="ev" name="radio-group6">
                        <label for="rev">EV Dealer</label>
                    </p>
                </div>
            </div>
            <div class="m-total-result"><span class="found-count">&nbsp;</span>
                <a class="reset-link" href="javascript:location.reload()">
                    Reset <img class="refresh-btn" src="{{versioned_asset('img/interface/map-refresh.svg')}}" alt="" srcset="">
                </a>
                <div class="clearfix"></div>
            </div>
        </div>

       
         @if ( $dealerannouncement == true )

             <div id="dealerannouncement" style="padding: 20px 20px 0px;color: red;font-weight: normal;text-align: left;font-style: normal;">
                <h3 style="font-weight: 500;margin: 0px 0px 10px;font-size: 0.88rem;">Announcement</h3>
                <div class="filter-container ann active" style="position: absolute; float: left; top: 10px;right: 20px;">
                    <div class="btn-filter intro-title more active">
                        <div class="button" id="announcementbtn"></div>
                    </div>
                    </div>

                <div class="announcement" style="overflow: hidden;">
                    <p style="letter-spacing: .02em;font-size: 0.8125rem;font-weight: 400;line-height: 1.3125rem;margin: 0px 0px 20px;">
                        Kindly be informed that Honda operations at Damansara will be under Sri Utama One Auto Sdn Bhd tentatively from August 2021 subject to MCO restrictions. We apologise for any inconvenience caused and thank you for your continuous&nbsp;support.
                    </p>
                </div>
             </div>

         @endif
        

        
        
        <div class="search-result table-scroll">
            <div id="dealerlist" class="body-half-screen">

                @php
                    foreach ($dealer_list as $key => $value) {

                        $filterclass = ' sc-showroom'.$value->is_showroom;
                        $filterclass .= ' sc-service'.$value->is_service;
                        $filterclass .= ' sc-parts'.$value->is_sparepart;
                        $filterclass .= ' sc-paint'.$value->is_bodypaint;
                        $filterclassMobile = 'sc-mobile0';
                        $filterclassTypeR = 'sc-typeR0';
                        $filterclasseV = 'sc-ev0';

                        $weblink = __notempty(@$value->weblink) ? '<li><a href="'.$value->weblink.'" target="_blank">Website</a></li>' : '';
                        $fblink = __notempty(@$value->fblink) ? '<li><a href="'.$value->fblink.'" target="_blank">Facebook</a></li>' : '';

                        $awardimg = '';
                        $mobileServiceImg = '';
                        $typeRImg = '';

                        $alist = explode(',',$value->awards);
                        foreach ($alist as $kk => $aa) {
                            switch(strtolower(trim($aa))){
                                case 'top':
                                case 'gold':
                                case 'silver':
                                case 'bronze':
                                    $awardimg .= '<a href="'.url('discover/dealer-awards').'"><img src="'.versioned_asset('img/discover/da_generic_top.png').'"></a>';
                                    break;
                                case 'elite':
                                case 'quality':
                                    $awardimg .= '<a href="'.url('discover/dealer-awards').'"><img src="'.versioned_asset('img/discover/da_generic_achiever.png').'"></a>';
                                    break;
                                case 'sport':
                                case 'sports':
                                    // $awardimg .= '<div class="sport-dealer">Sports Dealership</div>';
                                    $awardimg .= '';
                                    break;
                                case 'mobile':
                                    $filterclassMobile = 'sc-mobile1';
                                    $mobileServiceImg .= '<div class="logo-list"><img src="'.versioned_asset('img/discover/mobile-service-icon.svg').'"></div>';
                                    break;
                                case 'ev':
                                    $filterclasseV = 'sc-ev1';
                                    break;
                            }
                        }

                        if(in_array("typeR", $alist)){
                            $filterclassTypeR = 'sc-typeR1';
                            $typeRImg .= '<div class="logo-list"><img style="width: 147px;" src="'.versioned_asset('img/discover/type-r.svg').'"></div>';
                        }

                        if(!empty($awardimg)){
                            $awardimg = '<div class="logo-list">'.$awardimg.'</div>';
                        }

                        echo '
                            <div class="result-container rdealer'.$value->id.' '.$filterclass.' '.$filterclassMobile.' '.$filterclassTypeR.' '.$filterclasseV.' locate-dealer" data-dkey="'.$value->id.'" data-gpslat="'.$value->gps->lat.'" data-gpslong="'.$value->gps->long.'" data-isFiltered="1">
                                <div class="result-title intro-title more">
                                    <div class="number"><div style="margin-top:-2px;">'.$value->id.'</div></div>
                                    <div class="location-details">
                                        <div class="name">'.$value->name.'</div>
                                        <div class="distance">Calculating distance...</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="expand-content" style="display:none;">
                                    '.$awardimg.'
                                    <div class="details">

                                        <p>'.@$value->special_notice.''.$value->address.'</p>
                                    </div>
                                    <ul class="btn-container">

                                        <li><a href="https://maps.google.com/?q='.$value->gps->lat.','.$value->gps->long.'" target="_blank">Direction</a></li>
                                        '.$weblink.''.$fblink.'
                                    </ul>
                                    <div class="details">
                                        '. (__notempty(@$value->sales_copy) ? '<p>'.$value->sales_copy.'</p>': '') . '
                                        '. (__notempty(@$value->showroom_copy) ? '<p>'.$value->showroom_copy.'</p>': '') . '
                                        '. (__notempty(@$value->bodypaint_copy) ? '<p>'.$value->bodypaint_copy.'</p>': '') . '
                                        <div style="display: flex;justify-content:space-between;align-items: center;">
                                            '. $mobileServiceImg . '
                                            '. $typeRImg . '
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                @endphp

            </div>
        </div><!-- end search-result-->
    </div>

    <div id="map" class="map">
        <div>
            <div style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" title="Open this area in Google Maps (opens a new window)" aria-label="Open this area in Google Maps (opens a new window)" href="https://maps.google.com/maps?ll=3.136017,101.679153&amp;z=10&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3" style="display: inline;"><div style="width: 66px; height: 26px;"><img alt="Google" src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2069%2029%22%3E%3Cg%20opacity%3D%22.3%22%20fill%3D%22%23000%22%20stroke%3D%22%23000%22%20stroke-width%3D%221.5%22%3E%3Cpath%20d%3D%22M17.4706%207.33616L18.0118%206.79504%2017.4599%206.26493C16.0963%204.95519%2014.2582%203.94522%2011.7008%203.94522c-4.613699999999999%200-8.50262%203.7551699999999997-8.50262%208.395779999999998C3.19818%2016.9817%207.0871%2020.7368%2011.7008%2020.7368%2014.1712%2020.7368%2016.0773%2019.918%2017.574%2018.3689%2019.1435%2016.796%2019.5956%2014.6326%2019.5956%2012.957%2019.5956%2012.4338%2019.5516%2011.9316%2019.4661%2011.5041L19.3455%2010.9012H10.9508V14.4954H15.7809C15.6085%2015.092%2015.3488%2015.524%2015.0318%2015.8415%2014.403%2016.4629%2013.4495%2017.1509%2011.7008%2017.1509%209.04835%2017.1509%206.96482%2015.0197%206.96482%2012.341%206.96482%209.66239%209.04835%207.53119%2011.7008%207.53119%2013.137%207.53119%2014.176%208.09189%2014.9578%208.82348L15.4876%209.31922%2016.0006%208.80619%2017.4706%207.33616z%22/%3E%3Cpath%20d%3D%22M24.8656%2020.7286C27.9546%2020.7286%2030.4692%2018.3094%2030.4692%2015.0594%2030.4692%2011.7913%2027.953%209.39009%2024.8656%209.39009%2021.7783%209.39009%2019.2621%2011.7913%2019.2621%2015.0594c0%203.25%202.514499999999998%205.6692%205.6035%205.6692zM24.8656%2012.8282C25.8796%2012.8282%2026.8422%2013.6652%2026.8422%2015.0594%2026.8422%2016.4399%2025.8769%2017.2905%2024.8656%2017.2905%2023.8557%2017.2905%2022.8891%2016.4331%2022.8891%2015.0594%2022.8891%2013.672%2023.853%2012.8282%2024.8656%2012.8282z%22/%3E%3Cpath%20d%3D%22M35.7511%2017.2905v0H35.7469C34.737%2017.2905%2033.7703%2016.4331%2033.7703%2015.0594%2033.7703%2013.672%2034.7343%2012.8282%2035.7469%2012.8282%2036.7608%2012.8282%2037.7234%2013.6652%2037.7234%2015.0594%2037.7234%2016.4439%2036.7554%2017.2961%2035.7511%2017.2905zM35.7387%2020.7286C38.8277%2020.7286%2041.3422%2018.3094%2041.3422%2015.0594%2041.3422%2011.7913%2038.826%209.39009%2035.7387%209.39009%2032.6513%209.39009%2030.1351%2011.7913%2030.1351%2015.0594%2030.1351%2018.3102%2032.6587%2020.7286%2035.7387%2020.7286z%22/%3E%3Cpath%20d%3D%22M51.953%2010.4357V9.68573H48.3999V9.80826C47.8499%209.54648%2047.1977%209.38187%2046.4808%209.38187%2043.5971%209.38187%2041.0168%2011.8998%2041.0168%2015.0758%2041.0168%2017.2027%2042.1808%2019.0237%2043.8201%2019.9895L43.7543%2020.0168%2041.8737%2020.797%2041.1808%2021.0844%2041.4684%2021.7772C42.0912%2023.2776%2043.746%2025.1469%2046.5219%2025.1469%2047.9324%2025.1469%2049.3089%2024.7324%2050.3359%2023.7376%2051.3691%2022.7367%2051.953%2021.2411%2051.953%2019.2723v-8.8366zm-7.2194%209.9844L44.7334%2020.4196C45.2886%2020.6201%2045.878%2020.7286%2046.4808%2020.7286%2047.1616%2020.7286%2047.7866%2020.5819%2048.3218%2020.3395%2048.2342%2020.7286%2048.0801%2021.0105%2047.8966%2021.2077%2047.6154%2021.5099%2047.1764%2021.7088%2046.5219%2021.7088%2045.61%2021.7088%2045.0018%2021.0612%2044.7336%2020.4201zM46.6697%2012.8282C47.6419%2012.8282%2048.5477%2013.6765%2048.5477%2015.084%2048.5477%2016.4636%2047.6521%2017.2987%2046.6697%2017.2987%2045.6269%2017.2987%2044.6767%2016.4249%2044.6767%2015.084%2044.6767%2013.7086%2045.6362%2012.8282%2046.6697%2012.8282zM55.7387%205.22081v-.75H52.0788V20.4412H55.7387V5.22081z%22/%3E%3Cpath%20d%3D%22M63.9128%2016.0614L63.2945%2015.6492%2062.8766%2016.2637C62.4204%2016.9346%2061.8664%2017.3069%2061.0741%2017.3069%2060.6435%2017.3069%2060.3146%2017.2088%2060.0544%2017.0447%2059.9844%2017.0006%2059.9161%2016.9496%2059.8498%2016.8911L65.5497%2014.5286%2066.2322%2014.2456%2065.9596%2013.5589%2065.7406%2013.0075C65.2878%2011.8%2063.8507%209.39832%2060.8278%209.39832%2057.8445%209.39832%2055.5034%2011.7619%2055.5034%2015.0676%2055.5034%2018.2151%2057.8256%2020.7369%2061.0659%2020.7369%2063.6702%2020.7369%2065.177%2019.1378%2065.7942%2018.2213L66.2152%2017.5963%2065.5882%2017.1783%2063.9128%2016.0614zM61.3461%2012.8511L59.4108%2013.6526C59.7903%2013.0783%2060.4215%2012.7954%2060.9017%2012.7954%2061.067%2012.7954%2061.2153%2012.8161%2061.3461%2012.8511z%22/%3E%3C/g%3E%3Cpath%20d%3D%22M11.7008%2019.9868C7.48776%2019.9868%203.94818%2016.554%203.94818%2012.341%203.94818%208.12803%207.48776%204.69522%2011.7008%204.69522%2014.0331%204.69522%2015.692%205.60681%2016.9403%206.80583L15.4703%208.27586C14.5751%207.43819%2013.3597%206.78119%2011.7008%206.78119%208.62108%206.78119%206.21482%209.26135%206.21482%2012.341%206.21482%2015.4207%208.62108%2017.9009%2011.7008%2017.9009%2013.6964%2017.9009%2014.8297%2017.0961%2015.5606%2016.3734%2016.1601%2015.7738%2016.5461%2014.9197%2016.6939%2013.7454h-4.9931V11.6512h7.0298C18.8045%2012.0207%2018.8456%2012.4724%2018.8456%2012.957%2018.8456%2014.5255%2018.4186%2016.4637%2017.0389%2017.8434%2015.692%2019.2395%2013.9838%2019.9868%2011.7008%2019.9868zM29.7192%2015.0594C29.7192%2017.8927%2027.5429%2019.9786%2024.8656%2019.9786%2022.1884%2019.9786%2020.0121%2017.8927%2020.0121%2015.0594%2020.0121%2012.2096%2022.1884%2010.1401%2024.8656%2010.1401%2027.5429%2010.1401%2029.7192%2012.2096%2029.7192%2015.0594zM27.5922%2015.0594C27.5922%2013.2855%2026.3274%2012.0782%2024.8656%2012.0782S22.1391%2013.2937%2022.1391%2015.0594C22.1391%2016.8086%2023.4038%2018.0405%2024.8656%2018.0405S27.5922%2016.8168%2027.5922%2015.0594zM40.5922%2015.0594C40.5922%2017.8927%2038.4159%2019.9786%2035.7387%2019.9786%2033.0696%2019.9786%2030.8851%2017.8927%2030.8851%2015.0594%2030.8851%2012.2096%2033.0614%2010.1401%2035.7387%2010.1401%2038.4159%2010.1401%2040.5922%2012.2096%2040.5922%2015.0594zM38.4734%2015.0594C38.4734%2013.2855%2037.2087%2012.0782%2035.7469%2012.0782%2034.2851%2012.0782%2033.0203%2013.2937%2033.0203%2015.0594%2033.0203%2016.8086%2034.2851%2018.0405%2035.7469%2018.0405%2037.2087%2018.0487%2038.4734%2016.8168%2038.4734%2015.0594zM51.203%2010.4357v8.8366C51.203%2022.9105%2049.0595%2024.3969%2046.5219%2024.3969%2044.132%2024.3969%2042.7031%2022.7955%2042.161%2021.4897L44.0417%2020.7095C44.3784%2021.5143%2045.1997%2022.4588%2046.5219%2022.4588%2048.1479%2022.4588%2049.1499%2021.4487%2049.1499%2019.568V18.8617H49.0759C48.5914%2019.4612%2047.6552%2019.9786%2046.4808%2019.9786%2044.0171%2019.9786%2041.7668%2017.8352%2041.7668%2015.0758%2041.7668%2012.3%2044.0253%2010.1319%2046.4808%2010.1319%2047.6552%2010.1319%2048.5914%2010.6575%2049.0759%2011.2323H49.1499V10.4357H51.203zM49.2977%2015.084C49.2977%2013.3512%2048.1397%2012.0782%2046.6697%2012.0782%2045.175%2012.0782%2043.9267%2013.3429%2043.9267%2015.084%2043.9267%2016.8004%2045.175%2018.0487%2046.6697%2018.0487%2048.1397%2018.0487%2049.2977%2016.8004%2049.2977%2015.084zM54.9887%205.22081V19.6912H52.8288V5.22081H54.9887zM63.4968%2016.6854L65.1722%2017.8023C64.6301%2018.6072%2063.3244%2019.9869%2061.0659%2019.9869%2058.2655%2019.9869%2056.2534%2017.827%2056.2534%2015.0676%2056.2534%2012.1439%2058.2901%2010.1483%2060.8278%2010.1483%2063.3818%2010.1483%2064.6301%2012.1768%2065.0408%2013.2773L65.2625%2013.8357%2058.6843%2016.5623C59.1853%2017.5478%2059.9737%2018.0569%2061.0741%2018.0569%2062.1746%2018.0569%2062.9384%2017.5067%2063.4968%2016.6854zM58.3312%2014.9115L62.7331%2013.0884C62.4867%2012.4724%2061.764%2012.0454%2060.9017%2012.0454%2059.8012%2012.0454%2058.2737%2013.0145%2058.3312%2014.9115z%22%20fill%3D%22%23fff%22/%3E%3C/svg%3E" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
            </div>
                </a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

</section>

<section class="dealersaward">
    <h3>FIND OUT MORE</h3>
    {!! form_generate_button('Honda DEALER AWARDS', 'cta-prev', url('discover/dealer-awards'), 'black' ) !!}
</section>

<section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: -40px;">
    <h2>SHOPPING TOOLS</h2>
    @include('components.shopping-tools')
    <div class="clearfix"></div>
</section>

<style>
    .find-a-dealer .search-result.reduced-height {transition-duration: .5s; height: calc(100vh - 340px - 250px);}
    .logo-list {padding-bottom:20px;}
    .logo-list img {width:146px;}
    .sport-dealer {padding:10px; background:red; color:white; font-style: italic; font-weight: bolder; width: unset; width: max-content; letter-spacing: .1em; font-size: .8rem;}

    .expand-content .name {margin-bottom:20px;}
    section.dealersaward { padding: 50px; text-align: center;}

    .find-a-dealer .search-result .result-title {border:0; border-top:1px solid rgba(224,19,39,.5);}
    .find-a-dealer .search-result .result-title:last-of-type,
    .find-a-dealer .search-result .expand-content {border:0;}
    .find-a-dealer .info-container .search-container {padding:20px;}
    .find-a-dealer .info-container .search-container input.input-text {width:72%; display: inline-block;}
    .go-btn { height: 55px; background: red; border:0; color:white; padding:10px 12px;; outline: 0;}
    #map {border-left:2px solid #ccc;}
    .find-a-dealer .search-result {height: calc(100vh - 360px);}
    .find-a-dealer {height: calc(100vh - 70px); border-bottom:1px solid #ccc; display: flex;}
    .find-a-dealer .search-result.reduced-height {height: calc(100vh - 243px - 250px);}
    .reset-link {letter-spacing: unset; font-size: .6rem; float:right; top:1px; right:0; display: none;}

    .find-a-dealer .search-result .result-title .location-details .name {white-space: normal;}

    .find-a-dealer .search-result .result-title .number {background: url({{versioned_asset('img/interface/map-mark.png')}}) no-repeat top center}

    a.prime-cta-black, a.prime-cta-white {text-transform: unset;}

    .find-a-dealer .info-container .search-container .total-result {font-size:.88rem; padding-bottom:15px;}
    .find-a-dealer .filter-container {padding-top:10px;}
    .find-a-dealer .filter-container .btn-filter { padding-bottom: unset; font-size: 0.88rem;}
    .find-a-dealer .search-result .result-title .location-details .name {font-size: 0.88rem; width: 310px;}
    .find-a-dealer .search-result .result-title {padding: 15px 20px;}
    .find-a-dealer .search-result .expand-content { padding:0 30px;}
    .find-a-dealer .search-result .expand-content .details p {padding-bottom: 20px;}

    .sub-title { font-size: 0.9rem; color: #666; margin-bottom: 15px; font-weight: normal; text-align: center;}

    .search-btn {background: red; padding:15px; height:55px;vertical-align: middle; cursor: pointer;}
    .refresh-btn {width:15px; vertical-align: middle; display: inline-block; margin-top: -5px;}
    .m-total-result {vertical-align: middle;}


    /* .find-a-dealer ::-webkit-scrollbar {width: 10px;} */

    .floatingbtn {width:115px;cursor: pointer;z-index: 4;position: fixed;left: 41%;bottom: 15px;text-align: center;font-size: 11px;padding: 10px 0;border: 2px solid #ea1936;border-radius: 10px;background: #fff;}
    .floatingbtn img {width: 40%;}

    .expand-content.radio {
        display: flex;
        flex-wrap: wrap;
    }

    .expand-content.radio p {
        flex: 0 0 50%;
        box-sizing: border-box;
        padding: 5px;
    }

    .radio p{
        margin-bottom: 0;
    }

    @media screen and (max-width:768px){
        .find-a-dealer {height: unset; flex-direction: column; align-items: stretch;}
        #map { order: -1; height: 35vh; width: 100%; }
        .find-a-dealer .info-container { width: 100%; }
        .find-a-dealer .search-result {margin-bottom:0;}
        .find-a-dealer .info-container .search-container .m-total-result {margin-top:10px;}
        .find-a-dealer .search-result {overflow-y:auto; height: unset;}
        a.prime-cta-black, a.prime-cta-white {padding: 15px;}
        .find-a-dealer .search-result .expand-content ul.btn-container li {width:max-content; padding-right: 20px; min-width: unset;}

        .floatingbtn {left: 10px;bottom: 95px;}

        .expand-content.radio p {
            flex: 0 0 50%;
        }
        .find-a-dealer .info-container .search-container input.input-text {width:66%;}
    }

    @media (min-width: 769px) and (max-width: 1024px) {
        .find-a-dealer .info-container .search-container input.input-text {width:52%;}
    }

    @media (min-width: 1976px) {
        .floatingbtn {
            left: 810px;
        }
    }
    /* Locate-me button styles */
    .locate-me-btn {
        background: red;
        height: 55px;
        vertical-align: middle;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .locate-me-btn { margin-left: 0px; }
    }
</style>

{{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
@include('form.script-style')

<script>
    var senseSpeed = 5;
    var previousScroll = 0;
    $(window).scroll(function(event){
    var scroller = $(this).scrollTop();
    if (scroller-senseSpeed > previousScroll){
        $("div.floatingbtn").filter(':not(:animated)').slideUp();
    } else if (scroller+senseSpeed < previousScroll) {
        $("div.floatingbtn").filter(':not(:animated)').slideDown();
    }
    previousScroll = scroller;
    });
</script>

@stop

