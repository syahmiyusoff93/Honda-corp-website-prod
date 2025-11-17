
@php
    // preprocessing content - SAI 20200913
    $content = stripslashes($career_data->careerContent);
    $content = str_replace('Job Description:', '<span style="color:#ff0000;">Job Description: </span>', $content);
    $content = str_replace('Job Requirements:', '<span style="color:#ff0000;">Job Requirements: </span>', $content);
    $content = str_replace('Requirements:', '<span style="color:#ff0000;">Requirements: </span>', $content);
    $content = str_replace('Responsibilites:', '<span style="color:#ff0000;">Responsibilites: </span>', $content);

@endphp

@extends('layouts.base')

@section('page-title')
{{$career_data->careerTitle}} | Career
@endsection

@section('content')


<div class="body-wrapper model-inner-container">

    <div style="height: 50px;background: #ececec;margin: -1px;">
        <a href="{{url('career')}}" class="">
                <div style="padding: 15px 30px;font-size: 12px;">
                    <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                     <span class="backtocopy" style="color: #565656;padding: 0 5px;width:unset;bottom:3px;">BACK TO CAREER</span>
                </div>
            </a>
    </div>

    <section class="inner-container intro">
        <div class="career-details-title">
            <div class="topgap" style="height:0px;"></div>
            <h2 class="career-position-title">{{$career_data->careerTitle}}</h2>
            <div class="department-loc grey">{{$career_data->careerByDealerName}}, {{$career_data->careerLocation}}</div>
        </div>
    </section>

    <section class="inner-container bg-grey">
        <div class="career-content-container">

            {!! $content !!}

            {{-- <div class="job-content-title">Job Responsibility :</div>
            <div class="job-content">
                <ol>
                    <li>Responsible in managing all Division report & data.</li>
                    <li>Ensure accuracy & validity of reporting & data at all time.</li>
                    <li>Conduct rigorous data analysis to identify key opportunities for improvement.</li>
                    <li>Lead improvement on overall Division report and data.</li>
                </ol>
            </div>

            <div class="job-content-title">Requirement : </div>
            <div class="job-content">
                <ol>
                    <li>Candidate must possess at least Bachelor’s Degree or equivalent.</li>
                    <li>High proficient in Microsoft Excel & PowerPoint.</li>
                    <li>Good presentation skills.</li>
                    <li>Able to use the information gathered to propose & make the right decisions.</li>
                    <li>Exceptional attention to details.</li>
                    <li>Able to adapt to fast moving environment.</li>
                    <li>Good command in Bahasa Malaysia & English.</li>
                </ol>
            </div> --}}


        </div>
        <!-- end career details -->

    </section>


    <section class="inner-container">
        <div class="apply-job-container">
            <h2 class="career-position-title">STAY UPDATED WITH CURRENT JOBS</h2>
            <div class="job-content">To apply for a job with Honda, applicants are encouraged to email their <span style="white-space:nowrap;">Curriculum Vitae to:</span><br><a href="mailto:recruitment@honda.net.my" target="_blank" style="color:#e01327;">recruitment@honda.net.my</a></div><br>
            <div class="job-content">To apply for a job with Honda’s dealer, kindly submit to the relevant email shown at the bottom of the job posting.</div><br>
            <div class="job-content">Alternatively, stay updated with Honda’s latest job postings on LinkedIn:</div><br>

            <div class="clearfix"></div>
            <div class="btn-container">
                <a href="https://www.linkedin.com/company/honda-malaysia/" class="prime-cta-black" style="text-transform: unset;">
                <span>Honda's LINKEDIN</span>
                <div class="overlay"></div>
                </a>
            </div>
        </div>
    </section>

</div>

<style>
            /* news details */
            .career-details-title {max-width: 1140px;margin: auto;}
            .career-position-title {text-align: left;}
            .department-loc {text-align: left;font-weight: 400;text-transform: unset;margin: auto;padding-bottom: 15px;}
            .career-content-container {max-width: 1140px;width: 100%;margin: auto;padding: 30px 0;}
            .job-content {text-align: left;font-size: 16px;color: #5E6063;letter-spacing: 0.25px;line-height: 1.6rem;}
            .job-content-title {font-size:18px; color: #E01327;}

            .apply-job-container {max-width: 1140px;width: 100%;margin: auto;padding: 30px 0;}
            /* end */

            hr {width: 90%; opacity:0.3;}

            .career-content-container {line-height: 1.5em;}
            .career-content-container ol, .career-content-container ol>li {list-style:decimal;}
            .career-content-container ol>li {margin-bottom:.5em; margin-left:-15px;}

            .career-content-container ol>li ul, .career-content-container ol>li ol {margin:10px 25px;}
            .career-content-container ol>li ol>li, .career-content-container ol>li ul>li {list-style-type:lower-roman;}


            @media only screen and (max-width: 640px) {
                .body-wrapper section {padding: 0 20px;}
            }
</style>

@stop

