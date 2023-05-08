<?php
require("./conf.php");

$email = $_POST['email'];
$name = $_POST['name'];
$surname = $_POST['surname'];


$fpGenerico = fopen(GENERICO_DATA,'r');
$temp = tempnam('.','');
$fpTemp = fopen($temp,'w');

while(($row = fgetcsv($fpGenerico))!== false){
    if($row[0] == $email) {
        fputcsv($fpTemp, [$email,$name,$surname]);
    }
    else{
        fputcsv($fpGenerico,$row);
    }
}
fclose($fpGenerico);
fclose($fpTemp);

rename($temp, GENERICO_DATA);

http_response_code(302);
header('location: genericoPage.php?email=' . $email);
?>