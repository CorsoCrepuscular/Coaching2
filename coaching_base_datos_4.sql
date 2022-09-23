-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2022 a las 07:27:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coaching_base_datos_4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `nombreAgenda` varchar(45) NOT NULL,
  `fechaAgenda` varchar(10) NOT NULL,
  `horaAgenda` varchar(5) NOT NULL,
  `calleAgenda` varchar(45) NOT NULL,
  `numeroAgenda` varchar(10) NOT NULL,
  `localidadAgenda` varchar(45) NOT NULL,
  `provinciaAgenda` varchar(45) NOT NULL,
  `paisAgenda` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `nombreAgenda`, `fechaAgenda`, `horaAgenda`, `calleAgenda`, `numeroAgenda`, `localidadAgenda`, `provinciaAgenda`, `paisAgenda`) VALUES
(1, 'Meeting', '1968-05-24', '12:02', 'Pez', '12', 'Madrid', 'Madrid', 'España'),
(5, 'Conferencia', '2022-09-15', '12:14', 'Tristeza', '123', 'Badajoz', 'Badajoz', 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `idCarro` int(11) NOT NULL,
  `importeTotalCarro` int(11) NOT NULL,
  `fechaCarro` varchar(10) NOT NULL,
  `modoPagoCarro` varchar(45) NOT NULL,
  `cuentaPagoCarro` varchar(45) NOT NULL,
  `facturaCarro` int(11) NOT NULL,
  `cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(45) NOT NULL,
  `apellidosCliente` varchar(45) NOT NULL,
  `calleCliente` varchar(45) NOT NULL,
  `numeroCliente` int(11) NOT NULL,
  `localidadCliente` varchar(45) NOT NULL,
  `provinciaCliente` varchar(45) NOT NULL,
  `paisCliente` varchar(45) NOT NULL,
  `telefonoCliente` varchar(12) NOT NULL,
  `emailCliente` varchar(45) NOT NULL,
  `nifCliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCliente`, `apellidosCliente`, `calleCliente`, `numeroCliente`, `localidadCliente`, `provinciaCliente`, `paisCliente`, `telefonoCliente`, `emailCliente`, `nifCliente`) VALUES
(1, 'a', 'a', 'a', 1, 'a', 'a', 'a', '1', 'a', '1'),
(2, 'b', 'b', 'b', 2, 'b', 'b', 'b', '23', 'b', '2'),
(3, 'Javier', 'Serrano', 'Luz', 2, 'Puertollano', 'Ciudad Real', 'España', '1234567', 'javier@hotmail.com', '7313814R');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL,
  `nombreServicio` varchar(45) NOT NULL,
  `descripcionServicio` varchar(70) NOT NULL,
  `precioServicio` int(11) NOT NULL,
  `carro_idCarro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `emailUsuario` varchar(40) NOT NULL,
  `keywordUsuario` varchar(10) NOT NULL,
  `rolUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`emailUsuario`, `keywordUsuario`, `rolUsuario`) VALUES
('', 'pepe', 'user'),
('ana@gmail.com', 'ana', 'user'),
('javierserrano5@hotmail.com', 'onacra1968', 'admin'),
('javierserrano6@hotmail.com', 'pandora', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD UNIQUE KEY `id_agenda_UNIQUE` (`idAgenda`);

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`idCarro`),
  ADD UNIQUE KEY `id_carro_UNIQUE` (`idCarro`),
  ADD KEY `fk_carro_cliente1_idx` (`cliente_idCliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`idCliente`),
  ADD UNIQUE KEY `nif_cliente_UNIQUE` (`nifCliente`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`,`carro_idCarro`),
  ADD UNIQUE KEY `id_servicio_UNIQUE` (`idServicio`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombreServicio`),
  ADD UNIQUE KEY `descripcion_UNIQUE` (`descripcionServicio`),
  ADD KEY `fk_servicio_carro1_idx` (`carro_idCarro`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`emailUsuario`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`emailUsuario`),
  ADD UNIQUE KEY `keyword_UNIQUE` (`keywordUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `idCarro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carro`
--
ALTER TABLE `carro`
  ADD CONSTRAINT `fk_carro_cliente1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_servicio_carro1` FOREIGN KEY (`carro_idCarro`) REFERENCES `carro` (`idCarro`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
