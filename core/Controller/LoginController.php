<?php

namespace Core\Controller;

use Core\Template\Template;

class LoginController {
    public function index() {
        Template::render("user/login.html");
    }
}