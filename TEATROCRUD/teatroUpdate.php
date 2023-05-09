<?php require("verificacao.php") ?>
<?php
require("./conf.php");


$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$publico = $_POST['publico'];
$espetaculo = $_POST['espetaculo'];

$fpTeatro = fopen(TEATRO_DATA,'r');
$temp = tempnam('.','');
$fpTemp = fopen($temp,'w');

while(($row = fgetcsv($fpTeatro))!== false){
    if($row[0] == $usuario) {
        fputcsv($fpTemp, [$nome,$endereco,$publico,$espetaculo]);
    }
    else{
        fputcsv($fpTeatro,$row);
    }
}
fclose($fpTeatro);
fclose($fpTemp);

rename($temp, TEATRO_DATA);

http_response_code(302);
header('location: teatroPage.php?usuario=' . $nome);
?>