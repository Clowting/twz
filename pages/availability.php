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

    <title>TWZ - beschikbaarheid</title>

    <?php include_once "../includes/head.php"; ?>

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php"; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Surveilleren
                    <small>Beschikbaarheid</small>
                </h1>
                <?php
                if(isset($_POST['id'])){
                ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <?php
            $tentamenweken = $dataManager->rawQuery('SELECT DISTINCT Week FROM Tentamen');
            ?>
            <div class="col-md-6">
                <form action="availability.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
                    <div class="form-group">
                        <label >Selecteer een week</label>
                        <select class="form-control" name="week" onchange="form.submit()">
                            <option value="NULL">Selecteer een week</option>
                            <?php foreach($tentamenweken as $tentamenweek){
                                $w = $tentamenweek['Week'];
                                echo '<option value="'.$w.'"';
                                if(isset($_POST['week'])&& $_POST['week']==$w) {echo'selected';} echo'> Week '.$w.' </option>';
                            } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <?php if(isset($_POST['week'])&& $_POST['week'] != "NULL") {
        $date = new DateTime();
        $year = $date->format("Y")?>
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>O/M/A</th>
                                    <th>Maandag</th>
                                    <th>Dinsdag</th>
                                    <th>Woensdag</th>
                                    <th>Donderdag</th>
                                    <th>Vrijdag</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        Ochtend
                                    </th>
                                    <?php for ($day = 1; $day <= 5; $day++) {
                                     $date->setISODate($year, $_POST['week'], $day);?>
                                        <td><input type="checkbox" name="<?php echo $date->format('Y-m-d') ?>" value="ochtend-<?php echo $_POST['id'] ?>"></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th>
                                        Middag
                                    </th>
                                    <?php for ($day = 1; $day <= 5; $day++) {
                                        $date->setISODate($year, $_POST['week'], $day);?>
                                        <td><input type="checkbox" name="<?php echo $date->format('Y-m-d') ?>" value="middag-<?php echo $_POST['id'] ?>"></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th>
                                        Avond
                                    </th>
                                    <?php for ($day = 1; $day <= 5; $day++) {
                                        $date->setISODate($year, $_POST['week'], $day);?>
                                        <td><input type="checkbox" name="<?php echo $date->format('Y-m-d') ?>" value="avond-<?php echo $_POST['id'] ?>"></td>
                                    <?php } ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.panel -->

            </div>
            <!-- /.col-lg-9 -->
            <div class="col-lg-3 hidden-sm hidden-xs">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Extra informatie
                    </div>
                    <div class="panel-body">
                        <big>Geef uw beschikbaarheid op per week</big>
                        <ul>
                            <li>Selecteer een <b>week</b> waarin tentamens gegeven worden.</li>
                            <li>Geef per dag aan of u in de <b>ochtend, middag </b>en/of<b> avond</b> beschikbaar bent.</li>
                            <li>Aan de hand van deze informatie zal een rooster opgesteld worden door <i>TWZ</i>.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }}else {
                echo'<div class="alert alert-danger" role="alert"><b>Oeps!</b> Er is iets fout gegaan bij het selecteren van de surveillant.</div>';
            }?>
        </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once "../includes/footer.php"; ?>
</body>
<script src="../javascripts/ischecked.js"></script>
</html>
