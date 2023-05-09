<?php require("verificacao.php") ?>
<?php
require('./conf.php');
if(!isset($_POST['nome'])){
    http_response_code(302)
;
header('location: teatroList.php?err=Nada foi adicionado!');
exit();
}

$nome = $_POST['nome'];
$tempFile = tempnam('.','');
$tmp = fopen($tempFile,'w');
$teatroFile = fopen(TEATRO_DATA,'r');

while(($row = fgetcsv($teatroFile)) !== false){
    if(!in_array($row[0], $nome)){
        fputcsv($tmp,$row);
    }
}

fclose($teatroFile);
fclose($tmp);

rename($tempFile, TEATRO_DATA);

http_response_code(302);
header('location: teatroList.php')
?>