<?php
if(!class_exists('MNC7201')){
class MNC7201 extends INFOEXT{
    public function database($CON, $folder, $json = false) {   
        $DATA = [];

        $res = $CON->query("SELECT * FROM car;"); 

        if($json){
            while($info = $res->fetch_assoc()){
                array_push($DATA, $info);
            }
            return json_encode($DATA, true);
        }else{
            return $res;
         }   
    } 
    public function jsonCar($CON, $folder) {   
        $JSON = 'zata_da/json/car.json';
        $JSON = file_get_contents($JSON);
        $JSON = json_decode($JSON, true); 

        return json_encode($JSON['variance'], true);
    } 
    public function options($CON, $folder) {
        $optionsYr = $optionsModel = $optionBy = $optionLoc = $optionMileage = $optionBrand = '';  
        $years = $models = $bodys = $locs = $mileages = $brands = [];
        
        $res = $this->database($CON, $folder); 
        while($info = $res->fetch_assoc()){
            if( !empty($info['_manufacturingYr']) )
                $years[$info['_manufacturingYr']] = '';
            if( !empty($info['_model']) )
                $models[$info['_model']] = '';
            if( !empty($info['_bodyType']) )
                $bodys[$info['_bodyType']] = '';
            if( !empty($info['_location']) )
                $locs[$info['_location']] = '';
            if( !empty($info['_mileage']) )
                $mileages[$info['_mileage']] = ''; 
        }  

        krsort( $years );
        foreach( $years as $year => $k ){
            $optionsYr .= '<div class="cus-drop" da-val="'.htmlspecialchars($year) .'">
                <div>'.$year.'</div>
            </div>'; 
        }
        ksort( $models );
        foreach( $models as $model => $k ){
            $optionsModel .= '<div class="cus-drop" da-val="'.htmlspecialchars($model) .'">
                <div>'.$model.'</div>
            </div>'; 
        }
        ksort( $bodys );
        foreach( $bodys as $body => $k ){
            $optionBy .= '<div class="cus-drop" da-val="'.htmlspecialchars($body) .'">
                <div>'.$body.'</div>
            </div>'; 
        }
        ksort( $locs );
        foreach( $locs as $loc => $k ){
            $optionLoc .= '<div class="cus-drop" da-val="'.htmlspecialchars($loc) .'">
                <div>'.$loc.'</div>
            </div>'; 
        }
        ksort( $mileages );
        foreach( $mileages as $mileage => $k ){
            $optionMileage .= '<div class="cus-drop" da-val="'.htmlspecialchars($mileage) .'">
                <div>'.$mileage.'</div>
            </div>'; 
        }

        return '
            <form>
                <div class="row">
                    
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="field">
                            <label>Body Type</label>
                            <input type="text" name="_manufacturingYr" xrequired="" readonly="">
                            <div class="wrap">
                                <div class="cus-drop-main">
                                    <div class="cus-drop-w"> 
                                        '.$optionsYr.'
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4"> 
                        <div class="field">
                            <label>Model</label>
                            <input type="text" name="_model" xrequired="" readonly="">
                            <div class="wrap">
                                <div class="cus-drop-main">
                                    <div class="cus-drop-w"> 
                                        '.$optionsModel.'
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-12 col-sm-6 col-md-4"> 
                        <div class="field">
                            <label>Body Type</label>
                            <input type="text" name="_bodyType" xrequired="" readonly="">
                            <div class="wrap">
                                <div class="cus-drop-main">
                                    <div class="cus-drop-w"> 
                                        '.$optionBy.'
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-12 col-sm-6 col-md-4"> 
                        <div class="field">
                            <label>Locations</label>
                            <input type="text" name="_location" xrequired="" readonly="">
                            <div class="wrap">
                                <div class="cus-drop-main">
                                    <div class="cus-drop-w"> 
                                        '.$optionLoc.'
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>  
                    <div class="col-12 col-sm-6 col-md-4"> 
                        <div class="field">
                            <label>Mileage</label>
                            <input type="text" name="_mileage" xrequired="" readonly="">
                            <div class="wrap">
                                <div class="cus-drop-main">
                                    <div class="cus-drop-w"> 
                                        '.$optionMileage.'
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>   
                </div>
            </form>
            ';
    }

    public function itmList(){ 
        return '<div class="itms">
        <div class="itms-w f">

            <div class="itm">
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
            </div>

        </div>
        </div>';
    }
}
}
$MNC['7201'] = new MNC7201();