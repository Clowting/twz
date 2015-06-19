<?php
require_once '../lib/connectdb.php';
require_once '../lib/functions.php';
require_once '../lib/requireAuth.php';
require_once '../lib/requireSession.php';
require_once '../lib/requireAdmin.php';

//Ophalen Post variabelen
$sid = cleanInput($_POST['sid']);
$tid = cleanInput($_POST['tid']);

$dataManager->where('SurveillantID', $sid);
$dataManager->where('TentamenID', $tid);
$delete = $dataManager->delete('TentamenSurveillant');

if($delete) {
    echo 'success';
} else {
    echo 'fail';
}