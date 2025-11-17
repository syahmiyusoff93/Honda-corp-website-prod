<style>
    [mn="3005"] .cus {
        text-align: center
    } 

    [mn="3005"] [owl] .item {
        height: 100%;
        padding: 0;
    }

    [mn="3005"] a:hover .view{
        text-decoration: underline;
    }
    [mn="3005"] .item .view {
        font-size: var(--font-s)
    }
    [mn="3005"] [owl] .owl-stage {
        display: flex;
        flex-wrap: wrap;
    }

    [mn="3005"] [owl] svg {
        max-width: 100%;
        width: auto;
        max-height: 100%;
        height: auto;
        fill: #333;
        transition: all ease .4s;
    }

    [mn="3005"] [owl] button.owl-next,
    [mn="3005"] [owl] button.owl-prev {
        width: 45px;
        height: 45px;
        padding: 15px !important;
        background-color: var(--clr01x, #fff);
        display: flex;
        /* opacity: .8; */
        border-radius: 50%;
        border: 0 solid var(--clr01);
        margin: 0 !important;
        box-shadow: -3px 3px 7px rgba(0, 0, 0, .3);
    }

    [mn="3005"] [owl] button.owl-next:hover,
    [mn="3005"] [owl] button.owl-prev:hover {
        background-color: var(--clr01);
    }

    [mn="3005"] [owl] button.owl-next:hover svg,
    [mn="3005"] [owl] button.owl-prev:hover svg {
        fill: #fff;
    }

    [mn="3005"] [owl] button.owl-next {
        transform: translate(-50%, 50%)
    }

    [mn="3005"] [owl] button.owl-prev {
        transform: translate(50%, 50%)
    }

    [mn="3005"] [owl] .owl-stage-outer {
        padding-top: 15px;
        padding-bottom: 60px;
    }

    [mn="3005"] .item .bimg {
        padding-top: 50%;
        border: 1px solid #eee;
        background-position: top;
    }
        [mn="3005"] .item>div:hover .bimg:not([da-hovsec]) {
        background-position: bottom;
    }
    [mn="3005"] .item>div {
        filter: grayscale(1);
    } 

    [mn="3005"] .item>div:hover {
        filter: grayscale(0);
    }
    [mn="3005"] .item>div:hover .play img {
        transform: scale(1.1);
    }

    [mn="3005"] .item>div.wrapxp {
        height: 100%;
        background-color: #fff;
        overflow: hidden;
        
    } 

    [mn="3005"] .ttl {
        font-weight: bold
    } 
    @media (max-width: 575px) {
        [mn="3005"] .ttl-w {
            padding: 0 15px
        }
        [mn="3005"] .main {
            padding: 0
        }
    }
</style>
<style>
    .licht3005 img {
        display: block;
        margin: 0 auto;
    }
    .licht3005 .main > div:not(.close-pop-w) {
        background-color: transparent;
        color: #fff;
        padding: 0
    }
    .licht3005 h2 {
        color: inherit
    }
</style>