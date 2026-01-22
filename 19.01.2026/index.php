<?php
$db = mysqli_connect('db', 'root2', '', 'styczen19');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>19.01.2026</title>
    <style>
        main{
            display: flex;
        }
        .left{
            width: 20%;
            border: 2px solid black;
            padding: 10px;
        }
        .right{
            width: 75%;
            border: 2px solid black;
            padding: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <main>

        <section class='left'>
            <h1>Nazwy</h1>
            <?php
            $sql = "select firmy.ID, firmy.Nazwa from firmy";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result)){ ?>
            <br>
                <a href="?id=<?php echo $row['ID']; ?>"><?php echo $row['Nazwa']; ?></a>
            <?php } ?>
            <h1>Kategorie</h1>
            <?php
            $sql = "select Kategorie.Nazwa from Kategorie";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result)){ ?>
                <a href="?nazwa=<?php echo $row[0]; ?>"><?php echo $row[0]; ?><br></a>
            <?php } ?>
        </section>
        <section class='right'>
        <ul>
            <?php
            if(isset($_GET['id']) && !isset($_GET['nazwa'])){
                $id = $_GET['id'];
                $sql = "select * from firmy where ID = $id";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)){ ?>
                    <li><?php echo $row['Nazwa']; ?></li>
                    <li><?php echo $row['www']; ?></li>
                    <li><?php echo $row['opis']; ?></li>
                <?php }
            }
            ?>
            <?php
            if(isset($_GET['nazwa']) && !isset($_GET['id'])){
                $nazwa = $_GET['nazwa'];
                $sql = "SELECT firmy.* from firmy join Firmy_Kategorie on Firmy_Kategorie.Firma_Id = firmy.ID join Kategorie on Kategorie.ID = Firmy_Kategorie.Kategoria_Id where Kategorie.Nazwa = '$nazwa'";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)){ ?>
                    <table>
                    <tr>
                        <th>Nazwa</th>
                        <th>WWW</th>
                        <th>Opis</th>
                    </tr>
                    <tr>
                        <td><?php echo $row['Nazwa']; ?></td>
                        <td><?php echo $row['www']; ?></td>
                        <td><?php echo $row['opis']; ?></td>
                    </tr>
                    </table>
                <?php }
            }
            ?>
            <?php
            if(!isset($_GET['nazwa']) && !isset($_GET['id'])){
                echo "uzupełnij pola aby wyświetlić";
            } ?>
        </section> 
        </ul>  
    </main>
    <?php
    $sql = "SELECT * FROM firmy";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    echo $row[0];
    ?>
</body>
</html>
