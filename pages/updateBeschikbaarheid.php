<?php
//Connect met de database
require_once '../lib/connectdb.php';

//Ophalen Post variabelen
$isChecked = $_POST['isChecked'];

if($isChecked == 'true'){
    $isChecked = 1;
} else {
    $isChecked = 0;
}
$idarray = explode("-",$_POST['id']);
$dagdeel = $idarray[0];
$surveillant = $idarray[1];
$date = $_POST['date'];

$values = array(
    $surveillant, $date, $isChecked, $isChecked
);

if($dagdeel == 'ochtend') {
    $sql = "INSERT INTO Beschikbaarheid (SurveillantID, Datum, Ochtend)
                VALUES(?,?,?)
                ON DUPLICATE KEY UPDATE ochtend = ?";
    $dataManager->rawQuery($sql, $values);
    echo 'success';
}
else if($dagdeel == 'middag'){
    $sql = "INSERT INTO Beschikbaarheid (SurveillantID, Datum, Ochtend)
                VALUES(?,?,?)
                ON DUPLICATE KEY UPDATE middag = ?";
    $dataManager->rawQuery($sql, $values);
    echo 'success';
}
else if($dagdeel == 'avond'){
    $sql = "INSERT INTO Beschikbaarheid (SurveillantID, Datum, Ochtend)
                VALUES(?,?,?)
                ON DUPLICATE KEY UPDATE avond = ?";
    $dataManager->rawQuery($sql, $values);
    echo 'success';
}
else{
    echo 'fail';
}