<style>
    [mn="4000"] {
        background-image: linear-gradient(180deg, rgba(204, 204, 204, 1) 0%, rgba(255, 255, 255, 1) 100%);
    } 

    [mn="4000"] .lr-main .l {
        flex: 0 0 300px;
        max-width: 300px
    }

    [mn="4000"] .lr-main .r {
        flex: 0 0 calc(100% - 300px);
        max-width: calc(100% - 300px)
    }

    [mn="4000"] .ele {
        margin: 0 0 0;
        border: 0 solid var(--clr01);
        border-bottom: 2px solid #aaa;
    }

    [mn="4000"] .cats > div{
        flex: 0 0 100%;
        max-width: 100%
    }
    [mn="4000"] .subttl {
        font-size: 120%;
    }
    [mn="4000"] .tab {
        transition: all .6s ease;
        padding: 15px 45px 15px 3px
    }
    [mn="4000"] .tab.active:after {
        transform: translate(0, -50%) rotate(180deg);
        background-color: var(--clr01x, #000);
    }

    [mn="4000"] .tab:hover {
        color: var(--clr01);
    }
    [mn="4000"] .tab:hover:after {
        background-color: var(--clr01);
    }
    [mn="4000"] .liss {
        padding: 15px 3px
    }
    [mn="4000"] .cat { 
        cursor: pointer;
        font-size: 120%;
        padding: 15px;
        border-left: 9px solid var(--clr02x, #aaa);
        transition: all .6s ease;
        line-height: 1
    }
    [mn="4000"] .cat:hover,
    [mn="4000"] .cat.active {
        border-left: 9px solid var(--clr02) 
    }
    @media only screen and (max-width: 991px) { 
        [mn="4000"] .cats {
            margin: 0 0 20px
        }
        [mn="4000"] .cat {  
            border-left: 0 solid var(--clr02x, transparent); 
            border-bottom: 6px solid var(--clr02x, #aaa); 
            text-align: center
        }
        [mn="4000"] .cat:hover,
        [mn="4000"] .cat.active {
            border-left: 0 solid var(--clr02x, transparent);
            border-bottom: 6px solid var(--clr02, transparent); 
        }
        [mn="4000"] .lr-main .l,
        [mn="4000"] .lr-main .r {
            flex: 0 0 100%;
            max-width: 100%
        }
        [mn="4000"] .cats > div{
            flex: 0 0 50%;
            max-width: 50%
        }
    }
</style>