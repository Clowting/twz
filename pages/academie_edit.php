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
<?php include_once "../includes/nav.php"; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Opleidingen/Academies
                    <small>Bewerken</small></h1>
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
                    $academie = $dataManager->getOne('Opleiding');

                    ?>
                    <div class="col-lg-12">
                        <form action="academie.php" method="post">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $id ; ?>">
                            <div class="form-group">
                                <label for="naam">Nieuwe naam voor de academie/opleiding</label>
                                <?php echo'<input name="naam" class="form-control" aria-required="true" placeholder="'. $academie["Naam"] .'">'?>

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

<?php include_once "../includes/footer.php"; ?>

</body>

</html>
