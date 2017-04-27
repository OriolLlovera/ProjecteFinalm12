-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2017 a las 16:55:56
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
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `catfamilia`
--

INSERT INTO `catfamilia` (`id`, `nom`) VALUES
(1, 'informàtica'),
(2, 'naturalesa'),
(3, 'animals');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catgramatical`
--

CREATE TABLE `catgramatical` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `catgramatical`
--

INSERT INTO `catgramatical` (`id`, `nom`) VALUES
(1, 'nom'),
(2, 'verb'),
(3, 'adverbi'),
(4, 'adjectiu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacte`
--

CREATE TABLE `contacte` (
  `id` int(11) NOT NULL,
  `idUsuari` int(11) NOT NULL,
  `idMissatgeria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'sara', 'sara', 'sara@sara.com', 'sara@sara.com', 1, NULL, '$2y$13$uiWsonbDMC6HCaLI9W02C.1jXi9vCKhuggIxj8vmPGJ94cb/mjr2m', '2017-04-27 16:52:42', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`id`, `nom`) VALUES
(1, 'castellano'),
(2, 'català'),
(3, 'english');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `valoracio`
--

CREATE TABLE `valoracio` (
  `id` int(11) NOT NULL,
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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catgramatical`
--
ALTER TABLE `catgramatical`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacte`
--
ALTER TABLE `contacte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `missatgeria`
--
ALTER TABLE `missatgeria`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `valoracio`
--
ALTER TABLE `valoracio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catfamilia`
--
ALTER TABLE `catfamilia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `catgramatical`
--
ALTER TABLE `catgramatical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `contacte`
--
ALTER TABLE `contacte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT de la tabla `valoracio`
--
ALTER TABLE `valoracio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
