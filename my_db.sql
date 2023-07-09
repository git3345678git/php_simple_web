-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 07 朁E08 日 23:38
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `my_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL COMMENT '文章if',
  `title` varchar(30) NOT NULL COMMENT '標題',
  `category` varchar(50) NOT NULL COMMENT '分類',
  `content` text NOT NULL COMMENT '內文',
  `publish` tinyint(1) NOT NULL COMMENT '是否發佈',
  `create_date` datetime NOT NULL COMMENT '建立日期',
  `modify_date` datetime DEFAULT NULL COMMENT '修改日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`id`, `title`, `category`, `content`, `publish`, `create_date`, `modify_date`) VALUES
(10, '寶傑梗圖紅到中國去了？', '心得', '劉寶傑（1963年9月20日—）是台灣媒體人，畢業於中國文化大學新聞系，曾任《中時晚報》記者、曾任《聯合報》記者、曾任《聯合報》撰述委員、曾任東森新聞台《攔截新聞》主持人、現任東森新聞台《關鍵時刻》當家主持人。', 1, '2023-05-20 07:54:27', '2023-07-08 14:42:03'),
(11, '許傑輝退出演藝圈！爆性騷4天來道歉又要被害者提告', '心得', '57歲資深藝人許傑輝，近日遭性騷擾醜聞纏身，女星黃云歆日前在臉書具名指控許傑輝上課時涉性騷，要求「私下繳交性感作業」。對於種種負面新聞，許傑輝週四(6月15日)在臉書表示退出演藝事業，「本人即日起退出演藝事業，停止所有公開活動，深自反省，誠心道歉」。', 1, '2023-05-20 07:54:38', '2023-07-08 14:35:07'),
(12, '分手周揚青3年 羅志祥自嘲「要管理好時間」吐擇偶條件', '心得', '羅志祥3年前與大陸網紅周揚青結束9年戀情，感情世界備受關注，他日前時隔20多年上三立《完全娛樂》擔任嘉賓，無所不談的他被問到：「還想談戀愛嗎？感情觀是否有改變？」羅志祥回「如果真的轉角遇到愛」一定都會接受，而他也透露擇偶的3個條件，分別為「孝順、愛動物、外型順眼」。', 1, '2023-05-20 07:55:01', '2023-07-08 14:37:43'),
(13, '吳宗憲直播再嗆黃子佼「原來你羨慕嫉妒我」', '心得', '吳宗憲開直播並發文寫道，「現在海水退了，我們終於知道⋯⋯誰沒有穿褲子。每天在那裡亂搞男女關係的人是誰？作奸犯科？永遠都不會跟我有關係的，因為這是我們吳家的家教！我一生都沒有做過任何下流的事！所有的爛事，過去不會，現在沒有，將來我們就接著看！佼佼～我現在才知道你這麼羨慕嫉妒我，很抱歉一直讓你吃我的煙！連我的車尾燈你也看不到！過去贏不了我，現在你又全部輸光，將來有一天；我演藝圈不幹了！那就輸我更多囉！聽了你的愛的告白才驚覺；原來平常看你那麼忙，都在演藝圈裡面，幹些什麼？果然是戰功彪炳，一個接一個烈女怕纏郎，圈子裡面的傻女孩還蠻多的。」', 1, '2023-05-20 07:55:08', '2023-07-08 14:38:47');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '使用者id',
  `username` varchar(30) NOT NULL COMMENT '帳號',
  `password` varchar(100) NOT NULL COMMENT '密碼',
  `name` varchar(30) NOT NULL COMMENT '名字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(3, 'thor', 'hammer', '索爾'),
(31, 'admin', 'admin', '管理員');

-- --------------------------------------------------------

--
-- 資料表結構 `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL COMMENT '作品id',
  `intro` text NOT NULL COMMENT '簡介',
  `image_path` varchar(255) DEFAULT NULL COMMENT '圖片路徑',
  `video_path` varchar(255) DEFAULT NULL COMMENT '影片路徑',
  `publish` tinyint(1) NOT NULL COMMENT '是否發佈',
  `upload_date` datetime NOT NULL COMMENT '上傳時間',
  `modify_date` datetime DEFAULT NULL COMMENT 'modify_date',
  `creater_id` int(11) DEFAULT '1' COMMENT '建立者id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `works`
--

INSERT INTO `works` (`id`, `intro`, `image_path`, `video_path`, `publish`, `upload_date`, `modify_date`, `creater_id`) VALUES
(3, 'Lighthouse', './files/images/Lighthouse.jpg', NULL, 1, '2023-05-11 17:18:24', NULL, 3),
(9, 'Lighthouse', './files/images/Lighthouse.jpg', NULL, 1, '2023-05-11 17:18:24', NULL, 31),
(13, '就一句話噁心', NULL, 'files/videos/bullet.mp4', 1, '2023-07-08 14:05:30', NULL, 1),
(14, '常威在打來福', NULL, 'files/videos/dog.mp4', 1, '2023-07-08 14:07:17', NULL, 1),
(21, '殺死丁力這雜碎', NULL, 'files/videos/dingli.mp4', 1, '2023-07-08 14:29:02', NULL, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章if', AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '使用者id', AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '作品id', AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
