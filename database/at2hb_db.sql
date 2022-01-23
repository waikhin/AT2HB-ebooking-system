-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 07:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `at2hb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` char(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
('at2hb.rand', 'F!&4ajZy<&83Tf{+');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_submit` datetime NOT NULL,
  `announcement_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `announcement_submit`, `announcement_detail`) VALUES
(2, '2022-01-08 10:52:10', 'Testing 123\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `ban_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `ban_reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `court_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `court_name` varchar(20) NOT NULL,
  `court_location` varchar(100) NOT NULL,
  `court_status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_id`, `facility_id`, `court_name`, `court_location`, `court_status`) VALUES
(1, 1, 'Badminton 1', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(2, 1, 'Badminton 2', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(3, 1, 'Badminton 3', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(4, 1, 'Badminton 4', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(5, 1, 'Badminton 5', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(6, 1, 'Badminton 6', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(7, 1, 'Badminton 7', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(8, 1, 'Badminton 8', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(11, 2, 'Squash 1', 'Squash Courts, East Campus, UNIMAS', 'Available'),
(12, 2, 'Squash 2', 'Squash Courts, East Campus, UNIMAS', 'Available'),
(13, 2, 'Squash 3', 'Squash Courts, East Campus, UNIMAS', 'Available'),
(14, 2, 'Squash 4', 'Squash Courts, East Campus, UNIMAS', 'Available'),
(15, 3, 'Futsal A', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(16, 3, 'Futsal B', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(17, 3, 'Futsal C', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(18, 4, 'Tennis 1', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(19, 4, 'Tennis 2', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(26, 5, 'Rugby A', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(27, 6, 'Netball 1', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(28, 7, 'Volleyball 1', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(29, 7, 'Volleyball 2', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(30, 8, 'Takraw 1', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(31, 8, 'Takraw 2', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(32, 8, 'Takraw 3', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(33, 8, 'Takraw 4', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(34, 9, 'Basketball 1', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(35, 9, 'Basketball 2', 'UNIMAS Sport Complex ,Jln Kapur, 94300 Kota Samarahan, Sarawak', 'Available'),
(36, 10, 'Stadium', 'UNIMAS Stadium, 94300 Kota Samarahan, Sarawak', 'Available'),
(37, 11, 'Wall Climbing', 'UNIMAS Stadium, 94300 Kota Samarahan, Sarawak', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(20) NOT NULL,
  `equipment_desc` varchar(100) NOT NULL,
  `equipment_total` int(11) NOT NULL,
  `equipment_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `equipment_name`, `equipment_desc`, `equipment_total`, `equipment_balance`) VALUES
(1, 'Chair', 'BIG BIG CHAIR', 5000, 4500),
(2, 'Table', 'SMALL SMALL TABLE', 1000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facility_id` int(11) NOT NULL,
  `facility_img` varchar(255) NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `facility_working_hours` varchar(50) NOT NULL,
  `facility_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `facility_img`, `facility_name`, `facility_working_hours`, `facility_desc`) VALUES
(1, '', 'Badminton Court', 'Monday-Friday (10:00am - 9:00pm)', 'Surface: Carpet'),
(2, '', 'Squash Court', 'Monday-Friday (10:00am - 9:00pm)', 'Surface: Parking\r\n'),
(3, '', 'Futsal Court', 'Monday-Friday (10:00am - 9:00pm)', 'Surface: Taraflex'),
(4, '', 'Tennis Court', 'Monday-Friday (10:00am - 9:00pm)', 'no description'),
(5, '', 'Rugby Field', 'Monday-Friday (10:00am - 9:00pm)', 'Surface: Grass'),
(6, '', 'Netball Court', 'Monday-Friday (10:00am - 9:00pm)', 'no description'),
(7, '', 'Volleyball Court', 'Monday-Friday (10:00am - 9:00pm)', 'no description'),
(8, '', 'Takraw Court', 'Monday-Friday (10:00am - 9:00pm)', 'no description'),
(9, '', 'Basketball Court', 'Monday-Friday (10:00am - 9:00pm)', 'no description'),
(10, '', 'Stadium (Track & Field)', 'Monday-Friday (10:00am - 9:00pm)', 'Audience Capacity: 5000 audiences\r\nRunning Track: 10 tracks of 100m; 9 tracks of 400m.'),
(11, '', 'Wall Climbing', 'Monday-Friday (10:00am - 9:00pm)', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_type` char(8) NOT NULL,
  `feedback_subject` varchar(50) NOT NULL,
  `feedback_datetime` datetime NOT NULL,
  `feedback_detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `invoice_pay_amount` int(11) NOT NULL,
  `invoice_status` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `reservation_id`, `invoice_pay_amount`, `invoice_status`) VALUES
(5, 5, 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `rental_rate`
--

CREATE TABLE `rental_rate` (
  `rental_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `rental_type` varchar(20) NOT NULL,
  `rental_price` int(11) NOT NULL,
  `rental_unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental_rate`
--

INSERT INTO `rental_rate` (`rental_id`, `facility_id`, `rental_type`, `rental_price`, `rental_unit`) VALUES
(1, 1, 'Government', 800, 'day'),
(2, 1, 'Private', 1200, 'day'),
(3, 2, 'Government', 10, 'hour'),
(4, 2, 'Private', 15, 'hour'),
(5, 3, 'Government', 800, 'day'),
(6, 3, 'Private', 1200, 'day'),
(9, 4, 'Government (daytime)', 20, 'hour'),
(10, 4, 'Private (daytime)', 30, 'hour'),
(11, 4, 'Government (night)', 30, 'hour'),
(12, 4, 'Private (night)', 40, 'hour'),
(13, 5, 'Government (daytime)', 100, 'match'),
(14, 5, 'Private (daytime)', 150, 'match'),
(15, 5, 'Government (night)', 200, 'match'),
(16, 5, 'Private (night)', 300, 'match'),
(17, 6, 'Government', 80, 'match'),
(18, 6, 'Private', 120, 'match'),
(19, 7, 'Government', 8, 'hour'),
(20, 7, 'Private', 8, 'hour'),
(21, 8, 'Government (daytime)', 6, 'hour'),
(22, 8, 'Private (daytime)', 8, 'hour'),
(23, 8, 'Government (night)', 8, 'hour'),
(24, 8, 'Private (night)', 10, 'hour'),
(25, 9, 'Government (daytime)', 20, 'hour'),
(26, 9, 'Private (daytime)', 30, 'hour'),
(27, 9, 'Government (night)', 30, 'hour'),
(28, 9, 'Private (night)', 40, 'hour');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `court_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_submit` datetime NOT NULL,
  `reservation_edit` datetime NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_slot` varchar(20) NOT NULL,
  `reservation_status` char(30) NOT NULL,
  `reservation_remark` varchar(100) DEFAULT NULL,
  `reservation_rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `court_id`, `user_id`, `reservation_submit`, `reservation_edit`, `reservation_date`, `reservation_slot`, `reservation_status`, `reservation_remark`, `reservation_rating`) VALUES
(5, 2, 69448, '2022-01-08 07:49:10', '2022-01-08 07:54:42', '2022-01-11', '1000-1100', 'Approved', 'TEST 123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_addon`
--

CREATE TABLE `reservation_addon` (
  `ra_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `equipment_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation_addon`
--

INSERT INTO `reservation_addon` (`ra_id`, `reservation_id`, `equipment_id`, `equipment_qty`) VALUES
(4, 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` char(7) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_faculty` varchar(100) NOT NULL,
  `user_mobile_num` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_status` char(30) NOT NULL,
  `registered_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `user_password`, `user_name`, `user_faculty`, `user_mobile_num`, `user_email`, `user_status`, `registered_date`) VALUES
(69448, 'Student', 'Qwe12#', 'David Bong Xia Shing', 'Faculty of Computer Science and Information Technology', '01119896950', '69448@siswa.unimas.my', 'Verified', '2022-01-08 00:12:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`ban_id`),
  ADD KEY `bl_user_id` (`user_id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`court_id`),
  ADD KEY `fk_facility_id` (`facility_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `inv_reservation_id` (`reservation_id`);

--
-- Indexes for table `rental_rate`
--
ALTER TABLE `rental_rate`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `rf_id` (`facility_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `rsvp_user_id` (`user_id`),
  ADD KEY `rsvp_court_id` (`court_id`);

--
-- Indexes for table `reservation_addon`
--
ALTER TABLE `reservation_addon`
  ADD PRIMARY KEY (`ra_id`),
  ADD KEY `ra_reservation_id` (`reservation_id`),
  ADD KEY `ra_equipment_id` (`equipment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rental_rate`
--
ALTER TABLE `rental_rate`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation_addon`
--
ALTER TABLE `reservation_addon`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD CONSTRAINT `bl_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `court`
--
ALTER TABLE `court`
  ADD CONSTRAINT `fk_facility_id` FOREIGN KEY (`facility_id`) REFERENCES `facility` (`facility_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `inv_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rental_rate`
--
ALTER TABLE `rental_rate`
  ADD CONSTRAINT `rf_id` FOREIGN KEY (`facility_id`) REFERENCES `facility` (`facility_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `rsvp_court_id` FOREIGN KEY (`court_id`) REFERENCES `court` (`court_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rsvp_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_addon`
--
ALTER TABLE `reservation_addon`
  ADD CONSTRAINT `ra_equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`equipment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ra_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `autoRejectBooking` ON SCHEDULE EVERY 24 HOUR STARTS '2022-01-08 00:33:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE  at2hb_db.reservation SET reservation.reservation_status='Rejected'
    WHERE reservation.reservation_status='Pending' 
    AND reservation.reservation_submit< DATE_SUB(NOW(), INTERVAL 1 DAY)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
