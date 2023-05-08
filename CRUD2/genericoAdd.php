<?php
require('./conf.php');

$email = $_POST['e-mail'];
$name = $_POST['name'];
$surname = $_POST['surname'];

$genericoFile = fopen(GENERICO_DATA,'r');

while(($row = fgetcsv($genericoFile)) !== false){
    if($row[0] == $email){
        http_response_code(302);
        header('location:genericoList.php?err=E-mail já foi cadastrado, tente novamente!');
        exit();
    }
}

$genericoFile = fopen(GENERICO_DATA,'a');
fputcsv($genericoFile, [$email,$name,$surname]);

http_response_code(302);
header('location: genericoList.php')

?>