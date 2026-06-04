-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2026 a las 04:37:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nuestro_centrodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classrooms`
--

CREATE TABLE `classrooms` (
  `classroom` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `normas` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classroomss`
--

CREATE TABLE `classroomss` (
  `classroom` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `caracteristicas` varchar(100) NOT NULL,
  `normas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `classroomss`
--

INSERT INTO `classroomss` (`classroom`, `descripcion`, `caracteristicas`, `normas`) VALUES
('Classroom 1', 'Espacio versátil para talleres, capacitaciones, reuniones y actividades extracurriculares.', 'Espacio amplio y cómodo. Proyector y audio. Aire acondicionado.', 'Cumplir con el horario de limpieza correspondiente. Evitar manchar mesas. Evitar permanecer dentro s'),
('Classroom 2', 'Ambiente ideal para el aprendizaje del idioma inglés, informática y valores con recursos audiovisual', 'Espacio amplio y cómodo. Proyector y audio. Aire acondicionado.', 'Cumplir con el horario de limpieza correspondiente. Evitar manchar mesas. Evitar permanecer dentro s'),
('Classroom 3', ' Ambiente ideal para el aprendizaje del idioma inglés, informática y valores con recursos audiovisua', 'Espacio amplio y cómodo. Proyector y audio. Aire acondicionado.', 'Cumplir con el horario de limpieza correspondiente. Evitar manchar mesas. Evitar permanecer dentro s'),
('Classroom 4', ' Aula equipada con computadoras e internet para aprender herramientas tecnológicas y desarrollar hab', 'Espacio amplio y cómodo. Proyector y audio. Aire acondicionado.', 'Cumplir con el horario de limpieza correspondiente. Evitar manchar mesas. Evitar permanecer dentro s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `classroom1` varchar(50) NOT NULL,
  `classroom2` varchar(50) NOT NULL,
  `classroom3` varchar(50) NOT NULL,
  `classroom4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
