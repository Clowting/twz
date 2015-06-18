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
if($dagdeel == 'ochtend') {
    $sql = "INSERT INTO Beschikbaarheid (SurveillantID, Datum, Ochtend)
                VALUES('".$surveillant."','".$date."','".$isChecked."')
                ON DUPLICATE KEY UPDATE ochtend='".$isChecked."'";
    $dataManager->rawQuery($sql);
    echo 'success';
}
else if($dagdeel == 'middag'){
    $sql = "INSERT INTO Beschikbaarheid (SurveillantID, Datum, Middag)
                VALUES('".$surveillant."','".$date."','".$isChecked."')
                ON DUPLICATE KEY UPDATE middag='".$isChecked."'";
    $dataManager->rawQuery($sql);
    echo 'success';
}
else if($dagdeel == 'avond'){
    $sql = "INSERT INTO Beschikbaarheid (SurveillantID, Datum, Avond)
                VALUES('".$surveillant."','".$date."','".$isChecked."')
                ON DUPLICATE KEY UPDATE avond='".$isChecked."'";
    $dataManager->rawQuery($sql);
    echo 'success';
}
else{
    echo 'fail';
}
?>