-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 apr 2020 om 18:03
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_opdrachten`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `host` text NOT NULL,
  `date` datetime NOT NULL,
  `activity_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `participants` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `planning`
--

INSERT INTO `planning` (`id`, `host`, `date`, `activity_id`, `duration`, `participants`) VALUES
(27, 'Me', '2020-05-01 18:30:00', 9, 15, '[\"Man\",\"Jooo\",\"Jooo\"]'),
(30, 'Pipo', '2020-05-14 06:07:00', 21, 21, '[\"Joep\",\"Wonka\"]'),
(64, 'CEO of Raisins', '2020-05-29 16:50:00', 13, 25, '[\"Joep\",\"Jos B\",\"Cism, Ray\",\"Bruv\",\"Fernando\",\"Giovanni\",\"???\",\"Joep\"]'),
(65, 'CEO of Raisins', '2020-04-28 15:00:00', 6, 35, '[\"Jens\"]'),
(66, 'CEO of Raisins', '2020-04-29 09:08:00', 11, 50, '[\"Jos B\"]');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
