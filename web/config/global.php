<?php

// ------------------------------------------------------------------- Path to API

    $sname = @$_SERVER['HTTP_HOST'];
    
    $SAI_API_PATH = $_ENV['CMS_DIRECTORY'];
    $SAI_ASSET_PATH = $_ENV['AWS_CLOUDFRONT_URL'].'pixelvault/';
    
    $SAI_USE_JSON = false;
    $SAI_STAGE = $_ENV['APP_ENV'];
    $SAI_AUTH = base64_encode($_ENV['API_USER'].':'.$_ENV['API_PASS']);

// ------------------------------------------------------------------- GLOBAL DATA

    $honda_api_context_arr = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
        ),
        "http" => [
            "header" => "Authorization: Basic $SAI_AUTH"
        ]
    );

    $honda_api_context = stream_context_create($honda_api_context_arr);
    stream_context_set_default($honda_api_context_arr);

    // Avoid making remote HTTP calls during CLI (artisan) runs such as config:cache
    // unless explicitly enabled via the ALLOW_BOOTSTRAP_REMOTE_CALLS environment variable.
    $allow_bootstrap_remote = (getenv('ALLOW_BOOTSTRAP_REMOTE_CALLS') === 'true') || (php_sapi_name() !== 'cli');

    if ($allow_bootstrap_remote) {
        // Suppress warnings when hosts are unreachable; decoding may return null.
        $models_raw = @file_get_contents($SAI_API_PATH . 'models.json', false, $honda_api_context);
        $webconfig_raw = @file_get_contents($SAI_API_PATH . 'webconfig.json', false, $honda_api_context);
        $honda_data['models'] = $models_raw ? json_decode($models_raw) : [];
        
        $decoded_webconfig = $webconfig_raw ? json_decode($webconfig_raw, true) : [];
        
        // Ensure webconfig is always an object with safe defaults
        // Merge API data with defaults (API data takes precedence if present)
        $honda_data['webconfig'] = (object) array_merge([
            'share_img_generic' => '/img/honda-default.jpg',
            'share_title' => 'Honda Malaysia',
            'share_description' => 'Official Honda Malaysia Website',
        ], is_array($decoded_webconfig) ? $decoded_webconfig : []);
    } else {
        // Provide safe defaults for cached config.
        $honda_data['models'] = [];
        $honda_data['webconfig'] = (object) [
            'share_img_generic' => '/img/honda-default.jpg',
            'share_title' => 'Honda Malaysia',
            'share_description' => 'Official Honda Malaysia Website',
        ];
    }

// MENUS

    $__menu['aftersales'] = [
        // ['Update My Profile',      'update-profile'],
        ['HondaTouch',         'hondatouch'],
        ['Honda Pride',         'honda-pride'],
        ['Maintenance',         'maintenance'],
        ['Honda Parts',       'honda-parts'],
        ['Owner\'s Manual',       'manuals']
    ];

    $__menu['discover'] = [
        ['Honda Insurance Plus',    'honda-insurance-plus'],
        ['Corporate Fleet Sales',    'corporate-fleet-sale'],
        // ['Merchandise',             'merchandise']
    ];

    $__menu['shopping-tool'] = [
        ['Download Brochure',       '/download-brochure',                'icon-download.png',    'tool-download'],
        ['Loan Calculator',         '/loan-calculator',                  'icon-calc.png',        'tool-calculator'],
        ['Compare Models',          '/compare',                          'icon-compare.png',     'tool-compare'],
        ['Honda Insurance Plus',    '/discover/honda-insurance-plus',    'icon-hip.png',         'tool-hip'],
        ['New Car Pre-Booking',     'https://prebook.honda.com.my',          'NewCarPreBooking.svg', 'tool-newcarbooking inverted'],
        ['Book A Test Drive',     'https://prebook.honda.com.my/getintouch',          'BookTestDrive.svg', 'tool-booktestdrive']
    ];

    # BRAND

    $__menu['aboutus'] = [
        ['About Us',      'about-us'],
        ['Our Founder',    'about-us/founder'],
        ['Manufacturing', 'about-us/manufacturing'],
        ['Achievements',  'about-us/achievements'],
        ['Honda Dealer Awards',  'discover/dealer-awards'],
    ];

    $__menu['technology'] = [
        ['Honda Advanced Technology',      'technology/advanced-technology'],
        ['Hallmark Of Innovations',         'technology/hallmark-of-innovations'],
    ];

    $__menu['contactus'] = [
        ['Locate Us',      'locate-us'],
        ['Customer Service',      'customer-service'],
        ['Career',      'career'],
    ];

    $__menu['withdreams'] = [
        ['All Articles',    '/withdreams'],
        ['Product',         '/withdreams/category/product-category/'],
        ['Experiences',     '/withdreams/category/experiences-category/'],
        ['Honda DNA',       '/withdreams/category/honda-dna-category/'],
        ['Event COverage',  '/withdreams/category/event-coverage-category/'],
    ];

return [

    'SERVER_NAME' => $sname,

    'cachebuster' => strtoupper(md5(microtime())),

    'APIPATH' => $SAI_API_PATH,

    'ASSETPATH' => $SAI_ASSET_PATH,

    'AUTHKEY' => $SAI_AUTH,

    'APICONTEXT' => $honda_api_context,

    'USE_JSON' => $SAI_USE_JSON,

    'STAGE' => $SAI_STAGE,

    'allmodels' => $honda_data['models'],

    'webconfig' => $honda_data['webconfig'],

    'OLDURL' => 'https://legacy.honda.com.my/',

    'menus' => $__menu,

    'desired' => ['Download Brochure','Loan Calculator','New Car Pre-Booking','Book A Test Drive'],

    // Heatmap JWT Token for tracking authentication
    'heatmap_jwt_token' => $_ENV['HEATMAP_JWT_TOKEN'],
    'heatmap_api_url' => $_ENV['HEATMAP_API_URL'],
    'jwt_auth_url' => $_ENV['JWT_AUTH_URL'],

]

?>
