<style>
    [mn="3002"] {
        padding: 0 0;
        background-color: #fefefe
    }

    [mn="3002"] h2 {}

    [mn="3002"] .desc {
        display: block;
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 0 0 30px ;
        text-align: justify;
        color: #ddd
    }

    [mn="3002"] .txtbox h2 {
        text-align: inherit;
        margin: 0 0;
        color: inherit
    }

    [mn="3002"] .txtbox {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50%;
        height: 100%;
        background-color: rgba(0, 0, 0, .45);
        padding: 30px;
        color: #fff
    }

    [mn="3002"] .txtbox>div {
        max-width: 70%
    }

    [mn="3002"]  .btn-gen {
        border: 1px solid #fff;
        color: #fff;
        background-color: transparent;
    } 
    [mn="3002"]  .btn-gen:hover {
        border: 1px solid var(--clr01); 
        background-color: var(--clr01);
    } 

    [mn="3002"] .bimg {
        padding-top: 0;
        min-height: 70vh
    }

    @media (max-width: 767px) {
        [mn="3002"] .txtbox {
            width: 100%;
        }

        [mn="3002"] .img-lyr {
            display: none
        }

        [mn="3002"] .bimg {}
    }
    @media (max-width: 575px) {
        [mn="3002"] .desc{
            text-align: inherit
        }
    }
</style>
<style>
    [mn="3002"] [owl] .owl-stage {
        display: flex;
        flex-wrap: wrap;
    }

    [mn="3002"] [owl] .item {
        padding: 0;
    }

    [mn="3002"] [owl] .item,
    [mn="3002"] [owl] .item>div {
        height: 100%;
    }

    [mn="3002"] [owl] svg {
        max-width: 100%;
        width: auto;
        max-height: 100%;
        height: auto;
        fill: #222;
        transition: all ease .4s;
    }

    [mn="3002"] [owl] .owl-dot span {
        background-color: transparent;
        border: 2px solid var(--clr01);
    }

    [mn="3002"] [owl] .owl-dot.active span {
        background-color: var(--clr01);
    }

    [mn="3002"] [owl] button.owl-next,
    [mn="3002"] [owl] button.owl-prev {
        width: 35px;
        height: 35px;
        padding: 9px !important;
        background-color: rgba(255, 255, 255, .8);
        display: flex;
    }

    [mn="3002"] [owl] button.owl-next:hover,
    [mn="3002"] [owl] button.owl-prev:hover {
        background-color: var(--clr01);
    }

    [mn="3002"] [owl] button.owl-next:hover svg,
    [mn="3002"] [owl] button.owl-prev:hover svg {
        fill: #fff;
    }

    @media only screen and (max-width: 575px) {
        [mn="3002"] [owl] .owl-dots {
            display: block
        }
    }
</style>