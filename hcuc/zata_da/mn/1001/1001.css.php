<style>
    [mn="1001"] {
        padding: 0 0;
        background-color: #fefefe
    }

    [mn="1001"] .ln .bimg {
        padding-top: 60%;
    }

    [mn="1001"] .rn .bimg-w {
        width: 250px;
        max-width: 65%;
    }

    [mn="1001"] .ln,
    [mn="1001"] .rn {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 15px;
    }

    [mn="1001"] .ln {
        min-height: 60vh;
    }
    [mn="1001"] ul {
        display: table;
        margin: 0 auto;
        max-width: 100%;
    }
    [mn="1001"] ul,
    [mn="1001"] ::marker {
        color: var(--clr01)
    }
    [mn="1001"] .rn > div.ttl + div.txt {
        flex: 1 0 0
    }
    [mn="1001"] .rn>div.txt {
        max-width: 600px;
        padding: 30px 15px;
    }

    [mn="1001"] .rn>div.ttl {
        width: 100%; 
    }

    [mn="1001"] .ttl {
        font-size: var(--font-xxl);
        font-family: var(--font-t1);
        background: linear-gradient(90deg, #901d24 0%, var(--clr01) 100%);
        line-height: 1;
        padding: 30px 15px;
        color: #fff;
    }

    [mn="1001"] .itms>.itm:nth-child(odd)>div {
        flex-direction: row-reverse;
    }

    [mn="1001"] .itms>.itm:nth-child(even)>div {}

    [mn="1001"] .rn {
        background-size: cover;
        padding: 0;
        flex-direction: column
    }

    [mn="1001"] .itms>.itm {
        background-color: #fff;
        color: #231F20;
        /* background-color: #231F20;
        color: #fff; */
        text-align: center
    }

    [mn="1001"] .itms>.itm:nth-child(odd) .taste .btn-gen {
        border: 2px solid var(--clr02x, #fff);
        color: var(--clr02x, #fff);
        background-color: var(--clr02x, #fff);
        color: var(--clr02)
    }

    [mn="1001"] .itms>.itm:nth-child(odd) .rn {
        /* background-image: url(<?php echo $htt[0]?>zata_da/src/default/webline2.png); */
    }

    [mn="1001"] .itms>.itm:nth-child(even) .rn {
        /* background-image: url(<?php echo $htt[0]?>zata_da/src/default/webline.png); */
    }

    @media (max-width: 991px) { 
        [mn="1001"] .ln,
        [mn="1001"] .rn {
            flex: 0 0 100%;
            max-width: 100%;
            width: 100%;
        }
    }

    @media (max-width: 575px) {
        [mn="1001"] .ln {
            min-height: unset;
        }

        [mn="1001"] .itms>.itm>div {
            flex-direction: column-reverse !important;
        }

        [mn="1001"] .itms>.itm:nth-child(odd) .rn {
            text-align: inherit
        } 
        [mn="1001"] .rn>div {
            max-width: 100%;
        }
    }
</style>