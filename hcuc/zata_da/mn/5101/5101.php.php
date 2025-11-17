<?php
$disp = [''];
//$res_m = $this->getInfo($CON,$folder,['fid','i','1','4']);
//while($item_m = $res_m->fetch_object()){
//    $item = $this->itemInfo($item_m, $htt[0]);
//    
//    $disp[0] .= $MNC[$folder['module']]->getList($CON, $item);
//}
$btn='';
if($folder['sync']['redir']) {
    $btn = '<a href="'.htmlspecialchars($folder['sync']['redir']).'" class="btn-gen">All Practices Areas</a>';
}

$special = $this->specialTtl($folder);
echo '<section class="" mn="'.$folder['module'].'"  da-id="'.$folder['id'].'">
    <div class="container">
        '.$special.' 
    </div>
    <div class="container">
        <div class="f lnrn-w">
            <div class="ln">
                <div class="wrap">
                    <div class="ttl">Get in Touch</div>
                    <p>You may use this form to reach us. <br>We will be in touch within 48 hours.</p>
                </div>
            </div>
            <div class="rn">
                <div class="wrap">
                    <form action="">
                        <div class="wrap">
                            <div class="row">
                               <div class="col-md-4">
                                <div class="wrap grp">
                                    <div class="wrap">
                                        <input type="text" name="Company Name" required>
                                        <div class="lab"><i class="fas fa-user"></i> Name</div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wrap grp">
                                        <div class="wrap">
                                            <input type="text" name="Business Registration Number" required>
                                            <div class="lab"><i class="fas fa-phone-alt"></i> Phone Number</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wrap grp">
                                        <div class="wrap">
                                            <input type="email" name="Business Mailing Address" required>
                                            <div class="lab"><i class="fas fa-envelope"></i> Mailing Address</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="wrap grp">
                                        <div class="wrap">
                                            <textarea name="" id="" style="height: 150px;" required></textarea>
                                            <div class="lab"><i class="fas fa-comments"></i> Message</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap taste">
                                <button class="btn-gen" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>'; 
?> 
<script>
    $(() => {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`);
        $('input, textarea', main).each(function() {
            let das = $(this);
            das.on('keyup', () => {
                if (das.val()) {
                    das.addClass('valed');
                } else {
                    das.removeClass('valed');
                }
            });
        });
    });
</script>