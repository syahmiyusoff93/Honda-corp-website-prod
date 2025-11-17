<?php
    $disp = [0=>'',1=>'']; 
  
    echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class="f">
        <div class="container main">
            
        </div>
    </section>';  
 
?>



<script>
    const $DATA = <?php echo $this->database($CON, $folder, true); ?>; 
    $(async function () {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`),
            LOADED = 0,
            shrUrl = `<?php echo urlencode(HEIMPATH."/carshare.php?pid=93&carid=$_GET[carid]");?>`;

        $(window).resize(async () => {
            let H = await menuH;
            H += $('[mn="8401"]').outerHeight();
            main.css('min-height', `calc(100vh - ${H}px)`)
        }).resize();

        let database = Object.create($DATA),
            jsoninfo = <?php echo $this->jsonCar($CON, $folder); ?>,
            keys = Object.keys(jsoninfo); 
        
        let html = (row) => new Promise(async (res, rej) => {
            let $gals = '',
            $det = {};

            $det.p1 = '';
            $det.p2 = '';
            $det.p3 = '';
            $det.p4 = '';
            $det.p5 = '';

            let krows = Object.keys(row); 

            await asyncForEach(JSON.parse(row._gallery), ($gal, $i) => {
                $gals += `<div class="gal">
                    <div class="wrap">
                        <div class="bimg-w">
                            <div class="bimg bg-cover" gal-ind="${($i + 1)}" style="background-image: url(${DOT}zata_da/src/car/${$gal})"></div>
                        </div>
                    </div>
                </div>`;
            })
            await asyncForEach(krows, async (krow) => {   
                let rkey = `${krow.replace("_", "")}`;
                let _val = row[krow];  
                console.log($DATA)
                if( ['title','model'].includes(rkey) ){
                    $det.p1 += `<div class="detail">
                    <div class="lr-w f f-j-sb">
                        <div class="l">${jsoninfo[rkey].name}</div>
                        <div class="r">${_val}</div>
                    </div>
                    </div>`;
                }else
                if( ['regno'].includes(rkey) ){
                    $det.p2 += `<div class="detail">
                    <div class="lr-w f f-j-sb">
                        <div class="l">${jsoninfo[rkey].name}</div>
                        <div class="r">${_val}</div>
                    </div>
                    </div>`;
                }else
                if( ['spec', 'hist'].includes(rkey) ){
                    // $det.p4 += `<div class="ele detail" >
                    //     <div class="ttl tab trans400">${jsoninfo[rkey].name}</div>
                    //     <div class="liss">
                    //         <div class="wrapxp lis">
                    //             <div class="align-items-center">
                    //                 <pre>${_val}</pre>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>`;
                }else
                if( ['location'].includes(rkey) ){
                    // $det.p5 += `<div class="detail detail_location">
                    // <div class="lr-w f f-j-sb">
                    //     <div class="l">${jsoninfo[rkey].name}</div>
                    //     <div class="r">${row?.address}</div>
                    // </div>
                    // </div>`;

                    /// latest
                    // $det.p5 += `<div class="ele detail detail_location">
                    //     <div class="ttl tab trans400">${jsoninfo[rkey].name}</div>
                    //     <div class="liss">
                    //         <div class="wrapxp lis">
                    //         <div class="lr-w f f-j-sb">
                    //             <div class="l"></div>
                    //             <div class="r">
                    //                 ${row?.address}
                    //                 <div class="taste btn-locate">
                    //                     <a class="btn-gen" href="?pid=6&dealer=${$DATA[0]?._location}" target="_blank">LOCATE DEALER</a>
                    //                 </div>
                    //             </div>
                    //         </div>
                    //         </div>
                    //     </div>
                    // </div>`;
                    let address = row?.address;
                    let parser = new DOMParser();
                    let doc = parser.parseFromString(address, 'text/html');
                    let companyName = doc.querySelector('p').textContent.trim();

                    const lines = companyName.split('\n');
                    const firstLine = lines[0];

                    $det.p5 += `<div class="detail detail_location">
                            <div class="lr-w f f-j-sb">
                                <div class="l">${jsoninfo[rkey].name}</div>
                                <div class="r">
                                    <div>
                                        <a class="" href="?pid=6&dealer=${$DATA[0]?._location}" target="_blank">${firstLine}</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                }else
                if(jsoninfo[rkey]?.name && !['featured', 'status', 'recent', 'lmileage', 'lprice'].includes(rkey) ){ 
                    
                    if( ['_price'].includes(krow) ){  
                        _val = commaStandard(_val)
                    }else  if( ['_mileage'].includes(krow) ){
                        _val = commaStandard(_val, false)
                    }

                    $det.p3 += `<div class="detail">
                    <div class="lr-w f f-j-sb">
                        <div class="l">${jsoninfo[rkey].name}</div>
                        <div class="r">${_val}</div>
                    </div>
                    </div>`;
                }    
            })
            
            res  (` <div class="wrap"> 
                <div class="wrap"> 
                    <h2>${row._title}</h2> 
                    <div class="price">RM ${commaStandard(row._price)}</div> 
                    <div class="shrbar f f-j-fe">
                        <div class="shr" style="display:none">
                            <div class="bimg-w top" style="display:none">
                                <div class="bimg-w">
                                    <div class="bimg" style="-webkit-mask-image: url(${DOT}zata_da/src/default/shr-con.png); mask-image: url(${DOT}zata_da/src/default/shr-con.png)"></div>
                                </div> 
                            </div> 

                            <div class="wrap btm">
                                <div class="med">
                                <div class="ttlbx">Share with a friend</div>
                                <div class="f f-j-c">
                                    <div class="scon">
                                        <a href="https://api.whatsapp.com/send?text=${shrUrl}" target="_blank">
                                            <div class="bimg-w">
                                                <div class="bimg" style="-webkit-mask-image: url(${DOT}zata_da/src/default/i-whatsapp.svg); mask-image: url(${DOT}zata_da/src/default/i-whatsapp.svg)"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="scon">
                                        <a href="https://www.facebook.com/sharer.php?u=${shrUrl}" target="_blank">
                                            <div class="bimg-w">
                                                <div class="bimg" style="-webkit-mask-image: url(${DOT}zata_da/src/default/i-facebook.svg); mask-image: url(${DOT}zata_da/src/default/i-facebook.svg)"></div>
                                            </div>
                                        </a>
                                    </div> 
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="wrap img-grp">
                        <p  onclick="window.history.go(-1); return false;"
                            class="car-details-back-btn"
                            >
                            <img
                                src="https://honda.com.my/img/interface/Icon ionic-ios-arrow-back.svg"
                                alt=""
                            />
                            back
                        </p>
                        <div class="wrap">  
                            <div class="bimg-w mainimg">
                                <div class="bimg bg-cover" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})" img-ind="0">
                                <div class="glass">
                                    <span></span>
                                </div>
                                </div>
                                <div class="disclaimer-asin">Disclaimer: All images shown are in 'as-in' condition</div>
                            </div>
                        </div>
                        <div class="wrap gals-w">
                            <div class="gals f">
                                <div class="gal">
                                    <div class="wrap">
                                        <div class="bimg-w">
                                            <div class="bimg bg-cover" gal-ind="0" style="background-image: url(${DOT}zata_da/src/car/${row._mainImg})"></div>
                                        </div>
                                    </div>
                                </div>
                                ${$gals}
                            </div>
                        </div>
                    </div> 


                    <h2 class="border-bottom-p10">Car Details</h2> 
                    <div class="wrap detail-main">
                    
                        <div class="details">
                            ${$det.p1}
                            ${$det.p2}
                            ${$det.p3} 
                            ${$det.p5} 
                            ${$det.p4} 
                        </div> 
                        
                    </div>
                    <div class="btn-container-custom">
                        <div>
                            <a class="btnBookAppointment button-gen-custom-v2" id="button-gen-custom-v2">
                                <img src="https://honda.com.my/img/interface/Icon feather-share-2.svg" alt="" class="shr-img">
                                <p style="
                                    padding: 0;
                                    margin: 0;
                                    margin-left: 8px;
                                    color: #FFFFFF;
                                ">Share This Post</p>
                            </a>
                            <div class="expend" id="expandableDiv">
                                <div class="med">
                                    <div class="ttlbx">Share with a friend</div>
                                    <div class="f f-j-c">
                                        <div class="scon">
                                            <a href="https://api.whatsapp.com/send?text=${shrUrl}" target="_blank">
                                                <div class="bimg-w">
                                                    <div class="whatsapp bimg" style="-webkit-mask-image: url(${DOT}zata_da/src/default/i-whatsapp.svg); mask-image: url(${DOT}zata_da/src/default/i-whatsapp.svg)"></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="scon">
                                            <a href="https://www.facebook.com/sharer.php?u=${shrUrl}" target="_blank">
                                                <div class="bimg-w">
                                                    <div class="fb bimg" style="-webkit-mask-image: url(${DOT}zata_da/src/default/i-facebook.svg); mask-image: url(${DOT}zata_da/src/default/i-facebook.svg)"></div>
                                                </div>
                                            </a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btnBookAppointment button-gen-custom" href="?pid=59&carid=${row.id}" type="button">Book An Appointment</a>
                    </div>
                </div>
            </div> `);
            
            
        });  

        let tmp = $DATA[0] ? await html($DATA[0]) : `<h2>Session Expired</h2>`;
        $('.main', main).html(tmp);

        $('.tab', main).each(function() {
            let das = $(this),
                par = das.parent();

            das.click(function() {
                das.toggleClass('active');
                $('+.liss', das).slideToggle();

                par.siblings().children('.liss').slideUp();
                par.siblings().children('.tab').removeClass('active');
            });
        });
        $('.shr', main).each(function(){
            let shrMain = $(this),
                shrTop = $('.top', shrMain),
                shrBtm = $('.btm', shrMain);

            shrTop.click(function(){ 
                shrMain.toggleClass('active');

                shrBtm.on('mouseleave', ()=>{
                    shrMain.removeClass('active');
                })
            })
        })

        $('.button-gen-custom-v2', main).each(function(){
            let btn = $(this);

            btn.click(function(){ 
                $(".expend").slideToggle();
            });
        })

        function bgurl(img){
            let bg_url = img.css('background-image');
            bg_url = /^url\((['"]?)(.*)\1\)$/.exec(bg_url);
            return bg_url ? bg_url[2] : "";
        }

        let imgcase = $('.img-grp', main),
            imgmaincase = $('.mainimg .bimg', main),
            gals = $('.gals .bimg', main),
            gimgs = [];

        gals.click(async function(){
            let gal = $(this),
                galpic = await bgurl(gal),
                mainpic = await  bgurl(imgmaincase),
                galind = +gal.attr('gal-ind');
            
            imgmaincase.attr('img-ind', galind);
            imgmaincase.css('background-image', `url(${galpic})`); 
        })

        gimgs = [];

        gals.each(function(i) {
            let bg_url = bgurl($(this)); 

            gimgs.push(bg_url);
        }); 

        imgmaincase.click(function(){
            
                let ind = +imgmaincase.attr('img-ind'),
                    temp = `<div class="container main">
                        <div class="close-pop-w ccl"></div>
                        <div class="content">
                            <div class="prev slidebtn"><i class="fas fa-chevron-left"></i></div>
                            <div class="next slidebtn"><i class="fas fa-chevron-right"></i></div>
                            <div class="f f-j-c f-a-c"><img src="${gimgs[ind]}" alt=""></div>
                        </div>
                    </div>`;

                // console.log(ind);
                
                uilichtSet('GALS',  temp, ()=>{
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


        }) 
        
    });
</script> 