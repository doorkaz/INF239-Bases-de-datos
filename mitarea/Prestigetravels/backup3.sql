-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 09:25:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prestigetravels`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id_hotel` int(11) NOT NULL,
  `Nombre_hotel` varchar(200) NOT NULL,
  `Num_estrellas` int(11) NOT NULL,
  `Precio_noche` int(11) NOT NULL,
  `Ciudad` varchar(200) NOT NULL,
  `cant_total_hab` int(11) NOT NULL,
  `hab_disp` int(11) NOT NULL,
  `estacionamiento` tinyint(1) NOT NULL,
  `piscina` tinyint(1) NOT NULL,
  `serv_lavanderia` tinyint(1) NOT NULL,
  `pet_friend` tinyint(1) NOT NULL,
  `serv_desayuno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id_hotel`, `Nombre_hotel`, `Num_estrellas`, `Precio_noche`, `Ciudad`, `cant_total_hab`, `hab_disp`, `estacionamiento`, `piscina`, `serv_lavanderia`, `pet_friend`, `serv_desayuno`) VALUES
(1, 'Hotel Torres', 5, 100000, 'Santiago', 50, 4, 1, 1, 1, 1, 1),
(2, 'Hotel Mistral', 4, 30000, 'Santiago', 1, 1, 0, 0, 0, 0, 0),
(3, 'Hotel Leyton', 3, 50000, 'Santiago', 1, 1, 0, 0, 0, 0, 0),
(4, 'Hotel Chillan', 2, 25000, 'Chillan', 1, 1, 0, 0, 0, 0, 0),
(5, 'Hotel Valle del Elqui', 1, 15000, 'Santiago', 1, 1, 0, 0, 0, 0, 0),
(6, 'Hotel Valdivia', 3, 30000, 'Santiago', 1, 1, 0, 0, 0, 0, 0),
(7, 'Hotel Loa', 4, 45000, 'Santiago', 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_pack` int(11) NOT NULL,
  `Nombre_pack` varchar(200) NOT NULL,
  `aero_ida` varchar(200) NOT NULL,
  `aero_vuelta` text NOT NULL,
  `ciudades` text NOT NULL,
  `hospedajes` text NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_llegada` date NOT NULL,
  `total_noches` int(11) NOT NULL,
  `precio_persona` int(11) NOT NULL,
  `cant_pack_disp` int(11) NOT NULL,
  `total_packs` int(11) NOT NULL,
  `total_person_pack` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_pack`, `Nombre_pack`, `aero_ida`, `aero_vuelta`, `ciudades`, `hospedajes`, `fecha_salida`, `fecha_llegada`, `total_noches`, `precio_persona`, `cant_pack_disp`, `total_packs`, `total_person_pack`) VALUES
(1, 'Pack estafoso', 'NotSky', 'NotSky', 'Los Angeles, Las Vegas, Tu casa', 'Totalmente no una estafa, Casa de usuario', '2024-04-01', '2024-04-02', 1, 1, 1, 1, 1),
(2, 'Ultra Super Hyper Enhanced Millonario Pack Deluxe Remix Update Styled Up And Knuckles Dark moon wii sports donkey kong and Dante from the devil may pack series of packs from ocarina of time', 'Sky', 'Sky', 'Santiago, Las vegas, Nueva York, Tokyo, Kyoto, Atlantis, La Luna, La antartida, El sol, Moscú, Ciudad John Pork, Knuckles', 'John Pork, Vegas Box, York pork, Tokyo pork, Kyoto deluxe hotel, Atlantic Hotel, Moon Hotel, Antartic Premium, Sun Hotel, Nyet Hotel, John Pork de John Pork, Knuckles Cool House', '2069-05-02', '2069-06-30', 100, 5000, 4, 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena_hotel`
--

CREATE TABLE `resena_hotel` (
  `id_hotel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `limpieza` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `decoracion` int(11) NOT NULL,
  `Calidad_cama` int(11) NOT NULL,
  `texto_resena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena_pack`
--

CREATE TABLE `resena_pack` (
  `id_pack` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calidad_hoteles` int(11) NOT NULL,
  `transporte` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `rel_cal_precio` int(11) NOT NULL,
  `texto_resena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `top_hoteles`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `top_hoteles` (
`id_hotel` int(11)
,`Nombre_hotel` varchar(200)
,`Num_estrellas` int(11)
,`Precio_noche` int(11)
,`Ciudad` varchar(200)
,`cant_total_hab` int(11)
,`hab_disp` int(11)
,`estacionamiento` tinyint(1)
,`piscina` tinyint(1)
,`serv_lavanderia` tinyint(1)
,`pet_friend` tinyint(1)
,`serv_desayuno` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Contrasena` varchar(30) NOT NULL,
  `wishlist` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Correo`, `Nombre`, `Fecha_Nacimiento`, `Contrasena`, `wishlist`) VALUES
(1, 'juan@mail.com', 'juan', '2003-05-01', 'juan', 'a'),
(3, 'pedro@mail.com', 'pedro', '2002-02-12', 'pedro', '');

-- --------------------------------------------------------

--
-- Estructura para la vista `top_hoteles`
--
DROP TABLE IF EXISTS `top_hoteles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_hoteles`  AS SELECT `hoteles`.`id_hotel` AS `id_hotel`, `hoteles`.`Nombre_hotel` AS `Nombre_hotel`, `hoteles`.`Num_estrellas` AS `Num_estrellas`, `hoteles`.`Precio_noche` AS `Precio_noche`, `hoteles`.`Ciudad` AS `Ciudad`, `hoteles`.`cant_total_hab` AS `cant_total_hab`, `hoteles`.`hab_disp` AS `hab_disp`, `hoteles`.`estacionamiento` AS `estacionamiento`, `hoteles`.`piscina` AS `piscina`, `hoteles`.`serv_lavanderia` AS `serv_lavanderia`, `hoteles`.`pet_friend` AS `pet_friend`, `hoteles`.`serv_desayuno` AS `serv_desayuno` FROM `hoteles` ORDER BY `hoteles`.`Num_estrellas` DESC LIMIT 0, 10 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_pack`);

--
-- Indices de la tabla `resena_hotel`
--
ALTER TABLE `resena_hotel`
  ADD PRIMARY KEY (`id_hotel`,`id_usuario`),
  ADD KEY `id_hotel` (`id_hotel`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `resena_pack`
--
ALTER TABLE `resena_pack`
  ADD PRIMARY KEY (`id_pack`,`id_usuario`),
  ADD KEY `id_pack` (`id_pack`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_pack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `resena_hotel`
--
ALTER TABLE `resena_hotel`
  ADD CONSTRAINT `resena_hotel_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resena_hotel_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resena_pack`
--
ALTER TABLE `resena_pack`
  ADD CONSTRAINT `resena_pack_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resena_pack_ibfk_2` FOREIGN KEY (`id_pack`) REFERENCES `paquetes` (`id_pack`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
