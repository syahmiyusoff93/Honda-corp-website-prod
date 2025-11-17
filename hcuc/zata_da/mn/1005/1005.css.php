<style>
    [mn="1005"] {
        min-height: 50vh;
        z-index: 1;
        padding: 200px 0 300px
    }

    [mn="1005"] .main>div {
        margin: 30px 0
    }

    [mn="1005"] .sushiplate {
        position: absolute;
        right: 0;
        top: 250px;
        z-index: -1;
    }

    [mn="1005"] .redround {
        position: absolute;
        left: 0;
        top: 0;
        z-index: -1;
        mix-blend-mode: overlay
    }
    [mn="1005"] .sushicon {
        position: absolute;
    left: 134px;
    top: 517px;
    }

    [mn="1005"] .txtbx-2,
    [mn="1005"] .txtbx-1 {
        color: #fff;
    }
    [mn="1005"] .txtbx-0 {
        text-align: center
    }
    [mn="1005"] .txtbx-2 .lr-w {
        flex-direction: row-reverse
    }

    [mn="1005"] h2 {
        color: inherit;
        text-align: inherit
    }

    [mn="1005"] .txtbx-1 .l,
    [mn="1005"] .txtbx-2 .l {
        flex: 0 0 540px;
        max-width: 100%;
        padding: 60px 0
    }

    [mn="1005"] .txtbx-1 .l:after {
        content: '';
        position: absolute;
        width: calc(100vw + 500px);
        height: 100%;
        right: -100px;
        top: 0;
        background-color: rgba(123, 46, 0, .7);
        mix-blend-mode: hard-light;
        z-index: -1;
        clip-path: polygon(0 0, 100% 0%, calc(100% - 60px) 100%, 0% 100%);
    }

    [mn="1005"] .txtbx-2 .l:after {
        content: '';
        position: absolute;
        width: calc(100vw + 500px);
        height: 100%;
        right: 50%;
        top: 0;
        background-color: rgba(33, 55, 69, 1);
        mix-blend-mode: hard-light;
        z-index: -1;
        transform: translate(50%, 0)
    }

    [mn="1005"] .sushiplatebtm {
        position: absolute;
        top: -50px;
        left: -100px;

    }

    [mn="1005"] .chalk {
        position: absolute;
        bottom: -206px;
        left: 26%;
        z-index: 1
    }

    [mn="1005"] .sourceplate {
        position: absolute;
    bottom: -109px;
    right: 0;
    }

    @media (max-width: 1200px) { 
        [mn="1005"] .chalk,
        [mn="1005"] .sushiplatebtm {
            z-index: -1
        }

    }

    @media (max-width: 991px) { 
        [mn="1005"] .sushicon {
            display: none
        }
    }
    @media (max-width: 767px) { 
        [mn="1005"] .chalk,
        [mn="1005"] .sushiplatebtm {
            display: none
        }

    }
    @media (max-width: 575px) { 
        [mn="1005"] { 
        padding: 100px 0 200px
    }
        [mn="1005"] .chalk,
        [mn="1005"] .sushiplatebtm {
            display: none
        }
        [mn="1005"] .sushiplate {
            top: 445px;
        }
        [mn="1005"] .sourceplate{
                bottom: -50px
        }
    } 
</style>