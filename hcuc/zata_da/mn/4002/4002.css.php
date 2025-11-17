<style>
    [mn="4001"] .ele {
        margin: 0 0 9px;
    }

    [mn="4001"] .main {
        max-width: 1000px
    }

    [mn="4001"] .itms {
        margin: 0 -6px
    }

    [mn="4001"] .itm {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 6px;
        line-height: 1
    }

    [mn="4001"] .main h2,
    [mn="4001"] p,
    [mn="4001"] p+ul {
        width: inherit;
    }

    [mn="4001"] .tab:after {
        background-color: var(--clr01x, #fff);
    }

    [mn="4001"] .tab.active:after {
        transform: translate(0, -50%) rotate(180deg);
        background-color: var(--clr01x, #fff);
    }

    [mn="4001"] .tab:hover:after {
        background-color: var(--clr01x, #fff);
    }

    [mn="4001"] .ttl.tab {
        color: #fff;
        background-color: #888888;
        padding-right: 35px
    }

    [mn="4001"] .ttl.tab.active,
    [mn="4001"] .ttl.tab:hover {
        background-color: var(--clr01, #fff);
    }

    [mn="4001"] .post {
        color: var(--clr01)
    }
    [mn="4001"] .post,
    [mn="4001"] .name {
        font-weight: bold;
        margin: 6px 0
    } 
    [mn="4001"] .post,
    [mn="4001"] .other {
        font-size: 80%;
    }

    @media (max-width: 767px) {
        [mn="4001"] .itm {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }

    @media (max-width: 575px) {
        [mn="4001"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
</style>