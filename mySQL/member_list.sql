-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-10 04:11:33
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `php_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member_list`
--

CREATE TABLE `member_list` (
  `sid` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL COMMENT '外送區域',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `activated` int(11) NOT NULL DEFAULT 1,
  `point` int(11) DEFAULT NULL COMMENT '怪獸點數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member_list`
--

INSERT INTO `member_list` (`sid`, `account`, `password`, `family_name`, `given_name`, `birthday`, `mobile`, `email`, `district`, `address`, `created_at`, `activated`, `point`) VALUES
(1, 'kate1234', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', '林', '凱特', '1990-04-07', '0910123456', 'kate.lin1234@test.com', '信義區', '忠孝東路一段50號', '2020-09-02 06:41:17', 0, 0),
(2, 'shane1234', '90c888d1292ded4bda4f1e190c32043fcfc3a254', '李', '尚恩', '1995-11-02', '0953000123', 'shane.lee1234@test.com', '信義區', '辛亥路三段58號', '2020-09-02 06:41:17', 0, 0),
(3, 'adam1234', '08a9e07837b9bde0bf5adcd6e08bfd31632e74e3', '蘇', '亞當', '1997-09-01', '0928456456', 'adam.su1234@test.com', '大安區', '濟南路二段178號', '2020-09-02 06:47:46', 0, 0),
(4, 'arron1234', '1234', '張', '亞倫', '1998-08-08', '0910111234', 'arron.chang1234@test.com', '大安區', 'xx路xx號', '2020-09-07 15:05:34', 1, 10),
(5, 'eddie1234', '5b1d5b1569de26f631ba3edf0d89f65be5af4e3d', '李', '艾迪', '1996-02-01', '0910123456', 'eddie.lee1234@test.com', '大安區', 'xx路xx號', '2020-09-07 15:13:05', 1, 80);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `account` (`account`) USING BTREE;

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_list`
--
ALTER TABLE `member_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
