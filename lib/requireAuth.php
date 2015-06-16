<?php
/**
 * Authentication
 * User: Thijs Clowting
 * Date: 16-6-2015
 * Time: 11:07
 */
include("../PHPAuth/languages/en.php");
include("../PHPAuth/config.class.php");
include("../PHPAuth/auth.class.php");

$dbh = new PDO("mysql:host=clowting.me;dbname=twz", "twz", "Fun3nHeD@T9teM6M");

$config = new Config($dbh);
$auth = new Auth($dbh, $config, $lang);