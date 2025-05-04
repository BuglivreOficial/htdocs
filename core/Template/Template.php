<?php

namespace Core\Template;

use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Loader\LoaderInterface;

class Template
{

    public static function render($template, $data = array())
    {

        try {
            $loader = new FilesystemLoader('./layout');

            $options = [];
            if (PRODUCTION_MODE == true) {
                $options['cache'] = './public/cache';
            }
            $twig = new Environment($loader, $options);

            echo $twig->render($template, $data);

        } catch (Exception $e) {

        }
    }
}