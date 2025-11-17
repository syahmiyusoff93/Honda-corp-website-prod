
@php
    function __generateUSP($item){
        return '
            <li>
                <div class="p-item" style="background-image:url('.$item->image.'); background-size: cover; background-position: center;">
                    <img class="lazyload" data-src="'.$item->image.'" alt="" />
                    <div class="p-details">
                        <div class="strong">'.$item->line1.'</div>
                        <div class="title">'.$item->line2.'</div>
                    </div>
                </div>
                <div class="sub-title black">'.$item->line3.'</div>
            </li>
        ';
    }

    $__out = '';
    foreach($story->usp as $item)
        $__out .= __generateUSP($item);

@endphp

<div class="container">
        <ul class="for-desktop-usp">
            {!! $__out !!}
        </ul>


        <ul class="for-mobile-usp owl-carousel owl-theme">
            {!! $__out !!}
        </ul>
    </div>
    <div class="clearfix"></div>
