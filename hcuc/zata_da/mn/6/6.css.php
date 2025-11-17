<style>
    [mn="6"] {
        min-height: 100vh;
        background-size: 100% auto;
        background-repeat: repeat-y;
        background-position: top
    }

    [mn="6"] [da-pid]:hover {
        cursor: pointer;
        overflow: initial
    } 
    [mn="6"] .item  img{
        animation-duration: .9s;
    }
    [mn="6"] img.roundicon {
        position: absolute;
        mix-blend-mode: overlay;
        top: 0;
        left: 0
    }

    [mn="6"] .img-welcometext {
        position: absolute;
        top: 30px;
        left: 315px;
    }

    [mn="6"] .img-welcometext img {
        display: block
    }

    [mn="6"] .img-welcometext img.textdecor {
        mix-blend-mode: hard-light;
    }

    [mn="6"] img.menutype {
        position: absolute;
        top: 175px;
        left: 420px;
    }

    [mn="6"] img.foodimg {
        position: absolute;
        top: 531px;
        left: 0;
    }

    [mn="6"] .sushi,
    [mn="6"] .set {
        text-align: center
    }

    [mn="6"] .set .ttl-w {
        width: 450px;
        max-width: 100%;
        left: 120px
    }

    [mn="6"] .set .ttl:before,
    [mn="6"] .set .ttl:after,
    [mn="6"] .sushi .ttl:before,
    [mn="6"] .sushi .ttl:after {
        content: '';
        width: 50vw;
        height: 1px;
        display: block;
        position: absolute;
        background-color: var(--clr03);
        top: 21px;
    }

    [mn="6"] .set .ttl:before,
    [mn="6"] .sushi .ttl:before {
        left: -9px;
        transform: translate(-100%, 0)
    }

    [mn="6"] .set .ttl:after,
    [mn="6"] .sushi .ttl:after {
        right: -9px;
        transform: translate(100%, 0)
    }

    [mn="6"] .set .ttl,
    [mn="6"] .sushi .ttl {
        font-family: var(--font-t4);
        color: #fff;
        font-size: 180%;
        margin: 0 0 9px;
        line-height: 1.1
    }

    [mn="6"] .set .border,
    [mn="6"] .sushi .border {
        position: absolute;
        top: 22px;
        left: 0;
        border: 1px solid var(--clr03);
        border-top: 0;
        min-height: 150px;
        width: 100%
    }

    [mn="6"] .set .border {
        min-height: 200px
    }

    [mn="6"] .lr-w-1 .l,
    [mn="6"] .lr-w-2 .l {
        flex: 1 0 0
    }

    [mn="6"] .lr-w-1 .r,
    [mn="6"] .lr-w-2 .r {
        flex: 0 0 350px;
        max-width: 350px
    }

    [mn="6"] .lr-w-1 .item,
    [mn="6"] .lr-w-2 .item {
        flex: 0 0 100%;
        max-width: 100%
    }
     [mn="6"] .lr-w-1 .item ~ .item,
    [mn="6"] .lr-w-2 .item ~ .item {
        margin-top: 35px
    }

    [mn="6"] .items-listing .item {
        flex: 0 0 50%;
        max-width: 50%
    }
    [mn="6"] .item > div {
        height: 100%
    }
    @media only screen and (max-width: 1200px) {
         [mn="6"] .lr-w-1 .item ~ .item,
    [mn="6"] .lr-w-2 .item ~ .item {
        margin-top: 0
    }
        [mn="6"] .foodimg {
            display: none
        }

        [mn="6"] .lr-w-1 .l,
        [mn="6"] .lr-w-2 .l,
        [mn="6"] .lr-w-1 .r,
        [mn="6"] .lr-w-2 .r {
            flex: 0 0 100%;
            max-width: 100%
        }

        [mn="6"] .lr-w-1 .r-w {
            margin: 0 -7px
        }

        [mn="6"] .lr-w-1 .item {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 7px
        }

        

        [mn="6"] img.roundicon {
            position: relative;
            margin: 0 0 30px
        }
        [mn="6"] .items-listing .ttl-w {
            left: 0;
        }
        [mn="6"] .items-listing .item {
            padding: 9px
        }
    } 
    @media only screen and (max-width: 767px) {
        [mn="6"] img.menutype {
            position: relative;
            margin: 0 0 30px;
            top: initial;
            left: initial;
        }

        [mn="6"] .main {
            text-align: center
        }

        [mn="6"] .img-welcometext {
            position: absolute;
            top: 300px;
            left: 50%;
            transform: translate(-50%, 0);
            width: 70%
        }
        [mn="6"] .ttl-w {
            left: 0 !important
        }
    }
    
    @media only screen and (max-width: 575px) {
        [mn="6"] .set .ttl, [mn="6"] .sushi .ttl {
            font-size: 120%
        }
        [mn="6"] .img-welcometext {
            top: 12%;
        }
        [mn="6"] .set .border,
        [mn="6"] .sushi .border,
        [mn="6"] .set .border {
            min-height: 100px
        }
    }
    
    @media only screen and (min-width: 1200px) {
        [mn="6"] .lr-w-2 .item {
            margin-top: -150px;
        }
    }
</style>