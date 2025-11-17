<style>
    [mn="7100"] {
        padding: 120px 0;
    }

    [mn="7100"] h2.cus {
        margin: 0;
        padding: 9px;
        background-color: #fff;
        margin: 0 0 30px;
    }
    [mn="7100"] .main > div {
        background-color: #fff
    }
    [mn="7100"] .layer {
        position: absolute;
        width: 100%;
        height: 100vh;
        left: 0;
        top: 0;
        z-index: -1
    }

    [mn="7100"] .layer:after {
        content: '';
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: linear-gradient(0deg, rgba(48, 49, 142, 1) 0%, rgba(48, 49, 142, 0) 50%);
        z-index: -1;
    }

    [mn="7100"] .layer+.gradient {
        content: '';
        position: absolute;
        display: block;
        left: 0;
        top: 100vh;
        height: 80vh;
        width: 100%;
        background: rgb(48, 49, 142);
        background: linear-gradient(180deg, rgba(48, 49, 142, 1) 0%, rgba(48, 49, 142, 0) 80%);
        z-index: -1;
    }

    [mn="7100"] .itm {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        padding: 9px;
    }

    [mn="7100"] .itms {
        margin: 0 0;
    }

    [mn="7100"] .itm>div {
        background-color: #fff;
        height: 100%;
        padding: 12px;
        cursor: pointer;
    }

    [mn="7100"] .itm .ttl {
        font-family: var(--font-t1);
        font-size: 130%;
        line-height: 1.2;
        text-transform: uppercase;
        letter-spacing: 0;
        color: #EB8F72;
    }

    [mn="7100"] .itm .bimg {
        margin-bottom: 9px
    }

    [mn="7100"] .itm .date {
        font-weight: bold
    }

    @media only screen and (max-width: 767px) {
        [mn="7100"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media only screen and (max-width: 575px) {
        [mn="7100"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
<style>
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
</style>
<style>
    .licht7100 iframe {
        width: 100%;
        height: 66vh;
    }

    .licht7100 .ttl {
        color: var(--clr01);
        font-family: var(--font-t1);
        font-size: var(--font-xl);
        text-transform: uppercase;
    }

    .licht7100 .cont {
        padding: 20px 0;
        text-align: justify;
    }

    .licht7100 .desc {
        font-family: var(--font-b2);
        font-size: var(--font-l);
    }
    .licht7100 .pimg {
        text-align: center; 
    }
    .licht7100 .pimg img {
        max-height: 60vh
    }
    .licht7100 .ttl,
    .licht7100 .desc {
        text-align: left;
    }
    .licht7100 .gals {
        margin: 0 -9px
    }
   .licht7100 .gals .gal {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        padding: 9px
    } 
    .licht7100 .content-w {
        border-bottom: 1px solid #ccc;
        padding-bottom: 30px;
        margin-bottom: 30px
    } 
    
    .licht7100 .taste {
        text-align: center;
    }
    .licht7100 .gals .gal .bimg {
        cursor: pointer
    }
    @media (max-width: 767px) {
        .licht7100 .gals .gal {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }
    @media (max-width: 575px) { 
        .licht7100 .gals .gal {
/*
            flex: 0 0 100%;
            max-width: 100%;
*/
        }
    }
</style>