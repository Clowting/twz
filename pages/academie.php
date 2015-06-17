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
    <?php include "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Opleidingen/Academies
                    <small>Overzicht</small> <a href="academie_create.php" role="button" class="btn btn-primary align-right">Toevoegen</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">

            <?php

            //if(isset($_GET['id'])) {
            //    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            //        $sid = $_GET['id'];
            //        $dataManager->where("ID", $sid);
            //        if ($dataManager->delete('Opleiding'))
            //            echo "<div class='alert alert-success'>";
            //        echo 'Succesvol verwijderd.';
            //        echo "</div>";
            //    }
            //}
            if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                if (isset($_POST) && $_POST['action'] == 'create') {
                    $data = array();
                    $opleidingnaam = cleanInput($_POST['naam']);
                    if (validateInput($opleidingnaam, 1, 128)) {
                        $data['naam'] = $opleidingnaam;
                        if ($dataManager->insert('Opleiding', $data)) {
                            echo "<div class='alert alert-success'>";
                            echo 'Succesvol aangemaakt.';
                            echo "</div>";
                        } else {
                            echo "<div class='alert alert-danger'>";
                            echo 'Fout bij het toevoegen aan de database.';
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning>";
                        echo 'Foutieve data meegestuurd.';
                        echo "</div>";
                    }
                }
                if(isset($_POST['action']) && $_POST['action'] == 'edit') {
                    $data = array();
                    $id = $_POST['id'];
                    $opleidingnaam = cleanInput($_POST['naam']);
                    if (validateInput($opleidingnaam, 1, 128)) {
                        $data['naam'] = $opleidingnaam;
                        $dataManager->where('ID', $id);
                        if ($dataManager->update('Opleiding', $data)) {
                            echo "<div class='alert alert-success'>";
                            echo 'Succesvol aangepast.';
                            echo "</div>";
                        } else {
                            echo "<div class='alert alert-danger'>";
                            echo 'Fout bij het toevoegen aan de database.';
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning>";
                        echo 'Foutieve data meegestuurd.';
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Academie</th>
                                    <th style="text-align: right;">Bewerken</th>
                                    <!--<th>Verwijderen</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $academies = $dataManager->get('Opleiding');
                                if ($dataManager->count > 0)
                                    foreach ($academies as $academie) {
                                        echo '<tr>';
                                        echo '<td>' . $academie["ID"] . '</td>';
                                        echo '<td>' .  $academie["Naam"] . '</td>';

                                        ?>
                                        <td style="text-align: right;">
                                            <form action="academie_edit.php" method="get">
                                                <input type="hidden" name="id" value="<?php echo $academie["ID"]; ?>">
                                                <button type="submit" class="btn btn-primary">Bewerken</button>
                                            </form>
                                        </td>
                                        <td>
                                            <!--<form action="academie_delete.php" method="get">
                                                <input type="hidden" name="id" value="<?php echo $academie["ID"]; ?>">
                                                <button type="submit" class="btn btn-danger">Verwijderen</button>
                                            </form>-->
                                        </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
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
