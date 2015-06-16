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
    <?php include "../includes/nav.php";
    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Surveillanten <small>Bewerken</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <?php
                if(!isset($_GET['id'])){
                echo "<div class='alert alert-danger'>";
                    echo 'Foutieve data meegestuurd.';
                    echo "</div>";
                }
                else {
                $id = $_GET['id'];
                $dataManager->where("id", $id);
                $surveillant = $dataManager->getOne('Surveillant');

                ?>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="surveillant.php" method="post">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="werknemerid">Werknemernummer</label>
                                <input name="werknemerid" type="number" class="form-control" placeholder="<?php echo $surveillant['WerknemerID'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="voornaam">Voornaam</label>
                                <input name="voornaam" type="text" class="form-control" aria-required="true" placeholder="<?php echo $surveillant['Voornaam'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="tussenvoegsel">Tussenvoegsel</label>
                                <input name="tussenvoegsel" type="text" class="form-control" placeholder="<?php echo $surveillant['Tussenvoegsel'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="achternaam">Achternaam</label>
                                <input name="achternaam" type="text" class="form-control" aria-required="true" placeholder="<?php echo $surveillant['Achternaam'] ;?>">
                            </div>

                            <h3>Persoonlijk account</h3>
                            <div class="form-group">
                                <label>Account aanmaken</label>
                                <input name="account" type="checkbox">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="email" type="email" class="form-control" placeholder="naam@provider.nl">
                            </div>
                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </form>
                    </div>
                <?php }?>
                    <!-- /.panel-body -->
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
