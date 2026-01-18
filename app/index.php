<?php
$db = mysqli_connect('db', 'root2', '', 'projekt');
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['jeremi']) && $_GET['jeremi'] == 67) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Komunikaty</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            h1 {
                color: #333;
            }
            p {
                font-size: 16px;
                color: #666;
                background-color: #b7b7b7ff;
                padding: 10px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Komunikat</h1>
        <p>
            <?php
            $sql = "select * from komunikaty where komunikaty.data_wygasniecia > CURRENT_DATE";
            mysqli_query($db, $sql);
            ?>
        </p>
    </body>
    </html>
<?php }
else { ?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<hr>
<address>Apache/2.4.65.67 (Debian) Server at localhost Port 8880</address>
</body></html>

<?php } ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'&& !empty($_GET['tajne']) && $_GET['tajne'] == 12 ){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dodaj komunikat</title>
    </head>
    <body>
        <h1>Dodaj komunikat</h1>
        <form action="" method="post">
            <label for="">Treść</label><br>
            <input type="text" name="tresc" id=""><br>
            <input type="datetime" name="koniec" id=""><br>
            <input type="submit" value="Dodaj">
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['tresc']) && !empty($_POST['koniec'])){
            $t = $_POST['tresc'];
            $k = $_POST['koniec'];
            $sql = "INSERT INTO Komunikaty (tytul, data_wygasniecia) SELECT '$t', '$k'";
            mysqli_query($db, $sql);
        }
        ?>
    </body>
    </html>
<?php } ?>