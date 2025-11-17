@extends('layouts.base')

@section('content')
    <div class="mainstage">
        <div><img class="heroimg" src="/img/interface/404-Honda@2x.png" alt="404 image"></div>
        <br>
        <div class="inner-title">OOPS! LOOKS LIKE YOU TOOK A WRONG TURN</div>
        <div>Please use the link below to get back to the right route.</div>
        <a href="/"><div class="cta mini-arrow-right">HOME</div></a>
    </div>


    <style>
        .mainstage {widows: 100%; min-height: calc(100vh - 70px - 130px); padding:20px 40px;
            display: flex;align-items: center; justify-content: center;flex-direction: column;}

        .mainstage div {margin-bottom:20px; text-align: center; line-height: 1.4em;}
        .heroimg {width:100%; max-width:902px; max-width: 500px;}


        @media only screen and (max-width: 768px){
            .mainstage {min-height: calc(100vh - 70px - 302px); }
        }
        @media only screen and (max-width: 500px){
            .mainstage {min-height: calc(100vh - 70px - 320px); }
        }
    </style>
@stop
