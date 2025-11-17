@php

$model_slug = "";
$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'variants.json', false, $honda_api_context);
$data = json_decode($data);
$allvariants = $data->payload;

// all label legend
$data = file_get_contents($APIPATH.'spec_legend.json', false, $honda_api_context);
$data = json_decode($data, true);
$labellagend = $data['payload'];

//grouped legends for table generation
$data = file_get_contents($APIPATH.'spec_legend_grouped.json', false, $honda_api_context);
$data = json_decode($data);
$groupedlegend = $data->payload;


@endphp
@extends('layouts.base')

@section('page-title')
    Model Compare
@stop

@section('content')

<section class="model-inner-container stage-contained spec-inner drop-table">
    <div class="intro">
        <h2>Compare Models</h2>
        <div class="intro-title grey">Select your desired Honda models for a specs comparison.</div>
    </div>

    <div class="details-container">
        @include('components.model-dropdown')
    </div>
</section>

{{--  -------- COMPARE TABLE & FUNCTIONALITIES -------------------  --}}
@include('components.spec-compare')

{{--

<section class="table-content-container">
    <div class="stage-contained table-content">
        <div class="spec-title more first">Engine<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr class="bold">
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    <tr>
                        <td>DISPLACEMENT (CC)</td>
                        <td>1,799</td>
                        <td>1,498</td>
                        <td>1,498</td>
                        <td>1,498</td>
                    </tr>
                    <tr>
                        <td>FUEL SUPPLY SYSTEM</td>
                        <td>Electronic Fuel Injection (PGM-FI)</td>
                        <td>Electronic Fuel Injection (PGM-FI)</td>
                        <td>Electronic Fuel Injection (PGM-FI)</td>
                        <td>Electronic Fuel Injection (PGM-FI)</td>
                    </tr>
                    <tr>
                        <td>Maximum Power [PS(kW)@rpm]</td>
                        <td>141(104)@6,500</td>
                        <td>173(127)@5,500</td>
                        <td>173(127)@5,500</td>
                        <td>173(127)@5,500</td>
                    </tr>
                    <tr>
                        <td>Maximum Torque [Nm(kg-m)@rpm]</td>
                        <td>174(17.4)@4,300</td>
                        <td>220(22.4)@1,700-5,500</td>
                        <td>220(22.4)@1,700-5,500</td>
                        <td>220(22.4)@1,700-5,500</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="spec-title more">Transmission<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr>
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="spec-title more">Performance<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr>
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="spec-title more">Steering System<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr>
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="spec-title more">Suspension System<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr>
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="spec-title more">Breaking System<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr>
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="spec-title more">Tyres & Wheels<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr>
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="spec-title more">Dimensions<div class="button"></div></div>
        <div class="spec-details expand-content black" style="display: none;" >
            <ul>
                <li>
                <table>
                    <tr>
                        <td>STARTING PRICE</td>
                        <td>RM110,430.00</td>
                        <td>RM124,080.00</td>
                        <td>RM131,880.00</td>
                        <td>RM131,880.00</td>
                    </tr>
                    <tr>
                        <td>ENGINE TYPEa</td>
                        <td>4 Cylinder, 16 Valve, SOHC i-VTEC Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO Engine</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                        <td>4 Cylinder, 16 Valve, DOHC VTEC TURBO</td>
                    </tr>
                    </table>
                </li>
            </ul>
        </div>
    </div>

</section>  --}}

<script>
 $("document").ready(function(){
        $( ".sai-ddselect-0 > .dropdown-select > ul.sai-dd-item > li:nth-child(18)").insertBefore(".sai-ddselect-0 > .dropdown-select > ul.sai-dd-item > li:nth-child(15)" );
        $( ".sai-ddselect-1 > .dropdown-select > ul.sai-dd-item > li:nth-child(18)").insertBefore(".sai-ddselect-1 > .dropdown-select > ul.sai-dd-item > li:nth-child(15)" );
        $( ".sai-ddselect-2 > .dropdown-select > ul.sai-dd-item > li:nth-child(18)").insertBefore(".sai-ddselect-2 > .dropdown-select > ul.sai-dd-item > li:nth-child(15)" );
        $( ".sai-ddselect-3 > .dropdown-select > ul.sai-dd-item > li:nth-child(18)").insertBefore(".sai-ddselect-3 > .dropdown-select > ul.sai-dd-item > li:nth-child(15)" ); 
 
        $( "[data-toggle=toggle0] > [data-vid=62]").insertBefore("[data-toggle=toggle0] > [data-vid=61]");
        $( "[data-toggle=toggle1] > [data-vid=62]").insertBefore("[data-toggle=toggle1] > [data-vid=61]");
        $( "[data-toggle=toggle2] > [data-vid=62]").insertBefore("[data-toggle=toggle2] > [data-vid=61]");
        $( "[data-toggle=toggle3] > [data-vid=62]").insertBefore("[data-toggle=toggle3] > [data-vid=61]");
        $( "[data-toggle=toggle4] > [data-vid=62]").insertBefore("[data-toggle=toggle4] > [data-vid=61]");

        $( "[data-toggle=toggle0] > [data-vid=54]").insertBefore("[data-toggle=toggle0] > [data-vid=41]");
        $( "[data-toggle=toggle1] > [data-vid=54]").insertBefore("[data-toggle=toggle1] > [data-vid=41]");
        $( "[data-toggle=toggle2] > [data-vid=54]").insertBefore("[data-toggle=toggle2] > [data-vid=41]");
        $( "[data-toggle=toggle3] > [data-vid=54]").insertBefore("[data-toggle=toggle3] > [data-vid=41]");
        $( "[data-toggle=toggle4] > [data-vid=54]").insertBefore("[data-toggle=toggle4] > [data-vid=41]");

        // $('li[data-vid="641"]').remove();

  })
</script>

@stop
