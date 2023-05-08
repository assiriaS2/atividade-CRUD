<?php 
require('./conf.php');

$email = $_POST['email'];
$tempFile = tempnam('.','');
$tmp = fopen($tempFile,'w');
$genericoFile= fopen(GENERICO_DATA,'r');

while(($row = fgetcsv($genericoFile)) !== false){
    if($row[0 != $email]){
        fputcsv($tmp, $row);
    }
}

fclose($genericoFile);
fclose($tmp);

rename($tempFile, GENERICO_DATA);

http_response_code(302);
header('location: genericoList.php')
?>