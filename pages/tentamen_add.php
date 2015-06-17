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

    <title>TWZ - Academiebeheer</title>

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
                    <small>Toevoegen</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">

                <?php

                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $w = new DateTime($_POST['datum']);
                        $week = $w->format("W");

                        $opleiding = cleanInput($_POST['opleiding']);
                        $naam = cleanInput($_POST['naam']);
                        $opmerking = cleanInput($_POST['opmerking']);
                        $aantal = cleanInput($_POST['aantal']);
                        $dag = cleanInput($_POST['datum']);
                        $beginTijd = cleanInput($_POST['begintijd']);
                        $eindTijd = cleanInput($_POST['eindtijd']);


                        if (validateNumber($opleiding, 1, 2147483647) &&
                            validateInput($naam, 2, 128) &&
                            validateInput($opmerking, 2, 2048) &&
                            validateNumber($aantal, 1, 127) &&
                            validateDate($dag, 'd-m-Y') &&
                            validateInput($achternaam, 2, 128) &&
                            validateDate($week, 'W')
                        ) {



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
                        <input type="text" class="form-control" name="naam" id="naam">
                    </div>
                    <div class="form-group">
                        <label for="opmerking">Opmerking:</label>
                        <textarea class="form-control" rows="3" name="opmerking" id="opmerking"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="aantal">Aantal surveillanten:</label>
                        <input type="number" class="form-control" name="aantal" id="aantal">
                    </div>
                    <div class="form-group">
                        <label for="datum">Datum:</label>
                        <input type="text" class="form-control date-field" name="datum" id="datum">
                    </div>
                    <div class="form-group">
                        <label for="begintijd">Begin tijd:</label>
                        <input type="time" class="form-control" name="begintijd" id="begintijd">
                    </div>
                    <div class="form-group">
                        <label for="eindtijd">Eind tijd:</label>
                        <input type="time" class="form-control" name="eindtijd" id="eindtijd">
                    </div>
                    <button type="submit" class="btn btn-default">Toevoegen</button>
                </form>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once "../includes/footer.php"; ?>

</body>

</html>
