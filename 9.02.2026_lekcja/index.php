<?php
$linie = file("plik.txt");
$db = mysqli_connect("localhost", "root", "", "dzisiaj");

$i = 0;
?>
<table>
    <tr>
        <th>ID</th>
        <th>Tekst</th>
    </tr>
<?php
    while (isset($linie[$i])) {
        echo $linie[$i] . "<br>";
        $i++;
    }
    ?>

</table>
<?php
function insert($db){
$file = fopen("plik.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    $sql = "INSERT INTO `tekst` (`tekst`) VALUES ('$line')";
    mysqli_query($db, $sql);
}
}
$i = 0;
?>