<?php
if(!class_exists('MNC7200')){
    class MNC7200 extends INFOEXT{
        public function fieldGroup() {
            $disp = [0=>'', 1=>''];
            
            return '<div class="fieldgroup">
            <div class="field">
                <label>Search</label>
                <input type="text" name="search">
            </div>
            <div class="field">
                <label>Year</label>
                <select name="year">
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                </select>
            </div>
            <div class="field">
                <label>Model</label>
                <select name="Model">
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                </select>
            </div>
            <div class="field">
                <label>Body Type</label>
                <select name="Body Type">
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                </select>
            </div>
            <div class="field">
                <label>Mileage</label>
                <select name="Mileage">
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                </select>
            </div>
            <div class="field">
                <label>Price</label>
                <select name="Price">
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                </select>
            </div>
        </div>'; 
            
        }
        public function databasexxx($CON, $folder, $json = false) {   
            $DATA = [];
    
            $res = $CON->query("SELECT * FROM car WHERE _status='1' ORDER BY _featured DESC, id;"); 
    
            if($json){
                while( $info = $res->fetch_assoc() ){
                    $loc = $info['_location'];

                    $stmt = $CON->stmt_init();
                    $stmt -> prepare("SELECT * FROM lists WHERE id=?;");
                    $stmt -> bind_param("s", $loc);
                    $stmt -> execute();
                    $resDealer = $stmt -> get_result();

                    $dealer = $resDealer -> fetch_assoc(); 

                    $info['_location'] = $dealer['list_title'];
                    $info['lat'] = $dealer['list_coordslat'];
                    $info['lng'] = $dealer['list_coordslong'];
                    $info['_price'] = $this->floatString($info['_price']);   
                    $info['_mileage'] = $this->floatString($info['_mileage']); 
                    $info['_manufacturingYr'] = $this->floatString($info['_manufacturingYr']); 
                    array_push($DATA, $info);
                }
                return json_encode($DATA, true);
            }else{
                return $res;
             }   
        }

        public function options($CON, $folder) {
            $optionsYr = $optionsModel = $optionBy 
            = $optionLoc = $optionMileage = $optionBrand 
            = '';  
            $years = $models = $bodys = $locs = $mileages = $brands = [];
            $furuiDosi = [];
            
            $res = $this->databasexxx($CON, $folder); 
            while($info = $res->fetch_assoc()){ 
                $loc_ = $info['_location'];

                $stmt = $CON->stmt_init();
                $stmt -> prepare("SELECT * FROM lists WHERE id=?;");
                $stmt -> bind_param("s", $loc_);
                $stmt -> execute();
                $resDealer = $stmt -> get_result();

                while( $dealer = $resDealer -> fetch_assoc()){ 
                    $info['_location'] = $dealer['list_title'];
                }


                // if( !empty($info['_manufacturingYr']) )
                //     $years[$info['_manufacturingYr']] = '';
                if( !empty($info['_model']) )
                    $models[strtoupper($info['_model'])] = '';
                    // $models[$info['_model']] = '';
                if( !empty($info['_bodyType']) )
                    $bodys[strtoupper($info['_bodyType'])] = '';
                    // $bodys[$info['_bodyType']] = '';
                if( !empty($info['_location']) )
                    $locs[$info['_location']] = '';
                // if( !empty($info['_mileage']) )
                //     $mileages[$info['_mileage']] = ''; 

                if( isset($info['_manufacturingYr']) ){
                    array_push($furuiDosi, $info['_manufacturingYr']);
                }
            }   

            // krsort( $years );
            // foreach( $years as $year => $k ){
            //     $optionsYr .= '<div class="cus-drop" da-val="'.htmlspecialchars($year) .'">
            //         <div>'.$year.'</div>
            //     </div>'; 
            // }
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
                // $stmt = $CON->stmt_init();
                // $stmt -> prepare("SELECT * FROM lists WHERE id=?;");
                // $stmt -> bind_param("s", $loc);
                // $stmt -> execute();
                // $res = $stmt -> get_result();

                // $dealer = $res -> fetch_assoc(); 

                $optionLoc .= '<div class="cus-drop" da-val="'.htmlspecialchars($loc) .'">
                    <div>'.$loc.'</div>
                </div>'; 
            }
            // ksort( $mileages );
            // foreach( $mileages as $mileage => $k ){
            //     $optionMileage .= '<div class="cus-drop" da-val="'.htmlspecialchars($mileage) .'">
            //         <div>'.$mileage.'</div>
            //     </div>'; 
            // }

            $hiddenBck = ' <div class="col-12 col-sm-6 col-lg-12"> 
                <div class="field uis-w" num-format="comma">
                    <div class="wrap">
                        <label>Mileage (km)</label>
                        <div class="slider-range-wrap">
                            <div class="range-correspond f">
                                <div> <input class="inp-min" step="1" type="number"/> </div> 
                                <div> </div> 
                                <div>  <input class="inp-max" step="1" type="number"/> </div> 
                            </div>

                            <input type="text" name="mileR" hidden />
                            <div class="slider-range"></div>
                            <div class="wrap f f-j-sb">
                                <span class="min-range">0</span>
                                <span class="max-range">213144</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    
            return '
                <form>
                    <div class="row"> 
                        <div class="col-12 col-sm-6 col-lg-12"> 
                            <div class="field">
                                <label>Quick Search</label> 
                                <div class="inp-such-w"> 
                                    <i class="fas fa-search"></i>
                                    <input type="text" name="search" class="such-ipt anderes"> 
                                    <div class="wrap">
                                    <div class="cus-drop-main">
                                        <div class="cus-drop-w drop-search">

                                        </div>
                                    </div> 
                                </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-12 col-sm-6 col-lg-12"> 
                            <div class="field">
                                <label>Dealer</label>
                                <div class="input-w">
                                    <input type="text" value="All" name="_location" xrequired="" readonly="">
                                    <i class="fas fa-chevron-down inp-i"></i>
                                </div>
                                <div class="wrap">
                                    <div class="cus-drop-main">
                                        <div class="cus-drop-w"> 
                                            '.$optionLoc.'
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                        <div class="col-12 col-sm-6 col-lg-12"> 
                            <div class="field">
                                <label>Model</label>
                                <div class="input-w">
                                    <input type="text" value="All" name="_model" xrequired="" readonly="">
                                    <i class="fas fa-chevron-down inp-i"></i>
                                </div>
                                <div class="wrap">
                                    <div class="cus-drop-main">
                                        <div class="cus-drop-w"> 
                                            '.$optionsModel.'
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                        <div class="col-12 col-sm-6 col-lg-12"> 
                            <div class="field">
                                <label>Body Type</label>
                                <div class="input-w">
                                    <input type="text" value="All" name="_bodyType" xrequired="" readonly="">
                                    <i class="fas fa-chevron-down inp-i"></i>
                                </div>
                                <div class="wrap">
                                    <div class="cus-drop-main">
                                        <div class="cus-drop-w"> 
                                            '.$optionBy.'
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                           
                        <div class="col-12 col-sm-6 col-lg-12"> 
                            <div class="field">
                            <div class="wrap">
                                <div class="sort-main">
                                    <div class="sort-w">
                                        <div class="sort"> 
                                            <div class="input-w anderes btnSort"> 
                                                <div class="wrap">Sort <i class="fas fa-sort-amount-down-alt"></i></div> 
                                                <i class="fas fa-chevron-down inp-i"></i>
                                            </div>                                           
                                            <div class="wrap">
                                                <div class="sortdrop-w">
                                                    <div class="sortdrop" sort-it="p_lh">Price: Low to High</div>
                                                    <div class="sortdrop" sort-it="p_hl">Price: High to Low</div> 
                                                    <div class="sortdrop" sort-it="m_lh">Mileage: Low to High</div>
                                                    <div class="sortdrop" sort-it="m_hl">Mileage: High to Low</div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12"> 
                            <div class="field uis-w" num-format="comma">
                                <div class="wrap">
                                    <label>Price (RM)</label>
                                    <div class="slider-range-wrap">
                                        <div class="range-correspond f">
                                            <div> <input class="inp-min" step="1" type="number"/> </div> 
                                            <div> </div> 
                                            <div>  <input class="inp-max" step="1" type="number"/> </div> 
                                        </div>

                                        <input type="text" name="priceR" hidden />
                                        <div class="slider-range"></div>
                                        <div class="wrap f f-j-sb">
                                            <span class="min-range">0</span>
                                            <span class="max-range">280000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <div class="col-12 col-sm-6 col-lg-12"> 
                            <div class="field uis-w" >
                                <div class="wrap">
                                    <label>Years</label>
                                    <div class="slider-range-wrap">
                                        <div class="range-correspond f">
                                            <div> <input class="inp-min" step="1" type="number"/> </div> 
                                            <div> </div> 
                                            <div>  <input class="inp-max" step="1" type="number"/> </div> 
                                        </div>

                                        <input type="text" name="yearsR" hidden /> 
                                        <div class="slider-range"></div>
                                        <div class="wrap f f-j-sb">
                                            <span class="min-range">'.(min($furuiDosi) ? min($furuiDosi) : '2015').'</span>
                                            <span class="max-range">'.(max($furuiDosi) ? (date('Y'))  : (date('Y')) ).'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 



                    </div>
                </form>
                ';
        } 
        public function jsonCar($CON, $folder) {   
            $JSON = 'zata_da/json/car.json';
            $JSON = file_get_contents($JSON);
            $JSON = json_decode($JSON, true); 

            return json_encode($JSON['variance'], true);
        } 
        public function redirectGrid($CON, $folder, $class='') { 
            $res_m = $this->getInfo($CON,$folder,['fid','i', '1', '6']);
            $tmp='';

            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']);
                
                $tmp .= '<div class="cat">
                    <div class="wrap cont-before" xhref="'.htmlspecialchars($item['link']['redir']).'">
                        <div class="cat-w">
                            <div class="bimg-w"><div style="-webkit-mask-image: url('.$item['bgurl'].'); mask-image: url('.$item['bgurl'].')" class="bimg bg-cover "></div></div>
                            <div class="cat-txt">'.$item['title'].'</div> 
                        </div>
                    </div>
                </div>';
            } 
            return '<div class="cats '.$class.'">
                <div class="cats-w f f-j-c">  
                    '.$tmp.' 
                </div>
            </div>';
        }
        public function redirectGridBtm( ) { 
            $DATA = [
                0 => ['04', 'Loan Calculator'],
                1 => ['05', 'Buy'],
                2 => ['06', 'Sell'],
                3 => ['02', 'Buying Guide'],
                4 => ['03', 'Selling Guide'],
                5 => ['01', 'Find a Dealer']
            ];
            $tmp = '';
            foreach($DATA as $key=>$val) {
                $tmp .= '<div class="cat">
                    <div class="wrap">
                        <div class="cat-w">
                            <div class="bimg-w"><div class="bimg bg-cover catimg-'.$val[0].'"></div></div>
                            <div class="cat-txt">'.$val[1].'</div>
                        </div>
                    </div>
                </div>';
            }
          return '<div class="cats btm">
          <div class="cats-w f">  
              '.$tmp.' 
          </div>
          </div>';
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
$MNC['7200'] = new MNC7200();
