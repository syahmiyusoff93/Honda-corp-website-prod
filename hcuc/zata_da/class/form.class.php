<?php
if(!class_exists('FORM')){
    class FORM {
        public function st($CON,$D,$formid){
            if(!empty($D['validation'])){
                $validation = [];
                $q = "SELECT * FROM col WHERE col_fuid='$formid';";
                $res = $CON->query($q);
                while($info = $res->fetch_object()){
                    $j = json_decode($info->col_json, true);
                    if(!empty($j[$D['id']])){
                        array_push($validation, $j[$D['id']]);
                    }
                }
                $validation=json_encode($validation,true);
            }
            $string=empty($D['string'])?'':",string:'$D[string]'";
            
            $validation=empty($validation)?'':"<script>const data$D[id] = $validation; validateInput({feldid:'$D[id]',formid:'$formid',data:data$D[id]$string});</script>";
            return '<input type="text" name="'.$D['id'].'" '.$D['required'].'>'.$validation;
        }
        public function cb($CON,$D,$formid){
            $LIS='';
            for($i=0;$i<count($D['lis']);$i++){
                if(!empty($D['lis'][$i])){
                    $LIS.='<input type="checkbox" name="'.$D['id'].'[]" '.$D['required'].' value="'.htmlspecialchars($D['lis'][$i]).'"><label for="">'.htmlspecialchars($D['lis'][$i]).'</label>';
                }
            }  return $LIS;
        }
        public function mc($CON,$D,$formid){
            $LIS='';
            for($i=0;$i<count($D['lis']);$i++){
                if(!empty($D['lis'][$i])){
                    $LIS.='<input type="radio" name="'.$D['id'].'" '.$D['required'].' value="'.htmlspecialchars($D['lis'][$i]).'"><label for="">'.htmlspecialchars($D['lis'][$i]).'</label>';
                }
            }  return $LIS;
        }
        public function at($CON,$D,$formid){
            return '<input type="file" name="'.$D['id'].'" '.$D['required'].'>';
        }
        public function no($CON,$D,$formid){
            if(!empty($D['price'])){
                return '<input type="number" name="'.$D['id'].'" '.$D['required'].' step="0.01" price/>';
            }else{
                return '<input type="number" name="'.$D['id'].'" '.$D['required'].' step="0.01">';
            }
        }
        public function em($CON,$D,$formid){
            $mailto='';
            if(!empty($D['incharge']))
                $mailto='<input class="d-none" type="text" name="mailto[]" value="'.$D['id'].'">';
            
            return '<input type="email" name="'.$D['id'].'" '.$D['required'].'>'.$mailto;
        }
        public function ad($CON,$D,$formid){
            $LIS='';
            $placeholder = ['Line 1', 'Line 2', 'City', 'Postcode'];
            if(!empty($D['country']))
                $placeholder = ['Line 1', 'Line 2', 'City', 'Country', 'Postcode'];
            for($i=0;$i<count($placeholder);$i++){
                if($placeholder[$i] == 'Line 2'){
                    $LIS.='<input type="text" name="'.$D['id'].'[]" placeholder="'.$placeholder[$i].'">';
                }else{
                   $LIS.='<input type="text" name="'.$D['id'].'[]" '.$D['required'].' placeholder="'.$placeholder[$i].'">'; 
                }
            } return $LIS;
        }
        public function dd($CON,$D,$formid){
            $LIS='<option class="d-none" value="">Please Select</option>';
            for($i=0;$i<count($D['lis']);$i++){
                if(!empty($D['lis'][$i]))
                    $LIS.='<option type="checkbox" value="'.htmlspecialchars(str_replace('/','',$D['lis'][$i])).'">'.htmlspecialchars(str_replace('/','',$D['lis'][$i])).'</option>';
                
            }  return '<select '.$D['required'].' name="'.$D['id'].'">'.$LIS.'</select>';
        }
        public function dt($CON,$D,$formid){
            $time='';$col = '';
            
            if(!empty($D['current'])) {
                if(!empty($D['time']))
                $time = '<div>Time</div><input readonly type="text" value="'.date("h:i a").'" name="'.$D['id'].'[]" '.$D['required'].'>';
                
                return '<input readonly type="text" value="'.date("Y-m-d").'" name="'.$D['id'].'[]" '.$D['required'].'>'.$time;
            }else{
                if(!empty($D['time']))
                $time = '<div>Time (Example: 10:20 AM)</div><input type="time" name="'.$D['id'].'[]" '.$D['required'].'>';
                
                return '<input type="text" datum name="'.$D['id'].'[]" '.$D['required'].'>'.$time;
            }
            
        }
        //FOLDER INFO GENERATOR
        public function formField($CON,$D,$formid){
            $D['required'] = empty($D['required'])?'':'required'; $LIS='';
            switch($D['typ']){
                case "st":
                    return $this->st($CON,$D,$formid);
                    break;
                case "cb":
                    return $this->cb($CON,$D,$formid);
                    break;
                case "mc":
                    return $this->mc($CON,$D,$formid);
                    break;
                case "at":
                    return $this->at($CON,$D,$formid);
                    break;
                case "no":
                    return $this->no($CON,$D,$formid);
                    break;
                case "em":
                    return $this->em($CON,$D,$formid);
                    break;
                case "ad":
                    return $this->ad($CON,$D,$formid);
                    break;
                case "dd":
                    return $this->dd($CON,$D,$formid);
                    break;
                case "dt":
                    return $this->dt($CON,$D,$formid);
                    break;
                default:
                    return '<p>Unknown</p>';
                     break;
            }
        }
    }
}

$FORM = new FORM();