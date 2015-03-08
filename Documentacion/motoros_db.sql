-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2015 a las 22:52:35
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `motoros_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE IF NOT EXISTS `alquiler` (
`alq_id` int(11) NOT NULL,
  `alq_cli_id` int(11) NOT NULL,
  `alq_observaciones` varchar(300) NOT NULL,
  `alq_tipo` varchar(20) NOT NULL,
  `alq_fecha` date NOT NULL,
  `alq_fechafin` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`alq_id`, `alq_cli_id`, `alq_observaciones`, `alq_tipo`, `alq_fecha`, `alq_fechafin`) VALUES
(1, 1, 'hola mundo ;)', 'Contado', '0000-00-00', '0000-00-00'),
(2, 1, 'ooi jiji', 'Contado', '0000-00-00', '0000-00-00'),
(3, 1, 'no hay', 'Contado', '0000-00-00', '0000-00-00'),
(20, 1, 'sdfsdf', 'Crédito', '2015-01-01', '0000-00-00'),
(21, 1, 'sdfsdf', 'Crédito', '2015-01-01', '0000-00-00'),
(22, 1, 'sdfsdf', 'Crédito', '2015-01-01', '0000-00-00'),
(23, 1, 'sdfsdf', 'Crédito', '2015-01-01', '0000-00-00'),
(24, 1, 'a', 'Crédito', '0000-00-00', '0000-00-00'),
(25, 1, 'ok', 'Crédito', '0000-00-00', '0000-00-00'),
(26, 2, 'efsd', 'Contado', '0000-00-00', '0000-00-00'),
(27, 13, 'ok', 'Contado', '0000-00-00', '0000-00-00'),
(28, 1, 'sad', 'Contado', '0000-00-00', '0000-00-00'),
(29, 1, 'prueba 1', 'Contado', '0000-00-00', '0000-00-00'),
(30, 1, 'prueba 1', 'Contado', '0000-00-00', '0000-00-00'),
(32, 7, 'me mame', 'Crédito', '0000-00-00', '0000-00-00'),
(34, 1, '', 'Crédito', '0000-00-00', '0000-00-00'),
(36, 1, '', 'Contado', '0000-00-00', '0000-00-00'),
(37, 2, 'nuevo cliente', 'Crédito', '0000-00-00', '0000-00-00'),
(38, 2, 'poiuytrew', 'Contado', '0000-00-00', '0000-00-00'),
(39, 5, '', 'Contado', '0000-00-00', '0000-00-00'),
(40, 7, '', 'Contado', '0000-00-00', '0000-00-00'),
(41, 12, '', 'Contado', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
`ban_id` int(11) NOT NULL,
  `ban_nombre` varchar(15) NOT NULL,
  `ban_nit` varchar(20) NOT NULL,
  `ban_cuenta` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`ban_id`, `ban_nombre`, `ban_nit`, `ban_cuenta`) VALUES
(1, 'Bancolombia', '', ''),
(2, 'Davivienda', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`cli_id` int(11) NOT NULL,
  `cli_cedula` int(11) NOT NULL,
  `cli_nombre` varchar(20) NOT NULL,
  `cli_apellido` varchar(20) NOT NULL,
  `cli_direccion` varchar(50) NOT NULL,
  `cli_barrio` varchar(50) NOT NULL,
  `cli_telefono` int(11) NOT NULL,
  `cli_celular` text NOT NULL,
  `cli_ciudad` varchar(20) NOT NULL,
  `cli_observaciones` varchar(300) NOT NULL,
  `cli_tipo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_cedula`, `cli_nombre`, `cli_apellido`, `cli_direccion`, `cli_barrio`, `cli_telefono`, `cli_celular`, `cli_ciudad`, `cli_observaciones`, `cli_tipo`) VALUES
(1, 1053818270, 'Edwin Andrés', 'Zapata Ocampo', 'Calle 15 No 18 - 26', 'Chipre', 8916182, '3137514761', 'Manizales', 'Ok ', 'Regular'),
(2, 30315673, 'Esperanza', 'Ocampo', 'chipre', 'chipre', 8912345, '312345678', 'Manizales', 'ok', 'Paga Diario'),
(5, 3, 'juan', 'perez', 'sadsada', 'sadsada', 3242, '67546435', 'Manizales', 'ok', 'contado'),
(6, 4, 'ana', 'bedoya', 'dada', 'dada', 42, '25342342', 'Manizales', 'ok', 'contado'),
(7, 5, 'roberto', 'aristizabal', 'dadada', 'dadada', 42, '144543', 'Manizales', 'ok', 'contado'),
(8, 6, 'pedro', 'perez', 'dadsada', 'dadsada', 34234242, '6465676', 'Manizales', 'ok', 'credito'),
(9, 7, 'mariana', 'guerrero', 'dfdytr', 'dfdytr', 3545657, '576568678', 'Manizales', 'ok', 'credito'),
(10, 8, 'sofia', 'ocampo', 'hdh6uey', 'hdh6uey', 68578567, '678', 'Manizales', 'ok', 'credito'),
(11, 9, 'felipe', 'grisales', 'ergaedfgtrrsh', 'ergaedfgtrrsh', 5674564, '56735673', 'Manizales', 'ok', 'credito'),
(12, 10, 'beatriz', 'vallejo', 'strhjstrjusrt', 'strhjstrjusrt', 2147483647, '54634634', 'Manizales', 'ok', 'credito'),
(13, 30239208, 'Maria', 'Hernandez', 'cra 23 133', 'olaya', 6654564, '3116497308', 'Manizales', 'mala pagadora', 'Regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_adicional`
--

CREATE TABLE IF NOT EXISTS `control_adicional` (
`con_id` int(11) NOT NULL,
  `con_lin_id` int(11) NOT NULL,
  `con_fecha` date NOT NULL,
  `con_facturacion` int(11) NOT NULL,
  `con_descuentos` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_adicional`
--

INSERT INTO `control_adicional` (`con_id`, `con_lin_id`, `con_fecha`, `con_facturacion`, `con_descuentos`) VALUES
(1, 16, '0000-00-00', 1234556, 12),
(5, 20, '0000-00-00', 200000, 0),
(6, 20, '0000-00-00', 100000, 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_banco`
--

CREATE TABLE IF NOT EXISTS `detalle_banco` (
`detban_id` int(11) NOT NULL,
  `detban_ban_id` int(11) NOT NULL,
  `detban_cli_id` int(11) NOT NULL,
  `detban_fecha` date NOT NULL,
  `detban_transaccion` varchar(15) NOT NULL,
  `detban_valor` int(11) NOT NULL,
  `detban_detalle` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_banco`
--

INSERT INTO `detalle_banco` (`detban_id`, `detban_ban_id`, `detban_cli_id`, `detban_fecha`, `detban_transaccion`, `detban_valor`, `detban_detalle`) VALUES
(1, 1, 1, '2015-02-02', 'Debe', 258400, 'Comprobante de 20 sim ..'),
(2, 1, 2, '0000-00-00', 'Debe', 23456, 'comprobante unico'),
(3, 1, 1, '0000-00-00', 'Debe', 0, ''),
(4, 1, 1, '0000-00-00', 'Debe', 0, ''),
(5, 2, 7, '0000-00-00', 'Debe', 0, ''),
(6, 1, 13, '0000-00-00', 'Debe', 0, ''),
(7, 2, 13, '0000-00-00', 'Debe', 0, 'prueba :D'),
(8, 1, 1, '0000-00-00', 'Debe', 0, ''),
(9, 1, 9, '0000-00-00', 'Debe', 0, 'qwer'),
(12, 1, 2, '0000-00-00', 'Debe', 0, 'prueba final final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialinea`
--

CREATE TABLE IF NOT EXISTS `historialinea` (
`his_id` int(11) NOT NULL,
  `his_lin_id` int(11) NOT NULL,
  `his_alq_id` int(11) NOT NULL,
  `his_valor_minvend` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historialinea`
--

INSERT INTO `historialinea` (`his_id`, `his_lin_id`, `his_alq_id`, `his_valor_minvend`) VALUES
(2, 2, 23, 40),
(6, 2, 24, 56),
(7, 5, 25, 87),
(8, 5, 26, 80),
(10, 2, 27, 34),
(11, 2, 1, 23),
(16, 9, 36, 12),
(17, 2, 37, 60),
(18, 2, 38, 12),
(19, 12, 39, 1),
(20, 5, 41, 12),
(21, 2, 41, 23),
(22, 16, 41, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
`lin_id` int(11) NOT NULL,
  `lin_pla_id` int(11) NOT NULL,
  `lin_numero` int(11) NOT NULL,
  `lin_corte` int(11) NOT NULL,
  `lin_estado` varchar(30) NOT NULL,
  `lin_operador` varchar(50) NOT NULL,
  `lin_vlorminvend` int(11) NOT NULL,
  `lin_minutosconsumidos` int(11) NOT NULL,
  `lin_pasaminutos` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`lin_id`, `lin_pla_id`, `lin_numero`, `lin_corte`, `lin_estado`, `lin_operador`, `lin_vlorminvend`, `lin_minutosconsumidos`, `lin_pasaminutos`) VALUES
(2, 4, 2147483647, 4, 'Disponible', 'Claro', 34, 0, 0),
(5, 4, 2147483647, 4, 'Disponible', 'Claro', 87, 0, 0),
(8, 4, 2147483647, 4, 'Disponible', 'Claro', 58, 0, 0),
(9, 4, 2147483647, 4, 'Disponible', 'Claro', 180, 0, 0),
(10, 4, 2147483647, 4, 'Disponible', 'Claro', 244, 0, 0),
(11, 5, 2147483647, 4, 'Alquilada', 'Claro', 90, 0, 0),
(12, 4, 1, 4, 'Disponible', 'Claro', 65, 0, 0),
(13, 4, 2147483647, 4, 'Alquilada', 'Movistar', 98, 0, 0),
(16, 3, 2313, 6, 'Disponible', 'Claro', 34, 0, 0),
(17, 4, 0, 2, 'Suspendida falta de pago', 'Claro', 0, 0, 0),
(20, 1, 0, 4, 'Disponible', 'Claro', 0, 0, 0),
(22, 6, 999999999, 2, 'Disponible', 'Claro', 23, 0, 0),
(23, 6, 2147483647, 2, 'Disponible', 'Claro', 0, 300, 200),
(24, 6, 2147483647, 2, 'Devuelta al operador', 'Claro', 12, 300, 200),
(25, 6, 2147483647, 6, 'Alquilada', 'Virgin mobile', 23, 300, 20),
(26, 6, 2147483647, 2, 'Disponible', 'Claro', 12, 300, 20),
(27, 6, 2147483647, 2, 'Disponible', 'Tigo', 23, 300, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE IF NOT EXISTS `nomina` (
`nomquin_id` int(11) NOT NULL,
  `nomquin_usu_id` int(11) NOT NULL,
  `nomquin_nomina` int(11) NOT NULL,
  `nomquin_diaslaborados` int(11) NOT NULL,
  `nomquin_descuentos` int(11) NOT NULL,
  `nomquin_descuadres` int(11) NOT NULL,
  `nomquin_liquidacion` int(11) NOT NULL,
  `nomquin_novedades` varchar(50) NOT NULL,
  `nomquin_fechainicio` date NOT NULL,
  `nomquin_fechafin` date NOT NULL,
  `nomquin_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`nomquin_id`, `nomquin_usu_id`, `nomquin_nomina`, `nomquin_diaslaborados`, `nomquin_descuentos`, `nomquin_descuadres`, `nomquin_liquidacion`, `nomquin_novedades`, `nomquin_fechainicio`, `nomquin_fechafin`, `nomquin_total`) VALUES
(1, 1, 12000, 30, 0, 0, 12000, '', '0000-00-00', '0000-00-00', 372000),
(2, 1, 23400, 20, 23000, 24000, 10000, 'no', '2015-02-02', '2015-02-15', 431000),
(3, 1, 1000, 10, 2000, 2000, 4000, '', '0000-00-00', '0000-00-00', 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE IF NOT EXISTS `operacion` (
`ope_id` int(11) NOT NULL,
  `ope_cli_id` int(11) NOT NULL,
  `ope_usu_id` int(11) NOT NULL,
  `ope_tipo` varchar(20) NOT NULL,
  `ope_valor` int(11) NOT NULL,
  `ope_fecha` date NOT NULL,
  `ope_nfactura` int(11) NOT NULL,
  `ope_observaciones` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`ope_id`, `ope_cli_id`, `ope_usu_id`, `ope_tipo`, `ope_valor`, `ope_fecha`, `ope_nfactura`, `ope_observaciones`) VALUES
(1, 1, 1, 'Clientes', 0, '0000-00-00', 0, ''),
(2, 6, 1, 'Pago Préstamos', 1200, '0000-00-00', 0, ''),
(4, 12, 1, 'Caja Fuerte', 12000, '0000-00-00', 90, 'ok'),
(5, 11, 1, 'Pago Préstamos', 12, '0000-00-00', 1234, 'asdasd'),
(6, 13, 1, 'Pago Préstamos', 1234, '2015-02-21', 123, 'qwee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
`pla_id` int(11) NOT NULL,
  `pla_nombre` varchar(50) NOT NULL,
  `pla_totalmin` int(11) NOT NULL,
  `pla_vlrmin` int(11) NOT NULL,
  `pla_cargobasico` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`pla_id`, `pla_nombre`, `pla_totalmin`, `pla_vlrmin`, `pla_cargobasico`) VALUES
(1, 'plan mas', 780, 76, 87900),
(2, 'plan minutos', 78, 87, 15800),
(3, 'minutos por montones', 87, 180, 78987),
(4, 'plan sin limites', 2000, 7, 2000),
(5, 'plan sin limites 5', 850, 60, 125900),
(6, 'Plan para hablar y hablar', 1500, 23, 78000),
(7, 'andres', 123, 23, 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_empleado`
--

CREATE TABLE IF NOT EXISTS `prestamo_empleado` (
`emppre_id` int(11) NOT NULL,
  `emppre_usu_id` int(11) NOT NULL,
  `emppre_fecha` int(11) NOT NULL,
  `emppre_valor` int(11) NOT NULL,
  `emppre_cuotas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo_empleado`
--

INSERT INTO `prestamo_empleado` (`emppre_id`, `emppre_usu_id`, `emppre_fecha`, `emppre_valor`, `emppre_cuotas`) VALUES
(1, 1, 0, 500000, 0),
(2, 1, 0, 34000, 0),
(3, 1, 2015, 500000, 0),
(4, 1, 0, 7000, 0),
(5, 1, 0, 7000, 0),
(6, 1, 0, 7000, 0),
(7, 1, 0, 7000, 0),
(8, 1, 0, 9, 1),
(9, 1, 0, 2000, 8),
(10, 1, 2015, 80000, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(20) NOT NULL,
  `usu_apellido` varchar(20) NOT NULL,
  `usu_cedula` int(11) NOT NULL,
  `usu_fotografia` blob NOT NULL,
  `usu_direccion` varchar(50) NOT NULL,
  `usu_telefono` varchar(50) NOT NULL,
  `usu_nick` varchar(20) NOT NULL,
  `usu_contrasena` varchar(150) NOT NULL,
  `usu_fechaingreso` date NOT NULL,
  `usu_fechaegreso` date NOT NULL,
  `usu_tipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_cedula`, `usu_fotografia`, `usu_direccion`, `usu_telefono`, `usu_nick`, `usu_contrasena`, `usu_fechaingreso`, `usu_fechaegreso`, `usu_tipo`) VALUES
(1, 'Andres', 'Zapata', 1053818270, 0x30, 'Chipre', '8916182', 'andres', '231badb19b93e44f47da1bd64a8147f2', '2014-12-01', '0000-00-00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
 ADD PRIMARY KEY (`alq_id`,`alq_cli_id`), ADD KEY `alq_cli_id` (`alq_cli_id`);

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
 ADD PRIMARY KEY (`ban_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `control_adicional`
--
ALTER TABLE `control_adicional`
 ADD PRIMARY KEY (`con_id`,`con_lin_id`), ADD KEY `con_lin_id` (`con_lin_id`);

--
-- Indices de la tabla `detalle_banco`
--
ALTER TABLE `detalle_banco`
 ADD PRIMARY KEY (`detban_id`,`detban_ban_id`,`detban_cli_id`), ADD KEY `detban_ban_id` (`detban_ban_id`), ADD KEY `detban_cli_id` (`detban_cli_id`);

--
-- Indices de la tabla `historialinea`
--
ALTER TABLE `historialinea`
 ADD PRIMARY KEY (`his_id`,`his_lin_id`,`his_alq_id`), ADD KEY `his_alq_id` (`his_alq_id`), ADD KEY `his_lin_id` (`his_lin_id`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
 ADD PRIMARY KEY (`lin_id`,`lin_pla_id`), ADD KEY `lin_pla_id` (`lin_pla_id`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
 ADD PRIMARY KEY (`nomquin_id`,`nomquin_usu_id`), ADD KEY `nomquin_usu_id` (`nomquin_usu_id`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
 ADD PRIMARY KEY (`ope_id`,`ope_cli_id`,`ope_usu_id`), ADD KEY `ope_cli_id` (`ope_cli_id`), ADD KEY `ope_usu_id` (`ope_usu_id`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`pla_id`);

--
-- Indices de la tabla `prestamo_empleado`
--
ALTER TABLE `prestamo_empleado`
 ADD PRIMARY KEY (`emppre_id`,`emppre_usu_id`), ADD KEY `emppre_usu_id` (`emppre_usu_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
MODIFY `alq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `control_adicional`
--
ALTER TABLE `control_adicional`
MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_banco`
--
ALTER TABLE `detalle_banco`
MODIFY `detban_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `historialinea`
--
ALTER TABLE `historialinea`
MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
MODIFY `lin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
MODIFY `nomquin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
MODIFY `ope_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
MODIFY `pla_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `prestamo_empleado`
--
ALTER TABLE `prestamo_empleado`
MODIFY `emppre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`alq_cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control_adicional`
--
ALTER TABLE `control_adicional`
ADD CONSTRAINT `control_adicional_ibfk_1` FOREIGN KEY (`con_lin_id`) REFERENCES `linea` (`lin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_banco`
--
ALTER TABLE `detalle_banco`
ADD CONSTRAINT `detalle_banco_ibfk_1` FOREIGN KEY (`detban_ban_id`) REFERENCES `banco` (`ban_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detalle_banco_ibfk_2` FOREIGN KEY (`detban_cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historialinea`
--
ALTER TABLE `historialinea`
ADD CONSTRAINT `historialinea_ibfk_1` FOREIGN KEY (`his_alq_id`) REFERENCES `alquiler` (`alq_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `historialinea_ibfk_2` FOREIGN KEY (`his_lin_id`) REFERENCES `linea` (`lin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `linea`
--
ALTER TABLE `linea`
ADD CONSTRAINT `linea_ibfk_1` FOREIGN KEY (`lin_pla_id`) REFERENCES `plan` (`pla_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
ADD CONSTRAINT `nomina_ibfk_1` FOREIGN KEY (`nomquin_usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
ADD CONSTRAINT `operacion_ibfk_1` FOREIGN KEY (`ope_cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `operacion_ibfk_2` FOREIGN KEY (`ope_usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo_empleado`
--
ALTER TABLE `prestamo_empleado`
ADD CONSTRAINT `prestamo_empleado_ibfk_1` FOREIGN KEY (`emppre_usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
