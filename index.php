<?php
include("connect.php");




$now = date('Y-m-d H:i:s');


mysqli_query($conn, "
    INSERT INTO historia_pobytow (numer_pokoju, liczba_osob, gosc_imie_nazwisko, zrodlo_rezerwacji, uwagi, data_przyjazdu, data_wyjazdu, cena, platnosc)
    SELECT numer_pokoju, liczba_osob, gosc_imie_nazwisko, zrodlo_rezerwacji, uwagi, data_przyjazdu, data_wyjazdu, cena, platnosc
    FROM pokoje
    WHERE CONCAT(data_wyjazdu, ' 11:00:00') < '$now' 
      AND gosc_imie_nazwisko IS NOT NULL
");
mysqli_query($conn, "
    UPDATE pokoje
    SET liczba_osob = NULL, gosc_imie_nazwisko = NULL, zrodlo_rezerwacji = NULL, uwagi = NULL, data_przyjazdu = NULL, data_wyjazdu = NULL, cena = NULL, platnosc = NULL
    WHERE CONCAT(data_wyjazdu, ' 11:00:00') < '$now'
");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renusz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/Fotoram.io.jpg" />
    <link rel="stylesheet" href="base.css">
</head>

<body>
    <header>
        <div id="image">
            <a href="index.php"><img src="img/Fotoram.io.jpg" alt="Logo"></a>
        </div>
        <div id="headd">
            <a href="meldunek.php" class="knopka" id="knopka1">Zamelduj Gościa</a>
            <a href="wymeldowanie.php" class="knopka" id="knopka2">Wymelduj Goscia</a>
            <a href="edit.php" class="knopka" id="knopka3">Edycja Gości</a>

        </div>
    </header>
    <main>
        <div id="tablediv">
            <table>
                <tr>
                    <th>Pobyt</th>
                    <th>Pokój</th>
                    <th>Imię i Nazwisko</th>
                    <th>Cena</th>
                    <th>Płatność</th>
                    <th>Osoby</th>
                    <th>Uwagi</th>
                </tr>
                <?php
                $sql = "SELECT data_przyjazdu, data_wyjazdu, numer_pokoju, gosc_imie_nazwisko, cena, platnosc, liczba_osob, zrodlo_rezerwacji
        FROM pokoje";
                $result = $conn->query($sql);
                while ($row = $result->fetch_array()) {
                    echo "<tr>
                    <td><b>$row[0] - $row[1]</b></td>
                    <td><b>$row[2]</b></td>
                    <td><b>$row[3]</b></td>
                    <td><b>$row[4]</b></td>
                    <td><b>$row[5]</b></td>
                    <td><b>$row[6]</b></td>
                    <td><b>$row[7]</b></td>
                </tr>";
                }
                ?>
            </table>
        </div>
        <form action="lista_sniadan.php" method="post">
    <button type="submit">📄 Generuj listę śniadań</button>
</form>

    </main>
    <footer>
        <p>Developed by Artem Sorokin
            <br>
            Telegram: @luciferio666
        </p>
    </footer>
</body>

</html>