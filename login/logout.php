<?php

    session_start();
    session_unset();
    session_destroy();

    require_once('log_functions.php');
    redirect('login.php');
    die();

 ?>
