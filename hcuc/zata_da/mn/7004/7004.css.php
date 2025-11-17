<style>
    [mn="7004"] { 
    }

    [mn="7004"] .itms {
        margin: 0 -9px;
        text-align: center;
    }

    [mn="7004"] .itm {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 9px;
    }

    [mn="7004"] .itm a {
        color: inherit
    }

    [mn="7004"] .itm > div { 
        border-bottom: 3px solid var(--clr01)
    }

    [mn="7004"] .itm .bimg {
        padding-top: 60%;
        background-color: #fff;
    }

    [mn="7004"] .itm .ttl {
        font-family: var(--font-t1);
        padding: 9px 0;
        transition: .4s all ease;
        line-height: 1.1
    }
    [mn="7004"] .itm a:hover .ttl {
        color: var(--clr02)
    }
    @media only screen and (max-width: 991px) {
        [mn="7004"] .itm {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }
    @media only screen and (max-width: 767px) {
        [mn="7004"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media only screen and (max-width: 575px) {
        [mn="7004"] .itm {
/*
            flex: 0 0 100%;
            max-width: 100%;
*/
        }
    }
</style>