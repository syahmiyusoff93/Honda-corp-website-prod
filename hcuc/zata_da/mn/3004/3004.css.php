 <style>
     [mn="3004"] {}

    [mn="3004"] [owl] .item {
        height: 100%;
        padding: 0;
    }

    [mn="3004"] [owl] a {
        color: inherit;
    }

    [mn="3004"] [owl] .owl-stage {
        display: flex;
        flex-wrap: wrap;
    }

    [mn="3004"] [owl] svg {
        max-width: 100%;
        width: auto;
        max-height: 100%;
        height: auto;
        fill: #fff;
        transition: all ease .4s;
    }

    [mn="3004"] [owl] button:hover svg {
        fill: #fff
    }

    [mn="3004"] [owl] button.owl-next,
    [mn="3004"] [owl] button.owl-prev {
        width: 42px;
        height: 65px;
        padding: 13px !important;
        background-color: rgba(0, 0, 0, .4);
        display: flex;
        align-items: center;
        opacity: .9;
        margin: 0 !important;
    }

    [mn="3004"] [owl] button.owl-next {
        /*        transform: translate(50%, 0)*/
    }

    [mn="3004"] [owl] button.owl-prev {
        /*        transform: translate(-50%, 0)*/
    }

    [mn="3004"] [owl] button.owl-next:hover,
    [mn="3004"] [owl] button.owl-prev:hover {
        background-color: var(--clr02);
    } 
    [mn="3004"] .item>.wrap {
        height: 100%;
        background-color: #fff;
        overflow: hidden;
        /*        border: 1px solid #ccc;*/
        /*        box-shadow: 0 50px 50px -47px rgba(0, 0, 0, 0.45);*/
    }

    [mn="3004"] .event .bimg {
        padding-top: 60%;
    } 
</style>
<style>
    [mn="3004"] .bimg-w {
        overflow: hidden
    }

    [mn="3004"] .bimg {
        padding-top: 75%;
    } 

    [mn="3004"] .l {
        z-index: 10;
        padding: 20px 15px 20px 20px
    }

    [mn="3004"] .l,
    [mn="3004"] .r {
        flex: 0 0 50%;
        max-width: 50%;
    }

    [mn="3004"] [owl] button {
        background: 0 0;
        color: inherit;
        border: none;
        padding: 0 !important;
    }

    [mn="3004"] [owl] .owl-dot span {
        background-color: transparent;
        border: 2px solid #000;
        cursor: pointer
    }

    [mn="3004"] [owl] .owl-dot.active span {
        background-color: #000;
    }

    [mn="3004"] .owl-carousel .dotcont {
        display: none
    }

    [mn="3004"] .dotcontainer {
        
    }
    [mn="3004"] .dotcontainer .dotcont.disabled {
        display: none
    }

    [mn="3004"] .textbox {
        margin: 0 0 65px
    }
    [mn="3004"] .ttl {  
        line-height: 1;
        margin: 0 0 15px
    }
    [mn="3004"] .ttl h2 {
        text-align: inherit;
        margin: 15px 0 65px
    }
    [mn="3004"] .lr-w {
        background-color: #eee
    }
    @media only screen and (max-width: 767px) {
        [mn="3004"] .ttl h2,
        [mn="3004"] .textbox {
            text-align: inherit;
            margin: 9px 0 15px
        }
        [mn="3004"] .ttl {
            font-family: var(--font-t1); 
        }

        [mn="3004"] .l {
            flex: 0 0 100%;
            max-width: 100%;
        }

        [mn="3004"] .r {
            flex: 0 0 100%;
            max-width: 100%;
        }

        [mn="3004"] .l:after {
            width: 100%;
            height: 150%;
        }
    }
</style>