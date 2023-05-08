<?php
    $login = $_POST['E-mail'];
    $senha = $_POST['senha'];
    $userFile = fopen("user.csv", 'r');

    while( ($linha = fgetcsv($userFile)) !== false){
        if($linha[0] == $login && $senha == $linha[1]){
            http_response_code(202);
            session_start();
            $_SESSION['autentificacao'] = true;
            header('location: /CRUD2/');
        }
    }
?>