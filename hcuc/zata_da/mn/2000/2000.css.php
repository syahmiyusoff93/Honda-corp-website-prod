<style>
    [mn="2000"] {
       min-height: calc(350 / 1210 * 100vw);
        /* background-color: #e1e1e1;
        color: #fff; */
        color: #282A2F;
        z-index: 1;
        text-align: center
    }
    [mn="2000"] .tst-w > * {
        width: 100%
    }
    [mn="2000"] .main {
        padding: 60px 30px;
    }

    [mn="2000"] .bg-lay {
        background-position: top center
    }
    [mn="2000"] .bg-lay,
    [mn="2000"] .bg-layer {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        z-index: -2
    }
    [mn="2000"] .bg-layer {
        z-index: -1;
        background-size: auto;
        background-repeat: repeat;
        display: none;
    }
    [mn="2000"] .ttl {
        font-size: calc(72/16 * 100%);
        font-family: var(--font-t1);
        margin: 0 0 15px; 
        color: #fff;
        line-height: .85; 
        
    }
    [mn="2000"] .subttl {
        font-size: var(--font-xl);
    } 
    @media (max-width: 1000px) {
        [mn="2000"] .ttl {
            font-size: var(--font-xxl)
        }
    }
    @media (max-width: 767px) {
        [mn="2000"] .main {
            padding: 0 15px;
        }
    }
</style>