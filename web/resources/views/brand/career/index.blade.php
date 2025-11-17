@php
    $greyshade = ['#282A2F','#838586', '#C2C3C4'];

    $select['department'] = [];
    $select['location'] = [];

    $select['honda']['department'] = [];
    $select['honda']['location'] = [];

    $select['dealer']['department'] = [];
    $select['dealer']['location'] = [];

    foreach ($career_list as $item){
        if(!in_array(trim($item->careerDepartment), $select['department'])){
            $select['department'][] = trim($item->careerDepartment);
        }

        if(!in_array(trim($item->careerLocation), $select['location'])){
            $select['location'][] = trim($item->careerLocation);
        }

        if(!in_array(trim($item->careerLocation), $select[trim($item->careerBy)]['location'])){
            $select[trim($item->careerBy)]['location'][] = trim($item->careerLocation);
        }

        if(!in_array(trim($item->careerDepartment), $select[trim($item->careerBy)]['department'])){
            $select[trim($item->careerBy)]['department'][] = trim($item->careerDepartment);
        }
    }

    sort($select['department']);
    sort($select['location']);
    sort($select['honda']['department']);
    sort($select['honda']['location']);
    sort($select['dealer']['department']);
    sort($select['dealer']['location']);

    array_unshift($select['department'], 'All Divisions');
    array_unshift($select['location'], 'All States');
@endphp

@extends('layouts.base')
@section('page-title')
Career
@endsection

@section('content')
<section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li><a href="{{url('locate-us')}}">LOCATE US</a></li>
                    <li><a href="{{url('customer-service')}}">CUSTOMER SERVICE</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('career')}}">CAREER</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>

<style>
/* overwrite */
    .content-inner .career-banner {background: url({{url('img/about/achievements/achievements-banner2.jpg')}}) no-repeat top center ; background-size: cover }
    .service-tab-menu {background: #e4e4e4; margin-bottom: -70px;}
    .service-tab-menu ul li a {color: #000;}

    @media only screen and (max-width: 640px) {
        /* .service-tab-menu {display: none;} */
    }
</style>
</section>

    <div class="body-wrapper">

        <section class="content-inner">
            <div class="hero-banner career-banner">
                <div class="text-container">
                    <div class="cat"></div>
                    <div class="header">CAREER</div>
                </div>
            </div>

            <div class="inner-content-section content-area">
                <h2>ENJOY A FULFILLING CAREER WITH TEAM Honda</h2>
                <div class="content-copy" style="max-width: 700px;margin: auto;">
                <p>We seek highly motivated and talented individuals to join us at Honda Malaysia. Embark on a journey of success with our dynamic, rapidly expanding team.</p>
                </div>
                <div class="clearfix"></div>
                <div class="btn-container">
                    <a href="#careersection" class="prime-cta-black">
                    <span>VIEW JOB VACANCIES</span>
                    <div class="overlay"></div>
                    </a>
                </div>
            </div>

            <div style="background:whitesmoke;">
                <div class="inner-content-section content-area">
                    <h2>WORKING IN Honda</h2>
                    <div class="content-copy">
                        <div class="row-content-10reasons content-copy-left">
                            <div class="column-content-10reasons">
                                <div class="content-copy-no">01</div>
                                <p><strong>Benefits of Employment</strong></p>
                                <p>Honda Associates are our most valuable asset and Honda offers a wide range of benefits to meet the needs of our diverse workforce.</p>
                            </div>
                            <div class="column-content-10reasons mobile-bg-grey">
                                <div class="content-copy-no">02</div>
                                <p><strong>Commitment to Inclusion and Diversity</strong></p>
                                <p>Honda Associates are our most valuable asset and Honda offers a wide range of benefits to meet the needs of our diverse workforce.</p>
                            </div>
                        </div>
                        <div class="row-content-10reasons content-copy-left desktop-bg-grey">
                            <div class="column-content-10reasons">
                                <div class="content-copy-no">03</div>
                                <p><strong>Honda Philosophy</strong></p>
                                <p>The Honda Philosophy has guided our direction, and continues to serve as the basis for our daily activities. At the core of the Honda Philosophy is the concept of "Respect for the Individual." This means that we recognize and respect individual differences in one another, that we treat each other fairly, and that we establish relationships built on mutual trust. By doing this we encourage each Associate to think creatively and show individual initiative and judgment.</p>
                            </div>
                            <div class="column-content-10reasons mobile-bg-grey">
                                <div class="content-copy-no">04</div>
                                <p><strong>Corporate Social Responsibility</strong></p>
                                <p>Honda has a long-standing commitment to be "a company that society wants to exist." Honda is working to address the world's environmental challenges through a comprehensive approach for the near and longer terms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div id="careersection" class="inner-content-section content-area">
                <h2>JOIN US ON A JOURNEY OF GROWTH AND SUCCESS</h2>
                <div class="content-copy" style="max-width: 700px;margin: auto;">
                <p>As we continue to expand our operations in Malaysia, we invite ambitious and highly motivated individuals to join our dynamic team.</p>
                </div>
                <div class="clearfix"></div>
            </div>

            {{-- THIS PROBABLY A NEW CONTENT TYPE FOR PAGE BUILDER --}}
                <div class="comp-tabbed-content">
                    <div class="tab-nav top-line-gap">
                        <ul class="body-copy">
                            <li class="thetab animate" data-target="careerhonda" data-filter="honda">Honda</li>
                            <li class="thetab animate" data-target="careerdealers" data-filter="dealer">Dealers</li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>

                    <div class="formsection globalform filters">
                        {{-- EVERY <ul> IS A ROW --}}
                            ALL
                        <ul class="formrow">
                            {!! form_generate_select('', 'department', $select['department'], 'w20', '', '', 'All Divisions') !!}
                            {!! form_generate_select('', 'location', $select['location'], 'w20 removepaddingmobile', '', '', 'All States') !!}
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="formsection globalform filters honda-filter">
                        {{-- EVERY <ul> IS A ROW --}}
                            HONDA
                        <ul class="formrow">
                            {!! form_generate_select('', 'department', $select['honda']['department'], 'w20', '', '', 'All Divisions') !!}
                            {!! form_generate_select('', 'location', $select['honda']['location'], 'w20 removepaddingmobile', '', '', 'All States') !!}
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="formsection globalform filters dealer-filter">
                        {{-- EVERY <ul> IS A ROW --}}
                            DEALER
                        <ul class="formrow">
                            {!! form_generate_select('', 'department', $select['dealer']['department'], 'w20', '', '', 'All Divisions') !!}
                            {!! form_generate_select('', 'location', $select['dealer']['location'], 'w20 removepaddingmobile', '', '', 'All States') !!}
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="row header for-desktop">
                        <div class="col">POSITION</div>
                        <div class="col">DIVISION</div>
                        <div class="col">LOCATION</div>
                        <div class="col">CAREER BY</div>
                        <div class="col">&nbsp;</div>
                    </div>

                    <div class="tab-content">

                        <div id="careerhonda" class="tab-body">
                            @foreach ($career_list as $item)
                                @if ($item->careerBy=='honda')
                                    <div class="row clisting" data-dept="{{$item->careerDepartment}}" data-loc="{{$item->careerLocation}}" data-cby="{{$item->careerBy}}">
                                        <div class="col"><a href="{{url('career/'.$item->careerID.'/'.$item->careerPermalink)}}"> {{$item->careerTitle}}</a></div>
                                        <div class="col">{{$item->careerDepartment}}</div>
                                        <div class="col for-desktop">{{$item->careerLocation}}</div>
                                        <div class="col">{{$item->careerByDealerName}}<span class="for-mobile">, {{$item->careerLocation}}</span></div>
                                        <div class="col"><a href="{{url('career/'.$item->careerID.'/'.$item->careerPermalink)}}"> <img class="arrow" src="{{url('img/interface/arrow-red-down.png')}}"></a></div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="row noresult">Do check back regularly for updates on available job opportunities.</div>
                        </div>

                        <div id="careerdealers" class="tab-body">
                            @foreach ($career_list as $item)
                                @if ($item->careerBy=='dealer')
                                    <div class="row clisting" data-dept="{{$item->careerDepartment}}" data-loc="{{$item->careerLocation}}" data-cby="{{$item->careerBy}}">
                                        <div class="col"><a href="{{url('career/'.$item->careerID.'/'.$item->careerPermalink)}}"> {{$item->careerTitle}}</a></div>
                                        <div class="col">{{$item->careerDepartment}}</div>
                                        <div class="col for-desktop">{{$item->careerLocation}}</div>
                                        <div class="col">{{$item->careerByDealerName}}<span class="for-mobile">, {{$item->careerLocation}}</span></div>
                                        <div class="col"><a href="{{url('career/'.$item->careerID.'/'.$item->careerPermalink)}}"> <img class="arrow" src="{{url('img/interface/arrow-red-down.png')}}"></a></div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="row noresult">Do check back regularly for updates on available job opportunities.</div>
                        </div>

                    </div>


                </div>
            {{-- [END] --}}
            <div class="bg-grey2">
                <div class="inner-content-section content-area" style="max-width: 700px;margin: auto;">
                    <h2>STAY UPDATED WITH CURRENT JOB VACANCIES</h2>
                    <div class="content-copy">
                        <p>To apply for a job with Honda, applicants are encouraged to email their <span style="white-space:nowrap;">Curriculum Vitae to:</span><br><a href="mailto:recruitment@honda.net.my" target="_blank" style="color:#e01327;">recruitment@honda.net.my</a></p>
                        <p>To apply for a job with Honda’s dealer, kindly submit to the relevant email shown at the bottom of the job posting.</p>
                        <p>Alternatively, stay updated with Honda’s latest job postings on LinkedIn:</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="btn-container">
                        <a href="https://www.linkedin.com/company/honda-malaysia/" class="prime-cta-black"  style="text-transform: unset;">
                            <span>Honda's LINKEDIN</span>
                            <div class="overlay"></div>
                        </a>
                    </div>
                </div>
            </div>

        </section>

        {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
        @include('form.script-style')

        <style>
            .globalform {text-align: center;}
            .row {padding: 45px 0px; border-bottom:1px solid #d8d8d8; max-width: 1000px; margin:auto;}
            .row.header {color: black; font-weight: 500; border:none;}
            .row.clisting:last-of-type {border:0;}
            .col {display: inline-block; width:19%; padding-left:20px;}
            .col:first-of-type {width: 35%;}
            .col:last-of-type {width: 5%; text-align: right; padding-right: 20px;}

            .col a{color:red;}
            .col .arrow {transform: rotate(270deg);}
            .col span {display: unset;}

            .globalform .formrow > li {display: inline-block; float: none;}

            .noresult {padding: 50px 20px; border:0; color:red; font-style: italic;}

            .content-inner .content-area {max-width: 1200px;}
            .column-content-10reasons {padding: 30px 50px 0 50px; }
            .content-copy-no {margin-left: -50px;}

            .filters {display:none;}

            /* overwrite */
            .content-inner .inner-content-section .content-copy p {padding-bottom: 10px}





            @media only screen and (max-width: 640px) {
                .content-copy-no {margin-left: -50px;}
                .column-content-10reasons {padding-left: 55px;}
                .row {padding:20px 0;}
                .row .col {width:100%; margin-bottom:5px;}
                .row .col:nth-child(1) {width:calc(100% - 50px);}
                .row .col:last-child {position: absolute; right:20px; top:50%;}
                .for-desktop {display: none;}

                /* overwrite */
                .globalform .formrow > li {width: 100% !important;}
                .globalform .formrow .removepaddingmobile {padding-left: 0;}
            }
        </style>

        <script>
            var filter_by='', filter_dept='', filter_loc='';

            $(document).ready(function(){

                $('.comp-tabbed-content .thetab').click(function(){
                    $('.comp-tabbed-content .thetab').removeClass('active');
                    $('.comp-tabbed-content .tab-body').hide();
                    $(this).toggleClass('active');
                    $('#'+$(this).data('target')).show();

                    filter_by = $(this).data('filter');

                    $('.filters').hide();
                    $('.'+filter_by+'-filter').show();
                    //$('.'+filter_by+'-filter .input-department .dropdown-menu li:first-of-type, .'+filter_by+'-filter .input-location .dropdown-menu li:first-of-type').trigger('click')
                    runfilter();

                    // mobile positioning
                    var ul = $(this).parent()
                    var ww = $(window).width();
                    var iw = ul.width();
                    //console.log(ww,iw);
                    //
                    if(ww<iw){
                        ul.css('left', 0).css('transform', 'translate(0,0)');
                        ul.css('left', -$(this).offset().left + 50)
                    } else {
                        ul.css('left', '50%').css('transform', 'translate(-50%,0)');
                    }
                })

                $('.comp-tabbed-content .thetab:first-of-type').trigger('click');
                
                $(window).resize(function(){
                    $('.comp-tabbed-content .thetab:first-of-type').trigger('click');
                })

                //

                function runfilter(){
                    console.log('FILTER', filter_by, filter_dept, filter_loc);
                    //return true;

                    $('.clisting, .noresult').hide();
                    $('.clisting').each(function(){
                        if($(this).data("cby")==filter_by){
                            var deptcheck = (filter_dept=='' || filter_dept=='All Divisions' || $(this).data('dept')==filter_dept) ? true : false;
                            var loccheck = (filter_loc==''||filter_loc=='All States' || $(this).data('loc')==filter_loc) ? true : false;
                            if(deptcheck && loccheck){
                                $(this).show();
                            }
                        }
                    })
                    evaluateFilterResult();
                }

                function evaluateFilterResult(){
                    $('#careerhonda, #careerdealers').each(function(){
                        var careerby = $(this);
                        var num = careerby.find('.clisting:visible').length;
                        if(num==0){
                            careerby.find('.noresult').show();
                        }
                    })
                }

                $('.input-department .dropdown-menu li').click(function(){
                    filter_dept = $(this).data('mslug');
                    runfilter();
                })
                $('.input-location .dropdown-menu li').click(function(){
                    filter_loc = $(this).data('mslug');
                    runfilter();
                })

                
            })
        </script>
    </div>
@stop
