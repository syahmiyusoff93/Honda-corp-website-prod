<style>
    [mn="7200"] {
        padding: 0 0;
    }

    [mn="7200"] .main-lrw {
        width: 100%;
    }

    /* [mn="7200"] .main-l {
        padding: 25px
    } */

    [mn="7200"] .main-r {
        padding: 40px
    }

    [mn="7200"] .main-l {
        /* flex: 0 0 400px; */
        max-width: 400px;
        background-color: #eee;
        padding: 25px;

        width: 400px;
        transition: width 1.5s;
    }

    .input-container{
        transition: opacity 1s;
    }

    [mn="7200"] .main-r {
        /* flex: 0 0 calc(100% - 400px); */
        flex: 1 0 calc(100% - 400px);
        /* max-width: calc(100% - 400px); */
    }

    [mn="7200"] .main-l-w {
        padding: 15px 0;
    }

    [mn="7200"] .itms {
        padding: 15px
    }

    [mn="7200"] .itm {
        /* flex: 0 0 33.333%; */
        flex: 1 0 33.333%;
        max-width: 33.333%;
        text-align: center;
        padding: 30px 15px 15px;
        line-height: 1.1
    }

    [mn="7200"] .itm.featured .itm-w {
        /* background-image: linear-gradient(90deg, #000 60%, #000 100%);
        transition: all .6s ease;
        z-index: 1; */
    }

    [mn="7200"] .fea-float {
        position: absolute;
        left: 0;
        top: 0;
        z-index: -2;
        height: 100%;
        padding: 9px 21px;
        width: 100%;
        transform: translate(-20px, -32px);
        background-color: #000;
        color: #000;
        text-align: left;
        transition: all .6s ease;
    }

    [mn="7200"] .txt-w {
        padding: 12px 0 9px;
    }

    [mn="7200"] .itm-w .fea-float:after {
        z-index: -1;
        background-image: linear-gradient(90deg, rgba(181, 114, 41, 1) 0%, rgba(237, 189, 32, 1) 0%, rgba(181, 114, 41, 1) 100%);
        opacity: 1;
        transition: all .6s ease;
    }

    [mn="7200"] .itm-w:hover .fea-float:after {
        opacity: 0;
    }

    [mn="7200"] .itm-w:hover .fea-float {
        color: #fff
    }

    [mn="7200"] .itm.featured .itm-w:hover {
        /* color: #000 */
    }

    [mn="7200"] .itm.featured .itm-w:hover:before {
        /* opacity: 0; */
    }

    [mn="7200"] .itm.featured .itm-w:before {
        /* height: 100%;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        background-color: #231F20;
        transition: all .6s ease */
    }

    [mn="7200"] .itm.featured .itm-w:after {
        /* z-index: -1;
        background-image: linear-gradient(90deg, rgba(181, 114, 41, 1) 0%, rgba(237, 189, 32, 1) 50%, rgba(181, 114, 41, 1) 100%);
        opacity: 0;
        transition: all .6s ease */
    }

    [mn="7200"] .itm.featured .itm-w:hover:after {
        /* opacity: 1; */
    }

    [mn="7200"] .itm-w {
        /* background-color: #888; */
        padding: 9px;
        cursor: pointer;
        transition: all .6s ease;
        color: #fff;
        height: 100%
    }

    [mn="7200"] .itm-w:hover {
        /* background-color: var(--clr01);
        color: #fff; */
    }

    [mn="7200"] .itm-w:hover:hover .bimg-w {
        border: 5px solid #EC1D2F;
    }

    [mn="7200"] .txt-w>div {
        padding: 3px 0 0
    }

    [mn="7200"] .txt-w>div.itm-label {
        padding: 3px 0 6px
    }

    [mn="7200"] .itm .bimg-w {
        overflow: hidden;

    }

    [mn="7200"] .itm .bimg {
        padding-top: 66%;
        transition: all .6s ease;
    }

    [mn="7200"] .itm-w:hover .bimg {
        /* transform: scale(1.09); */
    }

    [mn="7200"] .itm-label,
    [mn="7200"] .itm-inst {
        font-size: 80%
    }

    [mn="7200"] .itm-ttl {
        font-size: 110%;
    }

    [mn="7200"] .cat {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 21px 0;
    }

    [mn="7200"] .cat>div {
        padding: 15px 21px;
        background-color: transparent;
        transition: all .6s ease;
        cursor: pointer;
        height: 100%;
    }

    /* [mn="7200"] .cat>div.cont-before:before {
        background-color: var(--clr02); 
        transition: all .6s ease;
        opacity: 0
    } */
    [mn="7200"] .cat .bimg-w {
        width: 120px
    }

    [mn="7200"] .cat>div:hover {
        background-color: var(--clr02)
    }

    [mn="7200"] .cat .bimg {
        background-color: var(--clr02);
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        transition: all .6s ease;
    }

    [mn="7200"] .cat>div:hover .bimg {
        background-color: rgb(113, 18, 40);
        background-image: linear-gradient(90deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
    }

    [mn="7200"] .cat>div.cont-before:hover:before {
        /* opacity: 1 */
    }

    [mn="7200"] .lbl-float {
        position: absolute;
        top: 3px;
        /* right: 9px; */
        right: 0px;
        /* color: #000; */
        color: #ffff;
        font-size: 75%;
        line-height: 1;
        z-index: 0;
        /* text-transform: uppercase; */
        /* font-family: var(--font-t1) */
        font-family: var(--font-b1);
        font-weight: bold;
    }

    [mn="7200"] .lbl-float .lbl-tag {
        padding: 6px 15px
    }

    [mn="7200"] .lbl-float .lbl-tag+.lbl-tag {
        margin-top: 3px
    }

    [mn="7200"] .lbl-float .lbl-tag:before {
        /* background-color: rgb(113, 18, 40);
        background-image: linear-gradient(90deg, rgba(181, 114, 41, 1) 0%, rgba(237, 189, 32, 1) 50%, rgba(181, 114, 41, 1) 100%); */
        z-index: -1;
        /* transform: skewX(-21deg); */

        background-color: #EC1D2F;
        border-top-left-radius: 10px;
    }

    [mn="7200"] .cat:nth-child(even)>div {
        border-left: 2px solid #ccc
    }

    [mn="7200"] .cat-txt {
        text-align: center;
        color: inherit;
        transition: all .6s ease;
        line-height: 1
    }

    [mn="7200"] .cat>div:hover .cat-txt {
        color: #fff
    }

    [mn="7200"] .taste {
        text-align: center
    }

    [mn="7200"] .sort-w {
        padding: 0;
        text-align: inherit
    }

    [mn="7200"] .sort-main {
        margin: 15px 0 30px;
    }

    [mn="7200"] .btnSort {
        display: block;
        text-align: center;
        border: 2px solid #ccc;
    }

    [mn="7200"] .sortdrop-w {
        width: 100%;
        background-color: #000;
        color: #fff;
        overflow: auto;
        max-height: 200px;
    }
    [mn="7200"] .such-ipt.active + * > .cus-drop-main {
        display: block
    }

    @media only screen and (min-width: 992px) {
        [mn="7200"] .cats.btm {
            display: none
        }
    }

    @media only screen and (max-width: 1025px) {
        [mn="7200"] .itm {
            max-width: unset;
        }
    }

    @media only screen and (max-width: 991px) {
        [mn="7200"] .cats.top {
            display: none
        }

        [mn="7200"] .main-l,
        [mn="7200"] .main-r {
            flex: 0 0 100%;
            max-width: 100%;
        }

        [mn="7200"] .cat {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }

        [mn="7200"] .cat>div {
            border-left: 2px solid #ccc;
        }

        [mn="7200"] .cat:nth-child(3n + 1)>div {
            border-left: none;
        }

        .open-sidebar{
            display: none;
        }
    }

    @media only screen and (max-width: 767px) {
        [mn="7200"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }

    }

    @media only screen and (max-width: 575px) {
        [mn="7200"] .lbl-float {
            position: relative;
            top: 0;
            right: 0; 
            max-width:90%;
            margin: 0 auto;
            padding: 6px 0 0
        }

        [mn="7200"] .main-r {
            padding: 15px;
        }

        [mn="7200"] .itms {
            padding: 0;
        }

        [mn="7200"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 10px 3px;
        }

        [mn="7200"] .itm.featured {
            /* padding: 25px 5px 5px; */
        }

        [mn="7200"] .itm-w {
            display: flex;
            flex-wrap: wrap;
        }

        [mn="7200"] .itm-w>* {
            flex: 0 0 50%;
            max-width: 50%;
        }

        [mn="7200"] .itm-w>div.txt-w {
            padding-left: 6px
        }

        [mn="7200"] .cat {
            flex: 0 0 50%;
            max-width: 50%;
        }

        [mn="7200"] .cat>div {
            border-left: 2px solid #ccc !important;
        }

        [mn="7200"] .cat:nth-child(2n + 1)>div {
            border-left: none !important;
        }

        [mn="7200"] .fea-float {
            padding: 3px 10px;
            transform: translate(-10px, -20px);
            font-size: 80%;
        }
    }
</style>
<style>
    .licht7200 .mainimg .bimg {
        padding-top: 65%;
    }

    .licht7200 :is(h2, .price) {
        color: #fff;
        text-align: center;
        margin: 0 0 20px
    }

    .licht7200 .price {
        font-size: var(--font-l);
        font-family: var(--font-t1)
    }

    .licht7200 .detail {
        background-color: #222;
        padding: 15px;
        margin: 0 0 9px;
    }

    .licht7200 .detail:hover {
        background-color: #444;
    }

    .licht.licht7200 .main {
        max-width: 800px
    }

    .licht7200 .detail .l {
        font-family: var(--font-t1);
        text-transform: uppercase;
    }

    @media only screen and (max-width: 575px) {

        .licht7200 .detail :is(.l, .r) {
            flex: 0 0 100%;
            max-width: 100%
        }
    }

    .open-sidebar{
        opacity: 0;
        transition: opacity 1s;

        position: absolute;
        right: -16px;
    }
    .close-sidebar{
        opacity: 0;
        transition: opacity 1s;

        position: absolute;
        right: -27px;
    }
    .open-sidebar.active{
        opacity: 1;
    }
    .close-sidebar.active{
        opacity: 1;
    }
</style>