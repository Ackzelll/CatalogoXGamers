-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-12-2024 a las 20:31:06
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuegos_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `plataforma` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `jugadores` varchar(50) NOT NULL,
  `visible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `imagen`, `plataforma`, `categoria`, `jugadores`, `visible`) VALUES
(1, 'God of War', 'https://www.gamereactor.es/media/62/godwar_2126213b.png', 'PS3', 'Acción', '1', 1),
(2, 'Cuphead', 'https://uvejuegos.com/img/caratulas/64913/Cuphead-ps4.jpg', 'Switch', 'Aventura', '2', 1),
(3, 'asdasd', 'sadasd', 'PS3', 'RPG', '1', 1),
(4, 'asff', 'fadsfsd', 'PS3', 'Acción', '1', 1),
(5, 'prueba', 'klsdk', 'Switch', 'Aventura', '2', 1),
(6, 'pppñ', 'sdafklj', 'PS3', 'Acción', '1', 1),
(7, 'gasdf', 'https://www.gamereactor.es/media/62/godwar_2126213b.png', 'PS3', 'Acción', '1', 1),
(8, 'ooasdfgk', 'ksdjf', 'PS3', 'Acción', '1', 1),
(9, 'dfgasdg', '344', 'PS3', 'Acción', '1', 1),
(10, 'fasdfsa', 'sadf', 'PS3', 'Acción', '1', 1),
(11, 'fdsgh', 'gfd', 'PS3', 'Acción', '1', 1),
(12, 'gfsdg', 'gfd', 'PS3', 'Acción', '1', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
