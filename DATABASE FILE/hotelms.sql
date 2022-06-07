-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table hotelms.booking
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `customer_id` (`customer_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.booking: ~8 rows (approximately)
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
REPLACE INTO `booking` (`booking_id`, `customer_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `total_price`, `remaining_price`, `payment_status`) VALUES
	(1, 1, 5, '2017-11-13 13:45:17', '13-11-2017', '15-11-2017', 3000, 3000, 0),
	(2, 2, 2, '2017-11-13 13:46:04', '13-11-2017', '16-11-2017', 6000, 0, 1),
	(3, 3, 2, '2017-11-11 14:49:19', '11-11-2017', '14-11-2017', 6000, 3000, 0),
	(4, 4, 7, '2017-11-09 14:50:24', '11-11-2017', '15-11-2017', 10000, 10000, 0),
	(5, 5, 13, '2017-11-17 14:59:10', '17-11-2017', '20-11-2017', 12000, 0, 1),
	(6, 6, 9, '2021-04-08 17:45:56', '08-04-2021', '10-04-2021', 3000, 3000, 0),
	(7, 7, 14, '2021-04-09 01:56:41', '08-04-2021', '10-04-2021', 16500, 11500, 0),
	(8, 8, 22, '2021-04-09 16:32:57', '09-04-2021', '13-04-2021', 34500, 0, 1);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;

-- Dumping structure for table hotelms.complaint
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant_name` varchar(100) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resolve_status` tinyint(1) NOT NULL,
  `resolve_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `budget` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.complaint: ~4 rows (approximately)
/*!40000 ALTER TABLE `complaint` DISABLE KEYS */;
REPLACE INTO `complaint` (`id`, `complainant_name`, `complaint_type`, `complaint`, `created_at`, `resolve_status`, `resolve_date`, `budget`) VALUES
	(1, 'Janice Alexander\n', 'Room Windows', 'Doesnot operate properly', '2020-07-16 14:51:24', 1, '2020-07-17 14:51:58', 3600),
	(2, 'Robert Peter\n', 'Air Conditioner', 'Sensor Problems', '2020-10-01 14:51:44', 1, '2020-10-03 15:06:02', 7950),
	(3, 'Jason J Pirkle\n', 'Bad Smells', 'Some odd smells around room areas', '2018-04-01 15:01:17', 1, '2018-04-01 15:01:52', 500),
	(5, 'Will Williams', 'Faulty Electronics', 'Due to some weird reasons, the electronics are not working as it should; some voltage problems too - M-135', '2021-04-09 16:38:19', 1, '2021-04-09 16:38:39', 2500);
/*!40000 ALTER TABLE `complaint` ENABLE KEYS */;

-- Dumping structure for table hotelms.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_card_type_id` int(10) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `customer_id_type` (`id_card_type_id`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_card_type_id`) REFERENCES `id_card_type` (`id_card_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.customer: ~8 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
REPLACE INTO `customer` (`customer_id`, `customer_name`, `contact_no`, `email`, `id_card_type_id`, `id_card_no`, `address`) VALUES
	(1, 'Billy S. Burke', 7540001240, 'billyb9@gmail.com', 1, '422510099122', '3166 Rockford Road'),
	(2, 'John Mitchell', 2870214970, 'johnm@gmail.com', 2, '422510099122', '1954 Armory Road'),
	(3, 'Beatriz M. Matthews', 1247778460, 'matthews@gmail.com', 1, '422510099122', '4879 Shearwood Forest Drive'),
	(4, 'Kevin Johnson', 1478546500, 'kevin@gmail.com', 3, '0', '926 Richland Avenue\n'),
	(5, 'Dwayne Scott', 2671249780, 'scottdway@gmail.com', 1, '422510099122', '4698 Columbia Road\n'),
	(6, 'Bruno Denn', 1245554780, 'denbru@gmail.com', 4, 'AASS 12454784541', '4764 Warner Street\n'),
	(7, 'Ric Austin', 2450006974, 'austinric@gmail.com', 1, '457896000002', '1680  Brownton Road'),
	(8, 'Andrew Stuartt', 2457778450, 'andrew@gmail.com', 1, '147000245810', '766  Lodgeville Road');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table hotelms.emp_history
CREATE TABLE IF NOT EXISTS `emp_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  KEY `shift_id` (`shift_id`),
  CONSTRAINT `emp_history_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `staff` (`emp_id`),
  CONSTRAINT `emp_history_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.emp_history: ~21 rows (approximately)
/*!40000 ALTER TABLE `emp_history` DISABLE KEYS */;
REPLACE INTO `emp_history` (`id`, `emp_id`, `shift_id`, `from_date`, `to_date`, `created_at`) VALUES
	(1, 1, 1, '2017-11-13 13:39:06', '2017-11-15 10:22:26', '2017-11-13 13:39:06'),
	(2, 2, 3, '2017-11-13 13:39:39', '2017-11-15 10:22:43', '2017-11-13 13:39:39'),
	(3, 3, 1, '2017-11-13 13:40:18', '2017-11-15 10:22:49', '2017-11-13 13:40:18'),
	(4, 4, 1, '2017-11-13 13:40:56', '2017-11-15 10:22:35', '2017-11-13 13:40:56'),
	(5, 5, 1, '2017-11-13 13:41:31', NULL, '2017-11-13 13:41:31'),
	(6, 6, 3, '2017-11-13 13:42:03', NULL, '2017-11-13 13:42:03'),
	(7, 7, 4, '2017-11-13 13:42:35', '2017-11-18 10:35:02', '2017-11-13 13:42:35'),
	(8, 8, 3, '2017-11-13 13:43:13', '2017-11-18 10:32:26', '2017-11-13 13:43:13'),
	(9, 9, 2, '2017-11-13 13:43:49', NULL, '2017-11-13 13:43:49'),
	(10, 10, 1, '2017-11-13 14:30:45', '2017-11-18 10:34:28', '2017-11-13 14:30:45'),
	(11, 1, 2, '2017-11-15 14:52:26', '2017-11-17 10:23:05', '2017-11-15 14:52:26'),
	(12, 4, 3, '2017-11-15 14:52:35', NULL, '2017-11-15 14:52:35'),
	(13, 2, 3, '2017-11-15 14:52:43', NULL, '2017-11-15 14:52:43'),
	(14, 3, 3, '2017-11-15 14:52:49', NULL, '2017-11-15 14:52:49'),
	(15, 1, 3, '2017-11-17 14:53:05', NULL, '2017-11-17 14:53:05'),
	(16, 8, 1, '2017-11-18 15:02:26', NULL, '2017-11-18 15:02:26'),
	(17, 11, 2, '2017-11-18 15:04:03', NULL, '2017-11-18 15:04:03'),
	(18, 10, 2, '2017-11-18 15:04:28', NULL, '2017-11-18 15:04:28'),
	(19, 7, 2, '2017-11-18 15:05:02', NULL, '2017-11-18 15:05:02'),
	(20, 12, 1, '2021-04-09 01:54:22', NULL, '2021-04-09 01:54:22'),
	(21, 13, 2, '2021-04-09 16:35:27', NULL, '2021-04-09 16:35:27'),
	(22, 14, 1, '2022-02-18 10:43:18', NULL, '2022-02-18 10:43:18');
/*!40000 ALTER TABLE `emp_history` ENABLE KEYS */;

-- Dumping structure for table hotelms.id_card_type
CREATE TABLE IF NOT EXISTS `id_card_type` (
  `id_card_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `id_card_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id_card_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.id_card_type: ~4 rows (approximately)
/*!40000 ALTER TABLE `id_card_type` DISABLE KEYS */;
REPLACE INTO `id_card_type` (`id_card_type_id`, `id_card_type`) VALUES
	(1, 'National Identity Card'),
	(2, 'Voter Id Card'),
	(3, 'Pan Card'),
	(4, 'Driving License');
/*!40000 ALTER TABLE `id_card_type` ENABLE KEYS */;

-- Dumping structure for table hotelms.room
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`room_id`),
  KEY `room_type_id` (`room_type_id`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.room: ~26 rows (approximately)
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
REPLACE INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`, `deleteStatus`) VALUES
	(1, 2, 'A-101', NULL, 0, 0, 1),
	(2, 2, 'A-102', 1, 1, 1, 0),
	(3, 3, 'A-103', NULL, 0, 0, 0),
	(4, 4, 'A-104', NULL, 0, 0, 0),
	(5, 1, 'B-101', 1, 0, 0, 0),
	(6, 2, 'B-102', NULL, 0, 0, 1),
	(7, 3, 'B-103', 1, 0, 0, 0),
	(8, 4, 'B-104', NULL, 0, 0, 1),
	(9, 1, 'C-101', 1, 0, 0, 0),
	(10, 2, 'C-102', NULL, 0, 0, 0),
	(11, 3, 'C-103', NULL, 0, 0, 1),
	(12, 4, 'C-104', NULL, 0, 0, 0),
	(13, 4, 'D-101', NULL, 0, 1, 1),
	(14, 5, 'K-699', 1, 1, 0, 0),
	(15, 5, 'K-799', NULL, 0, 0, 0),
	(16, 5, 'K-899', NULL, 0, 0, 0),
	(17, 6, 'M-333', NULL, 0, 0, 0),
	(18, 6, 'M-444', NULL, 0, 0, 0),
	(19, 6, 'M-555', NULL, 0, 0, 0),
	(20, 9, 'P-696', NULL, 0, 0, 0),
	(21, 10, 'M-966', NULL, 0, 0, 0),
	(22, 10, 'M-869', NULL, 0, 1, 0),
	(23, 8, 'Z-666', NULL, 0, 0, 0),
	(24, 7, 'X-969', NULL, 0, 0, 0),
	(25, 8, 'Z-111', NULL, 0, 0, 0),
	(26, 6, 'M-135', NULL, 0, 0, 0);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;

-- Dumping structure for table hotelms.room_type
CREATE TABLE IF NOT EXISTS `room_type` (
  `room_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.room_type: ~10 rows (approximately)
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
REPLACE INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`) VALUES
	(1, 'Single', 1000, 1),
	(2, 'Double', 1500, 2),
	(3, 'Triple', 2000, 3),
	(4, 'Family', 3000, 2),
	(5, 'King Sized', 5500, 4),
	(6, 'Master Suite', 6500, 6),
	(7, 'Mini-Suite', 3600, 3),
	(8, 'Connecting Rooms', 8000, 6),
	(9, 'Presidential Suite', 21000, 4),
	(10, 'Murphy Room', 6900, 3);
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;

-- Dumping structure for table hotelms.shift
CREATE TABLE IF NOT EXISTS `shift` (
  `shift_id` int(10) NOT NULL AUTO_INCREMENT,
  `shift` varchar(100) NOT NULL,
  `shift_timing` varchar(100) NOT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.shift: ~4 rows (approximately)
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
REPLACE INTO `shift` (`shift_id`, `shift`, `shift_timing`) VALUES
	(1, 'Morning', '5:00 AM - 10:00 AM'),
	(2, 'Day', '10:00 AM - 4:00PM'),
	(3, 'Evening', '4:00 PM - 10:00 PM'),
	(4, 'Night', '10:00PM - 5:00AM');
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;

-- Dumping structure for table hotelms.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(100) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `id_card_type` int(11) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_id`),
  KEY `id_card_type` (`id_card_type`),
  KEY `shift_id` (`shift_id`),
  KEY `staff_type_id` (`staff_type_id`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_card_type`) REFERENCES `id_card_type` (`id_card_type_id`),
  CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`),
  CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.staff: ~13 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
REPLACE INTO `staff` (`emp_id`, `emp_name`, `staff_type_id`, `shift_id`, `id_card_type`, `id_card_no`, `address`, `contact_no`, `salary`, `joining_date`, `updated_at`) VALUES
	(1, 'Joseph Bow', 1, 3, 1, '422510099122', '4516 Spruce Drive\n', 3479454777, 21000, '2020-11-13 13:39:06', '2021-04-09 01:36:16'),
	(2, 'Cleta Landon', 3, 3, 1, '422510099122', '2555 Hillside Drive', 1479994500, 12500, '2021-04-08 04:21:00', '2021-04-09 01:36:23'),
	(3, 'Gerald White', 2, 3, 1, '422510099122', 'Ap #897-1459 Quam Avenue', 976543111, 25000, '2019-11-13 13:40:18', '2021-04-09 01:36:27'),
	(4, 'Frank J. Welch', 2, 3, 2, '0', '2272 Sun Valley Road\n', 7451112450, 31000, '2017-11-13 13:40:55', '2021-04-09 01:36:33'),
	(5, 'Gary Johnson', 4, 1, 1, '12345341212', '458 Chandler Drive\n', 4578884500, 28000, '2018-11-13 13:41:31', '2021-04-09 01:36:42'),
	(6, 'Miguel M. Miller', 3, 3, 3, '0', 'Ap #897-1459 Quam Avenue', 8520000000, 40000, '2017-11-13 13:42:03', '2021-04-09 01:36:47'),
	(7, 'Clement L. Brainerd\n', 2, 2, 1, '422510099122', '4381 Gateway Road\n', 4547778450, 40000, '2017-11-13 13:42:35', '2021-04-09 01:36:51'),
	(8, 'Randall Leclair', 1, 1, 4, '0', '1724 Round Table Drive\n', 1457845554, 15000, '2020-11-13 13:43:13', '2021-04-09 01:36:56'),
	(9, 'Fredrick A. Wile', 3, 2, 4, '0', '3431 Joyce Street\n', 7145554500, 20000, '2020-11-13 13:43:49', '2021-04-09 01:36:59'),
	(10, 'Brent Tatro', 5, 2, 1, '422510099122', '1616 Coventry Court\n', 3475468569, 24000, '2019-11-13 14:30:45', '2021-04-09 01:37:07'),
	(11, 'Charles Miller', 3, 2, 1, '0', '382 Byers Lane\n', 7869696969, 20000, '2019-11-18 15:04:03', '2021-04-09 01:37:10'),
	(12, 'John Doe', 2, 1, 4, 'AD69 14579500002', '3714  Duffy Street', 1475550036, 13500, '2021-04-09 01:54:22', '2021-04-09 01:54:22'),
	(13, 'Brent Dixon', 9, 2, 1, '457854555012', '1821 Harry Place', 7457778560, 65500, '2021-04-09 16:35:27', '2021-04-09 16:35:27'),
	(14, 'ted eno', 5, 1, 1, '18729812938129836', 'isabela neg, occ', 9071131291, 500, '2022-02-18 10:43:18', '2022-02-18 10:43:18');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table hotelms.staff_type
CREATE TABLE IF NOT EXISTS `staff_type` (
  `staff_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff_type` varchar(100) NOT NULL,
  PRIMARY KEY (`staff_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.staff_type: ~9 rows (approximately)
/*!40000 ALTER TABLE `staff_type` DISABLE KEYS */;
REPLACE INTO `staff_type` (`staff_type_id`, `staff_type`) VALUES
	(1, 'Manager'),
	(2, 'Housekeeping Manager'),
	(3, 'Front Desk Receptionist'),
	(4, 'Cheif'),
	(5, 'Waiter'),
	(6, 'Room Attendant'),
	(7, 'Concierge'),
	(8, 'Hotel Maintenance Engineer'),
	(9, 'Hotel Sales Manager');
/*!40000 ALTER TABLE `staff_type` ENABLE KEYS */;

-- Dumping structure for table hotelms.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table hotelms.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `name`, `username`, `email`, `password`, `created_at`) VALUES
	(4, 'ted', '@tedted', 'ted@tedgmail', '36d0bb75f176cf0fa2d35ab701099618', '2022-02-18 10:40:13'),
	(6, 'iamadmin', 'admin', '@admin', '21232f297a57a5a743894a0e4a801fc3', '2022-02-18 10:54:24');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
