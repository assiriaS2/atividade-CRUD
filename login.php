<?php
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];
    $usuarioFile = fopen("usuario.csv", 'r');

    while( ($linha = fgetcsv($usuarioFile)) !== false){
        if($linha[0] == $login && $senha == $linha[1]){
            http_response_code(202);
            session_start();
            $_SESSION['autentificacao'] = true;
            header('location: /TEATROCRUD/');
        }
    }
?>