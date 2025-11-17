

    {{--  only provide link to the accessories and colors 360 if the model has asset for it.  --}}
        <div class="color-model">

            @include('components.model-ext360-generic')

            {{--  <!-- <a href="" class="prime-cta-black">Colours &amp; accessories</a> -->  --}}
            @if ($model_slug=='type-r' || $model_slug=='en1')
            <a href="{{url('model/'.$model_slug.'/accessories')}}" class="prime-cta-black">
                <span>Accessories</span>
                <div class="overlay"></div>
            </a>
            @else

            <a href="{{url('model/'.$model_slug.'/packages')}}" class="prime-cta-black">
                <span>Accessories</span>
                <div class="overlay"></div>
            </a>

            @endif

            <div class="clearfix"></div>

        </div>

    <div class="clearfix"></div>


