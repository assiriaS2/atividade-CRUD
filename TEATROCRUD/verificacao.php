<?php
    session_start();
    if(!isset($_SESSION['autentificacao']) || !$_SESSION['autentificacao']){
        header('location: /');
        exit();
    }
?>