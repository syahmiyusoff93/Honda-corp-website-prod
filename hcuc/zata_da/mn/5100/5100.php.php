<?php
$disp = [0=>''];

//$res_m = $this->getInfo($CON,$folder,['fid','i','1','1']);
//while($item_m = $res_m->fetch_object()){
//    $item = $this->itemInfo($item_m, $htt[0]);
//    $disp[0].=$item['content'];
//}

echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].'); padding-top: 0;" da-id="'.$folder['id'].'">
    <div class="container main animated int" da-inani="fadeIn">
        <div class="row">
            <div class="col-12">'.$MAIN['title'].$MAIN['smr'].'</div>
        </div>
        <div class="wrap form-w"> </div>
    </div>
</section>';
?>

<script type="application/javascript">
    function openDatePicker() {
        document.getElementById('dateInput').focus();
    }
    const $DATA = <?php echo $this->database($CON, $folder, true); ?>;
    $(async function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`), 
            tmp = {};

            tmp.formAppointment = (info) => new Promise((res, rej)=>{
                res(`<form> 
                    <div class="ttl">Vehicle Details</div>
                    <div class="row">
                        <div class="col-12"> 
                            <div class="field field-style">
                                <label class="input-label">Registration Number</label>
                                <input type="text" value="${info?._regno}" name="Registration Number" required>
                            </div> 
                        </div>
                    </div>
                    <div class="ttl">Personal Details</div>
                    <div class="row">
                        <div class="col-12"> 
                            <div class="field field-style">
                                <label class="input-label">Name</label>
                                <input type="text" name="Name" required placeholder="Insert your full name">
                                <!-- <input type="text" name="Name" required placeholder="e.g.: Adam bin Mazlan"> -->
                                <input type="text" name="tk" required=""  value="<?php echo $_SESSION['tk'];?>" readonly hidden>
                            </div>
                            <div class="field field-style">
                                <label class="input-label">Email</label>
                                <input type="email" name="Email" required placeholder="Insert your email address">
                                <!-- <input type="email" name="Email" required placeholder="e.g.: sample@mail.com"> -->
                            </div>
                            <div class="field field-style">
                                <label class="input-label">Phone Number</label>
                                <input type="text" name="Phone Number" required placeholder="Insert your contact number">
                                <!-- <input type="text" name="Phone Number" required placeholder="e.g.: +06123456789"> -->
                            </div>
                            <div class="field field-style" onclick="openDatePicker()">
                                <label class="input-label" onclick="openDatePicker()">Preferred Date</label>
                                <input id="dateInput" type="date" name="Preferred Date" onfocus="this.showPicker()" required>
                                <img src="https://honda.com.my/img/interface/Icon material-date-range.svg" alt="" class="right-input-red-icon" onclick="openDatePicker()">
                            </div>
                            
                            <div class="field field-style">
                                <label class="input-label">Preferred Time</label>
                                <input type="text" name="Preferred Time" required readonly placeholder="Select your preferred time">
                                <!-- <input type="text" name="Preferred Time" required readonly> -->
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
                                <img src="https://honda.com.my/img/interface/Icon material-access-time.svg" alt="" class="right-input-red-icon">
                            </div>
                            <div class="field field-style"> 
                                <div class="loc-w f">
                                    <div class="wrap"><label class="input-label">Location</label></div>
                                    <div class="l" style="padding-left: 10px;">
                                        <img src="${DOT}zata_da/src/img/${info?.companyimg}" style="border: 1.5px solid #EC1D2F;" alt="Image" onerror="this.onerror=null; this.src='https://honda.com.my/hcuc/zata_da/src/cp/240124.3k40d18cr950.png';" />
                                    </div>
                                    <div class="r" style="color: #EC1D2F;padding: 10px;"> 
                                        <div class="d-n">${oc(info?.companyname)}</div>
                                        <div>${oc(info?.address)}</div> 
                                        <div class="time">${oc(info?.time)}</pre>
                                        </div> 
                                        <textarea hidden name="Location" id="" cols="30" rows="10">${oc(info?.companyname)}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="field chkbx f" style="width: 101%;"> 
                                <div class="l"><input type="checkbox" name="Agreement" value="Agreed" required id="agree"></div>
                                <div class="r"><label for="agree" class="agree">I have read and understood the Terms & Conditions and Privacy Policy and I acknowledge and agree that I have provided true, accurate,  complete, and correct information on this microsite.</label></div>
                            </div>
                            <div class="wrap taste">
                                <!-- <button class="btn-gen" type="submit">Submit</button> -->
                                <button class="btn-gen-custom-v3" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>`);
            })

            let htmlAppointment = await tmp.formAppointment( $DATA[0] );
            $('.form-w', main).html(htmlAppointment);

            let form = $('form',main),
                inputs = $('input', main);
            setInputSelection(inputs);

            let today = new Date().toISOString().split("T")[0];
            document.getElementById("dateInput").min = today;

            form.dekami({
                id: mnid,
                dot: dot, 
                submittingText: `<p>Submitting</p> `,
                link: `${dot}zata_da/mn/mn.booking.php`,
                subject: "Honda Certified Used Car (HCUC): Viewing Appointment Received",
                done: async (D) => {
                    // console.log(D);
 
                    let w = D.form.parent();
                    w.css({
                        'height': w.outerHeight()
                    });
                    w.animate({
                        'opacity': '0'
                    }, () => {
                        w.html(`<div class="wrap" style="text-align: left;"><h2 style="color:#ec1d2f">Booking Submitted</h2><p style="color: #615F62;">We will revert to you soon.</p></div>`).queue((q) => {
                            w.css({
                                'height': 'auto'
                            });
                            w.animate({
                                'opacity': '1'
                            });
                            q();
                        });
                        // w.html(`<div class="wrap" style="text-align: left;"><h2>Booking Submitted</h2><p>We will revert to you soon.</p></div>`).queue((q) => {
                        //     w.css({
                        //         'height': 'auto'
                        //     });
                        //     w.animate({
                        //         'opacity': '1'
                        //     });
                        //     q();
                        // });
                    });
                }
            });
    });
</script>
