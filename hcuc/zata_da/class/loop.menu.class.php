<?php
if(!class_exists('MENU')){
class MENU {
    
    public function pageMenu($con) {
        $q = 'SELECT * FROM lists WHERE list_fid = "0" AND list_status="1" ORDER BY list_priority;';
        
        $disp = array(0=>'');
        $res = $con->query($q);
        
        while($info = $res->fetch_object()){
            if(!in_array($info->list_module, MENUhide)){
                $id = $info->id; //id of main page
                $subMenu = $this->pageSubMenu($id, $con);
                $disp[0] .= '<li><a href="?pid='.$info->id.'" da-mn="'.$info->list_module.'">'.$info->list_title.'</a>
                               '.$subMenu[0].' 
                            </li>';
            }
        }
        
        return $disp;
    }
    
    public function pageSubMenu($id, $con) {
        $disp = array(0=>'');
        
        if(!empty($id)){
            $q = '
            SELECT * FROM lists WHERE list_fid = "'.$id.'" AND list_status = "1"
            ORDER BY list_priority
            ;';
            $res = $con->query($q);
            while($info = $res->fetch_object()){
                $mod = $info->list_module;
                
                if(in_array($mod, MENUcore)){
                    $id = $info->id;
                    $subMenu = $this->pageSubMenu($id, $con);
                    $disp[0] .= '<li>
                                    <a href="?pid='.$info->id.'" da-mn="'.$info->list_module.'">'.$info->list_title.'</a>
                                    '.$subMenu[0].' 
                                 </li>
                                 ';
                }
             }

            $disp[0] = empty($disp[0])?'':'<ul>'.$disp[0].'</ul>';
        }
        
        return $disp;
    }
    
    //================================
    
    public function sideMenu ($folderid, $con) {
        $q = 'SELECT * FROM lists WHERE list_fid = "'.$folderid.'" AND list_status = "1"
                ORDER BY list_priority;';

        $disp = array(0=>'');
        $res = $con->query($q);

        while($info = $res->fetch_object()){
            $id = empty($info->id)?'':$info->id;
            $subMenu = $this->sideSubMenu($id, $con);
            $disp[0] .= '<li><a display-id="'.$info->id.'" da-mn="'.$info->list_module.'">'.$info->list_title.'</a>
                           '.$subMenu[0].' 
                        </li>';
        };

        return $disp;
    }

     public function sideSubMenu($id, $con) {
        $disp = array(0=>'');

         if(!empty($id)){
            $q = '
            SELECT * FROM lists WHERE list_fid = "'.$id.'" AND list_status = "1"
            ORDER BY list_priority
            ;';

            $res = $con->query($q);
            while($info = $res->fetch_object()){
                $id = empty($info->id)?'':$info->id;
                $subMenu = $this->sideSubMenu($id, $con);
                $disp[0] .= '<li><a display-id="'.$info->id.'" da-mn="'.$info->list_module.'">'.$info->list_title.'</a>
                               '.$subMenu[0].' 
                            </li>';
            };

            $disp[0] = empty($disp[0])?'':'<ul>'.$disp[0].'</ul>';
         }

        return $disp;
     }
    
    //================================
    
    public function cusPageMenu ($id, $con) {
        $q = "SELECT * FROM lists WHERE list_fid = '$id' AND list_status='1' ORDER BY list_priority;";
        
        $disp = array(0=>'');
        $res = $con->query($q);
        
        while($info = $res->fetch_object()){
            if(!in_array($info->list_module, MENUhide)){
                $id = $info->id; //id of main page
                $subMenu = $this->pageSubMenu($id, $con);
                $disp[0] .= '<li><a href="?pid='.$info->id.'" da-mn="'.$info->list_module.'">'.$info->list_title.'</a>
                               '.$subMenu[0].' 
                            </li>';
            }
        }
        
        return $disp;
    }
    
    //================================
    
    public function menuItemList ($id, $con) {
        $disp = array(0=>'');

         if(!empty($id)){
            $q = '
            SELECT * FROM lists WHERE list_fid = "'.$id.'" AND list_status = "1"
            ORDER BY list_priority
            ;';

            $res = $con->query($q);
            while($info = $res->fetch_object()){
                $id = empty($info->id)?'':$info->id;
                $dive = $this->menuItemList($id, $con);
                
                if($info->list_type === 'i'){
                    $disp[0] .= '<div iid-list="'.$id.'"></div>';
                }
                
                $disp[0] .= $dive[0];
            };

            $disp[0] = empty($disp[0])?'':$disp[0];
         }

        return $disp;
     }

}
}


$menu = new MENU;