<?php
$db = new mysqli('db', 'root2', '', 'city_guide');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elementy</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
        body {
            font-family: Arial, sans-serif;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php if(isset($_GET['slug']) && !empty($_GET['slug'])) { ?>
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>slug</th>
      <th>name</th>
      <th>category</th>
      <th>address</th>
      <th>opening_hours</th>
      <th>ticket_info</th>
      <th>description</th>
      <th>fun_fact</th>
    </tr>
  </thead>

    <?php
    if(isset($_GET['slug']) && !empty($_GET['slug'])){
        $slug = $_GET['slug'];
        $sql = "SELECT * FROM `places` WHERE slug = '$slug'";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) { ?>
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
    <?php } } } ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['fraza'])){
        $fraza = $_POST['fraza'];
        $sql = "SELECT * FROM `places` WHERE CONCAT(places.name, ' ', places.address, ' ', places.description, ' ', places.fun_fact) LIKE '%$fraza%';";
        $result = $db->query($sql);
        while($row = $result->fetch_array()){
            if($result->num_rows > 0){ ?>
                <li><?php echo $row[0]; ?></li>
                <li><?php echo $row[1]; ?></li>
                <li><?php echo $row[2]; ?></li>
                <li><?php echo $row[3]; ?></li>
                <li><?php echo $row[4]; ?></li>
                <li><?php echo $row[5]; ?></li>
                <li><?php echo $row[6]; ?></li>
                <li><?php echo $row[7]; ?></li>
                <li><?php echo $row[8]; ?></li>
            <?php }
        }
    } ?>
</body>
</html>