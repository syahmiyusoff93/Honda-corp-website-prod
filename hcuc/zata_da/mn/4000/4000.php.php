<?php
    // $q_m = 'SELECT * FROM lists 
    //         WHERE list_fid = "'.$folder['id'].'" AND list_type = "i" AND list_status = "1"
    //         ORDER BY list_priority
    //         ;';
    // $res_m = $CON->query($q_m);
    // $disp = array(0=>'',1=>'');
    // while($item_m = $res_m->fetch_object()){
    //     $item = $this->itemInfo($item_m, $htt[0]);
    //     $disp[0] .= '<div class="ele" da-mid="">
    //                     <div class="ttl tab trans400">
    //                         '.$item['title'].'
    //                     </div>
    //                     <div class="liss">
    //                         <div class="wrapxp lis">
    //                             <div class="align-items-center">
    //                                 '.$item['content'].'
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>';
    // }
      
    echo '<section mn="'.$folder['module'].'"  da-id="'.$folder['id'].'" class="">
            <div class="container main">
                '.$MAIN['title'] .'

                <div class="lr-main">
                    <div class="lr-w f">
                        <div class="l">
                            <div class="wrap cats f">   </div>
                        </div>
                        <div class="r">
                            <div class="wrap eles">   </div>
                        </div>
                    </div>
                </div>

                
            </div>
    </section>';
?>


<script>
    $(function() {
        let id = `<?php echo $folder['id'];?>`,
            mn = `<?php echo $folder['module'];?>`,
            main = $(`[mn="${mn}"][da-id=${id}]`);

        $(window).resize(async () => {
            let H = await menuH;
            H += $('[mn="8401"]').outerHeight();
            main.css('min-height', `calc(100vh - ${H}px)`)
        }).resize();

        let data = {},
            tmp = {};

        data.tab = <?php echo $MNC[$folder['module']]->tabsData($CON, $folder) ; ?>; 
        console.log(data.tab);

        tmp.tabs = (info) => new Promise(async (res, rej)=>{
            let tp = '';

            await asyncForEach(info, (row, i)=> {
                tp += `<div class="cat" da-mid="${i}">
                    <div class="cat-ttl">
                        ${row.title}
                    </div> 
                </div>`;
            })

            res(tp);
        })
        tmp.accordion = (info) => new Promise(async (res, rej)=>{
            let tp = ''; 

            await asyncForEach(info, row => {
                tp += `<div class="ele" da-mid="">
                    <div class="ttl tab trans400">
                        ${row.title}
                    </div>
                    <div class="liss">
                        <div class="wrapxp lis">
                            <div class="align-items-center">
                                ${row.info}
                            </div>
                        </div>
                    </div>
                </div>`;
            })
 
            res(tp);
        });

        setMainTab(data.tab)

        async function setMainTab(_info) {
            let tp = await tmp.tabs(_info);  
            $(`.lr-main .l .cats`, main).html(tp);
            setTabAction();

        }
        
        async function setTabAction(){
            $('.cat', main).click( async function(){
                let cat = $(this),
                    key = cat.attr('da-mid'),
                    tp = await tmp.accordion(data.tab[key].info);
                cat.siblings().removeClass('active');
                cat.addClass('active');
                $('.eles', main).html(tp);
                setAccAction();
            })
            $('.cat:eq(0)', main).trigger('click');
        }

        async function setAccAction(){
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
        }
    });
</script>