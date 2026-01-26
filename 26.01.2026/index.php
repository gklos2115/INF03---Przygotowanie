<?php
$db = new mysqli('db', 'root2', '', 'city_guide');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <style>
        a {
            display: block;
        }
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-top: 20px;
        }
        form input[type="text"] {
            padding: 5px;
            width: 200px;
        }
        label {
            font-weight: bold;
        }
        button {
            padding: 5px 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    $sql = "SELECT slug from places ORDER BY RAND()";
    $result = $db->query($sql);
    while ($row = $result->fetch_array()) { ?>
        <a href="content.php?slug=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a>
    <?php }
    ?>
    <h1>Wyszukiwarka</h1>
    <form action="content.php" method="post">
        <label for="">Fraza</label><br>
        <input type="text" name="fraza" id=""><br>
        <input type="submit" value="Sprawdź">
    </form>
</body>
</html>