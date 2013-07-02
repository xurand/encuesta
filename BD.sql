CREATE DATABASE `encuesta` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `encuesta`;

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

INSERT INTO `preguntas` (`id`, `pregunta`) VALUES
(1, 'Pregunta 1'),
(2, 'Pregunta 2'),
(3, 'Pregunta 3'),
(4, 'Pregunta 4'),
(5, 'Pregunta 5'),
(6, 'Pregunta 6'),
(7, 'Pregunta 7'),
(8, 'Pregunta 8'),
(9, 'Pregunta 9'),
(10, 'Pregunta 10');


CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` int(11) NOT NULL,
  `respuesta` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '0 o 1',
  KEY `id` (`id`),
  KEY `pregunta` (`pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=41 ;

INSERT INTO `respuestas` (`id`, `pregunta`, `respuesta`, `flag`) VALUES
(1,  1, 'Rpta 1 no', '0'),
(2,  1, 'Rpta 1 no', '0'),
(3,  1, 'Rpta 1 no', '0'),
(4,  1, 'Rpta 1 SI', '1'),
(5,  2, 'Rpta 2 no', '0'),
(6,  2, 'Rpta 2 no', '0'),
(7,  2, 'Rpta 2 no', '0'),
(8,  2, 'Rpta 2 SI', '1'),
(9,  3, 'Rpta 3 no', '0'),
(10, 3, 'Rpta 3 no', '0'),
(11, 3, 'Rpta 3 no', '0'),
(12, 3, 'Rpta 3 SI', '1'),
(13, 4, 'Rpta 4 no', '1'),
(14, 4, 'Rpta 4 no', '0'),
(15, 4, 'Rpta 4 no', '0'),
(16, 4, 'Rpta 4 no', '0'),
(17, 5, 'Rpta 5 SI', '1'),
(18, 5, 'Rpta 5 no', '0'),
(19, 5, 'Rpta 5 no', '0'),
(20, 5, 'Rpta 5 no', '0'),
(21, 6, 'Rpta 6 no', '0'),
(22, 6, 'Rpta 6 no', '0'),
(23, 6, 'Rpta 6 no', '0'),
(24, 6, 'Rpta 6 SI', '1'),
(25, 7, 'Rpta 7 no', '0'),
(26, 7, 'Rpta 7 no', '0'),
(27, 7, 'Rpta 7 no', '0'),
(28, 7, 'Rpta 7 SI', '1'),
(29, 8, 'Rpta 8 no', '0'),
(30, 8, 'Rpta 8 no', '0'),
(31, 8, 'Rpta 8 no', '0'),
(32, 8, 'Rpta 8 SI', '1'),
(33, 9, 'Rpta 9 no', '0'),
(34, 9, 'Rpta 9 no', '0'),
(35, 9, 'Rpta 9 no', '0'),
(36, 9, 'Rpta 9 SI', '1'),
(37, 10, 'Rpta 10 no', '0'),
(38, 10, 'Rpta 10 no', '0'),
(39, 10, 'Rpta 10 SI', '1'),
(40, 10, 'Rpta 10 no', '0');


CREATE TABLE IF NOT EXISTS `seguridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` char(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`pregunta`) REFERENCES `preguntas` (`id`);