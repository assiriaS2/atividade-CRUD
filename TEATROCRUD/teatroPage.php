<?php require("verificacao.php") ?>
<?php
require('./conf.php');

$nome = $_GET['nome'];
$teatroFile = fopen(TEATRO_DATA,'r');

while(($row = fgetcsv($teatroFile)) !== false){
    if($row[0] == $nome){
        list($nome,$endereco,$publico,$espetaculo) = $row;
    }
}
if(!isset($nome)){
    http_response_code(302);
    header('location: teatroList.php?deleteErr=Nome não encontrado!:(');

}
require('./header.php');
?>
<h1>Teatro</h1>
<h1><?=$nome?><?=$endereco?></h1>
<h2>Update teatro info</h2>

<form action="teatroUpdate.php" method="POST">
    <input type="hidden" name="nome" value="<?=$nome?>">
    <input type="text" name="endereco" value="<?=$endereco?>">
    <input type="text" name="publico" value="<?=$publico?>">
    <input type="text" name="espetaculo" value="<?=$espetaculo?>">
    <button>Update</button>
</form>