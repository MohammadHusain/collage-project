-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 06:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`) VALUES
(1, 'MohammadHusain', 'adminMH'),
(2, 'SadikAli', 'adminSA');

-- --------------------------------------------------------

--
-- Table structure for table `cars_list`
--

CREATE TABLE `cars_list` (
  `car_id` int(3) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_number` varchar(20) NOT NULL,
  `condition` varchar(500) NOT NULL,
  `car_image` varchar(50) NOT NULL,
  `car_price` int(7) NOT NULL,
  `car_city` varchar(20) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_number` varchar(12) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars_list`
--

INSERT INTO `cars_list` (`car_id`, `car_name`, `car_number`, `condition`, `car_image`, `car_price`, `car_city`, `owner_name`, `owner_number`, `status`) VALUES
(2, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Ahmedabad ', 'Rakesh Prajapati ', '9872563210', 'Available'),
(3, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Delhi ', 'Rakesh Prajapati ', '8947483647', 'Available'),
(5, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Pune ', 'Rakesh Prajapati ', '2147483647', 'Available'),
(6, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Surat ', 'Rakesh Prajapati ', '2147483647', 'Available'),
(7, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Hyderabad ', 'Rakesh Prajapati ', '2147483647', 'Available'),
(8, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Chennai ', 'Rakesh Prajapati ', '2147483647', 'Available'),
(9, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Kolkata ', 'Rakesh Prajapati ', '2147483647', 'Available'),
(10, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Jaipur ', 'Rakesh Prajapati ', '2147483647', 'Available'),
(11, 'Audi 3000 msi', 'GJ 01 AF 5233', 'Fuel efficient and comfortable in driving.', 'audi.jpg', 10000, 'Bangaluru ', 'Rakesh Prajapati ', '2147483647', 'Available'),
(12, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Delhi ', 'Irfan Khan ', '2147483647', 'Available'),
(13, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Mumbai ', 'Irfan Khan ', '2147483647', 'Available'),
(14, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Pune ', 'Irfan Khan ', '2147483647', 'Available'),
(15, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Ahmedabad ', 'Irfan Khan ', '2147483647', 'Available'),
(16, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Surat ', 'Irfan Khan ', '2147483647', 'Available'),
(17, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Hyderabad ', 'Irfan Khan ', '2147483647', 'Available'),
(18, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Chennai ', 'Irfan Khan ', '2147483647', 'Available'),
(19, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Kolkata ', 'Irfan Khan ', '2147483647', 'Available'),
(20, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Jaipur ', 'Irfan Khan ', '2147483647', 'Available'),
(21, 'Hundai Creta', 'MH 05 JF 5031', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'creta.jpg', 7000, 'Bangaluru ', 'Irfan Khan ', '2147483647', 'Available'),
(22, 'Toyota Fortuner', 'DL 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Delhi ', 'Yash Patel ', '2147483647', 'Available'),
(23, 'Toyota Fortuner', 'MH 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Mumbai ', 'Yash Patel ', '2147483647', 'Available'),
(24, 'Toyota Fortuner', 'MH 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Pune ', 'Yash Patel ', '2147483647', 'Available'),
(25, 'Toyota Fortuner', 'GJ 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Ahmedabad ', 'Yash Patel ', '2147483647', 'Available'),
(26, 'Toyota Fortuner', 'GJ 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Surat ', 'Yash Patel ', '2147483647', 'Available'),
(27, 'Toyota Fortuner', 'TS 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Hyderabad ', 'Yash Patel ', '2147483647', 'Available'),
(28, 'Toyota Fortuner', 'TN 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Chennai ', 'Yash Patel ', '2147483647', 'Available'),
(29, 'Toyota Fortuner', 'WB 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Kolkata ', 'Yash Patel ', '2147483647', 'Available'),
(30, 'Toyota Fortuner', 'RJ 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Jaipur ', 'Yash Patel ', '2147483647', 'Available'),
(31, 'Toyota Fortuner', 'KA 01 AF 5233', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'fortuner.jpg', 8500, 'Bangaluru ', 'Yash Patel ', '2147483647', 'Available'),
(32, 'Tata Harrier (orange)', 'DL 01 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Delhi', 'Karan Kapaia', '9857445685', 'Available'),
(33, 'Tata Harrier (orange)', 'MH 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Mumbai', 'Karan Kapadia', '9857445685', 'Available'),
(34, 'Tata Harrier (orange)', 'MH 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Pune ', 'Karan Kapadia ', '9857445685', 'Available'),
(35, 'Tata Harrier (orange)', 'GJ 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Ahmedabad ', 'Karan Kapadia ', '9857445685', 'Available'),
(36, 'Tata Harrier (orange)', 'GJ 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Surat ', 'Karan Kapadia ', '9857445685', 'Available'),
(37, 'Tata Harrier (orange)', 'TS 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Hyderabad ', 'Karan Kapadia ', '9857445685', 'Available'),
(38, 'Tata Harrier (orange)', 'TN 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Chennai ', 'Karan Kapadia ', '9857445685', 'Available'),
(39, 'Tata Harrier (orange)', 'WB 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Kolkata ', 'Karan Kapadia ', '9857445685', 'Available'),
(40, 'Tata Harrier (orange)', 'RJ 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Jaipur ', 'Karan Kapadia ', '9857445685', 'Available'),
(41, 'Tata Harrier (orange)', 'KA 05 JK 4033', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'harrier_orange.jpg', 8500, 'Bangaluru ', 'Karan Kapadia ', '9857445685', 'Available'),
(42, 'Hyudai Verna', 'TS 01 HJ 4984', 'Fuel efficient and comfortable in driving.', 'verna.jpg', 5600, 'Hyderabad ', 'Kanu Bhai Agarwal ', '8965123456', 'Available'),
(43, 'Hyudai Verna', 'TN 01 AN 4561', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'verna.jpg', 5600, 'Chennai ', 'Aadinath Khatri ', '7456894532', 'Available'),
(44, 'Hyudai Verna', 'WB 01 VN 7898', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'verna.jpg', 5600, 'Kolkata ', 'Akash Patel ', '6312395864', 'Available'),
(45, 'Hyudai Verna', 'RJ 01 AF 6236', 'Fuel efficient and comfortable in driving.', 'verna.jpg', 5600, 'Jaipur ', 'Kanu Bhai Agarwal ', '9568451230', 'Available'),
(46, 'Hyudai Verna', 'KA 01 FH 7569', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.\r\n', 'verna.jpg', 5600, 'Bangaluru ', 'Kanu Bhai Agarwal ', '8965123456', 'Available'),
(47, 'Hyudai Verna', 'DL 03 JK 8907', '\r\nCar has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'verna.jpg', 5600, 'Delhi ', 'Kanu Bhai Agarwal ', '8965123456', 'Available'),
(48, 'Hyudai Verna', 'MH 05 KL 7894', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.\r\n', 'verna.jpg', 5600, 'Mumbai ', 'Kanu Bhai Agarwal ', '7894566236', 'Available'),
(49, 'Hyudai Verna', 'MH 06 7865', 'Fuel efficient and comfortable in driving.', 'verna.jpg', 5600, 'Pune ', 'Kanu Bhai Agarwal ', '6887123954', 'Available'),
(50, 'Hyudai Verna', 'GJ 01 AM 2569', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'verna.jpg', 5600, 'Ahmedabad ', 'Kanu Bhai Agarwal ', '9874563210', 'Available'),
(51, 'BMW X4 M401', 'TS 06 UV 8456', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'bmw_x4.jpg', 10650, 'Hyderabad ', 'Akash Patel ', '8564569871', 'Promoted'),
(52, 'BMW X4 M401', 'TN 02 HG 6780', '\r\nCar has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'bmw_x4.jpg', 10650, 'Chennai ', 'Akash Patel ', '8965123456', 'Available'),
(53, 'BMW X4 M401', 'WB 07 DF 0235', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.\r\n', 'bmw_x4.jpg', 10650, 'Kolkata ', 'Akash Patel ', '8236597802', 'Available'),
(54, 'BMW X4 M401', 'RJ 08 GY 1535', 'Fuel efficient and comfortable in driving.', 'bmw_x4.jpg', 10650, 'Jaipur ', 'Akash Patel ', '8965123456', 'Available'),
(55, 'BMW X4 M401', 'KA 06 VF 4567', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'bmw_x4.jpg', 10650, 'Bangaluru ', 'Akash Patel ', '8455698745', 'Available'),
(56, 'BMW X4 M401', 'DL 04 SM 9023', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'bmw_x4.jpg', 10650, 'Delhi ', 'Akash Patel ', '6549871320', 'Available'),
(57, 'BMW X4 M401', 'MH 05 KA 7894', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'bmw_x4.jpg', 10650, 'Mumbai ', 'Akash Patel ', '7895203621', 'Available'),
(58, 'BMW X4 M401', 'MH 09 IK 8463', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'bmw_x4.jpg', 10650, 'Pune ', 'Akash Patel ', '7894565264', 'Available'),
(59, 'BMW X4 M401', 'GJ 01 LM 7489', 'Fuel efficient and comfortable in driving.', 'bmw_x4.jpg', 10650, 'Ahmedabad ', 'Akash Patel ', '9846702315', 'Available'),
(60, 'BMW M3 ', 'TS 03 RG 0987', 'Fuel efficient and comfortable in driving.', 'bmw_m3.jpg', 9900, 'Hyderabad ', 'Avilash Babu ', '7854652145', 'Available'),
(61, 'BMW M3 ', 'TN 09 YT 1245', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'bmw_m3.jpg', 9900, 'Chennai ', 'Avilash Babu ', '8456321023', 'Available'),
(62, 'BMW M3 ', 'WB 06 DT 0987', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'bmw_m3.jpg', 9900, 'Kolkata ', 'Avilash Babu ', '9874563215', 'Available'),
(63, 'BMW M3 ', 'RJ 05 FJ 0987', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'bmw_m3.jpg', 9900, 'Jaipur ', 'Avilash Babu ', '6857895981', 'Available'),
(64, 'BMW M3 ', 'KA 09 WK 0896', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'bmw_m3.jpg', 9900, 'Bangaluru ', 'Avilash Babu ', '7895623561', 'Available'),
(65, 'BMW M3 ', 'DL 02 HI 0921', 'Fuel efficient and comfortable in driving.', 'bmw_m3.jpg', 9900, 'Delhi ', 'Avilash Babu ', '6985469874', 'Available'),
(66, 'BMW M3 ', 'MH 07 AD 3457', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'bmw_m3.jpg', 9900, 'Mumbai ', 'Avilash Babu ', '8789845621', 'Available'),
(67, 'BMW M3 ', 'MH 08 RD 4569', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'bmw_m3.jpg', 9900, 'Pune ', 'Avilash Babu ', '9874561235', 'Available'),
(68, 'BMW M3 ', 'GJ 09 FV 0987', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'bmw_m3.jpg', 9900, 'Ahmedabad ', 'Avilash Babu ', '8796512304', 'Available'),
(69, 'Mercedes AMG E53', 'TS 07 TR 0866', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'mercedes-amg-e53.jpg', 11500, 'Hyderabad ', 'Kabir Malhotra  ', '7846523651', 'Available'),
(70, 'Mercedes AMG E53', 'TN 07 GL 3679', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'mercedes-amg-e53.jpg', 11500, 'Chennai ', 'Kabir Malhotra  ', '6894561568', 'Available'),
(71, 'Mercedes AMG E53', 'WB 09 TR 9067', 'Fuel efficient and comfortable in driving.', 'mercedes-amg-e53.jpg', 11500, 'Kolkata ', 'Kabir Malhotra  ', '7896543210', 'Available'),
(72, 'Mercedes AMG E53', 'RJ 08 GD 7896', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'mercedes-amg-e53.jpg', 11500, 'Jaipur ', 'Kabir Malhotra  ', '9874856321', 'Available'),
(73, 'Mercedes AMG E53', 'KA 04 JK 8906', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'mercedes-amg-e53.jpg', 11500, 'Bangaluru ', 'Kabir Malhotra  ', '7484561329', 'Available'),
(74, 'Mercedes AMG E53', 'DL 05 JS 6870', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'mercedes-amg-e53.jpg', 11500, 'Delhi ', 'Kabir Malhotra  ', '8456123594', 'Available'),
(75, 'Mercedes AMG E53', 'MH 06 KJ 8097', 'Fuel efficient and comfortable in driving.', 'mercedes-amg-e53.jpg', 11500, 'Mumbai ', 'Kabir Malhotra  ', '8456745623', 'Available'),
(76, 'Mercedes AMG E53', 'MH 08 IQ 9087', ' Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records', 'mercedes-amg-e53.jpg', 11500, 'Pune ', 'Kabir Malhotra  ', '6589485692', 'Available'),
(77, 'Mercedes AMG E53', 'GJ 01 AF 8794', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'mercedes-amg-e53.jpg', 11500, 'Ahmedabad ', 'Kabir Malhotra  ', '7896541230', 'Available'),
(78, 'Mercedes AMG C43', 'TS 05 NM 3784', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'mercedes-amg_c43.jpg', 10500, 'Hyderabad ', 'Akhilesh Yadav ', '7896543256', 'Available'),
(79, 'Mercedes AMG C43', 'TN 04 DF 7890', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'mercedes-amg_c43.jpg', 10500, 'Chennai ', 'Akhilesh Yadav ', '7896541230', 'Available'),
(80, 'Mercedes AMG C43', 'WB 03 KH 8097', 'Car has major but repairable mechanical or cosmetic issues and may need significant reconditioning to be resold. No title, history or odometer issues.', 'mercedes-amg_c43.jpg', 10500, 'Kolkata ', 'Akhilesh Yadav ', '7894562301', 'Available'),
(81, 'Mercedes AMG C43', 'RJ 08 HK 0865', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'mercedes-amg_c43.jpg', 10500, 'Jaipur ', 'Akhilesh Yadav ', '786512984', 'Available'),
(82, 'Mercedes AMG C43', 'KA 03 HF 0886', 'Fuel efficient and comfortable in driving.', 'mercedes-amg_c43.jpg', 10500, 'Bangaluru ', 'Akhilesh Yadav ', '8456123056', 'Available'),
(83, 'Mercedes AMG C43', 'DL 05 FD 2489', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'mercedes-amg_c43.jpg', 10500, 'Delhi ', 'Akhilesh Yadav ', '7894561230', 'Available'),
(84, 'Mercedes AMG C43', 'MH 03 KL 0387', 'Car is like new. It needs no reconditioning to be resold. It has no mechanical issues, cosmetic repairs, bad history, and no title or odometer issues. Ride comes with all original equipment, all keys, books and manuals and as all services records.', 'mercedes-amg_c43.jpg', 10500, 'Mumbai ', 'Akhilesh Yadav ', '7985896541', 'Available'),
(85, 'Mercedes AMG C43', 'MH 05 ZV 7895', 'Fuel efficient and comfortable in driving.', 'mercedes-amg_c43.jpg', 10500, 'Pune ', 'Akhilesh Yadav ', '6547842561', 'Available'),
(86, 'Mercedes AMG C43', 'GJ 01 AK 7894', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'mercedes-amg_c43.jpg', 10500, 'Ahmedabad ', 'Akhilesh Yadav ', '7456894532', 'Promoted'),
(87, 'Honda Civic', 'TS 03 JN 1564', 'Car has normal signs of wear and tear and needs minor reconditioning to be resold. It may have so minor dent, dings or scrathes and may need some maintainance, but does not require major mechanical or cosmetic repair.', 'honda_civic_yellow.jpg', 6500, 'Hyderabad ', 'Umesh Mehta ', '7894561562', 'Promoted');

-- --------------------------------------------------------

--
-- Table structure for table `car_addtolist`
--

CREATE TABLE `car_addtolist` (
  `car_addToList_ID` int(4) NOT NULL,
  `userId` int(4) NOT NULL,
  `car_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `car_transaction`
--

CREATE TABLE `car_transaction` (
  `id` int(4) NOT NULL,
  `Customer_name` varchar(30) NOT NULL,
  `Pick_up_location` varchar(50) NOT NULL,
  `Contact_number` int(10) NOT NULL,
  `Date_start` varchar(15) NOT NULL,
  `No_of_Day` int(2) NOT NULL,
  `Date_end` varchar(15) NOT NULL,
  `car_id` int(4) NOT NULL,
  `Card_number` varchar(16) NOT NULL,
  `Trasaction_time` int(10) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movies_list`
--

CREATE TABLE `movies_list` (
  `m_id` int(4) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `rating` float(2,1) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL,
  `description` varchar(700) NOT NULL,
  `Language` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `movie_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies_list`
--

INSERT INTO `movies_list` (`m_id`, `movie_name`, `rating`, `cast`, `type`, `director`, `description`, `Language`, `image`, `movie_status`) VALUES
(1, 'Saaho (2019)', 1.0, 'Prabhas, Shraddha kapoor, Jackie Shroff', 'Drama', 'Sujeeth', 'Amidst a power struggle between higher authorities, unrelated episodes occur in parts of the world that are entwined in an unforeseen revelation of convoluted manipulations. Saaho challenges the perceptions of the audience as to who is the hunter and who is being hunted.', 'Hindi', 'saaho.jpg', ''),
(6, 'Mission Mangal', 6.1, 'Akshay Kumar, Vidya Balan, Taapsee Pannu, Sonakshi Sinha', 'Drama, History', 'Jagan Shakti', 'Inspired by true events that led up to ISRO`s Mars Orbiter Mission (Mangalyaan), the film tells the story of a group of scientists who overcame their professional and personal tribulations to mastermind the greatest accomplishment in Indian space history. ', 'Hindi', 'mission-mangal.jpg', ''),
(7, 'Batla House', 7.8, 'John Abharam , Mrunal Thakur', 'Drama, Historical, Thriller', 'Nikkhil Advani', 'Based on the 2008 Delhi Batla House case, the crime thriller Batla House chronicles the police encounter and investigation of the case.', 'Hindi', 'batla-house.jpg', 'Trending'),
(11, 'Super 30 (2019)', 8.5, 'Hrithik Roshan, Mrunal Thakur, Pankaj Tripathi', 'Biography, Drama', 'Vikas Bahi', 'Anand Kumar, a Mathematics genius from a modest family in Bihar who is made to believe that only a King s son can become a king is on a mission to prove that even the poor man can create some of the world s most genius minds. ', 'Hindi', 'super-30.jpg', 'Trending'),
(17, 'Fast & Furious: Hobbs & Shaw', 6.8, 'Dwayen Jonson, Jason', 'Action, Adventure', 'David Leitch', 'When a cyber-genetically enhanced terrorist comes dangerously close to weaponising a deadly virus, arch-rivals Luke Hobbs and Deckard Shaw are left with no choice but to team up against the imminent threat.', 'English, Hindi', 'hobbs-and-shaw.jpg', 'Trending'),
(20, 'Tanhaji: The Unsung Warrior', 9.0, 'Ajay Devgon, Kajol , Saif Ali Khan', 'Action,Drama, Historical', 'Om Raut', 'Tanhaji Malusare was an unsung warrior from the 17th century. His acts of valour and bravery continued to inspire soldiers long after he lost his life in battle.', 'Hindi', 'taanaji.jpg', ''),
(21, 'Angrezi Medium', 6.3, 'Irfan Khan, Karina Kapoor, Radhika madan', 'Comedy , Drama', 'Irrfan Khan', 'Following her school graduation, Tarika decides she wants to go to London to study further much to the chagrin of her father, Champak, who can`t afford the college fees. Determined to make his daughter`s dreams come true, Champak does everything he can to land her a seat in a London university.', 'Himdi', 'angrezi-medium.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `movies_reviews`
--

CREATE TABLE `movies_reviews` (
  `id` int(4) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `m_id` int(4) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies_reviews`
--

INSERT INTO `movies_reviews` (`id`, `user_name`, `m_id`, `review`) VALUES
(51, 'Mohammad Husain', 6, 'best motivational movie for me. I love ISRO nice work done by Akshay Kumar.'),
(52, 'Mohammad Husain', 6, 'best movie'),
(53, 'Mohammad Husain', 6, 'nice'),
(54, 'Mohammad Husain', 6, 'Best Actor'),
(55, 'Mohammad Husain', 6, 'Love from Gujarat'),
(56, 'Mohammad Husain', 6, 'ISRO (Impossible Space Research Organisation)'),
(57, 'Mohammad Husain', 6, 'j baat'),
(58, 'Mohammad Husain', 6, 'mast bhai'),
(59, 'Mohammad Husain', 6, 'eik number'),
(60, 'mohammad', 6, 'hello'),
(61, 'Sadik Ali', 6, 'Bole to Jakaaas'),
(62, 'Mohammad Husain', 17, 'OMG'),
(63, 'sadikali', 6, 'khghbjhjb'),
(64, 'Mohammad Husain', 7, 'asddfff'),
(65, 'sadikali', 6, 'movie mast che'),
(66, 'Mohammad Husain', 7, 'nice'),
(67, 'Mohammad Husain', 7, 'I like it');

-- --------------------------------------------------------

--
-- Table structure for table `movies_transaction`
--

CREATE TABLE `movies_transaction` (
  `MTransaction_id` int(4) NOT NULL,
  `B_name` varchar(30) NOT NULL,
  `B_Phone` varchar(12) NOT NULL,
  `city` varchar(20) NOT NULL,
  `TheaterName` varchar(100) NOT NULL,
  `NoOfTicket` int(2) NOT NULL,
  `ShowTime` varchar(20) NOT NULL,
  `SeatLevel` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `TotalPrice` varchar(10) NOT NULL,
  `SeatString` varchar(1000) NOT NULL,
  `m_id` int(4) NOT NULL,
  `Card_number` varchar(16) NOT NULL,
  `Trasaction_time` int(10) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie_addtolist`
--

CREATE TABLE `movie_addtolist` (
  `movie_addtolist_ID` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `m_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seat_tracking`
--

CREATE TABLE `seat_tracking` (
  `id` int(4) NOT NULL,
  `seatNumber` int(4) NOT NULL,
  `TheaterName` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `show_time` varchar(30) NOT NULL,
  `m_id` int(4) NOT NULL,
  `MTransaction_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theater_list`
--

CREATE TABLE `theater_list` (
  `id` int(11) NOT NULL,
  `t_name` varchar(200) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `m_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater_list`
--

INSERT INTO `theater_list` (`id`, `t_name`, `ticket_price`, `city`, `m_id`) VALUES
(1, 'City Light : lodhi Complex', 100, 'Delhi', 6),
(3, 'Satyam Movieplex', 150, 'Pune', 7),
(4, 'Cinepolis: Magnet Mall, Bhandup', 100, 'Mumbai', 1),
(5, 'INOX: Inorbit Mall, Thane', 150, 'Mumbai', 1),
(6, 'Carnival : IMAX, Wadala', 200, 'Mumbai', 1),
(7, 'Fun Cinemas : K Star Mall', 200, 'Mumbai', 1),
(8, 'Gold Cinema : Malad Malvani', 80, 'Mumbai', 1),
(9, 'Gold Cinema : Malad Malvani', 99, 'Mumbai', 6),
(10, 'Miraj Cinemas : Ambarnath', 120, 'Mumbai', 1),
(11, 'Carnival: Sangam, Andheri', 120, 'Mumbai', 6),
(12, 'G7 Multiplex: Bandra', 130, 'Mumbai', 6),
(13, 'Maxus Cinemas: Bhayendar', 99, 'Mumbai', 6),
(14, 'Cinemax: Wonder Mall', 50, 'Mumbai', 6),
(15, 'Balaji Movieplex : Kopar', 199, 'Mumbai', 6),
(16, '24 Karet : Jogeshwari', 80, 'Mumbai', 6),
(17, '24 Karet : Jogeshwari', 80, 'Mumbai', 7),
(18, 'Cinemax :Wonder Mall', 80, 'Mumbai', 7),
(19, 'Cinemax :Wonder Mall', 80, 'Mumbai', 11),
(20, 'Cinemastar : High Street Mall', 100, 'Mumbai', 7),
(21, 'Cinemastar : High Street Mall', 110, 'Mumbai', 11),
(22, 'Cinepolis : Viviana Mall, Thane', 110, 'Mumbai', 7),
(23, 'Cinepolis : Viviana Mall, Thane', 99, 'Mumbai', 11),
(24, 'Metro Inox', 170, 'Mumbai', 7),
(25, 'Metro Inox : Marine Line', 170, 'Mumbai', 11),
(26, 'Movie Time: The Hub', 100, 'Mumbai', 7),
(27, 'Mukta A2 Cinema', 180, 'Mumbai', 7),
(28, 'INOX : Inorbit Mall', 70, 'Mumbai', 11),
(29, 'Rupam Cinema House', 70, 'Mumbai', 11),
(30, 'City Gold: Bopal', 120, 'Ahmedabad', 20),
(31, 'INOX: Inorbit Mall', 105, 'Ahmedabad', 20),
(32, 'Fun Cinemas', 100, 'Ahmedabad', 20),
(33, 'Gold Cinema : Ahmedabad', 135, 'Ahmedabad', 21),
(34, 'Cinemastar : High Street Mall,Ahmedabad', 95, 'Ahmedabad', 21),
(35, 'Cinemax :Wonder Mall, Ahmedabad', 120, 'Ahmedabad', 21),
(36, 'Cinemax :Wonder Mall', 120, 'Hydarabad', 21),
(37, 'Gold Cinema : Malad Malvani', 135, 'Hydarabad', 21),
(38, 'Cinemastar : High Street Mall', 95, 'Hydarabad', 21),
(39, 'Carnival: Sangam, Andheri', 155, 'Hydarabad', 1),
(40, 'Carnival : IMAX, Wadala', 155, 'Hydarabad', 1),
(41, 'Miraj Cinemas : Ambarnath', 70, 'Ahmedabad', 1),
(42, 'Cinepolis: Magnet Mall, Bhandup', 80, 'Ahmedabad', 1),
(43, 'Fun Cinemas : K Star Mall', 90, 'Ahmedabad', 1),
(44, 'Movie Time: The Hub', 85, 'Hydarabad', 17),
(45, 'Movie Time: The Hub', 80, 'Pune', 17),
(46, 'G7 Multiplex', 75, 'Pune', 17),
(47, 'G7 Multiplex', 75, 'Hydarabad', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `isGoogle` varchar(10) NOT NULL,
  `user_Image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `isGoogle`, `user_Image`) VALUES
(50, 'sadikali', 'karadiyasadikali786@gmail.com', 'sadikali1', '0', 'null'),
(52, 'Mohammad Husain', 'mohammadhusainpatavat@gmail.com', '', '1', 'https://lh3.googleusercontent.com/a-/AAuE7mAmStXVl7vqqHZK1GAXaEu855aL_vHLSvmy-W89EQ'),
(59, 'Mohammad', 'mohammadhusainpatavat2@gmail.com', '', '1', 'https://lh5.googleusercontent.com/-i1rvhZ_ksp0/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfIlcr17DMyDL-4-rCrCcGKo0NGeQ/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `id` int(4) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `user_name`, `feedback`) VALUES
(1, 'Mohammad Husain', 'nice website... :)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cars_list`
--
ALTER TABLE `cars_list`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_addtolist`
--
ALTER TABLE `car_addtolist`
  ADD PRIMARY KEY (`car_addToList_ID`),
  ADD KEY `userId` (`userId`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `car_transaction`
--
ALTER TABLE `car_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `movies_list`
--
ALTER TABLE `movies_list`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `id` (`m_id`);

--
-- Indexes for table `movies_reviews`
--
ALTER TABLE `movies_reviews`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `movies_transaction`
--
ALTER TABLE `movies_transaction`
  ADD UNIQUE KEY `id` (`MTransaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `movie_addtolist`
--
ALTER TABLE `movie_addtolist`
  ADD UNIQUE KEY `movie_addtolist_ID` (`movie_addtolist_ID`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `seat_tracking`
--
ALTER TABLE `seat_tracking`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `theater_list`
--
ALTER TABLE `theater_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD UNIQUE KEY `id_4` (`id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `id_5` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars_list`
--
ALTER TABLE `cars_list`
  MODIFY `car_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `car_addtolist`
--
ALTER TABLE `car_addtolist`
  MODIFY `car_addToList_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_transaction`
--
ALTER TABLE `car_transaction`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies_list`
--
ALTER TABLE `movies_list`
  MODIFY `m_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `movies_reviews`
--
ALTER TABLE `movies_reviews`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `movies_transaction`
--
ALTER TABLE `movies_transaction`
  MODIFY `MTransaction_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie_addtolist`
--
ALTER TABLE `movie_addtolist`
  MODIFY `movie_addtolist_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_tracking`
--
ALTER TABLE `seat_tracking`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `theater_list`
--
ALTER TABLE `theater_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_addtolist`
--
ALTER TABLE `car_addtolist`
  ADD CONSTRAINT `car_addtolist_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `car_addtolist_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars_list` (`car_id`);

--
-- Constraints for table `car_transaction`
--
ALTER TABLE `car_transaction`
  ADD CONSTRAINT `car_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `car_transaction_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars_list` (`car_id`);

--
-- Constraints for table `movies_reviews`
--
ALTER TABLE `movies_reviews`
  ADD CONSTRAINT `movies_reviews_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `movies_list` (`m_id`);

--
-- Constraints for table `movies_transaction`
--
ALTER TABLE `movies_transaction`
  ADD CONSTRAINT `movies_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `movies_transaction_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `movies_list` (`m_id`);

--
-- Constraints for table `movie_addtolist`
--
ALTER TABLE `movie_addtolist`
  ADD CONSTRAINT `movie_addtolist_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `movies_list` (`m_id`),
  ADD CONSTRAINT `movie_addtolist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `seat_tracking`
--
ALTER TABLE `seat_tracking`
  ADD CONSTRAINT `seat_tracking_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `movies_list` (`m_id`);

--
-- Constraints for table `theater_list`
--
ALTER TABLE `theater_list`
  ADD CONSTRAINT `theater_list_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `movies_list` (`m_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
