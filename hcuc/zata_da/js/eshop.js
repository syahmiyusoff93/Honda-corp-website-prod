const eshp_loginform = async () => {
    let tmp = await eshp_tmp('loginform');

    tmp = ` <div class="container main">
        <span class="ccl"></span>
        <div class="close-pop-w ccl"></div>
        <div class="wrap"><div class="wrap"><h2>Log In</h2><div class="text-center">${tmp}</div></div></div>
    </div> `;

    uilichtSet('Cartlogin', tmp, ()=>{
        let licht = $('.lichtCartlogin'),
            form = $('form', licht);
        
        $('.signup button').click(()=>{
            eshp_signupform();
        });
        let success = () => location.reload();
    
        let failed = (json) => $('.notimsg',licht).html(json.msg);

        let next = async (json) => {
            let newform = await eshp_tmp('passform', json);
            form.html(newform);
            newform = $('form',licht);
            newform.submit(function (e) {
                e.preventDefault();
                uiaddLoad(licht,'Checking Password');
                let data = new FormData(this);

                $.ajax({
                    url: `${DOT}e_shop/action/login.php`,
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (erg) {
                        let json = JSON.parse(erg);
                        console.log(erg);

                        if(json.feed==200) success();
                        else failed(json);

                        setTimeout(()=>{
                            uifadeRemove($('.loader', licht))
                        },1000);
                    }
                });
            });
        };
        
        
        form.submit(function (e) {
            e.preventDefault();
            uiaddLoad(licht, 'Checking User');
            let data = new FormData(this);

            $.ajax({
                url: `${DOT}e_shop/action/login.php`,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (erg) {
                    let json = JSON.parse(erg);
                    console.log(erg);

                    if(json.feed==200) next(json);
                    else failed(json);

                    setTimeout(()=>{
                        uifadeRemove($('.loader', licht))
                    }, 1000);
                }
            });
            return false;
        });
    });
};
const eshp_signupform = async () => {
    let tmp = await eshp_tmp('signupform');

    tmp = ` <div class="container main">
        <span class="ccl"></span> 
        <div class="wrap"><div class="close-pop-w ccl"></div><div class="wrap"><h2>Sign Up</h2><div class="text-center">${tmp}</div></div></div>
    </div> `;
    
    uilichtSet('CartSignup', tmp, ()=>{
        let licht = $('.lichtCartSignup'),
            form = $('form', licht),
            cpass = $('[name="cpass"]', licht),
            pass = $('[name="pass"]', licht),
            pnoti = $('.notipass', licht),
            btn = $('[type="submit"]', licht);
        
        let chk = ()=>{
            pass.on('keypress keyup', ()=>{
                setTimeout(()=>{
                    cpass.val('');
                    btn.attr('disabled','');
                    pnoti.html('');
                },0);
            });
            cpass.on('keypress keyup', ()=>{
                setTimeout(()=>{
                    if(!pass.val()){ 
                        pnoti.html('Confirm password cannot proceed if password is empty.');
                        cpass.va('');
                        return false;
                    }
                    if(!cpass.val()){
                        pnoti.html('');
                    }else if(cpass.val() !== pass.val()){
                        pnoti.html('Password not match');
                        btn.attr('disabled','');
                    }else{
                        pnoti.html('');
                        btn.removeAttr('disabled');
                    }
                },0)
            });
        };
        chk();
        
        form.submit(function (e) {
            e.preventDefault();
            uiaddLoad(licht, 'Checking User');
            let data = new FormData(this);

            $.ajax({
                url: `${DOT}e_shop/action/signup.php`,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (erg) {
                    let json = JSON.parse(erg);
                    console.log(erg);

                    if(json.feed==200){ 
                        form.html(`<p>${json.msg}</p><p>Please log in to enjoy your shopping.</p>`);
                    }else{ 
                        form.html(`${json.msg}`);
                    }

                    setTimeout(()=>{
                        uifadeRemove($('.loader', licht))
                    }, 1000);
                }
            });
            return false;
        });
    });
};

const eshp_quanSet = (sel, setTotal, min=0)=>{
    sel.each(function() {
        let das = $(this),
            add = $('.btn-add', das),
            sub = $('.btn-sub', das),
            inp = $('[type="number"]', das),
            ssku_inp = inp.attr('da-ssku-inp');
        
        let syncQuantity = null;
        inp.on('keydown', (e)=>{ if(e.key==='.' || e.key==='e') e.preventDefault() });
        add.click(async function() {
            let val = +inp.val() + 1;
            inp.val(val);
            setTotal.text(await eshp_total($('.lichtCart input[da-price]')));
            syncing(val);
        });
        sub.click(async function() {
            if (inp.val() > min) {
                let val = +inp.val() - 1;
                inp.val(val);
                setTotal.text(await eshp_total($('.lichtCart input[da-price]')));
                syncing(val);
            };
        });
        
        function syncing(val){
            if(syncQuantity != null){
                clearTimeout(syncQuantity);
                operate();
            }else{
                operate();
            }
            
            function operate(){
                syncQuantity = setTimeout(()=>{
                    $.post(`${DOT}zata_da/mn/mn.addcart.php`,{ssku: ssku_inp, quan: val},(erg)=>{
                        console.log(erg);
                        syncQuantity = null;
                    });
                },800);
            }
        }
    });
}

const eshp_total = async (qttitm) => new Promise((res,rej)=>{
    let sum = 0;

    qttitm.each(async function() {
        let qtt = + $(this).val(),
            price = + $(this).attr('da-price'); 
        sum += parseFloat(qtt * price);
    });
    qttitm.promise().done(()=>{
        res(sum.toFixed(2));
    }); 
});

const eshp_profile = () => new Promise((res,rej) => {
    $.post(`${DOT}e_shop/action/profile.php`, async (erg) => {
        let json = JSON.parse(erg),
            form = '';
        form += await eshp_tmp('profileform',json);
        form = `<div class="profileform d-none" type="profile">${form}</div>`;
            
        res(form);
    });
});

const eshp_getCartList = () => new Promise((res,rej) => {
    $.post(`${DOT}e_shop/action/cartlist.php`, async (erg) => {
        let json = JSON.parse(erg),
            cartlist = '';
        await asyncForEach(json, async (item, i)=>{
            console.log(item);
            cartlist += await eshp_tmp('cartitem',item);
        });
        
        if(!Boolean(cartlist)) cartlist = `<div class="cartlist" type="mycart"><div class="no-w">No Items Found in Your Cart.</div></div>`;
        else cartlist = `<div class="cartlist" type="mycart">${cartlist}</div>`;
            
        res(cartlist);
    });
});
const eshp_main = () => {
    $(".btnCARTLOGIN, .btnCARTLOGOUT, .btnCARTVIEW").unbind();
    
    $('.btnCARTLOGIN').click(async ()=>{ eshp_loginform(); });
    $('.btnCARTLOGOUT').click(async ()=>{ $.post(`${DOT}e_shop/action/logout.php`, (erg) => location.reload()); });
    $('.btnCARTVIEW').click(async ()=>{
        let lichtname = 'Cart',
            lichtcarttmp = `<div class="licht${lichtname}"> <span class="ccl"></span>
            <div class="wrapxp f f-j-c f-a-fs">
                <div class="wrap main">

                    <div class="scroll-w f wrap">
                        <div class="f wrap">

                             <div class="wrap taste-top"> <div class="f"> <div class="taste"> <button class="btn-gen mycart" type="button">Cart</button> </div><div class="taste"> <button class="btn-gen profile" type="button">Profile</button> </div><div class="taste schlies"> <button class="btn-gen ccl" type="button"><i class="fas fa-times"></i></button> </div></div></div>

                             <div class="wrap info-section"> <div class="info-w"> </div> </div>

                             <div class="wrap taste-btm"> <div class="" type="mycart"> <div class="f"> <div class="total wrap"> Total: RM <span class="totalamount">0.00</span> </div></div><div class="f"> <div class="taste"> <button class="btn-gen proceedPayment" type="button">Proceed Payment</button></div></div></div><div class="d-none" type="profile"> <div class="f"> <div class="taste"> <button class="btn-gen speichern" type="button">Save</button> </div></div></div></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>`;
        $('html').addClass('fixed');
        $('body').append(lichtcarttmp);
        uilichtAft(lichtname);
        let licht = $(`.licht${lichtname}`);
        
        $('button.mycart',licht).click(()=>{
            $('[type="mycart"]',licht).removeClass('d-none');
            $('[type="profile"]',licht).addClass('d-none');
        });
        $('button.profile',licht).click(()=>{
            $('[type="mycart"]',licht).addClass('d-none');
            $('[type="profile"]',licht).removeClass('d-none');
        });

        let cartlist = await eshp_getCartList();
        $('.info-w',licht).append(cartlist);
        $('.totalamount',licht).text(await eshp_total($('.lichtCart input[da-price]')));

        $('[da-ssku]').each(async function(){
            let cartitem = $(this),
                ssku = cartitem.attr('da-ssku'),
                btn = {};
            $('.loeschen', cartitem).click(()=>{
                $.post(`${DOT}e_shop/action/remove.php`, {ssku: ssku}, async (erg)=>{
                    let json = JSON.parse(erg);
                    if(json.feed == 200){ 
                        cartitem.remove();
                        $('.CARTITEM').html(json.count);
                    }else{ 
                        console.log('cannot remove');
                    }

                    $('.totalamount',licht).text(await eshp_total($('.lichtCart input[da-price]')));
                });
            }); 
        });
        eshp_quanSet($('.cart-quan',licht), $('.totalamount',licht), 1);

        
        let profileform = await eshp_profile();
        $('.info-w',licht).append(profileform);
        $('[type="profile"] .speichern',licht).click(()=>{
            $('[type="profile"] button[type="submit"]',licht).trigger('click');
        });
        $('[type="profile"] form',licht).submit(function (e) {
            e.preventDefault();
            uiaddLoad($('.main',licht), 'Saving');
            let data = new FormData(this);

            $.ajax({
                url: `${DOT}e_shop/action/saveprofile.php`,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (erg) { 
                    console.log(erg); 
                    uifadeRemove($('.loader', licht))
                }
            });
            return false;
        });
        
        $('.btn-cart-invoice',licht).click(()=>{
            eshp_orders();
        });
    });
}
const eshp_orders = () =>{
    let tmp = ``,
        lichtname = 'CartHistory';
    tmp = `<div class="container main">
        <span class="ccl"></span> 
        <div class="wrap"><div class="close-pop-w ccl"></div><div class="wrap"><h2>Order Record</h2><div class="info-w">${tmp}</div></div></div>
    </div>`;
    uilichtSet(lichtname, tmp, ()=>{
        let licht = $(`.licht${lichtname}`);
        $.post(`${DOT}e_shop/action/orderhistory.php`, async (erg)=>{
            let json = JSON.parse(erg),
                orderlist = '';
            await asyncForEach(json, async (item, i)=>{ orderlist += await eshp_tmp('orderitem',item); });
            
            $('.info-w',licht).html(orderlist);
            $('.btn-view').each(function(){
                let btnview = $(this);
                btnview.click(()=>{
                    eshp_invoice();
                });
            });
        });
    }); 
}

const eshp_invoice = () =>{
    
    
    //    $.post(`${DOT}e_shop/action/invoice.php`, {slsgid: slsgid}, async (erg)=>{
//        let json = JSON.parse(erg),
//            cartlist = '';
//        console.log(json);
//        await asyncForEach(json, async (item, i)=>{ 
//            cartlist += await eshp_tmp('invoiceitem',item);
//        });
//    });
}


eshp_main();