<style>
    [mn="4200"] {
        /* background-color: #eee */
        background-color: #FFFFFF;
    }
    [mn="4200"] .mainimg {
        overflow: hidden;
    }
    [mn="4200"] .disclaimer-asin {
        position: absolute;
        text-align: center;
        color: #fff;
        /* background-color: rgba(0,0,0,.5); */
        background-color: #EC1D2F;
        padding: 6px 3px;
        bottom: 0;
        left: 0;
        width: 100%;
        font-size: 80%
    }

    [mn="4200"] .mainimg .bimg {
        padding-top: 65%;
        cursor: pointer;
        transition: transform .6s ease;
    }
    [mn="4200"] .mainimg:hover .bimg {
        padding-top: 65%;
        cursor: pointer;
        transform: scale(1.05)
    }

    [mn="4200"] :is(h2, .price) {
        color: inherit;
        text-align: center; 
    }

    [mn="4200"] .price {
        font-size: var(--font-l);
        font-family: var(--font-t1)
    }

    [mn="4200"] .detail {
        /* background-color: #222;  */
        background-color: #FFFFFF; 
        margin: 0 0 9px;
        color: #fff;

        box-sizing: border-box;
        width: 45%;
        padding: 5px 15px !important;
        height: 100%;

        border: 1px solid #E8E8E8;
        box-shadow: 0px 2px 4px #00000029;
    }
    [mn="4200"] .detail_location p {
        margin: 0
    }
    [mn="4200"] .detail_location p ~ p {
        display: none
    }
    [mn="4200"] .detail:not(.ele),
    [mn="4200"] .tab {
        padding: 15px; 
    }

    [mn="4200"] .detail:hover {
        /* background-color: #444; */
    }

    [mn="4200"] .main {
        max-width: 800px
    }
    [mn="4200"] .tab,
    [mn="4200"] .detail .l {
        font-family: var(--font-t1);
        text-transform: uppercase;
    }
    
    [mn="4200"] .tab:after { 
        background-color: #fff
    }
    [mn="4200"] .shr .med {
        position: absolute;
        width: 200px;
        left: 50%;
        bottom: 0;
        transform: translate(-50%, calc(100% + 15px)); 
        background-color: #222
    }
    [mn="4200"] .shr .ttlbx {
        color: #fff;
        background-color: var(--clr01); 
    }
    [mn="4200"] .shr .ttlbx + div {
        padding: 15px
    }
    /* [mn="4200"] .shr {
        flex: 0 0 25px;
        max-width: 25px;
    } */
    [mn="4200"] .shr .top {
        cursor: pointer 
    }
    [mn="4200"] .shrbar {
        /* margin: 0 0 30px; */
        z-index: 2
    }
    [mn="4200"] .shr .top .bimg {
        background-color: var(--clr01x, #222);
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        transition: all .6s ease;
    }
    [mn="4200"] .shr.active .top .bimg {
        background-color: var(--clr01, #222); 
    }
    [mn="4200"] .med .scon {
        margin: 0 6px;
        border: 2px solid var(--clr01x, #fff);
    }
    [mn="4200"] .shr .btm .bimg {
        background-color: var(--clr01x, #fff); 
    }
    [mn="4200"] .med .scon:hover {
        border: 2px solid #E8E8E8;
        background-color: #E8E8E8;
         /* border: 2px solid var(--clr01, #fff); */
    } 
    [mn="4200"] .shr .btm {
        display: none;
    }
    [mn="4200"] .shr.active .btm {
        display: block;
    }
    [mn="4200"] .ele .btn-gen {
        border-radius: 50px;  
    }
    [mn="4200"] .ele .btn-gen:hover {
        background-color: var(--clr02)
    }
    [mn="4200"] .ele .taste {
        margin: 21px 0 0
    }
    [mn="4200"] .ele .btn-gen:after {
        display: none;
    }
    [mn="4200"] .med .bimg-w {
        padding: 6px;
    }
    [mn="4200"] .installment {
        text-align: center;
    }
    @media only screen and (min-width: 575px) {
        [mn="4200"] .detail_location .liss {
            text-align: right
        }
    }
    @media only screen and (max-width: 575px) {
        [mn="7200"] .sort-w {
            padding: 0
        }

        [mn="7200"] .main-r {
            padding: 15px;
        }

        [mn="4200"] .detail :is(.l, .r) {
            flex: 0 0 100%;
            max-width: 100%
        }

        .details {
            display: block !important;
        }
        .detail {
            width: 100% !important;
        }

        .btn-container-custom{
            flex-direction: column;
        }

        .button-gen-custom, .button-gen-custom-v2{
            margin-left: 0px !important;
            margin-bottom: 10px !important;
        }

        .shr-img{
            width: 10% !important;
        }

        .expend {
            position: unset !important;
        }
    }

    @media only screen and (max-width: 575px) {}
</style>
<style>
    [mn="4200"] .gals {
        margin: 20px 0;
    }

    [mn="4200"] .gals .bimg {
        cursor: pointer;
        padding-top: 64%;
    }

    [mn="4200"] .gals .gal {
        flex: 0 0 20%;
        max-width: 20%;
        border: 1px solid #ccc;
    }

    @media screen and (max-width: 767px) {
        [mn="4200"] .gal .itm {
            flex: 0 0 50%;
            max-width: 50%
        }
    }

    .lichtGALS .slidebtn {
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        padding: 9px;
        background-color: #ccc;
        color: #555;
        cursor: pointer;
        z-index: 10;
    }

    .lichtGALS .prev {
        left: 0;
    }

    .lichtGALS .next {
        right: 0;
    }

    .lichtGALS img {
        max-width: 80wh;
        max-height: 80wh;
    }

    .lichtGALS .main>div {
        background-color: transparent !important
    }

    .details .detail:first-child {
        display: none;
    }

    .details .detail:last-child {
        width: 100%;
    }

    .details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .detail .f-j-sb{
        flex-direction: column;
    }

    .detail .f-j-sb .l, .detail .f-j-sb .r{
        color: #4B4B4B !important;
    }

    .border-bottom-p10{
        border-bottom: 1px solid #E8E8E8;
        padding-bottom: 20px;
    }

    .flex-between{
        display: flex;
        justify-content: space-between;
    }

    .button-gen-custom{
        background-color: #FFFFFF;
        color: #4B4B4B;
        padding: 10px;
        border: 1px solid red;
        margin-left: 10px;

        &:hover{
            background-color: #E8E8E8;
        }
    }

    .button-gen-custom-v2{
        background: #EC1D2F;
        padding: 10px;
        border: 1px solid red;
        margin-left: 10px;

        display: flex;
        align-items: center;
    }

    a.btnBookAppointment.button-gen-custom:hover, a.btnBookAppointment.button-gen-custom-v2:hover {
        color: unset;
    }

    .detail_location > div > .r > div > a:hover {
        color: var(--clr01);
    }

    .btn-container-custom{
        display: flex;
        justify-content: flex-end;
    }

    .shr-img{
        width: 15%;
    }

    .expend {
        display: none;
        position: absolute;
        left: 0px;
        right: 0px;
        padding: 10px;
    }

    .car-details-back-btn{
        position: absolute;
        z-index: 1;
        left: -75px;
        top: 0;
        text-transform: uppercase;
        font-size: 13px;
        font-family: var(--font-nav);
        font-weight: lighter;
        cursor: pointer;
    }

    .car-details-back-btn img{
        margin-right: 6px; width: 21%
    }

    .med .whatsapp{
        background-color: #25d366 !important;
    }
    .med .fb{
        background-color: #0866ff !important;
    }
</style>

