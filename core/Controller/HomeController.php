<?php

namespace Core\Controller;

use Core\Template\Template;


class HomeController {

    public function index() {
        Template::render("user/home.html", [
            "title" => "Bug Livre Oficial"
        ]);
    }
}