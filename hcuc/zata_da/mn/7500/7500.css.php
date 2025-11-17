<style>
    [mn="7500"] {
        padding: 0 0;
    }

    [mn="7500"] .main-lrw {
        width: 100%;
    }

    [mn="7500"] .main-l,
    [mn="7500"] .main-r {
        padding: 15px
    }

    [mn="7500"] .main-l {
        flex: 0 0 300px;
        max-width: 300px;
        background-color: #222;
        background: linear-gradient(180deg, #1e1e26 60%, #901d24 100%);
    }

    [mn="7500"] .main-r {
        flex: 0 0 calc(100% - 300px);
        max-width: calc(100% - 300px);
    }

    [mn="7500"] .main-l-w {
        padding: 0;
    }

    [mn="7500"] .itms {
        padding: 15px
    }

    [mn="7500"] .itm {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        text-align: center;
        padding: 15px;
        line-height: 1.1
    }

    [mn="7500"] .itm-w {
        background-color: #929497;
        padding: 9px;
        cursor: pointer;
        transition: all .6s ease;
        color: #fff;
        height: 100%
    }

    [mn="7500"] .itm-w:hover {
        background-color: var(--clr01);
        color: #fff;
    }

    [mn="7500"] .txt-w>div {
        padding: 3px 0 0
    }

    [mn="7500"] .itm .bimg-w {
        overflow: hidden;

    }

    [mn="7500"] .itm .bimg {
        padding-top: 66%;
        transition: all .6s ease;
    }

    [mn="7500"] .itm-w:hover .bimg {
        transform: scale(1.09);
    }

    [mn="7500"] .itm-label,
    [mn="7500"] .itm-inst {
        font-size: 80%
    }

    [mn="7500"] .itm-ttl {
        font-family: var(--font-t1)
    }

    [mn="7500"] .cat {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 21px 0;
    }

    [mn="7500"] .cat>div {
        padding: 15px 21px;
        background-color: transparent;
        transition: all .6s ease;
        cursor: pointer;
        height: 100%;
    }

    [mn="7500"] .cat>div:hover {
        background-color: var(--clr01)
    }

    [mn="7500"] .cat .bimg-w {
        transition: all .6s ease
    }

    [mn="7500"] .cat>div:hover .bimg-w {
        padding: 25px;
        border-radius: 50%;
        background-color: #fff;
        color: #fff;
        transform: translate(0, -6px)
    }

    [mn="7500"] .cat:nth-child(even)>div {
        border-left: 2px solid #ccc
    }

    [mn="7500"] .cat-txt {
        text-align: center;
        color: inherit;
        transition: all .6s ease;
        line-height: 1
    }

    [mn="7500"] .cat>div:hover .cat-txt {
        color: #fff
    }

    [mn="7500"] .taste {
        text-align: center
    }

    @media only screen and (min-width: 992px) {
        [mn="7500"] .cats.btm {
            display: none
        }
    }

    @media only screen and (max-width: 991px) {
        [mn="7500"] .cats.top {
            display: none
        }

        [mn="7500"] .main-l,
        [mn="7500"] .main-r {
            flex: 0 0 100%;
            max-width: 100%;
        }

        [mn="7500"] .cat {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }

        [mn="7500"] .cat>div {
            border-left: 2px solid #ccc;
        }

        [mn="7500"] .cat:nth-child(3n + 1)>div {
            border-left: none;
        }
    }

    @media only screen and (max-width: 767px) {
        [mn="7500"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }

    }

    @media only screen and (max-width: 575px) {
        [mn="7500"] .itms {
            padding: 0;
        }

        [mn="7500"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 5px
        }

        [mn="7500"] .itm-w {
            display: flex;
            flex-wrap: wrap;

        }

        [mn="7500"] .itm-w>* {
            flex: 0 0 50%;
            max-width: 50%;
        }

        [mn="7500"] .itm-w>div.txt-w {
            padding-left: 6px
        }

        [mn="7500"] .cat {
            flex: 0 0 50%;
            max-width: 50%;
        }

        [mn="7500"] .cat>div {
            border-left: 2px solid #ccc !important;
        }

        [mn="7500"] .cat:nth-child(2n + 1)>div {
            border-left: none !important;
        }
</style>

<style>
    .licht7500 form>.row~.row {
        padding-top: 15px;
        margin-top: 15px;
        border-top: 1px solid #ccc
    }
    .licht7500 .gal .bimg {
        cursor: inherit
    }
    .licht7500 [del-img] {
        position: absolute;
        right: 0;
        top: 0;
        padding: 6px;
        font-size: 80%;
        background-color: var(--clr02);
        color: #fff;
        cursor: pointer
    }

    .licht7500 [del-img]:hover {
        background-color: var(--clr01);
    }
    .licht7500 .cus-drop-main {
        border: 1px solid #ccc
    }
</style>