<?php

    // SELECT / DROP DOWN

    function form_generate_select($title, $name, $optionsArr, $classes='', $default='', $emessage='', $ctatext='Select'){
        $opt = '';
        $caret = url('img/interface/arrow-red-down.png');
        foreach ($optionsArr as $key => $value) {
            if(is_array($value)){
                $value[1] = empty($value[1]) ? $value[0] : $value[1];

                $opt .= '<li data-mslug="'.$value[0].'" data-hfield="hidden-'.$name.'" data-meta="'.@$value[2].'">'.$value[1].'</li>';
            } else {
                $opt .= '<li data-mslug="'.$value.'" data-hfield="hidden-'.$name.'">'.$value.'</li>';
            }

        }

        $selectid = 'selectid-'.rand(1000,1000000);
        $mandatory = empty($emessage) ? '': '<span style="color:red;"> * </span>';
        $label = empty($title) ? '' : '<label class="field-title">'.$title.$mandatory.'</label>';

        return '<li class=" '.$classes.' input-'.$name.'">
                    '.$label.'
                    <div class="outline-drop ">
                        <div class="dropdown-select" data-toggle="'.$selectid.'">
                            <div class="dropdown-box"><span class="btn select-copy">'.$ctatext.'</span>   <span class="caret"><img src="'.$caret.'" alt=""></span></div>
                            <ul class="dropdown-menu" data-toggle="'.$selectid.'" style="display: none;">
                                '.$opt.'
                            </ul>
                        </div>
                    </div>
                    <input type="hidden" class="hidden-'.$name.'" name="'.$name.'" >
                    <div class="emessage">'.@$emessage.'</div>
                </li>';



    }

    // RADIO

    function form_generate_radio($title, $name, $optionsArr, $classes='', $default='', $emessage='error message'){
        $opt = '';
        foreach ($optionsArr as $key => $value) {
            $opt .= '<input type="radio" name="'.$name.'" id="'.$name.$key.'" value="'.$value[0].'"><label class="radiolabel" for="'.$name.$key.'">'.$value[1].'</label>';
        }
        return '<li class="  '.$classes.'">
                    <label class="field-title">'.$title.'</label>
                    '.$opt.'
                    <div class="emessage">'.@$emessage.'</div>
                </li>';
    }

    // TEXTFIELD

    function form_generate_text($title, $name, $classes='', $default='', $placeholder='', $emessage='', $disabled=''){
        $mandatory = empty($emessage) ? '': '<span style="color:red;"> * </span>';
        $label = empty($title) ? '' : '<label class="field-title">'.$title.$mandatory.'</label>';
        $type = strpos($name,'email') ? 'email' : 'text';
        $type = ($type == 'text' && ($name=='phone' || $name=='mobile' || strpos($name,'phone') || strpos($name,'tel'))) ? 'tel' : 'text';

        $hiddeninput = '';
        if(!empty($disabled)){
            $hiddeninput = '<input class="hidden-'. $name .'" type="hidden" name="'.$name.'">';
        }

        return '<li class="input-'. $name .' error-- '.$classes.'">
                    '.$label.'
                    <input type="'.$type.'" name="'.$name.'" value="'.$default.'" placeholder="'.$placeholder.'" '.$disabled.' data-emsg="'.$emessage.'">
                    <div class="emessage"></div>'.$hiddeninput.'
                </li>';
    }

    // TEXT AREA

    function form_generate_textarea($title, $name, $classes='', $default='', $placeholder='', $emessage=''){
        $mandatory = empty($emessage) ? '': '<span style="color:red;"> * </span>';
        $label = empty($title) ? '' : '<label class="field-title">'.$title.$mandatory.'</label>';

        return '<li class="input-'. $name .' '.$classes.'">
                    '.$label.'
                    <textarea name="'.$name.'" class="" maxlength="1000" size="1000" autocomplete="off" placeholder="'.$placeholder.'"  data-emsg="'.$emessage.'">'.$default.'</textarea>
                    <div class="emessage"></div>
                </li>';
    }


    // H4

    function form_generate_h4($label, $with_dropdown=true){
        if(!$with_dropdown) {
            return '<h4>'.$label.'</h4>';
        }
        return '<h4 class="collapsible expanded">'.$label.' <img class="arrow" src="/img/interface/arrow-red-down.png" alt=""></h4>';
    }

    // BUTTON

    function form_generate_button($label, $classes='', $href='', $type='black' ){

        return '
            <a href="'.$href.'" class="prime-cta-'.$type.' '.$classes.'">
                    <span>'.$label.'</span>
                    <div class="overlay"></div>
                </a>
                ';
    }

    // CHECKBOX

    function form_generate_checkbox($icon='', $title, $name, $classes='', $default='no', $emessage=''){

        $cbdefault = '';
        if($default=='yes' || $default=='checked'){
            $cbdefault = ' checked="checked" ';
        }

        return '<li class="input-'.$name.'  '.$classes.'">
                    <input id="ccb-'.$name.'" type="checkbox" name="'.$name.'" '.$cbdefault.'><label class="checkboxlabel" for="ccb-'.$name.'">'.$icon.$title.'</label>
                    <div class="emessage">'.@$emessage.'</div>
                </li>';
    }

    // CHECKBOX ARRAY

    function form_generate_checkbox_array($title, $name, $data='', $default='', $emessage=''){

        if(is_array($name)){
            return '!! $name is array. -> ';
        }



        $item = '';
        foreach($data as $d){
            $cbdefault = '';
            if($default==$d[0]){
                $cbdefault = ' checked="checked" ';
            }

            $item .= '
                        <div class="holder">
                        <input id="ccb-'.$name.$d[0].'" type="checkbox" name="'.$name.'[]" '.$cbdefault.' value="'.$d[0].'">
                        <label class="checkboxlabel" for="ccb-'.$name.$d[0].'">'.$d[1].'</label>
                        </div>';
        }

        return '<li class="input-'.$name.'  '.@$classes.'">
                    <label class="field-title">'.$title.'</label>
                    <div class="cb-options">'.$item.'</div>
                    <div class="emessage">'.@$emessage.'</div>
                </li>';
    }


?>
