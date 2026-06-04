-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2026 a las 03:35:17
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
-- Base de datos: `teachers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_teacher` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `materia` varchar(200) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `dias` varchar(255) NOT NULL,
  `horario` varchar(255) NOT NULL,
  `cumple` varchar(200) NOT NULL,
  `frase` varchar(500) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_teacher`, `nombre`, `materia`, `correo`, `dias`, `horario`, `cumple`, `frase`, `imagen`) VALUES
(1, 'Miss Keiry', 'English', 'keiry.rodiguez@adoc.superate.org', 'Mon-Fri', '7:00 A.M- 7:00 P.M', '29-08', '“Inspirando mentes a través del idioma.”', 'keiry.jpeg'),
(2, 'Teacher Kevin', 'Computing', 'kevin.hernandez@adoc.superate.org', 'Mon-Fri', '7:00 A.M- 7:00 P.M', '27-09', '“Enseñando el futuro de la tecnología.”', ''),
(3, 'Miss Analú', 'Values', 'ana.nieto@adoc.superate.org', 'Mon-Fri', '7:00 A.M- 7:00 P.M', '18-11', '“Los valores moldean quiénes somos.”', 'analu.jpeg'),
(4, 'Miss Marielos', 'Values', 'jessica.angel@adoc.superate.org', 'Mon-Fri', '7:00 A.M-7:00 P.M', '19-09', 'Sé honesto, sé amable, sé tù', 'marielos.jpeg'),
(5, 'Teacher Carlos', 'English', 'carlos.ponce@adoc.superate.org', 'Mon-Fri', '7:00 A.M- 7:00 P.M', '20-11', '“Cada palabra nueva te acerca a tus metas.”', 'carlos.jpeg'),
(6, 'Teacher Emerson', 'Computing', 'emerson.orellana@adoc.superate.org', 'Mon-Fri', '7:00 A.M- 7:00 P.M', '16-05', '“Un error hoy es experiencia mañana.”', ''),
(7, 'Miss Blanqui', 'Sub-directora', 'blanca.melendez@adocsuperte.org.sv', 'Mon-Fri', '7:00 A.M- 7:00 P.M', '17-03', '“El liderazgo se demuestra con ejemplo y compromiso.”', ''),
(8, 'Miss Blanqui', 'English', 'blanca.portillo@adoc.superate.org.sv', 'Mon-Fri', '7:00 A.M-7:00 P.M', '17-03', '“La confianza vale más que la pronunciación perfecta.”', 'blancap.jpeg'),
(9, 'Miss Jessica', 'Administradora', 'jessica.gonzales@adoc.superate.org.sv', 'Mon-Fri', '7:00 SA.M- 7:00 P.M', '18-09', '“El éxito de una organización comienza con una gestión eficiente.”', 'jessi.jpeg'),
(10, 'Teacher Ben', 'Director', 'benhur.zepeda@adoc.superate.org', 'Mon-Fri', '7:00 A.M-7:00 P.M', '26-02', '“El liderazgo verdadero se refleja en las acciones y el ejemplo.”', ''),
(11, 'Teacher Victor', 'English', 'victor.arias@adoc.superate.org', 'Mon-Fri', '7:00 A.M- 7:00 P.M', '19-08', '“Hablar inglés es abrir puertas al mundo.”', 'victor.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_teacher`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
