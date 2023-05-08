<?php require("verificacao.php") ?>
<?php require('./conf.php')?>
<?php require('./header.php')?>

<style>
    th,td{
        width: 130px;
    }
</style>
<h1 style="text-align:center;">generico</h1>

    <?php if(isset($_GET['err'])):?>
        <div><?=$_GET['err']?></div>
        <?php endif ?>

        <form action="genericoAdd.php" method="POST">
            <input type="email" name="e-mail" placeholder="E-mail">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="surname" placeholder="Surname">
            <button>Add</button>
        </form>


        <?php $handle = fopen(GENERICO_DATA,'r')?>

        <form action="genericoMultipleDelete.php" method="POST" onsubmit="return confirm('você tem certeza mesmo?!')">
        <table>
            <tr>
                <th>e-mail</th>
                <th>name</th>
                <th>surname</th>
            </tr>
            <?php while(($row = fgetcsv($handle)) !== false): ?>
                <tr>
                    <td><?=$row[0]?></td>
                    <td><?=$row[1]?></td>
                    <td><?=$row[2]?></td>
                    <td>
                    <input type="checkbox" name="e-mails[]" value="<?=$row[0] ?>">
                    <a href="./genericoPage.php?email=<?=$row[0]?>">edit</a>
                    </td>
                </tr>
                <?php endwhile?>
                <tr>
                    <td colspan="3"></td>
                    <td>
                        <button>Remove</button>
                    </td>
                    </td>
                </tr>
        </table>
    </form>
    <br><br>
