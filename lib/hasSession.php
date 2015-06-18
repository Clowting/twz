<?php
if(isset($_COOKIE[$config->cookie_name]) || $auth->checkSession($_COOKIE[$config->cookie_name])) {
    $uid = $auth->getSessionUID($_COOKIE[$config->cookie_name]);

    $dataManager->where('id', $uid);
    $user = $dataManager->getOne('users', 'id, email, rank');
}
