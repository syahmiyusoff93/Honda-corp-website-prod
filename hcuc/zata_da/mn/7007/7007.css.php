<style>
    [mn="7007"] {
        background-color: #000;
        color: #fff
    }

    [mn="7007"] .itms .ttl {
        font-family: var(--font-t2);
        font-size: 120%
    }

    [mn="7007"] .itms {
        margin: 0 -9px;
    }

    [mn="7007"] .itm {
        flex: 0 0 33.333%;
        max-width: 33.333%;
        padding: 9px;
    }

    [mn="7007"] .itm ul,
    [mn="7007"] .itm li {
        padding: 0;
        margin: 0;
        list-style-type: none;
    }

    [mn="7007"] .itms .-w {
        padding: 0 0 0 15px;
        border-left: 3px solid #fff
    }

    [mn="7007"] .itms>div>.itm:nth-child(3)~.itm {
        margin-top: 30px
    }

    @media screen and (max-width: 767px) {
        [mn="7007"] .itms>div>.itm:nth-child(2)~.itm {
            margin-top: 30px
        }

        [mn="7007"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media screen and (max-width: 575px) {
        [mn="7007"] .itms>div>.itm:nth-child(1)~.itm {
            margin-top: 30px
        }

        [mn="7007"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>