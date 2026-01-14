<?php
$db = mysqli_connect('db', 'root2', '', 'smoki');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    <nav>
        <div onclick="baza()" id="baza">Baza</div>
        <div onclick="opisy()" id="opisy">Opisy</div>
        <div onclick="galeria()" id="galeria">Galeria</div>
    </nav>
    <main>
        <section id="pierwsza" class="pierwsza">
            <h3>Baza smoków</h3>
            <form action="" method="post">
                <select name="kraj" id="">
                    <?php
                    $sql = "select DISTINCT smok.pochodzenie from smok order by smok.pochodzenie asc";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $row['pochodzenie']; ?>"><?php echo $row['pochodzenie']; ?></option>
                <?php } ?>
               </select>
               <button type="submit">Szukaj</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Długość</th>
                        <th>Szerokość</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['kraj'])){
                            $kraj = $_POST['kraj'];
                            $sql = "select smok.nazwa, smok.dlugosc, smok.szerokosc from smok where smok.pochodzenie = '$kraj'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td><?php echo $row['nazwa']; ?></td>
                                <td><?php echo $row['dlugosc']; ?></td>
                                <td><?php echo $row['szerokosc']; ?></td>
                            </tr>
                            <?php }
                        } ?>
                </tbody>
            </table>
        </section>
        <section id="druga" class="druga">
            <h2>Opisy smoków</h2>
            <dl>
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                <dt>Smok niebieski</dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
            </dl>
        </section>
        <section id="trzecia" class="trzecia">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok czerwony"><img src="smok2.jpg" alt="Smok wielki"><img src="smok3.jpg" alt="Skrzydlaty łaciaty">
        </section>
    </main>
    <footer>
        <p>Stronę opracował</p>
    </footer>
    <script>
        function baza(){
            document.getElementById('pierwsza').style.display = 'block';
            document.getElementById('druga').style.display = 'none';
            document.getElementById('trzecia').style.display = 'none';
            document.getElementById('druga').style.backgroundColor = '#FFAEA5';
            document.getElementById('baza').style.backgroundColor = 'MistyRose';
            document.getElementById('trzecia').style.backgroundColor = '#FFAEA5';
        }
        function opisy(){
            document.getElementById('druga').style.display = 'block';
            document.getElementById('pierwsza').style.display = 'none';
            document.getElementById('trzecia').style.display = 'none';
            document.getElementById('pierwsza').style.backgroundColor = '#FFAEA5';
            document.getElementById('opisy').style.backgroundColor = 'MistyRose';
            document.getElementById('trzecia').style.backgroundColor = '#FFAEA5';
        }
        function galeria(){
            document.getElementById('trzecia').style.display = 'block';
            document.getElementById('pierwsza').style.display = 'none';
            document.getElementById('druga').style.display = 'none';
            document.getElementById('pierwsza').style.backgroundColor = '#FFAEA5';
            document.getElementById('galeria').style.backgroundColor = 'MistyRose';
            document.getElementById('trzecia').style.backgroundColor = '#FFAEA5';
        }
    </script>
</body>
</html>