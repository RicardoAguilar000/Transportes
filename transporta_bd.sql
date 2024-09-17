-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-04-2024 a las 23:52:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transporta_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `correo`, `contrasena`) VALUES
(1, 'ADMIN', 'ADMIN', 'ADMIN', 'admin1@gmail.com', 'admin1'),
(2, 'Cris', 'manriquez', 'gonzalez', 'cris@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `idConductores` int(11) NOT NULL,
  `id_Unidad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `edad` varchar(30) NOT NULL,
  `experiencia` varchar(30) NOT NULL,
  `numeroLicencia` varchar(100) NOT NULL,
  `estatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`idConductores`, `id_Unidad`, `nombre`, `foto`, `edad`, `experiencia`, `numeroLicencia`, `estatus`) VALUES
(36, 1, 'Alfonso', '717084879.26', '36', '8', '123456778', 'Descanso'),
(66, 1, 'Oscar', '2044237886.26', '30', '4', '258741369', 'Viaje'),
(67, 5, 'Omar', '1975243147.jpg', '33', '7', '151415161', 'Descanso'),
(68, 5, 'Heladio ', '38535042.26', '28', '2', '159746325', 'Viaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idContacto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `mensaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `nombre`, `correo`, `telefono`, `mensaje`) VALUES
(13, 'Ricardo', 'richie@gmail.com', '5520503323', 'Prueba Ricardo'),
(16, 'Julio', 'julio@gmail.com', '4271523456', 'Como puedo comprar acciones?'),
(27, 'juan', 'juan@gmail.com', '656536534', 'Hola'),
(28, 'Caleb', 'calebs@gmail.com', '5520404436', 'tengo prisa con mi cotizacion'),
(31, 'Carlos Martinez Cruz', 'Carlos@gmail.com', '5547814578', 'Quedo satisfecho con el servicio realizado la semana pasada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `origen` varchar(150) NOT NULL,
  `destino` varchar(150) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `prioridad` varchar(255) NOT NULL,
  `piezas` varchar(10) NOT NULL,
  `distancia` varchar(10) NOT NULL,
  `peso` varchar(10) NOT NULL,
  `largo` varchar(10) NOT NULL,
  `ancho` varchar(10) NOT NULL,
  `alto` varchar(10) NOT NULL,
  `empaque` varchar(100) NOT NULL,
  `precioFlete` varchar(50) NOT NULL,
  `ruta` varchar(250) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `origen`, `destino`, `valor`, `prioridad`, `piezas`, `distancia`, `peso`, `largo`, `ancho`, `alto`, `empaque`, `precioFlete`, `ruta`, `usuario`) VALUES
(15, 'Mexico', 'Guadalajara', '20000', '', '1000', '', '15000', '15', '14', '16', 'Caja de cartón', '14000', '', 1),
(16, 'Mazatlan', 'Manzanillo', '50000', '', '14500', '', '15400', '14', '18', '17', 'Caja chica', '15000', '', 1),
(20, 'Monterrey', 'Estado de mexico', '16000', '', '1000', '', '14000', '15', '12', '16', 'Charola', 'Pendiente', '', 4),
(21, 'Yucatan', 'Chiapas', '18000', '', '2000', '', '15000', '15', '14', '20', 'Caja chica', '12000', '', 4),
(22, 'Sonora', 'Baja california', '25500', '', '2500', '', '20000', '20', '20', '20', 'Caja de cartón', '18000', '', 4),
(24, 'Sonora', 'Culiacan', '17000', '', '1500', '', '10', '10', '10', '1', 'bultos', '25000', '', 6),
(26, 'CERRADA ', 'avenida ', '170000', '', '2500', '', '26000', '24', '15', '18', 'Barril', '200', '', 8),
(27, 'mexico', 'culiacan', '200000', '', '4', '', '65', '65', '65', '65', 'bolsas', '5000', '', 11),
(29, 'mexico', 'manzanillo', '30000', '', '12000', '', '25000', '12', '23', '24', 'Caja doble', '6000', '', 19),
(32, 'av texcoco', 'av pantitlan', '63434', '', '34535', '', '3434', '566', '435', '234', 'bolsas', '50000', '', 20),
(33, 'mexico', 'bordo', '200000', '', '1230', '', '20000', '30', '10', '2', 'Caja chica', 'Pendiente', '', 21),
(34, 'CERRADA VICENTE SUAREZ 15', 'Chiapas', '25500', '', '1500', '', '20000', '20', '14', '15', 'cajaCarton', 'Pendiente', '', 22),
(35, 'CERRADA VICENTE SUAREZ', 'Baja california', '120000', '', '2000', '', '25000', '15', '14', '16', 'bolsas', '2000', '', 24),
(42, 'Ciudad de Mexico', 'Culiacan', '60000', 'No urgente', '2500', '1200', '15000', '15', '15', '25', 'cajaCarton', 'Pendiente', 'files/20240312123158.pdf', 25),
(43, 'hidalgo', 'Yucatan', '8000', 'No urgente', '12000', '90', '20000', '12', '23', '24', 'bolsas', 'Pendiente', 'files/20240312015736.pdf', 19),
(44, 'Ciudad de Mexico', 'Culiacan', '60000', 'No urgente', '2500', '1200', '20000', '20', '34', '34', 'bultos', 'Pendiente', 'files/20240312015956.pdf', 19),
(45, 'mexico', 'durago', '8000', 'No urgente', '2500', '90', '20000', '34', '54', '55', 'bolsas', '0', 'files/20240312020809.pdf', 19),
(47, 'valle de bravo', 'chiapas', '5000', 'No urgente', '2500', '100', '20000', '20', '34', '34', 'bolsas', '40000', 'files/20240312021248.pdf', 19),
(48, 'Yucata', 'Puebla', '6000', 'No urgente', '2500', '100', '20000', '20', '54', '34', 'bultos', '40000', 'files/20240312021757.pdf', 19),
(49, 'guadalajara', 'morelos', '2000', 'Urgente', '2500', '100', '30000', '32', '43', '23', 'cajaCarton', '48000', 'files/20240312021855.pdf', 19),
(50, 'Yucatan', 'chiapas', '8000', 'No urgente', '2500', '100', '20000', '23', '34', '43', 'bultos', '40000', 'files/20240312022440.pdf', 19),
(51, 'mexico', 'Puebla', '5000', 'Urgente', '2600', '100', '20000', '34', '45', '23', 'bolsas', '48000', 'files/20240312022543.pdf', 19),
(53, 'mexico', 'Puebla', '5000', 'No urgente', '3000', '50', '4000', '20', '34', '43', 'bolsas', '10000', 'files/20240312031830.pdf', 19),
(55, 'nayarit', 'Culiacan', '60000', 'No urgente', '2600', '40', '4000', '32', '54', '43', 'bolsas', '10000', 'files/20240312035059.pdf', 19),
(56, 'valle de bravo', 'chiapas', '60000', 'Urgente', '3000', '40', '4000', '34', '45', '54', 'barril', '12000', 'files/20240312040213.pdf', 19),
(57, 'guadalajara', 'Culiacan', '5000', 'Urgente', '3000', '40', '4000', '32', '45', '23', 'barril', '12000', 'files/20240408052804.pdf', 24),
(58, 'Mexico', 'chiapas', '60000', 'Urgente', '2500', '40', '4000', '34', '30', '40', 'bultos', '12000', 'files/20240408054542.pdf', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `anio` varchar(50) NOT NULL,
  `cvv` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `numero`, `nombre`, `mes`, `anio`, `cvv`, `usuario`) VALUES
(16, '5657567865765', 'juan', '08', '2024', 344, 9),
(17, '5873483748788738', 'Cristopher', '04', '2024', 3435, 5),
(22, '1213341232312312', 'Carlos martinez ', '03', '2026', 123, 19),
(23, '54564656565656', 'Antonio', '10', '2026', 4545, 19),
(24, '5632545365464764', 'juan', '08', '2024', 3455, 20),
(25, '55656325546655', 'Ricardo', '09', '2024', 5436, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque`
--

CREATE TABLE `remolque` (
  `idRemolque` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `color` varchar(30) NOT NULL,
  `tamano` varchar(30) NOT NULL,
  `imgRemolque` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `remolque`
--

INSERT INTO `remolque` (`idRemolque`, `marca`, `modelo`, `color`, `tamano`, `imgRemolque`) VALUES
(1, 'Utility', '2011', 'Blanco', '63 ft', '1940889557.55'),
(2, 'Hyundai', '2000', 'Blanco', '48 ft', '1064547265.55'),
(4, 'DSV', '2006', 'Rojo', '53 ft', '1341874211.55'),
(7, 'GD Trailers', '2005', 'Rojo', '53 ft', '366071929.55'),
(8, 'Hyundai', '2015', 'Blanco', '48 ft', '407898708.55'),
(9, 'Fold', '2018', 'Rojo', '56 ft', '400331131.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `idUnidad` int(11) NOT NULL,
  `id_remolque` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imgUnidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`idUnidad`, `id_remolque`, `marca`, `modelo`, `color`, `descripcion`, `imgUnidad`) VALUES
(1, 4, 'Peterbilt', '2012', 'Blanco', 'unidad', '1765627639.jpeg'),
(5, 1, 'Kenworth ', '2012', 'Azul', 'Unidad', '1103430611.55'),
(6, 1, 'Freightliner', '1998', 'Blanco', 'Unidad clasica ', '115375937.jpeg'),
(7, 2, 'Kenworth', '2012', 'Gris', 'Servicio reciente', '1084686358.52'),
(8, 2, 'Kenworth', '2012', 'Azul', 'Unidad', '584709604.54'),
(9, 8, 'Volvo', '2013', 'Blanco', 'Unidad especial para trayectos largos', '1946417712.55'),
(10, 1, 'Kenworth', '1995', 'Rojo', 'Unidad', '343219153.52'),
(11, 4, 'Freightliner', '1995', 'Negro', 'Unidad', '390546819.52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `correo`, `contrasena`) VALUES
(11, 'Roberto', 'Manriquez', 'Gonzalez', '5510971692', 'robitmanriquez@gmail.com', 'C1security'),
(19, 'ricardo', 'martinez', 'gutierrez', '5520404436', 'ricardo@gmail.com', '12345'),
(20, 'Juan', 'Torres', 'Aguilar', '5643564565', 'juan@gmail.com', '12345'),
(22, 'Roberto', 'Gonzales', 'Hernandez', '5577481474', 'Rober@gmail.com', '123456'),
(23, 'Usuario', 'de', 'Prueba', '5515554152', 'Usuario1@test.com', '123456'),
(24, 'Carlos', 'Martinez', 'Cruz', '5514512654', 'Carlos1@gmail.com', '123456'),
(25, 'CARLOS', 'MARTINEZ', 'CRUZ', '5573372563', 'charlymtz0125@gmail.com', '123456'),
(26, 'nuevo', 'febrero', 'cruz', '5555555555', '555@gmail.com', '123456'),
(27, 'CARLOS', 'MARTINEZ', 'CRUZ', '5514151475', 'carlos@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id_viaje` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `conductor` varchar(100) NOT NULL,
  `fechaEmbarque` varchar(80) NOT NULL,
  `fechaDesembarque` varchar(80) NOT NULL,
  `estado` varchar(80) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id_viaje`, `id_cotizacion`, `conductor`, `fechaEmbarque`, `fechaDesembarque`, `estado`, `usuario`) VALUES
(14, 15, '0', '2023-07-03', '2023-07-04', 'De camino al embarque', 1),
(15, 16, '0', '2023-07-05', '2023-07-07', 'En trayecto', 1),
(16, 17, '0', '2023-07-13', '2023-07-15', 'Finalizado', 1),
(17, 18, '0', '2023-07-03', '2023-07-04', 'De camino al embarque', 0),
(18, 18, '0', '2023-07-11', '2023-07-12', 'En trayecto', 0),
(19, 19, '0', '2023-07-06', '2023-07-08', 'Finalizado', 0),
(20, 25, '0', '2023-07-05', '2023-07-07', 'De camino al embarque', 0),
(22, 29, '0', '2023-07-07', 'Pendiente', 'En preparación', 0),
(23, 29, '0', '2023-07-05', 'Pendiente', 'En preparación', 0),
(24, 29, 'Oscar', '2023-07-14', '2023-07-15', 'De camino al embarque', 0),
(25, 29, 'Oscar', '2023-07-20', '2023-07-21', 'En trayecto', 0),
(26, 32, 'Oscar', '2023-07-15', '2023-07-15', 'De camino al embarque', 0),
(27, 31, 'Omar', '2023-07-14', '2023-07-15', 'De camino al embarque', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`idConductores`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `remolque`
--
ALTER TABLE `remolque`
  ADD PRIMARY KEY (`idRemolque`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`idUnidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id_viaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `idConductores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `remolque`
--
ALTER TABLE `remolque`
  MODIFY `idRemolque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
