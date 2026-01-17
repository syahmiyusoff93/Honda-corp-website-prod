@php
    if (isset($pageid)) {
        $cols = $num_variants;
    }
    else {
        $cols = $num_variants;
    }
@endphp
<ul class="selection body-copy variant-select">
    <li class="selection-tag" style="padding:0;">Select models</li>
    @for($i=0;$i < $num_variants; $i++)
        @php
            $label = (@$variants[$i]->name!='') ? @$model_info->name .' '. @$variants[$i]->name : 'Please select';
            // particularly for model that has only 1 variant and using model name, like Type R
            if(!empty(@$model_info->slug) && (@$variants[$i]->name=='' || @$variants[$i]->name=='SELF')){
                $label = $model_info->name;
            }
        @endphp
        <li class="xoutline-drop sai-ddselect-{{$i}}" data-lajur="{{$i}}">
            <div class="dropdown-select" data-toggle="toggle{{$i}}">
                @if (@$model_info->slug == 'en1')
                <span class="btn sai-dd-label">Honda e:N1</span>
                @elseif (@$model_info->slug=='type-r')
                <span class="btn sai-dd-label">Honda Type R</span>
                @else
                <span class="btn sai-dd-label{{$num_variants == 1 ? ' single-column' : ''}}">{{$label}}</span>
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

</ul>

