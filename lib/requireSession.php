<?php
if(!isset($_COOKIE[$config->cookie_name]) || !$auth->checkSession($_COOKIE[$config->cookie_name])) {
    header('HTTP/1.1 403 Forbidden');
    header('Location: 403.html');
    exit();
} else {
    $uid = $auth->getSessionUID($_COOKIE[$config->cookie_name]);

    $dataManager->where('id', $uid);
    $user = $dataManager->getOne('users', 'id, email, rank');
}
