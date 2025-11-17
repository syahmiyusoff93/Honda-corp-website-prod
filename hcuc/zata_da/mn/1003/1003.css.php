<style>
    [mn="1003"] {
        padding: 0 0;
        background-color: #eee;
        color: #333
    }
    [mn="1003"] .rn h2 {
        text-align: inherit
    }
    [mn="1003"] .ln .bimg {
        padding-top: 66%;
    } 
    [mn="1003"] .rn .bimg-w {
        width: 50px;
    } 
    [mn="1003"] .ln,
    [mn="1003"] .rn {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 15px;
    } 
    [mn="1003"] .desc {
        margin: 15px 0 0;
        text-align: justify
    } 
    [mn="1003"] .ln {
        min-height: 50vh;
    } 
    [mn="1003"] .rn>div {
        max-width: 80%;
    }

    [mn="1003"] .taste { 
        padding-top: 15px;
    } 
    [mn="1003"] .ttl {
        font-size: var(--font-xl); 
        text-align: center;
        line-height: 1;
    } 
    [mn="1003"] .sttl { 
        text-align: center;
    } 
    [mn="1003"] .itms>.itm:nth-child(even) {}

    [mn="1003"] .itms>.itm:nth-child(odd)>div {
/*        flex-direction: row-reverse;*/
    } 
    [mn="1003"]:not([mn="menu"]) a:not(.btn-gen) {
        text-decoration: none
    }
    @media (max-width: 991px) {
        [mn="1003"] .rn>div {
            max-width: 90%;
        }
    }

    @media (max-width: 575px) {
        [mn="1003"] .ln {
            min-height: unset;
        }

        [mn="1003"] .itms>.itm>div {
            flex-direction: column-reverse !important;
        }

        [mn="1003"] .ln,
        [mn="1003"] .rn {
            flex: 0 0 100%;
            max-width: 100%;
            width: 100%;
        }
        [mn="1003"] .rn {
            padding: 60px 15px;
        }
        [mn="1003"] .rn>div {
            max-width: 100%;
        }
    }
</style>