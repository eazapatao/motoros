-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2015 a las 17:01:23
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`alq_id`, `alq_cli_id`, `alq_observaciones`, `alq_tipo`, `alq_fecha`, `alq_fechafin`) VALUES
(65, 14, '', 'Contado', '0000-00-00', '0000-00-00'),
(66, 14, 'qwertyu', 'Crédito', '0000-00-00', '0000-00-00'),
(67, 14, '', 'Contado', '0000-00-00', '0000-00-00');

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
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
`car_id` int(11) NOT NULL,
  `car_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`car_id`, `car_nombre`) VALUES
(1, 'Administrador'),
(2, 'Mensajero'),
(3, 'Auxiliar administrativo'),
(4, 'Ocacionales'),
(5, 'Pagadiario'),
(6, 'Ocacional');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_cedula`, `cli_nombre`, `cli_apellido`, `cli_direccion`, `cli_barrio`, `cli_telefono`, `cli_celular`, `cli_ciudad`, `cli_observaciones`, `cli_tipo`) VALUES
(14, 16078683, 'alejandro ', 'toro', 'crr 20 b# 58 a 01 casa 55', 'rosales', 8840847, '3013101828', 'manizales', 'dad', 'Regular');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_adicional`
--

INSERT INTO `control_adicional` (`con_id`, `con_lin_id`, `con_fecha`, `con_facturacion`, `con_descuentos`) VALUES
(1, 41, '2015-03-09', 68000, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_banco`
--

INSERT INTO `detalle_banco` (`detban_id`, `detban_ban_id`, `detban_cli_id`, `detban_fecha`, `detban_transaccion`, `detban_valor`, `detban_detalle`) VALUES
(13, 1, 14, '2015-03-09', 'Debe', 100000, ''),
(14, 1, 14, '2015-01-01', 'Haber', 700000, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocuenta`
--

CREATE TABLE IF NOT EXISTS `estadocuenta` (
`estcue_id` int(11) NOT NULL,
  `estcue_alq_id` int(11) NOT NULL,
  `estcue_desde` date NOT NULL,
  `estcue_hasta` date NOT NULL,
  `estcue_debe` int(11) NOT NULL,
  `estcue_abono` int(11) NOT NULL,
  `estcue_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialinea`
--

CREATE TABLE IF NOT EXISTS `historialinea` (
`his_id` int(11) NOT NULL,
  `his_lin_id` int(11) NOT NULL,
  `his_alq_id` int(11) NOT NULL,
  `his_valor_minvend` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
`lin_id` int(11) NOT NULL,
  `lin_pla_id` int(11) NOT NULL,
  `lin_numero` varchar(11) NOT NULL,
  `lin_corte` int(11) NOT NULL,
  `lin_estado` varchar(30) NOT NULL,
  `lin_operador` varchar(50) NOT NULL,
  `lin_minutosconsumidos` int(11) NOT NULL,
  `lin_pasaminutos` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`lin_id`, `lin_pla_id`, `lin_numero`, `lin_corte`, `lin_estado`, `lin_operador`, `lin_minutosconsumidos`, `lin_pasaminutos`) VALUES
(41, 8, '3013558978', 2, 'Alquilada', 'Claro', 1150, 85),
(42, 8, '3016589698', 12, 'Alquilada', 'Movistar', 1150, 0),
(43, 8, '1111111111', 12, 'Devuelta al operador', 'Tigo', 23, 0),
(44, 8, '2222222222', 6, 'Alquilada', 'Claro', 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`pla_id`, `pla_nombre`, `pla_totalmin`, `pla_vlrmin`, `pla_cargobasico`) VALUES
(8, '1150', 1150, 55, 63250);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(11) NOT NULL,
  `usu_car_id` int(11) NOT NULL,
  `usu_nombre` varchar(20) NOT NULL,
  `usu_apellido` varchar(20) NOT NULL,
  `usu_cedula` int(11) NOT NULL,
  `usu_direccion` varchar(50) NOT NULL,
  `usu_telefono` varchar(50) NOT NULL,
  `usu_nick` varchar(20) NOT NULL,
  `usu_contrasena` varchar(150) NOT NULL,
  `usu_fechaingreso` date NOT NULL,
  `usu_fechaegreso` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_car_id`, `usu_nombre`, `usu_apellido`, `usu_cedula`, `usu_direccion`, `usu_telefono`, `usu_nick`, `usu_contrasena`, `usu_fechaingreso`, `usu_fechaegreso`) VALUES
(2, 1, 'Andres', 'Zapata', 1053818270, 'Calle 15 # 18-26', '8888888', 'andres', '231badb19b93e44f47da1bd64a8147f2', '2015-03-03', '0000-00-00'),
(4, 3, 'maria', 'perez', 232432432, '', '23453245', 'maria', 'maria', '2015-03-04', '0000-00-00'),
(5, 4, 'juan', 'perez', 3243242, '', '', 'juan', 'juan', '0000-00-00', '0000-00-00'),
(6, 5, 'jose', 'jose', 3242432, '', '', 'jose', 'jose', '0000-00-00', '0000-00-00'),
(8, 6, 'ocacional', 'ocacional', 10989898, 'alskdj', 'lkj', 'ocacional', 'fgdfg', '0000-00-00', '0000-00-00');

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
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
 ADD PRIMARY KEY (`car_id`);

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
-- Indices de la tabla `estadocuenta`
--
ALTER TABLE `estadocuenta`
 ADD PRIMARY KEY (`estcue_id`,`estcue_alq_id`), ADD KEY `estcue_alq_id` (`estcue_alq_id`);

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
 ADD PRIMARY KEY (`usu_id`,`usu_car_id`), ADD KEY `usu_car_id` (`usu_car_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
MODIFY `alq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `control_adicional`
--
ALTER TABLE `control_adicional`
MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `detalle_banco`
--
ALTER TABLE `detalle_banco`
MODIFY `detban_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `estadocuenta`
--
ALTER TABLE `estadocuenta`
MODIFY `estcue_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historialinea`
--
ALTER TABLE `historialinea`
MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
MODIFY `lin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
MODIFY `nomquin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
MODIFY `ope_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
MODIFY `pla_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `prestamo_empleado`
--
ALTER TABLE `prestamo_empleado`
MODIFY `emppre_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
-- Filtros para la tabla `estadocuenta`
--
ALTER TABLE `estadocuenta`
ADD CONSTRAINT `estadocuenta_ibfk_1` FOREIGN KEY (`estcue_alq_id`) REFERENCES `alquiler` (`alq_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usu_car_id`) REFERENCES `cargo` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;
