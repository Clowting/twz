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

    <title>TWZ - Tentamen overizcht</title>

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
                    <small>Overzicht</small> <a href="tentamen_add.php" role="button" class="btn btn-outline btn-primary align-right">Toevoegen</a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Opleiding</th>
                                    <th>Naam</th>
                                    <th>Aantal surveillanten</th>
                                    <th>Datum</th>
                                    <th>Begin tijd</th>
                                    <th>Eind tijd</th>
                                    <th>Bewerken</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $dataManager->join("Opleiding o", "o.ID=t.OpleidingID", "LEFT");
                                    $dataManager->orderBy('o.Naam', 'ASC');
                                    $dataManager->orderBy('t.Dag', 'ASC');
                                    $dataManager->orderBy('t.BeginTijd', 'ASC');
                                    $dataManager->orderBy('t.EindTijd', 'ASC');
                                    $tentames = $dataManager->get('Tentamen t', null, 'o.Naam AS Opleiding, t.Naam AS Tentamen, t.ID AS TentamenID, t.Opmerking, t.Aantal, t.Dag, t.BeginTijd, t.EindTijd');

                                    foreach($tentames as $tentamen) {

                                        $dag = new DateTime($tentamen['Dag']);
                                        $datum = $dag->format('d-m-Y');

                                        $begin = new DateTime($tentamen['BeginTijd']);
                                        $beginTijd = $begin->format('H:i');

                                        $eind = new DateTime($tentamen['EindTijd']);
                                        $eindTijd = $eind->format('H:i');

                                        echo '<tr>';
                                            echo '<td>' . $tentamen['Opleiding'] . '</td>';
                                            echo '<td>' . $tentamen['Tentamen'] . '</td>';
                                            echo '<td>' . $tentamen['Aantal'] . '</td>';
                                            echo '<td>' . $datum . '</td>';
                                            echo '<td>' . $beginTijd . '</td>';
                                            echo '<td>' . $eindTijd . '</td>';
                                            echo '<td><a href="tentamen_edit.php?id=' . $tentamen['TentamenID'] . '" class="btn btn-outline btn-primary">Bewerken</a></td>';
                                            echo '<td><a href="timetable_details.php?id=' . $tentamen['TentamenID'] . '" class="btn btn-outline btn-success">Details</a></td>';
                                        echo '</tr>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel -->
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
