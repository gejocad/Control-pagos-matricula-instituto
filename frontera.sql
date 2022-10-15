-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2022 a las 18:24:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `frontera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idestudiante` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(40) NOT NULL,
  `tipo_documento` varchar(40) NOT NULL,
  `numero_documento` varchar(40) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `lugar_expedicion` varchar(40) NOT NULL,
  `direccion_residencia` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `sangre` varchar(5) NOT NULL,
  `acudiente` varchar(50) NOT NULL,
  `telefono_acudiente` varchar(11) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `condicion` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `nombre`, `apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `tipo_documento`, `numero_documento`, `fecha_expedicion`, `lugar_expedicion`, `direccion_residencia`, `telefono`, `correo`, `sangre`, `acudiente`, `telefono_acudiente`, `fecha_registro`, `condicion`) VALUES
(295, 'gerald', 'castillo', '2020-10-29', '4', 'CC', '0354164', '2017-10-28', '6', 'arauca', 2147483647, 'gejocad@gmail.com', 'orh+', 'clementina', '7666392', '2022-10-06', 1),
(296, 'William', 'perez', '2010-07-24', '11', 'CE', '1234454', '2021-10-31', '4', 'arauca', 2147483647, 'gejocad@gmail.com', 'orh+', 'clementina', '7666392', '2022-10-06', 1),
(297, 'William2', 'perez', '2010-07-24', '11', 'CE', '1234454', '2021-10-31', '4', 'arauca', 2147483647, 'gejocad@gmail.com', 'orh+', 'clementina', '7666392', '2022-10-06', 1),
(298, 'William', 'perez', '2010-07-24', '11', 'CE', '1234454', '2021-10-31', '4', 'arauca', 2147483647, 'gejocad@gmail.com', 'orh+', 'clementina', '7666392', '2022-10-06', 1),
(299, 'wilmer alfredo', 'castillo', '2020-10-29', '14', 'TI', '12345345', '2002-11-30', '6', 'arauca', 2147483647, 'gejocad@gmail.com', 'orh+', 'clementina', '7666392', '2022-10-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `jornada` varchar(11) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `jornada`, `hora_entrada`, `hora_salida`, `condicion`) VALUES
(1, 'TARDE', '18:10:00', '07:50:00', 1),
(2, 'MAÑANA', '06:10:00', '07:50:00', 1),
(3, 'mañana', '06:10:00', '07:50:00', 1),
(4, 'maña', '06:10:00', '07:50:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `idlugar` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idlugar`, `nombre`, `condicion`) VALUES
(1, 'Tinaquillo', 1),
(2, 'Aguachica Cesar', 1),
(3, 'Apartad? Antioquia', 1),
(4, 'Arauca', 1),
(5, 'Armenia Quind?o', 1),
(6, 'asto Nari?o', 1),
(7, 'Barrancabermeja Santander', 1),
(8, 'Barranquilla Atl?ntico', 1),
(9, 'Bello Antioquia', 1),
(10, 'Bogot? Distrito Capital', 1),
(11, 'Bucaramanga Santander', 1),
(12, 'Buenaventura Valle del Cauca', 1),
(13, 'Buga Valle del Cauca', 1),
(14, 'Cali Valle del Cauca', 1),
(15, 'Cartagena Bol?var', 1),
(16, 'Cartago Valle del Cauca', 1),
(17, 'Caucasia Antioquia', 1),
(18, 'Ceret? C?rdoba', 1),
(19, 'Chia Cundinamarca', 1),
(20, 'Ci?naga Magdalena', 1),
(21, 'C?cuta Norte de Santander', 1),
(22, 'Dosquebradas Risaralda', 1),
(23, 'Duitama Boyac?', 1),
(24, 'Envigado Antioquia', 1),
(25, 'Facatativ? Cundinamarca', 1),
(26, 'Florencia Caqueta', 1),
(27, 'Floridablanca Santander', 1),
(28, 'Fusagasug? Cundinamarca', 1),
(29, 'Girardot Cundinamarca', 1),
(30, 'Gir?n Santander', 1),
(31, 'Ibagu? Tolima', 1),
(32, 'Ipiales Nari?o', 1),
(33, 'Itag?? Antioquia', 1),
(34, 'Jamund? Valle del Cauca', 1),
(35, 'Lorica C?rdoba', 1),
(36, 'Los Patios Norte de Santander', 1),
(37, 'Magangu? Bolivar', 1),
(38, 'Maicao Guajira', 1),
(39, 'Malambo Atl?ntico', 1),
(40, 'Manizales Caldas', 1),
(41, 'Medell?n Antioquia', 1),
(42, 'Melgar Tolima', 1),
(43, 'Monter?a C?rdoba', 1),
(44, 'Neiva Huila', 1),
(45, 'Oca?a Norte de Santander', 1),
(46, 'Paipa, Boyac?', 1),
(47, 'Palmira Valle del Cauca', 1),
(48, 'Pamplona Norte de Santander', 1),
(49, 'Pereira Risaralda', 1),
(50, 'Piedecuesta Santander', 1),
(51, 'Pitalito Huila', 1),
(52, 'Popay?n Cauca', 1),
(53, 'Quibd? Choco', 1),
(54, 'Riohacha Guajira', 1),
(55, 'Rionegro Antioquia', 1),
(56, 'Sabanalarga Atl?ntico', 1),
(57, 'Sahag?n C?rdoba', 1),
(58, 'San Andr?s Isla', 1),
(59, 'Santa Marta Magdalena', 1),
(60, 'Sincelejo Sucre', 1),
(61, 'Soacha Cundinamarca', 1),
(62, 'Sogamoso Boyac?', 1),
(63, 'Soledad Atl?ntico', 1),
(64, 'Tib? Norte de Santander', 1),
(65, 'Tulu? Valle del Cauca', 1),
(66, 'Tumaco Nari?o', 1),
(67, 'Tunja Boyac?', 1),
(68, 'Turbo Antioquia', 1),
(69, 'Valledupar Cesar', 1),
(70, 'Villa de leyva', 1),
(71, 'Villa del Rosario Norte de Santander', 1),
(72, 'Villavicencio Meta', 1),
(73, 'Yopal Casanare', 1),
(74, 'Yumbo Valle del Cauca', 1),
(75, 'Zipaquir? Cundinamarca', 1),
(76, 'Extranjero', 1),
(77, 'Otro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `idmatricula` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL,
  `idprograma` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  `precio_mes` int(7) NOT NULL,
  `pagado` int(8) NOT NULL DEFAULT 0,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idmatricula`, `idestudiante`, `idprograma`, `idhorario`, `precio_mes`, `pagado`, `fecha_registro`, `condicion`) VALUES
(1, 299, 0, 1, 110000, 0, '2022-10-10', 1),
(2, 298, 0, 1, 110000, 0, '2022-10-10', 1),
(3, 297, 0, 1, 110000, 0, '2022-10-10', 1),
(4, 298, 0, 1, 110000, 0, '2022-10-10', 1),
(5, 297, 0, 1, 110000, 0, '2022-10-10', 1),
(6, 297, 0, 1, 110000, 0, '2022-10-10', 1),
(7, 295, 0, 1, 110000, 0, '2022-10-10', 0),
(8, 0, 0, 0, 110000, 0, '2022-10-11', 0),
(9, 0, 0, 0, 110000, 0, '2022-10-11', 0),
(10, 0, 0, 0, 110000, 0, '2022-10-11', 0),
(11, 0, 0, 0, 110000, 0, '2022-10-11', 0),
(12, 299, 0, 1, 110000, 0, '2022-10-11', 1),
(13, 295, 0, 1, 110000, 770000, '2022-10-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL,
  `tipo_pago` varchar(11) NOT NULL,
  `pago` int(11) NOT NULL,
  `observacion` varchar(40) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idpago`, `idmatricula`, `tipo_pago`, `pago`, `observacion`, `estado`) VALUES
(27, 13, 'semestral', 594000, 'obsevacion', 1),
(28, 13, 'cuota', 110000, 'obsevacion', 1);

--
-- Disparadores `pago`
--
DELIMITER $$
CREATE TRIGGER `tr_udpPagado` AFTER INSERT ON `pago` FOR EACH ROW BEGIN
    IF NEW.`tipo_pago`='cuota'
        THEN
        UPDATE matricula SET pagado = pagado + NEW.pago
        WHERE matricula.idmatricula = NEW.idmatricula;
    ELSEIF NEW.`tipo_pago`='semestral'
        THEN
        UPDATE matricula SET pagado = pagado + (precio_mes*6)
        WHERE matricula.idmatricula = NEW.idmatricula;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Almacen'),
(3, 'Compras'),
(4, 'Ventas'),
(5, 'Acceso'),
(6, 'Consulta Compras'),
(7, 'Consulta Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(2833, 'Proveedor', 'Johan Gonzalez', 'DNI', '111111111', '', '', ''),
(2834, 'Proveedor', 'Johan Torres', 'DNI', '1111111', '', '', ''),
(2835, 'Proveedor', 'Chef Santiago', 'DNI', '222222222222', '', '', ''),
(2836, 'Proveedor', 'Katherine Cabarico', 'DNI', '111111111111', '', '', ''),
(2837, 'Cliente', 'Clientes varios', 'CEDULA', '11111111111', '', '', ''),
(2838, 'Cliente', 'Johan Gonzalez', 'CEDULA', '19901422', 'CALLE 20 #12 - 46', '3152170468', 'JOHANDJMERIDA2112@GMAIL.COM'),
(2839, 'Cliente', 'Dr Edwin Rodriguez', 'CEDULA', '000000000', 'CAR. 41 #14-85', '3213591295', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idprograma` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `resolucion` varchar(6) NOT NULL,
  `licencia` varchar(5) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `semestre` int(1) NOT NULL,
  `decreto` varchar(5) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idprograma`, `nombre`, `resolucion`, `licencia`, `fecha_expedicion`, `fecha_vencimiento`, `codigo`, `semestre`, `decreto`, `condicion`) VALUES
(0, 'Tècnico laboral por competencias en AUXILIAR CONTABLE Y FINANCIERO', '4091', '83', '2019-12-19', '2024-12-20', '1331', 3, '1075', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'William', 'CEDULA', '72154871', 'Calle los alpes 210', '547821', 'direccion@institutolafrontera.co', 'gerente', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1629074758.png', 1),
(2, 'prueba', 'CEDULA', '30115425', 'calle los jirasoles 450', '054789521', 'juan@hotmail.com', 'empleado', 'juan', 'b1e7ad7cb659c6c7a544106daf2a860068bdabf33f6c6feb6aa9b542b3c15e23', '1535417486.jpg', 0),
(4, 'cajero', 'CEDULA', '24794531', 'av marquez del toro, 19 b', '3172975270', 'gejocevad@gmail.com', 'cajero', 'caja1', '3eef233d6aced1b6799303b17ce3fd1b01ba8c14d62121342b61f604cc0b50f2', '1596056511.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(119, 7, 4),
(120, 8, 4),
(121, 2, 1),
(122, 2, 4),
(150, 5, 2),
(151, 5, 3),
(152, 5, 4),
(153, 6, 2),
(154, 6, 3),
(155, 6, 4),
(164, 4, 4),
(165, 1, 1),
(166, 1, 2),
(167, 1, 3),
(168, 1, 4),
(169, 1, 5),
(170, 1, 6),
(171, 1, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idestudiante`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`idlugar`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idmatricula`),
  ADD KEY `idestudiante` (`idestudiante`),
  ADD KEY `idprograma` (`idprograma`),
  ADD KEY `idhorario` (`idhorario`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `idmatricula` (`idmatricula`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idprograma`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_u_permiso_usuario_idx` (`idusuario`),
  ADD KEY `fk_usuario_permiso_idx` (`idpermiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idestudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `idlugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `idmatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2840;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
