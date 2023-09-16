-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2023 a las 21:11:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventaautomoviles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_producto` int(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_producto`, `nombre`, `correo`, `password`) VALUES
(1, 'admin', 'Admin@gmail.com', '123'),
(2, 'colaborador', 'Colaborador@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `imagen_producto` varchar(1000) NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `id_usuario`, `id_producto`, `nombre_usuario`, `nombre_producto`, `imagen_producto`, `precio_producto`, `cantidad`) VALUES
(48, 62, 3, 'Prueba', 'Ranger Raptor 2023', '9ford-ranger-raptor-2023.jpg', 801000, 1),
(110, 1, 7, 'Mau', 'Civic 2023', '1Honda-Civic.jpg', 545900, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `fecha`, `total`, `id_usuario`) VALUES
(136, '2023-06-15 15:50:07', 801000, 58),
(137, '2023-06-15 20:50:04', 801000, 58),
(138, '2023-06-15 20:50:46', 801000, 58),
(139, '2023-06-15 20:51:57', 801000, 58),
(140, '2023-06-19 06:16:37', 3171600, 1),
(141, '2023-06-19 14:15:42', 5300300, 69),
(142, '2023-06-19 14:20:01', 1346900, 69),
(143, '2023-06-19 14:20:22', 0, 69),
(144, '2023-06-19 14:21:46', 2791600, 69),
(145, '2023-06-19 14:26:01', 380000, 70),
(146, '2023-06-19 14:28:27', 3592600, 70),
(147, '2023-06-19 14:30:13', 5134400, 69),
(148, '2023-06-19 14:31:08', 2791600, 69),
(149, '2023-06-19 18:55:21', 3953400, 71),
(150, '2023-07-13 03:53:28', 801000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_productos`
--

CREATE TABLE `historial_productos` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_historial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_productos`
--

INSERT INTO `historial_productos` (`id`, `id_producto`, `id_historial`) VALUES
(1, 3, 136),
(2, 3, 137),
(3, 3, 138),
(4, 3, 139),
(5, 6, 140),
(6, 10, 140),
(7, 7, 141),
(8, 8, 141),
(9, 9, 141),
(10, 6, 141),
(11, 3, 141),
(12, 7, 142),
(13, 3, 142),
(14, 6, 144),
(15, 10, 145),
(16, 6, 146),
(17, 3, 146),
(18, 6, 147),
(19, 3, 147),
(20, 8, 147),
(21, 9, 147),
(22, 10, 147),
(23, 6, 148),
(24, 6, 149),
(25, 9, 149),
(26, 8, 149),
(27, 3, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `id_marca` int(255) NOT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `stock` int(50) DEFAULT NULL,
  `id_sucursal` int(255) DEFAULT NULL,
  `sucursal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `id_marca`, `marca`, `precio`, `tipo`, `descripcion`, `imagen`, `stock`, `id_sucursal`, `sucursal`) VALUES
(3, 'Ranger Raptor 2023', 1, 'Ford', 801000, 'Camionetas', ' Ford Ranger es un referente de capacidad y fuerza. Para 2023, la icónica Pickup tiene una totalmente nueva y mejorada apariencia tanto en el exterior como en el interior. Además, ofrece un mejor desempeño y nuevas funciones tecnológicas para que puedas realizar todas tus actividades de trabajo y recreativas con total confianza y seguridad.', '9ford-ranger-raptor-2023.jpg', 1, 1, 'C. Nueva Escocia 1885, 44630'),
(6, 'GTR R35', 2, 'Nissan', 2791600, 'Deportivos', 'El Nissan GT-R está equipado con un motor de gasolina V6 bi-turbo de 3.8 litros cuya potencia ha ido evolucionando: en 2007 ofrecía 480 CV', '5NissanGTR.jpg', 1, 2, 'Av. de las Américas 1166, Country Club'),
(7, 'Civic 2023', 1, 'Honda', 545900, 'Sedan', 'Honda Civic no es para cualquier conductor. Muestra un diseño aerodinámico y sin saturaciones, un diseño que da de qué hablar. Sus dimensiones como su frente ahora más alargado, le suman presencia consiguiendo una silueta más robusta y deportiva.', '1Honda-Civic.jpg', 1, 3, 'Av. del Servidor Público 981, 45019'),
(8, 'Fit 2023', 1, 'Honda', 276900, 'Hatchback', 'El modelo Fit cuenta con una amplia gama de accesorios que se pueden incluir en los precios del auto cuando se compra nuevo. ', '2HondaFit.jpg', 2, 1, 'C. Nueva Escocia 1885, 44630'),
(9, 'Silverado 2023', 4, 'Chevrolet', 884900, 'Camionetas', 'Chevrolet Silverado es la camioneta ideal para realizar todo tipo de trabajo pesado y que sigue avanzando para ofrecerte su nuevo motor Turbo Eficiente†, especialmente diseñado para pickups.', 'Chevrolet Silverado2023.jpg', 2, 1, 'C. Nueva Escocia 1885, 44630'),
(10, 'Groove2023', 4, 'Chevrolet', 380000, 'Camionetas', 'Groove 2023 con motor 4 cilindros de 1.5L, transmisión manual de 6 velocidades o automática.Motor 1.5L de 4 cilindros, 110 HP de potencia, 108 libras-pie de torque\r\n, Transmisión manual de 6 velocidades, Dirección electroasistida Suspensión delantera tipo McPherson y trasera barra de torsión', 'Chevrolet Groove2023.jpg', 1, 2, 'Av. de las Américas 1166, Country Club');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedor`
--

CREATE TABLE `provedor` (
  `id` int(255) NOT NULL,
  `marca_producto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provedor`
--

INSERT INTO `provedor` (`id`, `marca_producto`) VALUES
(1, 'Honda'),
(2, 'Nissan'),
(3, 'Ford'),
(4, 'Chevrolet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `direccion`) VALUES
(1, 'C. Nueva Escocia 1885, 44630'),
(2, 'Av. de las Américas 1166, Country Club'),
(3, 'Av. del Servidor Público 981, 45019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `edad` int(3) NOT NULL,
  `pais` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `password`, `telefono`, `edad`, `pais`) VALUES
(1, 'Mau', 'mauhector7@gmail.com', '123', 2147483647, 0, ''),
(40, 'Pancho', 'panco@gmail.com', '123', 3232323, 32, 'Mexico'),
(41, 'Edna', 'Edna10@gmail.com', '12345', 2147483647, 0, ''),
(48, 'Carlos', 'Carlos27@gmail.com', '1234', 17421508, 0, ''),
(49, 'Elsa', 'Elsa10@gmail.com', '1234', 2147483647, 0, ''),
(51, 'Carlos Garcia Zamora	', 'Carlos2431@gmail.com', '1124', 2147483647, 0, ''),
(57, 'Erick Ivan Lopez', 'Erick500@gmail.com', '123', 33142354, 0, ''),
(58, 'Hector Mau', 'rodriguez.salazar.hector1@gmail.com', '123', 1432190834, 0, ''),
(62, 'Prueba', 'algo@algo.com', '12345', 1234567890, 0, ''),
(63, 'Carlos', 'Carlos21@gmail.com', '123', 32323, 12, 'Mexico'),
(65, 'Carlos Garcia Zamora', 'Carlos424@gmail.com', '123', 32323233, 23, 'Canadá'),
(66, 'Javier Adrian Santos Garcia', 'adrian@gmail.com', '12345', 3312323233, 23, 'España'),
(67, 'Beto', 'beto@gmail.com', '123', 3313232323, 22, 'Mexico'),
(69, 'Rosa', 'rsantana@ceti.mx', '123', 33233232, 0, ''),
(70, 'FSEEF', 'jair.alberto1905@gmaIl.com', '123456789', 3312354702, 23, 'Mexico'),
(71, 'Diana', 'dianacuevas024@gmail.com', '123', 3232423, 20, 'Mexico'),
(72, 'Hector', 'a21310416@ceti.mx', '123', 123212312, 21, 'Mexico'),
(73, 'Kevin Miguel', 'victoriaiscander1521@gmail.com', '123', 323223, 21, 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_info`
--

CREATE TABLE `usuario_info` (
  `id_usuarioinfo` int(11) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `no_ext` int(11) NOT NULL,
  `colonia` varchar(60) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cuenta` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_info`
--

INSERT INTO `usuario_info` (`id_usuarioinfo`, `calle`, `no_ext`, `colonia`, `id_usuario`, `cuenta`) VALUES
(10, 'Valle de las turmalinas', 23, 'cww', 58, ''),
(11, 'dwed', 23323, 'ewed', 58, ''),
(12, 'fvgv', 434, 'trgr', 58, '3rrfr'),
(13, 'Valle de las Rubies', 2704, 'Jardines de Colon', 1, 'MRFR434r34'),
(14, 'dwedew', 3223, 'ewde', 69, '32d2edwe'),
(15, 'nueva escocia', 47800, 'providencia', 69, '34535345345'),
(16, 'nueva escocia', 47800, 'providencia', 69, '34535345345'),
(17, '', 0, '', 69, ''),
(18, 'aaaaa', 666, 'quesoporte', 70, '671234'),
(19, 'rthu', 666, 'providencia', 70, '34535345345'),
(20, '', 0, '', 69, ''),
(21, 'dwqdqw', 212, 'qwdq', 69, '2323dwq'),
(22, 'Valle de los que te importa', 32323, 'No se', 71, 'd3d3dd43ed'),
(23, '', 0, '', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_historial` (`id_historial`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `producto_ibfk_2` (`id_marca`);

--
-- Indices de la tabla `provedor`
--
ALTER TABLE `provedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_info`
--
ALTER TABLE `usuario_info`
  ADD PRIMARY KEY (`id_usuarioinfo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_producto` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `usuario_info`
--
ALTER TABLE `usuario_info`
  MODIFY `id_usuarioinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  ADD CONSTRAINT `historial_productos_ibfk_1` FOREIGN KEY (`id_historial`) REFERENCES `historial` (`id`),
  ADD CONSTRAINT `historial_productos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `provedor` (`id`);

--
-- Filtros para la tabla `usuario_info`
--
ALTER TABLE `usuario_info`
  ADD CONSTRAINT `usuario_info_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
