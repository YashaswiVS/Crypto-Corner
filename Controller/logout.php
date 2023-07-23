<?php
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    session_destroy();
    unset($_SESSION['uid']);
    unset($_SESSION['name']);
    $admin ->redirect1('../index.php');
?>