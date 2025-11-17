<style>
    [mn="7001"] {
        /* background-color: var(--clr03x, #eee);  */
        background-color: var(--clr03x, #ffffff); 
    }
    [mn="7001"] .itms {
        margin: 0 -9px; 
    } 
    [mn="7001"] .itm {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        padding: 30px 9px; 
        text-align: center
    } 
    [mn="7001"] span.nbr {
        /* background-color: #231f20;
        border: 2px solid #231f20; */
        background-color: #e32119;
        border: 2px solid #e32119;
        color: var(--clr03x, #fff);
        font-family: var(--font-t1);
        font-size: 120%
    }
    [mn="7001"] .txt {
        padding: 18px 0 12px;
        transition: all ease-in-out .4s;
        width: 100%;
        z-index: 2; 
    }
    [mn="7001"] h2 {
        color: inherit;
        text-align: center;
    }
    [mn="7001"] .ttl {
        line-height: 1.1;
        font-size: 120%;  
        width: 300px;
        max-width: 90%;
        margin: 0 auto 3px;

        font-family: var(--font-t1);
    }

    [mn="7001"] a {
        color: inherit;
        cursor: pointer
    }
    [mn="7001"] .bimg-w {
        z-index: 1; 
        width: 200px
    } 
    [mn="7001"] .bimg { 
        transition: all ease-in-out .4s;
        transform: scale(1)
    } 
    [mn="7001"] a:hover .bimg {
        transform: scale(1.05)
    } 
    [mn="7001"] .taste {  
        z-index: 2; 
        width: 100%;
    }
    [mn="7001"] .brandlogo {
        max-height: 30px
    } 
    @media screen and (max-width: 767px) {
        [mn="7001"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }
        [mn="7001"] .bar {
            display: none !important;
        }
        [mn="7001"] .bimg-w {
            max-width: 35%
        }
    }
    @media screen and (max-width: 575px) {
        [mn="7001"] {
            text-align: center
        }
        [mn="7001"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
<style>
    .licht7001 .itms {
        margin: 0 -9px
    }
    .licht7001 .itm {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        padding: 9px; 
    }
    .licht7001 .ttl {
        text-align: center;
        font-size: 120%;

    }
    .licht7001 .imgttl {
        display: none
    }
    .licht7001 .bimg {
        padding-top: 64%;
        cursor: pointer
    }
    .lichtGALS .ttl {
        color: #fff;
        width: 100%;
        text-align: left
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

    @media screen and (max-width: 767px) {
        .licht7001 .itm {
            flex: 0 0 50%;
            max-width: 50%
        }
    }
</style>