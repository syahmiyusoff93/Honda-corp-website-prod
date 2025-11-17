<style>
    [mn="1"] {}

    [mn="1"] .els .el {
        max-width: 50%;
        flex: 0 0 50%;
        text-align: center;
    }

    [mn="1"] .info {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translate(0, -50%);
        font-family: var(--font-t1);
    }

    [mn="1"] .ttl {
        font-size: 150%;
        padding: 15px;
        line-height: 1.2;
        color: #fff;
        filter: drop-shadow(-2px 2px 2px rgba(0, 0, 0, .95));
    }

    [mn="1"] .bimg {
        padding-top: 55%;
        filter: grayscale(1);
        transition: all ease .4s;
    }

    [mn="1"] a:hover .bimg {
        filter: grayscale(0);
    }

    @media only screen and (max-width: 575px) {
        [mn="1"] .els .el {
            max-width: 100%;
            flex: 0 0 100%;
        }
    }
</style>