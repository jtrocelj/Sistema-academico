-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2021 a las 19:17:12
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisacademico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `codigo` varchar(20) NOT NULL,
  `ci` int(15) NOT NULL,
  `extension` varchar(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`codigo`, `ci`, `extension`, `nombre`, `paterno`, `materno`, `cargo`, `foto`) VALUES
('aaaa111111123LP', 111111123, 'LP', 'aa', 'aa', 'aaa', 'a', 'imagenes/aaaa111111123LP.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciondm`
--

CREATE TABLE `asignaciondm` (
  `codigo` int(11) NOT NULL,
  `codMateria` varchar(100) NOT NULL,
  `codDocente` int(12) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignaciondm`
--

INSERT INTO `asignaciondm` (`codigo`, `codMateria`, `codDocente`, `fecha`) VALUES
(1, 'PROG', 10934187, '2021-06-07'),
(2, 'QUI', 10934187, '2021-06-07'),
(3, 'RED', 10934187, '2021-06-07'),
(4, 'MAT', 8765712, '2021-06-07'),
(5, 'ALG', 8765712, '2021-06-07'),
(6, 'QUI', 10934187, '2021-06-08'),
(7, 'RED', 10934187, '2021-06-14'),
(8, 'QUI', 10934187, '2021-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacionem`
--

CREATE TABLE `asignacionem` (
  `codigo` int(11) NOT NULL,
  `codMateria` varchar(100) NOT NULL,
  `codEstudiante` int(12) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacionem`
--

INSERT INTO `asignacionem` (`codigo`, `codMateria`, `codEstudiante`, `fecha`) VALUES
(1, 'MAT', 76431, '2021-06-07'),
(2, 'ALG', 76431, '2021-06-07'),
(3, 'PROG', 76431, '2021-06-07'),
(4, 'RED', 76431, '2021-06-07'),
(5, 'QUI', 65745641, '2021-06-07'),
(6, 'MAT', 65745641, '2021-06-07'),
(7, 'PROG', 65745641, '2021-06-07'),
(8, 'ALG', 65745641, '2021-06-07'),
(12, 'PROG', 123333, '2021-06-08'),
(13, 'ALG', 123333, '2021-06-08'),
(14, 'ALG', 34561, '2021-06-08'),
(15, 'PROG-Programacion', 34561, '2021-06-08'),
(16, 'MAT-Matematicas', 34561, '2021-06-08'),
(17, 'RED', 34561, '2021-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `codigo` varchar(30) NOT NULL,
  `ci` int(15) NOT NULL,
  `extension` varchar(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`codigo`, `ci`, `extension`, `nombre`, `paterno`, `materno`, `foto`) VALUES
('ddd55555LP', 55555, 'LP', 'dd', 'ddd', 'dd', 'imagenes/ddd55555LP.jpg'),
('DVZ8765712PTS', 8765712, 'PTS', 'Daniela', 'Vargaz', 'Zurita', 'imagenes/DVZ8765712PTS.jpg'),
('JTJ10934187LP', 10934187, 'LP', 'Jorge', 'Trocel', 'Justiniano', 'imagenes/JTJ10934187LP.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codigo` varchar(20) NOT NULL,
  `ci` int(15) NOT NULL,
  `extension` varchar(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codigo`, `ci`, `extension`, `nombre`, `paterno`, `materno`, `foto`) VALUES
('aaa111LP', 111, 'LP', 'aa', 'a', 'a', 'imagenes/aaa111LP.jpg'),
('DSE34561CBBA', 34561, 'CBBA', 'Daniel', 'Sanchez', 'Escalante', 'imagenes/DSE34561CBBA.jpg'),
('JCF76431PND', 76431, 'PND', 'Juan', 'Cuevas', 'Figueredo', 'imagenes/JCF76431PND.jpg'),
('PBn123333OR', 123333, 'OR', 'Pamela', 'Bazober', 'nabhsnmd', 'imagenes/PBn123333OR.jpg'),
('VZv65745641CH', 65745641, 'CH', 'Valentina', 'Zurita', 'vargas', 'imagenes/VZv65745641CH.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `sigla` varchar(10) NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`sigla`, `nombre`) VALUES
('ALG', 'Algebra lineal'),
('BDD', 'base de datos'),
('LAN', 'lenguaje'),
('MAT', 'Matematicas'),
('PROG', 'Programacion'),
('QUI', 'Quimica'),
('RED', 'Redes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `ci` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` text NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `paterno`, `materno`, `ci`, `usuario`, `clave`, `estado`) VALUES
(1, 'jorge', 'trocel', 'justiniano', 10934187, 'jtrocell', '$2y$10$9FCzU6Byq4E7wzYbjBvQ6OMSPXNc9Vf32JBDj9JqQ.VGarhb/ceR2', b'1'),
(2, 'santiago', 'soliz', 'vargas', 12341, 'ssoliz', '$2y$10$nvFzTwQcPWFTdrdlDFZKPuUCgY22epRe8ZU82tDM0ksh.7dkfTrpa', b'1'),
(3, 'lucia', 'humeres', 'vargas', 12345, 'lhumeres', '$2y$10$NA8qx0KTKAusZrgAc6n1muz5FRnlFIHHVw.l28PS4X8VmgkTUx7PK', b'1'),
(4, 'andres', 'plata', 'j', 54321, 'aplata', '$2y$10$50kA/M1eoApk/uX2B5q/GelU2p/gVEIL6PXkxzb3wIqHiOUPvU7GG', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `asignaciondm`
--
ALTER TABLE `asignaciondm`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `asignacionem`
--
ALTER TABLE `asignacionem`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`sigla`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciondm`
--
ALTER TABLE `asignaciondm`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asignacionem`
--
ALTER TABLE `asignacionem`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
