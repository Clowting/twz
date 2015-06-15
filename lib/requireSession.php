<?php
include("../PHPAuth/languages/en.php");
include("../PHPAuth/config.class.php");
include("../PHPAuth/auth.class.php");

$dbh = new PDO("mysql:host=clowting.me;dbname=twz", "twz", "Fun3nHeD@T9teM6M");

$config = new Config($dbh);
$auth = new Auth($dbh, $config, $lang);

if(!isset($_COOKIE[$config->cookie_name]) || !$auth->checkSession($_COOKIE[$config->cookie_name])) {
    header('HTTP/1.0 403 Forbidden');
    echo "Forbidden";

    exit();
}
