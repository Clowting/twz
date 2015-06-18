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
                <h1 class="page-header">Hoofdpagina</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Welkom
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                             Welkom Bij de surveillantenadministratie van The Work Zone(<i>TWZ</i>).<br /> <br />

                             <i>TWZ</i> verzorgt de externe surveillanten voor de <a href="hz.nl">HZ University of Applied Sciences</a> te Vlissingen.
                             Deze webapplicatie is bedoeld voor werknemers van <i>TWZ</i> en de surveillanten die zij inplant voor het surveilleren van de tentamens.
                             Als u een surveillant of medewerker van <i>TWZ</i> bent, log dan in op de site via de onderstaande knop.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4"> <br />
                                <a href="login.php" class="btn btn-lg btn-primary btn-block"><i class="fa fa-key fa-fw"></i> Naar de loginpagina</a>
                            </div>
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
