<?php
require("fpdf/fpdf.php"); // подключаем библиотеку для PDF
include("connect.php"); // подключаем базу данных

// сегодняшняя дата для заголовка
$today = date("d.m.Y (l)"); // например: 20.08.2025 (Wednesday)

// Получаем список гостей, которые сейчас проживают
$sql = "SELECT numer_pokoju, liczba_osob, zrodlo_rezerwacji 
        FROM pokoje 
        WHERE data_przyjazdu <= CURDATE() AND data_wyjazdu >= CURDATE()
        ORDER BY numer_pokoju";
$result = $conn->query($sql);

// Считаем количество гостей по источнику бронирования
$sql2 = "SELECT zrodlo_rezerwacji, SUM(liczba_osob) AS osoby
         FROM pokoje
         WHERE data_przyjazdu <= CURDATE() AND data_wyjazdu >= CURDATE()
         GROUP BY zrodlo_rezerwacji";
$res2 = $conn->query($sql2);

// Создаём PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",14);

// Заголовок
$pdf->Cell(0,10, "LISTA ŚNIADAŃ $today", 0, 1, "C");
$pdf->Ln(5);

// Таблица гостей
$pdf->SetFont("Arial","B",10);
$pdf->Cell(30,10,"Nr pokoju",1,0,"C");
$pdf->Cell(30,10,"Osób",1,0,"C");
$pdf->Cell(60,10,"Uwagi",1,0,"C");
$pdf->Cell(60,10,"Podpis",1,1,"C");

$pdf->SetFont("Arial","",10);
while($row = $result->fetch_assoc()){
    $pdf->Cell(30,10,$row["numer_pokoju"],1,0,"C");
    $pdf->Cell(30,10,$row["liczba_osob"],1,0,"C");
    $pdf->Cell(60,10,$row["zrodlo_rezerwacji"],1,0,"C");
    $pdf->Cell(60,10,"",1,1,"C"); // подпись пустая
}

// Подсчёт итогов по источникам бронирования
$pdf->Ln(10);
$pdf->SetFont("Arial","B",12);
$pdf->Cell(0,10,"Podsumowanie:",0,1);

$total = 0;
while($row = $res2->fetch_assoc()){
    $pdf->Cell(0,8, strtoupper($row["zrodlo_rezerwacji"])." ".$row["osoby"]." osób",0,1);
    $total += $row["osoby"];
}
$pdf->Cell(0,10,"RAZEM: ".$total." osób",0,1);

// Отправляем PDF пользователю (скачать)
$pdf->Output("D", "lista_sniadan.pdf");
?>
