<?php
    $disp = [0=>'',1=>'']; 
 
 
    echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class="f">
        <div class="main-lrw f main-container-custom">
            <div class="main-l main-container-custom-v2">
                <img src="https://honda.com.my/img/interface/icon-open-side-bar.svg" alt="" class="open-sidebar active" id="open-sidebar">
                <img src="https://honda.com.my/img/interface/icon-close-side-bar.svg" alt="" class="close-sidebar" id="close-sidebar">
                <div class="main-l-w input-container">
                <div class="fieldgroup option-w"> 
                '.$MNC[$folder['module']]->options($CON, $folder).'
                <div class="taste text-center">
                    <button class="btn-gen btnReset" type="button">Reset</button>
                </div>
                </div>
                '.$MNC[$folder['module']]->redirectGrid($CON, $folder, 'top').'
                </div>
            </div>
            <div class="main-r"> 
                <div class="main-r-w">
                    
                    <div class="itms">
                        <div class="itms-w f"> </div>
                    </div>
                    <div class="taste">
                        <div class="loadnoti"></div>
                        <button class="btn-gen loadMore">Load More</button>
                    </div>
                </div> 
                '.$MNC[$folder['module']]->redirectGrid($CON, $folder, 'btm').'
            </div>
        </div>
    </section>';  
?>



<script>
    let $DATA = <?php echo $MNC[$folder['module']]->databasexxx($CON, $folder, true); ?>;
    $DATA.sort((a, b) => {
        // sort by date in decreasing order
        return new Date(b._date) - new Date(a._date);
    });
    //if featured, display 1st
    //if recent, display 2nd
    //if lmileage display 3rd
    //if lprice display 4th
    //if nearest display 5th
    //if nothing display 6th in date order
    let $featured = [];
    let $recent = [];
    let $lmileage = [];
    let $lprice = [];
    let $nearest = [];
    let $date = [];
    for(let i = 0; i < $DATA.length; i++){
        let item = $DATA[i];
        if (item._featured == 1) {
            $featured.push(item);
        } 
        if (item._recent == 1) {
            $recent.push(item);
        } 
        if (item._lmileage == 1) {
            $lmileage.push(item);
        } 
        if (item._lprice == 1) {
            $lprice.push(item);
        }
        if (item._featured == 0 && item._recent == 0 && item._lmileage == 0 && item._lprice == 0 ) {} {
            $date.push(item);
        }
    }

    //sort date again before populate
    $date.sort((a, b) => {
        // For others, sort by date in decreasing order
        return new Date(b._date) - new Date(a._date);
    });

    for(let i = 0; i < $DATA.length; i++){
        if(/[a-z]/.test($DATA[i]._model)){
            $DATA[i]._model = $DATA[i]._model.toUpperCase();
        }
        if(/[a-z]/.test($DATA[i]._bodyType)){
            $DATA[i]._bodyType = $DATA[i]._bodyType.toUpperCase();
        }
    }

    // Combine all arrays and remove duplicates
    $DATA = Array.from(new Set([
        ...$featured, 
        ...$recent, 
        ...$lmileage, 
        ...$lprice, 
        // ...$nearest, 
        ...$date
    ]));

    if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                let objectsArray = $DATA;

                function calculateDistance(point1, point2) {
                    return Math.sqrt(Math.pow(point2.lat - point1.x, 2) + Math.pow(point2.lng - point1.y, 2));
                }

                function findNearestObjectsIndexes(array, referencePoint) {
                    let minDistance = Number.MAX_VALUE;
                    let nearestIndexes = [];

                    for (let i = 0; i < array.length; i++) {
                        const distance = calculateDistance(referencePoint, array[i]);
                        if (distance < minDistance) {
                        minDistance = distance;
                        nearestIndexes = [i];
                        } else if (distance === minDistance) {
                        nearestIndexes.push(i);
                        }
                    }

                    return nearestIndexes;
                }

                const referencePoint = { x: latitude, y: longitude };
                const nearestIndexes = findNearestObjectsIndexes(objectsArray, referencePoint);

                for (let i = 0; i < nearestIndexes.length; i++) {
                    const nearestIndex = nearestIndexes[i];
                    const nearestObject = objectsArray.splice(nearestIndex, 1)[0];
                    nearestObject.nearest = 1; 
                    objectsArray.splice(3 + i, 0, nearestObject);
                }
                $nearest.push(objectsArray);


            },
            (error) => {
                console.error(`Error getting location: ${error.message}`);
            }
        );
    }

    // Combine all arrays and remove duplicates
    $DATA = Array.from(new Set([
        ...$featured, 
        ...$recent, 
        ...$lmileage, 
        ...$lprice, 
        ...$nearest, 
        ...$date
    ]));

    $(async function () {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`),
            LOADED = 0;

        
        let searchInput = $('.such-ipt'),
            searchVal = [];

        await asyncForEach($DATA, row=>{
            searchVal.push(row?._title)
            searchVal.push(row?._location)
        }) 

        searchVal = [...new Set(searchVal)];

        await searchVal.sort()
        await searchVal.reverse()
        function setSelect() {
            $('.drop-search .cus-drop', main).click(function(){ 
                let opt = $(this),
                    title = opt.attr('da-val');
                    title = unescape(title);
                 
                searchInput.removeClass('active'); 
                $('.drop-search', main).html(''); 
                searchInput.val(title).change();

            })
        } 
        $('.inp-such-w')
        .mouseenter( ()=>{
            searchInput.addClass('active')
        })
        .mouseleave( ()=>{
            if( ! searchInput.is(':focus') ){
                searchInput.removeClass('active');
                $('.drop-search', main).html(''); 
            }
        })
        searchInput.on('keyup', async function () { 
            let val = searchInput.val(),
                key = val.toLowerCase(),
                tmp = ''; 
                
            await asyncForEach(searchVal, async title => {  
                let ref = title.toLowerCase();
                if (ref.includes(key)) {  
                    tmp += `<div class="cus-drop" da-val="${escape(title)}">
                        <div>${title}</div>
                    </div>`; 
                } 
            }) ;
            await $('.drop-search', main).html(''); 
            await $('.drop-search', main).append(tmp);
            setSelect()
        }) 

        $(window).resize(async () => {
            let H = await menuH;
            H += $('[mn="8401"]').outerHeight();
            main.css('min-height', `calc(100vh - ${H}px)`);
        }).resize();

        $('[xhref]', main).click(function(){
            let grid = $(this),
                link = grid.attr('xhref');

            if( Boolean(link) )
                if( link.includes(`da-func="loanCalc"`) ){
                    $(`[da-func="loanCalc"]`).trigger('click');
                }else{
                    window.location.href = link;
                }
        })

        let database = Object.create($DATA),
            jsoninfo = <?php echo $MNC[$folder['module']]->jsonCar($CON, $folder); ?>,
            keys = Object.keys(jsoninfo);
 
        let carItmTmp = (database, limit = false) => new Promise(async (res, rej) => {
            let tmp = '', opt = '', inst='';  
   
            if( limit ){
                let initial = limit * LOADED,
                    last = initial + limit;
                let featured = '',
                    label = ''; 
 

                if(last > database.length ) {
                    $('.loadnoti').html(`<p>End of Load</p>`)
                    $('.loadMore').hide();
                }else{
                    $('.loadnoti').html(``)
                    $('.loadMore').show();
                }

                await asyncForEach(database, async (row, i) => { 
                    // let price = row._price,
                    //     deposit = price * 0.1,
                    //     interest = 4,
                    //     repaymentYr = 7;

                    // inst = await installment(row);

                    featured = '';  
                    if( row._featured ==1 ) {
                        // featured = `<div class="fea-float f cont-after">
                        //     <div class="wrap ">Featured</div>
                        // </div>`;
                    }

                    label = '';
                    if( row._featured ==1 ) {
                        label += `<div class="lbl-tag cont-before">Featured</div>`;
                    }
                    if( row._lmileage ==1 ) {
                        label += `<div class="lbl-tag cont-before">Lowest Mileage</div>`;
                    }
                    if( row._lprice ==1 ) {
                        label += `<div class="lbl-tag cont-before">Lowest Price</div>`;
                    }
                    if( row._recent ==1 ) {
                        label += `<div class="lbl-tag cont-before">Recently Added</div>`;
                    }
                    if( !row.nearest == false ) {
                        label += `<div class="lbl-tag cont-before">Nearest You</div>`;
                    }
                    if( (i >= initial) && (i < last) ){
 
                        tmp += `<div class="itm ${row._featured == 1 ? 'featured': ''}" car-id="${row.id}">
                            <div class="itm-w new cont-after cont-before" itm-id="${row.id}" style="height: auto;">
                                ${featured}
                                <div class="bimg-w">
                                    <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})"></div> 
                                    <div class="lbl-float">${label}</div>
                                </div>
                                <div class="txt-w" style="display: flex;justify-content: space-between;padding-top: 0;">
                                    <div style="text-align: left;">
                                        <div class="itm-ttl" style="color: #4B4B4B;">${row._title}</div>
                                        <div class="itm-label" style="color: #B8B8B8;"><span class="number">${commaStandard(row._mileage, false)}</span> km </div>
                                    </div>
                                    <div class="itm-price" style="color: #EC1D2F;">RM <span class="number">${commaStandard(row._price)}</span></div> 
                                </div>
                                <div class="glass" style="display:none;">
                                    <span></span>
                                </div>

                            </div>
                        </div>`; 
                    }
                });
                LOADED ++;
            } else {
                await asyncForEach(database, async (row, i) => { 
                    let price = row._price,
                        deposit = price * 0.1,
                        interest = 4,
                        repaymentYr = 7;

                    inst = ( ( (price - deposit) + ((price - deposit) * (interest / 100) * repaymentYr)) ) / (repaymentYr * 12);

                    featured = '';
                    if( row._featured ==1 ) {
                        featured = `<div class="fea-float f">
                            <div class="wrap cont-after">Featured</div>
                        </div>`;
                    }

                    label = '';
                    if( row._lmileage ==1 ) {
                        label += `<div class="lbl-tag cont-before">Lowest Mileage</div>`;
                    }
                    if( row._lprice ==1 ) {
                        label += `<div class="lbl-tag cont-before">Lowest Price</div>`;
                    }
                    if( row._recent ==1 ) {
                        label += `<div class="lbl-tag cont-before">Recently Added</div>`;
                    }

                    tmp += `<div class="itm ${row._featured == 1 ? 'featured': ''}" car-id="${row.id}">
                        <div class="itm-w new cont-after cont-before" itm-id="${row.id}">
                            ${featured}
                            <div class="bimg-w">
                                <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})"></div> 
                                <div class="lbl-float">${label}</div>
                            </div>
                            <div class="txt-w">
                                <div class="itm-ttl">${row._title}</div>
                                <div class="itm-label"><span class="number">${row._mileage}</span> km | ${row._engineCapacity}</div>
                                <div class="itm-price">RM <span class="number">${row._price}</span></div>
                                <div class="itm-inst">RM <span class="number">${commaStandard(inst)}</span>/mo</div>
                            </div>
                            <div class="glass">
                                <span></span>
                            </div>
                        </div>
                    </div>`; 
                });
            } 
            
            res(tmp);
        }); 
        
        
        let html = (row) => new Promise(async (res, rej) => {
            let $gals = '',
                $det = '';

            let krows = Object.keys(row); 

            await asyncForEach(JSON.parse(row._gallery), $gal => {
                $gals += `<div class="gal">
                    <div class="wrap">
                        <div class="bimg-w">
                            <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${$gal})"></div>
                        </div>
                    </div>
                </div>`;
            })
            await asyncForEach(krows, async (krow) => {   
                let rkey = `${krow.replace("_", "")}`;
                if(jsoninfo[rkey]?.name && ( rkey != 'featured' && rkey != 'status' )){ 
                    let _val = row[krow]; 
                    if( ['_mileage', '_price'].includes(krow) ){  
                        _val = commaStandard(_val)
                    }

                    $det += `<div class="detail">
                    <div class="lr-w f f-j-sb">
                        <div class="l">${jsoninfo[rkey].name}</div>
                        <div class="r">${_val}</div>
                    </div>
                    </div>`;
                }    
            })
            
            res  (` <div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">
                <div class="container"> 
                    <div class="wrap"> 
                        <h2>${row._title}</h2> 
                        <div class="price">RM ${commaStandard(row._price)}</div>
                        <div class="row">
                            <div class="col-12">  
                                <div class="bimg-w mainimg">
                                    <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})"></div>
                                </div>
                            </div>
                        </div> 
                        <div class="wrap gals-w">
                            <div class="gals f">${$gals}</div>
                        </div>
                        <h2>Car Details</h2> 
                        <div class="wrap detail-main">
                            <div class="details">
                                ${$det}
                            </div> 
                        </div>
                        <div class="taste text-center">
                        <button class="btn-gen btnBookAppointment" type="button">Book An Appointment</button>
                        </div>
                    </div>
                </div>
            </div></div> `);
        });

        let inputs = $('.option-w input[name]', main),
            inputsW = $('.option-w .input-w:not(.anderes)', main),
            sliders = $(`.uis-w`, main);

        setInputSelectionArrow(inputsW); 
         
        resetCarlist(database)

        $('.btnReset', main).click(function(){
            inputs.val('');
            $('.option-w input[name]:not([name="search"])', main).val('All');
            resetCarlist( Object.create($DATA) )
        })

        inputs.change(async function(){ 
            if( ! $('[name="search"]').hasClass('active') ){
                filteredCarList() 
            }
        })  

        function setSorting(btns, data) {
            uifadeRemove($('.loader', main));

            // data = data.sort(function(a, b) { 
            //     return b._recent - a._recent;
            // })
            
            btns.each(function(){
                let btn = $(this),
                    dropbx = $('+ div .sortdrop-w', btn),
                    options = $(`.sortdrop`, dropbx),
                    settingData = {
                        p_lh: `_price`,
                        p_hl: `_price`,
                        m_lh: `_mileage`,
                        m_hl: `_mileage`,
                    },
                    schluss = ''; 
                
                btn.click(function(){
                    options.unbind(); 
                    btn.toggleClass('show');
                    dropbx.on('mouseleave', function(){
                        btn.removeClass('show');
                    }) 
                    options.click(async function(){
                        let option = $(this), 
                            sortSetting = option.attr('sort-it'),
                            sortedData = []; 
                        btn.toggleClass('show'); 

                        options.unbind(); 
                        btns.unbind();  
 
                        if( ['p_lh', 'm_lh'].includes(sortSetting) ){ 
                            schluss = settingData[sortSetting];
                            sortedData = data.sort(function(a, b) { 
                                return a[schluss] - b[schluss];
                            });
                        } else 
                        if ( ['p_hl', 'm_hl'].includes(sortSetting) ){
                            schluss = settingData[sortSetting];
                            sortedData = data.sort(function(a, b) {
                                return b[schluss] - a[schluss];
                            });
                        }
                        // sortedData.sort(function(a, b) {
                        //     return b._featured - a._featured; 
                        // })

                        resetCarlist(sortedData) 
                    });
                })
            }) 

        }
 
        async function filteredCarList() {
            
                LOADED = 0;

                uiaddLoad(main, 'Loading');

                $('.loadMore', main).unbind();
                $('.itms-w').html('');

                let formData = $('.option-w form').serializeArray(),
                    filterSetting = formObj2Json(formData),
                    filteredCar = await filterTheCar(database, filterSetting);

                $('.loadMore', main).click(async function(){
                    let carItms = await carItmTmp(filteredCar, 9);
                    $('.itms-w').append(carItms);
                    setPopToItm();
                });
                
                $('.loadMore', main).trigger('click');
                
                $('.btnSort', main).unbind(); 
                setSorting($('.btnSort', main), filteredCar)
             
        }
        
 
        async function resetCarlist(database) {
            LOADED = 0;
            let _database = database; 

            uiaddLoad(main, 'Loading');

            $('.loadMore', main).unbind();
            $('.itms-w', main).html('').queue(function(q){
                $('.loadMore', main).click(async function(){
                    let carItms = await carItmTmp(_database, 9);
                    $('.itms-w').append(carItms);
                    setPopToItm()
                });
                $('.loadMore', main).trigger('click');
                uifadeRemove($('.loader', main));
                q();
            });

            $('.resetSlider', main).trigger('click')
            setSlider( sliders );
 
            $('.btnSort', main).unbind();
            setSorting($('.btnSort', main), _database)
 
        }
        
        function setPopToItm() {
            $(`[itm-id].new`).each(async function(){
                let itm = $(this),
                    itmid = itm.attr('itm-id');

                itm.removeClass('new');
                //itm = $(`[itm-id="${itmid}"]`);

                itm.click(()=>{
                    window.location.href = `?pid=93&carid=${itmid}`;
                })

            });
        }

        $('#open-sidebar', main).each(function(){
            let btn = $(this);
            $("#open-sidebar").css("z-index", 1);
            
            btn.click(function(){
                $(".main-l").css("width", "60px");
                $(".input-container").css("opacity", "0");
                
                $("#close-sidebar").addClass('active');
                $("#open-sidebar").removeClass('active');


                $("#close-sidebar").css("z-index", 1);
                $("#open-sidebar").css("z-index", 0);
            });
        })
        $('#close-sidebar', main).each(function(){
            let btn = $(this);
            
            btn.click(function(){

                $(".main-l").css("width", "400px");
                $(".input-container").css("opacity", "1");

                $("#close-sidebar").removeClass('active');
                $("#open-sidebar").addClass('active');

                $("#close-sidebar").css("z-index", 0);
                $("#open-sidebar").css("z-index", 1);

            });
        })
    });
</script> 