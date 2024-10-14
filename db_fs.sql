-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2023 a las 00:48:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_fs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones_operacion`
--

CREATE TABLE `asignaciones_operacion` (
  `cod_asig_operacion` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `jornada` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaciones_operacion`
--

INSERT INTO `asignaciones_operacion` (`cod_asig_operacion`, `dni`, `jornada`, `cliente`, `estado`, `fecha_inicio`) VALUES
(1, 70463592, 2, 1, 1, '2023-12-10'),
(3, 30830849, 1, 1, 1, '2023-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL,
  `ruc` text NOT NULL,
  `razon_social` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo_electronico` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `ruc`, `razon_social`, `direccion`, `telefono`, `correo_electronico`, `estado`) VALUES
(1, '10462394646', 'MARIA ALEJANDRA AVALOS LUNA', 'AV. ANDRES AVELINO CACERES S/N', 987654321, 'MADISOLUTIONSGROUP@GMAIL.COM', 1),
(2, '2', '2', '2', 2, '2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compro_proveedores`
--

CREATE TABLE `compro_proveedores` (
  `id_compro_proveedores` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` text NOT NULL,
  `fecha_emitida` date DEFAULT NULL,
  `tipo_documento` text NOT NULL,
  `serie` text NOT NULL,
  `num_documento` text NOT NULL,
  `descripcion` text NOT NULL,
  `ruta_pdf` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compro_proveedores`
--

INSERT INTO `compro_proveedores` (`id_compro_proveedores`, `id_proveedor`, `fecha`, `hora`, `fecha_emitida`, `tipo_documento`, `serie`, `num_documento`, `descripcion`, `ruta_pdf`, `estado`) VALUES
(1, 1, '2023-12-18', '07:05:00', '2023-12-18', 'FACTURA', '001', '1485962', 'FACTURA ESET', '//', 1),
(2, 1, '2023-12-18', '18:12:15', '2023-12-18', 'FACTURA', '1', '1', 'c', '/', 1),
(3, 2, '2023-12-18', '18:12:24', '2023-12-18', 'FACTURA', '1', '1', 'a', '/', 1),
(4, 2, '2023-12-18', '18:12:54', '2023-12-19', 'FACTURA', '2', '2', 'a', '/', 1),
(5, 1, '2023-12-18', '18:12:54', '2023-12-19', 'FACTURA', '1', '1', '2', '/', 1),
(6, 1, '2023-12-18', '18:12:26', '2023-12-11', 'FACTURA', '1', '1', '2', '/', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `cod_servicio` int(11) NOT NULL,
  `tipo_servicio` text NOT NULL,
  `descripcion_servicio` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`cod_servicio`, `tipo_servicio`, `descripcion_servicio`, `estado`) VALUES
(1, '2*1', '2*1 ANGLO AAQ', 1),
(2, '1*1', 'dia x dia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcacion_android`
--

CREATE TABLE `marcacion_android` (
  `id_marcacion` int(11) NOT NULL,
  `dni` text NOT NULL,
  `fecha` text NOT NULL,
  `hora` text NOT NULL,
  `gps` text NOT NULL,
  `tipo_marcacion` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcacion_android`
--

INSERT INTO `marcacion_android` (`id_marcacion`, `dni`, `fecha`, `hora`, `gps`, `tipo_marcacion`, `estado`) VALUES
(2, '70463592', '2023-12-08', '07:02:00', '-17.1417646,-70.6815059', 'INICIO_GUARDIA', 1),
(3, '70463592', '2023-12-10', '07:02:10', '-17.1417646,-70.6815059', 'INICIO_DIA', 1),
(4, '70463592', '2023-12-11', '07:10:00', '-17.1417646,-70.6815059', 'INICIO_DIA', 1),
(5, '70463592', '2023-12-12', '07:10:00', '', 'INICIO_DIA', 1),
(6, '30830849', '2023-12-11', '07:05:00', '', 'INICIO_DIA', 1),
(7, '70463592', '2023-12-13', '07:00:15', '', 'INICIO_DIA', 1),
(8, '70463592', '2023-11-10', '07:02:00', '', 'INICIO_DIA', 1),
(9, '70463592', '2023-11-11', '07:02:00', '', 'INICIO_DIA', 1),
(10, '70463592', '2023-11-12', '07:02:00', '', 'INICIO_DIA', 1),
(11, '70463592', '2023-11-09', '07:02:00', '', 'INICIO_DIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `pais` text NOT NULL,
  `ubigeo` text NOT NULL,
  `mina_ciudad` text NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `inicio_dni` date DEFAULT NULL,
  `venc_dni` date DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `nombre_esposoa` varchar(200) NOT NULL,
  `dni_esposoa` int(11) NOT NULL,
  `num_hijos` int(11) NOT NULL,
  `datos_hijos` text NOT NULL,
  `sistema_pensiones` varchar(3) NOT NULL,
  `nombre_afp` varchar(50) NOT NULL,
  `cuenta_sistema_pensiones` text NOT NULL,
  `grado_instruccion` varchar(50) NOT NULL,
  `tipo_licencia_conducir` varchar(3) NOT NULL,
  `num_licencia_conducir` varchar(20) NOT NULL,
  `licencia_mtc` date DEFAULT NULL,
  `venc_licencia_mtc` date DEFAULT NULL,
  `grupo_sanguineo` varchar(10) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nombre_emergencia` varchar(100) NOT NULL,
  `telefono_emergencia` int(11) NOT NULL,
  `direccion_emergencia` varchar(100) NOT NULL,
  `correo_electronico` varchar(250) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `banco_salario` varchar(20) NOT NULL,
  `nro_cuenta_salario` text NOT NULL,
  `banco_cts` varchar(20) NOT NULL,
  `nro_cuenta_cts` text NOT NULL,
  `ruta_dni` text NOT NULL,
  `ruta_recibo` text NOT NULL,
  `ruta_dniderechohabientes` text NOT NULL,
  `num_contrato` text NOT NULL,
  `fecha_ingreso_contrato` date DEFAULT NULL,
  `fecha_termino_contrato` date DEFAULT NULL,
  `venc_contrato` date DEFAULT NULL,
  `licencia_interna` date DEFAULT NULL,
  `venc_licencia_interna` text NOT NULL,
  `examen_medico` date DEFAULT NULL,
  `venc_examen_medico` text NOT NULL,
  `curso_induccion` date DEFAULT NULL,
  `venc_curso_induccion` text NOT NULL,
  `manejo_teorico` date DEFAULT NULL,
  `venc_manejo_teorico` text NOT NULL,
  `manejo_practico` date DEFAULT NULL,
  `venc_manejo_practico` text NOT NULL,
  `sctr` date DEFAULT NULL,
  `venc_sctr` text NOT NULL,
  `vida_ley` date DEFAULT NULL,
  `venc_vida_ley` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `fecha_registro`, `pais`, `ubigeo`, `mina_ciudad`, `nombres`, `fecha_nacimiento`, `lugar_nacimiento`, `dni`, `inicio_dni`, `venc_dni`, `direccion`, `estado_civil`, `nombre_esposoa`, `dni_esposoa`, `num_hijos`, `datos_hijos`, `sistema_pensiones`, `nombre_afp`, `cuenta_sistema_pensiones`, `grado_instruccion`, `tipo_licencia_conducir`, `num_licencia_conducir`, `licencia_mtc`, `venc_licencia_mtc`, `grupo_sanguineo`, `telefono`, `nombre_emergencia`, `telefono_emergencia`, `direccion_emergencia`, `correo_electronico`, `cargo`, `salario`, `banco_salario`, `nro_cuenta_salario`, `banco_cts`, `nro_cuenta_cts`, `ruta_dni`, `ruta_recibo`, `ruta_dniderechohabientes`, `num_contrato`, `fecha_ingreso_contrato`, `fecha_termino_contrato`, `venc_contrato`, `licencia_interna`, `venc_licencia_interna`, `examen_medico`, `venc_examen_medico`, `curso_induccion`, `venc_curso_induccion`, `manejo_teorico`, `venc_manejo_teorico`, `manejo_practico`, `venc_manejo_practico`, `sctr`, `venc_sctr`, `vida_ley`, `venc_vida_ley`, `estado`) VALUES
(1, '2023-11-22', 'Peru', '04001', 'Moquegua', 'ANTHONY ALVAREZ ESCOBEDO', '1995-01-20', 'Islay', 70463592, '2020-08-01', '2022-12-31', 'Av ABC 100', 'CASADO', 'MARIA LUNA', 46239464, 2, '12345678-Mariajose Alvarez-78945612-Diego Alvarez', 'ONP', 'ONP', '147852369', 'SUPERIOR', 'A1', 'H-70463592', '2021-12-01', '2023-12-31', 'O+', 987654521, 'MARIA LUNA', 74859662, 'AV ABC 100', 'LALVAREZ@GMAIL.COM', 'ADMINISTRADOR', 1500.00, 'BCP', '21533', 'INTERBANK', '614919194', '//', '//', '//', 'a105', '2023-12-01', '2023-12-31', '2024-12-31', '2023-12-01', '+1 year', '2023-12-01', '+1 year', '2023-12-01', '+1 year', '2023-12-01', '+1 year', '2023-12-01', '+1 year', '2024-12-01', '+1 month', '2023-12-02', '+6 month', 1),
(9, '2023-12-17', 'Peru', '0400', 'Moquegua', 'JUAN PEREZ JUZMAN', '1995-01-20', 'Islay', 30830849, '2021-12-01', '2023-12-31', 'AV ABC 100', 'CASADO', 'MARIA AVALOS', 46239464, 0, '-', 'ONP', 'ONP', '122543574', 'SUPERIOR', 'A1', 'H-30830849', '2023-12-01', '2023-12-31', 'O+', 987654521, '-', 0, 'a', 'jalvarez', 'CONDUCTOR', 1200.00, 'INTERBANK', '2153373836805428', 'BCP', '2158784594164', '//', '//', '//', 'ctr_105', '2023-12-01', '2023-12-31', '2024-12-31', '2023-12-05', '+1 year', '2023-12-05', '+1 year', '2023-12-05', '+1 year', '2023-12-05', '+1 year', '2023-12-05', '+1 year', '2023-12-05', '+1 month', '2023-12-05', '+6 month', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `cod_proveedor` int(11) NOT NULL,
  `ruc` text NOT NULL,
  `razon_social` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo_electronico` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`cod_proveedor`, `ruc`, `razon_social`, `direccion`, `telefono`, `correo_electronico`, `estado`) VALUES
(1, '107046359298', 'ANTHONY ALVAREZ', 'AV ABC', 1111111, 'AALVAREZz', 1),
(2, '10258596325', 'JUAN PEREZ', 'AV ABC', 1234, '111', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `user` bigint(11) NOT NULL,
  `contrasena` bigint(11) NOT NULL,
  `tipo_user` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `user`, `contrasena`, `tipo_user`, `estado`) VALUES
(1, 70463592, 70463592, 'ADMIN', 1),
(2, 30830849, 30830849, 'FINAL', 1),
(4, 107046359298, 107046359298, 'PROVEEDOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `cod_vehiculo` int(11) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `tipo_vehiculo` text NOT NULL,
  `cant_ejes` int(11) NOT NULL,
  `chasis` text NOT NULL,
  `vin` text NOT NULL,
  `color` text NOT NULL,
  `marca` text NOT NULL,
  `cant_pasajeros` int(11) NOT NULL,
  `tipo_neumatico` text NOT NULL,
  `num_aro` int(11) NOT NULL,
  `combustible` text NOT NULL,
  `aire_acondicionado` text NOT NULL,
  `tipo_aceite` text NOT NULL,
  `km_actual` text NOT NULL,
  `modelo` text NOT NULL,
  `tipo_servicio` text NOT NULL,
  `ano_fabricacion` int(11) NOT NULL,
  `tiempo_trabajo` text NOT NULL,
  `recepcionado_por` int(11) NOT NULL,
  `propietario` varchar(200) NOT NULL,
  `telefono_prop` int(11) NOT NULL,
  `correo_prop` text NOT NULL,
  `soat` date NOT NULL,
  `venc_soat` text NOT NULL,
  `poliza` date NOT NULL,
  `venc_poliza` text NOT NULL,
  `poliza_mercancia` date NOT NULL,
  `venc_poliza_mercancia` text NOT NULL,
  `rev_tecnica` date NOT NULL,
  `venc_rev_tecnica` date NOT NULL,
  `link_acceso_gps` text NOT NULL,
  `empresa_gps` text NOT NULL,
  `gps` date NOT NULL,
  `venc_gps` text NOT NULL,
  `tuc` date NOT NULL,
  `venc_tuc` date NOT NULL,
  `gps_mtc` text NOT NULL,
  `cert_matpel` date NOT NULL,
  `venc_cert_matpel` date NOT NULL,
  `homo_vehicular` date NOT NULL,
  `venc_homo_vehicular` text NOT NULL,
  `fecha_implem_adas` date NOT NULL,
  `cert_operatividad` date NOT NULL,
  `ven_cert_operatividad` text NOT NULL,
  `extintor` date NOT NULL,
  `venc_extintor` text NOT NULL,
  `cod_radio_base` text NOT NULL,
  `cert_tacos` date NOT NULL,
  `venc_cert_tacos` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`cod_vehiculo`, `placa`, `tipo_vehiculo`, `cant_ejes`, `chasis`, `vin`, `color`, `marca`, `cant_pasajeros`, `tipo_neumatico`, `num_aro`, `combustible`, `aire_acondicionado`, `tipo_aceite`, `km_actual`, `modelo`, `tipo_servicio`, `ano_fabricacion`, `tiempo_trabajo`, `recepcionado_por`, `propietario`, `telefono_prop`, `correo_prop`, `soat`, `venc_soat`, `poliza`, `venc_poliza`, `poliza_mercancia`, `venc_poliza_mercancia`, `rev_tecnica`, `venc_rev_tecnica`, `link_acceso_gps`, `empresa_gps`, `gps`, `venc_gps`, `tuc`, `venc_tuc`, `gps_mtc`, `cert_matpel`, `venc_cert_matpel`, `homo_vehicular`, `venc_homo_vehicular`, `fecha_implem_adas`, `cert_operatividad`, `ven_cert_operatividad`, `extintor`, `venc_extintor`, `cod_radio_base`, `cert_tacos`, `venc_cert_tacos`, `estado`) VALUES
(1, 'CH-4673', 'BUS', 2, '1234', '1234', 'BLANCO', 'VOLSWAGEN', 12, 'NEUMA1', 14, 'GASOLINA', 'SI', 'AW1234', '152000', 'MV', 'SERVICIO1', 2023, '5', 70463592, 'ISIDRO JIMENEZ', 789654, 'ABC@AAA.COM', '2022-12-06', '+1 year', '2022-12-05', '+1 year', '2023-12-03', '+1 year', '2023-12-03', '2024-12-03', 'HTTPS://MIGPS.COM', 'EMPRESA1', '2022-11-08', '+1 year', '2023-12-03', '2024-06-03', 'SI', '2023-12-03', '2024-12-03', '2023-12-03', '+1 year', '2023-12-03', '2023-11-17', '+1 month', '2023-12-15', '+1 year', 'ASDSDSAD7485', '2023-12-03', '+1 year', 1),
(8, 'c', 'MINIVAN', 1, 'a', 'a', 'a', 'a', 1, 'NEUMA1', 1, 'GASOLINA', 'SI', 'a', 'a', 'a', 'SERVICIO1', 2023, '1', 70463592, 'a', 0, 'a', '2023-12-15', '+1 year', '2023-12-07', '+1 year', '2023-12-07', '+1 year', '2023-12-06', '2023-12-16', 'a', 'EMPRESA1', '2023-12-07', '+1 year', '2023-12-07', '2023-12-17', 'SI', '2023-12-07', '2023-12-28', '2023-12-07', '+1 year', '2023-12-07', '2023-12-07', '+1 month', '2023-12-07', '+1 year', '1', '2023-12-17', '+1 year', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vencdoc_log`
--

CREATE TABLE `vencdoc_log` (
  `cod_vencdoc_log` int(11) NOT NULL,
  `fechayhora` datetime NOT NULL,
  `user` varchar(50) NOT NULL,
  `tipo_movimiento` varchar(250) NOT NULL,
  `tabla` text NOT NULL,
  `cod_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vencdoc_log`
--

INSERT INTO `vencdoc_log` (`cod_vencdoc_log`, `fechayhora`, `user`, `tipo_movimiento`, `tabla`, `cod_item`) VALUES
(27, '2023-12-08 03:12:34', '70463592', 'ACTUALIZACION DOCUMENTARIA', '1', 0),
(28, '2023-12-08 03:12:12', '70463592', 'ACTUALIZACION DOCUMENTARIA', '1', 0),
(29, '2023-12-08 03:12:26', '70463592', 'ACTUALIZACION DOCUMENTARIA', '1', 0),
(30, '2023-12-08 09:12:49', '70463592', 'ACTUALIZACION DOCUMENTARIA', '8', 0),
(31, '2023-12-18 14:12:12', '', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(32, '2023-12-18 14:12:57', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(33, '2023-12-18 14:12:10', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(34, '2023-12-18 14:12:21', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(35, '2023-12-18 14:12:25', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(36, '2023-12-18 14:12:35', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(37, '2023-12-18 14:12:50', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(38, '2023-12-18 14:12:42', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1),
(39, '2023-12-18 14:12:59', '70463592', 'ACTUALIZACION DOCUMENTARIA', 'Personal', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones_operacion`
--
ALTER TABLE `asignaciones_operacion`
  ADD PRIMARY KEY (`cod_asig_operacion`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indices de la tabla `compro_proveedores`
--
ALTER TABLE `compro_proveedores`
  ADD PRIMARY KEY (`id_compro_proveedores`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`cod_servicio`);

--
-- Indices de la tabla `marcacion_android`
--
ALTER TABLE `marcacion_android`
  ADD PRIMARY KEY (`id_marcacion`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`cod_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`cod_vehiculo`);

--
-- Indices de la tabla `vencdoc_log`
--
ALTER TABLE `vencdoc_log`
  ADD PRIMARY KEY (`cod_vencdoc_log`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones_operacion`
--
ALTER TABLE `asignaciones_operacion`
  MODIFY `cod_asig_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compro_proveedores`
--
ALTER TABLE `compro_proveedores`
  MODIFY `id_compro_proveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `cod_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcacion_android`
--
ALTER TABLE `marcacion_android`
  MODIFY `id_marcacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `cod_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `cod_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vencdoc_log`
--
ALTER TABLE `vencdoc_log`
  MODIFY `cod_vencdoc_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
