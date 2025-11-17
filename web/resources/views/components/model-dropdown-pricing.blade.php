@php
    if (isset($pageid)) {
        if ($model_info->slug == 'city-hatchback') $cols = 5;
        else $cols = 5;
    }
    else {
        $cols = 5;
    }
@endphp
<ul class="selection body-copy variant-select">
    <li class="selection-tag" style="padding:0;">Select models</li>
    @if ($model_slug == "crv")
        @for($i=0;$i < 5; $i++)
            @php
                $j = $i;
                // if ($i == 2) $j = 3;
                // if ($i == 3) $j = 2;

                $label = (@$variants[$j]->name!='') ? @$model_info->name .' '. @$variants[$j]->name : 'Please select';
                // particularly for model that has only 1 variant and using model name, like Type R
                if(!empty(@$model_info->slug) && (@$variants[$j]->name=='' || @$variants[$j]->name=='SELF')){
                    $label = $model_info->name;
                }
            @endphp
            <li class="xoutline-drop sai-ddselect-{{$j}}" data-lajur="{{$j}}">
                <div class="dropdown-select" data-toggle="toggle{{$j}}">
                    @if (@$model_info->slug=='type-r')
                    <span class="btn sai-dd-label">Honda Type R</span>
                    {{-- <span class="btn sai-dd-label">2017 Honda Type R</span> --}}
                    @elseif (@$model_info->slug == 'en1')
                    <span class="btn sai-dd-label">Honda e:N1</span>
                    @else
                    <span class="btn sai-dd-label">{{$label}}</span>
                    @endif
                    <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>

                    <ul class="dropdown-menu sai-dd-item hide" data-toggle="toggle{{$j}}" style="display: none;">
                        @foreach ($allvariants as $vv)
                            @if(!isset($ownvariantonly) || (@$ownvariantonly && $vv->model_slug==$model_info->slug))
                                <li data-vid="{{$vv->id}}" data-col="{{$j}}">{{$vv->model_name}} {{$vv->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
        @endfor
    @elseif ($model_slug == "city")
        @for($i=0;$i < 5; $i++)
            @php
                $j = $i;
                // if ($i == 3) $j = 4;
                // if ($i == 4) $j = 3;

                $label = (@$variants[$j]->name!='') ? @$model_info->name .' '. @$variants[$j]->name : 'Please select';
                // particularly for model that has only 1 variant and using model name, like Type R
                if(!empty(@$model_info->slug) && (@$variants[$j]->name=='' || @$variants[$j]->name=='SELF')){
                    $label = $model_info->name;
                }
            @endphp
            <li class="xoutline-drop sai-ddselect-{{$j}}" data-lajur="{{$j}}">
                <div class="dropdown-select" data-toggle="toggle{{$j}}">
                    @if (@$model_info->slug=='type-r')
                    <span class="btn sai-dd-label">Honda Type R</span>
                    {{-- <span class="btn sai-dd-label">2017 Honda Type R</span> --}}
                    @elseif (@$model_info->slug == 'en1')
                    <span class="btn sai-dd-label">Honda e:N1</span>
                    @else
                        <span class="btn sai-dd-label city-dd-width">{{$label}}</span>
                    @endif
                    <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>

                    <ul class="dropdown-menu sai-dd-item hide" data-toggle="toggle{{$j}}" style="display: none;">
                        @foreach ($allvariants as $vv)
                            @if(!isset($ownvariantonly) || (@$ownvariantonly && $vv->model_slug==$model_info->slug))
                                <li data-vid="{{$vv->id}}" data-col="{{$j}}">{{$vv->model_name}} {{$vv->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
        @endfor
   @elseif ($model_slug == "city-hatchback")
        @for($i=0;$i < 5; $i++)
            @php
                $j = $i;
                // if ($i == 3) $j = 4;
                // if ($i == 4) $j = 3;

                $label = (@$variants[$j]->name!='') ? @$model_info->name .' '. @$variants[$j]->name : 'Please select';
                // particularly for model that has only 1 variant and using model name, like Type R
                if(!empty(@$model_info->slug) && (@$variants[$j]->name=='' || @$variants[$j]->name=='SELF')){
                    $label = $model_info->name;
                }
            @endphp
            <li class="xoutline-drop sai-ddselect-{{$j}}" data-lajur="{{$j}}">
                <div class="dropdown-select" data-toggle="toggle{{$j}}">
                    @if (@$model_info->slug=='type-r')
                    <span class="btn sai-dd-label">Honda Type R</span>
                    {{-- <span class="btn sai-dd-label">2017 Honda Type R</span> --}}
                    @elseif (@$model_info->slug == 'en1')
                    <span class="btn sai-dd-label">Honda e:N1</span>
                    @else
                    <span class="btn sai-dd-label">{{$label}}</span>
                    @endif
                    <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>

                    <ul class="dropdown-menu sai-dd-item hide" data-toggle="toggle{{$j}}" style="display: none;">
                        @foreach ($allvariants as $vv)
                            @if(!isset($ownvariantonly) || (@$ownvariantonly && $vv->model_slug==$model_info->slug))
                                <li data-vid="{{$vv->id}}" data-col="{{$j}}">{{$vv->model_name}} {{$vv->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
        @endfor

    @elseif ($model_slug == "en1")
        @for($i=0;$i < 1; $i++)
            @php
                $j = $i;
                // if ($i == 3) $j = 4;
                // if ($i == 4) $j = 3;

                $label = (@$variants[$j]->name!='') ? @$model_info->name .' '. @$variants[$j]->name : 'Please select';
                // particularly for model that has only 1 variant and using model name, like Type R
                if(!empty(@$model_info->slug) && (@$variants[$j]->name=='' || @$variants[$j]->name=='SELF')){
                    $label = $model_info->name;
                }
            @endphp
            <style type="text/css">
                @media only screen and (max-width: 1024px) {
                    .drop-table.model-inner-container ul.selection li {
                        width: calc(100% - 3px) !important;
                        border: none;
                        text-align: center;
                    }
                }
                @media only screen and (max-width: 1024px) {
                    .table-content-container .spec-details li table td:nth-child(2), .table-content-container .spec-details li table td:nth-child(3) {
                        width: calc(100% - 3px) !important;
                        text-align: center;
                    }
                }
                @media only screen and (max-width: 1024px) {
                    .dropdown-select .sai-dd-label {
                        position: static;
                        display: block;
                        width: 100%;
                        text-align: center;
                        padding: 10px 0;
                    }
                }
                @media only screen and (max-width: 480px) {
                    .drop-table.model-inner-container ul.selection li {
                        height: 30px !important;
                    }
                }
            </style>
            <li style="width: 40%" class="xoutline-drop sai-ddselect-{{$j}}" data-lajur="{{$j}}">
                <div class="dropdown-select" data-toggle="toggle{{$j}}">
                    @if (@$model_info->slug=='type-r')
                    <span class="btn sai-dd-label">Honda Type R</span>
                    {{-- <span class="btn sai-dd-label">2017 Honda Type R</span> --}}
                    @elseif (@$model_info->slug == 'en1')
                    <span class="btn sai-dd-label">Honda e:N1</span>
                    @else
                    <span class="btn sai-dd-label">{{$label}}</span>
                    @endif
                    <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>

                    <ul class="dropdown-menu sai-dd-item hide" data-toggle="toggle{{$j}}" style="display: none;">
                        @foreach ($allvariants as $vv)
                            @if(!isset($ownvariantonly) || (@$ownvariantonly && $vv->model_slug==$model_info->slug))
                                <li data-vid="{{$vv->id}}" data-col="{{$j}}">{{$vv->model_name}} {{$vv->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
        @endfor



    @else
        @for($i=0;$i < $cols; $i++)
            @php
                $label = (@$variants[$i]->name!='') ? @$model_info->name .' '. @$variants[$i]->name : 'Please select';
                // particularly for model that has only 1 variant and using model name, like Type R
                if(!empty(@$model_info->slug) && (@$variants[$i]->name=='' || @$variants[$i]->name=='SELF')){
                    $label = $model_info->name;
                }
            @endphp
            <li class="xoutline-drop sai-ddselect-{{$i}}" data-lajur="{{$i}}">
                <div class="dropdown-select" data-toggle="toggle{{$i}}">
                    @if (@$model_info->slug=='type-r')
                    <span class="btn sai-dd-label">Honda Type R</span>
                    {{-- <span class="btn sai-dd-label">2017 Honda Type R</span> --}}
                    @elseif (@$model_info->slug == 'en1')
                    <span class="btn sai-dd-label">Honda e:N1</span>
                    @else
                    <span class="btn sai-dd-label">{{$label}}</span>
                    @endif
                    <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>

                    <ul class="dropdown-menu sai-dd-item hide" data-toggle="toggle{{$i}}" style="display: none;">
                        @foreach ($allvariants as $vv)
                            @if(!isset($ownvariantonly) || (@$ownvariantonly && $vv->model_slug==$model_info->slug))
                                <li data-vid="{{$vv->id}}" data-col="{{$i}}">{{$vv->model_name}} {{$vv->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
        @endfor
    @endif

</ul>
<script>
    $("document").ready(function(){
        console.log("ver 1.10i");
       var mslug = "{{$model_slug}}";

       if ( mslug == "city" ) {
            $(".variant-select >  .sai-ddselect-3 ul > li:nth-child(5)").insertBefore(".variant-select > .sai-ddselect-3 ul > li:nth-child(4)");

       }

      if ( mslug == "city-hatchback" ) {

       // $(".variant-select >  .sai-ddselect-0 ul > li:nth-child(5)").insertBefore(".variant-select > .sai-ddselect-0 ul > li:nth-child(4)");
       // $(".variant-select >  .sai-ddselect-1 ul > li:nth-child(5)").insertBefore(".variant-select > .sai-ddselect-1 ul > li:nth-child(4)");
       // $(".variant-select >  .sai-ddselect-2 ul > li:nth-child(5)").insertBefore(".variant-select > .sai-ddselect-2 ul > li:nth-child(4)");
       // $(".variant-select >  .sai-ddselect-3 ul > li:nth-child(5)").insertBefore(".variant-select > .sai-ddselect-3 ul > li:nth-child(4)");
       // $(".variant-select >  .sai-ddselect-4 ul > li:nth-child(5)").insertBefore(".variant-select > .sai-ddselect-4 ul > li:nth-child(4)");
    
    }



    })    
</script>
