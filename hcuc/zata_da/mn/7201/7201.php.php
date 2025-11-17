<?php
    $disp = [0=>'',1=>''];  
    
    echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class=""> 
        <div class="wrap"><div class="option-w">
            <div class="container">
                <div class="row">
 
                </div>
                '.$MNC[$folder['module']]->options($CON, $folder).'
                <div class="taste text-center">
                    <button class="btn-gen btnReset" type="button">Reset</button>
                </div>
            </div>
        </div></div>
        <div class="container-fluid main " > 
            <div class="wrap productsGridListing-w">
                <div class="wrap productsGridListing ">
                    <div class="itms">
                        <div class="itms-w f"> 
                        </div>
                    </div>
                </div>
                <div class="taste text-center">
                    <button class="btn-gen loadMore" type="button">Load More</button>
                </div>
            </div> 
        </div> 
    </section>'; 
?>



<script>
    $(async function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`),
            LOADED = 0;

        let database = <?php echo $MNC[$folder['module']]->database($CON, $folder, true); ?>,
            jsoninfo = <?php echo $MNC[$folder['module']]->jsonCar($CON, $folder); ?>,
            keys = Object.keys(jsoninfo);

            console.log(database)


        
        let carItmTmp = (database, limit = false) => new Promise(async (res, rej) => {
            let tmp = opt = '';  
            if( limit ){
                let initial = limit * LOADED,
                    last = initial + limit;

                await asyncForEach(database, async (row, i) => {
                    opt = '';  
                    if( (i >= initial) && (i < last) ){
                        tmp += `<div class="itm" car-id="${row.id}">
                            <div class="itm-w featured new" itm-id="${row.id}">
                                <div class="bimg-w">
                                    <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})"></div> 
                                </div>
                                <div class="txt-w">
                                    <div class="itm-ttl">${row._title}</div>
                                    <div class="itm-label"><span class="number">${row._mileage}</span> km | ${row._engineCapacity}</div>
                                    <div class="itm-price">RM <span class="number">${row._price}</span></div>
                                    <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                                </div>
                            </div>
                        </div>`; 
                    }
                });
                LOADED ++;
            } else {
                await asyncForEach(database, async (row, i) => {
                    opt = ''; 

                    tmp += `<div class="itm" car-id="${row.id}">
                        <div class="itm-w featured" itm-id="${row.id}">
                            <div class="bimg-w">
                                <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})"></div> 
                            </div>
                            <div class="txt-w">
                                <div class="itm-ttl">${row._title}</div>
                                <div class="itm-label"><span class="number">${row._mileage}</span> km | ${row._engineCapacity}</div>
                                <div class="itm-price">RM <span class="number">${row._price}</span></div>
                                <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                            </div>
                        </div>
                    </div>`; 
                });
            } 
            
            res(tmp);
        }); 
        resetCarlist(database)
        

        let inputs = $('.option-w input', main);
        setInputSelection(inputs); 

        $('.btnReset', main).click(function(){
            inputs.val('');
            resetCarlist(database)
        })

        inputs.change(async function(){ 
            filteredCarList() 
        })  

        function filteredCarList() {
            LOADED = 0;
            $('.loadMore', main).unbind();
            $('.itms-w').html('');

            let formData = $('.option-w form').serializeArray(),
                filtOpt = formObj2Json(formData);
 
            let filteredCar = database.filter( row => {
                return Object.keys(filtOpt).every(filter => {
                    return filtOpt[filter] === row[filter]
                });
            }) 

            $('.loadMore', main).click(async function(){
                let carItms = await carItmTmp(filteredCar, 6);
                $('.itms-w').append(carItms);
                setPopToItm();
            });
            
            $('.loadMore', main).trigger('click');
        }

        function resetCarlist(database) {
            LOADED = 0;
            $('.loadMore', main).unbind();
            $('.itms-w').html('');
            $('.loadMore', main).click(async function(){
                let carItms = await carItmTmp(database, 6);
                $('.itms-w').append(carItms);
                setPopToItm()
            });
            $('.loadMore', main).trigger('click');
            
        }

        function setPopToItm() {
            $(`[itm-id].new`).each(async function(){
                let itm = $(this),
                    itmid = itm.attr('itm-id');

                itm.removeClass('new');
                //itm = $(`[itm-id="${itmid}"]`);

                let filters = {id: itmid};  
                let out = database.filter( row => {
                    return Object.keys(filters).every(filter => {
                        return filters[filter] === row[filter]
                    });
                }) 
                
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
                        if(jsoninfo[`${krow.replace("_", "")}`]?.name){
                            $det += `<div class="detail">
                            <div class="lr-w f f-j-sb">
                                <div class="l">${jsoninfo[`${krow.replace("_", "")}`].name}</div>
                                <div class="r">${row[krow]}</div>
                            </div>
                            </div>`;
                        }    
                    })
                    
                    res  (` <div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">
                        <div class="container"> 
                            <div class="wrap"> 
                                <h2>${row._title}</h2> 
                                <div class="price">RM ${(+row._price).toLocaleString('en-US', { 
                                        minimumFractionDigits:2,
                                        maximumFractionDigits:2,
                                        currency: "MYR" 
                                    })}</div>
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

                let tmp = await html(out[0]);  
                uilichtEins(mn, itm, tmp, ()=>{
                    let licht = $(`.licht${mn}`),
                        bookForm = ` <div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div>
                        <div class="wrap"> <div class="container"> 
                        <form>
                            <h2>BOOK AN APPOINTMENT</h2> 
                            <p>Make an appointment now to test drive a pre-owned / used car</p> 
                            <div class="ttl">Vehicle Details</div>
                            <div class="row">
                                <div class="col-12"> 
                                    <div class="field">
                                        <label>Registration Number</label>
                                        <input type="text" name="Registration Number" required>
                                    </div> 
                                </div>
                            </div>
                            <div class="ttl">Personal Details</div>
                            <div class="row">
                                <div class="col-12"> 
                                    <div class="field">
                                        <label>Name</label>
                                        <input type="text" name="Name" required>
                                    </div>
                                    <div class="field">
                                        <label>Email</label>
                                        <input type="email" name="Email" required>
                                    </div>
                                    <div class="field">
                                        <label>Phone Number</label>
                                        <input type="text" name="Phone Number" required>
                                    </div>
                                    <div class="field">
                                        <label>Preferred Date</label>
                                        <input type="date" name="Prefer Date" required>
                                    </div>
                                    
                                    <div class="field">
                                        <label>Preferred Time</label>
                                        <input type="text" name="Prefer Time" required readonly>
                                        <div class="wrap">
                                            <div class="cus-drop-main">
                                                <div class="cus-drop-w ">
                                                    <div class="cus-drop" da-val="AM">
                                                        <div>AM</div>
                                                    </div>
                                                    <div class="cus-drop" da-val="PM">
                                                        <div>PM</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Location</label>
                                        <div>${out[0]._location}</div> <br><br>
                                        <textarea hidden name="Location" id="" cols="30" rows="10">${out[0]._location}</textarea>
                                    </div>
                                    <div class="field chkbx f"> 
                                        <div class="l"><input type="checkbox" name="Agreement" value="Agreed" required id="agree"></div>
                                        <div class="r"><label for="agree">I have read and understood the Terms & Conditions and Privacy Policy and I acknowledge and agree that I have provided true, accurate,  complete, and correct information on this microsite.</label></div>
                                    </div>
                                    <div class="wrap taste">
                                        <button class="btn-gen" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div></div> `;

                    let lname = 'booking';
                    uilichtEins(lname, $('.btnBookAppointment', licht), bookForm, ()=>{
                        let licht_ = $(`.licht${lname}`),
                            form = $('form', licht_),
                            inputs = $('input', form);
                        setInputSelection(inputs); 

                        form.dekami({
                            id: false,
                            dot: dot, 
                            licht: licht_,
                            submittingText: `<p>Creating</p> `,
                            link: `${dot}zata_da/mn/mn.booking.php`,
                            subject: "Honda: Booking Notification",
                            done: async (D) => {
                                console.log(D);
    

                                let w = D.form.parent();
                                w.css({
                                    'height': w.outerHeight()
                                });
                                w.animate({
                                    'opacity': '0'
                                }, () => {
                                    w.html(`<div class="wrap" style="text-align: left;"><h2>Booking Submitted</h2><p>We will revert to you soon.</p></div>`).queue((q) => {
                                        w.css({
                                            'height': 'auto'
                                        });
                                        w.animate({
                                            'opacity': '1'
                                        });
                                        q();
                                    });
                                });
                            }
                        });
                    });


                    let gals = $('.gals .bimg',licht),
                        gimgs = [];
                    gals.each(function(i) {
                        let bg_url = $(this).css('background-image');
                        bg_url = /^url\((['"]?)(.*)\1\)$/.exec(bg_url);
                        bg_url = bg_url ? bg_url[2] : "";
                        gimgs.push(bg_url);
                    });
                    gals.promise().done(() => {
                        gals.each(function(i) {
                            let ind = i,
                                temp = `<div class="container main">
                                    <div class="close-pop-w ccl"></div>
                                    <div class="content">
                                        <div class="prev slidebtn"><i class="fas fa-chevron-left"></i></div>
                                        <div class="next slidebtn"><i class="fas fa-chevron-right"></i></div>
                                        <div class="f f-j-c f-a-c"><img src="${gimgs[i]}" alt=""></div>
                                    </div>
                                </div>`;
                            
                            uilichtEins('GALS', $(this), temp, ()=>{
                                let licht = $(`.lichtGALS`);
                                
                                $('.next', licht).click(() => {
                                    ind += 1;
                                    if (ind >= gals.length)
                                        ind = 0;
                                    $('img', licht).attr('src', gimgs[ind]);
                                });
                                $('.prev', licht).click(() => {
                                    ind -= 1;
                                    if (ind < 0)
                                        ind = gals.length - 1;
                                    $('img', licht).attr('src', gimgs[ind]);
                                });
                            });
                        });
                    });
                })

            });
        }
    });
</script>