-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2022 a las 08:41:54
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcrud`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`Luis`@`localhost` PROCEDURE `eliminarCliente` (IN `id` INT(5))  BEGIN
	Delete from customer where customer_id = id;

END$$

CREATE DEFINER=`Luis`@`localhost` PROCEDURE `listarCliente` ()  BEGIN
	SELECT c.customer_id, c.first_name, c.last_name, c.email, c.address, ci.city, co.country, c.active, c.create_date, c.last_update 
	FROM customer c inner join city ci ON c.city_id = ci.city_id inner join country co on ci.country_id = co.country_id;
END$$

CREATE DEFINER=`Luis`@`localhost` PROCEDURE `registrarCliente` (IN `first_name` VARCHAR(45), IN `last_name` VARCHAR(45), IN `email` VARCHAR(50), IN `address` VARCHAR(50), IN `city_id` INT(45), IN `active` TINYINT(1))  BEGIN
	insert into customer (first_name, last_name, email, address, city_id, active, create_date)
    values (first_name,last_name,email,address,city_id,active,current_timestamp());
END$$

--
-- Funciones
--
CREATE DEFINER=`Luis`@`localhost` FUNCTION `cantidadClientes` (`nombre` VARCHAR(45)) RETURNS INT(11) BEGIN
	DECLARE cantidad INT;
    SELECT count(*) as Cantidad INTO cantidad FROM customer WHERE first_name LIKE concat('%',nombre,'%');
    RETURN cantidad;
RETURN 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id` int(11) NOT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id`, `accion`, `fecha`) VALUES
(1, 'Se creó un registro en cliente', '2022-07-11 12:52:39'),
(2, 'Se creó un registro en cliente de nombre: lui', '2022-07-11 13:00:33'),
(3, 'Se creó un registro un cliente de nombre: luisy id: 13', '2022-07-11 13:08:33'),
(4, 'Se eliminó el cliente: luisy id: 13', '2022-07-11 13:11:59'),
(5, 'Se creó un registro un cliente de nombre: luisy id: 16', '2022-07-12 00:40:33'),
(6, 'Se creó un registro un cliente de nombre: luisy id: 17', '2022-07-12 00:43:44'),
(7, 'Se eliminó el cliente: luis con id: 16', '2022-07-12 00:43:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `city_id` int(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country_id` int(5) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`city_id`, `city`, `country_id`, `last_update`) VALUES
(1, 'Lima', 1, '2022-07-11 05:51:36'),
(2, 'Callao', 1, '2022-07-12 05:24:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `country_id` int(5) NOT NULL,
  `country` varchar(50) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`country_id`, `country`, `last_update`) VALUES
(1, 'Perú', '2022-07-11 05:50:47'),
(2, 'Brasil', '2022-07-12 05:48:37'),
(3, 'Argentina', '2022-07-12 05:49:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city_id` int(5) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `address`, `city_id`, `active`, `create_date`, `last_update`) VALUES
(1, 'Luis Enrique', 'Allcca Alarcón', 'luisenriqueallcca@gmail.com', 'Av. Micaela Bastidas', 1, 1, NULL, '2022-07-11 05:53:25'),
(2, 'Luis Enriquee', 'Allcca Alarcónn', 'luisenriqueallcca1@gmail.com', 'Av. Micaela Bastidas cmt 13', 1, 1, '2022-07-11 01:48:11', '2022-07-11 17:21:37'),
(10, 'luis', 'alcaa', 'lallccaa@autonoma.edu.pe', 'Av. Micaela', 1, 1, '2022-07-11 12:52:39', '2022-07-12 04:06:23'),
(17, 'luis', 'Allcca Alar', 'ejemplo@gmail.com', 'av. micaela', 2, 0, '2022-07-12 00:43:44', '2022-07-12 05:43:44');

--
-- Disparadores `customer`
--
DELIMITER $$
CREATE TRIGGER `registroClientesEliminados` BEFORE DELETE ON `customer` FOR EACH ROW BEGIN
	INSERT INTO acciones (accion) 
    VALUE (concat('Se eliminó el cliente: ', OLD.first_name, ' con id: ', OLD.customer_id));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `registroClientesNuevos` AFTER INSERT ON `customer` FOR EACH ROW BEGIN
	INSERT INTO acciones (accion) 
    VALUE (concat('Se creó un registro un cliente de nombre: ', NEW.first_name, 'y id: ', NEW. customer_id));
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Filtros para la tabla `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
