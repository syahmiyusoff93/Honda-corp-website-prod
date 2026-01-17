@php
    $__menu = config('global.menus');
    // Show only the requested tools in the mobile floating bar, in this order
    $__desired = config('global.desired');
    $desired = $__desired;
    $found = [];
    foreach ($__menu['shopping-tool'] as $itm) {
        if (in_array(strtolower($itm[0]), array_map('strtolower', $desired))) {
            $found[] = $itm;
        }
    }

    // Preserve desired order
    $mobileTools = [];
    foreach ($desired as $d) {
        foreach ($found as $f) {
            if (strtolower($f[0]) === strtolower($d)) {
                $mobileTools[] = $f;
                break;
            }
        }
    }
@endphp

@foreach ($__menu['shopping-tool'] as $item)
    <a href="{{$item[1]}}" class="shoptool-item {{$item[3]}}">
        <img  class="lazyload" data-src="{{versioned_asset('img/icon/'.$item[2])}}" alt="{{$item[0]}}">
        <div class="st-text"> {{$item[0]}}</div>
    </a>
@endforeach

{{-- Mobile floating bottom bar (only show on small screens) --}}
<div class="mobile-shopping-tools" aria-hidden="false">
    @foreach ($mobileTools as $m)
        <a href="{{$m[1]}}" class="mst-item" title="{{$m[0]}}" aria-label="{{$m[0]}}">
            <img src="{{ versioned_asset('img/icon/'.$m[2]) }}" alt="{{$m[0]}}" />
            <?php 
                $toolLabel = $m[0];
                // Format multi-word labels for mobile display
                $toolLabel = str_replace('New Car Pre-Booking', 'New Car<br>Pre-Booking', $toolLabel);
                $toolLabel = str_replace('Loan Calculator', 'Loan<br>Calculator', $toolLabel);
                $toolLabel = str_replace('Download Brochure', 'Download<br>Brochure', $toolLabel);
                $toolLabel = str_replace('Book A Test Drive', 'Book A<br>Test Drive', $toolLabel);
            ?>
            <span>{!! $toolLabel !!}</span>
        </a>
    @endforeach
</div>
