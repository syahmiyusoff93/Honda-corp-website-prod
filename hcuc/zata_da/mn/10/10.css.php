<style>
    .menucon {
        padding: 0;
        font-size: 150%;
        /* color: var(--clr01x, #fff); */
        color: #333;
        cursor: pointer;
        -webkit-transition: ease all .4s;
        transition: ease all .4s;
        z-index: 1000;
        line-height: 1;
        top: 0;
    } 

    @media only screen and (min-width: 992px) {
        .nav>ul>li {
            /* border-right: 1px solid #fff */
        }

        .nav>ul>li:nth-last-child(3)~li {
            border-right: 0;
        }

        .nav>ul>li>a {
            padding: 3px 0; 
            letter-spacing: 1.5px
        }

        .menucon,
        .mob-nav {
            display: none !important;
        }
    }

    @media only screen and (max-width: 991px) {
        [mn="menu"] {
            display: none;
        }

        .mob-nav {
            padding: 0 0;
            width: 100%;
            position: sticky;
            top: 0;
            /* background: rgb(255, 255, 255);
            background: linear-gradient(90deg, #1e1e26 60%, #901d24 100%); */
            background-color: #ffffff;
            border-bottom: 1px solid #e8e8e8;
            z-index: 20; 
        }

        .mob-nav.active {
            position: relative;
            z-index: inherit;
        }

        .mob-nav .container-fluid {
            padding-left: 0;
        }

        .mob-nav .container-fluid .f .logo {
            overflow: hidden;
            width: 70%;

            max-width: 70% !important;
        }

        .mob-nav .container-fluid .f .logo::before {
            top: -234px;
            bottom: -111px;
            left: -120px;
            right: 58px;
        }

    }

    .logo img {
        max-height: 35px;
    }

    [mn="menu"] {
        /* background-color: rgb(255, 255, 255);
        background: linear-gradient(90deg, #1e1e26 60%, #901d24 100%); */
        background-color: #ffffff;
        border-bottom: 1px solid #e8e8e8;
        /* padding: 6px 0; */
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 30;
        overflow: visible;
    }

    [mn="menu"] .container-fluid {
        padding-left: 0;
    }

    [mn="menu"] > div > div > ul > li{
        font-size: 0.7725rem !important;

        display: flex;
        justify-content: center;
        align-items: center;
        overflow-y: clip;

        margin-right: 16px;
        height: 100%; 
    }

    .nav > ul > li > a{
        margin: 0;
        padding: 0 20px;
    }

    .nav .med .bimg {
        background-color: var(--clr01x, #fff);
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        width: 100%;
        height: 100%;
        -webkit-transition: .4s all ease;
        transition: .4s all ease;
        background-position: 0;
    }

    .logo {
        /* max-width: 50%; */

        /* padding: 20px 15px 20px 0; */
        /* padding: 20px 0px 20px 15px; */
        padding: 20px 36px 20px 15px;

        /* overflow: hidden;
        width: 20%; */
    }

    .logo::before {
        /* content: "";
        position: absolute;
        top: -234px;
        bottom: -111px;
        left: -102px;
        right: 75px;
        background: linear-gradient(45deg, #1e1e26 55%, #901d24 100%);
        transform: rotate(37deg);
        z-index: -1; */

        content: "";
        position: absolute;
        top: -234px;
        bottom: -111px;
        left: -102px;
        right: -27px;
        background: linear-gradient(45deg, #1e1e26 55%, #901d24 100%);
        transform: rotate(37deg);
        z-index: -1;
    }

    .nav>ul>li>a.btn-gen,
    .nav>ul>li>select {
        display: inline-flex;
        padding: 1px 6px;
        margin: 0 0 0 6px;
        height: 35px;
        vertical-align: middle;
        width: 150px;
        align-items: center;
        justify-content: center;
        font-size: inherit;
    }

    @media only screen and (max-width: 991px) {

        .nav>ul>li>a.btn-gen,
        .nav>ul>li>select {
            font-size: 170%;
            width: 120px;
            color: var(--clr01);
            background-color: #fff;
        }

        .nav {
            text-align: center;
        }

        [mn="logo"],
        [mn="menu"] {
            display: none !important;
        }

        [licht][menu] {
            background-color: var(--clr01x, #1e1e26);
            padding: 90px 0;
        }

        [licht][menu] .logo {
            display: none;
        }
    }

    @media screen and (max-width: 1175px) {
        .logo::before {
            /* right: 20px; */
            /* right: -32px; */
            right: -14px;
        }

        [mn="menu"] > div > div > ul > li{
            margin-right: 0px;
        }
    }

    .nav>ul>li.active:after {
        top: 0;
    }

    .nav>ul>li.active:before {
        bottom: 0;
    }

    .nav>ul>li a.menu-cus {
        padding: 6px 15px !important;
        background-color: var(--clr03);
        border-radius: 50px;
        color: #fff !important;
    }

    .nav>ul>li a.menu-cus:hover {
        color: #fff !important;
    }

    @media only screen and (min-width: 992px) {
        [mn="logo"] {
            padding: 0;
            border-bottom: 2px solid #ccc;
        }

        .menucon {
            display: none;
        }

        .nav>ul>li>a+ul {
            position: absolute;
            display: block;
            padding: 10px 5px;
            margin: 15px 0 0;
            width: 250px;
            text-align: left;
            left: 0;
            background-color: #eee;
            transform: scale(1, 0);
            -webkit-transform: scale(1, 0);
            transform-origin: top;
            -webkit-transform-origin: top;
            box-shadow: -3px 3px 9px rgba(0, 0, 0, .1);
            transition: .4s all ease;
            transition-delay: .4s;
        }

        .nav>ul>li:hover>a+ul {
            transform: scale(1, 1);
            -webkit-transform: scale(1, 1);
            transition-delay: 0s;
        }
    }
</style>
<style da-for="headertop">
    .headertop {
        background-color: var(--clr01);
        color: #fff;
        padding: 0 0;
        line-height: 1;
    }

    .headertop a {
        color: inherit;
    }

    .headertop .itm .bimg-w {
        width: 15px
    }

    .headertop .med .bimg {
        background-color: #fff
    }

    .headertop .itm {
        padding: 3px 15px 3px 3px;
        color: #fff
    }

    .headertop .med .bimg-w {
        padding: 9px
    }

    .headertop .itm .l {
        padding-right: 3px
    }

    .headertop .itm .bg-masking {
        background-color: #fff
    }

    .headertop p {
        margin: 0
    }

    .headertop .med .scon-el:first-child {
        /*        border-left: 1px solid #fff;*/
    }

    .headertop .med .scon-el {
        flex: 0 0 40px;
        max-width: 40px;
        /*        border-right: 1px solid #fff;*/
    }

    .headertop .med .scon {
        width: 100%;
        max-width: 100%;
        margin: 0 0
    }

    .headertop .ln,
    .headertop .rn {
        flex: 0 0 50%;
        max-width: 50%;
    }

    @media only screen and (max-width: 575px) {
        .headertop .itm {
            flex: 0 0 100%;
            max-width: 100%
        }

        .headertop .itm>div {
            width: 100%
        }

        .headertop .itm .l {
            flex: 0 0 18px;
            max-width: 18px;
        }

        .headertop .itm .r {
            flex: 0 0 calc(100% - 18px);
            max-width: calc(100% - 18px);
        }
    }
</style>