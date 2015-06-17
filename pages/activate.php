<?php
require_once '../lib/requireAuth.php';
require_once '../lib/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>TWZ - Accountactivatie</title>

    <?php include_once "../includes/head.php" ?>

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Activeer uw account</h3>
                </div>
                <div class="panel-body">

                    <?php

                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_POST['key']) && !empty($_POST['key'])) {
                            $activate = $auth->activate($_POST['key']);

                            if($activate['error'] == 0) {
                                header('Location: login.php');
                            } else {
                                echo '<div class="alert alert-warning" role="alert">' . $activate['message'] . '</div>';
                            }
                        } else {
                            echo '<div class="alert alert-warning" role="alert">Er is geen activeringscode ingevoerd</div>';
                        }

                    }

                    ?>

                    <form method="post" role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Activeringscode" name="key" type="text" autofocus>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Activeer</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "../includes/footer.php"; ?>

</body>

</html>