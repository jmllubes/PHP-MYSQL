-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 10-11-2021 a les 10:40:36
-- Versió del servidor: 10.4.18-MariaDB
-- Versió de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `vols`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `reserva`
--

CREATE TABLE `reserva` (
  `codi` int(11) NOT NULL,
  `codi_vol` int(11) NOT NULL,
  `codi_usuari` int(11) NOT NULL,
  `data_viatge` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_reserva` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre_places` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuari`
--

CREATE TABLE `usuari` (
  `codi` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `contrasenya` varchar(255) NOT NULL,
  `correu` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `usuari`
--

INSERT INTO `usuari` (`codi`, `nom`, `contrasenya`, `correu`, `rol`) VALUES
(1, 'jmllubes', '25d55ad283aa400af464c76d713c07ad', 'jmllubes@lasalle.cat', NULL),
(2, 'hola', '827ccb0eea8a706c4c34a16891f84e7b', 'hola@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `vol`
--

CREATE TABLE `vol` (
  `codi` int(11) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `desti` varchar(255) NOT NULL,
  `preu` decimal(5,2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nombre_places` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`codi`),
  ADD KEY `codi_vol` (`codi_vol`),
  ADD KEY `codi_usuari` (`codi_usuari`);

--
-- Índexs per a la taula `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`codi`);

--
-- Índexs per a la taula `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`codi`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `reserva`
--
ALTER TABLE `reserva`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `usuari`
--
ALTER TABLE `usuari`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la taula `vol`
--
ALTER TABLE `vol`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`codi_vol`) REFERENCES `vol` (`codi`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`codi_usuari`) REFERENCES `usuari` (`codi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
