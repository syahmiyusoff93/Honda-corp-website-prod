<style>
    [mn="1002"] {
        padding: 0 0;
        background-color: #eee
    }
    [mn="1002"] .rn h2 {
        text-align: inherit
    }
    [mn="1002"] .ln .bimg {
        padding-top: 66%;
    } 
    [mn="1002"] .rn .bimg-w {
        width: 50px;
    } 
    [mn="1002"] .ln,
    [mn="1002"] .rn {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 15px;
    } 
    [mn="1002"] .desc {
        margin: 15px 0 0;
        text-align: justify
    } 
    [mn="1002"] .rn {
        padding: 60px 15px
    }
    [mn="1002"] .ln {
        min-height: 50vh;
    } 
    [mn="1002"] .rn>div {
        max-width: 80%;
    }

    [mn="1002"] .taste { 
        padding-top: 15px;
    } 
    [mn="1002"] .ttl {
        font-size: var(--font-xl); 
        text-align: center;
        line-height: 1;
    } 
    [mn="1002"] .sttl { 
        text-align: center;
    } 
    [mn="1002"] .itms>.itm:nth-child(even) {}

    [mn="1002"] .itms>.itm:nth-child(odd)>div {
        flex-direction: row-reverse;
    } 
    @media (max-width: 991px) {
        [mn="1002"] .rn>div {
            max-width: 90%;
        }
    }

    @media (max-width: 575px) {
        [mn="1002"] .ln {
            min-height: unset;
        }

        [mn="1002"] .itms>.itm>div {
            flex-direction: column-reverse !important;
        }

        [mn="1002"] .ln,
        [mn="1002"] .rn {
            flex: 0 0 100%;
            max-width: 100%;
            width: 100%;
        }

        [mn="1002"] .rn>div {
            max-width: 100%;
        }
    }
</style>