<style>
    [mn="1101"] {
        padding: 0
    }

    [mn="1101"] h2 {
        color: inherit;
        background-color: var(--clr02);
        padding: 15px 25px;
        text-align: center;
        margin: -35px 0 0;
        transform: translate(0, -45%);
        display: table;
    }

    [mn="1101"] .itm-row {
        min-height: 50vh;
        z-index: 1;
        padding: 60px 0
    }
    [mn="1101"] .ttl {
        font-size: 90%;
        margin: 0 0 6px;
        text-transform: uppercase
    }
    [mn="1101"] .itm-row:after,
    [mn="1101"] .itm-row:before {
        content: '';
        position: absolute;
        display: block;
        width: 50%;
        height: 100%;
        top: 0;
        z-index: -1
    }
    [mn="1101"] .itm > div {
        width: 90%;
        margin: 0 auto;
        display: block
    }
    [mn="1101"] .itm-row:after {
        left: 0;
        background: rgb(204, 204, 204);
        background: linear-gradient(0deg, rgba(204, 204, 204, 1) 0%, rgba(255, 255, 255, 1) 100%);
    }

    [mn="1101"] .itm-row:before {
        right: 0;
        background-color: #1E1E25
    }
    [mn="1101"] .itm-row:nth-child(even):after {
        right: 0;
        left: auto;
    }
    [mn="1101"] .itm-row:nth-child(even):before {
        left: 0;
        right: auto; 
    } 
    [mn="1101"] .itm-row:nth-child(even) .lr-w {
        flex-direction: row-reverse;
    } 
    [mn="1101"] .itm-row .l,
    [mn="1101"] .itm-row .r {
        padding: 15px
    } 
    [mn="1101"] .itm-row .l {
        flex: 0 0 55%;
        max-width: 55%;
        padding: 35px;
        color: #fff;
        background-color: #231F20
    } 
    [mn="1101"] .itm-row .r {
        flex: 0 0 45%;
        max-width: 45%;
        text-align: center
    }
    [mn="1101"] .itm-row .l .l-w { 
        max-width: 100%;
    } 
    [mn="1101"] .itm {
        flex: 0 0 25%;
        max-width: 25%
    }
    [mn="1101"] .itm .bimg-w{
        width: 90%
    }
    [mn="1101"] .desc {
        font-size: 80%;
        line-height: 1.1
    }
    [mn="1101"] .desc :is(ul,li,p){
        margin: 0 0 3px
    }
    [mn="1101"] span.nbr {
        position: absolute;
        right: 0;
        top: 0;
        background-color: #231F20;
        display: inline-flex;
        height: 30px;
        width: 30px;
        justify-content: center;
        align-items: center;
        border: 2px solid #fff;
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    @media only screen and (max-width: 1200px) {
        [mn="1101"] .itm-row .l {
            flex: 0 0 60%;
            max-width: 60%; 
        } 
        [mn="1101"] .itm-row .r {
            flex: 0 0 40%;
            max-width: 40%
        }
    }
    @media only screen and (max-width: 991px) {
        [mn="1101"] .itm-row:nth-child(odd) .lr-w {
            flex-direction: column-reverse;
            
        } 
        [mn="1101"] .itm-row:nth-child(odd) .l {
            padding-bottom: 0
        }
        [mn="1101"] .itm-row:nth-child(even) .l {
            padding-top: 0
        }
        [mn="1101"] .itm-row .l,
        [mn="1101"] .itm-row .r {
            flex: 0 0 100%;
            max-width: 100%;
        } 
        [mn="1101"] .itm-row .l {
            padding: 60px 15px
        }
        [mn="1101"] .itm-row { 
            padding: 0
        }
        [mn="1101"] .itm-row:after {
            display: none;
        }
        [mn="1101"] .itm-row:before {
            width: 100%;
        }
        [mn="1101"] .itm > div {
            width: 90%;
            margin: 0 auto 60px;
            display: block;
        }
    } 
    @media only screen and (max-width: 575px) {
        [mn="1101"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
        } 
        [mn="1101"] .itm .bimg-w {
            width: 70%;
        }
    }
</style>