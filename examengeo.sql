-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2019 a las 02:28:14
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examengeo`
--

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`ID Examen`, `Nombre Examen`, `ID Maestro`, `Lugar`, `Fecha`, `Hr. Inicio`, `Hr. Final`, `Contraseña Examen`) VALUES
(300419, 'Examen 30/04/19', 197202294, 'Bulevard solidaridad', '2019-04-30', 1400, 1600, '17161514');

--
-- Volcado de datos para la tabla `incisos`
--

INSERT INTO `incisos` (`ID Inciso`, `Inciso`, `ID Reactivo`) VALUES
(10001, 'El planeta explota', 20002),
(10002, 'Si y solo si hay queso', 20001),
(10003, 'De quien quiera', 20003),
(10004, 'De quien la trabaje', 20003),
(10005, 'Dif. de minerales y apl.', 20002),
(10006, 'Tierra solida y dura', 20001);

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`ID Inscripcion`, `ID Alumno`, `ID Examen`, `ID Maestro`, `Fecha Aplicada`, `ID Respuestas`) VALUES
(19191919, 217202294, 300419, 197202294, '2019-04-30', 20193004);

--
-- Volcado de datos para la tabla `reactivos`
--

INSERT INTO `reactivos` (`ID Reactivo`, `Pregunta`, `ID Respuesta Correcta`, `ID Examen`) VALUES
(20001, '¿Que es una roca?', 10001, 300419),
(20002, '¿Diferencia entre tierra y arena?', 10002, 300419),
(20003, '¿De quien es la tierra?', 10003, 300419);

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`ID Respuestas`, `# Preguntas`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES
(20193004, 5, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0);

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Password`, `Clase`, `ID Examen`) VALUES
(197202294, 'José Doroteo Arango Arámbula', 'PanchoVillaEsElPatron@gmail.com', 'ElPatron', 0, 0),
(217202294, 'Miguel Angel Bernal Sanchez', 'miguel15bs@gmail.com', '290419', 1, 300419);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
