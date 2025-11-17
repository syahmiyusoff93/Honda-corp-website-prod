<style>
    [mn="2001"] {
        padding: 60px 0 0;
        background-color: #eee;
        color: #fff;
        z-index: 1
    }

    [mn="2001"] .ttl {
        font-size: var(--font-xxl);
        font-family: var(--font-t2);
        margin: 0 0 15px;
        color: var(--clr01);
        color: #fff
    }

    [mn="2001"] .itm {
        flex: 0 0 33.333%;
        max-width: 33.333%;
    }

    [mn="2001"] .itm-rechten {}

    [mn="2001"] .itm-rechten>div {
        padding: 9px 12px;
        border-left: 2px solid #fff;
        min-height: 200px
    }

    [mn="2001"] .taste {
        margin: 9px 0;
    }
    @media (min-width: 576px) {
        [mn="2001"] .itm-linken .taste-drei {
            display: none;
        }
    }
    @media (max-width: 575px) {
        [mn="2001"] .itm-rechten {
            display: none;
        }

        [mn="2001"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }
        [mn="2001"] .main {
            align-items: flex-end !important;
        }
    }
</style>