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

    <title>TWZ - beschikbaarheid</title>

    <?php include_once "../includes/head.php"; ?>

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php"; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Surveillanten
                    <small>Overzicht</small>
                    <a href="survcreate.php" role="button" class="btn btn-primary align-right">Toevoegen</a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <?php
                $cols = Array ("Dag");
                $tentamendagen = $dataManager->rawQuery('SELECT DISTINCT Dag FROM Tentamen');

                $ddate = "2015-7-13";
                $date = new DateTime($ddate);
                $week = $date->format("W");
                $year = $date->format("Y");
                echo "Weeknummer: $week";

                $date = new DateTime();
                $year = $date->format("Y");
                $date->setISODate($year, $week);
                echo $date->format('Y-m-d');
                echo' - ';
                date_isodate_set($date, 2008, 2, 7);
                echo date_format($date, 'Y-m-d') . "\n";
                ?>
                <form action="availability.php" method="get">
                    <div class="form-group">
                        <label>Selects</label>
                        <select class="form-control" name="week" onchange="form.submit()">
                            <option>Selecteer een week</option>
                            <?php foreach($tentamendagen as $tentamendag){
                            $date = new DateTime($tentamendag->dag);
                            $week = $date->format("W");
                            $year = $date->format("Y");
                            $date->setISODate($year, $week);

                            ?>

                    </div>
                </form>

                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Maandag</th>
                                    <th>Dinsdag</th>
                                    <th>Woensdag</th>
                                    <th>Donderdag</th>
                                    <th>Vrijdag</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($tentamendagen as $tentamendag){
                                $date = new DateTime($tentamendag->dag);
                                $week = $date->format("W");?>
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
