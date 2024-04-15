<?php

namespace app\core;

class View
{

    function generate($content_view, $data = null, $template_view = null)
    {
        if(is_array($data)){
            extract($data);
        }

        if(isset($template_view)){
            include 'app/views/'.$template_view .'.php';
        }else{
            include 'app/views/'.$content_view .'.php';
        }
    }
}