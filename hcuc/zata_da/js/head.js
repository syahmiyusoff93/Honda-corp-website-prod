const validateInput = (D)=>{
    let input = $(`[name="${D.feldid}"]`),
        form = $(`form#${D.formid}`);
    $(`<div class="msg${D.feldid}1" style="color:red;"></div>`).insertBefore(input);
    $(`<div class="msg${D.feldid}2" style="font-size:80%;"></div>`).insertBefore(input);
    let msg1 = $(`.msg${D.feldid}1`),
        msg2 = $(`.msg${D.feldid}2`),
        boo1=1,boo2=1;
    input.on('keyup',function(){
        let txt = input.val();
        if(jQuery.inArray(txt,D.data)>-1){
            msg1.text(`"${txt}" is used. It cannot be used again.`);
            boo1=0;
        }else{
            msg1.text(``);
            boo1=1;
        }
        
        if(D.string){
            if(txt.length!=D.string){
                msg2.html(`This input should have <span  style="color:orangered;">${D.string}</span> units of letter/digit. <br> Your input is having <span  style="color:orangered;">${txt.length}</span> units. Please check your input.`);
                boo2=0;
            }else{
                msg2.html(``);
                boo2=1;
            }
        }
        if(boo1&&boo2){
            $(`button`, form).removeAttr('disabled');
        }else{
            $(`button`, form).attr('disabled','disabled');
        }
    });
}
function CountDecimalDigits(value)
{
  if ((value % 1) != 0) 
        return value.toString().split(".")[1].length;  
    return 0;
}
function IsValidCurrencyNumber(value,numberDecimalSeparator,digitsAfterDecimal)
{
	//var reg = new RegExp('^\\d*[,]*[.]{0,1}\\d{1,2}$'); //For numbers upto 2 decimal
	var reg = new RegExp('^\\d*[,]*['+ numberDecimalSeparator +']{0,1}\\d{1,'+digitsAfterDecimal+'}$');
	// compare the argument to the RegEx
	// the 'match' function returns 0 if the value didn't match
	if(value.match(reg)==null)
		return false
	else
		return true;
}