-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-10 04:11:20
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
-- 資料表結構 `coupon_info`
--

CREATE TABLE `coupon_info` (
  `sid` int(11) NOT NULL COMMENT '自動增加ID',
  `coupon_no` varchar(255) NOT NULL COMMENT '優惠券編號',
  `coupon_type` tinyint(4) NOT NULL COMMENT '優惠券類型(扣款金額$10-50)',
  `coupon_issue` datetime NOT NULL COMMENT '發放時間',
  `coupon_due` datetime NOT NULL COMMENT '過期時間',
  `coupon_validity` tinyint(4) NOT NULL COMMENT '優惠券是否有效',
  `user_account` varchar(255) NOT NULL COMMENT '優惠券所有者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `coupon_info`
--

INSERT INTO `coupon_info` (`sid`, `coupon_no`, `coupon_type`, `coupon_issue`, `coupon_due`, `coupon_validity`, `user_account`) VALUES
(1, 'A0001', 3, '2020-09-02 23:08:28', '2020-10-02 23:05:57', 0, 'kate1234'),
(2, 'A0002', 4, '2020-09-07 21:40:33', '2020-10-07 21:40:33', 0, 'adam1234'),
(3, 'A0003', 3, '2020-09-07 21:40:33', '2020-10-07 21:40:33', 0, 'adam1234'),
(4, 'A0004', 2, '2020-09-07 21:40:33', '2020-10-07 21:40:33', 1, 'kate1234'),
(5, 'A0005', 1, '2020-09-07 21:40:33', '2020-10-07 21:40:33', 1, 'shane1234');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon_info`
--
ALTER TABLE `coupon_info`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `coupon_no` (`coupon_no`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon_info`
--
ALTER TABLE `coupon_info`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '自動增加ID', AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
