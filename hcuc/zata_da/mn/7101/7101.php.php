<?php
$disp = [0=>'',1=>'',2=>''];
$CAT = file_get_contents("zata_da/mn/$folder[module]/$folder[module].group.json");
$CAT = json_decode($CAT, true);

$res_m = $this->getInfo($CON,$folder,['fid','i','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);

    $disp[2] .= '<option da-selid="'.$item['id'].'" value="'.htmlspecialchars($item['title']).'">'.$item['title'].'</option>';
}
$disp[0] .= '<div class="filt"> <select><option value="All" class="d-none">Select Category</option>'.$disp[2].'</select></div>';

//get floor section
//$disp[2] = '';
//
//$res_m = $this->getInfo($CON,$folder,['fid','i','2']);
//while($item_m = $res_m->fetch_object()){
//    $item = $this->itemInfo($item_m, $htt[0]);
//
//    $disp[2] .= '<option value="'.htmlspecialchars($item['title']).'">'.$item['title'].'</option>';
//}
//$disp[0] .= '<div class="filt"><label for="">'.$CAT['Group'][1].'</label><select><option value="All">All</option>'.$disp[2].'</select></div>';

//get inventory
$disp[2] = '';
$DIM = [];

if(!empty($folder['sync']['redir'])){
    $q_m="SELECT * FROM inv WHERE inv_fid = '{$folder['sync']['redir']}' AND inv_trash IS NULL;";
    $res_m = $CON->query($q_m);
    $I = 0;
    while($item_m = $res_m->fetch_object()){
        $DIM[$I]['iid'] = empty($item_m->id)?'':$item_m->id;
        $DIM[$I]['name'] = empty($item_m->inv_name)?'':$item_m->inv_name;
        $DIM[$I]['img'] = empty($item_m->inv_bildurl)?'':$item_m->inv_bildurl;
        $DIM[$I]['lbl'] = empty($item_m->inv_var)?'':$item_m->inv_var;
        $DIM[$I]['ctt'] = empty($item_m->inv_content)?'':$item_m->inv_content;
        $DIM[$I]['inf'] = empty($item_m->inv_info)?'':$item_m->inv_info;
        
        $media = empty($item_m->inv_media)?[]:json_decode($item_m->inv_media, true);
        
        $gals = '';
        $fol = ceil($DIM[$I]['iid']/10);
        $fol =  $htt[0].'zata_da/src/contentmedia/'.$fol.'/'; 
        foreach($media as $k => $v) {
            if(preg_match('/image/', $v['type']))
                $gals.= '<div class="gal">
                    <div class="wrap">
                        <div class="bimg-w">
                            <div class="bimg bg-cover" style="background-image: url('.$fol.$v['name'].')"></div>
                        </div>
                    </div>
                </div>';
        }
        if(!empty($gals))
            $gals = '<div class="wrap gals-w"><div class="gals f">'.$gals.'</div></div>';
        
        
        $disp[2] .= '<div class="itm">
                        <a>
                            <div class="wrap">
                                <div class="wrap">
                                    <div class="bimg-w">
                                        <div class="bimg bg-cover" style="background-image: url('.$htt[0].'zata_da/src/inventory/'.$item_m->inv_bildurl.')"></div>
                                    </div>
                                    <template><div class="col-12">
                                    <h2>'.$item_m->inv_name.'</h2>
                                    <div class="categorio"> Categories: '.$DIM[$I]['lbl'].'</div>
                                    <div class="unito"> Unit: '.$DIM[$I]['inf'].'</div>
                                    '.$item_m->inv_content.'
                                    <div class="wrap">'.$gals.'</div>
                                    </div></template>
                                </div>
                                <div class="info">
                                    <div class="name">'.$item_m->inv_name.'</div>
                                </div>
                            </div>
                        </a>
                    </div>';
        $I++;
    }

}
$folder['genttl'] = empty($folder['genttl'])?'':'<h2>'.$folder['genttl'].'</h2>';
$folder['smr'] = empty($folder['smr'])?'':'<div class="tptxt">'.$folder['smr'].'</div>';
$folder['bildurl'] = empty($folder['bildurl'])?'':'<p><img src="'.$folder['bildurl'].'"/></p>';

$DIM = json_encode($DIM, true);

echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class="container main">
        <div class="wrap img-w">'.$folder['bildurl'].'</div>
        <div class="wrap filterbar">
            <div class="f f-j-c">
                <div class="r f f-j-fe search">
                    <div class="sear">
                        <label for="">Search</label>
                        <input type="text" name="search" placeholder="Key Store Name">
                    </div>
                </div>
                <div class="l f f-j-sb filter">
                    '.$disp[0].'
                </div>
            </div>
        </div>

        <div class="itms">
            <div class="f LISTS">
                '.$disp[2].'
            </div>
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
            mnexe = `${dot}zata_da/mn/mn.exe.php`,
            select = $('select', main),
            info = <?php echo $DIM?>;
//        info = JSON.parse(info);
        //        console.log(info);
        let QUE = (sel) => {
            let i = 0,
                str = '',
                que = [];
            for (i = 0; i < sel.length; i++) {

                que.push(sel.eq(i).val());
            }
            return que;
        };
        let TOLOW = (str) => {
            str = str.replace(/ /g, '');
            return str.toLowerCase();
        }
        let TEMP = (dot, inf) => `<div class="itm">
                            <a>
                                <div class="wrap">
                                    <div class="wrap">
                                        <div class="bimg-w">
                                            <div class="bimg bg-cover" style="background-image: url(${dot}zata_da/src/inventory/${inf['img']})"></div>
                                        </div>
                                        <template><div class="col-12">
                                        <h2>${inf['name']}</h2>
                                        ${inf['ctt']}
                                        </div></template>
                                    </div>
                                    <div class="info">
                                        <div class="name">${inf['name']}</div>
                                    </div>
                                </div>
                            </a>
                        </div>`
        let setPop = (sel)=>{
            sel.each(function(){
                let a = $('a',this),
                    temp = $('template', a).html(),
                html = `<div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap"><div class="wrap"><div class="row">${temp}</div></div></div></div>`;

                uilichtEins(mn, a, html);
            });
        }
        setPop($('.itm',main));
        $('[name="search"]', main).on('keyup', function() {
            setTimeout(()=>{
                let val = $(this).val(),
                    str = TOLOW(val),
                    lists = '';

                $.each(info, function(i, inf) {
                    if(TOLOW(inf['name']).includes(str))
                        lists += TEMP(dot, inf);
                });
                if (!lists)
                    lists = `<div class="col-12 text-center"><h2>No Info Available</h2><p>No results found for</p><p><b>${val}</b><p></div>`;
                $('.LISTS', main).html(lists);
                setPop($('.itm',main));
            },100);
        });
        select.each(function() {
            let das = $(this);
            das.change(function() {
                let que = '',
                    lists = '',
                    str = '';

                que = QUE(select);
                //                console.log(que+'sd');
                $.each(info, function(i, inf) {
                    let boo = true,
                        q1 = TOLOW(que[0]),
                        q2 = '';
                    str = TOLOW(inf['lbl']);
                    if (boo && str.includes(q1) && str.includes(q2)) {
                        lists += TEMP(dot, inf);
                        boo = false;
                    }
                    if (boo && q1 == 'all' && str.includes(q2)) {
                        lists += TEMP(dot, inf);
                        boo = false;
                    }
                    if (boo && str.includes(q1) && q2 == 'all') {
                        lists += TEMP(dot, inf);
                        boo = false;
                    }
                    if (boo && q1 == 'all' && q2 == 'all') {
                        lists += TEMP(dot, inf);
                        boo = false;
                    }
                });
                if (!lists) lists = `<div class="col-12 text-center"><h2>No Info Available</h2><p>No results found for</p><p>CATEGORIES: <b>${que[0]}</b><p></div>`;
                $('.LISTS', main).html(lists);
                setPop($('.itm',main));
            });
        });
        select.promise().done(()=>{
            main.css({ 
                'min-height': `calc(100vh - ${$('[mn="8401"]').outerHeight()}px)` 
            });
            let selid = getUrlVars()['selid'];
            if(Boolean(selid)) $(`option[da-selid="${selid}"]`, main).prop('selected',true).change();
        });
         
    });
</script>