<style>
    [mn="1900"] {
        min-height: 100vh;
        padding: 120px 0
    }
    
    [mn="1900"] .objgrp {
        padding-top: 75%;
        position: relative;
        margin: 0 0 30px
    }
    
    [mn="1900"] .obj01,
    [mn="1900"] .obj02,
    [mn="1900"] .obj03 {
        position: absolute; 
        cursor: pointer
    }
    
    [mn="1900"] .obj01 {
         bottom: 26.5%;
    left: 23%;
    z-index: 1;
    width: 28.5%;
    }
    [mn="1900"] .obj02 {
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 2
    }
    [mn="1900"] .obj03 {
        bottom: 27.8%;
    left: 57%;
    z-index: 1;
    width: 26.5%;
    }
    [mn="1900"] .objgrp:hover [class*=obj]:not(:hover){
        opacity: .7
    }
    [mn="1900"] .main {
        max-width: 1000px;
        background-color: #fff;
        padding: 25px;
        box-shadow: 0px 5px 13px rgba(0, 0, 0, .3);
    }

    [mn="1900"] .layer {
        position: absolute;
        width: 100%;
        height: 100vh;
        left: 0;
        top: 0;
        z-index: -1
    }

    [mn="1900"] .layer:after {
        content: '';
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: linear-gradient(0deg, rgba(48, 49, 142, 1) 0%, rgba(48, 49, 142, 0) 50%);
        z-index: -1;
    }

    [mn="1900"] .layer+.gradient {
        content: '';
        position: absolute;
        display: block;
        left: 0;
        top: 100vh;
        height: 80vh;
        width: 100%;
        background: rgb(48, 49, 142);
        background: linear-gradient(180deg, rgba(48, 49, 142, 1) 0%, rgba(48, 49, 142, 0) 80%);
        z-index: -1;
    }

    [mn="1900"] p+h2 {
        margin-top: 60px;
    }

    [mn="1900"] a {
        color: var(--clr01);
    }

    [mn="1900"] .desc img {
        width: auto !important;
        cursor: pointer;
        max-height: 50vh;
    }

    [mn="1900"] .gals {
        margin: 0 -9px
    }

    [mn="1900"] .gals .gal {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 9px
    }

    @media (max-width: 575px) {
        [mn="1900"] h2 {
            font-size: 145%;
        }

        [mn="1900"] .gals .gal {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>