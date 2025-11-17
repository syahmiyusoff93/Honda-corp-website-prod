<?php
//    $res_m = $this->getInfo($CON,$folder,['fid','i','1']);
//    while($item_m = $res_m->fetch_object()){
//        $item = $this->itemInfo($item_m, $htt[0]);
//
//        $disp[0] .= $item['iframe'];
//
//        if(preg_match('/youtube/i', $item['iframe']))
//            $class = 'video';
//    }

    $disp = ['','','',''];
    $disp['json'] = json_decode(file_get_contents('zata_da/src/default/collection.json'),true);

    foreach($disp['json']['country'] as $key=>$val){ $disp[1] .= '<option value="'.htmlspecialchars($val['country']).'">'.$val['country'].'</option>'; }

    foreach($disp['json']['honorific'] as $key=>$val){ $disp[2] .= '<option value="'.htmlspecialchars($val).'">'.$val.'</option>'; }

    echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
        <div class="container main">
            <div class="row">
                <div class="col-12">'.$MAIN['title'].$MAIN['smr'].'</div>
            </div>
            
            <div class="wrap">
                 <form action="">
                    <div class="row"> 
                        <div class="col-md-6">
                            <label>Salutation *</label>
                            <select name="Salutation" id="" required>
                                    <option value="" class="placeholder d-none" selected>Select *</option>
                                    '.$disp[2].'
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Name *</label>
                            <input type="text" name="Name" required>
                        </div>
                        <div class="col-md-6">
                            <label>Job Title *</label>
                            <input type="text" name="Job Title" required>
                        </div>
                        <div class="col-md-6">
                            <label>Company Name *</label>
                            <input type="text" required name="Company Name">
                        </div>
                        <div class="col-md-6">
                            <label>Company Address *</label>
                            <input type="text" placeholder="Line1" name="address[line1]" required>
                            <input type="text" placeholder="Line2" name="address[line2]" required>
                            <input type="text" placeholder="Postcode" name="address[postcode]" required>
                            <input type="text" placeholder="State" name="address[state]" required>  
                            <input type="text" placeholder="Country" name="address[country]" required>  
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label>Tel *</label>
                                    <input type="text" name="Tel" required>
                                </div>
                                <div class="col-12">
                                    <label>Mobile Number *</label>
                                    <input type="text" name="Mobile Number" required>
                                </div>
                                <div class="col-12">
                                    <label>Email Address *</label>
                                    <input type="email" name="Email" required>
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Website</label>
                                <input type="text" name="Website">
                            </div>
                            <div class="col-md-6"> 
                                <label>Nature of Business *</label>
                                <select name="Type of Business" id="businessnature" required>
                                    <option value="" class="placeholder d-none" selected>Select *</option>
                                    <option value="Crop Protection">Crop Protection</option>
                                    <option value="Seed">Seed</option>
                                    <option value="Fertilizing">Fertilizing</option>
                                    <option value="Farm Automotive">Farm Automotive</option>
                                    <option value="Tractors & Implements">Tractors & Implements</option>
                                    <option value="Farm Tools & Equipment">Farm Tools & Equipment</option>
                                    <option value="Irrigation">Irrigation</option>
                                    <option value="Harvesting">Harvesting</option>
                                    <option value="Farm Construction">Farm Construction</option>
                                    <option value="Agricultural Related Services">Agricultural Related Services</option>
                                    <option value="Biotechnology & Sciences">Biotechnology & Sciences</option>
                                    <option value="Smart Farming Aquaculture">Smart Farming Aquaculture</option>
                                    <option value="Others, please specify:">Others, please specify:</option>
                                </select> 
                            </div> 
                            <div class="col-md-6"> 
                                <label>What is your purpose of attending this event? *</label>
                                <select name="What is your purpose of attending this event?" id="purpose" required>
                                    <option value="" class="placeholder d-none" selected>Select *</option>
                                    <option value="To Purchase">To Purchase</option>
                                    <option value="To Gather Market / Product Information">To Gather Market / Product Information</option>
                                    <option value="To Seek Solutions for Special Requirements">To Seek Solutions for Special Requirements</option>
                                    <option value="To Evaluate Show for Future Participation">To Evaluate Show for Future Participation</option>
                                </select> 
                            </div>
                            <div class="col-md-6"> 
                                <label>What is your primary area of interest? *</label>
                                <select name="What is your primary area of interest?" id="interest" required>
                                    <option value="" class="placeholder d-none" selected>Select *</option>
                                    <option value="Crop Protection">Crop Protection</option>
                                    <option value="Seed">Seed</option>
                                    <option value="Fertilizing">Fertilizing</option>
                                    <option value="Farm Automotive">Farm Automotive</option>
                                    <option value="Tractors & Implements">Tractors & Implements</option>
                                    <option value="Farm Tools & Equipment">Farm Tools & Equipment</option>
                                    <option value="Irrigation">Irrigation</option>
                                    <option value="Harvesting">Harvesting</option>
                                    <option value="Farm Construction">Farm Construction</option>
                                    <option value="Agricultural Related Services">Agricultural Related Services</option>
                                    <option value="Biotechnology & Sciences">Biotechnology & Sciences</option>
                                    <option value="Smart Farming">Smart Farming</option>
                                    <option value="Aquaculture">Aquaculture</option>
                                    <option value="Others, please specify:">Others, please specify:</option>
                                </select> 
                            </div> 
                            <div class="col-12">
                            <p><i class="fas fa-info-circle"></i> Please fill in the required field with asterisk *</p>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-gen trans400" >Submit</button>
                            </div> 
                        </div>  
                    </div> 
                </form>
            </div>
            
        </div>
    </section>';
?>

<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            form = $('form',main);

        let ids = ['businessnature','purpose','interest'],
            data = {'businessnature': {
                        'tmp': '<div class="wrap businessnatureSpecify"> <label>Other</label> <input type="text" name="Others (businessnature), please specify:"> </div>'
                    },
                    'purpose': {
                        'tmp': '<div class="wrap purposeSpecify"> <label>Other</label> <input type="text" name="Others (purpose), please specify:"> </div>'
                    },
                    'interest': {
                        'tmp': '<div class="wrap interestSpecify"> <label>Other</label> <input type="text" name="Others (interest), please specify:"> </div>'
                    }
                };

        $.each(ids, function(k, v){
            $(`#${v}`, main).on('change', function() {
                let das = $(this),
                    val = das.val();

                

                if( val == `Others, please specify:` ){
                    console.log(k, v, val);

                    let mitOtherTmp = `${data[v]['tmp']}`;
                    //$(mitOther).append(mitOtherTmp);
                    $(mitOtherTmp).insertAfter(das);
                }else if( $(`.${v}Specify`, main).length ){
                    $(`.${v}Specify`, main).remove();
                }
            })
        });
        

        // $('#businessnature', main).on('change', function() {
        //     let das = $(this),
        //     val = das.val();

        //     console.log(val);

        //     if( val == `Others, please specify:` ){
        //         console.log(val);

        //         let mitOther = das.parent(),
        //         mitOtherTmp = `<div class="wrap otherSpecify">
        //             <label>Other</label>
        //             <input type="text" name="Others, please specify:">
        //         </div>`;
        //         $(mitOther).append(mitOtherTmp);
        //     }else if( $('.otherSpecify', main).length ){
        //         $('.otherSpecify', main).remove();
        //     }
        // })
        
        form.dekami({
            id: mnid,
            dot: dot,
            subject: 'Reservation',
            done: (D) => {
                let w = D.form.parent();
                w.css({
                    'height': w.outerHeight()
                });
                w.animate({
                    'opacity': '0'
                }, () => {
                    w.html(`<h2>Email Sent</h2><p class="text-center">Thank you for the mail. We revert to you soon.</p>`).queue((q) => {
                        w.animate({
                            'opacity': '1'
                        });
                        q();
                    });
                });
            }
        });
    });
</script>