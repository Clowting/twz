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

    <?php include_once "../includes/head.php"; ?>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Opleidingen/Academies
                    <small>Toevoegen</small></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-9">
                <form action="academie.php" method="post">
                    <input type="hidden" name="action" value="create">

                    <div class="form-group">
                        <label for="naam">Academie/Opleiding</label>
                        <input name="naam" class="form-control" aria-required="true" placeholder="Academie/Opleiding">
                    </div>
                    <button type="submit" class="btn btn-primary">Toevoegen</button>
                </form>
            </div>
            <div class="col-lg-3 hidden-sm hidden-xs">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Extra informatie
                    </div>
                    <div class="panel-body">
                        <big>Voeg een academie/Opleiding toe.</big>
                        <ul>
                            <li>De <b>Academie/Opleiding</b> waar de examens gehouden worden.</li>
                            <li><b>Academie/Oplieding</b> is een verplicht veld.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.row -->
    </div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once "../includes/footer.php"; ?>

</body>

</html>
