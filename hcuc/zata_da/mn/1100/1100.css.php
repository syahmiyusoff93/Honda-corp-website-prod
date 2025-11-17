<style>
    [mn="1100"] {
        padding: 0
    }

    [mn="1100"] h2 {
        color: inherit
    }

    [mn="1100"] .itm-row {
        min-height: 50vh;
        z-index: 1;
        padding: 60px 0
    }

    [mn="1100"] .itm-row:after,
    [mn="1100"] .itm-row:before {
        content: '';
        position: absolute;
        display: block;
        width: 50%;
        height: 100%;
        top: 0;
        z-index: -1
    }

    [mn="1100"] .itm-row:after {
        left: 0;
        background: rgb(204, 204, 204);
        background: linear-gradient(0deg, rgba(204, 204, 204, 1) 0%, rgba(255, 255, 255, 1) 100%);
    }

    [mn="1100"] .itm-row:before {
        right: 0;
        background-color: #666
    }
    [mn="1100"] .itm-row:nth-child(even):after {
        right: 0;
        left: auto;
    }
    [mn="1100"] .itm-row:nth-child(even):before {
        left: 0;
        right: auto; 
    } 
    [mn="1100"] .itm-row:nth-child(even) .lr-w {
        flex-direction: row-reverse;
    } 
    [mn="1100"] .itm-row .l,
    [mn="1100"] .itm-row .r {
        padding: 15px
    } 
    [mn="1100"] .itm-row .l {
        flex: 0 0 55%;
        max-width: 55%;
        padding: 60px;
        color: #fff;
        background-color: #000
    } 
    [mn="1100"] .itm-row .r {
        flex: 0 0 45%;
        max-width: 45%
    }
    [mn="1100"] .itm-row .l .l-w {
        width: 650px;
        max-width: 100%;
    }
    [mn="1100"] .itm-row:nth-child(odd) .l .l-w {
        margin-left: auto;
        text-align: right
    }

    @media only screen and (max-width: 900px) {
        [mn="1100"] .itm-row .l,
        [mn="1100"] .itm-row .r {
            flex: 0 0 100%;
            max-width: 100%;
        } 
        [mn="1100"] .itm-row .l {
            padding: 60px 15px
        }
        [mn="1100"] .itm-row { 
            padding: 0
        }
        [mn="1100"] .itm-row:after {
            display: none;
        }
        [mn="1100"] .itm-row:before {
            width: 100%;
        }
    }
</style>