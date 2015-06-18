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
                <h1 class="page-header">Surveillanten
                    <small>Overzicht</small>
                    <a href="survcreate.php" role="button" class="btn btn-outline btn-primary align-right">Toevoegen</a>
                </h1>
                <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['action']) && $_POST['action'] == 'create') {
                        $werknemerID = cleanInput($_POST['werknemerid']);
                        $voornaam = cleanInput($_POST['voornaam']);
                        $tussenvoegsel = cleanInput($_POST['tussenvoegsel']);
                        $achternaam = cleanInput($_POST['achternaam']);
                        $email = $_POST['email'];

                        if (validateNumber($werknemerID, 0, 2147483647) &&
                            validateInput($voornaam, 1, 128) &&
                            validateInput($achternaam, 2, 128)
                        ) {

                            $data = array(
                                "WerknemerID" => $werknemerID,
                                "Voornaam" => $voornaam,
                                "Achternaam" => $achternaam
                            );

                            if (validateInput($tussenvoegsel, 1, 16)) {
                                $data['Tussenvoegsel'] = $tussenvoegsel;
                            }

                            if (isset($_POST['account'])) {
                                $account = cleanInput($_POST['account']);
                                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $account == 'on') {
                                    $password = randomPassword();
                                    $register = $auth->register($email, $password, $password);

                                    if ($register['error'] == 0) {
                                        echo '<div class="alert alert-success" role="alert">Het account is succesvol toegevoegd. (' . $password . ')</div>';

                                        // UID ophalen om in surveillanten tabel toe te voegen.
                                        $uid = $auth->getUID($email);
                                        $data['GebruikerID'] = $uid;

                                    } else {
                                        echo '<div class="alert alert-warning" role="alert">Het account voor de surveillant kon niet worden toegevoegd. ' . $register['message'] . '</div>';
                                    }
                                }
                            }

                            $insert = $dataManager->insert('Surveillant', $data);

                            if ($insert) {
                                echo '<div class="alert alert-success" role="alert">De surveillant is succesvol toegevoegd.</div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Fout bij het toevoegen van de surveillant aan de database.</div>';
                            }

                        } else {
                            echo '<div class="alert alert-warning" role="alert">Niet alle gegevens zijn juist ingevoerd.</div>';
                        }
                    }

                    /**
                     * Inactief en actief maken van surveillanten
                     */
                    if (isset($_POST['action']) && $_POST['action'] == 'active') {
                        $data = array();
                        $id = cleanInput($_POST['id']);
                        $data['actief'] = 1;
                        $dataManager->where('ID', $id);
                        if ($dataManager->update('Surveillant', $data)) {
                            echo '<div class="alert alert-success" role="alert">De surveillant is succesvol op actief gezet.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Fout bij het aanpassen van de surveillant.</div>';
                        }

                    }

                    if (isset($_POST['action']) && $_POST['action'] == 'inactive') {
                        $data = array();
                        $id = cleanInput($_POST['id']);
                        $data['actief'] = 0;
                        $dataManager->where('ID', $id);
                        if ($dataManager->update('Surveillant', $data)) {
                            echo '<div class="alert alert-success" role="alert">De surveillant is succesvol op inactief gezet.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Fout bij het aanpassen van de surveillant.</div>';
                        }

                    }
                    if (isset($_POST['action']) && $_POST['action'] == 'edit') {
                        $id = cleanInput($_POST['id']);
                        $werknemerID = cleanInput($_POST['werknemerid']);
                        $voornaam = cleanInput($_POST['voornaam']);
                        $achternaam = cleanInput($_POST['achternaam']);
                        $tussenvoegsel = cleanInput($_POST['tussenvoegsel']);
                        $email = $_POST['email'];
                        $userid = $_POST['uid'];

                        if (validateNumber($werknemerID, 0, 2147483647) &&
                            validateInput($voornaam, 1, 128) &&
                            validateInput($achternaam, 2, 128)
                        ) {
                            $data = array(
                                "WerknemerID" => $werknemerID,
                                "Voornaam" => $voornaam,
                                "Achternaam" => $achternaam
                            );

                            if (validateInput($tussenvoegsel, 1, 16)) {
                                $data['Tussenvoegsel'] = $tussenvoegsel;
                            }
                            else {
                                $data['Tussenvoegsel'] = '';
                            }
                            if (isset($_POST['account'])) {
                                $account = cleanInput($_POST['account']);
                                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $account == 'on') {
                                    if ($userid != NULL) {
                                        $newmail = array("email" => $email);
                                        $dataManager->where('id', $userid);
                                        if ($dataManager->update('users', $newmail)) {
                                            echo '<div class="alert alert-success" role="alert">Het account is succesvol aangepast.</div>';
                                        } else {
                                            echo '<div class="alert alert-success" role="alert">Het account voor de surveillant kon niet worden aangepast.</div>';
                                        }
                                    } else {
                                        $password = randomPassword();
                                        $register = $auth->register($email, $password, $password);

                                        if ($register['error'] == 0) {
                                            echo '<div class="alert alert-success" role="alert">Het account is succesvol toegevoegd. (' . $password . ')</div>';

                                            // UID ophalen om in surveillanten tabel toe te voegen.
                                            $uid = $auth->getUID($email);
                                            $data['GebruikerID'] = $uid;
                                        }
                                    }
                                }

                            }
                            $dataManager->where('ID', $id);
                            if ($dataManager->update('Surveillant', $data)) {
                                echo '<div class="alert alert-success" role="alert">De surveillant is succesvol aangepast.</div>';
                            }
                        }

                    }
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
                                    <th>Actief</th>
                                    <th>Bewerken</th>
                                    <th>Activiteit</th>
                                    <th>Beschikbaarheid</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?

                                $dataManager->orderBy('Actief', 'DESC');
                                $dataManager->orderBy('WerknemerID', 'ASC');
                                $surveillanten = $dataManager->get('Surveillant');

                                if ($dataManager->count > 0)

                                    foreach ($surveillanten as $surveillant) {
                                        echo '<tr>';
                                        echo '<td>' .  $surveillant["WerknemerID"] . '</td>';
                                        echo '<td>' .  $surveillant["Voornaam"] . '</td>';
                                        echo '<td>' .  $surveillant["Tussenvoegsel"] . '</td>';
                                        echo '<td>' .  $surveillant["Achternaam"] . '</td>';

                                        if ($surveillant["Actief"] == 1) {
                                            echo '<td>Actief</td>';
                                        } else {
                                            echo '<td>Inactief</td>';
                                        }

                                        ?>
                                        <td>
                                            <form action="survedit.php" method="get">
                                                <input type="hidden" name="id" value="<?php echo $surveillant["ID"]; ?>">
                                                <button type="submit" class="btn btn-outline btn-primary ">Bewerken</button>
                                            </form>
                                        </td>
                                        <td>
                                        <form action="surveillant.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $surveillant["ID"]; ?>">

                                            <?php
                                            if ($surveillant["Actief"] == 1) {
                                                echo'<input type="hidden" name="action" value="inactive">';
                                                echo'<button type="submit" class="btn btn-outline btn-danger ">Maak Inactief</button>';
                                            } else {
                                                echo'<input type="hidden" name="action" value="active">';
                                                echo'<button type="submit" class="btn btn-outline btn-success ">Maak Actief</button>';
                                            }
                                            ?>

                                        </form>
                                        </td>
                                        <td>
                                            <form action="availability.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $surveillant["ID"]; ?>">
                                                <button type="submit" class="btn btn-outline btn-primary ">Beschikbaarheid</button>
                                            </form>
                                        </td>
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

<?php include_once "../includes/footer.php"; ?>


</body>

</html>
