-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 06 dec 2017 om 18:08
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `urenregistratie`
--
CREATE DATABASE IF NOT EXISTS `urenregistratie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `urenregistratie`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `RecordId` int(11) NOT NULL AUTO_INCREMENT,
  `RecordNaam` varchar(50) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `StartRijden` time NOT NULL,
  `StopRijden` time NOT NULL,
  `StartActiviteit` time NOT NULL,
  `StopActiviteit` time NOT NULL,
  `PauzeTijd` int(11) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `OK` varchar(5) NOT NULL,
  `ActiviteitStatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`RecordId`),
  UNIQUE KEY `RecordId` (`RecordId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserNaam` varchar(20) NOT NULL,
  `UserPaswoord` varchar(255) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
