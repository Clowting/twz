<?php

if(!isUser($user)) {
    header('Location: login.php');
    exit();
}