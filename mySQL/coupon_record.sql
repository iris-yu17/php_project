-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-10 04:11:28
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
-- 資料表結構 `coupon_record`
--

CREATE TABLE `coupon_record` (
  `sid` int(11) NOT NULL COMMENT '自動增加ID',
  `coupon_no` varchar(255) NOT NULL,
  `user_account` varchar(255) NOT NULL COMMENT '優惠券使用者',
  `order_number` varchar(255) NOT NULL COMMENT '訂單號碼',
  `order_original_amount` int(11) NOT NULL COMMENT '原訂單金額',
  `discount_type` int(11) NOT NULL COMMENT '優惠券類型(扣款金額)',
  `order_final_amount` int(11) NOT NULL COMMENT '最終訂單金額',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '使用否: 預設0，使用後為1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coupon_record`
--

INSERT INTO `coupon_record` (`sid`, `coupon_no`, `user_account`, `order_number`, `order_original_amount`, `discount_type`, `order_final_amount`, `status`) VALUES
(1, 'A0001', 'kate1234', 'S0008', 200, 5, 100, 1),
(2, 'A0002', 'shane1234', 'S0002', 300, 5, 250, 1),
(11, 'A0003', 'adam1234', 'S0003', 0, 0, 0, 1),
(12, 'A0008', 'adam1234', 'S0007', 0, 0, 0, 1),
(13, 'A0009', 'john1234', 'S0008', 155, 5, 105, 1),
(14, 'A0017', 'adam1234', 'S0017', 155, 5, 105, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon_record`
--
ALTER TABLE `coupon_record`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon_record`
--
ALTER TABLE `coupon_record`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '自動增加ID', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
