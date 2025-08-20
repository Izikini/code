<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meldowanie</title>
    <link rel="stylesheet" href="base.css">
    <link rel="shortcut icon" href="img/Fotoram.io.jpg" />
    <link rel="stylesheet" href="baseforwm.css">
</head>

<body>
    <header>
        <div id="image">
            <a href="index.php"><img src="img/Fotoram.io.jpg" alt="Logo"></a>
        </div>
        <div id="headd">
            <a href="index.php" class="knopka" id="knopka1">Główna Strona</a>
            <a href="wymeldowanie.php" class="knopka" id="knopka2">Wymelduj Goscia</a>
            <a href="edit.php" class="knopka" id="knopka3">Edycja Gości</a>
        </div>
    </header>
    <main>
        <form method="post">
            <label for="pobyt_od">Data Przyjazdu</label>
            <br>
            <input type="date" name="pobyt_od">
            <br>
            <label for="pobyt_do">Data Wyjazdy</label>
            <br>
            <input type="date" name="pobyt_do">
            <br>
            <label for="pokoje">Wybierz Pokój</label>
            <br>
            <select name="pokoje" id="">
                <?php
                $sql = "select numer_pokoju from pokoje";
                $result = $conn->query($sql);
                while ($row = $result->fetch_array()) {
                    echo "<option value='$row[0]'>
                    $row[0]
                    </option>";
                }
                ?>
            </select>
            <br>
            <label for="imie_nazwisko">Podaj Imie i Nazwisko</label>
           <br>
            <input type="text" name="imie_nazwisko" id="imie_nazw" placeholder="Wpisz imie oraz nazwisko...">
            <br>
            <label for="cena">Cena</label>
            <br>
            <input type="number" name="cena" placeholder="Wpisz cene...">
            <br>
            <label for="rozlicz">Płatność</label>
            <br>
            <input type="text" name="rozlicz" placeholder="Wpisz FV/KP...">
            <br>
            <label for="osoby">Ilość Osób</label>
            <br>
            <input type="number" name="osoby" placeholder="Wpisz ilość...">
            <br>
            <label for="uwagi">Źrodło Rezerwacji</label>
            <br>
            <input type="text" name="uwagi" id="" placeholder="Wpisz BOOK/IND...">
            <br>
            <label for="">Zapisz</label>
            <button type="submit">Zapisać</button>
            <button type="reset">Resetuj</button>
            <br>
        </form>
        <?php
        if (
            !empty($_POST["pobyt_od"]) &&
            !empty($_POST["pobyt_do"]) &&
            !empty($_POST["pokoje"]) &&
            !empty($_POST["imie_nazwisko"]) &&
            !empty($_POST["cena"]) &&
            !empty($_POST["rozlicz"]) &&
            !empty($_POST["osoby"]) &&
            !empty($_POST["uwagi"])
        ) {
            $pobytod = $_POST["pobyt_od"];
            $pobytdo = $_POST["pobyt_do"];
            $pokoje = $_POST["pokoje"];
            $imienazwisko = $_POST["imie_nazwisko"];
            $cena = $_POST["cena"];
            $rozlicz = $_POST["rozlicz"];
            $osoby = $_POST["osoby"];
            $uwagi = $_POST["uwagi"];


            $sql = "update pokoje set data_przyjazdu = '$pobytod',
                 data_wyjazdu = '$pobytdo',
                  gosc_imie_nazwisko = '$imienazwisko',
                   cena = '$cena',
                     platnosc = '$rozlicz',
                    liczba_osob = '$osoby',
                     zrodlo_rezerwacji = '$uwagi'
                      where numer_pokoju = '$pokoje' ";
                     
                      if ($conn->query($sql) == TRUE) {
                        echo "<p><br>Gość Zostal Dodany</p>";
                    }else{
                        echo "<p>error: ".$conn->error ."</p>";
                    }
                } else {
                    echo"<br><p>Wprowadź wszystkie dane</p>";
                }
        ?>
    </main>
    <footer>
        <p>Developed by Artem Sorokin
            <br>
            Telegram: @luciferio666
        </p>
    </footer>
</body>

</html>