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

    <title>TWZ - Surveillantenbeheer</title>

    <?php include_once "../includes/head.php"; ?>

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php"; ?>

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
            <div class="col-lg-9">
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
                            <h3>Persoonlijke gegevens</h3>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="uid" value="<?php echo $surveillant['GebruikerID'] ;?>">
                            <div class="form-group">
                                <label for="werknemerid">Werknemernummer</label>
                                <input name="werknemerid" type="number" class="form-control" value="<?php echo $surveillant['WerknemerID'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="voornaam">Voornaam</label>
                                <input name="voornaam" type="text" class="form-control" aria-required="true" value="<?php echo $surveillant['Voornaam'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="tussenvoegsel">Tussenvoegsel</label>
                                <input name="tussenvoegsel" type="text" class="form-control" value="<?php echo $surveillant['Tussenvoegsel'] ;?>">
                            </div>
                            <div class="form-group">
                                <label for="achternaam">Achternaam</label>
                                <input name="achternaam" type="text" class="form-control" aria-required="true" value="<?php echo $surveillant['Achternaam'] ;?>">
                            </div>

                            <h3>Persoonlijk account</h3>
                            <div class="form-group">
                                <input name="account" type="checkbox">
                                <label>Account aanpassen of aanmaken</label>

                            </div>
                            <?php $dataManager->where("id", $surveillant['GebruikerID']);
                            $users = $dataManager->getOne('users');?>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="email" type="text" class="form-control" value="<?php echo $users['email'] ;?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Aanpassen</button>
                        </form>
                    </div>
                <?php }?>
                    <!-- /.panel-body -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-3 hidden-sm hidden-xs">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Extra informatie
                    </div>
                    <div class="panel-body">
                        <big>Bewerk een surveillant.</big>
                        <ul>
                            <li>het <b>werknemernummer</b> uit de salarisadministratie.</li>
                            <li><b>Voornaam</b> en <b>Achternaam</b> zijn verplichte velden.</li>
                            <li>Om meteen ook een gebruikersaccount aan te maken of te bewerken voor de surveillant check je <br /><input type="checkbox" checked disabled> <b>Account aanpassen of aanmaken</b> en voer je het emailadres van de surveillant in. <i>(Voer hier een geldig emailadres in!)</i></li>
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
