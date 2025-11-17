<?php echo $this->moduleScript($folder); ?>
<style>
/*
    .editOption3000 .editOption {
        top: 150px
    }
*/

    [mn="3001"] {
        padding-top: 0;  
    }
    [mn="3001"] [owl] { 
        text-align: center;
    }

    [mn="3001"] .slide-progress {
        width: 0;
        max-width: 100%;
        height: 6px;
        background: #e84497;
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 10;
    }

    [mn="3001"] [owl] img {
        display: inline-block;
        width: auto;
    }

    [mn="3001"] [owl] .item {
        z-index: 1;
        padding: 0;
    }
    [mn="3001"] [owl] .videoitem {
        cursor: pointer
    }
    [mn="3001"] [owl] .item:after {}

    [mn="3001"] [owl] .itemrow>div {
        max-width: 100%;
        flex: 0 0 100%;
    }

    [mn="3001"] [owl] .owl-dot span {
        height: 6px;
        width: 6px;
        display: block;
        background-color: transparent;
        margin: 0 9px;
        border-radius: 50%;
        border: 1px solid transparent;
        transition: all ease .4s; 
        position: relative
    }
    [mn="3001"] [owl] .owl-dot span:after {
        content: '';
        position: absolute;
        height: calc(100% + 12px);
        width: calc(100% + 12px);
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        transform-origin: center center;
        border-radius: 50%;
        border: 1px solid #fff
    }

    [mn="3001"] [owl] .owl-dot.active span {
        background-color: var(--clr02);
    }

    [mn="3001"] [owl] button.owl-dot { 
        text-align: center;
        margin: 12px 0
    }

    [mn="3001"] [owl] svg {
        max-width: 100%;
        width: auto;
        max-height: 100%;
        height: auto;
        fill: #fff;
    }

    [mn="3001"] [owl] button.owl-next,
    [mn="3001"] [owl] button.owl-prev {
        width: 40px;
        height: 40px;
        padding: 13px !important;
        background-color: var(--clr01);
        display: flex;
        border-radius: 50%;
    }

    [mn="3001"] [owl] button.owl-next:hover,
    [mn="3001"] [owl] button.owl-prev:hover {
        background-color: var(--clr02);
    }


    [mn="3001"] [owl] .owl-dots {
        text-align: center;
        position: absolute;
        width: auto; 
        left: 50%;
        -webkit-transform: translate(-50%,0);
        transform: translate(-50%,0);
    } 

    [mn="3001"] .full {
        text-align: center;
    }

    [mn="3001"] .ttl {
        line-height: 1.2;
        font-size: 300%;
        margin: 0 0 20px;
    }

    [mn="3001"] .ttl>span {
        font-weight: bold;
        display: inline-block;
        vertical-align: middle;
        margin: 0 6px;
        max-width: calc(100% - 300px);
        text-transform: uppercase;
        font-family: var(--font-t1);
        
    }
    
    [mn="3001"] .desc {
        width: 680px;
        margin: 0 auto;
        max-width: 100%
    }

/*
    [mn="3001"] .ttl:after,
    [mn="3001"] .ttl:before {
        display: inline-block;
        content: '';
        height: 2px;
        width: 90px;
        background-color: #fff;
        vertical-align: middle;
    }
*/

    [mn="3001"] .ttlh2 {
        padding: 120px 1px 1px;
    }

    [mn="3001"] [owl] .itemrow {
        padding: 30px 0;
        min-height: 200px;
        color: #fff;
    }

    [mn="3001"] [owl] .btn-gen {
        border: 2px solid #fff;
        background-color: #fff;
        color: var(--clr-bd)
    }

    [mn="3001"] [owl] .btn-gen:hover {
        border: 2px solid var(--clr01);
        background-color: var(--clr01);
        color: #fff
    }
    [mn="3001"] .infobx-itm > div {
        flex-direction: column;
        height: 100%;
    }
    [mn="3001"] .infobx-itm > div > div:first-child {
        flex: 1 0 0
    }
    [mn="3001"] .ln {
        text-align: center;
        padding: 40px 15px;
    }

    [mn="3001"] .rn,
    [mn="3001"] .ln {
        flex: 0 0 100%;
        max-width: 900px; 
    }
    [mn="3001"] .infobx {
        z-index: 10;
    }
    [mn="3001"] .infobx-itms {
        border: 2px solid #ccc;
    border-top: 0;
    padding: 15px
    }
    [mn="3001"] .infobx-itm {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        border-right: 2px solid #ccc;
        padding: 0 15px
    }
    [mn="3001"] .infobx-itm:last-child {
        border-right: 0
    }
    [mn="3001"] .infobx-w {
        margin: 0 -15px
    }
    [mn="3001"] .infobx-ttl {
        background-color: var(--clr01);
        color: #fff;
        padding: 15px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 120%;
        line-height: 1
    }
    [mn="3001"] .itm-ttl {
        font-size: 120%;
        margin: 0 0 9px;
        line-height: 1
    }

    @media only screen and (max-width: 991px) {
        [mn="3001"] [owl] .itemrow {
            min-height: calc(100vw * 9 / 16)
        }
        [mn="3001"] .ttl>span {
            max-width: 100%
        }

        [mn="3001"] .ttl {
            margin: 35px 0;
        }

        [mn="3001"] .ttl:after,
        [mn="3001"] .ttl:before {
            width: 30px;
            display: block;
            margin: 6px auto
        }

        [mn="3001"] [owl] .item:after {
            display: none;
        }

        [mn="3001"] [owl] .owl-next,
        [mn="3001"] [owl] .owl-prev {
            -webkit-transform: translate(0, 50%);
            transform: translate(0, 50%);
        }

        [mn="3001"] [owl] button.owl-next,
        [mn="3001"] [owl] button.owl-prev {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
            border-radius: 0;
        }

        [mn="3001"] [owl] .owl-nav button {
            margin: 0 0 !important;
        }
    }

    @media only screen and (max-width: 575px) {
        [mn="3001"] .infobx-itm {
            flex: 0 0 100%;
            max-width: 100%; 
        }
        [mn="3001"] .infobx-itm {
            border-right: 0;
        }
        [mn="3001"] .infobx-itm > div {
            padding: 0 0 15px;
        }
        [mn="3001"] .infobx-itm ~ .infobx-itm > div {
            padding: 15px 0;
            border-top: 2px solid #ccc
        }
        [mn="3001"] .infobx-itm:last-child > div {
            padding: 15px 0 0; 
        }

        [mn="3001"] .rn,
        [mn="3001"] .ln {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
<style>
    .licht3000 iframe {
        width: 100%
    }
    .licht3000.licht .main > div:not(.ccl) {
        padding: 0;
        min-height: auto
    }
</style>