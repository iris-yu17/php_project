-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-06 16:46:37
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `activated` int(11) NOT NULL DEFAULT 1,
  `point` int(11) DEFAULT NULL COMMENT '怪獸點數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member_list`
--

INSERT INTO `member_list` (`sid`, `account`, `password`, `family_name`, `given_name`, `birthday`, `mobile`, `email`, `district`, `address`, `created_at`, `activated`, `point`) VALUES
(1, 'kate1234', '7c4a8d09ca3762af61e59520943dc26494f8941b', '林', '凱特', '1990-04-07', '0910123456', 'kate.lin1234@test.com', '信義區', '忠孝東路一段50號', '2020-09-02 14:41:17', 0, NULL),
(2, 'shane1234', 'f18f057ea44a945a083a00e6fcc11637d186042d', '李', '尚恩', '1995-11-02', '0953000123', 'shane.lee1234@test.com', '信義區', '辛亥路三段58號', '2020-09-02 14:41:17', 0, NULL),
(3, 'adam1234', '13e475c8ed2fab89e42c5bb86f472ddff0672754', '蘇', '亞當', '1997-09-01', '0928456456', 'adam.su1234@test.com', '大安區', '濟南路二段178號', '2020-09-02 14:47:46', 0, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `account` (`account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_list`
--
ALTER TABLE `member_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
