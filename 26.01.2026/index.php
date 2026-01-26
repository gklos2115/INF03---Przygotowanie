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
    </style>
</head>
<body>
    <?php
    $sql = "SELECT slug from places";
    $result = $db->query($sql);
    while ($row = $result->fetch_array()) { ?>
        <a href="<?php echo $row[0]; ?>.php"><?php echo $row[0]; ?></a>
    <?php }
    ?>
</body>
</html>