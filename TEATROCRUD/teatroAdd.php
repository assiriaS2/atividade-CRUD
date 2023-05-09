<?php require("verificacao.php") ?>
<?php
require('./conf.php');

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$publico = $_POST['publico'];
$espetaculo = $_POST['espetaculo'];
$teatroFile = fopen(TEATRO_DATA,'r');

while(($row = fgetcsv($teatroFile)) !== false){
    if($row[0] == $nome){
        http_response_code(302);
        header('location:teatroList.php?err=Este nome já existe, tente novamente!');
        exit();
    }
}

$teatroFile = fopen(TEATRO_DATA,'a');
fputcsv($teatroFile, [$nome,$endereco,$publico,$espetaculo]);

http_response_code(302);
header('location: teatroList.php')

?>