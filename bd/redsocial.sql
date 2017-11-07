-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2017 a las 01:10:15
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE redsocial;
USE redsocial;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `idamigo` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emailamigo` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`idamigo`, `email`, `emailamigo`, `status`) VALUES
(41, 'mryaima@misena.edu.co', 'argiraldo@misena.edu.co', 'amigo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcom` int(11) NOT NULL,
  `idpub` int(11) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcom`, `idpub`, `texto`, `email`, `fecha`) VALUES
(30, 53, 'Prueba exitosa de comentario en publicacion', 'bagarcia321@misena.edu.co', '2017-10-24 19:12:32'),
(31, 54, 'Hola soy del adsi 119', 'wccorrea5@misena.edu.co', '2017-10-24 19:18:25'),
(32, 55, 'The Best#1', 'mryaima@misena.edu.co', '2017-10-24 19:22:08'),
(34, 58, 'Leer porfavor', 'argiraldo@misena.edu.co', '2017-10-24 19:27:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `idfotos` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `idmf` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idg` int(30) NOT NULL,
  `idmg` int(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `idintereses` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `email` varchar(50) DEFAULT NULL,
  `idpub` int(11) DEFAULT NULL,
  `like` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`email`, `idpub`, `like`) VALUES
('bagarcia321@misena.edu.co', 53, '1'),
('wccorrea5@misena.edu.co', 54, '0'),
('wccorrea5@misena.edu.co', 53, '1'),
('mryaima@misena.edu.co', 55, '1'),
('argiraldo@misena.edu.co', 58, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrupos`
--

CREATE TABLE `migrupos` (
  `idmg` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misfotos`
--

CREATE TABLE `misfotos` (
  `idmf` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombrealbum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `edocivil` varchar(50) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `estudios` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idpub` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `video` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `emailamigo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idpub`, `email`, `texto`, `imagen`, `video`, `fecha`, `emailamigo`) VALUES
(53, 'bagarcia321@misena.edu.co', 'Prueba publicaciÃ³n 0001 ADSI 120 ', 'publicabrayam.jpg', '', '2017-10-31 23:41:57', 'bagarcia321@misena.edu.co'),
(54, 'wccorrea5@misena.edu.co', 'Hola menores estoy feliz ', 'images.jpg', '', '2017-10-31 23:52:25', 'wccorrea5@misena.edu.co'),
(55, 'mryaima@misena.edu.co', 'Hola soy del ADSI 120 ', 'publicamilton.jpg', '', '2017-10-31 23:54:45', 'mryaima@misena.edu.co'),
(57, 'lcmurillo86@misena.edu.co', 'InformaciÃ³n Importante', 'publicacarlos.jpg', '', '2017-11-01 00:06:36', 'lcmurillo86@misena.edu.co'),
(58, 'argiraldo@misena.edu.co', 'Que mas papus?', 'publicaangel.jpg', '', '2017-10-31 23:39:50', 'argiraldo@misena.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idconf` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `emailamigo` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `fechanac` date NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `fotos` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `pass`, `fechanac`, `nombre`, `sexo`, `status`, `fotos`) VALUES
('argiraldo@misena.edu.co', '202cb962ac59075b964b07152d234b70', '0000-00-00', 'Angel Grialdo', 'masculino', '2', 'perfilangel.jpg'),
('bagarcia321@misena.edu.co', '202cb962ac59075b964b07152d234b70', '0000-00-00', 'Brayam Garcia', 'masculino', '2', 'perfilbrayam.jpg'),
('lcmurillo86@misena.edu.co', '202cb962ac59075b964b07152d234b70', '0000-00-00', 'Carlos Murillo', 'masculino', '2', 'perfilcarlos.jpg'),
('mryaima@misena.edu.co', '202cb962ac59075b964b07152d234b70', '0000-00-00', 'Milton Yaima', 'masculino', '2', 'perfilmilton.jpg'),
('wccorrea5@misena.edu.co', '202cb962ac59075b964b07152d234b70', '0000-00-00', 'Williams Correa', 'masculino', '2', 'perfilwilliams.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`idamigo`),
  ADD UNIQUE KEY `idamigo` (`idamigo`),
  ADD UNIQUE KEY `idamigo_2` (`idamigo`),
  ADD KEY `email` (`email`,`emailamigo`),
  ADD KEY `emailamigo` (`emailamigo`),
  ADD KEY `email_2` (`email`,`emailamigo`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcom`),
  ADD KEY `idpub` (`idpub`,`email`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`idfotos`),
  ADD KEY `email` (`email`,`idmf`),
  ADD KEY `idmf` (`idmf`),
  ADD KEY `idmf_2` (`idmf`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idg`),
  ADD UNIQUE KEY `idg` (`idg`),
  ADD KEY `idmg` (`idmg`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD PRIMARY KEY (`idintereses`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD KEY `email` (`email`),
  ADD KEY `idpub` (`idpub`);

--
-- Indices de la tabla `migrupos`
--
ALTER TABLE `migrupos`
  ADD PRIMARY KEY (`idmg`),
  ADD KEY `idmg` (`idmg`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `misfotos`
--
ALTER TABLE `misfotos`
  ADD PRIMARY KEY (`idmf`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`),
  ADD KEY `idperfil` (`idperfil`),
  ADD KEY `email` (`email`),
  ADD KEY `idperfil_2` (`idperfil`),
  ADD KEY `email_2` (`email`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`idpub`),
  ADD KEY `idpub` (`idpub`,`email`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idconf`),
  ADD KEY `email` (`email`,`emailamigo`),
  ADD KEY `emailamigo` (`emailamigo`),
  ADD KEY `email_2` (`email`,`emailamigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `idamigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `idfotos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idg` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `intereses`
--
ALTER TABLE `intereses`
  MODIFY `idintereses` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrupos`
--
ALTER TABLE `migrupos`
  MODIFY `idmg` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `misfotos`
--
ALTER TABLE `misfotos`
  MODIFY `idmf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `idpub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idconf` int(30) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`emailamigo`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idpub`) REFERENCES `publicaciones` (`idpub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`idmf`) REFERENCES `misfotos` (`idmf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`idmg`) REFERENCES `migrupos` (`idmg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD CONSTRAINT `intereses_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`idpub`) REFERENCES `publicaciones` (`idpub`) ON DELETE CASCADE;

--
-- Filtros para la tabla `migrupos`
--
ALTER TABLE `migrupos`
  ADD CONSTRAINT `migrupos_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
