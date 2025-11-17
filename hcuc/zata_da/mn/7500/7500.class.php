<?php
if(!class_exists('MNC7500')){
    class MNC7500 extends INFOEXT{
        public function dealerlist($CON, $folder) {
            $disp = [0=>'', 1=>''];
            $DATA = [];
            
            $res = $CON->query("SELECT * FROM lists WHERE list_fid='40' AND list_trash IS NULL AND list_status='1';");
            while($info = $res->fetch_assoc()){ 
                $ID = $info['id'];

                $res_ = $CON->query("SELECT * FROM lists WHERE list_fid='$ID' AND list_status='1';");

                while($info_ = $res_->fetch_assoc()){
                    unset(
                        $info_['list_bgurl'],
                        $info_['list_bildurl'],
                        $info_['list_priority'],
                        $info_['list_status'],
                        $info_['list_trash'],
                        $info_['list_type'],
                        $info_['list_cleanurl'],
                        $info_['list_lang'],
                        $info_['list_doc'],
                        $info_['list_link'],
                        $info_['list_iframe'],
                        $info_['list_media'],
                        $info_['list_module'],
                        $info_['list_fid']
                    );
                    array_push($DATA, $info_);
                }
            }

            return json_encode($DATA, true);
        }
        public function fieldGroup() {
            $disp = [0=>'', 1=>''];
            
            return '<div class="fieldgroup"> 
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-12">
                        <div class="field">
                        <button class="btn btn-success btnAddCar" type="button">Add Car <i class="fas fa-plus-circle"></i></button>
                        </div>
                    </div> 
                </div> 
            </div>'; 
            
        }
        public function jsonCar($CON, $folder) {   
            $JSON = 'zata_da/json/car.json';
            $JSON = file_get_contents($JSON);
            $JSON = json_decode($JSON, true); 

            return json_encode($JSON['variance'], true);
        } 
        public function databaseAll($CON, $folder) {   
            $DATA = [];

            $res = $CON->query("SELECT * FROM car;");

            while($info = $res->fetch_assoc()){
                array_push($DATA, $info);
            }

            return json_encode($DATA, true);
        } 
        public function itmList(){ 
            return ' <div class="itm">
                    <div class="itm-w featured">
                        <div class="bimg-w">
                            <div class="bimg bg-cover carimage" ></div> 
                        </div>
                        <div class="txt-w">
                            <div class="itm-ttl">2018 Honda CITY I-VTEC 1.5</div>
                            <div class="itm-label"><span class="number">43,599</span> km | Automatic</div>
                            <div class="itm-price">RM <span class="number">56,800</span></div>
                            <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                        </div>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm-w" featured>
                        <div class="bimg-w">
                            <div class="bimg bg-cover carimage" ></div> 
                        </div>
                        <div class="txt-w">
                            <div class="itm-ttl">2018 Honda CITY I-VTEC 1.5</div>
                            <div class="itm-label"><span class="number">43,599</span> km | Automatic</div>
                            <div class="itm-price">RM <span class="number">56,800</span></div>
                            <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                        </div>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm-w" featured>
                        <div class="bimg-w">
                            <div class="bimg bg-cover carimage" ></div> 
                        </div>
                        <div class="txt-w">
                            <div class="itm-ttl">2018 Honda CITY I-VTEC 1.5</div>
                            <div class="itm-label"><span class="number">43,599</span> km | Automatic</div>
                            <div class="itm-price">RM <span class="number">56,800</span></div>
                            <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                        </div>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm-w">
                        <div class="bimg-w">
                            <div class="bimg bg-cover carimage" ></div> 
                        </div>
                        <div class="txt-w">
                            <div class="itm-ttl">2018 Honda CITY I-VTEC 1.5</div>
                            <div class="itm-label"><span class="number">43,599</span> km | Automatic</div>
                            <div class="itm-price">RM <span class="number">56,800</span></div>
                            <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                        </div>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm-w">
                        <div class="bimg-w">
                            <div class="bimg bg-cover carimage" ></div> 
                        </div>
                        <div class="txt-w">
                            <div class="itm-ttl">2018 Honda CITY I-VTEC 1.5</div>
                            <div class="itm-label"><span class="number">43,599</span> km | Automatic</div>
                            <div class="itm-price">RM <span class="number">56,800</span></div>
                            <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                        </div>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm-w">
                        <div class="bimg-w">
                            <div class="bimg bg-cover carimage" ></div> 
                        </div>
                        <div class="txt-w">
                            <div class="itm-ttl">2018 Honda CITY I-VTEC 1.5</div>
                            <div class="itm-label"><span class="number">43,599</span> km | Automatic</div>
                            <div class="itm-price">RM <span class="number">56,800</span></div>
                            <div class="itm-inst">RM <span class="number">1,192</span>/mo</div>
                        </div>
                    </div>
                </div> ';
        }
    }
}
$MNC['7500'] = new MNC7500();