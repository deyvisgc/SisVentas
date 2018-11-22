-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 18:23:59
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `idalmacen` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `compra_compra_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`idalmacen`, `idproducto`, `compra_compra_id`) VALUES
(2, 7, NULL),
(3, 7, NULL),
(4, 8, NULL),
(5, 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre_cate` varchar(50) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre_cate`, `estado`) VALUES
(3, 'Bebidas', 'Activado'),
(4, 'Golosinas', 'Activado'),
(5, 'Enlatados', 'Activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `tipoPersona_idtipoPersona` int(11) NOT NULL,
  `clien_estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `tipoPersona_idtipoPersona`, `clien_estado`) VALUES
(1, 1, 'Activado'),
(2, 2, 'Activado'),
(3, 3, 'Activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `compra_id` int(11) NOT NULL,
  `fecha_comp` varchar(150) DEFAULT NULL,
  `provedor_idprovedor` int(11) DEFAULT NULL,
  `producto_idproducto` int(11) DEFAULT NULL,
  `precio_compra` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`compra_id`, `fecha_comp`, `provedor_idprovedor`, `producto_idproducto`, `precio_compra`) VALUES
(1, '22:11:18  11:09:15', 2, NULL, '12.00'),
(2, '22:11:18  11:10:07', 2, 9, '4005.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `iddetallecompra` int(11) NOT NULL,
  `idcompra` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `precio_venta` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`iddetallecompra`, `idcompra`, `cantidad`, `id_producto`, `precio_venta`) VALUES
(9, 1, 4, 6, '12');

--
-- Disparadores `detallecompra`
--
DELIMITER $$
CREATE TRIGGER `aumentarStock` AFTER INSERT ON `detallecompra` FOR EACH ROW Update producto
set producto.STOCK = producto.stock + NEW.cantidad
where producto.idproducto = NEW.id_producto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `cantidad`, `id_producto`, `precio_venta`) VALUES
(1, 1, 2, 6, '45.00'),
(2, 1, 3, 6, '23.00'),
(3, NULL, 4, 7, '80.80'),
(4, 1, 4, 7, '80.80'),
(5, 1, 4, 7, '80.80'),
(6, 1, 4, 6, '80.80'),
(7, 1, 3, 7, '60.60'),
(8, 1, 3, 7, '60.60'),
(9, 1, 3, 6, '60.60'),
(10, 1, 3, 7, '60.60'),
(11, 1, 3, 6, '60.60'),
(12, 1, 4, 7, '80.80'),
(13, 1, 3, 6, '60.60'),
(14, 1, 3, 7, '60.60'),
(15, 1, 3, 6, '60.60'),
(16, 1, 10, 6, '202.00'),
(17, 1, 3, 7, '60.60'),
(18, 1, 3, 6, '60.60'),
(19, 1, 3, 6, '60.60'),
(20, 1, 3, 7, '60.60'),
(21, 1, 4, 6, '80.80'),
(22, 1, 4, 6, '80.80'),
(23, 1, 3, 7, '60.60'),
(24, 1, 3, 6, '60.60'),
(25, 1, 3, 7, '60.60'),
(26, 1, 4, 7, '80.80'),
(27, 1, 3, 7, '60.60'),
(28, 1, 3, 7, '60.60'),
(29, 1, 3, 7, '60.60'),
(30, 1, 3, 7, '60.60'),
(31, 1, 3, 7, '60.60'),
(32, 1, 3, 7, '60.60'),
(33, 1, 4, 6, '80.80'),
(34, 1, 6, 7, '121.20'),
(35, 1, 4, 7, '80.80'),
(36, 1, 5, 7, '101.00'),
(37, 1, 4, 7, '80.80'),
(38, 1, 4, 6, '80.80'),
(39, 1, 3, 6, '60.60'),
(40, 1, 4, 6, '80.80'),
(41, 1, 4, 6, '80.80'),
(42, 1, 4, 7, '80.80'),
(43, 1, 3, 6, '60.60'),
(44, 1, 4, 6, '80.80'),
(45, 1, 6, 7, '121.20'),
(46, 1, 3, 7, '60.60'),
(47, 1, 3, 6, '60.60'),
(48, 1, 6, 6, '121.20'),
(49, 1, 4, 7, '80.80'),
(50, 1, 4, 7, '80.80'),
(51, 1, 4, 7, '80.80'),
(52, 1, 4, 6, '80.80'),
(53, 1, 3, 7, '60.60'),
(54, 1, 4, 6, '80.80'),
(55, 1, 3, 7, '60.60'),
(56, 1, 2, 7, '40.40'),
(57, 1, 2, 7, '40.40'),
(58, 1, 3, 7, '60.60'),
(59, 1, 3, 6, '60.60'),
(60, 1, 3, 6, '60.60'),
(61, 1, 4, 7, '80.80'),
(62, 1, 4, 7, '80.80'),
(63, 1, 4, 6, '80.80'),
(64, 1, 4, 7, '80.80'),
(65, 1, 4, 7, '80.80'),
(66, 1, 4, 7, '80.80'),
(67, 1, 4, 7, '80.80'),
(68, 1, 4, 7, '80.80'),
(69, 1, 4, 7, '80.80'),
(70, 1, 4, 7, '80.80'),
(71, 1, 4, 7, '80.80'),
(72, 1, 4, 6, '80.80'),
(73, 1, 3, 7, '60.60'),
(74, 1, 4, 7, '80.80'),
(75, 1, 3, 7, '60.60'),
(76, 1, 4, 7, '80.80'),
(77, 1, 3, 7, '60.60'),
(78, 1, 4, 7, '80.80'),
(79, 1, 3, 7, '60.60'),
(80, 1, 4, 7, '80.80'),
(81, 1, 5, 7, '101.00'),
(82, 1, 8, 7, '161.60'),
(83, 1, 2, 7, '40.40'),
(84, 1, 3, 7, '60.60'),
(85, 1, 3, 7, '60.60'),
(86, 1, 4, 6, '80.80'),
(87, 1, 4, 7, '80.80'),
(88, 1, 3, 6, '60.60'),
(89, 1, 4, 6, '80.80'),
(90, 1, 5, 7, '101.00'),
(91, 1, 3, 6, '60.60'),
(92, 1, 3, 7, '60.60'),
(93, 1, 4, 6, '80.80'),
(94, 1, 2, 7, '40.40'),
(95, 1, 3, 6, '60.60'),
(96, 1, 3, 7, '60.60'),
(97, 1, 3, 7, '60.60'),
(98, 1, 3, 7, '60.60'),
(99, 1, 4, 6, '80.80'),
(100, 1, 2, 6, '40.40'),
(101, 1, 3, 7, '60.60'),
(102, 1, 5, 6, '101.00'),
(103, 1, 5, 7, '101.00'),
(104, 1, 4, 7, '80.80'),
(105, 1, 4, 6, '80.80'),
(106, 1, 4, 6, '80.80'),
(107, 1, 3, 7, '60.60'),
(108, 1, 4, 6, '80.80'),
(109, 1, 4, 6, '80.80'),
(110, 1, 4, 7, '80.80'),
(111, 1, 3, 7, '60.60'),
(112, 1, 3, 7, '60.60'),
(113, 1, 4, 7, '80.80'),
(114, 1, 4, 6, '80.80'),
(115, 1, 4, 7, '80.80'),
(116, 1, 4, 7, '80.80'),
(117, 1, 4, 7, '80.80'),
(118, 1, 4, 6, '80.80'),
(119, 1, 4, 6, '80.80'),
(120, 1, 4, 7, '80.80'),
(121, 1, 4, 7, '80.80'),
(122, 1, 5, 6, '101.00'),
(123, 1, 5, 7, '101.00'),
(124, 1, 4, 7, '80.80'),
(125, 1, 4, 7, '80.80'),
(126, 1, 4, 6, '80.80'),
(127, 1, 4, 7, '80.80'),
(128, 1, 3, 7, '60.60'),
(129, 1, 4, 6, '80.80'),
(130, 1, 5, 6, '101.00'),
(131, 1, 5, 7, '101.00'),
(132, 1, 5, 6, '101.00'),
(133, 1, 4, 7, '80.80'),
(134, 1, 4, 7, '80.80'),
(135, 1, 4, 6, '80.80'),
(136, 1, 4, 6, '80.80'),
(137, 1, 5, 7, '101.00'),
(138, 1, 5, 6, '101.00'),
(139, 1, 5, 7, '101.00'),
(140, 1, 5, 6, '101.00'),
(141, 1, 9, 7, '181.80'),
(142, 1, 5, 7, '101.00'),
(143, 1, 4, 6, '80.80'),
(144, 1, 5, 7, '101.00'),
(145, 1, 5, 6, '101.00'),
(146, 1, 6, 7, '121.20'),
(147, 1, 4, 7, '80.80'),
(148, 1, 4, 6, '80.80'),
(149, 1, 4, 7, '80.80'),
(150, 1, 4, 6, '80.80'),
(151, 1, 4, 7, '80.80'),
(152, 1, 4, 9, '18.00'),
(153, 1, 5, 7, '101.00'),
(154, 1, 4, 8, '10.00'),
(155, 1, 5, 8, '12.50');

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `DescontarStock` AFTER INSERT ON `detalle_venta` FOR EACH ROW Update producto
set producto.STOCK = producto.stock - NEW.cantidad
where producto.idproducto = NEW.id_producto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_conpra`
--

CREATE TABLE `orden_conpra` (
  `idorden_conpra` int(11) NOT NULL,
  `fecha_Regis_orde` datetime NOT NULL,
  `producto_idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orden_conpra`
--

INSERT INTO `orden_conpra` (`idorden_conpra`, `fecha_Regis_orde`, `producto_idproducto`) VALUES
(1, '2018-11-14 00:00:00', 7),
(2, '2018-11-27 00:00:00', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `Direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Apellido_Mater` varchar(45) DEFAULT NULL,
  `Apellido_Pater` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` varchar(45) DEFAULT NULL,
  `rol_idrol` int(11) NOT NULL,
  `Fecha_ingreso` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `dni`, `Direccion`, `telefono`, `email`, `Apellido_Mater`, `Apellido_Pater`, `Fecha_nacimiento`, `rol_idrol`, `Fecha_ingreso`) VALUES
(17, 'deyvis', '3434343', 'beyenai', '2323232', NULL, 'cercado', 'garcia', '11/26/2018', 1, NULL),
(18, 'sdsds', '2232', 'wwewe', '232323', '2332323232', 'sdsd', 'sddsd', '11/26/2018', 1, '11/28/2018'),
(19, 'genaro', '87451847', NULL, '156981326', 'loquita@upeu.edu.pe', 'espinoza', 'palomino', '12/13/2018', 2, '11/22/2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre_pro` varchar(100) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` varchar(512) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `Fecha_Registro` varchar(45) DEFAULT NULL,
  `Precio_Pro` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `idcategoria`, `codigo`, `nombre_pro`, `stock`, `descripcion`, `imagen`, `estado`, `Fecha_Registro`, `Precio_Pro`) VALUES
(6, 3, '2838383', 'coca kola', 4, 'esta bueno', 'descarga (2).jpg', 'producto desactivado', '17:11:18  00:43:10', 20.2),
(7, 3, '20', 'sublime', 740, '30', 'descarga.jpg', 'Activado', '17:11:18  00:43:41', 20.2),
(8, 4, '45151518151515', 'caramelito', 41, 'delicioso y jugosos', 'descarga.jpg', 'Activado', '22:11:18  10:34:51', 2.5),
(9, 4, '567413', 'pañales', 886, 'Prodcuto bueno', 'prodcuto_Default.png', 'Activado', '22:11:18  11:10:07', 4.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedor`
--

CREATE TABLE `provedor` (
  `idprovedor` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `tipoPersona_idtipoPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provedor`
--

INSERT INTO `provedor` (`idprovedor`, `estado`, `tipoPersona_idtipoPersona`) VALUES
(1, 'Activado', 4),
(2, 'Activado', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `rol_estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idroles`, `nombre_rol`, `rol_estado`) VALUES
(1, 'admin', 'Activado'),
(2, 'vendedor', 'Activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersona`
--

CREATE TABLE `tipopersona` (
  `idtipoPersona` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `Apellido_pat` varchar(45) DEFAULT NULL,
  `Apellido_Materno` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `gmail` varchar(45) DEFAULT NULL,
  `Fecha_Ingreso` varchar(50) DEFAULT NULL,
  `Fecha_nacimiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipopersona`
--

INSERT INTO `tipopersona` (`idtipoPersona`, `nombre`, `Apellido_pat`, `Apellido_Materno`, `Direccion`, `dni`, `telefono`, `sexo`, `gmail`, `Fecha_Ingreso`, `Fecha_nacimiento`) VALUES
(1, 'Juanito', 'Palomino', 'Ramirez', 'Santa Maria', 5455151, 78454561, NULL, 'juan@gmail.com', '12/02/2018', '11/29/2018'),
(2, 'Rodrigo', 'mallco', 'gutierrez', 'Betania', 48115, 784551515, 'Masculino', 'edycis@gmail.com', '11/24/2018', '11/16/2018'),
(3, 'Mariana', 'Lopez', 'Mascalolis', 'Betania', 765879674, 784551518, 'Femenino', 'betania@upeu.edu.pe', '11/27/2018', '11/28/2018'),
(4, 'provedor', 'deyvis', 'deyvis', 'Betania', 68481561, 845489651, NULL, 'betania@upeu.edu.pe', '12/06/2018', '11/22/2018'),
(5, 'garcia', 'cercado', 'mamani', 'Betania', 54845126, 896115616, 'Masculino', 'zannier@upeu.edu.pe', '11/22/2018', '11/22/2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `idRol`, `username`, `password`, `imagen`, `persona_idpersona`, `remember_token`) VALUES
(5, 'deyvis@gmail.com', 1, 'deyvis', '$2y$10$uXW6lLiKgV3RoHQPDY.HOeliiZH.SDGpaVxSXLcMIqxRfRFv24ZDK', 'default-avatar.png', 17, 'ccSvkJ1WtIsp9RIQBIg61FTpZpLGt0jt1jhYFVGrsPOJcoe4AGiMnkGP7YV6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `idVendedor` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`idVendedor`, `estado`, `persona_idpersona`) VALUES
(3, 'Activo', 18),
(4, 'Activado', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `total_venta` decimal(11,2) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `total_venta`, `cliente_idcliente`) VALUES
(1, '1280.00', 1),
(2, '80.80', 1),
(3, '60.60', 1),
(4, '121.20', 1),
(5, '121.20', 1),
(6, '60.60', 1),
(7, '60.60', 1),
(8, '60.60', 1),
(9, '60.60', 1),
(10, '80.80', 1),
(11, '80.80', 1),
(12, '161.60', 1),
(13, '323.20', 1),
(14, '585.80', 1),
(15, '181.80', 1),
(16, '323.20', 1),
(17, '323.20', 1),
(18, '98.80', 1),
(19, '123.50', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idalmacen`),
  ADD KEY `idproducto` (`idproducto`) USING BTREE,
  ADD KEY `fk_almacen_compra1_idx` (`compra_compra_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_cliente_tipoPersona1_idx` (`tipoPersona_idtipoPersona`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`compra_id`),
  ADD KEY `provedor_idprovedor` (`provedor_idprovedor`),
  ADD KEY `producto_idproducto` (`producto_idproducto`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`iddetallecompra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_idx` (`idventa`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `orden_conpra`
--
ALTER TABLE `orden_conpra`
  ADD PRIMARY KEY (`idorden_conpra`),
  ADD KEY `fk_orden_conpra_producto1_idx` (`producto_idproducto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `fk_persona_rol1_idx` (`rol_idrol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `provedor`
--
ALTER TABLE `provedor`
  ADD PRIMARY KEY (`idprovedor`),
  ADD KEY `fk_provedor_tipoPersona1_idx` (`tipoPersona_idtipoPersona`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indices de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  ADD PRIMARY KEY (`idtipoPersona`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_persona1_idx` (`persona_idpersona`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`idVendedor`),
  ADD KEY `fk_Vendedor_persona1_idx` (`persona_idpersona`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `cliente_idcliente` (`cliente_idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `idalmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `iddetallecompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `orden_conpra`
--
ALTER TABLE `orden_conpra`
  MODIFY `idorden_conpra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `provedor`
--
ALTER TABLE `provedor`
  MODIFY `idprovedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  MODIFY `idtipoPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `idVendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `fk_almacen_compra1` FOREIGN KEY (`compra_compra_id`) REFERENCES `compra` (`compra_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_tipoPersona1` FOREIGN KEY (`tipoPersona_idtipoPersona`) REFERENCES `tipopersona` (`idtipoPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra_provedor1` FOREIGN KEY (`provedor_idprovedor`) REFERENCES `provedor` (`idprovedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `fk_detalle_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_conpra`
--
ALTER TABLE `orden_conpra`
  ADD CONSTRAINT `fk_orden_conpra_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_articulo_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provedor`
--
ALTER TABLE `provedor`
  ADD CONSTRAINT `fk_provedor_tipoPersona1` FOREIGN KEY (`tipoPersona_idtipoPersona`) REFERENCES `tipopersona` (`idtipoPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `fk_Vendedor_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `validadstock` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-11-17 01:11:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
UPDATE producto set producto.estado='producto desactivado' WHERE stock<5;

END$$

CREATE DEFINER=`root`@`localhost` EVENT `ActivaPro` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-11-17 01:25:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
 UPDATE producto set producto.estado='Activado' WHERE stock>5;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
