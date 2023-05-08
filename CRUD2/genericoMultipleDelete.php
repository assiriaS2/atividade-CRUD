<?php
require('./conf.php');
if(!isset($_POST['e-mails'])){
    http_response_code(302)
;
header('location: genericoList.php?err=Nenhum treinador foi selecionado!');
exit();
}

$email = $_POST['e-mails'];
$tempFile = tempnam('.','');
$tmp = fopen($tempFile,'w');
$genericoFile = fopen(GENERICO_DATA,'r');

while(($row = fgetcsv($genericoFile)) !== false){
    if(!in_array($row[0], $email)){
        fputcsv($tmp,$row);
    }
}

fclose($genericoFile);
fclose($tmp);

rename($tempFile, GENERICO_DATA);

http_response_code(302);
header('location: genericoList.php')
?>