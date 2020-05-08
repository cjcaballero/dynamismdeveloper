-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2020 a las 01:25:48
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.14

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
-- Estructura de tabla para la tabla `catcategorias`
--

CREATE TABLE `catcategorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catcategorias`
--

INSERT INTO `catcategorias` (`id`, `nombre`, `idstatus`, `fecha`) VALUES
(1, 'PESCADOS/MARISCOS', 1, '2019-07-17 22:43:00'),
(2, 'INSUMOS', 1, '2019-07-17 22:43:00'),
(3, 'BEBIDAS', 1, '2019-07-17 22:43:00'),
(4, 'MOBILIARIO', 1, '2019-07-17 22:43:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcivilstatus`
--

CREATE TABLE `catcivilstatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catcivilstatus`
--

INSERT INTO `catcivilstatus` (`id`, `nombre`, `status`, `fechacreacion`) VALUES
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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catdelivery`
--

INSERT INTO `catdelivery` (`id`, `nombre`, `imagen`, `color`, `fecha`, `idstatus`) VALUES
(1, 'Uber Eats', '../images/Iconos/ubereats.png', '#00dd9a', '2019-07-04 17:01:44', 1),
(2, 'Sin Delantal', '../images/Iconos/sindelantal.png', '#efef11', '2019-07-04 17:01:44', 1),
(3, 'Didi Food', '../images/Iconos/rappi.png', '#ec3f3f', '2020-03-08 03:45:42', 1);

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
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `claveempleado` int(6) NOT NULL,
  `idestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catemployees`
--

INSERT INTO `catemployees` (`id`, `nombre`, `direccion`, `telefono`, `celular`, `idestadocivil`, `idlugarnacimiento`, `fechanacimiento`, `email`, `horarioentrada`, `horariosalida`, `idpagosalario`, `salariodiario`, `salariototal`, `foto`, `fechaingreso`, `fechabaja`, `fechacreacion`, `claveempleado`, `idestatus`) VALUES
(8, 'Carlos Jair Caballero Carrillo', 'Islas 2365', 2147483647, 2147483647, 3, 32, '1984-05-29', 'ccaballero.ext@axera.com', '10:00', '06:30', 5, 1167, 35000, 'descarga.png', '2019-05-27', '0000-00-00', '2019-05-27 17:00:24', 0, 1),
(9, 'Rogelio Carrera', '4420 san agustin apart 6', 2147483647, 2147483647, 3, 12, '1985-05-27', 'watitas0529@gmail.com', '10:00', '07:00', 3, 215, 1500, '92f07226-440a-402f-9a6b-facd089d543c.jpg', '2019-05-27', '0000-00-00', '2019-05-27 17:05:38', 0, 1),
(10, 'pedrito', '4420 san agustin apart 6', 2147483647, 849893843, 4, 8, '1985-05-27', 'pedrito@hotmail.com', '05:00', '10:00', 3, 258, 1800, '8fba6daf-84bb-4bb1-a4eb-14cf2e64ced4.jpg', '2019-05-27', '0000-00-00', '2019-05-27 17:28:49', 0, 1),
(12, 'Panchito', 'pedorro 1234', 2147483647, 2147483647, 2, 8, '1980-05-27', 'eeeee@hotmail.com', '07:00', '10:00', 3, 746, 5220, '4af18a35-9570-44fe-9c18-2e81c1fdff64.jpg', '2019-05-27', '0000-00-00', '2019-05-27 21:03:29', 0, 1);

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catplatillos`
--

INSERT INTO `catplatillos` (`id`, `nombre`, `imagen`, `precio`, `descuento`, `idcategoria`, `idstatus`, `fecha`) VALUES
(400, 'Orden de Arroz', '../images/Iconos/notimage.png', 25, 0, 15, 1, '2020-03-07 09:25:41'),
(401, 'Consomé Pescado', '../images/Iconos/notimage.png', 30, 0, 15, 1, '2020-03-07 09:30:22'),
(402, 'Papas Francesa', '../images/Iconos/notimage.png', 40, 0, 15, 1, '2020-03-07 09:31:25'),
(403, 'Aros Cebolla', '../images/Iconos/notimage.png', 50, 0, 15, 1, '2020-03-07 09:31:25'),
(404, 'Guacamole', '../images/Iconos/notimage.png', 60, 0, 15, 1, '2020-03-07 09:32:15'),
(405, 'Papas Nacho', '../images/Iconos/notimage.png', 50, 0, 15, 1, '2020-03-07 09:32:15'),
(406, 'Ensalada Surimi', '../images/Iconos/notimage.png', 50, 0, 16, 1, '2020-03-07 09:36:02'),
(407, 'Ensalada Atún', '../images/Iconos/notimage.png', 50, 0, 16, 1, '2020-03-07 09:36:02'),
(408, 'Ens.Camarón', '../images/Iconos/notimage.png', 80, 0, 16, 1, '2020-03-07 09:37:31'),
(409, 'Tost.Surimi', '../images/Iconos/notimage.png', 25, 0, 17, 1, '2020-03-07 09:40:15'),
(410, 'Tost.Ceviche', '../images/Iconos/notimage.png', 30, 0, 17, 1, '2020-03-07 09:40:15'),
(411, 'Tost.Camaron', '../images/Iconos/notimage.png', 40, 0, 0, 0, '2020-03-07 09:40:15'),
(412, 'Tost.Mixta', '../images/Iconos/notimage.png', 45, 0, 17, 1, '2020-03-07 09:40:15'),
(413, 'Tost.Vuelve', '../images/Iconos/notimage.png', 50, 0, 17, 1, '2020-03-07 09:40:15'),
(414, 'Taco Pescado', '../images/Iconos/notimage.png', 30, 0, 18, 1, '2020-03-07 09:42:32'),
(415, 'Taco Camaron', '../images/Iconos/notimage.png', 40, 0, 18, 1, '2020-03-07 09:42:32'),
(416, 'Quesadillas', '../images/Iconos/notimage.png', 50, 0, 18, 1, '2020-03-07 09:42:32'),
(417, 'Queso extra', '../images/Iconos/notimage.png', 10, 0, 18, 1, '2020-03-07 09:43:22'),
(418, 'Filete Jr.', '../images/Iconos/notimage.png', 50, 0, 19, 1, '2020-03-08 02:44:49'),
(419, 'Emp.Atun', '../images/Iconos/notimage.png', 30, 0, 20, 1, '2020-03-08 02:44:49'),
(420, 'Emp.Filete', '../images/Iconos/notimage.png', 35, 0, 20, 1, '2020-03-08 02:44:49'),
(421, 'Emp.Camaron', '../images/Iconos/notimage.png', 40, 0, 20, 1, '2020-03-08 02:44:49'),
(422, 'Queso extra', '../images/Iconos/notimage.png', 10, 0, 20, 1, '2020-03-08 02:44:49'),
(423, 'Caldo Pescado', '../images/Iconos/notimage.png', 60, 0, 21, 1, '2020-03-08 02:49:46'),
(424, 'Caldo Mixto', '../images/Iconos/notimage.png', 75, 0, 21, 1, '2020-03-08 02:49:46'),
(425, 'Caldo Camaron', '../images/Iconos/notimage.png', 85, 0, 21, 1, '2020-03-08 02:49:46'),
(426, 'Sopa Mariscos', '../images/Iconos/notimage.png', 95, 0, 21, 1, '2020-03-08 02:49:46'),
(427, 'Pozole Mariscos', '../images/Iconos/notimage.png', 100, 0, 21, 1, '2020-03-08 02:49:46'),
(428, 'Pescado 1px.', '../images/Iconos/notimage.png', 70, 0, 22, 1, '2020-03-08 02:56:39'),
(429, 'Pescado 2px.', '../images/Iconos/notimage.png', 130, 0, 22, 1, '2020-03-08 02:56:39'),
(430, 'Camaron 1px.', '../images/Iconos/notimage.png', 90, 0, 22, 1, '2020-03-08 02:56:39'),
(431, 'Camaron 2px.', '../images/Iconos/notimage.png', 170, 0, 22, 1, '2020-03-08 02:56:39'),
(432, 'Mixto 1px.', '../images/Iconos/notimage.png', 100, 0, 22, 1, '2020-03-08 02:56:39'),
(433, 'Mixto 2px.', '../images/Iconos/notimage.png', 190, 0, 22, 1, '2020-03-08 02:56:39'),
(434, 'Chica', '../images/Iconos/notimage.png', 55, 0, 23, 1, '2020-03-08 23:05:04'),
(435, 'Mediana', '../images/Iconos/notimage.png', 80, 0, 23, 1, '2020-03-08 03:07:56'),
(436, 'Grande', '../images/Iconos/notimage.png', 90, 0, 23, 1, '2020-03-08 03:07:56'),
(437, 'Campechano Med.', '../images/Iconos/notimage.png', 85, 0, 23, 1, '2020-03-08 03:07:56'),
(438, 'Campechano Gde.', '../images/Iconos/notimage.png', 95, 0, 23, 1, '2020-03-08 03:07:56'),
(439, 'Vuelve Med.', '../images/Iconos/notimage.png', 90, 0, 23, 1, '2020-03-08 03:07:56'),
(440, 'Vuelve Gde.', '../images/Iconos/notimage.png', 100, 0, 23, 1, '2020-03-08 03:07:56'),
(441, 'Mojarra Frita', '../images/Iconos/notimage.png', 110, 0, 24, 1, '2020-03-08 03:16:36'),
(442, 'Mojarra Mojo', '../images/Iconos/notimage.png', 115, 0, 24, 1, '2020-03-08 03:16:36'),
(443, 'Mojarra Ajillo', '../images/Iconos/notimage.png', 120, 0, 24, 1, '2020-03-08 03:16:36'),
(444, 'Mojarra Diabla', '../images/Iconos/notimage.png', 140, 0, 24, 1, '2020-03-08 03:16:36'),
(445, 'Mojarra Buffalo', '../images/Iconos/notimage.png', 140, 0, 24, 1, '2020-03-08 03:16:36'),
(446, 'Chicharron Pes.', '../images/Iconos/notimage.png', 95, 0, 25, 1, '2020-03-08 03:22:01'),
(447, 'Pulpo Encebo.', '../images/Iconos/notimage.png', 110, 0, 25, 1, '2020-03-08 03:22:01'),
(448, 'Ancas Emp.', '../images/Iconos/notimage.png', 120, 0, 25, 1, '2020-03-08 03:20:24'),
(449, 'Brochetas Cam.', '../images/Iconos/notimage.png', 130, 0, 25, 1, '2020-03-08 03:20:24'),
(450, 'Alambre Cam.', '../images/Iconos/notimage.png', 140, 0, 25, 1, '2020-03-08 03:20:24'),
(451, 'Molcajete Cam.', '../images/Iconos/notimage.png', 150, 0, 25, 1, '2020-03-08 03:20:24'),
(452, 'Molcajete Maris.', '../images/Iconos/notimage.png', 180, 0, 25, 1, '2020-03-08 03:22:01'),
(453, 'Coca Chica', '../images/Iconos/notimage.png', 15, 0, 26, 1, '2020-03-08 03:28:21'),
(454, 'Coca / Joya', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(455, 'Aguas Frescas', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(456, 'Agua natural', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(457, 'Café', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(458, 'Filete emp.', '../images/Iconos/notimage.png', 70, 0, 27, 1, '2020-03-08 03:34:29'),
(459, 'Filete Plancha', '../images/Iconos/notimage.png', 80, 0, 27, 1, '2020-03-08 03:34:29'),
(460, 'Filete Vapor', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(461, 'Filete Verac.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(462, 'Filete Mexic.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(463, 'Filete Ranch.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(464, 'Filete Cilantro', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(465, 'Filete Champi.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(466, 'Filete Diabla', '../images/Iconos/notimage.png', 90, 0, 27, 1, '2020-03-08 03:34:29'),
(467, 'Filete Mojo', '../images/Iconos/notimage.png', 90, 0, 27, 1, '2020-03-08 03:34:29'),
(468, 'Filete Ajillo', '../images/Iconos/notimage.png', 95, 0, 27, 1, '2020-03-08 03:34:29'),
(469, 'Filete Relleno', '../images/Iconos/notimage.png', 100, 0, 27, 1, '2020-03-08 03:34:29'),
(470, 'Camarones Emp.', '../images/Iconos/notimage.png', 90, 0, 28, 1, '2020-03-08 04:51:47'),
(471, 'Camarones Plan.', '../images/Iconos/notimage.png', 100, 0, 28, 1, '2020-03-08 04:53:22'),
(472, 'Camarones Mojo', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:53:22'),
(473, 'Camarones Ajillo', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:56:17'),
(474, 'Camarones Verac.', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:56:17'),
(475, 'Camarones Mexic.', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:56:17'),
(476, 'Camarones Ranch', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:57:30'),
(477, 'Camarones Champ', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:57:30'),
(478, 'Camarones Grati.', '../images/Iconos/notimage.png', 130, 0, 28, 1, '2020-03-08 04:56:17'),
(479, 'Camarones Diab.', '../images/Iconos/notimage.png', 130, 0, 0, 0, '2020-03-08 04:58:45'),
(480, 'Camarones Buffa', '../images/Iconos/notimage.png', 130, 0, 28, 1, '2020-03-08 04:58:45'),
(481, 'Camarones Relle', '../images/Iconos/notimage.png', 140, 0, 28, 1, '2020-03-08 04:58:45'),
(482, 'Mariscada Per.', '../images/Iconos/notimage.png', 130, 0, 29, 1, '2020-03-08 05:01:39'),
(483, 'Mariscada Javi', '../images/Iconos/notimage.png', 250, 0, 29, 1, '2020-03-08 05:01:39'),
(484, 'Mariscada Fami', '../images/Iconos/notimage.png', 500, 0, 29, 1, '2020-03-08 05:01:39'),
(485, 'Combo 1', '../images/Iconos/notimage.png', 80, 0, 30, 1, '2020-03-08 05:03:12'),
(486, 'Combo 2', '../images/Iconos/notimage.png', 100, 0, 30, 1, '2020-03-08 05:03:12'),
(487, 'Combo 3', '../images/Iconos/notimage.png', 120, 0, 30, 1, '2020-03-08 05:03:12'),
(488, 'Combo 4', '../images/Iconos/notimage.png', 90, 0, 30, 1, '2020-03-08 05:03:12'),
(489, 'Tost.Camaron', '../images/Iconos/notimage.png', 40, 0, 17, 1, '2020-03-08 09:34:40'),
(490, 'Queso Extra', '../images/Iconos/notimage.png', 10, 0, 31, 1, '2020-03-09 02:39:28'),
(491, 'Aguacate', '../images/Iconos/notimage.png', 5, 0, 31, 1, '2020-03-09 02:39:28'),
(492, 'Consomecito', '../images/Iconos/notimage.png', 10, 0, 31, 1, '2020-03-09 02:39:28'),
(493, 'Arrocito', '../images/Iconos/notimage.png', 10, 0, 31, 1, '2020-03-09 02:39:28'),
(494, 'Dif.Coca', '../images/Iconos/notimage.png', 5, 0, 31, 1, '2020-03-09 03:09:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catplatillos_delivery`
--

CREATE TABLE `catplatillos_delivery` (
  `id` int(11) NOT NULL,
  `nombre` varchar(350) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `precio` double NOT NULL,
  `descuento` double NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catplatillos_delivery`
--

INSERT INTO `catplatillos_delivery` (`id`, `nombre`, `imagen`, `precio`, `descuento`, `idcategoria`, `idstatus`, `fecha`) VALUES
(115, 'Orden de Arroz', '../images/Iconos/notimage.png', 40, 0, 15, 1, '2020-03-11 00:04:57'),
(116, 'Consomé Pescado', '../images/Iconos/notimage.png', 40, 0, 15, 1, '2020-03-11 00:04:58'),
(117, 'Papas Francesa', '../images/Iconos/notimage.png', 50, 0, 15, 1, '2020-03-11 00:04:58'),
(118, 'Aros Cebolla', '../images/Iconos/notimage.png', 60, 0, 15, 1, '2020-03-11 00:04:58'),
(119, 'Guacamole', '../images/Iconos/notimage.png', 70, 0, 15, 1, '2020-03-11 00:04:58'),
(120, 'Papas Nacho', '../images/Iconos/notimage.png', 70, 0, 15, 1, '2020-03-11 00:04:58'),
(121, 'Ensalada Surimi', '../images/Iconos/notimage.png', 80, 0, 16, 1, '2020-03-11 00:04:58'),
(122, 'Ensalada Atún', '../images/Iconos/notimage.png', 80, 0, 16, 1, '2020-03-11 00:04:58'),
(123, 'Ens.Camarón', '../images/Iconos/notimage.png', 100, 0, 16, 1, '2020-03-11 00:04:58'),
(124, 'Tost.Surimi', '../images/Iconos/notimage.png', 35, 0, 17, 1, '2020-03-11 00:04:58'),
(125, 'Tost.Ceviche', '../images/Iconos/notimage.png', 40, 0, 17, 1, '2020-03-11 00:04:58'),
(126, 'Tost.Camaron', '../images/Iconos/notimage.png', 50, 0, 0, 0, '2020-03-11 00:04:58'),
(127, 'Tost.Mixta', '../images/Iconos/notimage.png', 50, 0, 17, 1, '2020-03-11 00:04:58'),
(128, 'Tost.Vuelve', '../images/Iconos/notimage.png', 60, 0, 17, 1, '2020-03-11 00:04:58'),
(129, 'Taco Pescado', '../images/Iconos/notimage.png', 35, 0, 18, 1, '2020-03-11 00:04:58'),
(130, 'Taco Camaron', '../images/Iconos/notimage.png', 45, 0, 18, 1, '2020-03-11 00:04:58'),
(131, 'Quesadillas', '../images/Iconos/notimage.png', 30, 0, 18, 1, '2020-03-11 00:04:58'),
(132, 'Queso extra', '../images/Iconos/notimage.png', 10, 0, 18, 1, '2020-03-07 09:43:22'),
(133, 'Filete Jr.', '../images/Iconos/notimage.png', 60, 0, 19, 1, '2020-03-11 00:04:58'),
(134, 'Emp.Atun', '../images/Iconos/notimage.png', 40, 0, 20, 1, '2020-03-11 00:04:58'),
(135, 'Emp.Filete', '../images/Iconos/notimage.png', 35, 0, 20, 1, '2020-03-08 02:44:49'),
(136, 'Emp.Camaron', '../images/Iconos/notimage.png', 45, 0, 20, 1, '2020-03-11 00:04:58'),
(137, 'Queso extra', '../images/Iconos/notimage.png', 10, 0, 20, 1, '2020-03-08 02:44:49'),
(138, 'Caldo Pescado', '../images/Iconos/notimage.png', 90, 0, 21, 1, '2020-03-11 00:04:58'),
(139, 'Caldo Mixto', '../images/Iconos/notimage.png', 100, 0, 21, 1, '0000-00-00 00:00:00'),
(140, 'Caldo Camaron', '../images/Iconos/notimage.png', 85, 0, 21, 1, '2020-03-08 02:49:46'),
(141, 'Sopa Mariscos', '../images/Iconos/notimage.png', 95, 0, 21, 1, '2020-03-08 02:49:46'),
(142, 'Pozole Mariscos', '../images/Iconos/notimage.png', 100, 0, 21, 1, '2020-03-08 02:49:46'),
(143, 'Pescado 1px.', '../images/Iconos/notimage.png', 70, 0, 22, 1, '2020-03-08 02:56:39'),
(144, 'Pescado 2px.', '../images/Iconos/notimage.png', 130, 0, 22, 1, '2020-03-08 02:56:39'),
(145, 'Camaron 1px.', '../images/Iconos/notimage.png', 90, 0, 22, 1, '2020-03-08 02:56:39'),
(146, 'Camaron 2px.', '../images/Iconos/notimage.png', 170, 0, 22, 1, '2020-03-08 02:56:39'),
(147, 'Mixto 1px.', '../images/Iconos/notimage.png', 100, 0, 22, 1, '2020-03-08 02:56:39'),
(148, 'Mixto 2px.', '../images/Iconos/notimage.png', 190, 0, 22, 1, '2020-03-08 02:56:39'),
(149, 'chica', '../images/Iconos/notimage.png', 55, 0, 23, 1, '2020-03-08 03:07:56'),
(150, 'Mediana', '../images/Iconos/notimage.png', 80, 0, 23, 1, '2020-03-08 03:07:56'),
(151, 'Grande', '../images/Iconos/notimage.png', 90, 0, 23, 1, '2020-03-08 03:07:56'),
(152, 'Campechano Med.', '../images/Iconos/notimage.png', 85, 0, 23, 1, '2020-03-08 03:07:56'),
(153, 'Campechano Gde.', '../images/Iconos/notimage.png', 95, 0, 23, 1, '2020-03-08 03:07:56'),
(154, 'Vuelve Med.', '../images/Iconos/notimage.png', 90, 0, 23, 1, '2020-03-08 03:07:56'),
(155, 'Vuelve Gde.', '../images/Iconos/notimage.png', 100, 0, 23, 1, '2020-03-08 03:07:56'),
(156, 'Mojarra Frita', '../images/Iconos/notimage.png', 110, 0, 24, 1, '2020-03-08 03:16:36'),
(157, 'Mojarra Mojo', '../images/Iconos/notimage.png', 115, 0, 24, 1, '2020-03-08 03:16:36'),
(158, 'Mojarra Ajillo', '../images/Iconos/notimage.png', 120, 0, 24, 1, '2020-03-08 03:16:36'),
(159, 'Mojarra Diabla', '../images/Iconos/notimage.png', 140, 0, 24, 1, '2020-03-08 03:16:36'),
(160, 'Mojarra Buffalo', '../images/Iconos/notimage.png', 140, 0, 24, 1, '2020-03-08 03:16:36'),
(161, 'Chicharron Pes.', '../images/Iconos/notimage.png', 95, 0, 25, 1, '2020-03-08 03:22:01'),
(162, 'Pulpo Encebo.', '../images/Iconos/notimage.png', 110, 0, 25, 1, '2020-03-08 03:22:01'),
(163, 'Ancas Emp.', '../images/Iconos/notimage.png', 120, 0, 25, 1, '2020-03-08 03:20:24'),
(164, 'Brochetas Cam.', '../images/Iconos/notimage.png', 130, 0, 25, 1, '2020-03-08 03:20:24'),
(165, 'Alambre Cam.', '../images/Iconos/notimage.png', 140, 0, 25, 1, '2020-03-08 03:20:24'),
(166, 'Molcajete Cam.', '../images/Iconos/notimage.png', 150, 0, 25, 1, '2020-03-08 03:20:24'),
(167, 'Molcajete Maris.', '../images/Iconos/notimage.png', 180, 0, 25, 1, '2020-03-08 03:22:01'),
(168, 'Coca Chica', '../images/Iconos/notimage.png', 15, 0, 26, 1, '2020-03-08 03:28:21'),
(169, 'Coca / Joya', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(170, 'Aguas Frescas', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(171, 'Agua natural', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(172, 'Café', '../images/Iconos/notimage.png', 20, 0, 26, 1, '2020-03-08 03:28:21'),
(173, 'Filete emp.', '../images/Iconos/notimage.png', 70, 0, 27, 1, '2020-03-08 03:34:29'),
(174, 'Filete Plancha', '../images/Iconos/notimage.png', 80, 0, 27, 1, '2020-03-08 03:34:29'),
(175, 'Filete Vapor', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(176, 'Filete Verac.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(177, 'Filete Mexic.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(178, 'Filete Ranch.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(179, 'Filete Cilantro', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(180, 'Filete Champi.', '../images/Iconos/notimage.png', 85, 0, 27, 1, '2020-03-08 03:34:29'),
(181, 'Filete Diabla', '../images/Iconos/notimage.png', 90, 0, 27, 1, '2020-03-08 03:34:29'),
(182, 'Filete Mojo', '../images/Iconos/notimage.png', 90, 0, 27, 1, '2020-03-08 03:34:29'),
(183, 'Filete Ajillo', '../images/Iconos/notimage.png', 95, 0, 27, 1, '2020-03-08 03:34:29'),
(184, 'Filete Relleno', '../images/Iconos/notimage.png', 100, 0, 27, 1, '2020-03-08 03:34:29'),
(185, 'Camarones Emp.', '../images/Iconos/notimage.png', 90, 0, 28, 1, '2020-03-08 04:51:47'),
(186, 'Camarones Plan.', '../images/Iconos/notimage.png', 100, 0, 28, 1, '2020-03-08 04:53:22'),
(187, 'Camarones Mojo', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:53:22'),
(188, 'Camarones Ajillo', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:56:17'),
(189, 'Camarones Verac.', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:56:17'),
(190, 'Camarones Mexic.', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:56:17'),
(191, 'Camarones Ranch', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:57:30'),
(192, 'Camarones Champ', '../images/Iconos/notimage.png', 120, 0, 28, 1, '2020-03-08 04:57:30'),
(193, 'Camarones Grati.', '../images/Iconos/notimage.png', 130, 0, 28, 1, '2020-03-08 04:56:17'),
(194, 'Camarones Diab.', '../images/Iconos/notimage.png', 130, 0, 0, 0, '2020-03-08 04:58:45'),
(195, 'Camarones Buffa', '../images/Iconos/notimage.png', 130, 0, 28, 1, '2020-03-08 04:58:45'),
(196, 'Camarones Relle', '../images/Iconos/notimage.png', 140, 0, 28, 1, '2020-03-08 04:58:45'),
(197, 'Mariscada Per.', '../images/Iconos/notimage.png', 130, 0, 29, 1, '2020-03-08 05:01:39'),
(198, 'Mariscada Javi', '../images/Iconos/notimage.png', 250, 0, 29, 1, '2020-03-08 05:01:39'),
(199, 'Mariscada Fami', '../images/Iconos/notimage.png', 500, 0, 29, 1, '2020-03-08 05:01:39'),
(200, 'Combo 1', '../images/Iconos/notimage.png', 80, 0, 30, 1, '2020-03-08 05:03:12'),
(201, 'Combo 2', '../images/Iconos/notimage.png', 100, 0, 30, 1, '2020-03-08 05:03:12'),
(202, 'Combo 3', '../images/Iconos/notimage.png', 120, 0, 30, 1, '2020-03-08 05:03:12'),
(203, 'Combo 4', '../images/Iconos/notimage.png', 90, 0, 30, 1, '2020-03-08 05:03:12'),
(204, 'Tost.Camaron', '../images/Iconos/notimage.png', 40, 0, 17, 1, '2020-03-08 09:34:40'),
(205, 'Queso Extra', '../images/Iconos/notimage.png', 10, 0, 31, 1, '2020-03-09 02:39:28'),
(206, 'Aguacate', '../images/Iconos/notimage.png', 5, 0, 31, 1, '2020-03-09 02:39:28'),
(207, 'Consomecito', '../images/Iconos/notimage.png', 10, 0, 31, 1, '2020-03-09 02:39:28'),
(208, 'Arrocito', '../images/Iconos/notimage.png', 10, 0, 31, 1, '2020-03-09 02:39:28'),
(209, 'Dif.Coca', '../images/Iconos/notimage.png', 5, 0, 31, 1, '2020-03-09 03:09:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catproductos`
--

CREATE TABLE `catproductos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idunidad` int(11) NOT NULL,
  `idcajero` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catproductos`
--

INSERT INTO `catproductos` (`id`, `codigo`, `nombre`, `precio`, `stock`, `idcategoria`, `idproveedor`, `idunidad`, `idcajero`, `idstatus`, `fecha`) VALUES
(1, '00000', 'Camaron Cocktelero Nacional', 150, 9, 1, 2, 1, 1, 1, '2020-03-29 01:35:22'),
(2, '00000', 'Camaron Cocktelero Americano', 95, 15, 1, 3, 1, 1, 1, '2020-03-29 01:35:40'),
(3, '00000', 'Camaron Macuil Mediano', 170, 6, 1, 3, 1, 1, 1, '2020-03-14 20:36:36'),
(4, '00000', 'Camaron Crudo 26/30', 185, 8, 1, 3, 1, 1, 1, '2020-03-14 20:37:28'),
(5, '00000', 'Tentaculo de Calamar', 170, 6, 1, 3, 1, 1, 1, '2020-03-14 20:37:57'),
(6, '00000', 'Jaiba entera', 45, 3, 1, 3, 1, 1, 1, '2020-03-14 20:39:11'),
(7, '00000', 'Almeja Chirla', 17, 5, 1, 3, 1, 1, 1, '2020-03-14 20:40:12'),
(8, '00000', 'Callo Almeja Importado', 105, 4, 1, 3, 1, 1, 1, '2020-03-14 20:40:48'),
(9, '00000', 'Ostion en Bolsa', 35, 6, 1, 3, 6, 1, 1, '2020-03-14 20:41:28'),
(10, '00000', 'Surimi Charal', 80, 6, 1, 3, 3, 1, 1, '2020-03-14 20:42:50'),
(11, '00000', 'Mojarra Tilapia Mediana', 42, 60, 1, 3, 7, 1, 1, '2020-03-14 20:48:07'),
(12, '00000', 'Cabeza Pescado', 23, 3, 1, 3, 1, 1, 1, '2020-03-14 20:48:29'),
(13, '00000', 'Papa Recta 3/8 Belgica', 28, 12, 1, 3, 6, 1, 1, '2020-03-14 20:49:08'),
(14, '00000', 'Anca de Rana', 205, 1, 1, 3, 5, 1, 1, '2020-03-14 20:53:22'),
(15, '00000', 'Jaibon', 100, 0, 1, 3, 1, 1, 1, '2020-03-14 20:54:09'),
(16, '00000', 'Aguacate', 270, 0, 2, 1, 5, 1, 1, '2020-03-26 01:32:36'),
(17, '00000', 'Zanahoria', 70, 1, 2, 1, 9, 1, 1, '2020-03-14 21:41:49'),
(18, '00000', 'Lechuga', 15, 20, 2, 1, 7, 1, 1, '2020-03-14 21:42:12'),
(19, '00000', 'Chile Morron', 20, 1, 2, 1, 1, 1, 1, '2020-03-14 21:42:56'),
(20, '00000', 'Chile Serramo', 20, 1, 2, 1, 1, 1, 1, '2020-03-14 21:45:36'),
(21, '00000', 'Cebolla Blanca', 6, 15, 2, 1, 1, 1, 1, '2020-03-14 21:46:12'),
(22, '00000', 'Tomate Guaje', 130, 1, 2, 1, 5, 1, 1, '2020-03-14 21:46:35'),
(23, '00000', 'Cilantro', 130, 5, 2, 1, 1, 1, 1, '2020-03-14 21:47:05'),
(24, '00000', 'Limon', 160, 1, 2, 1, 2, 1, 1, '2020-03-14 21:47:33'),
(25, '00000', 'Cebolla Morada', 10, 2, 2, 1, 1, 1, 1, '2020-03-14 21:47:53'),
(26, '00000', 'Coca Cola 355ml', 194, 0, 3, 8, 5, 1, 1, '2020-03-14 21:52:07'),
(27, '00000', 'Coca Cola 192ml', 131, 0, 3, 8, 5, 1, 1, '2020-03-14 21:53:30'),
(28, '00000', 'Joya Mixta 355ml', 194, 0, 3, 8, 5, 1, 1, '2020-03-14 21:53:53'),
(29, '00000', 'Agua Mineral 355ml', 194, 0, 3, 8, 5, 1, 1, '2020-03-14 21:54:16'),
(30, '00000', 'Aguas Naturales', 8, 40, 3, 9, 7, 1, 1, '2020-03-14 22:08:44'),
(31, '00000', 'Galleta Saladitas 12gr.', 130, 5, 2, 6, 5, 1, 1, '2020-03-14 22:14:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catproveedores`
--

CREATE TABLE `catproveedores` (
  `id` int(11) NOT NULL,
  `razonsocial` varchar(300) NOT NULL,
  `contacto` varchar(300) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `Celular` varchar(12) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catproveedores`
--

INSERT INTO `catproveedores` (`id`, `razonsocial`, `contacto`, `telefono`, `Celular`, `direccion`, `email`, `idstatus`, `fecha`) VALUES
(1, 'Fruteria Ventura', 'Luis Ventura', '83556699', '', 'Mercado Meson estrella', 'sincorreo@hotmail.com', 1, '2019-07-18 16:48:59'),
(2, 'Melina Mariscos', 'Sra. Melina', '', '8116389614', 'N/A', 'N/A', 1, '2020-03-14 01:49:55'),
(3, 'Mariscos el Charal', 'Yeni  ', '81305250', '8180839254', 'Av. Ruiz Cortines 621A Vidriera 64520 Monterrey N.L', 'contacto@charal.com.mx', 1, '2020-03-14 01:49:56'),
(4, 'Mercado Marino', 'Josue', '', '8119908911', 'Montes Berneses 507, Las Puentes 4to Sector, 66450 San Nicolás de los Garza, N.L', '', 1, '2020-03-14 01:53:31'),
(5, 'Mariscos la Estrella', 'Ricardo', '8331 3354', '', '83315883, Mercado de Abastos, Estrella, 66482 San Nicolás de los Garza, N.L.', '', 1, '2020-03-14 01:53:31'),
(6, 'Grupo Gamesa', 'Angel ', '8369 5555', '8119157156', 'Republica Mexicana 225 Norte, Sin Nombre de Col 2, Cuauhtémoc, 66450 San Nicolás de los Garza, N.L.', '', 1, '2020-03-14 01:55:24'),
(7, 'Salsas La solterona', 'Reynaldo', '', '8112121042', '', '', 1, '2020-03-14 01:59:25'),
(8, 'Coca Cola', 'Francisco Carranza', ' ', '8187091556', '', '', 1, '2020-03-14 21:39:14'),
(9, 'Cami Aguas Sabores', 'Valentin Salinas', '', '8113810724', '', '', 1, '2020-03-14 22:05:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catpuestos`
--

CREATE TABLE `catpuestos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catsalarytype`
--

INSERT INTO `catsalarytype` (`id`, `nombre`, `fecha`, `status`) VALUES
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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catstates`
--

INSERT INTO `catstates` (`id`, `nombre`, `fecha`, `status`) VALUES
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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catstatus`
--

INSERT INTO `catstatus` (`id`, `nombre`, `fecha`) VALUES
(1, 'Activo', '2019-06-25 21:42:14'),
(2, 'Inactivo', '2019-06-25 21:42:14'),
(3, 'Nopagada', '2019-06-25 21:42:14'),
(4, 'Pagada', '2019-06-25 21:42:14'),
(5, 'Cancelada', '2019-06-25 21:42:14'),
(6, 'Realizado', '2019-07-11 23:23:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattipocuenta`
--

CREATE TABLE `cattipocuenta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `color` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Estructura de tabla para la tabla `catunidades`
--

CREATE TABLE `catunidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catunidades`
--

INSERT INTO `catunidades` (`id`, `nombre`, `idstatus`, `fecha`) VALUES
(1, 'KG(s)', 1, '2020-03-14 20:43:48'),
(2, 'Arpilla/Costal(s)', 1, '2020-03-14 20:43:48'),
(3, 'Paquete(s)', 1, '2020-03-14 20:43:48'),
(4, 'Manojo(s)', 1, '2020-03-14 20:43:48'),
(5, 'Caja(s)', 1, '2020-03-14 20:43:48'),
(6, 'Bolsa(s)', 1, '2020-03-14 20:43:48'),
(7, 'Pieza(s)', 1, '2019-07-18 16:49:58'),
(8, 'Otro(s)', 1, '2020-03-14 20:43:48'),
(9, 'Bulto(s)', 1, '2020-03-14 21:39:39');

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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catusers`
--

INSERT INTO `catusers` (`id`, `name`, `email`, `user`, `password`, `idpuesto`, `date`, `status`) VALUES
(1, 'Carlos Jair Caballero Carrillo', 'ing.carloscaballero@outlook.com', 'ccaballero', '123456', 1, '2019-07-22 22:32:08', 1),
(2, 'Corina Sanchez', 'vmp_liz@hotmail.com', 'vmp_liz', '12345', 2, '2019-07-03 21:10:07', 1),
(3, 'Rogelio Carrera', 'watitas0529@gmail.com', 'chcaballero', '312312312321', 0, '2019-07-22 22:32:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierrediario`
--

CREATE TABLE `cierrediario` (
  `id` int(11) NOT NULL,
  `ventatotal` double NOT NULL,
  `gastostotales` double NOT NULL,
  `gananciatotal` double NOT NULL,
  `idcajero` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cierrediario`
--

INSERT INTO `cierrediario` (`id`, `ventatotal`, `gastostotales`, `gananciatotal`, `idcajero`, `idstatus`, `fecha`) VALUES
(57, 25, 0, 25, 1, 6, '20-03-2020');

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detcuenta`
--

INSERT INTO `detcuenta` (`id`, `idCuenta`, `idplatillo`, `descplatillo`, `precio`, `cantidad`, `fecha`) VALUES
(170, 204, 47, 'Grande', 90, 1, '2020-03-08 03:29:11'),
(171, 204, 109, 'Tost.Camaron', 40, 1, '2020-03-08 03:34:46'),
(172, 206, 37, 'Sopa Mariscos', 95, 1, '2020-03-08 03:48:06'),
(173, 206, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:48:14'),
(174, 207, 46, 'Mediana', 80, 1, '2020-03-08 03:48:36'),
(175, 207, 47, 'Grande', 90, 1, '2020-03-08 03:48:43'),
(176, 207, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:48:50'),
(177, 207, 64, 'Coca Chica', 15, 1, '2020-03-08 03:48:55'),
(178, 208, 46, 'Mediana', 80, 1, '2020-03-08 03:49:31'),
(179, 208, 47, 'Grande', 90, 1, '2020-03-08 03:49:35'),
(180, 208, 64, 'Coca Chica', 15, 1, '2020-03-08 03:49:40'),
(183, 208, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:49:56'),
(184, 209, 34, 'Caldo Pescado', 60, 1, '2020-03-08 03:50:37'),
(185, 209, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:50:42'),
(186, 210, 36, 'Caldo Camaron', 85, 1, '2020-03-08 03:50:58'),
(187, 211, 105, 'Combo 1', 80, 1, '2020-03-08 03:51:13'),
(188, 211, 105, 'Combo 1', 80, 1, '2020-03-08 03:51:18'),
(189, 211, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:51:30'),
(190, 212, 47, 'Grande', 90, 1, '2020-03-08 03:51:55'),
(191, 212, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 03:52:00'),
(192, 212, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:52:05'),
(193, 212, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:52:10'),
(194, 213, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 03:52:33'),
(195, 213, 105, 'Combo 1', 80, 1, '2020-03-08 03:52:37'),
(196, 213, 105, 'Combo 1', 80, 1, '2020-03-08 03:52:41'),
(197, 213, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:52:46'),
(198, 213, 45, 'chica', 55, 1, '2020-03-08 03:52:52'),
(199, 213, 64, 'Coca Chica', 15, 1, '2020-03-08 03:52:56'),
(200, 214, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 03:53:13'),
(201, 215, 35, 'Caldo Mixto', 75, 1, '2020-03-08 03:53:30'),
(202, 216, 105, 'Combo 1', 80, 1, '2020-03-08 03:53:46'),
(203, 217, 47, 'Grande', 90, 1, '2020-03-08 03:55:39'),
(206, 217, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:55:54'),
(207, 218, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 03:56:22'),
(208, 218, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:56:27'),
(209, 219, 37, 'Sopa Mariscos', 95, 1, '2020-03-08 03:56:44'),
(210, 219, 65, 'Coca / Joya', 20, 1, '2020-03-08 03:56:48'),
(211, 220, 107, 'Combo 3', 120, 1, '2020-03-08 03:57:05'),
(212, 221, 64, 'Coca Chica', 15, 1, '2020-03-08 03:57:22'),
(213, 221, 45, 'chica', 55, 1, '2020-03-08 03:57:26'),
(214, 222, 107, 'Combo 3', 120, 1, '2020-03-08 03:57:42'),
(215, 224, 36, 'Caldo Camaron', 85, 1, '2020-03-08 03:58:02'),
(216, 225, 77, 'Filete Diabla', 90, 1, '2020-03-08 03:58:26'),
(217, 225, 45, 'chica', 55, 1, '2020-03-08 03:58:56'),
(218, 225, 33, 'Queso extra', 10, 1, '2020-03-08 03:59:03'),
(219, 226, 109, 'Tost.Camaron', 40, 1, '2020-03-08 03:59:19'),
(220, 227, 47, 'Grande', 90, 1, '2020-03-08 03:59:38'),
(221, 227, 109, 'Tost.Camaron', 40, 1, '2020-03-08 03:59:47'),
(222, 228, 105, 'Combo 1', 80, 1, '2020-03-08 04:00:26'),
(223, 228, 49, 'Campechano Gde.', 95, 1, '2020-03-08 04:00:33'),
(224, 228, 109, 'Tost.Camaron', 40, 1, '2020-03-08 04:00:39'),
(225, 228, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:00:44'),
(226, 229, 37, 'Sopa Mariscos', 95, 1, '2020-03-08 04:01:03'),
(227, 229, 20, 'Tost.Surimi', 25, 1, '2020-03-08 04:01:14'),
(228, 229, 33, 'Queso extra', 10, 1, '2020-03-08 04:01:19'),
(229, 230, 105, 'Combo 1', 80, 1, '2020-03-08 04:01:36'),
(230, 231, 36, 'Caldo Camaron', 85, 1, '2020-03-08 04:01:51'),
(231, 232, 105, 'Combo 1', 80, 1, '2020-03-08 04:02:06'),
(232, 233, 69, 'Filete emp.', 70, 1, '2020-03-08 04:02:23'),
(233, 233, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:02:29'),
(234, 234, 35, 'Caldo Mixto', 75, 1, '2020-03-08 04:02:44'),
(235, 234, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:02:49'),
(236, 235, 37, 'Sopa Mariscos', 95, 1, '2020-03-08 04:03:08'),
(237, 235, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:03:13'),
(238, 236, 37, 'Sopa Mariscos', 95, 1, '2020-03-08 04:03:29'),
(239, 236, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:03:33'),
(240, 237, 52, 'Mojarra Frita', 110, 1, '2020-03-08 04:03:50'),
(241, 238, 36, 'Caldo Camaron', 85, 1, '2020-03-08 04:04:04'),
(242, 239, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 04:04:19'),
(243, 239, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:04:24'),
(244, 240, 47, 'Grande', 90, 1, '2020-03-08 04:04:40'),
(245, 240, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:04:44'),
(246, 240, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:04:48'),
(247, 240, 105, 'Combo 1', 80, 1, '2020-03-08 04:04:54'),
(248, 241, 35, 'Caldo Mixto', 75, 1, '2020-03-08 04:05:10'),
(249, 242, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 04:05:25'),
(250, 242, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:05:30'),
(251, 243, 34, 'Caldo Pescado', 60, 1, '2020-03-08 04:05:46'),
(252, 243, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:05:50'),
(253, 244, 45, 'chica', 55, 1, '2020-03-08 04:06:06'),
(254, 245, 24, 'Tost.Vuelve', 50, 1, '2020-03-08 04:06:21'),
(255, 245, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:06:25'),
(256, 245, 53, 'Mojarra Mojo', 115, 1, '2020-03-08 04:06:31'),
(257, 246, 47, 'Grande', 90, 1, '2020-03-08 04:06:46'),
(258, 246, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:06:50'),
(259, 247, 46, 'Mediana', 80, 1, '2020-03-08 04:07:07'),
(260, 247, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:07:12'),
(261, 248, 34, 'Caldo Pescado', 60, 1, '2020-03-08 04:07:28'),
(262, 248, 34, 'Caldo Pescado', 60, 1, '2020-03-08 04:07:32'),
(263, 248, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:07:39'),
(264, 248, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:07:44'),
(265, 249, 37, 'Sopa Mariscos', 95, 1, '2020-03-08 04:08:00'),
(266, 249, 37, 'Sopa Mariscos', 95, 1, '2020-03-08 04:08:04'),
(267, 249, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:08:10'),
(268, 249, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:08:15'),
(269, 250, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 04:08:30'),
(270, 250, 51, 'Vuelve Gde.', 100, 1, '2020-03-08 04:08:34'),
(271, 250, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:08:40'),
(272, 250, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:08:44'),
(273, 251, 36, 'Caldo Camaron', 85, 1, '2020-03-08 04:09:02'),
(274, 251, 65, 'Coca / Joya', 20, 1, '2020-03-08 04:09:08'),
(299, 262, 436, 'Grande', 90, 1, '2020-03-08 22:54:34'),
(300, 262, 454, 'Coca / Joya', 20, 1, '2020-03-08 22:54:39'),
(301, 263, 485, 'Combo 1', 80, 1, '2020-03-08 22:56:11'),
(307, 264, 426, 'Sopa Mariscos', 95, 1, '2020-03-08 22:57:29'),
(308, 264, 487, 'Combo 3', 120, 1, '2020-03-08 22:57:35'),
(309, 264, 440, 'Vuelve Gde.', 100, 1, '2020-03-08 22:57:54'),
(310, 264, 454, 'Coca / Joya', 20, 1, '2020-03-08 22:57:59'),
(311, 264, 454, 'Coca / Joya', 20, 1, '2020-03-08 22:58:04'),
(312, 264, 494, 'Dif.Coca', 5, 1, '2020-03-08 22:58:11'),
(313, 265, 436, 'Grande', 90, 1, '2020-03-08 22:58:39'),
(314, 265, 486, 'Combo 2', 100, 1, '2020-03-08 22:58:44'),
(315, 265, 436, 'Grande', 90, 1, '2020-03-08 22:58:56'),
(316, 266, 435, 'Mediana', 80, 1, '2020-03-08 22:59:27'),
(317, 266, 435, 'Mediana', 80, 1, '2020-03-08 22:59:33'),
(318, 266, 454, 'Coca / Joya', 20, 1, '2020-03-08 22:59:39'),
(319, 266, 454, 'Coca / Joya', 20, 1, '2020-03-08 22:59:46'),
(320, 267, 440, 'Vuelve Gde.', 100, 1, '2020-03-08 23:00:13'),
(321, 267, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:00:19'),
(322, 268, 441, 'Mojarra Frita', 110, 1, '2020-03-08 23:00:39'),
(323, 268, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:00:44'),
(324, 269, 426, 'Sopa Mariscos', 95, 1, '2020-03-08 23:01:05'),
(325, 269, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:01:10'),
(326, 270, 425, 'Caldo Camaron', 85, 1, '2020-03-08 23:01:56'),
(327, 270, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:02:01'),
(328, 271, 435, 'Mediana', 80, 1, '2020-03-08 23:02:23'),
(329, 271, 424, 'Caldo Mixto', 75, 1, '2020-03-08 23:02:28'),
(330, 272, 486, 'Combo 2', 100, 1, '2020-03-08 23:02:51'),
(331, 272, 486, 'Combo 2', 100, 1, '2020-03-08 23:02:57'),
(332, 273, 430, 'Camaron 1px.', 90, 1, '2020-03-08 23:03:36'),
(333, 273, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:03:42'),
(334, 274, 434, 'chica', 55, 1, '2020-03-08 23:03:58'),
(335, 274, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:04:04'),
(336, 274, 434, 'chica', 55, 1, '2020-03-08 23:04:10'),
(337, 275, 410, 'Tost.Ceviche', 30, 1, '2020-03-08 23:05:27'),
(338, 275, 410, 'Tost.Ceviche', 30, 1, '2020-03-08 23:05:34'),
(339, 276, 425, 'Caldo Camaron', 85, 1, '2020-03-08 23:05:52'),
(340, 276, 425, 'Caldo Camaron', 85, 1, '2020-03-08 23:05:58'),
(341, 276, 487, 'Combo 3', 120, 1, '2020-03-08 23:06:04'),
(342, 276, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:06:10'),
(343, 276, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:06:20'),
(344, 277, 485, 'Combo 1', 80, 1, '2020-03-08 23:06:40'),
(345, 277, 485, 'Combo 1', 80, 1, '2020-03-08 23:06:45'),
(346, 278, 435, 'Mediana', 80, 1, '2020-03-08 23:07:36'),
(347, 279, 487, 'Combo 3', 120, 1, '2020-03-08 23:08:10'),
(348, 279, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:08:15'),
(349, 280, 458, 'Filete emp.', 70, 1, '2020-03-08 23:09:48'),
(350, 280, 458, 'Filete emp.', 70, 1, '2020-03-08 23:09:53'),
(351, 280, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:09:58'),
(352, 281, 434, 'Chica', 55, 1, '2020-03-08 23:10:17'),
(355, 281, 454, 'Coca / Joya', 20, 1, '2020-03-08 23:10:33'),
(356, 281, 489, 'Tost.Camaron', 40, 1, '2020-03-08 23:10:56'),
(357, 281, 489, 'Tost.Camaron', 40, 1, '2020-03-08 23:11:02'),
(358, 282, 436, 'Grande', 90, 1, '2020-03-09 00:20:02'),
(359, 283, 429, 'Pescado 2px.', 130, 1, '2020-03-09 00:20:21'),
(360, 283, 454, 'Coca / Joya', 20, 1, '2020-03-09 00:20:28'),
(361, 283, 454, 'Coca / Joya', 20, 1, '2020-03-09 00:20:33'),
(362, 284, 434, 'Chica', 55, 1, '2020-03-09 00:20:52'),
(363, 284, 426, 'Sopa Mariscos', 95, 1, '2020-03-09 00:20:57'),
(364, 284, 454, 'Coca / Joya', 20, 1, '2020-03-09 00:21:03'),
(365, 285, 436, 'Grande', 90, 1, '2020-03-09 02:31:47'),
(366, 285, 454, 'Coca / Joya', 20, 1, '2020-03-09 02:31:54'),
(367, 286, 410, 'Tost.Ceviche', 30, 1, '2020-03-09 02:32:52'),
(368, 286, 454, 'Coca / Joya', 20, 1, '2020-03-09 02:32:58'),
(369, 286, 456, 'Agua natural', 20, 1, '2020-03-09 02:33:14'),
(370, 286, 465, 'Filete Champi.', 85, 1, '2020-03-09 02:33:24'),
(371, 287, 434, 'Chica', 55, 1, '2020-03-09 02:33:55'),
(372, 287, 454, 'Coca / Joya', 20, 1, '2020-03-09 02:34:02'),
(373, 288, 425, 'Caldo Camaron', 85, 1, '2020-03-09 02:35:22'),
(374, 288, 450, 'Alambre Cam.', 140, 1, '2020-03-09 02:35:34'),
(375, 288, 454, 'Coca / Joya', 20, 1, '2020-03-09 02:35:40'),
(376, 288, 454, 'Coca / Joya', 20, 1, '2020-03-09 02:35:48'),
(377, 289, 436, 'Grande', 90, 1, '2020-03-09 02:37:35'),
(378, 289, 454, 'Coca / Joya', 20, 1, '2020-03-09 02:37:42'),
(379, 290, 458, 'Filete emp.', 70, 1, '2020-03-09 02:38:13'),
(380, 290, 454, 'Coca / Joya', 20, 1, '2020-03-09 02:38:20'),
(381, 292, 485, 'Combo 1', 80, 1, '2020-03-09 02:48:41'),
(382, 293, 458, 'Filete emp.', 70, 1, '2020-03-09 02:48:57'),
(383, 294, 487, 'Combo 3', 120, 1, '2020-03-09 03:02:46'),
(384, 294, 487, 'Combo 3', 120, 1, '2020-03-09 03:02:53'),
(385, 294, 454, 'Coca / Joya', 20, 1, '2020-03-09 03:03:00'),
(386, 294, 454, 'Coca / Joya', 20, 1, '2020-03-09 03:03:06'),
(387, 294, 454, 'Coca / Joya', 20, 1, '2020-03-09 03:03:11'),
(388, 294, 454, 'Coca / Joya', 20, 1, '2020-03-09 03:03:15'),
(389, 294, 438, 'Campechano Gde.', 95, 1, '2020-03-09 03:03:27'),
(390, 311, 402, 'Papas Francesa', 40, 1, '2020-03-11 01:52:24'),
(391, 311, 420, 'Emp.Filete', 35, 1, '2020-03-11 01:52:28'),
(392, 312, 416, 'Quesadillas', 50, 1, '2020-03-11 01:53:45'),
(393, 312, 406, 'Ensalada Surimi', 50, 1, '2020-03-11 01:53:49'),
(394, 313, 425, 'Caldo Camaron', 85, 1, '2020-03-11 01:54:25'),
(395, 314, 115, 'Orden de Arroz', 40, 1, '2020-03-11 01:54:40'),
(396, 314, 406, 'Ensalada Surimi', 50, 1, '2020-03-11 01:54:44'),
(397, 315, 434, 'Chica', 55, 1, '2020-03-11 01:55:10'),
(398, 317, 121, 'Ensalada Surimi', 80, 1, '2020-03-11 01:56:02'),
(399, 318, 425, 'Caldo Camaron', 85, 1, '2020-03-11 01:56:39'),
(400, 319, 430, 'Camaron 1px.', 90, 1, '2020-03-11 01:57:01'),
(401, 320, 426, 'Sopa Mariscos', 95, 1, '2020-03-11 01:57:24'),
(402, 321, 400, 'Orden de Arroz', 25, 1, '2020-03-16 22:49:50'),
(403, 323, 400, 'Orden de Arroz', 25, 1, '2020-03-18 00:54:18'),
(404, 323, 402, 'Papas Francesa', 40, 1, '2020-03-18 00:57:20'),
(405, 332, 402, 'Papas Francesa', 40, 1, '2020-03-18 01:51:04'),
(406, 333, 400, 'Orden de Arroz', 25, 1, '2020-03-18 02:44:57'),
(407, 334, 400, 'Orden de Arroz', 25, 1, '2020-03-18 23:03:46'),
(408, 335, 400, 'Orden de Arroz', 25, 1, '2020-03-18 23:04:23'),
(409, 336, 400, 'Orden de Arroz', 25, 1, '2020-03-18 23:06:04'),
(410, 337, 400, 'Orden de Arroz', 25, 1, '2020-03-18 23:07:16'),
(411, 339, 400, 'Orden de Arroz', 25, 1, '2020-03-19 00:38:19'),
(412, 340, 400, 'Orden de Arroz', 25, 1, '2020-03-19 00:40:22'),
(413, 343, 400, 'Orden de Arroz', 25, 1, '2020-03-19 00:45:42'),
(414, 343, 401, 'Consomé Pescado', 30, 1, '2020-03-19 00:46:49'),
(415, 343, 408, 'Ens.Camarón', 80, 1, '2020-03-19 00:46:59'),
(416, 344, 400, 'Orden de Arroz', 25, 1, '2020-03-19 01:40:17'),
(417, 345, 400, 'Orden de Arroz', 25, 1, '2020-03-19 01:40:47'),
(418, 346, 401, 'Consomé Pescado', 30, 1, '2020-03-19 01:41:49'),
(419, 347, 402, 'Papas Francesa', 40, 1, '2020-03-19 01:42:35'),
(420, 348, 400, 'Orden de Arroz', 25, 1, '2020-03-19 01:43:12'),
(421, 351, 400, 'Orden de Arroz', 25, 1, '2020-03-19 01:47:07'),
(422, 356, 400, 'Orden de Arroz', 25, 1, '2020-03-19 01:52:47'),
(423, 357, 400, 'Orden de Arroz', 25, 1, '2020-03-19 01:54:54'),
(424, 357, 406, 'Ensalada Surimi', 50, 1, '2020-03-19 01:54:59'),
(425, 357, 413, 'Tost.Vuelve', 50, 1, '2020-03-19 01:55:05'),
(426, 357, 469, 'Filete Relleno', 100, 1, '2020-03-19 01:55:13'),
(427, 358, 405, 'Papas Nacho', 50, 1, '2020-03-19 01:55:54'),
(428, 358, 408, 'Ens.Camarón', 80, 1, '2020-03-19 01:56:00'),
(429, 358, 481, 'Camarones Relle', 140, 1, '2020-03-19 01:56:08'),
(430, 359, 400, 'Orden de Arroz', 25, 1, '2020-03-19 02:06:17'),
(431, 360, 400, 'Orden de Arroz', 25, 1, '2020-03-19 02:07:24'),
(432, 361, 403, 'Aros Cebolla', 50, 1, '2020-03-19 02:11:36'),
(433, 363, 400, 'Orden de Arroz', 25, 1, '2020-03-20 03:06:10'),
(434, 364, 400, 'Orden de Arroz', 25, 1, '2020-03-20 20:39:59'),
(435, 366, 400, 'Orden de Arroz', 25, 1, '2020-03-21 01:52:53'),
(436, 366, 418, 'Filete Jr.', 50, 1, '2020-03-21 01:52:59'),
(437, 367, 402, 'Papas Francesa', 40, 1, '2020-03-21 02:20:03'),
(438, 367, 408, 'Ens.Camarón', 80, 1, '2020-03-21 02:20:08'),
(439, 367, 413, 'Tost.Vuelve', 50, 1, '2020-03-21 02:20:13'),
(440, 367, 426, 'Sopa Mariscos', 95, 1, '2020-03-21 02:20:17'),
(441, 367, 426, 'Sopa Mariscos', 95, 1, '2020-03-21 02:20:22'),
(442, 368, 402, 'Papas Francesa', 40, 1, '2020-03-21 02:39:25'),
(443, 368, 406, 'Ensalada Surimi', 50, 1, '2020-03-21 02:39:29'),
(444, 368, 487, 'Combo 3', 120, 1, '2020-03-21 02:39:35'),
(445, 368, 437, 'Campechano Med.', 85, 1, '2020-03-21 02:39:40'),
(446, 368, 484, 'Mariscada Fami', 500, 1, '2020-03-21 02:39:45'),
(447, 368, 428, 'Pescado 1px.', 70, 1, '2020-03-21 02:39:49'),
(448, 368, 413, 'Tost.Vuelve', 50, 1, '2020-03-21 02:39:54'),
(449, 368, 443, 'Mojarra Ajillo', 120, 1, '2020-03-21 02:39:59'),
(450, 368, 461, 'Filete Verac.', 85, 1, '2020-03-21 02:40:04'),
(451, 372, 400, 'Orden de Arroz', 25, 1, '2020-03-22 01:10:45'),
(452, 372, 406, 'Ensalada Surimi', 50, 1, '2020-03-22 01:10:59');

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enccuenta`
--

INSERT INTO `enccuenta` (`id`, `idCajero`, `IdCliente`, `mesaBanco`, `idtipoCuenta`, `iddelivery`, `telefono`, `contacto`, `direccion`, `entrecalles`, `pagacon`, `total`, `iva`, `cambio`, `horapedido`, `notas`, `idtipopago`, `fecha`, `idestatus`) VALUES
(203, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:28:37', 5),
(204, 1, 3, '', 3, 3, '', '', '', '', 50, 151, 21, -101, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:34:50', 4),
(205, 1, 3, '', 3, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:36:51', 3),
(206, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 50, 133, 18, -83, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:48:20', 4),
(207, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 0, 238, 33, -238, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:49:00', 5),
(208, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 50, 238, 33, -188, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:50:26', 4),
(209, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 93, 13, -43, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:50:46', 4),
(210, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 99, 14, -49, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:51:02', 4),
(211, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 209, 29, -159, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:51:40', 4),
(212, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 267, 37, -217, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:52:14', 4),
(213, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 406, 56, -356, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:53:00', 4),
(214, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 50, 116, 16, -66, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:53:17', 4),
(215, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 87, 12, -37, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:53:34', 4),
(216, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 93, 13, -43, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:53:50', 4),
(217, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 128, 18, -78, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:56:11', 4),
(218, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 139, 19, -89, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:56:31', 4),
(219, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 133, 18, -83, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:56:52', 4),
(220, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 50, 139, 19, -89, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:57:09', 4),
(221, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 81, 11, -31, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:57:30', 4),
(222, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 139, 19, -89, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:57:45', 4),
(223, 1, 1, '', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:57:50', 3),
(224, 1, 2, '', 2, 0, '', '', '', '', 50, 99, 14, -49, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:58:06', 4),
(225, 1, 3, '', 3, 3, '', '', '', '', 50, 180, 25, -130, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:59:08', 4),
(226, 1, 2, '', 2, 0, '', '', '', '', 50, 46, 6, 4, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:59:22', 4),
(227, 1, 3, '', 3, 3, '', '', '', '', 50, 151, 21, -101, '0000-00-00 00:00:00', '', 1, '2020-03-08 03:59:52', 4),
(228, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 273, 38, -223, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:00:48', 4),
(229, 1, 3, '', 3, 3, '', '', '', '', 50, 151, 21, -101, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:01:23', 4),
(230, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 93, 13, -43, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:01:40', 4),
(231, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 99, 14, -49, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:01:55', 4),
(232, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 93, 13, -43, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:02:09', 4),
(233, 1, 1, 'Mesa6', 1, 0, '', '', '', '', 50, 104, 14, -54, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:02:34', 4),
(234, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 110, 15, -60, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:02:53', 4),
(235, 1, 1, 'Mesa6', 1, 0, '', '', '', '', 50, 133, 18, -83, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:03:17', 4),
(236, 1, 1, 'Banco9', 1, 0, '', '', '', '', 50, 133, 18, -83, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:03:39', 4),
(237, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 50, 128, 18, -78, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:03:53', 4),
(238, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 99, 14, -49, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:04:08', 4),
(239, 1, 1, 'Mesa6', 1, 0, '', '', '', '', 50, 139, 19, -89, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:04:27', 4),
(240, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 50, 244, 34, -194, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:04:58', 4),
(241, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 87, 12, -37, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:05:13', 4),
(242, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 50, 139, 19, -89, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:05:34', 4),
(243, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 50, 93, 13, -43, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:05:54', 4),
(244, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 50, 64, 9, -14, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:06:09', 4),
(245, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 50, 215, 30, -165, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:06:35', 4),
(246, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 50, 128, 18, -78, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:06:55', 4),
(247, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 116, 16, -66, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:07:16', 4),
(248, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 50, 186, 26, -136, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:07:48', 4),
(249, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 50, 267, 37, -217, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:08:19', 4),
(250, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 50, 278, 38, -228, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:08:51', 4),
(251, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 50, 122, 17, -72, '0000-00-00 00:00:00', '', 1, '2020-03-08 04:09:12', 4),
(252, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 128, 18, -128, '0000-00-00 00:00:00', '', 1, '2020-03-08 20:54:02', 5),
(256, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-08 21:10:18', 5),
(262, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 110, 18, -110, '0000-00-00 00:00:00', '', 1, '2020-03-08 22:54:43', 4),
(263, 1, 1, 'Mesa6', 1, 0, '', '', '', '', 0, 80, 13, -80, '0000-00-00 00:00:00', '', 1, '2020-03-08 22:57:17', 4),
(264, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 360, 58, -360, '0000-00-00 00:00:00', '', 1, '2020-03-08 22:58:16', 4),
(265, 1, 3, '', 3, 3, '', '', '', '', 0, 280, 45, -280, '0000-00-00 00:00:00', '', 1, '2020-03-08 22:59:00', 4),
(266, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 200, 32, -200, '0000-00-00 00:00:00', '', 1, '2020-03-08 22:59:50', 4),
(267, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 0, 120, 19, -120, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:00:23', 4),
(268, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 130, 21, -130, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:00:49', 4),
(269, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 115, 18, -115, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:01:17', 4),
(270, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 105, 17, -105, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:02:07', 4),
(271, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 0, 155, 25, -155, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:02:32', 4),
(272, 1, 1, 'Banco5', 1, 0, '', '', '', '', 0, 200, 32, -200, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:03:00', 4),
(273, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 110, 18, -110, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:03:45', 4),
(274, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 0, 130, 21, -130, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:05:12', 4),
(275, 1, 2, '', 2, 0, '', '', '', '', 0, 60, 10, -60, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:05:38', 4),
(276, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 330, 53, -330, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:06:25', 4),
(277, 1, 2, '', 2, 0, '', '', '', '', 0, 160, 26, -160, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:06:52', 4),
(278, 1, 2, '', 2, 0, '', '', '', '', 0, 80, 13, -80, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:07:54', 4),
(279, 1, 1, 'Mesa6', 1, 0, '', '', '', '', 0, 140, 22, -140, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:08:19', 4),
(280, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 160, 26, -160, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:10:03', 4),
(281, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 155, 25, -155, '0000-00-00 00:00:00', '', 1, '2020-03-08 23:11:07', 4),
(282, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 90, 14, -90, '0000-00-00 00:00:00', '', 1, '2020-03-09 00:20:06', 4),
(283, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 170, 27, -170, '0000-00-00 00:00:00', '', 1, '2020-03-09 00:20:38', 4),
(284, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 170, 27, -170, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:30:03', 4),
(285, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 0, 110, 18, -110, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:32:32', 4),
(286, 1, 1, 'Mesa2', 1, 0, '', '', '', '', 0, 155, 25, -155, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:33:38', 4),
(287, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 0, 75, 12, -75, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:34:07', 4),
(288, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 265, 42, -265, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:35:54', 4),
(289, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 110, 18, -110, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:37:47', 4),
(290, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 90, 14, -90, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:38:27', 4),
(291, 1, 1, '', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:48:20', 3),
(292, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 80, 13, -80, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:48:44', 4),
(293, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 70, 11, -70, '0000-00-00 00:00:00', '', 1, '2020-03-09 02:49:03', 4),
(294, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 415, 66, -415, '0000-00-00 00:00:00', '', 1, '2020-03-09 03:03:33', 4),
(310, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:50:29', 5),
(311, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 75, 12, -75, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:52:32', 4),
(312, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 100, 16, -100, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:53:54', 4),
(313, 1, 2, '', 2, 0, '', '', '', '', 0, 85, 14, -85, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:54:29', 4),
(314, 1, 3, '', 3, 3, '', '', '', '', 0, 90, 14, -90, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:54:49', 4),
(315, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 55, 9, -55, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:55:14', 4),
(316, 1, 3, '', 3, 3, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:55:48', 5),
(317, 1, 3, '', 3, 3, '', '', '', '', 0, 80, 13, -80, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:56:24', 4),
(318, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 85, 14, -85, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:56:48', 4),
(319, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 90, 14, -90, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:57:05', 4),
(320, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 95, 15, -95, '0000-00-00 00:00:00', '', 1, '2020-03-11 01:57:28', 4),
(321, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-16 22:54:33', 4),
(322, 1, 2, '', 2, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-16 22:56:08', 4),
(323, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 65, 10, -65, '0000-00-00 00:00:00', '', 1, '2020-03-18 00:58:58', 4),
(324, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:23:05', 4),
(325, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:32:00', 4),
(326, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:33:21', 4),
(327, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:36:02', 4),
(328, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:37:22', 4),
(329, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:45:33', 4),
(330, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:46:13', 4),
(331, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-18 01:48:01', 4),
(332, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 40, 6, -40, '0000-00-00 00:00:00', '', 1, '2020-03-18 02:30:07', 4),
(333, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-18 02:46:50', 4),
(334, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-18 23:03:54', 4),
(335, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-18 23:05:37', 4),
(336, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-18 23:06:09', 4),
(337, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 00:37:34', 4),
(338, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 00:38:00', 4),
(339, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 00:38:52', 4),
(340, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 00:43:13', 4),
(341, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 00:43:34', 4),
(342, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 00:44:25', 4),
(343, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 135, 22, -135, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:39:52', 4),
(344, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:40:21', 4),
(345, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:40:52', 4),
(346, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 30, 5, -30, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:41:56', 4),
(347, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 40, 6, -40, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:42:42', 4),
(348, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:45:00', 4),
(349, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:45:18', 4),
(350, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:46:25', 4),
(351, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:49:37', 4),
(352, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:49:51', 4),
(353, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:50:21', 4),
(354, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:51:25', 4),
(355, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:51:59', 4),
(356, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:53:58', 4),
(357, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 225, 36, -225, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:55:40', 4),
(358, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 270, 43, -270, '0000-00-00 00:00:00', '', 1, '2020-03-19 01:56:16', 4),
(359, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 02:06:22', 4),
(360, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-19 02:11:06', 4),
(361, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 50, 8, -50, '0000-00-00 00:00:00', '', 1, '2020-03-19 02:34:09', 4),
(362, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-20 03:09:19', 3),
(363, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-20 02:48:20', 3),
(364, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 25, 4, -25, '0000-00-00 00:00:00', '', 1, '2020-03-21 02:11:00', 4),
(365, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-20 21:37:39', 5),
(366, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 75, 12, -75, '0000-00-00 00:00:00', '', 1, '2020-03-21 01:55:31', 3),
(367, 1, 1, 'Mesa5', 1, 0, '', '', '', '', 0, 360, 58, -360, '0000-00-00 00:00:00', '', 1, '2020-03-21 02:20:37', 4),
(368, 1, 1, 'Mesa3', 1, 0, '', '', '', '', 0, 1120, 179, -1120, '0000-00-00 00:00:00', '', 1, '2020-03-21 02:40:11', 4),
(369, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-21 22:24:24', 5),
(370, 1, 1, 'Mesa4', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-21 22:29:37', 5),
(371, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-21 22:34:48', 5),
(372, 1, 1, 'Mesa1', 1, 0, '', '', '', '', 0, 75, 12, -75, '0000-00-00 00:00:00', '', 1, '2020-03-22 01:11:06', 3),
(373, 1, 3, '', 3, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 1, '2020-03-28 04:00:08', 3);

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastosdiarios`
--

INSERT INTO `gastosdiarios` (`id`, `idCajero`, `concepto`, `total`, `abono`, `pago`, `comentarios`, `idTipoGasto`, `fecha`) VALUES
(9, 1, 'Josue', 1000, 0, 1000, 'Abono', 2, '2020-03-08 04:10:10'),
(10, 1, 'Aceite', 95, 0, 95, 'Aceite', 2, '2020-03-08 04:10:25'),
(11, 1, 'Notas', 60, 0, 60, 'Notas', 2, '2020-03-08 04:10:38'),
(12, 1, 'Fabuloso', 13, 0, 13, 'Fabuloso', 2, '2020-03-08 04:10:54'),
(13, 1, 'Cora', 500, 0, 500, 'Se llevo Cora 500', 2, '2020-03-08 04:11:08'),
(14, 1, 'Tablet', 300, 0, 300, 'Compra de Tablet', 2, '2020-03-08 04:11:22'),
(15, 1, 'Gas', 200, 0, 200, 'Gas', 2, '2020-03-08 04:11:34'),
(16, 1, 'Bolsa Bollo', 10, 0, 10, 'Bolsa Bollo', 2, '2020-03-08 21:21:12'),
(17, 1, 'Aceite', 19, 0, 19, 'Aceite', 2, '2020-03-08 21:21:28'),
(18, 1, 'Fibra', 12, 0, 12, 'Fibra', 2, '2020-03-08 21:21:46'),
(19, 1, 'Mercado', 17, 0, 17, 'Verdura', 2, '2020-03-08 21:22:05'),
(20, 1, 'Vive 100', 36, 0, 36, 'Vive 100', 2, '2020-03-08 23:12:19'),
(21, 1, 'Koynoor', 95, 0, 95, 'Regalos Koynoor', 2, '2020-03-08 23:47:00'),
(22, 1, 'Beta', 200, 0, 200, 'Prestamo Beta', 2, '2020-03-09 03:04:21'),
(23, 1, 'Carne', 35, 0, 35, 'Comida', 2, '2020-03-09 03:09:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialinventario`
--

CREATE TABLE `historialinventario` (
  `id` int(11) NOT NULL,
  `idcatproductos` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idunidad` int(11) NOT NULL,
  `idcajero` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fechacaptura` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historialinventario`
--

INSERT INTO `historialinventario` (`id`, `idcatproductos`, `codigo`, `nombre`, `precio`, `stock`, `idcategoria`, `idproveedor`, `idunidad`, `idcajero`, `idstatus`, `fechacaptura`, `fecha`) VALUES
(4, 9, '000002', 'Tomate', 100, 1, 2, 1, 5, 1, 1, '2019-07-19 16:50:20', '2019-07-24 17:46:53'),
(5, 9, '000002', 'Tomate', 100, 4, 2, 1, 5, 1, 1, '2019-07-24 12:46:53', '2020-02-28 01:25:56'),
(6, 9, '000002', 'Tomate', 120, 3, 2, 1, 5, 1, 1, '2020-02-27 19:25:56', '2020-02-28 01:26:16'),
(7, 9, '000002', 'Tomate', 120, 2, 2, 1, 5, 1, 1, '2020-02-27 19:26:16', '2020-02-28 01:26:26'),
(8, 9, '000002', 'Tomate', 250, 2, 2, 1, 5, 1, 1, '2020-02-27 19:26:26', '2020-03-04 20:03:04'),
(9, 12, '000003', 'Coktelero', 150, 15, 1, 1, 1, 1, 1, '2020-02-27 19:27:10', '2020-03-13 01:46:06'),
(10, 10, '000003', 'Camaron Coctelero', 105, 5, 1, 1, 1, 1, 1, '2019-07-19 17:49:27', '2020-03-13 01:51:10'),
(11, 10, '000003', 'Camaron Coctelero', 105, 10, 1, 1, 1, 1, 1, '2020-03-12 19:51:10', '2020-03-13 01:56:28'),
(12, 12, '000003', 'Coktelero', 0, 0, 1, 1, 1, 1, 1, '2020-03-12 19:46:06', '2020-03-13 01:57:05'),
(13, 11, '000001', 'Aguacate', 250, 1, 2, 1, 5, 1, 1, '2020-02-27 19:25:25', '2020-03-13 01:59:00'),
(14, 12, '000003', 'Coktelero', 150, 5, 1, 1, 1, 1, 1, '2020-03-12 19:57:06', '2020-03-13 02:09:08'),
(15, 12, '000003', 'Coktelero', 150, 10, 1, 1, 1, 1, 1, '2020-03-12 20:09:08', '2020-03-13 02:11:20'),
(16, 12, '000003', 'Coktelero', 150, 15, 1, 1, 1, 1, 1, '2020-03-12 20:11:20', '2020-03-13 02:24:16'),
(17, 12, '000003', 'Coktelero', 150, 150, 1, 1, 1, 1, 1, '2020-03-12 20:24:16', '2020-03-13 02:25:07'),
(18, 11, '000001', 'Aguacate', 250, 10, 2, 1, 5, 1, 1, '2020-03-12 19:59:00', '2020-03-13 02:26:12'),
(19, 11, '000001', 'Aguacate', 250, 100, 2, 1, 5, 1, 1, '2020-03-12 20:26:12', '2020-03-13 02:27:37'),
(20, 9, '000002', 'Tomate', 260, 2, 2, 1, 5, 1, 1, '2020-03-04 14:03:04', '2020-03-13 02:29:55'),
(21, 9, '000002', 'Tomate', 260, 260, 2, 1, 5, 1, 1, '2020-03-12 20:29:55', '2020-03-13 02:30:29'),
(22, 11, '000001', 'Aguacate', 250, 250, 2, 1, 5, 1, 1, '2020-03-12 20:27:37', '2020-03-14 00:15:02'),
(23, 9, '000002', 'Tomate', 260, 200, 2, 1, 5, 1, 1, '2020-03-12 20:30:29', '2020-03-14 00:15:17'),
(24, 12, '000003', 'Coktelero', 150, 100, 1, 1, 1, 1, 1, '2020-03-12 20:25:07', '2020-03-14 00:15:42'),
(25, 10, '000003', 'Camaron Coctelero', 115, 8, 1, 1, 1, 1, 1, '2020-03-12 19:56:28', '2020-03-14 00:15:50'),
(26, 1, '00000', 'Camaron Cocktelero Nacional', 150, 3, 1, 2, 1, 1, 1, '2020-03-14 14:32:27', '2020-03-26 01:20:45'),
(27, 1, '00000', 'Camaron Cocktelero Nacional', 150, 12, 1, 2, 1, 1, 1, '2020-03-25 19:20:45', '2020-03-26 01:21:26'),
(28, 16, '00000', 'Aguacate', 270, 1, 2, 1, 5, 1, 1, '2020-03-14 15:36:39', '2020-03-26 01:32:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menucategorias`
--

CREATE TABLE `menucategorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `imagen` varchar(3000) NOT NULL,
  `color` varchar(50) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menucategorias`
--

INSERT INTO `menucategorias` (`id`, `nombre`, `imagen`, `color`, `idstatus`, `fecha`) VALUES
(15, 'Entradas', '../images/Iconos/MenuItems/entradas.png', '#FF5722', 1, '2020-03-07 02:26:01'),
(16, 'Ensaladas', '../images/Iconos/MenuItems/ensaladas.png', '#721b65', 1, '2020-03-07 02:26:01'),
(17, 'Tostadas', '../images/Iconos/MenuItems/tostadas.png', '#212121', 1, '2020-03-07 02:28:42'),
(18, 'Tacos', '../images/Iconos/MenuItems/tacos.png', '#757575', 1, '2020-03-07 02:30:22'),
(19, 'Infantiles', '../images/Iconos/MenuItems/infantiles.png', '#1eb2a6', 1, '2020-03-07 02:40:00'),
(20, 'Empanadas', '../images/Iconos/MenuItems/empanadas.png', '#413c69', 1, '2020-03-07 02:44:33'),
(21, 'Caldos', '../images/Iconos/MenuItems/caldos.png', '#FF5252', 1, '2020-03-07 02:44:33'),
(22, 'Ceviches', '../images/Iconos/MenuItems/ceviches.png', '#0f4c81', 1, '2020-03-07 02:48:56'),
(23, 'Cockteles', '../images/Iconos/MenuItems/coctel.png', '#536DFE', 1, '2020-03-07 02:48:56'),
(24, 'Pescados', '../images/Iconos/MenuItems/pescados.png', '#4CAF50', 1, '2020-03-07 03:05:14'),
(25, 'Especiales', '../images/Iconos/MenuItems/especialidades.png', '#FFEB3B', 1, '2020-03-07 03:05:14'),
(26, 'Bebidas', '../images/Iconos/MenuItems/bebidas.png', '#E040FB', 1, '2020-03-07 03:05:14'),
(27, 'Filetes', '../images/Iconos/MenuItems/filetes.png', '#795548', 1, '2020-03-07 03:05:14'),
(28, 'Camarones', '../images/Iconos/MenuItems/camarones.png', '#CDDC39', 1, '2020-03-07 03:05:14'),
(29, 'Mariscada', '../images/Iconos/MenuItems/mariscadas.png', '#ba6b57', 1, '2020-03-07 03:05:58'),
(30, 'Combos', '../images/Iconos/MenuItems/combo.png', '#7B1FA2', 1, '2020-03-07 03:14:43'),
(31, 'Extras', '../images/Iconos/MenuItems/extras.png', '#27496d', 1, '2020-03-08 20:40:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relojchecador`
--

CREATE TABLE `relojchecador` (
  `id` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `horaentrada` time NOT NULL,
  `horasalida` time NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relojchecador`
--

INSERT INTO `relojchecador` (`id`, `idempleado`, `horaentrada`, `horasalida`, `fecha`, `idstatus`) VALUES
(8, 1, '06:32:59', '06:33:08', '2019-08-19 23:33:08', 1),
(9, 1, '10:23:23', '10:24:29', '2019-08-20 15:24:29', 1),
(10, 1, '07:28:10', '07:28:54', '2020-02-28 01:28:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidainventario`
--

CREATE TABLE `salidainventario` (
  `id` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idunidad` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fechaSalida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salidainventario`
--

INSERT INTO `salidainventario` (`id`, `idcategoria`, `idproducto`, `cantidad`, `idunidad`, `idusuario`, `fechaSalida`) VALUES
(11, 1, 1, 1, 1, 1, '2020-03-29 01:35:22'),
(12, 1, 2, 5, 1, 1, '2020-03-29 01:35:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catcategorias`
--
ALTER TABLE `catcategorias`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `catplatillos_delivery`
--
ALTER TABLE `catplatillos_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catproductos`
--
ALTER TABLE `catproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catproveedores`
--
ALTER TABLE `catproveedores`
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
-- Indices de la tabla `catunidades`
--
ALTER TABLE `catunidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catusers`
--
ALTER TABLE `catusers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierrediario`
--
ALTER TABLE `cierrediario`
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
-- Indices de la tabla `historialinventario`
--
ALTER TABLE `historialinventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menucategorias`
--
ALTER TABLE `menucategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relojchecador`
--
ALTER TABLE `relojchecador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salidainventario`
--
ALTER TABLE `salidainventario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catcategorias`
--
ALTER TABLE `catcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catcivilstatus`
--
ALTER TABLE `catcivilstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `catclientes`
--
ALTER TABLE `catclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT de la tabla `catplatillos_delivery`
--
ALTER TABLE `catplatillos_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT de la tabla `catproductos`
--
ALTER TABLE `catproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `catproveedores`
--
ALTER TABLE `catproveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `catunidades`
--
ALTER TABLE `catunidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `catusers`
--
ALTER TABLE `catusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cierrediario`
--
ALTER TABLE `cierrediario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `detcuenta`
--
ALTER TABLE `detcuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453;

--
-- AUTO_INCREMENT de la tabla `enccuenta`
--
ALTER TABLE `enccuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT de la tabla `gastosdiarios`
--
ALTER TABLE `gastosdiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `historialinventario`
--
ALTER TABLE `historialinventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `menucategorias`
--
ALTER TABLE `menucategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `relojchecador`
--
ALTER TABLE `relojchecador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `salidainventario`
--
ALTER TABLE `salidainventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
