<?php

namespace App\Core;

class View
{
    public function generate($contentView, $data = null, $templateView = null)
    {
        if (is_array($data)) {
            extract($data);
        }

        if (isset($templateView)) {
            include 'app/views/' . $templateView . '.php';
        } else {
            include 'app/views/' . $contentView . '.php';
        }
    }
}
