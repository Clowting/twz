<?php
require_once '../lib/connectdb.php';
require_once '../lib/functions.php';
require_once '../lib/requireAuth.php';
require_once '../lib/hasSession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>TWZ - Hoofdpagina</title>

    <?php include_once "../includes/head.php" ?>

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <b>Contactgegevens van The Work Zone(<i>TWZ</i>).</b><br /> <br />
                                Edisonweg 51-A<br />
                                Postbus 87<br />
                                4380 AB Vlissingen<br />
                                Telefoonnummer: 0118-479207<br />
                                Faxnummer: 0118-465963<br />
                                Emailadres: post@twz.nl<br />
                                KvK: 22041643<br />
                                <br />
                                Mocht u vragen hebben naar aanleiding van uw bezoek aan onze website, dan kunt u deze middels onderstaand formulier aan ons stellen.<br />
                                Bijvoorbaat dank voor uw belangstelling!
                                <br /><br />
                                <b>Uw gegevens: </b><br /><br />
                                <form>
                                    <div class="form-group">
                                        <label>Uw naam</label>
                                        <input name="vraagnaam" type="text" class="form-control" aria-required="true" placeholder="Uw naam">
                                    </div>
                                    <div class="form-group">
                                        <label>Uw e-mailadres</label>
                                        <input name="vraagmail" type="text" class="form-control" aria-required="true" placeholder="Uw e-mailadres">
                                    </div>
                                    <div class="form-group">
                                        <label>Uw vraag of opmerking</label>
                                        <textarea name="vraag" rows="5" class="form-control" placeholder="Uw vraag"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Verzenden</button>
                                </form>
                               </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include_once "../includes/footer.php"; ?>

</body>

</html>
