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

                                <i>TWZ</i> verzorgt de externe surveillanten voor de <a href="http://hz.nl">HZ University of Applied Sciences</a> te Vlissingen.
                                Deze webapplicatie is bedoeld voor werknemers van <i>TWZ</i> en de surveillanten die zij inplant voor het surveilleren van de tentamens.
                                <?php if(!hasSession($config,$auth)){?>Als u een surveillant of medewerker van <i>TWZ</i> bent, log dan in op de site via de onderstaande knop.<?php }else{ ?>
                                    Nu U ingelogd bent kunt U in het linker menu uw zaken regelen.<?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4"> <br />
                                <?php if(!hasSession($config,$auth)){?>
                                    <a href="login.php" class="btn btn-lg btn-primary btn-block"><i class="fa fa-key fa-fw"></i> Naar de loginpagina</a>
                                <?php }else{ ?>
                                    <button class="btn btn-lg btn-success btn-block"><i class="fa fa-check fa-fw"></i>U bent Ingelogd</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <?php if(isset($user) && isAdmin($user)){echo'
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Surveillanten</div>
                            </div>
                        </div>
                    </div>
                    <a href="surveillant.php">
                        <div class="panel-footer">
                            <span class="pull-left">Surveillanten</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-university fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Opleidingen</div>
                            </div>
                        </div>
                    </div>
                    <a href="academie.php">
                        <div class="panel-footer">
                            <span class="pull-left">Surveillanten</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Tentamens</div>
                            </div>
                        </div>
                    </div>
                    <a href="tentamen.php">
                        <div class="panel-footer">
                            <span class="pull-left">Tentamens</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Roosters</div>
                            </div>
                        </div>
                    </div>
                    <a href="timetable.php">
                        <div class="panel-footer">
                            <span class="pull-left">Roosters</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        '; } if(isset($user) && isUser($user)){echo '
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Beschikbaarheid</div>
                            </div>
                        </div>
                    </div>
                    <form action="availability.php" method="POST">
                        <input type="hidden" name="id" value="'.$sid["ID"].'" />
                        <a href="#" onclick="this.parentNode.submit()">
                            <div class="panel-footer">
                                <span class="pull-left">Beschikbaarheid</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Mijn Rooster</div>
                            </div>
                        </div>
                    </div>
                    <form action="my_timetable.php" method="POST">
                        <input type="hidden" name="id" value="'.$sid["ID"].'" />
                        <input type="hidden" name="week" value="NULL" />
                        <a href="#" onclick="this.parentNode.submit()">
                            <div class="panel-footer">
                                <span class="pull-left">Mijn Rooster</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </div>

'; } ?>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include_once "../includes/footer.php"; ?>

</body>

</html>
