<style>
    .hondapart-banner {background: url(/img/hondaParts/00_CoverPhoto.png)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
    .text-container {top: 50%;transform: translate(0, -50%);text-align: center;}
    .text-container .header {font-size: 2.25rem;font-weight: 400;line-height: 54px;letter-spacing: 7.2px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}

    .desc-fold {padding: 70px 20px;}
    .desc-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;max-width: 780px;margin: auto;}

    .content-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;}
    

    .container {width: 100%;max-width: 1200px;margin: auto;padding: 70px 10px;position: relative;}
    .img-sec.float-right {text-align: right; overflow: hidden;}
    .img-sec {width: calc(50% - 25px);}

    .img-sec img {transition: all 1s;display: block;width: 100%;height: auto;transform: scale(1);image-rendering: auto;}
    .content-sec {width: 50%;margin-right: 25px;position: absolute;top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);height: 100%;}

    .float-right {float: right;}
    .float-left {float: left;}

    .content-sec.float-left {padding-left: calc(2.5% + 25px);position: absolute;left: 50%;}

    .detail-content {top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);}
    .rightpadding {padding-right:90px;}
    .centerdiv {margin:auto;margin-top: 20px;margin-bottom: 20px;}
    .maxwidth785 {margin: auto; max-width: 785px;}
    .grey {background: #f7f7f7;}
    /* overwrite */
    .spec-container .tab-slider-tabs, .comp-tabbed-content .tab-nav ul {background: unset;}
    .img-sec {width: calc(50% - 25px);}
    .img-sec-fullwidth {width: calc(100% - 0px);}
    .img-sec-80prec {width: calc(80% - 25px);}
    .img-sec-70prec {width: calc(70% - 25px);}
    .one-img-size {width:calc(27% - 25px);}
    .w5perc {width: 5%;}
    .w10perc {width: 10%;}
    .w20perc {width: 20%;}
    .icon-box {width: 50px; height: 50px; margin: auto;}
    .w718 {width:718px;}
    .w579 {width:579px;}
    .w1202 {width:1202px;}
    .h60 {height: 60px;}
    .h50 {height: 50px;}
    .h170 {height: 170px;}
    .border {border: 1px solid #000;}
    .margincenter{margin: 50% 0;}

    .vtecturbocol {float: left;width: 50%;}
    .vtecturborow:after {content: "";display: table;clear: both;}

    .sensingbtn {float: left;width: 23%;padding: 30px;background: white;margin: 12px; height: 171px;transition: all 1s;}
    .sensingbtn:hover{transform: scale(1.1);}
    .sensingbtn-row {max-width: 1200px;margin: auto;}
    .sensingbtn-row:after {content: "";display: table;clear: both;}
    .btnheight {height: 67px;}
    .sensingbtn::after {display: none;}
    .cta{display:block;}

    .hondaparts-box {float: left;width: 25%;padding: 20px;}
    .hondaparts-box.w33perc {width: 33%;}
    .hondaparts-box.w50perc {width: 50%;}
    .hondaparts-box.w70perc {width: 70%;}
    .hondaparts-box.w30perc {width: 30%;}
    .hondaparts-boxrow:after {content: "";display: table;clear: both;}
    .space {padding: 20px;}

    .hondaparts-box .desc-copy {line-height: 1.571em;letter-spacing: 0.6px;}
    .line-breaker {width: 785px;height: 1px;opacity: 0.7; background-color: #d8d8d8;margin: auto;}
    .pink-copy-no {color: #f7adb5;margin:auto;width: 40px;height: 45px;font-family: Poppins;font-size: 32px;font-weight: 600;font-stretch: normal;font-style: italic;line-height: normal;letter-spacing: 0.57px;text-align: center;}
    .content-copy-no {font-size: 32px;font-style: italic;color: #f7adb5;font-weight: bold;position: absolute;margin-left: 0; margin-top: 0;}
    .font14px{font-size: 14px;}
    .uppercase {text-transform: uppercase;}
    .bold {font-weight: 600;}
    .fontw500{font-weight: 500;}
    .textalignleft {text-align:left;}
    .marginleft30px{margin-left: 30px;}
    .marginleft55px{margin-left: 55px;}
    .marginleft75px{margin-left: 75px;}
    .redfont {color:#e01327;}

    .box-grey {height: 79px;background-color: #f5f5f5;padding: 0 10px;}
    .box-white {height: 79px;background-color: #fff;padding: 0 10px;}

    .checkmark {display:inline-block;width: 22px;height:22px;top: 5px;margin-right: 14px;
        -ms-transform: rotate(45deg); /* IE 9 */
        -webkit-transform: rotate(45deg); /* Chrome, Safari, Opera */
        transform: rotate(45deg);}
    .checkmark_stem {position: absolute;width: 5px;height: 17px;background-color: #e01327;left: 11px; top: 1px;}
    .checkmark_kick {position: absolute;width: 10px;height: 6px;background-color: #e01327;left: 6px;top: 12px;}

    .note-container .expand-content li {margin-bottom: 0px;}

    .desktop {display: block;}
    .mobile {display: none;}

    ul.list li {list-style-type: none;list-style-position: outside; margin-left: 10px;}
    ul.list li::before {content: "\2022";color: #e01327;font-weight: bold;display: inline-block; width: 1em;margin-left: -1em;}

    .steps-copy{
        display: flex;
    }

    @media only screen and (max-width: 768px) {
        .hondapart-banner {background: url(../img/hondaParts/00_CoverPhoto.png)no-repeat center;background-size: cover;height: 170px;}
        .text-container .header {font-size: 1.25rem;letter-spacing: 1.2px;line-height: 1.5;}


        .container {padding: 35px 10px;}
        .desc-copy {font-size: 0.9rem;text-align: left; top: calc(50% + 1px);transform: translateY(-50%);}
        .removetransform {transform: unset;}
        .btnheight {height: unset;}

        .float-right {float: none;}
        .float-left {float: none;}
        .img-sec {width:100%;}
        .content-sec {width: 100%;position:relative;top: unset;transform: unset;-webkit-transform: unset;padding-top: 20px;}
        .detail-content {top: unset;position: unset;transform:unset;-webkit-transform:unset;}
        .rightpadding {padding-right:0px;}

        .content-sec.float-left {padding-left: unset;position: unset;left: unset;}
        .vtecturbocol {width: 100%;}

        .sensingbtn {width: 95%;height: 90px;}
        .cta{display:none;}
        .sensingbtn::after {display:block;content: url(/img/interface/arrow-short-right-red.svg);position: absolute;right: 15px; top:calc(50% + 3px); transform:translateY(-50%);}

        .hondaparts-box {width: 100%;}
        /*  */
        .spec-container .tab-slider-trigger, .comp-tabbed-content .thetab {padding: 16px 8px;}
        .cta {display:block;}
        .h60 {height: unset;}
        .h50 {height: unset;}
        .one-img-size {width:50%;}
        .img-sec-80prec {width: calc(90% - 25px);}
        .w10perc {width: 30%;}
        .w20perc {width: 40%;}
        .w5perc{width:15%;}
        .desc-copy {top: unset;transform: unset;}
        .maxwidth785 {padding: 0px 14px;}
        .maxw1200 {padding: 0 4px;}
        /* .hondaparts-box {padding: 14px 10px;} */
        .hondaparts-box.w50perc {width:100%;}
        .hondaparts-box.w33perc{width: 100%;}
        .hondaparts-box.w70perc {width: 100%;}
        .hondaparts-box.w30perc {width: 100%;}
        .icon-box{width: 50px;height: 50px;}
        .desc-copy{text-align: center;}
        .textalignleft {text-align:left;}
        
        .margincenter{margin:0;}

        .desktop {display: none;}
        .mobile {display: block;}

        .steps-copy{display: block;}
    }

    @media only screen and (max-width: 480px) {
        a.prime-cta-black, a.prime-cta-white {width: 95%;}
    }



</style>