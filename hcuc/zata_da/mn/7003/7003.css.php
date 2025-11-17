<style>
    [mn="7003"] h2 { 
        margin: 0 0 60px;
    }

    [mn="7003"] .itms {
        margin: 0 -30px;
        text-align: center;
    }

    [mn="7003"] .itm {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 9px 30px;
    }
 
    [mn="7003"] .itm .taste {
        width: 100%
    }

    [mn="7003"] .itm .bimg {
        padding-top: 60%;
        background-color: #fff;
    } 
    [mn="7003"] .main { 
    }
    [mn="7003"] .itm .ttl { 
        padding: 15px 0;
        transition: .4s all ease;
        line-height: 1.1;
        font-size: var(--font-l)
    }
    [mn="7003"] .itm a:hover .ttl {
        color: var(--clr02)
    } 
    [mn="7003"] .bimg-w:after {
        content: '';
        display: block;
        width: 100%;
        height: 115%;
        background-color: var(--clr01);
        left: 32px;
        top: -30px;
        position: absolute;
        z-index: -1;
        clip-path: polygon(0 0, 100% 0%, 100% 100%, 100% 100%);
    }
    @media only screen and (max-width: 767px) {
        [mn="7003"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 30px;
        }
    }

    @media only screen and (max-width: 575px) {
        [mn="7003"] .itm {
/*
            flex: 0 0 100%;
            max-width: 100%;
*/
        }
    }
</style>