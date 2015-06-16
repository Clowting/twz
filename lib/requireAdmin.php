<?php

if(!isAdmin($user)) {
    header('Location: login.php');
    exit();
}