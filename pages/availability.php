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
                <h1 class="page-header">Surveillanten
                    <small>Overzicht</small>
                    <a href="survcreate.php" role="button" class="btn btn-primary align-right">Toevoegen</a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <?php
            $tentamenweken = $dataManager->rawQuery('SELECT DISTINCT Week FROM Tentamen');
            ?>
            <div class="col-md-6">
                <form action="availability.php" method="get">
                    <div class="form-group">
                        <label >Selecteer een week</label>
                        <select class="form-control" name="week" onchange="form.submit()">
                            <option value="NULL">Selecteer een week</option>
                            <?php foreach($tentamenweken as $tentamenweek){
                                $w = $tentamenweek['Week'];
                                echo '<option value="'.$w.'"';
                                if(isset($_GET['week'])&& $_GET['week']==$w) {echo'selected';} echo'> Week'.$w.' </option>';
                            } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <?php if(isset($_GET['week'])&& $_GET['week'] != "NULL") {
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
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week']); ?>
                                            <input type="hidden" name="periode" value="ochtend">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y') ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 2); ?>
                                            <input type="hidden" name="periode" value="ochtend">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y') ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 3); ?>
                                            <input type="hidden" name="periode" value="ochtend">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y') ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 4); ?>
                                            <input type="hidden" name="periode" value="ochtend">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 5); ?>
                                            <input type="hidden" name="periode" value="ochtend">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Middag</th>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week']); ?>
                                            <input type="hidden" name="periode" value="middag">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 2); ?>
                                            <input type="hidden" name="periode" value="middag">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 3); ?>
                                            <input type="hidden" name="periode" value="middag">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 4); ?>
                                            <input type="hidden" name="periode" value="middag">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'], 5); ?>
                                            <input type="hidden" name="periode" value="middag">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>

                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Avond</th>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week']); ?>
                                            <input type="hidden" name="periode" value="avond">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'],2); ?>
                                            <input type="hidden" name="periode" value="avond">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'],3); ?>
                                            <input type="hidden" name="periode" value="avond">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'],4); ?>
                                            <input type="hidden" name="periode" value="avond">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <?php $date->setISODate($year, $_GET['week'],5); ?>
                                            <input type="hidden" name="periode" value="avond">

                                            <input type="hidden" name="date" value="<?php echo $date->format('d-m-Y'); ?>">
                                            <label>
                                                <input type="checkbox" name="availability">
                                            </label>
                                        </form>
                                    </td>
                                </tr>
                                <tr>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.panel -->
                <?php } ?>
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
