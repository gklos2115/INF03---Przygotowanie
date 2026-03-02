<?php
$db = new mysqli('mysql', 'root', '', 'sklep');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep Muzyczny</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Sklep Muzyczny</h1>
    </header>
    <nav>
        <h2>MENU</h2>
        <a href="katalog.php">Katalog</a>
        <a href="koszyk.php">Koszyk</a>
        <a href="konto.php">Konto</a>
        <button onclick="wyloguj()">Wyloguj</button>
        <button onclick="szukajProduktu()">Szukaj produktu</button>
    </nav>
    <main>
        <h2 id="tytul">Katalog produktów</h2>
        <form action="" method="post">
            Podaj swoje imię: <input type="text" name="imie_uzytkownika" id="">
            <button>Zapamiętaj</button>
        </form>
        <p id="powitanie"></p>
        <form action="" method="get">
            <select name="kategoria" id="">

            </select>
            <button>Szukaj</button>
        </form>
        <table>
            <tr>
                <th>Nazwa</th>
                <th>Kategoria</th>
                <th>Cena</th>
                <th>Stan</th>
            </tr>
        </table>
        <p>
            Dostępne kategorie:
        </p>
        <ol id="lista_kategorii">

        </ol>
        <p id='info'></p>
    </main>

</body>
</html>