-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 2 月 25 日 08:57
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `pita_pure`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `birthday` varchar(64) NOT NULL,
  `post_num` int(11) NOT NULL,
  `job` varchar(10) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_account`
--

INSERT INTO `user_account` (`id`, `name`, `birthday`, `post_num`, `job`, `email`, `pass`) VALUES
(4, 'azu', '19921113', 10029, '会社員', 'l@a', 'kkkk'),
(5, 'あずあず', '19921113', 10029, 'プログラマー', 'aaa.azaz1113@gmail.com', '111'),
(6, 'あずあず', '19921113', 10029, 'gakusei', 'a@l', 'kkkk'),
(8, 'zuazua', '19921113', 10029, '学生', 'aaaa@aaaa', 'aaaa'),
(9, 'あずあず', '19921113', 10029, '会社員', 'm@a', 'kkk'),
(10, 'あずあず', '19921113', 10029, '学生', 'a@l', 'oiu');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
