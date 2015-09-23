<?php
/**
 * Authentication
 * User: Thijs Clowting
 * Date: 16-6-2015
 * Time: 11:07
 */
include("../PHPAuth/languages/nl.php");
include("../PHPAuth/config.class.php");
include("../PHPAuth/auth.class.php");

$dbh = new PDO("mysql:host=localhost;dbname=twz", "root", "password");

$config = new Config($dbh);
$auth = new Auth($dbh, $config, $lang);