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

    <title>TWZ - Surveillant toevoegen</title>

    <?php include_once "../includes/head.php"; ?>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Surveillanten
                    <small>Toevoegen</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="surveillant.php" method="post">
                        <input type="hidden" name="action" value="create">
                        <div class="form-group">
                            <label for="werknemerid">Werknemernummer</label>
                            <input name="werknemerid" type="number" class="form-control" placeholder="Werknemernummer">
                        </div>
                        <div class="form-group">
                            <label for="voornaam">Voornaam</label>
                            <input name="voornaam" type="text" class="form-control" aria-required="true" placeholder="Voornaam">
                        </div>
                        <div class="form-group">
                            <label for="tussenvoegsel">Tussenvoegsel</label>
                            <input name="tussenvoegsel" type="text" class="form-control" placeholder="Tussenvoegsel">
                        </div>
                        <div class="form-group">
                            <label for="achternaam">Achternaam</label>
                            <input name="achternaam" type="text" class="form-control" aria-required="true" placeholder="Achternaam">
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
                <!-- /.panel-body -->
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
