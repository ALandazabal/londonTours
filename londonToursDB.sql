-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2019 a las 00:09:11
-- Versión del servidor: 10.3.12-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id8773520_mysql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_comentary`
--

CREATE TABLE `t_comentary` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_place`
--

CREATE TABLE `t_place` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tour`
--

CREATE TABLE `t_tour` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `price` double NOT NULL,
  `itinerary` varchar(4096) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tour_place`
--

CREATE TABLE `t_tour_place` (
  `id` int(11) NOT NULL,
  `fk_tour` int(11) NOT NULL,
  `fk_place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(150) NOT NULL,
  `postcode` varchar(150) NOT NULL,
  `fk_user_type` int(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_user_tour`
--

CREATE TABLE `t_user_tour` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nTickets` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `fk_tour` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_user_type`
--

CREATE TABLE `t_user_type` (
  `id` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_user_type`
--

INSERT INTO `t_user_type` (`id`, `desc`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_comentary`
--
ALTER TABLE `t_comentary`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_place`
--
ALTER TABLE `t_place`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_tour`
--
ALTER TABLE `t_tour`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_tour_place`
--
ALTER TABLE `t_tour_place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_t_tour_place_t_tour` (`fk_tour`),
  ADD KEY `FK_t_tour_place_t_place` (`fk_place`);

--
-- Indices de la tabla `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_t_user_t_user_type` (`fk_user_type`);

--
-- Indices de la tabla `t_user_tour`
--
ALTER TABLE `t_user_tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_t_user_tour_t_user` (`fk_user`),
  ADD KEY `FK_t_user_tour_t_tour` (`fk_tour`);

--
-- Indices de la tabla `t_user_type`
--
ALTER TABLE `t_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_tour_place`
--
ALTER TABLE `t_tour_place`
  ADD CONSTRAINT `FK_t_tour_place_t_place` FOREIGN KEY (`fk_place`) REFERENCES `t_place` (`id`),
  ADD CONSTRAINT `FK_t_tour_place_t_tour` FOREIGN KEY (`fk_tour`) REFERENCES `t_tour` (`id`);

--
-- Filtros para la tabla `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `FK_t_user_t_user_type` FOREIGN KEY (`fk_user_type`) REFERENCES `t_user_type` (`id`);

--
-- Filtros para la tabla `t_user_tour`
--
ALTER TABLE `t_user_tour`
  ADD CONSTRAINT `FK_t_user_tour_t_tour` FOREIGN KEY (`fk_tour`) REFERENCES `t_tour` (`id`),
  ADD CONSTRAINT `FK_t_user_tour_t_user` FOREIGN KEY (`fk_user`) REFERENCES `t_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
