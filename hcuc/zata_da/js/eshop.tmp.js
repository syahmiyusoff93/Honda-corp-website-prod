const eshp_tmp = async (temp, json) => new Promise((res, rej)=>{
    let forget = `<div class="forget"><a href="#">Forget Password?</a></div>`,
        signup = `<div class="signup"><button class="btn-gen" type="button">Sign Up An Account</button></div>`;
    
    if(temp == 'loginform')
        res(`<form action=""> <div class="wrap"> <p>Good day! Please sign in to proceed add cart.</p><div class="noti notiwell"></div><div class="noti notimsg"></div><input type="text" placeholder="Email Address" name="name"> <div class="taste"><button class="btn-gen" type="submit">Login</button>${signup}</div>${forget}</div></form>`);
    else if(temp == 'passform')
        res(`<div class="wrap"> <div class="wrap"><div class="noti notiwell"><p>Hi, ${json.name}, Wellcome. <br>Please continue log in with your password.</p></div><div class="noti notimsg"></div></div><div class="wrap"> <input type="password" name="pass" placeholder="Your password" required> <div class="taste"><button class="btn-gen" type="submit">Login</button></div></div></div>`);
    else if(temp == 'cartitem')
        res(`<div class="cart-itm" da-ssku="${json.ssku}"> <div class="aktion"> <div class="f"> <div class="aktion-itm loeschen"><i class="fas fa-trash-alt"></i></div></div></div><div class="f lr-w"> <div class="l"> <div class="bimg-w"> <div class="bimg bg-contain" style="background-image:url(${DOT}zata_da/src/inventory/${json.image})"></div></div></div><div class="r"> <div class="wrap"> <div class="cart-ttl">${json.name}</div><div class="cart-price">RM ${json.price}</div><div class="cart-quan"> <div class="f"> <button class="btn-sub" type="button"><i class="fas fa-minus"></i></button> <input da-price="${json.price}" da-ssku-inp="${json.ssku}" name="quan" type="number" readonly value="${json.quantity}"> <button class="btn-add" type="button"><i class="fas fa-plus"></i></button> </div></div></div></div></div></div>`);
    else if(temp == 'orderitem')
        res(`<div class="order-itm" da-gid="${json.gid}">
            <div class="f lr-w">
                <div class="l">
                    <div class="bimg-w">
                        <div class="bimg bg-contain" style="background-image:url(${DOT}zata_da/src/default/delivery.png)"></div>
                    </div>
                </div>
                <div class="r">
                    <div class="wrap">
                        <div class="f f-j-sb lnrn-w">
                            <div class="ln">
                                <div class="order-date">${json.date}</div>
                                <div class="order-title">${json.gid}</div>
                                <div class="order-price">RM ${json.total.toFixed(2)}</div>
                                <div class="order-status">Status: Paid</div>
                            </div>
                            <div class="rn">
                                <button class="btn-gen btn-view">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);
    else if(temp == 'profileform')
        res(`<div class="wrapxp"> <div class="cart-profile-taste"> <button class="btn-gen btn-cart-invoice" type="button">Order Record</button> </div><form action=""> <div class="ttl">Personal Profile</div><div class="wrap"> <div class="wrap set"> <label for="">Name</label> <input type="text" readonly value="${json.name}" required> </div><div class="wrap set"> <label for="">Email</label> <input type="email" readonly value="${json.email}" required> </div><div class="wrap set"> <label for="">Phone Number</label> <input type="text" name="phone" value="${json.phone}" required> </div></div><div class="ttl">Address Book</div><div class="wrap"> <div class="wrap set"> <label for="">Address</label> <input type="text" name="address" value="${json.address}" required> </div><div class="wrap set"> <label for="">Postcode</label> <input type="test" name="postcode" value="${json.postcode}" required> </div><div class="wrap set"> <label for="">City</label> <input type="text" name="city" value="${json.city}" required> </div><div class="wrap set"> <label for="">State</label> <input type="text" name="state" value="${json.state}" required> </div><div class="wrap set"> <label for="">Country</label> <input type="text" name="country" value="${json.country}" required> </div></div><button type="submit" class="d-none"></button> </form> </div>`);
    else if(temp == 'signupform')
        res(`<div class="wrapxp"> <form action=""> <div class="ttl">Personal Profile</div><div class="wrap"> <div class="wrap set"> <label for="">Name</label> <input type="text" name="name" value="" required> </div><div class="wrap set"> <label for="">Email</label> <input type="email" name="email" value="" required> </div><div class="wrap set"> <label for="">Phone Number</label> <input type="text" name="phone" value="" required> </div><div class="wrap set"> <label for="">Password</label> <input type="password" name="pass" value="" required> </div><div class="wrap set notipass"> </div><div class="wrap set"> <label for="">Confirmed Password</label> <input type="password" name="cpass" value="" required> </div></div><div class="ttl">Address Book</div><div class="wrap"> <div class="wrap set"> <label for="">Address</label> <input type="text" name="address" value="" required> </div><div class="wrap set"> <label for="">Postcode</label> <input type="test" name="postcode" value="" required> </div><div class="wrap set"> <label for="">City</label> <input type="text" name="city" value="" required> </div><div class="wrap set"> <label for="">State</label> <input type="text" name="state" value="" required> </div><div class="wrap set"> <label for="">Country</label> <input type="text" name="country" value="" required> </div><div class="wrap set notipass"> </div></div><button type="submit" class="btn-gen" disabled>Sign Up</button> </form> </div>`);
        
});