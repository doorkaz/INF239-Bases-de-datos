-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2023 a las 07:15:02
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_wishlist` (IN `val` VARCHAR(200), IN `id` INT(11))   BEGIN 
    UPDATE usuarios
    SET wishlist=(
        CASE WHEN wishlist=''
            THEN val
            ELSE concat_WS('\,',wishlist, val)
        END
    )
    WHERE id_usuario = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp(),
  `bool` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Hotel Mistral', 4, 30000, 'Santiago', 25, 10, 0, 1, 1, 0, 0),
(3, 'Hotel Leyton', 3, 50000, 'Santiago', 25, 10, 0, 1, 0, 1, 1),
(4, 'Hotel Chillan', 2, 25000, 'Chillan', 25, 20, 0, 1, 0, 0, 1),
(5, 'Hotel Valle del Elqui', 1, 15000, 'Coquimbo', 25, 10, 0, 1, 0, 0, 0),
(6, 'Hotel Valdivia', 3, 30000, 'Valdivia', 45, 2, 0, 0, 1, 1, 1),
(7, 'Hotel Loa', 4, 45000, 'Calama', 45, 2, 0, 0, 0, 0, 0),
(8, 'Hotel La Serena', 2, 25000, 'La Serena', 45, 5, 0, 0, 0, 1, 0),
(9, 'Hotel Pork', 1, 15000, 'Santiago', 45, 5, 0, 0, 1, 1, 1),
(10, 'Hotel Lagartijo', 3, 30000, 'Antofagasta', 20, 10, 1, 1, 0, 0, 0),
(11, 'Hotel Iguana', 4, 45000, 'Antofagasta', 20, 5, 0, 0, 0, 0, 0),
(12, 'Hotel Lagarto', 2, 25000, 'Antofagasta', 20, 1, 0, 0, 0, 1, 0),
(13, 'Hotel John', 1, 15000, 'Santiago', 10, 5, 0, 0, 0, 0, 1),
(14, 'Hotel Ciudad Real', 3, 30000, 'Santiago', 10, 2, 0, 0, 1, 0, 0),
(15, 'Hotel Montaña Roja', 4, 45000, 'La Serena', 10, 2, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_pack` int(11) NOT NULL,
  `hid1` int(11) NOT NULL,
  `hid2` int(11) NOT NULL,
  `hid3` int(11) NOT NULL,
  `Nombre_pack` varchar(200) NOT NULL,
  `aero_ida` varchar(200) NOT NULL,
  `aero_vuelta` text NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_llegada` date NOT NULL,
  `total_noches` int(11) NOT NULL,
  `precio_persona` int(11) NOT NULL,
  `cant_pack_disp` int(11) NOT NULL,
  `total_packs` int(11) NOT NULL,
  `total_person_pack` int(11) NOT NULL,
  `Num_estrellas` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_pack`, `hid1`, `hid2`, `hid3`, `Nombre_pack`, `aero_ida`, `aero_vuelta`, `fecha_salida`, `fecha_llegada`, `total_noches`, `precio_persona`, `cant_pack_disp`, `total_packs`, `total_person_pack`, `Num_estrellas`) VALUES
(1, 2, 4, 3, 'Paquete Bronze', 'NotSky', 'NotSky', '2024-04-01', '2024-04-01', 1, 1, 1, 1, 1, 1),
(2, 2, 5, 3, 'Paquete Silver', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 250000, 4, 10, 5, 5),
(3, 3, 6, 3, 'Paquete Emerald', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 350000, 4, 10, 5, 5),
(4, 3, 7, 6, 'Paquete Global', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 25000000, 4, 10, 5, 5),
(5, 4, 8, 6, 'Paquete Diamond', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 2500000, 4, 10, 5, 3),
(6, 4, 9, 6, 'Paquete Star', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 1200000, 3, 10, 5, 2),
(7, 5, 10, 9, 'Paquete Copper', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 540000, 3, 10, 5, 5),
(8, 5, 11, 9, 'Paquete Obsidian', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 500000, 4, 10, 5, 4),
(9, 1, 12, 9, 'Paquete Oblivion', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 25000, 4, 10, 5, 1),
(10, 1, 13, 3, 'Paquete Skyrim', 'Sky', 'Latam Airlines', '2024-09-30', '2024-07-02', 90, 5000, 4, 10, 3, 1),
(11, 10, 14, 3, 'Paquete Morrowind', 'Sky', 'Latam Airlines', '2024-09-25', '2024-07-02', 85, 5000, 3, 10, 5, 4),
(12, 10, 15, 3, 'Paquete Whiterun', 'Sky', 'Latam Airlines', '2024-07-30', '2024-05-02', 89, 500000, 2, 10, 5, 5),
(13, 11, 1, 6, 'Paquete Ventalia', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 340000, 1, 10, 3, 5),
(14, 11, 1, 6, 'Paquete Falkreath', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 1200000, 5, 10, 4, 3),
(15, 12, 1, 6, 'Paquete Riften', 'Sky', 'Latam Airlines', '2024-06-30', '2024-05-02', 59, 2300000, 4, 10, 2, 2),
(16, 15, 1, 1, 'Paquete Orgrimmar', 'NotSky', 'NotSky', '2024-04-01', '2024-04-01', 1, 1, 1, 1, 1, 1);

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
  `Contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Correo`, `Nombre`, `Fecha_Nacimiento`, `Contrasena`) VALUES
(1, 'juan@mail.com', 'juan', '2003-05-01', 'juan'),
(3, 'pedro@mail.com', 'pedro', '2002-02-12', 'pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bool` tinyint(1) NOT NULL COMMENT '1 if paquete 0 if hotel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_pack`),
  ADD KEY `hid1` (`hid1`),
  ADD KEY `hid2` (`hid2`),
  ADD KEY `hid3` (`hid3`);

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
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_pack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `paquetes_ibfk_1` FOREIGN KEY (`hid1`) REFERENCES `hoteles` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paquetes_ibfk_2` FOREIGN KEY (`hid2`) REFERENCES `hoteles` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paquetes_ibfk_3` FOREIGN KEY (`hid3`) REFERENCES `hoteles` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
