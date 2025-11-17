<style>
    [mn="4005"]>a {
        transform: scale(1);
        display: inline-block;
        padding: 14px 7px;
        background: var(--clr02);
            background: linear-gradient(-90deg, #00ab3c 0%, #67de00 100%);
        color: #fff;
        /*        border: 2px solid #b89c75;*/
        border-left: 0;
        border-radius: 6px 0 0 6px;
        line-height: 1;
        margin: 2px 0;
        font-size: 120%;
        font-family: var(--font-t1);
        text-transform: uppercase;
        font-size: 80%
    }
    [mn="4005"] .bimg {
        background-color: #fff;
    mask-size: contain;
    -webkit-mask-size: contain;
    mask-repeat: no-repeat;
    -webkit-mask-repeat: no-repeat;
    width: 100%;
    height: 100%;
    -webkit-transition: .4s all ease;
    transition: .4s all ease;
    background-position: 0;
    }
    [mn="4005"] .bimg-w {
        width: 15px;
    height: 15px;
    
    margin: 0 0 3px 0px;
    }
    [mn="4005"] a > * {
        display: inline-block;
        vertical-align: middle
    }

    [mn="4005"] {
        position: fixed;
    right: 0;
    top: 150px;
    z-index: 100;
    writing-mode: vertical-rl;
    width: auto;
    }

    @media only screen and (max-width: 575px) {
        [mn="4005"] {
            position: fixed;
            right: 0;
            top: auto;
            bottom: 50px;
        }

        [mn="4005"]>a {
            padding: 18px 12px;
            font-size: 95%;
        }
    }
</style> 