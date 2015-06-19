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

    <title>TWZ - Rooster</title>

    <?php include_once "../includes/head.php"; ?>

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php"; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rooster
                    <small>Overzicht</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">

            <form role="form" method="post">
                <div class="form-group col-md-10">
                    <label for="week">Week:</label>
                    <select name="week" class="form-control">
                    <?php
                        $tentamenweken = $dataManager->rawQuery('SELECT DISTINCT Week FROM Tentamen ORDER BY Week ASC');

                        foreach($tentamenweken as $tentamenweek) {
                            echo '<option value="' . $tentamenweek['Week'] . '">Week ' . $tentamenweek['Week'] . '</option>';
                        }
                    ?>
                    </select>
                </div>
                <label for="submit">Verstuur</label>
                <button type="submit" class="btn btn-default col-md-2">Bekijken</button>
            </form>

        </div>
        <div class="row">

            <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $week = cleanInput($_POST['week']);
                    if(validateInput($week, 1, 2)) {

            ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Data &#9660;</th>
                            <th>Maandag</th>
                            <th>Dinsdag</th>
                            <th>Woensdag</th>
                            <th>Donderdag</th>
                            <th>Vrijdag</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $dataManager->join("TentamenSurveillant ts", "t.ID=ts.TentamenID", "LEFT");

                        $dataManager->where('Week', $week);

                        $dataManager->orderBy('Dag', 'ASC');
                        $dataManager->orderBy('BeginTijd', 'ASC');
                        $dataManager->orderBy('EindTijd', 'ASC');
                        $dataManager->groupBy('ID');

                        $tentamens= $dataManager->get('Tentamen t', null,
                            't.*, COUNT(ts.SurveillantID) AS AantalSurveillantenToegewezen'
                        );

                        foreach($tentamens as $tentamen) {
                            $datum = new DateTime($tentamen['Dag']);
                            $dag = $datum->format('D');

                            $beginTijd = new DateTime($tentamen['BeginTijd']);
                            $beginTijd = $beginTijd->format('H:i');

                            $eindTijd = new DateTime($tentamen['EindTijd']);
                            $eindTijd = $eindTijd->format('H:i');

                            $buttonClassState = '';

                            if($tentamen['Aantal'] == $tentamen['AantalSurveillantenToegewezen']) {
                                $buttonClassState = 'btn-success';
                            }
                            else if($tentamen['Aantal'] > $tentamen['AantalSurveillantenToegewezen']) {
                                $buttonClassState = 'btn-warning';
                            }
                            else {
                                $buttonClassState = 'btn-danger';
                            }

                            echo '<tr>';

                            switch($dag) {
                                case 'Mon':
                                    echo '<td>' . $beginTijd . '-' . $eindTijd . '</td>';
                                    echo '<td colspan="5"><a href="timetable_details.php?id=' . $tentamen['ID'] . '" class="btn btn-outline ' . $buttonClassState . '">' . $tentamen['Naam'] . '</a></td>';
                                    break;
                                case 'Tue':
                                    echo '<td colspan="2">' . $beginTijd . '-' . $eindTijd . '</td>';
                                    echo '<td colspan="4"><a href="timetable_details.php?id=' . $tentamen['ID'] . '" class="btn btn-outline ' . $buttonClassState . '">' . $tentamen['Naam'] . '</a></td>';
                                    break;
                                case 'Wed':
                                    echo '<td colspan="3">' . $beginTijd . '-' . $eindTijd . '</td>';
                                    echo '<td colspan="3"><a href="timetable_details.php?id=' . $tentamen['ID'] . '" class="btn btn-outline ' . $buttonClassState . '">' . $tentamen['Naam'] . '</a></td>';
                                    break;
                                case 'Thu':
                                    echo '<td colspan="4">' . $beginTijd . '-' . $eindTijd . '</td>';
                                    echo '<td colspan="2"><a href="timetable_details.php?id=' . $tentamen['ID'] . '" class="btn btn-outline ' . $buttonClassState . '">' . $tentamen['Naam'] . '</a></td>';
                                    break;
                                case 'Fri':
                                    echo '<td colspan="5">' . $beginTijd . '-' . $eindTijd . '</td>';
                                    echo '<td><a href="timetable_details.php?id=' . $tentamen['ID'] . '" class="btn btn-outline ' . $buttonClassState . '">' . $tentamen['Naam'] . '</a></td>';
                                    break;
                            }

                            echo '</tr>';

                        }

                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->

            <?php
                    }
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
