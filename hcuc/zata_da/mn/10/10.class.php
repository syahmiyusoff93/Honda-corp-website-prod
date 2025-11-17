<?php
if(!class_exists('MNC10')){
    class MNC10 {
        //================================
        //one page sroll menu
        public function onePageMenu ($CON, $id) {
            $q = "SELECT * FROM lists WHERE list_fid = '$id' AND list_status='1' AND list_trash IS NULL ORDER BY list_priority;";

            $disp = [0=>''];
            $res = $CON->query($q);

            while($info = $res->fetch_object()){
                if(!in_array($info->list_module, MENUhide)){
                    $id = $info->id; //id of main page
                    
                    if($info->list_module === '6'){ 
                        $link = '';
                        
                        if(!empty($info->list_link)) $link = json_decode($info->list_link,true);
                        
                        if(!empty($link['redir'])) $link = $link['redir'];
                        else $link = 'unknown';
                        
                        $disp[0] .= '<li><a selector="'.htmlspecialchars($link).'" da-mn="'.$info->list_module.'">'.$info->list_title.'</a></li>';
                    }else{ 
                        $disp[0] .= '<li><a href="#'.$info->id.'" da-mn="'.$info->list_module.'">'.$info->list_title.'</a></li>';
                    }
                }
            }

            return $disp;
        }

        //===============================
        //multiple page menu
        public function hrefRedir($CON, $info, $href, $linkredir) {
            if(!empty($J=json_decode($info->list_link, true)) && $linkredir == true){
                if(!empty($J['redir'])){ $href = 'href="'.htmlspecialchars($J['redir']).'" target="_blank"'; }
            } return empty($href)?'href="?pid='.$info->id.'"':$href;
        } 
        
        public function sectionMenu($CON, $info) { $href='missmod';
            $res = $CON->query("SELECT * FROM lists WHERE list_fid='{$info->id}' ".OBLPsql." LIMIT 1;");
                                                  
            while($tmp = $res->fetch_object()){ 
                $href = 'href="?pid='.$info->list_fid.'&scrollid='.$tmp->id.'"'; 
            }
            $href = $this->hrefRedir($CON, $info, $href);
            return '<a '.$href.' da-mn="'.$info->list_module.'">'.$info->list_title.'</a>';
        }
        
        public function pageMenu($CON) {
            $q = "SELECT * FROM lists WHERE list_fid = '0' AND list_lang='$_SESSION[lang]';";
            $res = $CON->query($q);
            while($info = $res->fetch_object()){
                $id = $info->id;
            }

            $q = "SELECT * FROM lists WHERE list_fid = '$id' AND list_status='1' ORDER BY list_priority;";

            $disp = [0=>''];
            $res = $CON->query($q);

            while($info = $res->fetch_object()){
                if(!in_array($info->list_module, MENUhide) && $info->list_cleanurl != 'home'){
                    $subMenu = $this->pageSubMenu($info->id, $CON, true);
                    $href = $this->hrefRedir($CON, $info, '', true);

                    $disp[0] .= '<li><a '.$href.' da-mn="'.$info->list_module.'">'.$info->list_title.'</a>
                       '.$subMenu[0].' 
                    </li>';
                }
            }
            //$disp[0] .= '<li>'.$this->bookBtn ($id, $CON).'</li>';
            return $disp;
        }
        
        public function bookBtn ($id, $CON) {
            return '<div class="desc">
                    <div id="fb-widget-1" class="fb-widget" data-fbConfig="2"></div>
                    <script class="fb-widget-config" data-fbConfig="2" type="application/json">{"params":[{"calendar":{"firstDayOfWeek":1,"nbMonths2display":2,"title":"BOOK A ROOM","showBestPrice":true,"showLastRoom":true,"showLastRoomThreshold":5,"showChildrenAges":false,"themeDark":false,"layoutNum":2,"roomRateFiltering":0,"rateFilter":[],"roomFilter":[],"useLoyalty":false,"loyalty":"","loyaltyParams":{}},"currency":"MYR","locale":"en_GB","pricesDisplayMode":"normal","offerComputeRule":"lowerPrice","maxAdults":4,"maxChildren":3,"mainColor":"#b0a06c","themeDark":false,"openFrontInNewTab":true,"property":"myput11253","title":"Stellar Putrajaya Hotel","childrenMaxAge":12,"groupsNames":"","quicksearch":{"showChildrenAges":false},"fbWidget":"CalendarInModal"}],"commonParams":{"redirectUrl":"https://redirect.fastbooking.com/DIRECTORY/dispoprice.phtml","showPropertiesList":false,"demoMode":false},"_authCode":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzY29wZXMiOiIuKiIsInByb3BlcnRpZXMiOiJteXB1dDExMjUzIiwiZ3JvdXBzIjoiXiQiLCJmb3IiOiJCYWNrb2ZmaWNlIiwiaWF0IjoxNjA0MDUyNjU0LCJqaWQiOiI1ZjliY2E4ZTdhOWYyIn0.mdNuCq9wB4JN2ngD3lOARZTM9sU6GGDrLBeLai8eDlg","propertyIndex":0,"version":"1.39.3","baseHost":"websdk.fastbooking-services.com"}</script>
                </div>';
        }
        public function pageSubMenu($id, $CON, $linkredir) {
            $disp = [0=>''];

            if(!empty($id)){
                $res = $CON->query("SELECT * FROM lists WHERE list_fid = '$id' AND list_status = '1' ".OBLPsql.";");
                while($info = $res->fetch_object()){
                    $mod = $info->list_module;
                    if(in_array($mod, MENUcore))
                        if($mod == '5'){
                            $disp[0] .= '<li>'.$this->sectionMenu($CON, $info).'</li>';
                        }elseif($mod == '7006'){
                            $subMenu = $this->pageSubMenu($info->id, $CON, false);
                            $disp[0] = $subMenu[0];  
                        }else{
                            $subMenu = $this->pageSubMenu($info->id, $CON, true);
                            $href = $this->hrefRedir($CON, $info, '', $linkredir);
                            
                            $damn = '';
                            if($linkredir == true) 
                                $damn = 'da-mn="'.$info->list_module;
                            
                            $disp[0] .= '<li>
                                <a '.$href.' '.$damn.'">'.$info->list_title.'</a>
                                '.$subMenu[0].' 
                             </li>';
                        }
                 } 
                if (substr($disp[0],0,4) == '<li>')
                    $disp[0] = '<ul>'.$disp[0].'</ul>';
                    
                $disp[0] = empty($disp[0])?'':$disp[0];
            }

            return $disp;
        }
        
        //===============================
    }
}


$MNC['10'] = new MNC10();