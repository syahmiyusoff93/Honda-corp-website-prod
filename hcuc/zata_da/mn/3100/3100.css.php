<style>
    [mn="3100"] [owl] .item {
        height: 100%;
        padding: 0;
    }

    [mn="3100"] [owl] a {
        color: inherit;
    }

    [mn="3100"] [owl] .owl-stage {
        display: flex;
        flex-wrap: wrap;
    }

    [mn="3100"] [owl] svg {
        max-width: 100%;
        width: auto;
        max-height: 100%;
        height: auto;
        fill: #333;
        transition: all ease .4s;
    }

    [mn="3100"] [owl] button {
        position: relative;
        display: inline-block !important;
        font-size: inherit !important;
        border: 1px solid #ccc !important
    }

    [mn="3100"] [owl] button.owl-next,
    [mn="3100"] [owl] button.owl-prev {
        width: 45px;
        /* height: 45px; */
        padding: 14px !important;
        background-color: var(--clr01x, #fff);
        display: flex;
        /* opacity: .8; */
        /* border-radius: 50%; */
        border: 0 solid var(--clr01);
        margin: 0 3px !important;
        /* box-shadow: -3px 3px 7px rgba(0, 0, 0, .3); */
        line-height: 1;
    }

    [mn="3100"] .owl-nav {
        text-align: center
    }

    [mn="3100"] [owl] button.owl-next:hover,
    [mn="3100"] [owl] button.owl-prev:hover {
        background-color: var(--clr01);
    }

    [mn="3100"] [owl] button.owl-next:hover svg,
    [mn="3100"] [owl] button.owl-prev:hover svg {
        fill: #fff;
    }

    [mn="3100"] [owl] button.owl-next {
        transform: translate(0)
    }

    [mn="3100"] [owl] button.owl-prev {
        transform: translate(0)
    }

    [mn="3100"] [owl] .owl-stage-outer {
        padding-top: 15px;
        padding-bottom: 30px;
    }

    [mn="3100"] .item .bimg {
        background-size: contain
    }

    [mn="3100"] .item>div {
        cursor: pointer;

    }

    [mn="3100"] .item>div.wrapxp {
        height: 100%; 
        overflow: hidden;
        flex-direction: column;

    } 

    [mn="3100"] .ttl {
        text-transform: uppercase;
        padding: 9px 15px;
        transition: all ease-in-out .4s;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        color: #fff;
        background: var(--clr01);
        flex: 1 0 0
    }

    [mn="3100"] .bimg-w {
        padding: 45px;
        width: 100%;
    }
    [mn="3100"] .odd {
        background-color: #ddd;
    }
    [mn="3100"] .even {
        background-color: #ccc;
    }
    [mn="3100"] .even .ttl {
        background: var(--clr02);
    }
    @media (max-width: 575px) {
        [mn="3100"] .main {
            padding: 0
        }
    }
</style>