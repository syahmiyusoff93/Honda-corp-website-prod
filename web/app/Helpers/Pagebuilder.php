<?php
    /* PAGE BUILDER FUNCTIONS */

    function __generate_html_code($item){
        global $model_slug;
        $data = ($item->data);
        return $data->code;
    }

    function __generate_shortcode($item){
        global $model_slug;
        $data = ($item->data);
        $desc = (empty($data->caption)) ? '' : $data->caption;
        return '
            <div class="intro first">
                    <iframe src="'.url('vr/'.$model_slug.'/interior') .'" frameborder="0" width="100%" height="500"></iframe>
            </div>
        ';
    }

    function __generate_html_header($item){
        $data = ($item->data);
        $desc = (empty($data->caption)) ? '' : $data->caption;
        return '
            <div class="intro first">
                <h2>'.$data->title.'</h2>
                <div class="intro-title grey">'.$data->desc.'</div>
            </div>
        ';
    }

    function __generate_html_fullwidthimg($item){
        $data = ($item->data);
        $desc = (empty($data->caption)) ? '' : $data->caption;
        return '
            <div class="details-container">
                <div class="photo-full"><img class="lazyload" data-src="'.$data->img.'" alt=""></div>
            </div>
        ';
    }

    function __generate_html_footnote($item){
        $data = ($item->data);
        $desc = (empty($data->caption)) ? '' : $data->caption;
        return '
            <div class="stage-contained">
                    <div class="note-container">
                        <div class="note-title more">'.$data->title.'</div>
                        <div class=" expand-content" style="display: none;">
                                '.$data->desc.'
                        </div>
                    </div>
                </div>

        ';
    }

    function __generate_html_3colcards($item){
        //dd($item);
        $data = ($item->data);
        $desc = (empty($data->caption)) ? '' : $data->caption;

        $cards = '';
        foreach($item->cards as $cd){
            //dd($cd->data);
            $notes = '';
            if(!empty($cd->data->notes)){
                $notes = '<div class="body-copy center notes">'.$cd->data->notes.'</div>';
            }
            $cards .= '
                <li>
                    <div class="photo"><img class="lazyload" data-src="'.$cd->data->img.'" alt=""></div>
                    <div class="des">
                        <div class="sub-title nonbreakable-hyphens">'.$cd->data->title.'</div>
                        <div class="body-copy center nonbreakable-hyphens">'.$cd->data->caption.'</div>
                        '.$notes.'
                    </div>
                </li>';
        }
        return '

            <div class="details-container">
                <ul class="flex">
                    '.$cards.'
                </ul>
            </div>
        ';
    }
?>
