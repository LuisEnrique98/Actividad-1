

CREATE TABLE `acciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accion` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO acciones VALUES("1","Se creó un registro en cliente","2022-07-11 12:52:39");
INSERT INTO acciones VALUES("2","Se creó un registro en cliente de nombre: lui","2022-07-11 13:00:33");
INSERT INTO acciones VALUES("3","Se creó un registro un cliente de nombre: luisy id: 13","2022-07-11 13:08:33");
INSERT INTO acciones VALUES("4","Se eliminó el cliente: luisy id: 13","2022-07-11 13:11:59");
INSERT INTO acciones VALUES("5","Se creó un registro un cliente de nombre: luisy id: 16","2022-07-12 00:40:33");
INSERT INTO acciones VALUES("6","Se creó un registro un cliente de nombre: luisy id: 17","2022-07-12 00:43:44");
INSERT INTO acciones VALUES("7","Se eliminó el cliente: luis con id: 16","2022-07-12 00:43:49");





CREATE TABLE `city` (
  `city_id` int(5) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `country_id` int(5) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`city_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO city VALUES("1","Lima","1","2022-07-11 00:51:36");
INSERT INTO city VALUES("2","Callao","1","2022-07-12 00:24:05");





CREATE TABLE `country` (
  `country_id` int(5) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO country VALUES("1","Perú","2022-07-11 00:50:47");
INSERT INTO country VALUES("2","Brasil","2022-07-12 00:48:37");
INSERT INTO country VALUES("3","Argentina","2022-07-12 00:49:57");





CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city_id` int(5) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`customer_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO customer VALUES("1","Luis Enrique","Allcca Alarcón","luisenriqueallcca@gmail.com","Av. Micaela Bastidas","1","1","","2022-07-11 00:53:25");
INSERT INTO customer VALUES("2","Luis Enriquee","Allcca Alarcónn","luisenriqueallcca1@gmail.com","Av. Micaela Bastidas cmt 13","1","1","2022-07-11 01:48:11","2022-07-11 12:21:37");
INSERT INTO customer VALUES("10","luis","alcaa","lallccaa@autonoma.edu.pe","Av. Micaela","1","1","2022-07-11 12:52:39","2022-07-11 23:06:23");
INSERT INTO customer VALUES("17","luis","Allcca Alar","ejemplo@gmail.com","av. micaela","2","0","2022-07-12 00:43:44","2022-07-12 00:43:44");



