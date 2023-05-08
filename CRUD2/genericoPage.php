<?php require("verificacao.php") ?>
<?php
require('./conf.php');

$email = $_GET['email'];
$genericoFile = fopen(GENERICO_DATA,'r');

while(($row = fgetcsv($genericoFile)) !== false){
    if($row[0] == $email){
        list($email, $name,$surname) = $row;
    }
}
if(!isset($name)){
    http_response_code(302);
    header('location: genericoList.php?deleteErr=Trainer not found:(');

}
require('./header.php');
?>
<h1>Generico</h1>
<h1><?=$name?><?=$surname?></h1>
<h2>Update generico info</h2>

<form action="genericoUpdate.php" method="POST">
    <input type="hidden" name="email" value="<?=$email?>">
    <input type="text" name="name" value="<?=$name?>">
    <input type="text" name="surname" value="<?=$surname?>">
    <button>Update</button>
</form>