<div class="owl-carousel owl-theme model-selection-container half-bg">

    @foreach (config('global.allmodels') as $item)
        {{-- NOTE: This will check if $model_carousel_only_show is declared in the calling file. If it is/exist, it will use that rule. if not it will display all model --}}
        @if (empty(@$model_carousel_only_show) || in_array($item->slug, $model_carousel_only_show))
            @include('components.model-carousel-item')
        @endif
    @endforeach

</div>


