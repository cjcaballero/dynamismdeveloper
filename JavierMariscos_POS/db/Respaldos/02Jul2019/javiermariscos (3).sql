-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2019 a las 19:25:02
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `javiermariscos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catclientes`
--

CREATE TABLE `catclientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catclientes`
--

INSERT INTO `catclientes` (`id`, `nombre`, `idestatus`, `fecha`) VALUES
(1, 'Comedor', 1, '2019-06-25 21:56:54'),
(2, 'Servicio a Domicilio', 1, '2019-06-25 21:56:54'),
(3, 'Para Llevar', 1, '2019-06-25 21:56:54'),
(4, 'Uber eats', 1, '2019-06-25 21:56:54'),
(5, 'Sin Delantal', 1, '2019-06-25 21:56:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catplatillos`
--

CREATE TABLE `catplatillos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(350) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `precio` double NOT NULL,
  `descuento` double NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catplatillos`
--

INSERT INTO `catplatillos` (`id`, `nombre`, `imagen`, `precio`, `descuento`, `idcategoria`, `idstatus`, `fecha`) VALUES
(1, 'Cocktel Chico', '../images/Iconos/notimage.png', 50, 0, 3, 1, '2019-07-01 22:00:20'),
(2, 'Cocktel Mediano', '../images/Iconos/notimage.png', 70, 0, 3, 1, '2019-07-01 22:11:41'),
(3, 'Cocktel Grande', '../images/Iconos/notimage.png', 80, 0, 3, 1, '2019-07-01 22:12:31'),
(4, 'Vuelve Med.', '../images/Iconos/notimage.png', 80, 0, 3, 1, '2019-07-01 22:13:47'),
(5, 'Vuelve Gde.', '../images/Iconos/notimage.png', 90, 0, 3, 1, '2019-07-01 22:14:13'),
(6, 'Campechano Med.', '../images/Iconos/notimage.png', 75, 0, 3, 1, '2019-07-01 22:15:18'),
(7, 'Campechano Gde.', '../images/Iconos/notimage.png', 85, 0, 3, 1, '2019-07-01 22:15:11'),
(8, 'Mojarra Frita', '../images/Iconos/notimage.png', 100, 0, 1, 1, '2019-07-01 22:41:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catstatus`
--

CREATE TABLE `catstatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catstatus`
--

INSERT INTO `catstatus` (`id`, `nombre`, `fecha`) VALUES
(1, 'Activo', '2019-06-25 21:42:14'),
(2, 'Inactivo', '2019-06-25 21:42:14'),
(3, 'Nopagada', '2019-06-25 21:42:14'),
(4, 'Pagada', '2019-06-25 21:42:14'),
(5, 'Cancelada', '2019-06-25 21:42:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `civilstatus`
--

CREATE TABLE `civilstatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `civilstatus`
--

INSERT INTO `civilstatus` (`id`, `nombre`, `status`, `fechacreacion`) VALUES
(1, 'Seleccione', 1, '2019-05-24 02:14:29'),
(2, 'Soltero(a)', 1, '2019-05-18 03:53:21'),
(3, 'Casado(a)', 1, '2019-05-18 03:53:21'),
(4, 'Viudo(a)', 1, '2019-05-18 03:54:20'),
(5, 'Divorciado(a)', 1, '2019-05-18 03:53:21'),
(6, 'Union Libre', 1, '2019-05-18 03:53:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detcuenta`
--

CREATE TABLE `detcuenta` (
  `id` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `idplatillo` int(11) NOT NULL,
  `descplatillo` varchar(350) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detcuenta`
--

INSERT INTO `detcuenta` (`id`, `idCuenta`, `idplatillo`, `descplatillo`, `precio`, `cantidad`, `fecha`) VALUES
(2, 99, 8, 'Mojarra Frita', 100, 1, '2019-07-02 16:26:42'),
(3, 99, 8, 'Mojarra Frita', 100, 1, '2019-07-02 16:29:04'),
(4, 99, 8, 'Mojarra Frita', 100, 1, '2019-07-02 16:34:34'),
(6, 99, 2, 'Cocktel Mediano', 70, 1, '2019-07-02 16:34:44'),
(8, 99, 2, 'Cocktel Mediano', 70, 1, '2019-07-02 16:34:54'),
(14, 99, 8, 'Mojarra Frita', 100, 1, '2019-07-02 16:57:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `idestadocivil` int(11) NOT NULL,
  `idlugarnacimiento` int(11) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `horarioentrada` varchar(50) NOT NULL,
  `horariosalida` varchar(150) NOT NULL,
  `idpagosalario` int(11) NOT NULL,
  `salariodiario` int(11) NOT NULL,
  `salariototal` int(11) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `fechaingreso` date NOT NULL,
  `fechabaja` date NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `nombre`, `direccion`, `telefono`, `celular`, `idestadocivil`, `idlugarnacimiento`, `fechanacimiento`, `email`, `horarioentrada`, `horariosalida`, `idpagosalario`, `salariodiario`, `salariototal`, `foto`, `fechaingreso`, `fechabaja`, `fechacreacion`, `idestatus`) VALUES
(8, 'Carlos Jair Caballero Carrillo', 'Islas 2365', 2147483647, 2147483647, 3, 32, '1984-05-29', 'ccaballero.ext@axera.com', '10:00', '06:30', 5, 1167, 35000, 'descarga.png', '2019-05-27', '0000-00-00', '2019-05-27 17:00:24', 1),
(9, 'Rogelio Carrera', '4420 san agustin apart 6', 2147483647, 2147483647, 3, 12, '1985-05-27', 'watitas0529@gmail.com', '10:00', '07:00', 3, 215, 1500, '92f07226-440a-402f-9a6b-facd089d543c.jpg', '2019-05-27', '0000-00-00', '2019-05-27 17:05:38', 1),
(10, 'pedrito', '4420 san agustin apart 6', 2147483647, 849893843, 4, 8, '1985-05-27', 'pedrito@hotmail.com', '05:00', '10:00', 3, 258, 1800, '8fba6daf-84bb-4bb1-a4eb-14cf2e64ced4.jpg', '2019-05-27', '0000-00-00', '2019-05-27 17:28:49', 1),
(12, 'Panchito', 'pedorro 1234', 2147483647, 2147483647, 2, 8, '1980-05-27', 'eeeee@hotmail.com', '07:00', '10:00', 3, 746, 5220, '4af18a35-9570-44fe-9c18-2e81c1fdff64.jpg', '2019-05-27', '0000-00-00', '2019-05-27 21:03:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enccuenta`
--

CREATE TABLE `enccuenta` (
  `id` int(11) NOT NULL,
  `idCajero` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `mesaBanco` int(11) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `contacto` varchar(350) NOT NULL,
  `direccion` varchar(350) NOT NULL,
  `entrecalles` varchar(350) NOT NULL,
  `pagacon` double NOT NULL,
  `total` double NOT NULL,
  `iva` double NOT NULL,
  `cambio` double NOT NULL,
  `horapedido` time NOT NULL,
  `notas` varchar(500) NOT NULL,
  `idtipopago` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menucategorias`
--

CREATE TABLE `menucategorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `imagen` varchar(3000) NOT NULL,
  `color` varchar(50) NOT NULL,
  `padding` varchar(50) NOT NULL,
  `break` varchar(50) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menucategorias`
--

INSERT INTO `menucategorias` (`id`, `nombre`, `imagen`, `color`, `padding`, `break`, `idstatus`, `fecha`) VALUES
(1, 'Pescados', '../images/Iconos/pescados.png', '#4CAF50', '0px', '', 1, '2019-07-01 16:35:15'),
(3, 'Cocteles', '../images/Iconos/coctel.png', '#536DFE', '100px', 'echo \'<br><br><br><br><br><br> \';', 1, '2019-07-01 16:17:41'),
(4, 'Especiales', '../images/Iconos/especialidades.png', '#FFEB3B', '0px', '', 1, '2019-07-01 16:17:41'),
(5, 'entradas', '../images/Iconos/entradas.png', '#FF5722', '100px', 'echo \'<br><br><br><br><br><br> \';', 1, '2019-07-01 16:17:41'),
(6, 'tacos', '../images/Iconos/tacos.png', '#757575', '0px', '', 1, '2019-07-01 16:17:41'),
(7, 'filetes', '../images/Iconos/filetes.png', '#795548', '100px', 'echo \'<br><br><br><br><br><br> \';', 1, '2019-07-01 16:17:41'),
(8, 'caldos', '../images/Iconos/caldos.png', '#FF5252', '0px', '', 1, '2019-07-01 16:17:41'),
(9, 'camaron', '../images/Iconos/camarones.png', '#CDDC39', '100px', 'echo \'<br><br><br><br><br><br> \';', 1, '2019-07-01 16:17:41'),
(10, 'tostadas', '../images/Iconos/tostadas.png', '#212121', '0px', '', 1, '2019-07-01 16:17:41'),
(11, 'bebidas', '../images/Iconos/bebidas.png', '#E040FB', '100px', 'echo \'<br><br><br><br><br><br> \';', 1, '2019-07-01 16:17:41'),
(12, 'combos', '../images/Iconos/combo.png', '#7B1FA2', '0px', '', 1, '2019-07-01 16:17:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salarytype`
--

CREATE TABLE `salarytype` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salarytype`
--

INSERT INTO `salarytype` (`id`, `nombre`, `fecha`, `status`) VALUES
(1, 'Seleccione', '2019-05-24 03:39:11', 1),
(3, 'Semanal', '2019-05-24 03:39:11', 1),
(4, 'Quincenal', '2019-05-24 03:39:11', 1),
(5, 'Mensual', '2019-05-24 03:39:11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `nombre`, `fecha`, `status`) VALUES
(1, 'Seleccione', '2019-05-24 02:30:15', 1),
(2, 'Aguascalientes', '2019-05-24 02:30:15', 1),
(3, 'Baja California', '2019-05-24 02:30:15', 1),
(4, 'Baja California Sur', '2019-05-24 02:30:15', 1),
(5, 'Campeche', '2019-05-24 02:30:15', 1),
(6, 'Coahuila de Zaragoza	', '2019-05-24 02:30:15', 1),
(7, 'Colima', '2019-05-24 02:30:15', 1),
(8, 'Chiapas', '2019-05-24 02:30:15', 1),
(9, 'Chihuahua', '2019-05-24 02:30:15', 1),
(10, 'Distrito Federal	', '2019-05-24 02:30:15', 1),
(11, 'Durango', '2019-05-24 02:30:15', 1),
(12, 'Guanajuato', '2019-05-24 02:30:15', 1),
(13, 'Guerrero', '2019-05-24 02:30:15', 1),
(14, 'Hidalgo', '2019-05-24 02:30:15', 1),
(15, 'Jalisco', '2019-05-24 02:30:15', 1),
(16, 'M&eacute;xico', '2019-05-23 21:44:05', 1),
(17, 'Michoac&aacute;n ', '2019-05-23 21:45:56', 1),
(18, 'Morelos', '2019-05-24 02:30:15', 1),
(19, 'Nayarit', '2019-05-24 02:30:15', 1),
(20, 'Nuevo Le&oacute;n	', '2019-05-23 21:44:40', 1),
(21, 'Oaxaca', '2019-05-24 02:30:15', 1),
(22, 'Puebla', '2019-05-24 02:30:15', 1),
(23, 'Quer&eacute;taro', '2019-05-23 21:45:02', 1),
(24, 'Quintana Roo	', '2019-05-24 02:30:15', 1),
(25, 'San Luis Potos&iacute;', '2019-05-23 21:46:19', 1),
(26, 'Sinaloa', '2019-05-24 02:30:15', 1),
(27, 'Sonora', '2019-05-24 02:30:15', 1),
(28, 'Tabasco', '2019-05-24 02:30:15', 1),
(29, 'Tamaulipas', '2019-05-24 02:30:15', 1),
(30, 'Tlaxcala', '2019-05-24 02:30:15', 1),
(31, 'Veracruz', '2019-05-24 02:30:15', 1),
(32, 'Yucat&aacute;n', '2019-05-23 21:45:32', 1),
(33, 'Zacatecas', '2019-05-24 02:30:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user`, `password`, `date`, `status`) VALUES
(1, 'Carlos Caballero Carrillo', 'ing.carloscaballero@outlook.com', 'ccaballero', '123456', '2019-06-25 17:02:18', 1),
(2, 'Corina Sanchez', 'vmp_liz@hotmail.com', 'vmp_liz', '12345', '2019-05-17 18:09:56', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catclientes`
--
ALTER TABLE `catclientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catplatillos`
--
ALTER TABLE `catplatillos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catstatus`
--
ALTER TABLE `catstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `civilstatus`
--
ALTER TABLE `civilstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detcuenta`
--
ALTER TABLE `detcuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enccuenta`
--
ALTER TABLE `enccuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menucategorias`
--
ALTER TABLE `menucategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salarytype`
--
ALTER TABLE `salarytype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catclientes`
--
ALTER TABLE `catclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `catplatillos`
--
ALTER TABLE `catplatillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `catstatus`
--
ALTER TABLE `catstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `civilstatus`
--
ALTER TABLE `civilstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detcuenta`
--
ALTER TABLE `detcuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `enccuenta`
--
ALTER TABLE `enccuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menucategorias`
--
ALTER TABLE `menucategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `salarytype`
--
ALTER TABLE `salarytype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
