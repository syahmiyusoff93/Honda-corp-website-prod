<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <!-- Heatmap JWT Token (generated from CMS) -->
    <script>
        // This token should be generated from CMS admin panel and embedded here
        window.HEATMAP_JWT_TOKEN = '{{ config("global.heatmap_jwt_token", "") }}';
        window.HEATMAP_API_URL = '{{ config("global.heatmap_api_url", "") }}';
    </script>

    <!-- Heatmap Tracking Script -->
    <script>
    (function() {
        // Configuration
        var HEATMAP_API_URL = '{{ config("global.heatmap_api_url", "") }}'; // Fallback to hardcoded if config not set
        var JWT_AUTH_URL = '{{ config("global.jwt_auth_url", "") }}';
        var JWT_TOKEN_KEY = '{{ config("global.heatmap_jwt_token", "") }}';
        var SESSION_ID = Date.now() + '-' + Math.random().toString(36).substr(2, 9);
        var PAGE_URL = window.location.pathname;
        var PAGE_TITLE = document.title;
        var jwtToken = null;

        // Get JWT token
        function getJwtToken() {
            return new Promise(function(resolve, reject) {
                // Check if we already have a valid token in localStorage
                var storedToken = localStorage.getItem(JWT_TOKEN_KEY);
                if (storedToken) {
                    jwtToken = storedToken;
                    resolve(storedToken);
                    return;
                }

                // Use the embedded token from CMS
                var embeddedToken = window.HEATMAP_JWT_TOKEN;
                if (!embeddedToken) {
                    reject(new Error('No heatmap JWT token configured'));
                    return;
                }

                // Verify the token is valid by making a test request
                fetch(JWT_AUTH_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + embeddedToken
                    }
                })
                .then(function(response) {
                    if (response.ok) {
                        jwtToken = embeddedToken;
                        localStorage.setItem(JWT_TOKEN_KEY, jwtToken);
                        resolve(jwtToken);
                    } else {
                        throw new Error('Token validation failed');
                    }
                })
                .catch(function(error) {
                    console.log('JWT authentication error:', error);
                    reject(error);
                });
            });
        }

        // Queue events locally and flush periodically (every 10s)
        var HEATMAP_QUEUE_KEY = 'heatmap_event_queue';
        var FLUSH_INTERVAL_MS = 10000; // 10 seconds

        function readQueue() {
            try {
                var raw = localStorage.getItem(HEATMAP_QUEUE_KEY);
                return raw ? JSON.parse(raw) : [];
            } catch (e) {
                console.warn('heatmap: corrupt queue, resetting', e);
                localStorage.removeItem(HEATMAP_QUEUE_KEY);
                return [];
            }
        }

        function writeQueue(arr) {
            try {
                localStorage.setItem(HEATMAP_QUEUE_KEY, JSON.stringify(arr));
            } catch (e) {
                console.warn('heatmap: failed to write queue', e);
            }
        }

        function enqueueEvent(evt) {
            var q = readQueue();
            q.push(evt);
            writeQueue(q);
        }

        // Build event object and enqueue — we no longer send immediately
        function trackEvent(eventType, x, y, additionalData) {
            var data = {
                page_url: PAGE_URL,
                page_title: PAGE_TITLE,
                event_type: eventType,
                x_coordinate: (typeof x !== 'undefined') ? x : null,
                y_coordinate: (typeof y !== 'undefined') ? y : null,
                viewport_width: window.innerWidth,
                viewport_height: window.innerHeight,
                user_agent: navigator.userAgent,
                session_id: SESSION_ID,
                additional_data: additionalData || {},
                created_at: new Date().toISOString()
            };

            enqueueEvent(data);
        }

        // Initialize token + start regular flush loop
        function ensureJwtThenFlush() {
            if (jwtToken) return Promise.resolve(jwtToken);
            return getJwtToken().then(function(token) {
                console.log('Heatmap tracking initialized with JWT');
                return token;
            });
        }

        // Send queued events in batches every FLUSH_INTERVAL_MS
        var flushTimer = null;

        function flushQueueOnce() {
            var q = readQueue();
            if (!q.length) return Promise.resolve();

            return ensureJwtThenFlush().then(function() {
                var queueCopy = q.slice();

                // Send entire batch in one request to the batch endpoint
                return fetch(HEATMAP_API_URL + '/batch', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + jwtToken
                    },
                    body: JSON.stringify(queueCopy)
                }).then(function(response) {
                    if (!response.ok) return Promise.reject(response.status);
                    return response.json().catch(function(){ return {}; });
                }).then(function(res) {
                    // on success clear queue
                    writeQueue([]);
                }).catch(function(err) {
                    console.warn('heatmap: batch flush failed', err);
                    // leave queue intact for retry
                });
            }).catch(function(err){
                // couldn't get jwtToken; leave queue intact and retry next interval
                console.log('heatmap: cannot flush, no JWT token yet', err);
            });
        }

        function startFlushLoop() {
            if (flushTimer) return;
            flushTimer = setInterval(flushQueueOnce, FLUSH_INTERVAL_MS);
            // try an immediate flush too
            setTimeout(flushQueueOnce, 1000);
        }

        // final attempt to flush before unload — use sendBeacon when possible
        function flushOnUnload() {
            var q = readQueue();
            if (!q.length) return;

            try {
                // If jwtToken available, attach Authorization header via fetch is not supported by sendBeacon
                // Instead attempt sendBeacon with the raw JSON payload (server must accept it without JWT on unload), fallback is a synchronous fetch.
                var payload = JSON.stringify(q);
                if (navigator.sendBeacon) {
                    // Use an endpoint `/heatmap/batch` if server supports; otherwise fall back to single-event beacon per entry
                    navigator.sendBeacon(HEATMAP_API_URL + '/batch', payload);
                } else {
                    // synchronous request fallback
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', HEATMAP_API_URL + '/batch', false);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    if (jwtToken) xhr.setRequestHeader('Authorization', 'Bearer ' + jwtToken);
                    xhr.send(payload);
                }
                // On best-effort, clear queue
                localStorage.removeItem(HEATMAP_QUEUE_KEY);
            } catch (e) {
                console.warn('heatmap: flushOnUnload failed', e);
            }
        }

        // Start the flushing loop as soon as we initialize
        ensureJwtThenFlush().finally(startFlushLoop);

        // ensure we attempt a flush at page unload
        window.addEventListener('beforeunload', flushOnUnload);

        // Track mouse clicks
        document.addEventListener('click', function(e) {
            trackEvent('click', e.clientX, e.clientY);
        });

        // Track mouse movements (throttled)
        var lastMoveTime = 0;
        document.addEventListener('mousemove', function(e) {
            var now = Date.now();
            if (now - lastMoveTime > 100) { // Throttle to every 100ms
                trackEvent('move', e.clientX, e.clientY);
                lastMoveTime = now;
            }
        });

        // Track scrolling
        var lastScrollTime = 0;
        window.addEventListener('scroll', function() {
            var now = Date.now();
            if (now - lastScrollTime > 500) { // Throttle to every 500ms
                trackEvent('scroll', window.scrollX, window.scrollY, {
                    scrollTop: window.scrollY,
                    scrollLeft: window.scrollX
                });
                lastScrollTime = now;
            }
        });

        // Track page visibility changes
        document.addEventListener('visibilitychange', function() {
            trackEvent('visibility', null, null, {
                visible: !document.hidden,
                timestamp: Date.now()
            });
        });

        // Track page load
        window.addEventListener('load', function() {
            trackEvent('page_load', null, null, {
                loadTime: Date.now(),
                referrer: document.referrer
            });
            // ensure loop started
            startFlushLoop();
        });

        // Track time spent on page
        var pageStartTime = Date.now();
        window.addEventListener('beforeunload', function() {
            var timeSpent = Date.now() - pageStartTime;
            trackEvent('page_unload', null, null, {
                timeSpent: timeSpent
            });
        });
    })();
    </script>
</body>
</html>
