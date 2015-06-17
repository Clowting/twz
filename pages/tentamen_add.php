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
                    <small>Toevoegen</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="opleiding">Opleiding:</label>
                                <select multiple class="form-control">
                                <?php
                                    $academies = $dataManager->get('Opleiding');

                                    foreach($academies as $academie) {
                                        echo '<option value="' . $academie['ID'] . '">' . $academie['Naam'] . '</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="naam">Naam:</label>
                                <input type="text" class="form-control" name="naam" id="naam">
                            </div>
                            <div class="form-group">
                                <label for="opmerking">Opmerking:</label>
                                <textarea class="form-control" rows="3" name="opmerking" id="opmerking"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="aantal">Aantal surveillanten:</label>
                                <input type="number" class="form-control" name="aantal" id="aantal">
                            </div>
                            <button type="submit" class="btn btn-default">Toevoegen</button>
                        </form>
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
