<style>
    [mn="5001"] {
        background-color: #aaa;
        text-align: center
    }

    [mn="5001"] input,
    [mn="5001"] textarea,
    [mn="5001"] select {
        min-height: 50px
    }

    [mn="5001"] textarea {
        margin: 0 0 4px
    }

    [mn="5001"] .taste {
        font-family: var(--font-t1)
    }

    [mn="5001"] .taste .r {
        flex: 0 0 200px;
        max-width: 200px;
    }

    [mn="5001"] .taste .l {
        flex: 0 0 calc(100% - 200px);
        max-width: calc(100% - 200px);
        text-align: left;
        font-size: 67%
    }
    
    [mn="5001"] h2.cus {
        color: inherit;
        margin: 0 auto
    }
    [mn="5001"] h2.cus:after {
        display: none; 
    }
    [mn="5001"] .cus {
        margin: 0 0 15px
    }  

    @media (max-width: 767px) {

        [mn="5001"] .taste .r,
        [mn="5001"] .taste .l {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>