<?php
echo ' 
<section mn="'.$folder['module'].'"  da-id="'.$folder['id'].'" class=""> 

    <div class="info-container">
        <div class="search-container">
            <div class="total-result"><span class="found-count" id="found-count"></span>
                <div class="clearfix"></div>
            </div>

            <div class="input-box">
                <form id="lookup">
                    <input id="address" type="text" name="" class="input-text" placeholder="Enter location or postcode">
                </form>
                <div style="text-align: right">
                    
                </div>
            </div>
        </div>

        <div class="search-result table-scroll">
            <div id="dealerlist" class="body-half-screen">
                    
            </div>
        </div>
    </div>
    <div id="map" class="map" style="height: 100vh;">
        <div id="iframe-div">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6542086.409422965!2d106.54904995000906!3d2.4722818331052805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3034d3975f6730af%3A0x745969328211cd8!2sMalaysia!5e0!3m2!1sen!2smy!4v1621838040508!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <div class="clearfix"></div>

</section>';
?>



<script>
    $(async function () {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`),
            input = $('[name="state"]');

        $(window).resize(async () => {
            let H = await menuH;
            H += $('[mn="8401"]').outerHeight();
            main.css('min-height', `calc(100vh - ${H}px)`)
        }).resize();

        let data = <?php echo $MNC[$folder['module']]->jsonData($CON, $folder); ?> ; 
        let states = Object.keys(data),
            dataID = [];  
        
            
        await data.sort(function(a, b){return a.title.localeCompare(b.title)});
        
        let tmp = ''; 
        await asyncForEach(data, async (row, ind) => {
            tmp += `<div class="cus-drop" da-val="${escape(row?.title)}" da-dealer-id="${ind}" da-dealer-rowid="${escape(row?.id)}">
                <div>${row?.title}</div>
            </div>`;  
        }) ; 
        $('.drop-dealer',main).html(tmp);
        setSelectDealer();
 

        $('[name="dealer"]').click(()=>{
            $('[name="dealer"] + div .cus-drop-main ').addClass('show');
        }); $('.cus-drop-main').on('mouseleave', function(){ 
            $(this).removeClass('show');
        }) 
        
        function setSelectDealer() {
            $('.drop-dealer .cus-drop', main).click(function(){ 

                let opt = $(this),
                    index = opt.attr('da-dealer-id');
                    name = data[index].title,
                    address = data[index].address; 
                    iframe = data[index].iframe; 

                $('[name="dealer"]',main).val(name);  
                $('.addressbx',main).html(address);  
                $('.iframe',main).html(iframe);   

            })
        }

        let dealerID = getUrlVars()['dealer'],
            zeit = 500;

        // if( Boolean( dealerID )  &&  dealerID > 0 ){
        //     // input.trigger('click');
        //     // setTimeout(() => {
        //         // $(`[da-dealer-rowid="${escape(dealerID)}"]`, main).trigger('click');
        //     // }, zeit);
        // }

        for(let i = 0; i < data.length; i++){

            let modifiedAddress = data[i].address.replace(/<p>.*?<\/p>/, '');
            let companyName = data[i].title;
            let splitCompanyName = companyName.split("[");
            let ssm = splitCompanyName[1] || splitCompanyName[1] == 'undefined' ? `[${splitCompanyName[1]}` : "";

            let html = `
            <div class="result-container dealer${i}" id="dealer${i}" da-dealer-rowid="${data[i].id}">
                <div class="result-title intro-title more">
                    <div class="location-details">
                        <div class="name">${splitCompanyName[0]} <br> ${ssm}</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="expand-content" id="expand-content${i}" style="">
                    <div class="details">
                        <p>
                            ${modifiedAddress}
                        </p>

                        <div
                            style="
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            "
                        ></div>
                    </div>
                </div>
            </div>
            `;
            $('#dealerlist').append(html)

            $(`#dealer${i}`).on('click', (event) => {
                $(`[id^=expand-content]`).not(`#expand-content${i}`).removeClass('active');
                $(`#expand-content${i}`).toggleClass('active');
                
                $("#iframe-div").empty().append(data[i].iframe);

                $(`.search-result #dealerlist .result-title.more`).not(`#dealer${i} .result-title.more`).removeClass('rotate');
                $(`.search-result #dealerlist #dealer${i} .result-title.more`).toggleClass('rotate');

                console.warn('in');
            });
        }

        $("#found-count").text(`${data.length} DEALERS FOUND.`)

        $("#address").on('keyup', (event) => {

            $('#dealerlist').empty();

            let val = event.target.value;
            let filteredArray = data.filter(item =>
                item.title.toLowerCase().includes(val.toLowerCase())
            );

            $("#found-count").text(`${filteredArray.length} DEALERS FOUND.`)

            for(let i = 0; i < filteredArray.length; i++){

                let modifiedAddress = filteredArray[i].address.replace(/<p>.*?<\/p>/, '');
                let iframe = '';

                const regex = /<iframe.*?src=['"](.*?)['"].*?>/;
                const match = filteredArray[i].iframe.match(regex);

                if (match && match.length >= 2) {
                    iframe = match[1];
                }

                let companyNameFilter = filteredArray[i].title;
                let splitCompanyNameFilter = companyNameFilter.split("[");
                let ssmFilter = splitCompanyNameFilter[1] || splitCompanyNameFilter[1] == 'undefined' ? `[${splitCompanyNameFilter[1]}` : "";

                let html = `
                <div class="result-container dealer${i}" id="dealer${i}" onclick="on_change_func(${i}, '${iframe}')">
                    <div class="result-title intro-title more">
                        <div class="location-details">
                            <div class="name">${splitCompanyNameFilter[0]} <br> ${ssmFilter}</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="expand-content" id="expand-content${i}" style="">
                        <div class="details">
                            <p>
                                ${modifiedAddress}
                            </p>

                            <div
                                style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                "
                            ></div>
                        </div>
                    </div>
                </div>
                `;

                $('#dealerlist').append(html);
            }

        });

        if( Boolean( dealerID )  &&  dealerID > 0 ){
            $(`[da-dealer-rowid="${escape(dealerID)}"]`, main).trigger('click');
        }
    });

    let on_change_func = (i, iframe) => {
        $(`[id^=expand-content]`).not(`#expand-content${i}`).removeClass('active');
        $(`#expand-content${i}`).toggleClass('active');

        $("#iframe-div").empty().append(`<iframe src="${iframe}" width="" height="" style="border:0;" allowfullscreen="" loading="lazy"></iframe>`);

        $(`.search-result #dealerlist .result-title.more`).not(`#dealer${i} .result-title.more`).removeClass('rotate');
        $(`.search-result #dealerlist #dealer${i} .result-title.more`).toggleClass('rotate');
    }
</script>
