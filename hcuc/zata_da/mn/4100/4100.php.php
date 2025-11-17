<?php 
    $disp = [0=>'',1=>'']; 

    // $res_m = $this->getInfo($CON,$folder,['fid','i','1' ]);
    // $i=0;
    // while($item_m = $res_m->fetch_object()){
    //     $item = $this->itemInfo($item_m, $htt[0]);
    //     $link = '';
    //     if(!empty($item['docurl']))
    //         $link = 'href="'.$item['docurl'].'" target="_blank"';
    //     if(!empty($item['link']['redir']))
    //         $link = 'href="'.$item['link']['redir'].'"';
    //     $disp[0].='<div class="itm wrap">
    //                     <a '.$link.'>
    //                         <div class="wrap">
    //                             <div class="con">
    //                                 <img src="'.$item['bgurl'].'" alt="">
    //                             </div>
    //                             <div class="txt">'.$item['title'].'</div>
    //                         </div>
    //                     </a>
    //                 </div>';
    // } 

    $disp[0] .= '<div class="itm wrap" da-func="loanCalc"> 
        <div class="wrap">
            <div class="con">
                <div class="bimg-w">
                    <div class="bimg bg-contain sb-01" ></div>
                </div>
            </div>
            <div class="txt">Loan Calculator</div>
        </div> 
    </div>';
    // $disp[0] .= '<div class="itm wrap" da-func="contactUs" xhref="//www.honda.com.my/customer-service/enquiry"> 
    //     <div class="wrap">
    //         <div class="con">
    //             <div class="bimg-w">
    //                 <div class="bimg bg-contain sb-02" ></div>
    //             </div>
    //         </div>
    //         <div class="txt">Contact Us</div>
    //     </div> 
    // </div>';

    echo '<div mn="'.$folder['module'].'">
        <div class="wrap">
            <div class="itms wrap f">
                '.$disp[0].'
            </div>
        </div>
    </div>';
?> 

<script>
    $(async function () {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            tmp ={},
            data = <?php echo $this->database($CON, $folder, true); ?>;
 
            // console.log(data)


            function standardLightWrap(tmp) {
                return ` <div class="container main">
                    <span class="ccl"></span>
                    <div class="close-pop-w ccl"></div>
                    <div class="wrap">
                        <div class="container">${tmp}</div>
                    </div>
                </div> `;
            } 

            tmp.loanCalc = (data) => {
            
                data = data[0];

                let price = data?._price ? data._price : 0 ;

                // console.log(price)
                    
                return ` <div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">
                    <div class="container"> 
                        <div class="wrap">  
                            <form class="">
                            <div class="wrap calcResult">
                                <p>Car loan monthly installment *</p> 
                                <h2>RM 0.00</h2>
                            </div>
                            <div class="row calculate">
                                <div class="col-12"> 
                                    <div class="field">
                                        <label>Vehicle Price</label>
                                        <input type="number" name="Vehicle_Price" value="${price}" step="0" required>
                                    </div>
                                    <div class="field">
                                        <label>Deposit Amount</label>
                                        <input type="number" name="Deposit" value="${price * .1}" step="0.01" required>
                                    </div>
                                    <div class="field">
                                        <label>Bank / Interest Rate (%)</label>
                                        <input type="number" name="Interest" value="4.00" step="0.01" required>
                                    </div>
                                    <div class="field">
                                        <label>Repayment Period (Years)</label>
                                        <input type="number" name="Repayment" value="7" step="1" required>
                                        <div class="wrap">
                                        <div class="cus-drop-main">
                                            <div class="cus-drop-w"> 
                                                <div class="cus-drop" da-val="3">
                                                    <div>3</div>
                                                </div>
                                                <div class="cus-drop" da-val="5">
                                                    <div>5</div>
                                                </div>
                                                <div class="cus-drop" da-val="7">
                                                    <div>7</div>
                                                </div>
                                                <div class="cus-drop" da-val="9">
                                                    <div>9</div>
                                                </div>
                                            </div>
                                        </div> 
                                        </div>
                                    </div>
                                    
                                    <div class="wrap taste">
                                        <button class="btn-gen countIt" type="submit">Calculate</button>
                                    </div>
                                    <div class="wrap calcResult">
                                    <p>Car loan monthly installment *</p> 
                                    <h2>RM 0.00</h2>
                                    </div>
                                    <div class="wrap f f-j-fe">
                                        <div class="icon disclaimer">
                                            <div class="icon-w">
                                                <i class="far fa-question-circle"></i>
                                                <template>
                                                    <p class="title"><u>Disclaimer</u></p> 
                                                    <p>This calculator is intended as a guide only. Honda accepts no liability for any inaccuracies and omissions.</p>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            </form> 
                        </div>
                    </div>
                </div></div> `;
            };
            tmp.contactUs = () => ` <div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">
                <div class="container"> 
                    <div class="wrap">
                    <form>
                        <h2>CONTACT US</h2> 
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
                                    <label>Message</label>
                                    <textarea name="" id="" cols="20" rows="5"></textarea>
                                </div>
                                <div class="wrap taste">
                                    <button class="btn-gen" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div></div> `;

            $(`[da-func]`).each(function(){
                let btn = $(this),
                    func = btn.attr('da-func'),
                    link = btn.attr('xhref'),
                    html = tmp[func](data);

                if( Boolean(link) ){
                    btn.click(()=>{
                        window.location.href = link;
                    })
                }else{
                    uilichtEins(mn, btn, html, ()=>{
                        let licht = $(`.licht${mn}`),
                            form = $('form', licht),
                            disclaimer = $('.disclaimer', licht),
                            calculate = $('.calculate', licht),
                            inputs = $(`input`, licht);

                        $(window).resize(()=>{
                            if( $(window).width() > 575 ){
                                licht.css({
                                    'right': '' 
                                })
                            }else{
                                licht.css({
                                    'right': '' 
                                })
                            }
                        }).resize();

                        setInputSelection(inputs);

                        if( Boolean(calculate) ){ 
                            let Vehicle_Price = $(`[name="Vehicle_Price"]`),
                                Deposit = $(`[name="Deposit"]`),
                                Interest = $(`[name="Interest"]`),
                                Repayment = $(`[name="Repayment"]`);

                            function setDC(e, sel, price){
                                let dec = CountDecimalDigits(price) - 2 ;
                                if(e.key == 0){ 
                                    price = price * 10; 

                                    sel.val(price.toLocaleString('en-US', { 
                                        minimumFractionDigits:2,
                                        maximumFractionDigits:2,
                                        currency: "MYR",
                                        useGrouping: false
                                    })); 
                                }else{
                                    sel.val((price* (10 ** dec)).toLocaleString('en-US', { 
                                        minimumFractionDigits:2,
                                        maximumFractionDigits:2,
                                        currency: "MYR",
                                        useGrouping: false
                                    })); 
                                }
                            }

                            Vehicle_Price.on('keyup', function(e){  
                                let price = + Vehicle_Price.val();  
                                // setDC(e, Vehicle_Price, price)

                                deposit = + (Vehicle_Price.val() * .1);
                                Deposit.val(deposit.toLocaleString('en-US', {
                                    minimumFractionDigits:2,
                                    maximumFractionDigits:2,
                                    currency: "MYR",
                                    useGrouping: false
                                }));
                                // setTimeout(() => {
                                // }, 0);
                            });

                            Deposit.on('keyup', function(e){
                                let price = + Deposit.val() ;
                                //setDC(e, Deposit, price); 
                            })
                            Interest.on('keyup', function(e){
                                let price = + Interest.val() ;
                                //setDC(e, Interest, price); 
                            })
                            inputs.on('keyup change', function(){
                                form.trigger('submit')
                            })

                            form.submit(function(e){
                                e.preventDefault();
                                let price = + Vehicle_Price.val(),
                                    deposit = + Deposit.val(),
                                    interest = + Interest.val(),
                                    repaymentYr = + Repayment.val();
                                    
                                let res = ( ( (price - deposit) + ((price - deposit) * (interest / 100) * repaymentYr)) ) / (repaymentYr * 12);

                                $('.calcResult').html(`
                                <p>Car loan monthly installment *</p> 
                                <h2>RM ${res.toLocaleString('en-US', { 
                                    maximumFractionDigits:2,
                                    minimumFractionDigits:2,
                                    currency: "MYR" 
                                })}</h2>
                                `);

                                return false;
                            });
                            form.trigger('submit')
                        }
                        if( Boolean(disclaimer) ){ 
                            let disclainertxt = $('template', disclaimer).html(),
                                tmp = standardLightWrap(disclainertxt);

                            uilichtEins('disclaimer', disclaimer, tmp); 
                        }

                        if( Boolean(form) && !Boolean(calculate.length) ){
                            // form.dekami({
                            //     id: mnid,
                            //     dot: dot, 
                            //     submittingText: `<p>Submitting</p> `,
                            //     done: (D) => {
                            //         let w = D.form.parent();
                            //         w.css({
                            //             'height': w.outerHeight()
                            //         });
                            //         w.animate({
                            //             'opacity': '0'
                            //         }, () => {
                            //             w.html(`<div class="wrap" style="text-align: left;"><h2>Email Sent</h2><p class="">Thank you for the submission!</p><p class="">We will revert to you soon.</p></div>`).queue((q) => {
                            //                 w.animate({
                            //                     'opacity': '1'
                            //                 });
                            //                 q();
                            //             });
                            //         });
                            //     }
                            // });
                        }   
                    });
                }
                
            });
    })
</script> 