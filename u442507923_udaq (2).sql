-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2019 at 10:14 PM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u442507923_udaq`
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
  `HInicio` time(4) NOT NULL,
  `HFinal` time(4) NOT NULL,
  `PassExamen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`IDExamen`, `TestName`, `AdminID`, `Lugar`, `Fecha`, `HInicio`, `HFinal`, `PassExamen`) VALUES
(12, 'examen prueba', 3, 'Caborca', '2018-01-31', '00:03:00.0000', '15:12:00.0000', '1234'),
(13, 'geo101', 3, 'Aula 505', '2019-01-31', '10:16:09.0000', '15:01:22.0000', '123'),
(14, 'geo101', 3, 'Aula 505', '2019-01-31', '00:00:09.0000', '00:01:22.0000', '123'),
(300419, 'Examen 30/04/19', 197202294, 'Bulevard solidaridad', '2019-04-30', '00:14:00.0000', '00:16:00.0000', '10');

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
(7, 'fgdg', 18),
(8, 'eef', 18),
(9, 'fgdg', 19),
(10, 'eef', 19),
(11, 'fgdg', 20),
(12, 'eef', 20),
(13, 'fgdg', 21),
(14, 'eef', 21),
(15, 'fgdg', 22),
(16, 'eef', 22),
(17, 'sadas', 23),
(18, 'dsadasd', 23),
(19, 'sdas', 24),
(20, 'sdasd', 24),
(21, 'sadas', 25),
(22, 'dsadasd', 25),
(23, 'sdas', 26),
(24, 'sdasd', 26),
(25, 'sadas', 27),
(26, 'dsadasd', 27),
(27, 'sdas', 28),
(28, 'sdasd', 28),
(29, 'sadas', 29),
(30, 'dsadasd', 29),
(31, 'sdas', 30),
(32, 'sdasd', 30),
(33, 'sadas', 31),
(34, 'dsadasd', 31),
(35, 'sdas', 32),
(36, 'sdasd', 32),
(37, 'sdas', 33),
(38, 'sdasdas', 33),
(39, 'sadasd', 34),
(40, 'asdas', 34),
(41, 'werer', 35),
(42, 'werwer', 35),
(43, 'sadasd', 36),
(44, 'sdas', 36),
(45, 'sdfgsdf', 37),
(46, 'dsfds', 37),
(47, 'dsfsdf', 38),
(48, 'sdfsd', 38),
(49, 'sadasd', 39),
(50, 'sadasd', 39),
(51, 'fsdfdsf', 40),
(52, 'dsfsdfs', 40),
(53, 'sadasd', 41),
(54, 'sadasd', 41),
(55, 'fsdfdsf', 42),
(56, 'dsfsdfs', 42),
(57, 'sadasd', 43),
(58, 'sadasd', 43),
(59, 'fsdfdsf', 44),
(60, 'dsfsdfs', 44),
(61, 'sadasd', 45),
(62, 'sadasd', 45),
(63, 'fsdfdsf', 46),
(64, 'dsfsdfs', 46),
(65, 'sadasd', 47),
(66, 'sadasd', 47),
(67, 'fsdfdsf', 48),
(68, 'dsfsdfs', 48),
(69, 'sadasd', 49),
(70, 'sadasd', 49),
(71, 'fsdfdsf', 50),
(72, 'dsfsdfs', 50),
(73, 'sadasd', 51),
(74, 'sadasd', 51),
(75, 'fsdfdsf', 52),
(76, 'dsfsdfs', 52),
(77, 'sadasd', 53),
(78, 'sadasd', 53),
(79, 'sadasd', 54),
(80, 'sadasd', 54),
(81, 'fsdfdsf', 55),
(82, 'dsfsdfs', 55),
(83, 'dfsd', 56),
(84, 'dfsdf', 56),
(85, 'fgdfg', 57),
(86, 'fgdg', 57),
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
  `IDRespuestas` int(20) NOT NULL,
  `RespCorrectas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscripcion`
--

INSERT INTO `inscripcion` (`IDInscripcion`, `IDAlumno`, `IDExamen`, `AdminID`, `Fecha`, `IDRespuestas`, `RespCorrectas`) VALUES
(1, 122, 12, 3, '0000-00-00', 36, 1),
(2, 122, 300419, 197202294, '0000-00-00', 37, 3),
(3, 19, 12, 3, '0000-00-00', 38, 3),
(4, 19, 300419, 197202294, '0000-00-00', 39, 0),
(5, 555, 12, 3, '0000-00-00', 40, 2),
(6, 2050, 300419, 197202294, '0000-00-00', 41, 0),
(7, 2050, 12, 3, '0000-00-00', 42, 3),
(8, 217202285, 12, 3, '0000-00-00', 43, 2),
(9, 217202294, 12, 3, '0000-00-00', 44, 3),
(10, 123344444, 12, 3, '0000-00-00', 45, 3),
(11, 123456789, 12, 3, '0000-00-00', 46, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reactivos`
--

CREATE TABLE `reactivos` (
  `IDReactivo` int(20) NOT NULL,
  `Pregunta` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDCorrecta` int(20) NOT NULL,
  `IDExamen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactivos`
--

INSERT INTO `reactivos` (`IDReactivo`, `Pregunta`, `IDCorrecta`, `IDExamen`) VALUES
(20001, '¿hola que hace?', 10006, 12),
(20002, '¿que hora es?', 10005, 12),
(20003, '¿que es una roca?', 10004, 12),
(14, 'dfff', 14, 12),
(14, 'dfff', 14, 12),
(14, 'dfff', 14, 12),
(14, 'dfff', 14, 12),
(14, 'dfff', 14, 12),
(14, 'dfff', 14, 12),
(1, 'dfff', 14, 12),
(1, 'dfff', 14, 12),
(12, 'dfff', 14, 12),
(13, 'dfff', 14, 12),
(14, 'dfff', 14, 12),
(15, 'dfff', 14, 12),
(16, 'dfff', 14, 12),
(17, 'dfff', 14, 12),
(18, 'dfff', 14, 12),
(19, 'dfff', 14, 12),
(20, 'dfff', 14, 12),
(21, 'dfff', 14, 12),
(22, 'dfff', 15, 12),
(23, 'asdas', 16, 12),
(24, 'sadasd', 18, 12),
(25, 'asdas', 22, 12),
(26, 'sadasd', 23, 12),
(27, 'asdas', 26, 12),
(28, 'sadasd', 27, 12),
(29, 'asdas1', 30, 12),
(30, 'sadasd2', 31, 12),
(31, 'asdas1', 34, 12),
(32, 'sadasd2', 35, 12),
(33, 'asda', 38, 12),
(34, 'sdfasdf', 39, 12),
(35, 'werwer', 42, 12),
(36, 'sdasdas', 43, 12),
(37, 'gdgsg', 46, 12),
(38, 'sdfsf', 47, 12),
(39, 'sda', 49, 12),
(40, 'dsfsfd', 52, 12),
(41, 'sda', 53, 12),
(42, 'dsfsfd', 56, 12),
(43, 'sda', 57, 12),
(44, 'dsfsfd', 60, 12),
(45, 'sda', 61, 12),
(46, 'dsfsfd', 64, 12),
(47, 'sda', 65, 12),
(48, 'dsfsfd', 68, 12),
(49, 'sda', 68, 12),
(50, 'dsfsfd', 72, 12),
(51, 'sda', 72, 12),
(52, 'dsfsfd', 76, 12),
(53, 'sda', 76, 12),
(54, 'sda', 78, 12),
(55, 'dsfsfd', 82, 12),
(56, 'dfsf', 82, 12),
(57, 'fgdfg', 86, 12);

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
(2, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(7, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(9, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(10, 3, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(11, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(12, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(13, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(14, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(15, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(16, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(17, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(18, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(19, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(20, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(21, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(22, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(23, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(24, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(25, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(26, 3, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(27, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 3, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(29, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(30, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 3, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(32, 3, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(33, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(36, 3, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(38, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(39, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 3, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(41, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(43, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(45, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(46, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
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
(1, 'Admin', 'soporte@doriclub.com', '123', 1, 0, 1),
(12, 'Miguel Angel Bernal Sanchez', 'miguel15bs@gmail.com', '13', 1, 300419, 0),
(19, 'Panchito', 'PanchoVillaEsElPatroncito@gmail.com', '12', 0, 0, 1),
(122, 'miguel       ', 'cristian_jesus_c13@hotmail.com', '12', 0, 12, 1),
(555, 'osvaldo', 'lol@gmail.com', '6969', 0, 0, 1),
(2050, 'Mark', 'prueba@gmail.com', '1234', 0, 0, 1),
(123344444, 'Jesus', 'de@gmail.com', '1234', 0, 0, 1),
(123345456, 'JesusAlvarez', 'de@gmail.com', '123', 0, 0, 0),
(123456789, 'Gumy', 'email@arroba.coma', '123456789', 0, 0, 1),
(125124526, 'Miguel Angel', 'prueba@email.com', '2', 0, 12, 0),
(217202285, 'Humblink', '123456@gmail.com', '123456', 0, 12, 1),
(217202294, 'Humblink', '123456123@gmail.com', '123456', 0, 12, 1),
(217202295, 'Miguel ', '1111@gmail.com', '1111', 0, 13, 1),
(424256407, 'soul', 'hohoho@gmail.com', 'rip', 0, 12, 1),
(987654321, 'Marcos', 'marcosasg25@gmail.com', '25', 0, 12, 0),
(1233333355, 'Jesus Alvarez', 'email@gmail.com', '123', 0, 12, 0);

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
