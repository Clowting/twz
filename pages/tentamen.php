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
                    <small>Overzicht</small> <a href="tentamen_add.php" role="button" class="btn btn-primary align-right">Toevoegen</a>
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
                                        echo '<tr>';
                                            echo '<td>' . $tentamen['Opleiding'] . '</td>';
                                            echo '<td>' . $tentamen['Tentamen'] . '</td>';
                                            echo '<td>' . $tentamen['Aantal'] . '</td>';
                                            echo '<td>' . $tentamen['Dag'] . '</td>';
                                            echo '<td>' . $tentamen['BeginTijd'] . '</td>';
                                            echo '<td>' . $tentamen['EindTijd'] . '</td>';
                                            echo '<td><a href="tentamen_edit.php?id=' . $tentamen['TentamenID'] . '"><i class="fa fa-arrow-right"></i></a></td>';
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

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
