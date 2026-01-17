@php
// Filter grouped legend to only show EV spec items
$evGroupedLegend = collect($groupedlegend)->filter(function($maincat) {
    return $maincat->spec_type === 'ev';
});

// Convert labelOverrides to array if it's an object
if (is_object($labelOverrides)) {
    $labelOverrides = (array) $labelOverrides;
}
@endphp

<style type="text/css">
    @if(count($variantids) == 1)
    .col0 {
        width: 40% !important;
    }
    @endif
    @media only screen and (max-width: 1024px) {
    .table-content-container .spec-details li table td:nth-child(2), .table-content-container .spec-details li table td:nth-child(3){
        width: calc(100% - 3px) !important;
        text-align: center;
    }
    @media only screen and (max-width: 1024px) {
    .drop-table.model-inner-container ul.selection li {
        width: calc(100% - 3px) !important;
        text-align: center;
    }
    @media only screen and (max-width: 1024px) {
        .table-content-container .spec-title.more.active {
            text-align: center;
        }
    }
    @media only screen and (max-width: 480px) {
        .dropdown-select .sai-dd-label {
            position: static; /* remove absolute positioning */
            display: block;
            width: 100%; /* expand to container width */
            text-align: center; /* center the text */
            padding: 10px 0; /* optional: vertical padding */
        }
    }
    @media only screen and (max-width: 480px) {
        .drop-table.model-inner-container ul.selection li {
            height: 30px !important;
        }
    }
    @media only screen and (max-width: 1024px) {
        .dropdown-select .sai-dd-label {
            position: static; /* remove absolute positioning */
            display: block;
            width: 100%; /* expand to container width */
            text-align: center; /* center the text */
            padding: 10px 0; /* optional: vertical padding */
        }
    }
    @media only screen and (max-width: 1024px) {
        .drop-table.model-inner-container ul.selection li {
            height: 30px !important;
        }
    }
    @media only screen and (max-width: 600px) {
        .center-content-mobile{
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }
    }

</style>
<section class="table-content-container">
    <div class="stage-contained table-content">
        @foreach($evGroupedLegend as $maincat)
            <div class="spec-title more first active slug-{{$maincat->slug}}" data-slug="{{$maincat->slug}}">
                {{ $labelOverrides[$maincat->slug] ?? $maincat->name }}<div class="button"></div>
            </div>
            <div class="spec-details expand-content black">
                <ul>
                    <li>
                        <table>
                        @foreach($maincat->childspec as $child)
                            <tr class="{{$child->slug}} {{$maincat->slug}}-child">
                                <td>{{ $labelOverrides[$child->slug] ?? $child->name }}</td>
                                @php
                                    $tcol = empty($variants) ? 1 : count($variants);
                                    if($tcol>5) $tcol = 5;
                                    
                                    for ($i=0; $i<$tcol; $i++) {
                                        $outputdata = $i<$tcol ? __processTabularOutput(@$variants[$i]->spec['specitem'][$child->slug]) : '-';
                                        echo '<td class="col'.$i.' center-content-mobile">'.$outputdata.'</td>';
                                    }
                                @endphp
                            </tr>
                        @endforeach
                        </table>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
    <div class="bottom-spacer bg-grey2"></div>
</section>

{{--  -------------------------------------- THE JS -------------------------------------------------  --}}
<script language="javascript">
    $(document).ready(function() {
        var __APIPATH = '{{ $APIPATH }}';
        __APIPATH = '/deltaecho/api/';
        var __variants = [];

        @if (@$variantids)
            __variants = {{ json_encode($variantids) }};

            //
            $('.datacol').css('opacity', .2);
            $('.variant-select>li').hide();
            $('.variant-select>li:nth-child(1)').show();

            for (i = 0; i < __variants.length; i++) {
                $('.colnum' + (i)).css('opacity', 1);
                $('.variant-select>li:nth-child(' + (i + 2) + ')').show();
            }
            //
        @endif

        function populateSpec(pos, vid) {
            var label;
            var tickimg = '{{ asset('img/interface/icn-tick-black.png') }}';
            //empty col
            $('.col' + pos).html('Retrieving...');

            $.getJSON(__APIPATH + 'fullspec_variant_' + vid + '.json', function(dd) {
                if (dd.payload) {
                    $('.col' + pos).html(processTabularOutput('', tickimg));

                    for (var keysection in dd.payload) {
                        for (var key in dd.payload[keysection]) {
                            label = dd.payload[keysection][key];
                            label = processTabularOutput(label, tickimg)
                            $('.' + key + ' .col' + pos).html(label)
                        }
                    }

                    normalise_td_height();
                } else {
                    $('.col' + pos).html('(No data available)');
                }
            });
        }
        
        $('.sai-dd-item li').click(function() {
            let id = $(this).data('vid');
            __variants[$(this).data('col')] = id;
            populateSpec($(this).data('col'), id);
        });

    })
</script>
