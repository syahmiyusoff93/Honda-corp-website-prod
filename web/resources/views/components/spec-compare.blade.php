@php
// Filter grouped legend to only show regular spec items
$groupedlegend = collect($groupedlegend)->filter(function($maincat) {
    return $maincat->spec_type === 'regular';
});

// Convert labelOverrides to array if it's an object
if (is_object($labelOverrides)) {
    $labelOverrides = (array) $labelOverrides;
}
@endphp

@if(isset($variantids))
@if(count($variantids) == 1)
<style type="text/css">
    .col0 {
        width: 40% !important;
    }
</style>
@endif
@endif

<section class="table-content-container">
    <div class="stage-contained table-content">
        @foreach($groupedlegend as $maincat)
            <div class="spec-title more first active slug-{{$maincat->slug}}" data-slug="{{$maincat->slug}}">
                {{ $labelOverrides[$maincat->slug] ?? $maincat->name }}<div class="button"></div>
            </div>
            <div class="spec-details expand-content black">
                <ul>
                    <li>
                        <table>
                        @foreach($maincat->childspec as $child)
                            <tr class=" {{$child->slug}}  {{$maincat->slug}}-child">
                                <td>{{ $labelOverrides[$child->slug] ?? $child->name }}</td>
                                @php
                                    $tcol = empty($variants) ? 5 : count($variants);
                                    if($tcol>5) $tcol = 5;
                                    
                                    for ($i=0; $i<$tcol; $i++) {
                                        if ($model_slug == "crv") {
                                            $j = $i;
                                            // if ($i == 2) $j = 3;
                                            // if ($i == 3) $j = 2;

                                            $outputdata = $j<$tcol ? __processTabularOutput(@$variants[$j]->spec['specitem'][$child->slug]) : '-';
                                            echo '<td class="col'.$j.'">'.$outputdata.'</td>';
                                        }
                                        else if ($model_slug == "city") {
                                            $j = $i;
                                            // if ($i == 3) $j = 4;
                                            // if ($i == 4) $j = 3;

                                            $outputdata = $j<$tcol ? __processTabularOutput(@$variants[$j]->spec['specitem'][$child->slug]) : '-';
                                            if ($i != 5)   echo '<td class="col'.$j.'">'.$outputdata.'</td>';
                                        }
                                        else if ($model_slug == "city-hatchback") {
                                            $j = $i;
                                             if ($i == 3) $j = 4;
                                             if ($i == 4) $j = 3;

                                            $outputdata = $j<$tcol ? __processTabularOutput(@$variants[$j]->spec['specitem'][$child->slug]) : '-';
                                            if ($i != 5)   echo '<td class="col'.$j.'">'.$outputdata.'</td>';
                                        }
                                        else {
                                            $outputdata = $i<$tcol ? __processTabularOutput(@$variants[$i]->spec['specitem'][$child->slug]) : '-';
                                            echo '<td class="col'.$i.'">'.$outputdata.'</td>';
                                        }
                                    }
                                @endphp
                            </tr>
                        @endforeach
                        </table>
                    </li>
                </ul>
            </div>
        @endforeach
        {{--  ------------------------------ MAJOR EQUIPMENT -----------------------------------------  --}}
        @if(@$inner_section)
        <div id="major-e">
            <div class="spec-title">{{-- purposely empty as a first child who will not receive a top border, but its dictated that a border will need to exist --}}</div>
            @foreach($variants[0]->spec as $slug=>$maincat)
                @if($slug!='specitem')
                    <div class="spec-title more first active slug-{{$slug}}" data-slug="{{$slug}}">{{ $labelOverrides[$slug] ?? $labellagend[$slug] }}<div class="button"></div></div>
                    <div class="spec-details expand-content black">
                        <ul>
                            <li>
                            <table class="majorEquipmentTable">
                                @foreach($maincat as $cslug=>$child)
                                    <tr class=" {{$cslug}} {{$slug}}-child">
                                        <td>{{ $labelOverrides[$cslug] ?? $labellagend[$cslug] }}</td>
                                        @php
                                            for($i=0;$i<$tcol;$i++){
                                                if ($model_slug == "crv") {
                                                    $j = $i;
                                                    // if ($i == 2) $j = 3;
                                                    // if ($i == 3) $j = 2;

                                                    $outputdata = $j<$tcol ? __processTabularOutput(@$variants[$j]->spec[$slug][$cslug]) : '-';
                                                    echo '<td class="col'.$j.'">'.$outputdata.'</td>';
                                                }
                                                else if ($model_slug == "city") {
                                                    $j = $i;
                                                    // if ($i == 3) $j = 4;
                                                    //if ($i == 3) $j = 2;

                                                    $outputdata = $j<$tcol ? __processTabularOutput(@$variants[$j]->spec[$slug][$cslug]) : '-';
                                                    if ($i != 6) echo '<td class="col'.$j.'">'.$outputdata.'</td>';
                                                }
                                                else if ($model_slug == "city-hatchback") {
                                                    $j = $i;
                                                     if ($i == 3) $j = 4;
                                                    if ($i == 4) $j = 3;

                                                    $outputdata = $j<$tcol ? __processTabularOutput(@$variants[$j]->spec[$slug][$cslug]) : '-';
                                                    if ($i != 5) echo '<td class="col'.$j.'">'.$outputdata.'</td>';
                                                }
                                                else if ($model_slug == "hrv") {
                                                    $outputdata = $i<$tcol ? __processTabularOutput(@$variants[$i]->spec[$slug][$cslug]) : '-';

                                                    echo '<td class="col'.$i.'">'.$outputdata.'</td>';
                                                }
                                                else {      
                                                    $outputdata = $i<$tcol ? __processTabularOutput(@$variants[$i]->spec[$slug][$cslug]) : '-';
                                                    echo '<td class="col'.$i.'">'.$outputdata.'</td>';
                                                }
                                            }
                                        @endphp
                                    </tr>
                                @endforeach
                                </table>
                            </li>
                        </ul>
                    </div>
                @endif
            @endforeach
        </div>
        @endif
    </div>
    <div class="bottom-spacer bg-grey2"></div>
</section>

{{--  -------------------------------------- THE JS -------------------------------------------------  --}}
<script language="javascript">
    $(document).ready(function(){
        var __APIPATH = '{{$APIPATH}}';
        __APIPATH = '/deltaecho/api/';
        var __variants = [];

        @if(@$variantids)
            __variants = {{json_encode($variantids)}};

            //
            $('.datacol').css('opacity', .2);
            $('.variant-select>li').hide();
            $('.variant-select>li:nth-child(1)').show();

            for(i=0;i<__variants.length;i++){
                $('.colnum'+(i)).css('opacity', 1);
                $('.variant-select>li:nth-child('+(i+2)+')').show();
            }
            //
        @endif

        function populateSpec(pos, vid){
            var label;
            var tickimg = '{{asset('img/interface/icn-tick-black.png')}}';
            //empty col
            $('.col'+pos).html('Retrieving...');

            $.getJSON(__APIPATH+'fullspec_variant_'+vid+'.json', function(dd) {
                console.log(dd)
                if(dd.payload){
                    $('.col'+pos).html(processTabularOutput('', tickimg));
                    // for (var key in dd.payload.specitem) {
                    //     //console.log(key);

                    //     label = dd.payload.specitem[key];
                    //     label = processTabularOutput(label, tickimg)
                    //     $('.'+key+' .col'+pos).html(label)
                    // }

                    for (var keysection in dd.payload) {
                        //console.log(keysection);
                        for (var key in dd.payload[keysection]) {
                            //console.log(key);
                            // sanitize key: remove unsafe characters
                            let safeKey = key
                                .toLowerCase()              // optional: normalize case
                                .replace(/\s+/g, '_')       // replace spaces with underscores
                                .replace(/[()]/g, '')       // remove parentheses
                                .replace(/[^a-z0-9_-]/g, ''); // strip anything not alphanumeric, underscore, or dash

                            label = dd.payload[keysection][safeKey];
                            label = processTabularOutput(label, tickimg)
                            $('.'+safeKey+' .col'+pos).html(label)
                        }
                    }

                    normalise_td_height();
                } else {
                    $('.col'+pos).html('(No data available)');
                }
            });
        }
        $('.sai-dd-item li').click(function(){

            let id = $(this).data('vid');

            if(id == 61){
                __variants[$(this).data('col')] = 62;
                populateSpec($(this).data('col'), 62);
            }else if(id == 62){
                __variants[$(this).data('col')] = 61;
                populateSpec($(this).data('col'), 61);
            }else {
                __variants[$(this).data('col')] = $(this).data('vid');
                populateSpec($(this).data('col'), $(this).data('vid'));
            }

            // __variants[$(this).data('col')] = $(this).data('vid');
            // populateSpec($(this).data('col'), $(this).data('vid'));
        });

        console.log("Spec Compare Dynamic v2.0");
    })
</script>
