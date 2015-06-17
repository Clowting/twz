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
                    echo "<div class='alert alert-danger'>";
                    echo '<h2>Selecteer een academie op de vorige pagina</h2>';
                    echo '</div>';
                    exit;
                }
                if(isset($_GET['id'])&& !isset($_GET['confirm'])) {

                echo "<div class='alert alert-danger'>";
                echo "<h2>Weet u zeker dat u deze academie wilt verwijderen?</h2>";
                ?>
            </div>
            <form action='academie.php' method='get' style="float: left">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="action" value="delete">
                <br />
                <button type='submit' class='btn btn-success btn-circle btn-xl'><i class='fa fa-check'></i>
                </button></form>

            <form action="academie.php"">
            <br />
            <button type='submit' class='btn btn-danger btn-circle btn-xl'><i class='fa fa-times'></i>
            </button></form>
            <?php
            }
            if(isset($_GET['id'])&& isset($_GET['confirm'])) {

                $sid = $_GET['id'];
                $dataManager->where("ID", $sid);
                if ($dataManager->delete('Surveillant'))
                    echo "<div class='alert alert-success'>";
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

<?php include_once "../includes/footer.php"; ?>

</body>

</html>
