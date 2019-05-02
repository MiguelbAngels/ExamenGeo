-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-05-2019 a las 17:49:23
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id5341749_geodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
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
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`IDExamen`, `TestName`, `AdminID`, `Lugar`, `Fecha`, `HInicio`, `HFinal`, `PassExamen`) VALUES
(300419, 'Examen 30/04/19', 197202294, 'Bulevard solidaridad', '2019-04-30', 1400, 1600, '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incisos`
--

CREATE TABLE `incisos` (
  `IDInciso` int(20) NOT NULL,
  `Inciso` varchar(100) NOT NULL,
  `IDReactivo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incisos`
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
-- Estructura de tabla para la tabla `inscripcion`
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
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`IDInscripcion`, `IDAlumno`, `IDExamen`, `AdminID`, `Fecha`, `IDRespuestas`) VALUES
(19191919, 217202294, 300419, 197202294, '2019-04-30', 20193004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactivos`
--

CREATE TABLE `reactivos` (
  `IDReactivo` int(20) NOT NULL,
  `Pregunta` varchar(100) NOT NULL,
  `IDCorrecta` int(20) NOT NULL,
  `IDExamen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reactivos`
--

INSERT INTO `reactivos` (`IDReactivo`, `Pregunta`, `IDCorrecta`, `IDExamen`) VALUES
(20001, '¿Que es una roca?', 10001, 300419),
(20002, '¿Diferencia entre tierra y arena?', 10002, 300419),
(20003, '¿De quien es la tierra?', 10003, 300419);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
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
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`IDRes`, `nPreguntas`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES
(20193004, 5, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Clase` int(1) NOT NULL,
  `IDExamen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Password`, `Clase`, `IDExamen`) VALUES
(12, 'Miguel Angel Bernal Sanchez', 'miguel15bs@gmail.com', '13', 1, 300419),
(19, 'José Doroteo Arango Arámbula', 'PanchoVillaEsElPatron@gmail.com', '12', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`IDExamen`);

--
-- Indices de la tabla `incisos`
--
ALTER TABLE `incisos`
  ADD PRIMARY KEY (`IDInciso`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`IDInscripcion`);

--
-- Indices de la tabla `reactivos`
--
ALTER TABLE `reactivos`
  ADD PRIMARY KEY (`IDReactivo`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`IDRes`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
