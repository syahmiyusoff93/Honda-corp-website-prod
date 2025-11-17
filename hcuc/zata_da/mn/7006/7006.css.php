<style>
    [mn="7006"] .itms {
        margin: 0 -9px; 
    } 
    [mn="7006"] .itm {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 9px; 
    }
    [mn="7006"] .cus {
        text-align: center
    }

    [mn="7006"] .txt {
        padding: 18px 12px 12px;
        transition: all ease-in-out .4s;
        position: absolute;
        bottom: 0;
        left: 0; 
        width: 100%; 
        color: #fff;
        z-index: 2;
        background: rgb(0, 0, 0, .5);
    background: linear-gradient(0deg, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, 0) 100%);
    }
    [mn="7006"] .txt .l {
        flex: 0 0 40%;
        max-width: 40%
    }
    [mn="7006"] .txt .r {
        flex: 0 0 calc(100% - 40%);
        max-width: calc(100% - 40%)
    }
    [mn="7006"] .txt .r ul {
        text-align: right
    }
    [mn="7006"] .txt .r ul,
    [mn="7006"] .txt .r li {
        padding: 0;
        margin: 0;
        list-style-type: none; 
    }
    [mn="7006"] .txt .r  li {
        display: inline-block;
        padding: 6px;
    }
    [mn="7006"] .img-w + div {
        margin: 3px 0 6px
    }
    [mn="7006"] .img-w img {
        max-width: 50%;
        max-height: 60px
    }
    [mn="7006"] .ttl {
        line-height: 1.1; 
        margin: 0 0 3px; 
        font-size: 120%
    }

    [mn="7006"] a {
        color: inherit;
        cursor: pointer;
        font-weight: inherit
    }
    [mn="7006"] .bimg-w {
        z-index: 1;
    }
    [mn="7006"] .bimg-w:after {
        content: '';
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        background-color: rgba(0,0,0,.35);
        z-index: 1
    }
    [mn="7006"] .bimg {
        padding-top: 54%;
        transition: all ease-in-out .4s;
        transform: scale(1)
    } 
    [mn="7006"] a:hover .bimg {
        transform: scale(1.05)
    }
    [mn="7006"] .btn-gen {
        border: 2px solid #fff;
        color: var(--clr02x,#fff);
        background-color: transparent;
        padding: 6px 12px
    } 
    @media screen and (max-width: 767px) {
        [mn="7006"] .itm {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    @media screen and (max-width: 767px) {
        [mn="7006"] .itm {
            flex: 0 0 100%;
            max-width: 100%;
        } 
    }
    @media screen and (max-width: 575px) {
        [mn="7006"] .txt .r li {
            padding: 0 3px 1px;
    font-size: 65%;
        }
    }
</style> 