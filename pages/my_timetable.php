<?php
require_once '../lib/connectdb.php';
require_once '../lib/functions.php';
require_once '../lib/requireAuth.php';
require_once '../lib/requireSession.php';
require_once '../lib/requireUser.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>TWZ - Rooster</title>

    <?php include_once "../includes/head.php"; ?>

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once "../includes/nav.php";
    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rooster
                    <small>Mijn Rooster</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <?php
            if(isset($_POST['id']) && is_numeric($_POST['id']) && checkUser($dataManager, $user, $_POST['id'])) {
            $tentamenweken = $dataManager->rawQuery('SELECT DISTINCT Week FROM Tentamen ORDER BY Week ASC');
            ?>
            <div class="col-md-6">
                <form action="my_timetable.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
                    <div class="form-group">
                        <label >Selecteer een week</label>
                        <select class="form-control" name="week" onchange="form.submit()">
                            <option value="NULL">Selecteer een week</option>
                            <?php
                            foreach($tentamenweken as $tentamenweek) {
                                $w = $tentamenweek['Week'];

                                if(isset($_POST['week']) && $_POST['week'] == $w) {
                                    echo '<option value="' . $w . '" selected>Week ' . $w . '</option>';
                                } else {
                                    echo '<option value="' . $w . '">Week ' . $w . '</option>';
                                }

                            }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = cleanInput($_POST['id']);
                    if(validateInput($id, 1, 11)) {

                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-condensed ">
                                        <thead>
                                        <tr>
                                            <th>Maandag</th>
                                            <th>Dinsdag</th>
                                            <th>Woensdag</th>
                                            <th>Donderdag</th>
                                            <th>Vrijdag</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $dataManager->where("Week",$_POST['week']);
                                        $dataManager->where('SurveillantID', $id);
                                        $dataManager->join("Opleiding o","t.OpleidingID=o.ID", "LEFT");
                                        $dataManager->join("TentamenSurveillant s", "t.ID=s.TentamenID", "LEFT");
                                        $dataManager->orderBy('Dag', 'ASC');
                                        $dataManager->orderBy('BeginTijd', 'ASC');
                                        $dataManager->orderBy('EindTijd', 'ASC');

                                        $tentamens= $dataManager->get('Tentamen t', null, 'o.Naam AS Opleiding, t.Naam AS Tentamen, t.ID AS TentamenID, t.Opmerking, t.Dag, t.BeginTijd, t.EindTijd ');
                                        foreach($tentamens as $tentamen) {

                                            $datum = new DateTime($tentamen['Dag']);
                                            $cordate = $datum->format('d-m-Y');
                                            $dag = $datum->format('D');

                                            $beginTijd = new DateTime($tentamen['BeginTijd']);
                                            $beginTijd = $beginTijd->format('H:i');

                                            $eindTijd = new DateTime($tentamen['EindTijd']);
                                            $eindTijd = $eindTijd->format('H:i');
                                            echo '<tr>';

                                            switch($dag) {
                                                case 'Mon':;
                                                    echo '  <td colspan="5">
                                                        '.$tentamen['Opleiding'].' - '.$tentamen['Tentamen'].'<br>
                                                            '.$cordate.' | ' . $beginTijd . '-' . $eindTijd . '
                                                </td>';
                                                    break;
                                                case 'Tue':
                                                    echo '<td colspan="1"></td>';
                                                    echo '  <td colspan="4">
                                                     '.$tentamen['Opleiding'].' - '.$tentamen['Tentamen'].'<br>
                                                     '.$cordate.' | ' . $beginTijd . '-' . $eindTijd . '
                                                </td>';
                                                    break;
                                                case 'Wed':
                                                    echo '<td colspan="2"></td>';
                                                    echo '  <td colspan="3">
                                                     '.$tentamen['Opleiding'].' - '.$tentamen['Tentamen'].'<br>
                                                     '.$cordate.' | ' . $beginTijd . '-' . $eindTijd . '
                                                </td>';
                                                    break;
                                                case 'Thu':
                                                    echo '<td colspan="3"></td>';
                                                    echo '  <td colspan="2">
                                                    '.$tentamen['Opleiding'].' - '.$tentamen['Tentamen'].'<br>
                                                    '.$cordate.' | ' . $beginTijd . '-' . $eindTijd . '
                                                </td>
                                                <td></td>';
                                                    break;
                                                case 'Fri':
                                                    echo '<td colspan="4"></td>';
                                                    echo '  <td colspan="1">
                                                        '.$tentamen['Opleiding'].' - '.$tentamen['Tentamen'].'<br>
                                                           '.$cordate.' | ' . $beginTijd . '-' . $eindTijd . '
                                                </td>';
                                                    break;
                                            }

                                            echo '</tr>';

                                        }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                        </div>

                    <?php
                    }
                }
                ?>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Extra informatie
                    </div>
                    <div class="panel-body">
                        <big>Zie links uw Rooster per dag voor de geselecteerde week.</big>
                        <ul>
                            <li>Selecteer een <b>week</b> in het daarvoor bestemde menu.</li>
                            <li>De <b>tentamens</b> waar u bij gaat surveilleren staan op volgorde in de tabel.</li>
                            <li>Als u verdere vragen heeft met betrekking tot uw rooster, of andere rooster-gerelateerde zaken, aarzel dan niet om <b><a href="contact.php">contact</a></b>  met ons op te nemen.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php

            } else {
                echo'<div class="alert alert-danger" role="alert"><b>Oeps!</b> Er is iets fout gegaan bij het selecteren van de surveillant.</div>';
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
