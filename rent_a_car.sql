-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия на сървъра:            10.1.31-MariaDB - mariadb.org binary distribution
-- ОС на сървъра:                Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for rent_car
CREATE DATABASE IF NOT EXISTS `rent_car` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rent_car`;

-- Дъмп структура за таблица rent_car.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) CHARACTER SET utf8 NOT NULL,
  `model` varchar(50) CHARACTER SET utf8 NOT NULL,
  `horse_power` int(4) NOT NULL,
  `color` varchar(50) CHARACTER SET utf8 NOT NULL,
  `registration_number` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица rent_car.cars: ~3 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
REPLACE INTO `cars` (`id_car`, `brand`, `model`, `horse_power`, `color`, `registration_number`) VALUES
	(1, 'BMW', 'E46', 75, 'withe', 'C8080AB'),
	(2, 'Opel', 'Zafira\r\n', 100, 'Black', 'B4063AT'),
	(3, 'FIAT', 'PUNTO', 125, 'Black', 'H4990BT');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Дъмп структура за таблица rent_car.costumers
CREATE TABLE IF NOT EXISTS `costumers` (
  `id_costumer` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `age` int(3) NOT NULL,
  `driving_license` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile_number` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_costumer`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица rent_car.costumers: ~3 rows (approximately)
/*!40000 ALTER TABLE `costumers` DISABLE KEYS */;
REPLACE INTO `costumers` (`id_costumer`, `first_name`, `last_name`, `age`, `driving_license`, `mobile_number`) VALUES
	(1, 'Hristo', 'Vasilew', 23, 'B', '0888555666'),
	(2, 'Valeri', 'Petrov', 30, 'B,C', '0888555444'),
	(3, 'Petar', 'Петров', 40, 'B,M,A', '0888888888');
/*!40000 ALTER TABLE `costumers` ENABLE KEYS */;

-- Дъмп структура за таблица rent_car.reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `get_date` date NOT NULL,
  `return_date` date NOT NULL,
  `costumer_ID` int(11),
  `car_ID` int(11),
  PRIMARY KEY (`id_reservation`),
  KEY `FK_reservation_costumers` (`costumer_ID`),
  KEY `FK_reservation_cars` (`car_ID`),
  CONSTRAINT `FK_reservation_cars` FOREIGN KEY (`car_ID`) REFERENCES `cars` (`id_car`),
  CONSTRAINT `FK_reservation_costumers` FOREIGN KEY (`costumer_ID`) REFERENCES `costumers` (`id_costumer`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица rent_car.reservation: ~7 rows (approximately)
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
REPLACE INTO `reservation` (`id_reservation`, `get_date`, `return_date`, `costumer_ID`, `car_ID`) VALUES
	(3, '2018-10-03', '2018-10-05', 2, 2),
	(4, '2018-10-22', '2018-10-31', 1, 1),
	(6, '2018-11-04', '2018-11-05', 3, 3),
	(7, '2018-11-01', '2018-11-03', 2, 3),
	(8, '2018-11-04', '2018-11-06', 2, 2),
	(11, '2018-12-01', '2018-12-04', 3, 1);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
