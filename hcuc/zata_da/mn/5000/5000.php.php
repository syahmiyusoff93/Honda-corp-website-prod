<?php
$disp = [0=>''];

//$res_m = $this->getInfo($CON,$folder,['fid','i','1','1']);
//while($item_m = $res_m->fetch_object()){
//    $item = $this->itemInfo($item_m, $htt[0]);
//    $disp[0].=$item['content'];
//}

echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class="container main animated int" da-inani="fadeIn">
        <div class="row">
            <div class="col-12">'.$MAIN['title'].$MAIN['smr'].'</div>
        </div>
        <div class="wrap">
            <form action=""> 
                <div class="ttl">Personal Details</div>
                <div class="row">
                    <div class="col-12"> 
                        <div class="field field-style">
                            <label class="input-label">Name</label>
                            <!-- <input type="text" name="Name" required="" placeholder="e.g.: Adam bin Mazlan"> --!>
                            <input type="text" name="Name" required="" placeholder="Insert your full name">
                        </div>
                        <div class="field field-style">
                            <label class="input-label">Email</label>
                            <!-- <input type="email" name="Email" required="" placeholder="e.g.: sample@mail.com"> --!>
                            <input type="email" name="Email" required="" placeholder="Insert your email address">
                        </div>
                        <div class="field field-style">
                            <label class="input-label">Phone Number</label>
                            <!-- <input type="text" name="Phone Number" required="" placeholder="e.g.: +60123456789"> --!>
                            <input type="text" name="Phone Number" required="" pattern="\d{10,11}" title="01* *** ****" placeholder="Insert your contact number">
                            <input type="text" name="tk" required=""  value="'.$_SESSION['tk'].'" readonly hidden>
                        </div>
                        <div class="field field-style" onclick="openDatePicker()">
                            <label class="input-label" onclick="openDatePicker()">Preferred Date</label>
                            <input id="dateInput" type="date" name="Prefer Date" required="" onfocus="this.showPicker()">
                            <img src="https://honda.com.my/img/interface/Icon material-date-range.svg" alt="" class="right-input-red-icon" onclick="openDatePicker()">
                        </div>
                        <div class="field field-style">
                            <label class="input-label">Preferred Location</label>
                            <!-- <input type="text" name="Prefer Location" required=""> --!>
                            <input type="text" id="preferredLocation" name="Prefer Location" required="" placeholder="Select Location" autocomplete="off" onkeydown="return false;" readonly>
                            <div class="wrap">
                                <div class="cus-drop-main">
                                    <div class="cus-drop-w ">
                                        '.$MNC[$folder['module']]->dealerlist($CON, $folder).'
                                    </div>
                                </div>
                            </div>
                            <img src="https://honda.com.my/img/interface/Icon%20material-my-location.svg" alt="" class="right-input-red-icon">
                        </div>
                        
                        <div class="field field-style">
                            <label class="input-label">Preferred Time</label>
                            <!-- <input type="text" name="Prefer Time" required="" > --!>
                            <input type="text" id="preferredTime" name="Prefer Time" required="" placeholder="Select your preferred time" autocomplete="off" onkeydown="return false;" readonly> 
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
                        <div class="field chkbx f" style="width: 101%;"> 
                            <div class="l"><input type="checkbox" name="Agreement" value="Agreed" required="" id="agree"></div>
                            <div class="r"><label for="agree" class="agree">I have read and understood the Terms & Conditions and Privacy Policy and I acknowledge and agree that I have provided true, accurate,  complete, and correct information on this microsite.</label></div>
                        </div>
                        <div class="wrap taste">
                            <button class="btn-gen-custom-v3" type="submit">Submit</button>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</section>';
?>

<script type="application/javascript">
    function openDatePicker() {
        document.getElementById('dateInput').focus();
    }
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            form = $('form',main),
            inputs = $('input', main);

           form.on("click", 'button[type="submit"], input[type="submit"]', function(e) {
                let locInput  = document.getElementById("preferredLocation");
                let timeInput = document.getElementById("preferredTime");

                // Trimmed values
                let locVal  = locInput.value.trim();
                let timeVal = timeInput.value.trim();

                // ✅ reset custom messages
                locInput.setCustomValidity("");
                timeInput.setCustomValidity("");

                // 🔍 check Preferred Location
                if (locVal === "" || locVal === "#N/A") {
                    locInput.setCustomValidity("Please select a Preferred Location.");
                    locInput.reportValidity(); // show popup
                    alert("Please select a Preferred Location."); // 🔔 extra notify
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    return false;
                }

                // 🔍 check Preferred Time
                if (timeVal === "" || timeVal === "#N/A") {
                    timeInput.setCustomValidity("Please select a Preferred Time.");
                    timeInput.reportValidity(); // show popup
                    alert("Please select a Preferred Time."); // 🔔 extra notify
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    return false;
                }
            });


            setInputSelection(inputs);

            let today = new Date().toISOString().split("T")[0];
            document.getElementById("dateInput").min = today;

            form.dekami({
                id: mnid,
                dot: dot, 
                submittingText: `<p>Creating</p> `,
                link: `${dot}zata_da/mn/mn.booking.inspect.php`,
                subject: "Honda Certified Used Car (HCUC): Inspection Booking Received",
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
</script>
