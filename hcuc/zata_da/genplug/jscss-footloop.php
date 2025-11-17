
<script>
    $(async function() {
        let scrollid = getUrlVars()['scrollid'],
            mH = await menuH;
        // console.log(mH);
        uipadAjust.then(async (v) => {
            if (Boolean(scrollid)) { 
                $('html, body').animate({
                    scrollTop: $($(`[da-id="${scrollid}"]`)).offset().top - mH
                }, 800, 'linear');
            }
        });
    });
</script>

<?php
$LISTING->JSCS(['style'], 'js', 0, $htt[0].'zata_da/js/');

if(ECOMMERCE){
$LISTING->JSCS(['eshop.tmp','eshop'], 'js', 1, $htt[0].'zata_da/js/');
$LISTING->JSCS(['eshop'], 'css', 1, $htt[0].'zata_da/css/');
} 


