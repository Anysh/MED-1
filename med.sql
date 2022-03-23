-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Mar 2022, 11:45
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `med`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `staff`
--

INSERT INTO `staff` (`ID`, `Firstname`, `Lastname`) VALUES
(1, 'Alina', 'Kwaśna'),
(3, 'Edwin', 'Piątek'),
(4, 'Jakub', 'Mefedron ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyta`
--

CREATE TABLE `wizyta` (
  `ID` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wizyta`
--

INSERT INTO `wizyta` (`ID`, `staff_id`, `date`) VALUES
(3, 1, '2022-03-24 11:00:00'),
(4, 1, '2022-03-24 12:00:00'),
(5, 1, '2022-03-24 11:00:00'),
(6, 1, '2022-03-24 12:00:00'),
(7, 3, '2022-03-24 14:00:00'),
(8, 3, '2022-03-24 14:00:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `staff_id` (`staff_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  ADD CONSTRAINT `wizyta_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
