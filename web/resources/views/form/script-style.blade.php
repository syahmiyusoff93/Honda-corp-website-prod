<style>
    .globalform {padding:20px;  }

    h2 {color:#282A2F;}

    .width-contained, .width-contained .formsection, .width-contained h2, .width-contained h4, .width-contained hr {max-width: 700px; margin:auto;}


    .globalform input, .globalform label, .globalform select, .globalform h4 {font-family: 'Poppins'; }
    .globalform h4 {font-size: 1.125rem; letter-spacing: .08em; font-weight: 500;}
    .globalform .field-title {display:block; width:100%; font-size:.75rem; font-weight:500; letter-spacing: .1em; color: #838586; margin:20px 0 7px 0;}

    .globalform h4 {position: relative; margin-top:30px;}
    .globalform h4 .arrow {position: absolute; top:calc(50% - 5px); right:20px; transition-duration: .3s;}
    .globalform h4.expanded .arrow {transform: rotate(180deg);}
    .globalform h4.collapsible { cursor: pointer;}

    .globalform hr {margin: 40px auto; opacity: .4;}


    .globalform input,
    .globalform select
        {margin-top:5px; outline:none; display: block; padding:15px; width:100%;  border: 1px solid #C2C3C4; font-weight:300; font-size: 1rem; letter-spacing: .12em; color: #838586 ;};

    .globalform input::placeholder { font-weight:500; font-size: 1rem; letter-spacing: .12em; color: #C2C3C4 ;  }
    .globalform input:focus { border: 1px solid #333;}

    .globalform input[type="radio"] + label {width:fit-content; min-width: 120px;margin-right:20px;}

    .globalform .error input {border:1px solid #E01327;}
    .globalform input.error {border:1px solid #E01327;}

    .globalform select { -webkit-appearance: none; -moz-appearance: none; text-indent: 1px; text-overflow: '';}
    .globalform select + .arrow {position: absolute; top:63px; right:20px; transition-duration: .3s;}
    .globalform select:focus + .arrow {transform: rotate(180deg);}
    .globalform select option {border: none;}

    .globalform .formrow {clear: both; width:100%; margin-top:10px; position: relative;}
    .globalform .formrow > li {padding-left:20px; float: left; width:calc(100% - 0px); position: relative;}
    .globalform .formrow > li:first-of-type {padding-left:0;}

    .globalform .formrow .w20 {width:20%;}
    .globalform .formrow .w25 {width:25%;}
    .globalform .formrow .w50 {width:50%;}
    .globalform .formrow .w80 {width:80%;}

    .globalform .emessage {color: #E01327; font-size: .8rem; letter-spacing: .1em; padding:10px; display: none;}

    .globalform textarea {width: 100%;height: 360px;border: 1px solid #C2C3C4; padding:20px; font-size: 1rem; color: #838586; font-family: 'Poppins'; letter-spacing: .12em; border: 1px solid #C2C3C4; outline: none;}

    .globalform .error input {border:1px solid #E01327; }
    .globalform .error .radiolabel {color: #E01327;}
    .globalform .error .emessage {display: block;}

     .cb-options {margin-top:10px;}
     .cb-options .holder {margin:0px 20px 20px 0; display: inline-block;}

    .inner-container {padding: 40px 0;}

    .globalform .removerow {position:absolute; left:-40px; top: 55px; fill:#E01327; transform: scale(.5); cursor: pointer; }

    .addvehicle {margin:40px auto; width: max-content; cursor: pointer;}
    .addvehicle svg {transform: scale(.4) rotate(45deg) translateY(20px); fill: #E01327;}

    .globalform p {font-size: .9rem; line-height: 1.5em; padding:1.5em 0 ; }
    .globalform p a, .globalform p a:visited, .globalform p a:active {color: #E01327;}

    .globalform p.note {font-size: 0.6875rem; }

    .prime-cta-white.fullwidth, .prime-cta-black.fullwidth {width:100%; text-align: center;}

    .globalform .error {border:1px solid #E01327;}

    /* GLOBAL DROPDOWN overides*/
    .outline-drop ul.dropdown-menu {width:100%;}
    .outline-drop .dropdown-box {padding:0 50px 0 20px; height: 55px;}
    .outline-drop .dropdown-box > .select-copy {top: 50%; transform:translateY(-50%);display:block;}

    .success-icon {width: 100px;height: 110px;margin: auto;}
    .success-icon img {width:100%;}

    .form-submitting {position: fixed; z-index: 99999999; background:rgba(0,0,0,.8); width:100vw; height:100vh; overflow: hidden; padding: 20px; top:0; left:0; display: flex;     align-items: center; justify-content: center; color:white;}
    .disable-scroll {overflow: hidden;}

    @media only screen and (max-width:400px){
        .globalform .formrow {}
        .globalform .formrow > li {padding-left: 0;width:100% !important;}
    }

    /* Google Recaptcha */
    .input-google-recaptcha { text-align: center; }
    .input-google-recaptcha .g-recaptcha > div { margin: 0 auto; }
</style>

<script>

    // general form validation
    function resetFormField(){

    }

    function resetError(){
        $('.emessage').slideUp();
        $('input,select, .error').removeClass('error');
    }

    function validateText(ele){
        var val = ele.val();
        if(val.length<2){
            //console.log('text failed', ele.val())
            ele.addClass('error');
            ele.next('.emessage').html(ele.data('emsg')).slideDown();
            return false;
        }
        return true;
    }

    function validateTextArea(ele){
        var val = ele.val();

        if(val.length<3){
            ele.addClass('error');
            ele.next('.emessage').html(ele.data('emsg')).slideDown();
            return false;
        }
        return true;
    }

    function validateEmail(ele){
        if(!validateText(ele)){
            return false;
        }
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(ele.val())) {
            return true;
        }
        //console.log('email failed', ele.val())
        ele.addClass('error');
        ele.next('.emessage').html(ele.data('emsg')).slideDown();
        return false;
    }

    function validatePhone(ele){
        if(!validateText(ele)){
            return false;
        }

        if (/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(ele.val())) {
            return true;
        }
        //console.log('phone failed', ele.val())
        ele.addClass('error');
        ele.next('.emessage').html(ele.data('emsg')).slideDown();
        return false;
    }

    function validateCheckBox(ele){
        if(ele.find('input[type="checkbox"]:checked').length>0){
            return true
        }
        //ele.addClass('error');
        ele.find('.emessage').html(ele.data('emsg')).slideDown();
        return false;

    }

    function validateDropDown(ele){
        val = ele.find('input').val()
        if(val!=undefined && val.length>0){
            return true
        }
        ele.find('.dropdown-box').addClass('error');
        ele.find('.emessage').html(ele.data('emsg')).slideDown();
        return false;

    }

    function showSubmitting(){
        $('body').addClass('disable-scroll').append('<div class="form-submitting"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div> Submitting form</div>');
        $('.form-submitting').fadeOut(0).fadeIn('fast');
    }
    function clearSubmitting(){
        $('body').removeClass('disable-scroll');
        $('.form-submitting').remove();
    }

    $(document).ready(function(){
        $('.globalform h4.collapsible').click(function(){
            $(this).toggleClass('expanded');
            if($(this).hasClass('expanded')){
                $(this).next('.formsection').slideDown();
            } else {
                $(this).next('.formsection').slideUp();
            }
        })
        //$('.globalform h4.collapsible').next('.formsection').show();

        // SELECT CLICK
        $('.dropdown-menu li').click(function(){
            //console.log( $(this).data('mslug'), $(this).data('hfield'))

            var hname = $(this).data('hfield');
            hname = hname.replace('hidden-', '');
            //console.log('input[name="'+hname+'"]')
            $('input[name="'+hname+'"]').val($(this).data('mslug'))
        })

        // phone number validation
        function processPhoneInput(str){
            var i;
            var p = [];
            for(i=0;i<str.length;i++){
                if(str[i]=='+' || !isNaN(str[i])){
                    p.push(str[i]);
                }
            }
            return p.join('');
        }
        $('input[type="tel"], input[type="phone"], input[type="icontact"]').on('keyup blur', function(){
            var newval = processPhoneInput($(this).val());
            $(this).val(newval);
        })

    })
</script>
