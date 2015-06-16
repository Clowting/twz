<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../lib/connectdb.php"?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Surveillantenbeheer <a href="survcreate.php" role="button" class="btn btn-primary">Toevoegen</a>
                </h1>
                <?php
                if(isset($_GET[''])){
                    $data = array();
                    $data['WerknemerID'] = sanitize_text_field($_POST['werknemerid']);
                    if (!isset($_POST['voornaam'])) {
                        $error_message[] = 'De voornaam is niet meegestuurd';
                    } else {
                        $data['Voornaam'] = sanitize_text_field($_POST['voornaam']);
                    }
                    $data['Tussenvoegsel'] = sanitize_text_field($_POST['tussenvoegsel']);
                    if (!isset($_POST['achternaam'])) {
                        $error_message[] = 'De achternaam is niet meegestuurd';
                    } else {
                        $data['Achternaam'] = sanitize_text_field($_POST['achternaam']);
                    }
                    $id = $dataManager->insert('Surveillant', $data);
                    if ($id)
                        echo 'User was created. ID=' . $id;
                }
                    ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>WerknemerID</th>
                                    <th>Voornaam</th>
                                    <th>Tussenvoegsel</th>
                                    <th>Achternaam</th>
                                    <th>Bewerken</th>
                                    <th>Verwijderen</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $surveillanten = $dataManager->get('Surveillant');
                                if ($dataManager->count > 0)
                                    foreach ($surveillanten as $surveillant) {
                                        echo '<tr>';
                                        echo '<td>' .  $surveillant["WerknemerID"] . '</td>';
                                        echo '<td>' .  $surveillant["Voornaam"] . '</td>';
                                        echo '<td>' .  $surveillant["Tussenvoegsel"] . '</td>';
                                        echo '<td>' .  $surveillant["Achternaam"] . '</td>';
                                        ?>
                                        <td>
                                            <form action="survedit.php" method="get">
                                                <button type="submit" class="btn btn-primary">Bewerken</button>
                                            </form>
                                        </td>
                                        <td>
                                        <form action="survdel.php" method="get">
                                            <input type="hidden" name="id" value="<?php echo $surveillant["ID"]; ?>">
                                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                                        </form>
                                        </td>
                                        <!--<td><a href="survdel.php?id=/">Delete</a></td>-->
                                <?php
                                        echo '</tr>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
