@php
    use Illuminate\Support\Str;
    //dd(Str::uuid()->toString());
@endphp

@extends('layouts.base')


@section('content')

    <div style="padding: 40px 20px; text-align:center;">
        <h1>Honda Malaysia Website Design System</h1>
    </div>

    <h2>FORMS</h2>


    <form action="">
        <div class="globalform width-contained">

            {{-- START FORM SECTION --}}
                {!! form_generate_h4('1. SECTION TITLE') !!}
                <div class="formsection">
                    {{-- EVERY <ul> IS A ROW --}}
                    <ul class="formrow">
                        {!! form_generate_select('DROP DOWN', 'fieldname', ['option 1', 'option 2'], 'w20') !!}
                        {!! form_generate_text('TEXT FIELD', 'fieldname', 'w80 helper-class', '', '') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_radio('RADIO OPTION', 'fieldname', [['data', 'label'], [1,'first'],[2,'second'], [3, 'third']], '') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_text('EMAIL FIELD', 'email', 'helper-class', '', '') !!}
                    </ul>

                    <div class="clearfix"></div>
                </div>
            {{-- END FORM SECTION --}}

            {{-- MANUALLY DEVIDE BETWEEN SECTIONS USING NORMAL HORIZONTAL LINE, STYLED IN CSS --}}
                <hr>


            {{-- START ANOTHER FORM SECTION --}}
                {!! form_generate_h4('2. ANOTHER SECTION') !!}
                <div class="formsection">
                    <p>This is maybe another section of the form. A form section with a H4 title will have capability of toggling show/hide the section content.</p>
                </div>
            {{-- END FORM SECTION --}}

            {{-- MANUALLY DEVIDE BETWEEN SECTIONS USING NORMAL HORIZONTAL LINE, STYLED IN CSS --}}
                <hr>


            <div class="formsection" style="text-align: center;">
                <p>
                    There are 2 style type of form buttons; white and black:
                </p>
                {!! form_generate_button('BUTTON 1', 'cta-prev', '#', 'black' ) !!}
                {!! form_generate_button('BUTTON 2', 'cta-next', '#', 'white' ) !!}
            </div>

        </div>

    </form>

    {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
    @include('form.script-style')

@stop
