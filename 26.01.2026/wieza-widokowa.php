<?php
$db = new mysqli('db', 'root2', '', 'city_guide');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centrum nauki</title>
    <link rel="stylesheet" href="style.css">
    <style>

    </style>

</head>
<body>
    <table>
        <tr>
            <?php
            $sql = "SHOW FULL COLUMNS FROM places";
            $result = $db->query($sql);
            while ($row = $result->fetch_array()){ ?>
                <th><?php echo $row[0]; ?></th>
            <?php } ?>
        </tr>
    <?php
    $sql = "SELECT * FROM `places` WHERE slug = 'wieza-widokowa'";
    $result = $db->query($sql);
    while ($row = $result->fetch_array()){ ?>
        <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><?php echo $row[8]; ?></td>
        </tr>
    <?php } ?>
    </table>
    <a href="index.php">Strona główna</a>
</body>
</html>