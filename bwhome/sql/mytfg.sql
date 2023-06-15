-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 15:42:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mytfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nombrefull` varchar(45) NOT NULL,
  `biografia` varchar(600) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombrefull`, `biografia`, `foto`) VALUES
(1, 'Brandon Sanderson', 'Brandon Sanderson (Lincoln, Nebraska, 19 de diciembre de 1975) es un escritor estadounidense de literatura fantástica y ciencia ficción. Es conocido sobre todo por el universo ficticio de Cosmere, en el que se ambientan la mayoría de sus novelas de fantasía, entre las que destacan las series Nacidos de la bruma (Mistborn) y El archivo de las tormentas.', '1686250338-BrandonSanderson.png'),
(3, 'Liu Cixin', 'Liú Cíxīn, en chino tradicional, 劉慈欣; en chino simplificado, 刘慈欣, (Yangquan, 1963), es un escritor chino de ciencia ficción, ganador en nueve ocasiones del premio Galaxy y una vez del premio Xingyun (Nébula), ​y está considerado como uno de los más prolíficos y reconocidos escritores del género en China.Liu creó un nuevo tema clásico en la ciencia ficción china, y sus escritos están enfocados principalmente en el rol de China en un mundo futuro, siendo considerado uno de los mejores escritores de ciencia ficción china de todos los tiempos.', '1686256731-CixinLiu.png'),
(4, 'Joël Dicker', 'Joël Dicker nació el 16 de junio de 1985 en Ginebra, parte francófona de Suiza, hijo de una bibliotecaria y un profesor de francés.1​ Dicker pasó su infancia en Ginebra, donde asistiría a la Collège Madame de Staël, aunque no se sentiría muy atraído hacia los estudios. A los 19 años tomó clases de actuación en la escuela de Drama en el Cours Florent en París. Un año después, regresaría a Ginebra para estudiar Derecho en la Universidad de Ginebra, graduándose en 2010.', '1686257714-JoelDicker.png'),
(5, 'Stephen King', 'Stephen Edwin King, más conocido como Stephen King y ocasionalmente por su pseudónimo Richard Bachman, es un escritor estadounidense de novelas de terror, ficción sobrenatural, misterio, ciencia ficción y literatura fantástica. Sus libros han vendido más de 500 millones de ejemplares,1​ y en su mayoría han sido adaptados al cine y a la televisión. Ha publicado 64 novelas, once colecciones de relatos y novelas cortas, y siete libros de no ficción, además de un guion cinematográfico, entre otras obras.', '1686284619-StephenKing2.png'),
(7, 'Robert Jordan', 'James Oliver Rigney, Jr. (Charleston, Carolina del Sur; 17 de octubre de 1948-ibídem, 16 de septiembre de 2007), más conocido por el seudónimo Robert Jordan, fue un escritor estadounidense, famoso por ser autor de la saga de fantasía La rueda del tiempo.', '1686831255-Robert_Jordan.png'),
(8, 'Alice Kellen', 'Alice Kellen (Valencia, 1989) es una escritora española de literatura romántica juvenil y adulta. Comenzó su carrera como escritora en 2013 con Llévame a cualquier lugar y ha seguido publicando hasta la actualidad, contando ya con quince libros en el mercado.', '1686835695-AliceKellen.png'),
(9, 'Alice Oseman', 'Alice May Oseman (Chatham, Kent; 16 de octubre de 1994)​ es una escritora, guionista e ilustradora británica de literatura juvenil. Es principalmente conocida por su novela gráfica Heartstopper. Ha sido elogiada por la crítica especializada y ha recibido diversos premios como los Inky Awards y United By Pop Awards.\r\n\r\nSus novelas se centran en la vida adolescente contemporánea en el Reino Unido. Consiguió su primer contrato editorial a los diecisiete años y publicó su primera novela, Solitario, en 2014.2​ Otros de sus obras son Radio Silencio, Nací para esto y Sin amor.\r\n\r\n', '1686835768-AliceOseman.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `fechapedido` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `fechapedido`, `cantidad`, `idLibro`, `idUsuario`) VALUES
(5, '2023-06-09', 1, 1, 1),
(9, '2023-06-11', 1, 4, 1),
(11, '2023-06-13', 1, 3, 1),
(12, '2023-06-13', 1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `fechapost` date NOT NULL,
  `precio` float NOT NULL,
  `idAutor` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `editorial` varchar(45) NOT NULL,
  `isbn` int(11) NOT NULL,
  `edicion` varchar(45) NOT NULL,
  `portada` varchar(100) NOT NULL,
  `genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `descripcion`, `fechapost`, `precio`, `idAutor`, `stock`, `editorial`, `isbn`, `edicion`, `portada`, `genero`) VALUES
(1, 'Aleación de Ley - Mistborn 4', 'Aleación de ley es la secuela de la primera trilogía de la saga «Nacidos de la Bruma [Mistborn]», una obra iniciada con El imperio final y parte imprescindible del Cosmere, el universo destinado a dar forma a la serie más extensa y fascinante jamás escrita en el ámbito de la fantasía épica.', '2015-06-10', 19.98, 1, 69, 'Penguin Book', 123453467, 'Tapa dura', '1686292681-AleacionLey.png', 'fantasia'),
(3, 'El Problema de los Tres Cuerpos', 'El primer libro de la «Trilogía de los Tres Cuerpos», el fenómeno editorial chino que ha conquistado al mundo y ha ganado el premio Hugo 2015 a la mejor novela.\r\n\r\nEl problema de los tres cuerpos es la primera novela no escrita originariamente en inglés galardonada con el premio Hugo, el Nobel del género de la ciencia ficción.', '2015-06-17', 24.65, 3, 48, 'Nova', 354356237, 'Tapa blanda', '1686393131-ElProblemaDeLosTresCuerpos.png', 'cienciaficcion'),
(4, 'La verdad sobre el caso de Harry Quebert', 'Quién mató a Nola Kellergan es la gran incógnita a desvelar en esta incomparable historia policíaca cuya experiencia de lectura escapa a cualquier tentativa de descripción.\r\n\r\nIntentémoslo:\r\n\r\nUna novela de suspense a tres tiempos -1975, 1998 y 2008- acerca del asesinato de una joven de quince años en la pequeña ciudad de Aurora, en New Hampshire.\r\n\r\nEn 2008, Marcus Goldman, un joven escritor, visita a su mentor -Harry Quebert, autor de una aclamada novela- y descubre que éste tuvo una relación secreta con Nola Kellergan. Poco después, Harry es arrestado y acusado de asesinato al encontrarse e', '2016-02-04', 12.95, 4, 49, 'DEBOLSILLO', 452335674, 'Tapa dura', '1686393892-LaVerdadSobreElCasoHarryQuebert.png', 'misterio'),
(5, 'IT', '¿Quién o qué mutila y mata a los niños de un pequeño pueblo norteamericano?\r\n¿Por qué llega cíclicamente el horror a Derry en forma de un payaso siniestro que va sembrando la destrucción a su paso?\r\n\r\nEsto es lo que se proponen averiguar los protagonistas de esta novela. Tras veintisiete años de tranquilidad y lejanía, una antigua promesa infantil les hace volver al lugar en el que vivieron su infancia y juventud como una terrible pesadilla. Regresan a Derry para enfrentarse con su pasado y enterrar definitivamente la amenaza que los amargó durante su niñez.\r\n\r\nSaben que pueden morir, pero son', '2017-11-23', 17.05, 5, 49, 'DEBOLSILLO', 123412343, 'Tapa blanda', '1686394037-IT.png', 'terror'),
(6, 'Sombras de Identidad - Mistborn 5', 'Sombras de identidad es el quinto libro de la saga «Nacidos de la Bruma [Mistborn]», una obra iniciada con El imperio final y parte imprescindible del Cosmere, el universo destinado a convertirse en la serie más extensa y fascinante jamás escrita en el ámbito de la fantasía épica.', '2017-10-18', 17.99, 1, 50, 'Penguin Books', 123456789, 'Tapa dura', '1686828239-SombrasIdentidad.png', 'fantasia'),
(7, 'La Rueda del Tiempo 1 - El Ojo del Mundo', 'Reeditamos la clásica serie de fantasía La Rueda del Tiempo. Este primer volumen incluye los relatos Desde dos ríos y La llaga.\r\n\r\nLa vida de Rand Al’Thor y sus amigos en Campo de Emond ha resultado bastante monótona hasta que una joven misteriosa llega al pueblo. Moraine, una maga capaz de encauzar el Poder Único, anuncia el despertar de una terrible amenaza.\r\n\r\nEsa misma noche, el pueblo se ve atacado por espantosos trollocs sedientos de sangre, unas bestias semihumanas que hasta entonces se habían considerado una leyenda. Mientras Campo de Emond soporta la ofensiva, Moraine y su guardián ay', '2019-10-15', 18.95, 7, 50, 'Planeta', 132424353, 'Tapa blanda', '1686831480-RuedaTiempo1.png', 'fantasia'),
(8, 'La Rueda del Tiempo 2 - La Gran Cacería', '¡Rand ha sobrevivido a su primer enfrentamiento con los perversos seguidores del Oscuro, pero ni sus amigos ni él están a salvo, ya que el señor del mal ha liberado a los Renegados, mientras los héroes de todas las eras se levantan de la tumba cuando el Cuerno de Valere los saca de su sueño. Al verse obligado a enfrentarse a las fuerzas de la oscuridad, Rand decide escapar de su destino.Pero la profecía tiene que cumplirse.\r\nPor su calidad literaria, su ambicioso planteamiento y su descomunal historia, La Rueda del Tiempo es la saga de fantasía más importante de los últimos treinta años. El le', '2019-11-19', 18.95, 7, 87, 'Planeta', 254336658, 'Tapa blanda', '1686831952-RuedaTiempo2.png', 'fantasia'),
(9, 'Brazales de Duelo - Mistborn 6', 'La cuenca de Elendel es un polvorín. El descontento de los trabajadores se suma a las diferencias irreconciliables entre la capital y las demás ciudades de la cuenca; Elendel asegura gobernarlas mientras sus habitantes denuncian la opresión a la que se sienten sometidos. De pronto, llega a oídos de Waxillium Ladrian que un académico kandra podría haber localizado los legendarios Brazales de Duelo, un arma capaz de sembrar la destrucción y dar al traste con el actual equilibrio de poder imperante en la cuenca.\r\n\r\nPero perseguir mitos no se cuenta entre las atribulaciones de un representante de ', '2017-06-17', 19.85, 1, 54, 'Nova', 457586734, 'Tapa dura', '1686832325-BrazalesDuelo.png', 'fantasia'),
(10, 'El mapa de los anhelos', '¿Y si te diesen un mapa para descubrir quién eres?\r\n\r\n¿Seguirías la ruta marcada hasta el final?\r\n\r\nImagina que estás destinada a salvar a tu hermana, pero al final ella muere y la razón de tu existencia se desvanece. Eso es lo que le ocurre a Grace Peterson, la chica que siempre se ha sentido invisible, la que nunca ha salido de Nebraska, la que colecciona palabras y ve pasar los días refugiada en la monotonía. Hasta que llega a sus manos el juego de El mapa de los anhelos y, siguiendo las instrucciones, lo primero que debe hacer es encontrar a alguien llamado Will Tucker, del que nunca ha oí', '2022-03-30', 17, 8, 87, 'Planeta', 840825595, 'Tapa blanda', '1686835942-MapaAnhelos.png', 'romance'),
(11, 'Heartstopper - Volumen 1', 'Dos chicos se conocen. Se hacen amigos. Se enamoran. ¿Por qué nos empeñamos en hacer complicadas las emociones más sencillas?\r\n\r\nEsta historia de amor entre dos chicos, uno de ellos declaradamente homosexual y el otro en vías de autodescubrimiento, nos recordará que hay primeros amores frágiles como el cristal y memorables como el diamante. Con los titubeos propios de cualquier amor adolescente, Heartstopper responde a la manera de sentir de los jóvenes reales, con una visión abierta, natural y sensible sobre el amor y la identidad sexual, sin perder nunca la delicadeza y la emoción.', '2020-03-03', 15.15, 9, 58, 'CrossBooks', 840822422, 'Tapa blanda', '1686836070-Heartstopper1.png', 'romance');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `cp` varchar(45) NOT NULL,
  `tlf` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `nombre`, `apellido1`, `apellido2`, `pais`, `cp`, `tlf`, `rol`, `saldo`) VALUES
(1, 'junxito121@gmail.com', 'holiwis1234', 'Junxito', 'Lopez', 'Jimenez', 'España', '14920', '987654321', 'administrador', 999999),
(5, 'saraartemisia@gmail.com', 'holiwis1234', 'Sara', 'Arte', 'Misia', 'Espanita', '14920', '123456789', 'cliente', 100),
(8, 'asereje@gmail.com', 'holiwis1234', 'Asereje', 'a', 'deje', 'Espanita', '12222', '666666666', 'cliente', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id`, `rating`, `comentario`, `idLibro`, `idUsuario`) VALUES
(2, 4, 'muy guapo muchas gracias', 1, 1),
(20, 5, 'guapo', 1, 1),
(21, 3, 'medio que', 1, 1),
(29, 1, 'deja de recomendar a sanderson', 1, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
