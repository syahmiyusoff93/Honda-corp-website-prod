<section class="table-content-container">
    <div class="stage-contained table-content">
        @foreach($groupedlegend as $maincat)
            <div class="spec-title more first active slug-{{$maincat->slug}}" data-slug="{{$maincat->slug}}">
                {{$maincat->name}}<div class="button"></div>
            </div>
            <div class="spec-details expand-content black">
                <ul>
                    <li>
                        <table>
                        @foreach($maincat->childspec as $child)
                            <tr class=" {{$child->slug}}  {{$maincat->slug}}-child">
                                <td>{{$child->name}}</td>
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
                    <div class="spec-title more first active slug-{{$slug}}" data-slug="{{$slug}}">{{$labellagend[$slug]}}<div class="button"></div></div>
                    <div class="spec-details expand-content black">
                        <ul>
                            <li>
                            <table class="majorEquipmentTable">
                                @foreach($maincat as $cslug=>$child)
                                    <tr class=" {{$cslug}} {{$slug}}-child">
                                        @if ($model_slug == 'hrv')
                                            <td>
                                                @if (isset($labellagend[$cslug]) && $labellagend[$cslug] == 'Apple CarPlay™ & Android Auto™ Connectivity*')
                                                    Wireless Apple CarPlay™ & Android Auto™ Connectivity*
                                                @else
                                                    {{$labellagend[$cslug]}}
                                                @endif
                                            </td>
                                        @else
                                            <td>{{$labellagend[$cslug]}}</td>
                                        @endif
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
        __APIPATH = '/api/';
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
                            label = dd.payload[keysection][key];
                            label = processTabularOutput(label, tickimg)
                            $('.'+key+' .col'+pos).html(label)
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

        console.log("1.01");

        const trElement = document.querySelector('tr.dimension-boot-capacity');
        if(trElement != null){
            const firstTdElement = trElement?.querySelector('td:first-child');
            firstTdElement.textContent = "Boot Capacity (Litre)";
        }

        const trElement2 = document.querySelector('tr.acceleration');
        if(trElement2 != null){
            const firstTdElement2 = trElement2?.querySelector('td:first-child');
            firstTdElement2.innerHTML = "Acceleration <br> [0 - 100km/h (secs)]";
        }

        const trElement3 = document.querySelector('tr.side-mirror-with-turning-lights');
        if(trElement3 != null){
            const firstTdElement3 = trElement3?.querySelector('td:first-child');
            firstTdElement3.textContent = "Side Mirror with Turning Lights";
        }

        const trElement4 = document.querySelector('tr.smart-entry-with-push-start-button');
        if(trElement4 != null){
            const firstTdElement4 = trElement4?.querySelector('td:first-child');
            firstTdElement4.textContent = "Smart Entry with Push Start Button";
        }

        const trElement5 = document.querySelector('tr.centre-console-with-armrest');
        if(trElement5 != null){
            const firstTdElement5 = trElement5?.querySelector('td:first-child');
            firstTdElement5.textContent = "Centre Console with Armrest";
        }

        const trElement6 = document.querySelector('tr.security-alarm-with-immobiliser');
        if(trElement6 != null){
            const firstTdElement6 = trElement6?.querySelector('td:first-child');
            firstTdElement6.textContent = "Security Alarm with Immobiliser";
        }

        const trElement7 = document.querySelector('tr.steering-system-turning-radius');
        const firstTdElement7 = trElement7?.querySelector('td:first-child');
        if(trElement7 != null){
            firstTdElement7.textContent = "Turning Radius at Body (m)";
        }

        const trElement8 = document.querySelector('tr.center-console-with-armrest');
        if(trElement8 != null){
            const firstTdElement8 = trElement8?.querySelector('td:first-child');
            firstTdElement8.textContent = "Centre Console with Armrest";
        }

        var link = window.location.href;
        var isCivic = /civic/i.test(link);

        if(isCivic){
            const trElement9 = document.querySelector('tr.wheels-tyres-spare-tyre-size');
            if(trElement9 != null){
                const firstTdElement9 = trElement9?.querySelector('td:first-child');
                firstTdElement9.textContent = "Spare Wheel";
            }

            const trElement10 = document.querySelector('tr.active-noise-control-with-active-sound-control');
            if(trElement10 != null){
                const firstTdElement10 = trElement10?.querySelector('td:first-child');
                firstTdElement10.textContent = "Active Noise Control with Active Sound Control";
            }
        }

        // firstTdElement.textContent = "Boot Capacity (Litre)";
        // firstTdElement2.textContent = "Acceleration [0 - 100km/h (secs)]";
        // firstTdElement3.textContent = "Side Mirror with Turning Lights";
        // firstTdElement4.textContent = "Smart Entry with Push Start Button";
        // firstTdElement5.textContent = "Centre Console with Armrest";
        // firstTdElement6.textContent = "Security Alarm with Immobiliser";
        // firstTdElement7.textContent = "Turning Radius at Body (m)";
    })
</script>
