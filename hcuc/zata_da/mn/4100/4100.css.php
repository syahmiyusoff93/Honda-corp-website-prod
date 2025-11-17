<style>
    [mn="4100"] {
        position: fixed;
        right: 0;
        bottom: 15vh;
        width: 75px;
        z-index: 20;
    }

    [mn="4100"] .con {
        width: 35px;
        display: block;
        margin: 0 auto 9px;
    }

    [mn="4100"] .itm>.wrap:after,
    [mn="4100"] .itm>.wrap:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        display: block;

        height: 100%;
        width: 100%;
    }

    [mn="4100"] .itm>.wrap {
        z-index: 1;
        padding: 15px 0
    }

    [mn="4100"] .itm>.wrap:after {
        background-color: #ccc;
        z-index: -2;
        transform: skewY(-15deg) translate(0, -20px)
    }

    [mn="4100"] .itm>.wrap:before {
        background-color: var(--clr02);
        z-index: -1;
        transform: skewY(15deg);
    }

    [mn="4100"] .itms {
        z-index: 1;
    }

    [mn="4100"] .itms .itm:last-child {
        border-bottom: 0;
    }

    [mn="4100"] .itm {
        margin: 3px 0;
        color: #fff;
        cursor: pointer;
    }

    [mn="4100"] .itm~.itm {
        z-index: -1
    }

    [mn="4100"] .itm:hover>.wrap:before {
        background-color: var(--clr01);
    }

    [mn="4100"] .itm:first-child>.wrap:after {
        background-color: #888;
    }

    [mn="4100"] .txt {
        font-size: 70%;
        text-align: center;
        line-height: 1;
    }

    @media only screen and (max-width: 575px) {
        [mn="4100"] .con {
            width: 30px;
        }

        [mn="4100"] {
            width: 100%;
            top: auto;
            bottom: 0;
        }

        [mn="4100"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0px;
            margin: 0px;
        }

        [mn="4100"] .itms .itm:last-child {
            border-right: 0;
        }

        [mn="4100"]>div {
            border-radius: 15px;
            filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, .25))
        }

        [mn="8401"],
        [mn="8400"] {
            padding-bottom: 80px !important;
        }

        [mn="4100"] .itm>.wrap:after,
        [mn="4100"] .itm>.wrap:before {
            transform: skewY(0deg) translate(0, 0)
        }
    }
</style>
<style>
.licht4100 .cus-drop-main > div {
    max-height: 100px;
    border: 1px solid #555
}
    .lichtdisclaimer .main {
        max-width: 400px 
    }
    .licht4100 .main {
        max-width: 500px
    }

    .disclaimer {
        cursor: pointer
    }
    .lichtdisclaimer,
    .licht4100 {
        position: fixed;
        width: auto;
        background-color: transparent !important;
        padding: 1px;
        max-height: 90vh;
        height: auto;
        top: 50%;
        right: 0;
        bottom: auto;
        left: auto;
        overflow: auto;
        transform: translate(0, -50%);
        transition: right .6s ease;
    }
    .lichtdisclaimer {
        top: auto;
        right: 15px;
        transform: translate(0, 0);
        bottom: 9vh;
        font-size: 80%
        
    }
    .lichtdisclaimer section ,
    .licht4100 section {
        padding: 1px 0;
        height: auto;
        overflow: auto;
    }

    .licht4100 .taste {
        display: none
    }

    .lichtdisclaimer .main ,
    .licht4100 .main {
        width: 100%
    }

    .lichtdisclaimer span.ccl,
    .licht4100 span.ccl {
        height: auto
    }
    .lichtdisclaimer .main>div:not(.ccl) {
        background-color: #666;
        min-height: auto 
    }
    .lichtdisclaimer .title {
        font-size: 120%
    }
    @media only screen and (max-width: 575px) {
        .lichtdisclaimer,
        .licht4100 {
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%);
            width: 95vw;
            bottom: auto
        }
        .lichtdisclaimer {
            width: 90vw;
        }
    }
</style>