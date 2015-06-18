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
                <h1 class="page-header">Tentamens
                    <small>Toevoegen</small> <a href="tentamen.php" role="button" class="btn btn-primary align-right">Overzicht</a>
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
                                <label for="opleiding">Opleiding:</label>
                                <select name="opleiding" multiple class="form-control">
                                    <?php
                                    $academies = $dataManager->get('Opleiding');

                                    foreach ($academies as $academie) {

                                        if($academie['ID'] == $tentamen['OpleidingID']) {
                                            echo '<option value="' . $academie['ID'] . '" selected>' . $academie['Naam'] . '</option>';
                                        } else {
                                            echo '<option value="' . $academie['ID'] . '">' . $academie['Naam'] . '</option>';
                                        }

                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="naam">Naam:</label>
                                <input type="text" class="form-control" name="naam"
                                       id="naam" value="<?php echo $tentamen['Naam']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="opmerking">Opmerking:</label>
                                <textarea class="form-control" rows="3" name="opmerking"
                                          id="opmerking"><?php echo $tentamen['Opmerking']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="aantal">Aantal surveillanten:</label>
                                <input type="number" class="form-control" name="aantal"
                                       id="aantal" value="<?php echo $tentamen['Aantal']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="datum">Datum:</label>
                                <input type="text" class="form-control date-field" name="datum"
                                       id="datum" value="<?php echo $datum; ?>">
                            </div>
                            <div class="form-group">
                                <label for="begintijd">Begin tijd:</label>
                                <input type="time" class="form-control" name="begintijd"
                                       id="begintijd" value="<?php echo $beginTijd; ?>">
                            </div>
                            <div class="form-group">
                                <label for="eindtijd">Eind tijd:</label>
                                <input type="time" class="form-control" name="eindtijd"
                                       id="eindtijd" value="<?php echo $eindTijd; ?>">
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
