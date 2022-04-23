-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Tem 2021, 12:25:39
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dinner`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `categoryid` int(10) NOT NULL,
  `categoryname` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `orders` int(10) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `orders`, `deleted`) VALUES
(1, 'Dinner', 4, 0),
(2, 'Drinks', 1, 0),
(3, 'Breakfast', 2, 0),
(4, 'Lunch', 3, 0),
(5, 'Snacks', 5, 1),
(6, 'Desserts', 6, 0),
(8, 'asdad', 4444444, 1),
(9, 'sdasd', 232, 1),
(10, 'adas', 312312, 1),
(11, 'asdad', 123214, 1),
(12, 'Breakfast', 2, 1),
(13, 'Snacks', 5, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `commentid` int(10) NOT NULL,
  `usersalt` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `recipesid` int(10) NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `fav` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `admincomment` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `admincommenttime` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`commentid`, `usersalt`, `recipesid`, `description`, `fav`, `admincomment`, `time`, `admincommenttime`, `deleted`) VALUES
(25, '267083481211293787450209978151330492', 19, 'wow ', '213123', 'xx', '30-04-2021 14:04', '23-05-2021 17:23', 0),
(26, '267083481211293787450209978151330492', 17, 'nice', '213123', '', '30-04-2021 14:04', '', 0),
(27, '267083481211293787450209978151330492', 16, 'Perfect!', '213123', '', '05-05-2021 11:26', '', 0),
(28, '267083481211293787450209978151330492', 18, 'Perfect!!!!!!', '213123', '', '20-05-2021 00:31', '', 0),
(29, '555218096772909188220214940929310462', 5, 'perfect', '213123', '', '20-05-2021 09:43', '', 0),
(30, '555218096772909188220214940929310462', 19, 'hey', '213123', '', '23-05-2021 19:38', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `likes`
--

CREATE TABLE `likes` (
  `likeid` int(10) NOT NULL,
  `recipeid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `likecounter` int(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `likes`
--

INSERT INTO `likes` (`likeid`, `recipeid`, `userid`, `likecounter`, `deleted`) VALUES
(115, 18, 23, 1, 0),
(116, 17, 23, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recipes`
--

CREATE TABLE `recipes` (
  `recipesid` int(10) NOT NULL,
  `recipesname` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `recipespicture` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `categoryid` int(10) NOT NULL,
  `recipesdescription` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `orders` int(10) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `recipes`
--

INSERT INTO `recipes` (`recipesid`, `recipesname`, `recipespicture`, `categoryid`, `recipesdescription`, `orders`, `deleted`) VALUES
(5, 'Smothie', 'img/53img-02.jpg', 2, 'aaaa', 2, 0),
(6, 'Coctail', 'img/93img-03.jpg', 2, 'aaaaaaaa', 3, 0),
(7, 'Hamburger', 'img/28img-04.jpg', 4, 'aaaaaa', 1, 0),
(8, 'Sebzeli Tavuk', 'img/56img-05.jpg', 4, 'aaaaaa', 2, 0),
(9, 'Balık', 'img/56img-06.jpg', 4, 'bbbbb', 3, 0),
(10, 'tatlı', 'img/50img-07.jpg', 1, 'aaaaaa', 1, 0),
(11, 'yemek', 'img/18img-08.jpg', 1, 'aaaa', 2, 0),
(12, 'tava', 'img/69img-09.jpg', 1, 'aaaaaa', 3, 0),
(13, 'aaaaa', 'img/33blog-img-06.jpg', 1, 'asdadad', 23, 1),
(14, 'omlet', 'img/74peynirli-omlet-6b79f91f-1223-4704-a3cb-70f5b1e9ba23.jpg', 3, 'peynirli', 24, 0),
(15, 'menemen', 'img/652576012_810x458.jpg', 3, 'soğanlı', 25, 0),
(16, 'Profiterol', 'img/53profiterol-yemekcom2.jpg', 6, 'çikolatalı toplar', 27, 0),
(17, 'Çikolatalı ve çilekli pasta', 'img/29cikolatali-cilekli-pasta-kc522590-1-357f3f10bea44c11b89a6bae5c130d14.jpg', 6, 'aaaaaaaaaaaaaaa', 28, 0),
(18, 'Cajun Finger', 'img/6Cajun-Fried-Chicken-Strips.jpg', 13, 'aaaaaaa', 29, 0),
(19, 'Soğan Halkası', 'img/64sogan-halkasi-tarifi.jpg', 13, 'soğan', 30, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rights`
--

CREATE TABLE `rights` (
  `rightsid` int(10) NOT NULL,
  `rightsname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `rights` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rights`
--

INSERT INTO `rights` (`rightsid`, `rightsname`, `rights`, `deleted`) VALUES
(1, 'Customer', ' {\"panel\":0,\"user\":0,\"settings\":0,\"about\":0,\"slider\":0,\"recipes\":0,\"category\":0,\"comment\":0,\"staff\":0}', 0),
(2, 'admin', ' {\"panel\":1,\"user\":1,\"settings\":1,\"about\":1,\"slider\":1,\"recipes\":1,\"category\":1,\"comments\":1,\"staff\":1}', 0),
(3, 'mod', '  {\"panel\":1,\"user\":0,\"settings\":0,\"about\":1,\"slider\":1,\"recipes\":1,\"category\":1,\"staff\":0}', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `settingsid` int(1) NOT NULL,
  `companyname` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `author` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `telephone` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `face` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `insta` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `google` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `about` varchar(3000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`settingsid`, `companyname`, `title`, `description`, `keywords`, `author`, `telephone`, `email`, `address`, `face`, `insta`, `twitter`, `google`, `about`, `deleted`) VALUES
(1, 'Fo&Co', 'Fo&Co', 'Food and Everything', 'bb', 'Gözde Bayru', '0 (544) 123 42 42', 'info@foco.com', 'İstanbul', 'https://www.facebook.com/', 'www.instagram.com', 'twitter', 'google', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem.  Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staff`
--

CREATE TABLE `staff` (
  `staffid` int(10) NOT NULL,
  `staffname` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `staffsurname` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `stafftitle` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `staffpicture` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `staffinsta` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `staff`
--

INSERT INTO `staff` (`staffid`, `staffname`, `staffsurname`, `stafftitle`, `staffpicture`, `staffinsta`, `deleted`) VALUES
(1, 'George', 'Orwell', 'Exclusive Cheff', 'img/74stuff-img-02.jpg', 'www.instagram.com', 0),
(2, 'Jelena', 'Smith', 'Chef', 'img/1stuff-img-05.jpg', 'www.instagram.com', 0),
(3, 'xxx', 'xxxx', 'xx', 'img/7avt-img.jpg', 'xxx', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `usersurname` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `usermail` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userpassword` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userrights` int(2) NOT NULL,
  `usersalt` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userid`, `username`, `usersurname`, `usermail`, `userpassword`, `userrights`, `usersalt`, `deleted`) VALUES
(17, 'Gözde', 'Bayru', 'gozdebayru@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '267083481211293787450209978151330492', 0),
(18, 'doğukan', 'bayru', 'dogukanbayru@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '743343475534161899594347387122566114', 0),
(19, 'moderator', 'mod', 'moderator@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, '555218096772909188220214940929310462', 0),
(20, 'aaaa', 'aaaa', 'aaaa', '81dc9bdb52d04dc20036dbd8313ed055', 1, '981842848147873469271099990916666690', 0),
(21, 'aaaa', 'aaaa', 'aaaa', '922ec9531b1f94add983a8ce2ebdc97b', 1, '674227816052130118378621174085505973', 0),
(22, 'aaa', 'aaa', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '659516809678851202815185999412762918', 0),
(23, 'xx', 'xx', 'xx@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '571632476279583829337950644091343434', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Tablo için indeksler `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeid`);

--
-- Tablo için indeksler `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipesid`);

--
-- Tablo için indeksler `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`rightsid`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settingsid`);

--
-- Tablo için indeksler `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `likes`
--
ALTER TABLE `likes`
  MODIFY `likeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Tablo için AUTO_INCREMENT değeri `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipesid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `rights`
--
ALTER TABLE `rights`
  MODIFY `rightsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `settingsid` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
