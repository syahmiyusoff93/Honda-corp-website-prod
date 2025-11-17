<style>
    [mn="5100"] {
        background-color: #fff;
        /* background-color: #555; */
        color: #fff;
        min-height: 50vh
    }
    [mn="5100"] h2 {
        color: inherit
    }
    [mn="5100"] .row + .ttl {
        margin-top: 20px
    }
    [mn="5100"] .ttl {
        font-size: 130%;
        /* text-align: center; */
        font-family: var(--font-t1);
        text-transform: uppercase;
        color: #4B4B4B;
    }
    [mn="5100"] .taste {
        text-align: right;
        padding: 15px 0
    }
    [mn="5100"] ::-webkit-calendar-picker-indicator {
        filter: invert(0);
    }
    [mn="5100"] .main { 
        max-width: 890px;
        /* max-width: 600px */
    }
    [mn="5100"] .loc-w {
        margin-top: 15px
    }
    [mn="5100"] .loc-w .l {
        flex: 0 0 200px;
        max-width: 200px;
        /* flex: 0 0 160px;
        max-width: 160px */
    }
    [mn="5100"] .loc-w .r {
        flex: 0 0 calc(100% - 200px);
        max-width: calc(100% - 200px);
        /* flex: 0 0 calc(100% - 160px);
        max-width: calc(100% - 160px); */
        padding: 0 0 0 15px;
        margin: 0 0 15px
    } 
    @media (max-width: 575px) {
        [mn="5100"] .loc-w .l,
        [mn="5100"] .loc-w .r {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 6px 0 0
        }
    }

    .agree {
        line-height: 1.4;
        color: #4B4B4B;
    }

    .input-label {
        color: #4B4B4B;
        text-transform: uppercase;
        font-family: var(--font-b1);
        padding-left: 10px;
        margin-bottom: 0;
    }

    .field-style {
        border: 1px solid #FFFFFF;
        box-shadow: 0px 2px 4px #00000029;
        margin: 0 0 16px !important;
    }

    input{
        border: unset !important;
        padding-top: 0;
        padding-bottom: 0;
    }

    input::placeholder {
        opacity: 0.4;
    }

    .btn-gen-custom-v3 {
        border: 1px solid #EC1D2F;
        color: #4B4B4B;
        background-color: #FFFFFF;
        padding: 5px 62px;

        &:hover {
            background-color: #E8E8E8;
        }
    }

    .right-input-red-icon{
        position: absolute;
        top: 50%;
        right: -1px;
        transform: translateY(-50%);
        color: #555;
        background-color: #EC1D2F;
        height: 100%;
        padding: 13px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 49px;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        cursor: pointer;
        height: auto;
        position: absolute;
        right: 0;
        top: 0;
        width: 50px;
        z-index: 3;
    }
</style>
