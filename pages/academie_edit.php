<?php
require_once '../lib/connectdb.php';
require_once '../lib/functions.php';
require_once '../lib/requireAuth.php';
//require_once '../lib/requireSession.php';
//require_once '../lib/requireAdmin.php';
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

    <title>TWZ - Academiebeheer</title>

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
<?php include_once "../includes/nav.php"; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bewerken</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <?php
                if(!isset($_GET['id'])){
                            echo "<div class='alert alert-danger'>";
                            echo 'Foutieve data meegestuurd.';
                            echo "</div>";
                        }
                else {
                    $id = $_GET['id'];
                    $dataManager->where("id", $id);
                    $academies = $dataManager->get('Opleiding');

                    ?>
                    <div class="col-lg-12">
                        <form action="academie.php" method="post">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $id ; ?>">
                            <div class="form-group">
                                <label for="naam">Nieuwe naam voor de academie/opleiding</label>
                                <?php foreach ($academies as $academie) {
                                echo '<input name="naam" class="form-control" aria-required="true" placeholder="'. $academie["Naam"] .'">';
                                }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Bewerken</button>
                        </form>
                    </div>
                <?php
                }
                ?>
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