@php
    // Map the new API structure to the expected template variables
    $buttons = $year['items'] ?? [];
    $btnCount = count($buttons);

    // Determine layout based on button count
    $layout = '';
    if ($btnCount <= 2) {
        $layout = 'two-btn';
    } elseif ($btnCount == 3) {
        $layout = 'three-btn';
    } elseif ($btnCount >= 4) {
        $layout = 'four-btn';
    }

    $layoutClass = '';
    $carInfoClass = '';
    $sidebarClass = 'connectsidebar';

    if ($layout == 'two-btn') {
        $layoutClass = 'custom-style-two-btn';
        $carInfoClass = 'car-info-two-btn';
        $sidebarClass .= ' e-booklet-two-btn';
    } elseif ($layout == 'three-btn') {
        $layoutClass = 'custom-style';
        $carInfoClass = 'car-info';
        $sidebarClass .= ' e-booklet';
    } elseif ($layout == 'four-btn') {
        $layoutClass = 'custom-style custom-style-four-btn';
        $carInfoClass = 'car-info-four-btn';
    } else {
        $layoutClass = 'custom-style';
        $carInfoClass = 'car-info';
    }

    $sidebarClass .= ' ' . ($year['bg_color'] ?? 'orange-bg');
    $withConnect = (isset($buttons['connect']) || isset($buttons['apps'])) ? 'withconnect' : '';

    // Extract variant name and model code from title if available
    $variant_name = $year['title'] ?? 'Variant';
    $model_code = $year['model_code'] ?? '';
@endphp

<li class="{{ $withConnect }} three-btn-overall-container-mobile {{ $layoutClass }}">
    <div class="{{ $carInfoClass }}">
        <a href="#" onclick="return false;" target="_blank">
            <div class="variant" style="margin-bottom:10px; font-weight:bold;">{{ strtoupper($variant_name) }}</div>
            @if($model_code)
            <div class="year">Model Code : {{ $model_code }}</div>
            @endif
            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
        </a>
    </div>
    <div class="{{ $sidebarClass }}">
        @if(isset($buttons['apps']))
            <div class="four-btn-display">
                <a href="{{ $manuals[$buttons['apps']] }}" target="_blank">
                    <img src="../img/aftersales/icon/connect-manual.png" class="four-btn-img-size">
                </a>
            </div>
        @endif

        @if(isset($buttons['connect']))
            <div class="{{ $layout == 'three-btn' ? 'three-btn-display' : '' }}">
                <a href="{{ $manuals[$buttons['connect']] }}" target="_blank">
                    <img src="../img/aftersales/icon/connect-manual.png" class="{{ $layout == 'three-btn' ? 'three-btn-img-size' : '' }}">
                </a>
            </div>
        @endif

        @if(isset($buttons['owners']))
            <div class="{{ $layout == 'three-btn' ? 'three-btn-display' : '' }}{{ $layout == 'four-btn' ? 'four-btn-display' : '' }}">
                <a href="{{ $manuals[$buttons['owners']] }}" target="_blank">
                    <img src="../img/aftersales/icon/owners-manual.png" class="{{ $layout == 'three-btn' ? 'three-btn-img-size' : '' }}{{ $layout == 'four-btn' ? 'four-btn-img-size' : '' }}">
                </a>
            </div>
        @endif

        @if(isset($buttons['gas']))
            <div class="four-btn-height four-btn-display">
                <a href="{{ $manuals[$buttons['gas']] }}" target="_blank" class="four-btn-text">
                    Google Automotive Services
                </a>
            </div>
        @endif

        @if(isset($buttons['wsb']))
            <div class="{{ $layout == 'four-btn' ? 'four-btn-display' : '' }}">
                <a href="{{ $manuals[$buttons['wsb']] }}" target="_blank">
                    Service Warranty <br> e-Booklet
                </a>
            </div>
        @endif

        @if(isset($buttons['service_ebook']))
            <div>
                <a href="{{ $manuals[$buttons['service_ebook']] }}" target="_blank">
                    Service Warranty <br> e-Booklet
                </a>
            </div>
        @endif

        @if(isset($buttons['pet']))
            <div class="{{ $layout == 'four-btn' ? 'four-btn-display' : '' }}">
                <a href="{{ $manuals[$buttons['pet']] }}" target="_blank">
                    <img src="../img/aftersales/icon/owners-manual.png" class="{{ $layout == 'four-btn' ? 'four-btn-img-size' : '' }}">
                </a>
            </div>
        @endif

        @if(isset($buttons['hev']))
            <div class="{{ $layout == 'four-btn' ? 'four-btn-display' : '' }}">
                <a href="{{ $manuals[$buttons['hev']] }}" target="_blank">
                    <img src="../img/aftersales/icon/owners-manual.png" class="{{ $layout == 'four-btn' ? 'four-btn-img-size' : '' }}">
                </a>
            </div>
        @endif

        @if(isset($buttons['hybrid']))
            <div class="{{ $layout == 'four-btn' ? 'four-btn-display' : '' }}">
                <a href="{{ $manuals[$buttons['hybrid']] }}" target="_blank">
                    <img src="../img/aftersales/icon/owners-manual.png" class="{{ $layout == 'four-btn' ? 'four-btn-img-size' : '' }}">
                </a>
            </div>
        @endif

        @if(isset($buttons['type_r']))
            <div class="{{ $layout == 'four-btn' ? 'four-btn-display' : '' }}">
                <a href="{{ $manuals[$buttons['type_r']] }}" target="_blank">
                    <img src="../img/aftersales/icon/owners-manual.png" class="{{ $layout == 'four-btn' ? 'four-btn-img-size' : '' }}">
                </a>
            </div>
        @endif
    </div>
    @if(isset($buttons['connect']) || isset($buttons['apps']))
        <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
    @endif
    <div class="red-line"></div>
</li>
