-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-11-2018 a las 03:13:21
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vehicleauthoritydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_vehiculo`
--

DROP TABLE IF EXISTS `categoria_vehiculo`;
CREATE TABLE IF NOT EXISTS `categoria_vehiculo` (
  `codigo_categoria_vehiculo` int(10) UNSIGNED NOT NULL,
  `descripcion_categoria` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`codigo_categoria_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_vehiculo`
--

INSERT INTO `categoria_vehiculo` (`codigo_categoria_vehiculo`, `descripcion_categoria`) VALUES
(1, 'SUV'),
(2, 'Familiar'),
(3, 'Vechiculo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `telefono` int(10) UNSIGNED NOT NULL,
  `correo_electronico` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_direccion` int(10) UNSIGNED NOT NULL,
  `otro_detalle` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_direccion` (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `telefono`, `correo_electronico`, `id_direccion`, `otro_detalle`) VALUES
(102340234, 88768690, 'cliente2@dominio.com', 102340234, 'Es un cliente premium'),
(102340986, 88767243, 'cliente1@dominio.com', 102340986, 'Es un cliente premium'),
(103450986, 88767243, 'cliente3@dominio.com', 103450986, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_servicio`
--

DROP TABLE IF EXISTS `consulta_servicio`;
CREATE TABLE IF NOT EXISTS `consulta_servicio` (
  `id_servicio_consulta` int(10) UNSIGNED NOT NULL,
  `is_servicio_consulta_previo` int(10) UNSIGNED DEFAULT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_vehiculo` int(10) UNSIGNED NOT NULL,
  `id_servicio` int(10) UNSIGNED NOT NULL,
  `fecha_servicio_solicitada` date NOT NULL,
  `fecha_servicio_efectuado` date NOT NULL,
  `costo_servicio` int(10) UNSIGNED NOT NULL,
  `id_prueba_adicional` int(10) UNSIGNED DEFAULT NULL,
  `otro_detalle` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_servicio_consulta`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `id_prueba_adicional` (`id_prueba_adicional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `consulta_servicio`
--

INSERT INTO `consulta_servicio` (`id_servicio_consulta`, `is_servicio_consulta_previo`, `id_cliente`, `id_vehiculo`, `id_servicio`, `fecha_servicio_solicitada`, `fecha_servicio_efectuado`, `costo_servicio`, `id_prueba_adicional`, `otro_detalle`) VALUES
(1000, 999, 102340986, 23412, 1000, '2017-06-15', '2017-06-16', 750000, NULL, 'Vehiculo sin poblemas'),
(1002, 1001, 102340234, 12344, 1000, '2017-06-15', '2017-06-16', 750000, NULL, 'Vehiculo sin poblemas'),
(1004, 1003, 103450986, 23412, 1000, '2017-06-15', '2017-06-16', 750000, NULL, 'Vehiculo sin poblemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(10) UNSIGNED NOT NULL,
  `nombre_departamento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_departamento` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otros_detalles` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`, `descripcion_departamento`, `otros_detalles`) VALUES
(100, 'Pintura', 'Departamento de Pintura', 'Departamento de pintura 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_cliente`
--

DROP TABLE IF EXISTS `direccion_cliente`;
CREATE TABLE IF NOT EXISTS `direccion_cliente` (
  `id_direccion` int(10) UNSIGNED NOT NULL,
  `provincia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `canton` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `distrito` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_exacta` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `direccion_cliente`
--

INSERT INTO `direccion_cliente` (`id_direccion`, `provincia`, `canton`, `distrito`, `direccion_exacta`) VALUES
(102340234, 'Cartago', 'Oreamuno', 'Los Angeles', 'De la iglesia 100 metros este'),
(102340986, 'San Jose', 'San Jose', 'Uruca', 'Del banco 100 metros este'),
(103450986, 'Heredia', 'Heredia', 'Santa Lucia', 'De la libreria 100 metros este');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante_vehiculo`
--

DROP TABLE IF EXISTS `fabricante_vehiculo`;
CREATE TABLE IF NOT EXISTS `fabricante_vehiculo` (
  `codigo_fabricante` int(10) UNSIGNED NOT NULL,
  `nombre_fabricante` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `otro_detalle` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`codigo_fabricante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fabricante_vehiculo`
--

INSERT INTO `fabricante_vehiculo` (`codigo_fabricante`, `nombre_fabricante`, `otro_detalle`) VALUES
(1, 'Suzuki', 'Fabricante de Japon'),
(2, 'Honda', 'Fabricante de Japon'),
(3, 'Ford', 'Fabricante de Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`user_name`, `password`) VALUES
('test', 'test1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_vehiculo`
--

DROP TABLE IF EXISTS `modelo_vehiculo`;
CREATE TABLE IF NOT EXISTS `modelo_vehiculo` (
  `codigo_modelo` int(10) UNSIGNED NOT NULL,
  `nombre_modelo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_fabricante` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`codigo_modelo`),
  KEY `codigo_fabricante` (`codigo_fabricante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelo_vehiculo`
--

INSERT INTO `modelo_vehiculo` (`codigo_modelo`, `nombre_modelo`, `codigo_fabricante`) VALUES
(1, 'Vitara', 1),
(2, 'CRX', 2),
(3, 'Explorer', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas_adicionales`
--

DROP TABLE IF EXISTS `pruebas_adicionales`;
CREATE TABLE IF NOT EXISTS `pruebas_adicionales` (
  `id_prueba` int(10) UNSIGNED NOT NULL,
  `id_consulta_servicio` int(10) UNSIGNED NOT NULL,
  `lugar_prueba` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `otro_detalle` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_prueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `id_servicio` int(10) UNSIGNED NOT NULL,
  `next_id_service` int(10) UNSIGNED DEFAULT NULL,
  `id_departamento` int(10) UNSIGNED NOT NULL,
  `nombre_servicio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `costo_servicio` double UNSIGNED NOT NULL,
  `descripcion_servicio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otros_detalles` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `id_departamento` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `next_id_service`, `id_departamento`, `nombre_servicio`, `costo_servicio`, `descripcion_servicio`, `otros_detalles`) VALUES
(1000, 1001, 100, 'Pintado de puertas', 750000, 'Servicio de pintura de puertas del vehiculo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id_vehiculo` int(10) UNSIGNED NOT NULL,
  `codigo_categoria` int(10) UNSIGNED NOT NULL,
  `codigo_fabricante` int(10) UNSIGNED NOT NULL,
  `codigo_modelo` int(10) UNSIGNED NOT NULL,
  `año_registro` year(4) NOT NULL,
  `otro_detalle` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `codigo_categoria` (`codigo_categoria`),
  KEY `codigo_fabricante` (`codigo_fabricante`),
  KEY `codigo_modelo` (`codigo_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `codigo_categoria`, `codigo_fabricante`, `codigo_modelo`, `año_registro`, `otro_detalle`) VALUES
(12344, 2, 2, 2, 2017, 'Vehiculo en mal estado'),
(23412, 1, 1, 1, 2016, 'Vehiculo en buen estado'),
(23423, 3, 3, 3, 2015, 'Vehiculo en excelente estado');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `direccion_cliente` (`id_direccion`);

--
-- Filtros para la tabla `consulta_servicio`
--
ALTER TABLE `consulta_servicio`
  ADD CONSTRAINT `consulta_servicio_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `consulta_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `consulta_servicio_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `consulta_servicio_ibfk_4` FOREIGN KEY (`id_prueba_adicional`) REFERENCES `pruebas_adicionales` (`id_prueba`);

--
-- Filtros para la tabla `modelo_vehiculo`
--
ALTER TABLE `modelo_vehiculo`
  ADD CONSTRAINT `modelo_vehiculo_ibfk_1` FOREIGN KEY (`codigo_fabricante`) REFERENCES `fabricante_vehiculo` (`codigo_fabricante`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`codigo_categoria`) REFERENCES `categoria_vehiculo` (`codigo_categoria_vehiculo`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`codigo_fabricante`) REFERENCES `fabricante_vehiculo` (`codigo_fabricante`),
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`codigo_modelo`) REFERENCES `modelo_vehiculo` (`codigo_modelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
