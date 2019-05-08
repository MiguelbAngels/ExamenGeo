-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2019 at 11:29 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5341749_geodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `IDExamen` int(20) NOT NULL,
  `TestName` varchar(50) NOT NULL,
  `AdminID` int(20) NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `HInicio` int(4) NOT NULL,
  `HFinal` int(4) NOT NULL,
  `PassExamen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`IDExamen`, `TestName`, `AdminID`, `Lugar`, `Fecha`, `HInicio`, `HFinal`, `PassExamen`) VALUES
(300419, 'Examen 30/04/19', 197202294, 'Bulevard solidaridad', '2019-04-30', 1400, 1600, '10');

-- --------------------------------------------------------

--
-- Table structure for table `incisos`
--

CREATE TABLE `incisos` (
  `IDInciso` int(20) NOT NULL,
  `Inciso` varchar(100) NOT NULL,
  `IDReactivo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incisos`
--

INSERT INTO `incisos` (`IDInciso`, `Inciso`, `IDReactivo`) VALUES
(10001, 'El planeta explota', 20002),
(10002, 'Si y solo si hay queso', 20001),
(10003, 'De quien quiera', 20003),
(10004, 'De quien la trabaje', 20003),
(10005, 'Dif. de minerales y apl.', 20002),
(10006, 'Tierra solida y dura', 20001);

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `IDInscripcion` int(20) NOT NULL,
  `IDAlumno` int(20) NOT NULL,
  `IDExamen` int(20) NOT NULL,
  `AdminID` int(50) NOT NULL,
  `Fecha` date NOT NULL,
  `IDRespuestas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscripcion`
--

INSERT INTO `inscripcion` (`IDInscripcion`, `IDAlumno`, `IDExamen`, `AdminID`, `Fecha`, `IDRespuestas`) VALUES
(19191919, 217202294, 300419, 197202294, '2019-04-30', 20193004);

-- --------------------------------------------------------

--
-- Table structure for table `reactivos`
--

CREATE TABLE `reactivos` (
  `IDReactivo` int(20) NOT NULL,
  `Pregunta` varchar(100) NOT NULL,
  `IDCorrecta` int(20) NOT NULL,
  `IDExamen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactivos`
--

INSERT INTO `reactivos` (`IDReactivo`, `Pregunta`, `IDCorrecta`, `IDExamen`) VALUES
(20001, '¿Que es una roca?', 10001, 300419),
(20002, '¿Diferencia entre tierra y arena?', 10002, 300419),
(20003, '¿De quien es la tierra?', 10003, 300419);

-- --------------------------------------------------------

--
-- Table structure for table `respuestas`
--

CREATE TABLE `respuestas` (
  `IDRes` int(20) NOT NULL,
  `nPreguntas` int(100) NOT NULL,
  `1` tinyint(1) NOT NULL,
  `2` tinyint(1) NOT NULL,
  `3` tinyint(1) NOT NULL,
  `4` tinyint(1) NOT NULL,
  `5` tinyint(1) NOT NULL,
  `6` tinyint(1) NOT NULL,
  `7` tinyint(1) NOT NULL,
  `8` tinyint(1) NOT NULL,
  `9` tinyint(1) NOT NULL,
  `10` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respuestas`
--

INSERT INTO `respuestas` (`IDRes`, `nPreguntas`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES
(20193004, 5, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Clase` int(1) NOT NULL,
  `IDExamen` int(20) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Password`, `Clase`, `IDExamen`, `Estado`) VALUES
(12, 'Miguel Angel Bernal Sanchez', 'miguel15bs@gmail.com', '13', 1, 300419, 0),
(19, 'Pancho', 'PanchoVillaEsElPatroncito@gmail.com', '12', 0, 0, 1),
(111, 'miguel', 'dfs@fdgd.v', '123', 0, 12, 1),
(122, 'miguel', 'cristian_jesus_c13@hotmail.com', '12', 0, 12, 0),
(555, 'osvaldo', 'lol@gmail.com', '6969', 0, 12, 1),
(2050, 'Mark', 'prueba@gmail.com', '1234', 0, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`IDExamen`);

--
-- Indexes for table `incisos`
--
ALTER TABLE `incisos`
  ADD PRIMARY KEY (`IDInciso`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`IDInscripcion`);

--
-- Indexes for table `reactivos`
--
ALTER TABLE `reactivos`
  ADD PRIMARY KEY (`IDReactivo`);

--
-- Indexes for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`IDRes`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
