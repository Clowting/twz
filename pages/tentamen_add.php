<?php
require_once '../lib/connectdb.php';
require_once '../lib/functions.php';
require_once '../lib/requireAuth.php';
require_once '../lib/requireSession.php';
require_once '../lib/requireAdmin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>TWZ - Tentamen toevoegen</title>

    <?php include_once "../includes/head.php" ?>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tentamens
                    <small>Toevoegen</small> <a href="tentamen.php" role="button" class="btn btn-primary align-right">Overzicht</a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-body">

                    <?php

                        if($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $opleiding = cleanInput($_POST['opleiding']);
                            $naam = cleanInput($_POST['naam']);
                            $opmerking = cleanInput($_POST['opmerking']);
                            $aantal = cleanInput($_POST['aantal']);
                            $dag = cleanInput($_POST['datum']);
                            $beginTijd = cleanInput($_POST['begintijd']);
                            $eindTijd = cleanInput($_POST['eindtijd']);

                            $datum = new DateTime($dag);

                            $week = $datum->format("W");
                            $dag = $datum->format("Y-m-d");

                            if (validateNumber($opleiding, 1, 2147483647) &&
                                validateInput($naam, 2, 128) &&
                                validateNumber($aantal, 1, 127) &&
                                validateDate($dag, 'Y-m-d') &&
                                validateInput($beginTijd, 4, 5) &&
                                validateInput($eindTijd, 4, 5)
                            ) {

                                $data = array(
                                    "OpleidingID" => $opleiding,
                                    "Naam" => $naam,
                                    "Aantal" => $aantal,
                                    "Dag" => $dag,
                                    "Week" => $week,
                                    "BeginTijd" => $beginTijd,
                                    "EindTijd" => $eindTijd
                                );

                                if(validateInput($opmerking, 2, 2048)) {
                                    $data['Opmerking'] = $opmerking;
                                }

                                $insert = $dataManager->insert('Tentamen', $data);

                                if($insert) {
                                    echo '<div class="alert alert-success" role="alert">Het tentamen is succesvol toegevoegd.</div>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Er ging iets fout bij het toevoegen van het tentamen aan de database.</div>';
                                }

                            } else {
                                echo '<div class="alert alert-warning" role="alert">Niet alle velden zijn juist ingevoerd.</div>';
                            }
                        }

                    ?>

                        <form role="form" method="post" id="tentamen-add">
                            <div class="form-group">
                                <label for="opleiding">Opleiding:</label>
                                <select name="opleiding" multiple class="form-control">
                                <?php
                                    $academies = $dataManager->get('Opleiding');

                                    foreach($academies as $academie) {
                                        echo '<option value="' . $academie['ID'] . '">' . $academie['Naam'] . '</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="naam">Naam:</label>
                                <input type="text" class="form-control" name="naam" id="naam" <?php getTextFieldValue('naam'); ?>>
                            </div>
                            <div class="form-group">
                                <label for="opmerking">Opmerking:</label>
                                <textarea class="form-control" rows="3" name="opmerking" id="opmerking"><?php getTextAreaValue('opmerking'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="aantal">Aantal surveillanten:</label>
                                <input type="number" class="form-control" name="aantal" id="aantal" <?php getTextFieldValue('aantal'); ?>>
                            </div>
                            <div class="form-group">
                                <label for="datum">Datum:</label>
                                <input type="text" class="form-control date-field" name="datum" id="datum" <?php getTextFieldValue('datum'); ?>>
                            </div>
                            <div class="form-group">
                                <label for="begintijd">Begin tijd:</label>
                                <input type="time" class="form-control" name="begintijd" id="begintijd" <?php getTextFieldValue('begintijd'); ?>>
                            </div>
                            <div class="form-group">
                                <label for="eindtijd">Eind tijd:</label>
                                <input type="time" class="form-control" name="eindtijd" id="eindtijd" <?php getTextFieldValue('eindtijd'); ?>>
                            </div>
                            <button type="submit" class="btn btn-default">Toevoegen</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 hidden-sm hidden-xs">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Extra informatie
                    </div>
                    <div class="panel-body">
                        <big>Voeg een tentamen toe aan het systeem.</big>
                        <ul>
                            <li>De <b>opleiding</b> waarvoor het tentamen wordt gegeven.</li>
                            <li>De <b>'naam'</b> en eventuele <b>opmerkingen</b> over het tentamen.</li>
                            <li>Het <b>aantal</b> surveillanten wat moet surveilleren bij het tentamen.</li>
                            <li>De <b>datum</b> met begin- en eindtijd van het tentamen.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once "../includes/footer.php"; ?>

</body>

</html>
