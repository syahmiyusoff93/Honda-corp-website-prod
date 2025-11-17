<?php
if(!class_exists('MNC5001')){
    class MNC5001 {
        public function getForm($json) {
            $disp = ['','',''];
            
            foreach($json['country'] as $key=>$val){ $disp[0] .= '<option value="'.htmlspecialchars($val['country']).'">'.$val['country'].'</option>'; }
            foreach($json['honorific'] as $key=>$val){ $disp[1] .= '<option value="'.htmlspecialchars($val).'">'.$val.'</option>'; }
            
            return '<div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <select name="honorific" id="" required>
                                            <option value="" class="placeholder d-none" selected>Honorific *</option>
                                            '.$disp[1].'
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="Name *" name="Name" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea rows="2" cols="20" name="Address" placeholder="Address" style="height:109px;"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <select name="country" id="" required>
                                            <option value="" class="placeholder d-none" selected>Country *</option>
                                            '.$disp[0].'
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="email" placeholder="Email *" name="Email" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="Phone *" name="Contact Number" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea rows="2" cols="20" name="Message" placeholder="Message" style="height:170px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="f taste">
                                    <div class="l"><p><i class="fas fa-info-circle"></i> Please fill in the required field with asterisk *</p></div>
                                    <div class="r"><button type="submit" class="btn-gen3 trans400" >Submit Message</button></div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    }
}
$MNC['5001'] = new MNC5001();