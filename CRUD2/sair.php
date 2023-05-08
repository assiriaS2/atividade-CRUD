<?php
    session_start();
    $_SESSION['autenticacao'] = false;
    header('location:/');
?>