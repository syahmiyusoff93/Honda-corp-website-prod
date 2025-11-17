<style>
    [mn="8401"] {
        padding: 0;
        background-color: var(--clr01x, #000);
        color: #999
    }

    .copyright a:not([href]) {
        cursor: inherit;
    }

    .copyright .ttl {
        font-size: 130%;
        margin: 0 0 12px;
        text-transform: uppercase
    }

    .copyright .l .a-w {
        display: inline-block;
        border-right: 1px solid #999;
    }

    .copyright .l .a-w:last-child {
        border-right: 0
    }

    .copyright .l a {
        margin: 0 9px;
        color: inherit;
        display: inline-block;

    }

    .copyright .l .a-w:first-child a {
        margin-left: 0
    }

    .copyright .med .scon {
        margin: 6px;
        border: 2px solid var(--clr02x, #333);
        background-color: var(--clr02x, #333);
        max-width: 40px;
        width: 40px;
    }

    .copyright .med .scon:hover {
        border: 2px solid var(--clr01);
        background-color: var(--clr01);
    }

    .copyright .med .scon .bimg {
        background-color: #fff;
    }

    .copyright {
        padding: 20px 15px;
        font-size: 80%
    }

    .copyright .l {
        flex: 0 0 calc(100% - 250px);
        max-width: calc(100% - 250px)
    }

    .copyright .r {
        flex: 0 0 250px;
        max-width: 250px
    }
    .nav .copyright .l {
        text-align: left;
        color: #fff
    }

    @media only screen and (max-width: 991px) {
        .copyright .l a {

            margin: 3px 6px !important
        }

        .copyright .l .a-w {
            border: 0;
        }

        .copyright .contact {
            flex: 0 0 100%;
            max-width: 100%
        }

        .copyright .med>div {
            justify-content: center
        }

        .copyright .l {
            padding: 9px 0 0;
            margin: 9px 0 0;
            border-top: 1px solid #555
        }

        .copyright .l,
        .copyright .r {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .copyright>div {
            flex-direction: column-reverse
        }
    }

    @media only screen and (max-width: 575px) {}
</style>