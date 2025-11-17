<style>
    [mn="7000"] {
        overflow: inherit
    }

    [mn="7000"] .main {
        background-color: #fff;
        padding: 15px;
        box-shadow: 0px 5px 13px rgba(0, 0, 0, .3);
    }

    [mn="7000"] .els {
        margin: 0 -6px;
    }

    [mn="7000"] .el>.wrap {
        background-color: #01004d;
        height: 100%;
    }

    [mn="7000"] .bimg {
        background-color: #eee;
    }

    [mn="7000"] .els>.el {
        padding: 6px;

        max-width: 25%;
        flex: 0 0 25%;
    }

    [mn="7000"] .taste {
        text-align: center;
        padding: 15px 0
    }
    [mn="7000"] .taste .btn-gen {
        margin: 0 auto
    }
    [mn="7000"] .el [da-id] {
        cursor: pointer;
    }

    [mn="7000"] .ittl {
        color: #fff;
        text-align: center;
        padding: 15px;
    }

    [mn="7000"] .secttl>span {
        display: inline-block;
        vertical-align: middle;
    }

    [mn="7000"] .consp {
        width: 35px;
        margin: 0 12px 0 0;
    }

    [mn="7000"] .consp .bimg {
        background-color: var(--clr01)
    }

    [mn="7000"] .secttl {
        line-height: 1;
        font-size: var(--font-xl);
        font-family: var(--font-t1);
        color: #01004d;
        margin: 0 0 15px;
        text-align: center;
    }

    @media only screen and (max-width: 991px) {
        [mn="7000"] .els>.el {
            max-width: 33.333%;
            flex: 0 0 33.333%;
        }
    }

    @media only screen and (max-width: 575px) {
        [mn="7000"] .els>.el {
            max-width: 50%;
            flex: 0 0 50%;
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
        max-width: 80vw;
        max-height: 70vh;
    }
</style>