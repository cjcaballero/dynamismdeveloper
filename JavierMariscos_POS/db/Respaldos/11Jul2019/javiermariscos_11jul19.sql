-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2019 a las 17:29:44
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
-- Estructura de tabla para la tabla `catcivilstatus`
--

CREATE TABLE `catcivilstatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catcivilstatus`
--

INSERT INTO `catcivilstatus` (`id`, `nombre`, `status`, `fechacreacion`) VALUES
(1, 'Seleccione', 1, '2019-05-24 02:14:29'),
(2, 'Soltero(a)', 1, '2019-05-18 03:53:21'),
(3, 'Casado(a)', 1, '2019-05-18 03:53:21'),
(4, 'Viudo(a)', 1, '2019-05-18 03:54:20'),
(5, 'Divorciado(a)', 1, '2019-05-18 03:53:21'),
(6, 'Union Libre', 1, '2019-05-18 03:53:21');

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
(3, 'Para Llevar', 1, '2019-06-25 21:56:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catdelivery`
--

CREATE TABLE `catdelivery` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `color` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catdelivery`
--

INSERT INTO `catdelivery` (`id`, `nombre`, `imagen`, `color`, `fecha`, `idstatus`) VALUES
(1, 'Uber Eats', '../images/Iconos/ubereats.png', '#00dd9a', '2019-07-04 17:01:44', 1),
(2, 'Sin Delantal', '../images/Iconos/sindelantal.png', '#efef11', '2019-07-04 17:01:44', 1),
(3, 'Rappi', '../images/Iconos/rappi.png', '#ec3f3f', '2019-07-04 17:01:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catemployees`
--

CREATE TABLE `catemployees` (
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
-- Volcado de datos para la tabla `catemployees`
--

INSERT INTO `catemployees` (`id`, `nombre`, `direccion`, `telefono`, `celular`, `idestadocivil`, `idlugarnacimiento`, `fechanacimiento`, `email`, `horarioentrada`, `horariosalida`, `idpagosalario`, `salariodiario`, `salariototal`, `foto`, `fechaingreso`, `fechabaja`, `fechacreacion`, `idestatus`) VALUES
(8, 'Carlos Jair Caballero Carrillo', 'Islas 2365', 2147483647, 2147483647, 3, 32, '1984-05-29', 'ccaballero.ext@axera.com', '10:00', '06:30', 5, 1167, 35000, 'descarga.png', '2019-05-27', '0000-00-00', '2019-05-27 17:00:24', 1),
(9, 'Rogelio Carrera', '4420 san agustin apart 6', 2147483647, 2147483647, 3, 12, '1985-05-27', 'watitas0529@gmail.com', '10:00', '07:00', 3, 215, 1500, '92f07226-440a-402f-9a6b-facd089d543c.jpg', '2019-05-27', '0000-00-00', '2019-05-27 17:05:38', 1),
(10, 'pedrito', '4420 san agustin apart 6', 2147483647, 849893843, 4, 8, '1985-05-27', 'pedrito@hotmail.com', '05:00', '10:00', 3, 258, 1800, '8fba6daf-84bb-4bb1-a4eb-14cf2e64ced4.jpg', '2019-05-27', '0000-00-00', '2019-05-27 17:28:49', 1),
(12, 'Panchito', 'pedorro 1234', 2147483647, 2147483647, 2, 8, '1980-05-27', 'eeeee@hotmail.com', '07:00', '10:00', 3, 746, 5220, '4af18a35-9570-44fe-9c18-2e81c1fdff64.jpg', '2019-05-27', '0000-00-00', '2019-05-27 21:03:29', 1);

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
-- Estructura de tabla para la tabla `catpuestos`
--

CREATE TABLE `catpuestos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catpuestos`
--

INSERT INTO `catpuestos` (`id`, `nombre`, `fecha`, `idstatus`) VALUES
(1, 'Administrador', '2019-07-03 21:06:45', 1),
(2, 'Cajero', '2019-07-03 21:06:45', 1),
(3, 'Usuario', '2019-07-03 21:07:23', 1),
(4, 'Mesero', '2019-07-03 21:07:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catsalarytype`
--

CREATE TABLE `catsalarytype` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catsalarytype`
--

INSERT INTO `catsalarytype` (`id`, `nombre`, `fecha`, `status`) VALUES
(1, 'Seleccione', '2019-05-24 03:39:11', 1),
(3, 'Semanal', '2019-05-24 03:39:11', 1),
(4, 'Quincenal', '2019-05-24 03:39:11', 1),
(5, 'Mensual', '2019-05-24 03:39:11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catstates`
--

CREATE TABLE `catstates` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catstates`
--

INSERT INTO `catstates` (`id`, `nombre`, `fecha`, `status`) VALUES
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
-- Estructura de tabla para la tabla `cattipocuenta`
--

CREATE TABLE `cattipocuenta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `color` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cattipocuenta`
--

INSERT INTO `cattipocuenta` (`id`, `nombre`, `imagen`, `color`, `fecha`, `idstatus`) VALUES
(1, 'Comedor', '../images/Iconos/comedor.png', '#f4e472', '2019-07-04 16:59:09', 1),
(2, 'P/ Llevar', '../images/Iconos/togo.png', '#ee3580', '2019-07-08 21:07:05', 1),
(3, 'A Domicilio', '../images/Iconos/adomicilio.png', '#37ce8c', '2019-07-04 16:59:09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattipogastos`
--

CREATE TABLE `cattipogastos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cattipogastos`
--

INSERT INTO `cattipogastos` (`id`, `nombre`, `idstatus`, `fecha`) VALUES
(1, 'Seleccione', 1, '2019-07-10 23:24:53'),
(2, 'Total', 1, '2019-07-10 23:25:19'),
(3, 'Abono', 1, '2019-07-10 23:25:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catusers`
--

CREATE TABLE `catusers` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `idpuesto` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catusers`
--

INSERT INTO `catusers` (`id`, `name`, `email`, `user`, `password`, `idpuesto`, `date`, `status`) VALUES
(1, 'Carlos Caballero Carrillo', 'ing.carloscaballero@outlook.com', 'ccaballero', '123456', 1, '2019-07-03 21:10:07', 1),
(2, 'Corina Sanchez', 'vmp_liz@hotmail.com', 'vmp_liz', '12345', 2, '2019-07-03 21:10:07', 1);

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
(40, 113, 8, 'Mojarra Frita', 100, 1, '2019-07-05 16:26:39'),
(42, 113, 4, 'Vuelve Med.', 80, 1, '2019-07-05 16:28:36'),
(43, 113, 8, 'Mojarra Frita', 100, 1, '2019-07-05 16:33:43'),
(44, 113, 4, 'Vuelve Med.', 80, 1, '2019-07-05 16:37:22'),
(46, 114, 8, 'Mojarra Frita', 100, 1, '2019-07-05 22:21:48'),
(47, 116, 8, 'Mojarra Frita', 100, 1, '2019-07-05 23:00:14'),
(48, 117, 8, 'Mojarra Frita', 100, 1, '2019-07-05 23:01:16'),
(49, 117, 1, 'Cocktel Chico', 50, 1, '2019-07-05 23:01:19'),
(50, 118, 7, 'Campechano Gde.', 85, 1, '2019-07-05 23:04:28'),
(51, 118, 2, 'Cocktel Mediano', 70, 1, '2019-07-05 23:04:30'),
(52, 118, 4, 'Vuelve Med.', 80, 1, '2019-07-05 23:04:34'),
(53, 119, 8, 'Mojarra Frita', 100, 1, '2019-07-08 17:41:59'),
(54, 124, 8, 'Mojarra Frita', 100, 1, '2019-07-08 22:38:14'),
(55, 133, 8, 'Mojarra Frita', 100, 1, '2019-07-09 17:27:07'),
(56, 135, 1, 'Cocktel Chico', 50, 1, '2019-07-09 17:54:11'),
(57, 136, 8, 'Mojarra Frita', 100, 1, '2019-07-09 18:03:10'),
(58, 137, 4, 'Vuelve Med.', 80, 1, '2019-07-09 18:03:18'),
(59, 138, 7, 'Campechano Gde.', 85, 1, '2019-07-09 18:03:27'),
(60, 139, 4, 'Vuelve Med.', 80, 1, '2019-07-09 20:57:10'),
(61, 139, 2, 'Cocktel Mediano', 70, 1, '2019-07-09 20:57:12'),
(62, 139, 2, 'Cocktel Mediano', 70, 1, '2019-07-09 20:57:16'),
(63, 140, 1, 'Cocktel Chico', 50, 1, '2019-07-10 17:47:42'),
(64, 140, 2, 'Cocktel Mediano', 70, 1, '2019-07-10 17:47:45'),
(65, 140, 4, 'Vuelve Med.', 80, 1, '2019-07-10 17:47:48'),
(66, 140, 8, 'Mojarra Frita', 100, 1, '2019-07-10 17:47:51'),
(67, 141, 8, 'Mojarra Frita', 100, 1, '2019-07-10 21:03:34'),
(68, 141, 8, 'Mojarra Frita', 100, 1, '2019-07-10 21:03:36'),
(69, 142, 1, 'Cocktel Chico', 50, 1, '2019-07-10 21:05:54'),
(70, 142, 1, 'Cocktel Chico', 50, 1, '2019-07-10 21:05:55'),
(71, 143, 7, 'Campechano Gde.', 85, 1, '2019-07-10 21:06:09'),
(72, 144, 7, 'Campechano Gde.', 85, 1, '2019-07-11 14:59:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enccuenta`
--

CREATE TABLE `enccuenta` (
  `id` int(11) NOT NULL,
  `idCajero` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `mesaBanco` varchar(50) NOT NULL,
  `idtipoCuenta` int(11) NOT NULL,
  `iddelivery` int(11) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `contacto` varchar(350) NOT NULL,
  `direccion` varchar(350) NOT NULL,
  `entrecalles` varchar(350) NOT NULL,
  `pagacon` double NOT NULL,
  `total` double NOT NULL,
  `iva` double NOT NULL,
  `cambio` double NOT NULL,
  `horapedido` datetime NOT NULL,
  `notas` varchar(500) NOT NULL,
  `idtipopago` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enccuenta`
--

INSERT INTO `enccuenta` (`id`, `idCajero`, `IdCliente`, `mesaBanco`, `idtipoCuenta`, `iddelivery`, `telefono`, `contacto`, `direccion`, `entrecalles`, `pagacon`, `total`, `iva`, `cambio`, `horapedido`, `notas`, `idtipopago`, `fecha`, `idestatus`) VALUES
(136, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 200, 116, 16, 84, '0000-00-00 00:00:00', '', 1, '2019-07-09 20:54:23', 4),
(137, 1, 2, '', 2, 0, '', '', '', '', 0, 93, 13, -93, '0000-00-00 00:00:00', '', 1, '2019-07-09 21:05:45', 5),
(138, 1, 3, '', 3, 1, '', '', '', '', 0, 99, 14, -99, '0000-00-00 00:00:00', '', 1, '2019-07-09 18:03:28', 3),
(140, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 300, 348, 48, -48, '0000-00-00 00:00:00', '', 1, '2019-07-10 21:05:04', 4),
(141, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 500, 232, 32, 268, '0000-00-00 00:00:00', '', 1, '2019-07-10 21:03:41', 4),
(142, 1, 3, '', 3, 1, '', '', '', '', 400, 116, 16, 284, '0000-00-00 00:00:00', '', 1, '2019-07-10 21:05:59', 4),
(143, 1, 2, '', 2, 0, '', '', '', '', 0, 99, 14, -99, '0000-00-00 00:00:00', '', 1, '2019-07-10 21:06:15', 3),
(144, 0, 1, 'Mesa2', 1, 0, '', '', '', '', 0, 99, 14, -99, '0000-00-00 00:00:00', '', 1, '2019-07-11 15:17:03', 3),
(145, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2019-07-11 14:59:27', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastosdiarios`
--

CREATE TABLE `gastosdiarios` (
  `id` int(11) NOT NULL,
  `idCajero` int(11) NOT NULL,
  `concepto` varchar(1000) NOT NULL,
  `total` double NOT NULL,
  `abono` double NOT NULL,
  `pago` double NOT NULL,
  `comentarios` varchar(1000) NOT NULL,
  `idTipoGasto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastosdiarios`
--

INSERT INTO `gastosdiarios` (`id`, `idCajero`, `concepto`, `total`, `abono`, `pago`, `comentarios`, `idTipoGasto`, `fecha`) VALUES
(1, 1, 'Prueba', 100, 90, 90, 'Prueba', 3, '2019-07-11 14:44:44'),
(2, 1, 'Prueba2', 900, 0, 900, 'Prueba 2', 2, '2019-07-11 14:44:44'),
(3, 1, 'Prueba3', 800, 100, 100, 'Prueba 3', 3, '2019-07-11 14:44:44');

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catcivilstatus`
--
ALTER TABLE `catcivilstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catclientes`
--
ALTER TABLE `catclientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catdelivery`
--
ALTER TABLE `catdelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catemployees`
--
ALTER TABLE `catemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catplatillos`
--
ALTER TABLE `catplatillos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catpuestos`
--
ALTER TABLE `catpuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catsalarytype`
--
ALTER TABLE `catsalarytype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catstates`
--
ALTER TABLE `catstates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catstatus`
--
ALTER TABLE `catstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cattipocuenta`
--
ALTER TABLE `cattipocuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cattipogastos`
--
ALTER TABLE `cattipogastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catusers`
--
ALTER TABLE `catusers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detcuenta`
--
ALTER TABLE `detcuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enccuenta`
--
ALTER TABLE `enccuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastosdiarios`
--
ALTER TABLE `gastosdiarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menucategorias`
--
ALTER TABLE `menucategorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catcivilstatus`
--
ALTER TABLE `catcivilstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `catclientes`
--
ALTER TABLE `catclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `catdelivery`
--
ALTER TABLE `catdelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catemployees`
--
ALTER TABLE `catemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `catplatillos`
--
ALTER TABLE `catplatillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `catpuestos`
--
ALTER TABLE `catpuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catsalarytype`
--
ALTER TABLE `catsalarytype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `catstates`
--
ALTER TABLE `catstates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `catstatus`
--
ALTER TABLE `catstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cattipocuenta`
--
ALTER TABLE `cattipocuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cattipogastos`
--
ALTER TABLE `cattipogastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catusers`
--
ALTER TABLE `catusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detcuenta`
--
ALTER TABLE `detcuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `enccuenta`
--
ALTER TABLE `enccuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `gastosdiarios`
--
ALTER TABLE `gastosdiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menucategorias`
--
ALTER TABLE `menucategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
