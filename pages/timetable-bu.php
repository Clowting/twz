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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Data &#9660;</th>
                                        <?php
                                            $academies = $dataManager->get('Opleiding');

                                            foreach($academies as $academie) {
                                                echo '<th>' . $academie['Naam'] . '</th>';
                                            }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $dataManager->orderBy('Dag', 'ASC');
                                    $dataManager->orderBy('BeginTijd', 'ASC');
                                    $dataManager->orderBy('EindTijd', 'ASC');
                                    $tentamens = $dataManager->get('Tentamen');

                                    foreach($tentamens as $tentamen) {

                                        $dag = new DateTime($tentamen['Dag']);
                                        $dag = $dag->format('d-m-Y');

                                        $beginTijd = new DateTime($tentamen['BeginTijd']);
                                        $beginTijd = $beginTijd->format('H:i');

                                        $eindTijd = new DateTime($tentamen['EindTijd']);
                                        $eindTijd = $eindTijd->format('H:i');

                                        if(!isset($nieuweDag) || $dag != $nieuweDag) {
                                            echo '<tr><td colspan="' . (count($academies) + 1) . '"><strong>' . $dag . '</strong></td></tr>';
                                        }

                                        echo '<tr>';
                                            echo '<td>' . $beginTijd . '-' . $eindTijd . '</td>';

                                        echo '</tr>';

                                        $nieuweDag = $dag;
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
