<style> 
    [mn="7104"] {  
        background-color: #f1f1ee
    }

    [mn="7104"] .gals {
        margin: 0 -15px;
    }

    [mn="7104"] h2.cus {
        margin: 0 0 30px !important;  
    }

    [mn="7104"] .gal .bimg-w {
        width: 60px;
        margin-bottom: 15px
    }

    [mn="7104"] .gal .bimg {
        mix-blend-mode: multiply; 
    }
    [mn="7104"] .gal {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 15px;
        text-align: center;
    }
    [mn="7104"] .gal:after {
        content: '';
        position: absolute;
        display: block;
        width: 2px;
        height: 70%;
        right: 0;
        top: 50%;
        transform: translate(50%,-50%);
        background-color: #ccc
    }
    [mn="7104"] .taste {
        text-align: center;
        margin: 30px 0 0
    }
    [mn="7104"] .gal:last-child:after {
        display: none !important
    }
    [mn="7104"] .num {
        font-family: var(--font-t2);
        line-height: 1.1;  
        font-size: 150%;
        margin: 0 0 9px
    }
    [mn="7104"] .desc { 
        line-height: 1.2;
        width: 100%;
        max-width: 185px;
        margin: 0 auto
    }
    [mn="7104"] .med {
        width: 100%;
        text-align: left;
        margin: 30px 0 0
    }
    [mn="7104"] .med .bimg-w {
        padding: 0;
    }
    [mn="7104"] .med .medttl { 
        padding: 0
    }
    [mn="7104"] .med .scon {
        margin: 3px;
        border: 0 solid var(--clr01);
        background-color: transparent;
        max-width: 35px;
        width: 35px; 
    }
    [mn="7104"] .med .scon:hover {  
    }
    [mn="7104"] .med .scon .bimg {
        background-color: transparent;
        border: 50%;
    }
    [mn="7104"] .med .scon:hover .bimg {
        background-color: #fff;
    } 
    @media only screen and (max-width: 767px) {
        [mn="7104"] .gal:nth-child(even):after {
            display: none
        }
        [mn="7104"] .gal {
            flex: 0 0 50%;
            max-width: 50%;
        }
    } 
</style>