<style>
    [mn="6100"] {
        /* overflow: inherit;
        background-image: linear-gradient(0deg, rgba(204, 204, 204, 1) 0%, rgba(255, 255, 255, 1) 100%); */
    }

    [mn="6100"] .l {
        flex: 0 0 300px;
        ;
        max-width: 300px
    }

    [mn="6100"] .r {
        flex: 1 0 0;
    }

    [mn="6100"] .l,
    [mn="6100"] .r {
        padding: 0 15px
    }

    [mn="6100"] .comp-name {
        line-height: 1.1;
        margin: 0 0 3px
    }
    [mn="6100"] .options-main {
        background-color: #fff;
        padding: 10px 0;
        /* box-shadow: 0px 5px 13px rgba(0, 0, 0, .3); */
        border: 1px #ccc solid;
    }

    [mn="6100"] .option {
        padding: 3px 15px;
        flex: 0 0 100%;
        max-width: 100%
    } 
    [mn="6100"] .option input {
        margin: 0 0;
        border: 0;
        border-bottom: 1px solid #ccc;
        padding: 12px 24px 12px 0;
    }

    [mn="6100"] .option label {
        text-transform: uppercase;
        font-family: var(--font-t1);
        font-size: 80%;
        color: #888
    }

    [mn="6100"] .options {
        z-index: 1;
    }

    [mn="6100"] .option:nth-child(3) {
        z-index: 1
    }

    [mn="6100"] .option:nth-child(2) {
        z-index: 2
    }

    [mn="6100"] .option:nth-child(1) {
        z-index: 3
    } 
    [mn="6100"] iframe {
        width: 100%;
        height: 100vh;
        /* height: 65vh;
        min-height: 300px;
        background-color: #ccc; */
    }

    [mn="6100"] .options-main {
        z-index: 10
    }

    [mn="6100"] .comp-address {
        font-size: 80%;
        line-height: 1.1
    }

    [mn="6100"] .comp-address p {
        margin: 0 0 0
    }

    [mn="6100"] .addressbx {
        min-height: 100px;
        line-height: 1
    }

    @media only screen and (max-width: 991px) {
        [mn="6100"] .option {
            flex: 0 0 100%;
            max-width: 100%
        }

        [mn="6100"] .option~.option {
            border-left: 0
        }
    }

    @media only screen and (max-width: 767px) {
        [mn="6100"] .iframe-main {
            margin: 30px 0 0
        }

        [mn="6100"] .l,
        [mn="6100"] .r {
            flex: 0 0 100%;
            max-width: 100%
        }
    }

    @media only screen and (max-width: 600px) {
        #map{
            display: none;
        }

        [mn="6100"] .info-container{
            width: 100% !important;
        }
    }

    [mn="6100"] {
        height: calc(100vh - 70px);
        min-height: unset !important;
        padding: unset !important;
        
        border-bottom: 1px solid #ccc;
        overflow: hidden;

        display: flex;
    }
    
    [mn="6100"] .info-container{
        float: left;
        background-color: #f3f3f5;
        box-sizing: border-box;
        
        width: 387px;
        height: 100vh;
    }

    [mn="6100"] .info-container .search-container{
        padding: 20px;
        background-color: #e9e9ec;
    }

    [mn="6100"] .info-container .search-container .total-result {
        /* font-size: .88rem !important; */
        padding-bottom: 15px;
    }

    .found-count{
        font-size: .88rem !important;
    }

    [mn="6100"] .info-container .search-container .total-result {
        display: block;
        color: #282a2f !important;
        font-size: 1rem !important;
        font-weight: 500;
        line-height: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding-bottom: 20px;
    }

    .reset-link {
        letter-spacing: unset;
        font-size: .6rem;
        float: right;
        top: 1px;
        right: 0;
    }

    [mn="6100"] .search-result {
        height: calc(100vh - 243px);
        overflow: auto;
        margin-bottom: 100px;
    }

    .table-scroll {
        display: block;
        empty-cells: show;
        border-spacing: 0;
    }

    .body-half-screen {
        max-height: 50vh;
    }

    [mn="6100"] .search-result .result-title {
        padding: 15px 20px;
        border: 0;

        cursor: pointer;
        border-top: 1px solid rgba(224,19,39,.5);
        background-color: #fff;
    }

    .intro-title {
        font-size: 1.000rem;
        line-height: 1.5em;
        font-weight: 500;
        letter-spacing: 0.25px;
    }

    [mn="6100"] .search-result .result-title .location-details {
        float: left;
    }

    [mn="6100"] .search-result .result-title .location-details .name {
        font-size: 0.88rem;
        white-space: normal;
        width: 250px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    [mn="6100"] .search-result .result-title.more:after {
        content: "";
        background: url(https://honda.com.my/img/interface/arrow-red-down.png) no-repeat;
        position: absolute;
        margin-left: 5px;
        top: 18px;
        width: 16px;
        height: 10px;
        transition: all 0.4s ease;
        right: 16px;
    }

    [mn="6100"] .search-result .result-title.more.rotate:after {
        transform: rotate(180deg);
    }

    .floatfix, .clearfix {
        clear: both;
    }

    [mn="6100"] .search-result .expand-content {
        padding: 0 20px;
        background-color: #fff;
    }

    [mn="6100"] .search-result .result-title:last-of-type, [mn="6100"] .search-result .expand-content {
        border: 0;
    }

    [mn="6100"] .search-result .expand-content .details p {
        padding-bottom: 20px;
        color: #282a2f;
        font-size: 0.8125rem;
        font-weight: 400;
        line-height: 1.3125rem;
        padding: 0;
        margin: 0;
    }

    #dealerlist > .result-container > .expand-content > .details:not(:last-child) > p > span, #dealerlist > .result-container > .expand-content > .details:not(:last-child) > p > br {
        display: none;
    }

    [mn="6100"] .search-result .expand-content ul.btn-container {
        list-style: none;
        border-bottom: 1px solid #cccccc;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    [mn="6100"] .search-result .expand-content ul.btn-container li {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 400;
        line-height: 1.125rem;
        letter-spacing: 1.1px;
        text-transform: uppercase;
        color: #e01327;
        width: 30%;
        min-width: 100px;
    }

    [mn="6100"] .search-result .expand-content ul.btn-container li a {
        color: inherit;
    }

    #map {
        border-left: 2px solid #ccc;
    }

    [mn="6100"] .map {
        float: left;
        width: calc(100% - 387px);
    }

    .refresh-btn {
        width: 15px;
        vertical-align: middle;
        display: inline-block;
        margin-top: -5px;
    }

    .expand-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .expand-content.active {
        max-height: 100vh;
        padding-bottom: 20px !important;
    }
</style>