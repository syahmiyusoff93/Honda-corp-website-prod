<style>
    [mn="4001"] .intro h2 {
        color: var(--clr01)
    }
    /* [mn="4001"] .tab:after {
        background-color: var(--clr01)
    } 
    [mn="4001"] .tab {
        padding-right: 45px;
        color: var(--clr01);
        font-weight: initial;
        font-family: var(--font-t1);
        font-weight: bold
    }  */
    [mn="4001"] .tab {
        transition: all .6s ease;
        padding: 15px 45px 15px 3px
    }
    [mn="4001"] .tab.active:after {
        transform: translate(0, -50%) rotate(180deg);
        background-color: var(--clr01x, #000);
    }

    [mn="4001"] .tab:hover {
        color: var(--clr01);
    }
    [mn="4001"] .tab:hover:after {
        background-color: var(--clr01);
    }
    [mn="4001"] .container.main {
        max-width: 1000px
    }
    [mn="4001"] .liss {
        padding: 15px 3px;
    }
    [mn="4001"] .ele {
        margin: 0 0 0;
        border: 0 solid var(--clr01);
        border-bottom: 2px solid #aaa;
    } 
    [mn="4001"] .ele .liss {
        padding-top: 0
    } 
    [mn="4001"]  {
        counter-reset: section;
        background-image: linear-gradient(180deg, rgba(204, 204, 204, 1) 0%, rgba(255, 255, 255, 1) 100%);
    }
    /* [mn="4001"] .bil::after {
        counter-increment: section;
        content:  counter(section) ". ";    
    }  */
    [mn="4001"]:not(.showall) .ele:nth-child(6) ~ .ele {
        display: none
    }
    [mn="4001"] .taste {
        margin: 20px 0 0;
        text-align:center
    }
    @media only screen and (max-width: 575px) {

    }
</style> 