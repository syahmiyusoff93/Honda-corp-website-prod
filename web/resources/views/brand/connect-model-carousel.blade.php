<div class="owl-carousel owl-theme model-selection-container half-bg">

    @foreach (config('global.allmodels') as $item)
        @if (in_array($item->slug, ['city']))

            @include('components.model-carousel-item')

        @endif
    @endforeach

</div>
