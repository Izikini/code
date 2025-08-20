<?php
include("connect.php"); // подключаем базу данных

// Получаем текущее время
$now = date('Y-m-d H:i:s');

// Переносим завершённые бронирования в историю
mysqli_query($conn, "
    INSERT INTO historia_pobytow (numer_pokoju, liczba_osob, gosc_imie_nazwisko, zrodlo_rezerwacji, uwagi, data_przyjazdu, data_wyjazdu, cena, platnosc)
    SELECT numer_pokoju, liczba_osob, gosc_imie_nazwisko, zrodlo_rezerwacji, uwagi, data_przyjazdu, data_wyjazdu, cena, platnosc
    FROM pokoje
    WHERE CONCAT(data_wyjazdu, ' 11:00:00') < '$now' 
      AND gosc_imie_nazwisko IS NOT NULL
");

// Очищаем данные о гостях, которые уже выехали
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
    <!-- Подключаем стили -->

    <link rel="shortcut icon" href="img/Fotoram.io.jpg" />
    <link rel="stylesheet" href="base.css">
</head>

<body>
    <header>
        <div id="image">
            <!-- Логотип, переход на главную страницу -->
            <a href="index.php"><img src="img/Fotoram.io.jpg" alt="Logo"></a>
        </div>
        <ul id="menu">
            <!-- Кнопки навигации по сайту -->
            <a href="meldunek.php" class="knopka" id="knopka1"><button>Zamelduj Gościa</button></a>
            <a href="wymeldowanie.php" class="knopka" id="knopka2"><button>Wymelduj Goscia</button></a>
            <a href="edit.php" class="knopka" id="knopka3"><button>Edycja Gości</button></a>
        </ul>
    </header>
    <main>
        <div id="tablediv">
            <!-- Таблица текущих гостей -->
            <table>
                <thead>
                    <tr>
                        <th>Pobyt</th>
                        <th>Pokój</th>
                        <th>Imię i Nazwisko</th>
                        <th>Cena</th>
                        <th>Płatność</th>
                        <th>Osoby</th>
                        <th>Uwagi</th>
                    </tr>
                </thead>
                
                <?php
                // Получаем все записи из таблицы pokoje
                $sql = "SELECT data_przyjazdu, data_wyjazdu, numer_pokoju, gosc_imie_nazwisko, cena, platnosc, liczba_osob, zrodlo_rezerwacji
                        FROM pokoje";
                $result = $conn->query($sql);
                // Выводим каждую запись в строку таблицы
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
        <!-- Форма для генерации PDF-отчёта по завтракам -->
        <form action="lista_sniadan.php" method="post">
            <button type="submit">📄 Generuj listę śniadań</button>
        </form>
    </main>
    <footer>
        <!-- Информация о разработчике -->
        <p>
            Developed by Artem Sorokin
            <br>
            Telegram: <a href="https://t.me/luciferio666">@luciferio666</a>
            
        </p>
        <p>
            And Bohdan Bura
            <br>
            Telegram: <a href="https://t.me/iziik1">@iziik1</a>
        </p>
    </footer>
</body>

</html>