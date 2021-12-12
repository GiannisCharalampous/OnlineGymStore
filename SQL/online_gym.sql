SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
SET NAMES utf8;

CREATE DATABASE IF NOT EXISTS `ONLINE_GYM` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ONLINE_GYM`;

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `adm_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `ADMIN` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'admin1', 'admin1', 'admin1@gmail.com', '2018-04-09 07:36:18'),
(2, 'admin2', 'admin2', 'admin2@gmail.com', '2018-04-13 18:12:30');

CREATE TABLE IF NOT EXISTS `GYM_Equipment` (
  `t_id` int(222) NOT NULL AUTO_INCREMENT,
  `gym_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

INSERT INTO `GYM_Equipment` (`t_id`, `gym_id`, `title`, `price`, `img`) VALUES
(11, 48, 'z bar', '55.77', 'zbar.jpg'),
(12, 48, 'Treadmill', '22.12', 'treadmill.jpg'),
(13, 49, 'Stationary bicycle', '12.35', 'bicycle.jpg'),
(14, 50, 'dumbbells', '34.99', 'dumbbells.jpg'),
(15, 51, 'Barbell Set', '11.99', 'barbell.jpg'),
(16, 52, 'Rowing machine', '22.55', 'row.jpg'),
(17, 53, 'Ellipticals', '17.99', 'elliptical.jpg');

CREATE TABLE IF NOT EXISTS `REMARK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71;

INSERT INTO `REMARK` (`id`, `frm_id`, `status`, `remarkDate`) VALUES
(62, 32, 'in process', '2018-04-18 17:35:52'),
(63, 32, 'closed', '2018-04-18 17:36:46'),
(64, 32, 'in process', '2018-04-18 18:01:37'),
(65, 32, 'closed', '2018-04-18 18:08:55'),
(66, 34, 'in process', '2018-04-18 18:56:32'),
(67, 35, 'closed', '2018-04-18 18:59:08'),
(68, 37, 'in process', '2018-04-18 19:50:06'),
(69, 37, 'rejected', '2018-04-18 19:51:19'),
(70, 37, 'closed', '2018-04-18 19:51:50');

CREATE TABLE IF NOT EXISTS `GYM` (
  `gym_id` int(222) NOT NULL AUTO_INCREMENT,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gym_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

INSERT INTO `GYM` (`gym_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(48, 'GYM_1', 'GYM_1@gmail.com', ' 090412 64676', 'www.GYM_1.com', '7am', '4pm', 'mon-tue', 'Address 1', 'gym.jpg', '2018-04-18 13:49:23'),
(49, 'GYM_2', 'GYM_2@gmail.com', '011 2677 9070', 'www.GYM_2.com', '6am', '5pm', 'mon-fri', 'Address 2', 'gym.jpg', '2018-04-18 13:53:36'),
(50, 'GYM_3', 'GYM_3@gmail.com', '090410 35147', 'www.GYM_3.com', '6am', '6pm', 'mon-sat', 'Address 3', 'gym.jpg', '2018-04-18 13:55:31'),
(51, 'GYM_4', 'GYM_4@gmail.com', '3454345654', 'www.GYM_4.com', '8am', '4pm', 'mon-thu', 'Address 4', 'gym.jpg', '2018-04-18 13:57:19'),
(52, 'GYM_5', 'GYM_5@gmail.com', '2345434567', 'www.GYM_5.com', '6am', '7pm', 'mon-fri', 'Address 5', 'gym.jpg', '2018-04-18 14:32:17'),
(53, 'GYM_6', 'GYM_6@gmail.com', '4512545784', 'www.GYM_6.com', '7am', '7pm', 'mon-sat', 'Address 6', 'gym.jpg', '2018-04-18 19:37:33');

CREATE TABLE IF NOT EXISTS `USERS` (
  `u_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

INSERT INTO `USERS` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(31, 'user1', 'John', 'Charalambous', 'john@gmail.com', '9041240385', '123456', 'Address 1', 1, '2018-04-18 10:05:03'),
(32, 'user2', 'Lily', 'Smith', 'lily@gmail.com', '6232125458', '123456', 'Address 2', 1, '2018-04-18 09:50:56');

CREATE TABLE IF NOT EXISTS `USERS_ORDERS` (
  `o_id` int(222) NOT NULL AUTO_INCREMENT,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39;

INSERT INTO `USERS_ORDERS` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(37, 31, 'z bar', 5, '17.99', 'closed', '2018-04-18 19:51:50'),
(38, 31, 'dumbbells', 2, '34.99', NULL, '2018-04-18 19:52:34');

SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS;
SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION;
