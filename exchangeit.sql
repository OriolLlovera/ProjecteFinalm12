-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2017 a las 17:41:45
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exchangeit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catfamilia`
--

CREATE TABLE `catfamilia` (
  `id` int(11) NOT NULL,
  `idCatFamilia` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catgramatical`
--

CREATE TABLE `catgramatical` (
  `id` int(11) NOT NULL,
  `idCatGramatical` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacte`
--

CREATE TABLE `contacte` (
  `id` int(11) NOT NULL,
  `idContacte` int(11) NOT NULL,
  `idUsuari` int(11) NOT NULL,
  `idMissatgeria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id` int(11) NOT NULL,
  `idIdioma` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `idLog` int(11) NOT NULL,
  `idUsuari` int(11) NOT NULL,
  `idFuncionalitat` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `missatgeria`
--

CREATE TABLE `missatgeria` (
  `id` int(11) NOT NULL,
  `idMissatge` int(11) NOT NULL,
  `idUsuariOrigen` int(11) NOT NULL,
  `idUsuariDesti` int(11) NOT NULL,
  `missatge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `llegit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paraula`
--

CREATE TABLE `paraula` (
  `id` int(11) NOT NULL,
  `paraula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoriaGramatical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoriaFamilia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `definicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textatraduir`
--

CREATE TABLE `textatraduir` (
  `id` int(11) NOT NULL,
  `idTextatraduir` int(11) NOT NULL,
  `textOriginal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idiomaOriginal` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `texttraduit`
--

CREATE TABLE `texttraduit` (
  `id` int(11) NOT NULL,
  `idTextATraduir` int(11) NOT NULL,
  `idUsuari` int(11) NOT NULL,
  `textTraduit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traduccioparaula`
--

CREATE TABLE `traduccioparaula` (
  `id` int(11) NOT NULL,
  `idIdioma` int(11) NOT NULL,
  `idParaula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `id` int(11) NOT NULL,
  `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognom1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognom2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numTraduccions` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracio`
--

CREATE TABLE `valoracio` (
  `id` int(11) NOT NULL,
  `idValoracio` int(11) NOT NULL,
  `idTraductor` int(11) NOT NULL,
  `puntuacio` int(11) NOT NULL,
  `idUsuariValoracio` int(11) NOT NULL,
  `idTraduccio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catfamilia`
--
ALTER TABLE `catfamilia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_795DC0B93414E7CF` (`idCatFamilia`);

--
-- Indices de la tabla `catgramatical`
--
ALTER TABLE `catgramatical`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A1A8A8CB2411F735` (`idCatGramatical`);

--
-- Indices de la tabla `contacte`
--
ALTER TABLE `contacte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1DC85E0C7ED9F696` (`idIdioma`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8F3F68C5AE777542` (`idLog`);

--
-- Indices de la tabla `missatgeria`
--
ALTER TABLE `missatgeria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_75A3B5FE97839443` (`idMissatge`);

--
-- Indices de la tabla `paraula`
--
ALTER TABLE `paraula`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_13E32FBD13E32FBD` (`paraula`);

--
-- Indices de la tabla `textatraduir`
--
ALTER TABLE `textatraduir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3F5FBD1061C119E1` (`idTextatraduir`);

--
-- Indices de la tabla `texttraduit`
--
ALTER TABLE `texttraduit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8E65082541D831B9` (`textTraduit`);

--
-- Indices de la tabla `traduccioparaula`
--
ALTER TABLE `traduccioparaula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_68CC94FF7F8F253B` (`dni`);

--
-- Indices de la tabla `valoracio`
--
ALTER TABLE `valoracio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_EF6E6F5D1384440B` (`idValoracio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catfamilia`
--
ALTER TABLE `catfamilia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `catgramatical`
--
ALTER TABLE `catgramatical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contacte`
--
ALTER TABLE `contacte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `missatgeria`
--
ALTER TABLE `missatgeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paraula`
--
ALTER TABLE `paraula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `textatraduir`
--
ALTER TABLE `textatraduir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `texttraduit`
--
ALTER TABLE `texttraduit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `traduccioparaula`
--
ALTER TABLE `traduccioparaula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuari`
--
ALTER TABLE `usuari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `valoracio`
--
ALTER TABLE `valoracio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
