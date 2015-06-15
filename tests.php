<?php
/**
 * Created by PhpStorm.
 * User: Thijs
 * Date: 15-6-2015
 * Time: 16:24
 */
include("PHPAuth/languages/en.php");
include("PHPAuth/config.class.php");
include("PHPAuth/auth.class.php");

$dbh = new PDO("mysql:host=clowting.me;dbname=twz", "twz", "Fun3nHeD@T9teM6M");

$config = new Config($dbh);
$auth = new Auth($dbh, $config, $lang);

$auth->register("thijs@clowting.me", "Yolo", "Yolo");