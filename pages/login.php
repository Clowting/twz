<?php
ob_start();
require_once '../lib/requireAuth.php';
require_once '../lib/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>TWZ - Login</title>

    <?php include_once "../includes/head.php" ?>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inloggen</h3>
                    </div>
                    <div class="panel-body">

                        <?php

                            if($_SERVER['REQUEST_METHOD'] != 'POST') {

                                if (isset($_GET['option']) && !empty($_GET['option'])) {
                                    $option = cleanInput($_GET['option']);

                                    if ($option == 'logout') {
                                        $logout = $auth->logout($_COOKIE[$config->cookie_name]);

                                        if ($logout) {
                                            echo '<div class="alert alert-success" role="alert">U bent succesvol uitgelogd.</div>';
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Er is iets fout gegaan bij het uitloggen.</div>';
                                        }
                                    }
                                }
                            }

                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if(isset($_POST['remember']) && !empty($_POST['remember'])) {
                                    $login = $auth->login($_POST['email'], $_POST['password'], $_POST['remember']);
                                } else {
                                    $login = $auth->login($_POST['email'], $_POST['password']);
                                }

                                if($login['error'] == 0) {
                                    setcookie($config->cookie_name, $login['hash'], $login['expire']);
                                    header('Location: index.php');
                                } else {
                                    echo '<div class="alert alert-warning" role="alert">' . $login['message'] . '</div>';
                                }
                            }

                        ?>

                        <form method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="1">Ingelogd blijven
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-key fa-fw"></i> Login</button>
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
