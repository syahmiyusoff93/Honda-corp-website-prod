<style>
    [mn="5000"] {
        /* background-color: #555;
        color: #fff */
        color: #615F62
    }
    [mn="5000"] .ttl {
        font-size: 130%;
        /* text-align: center; */
        text-align: left;
        font-family: var(--font-t1);
        text-transform: uppercase;
        color: #4B4B4B;
    }
    [mn="5000"] .taste {
        text-align: right;
        padding: 15px 0
    }
    [mn="5000"] ::-webkit-calendar-picker-indicator {
        filter: invert(0);
    }
    [mn="5000"] .main { 
        /* max-width: 600px */
        max-width: 800px;
    }

    input{
        border: unset !important;
        padding-top: 0;
        padding-bottom: 0;
    }

    .input-label{
        color: #4B4B4B;
        text-transform: uppercase;
        font-family: var(--font-b1);

        padding-left: 10px;
        margin-bottom: 0;
    }

    .field-style{
        border: 1px solid #FFFFFF;
        box-shadow: 0px 2px 4px #00000029;
        margin: 0 0 16px !important;
    }

    .agree{
        line-height: 1.4;
        color: #4B4B4B;
    }

    input::placeholder {
        /* position: relative;
        top: -10px; */
        opacity: 0.4;
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

    .btn-gen-custom-v3{
        border: 1px solid #EC1D2F;
        color: #4B4B4B;
        background-color: #FFFFFF;
        padding: 5px 62px;

        &:hover{
            background-color: #E8E8E8;
        }
    }
</style>
