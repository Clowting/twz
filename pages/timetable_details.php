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

    <title>TWZ - Tentamen aanpassen</title>

    <?php include_once "../includes/head.php" ?>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rooster
                    <small>Toewijzen</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">

        <?php

            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                $dataManager->where('ID', $_GET['id']);
                $tentamen = $dataManager->getOne('Tentamen');

                $dag = new DateTime($tentamen['Dag']);
                $datum = $dag->format('d-m-Y');

                $begin = new DateTime($tentamen['BeginTijd']);
                $beginTijd = $begin->format('H:i');

                $eind = new DateTime($tentamen['EindTijd']);
                $eindTijd = $eind->format('H:i');

                $ochtendBegin = new DateTime('8:45');
                $ochtendBegin = $ochtendBegin->format('H:i');

                $ochtendEind = new DateTime('13:15');
                $ochtendEind = $ochtendEind->format('H:i');

                $middagBegin = new DateTime('12:45');
                $middagBegin = $middagBegin->format('H:i');

                $middagEind = new DateTime('17:15');
                $middagEind = $middagEind->format('H:i');

                $avondBegin = new DateTime('16:45');
                $avondBegin = $avondBegin->format('H:i');

                $avondEind = new DateTime('21:15');
                $avondEind = $avondEind->format('H:i');

                ?>

            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <?php

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

                                if (validateInput($opmerking, 2, 2048)) {
                                    $data['Opmerking'] = $opmerking;
                                }

                                $dataManager->where('ID', $_GET['id']);
                                $update = $dataManager->update('Tentamen', $data);

                                if ($update) {
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
                                <label for="surveillant">Surveillant:</label>
                                <select name="surveillant" multiple class="form-control">
                                    <?php

                                    $beschikbaarheden = $dataManager->rawQuery('
                                        SELECT *
                                        FROM   Beschikbaarheid b
                                               LEFT JOIN Surveillant s
                                                      on b.SurveillantID = s.ID
                                        WHERE  (b.SurveillantID NOT IN (SELECT ts.SurveillantID
                                                                        FROM   Tentamen t
                                                                               LEFT JOIN TentamenSurveillant ts
                                                                                      on ts.TentamenID = t.ID
                                                                        WHERE  BeginTijd BETWEEN ? AND ?
                                                                               AND Dag = ?)
                                               AND b.SurveillantID NOT IN (SELECT ts.SurveillantID
                                                                            FROM   Tentamen t
                                                                                   LEFT JOIN TentamenSurveillant ts
                                                                                          on ts.TentamenID = t.ID
                                                                            WHERE  EindTijd BETWEEN ? AND ?
                                                                                   AND Dag = ?)
                                               AND b.SurveillantID NOT IN (SELECT SurveillantID
                                                                            FROM   TentamenSurveillant
                                                                            WHERE  TentamenID = ?))
                                               AND Datum = ?
                                        ORDER  BY s.Achternaam ASC
                                    ', array(
                                        $beginTijd,
                                        $eindTijd,
                                        $tentamen['Dag'],
                                        $beginTijd,
                                        $eindTijd,
                                        $tentamen['Dag'],
                                        $tentamen['ID'],
                                        $tentamen['Dag']
                                    ));

                                    print_r($dataManager->getLastQuery());

                                    print_r($beschikbaarheden);

                                    foreach ($beschikbaarheden as $beschikbaarheid) {

                                        $naam = generateName($beschikbaarheid['Voornaam'], $beschikbaarheid['Tussenvoegsel'], $beschikbaarheid['Achternaam']);

                                        if (
                                            $beschikbaarheid['Ochtend'] == '1' &&
                                            $ochtendBegin <= $beginTijd &&
                                            $eindTijd <= $ochtendEind
                                        ) {

                                            echo '<option value="' . $beschikbaarheid['ID'] . '" selected>' . $naam . '</option>';

                                        } else if (
                                            $beschikbaarheid['Middag'] == '1' &&
                                            $middagBegin <= $beginTijd &&
                                            $eindTijd <= $middagEind
                                        ) {

                                            echo '<option value="' . $beschikbaarheid['ID'] . '" selected>' . $naam . '</option>';

                                        } else if (
                                            $beschikbaarheid['Avond'] == '1' &&
                                            $avondBegin <= $beginTijd &&
                                            $eindTijd <= $avondEind
                                        ) {

                                            echo '<option value="' . $beschikbaarheid['ID'] . '" selected>' . $naam . '</option>';

                                        }

                                    }

                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Toewijzen</button>
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
        <?php
            } else {
                echo '<div class="alert alert-warning" role="alert">Het opgevraagde tentamen bestaat niet.</div>';
            }
        ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once "../includes/footer.php"; ?>

</body>

</html>
