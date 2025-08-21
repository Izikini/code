-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2025 at 06:12 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historia_pobytow`
--

CREATE TABLE `historia_pobytow` (
  `id` int(11) NOT NULL,
  `numer_pokoju` varchar(10) NOT NULL,
  `liczba_osob` int(11) DEFAULT NULL,
  `gosc_imie_nazwisko` varchar(100) DEFAULT NULL,
  `zrodlo_rezerwacji` varchar(50) DEFAULT NULL,
  `uwagi` text DEFAULT NULL,
  `data_przyjazdu` date DEFAULT NULL,
  `data_wyjazdu` date DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL,
  `platnosc` varchar(50) DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historia_pobytow`
--

INSERT INTO `historia_pobytow` (`id`, `numer_pokoju`, `liczba_osob`, `gosc_imie_nazwisko`, `zrodlo_rezerwacji`, `uwagi`, `data_przyjazdu`, `data_wyjazdu`, `cena`, `platnosc`, `data_dodania`) VALUES
(1, '217', 3, 'Sauus Kukanauski', 'BOOK', NULL, '2025-08-18', '2025-08-20', 1100.00, 'KP434', '2025-08-20 09:54:45');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pokoje`
--

CREATE TABLE `pokoje` (
  `id` int(11) NOT NULL,
  `numer_pokoju` varchar(10) NOT NULL,
  `liczba_osob` int(11) DEFAULT NULL,
  `gosc_imie_nazwisko` varchar(100) DEFAULT NULL,
  `zrodlo_rezerwacji` varchar(50) DEFAULT NULL,
  `uwagi` text DEFAULT NULL,
  `data_przyjazdu` date DEFAULT NULL,
  `data_wyjazdu` date DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL,
  `platnosc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pokoje`
--

INSERT INTO `pokoje` (`id`, `numer_pokoju`, `liczba_osob`, `gosc_imie_nazwisko`, `zrodlo_rezerwacji`, `uwagi`, `data_przyjazdu`, `data_wyjazdu`, `cena`, `platnosc`) VALUES
(1, '101', 2, 'Janusz Joras', 'IND', NULL, '2025-08-17', '2025-08-23', 3300.00, 'KP429'),
(2, '103', 4, 'Pobrotyn Tomasz', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(3, '109', 2, 'Sosnowski Adrian', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(4, '110', 1, 'Hejtmanek Karel', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(5, '111A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '112', 2, 'Zinzek Anna Maria', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(7, '113', 1, 'PILOT CZESI', 'CZESI', NULL, '2025-08-17', '2025-08-21', 1.00, 'CZESI'),
(8, '114', 2, 'Janasek Jan', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(9, '115', 1, 'Muplikova Marie', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(10, '116', 2, 'Pesat Zdenek', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(11, '117', 1, 'PILOT TOUR', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(12, '118', 2, 'Buzkova Anna', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(13, '120', 2, 'Valkova Julie', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(14, '121', 2, 'Widenka Pavel', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(15, '201A', 2, 'Czubula Zbigniew', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(16, '202A', 2, 'Cieśniewska Ewa', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(17, '203', 2, 'Glasnakova Brigitta', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(18, '204', 1, 'Adrian Jastrzebski', 'IND', NULL, '2025-08-17', '2025-08-21', 350.00, 'KP442'),
(19, '205', 2, 'Futak Vladimir', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(20, '206', 2, 'Estera Sikora', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(21, '207', 2, 'Vierlikova Olga', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(22, '208', 2, 'Ligocka Bronislava', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(23, '209', 3, 'Pronobis Urszula', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(24, '210', 2, 'Nowakov Miroslav', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(25, '212A', 2, 'Socha Pavel', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(26, '213', 2, 'Besedova Tatana', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(27, '214A', 2, 'Bzorek Justyna', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(28, '215', 2, 'Storkova Grayna', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(29, '217', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '219', 2, 'Kucerova Eva', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(31, '220', 2, 'Bujkova Vladislava', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(32, '221', 2, 'Janusz Joras', 'IND', NULL, '2025-08-17', '2025-08-23', 3300.00, 'KP429'),
(33, '222', 2, 'Habrova Alena', 'CZESI', NULL, '2025-08-17', '2025-08-22', 1.00, 'CZESI'),
(34, '223', 2, 'Paruch Anna', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(35, '224', 1, 'CZESI KIEROWCA', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(36, '225', 3, 'Anna Krzystosik', 'BOOK', NULL, '2025-08-19', '2025-08-21', 650.00, 'KP439'),
(37, '226', 1, 'KIEROWCA TOUR', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(38, '227', 2, 'Ojczymek Anna', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(39, '228', 2, 'Hadyna Maja', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(40, '229', 2, 'Grad Agnieszka', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(41, '230', 2, 'Jasiekova Danuse', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(42, '231', 2, 'Puchalova Ursula', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(43, '233', 2, 'Scheiderova Veka', 'CZESI', NULL, '2025-08-17', '2025-08-23', 1.00, 'CZESI'),
(44, '300', 2, 'Nikola Forewniak', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(45, '301', 2, 'Wanat Joana', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(46, '302', 2, 'Bzorek Mikołaj', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(47, '303', 2, 'Olszańska Eliza', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(48, '304', 2, 'Orłowska Mariola', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(49, '305', 2, 'Cwik Halina', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(50, '306', 1, 'Maria Cieśniewska', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(51, '307', 2, 'Utnik Joana', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(52, '309', 2, 'Grzesinski Krzystof', 'TOUR', NULL, '2025-08-18', '2025-08-21', 1.00, 'TOUR'),
(53, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '4', 2, 'Elźbieta Zaczek', 'BOOK', NULL, '2025-08-17', '2025-08-22', 4400.00, 'KP425'),
(57, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '6', 4, 'Elźbieta Zaczek', 'BOOK', NULL, '2025-08-17', '2025-08-22', 4400.00, 'KP425');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `historia_pobytow`
--
ALTER TABLE `historia_pobytow`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pokoje`
--
ALTER TABLE `pokoje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historia_pobytow`
--
ALTER TABLE `historia_pobytow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pokoje`
--
ALTER TABLE `pokoje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
