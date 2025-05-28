<?php

require_once 'controller/auth.php';
checkLoggedIn();
class Maincontroller {
    public function showMainPage() {
        include '../views/Main.php';
    }
}