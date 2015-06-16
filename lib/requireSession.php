<?php
if(!isset($_COOKIE[$config->cookie_name]) || !$auth->checkSession($_COOKIE[$config->cookie_name])) {
    header('HTTP/1.0 403 Forbidden');
    echo "Forbidden";

    exit();
} else {
    $uid = $auth->getSessionUID($_COOKIE[$config->cookie_name]);

    $dataManager->where('id', $uid);
    $user = $dataManager->getOne('users', 'email, rank');
}
