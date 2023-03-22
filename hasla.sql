-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lut 2023, 17:02
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gra`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hasla`
--

CREATE TABLE `hasla` (
  `id` int(10) UNSIGNED NOT NULL,
  `haslo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `hasla`
--

INSERT INTO `hasla` (`id`, `haslo`) VALUES
(1, 'POGODA'),
(2, 'KOPARKA'),
(3, 'JAGODA'),
(4, 'CHMURA'),
(5, 'JAJKO'),
(6, 'MIESZKANIE'),
(7, 'KAMELEON'),
(8, 'GRUSZKA'),
(9, 'TRUSKAWKA'),
(10, 'SAMOLOT'),
(11, 'JACHT'),
(12, 'BORSUK'),
(13, 'SARNA'),
(14, 'ZEBRA');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `hasla`
--
ALTER TABLE `hasla`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `hasla`
--
ALTER TABLE `hasla`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
