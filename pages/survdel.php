<?php
/**
 * Created by PhpStorm.
 * User: Startklaar
 * Date: 16-6-2015
 * Time: 09:49
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../lib/connectdb.php"?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Verwijderen
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">

                        <?php
                        if (!isset($_GET['id']))
                        {
                            echo 'No ID was given...';
                            exit;
                        }
                        if(isset($_GET['id'])&& !isset($_GET['confirm'])) {

                            echo "<div class='alert alert-danger'>";
                            echo "<h2>Weet u zeker dat u deze surveillant wilt verwijderen?</h2>";
                            ?>
                                    </div>
                            <form action='survdel.php' method='get' style="float: left">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <input type="hidden" name="confirm" value="true">
                                <br />
                                    <button type='submit' class='btn btn-success btn-circle btn-xl'><i class='fa fa-check'></i>
                            </button></form>

                                <form action="blank.php"">
                                    <br />
                            <button type='submit' class='btn btn-danger btn-circle btn-xl'><i class='fa fa-times'></i>
                            </button></form>
                <?php
                        }
                        if(isset($_GET['id'])&& isset($_GET['confirm'])) {

                            $sid = $_GET['id'];
                            $dataManager->where("ID", $sid);
                            if ($dataManager->delete('Surveillant'))
                                echo "<div class'alert alert-success'>";
                                echo 'Succesvol verwijderd.';
                                echo "</div>";
                            ?>
                            <form action="blank.php">
                                <button type='submit' class='btn btn-outline btn-info'>Ga terug
                                </button></form>
            <?php
                        }
                        ?>
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
