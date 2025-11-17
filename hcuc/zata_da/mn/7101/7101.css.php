<style>
    [mn="7101"] {
        padding: 120px 0;
        min-height: 100vh
    }

    [mn="7101"] .main {
        max-width: 1000px;
        background-color: #fff;
        padding: 25px;
        box-shadow: 0px 5px 13px rgba(0, 0, 0, .3);
    }

    [mn="7101"] h2.cus {
        margin: 0;
        padding: 9px;
        background-color: #fff;
        margin: 0 0 30px;
    }

    [mn="7101"] .layer {
        position: absolute;
        width: 100%;
        height: 100vh;
        left: 0;
        top: 0;
        z-index: -1
    }

    [mn="7101"] .layer:after {
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

    [mn="7101"] .layer+.gradient {
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
    [mn="7101"] .img-w img {
        width: 100%;
    }
    [mn="7101"] .itms {
        padding: 0 0 60px;
        margin: 0 -15px;
        min-height: 50vh
    }

    [mn="7101"] .itms .itm {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 15px;
    }

    [mn="7101"] .itms .bimg-w {
        border: 1px solid #ccc
    }

    [mn="7101"] .itms .name {
        font-family: var(--font-t1);
        line-height: 1
    }

    [mn="7101"] .filterbar {
        background-color: var(--clr01);
        padding: 15px;
        font-family: var(--font-b2)
    }

    [mn="7101"] .filterbar>.f {
        flex-direction: row-reverse
    }
    [mn="7101"] .search {
        display: none;
    }
    [mn="7101"] .search,
    [mn="7101"] .filter {
        flex: 0 0 50%;
        max-width: 50%
    }

    [mn="7101"] .filt>* {
        width: 100%
    }

    [mn="7101"] .filterbar .filt,
    [mn="7101"] .filterbar .sear {
        flex: 0 0 100%;
        max-width: 100%;
    }

    [mn="7101"] a {
        color: inherit;
        cursor: pointer
    }

    [mn="7101"] input,
    [mn="7101"] select {
        margin: 0;
        min-height: 50px;
    }

    [mn="7101"] .info {
        color: #fff;
        text-align: center;
        padding: 15px;
        background-color: #01004d;
    }

    [mn="7101"] .filterbar label {
        text-transform: uppercase;
        font-family: var(--font-t1)
    }
    @media only screen and (max-width: 991px) {
        [mn="7101"] .filterbar .sear {
            flex: 0 0 90%;
            max-width: 90%;
        }

        [mn="7101"] .itms {
            margin: 0 -6px;
        }

        [mn="7101"] .itms .itm {
            flex: 0 0 33.333%;
            max-width: 33.333%;
            padding: 15px 6px
        }
    }

    @media only screen and (max-width: 767px) {
        [mn="7101"] .filterbar .sear {
            flex: 0 0 100%;
            max-width: 100%;
            margin: 0 0 15px;
            background: var(--clr02);
            background: linear-gradient(90deg, var(--clr02) 0%, var(--clr03) 100%);
            padding: 12px;
            color: #fff;
            border-radius: 2px;
        }

        [mn="7101"] .search,
        [mn="7101"] .filter {
            flex: 0 0 100%;
            max-width: 100%
        }
    }

    @media only screen and (max-width: 575px) {
        [mn="7101"] .itms .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }

        [mn="7101"] .itms .name {}
    }
</style>

<style>
    .licht7101 .categorio,
    .licht7101 .unito {
        text-align: center;
        font-weight: bold
    }
    .licht7101 .unito {
        padding: 0 0 15px
    }
    .licht7101 .gals {
        margin: 0 -9px
    }
   .licht7101 .gals .gal {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 9px
    }  
    @media (max-width: 767px) {
        .licht7101 .gals .gal {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    @media (max-width: 575px) { 
        .licht7101 .gals .gal {
            flex: 0 0 100%;
            max-width: 100%;
        }
    } 
    .licht7101 .main {
        max-width: 1000px
    }

    .licht7101 .ttl {
        color: var(--clr01);
        font-family: var(--font-t1);
        font-size: var(--font-xl);
        text-transform: uppercase;
    }

    .licht7101 .cont {
        padding: 20px 0;
        text-align: justify;
    }

    .licht7101 .desc {
        font-family: var(--font-b2);
        font-size: var(--font-l);
    }

    .licht7101 .ttl,
    .licht7101 .desc {
        text-align: left;
    }
</style>