<?php require("verificacao.php") ?>
<?php 
require('./conf.php');

$nome = $_POST['nome'];
$tempFile = tempnam('.','');
$tmp = fopen($tempFile,'w');
$teatroFile= fopen(TEATRO_DATA,'r');

while(($row = fgetcsv($teatroFile)) !== false){
    if($row[0 != $nome]){
        fputcsv($tmp, $row);
    }
}

fclose($teatroFile);
fclose($tmp);

rename($tempFile, TEATRO_DATA);

http_response_code(302);
header('location: teatroList.php')
?>