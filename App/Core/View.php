<?php

namespace App\Core;

class View
{
    public function render($template, $pageData = [])
    {
        $templatePath =   'App/Views/' . $template . '.php';

        ob_start();
        ob_implicit_flush(0);
        require_once $templatePath;
        $view = ob_get_clean();
        return $view;

    }
}
