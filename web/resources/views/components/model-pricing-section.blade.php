@php
    $model_badge = url("img/model/badges/default.png");
    if(in_array($model_slug, ['accord'] )){
        $model_badge = url("img/model/badges/$model_slug.png");
    }

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_price-note.json', false, $honda_api_context);
    $data = json_decode($data);
    $price_note = $data->payload;

    $model_badge = !empty($price_note->price_label) ? $price_note->price_label : $model_badge;


@endphp

            <div class="">
                <div class="tab-slider-nav for-desktop">
                    <ul class="tab-slider-tabs body-copy">
                        @foreach ($variant_info as $key=>$item)
                            @php
                                $label = strtoupper($item->name) == 'SELF' ? 'Honda '.$model_info->name : $model_info->name . ' ' . $item->name ;
                            @endphp
                           
                            @if ($model_slug == 'en1')
                                <li class="tab-slider-trigger" rel="tab{{$key+1}}">Honda e:N1</li>
                            @else
                                <li class="tab-slider-trigger" rel="tab{{$key+1}}">{{$label}}</li>
                            @endif
                                {{-- <li class="tab-slider-trigger" rel="tab{{$key+1}}">{{$label}}</li> --}}
                            
                        @endforeach
                    </ul>
                </div>

                <div class="tab-slider-nav outline-drop for-mobile">
                    @if ($model_slug == 'en1')
                    <ul class="tab-slider-tabs body-copy">
                        @foreach ($variant_info as $key=>$item)
                            @php
                                $label = strtoupper($item->name) == 'SELF' ? 'Honda '.$model_info->name : $model_info->name . ' ' . $item->name ;
                            @endphp
                           
                            @if ($model_slug == 'en1')
                                <li class="tab-slider-trigger" rel="tab{{$key+1}}">Honda e:N1</li>
                            @else
                                <li class="tab-slider-trigger" rel="tab{{$key+1}}">{{$label}}</li>
                            @endif
                                {{-- <li class="tab-slider-trigger" rel="tab{{$key+1}}">{{$label}}</li> --}}
                            
                        @endforeach
                    </ul>
                    @else
                    <div class="dropdown-select" data-toggle="model-price">
                        <div class="dropdown-box">
                            <span class="btn">{{ $model_info->name }} {{@$variant_info[0]->name }}</span>
                            <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>
                        </div>
                        <ul class="dropdown-menu hide" data-toggle="model-price" style="display: none;">
                                @foreach ($variant_info as $key=>$item)
                                    @php
                                        $label = strtoupper($item->name) == 'SELF' ? 'Honda '.$model_info->name : $model_info->name . ' ' . $item->name ;
                                    @endphp
                                    
                                        <li class="tab-slider-trigger" rel="tab{{$key+1}}">{{$label}}</li>
                                    
                                @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <div class="tab-slider-container">
                    @if(in_array($model_slug, ['type-r']))
                        {{-- <div class="btn-container">
                            <a href="{{url('model/'.$model_slug.'/spec')}}" class="prime-cta-white">
                                <span>specifications</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $('h2.spec-price').html('SPECIFICATIONS');
                            })
                        </script> --}}
                        @foreach ($variant_info as $key=>$item)
                            <div id="tab{{$key+1}}" class="tab-slider-body ">
                                @if ($model_slug != "odyssey")
                                <div class="intro-title {{ intval(@$item->price_start)>0 ? '' : 'hidethis'}}">
                                    {{ in_array($model_slug, ['city--']) ? 'From**' : 'From' }}
                                </div>
                                <div class="price {{ intval(@$item->price_start)>0 ? '' : 'hidethis'}}">
                                    RM {{@$item->price_start}}                                
                                </div>
                                @endif

                                <img class="img model-service-badge" src="{{$model_badge}}" alt="">
                            </div>
                        @endforeach

                        <div class="btn-container">
                            <a href="{{url('model/'.$model_slug.'/spec')}}" class="prime-cta-black">
                                <span>specifications</span>
                                <div class="overlay"></div>
                            </a>
                            

                            <a href="{{url('model/'.$model_slug.'/pricing')}}" class="prime-cta-white">
                                <span>Pricing</span>
                                <div class="overlay"></div>
                            </a>

                            <div class="clearfix"></div>
                        </div>
                    @else

                        @foreach ($variant_info as $key=>$item)
                        <div id="tab{{$key+1}}" class="tab-slider-body ">
                             @if ($model_slug != "odyssey")
                            <div class="intro-title {{ intval(@$item->price_start)>0 ? '' : 'hidethis'}}">
                                {{ in_array($model_slug, ['city--']) ? 'From**' : 'From' }}
                            </div>
                            <div class="price {{ intval(@$item->price_start)>0 ? '' : 'hidethis'}}">
                                RM {{@$item->price_start}}                                
                            </div>
                            @endif

                            <img class="img model-service-badge" src="{{$model_badge}}" alt="">
                        </div>
                        @endforeach

                        <div class="btn-container">
                            <a href="{{url('model/'.$model_slug.'/spec')}}" class="prime-cta-black">
                                <span>specifications</span>
                                <div class="overlay"></div>
                            </a>
                            

                            @if ($model_slug != "odyssey")
                            <a href="{{url('model/'.$model_slug.'/pricing')}}" class="prime-cta-white">
                                <span>Pricing</span>
                                <div class="overlay"></div>
                            </a>
                            @endif

                            <div class="clearfix"></div>
                        </div>
                    @endif
                </div>

                <script>
                    $('document').ready(function(){
                        $('.tab-slider-tabs li:nth-child(1), .dropdown-menu li:nth-of-type(1)').addClass('active');
                    })
                </script>
                <style>
                    .hidethis {display:none;}
                </style>

            </div>

            <script> console.log("- {{$model_slug}}"); </script>

