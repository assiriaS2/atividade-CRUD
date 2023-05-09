<?php require("verificacao.php") ?>
<?php require('./conf.php')?>
<?php require('./header.php')?>

<style>
    th,td{
        width: 162px;
    }
</style>
<h1 style="text-align:center;">Teatro</h1>

    <?php if(isset($_GET['err'])):?>
        <div><?=$_GET['err']?></div>
        <?php endif ?>

        <form action="teatroAdd.php" method="POST">
            <input type="nome" name="nome" placeholder="Nome">
            <input type="text" name="endereco" placeholder="Endereço">
            <input type="text" name="publico" placeholder="Público alvo">
            <input type="text" name="espetaculo" placeholder="Espetáculo">
            <button>Add</button>
        </form>


        <?php $handle = fopen(TEATRO_DATA,'r')?>

        <form action="teatroMultipleDelete.php" method="POST" onsubmit="return confirm('Você tem certeza mesmo?!')">
        <table>
            <tr>
                <th>usuário</th>
                <th>endereço</th>
                <th>público</th>
                <th>espetáculo</th>
            </tr>
            <?php while(($row = fgetcsv($handle)) !== false): ?>
                <tr>
                    <td><?=$row[0]?></td>
                    <td><?=$row[1]?></td>
                    <td><?=$row[2]?></td>
                    <td><?=$row[3]?></td>
                    <td>
                    <input type="checkbox" name="nome[]" value="<?=$row[0] ?>">
                    <a href="./teatroPage.php?nome=<?=$row[0]?>">edit</a>
                    </td>
                </tr>
                <?php endwhile?>
                <tr>
                    <td colspan="9"></td>
                    <td>
                        <button>Remove</button>
                        </td>
                </tr>
            </table>
    </form>
    <br><br>
