<?php
$disp = [0=>'',1=>'']; 

if( isset($_SESSION['user']) ) {
    echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class="f">
        <div class="main-lrw f">
            <div class="main-l">
                <div class="main-l-w">
                '.$MNC[$folder['module']]->fieldGroup().' 
                </div>
            </div>
            <div class="main-r">
                <div class="main-r-w">
                    <div class="itms">
                        <div class="itms-w f"> </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>';
?>
<link rel="stylesheet" href="../e_cms/src/css/jquery-ui.min.css">
<script>
    $(async function () {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`);
        let $DEALER = <?php echo $MNC[$folder['module']]->dealerlist($CON, $folder); ?>;

            console.log($DEALER)
        $(window).resize(async () => {
            let H = await menuH;
            H += $('[mn="8401"]').outerHeight();
            main.css('min-height', `calc(100vh - ${H}px)`)
        }).resize();

        let data = <?php echo $MNC[$folder['module']]->jsonCar($CON, $folder); ?>,
            database = <?php echo $MNC[$folder['module']]->databaseAll($CON, $folder); ?>,
            keys = Object.keys(data); 

        let itemEditForm = (keys, freshdata) => new Promise(async (res, rej) => {
            let tmp = { tog: '', fields: '', location: ''},
                opt = '',
                $readonly = ''; 
            console.log(keys);
            await asyncForEach(keys, async key => {
                 opt = $readonly = ''; 
                let ckey = `_${key}`;  
                
                if( ['Publish', 'Featured', 'Recently Added', 'Lowest Mileage', 'Lowest Price'].includes(data[key].name) ) {
                    tmp.tog += `<div class="col-sm-4 col-md-2"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="text" value="${ (freshdata[ckey] == 1) ? 'ON': 'OFF' }" tog-onoff readonly xrequired=""> 
                        <input type="text" value="${ freshdata[ckey] }" name="${key}" readonly hidden> 
                    </div></div>`;
                } 
                else if (['Specification', 'History'].includes(data[key].name) ) {
                    // tmp.fields += `<div class="col-12"></div>
                    // <div class="col-sm-6 col-md-6"><div class="field">
                    //     <label>${data[key].name}</label> 
                    //     <textarea name="${key}">${freshdata[ckey] ? freshdata[ckey] : ''}</textarea>
                    //     ${opt}
                    // </div></div>`;
                }
                else if(['Location'].includes(data[key].name)){
                    $DEALER.sort((a, b) => {
                        const titleA = a.list_title.toUpperCase(); // Ignore upper and lowercase
                        const titleB = b.list_title.toUpperCase(); // Ignore upper and lowercase

                        if (titleA < titleB) {
                            return -1;
                        }
                        if (titleA > titleB) {
                            return 1;
                        }

                        // titles must be equal
                        return 0;
                    });
                    await asyncForEach($DEALER, async $row => {
                        opt += `<option class="cus-drop" value="${$row?.id}">${$row?.list_title}</option>`;
                    }) ;
                    tmp.location += `<div class="col-sm-6 col-md-4"><div class="field"><div class="option">
                        <label>Dealer / Location</label>        
                            <select name="location" id="location">
                                ${opt}
                            </select>
                    </div></div></div>`;
                    $(document).ready(function() {
                        document.getElementById('location').value = freshdata[ckey];
                    });                
                } 
                else if(['Mileage (km)'].includes(data[key].name)){
                    tmp.fields += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="number" name="mileage" xrequired="" value="${freshdata[ckey] ? freshdata[ckey] : ''}">
                    </div></div>`;
                } 
                else if(['Price (RM)'].includes(data[key].name)){
                    tmp.fields += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="number" name="price" xrequired="" value="${freshdata[ckey] ? freshdata[ckey] : ''}">
                    </div></div>`;
                } 
                else if(['Manufacturing Year'].includes(data[key].name)){
                    tmp.fields += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="number" name="manufacturingYr" xrequired="" value="${freshdata[ckey] ? freshdata[ckey] : ''}">
                    </div></div>`;
                } 
                else if(['Registration Date'].includes(data[key].name)){
                    tmp.fields += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="text" id="registrationDate" name="registrationDate" xrequired="" value="${freshdata[ckey] ? freshdata[ckey] : ''}">
                    </div></div>`;
                    $(document).ready(function() {
                        $("#registrationDate").datepicker({
                            dateFormat: 'dd-mm-yy' // Format the date as needed
                            // You can add more options/configurations based on your requirements
                        });
                    });
                } 
                else { 
                    tmp.fields += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="text" name="${key}" xrequired ${$readonly} value="${freshdata[ckey] ? freshdata[ckey] : ''}">
                        ${opt}
                    </div></div>`;
                }
            });
            res(tmp);
        });

        let itemCreateForm = (keys) => new Promise(async (res, rej) => {
            let tmp = opt = $readonly = ''; 
            console.log(keys);
            await asyncForEach(keys, async key => {
                 opt = $readonly = '';
                 
                if( ['Publish', 'Featured', 'Recently Added', 'Lowest Mileage', 'Lowest Price'].includes(data[key].name) ) {

                }else if( [ 'Specification', 'History'].includes(data[key].name) ){
                    tmp += `<div class="col-12"></div>
                    <div class="col-sm-6 col-md-6"><div class="field">
                        <label>${data[key].name}</label> 
                        <textarea name="${key}"> </textarea>
                        ${opt}
                    </div></div>`;
                }
                else if(['Location'].includes(data[key].name)){
                    opt += `<option class="cus-drop" value="0">Please select location</option>`;
                    $DEALER.sort((a, b) => {
                        const titleA = a.list_title.toUpperCase(); // Ignore upper and lowercase
                        const titleB = b.list_title.toUpperCase(); // Ignore upper and lowercase

                        if (titleA < titleB) {
                            return -1;
                        }
                        if (titleA > titleB) {
                            return 1;
                        }

                        // titles must be equal
                        return 0;
                    });
                    await asyncForEach($DEALER, async $row => {
                        opt += `<option class="cus-drop" value="${$row?.id}">${$row?.list_title}</option>`;
                    }) ;
                    
                    tmp += `<div class="col-sm-6 col-md-4"><div class="field"><div class="option">
                        <label>Dealer / Location</label>
                        <select name="location" id="location">
                            ${opt}
                        </select>
                    </div></div></div>`;
                }
                else if(['Mileage (km)'].includes(data[key].name)){
                    tmp += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="number" name="mileage" xrequired ${$readonly}>
                    </div></div>`;
                } 
                else if(['Price (RM)'].includes(data[key].name)){
                    tmp += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="number" name="price" xrequired ${$readonly}>
                    </div></div>`;
                } 
                else if(['Manufacturing Year'].includes(data[key].name)){
                    tmp += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="number" name="manufacturingYr" xrequired ${$readonly}>
                    </div></div>`;
                } 
                else if(['Registration Date'].includes(data[key].name)){
                    tmp += `<div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="text" id="registrationDate" name="registrationDate" xrequired ${$readonly}">
                    </div></div>`;
                } 
                else {
                    tmp += ` <div class="col-sm-6 col-md-4"><div class="field">
                        <label>${data[key].name}</label>
                        <input type="text" name="${key}" xrequired ${$readonly}>
                        ${opt}
                    </div></div>`; 
                }
                    
            });
            res(tmp);
        });
        let carItmTmp = (database) => new Promise(async (res, rej) => {
            let tmp = opt = ''; 

            await asyncForEach(database, async row => {
                 opt = ''; 
                tmp += `<div class="itm" car-id="${row.id}">
                    <div class="itm-w featured new" itm-id="${row.id}">
                        <div class="bimg-w">
                            <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})"></div> 
                        </div>
                        <div class="txt-w">
                            <div class="itm-ttl">${row._title}</div> 
                        </div>
                    </div>
                </div>`; 
            });

            res(tmp);
        });


        let carItms = await carItmTmp(database);
        $('.itms-w').append(carItms);
        initItmPop(main)
        
        createSetting ()

        async function initItmPop(main){
            $('[itm-id].new').each(function(){
                let itm = $(this),
                    itmid = itm.attr('itm-id');

                itm.removeClass('new');
                
                itm.click(function(){

                    uiaddLoad(main, "Loading");
                    $.post(`${DOT}zata_da/mn/mn.car.load.php`, {itmid}, async (res) => {
                        uifadeRemove($('.loader',main));
                        let freshdata = JSON.parse(res),
                            html = await itemEditForm(keys, freshdata[0]),
                            $gals = '';

                        await asyncForEach(JSON.parse(freshdata[0]._gallery), $gal => {
                            $gals += `<div class="gal">
                                <div class="wrap">
                                    <div class="bimg-w">
                                        <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${$gal})">
                                            <div del-img="${$gal}">Delete</div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        })
    
                        html =  `<div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">
                            <div class="container"> 
                                <div class="wrap">
                                    
                                    <form enctype="multipart/form-data">
                                        <h2>Edit Car Information</h2>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4"><div class="field">
                                                <label>Main Image</label>
                                                <input type="file" accept="image/*" name="mainImg" xrequired> 
                                            </div></div> 
                                        </div>
                                        <div class="row">
                                            ${html?.tog} 
                                        </div>
                                        <div class="row">
                                            ${html?.location} 
                                            ${html?.fields} 
                                            <input value="${itmid}" name="id" hidden />
                                            <input value="" name="imgDelete"  hidden/>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4"><div class="field">
                                                <label>Gallery</label>
                                                <input type="file" multiple accept="image/*" name="gallery[]"> 
                                            </div></div>
                                            <div class="col-12">
                                            <div class="wrap gals-w">
                                                <div class="gals f">${$gals}</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="taste">
                                        <button class="btn-gen btn-del" type="button">Delete</button>
                                        <button class="btn-gen" type="submit">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div></div> `;

                        uilichtSet(mn, html, ()=>{
                            let licht = $(`.licht${mn}`),
                                form = $('form', licht),
                                inputs = $('input', form),
                                gals = $('.gal', licht),
                                deletedImg = [],
                                deletedField = $('[name="imgDelete"]', licht),
                                btndel=$('.btn-del', licht); 

                            btndel.click(function(){
                                let lname = 'confirm',
                                    html = `<div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">
                                        <div class="container"> 
                                            <div class="wrap DISP">
                                                
                                            <h2>Are you sure want to delete the item?</h2>
                                            <p>Item will be permanantly deleted and cannot be restore</p>
                                            <div class="taste">
                                                <button class="btn-gen btn-con">Confirm</button>
                                                <button class="btn-gen ccl">Cancel</button>
                                            </div>

                                            </div>
                                        </div>
                                    </div></div>`
                                uilichtSet(lname, html, ()=>{
                                    let licht_ = $(`.licht${lname}`),
                                        btncon = $('.btn-con', licht_);

                                    btncon.click(()=>{
                                        uiaddLoad(licht_, "Deleting");

                                        $.post(`${dot}zata_da/mn/mn.car.delete.php`, {itmid}, res=>{
                                            
                                            $('.DISP', licht_).html(`<h2>Deleted</h2>`);
                                            uifadeRemove($('.loader',licht_));
                                            setTimeout(() => {
                                                $('.ccl').trigger('click');
                                                $(`[car-id="${itmid}"]`).remove()
                                            }, 1000);
                                        })

                                        
                                    })

                                })
                            })

                            $(`[name="price"]`).on('keyup', function(e){
                                let price = + $(this).val() ;
                                setDC(e, $(this), price); 
                            })
                            
                            setInputSelection(inputs);
                            setInputOnOff($('[tog-onoff]', licht));

                            gals.each(function(){
                                let $gal = $(this),
                                    $delete = $(`[del-img]`, $gal);

                                $delete.click(()=>{
                                    let $imgname = $delete.attr('del-img');
                                    $gal.remove();
                                    deletedImg.push($imgname);
                                    deletedField.val(deletedImg.join(','))
                                })

                            });

                            form.dekami({
                                id: false,
                                dot: dot, 
                                submittingText: `<p>Saving</p> `,
                                link: `${dot}zata_da/mn/mn.car.save.php`,
                                done: async (D) => {
                                    console.log(D); 

                                    let json = JSON.parse(D.res);

                                    $(`[itm-id="${json.id}"] .bimg`).css('background-image', `url(${DOT}/zata_da/src/car/${json?.mainImg})`)

                                    let w = D.form.parent();
                                    // w.css({
                                    //     'height': w.outerHeight()
                                    // });
                                    w.animate({
                                        'opacity': '0'
                                    }, () => {
                                        w.html(`<div class="wrap" style="text-align: left;"><h2>Info Saved</h2> </div>`).queue((q) => {
                                            w.animate({
                                                'opacity': '1'
                                            });
                                            q();
                                        });
                                    });
                                }
                            });
                        })
                    }) 

                });
            });
        }
        

        async function createSetting(){
            let form = await itemCreateForm(keys);
            form = ` <div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">
                <div class="container"> 
                    <div class="wrap">
                        
                        <form enctype="multipart/form-data">
                            <h2>Add New Car</h2>

                            <div class="row">
                                <div class="col-sm-4 col-md-2"><div class="field">
                                    <label>Publish</label>
                                    <input type="text" value="ON" tog-onoff readonly  xrequired> 
                                    <input type="text" value="1" name="status" readonly hidden> 
                                </div></div>
                                <div class="col-sm-4 col-md-2"><div class="field">
                                    <label>Featured</label>
                                    <input type="text" value="OFF" tog-onoff readonly  xrequired> 
                                    <input type="text" value="0" name="featured" readonly hidden> 
                                </div></div>
                                <div class="col-sm-4 col-md-2"><div class="field">
                                    <label>Recently Added</label>
                                    <input type="text" value="OFF" tog-onoff readonly  xrequired> 
                                    <input type="text" value="0" name="recent" readonly hidden> 
                                </div></div>

                                <div class="col-sm-4 col-md-2"><div class="field">
                                    <label>Lowest Mileage</label>
                                    <input type="text" value="OFF" tog-onoff readonly  xrequired> 
                                    <input type="text" value="0" name="lmileage" readonly hidden> 
                                </div></div>
                                <div class="col-sm-4 col-md-2"><div class="field">
                                    <label>Lowest Price</label>
                                    <input type="text" value="OFF" tog-onoff readonly  xrequired> 
                                    <input type="text" value="0" name="lprice" readonly hidden> 
                                </div></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-4"><div class="field">
                                    <label>Main Image</label>
                                    <input type="file" accept="image/*" name="mainImg" xrequired> 
                                </div></div>
                                <div class="col-sm-6 col-md-4"><div class="field">
                                    <label>Gallery</label>
                                    <input type="file" multiple accept="image/*" name="gallery[]"> 
                                </div></div>
                            </div> 
                            
                            <div class="row">
                                ${form} 
                            </div>
                            <div class="taste"><button class="btn-gen">Create</button></div>
                        </form>

                    </div>
                </div>
            </div></div> `;

            uilichtEins(mn, $(`.btnAddCar`, main), form, ()=>{
                $("#registrationDate").datepicker({
                    dateFormat: 'dd-mm-yy' // Format the date as needed
                    // You can add more options/configurations based on your requirements
                });

                let licht = $(`.licht${mn}`),
                    form = $('form', licht),
                    inputs = $('input', form); 

                $(`[name="price"]`).on('keyup', function(e){
                    let price = + $(this).val() ;
                    setDC(e, $(this), price); 
                })
                setInputSelection(inputs); 
                setInputOnOff($('[tog-onoff]', licht));

                form.dekami({
                    id: false,
                    dot: dot, 
                    submittingText: `<p>Creating</p> `,
                    link: `${dot}zata_da/mn/mn.car.add.php`,
                    done: async (D) => {
                        console.log(D);

                        let json = JSON.parse(D.res),
                            newItem = await carItmTmp(json);

                        $('.itms-w').prepend(newItem);
                        initItmPop(main)

                        let w = D.form.parent();
                        // w.css({
                        //     'height': w.outerHeight()
                        // });
                        w.animate({
                            'opacity': '0'
                        }, () => {
                            w.html(`<div class="wrap" style="text-align: left;"><h2>New Car Added</h2> </div>`).queue((q) => {
                                w.animate({
                                    'opacity': '1'
                                });
                                q();
                            });
                        });
                    }
                });
            })

        }

        async function setDC(e, sel, price){
            let dec = CountDecimalDigits(price);
            if(e.key == 0){ 
                price = price; 

                sel.val(price.toLocaleString('en-US', { 
                    minimumFractionDigits:0,
                    maximumFractionDigits:0,
                    currency: "MYR",
                    useGrouping: false
                })); 
            }else{
                sel.val((price* (10 ** dec)).toLocaleString('en-US', { 
                    minimumFractionDigits:0,
                    maximumFractionDigits:0,
                    currency: "MYR",
                    useGrouping: false
                })); 
            }
        }
    });
</script>

<?php } 