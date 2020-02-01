-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2020 a las 22:55:26
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uniline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--

CREATE TABLE `bloque` (
  `idbloque` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bloque`
--

INSERT INTO `bloque` (`idbloque`, `nombre`, `curso`) VALUES
(1, 'Bloque.-1: Como instalar las herramientas del curso', 1),
(2, 'Bloque.-2: Como declarar variables', 1),
(3, 'Bloque.- 3: Como utilizar contadores', 1),
(4, 'Bloque.- 4: Como utilizar ciclos for - while', 1),
(5, 'Bloque.- 5: Funciones generales de php', 1),
(6, 'Bloque.- 6: Php orientado a objetos', 1),
(7, 'Bloque.- 7: Repasando el curso', 1),
(8, 'Bloque.- 8: Proyecto final', 1),
(9, 'Actividad 1.- Introduccion a Java', 4),
(10, 'Actividad 2.- Instalando los IDEs necesarios', 4),
(11, 'Actividad 3.- Creando nuestras primeras clases en java', 4),
(12, 'Actividad 4.- Inicios en ciclos for - while - do while', 4),
(13, 'Actividad 5.- Creando nuestros promeros objetos', 4),
(14, 'Actividad 6.- Creando Threads', 4),
(15, 'Actividad 7.- Primer proyecto con Mysql', 4),
(16, 'Actividad 8.- Como usar Mysql en nuestro proyectos', 4),
(17, 'Actividad 9.- Creando proyecto con temas del curso', 4),
(18, 'Actividad 10.- Proyecto final', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idcalificacion` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `video` varchar(300) NOT NULL,
  `horas` varchar(3) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `profesor` int(11) NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `nombre`, `descripcion`, `imagen`, `video`, `horas`, `calificacion`, `profesor`, `costo`) VALUES
(1, 'Programacion avanza en Php', 'Este curso veremos la programacion avanzada en php ', '../img/cursos/23242232.png', '../videos/Turntable - 10857.mp4', '43', NULL, 2, 1800),
(2, 'Excel Avanzado', 'Veras todo lo referenciado a al Exel', '../img/cursos/excel.jpg', '../videos/Turntable - 10857.mp4', '43', NULL, 2, 1500),
(3, 'Excel Avanzado 2', 'Mostrare, contenido avanzado en exel', '../img/cursos/exel2.jpg', '../videos/Neon - 21368.mp4', '70', NULL, 2, 1300),
(4, 'Programación orientada a objetos en java', 'En este curso veremos los principios babsicos de la programacion en java, asi como las maneras correctas de programar y las formas de crear las clases que te ahorraran muchsimo trabajo.', '../img/cursos/474389324.jpg', '../videos/Turntable - 10857.mp4', '70', NULL, 2, 2100),
(5, 'Matematica vanzada', 'En este curso se veran los temas mas sencillos de matematicas', '../img/cursos/23242232.png', '../videos/Turntable - 10857.mp4', '40', NULL, 2, 200),
(6, 'Matematica vanzada', 'En este curso veremos como hacer ecuaciones de primer grado', '../img/cursos/exel2.jpg', '../videos/Neon - 21368.mp4', '49', NULL, 2, 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_tarea_completada`
--

CREATE TABLE `evaluacion_tarea_completada` (
  `tarea_completada` int(11) NOT NULL,
  `usuario_evaluador` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `idexamen` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `bloque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`idexamen`, `nombre`, `descripcion`, `bloque`) VALUES
(1, 'Examen instalacion', 'Este examen tendra preguntas de como instalar las herramientas', 1),
(2, 'Examen de la declaracion de variables', '', 2),
(3, 'Examen Contadores', '', 3),
(4, 'Examen ciclos', '', 4),
(5, 'Examen funciones', '', 5),
(6, 'Examen objetos', '', 6),
(8, 'Examen repaso', '', 7),
(9, 'Examen final', '', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_completado`
--

CREATE TABLE `examen_completado` (
  `examen` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `alumno` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL,
  `id_objeto_sesion_stripe` varchar(80) NOT NULL,
  `intento_pago` varchar(80) NOT NULL,
  `curso` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `email_comprador` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL,
  `pregunta` varchar(300) NOT NULL,
  `respuestas` varchar(500) NOT NULL,
  `respuesta_correcta` varchar(1) NOT NULL,
  `examen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idpregunta`, `pregunta`, `respuestas`, `respuesta_correcta`, `examen`) VALUES
(1, 'De donde se descarga xampp ?', 'local mente,#De internet,De steam,Solo de descarga', '1', 1),
(2, 'Donde se encuentra la carpeta xampp?', 'En documentos,En imagenes,#En disco C,En Escritorio', '1', 1),
(3, 'Donde desinstalo xampp ? ', 'En documentos,En escritorio,#En panel de control,En imagenes', '1', 1),
(4, 'De donde descargo Visual Studio Code ?', '#De internet, De documentos,De Ares,De documentos', '1', 1),
(5, 'Para que sirve el emmet?', '#Autocompletar,Eliminar,Para nada,Servidor', '1', 1),
(6, 'Como se declara una variable en php ?', '#con el signo $,Sin el signo,Con el int al inicio,Sin nada', '1', 2),
(7, 'Como se declara la variable int en php ?', 'con el signo $,Sin el signo,Con el int al inicio,#Sin nada', '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_usuario`
--

CREATE TABLE `respuesta_usuario` (
  `idpregunta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `correcta` tinyint(4) NOT NULL,
  `respuesta` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `idtarea` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `archivo_bajada` varchar(300) DEFAULT NULL,
  `archivo_subida` varchar(300) DEFAULT NULL,
  `bloque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idtarea`, `nombre`, `descripcion`, `archivo_bajada`, `archivo_subida`, `bloque`) VALUES
(1, 'Como descargar los archivos', '', '../archivos/447849032.doc', NULL, 1),
(2, 'Como declarar variables', '', '../archivos/37484893.doc', NULL, 2),
(3, 'Como usar contadores', '', '../archivos/447849032.doc', NULL, 3),
(4, 'Como usar while', '', '../archivos/37484893.doc', NULL, 4),
(5, 'Funciones Phop', '', '../archivos/447849032.doc', NULL, 5),
(6, 'Objetos Php', '', '../archivos/37484893.doc', NULL, 6),
(7, 'Repaso', '', '../archivos/447849032.doc', NULL, 7),
(8, 'Que aprendiste del curso ?', '', '../archivos/37484893.doc', NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_completada`
--

CREATE TABLE `tarea_completada` (
  `id` int(11) NOT NULL,
  `tarea` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `idtema` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `video` varchar(300) NOT NULL,
  `archivo` varchar(300) DEFAULT NULL,
  `bloque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`idtema`, `nombre`, `descripcion`, `video`, `archivo`, `bloque`) VALUES
(1, 'Tema.-1.1: Como descargar e intalar bisual', 'En este tema veremos que descargar el editor de texto en el cual vamos a trabajar', '../videos/Turntable - 10857.mp4', '../archivos/37484893.doc', 1),
(2, 'Tema.-1.2: Como instalar el servidor', 'En este capitulo veremos como instalar el servidor', '../videos/Neon - 21368.mp4', '../archivos/447849032.doc', 1),
(4, 'Tema.-1.3: Instalando plugins de Visual Studio code', 'En este video veremos como instalar los plugins de Visual Studio code', '../videos/Neon - 21368.mp4', '../archivos/37484893.doc', 1),
(5, 'Tema.-1.4: Que es Php', 'Veremos los significados y curiosidades de php', '../videos/Turntable - 10857.mp4', '', 1),
(6, 'Tema.-1.5: Primeros pasos con php y servidor Xampp', 'En este tema veremos algunos ejemplos de como usar php y como correr el servidor xampp', '../videos/Turntable - 10857.mp4', NULL, 1),
(7, 'Tema.-2.1: Sintaxis de Php', 'Veremos el tipo de sintaxis de Php', '../videos/Neon - 21368.mp4', NULL, 2),
(8, 'Tema.-2.2: Como declarar variables', 'Veremos lo necesario para declarar variables', '../videos/Turntable - 10857.mp4', NULL, 2),
(9, 'Tema.-2.3: Que son los contadores', 'Veremos que son los contadores', '../videos/Neon - 21368.mp4', NULL, 2),
(10, 'Tema.-2.4: Variables globales', 'Veremos como se utilizan las variables globales', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 2),
(11, 'Tema.-3.1: Como utilizar los contadores', 'Veremos la forma en la que trabajan los contadores', '../videos/Turntable - 10857.mp4', NULL, 3),
(12, 'Tema.-3.2: Maneras de ahorrar tiempo', 'Veremos como utilizar los contadores de manera rapida y dinamoca', '../videos/Neon - 21368.mp4', NULL, 3),
(13, 'Tema.-3.3: Contadores globales', 'Veremos como funcionan los contadores globales', '../videos/Turntable - 10857.mp4', NULL, 3),
(14, 'Tema.-4.1: Que son los ciclos for - while', 'Veremos la definicion y como funcionan los ciclos for y while', '../videos/Neon - 21368.mp4', NULL, 4),
(15, 'Tema.-4.2: Como funciona el ciclo for', 'Veremos como funciona  un ciclo for', '../videos/Turntable - 10857.mp4', NULL, 4),
(16, 'Tema.-4.3: Como funciona un ciclo while ', 'En este video veremos como funciona in ciclo while', '../videos/Neon - 21368.mp4', NULL, 4),
(17, 'Tema.- 4.4: Ciclos for anidados', 'Veremos como funcionan los ciclos for anidados ', '../videos/Turntable - 10857.mp4', NULL, 4),
(18, 'Tema.-4.5: Ciclos While anidados', 'Veremos como funcionan los ciclos while anidados', '../videos/Neon - 21368.mp4', NULL, 4),
(19, 'Tema.-4.6: Algunos problemas con los ciclos', 'Veremos los problemas mas comunes con los ciclos ', '../videos/Turntable - 10857.mp4', NULL, 4),
(21, 'Tema.- 5.1: Funciones para convertir parametros', 'En este tema veremos unas funciones para convertir los parametros', '../videos/Turntable - 10857.mp4', NULL, 5),
(22, 'Tema.- 5.2: Funciones para limpiar parametros', 'En este tema veremos unas funciones para limpiar los parametros', '../videos/Neon - 21368.mp4', NULL, 5),
(23, 'Tema.- 5.3: Funciones Post - Get ', 'En este tema veremos las funciones Post y Get', '../videos/Turntable - 10857.mp4', NULL, 5),
(24, 'Tema.- 6.1: Como crear clases en php', '', '../videos/Neon - 21368.mp4', NULL, 6),
(25, 'Tema.- 6.2: Como crear un constructor', 'En este video veremos como crear un constructor en php', '../videos/Turntable - 10857.mp4', NULL, 6),
(26, 'Tema.- 6.3: Como funciona la variable this', 'En este video veremos como funciona la variable this', '../videos/Turntable - 10857.mp4', NULL, 6),
(27, 'Tema.- 6.4: Variables Locales', 'En este tema veremos como funcionan las variables locales en las clases de php', '../videos/Neon - 21368.mp4', NULL, 6),
(28, 'Tema.- 7.1: Repaso general', 'En este video veremos todos los temas que emos visto', '../videos/Turntable - 10857.mp4', NULL, 7),
(29, 'Tema.- 8.1: Creando el proyecto', 'En este video crearemos el proyecto final, en el cual trabajaremos y veremos todo lo que se enseno en el curso', '../videos/Turntable - 10857.mp4', NULL, 8),
(30, 'Tema.- 8.2: Creando el formulario', 'En este video veremo como crear el formulario en el que estaremos trabajando en el curso', '../videos/Neon - 21368.mp4', NULL, 8),
(31, 'Tema.- 8.3: Dandole funcionalidad al formulario', 'Veremos como  funciona el formulario con el metodo post de php', '../videos/Turntable - 10857.mp4', NULL, 8),
(32, 'Tema.- 8.4: Prosesando los datos del formulario', '', '../videos/Neon - 21368.mp4', NULL, 8),
(33, 'Tema.- 8.5: Utilizando funciones nativas con los datos', '', '../videos/Turntable - 10857.mp4', NULL, 8),
(34, 'Tema.- 8.6: Ciclo for para los formularios', '', '../videos/Neon - 21368.mp4', '../archivos/447849032.doc', 8),
(35, 'Tema.- 8.7: Finalizando el curso', '', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 8),
(36, 'Tema.- 8.8: Temas aprendidos en el curso', '', '../videos/Neon - 21368.mp4', '../archivos/447849032.doc\r\n', 8),
(37, 'Tema.- 8.9: Gracias por tomar el curso', 'Muchas gracias por tomar el curso y poder ayudarme a compartir mi conocimiento a todas las personas', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 8),
(38, 'Tema.- 1.1: Que es Java', 'En este video veremos ', '../videos/Neon - 21368.mp4', NULL, 9),
(39, 'Tema.- 1.2: Sintaxis de Java', 'En este video veremos la sintaxis en la cual trabaja java', '../videos/Turntable - 10857.mp4', '../videos/Neon - 21368.mp4', 9),
(40, 'Tema.- 1.3: Que es una variable', 'En este video veremos las distintas variables que hay en java', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 9),
(41, 'Tema.- 1.4: Que es un contador', '', '../videos/Neon - 21368.mp4', '../archivos/37484893.doc', 9),
(42, 'Tema.- 1.5: Que son los valores Booleanos', '', '../videos/Neon - 21368.mp4', '../archivos/447849032.doc', 9),
(43, 'Tema.- 1.6: Que son los valores Booleanos', '', '../videos/Turntable - 10857.mp4', '../archivos/37484893.doc', 9),
(44, 'Tema.- 1.7: Que son los strings', '', '../videos/Neon - 21368.mp4', NULL, 9),
(45, 'Tema.- 1.8: Variables enteras', 'En este video veremos las variables enteras 1.8', '../videos/Turntable - 10857.mp4', '../archivos/37484893.doc', 9),
(46, 'Tema.- 2.1: Como instalar Netbeand', '', '../videos/Neon - 21368.mp4', '../archivos/447849032.doc', 10),
(47, 'Tema.- 2.2: Como instalar Java', '', '../videos/Turntable - 10857.mp4', '../archivos/37484893.doc', 10),
(48, 'Tema.- 3.1: Creando clase en java', '', '../videos/Neon - 21368.mp4', '../archivos/447849032.doc', 11),
(49, 'Tema.- 3.2: Manejando variables', '', '../videos/Turntable - 10857.mp4', NULL, 11),
(50, 'Tema.- 3.3: Creando interfaces', '', '../videos/Neon - 21368.mp4', NULL, 11),
(51, 'Tema.- 3.4: Manejando interfaces', '', '../videos/Turntable - 10857.mp4', '../archivos/37484893.doc', 11),
(52, 'Tema.- 3.5: Haciendo funcionales las clases', 'En este tema veremos como darle funcion  a las clases en java', '../videos/Neon - 21368.mp4', NULL, 11),
(53, 'Tema.- 3.6: Creando los primeros contadores', '', '../videos/Turntable - 10857.mp4', NULL, 11),
(54, 'Tema.- 3.7: Creando los segundos contadores', 'En este video veremos las variables enteras 3.7', '../videos/Neon - 21368.mp4', NULL, 11),
(55, 'Tema.- 3.8: Creando los terceros contadores', 'En este video veremos las variables enteras  3.8', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 11),
(56, 'Tema.- 3.9:Creando los cuartos contadores', 'En este video veremos las variables enteras 3.9', '../videos/Neon - 21368.mp4', NULL, 11),
(57, 'Tema.- 3.10: Creando los quinto contadores', 'En este video veremos las variables enteras 3.10', '../videos/Turntable - 10857.mp4', NULL, 11),
(58, 'Tema.- 4.1: Que son los ciclos for', 'En este video veremos las variables enteras 4.1 ', '../videos/Turntable - 10857.mp4', NULL, 12),
(59, 'Tema.- 4.2: Que son los ciclos while', 'En este video veremos las variables enteras 4.2 ', '../videos/Neon - 21368.mp4', NULL, 12),
(60, 'Tema.- 4.3: Que son los ciclos do while', 'En este video veremos las variables enteras 4.3', '../videos/Neon - 21368.mp4', NULL, 12),
(61, 'Tema.- 4.4: Como funcionan los ciclos', 'En este video veremos las variables enteras 4.4', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 12),
(62, 'Tema.- 4.5: Creando ciclos anidados', 'En este video veremos las variables enteras 4.5', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 12),
(63, 'Tema.- 4.6: Creando ciclos anidados de los anidados', 'En este video veremos las variables enteras 4.6', '../videos/Turntable - 10857.mp4', NULL, 12),
(64, 'Tema.- 5.1: Como crear una clase', 'En este video veremos las variables enteras 5.1', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 13),
(65, 'Tema.- 5.2: Como instanciar la clase', 'En este video veremos las variables enteras 5.2', '../videos/Neon - 21368.mp4', NULL, 13),
(66, 'Tema.- 6.1: Que son los hilos en java', 'En este video veremos las variables enteras 6.1', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 14),
(67, 'Tema.- 6.2: Como funcionan los hilos', 'En este video veremos las variables enteras 6.2', '../videos/Neon - 21368.mp4', NULL, 14),
(68, 'Tema.- 6.3: Como crear hilos en java', 'En este video veremos las variables enteras 6.3', '../videos/Turntable - 10857.mp4', NULL, 14),
(69, 'Tema.- 6.4: Como manipulas los hilos en java', 'En este video veremos las variables enteras 6.4', '../videos/Neon - 21368.mp4', NULL, 14),
(70, 'Tema.- 6.5: Como crear hilos multiples', 'En este video veremos las variables enteras 6.5', '../videos/Turntable - 10857.mp4', NULL, 14),
(71, 'Tema.- 6.6: Como crear hilos multiples', 'En este video veremos las variables enteras 6.6', '../videos/Neon - 21368.mp4', NULL, 14),
(72, 'Tema.- 6.7: Como manipular los hilos multiples', 'En este video veremos las variables enteras 6.7', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 14),
(79, 'Tema.- 7.1: Como instalar xampp', 'En este video veremos las variables enteras ', '../videos/Neon - 21368.mp4', NULL, 15),
(80, 'Tema.- 7.2: Como usar xampp', 'En este video veremos las variables enteras 7.2', '../videos/Neon - 21368.mp4', NULL, 15),
(81, 'Tema.- 7.3: Como Conectar xampp a java', 'En este video veremos las variables enteras 7.3', '../videos/Neon - 21368.mp4', NULL, 15),
(82, 'Tema.- 7.4: Como reguistrar en la base de datos desde java c', 'En este video veremos las variables enteras 7.4', '../videos/Turntable - 10857.mp4', '../archivos/37484893.doc', 15),
(84, 'Tema.- 7.4: Como hacer un CRUD en Java con MySql', 'En este video veremos las variables enteras 7.4', '../videos/Neon - 21368.mp4', '../archivos/37484893.doc', 15),
(85, 'Tema.- 7.5: Como hacer un CRUD en Java con MySql', 'En este video veremos las variables enteras 7.5', '../videos/Turntable - 10857.mp4', NULL, 15),
(86, 'Tema.- 7.5: Como funcionanalas consultas', 'En este video veremos las variables enteras 7.5', '../videos/Neon - 21368.mp4', NULL, 15),
(87, 'Tema.- 7.6: Como funcionanalas consultas 2', 'En este video veremos las variables enteras 7.6', '../videos/Turntable - 10857.mp4', NULL, 15),
(88, 'Tema.- 8.1: Conectando a la base ', 'En este video veremos las variables enteras 8.1', '../videos/Turntable - 10857.mp4', NULL, 16),
(89, 'Tema.- 8.2: Creando consultas crud', 'En este video veremos las variables enteras 8.2 ', '../videos/Neon - 21368.mp4', NULL, 16),
(90, 'Tema.- 8.3: Aplicando consultas', 'En este video veremos las variables enteras 8.3', '../videos/Turntable - 10857.mp4', NULL, 16),
(91, 'Tema.- 8.4: Aplicando ejecutando codigo', 'En este video veremos las variables enteras 8.4', '../videos/Neon - 21368.mp4', NULL, 16),
(92, 'Tema.- 9.1: Creando clases principales', 'En este video veremos las variables enteras 9.1', '../videos/Turntable - 10857.mp4', NULL, 17),
(93, 'Tema.- 9.2: Creando clases principales 2', 'En este video veremos las variables enteras 9.2', '../videos/Neon - 21368.mp4', NULL, 17),
(94, 'Tema.- 9.3: Creando los formularios y registros', 'En este video veremos las variables enteras 9.3', '../videos/Turntable - 10857.mp4', NULL, 17),
(95, 'Tema.- 9.4: Creando los formularios y registros', 'En este video veremos las variables enteras 9.4', '../videos/Neon - 21368.mp4', '../archivos/37484893.doc', 17),
(96, 'Tema.- 9.5: Haciendo funcionales los formularios en java con', 'En este video veremos las variables enteras 9.5', '../videos/Neon - 21368.mp4', NULL, 17),
(97, 'Tema.- 9.6: HCreando tabla de contenido', 'En este video veremos las variables enteras 9.6', '../videos/Turntable - 10857.mp4', NULL, 17),
(98, 'Tema.- 9.7: Creando tabla de contenido Funcional', 'En este video veremos las variables enteras 9.7', '../videos/Turntable - 10857.mp4', NULL, 17),
(99, 'Tema.- 9.8: Creando tabla de contenido Funcional 2', 'En este video veremos las variables enteras 9.8', '../videos/Neon - 21368.mp4', NULL, 17),
(100, 'Tema.- 10.1: Creando proyecto final', 'En este video veremos las variables enteras 10.1', '../videos/Neon - 21368.mp4', NULL, 18),
(101, 'Tema.- 10.2: Creando clases necesarias', 'En este video veremos las variables enteras 10.2', '../videos/Turntable - 10857.mp4', NULL, 18),
(102, 'Tema.- 10.3: Creando clase conexion', 'En este video veremos las variables enteras 10.3', '../videos/Neon - 21368.mp4', NULL, 18),
(103, 'Tema.- 10.4: Creando CRUD en  conexion', 'En este video veremos las variables enteras 10.4', '../videos/Turntable - 10857.mp4', NULL, 18),
(104, 'Tema.- 10.5: Creando funcionalidad el crud', 'En este video veremos las variables enteras 10.5', '../videos/Neon - 21368.mp4', NULL, 18),
(105, 'Tema.- 10.6: Creando las unciones necesarias', 'En este video veremos las variables enteras 10.6', '../videos/Turntable - 10857.mp4', NULL, 18),
(106, 'Tema.- 10.7: Creando instancias de las clases', 'En este video veremos las variables enteras 10.7', '../videos/Neon - 21368.mp4', '../archivos/447849032.doc', 18),
(107, 'Tema.- 10.8: Haciendo los movimientos finales', 'En este video veremos las variables enteras 10.8', '../videos/Turntable - 10857.mp4', NULL, 18),
(108, 'Tema.- 10.9: Finalizando el curso ', 'En este video veremos las variables enteras 10.9', '../videos/Turntable - 10857.mp4', '../archivos/447849032.doc', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_completado`
--

CREATE TABLE `tema_completado` (
  `tema` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `edad` int(11) NOT NULL,
  `escolaridad` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `vkey` varchar(500) NOT NULL,
  `verificado` tinyint(4) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `trabajo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `edad`, `escolaridad`, `imagen`, `telefono`, `email`, `password`, `vkey`, `verificado`, `tipo`, `estado`, `municipio`, `trabajo`) VALUES
(1, 'Esmeralda Aragon', 19, 'Bachillerato', '../img/Users/1579302598.jpg', '2324555322', 'esmeralda_aragon@gmail.com', '$2y$10$uRW34FjxEFK75jvY86pi1OztY4KnMI9bSmg4mfTZw/blmkNZfz7X6', '3fbcd875d46a51066f9a877bb989503c515900598cf12926f7ecd4407b68f586', 1, 'Estudiante', 'México', 'Autlan de navarro', 'Desde mi casa###Gano dinero con aplicaciones'),
(2, 'Aldo Chagollan', 23, 'Universidad ', '../img/Users/1579302598.jpg', '947479532', 'aldo@gmail.com', '$2y$10$BS4EiFUkXdkPBkiK33103O0aEdH3HUuOrFLl9nnUk/Y3W.bn3EQR2', '3fbcd875d46a51066f9a877bb989503c515900598cf12926f7ecd4407b68f586', 1, 'Maestro', '', '', NULL),
(3, 'near', 0, '', '', '3326326966', 'near.22.music@gmail.com', '$2y$10$zDul1l81nosqpugaV1nfVe21urrdOBciwA0BomWWoC58ynbcUNYay', 'b1be1a0a1e38fe2ff02a5a84e69bf69a14d59697c7cd3df44aa5bf45cef04c50', 1, '', '', '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD PRIMARY KEY (`idbloque`,`curso`),
  ADD KEY `fk_bloque_curso_idx` (`curso`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idcalificacion`,`curso`,`usuario`),
  ADD KEY `fk_calificacion_curso_idx` (`curso`),
  ADD KEY `fk_calificacion_usuario_idx` (`usuario`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`,`profesor`),
  ADD KEY `fk_curso_usuario_idx` (`profesor`);

--
-- Indices de la tabla `evaluacion_tarea_completada`
--
ALTER TABLE `evaluacion_tarea_completada`
  ADD PRIMARY KEY (`tarea_completada`,`usuario_evaluador`),
  ADD KEY `fk_tarea_completada_has_usuario_usuario1_idx` (`usuario_evaluador`),
  ADD KEY `fk_tarea_completada_has_usuario_tarea_completada1_idx` (`tarea_completada`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idexamen`,`bloque`),
  ADD KEY `fk_examen_bloque_idx` (`bloque`);

--
-- Indices de la tabla `examen_completado`
--
ALTER TABLE `examen_completado`
  ADD PRIMARY KEY (`examen`,`usuario`),
  ADD KEY `fk_examen_has_usuario_usuario1_idx` (`usuario`),
  ADD KEY `fk_examen_has_usuario_examen1_idx` (`examen`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`alumno`,`curso`),
  ADD KEY `fk_usuario_has_curso_curso1_idx` (`curso`),
  ADD KEY `fk_usuario_has_curso_usuario1_idx` (`alumno`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`,`curso`,`usuario`),
  ADD KEY `fk_curso_pago_idx` (`curso`),
  ADD KEY `fk_usuario_pago_idx` (`usuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idpregunta`,`examen`),
  ADD KEY `fk_pregunta_examen_idx` (`examen`);

--
-- Indices de la tabla `respuesta_usuario`
--
ALTER TABLE `respuesta_usuario`
  ADD PRIMARY KEY (`idpregunta`,`usuario`),
  ADD KEY `fk_pregunta_has_usuario_usuario1_idx` (`usuario`),
  ADD KEY `fk_pregunta_has_usuario_pregunta1_idx` (`idpregunta`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idtarea`,`bloque`),
  ADD KEY `fk_tarea_bloque_idx` (`bloque`);

--
-- Indices de la tabla `tarea_completada`
--
ALTER TABLE `tarea_completada`
  ADD PRIMARY KEY (`id`,`tarea`,`usuario`),
  ADD KEY `fk_tarea_has_usuario_usuario1_idx` (`usuario`),
  ADD KEY `fk_tarea_has_usuario_tarea1_idx` (`tarea`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`idtema`,`bloque`),
  ADD KEY `fk_tema_bloque_idx` (`bloque`);

--
-- Indices de la tabla `tema_completado`
--
ALTER TABLE `tema_completado`
  ADD PRIMARY KEY (`tema`,`usuario`),
  ADD KEY `fk_tema_has_usuario_usuario1_idx` (`usuario`),
  ADD KEY `fk_tema_has_usuario_tema1_idx` (`tema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bloque`
--
ALTER TABLE `bloque`
  MODIFY `idbloque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idcalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idexamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tarea_completada`
--
ALTER TABLE `tarea_completada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `idtema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD CONSTRAINT `fk_bloque_curso` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_curso` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificacion_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_usuario` FOREIGN KEY (`profesor`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacion_tarea_completada`
--
ALTER TABLE `evaluacion_tarea_completada`
  ADD CONSTRAINT `fk_tarea_completada_has_usuario_tarea_completada1` FOREIGN KEY (`tarea_completada`) REFERENCES `tarea_completada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarea_completada_has_usuario_usuario1` FOREIGN KEY (`usuario_evaluador`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `fk_examen_bloque` FOREIGN KEY (`bloque`) REFERENCES `bloque` (`idbloque`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examen_completado`
--
ALTER TABLE `examen_completado`
  ADD CONSTRAINT `fk_examen_has_usuario_examen1` FOREIGN KEY (`examen`) REFERENCES `examen` (`idexamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_examen_has_usuario_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_usuario_has_curso_curso1` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_curso_usuario1` FOREIGN KEY (`alumno`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_curso_pago` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_pago` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_examen` FOREIGN KEY (`examen`) REFERENCES `examen` (`idexamen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta_usuario`
--
ALTER TABLE `respuesta_usuario`
  ADD CONSTRAINT `fk_pregunta_has_usuario_pregunta1` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pregunta_has_usuario_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_bloque` FOREIGN KEY (`bloque`) REFERENCES `bloque` (`idbloque`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarea_completada`
--
ALTER TABLE `tarea_completada`
  ADD CONSTRAINT `fk_tarea_has_usuario_tarea1` FOREIGN KEY (`tarea`) REFERENCES `tarea` (`idtarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarea_has_usuario_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_tema_bloque` FOREIGN KEY (`bloque`) REFERENCES `bloque` (`idbloque`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tema_completado`
--
ALTER TABLE `tema_completado`
  ADD CONSTRAINT `fk_tema_has_usuario_tema1` FOREIGN KEY (`tema`) REFERENCES `tema` (`idtema`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tema_has_usuario_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
