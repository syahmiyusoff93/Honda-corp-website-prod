 <style>
     [mn="3003"] {
         padding: 0 0;
         color: #fff;
         text-align: center;
         background: rgb(0, 0, 0);
         /*
        background: linear-gradient(180deg, rgba(51, 51, 51, 1) 0%, rgba(0, 0, 0, 1) 65%, rgba(204, 204, 204, 1) 77%, rgba(238, 238, 238, 1) 100%);
        overflow: hidden;
*/
     }

     [mn="3003"] .owl-carousel {
         z-index: 1
     }
     [mn="3003"] [da-iframe] {
         cursor: pointer
     }
     [mn="3003"] .owl-carousel:after {
/*
         content: '';
         width: 100%;
         height: 100%;
         position: absolute;
         left: 0;
         top: 0;
         background-color: rgba(0, 0, 0, .35);
         mix-blend-mode: multiply;
         background-image: url(<?php echo $htt[0]; ?>/zata_da/src/default/dotting.png);
         background-size: auto;
         background-repeat: repeat
*/
     }

     [mn="3003"] [owl] img {
         display: inline-block;
         width: auto;
     }

     [mn="3003"] [owl] .item {
         z-index: 1;
     }

     [mn="3003"] [owl] .item:after {

         content: '';
         position: absolute;
         left: 0;
         top: 0;
         height: 100%;
         width: 100%;
/*         background-color: rgba(1, 69, 125, .35);*/
         z-index: -1;
         mix-blend-mode: multiply;

     }

     [mn="3003"] [owl] .itemrow>div {
         max-width: 100%;
         flex: 0 0 1000px;
     }

     [mn="3003"] [owl] .owl-dot span {
         height: 6px;
         width: 6px;
         display: block;
         background-color: transparent;
         margin: 0 5px;
         border-radius: 0;
         border: 1px solid #fff;
         transition: all ease .4s;
         cursor: pointer
     }

     [mn="3003"] [owl] .owl-dot.active span {
         height: 6px;
         width: 20px;
     }

     [mn="3003"] [owl] button.owl-dot {
         vertical-align: middle;
     }

     [mn="3003"] [owl] svg {
         max-width: 100%;
         width: auto;
         max-height: 100%;
         height: auto;
         fill: #fff;
     }

     [mn="3003"] [owl] button.owl-next,
     [mn="3003"] [owl] button.owl-prev {
         width: 40px;
         height: 40px;
         padding: 13px !important;
         background-color: var(--clr01);
         display: flex;
         border-radius: 50%;
     }

     [mn="3003"] [owl] button.owl-next:hover,
     [mn="3003"] [owl] button.owl-prev:hover {
         background-color: var(--clr02);
     }

     [mn="3003"] .ifr {
         width: 100px;
         margin: 0 auto;
         cursor: pointer;
     }

     [mn="3003"] .full {
         text-align: center;
     }

     [mn="3003"] h2 {
         text-align: inherit;
         color: inherit;
         margin: 0 0 15px;
         font-size: var(--font-xl);
     }

     [mn="3003"] [owl] .itemrow {
         padding: 30px 0;
         min-height: 50vh;
     }

     [mn="3003"] .ln {
         text-align: left;
         padding-right: 15px;
     }

     [mn="3003"] .img-w {
         margin: 0 0 21px
     }

     [mn="3003"] .rn,
     [mn="3003"] .ln {
         flex: 0 0 100%;
         max-width: 100%;
         text-align: center;
     }

     [mn="3003"] .txt h2 {
         font-size: var(--font-xl);
         text-transform: inherit
     }
     [mn="3003"] .btn-arrow {
         width: 45px;
         height: 45px;
         background-color: transparent;
         cursor: pointer;
         border: 2px solid #fff;
         transition: .4s all ease;
     }
     [mn="3003"] .btn-arrow:hover {
         background-color: var(--clr01);
         border: 2px solid var(--clr01)
     }
     @media only screen and (max-width: 1010px) {
         [mn="3003"] .txt {
             padding: 60px 0
         }
     }

     @media only screen and (max-width: 991px) {
         [mn="3003"] [owl] .item:after {
             /*            display: none;*/
         }

         [mn="3003"] [owl] .owl-next,
         [mn="3003"] [owl] .owl-prev {
             -webkit-transform: translate(0, 50%);
             transform: translate(0, 50%);
         }

         [mn="3003"] [owl] button.owl-next,
         [mn="3003"] [owl] button.owl-prev {
             -webkit-transform: translate(0, 0);
             transform: translate(0, 0);
             border-radius: 0;
         }

         [mn="3003"] [owl] .owl-nav button {
             margin: 0 0 !important;
         }

         [mn="3003"] [owl] button.owl-next,
         [mn="3003"] [owl] button.owl-prev {
             width: 30px;
             height: 30px;
             padding: 8px !important;
         }
     }

     @media only screen and (max-width: 575px) {
         [mn="3003"] {
             text-align: center;
         }

         [mn="3003"] h2 {
             margin: 0 0 15px;
         }

         [mn="3003"] .ln {
             padding: 0 0 15px;
         }

         [mn="3003"] .rn,
         [mn="3003"] .ln {
             flex: 0 0 100%;
             max-width: 100%;
             text-align: center;
         }
     }

     [mn="3003"] .main {
         position: absolute;
         height: 100%;
         width: 100%;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%)
     }

     [mn="3003"] .txt .desc {
         font-size: 134%
     }

     [mn="3003"] input {
         padding-right: 65px;
         padding-left: 15px;
     }

     [mn="3003"] input,
     [mn="3003"] textarea,
     [mn="3003"] select {
         border: 2px solid #fff;
         background-color: #fff;
         border-radius: 9px;
     }

     [mn="3003"] [owl="cust"] {
         position: absolute;
         bottom: 15px;

     }

     [mn="3003"] [owl="cust"] button {
         border: 0;
         background-color: transparent;
         margin: 0;
         padding: 0;

     }

     /*
    [mn="3003"] [owl="cust"] button span {
        width: 20px !important;
        border-radius: 3px !important;
        cursor: pointer;
    }
*/
 </style>