 
<style>
    [mn="5101"] {
        background-color: #f8f8f8
    }
    [mn="5101"] .lnrn-w {
        margin: 0 -15px
    }
    [mn="5101"] .rn,
    [mn="5101"] .ln {
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 15px;
    }
    [mn="5101"] .ln h2 {
        text-align: center
    }
    [mn="5101"] .ln { 
        background-repeat: no-repeat;
        background-size: auto;
        background-position: right bottom; 
        text-align: center
    }

    [mn="5101"] .ttl {
font-size: var(--font-l)
    }


    [mn="5101"].bef-ab:before {
        background-color: rgba(0, 0, 0, .75);
    }

    [mn="5101"] .top {
        text-align: center;
    }

    [mn="5101"] .main {
        width: 500px;
        max-width: 80%;
    }

    [mn="5101"] input:not([type="submit"]),
    [mn="5101"] textarea {
        margin: 0;
        padding: 9px;
        background-color: transparent;
        border: 0;
        border: 2px solid #ccc; 
    }

    [mn="5101"] .lab {
        transition: all ease .4s;
        position: absolute;
        left: 9px;
        top: 50%;
        transform: translate(0, -50%);
        z-index: -1;
        font-weight: bold;
        color: #aaa
    }
    [mn="5101"] textarea + .lab {
        top: 0;
        transform: translate(0, 50%);
    }

    [mn="5101"] .taste {
        text-align: right
    } 
    [mn="5101"] input:focus+.lab,
    [mn="5101"] textarea:focus+.lab,
    [mn="5101"] input.valed+.lab,
    [mn="5101"] textarea.valed+.lab {
        top: 0;
        left: 0;
        transform: translate(0, -100%);
        font-size: 80%;
        color: var(--clr01, #fff);
    }

    [mn="5101"] .imglg {
        padding-bottom: 15px;
    }

    [mn="5101"] input.valed,
    [mn="5101"] textarea.valed {}

    [mn="5101"] .grp {
        padding: 9px 0 15px;
    }

    [mn="5101"] .grp>div {
        z-index: 1;
    } 

    [mn="5101"] .chkbx>* {
        display: inline-block !important;
        vertical-align: middle !important;
        margin: 0 6px 0 0;
    }

    @media (max-width: 767px) {

        [mn="5101"] .rn,
        [mn="5101"] .ln {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 15px;
        }
    } 
</style> 