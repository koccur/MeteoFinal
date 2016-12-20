-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2016, 20:14
-- Wersja serwera: 5.7.9
-- Wersja PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `koccur_meteo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url_s` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_category_id_foreign` (`category_id`),
  KEY `articles_author_foreign` (`author`),
  KEY `articles_cat_name_foreign` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `user_id`, `author`, `category_id`, `cat_name`, `image_url`, `image_url_s`, `created_at`, `updated_at`, `published_at`) VALUES
(1, 'xzcasdqwe', 'qweasdzxcss', 1, 'admin', 2, 'qweqweqw', 'img/obrazki/Cg0B31_Zrzut ekranu (4).png', '', '2016-04-22 13:48:58', '2016-04-22 13:49:22', '2016-04-22 13:49:22'),
(2, 'zxczxc', 'zxczxczxczxczx', 1, 'admin', 1, 'qweqweqw', 'img/obrazki/jPnwM5_Zrzut ekranu (4).png', 'img/obrazki/thumbnails/jPnwM5_Zrzut ekranu (4).png', '2016-04-22 13:50:23', '2016-04-22 13:50:23', '2016-04-22 13:50:23'),
(3, 'Testowy artykuł', 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker', 28, 'Marcin', 2, 'Alerty Pogodowe', 'img/obrazki/QWqXVh_cookie.png', 'img/obrazki/thumbnails/QWqXVh_cookie.png', '2016-05-31 18:43:39', '2016-05-31 18:43:39', '2016-06-01 18:43:39'),
(4, 'Testowy artykuł2', 'Ogólnie znana teza głosi, iż użytkownika może rozpraszać zrozumiała zawartość strony, kiedy ten chce zobaczyć sam jej wygląd. Jedną z mocnych stron używania Lorem Ipsum jest to, że ma wiele różnych „kombinacji” zdań, słów i akapitów, w przeciwieństwie do zwykłego: „tekst, tekst, tekst”, sprawiającego, że wygląda to „zbyt czytelnie” po polsku. Wielu webmasterów i designerów używa Lorem Ipsum jako domyślnego modelu tekstu i wpisanie w internetowej wyszukiwarce ‘lorem ipsum’ spowoduje znalezienie bardzo wielu stron, które wciąż są w budowie. Wiele wersji tekstu ewoluowało i zmieniało się przez lata, czasem przez przypadek, czasem specjalnie (humorystyczne wstawki itd).\r\n\r\n', 28, 'Marcin', 2, 'Alerty Pogodowe', 'img/obrazki/BjSqdo_mapa-polski.png', 'img/obrazki/thumbnails/BjSqdo_mapa-polski.png', '2016-05-31 18:44:57', '2016-05-31 18:44:57', '2016-05-31 18:44:57'),
(5, 'Aura wciąż jest burzowa', 'Gdzie grzmi?\r\n\r\nPo godz. 18 burze o słabym i umiarkowanym natężeniu występowały w rejonie miejscowości: ​\r\n\r\n- Szczecinek;\r\n- Choszczno;\r\n- Lipno;\r\n- Szamotuły;\r\n\r\n- Czarnków;\r\n\r\n- Wysokie Mazowieckie.\r\n\r\nBurzom towarzyszą opady rzędu do 5 l/mkw. i wiatr osiągający w porywach prędkość 50 km/h.\r\n\r\n- Zjawiska przesuwają się na południe z prędkością 25 km/h.- precyzował meteorolog wskazując, że lokalnie może spaść grad.', 28, 'Marcin', 2, 'Alerty Pogodowe', 'img/obrazki/AQpesK_3d067360-cbd3-448b-b3bb-4700f2c52f6b.jpg', 'img/obrazki/thumbnails/AQpesK_3d067360-cbd3-448b-b3bb-4700f2c52f6b.jpg', '2016-06-04 16:24:16', '2016-06-04 16:35:17', '2016-06-04 16:35:17'),
(6, 'Skąd brały się zmiany klimatyczne przed erą przemysłową?', '<p><strong>Kontynuujemy</strong> cykl artykuł&oacute;w, w przystępny spos&oacute;b wyjaśniających problem zmian klimatycznych. Na Wasze pytania, kt&oacute;re możecie zamieszczać w sekcji komentarzy,&nbsp;wsp&oacute;lnie odpowiemy wraz z ekspertami z zakresu fizyki atmosfery, kt&oacute;rzy na co dzień badają przyczyny i skutki globalnego ocieplenia i zjawisk z nim powiązanych...&nbsp;<a href="http://www.twojapogoda.pl/tagi/5482,nauka-o-klimacie" target="_blank"><strong>Przeczytaj poprzednie wywiady</strong></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Na dziewiąte pytanie odpowie Marcin Popkiewicz, analityk megatrend&oacute;w, ekspert i dziennikarz zajmujący się powiązaniami w obszarach gospodarka-energia-zasoby-środowisko. Autor bestseller&oacute;w &quot;Świat na rozdrożu&quot; i &quot;Rewolucja energetyczna. Ale po co?&quot;. Redaktor portali ziemianarozdrozu.pl i naukaoklimacie.pl. Przewodniczący polskiego oddziału ASPO (Association for the Study of Peak Oil) i członek rady programowej INSPRO. Laureat &quot;Dobromira Roku 2013&quot; oraz gł&oacute;wnej nagrody &quot;Dziennikarze dla klimatu&quot; 2015.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="TwojaPogoda" src="http://static.twojapogoda.pl/2016/06/1.png" style="height:255px; width:620px" /></p>\r\n', 28, 'Marcin', 2, 'Alerty Pogodowe', 'img/obrazki/YZvOdQ_z-620x383.jpg', 'img/obrazki/thumbnails/YZvOdQ_z-620x383.jpg', '2016-06-06 10:19:34', '2016-06-06 10:21:22', '2016-06-06 10:21:22');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'qweqweqw', 'qweqweqw', '2016-04-22 13:46:43', '2016-04-22 13:46:43'),
(2, 'Alerty Pogodowe', 'tutaj znajdują sie alerty pogodowe', '2016-05-31 18:40:39', '2016-05-31 18:40:39');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commenter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_article_id_foreign` (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_user_id_foreign` (`user_id`),
  KEY `images_article_id_foreign` (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `images`
--

INSERT INTO `images` (`id`, `file`, `destination_path`, `filename`, `caption`, `user_id`, `article_id`, `created_at`, `updated_at`) VALUES
(1, 'img/obrazki/Cg0B31_Zrzut ekranu (4).png', 'img/obrazki/', 'Cg0B31_Zrzut ekranu (4).png', 'xzcasdqwe', 0, 0, '2016-04-22 13:48:57', '2016-04-22 13:48:57'),
(2, 'img/obrazki/jPnwM5_Zrzut ekranu (4).png', 'img/obrazki/', 'jPnwM5_Zrzut ekranu (4).png', 'zxczxc', 0, 0, '2016-04-22 13:50:23', '2016-04-22 13:50:23'),
(3, 'img/obrazki/QWqXVh_cookie.png', 'img/obrazki/', 'QWqXVh_cookie.png', 'Testowy artykuł', 0, 0, '2016-05-31 18:43:39', '2016-05-31 18:43:39'),
(4, 'img/obrazki/BjSqdo_mapa-polski.png', 'img/obrazki/', 'BjSqdo_mapa-polski.png', 'Testowy artykuł2', 0, 0, '2016-05-31 18:44:57', '2016-05-31 18:44:57'),
(5, 'img/obrazki/AQpesK_3d067360-cbd3-448b-b3bb-4700f2c52f6b.jpg', 'img/obrazki/', 'AQpesK_3d067360-cbd3-448b-b3bb-4700f2c52f6b.jpg', 'Aura wciąż jest burzowa', 0, 0, '2016-06-04 16:24:16', '2016-06-04 16:24:16'),
(6, 'img/obrazki/YZvOdQ_z-620x383.jpg', 'img/obrazki/', 'YZvOdQ_z-620x383.jpg', 'Skąd brały się zmiany klimatyczne przed erą przemysłową?', 0, 0, '2016-06-06 10:19:34', '2016-06-06 10:19:34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_02_26_151515_create_articles_table', 1),
('2016_03_14_201548_create_comments_table', 1),
('2016_03_14_201619_create_categories_table', 1),
('2016_03_14_201630_create_tags_tables', 1),
('2016_03_14_201641_create_taggins_table', 1),
('2016_04_03_092322_entrust_setup_tables', 1),
('2016_04_12_092322_create_images_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'can_read', 'Can Read Data', NULL, '2016-04-22 13:45:14', '2016-04-22 13:45:14'),
(2, 'can_create', 'Moze tworzyc artykuły', NULL, '2016-04-22 13:45:14', '2016-04-22 13:45:14'),
(3, 'can_edit', 'Can Edit Data', NULL, '2016-04-22 13:45:14', '2016-04-22 13:45:14'),
(4, 'can_edit_user', 'może edytować użytkowników', NULL, '2016-04-22 13:45:14', '2016-04-22 13:45:14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'User', 'Użytkownik', NULL, '2016-06-06 05:44:52', '2016-06-06 05:44:52'),
(1, 'Admin', 'Administrator', NULL, '2016-06-06 05:44:52', '2016-06-06 05:44:52'),
(2, 'Mod', 'Moderator', NULL, '2016-06-06 05:44:52', '2016-06-06 05:44:52');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(16, 2),
(18, 2),
(19, 2),
(21, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 1),
(29, 2),
(30, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taggings`
--

DROP TABLE IF EXISTS `taggings`;
CREATE TABLE IF NOT EXISTS `taggings` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  KEY `taggings_article_id_foreign` (`article_id`),
  KEY `taggings_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image_url`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.do', '$2y$10$LB7vpy3cBCdMyb/VSDCyxONl48yvtFeVlepREbxwASTNmMsAKNUHO', '', '85kyaYVHa4aym8WetXUsWbWufhAs36kQ4wCKLiZeZCy4i6PvgsqLnWPlvC0S', '2016-04-22 13:45:49', '2016-04-22 15:17:09'),
(5, 'qwe', 'qwe@w.l', '$2y$10$t8D1ODgdMGTFTpxpxF44ju/CFgXaLe6g1z3L/xfvO.95A6ygcBnbO', '', 'ERUEenODFTt3KbYZmPpTNyS2no6BLEeaAxasc0Yb7E6rSg6Z6lEOjeDva0pC', '2016-04-22 14:33:34', '2016-05-30 16:25:45'),
(21, 'zxc', 'zxc@asd.as', '$2y$10$X/BBLGNloF.8Asi5WtmBkeoEjkbJ4XQxMS9apz//EYHqYpSyzimVu', '', NULL, '2016-04-22 14:52:24', '2016-04-22 14:52:24'),
(23, 'qweqwe', 'qwe@qwe.sl', '$2y$10$AYQUbQu/1eAAP7M0Xq43v.kAR73t69/.55z7a5stYg22GLZPOTewi', 'img/avatar/thumbnails/cultist.png', NULL, '2016-04-22 14:53:35', '2016-04-22 14:53:35'),
(24, 'qwe', 'qwe@qwe.qwe', '$2y$10$loyqWsuNrKV5zCl8WO7kt.LmU6EEveJHoD15oeMiqHpBKL4QDdbBa', 'img/avatar/thumbnails/cultist.png', 'nZGvV8dFNTXcvaAEdOOtTGxRKtUVsW8Eyp9YXUeF9zaZVO5H13MN8V5cihDg', '2016-04-22 15:15:57', '2016-04-22 15:16:29'),
(18, 'qwe', 'qwe@qwe.s', '$2y$10$BgbBPh36PSBbii09JK/PS.sqM3cNbdinz0C/iA9Q.crSev6LKp6dS', '', NULL, '2016-04-22 14:47:36', '2016-04-22 14:47:36'),
(19, 'qwe', 'qwe@qwe.ss', '$2y$10$Ufw.UZj7QNecGquACtCXyOFXMl0iFdMcENdBZZZZrRjzcST7Gno76', '', NULL, '2016-04-22 14:51:23', '2016-04-22 14:51:23'),
(25, 'asd', 'qwe@qwe.sxczxc', '$2y$10$ETWr1qyoGpyC234DVe6k1./6pqua.E5g6CtopQkckXcXdGVYoI/b2', 'img/avatar/thumbnails/bCv5rC_22787-m-ce9ecea827b74c1b855a3aaeebde87a99f6aaa39.jpg', NULL, '2016-04-22 15:17:38', '2016-04-22 15:37:54'),
(26, 'koccur', '0de0lv0@gmail.com', '$2y$10$yLKxuM2DKAAFlGuyVYlVN.NjCaW56xTmHacLuJ47EBxheNzZjuF0y', 'img/avatar/thumbnails/ZXXJMu_Suits.S01E04.480p.vk007.mkv_snapshot_07.39_[2016.04.24_16.14.21].jpg', 'lDbFMS1P5r80VuwMquS5gm07CUCm5HXWZ2EMUoUQGZo863RPhugDw8vphmpE', '2016-04-28 11:17:38', '2016-04-28 11:19:00'),
(27, 'admin2', 'admin@change.me', '$2y$10$6LfXNctMraQnPtn4tiLqRO.YjS1ecQKxWsJnl.wqL6tXzQjCNA6T2', '', NULL, '2016-05-30 16:26:31', '2016-05-30 16:26:31'),
(28, 'Marcin', 'marcin@marcin.com', '$2y$10$iji0kt3UKajBRyztQmw.J.1f/rCArRGFk9vmRrYVGHnRawlB.UIAW', 'img/avatar/thumbnails/uofS4R_Suits.S01E04.480p.vk007.mkv_snapshot_07.39_[2016.04.24_16.14.21].jpg', 'whBbmBGzId54SfmYOq6ThGQg189yM581syAnnyjPoZPhk7zsc43p1VN8YhWs', '2016-05-31 17:54:20', '2016-06-06 05:42:18'),
(29, 'testuser', 'test@test1.comaaaaa5', '$2y$10$pkV.7xEYWuP/PPJ0f4KUm.5bzm.hY8kQpp4K8GMiR5SWYj.wukYsC', 'img/avatar/thumbnails/cultist.png', 'PFsY8UG5aL0RO3tBqm3lQy7DfpHKdwK3vCgFISch0vqMeD0ebtmEndCsZ7V0', '2016-05-31 18:32:31', '2016-05-31 18:32:44'),
(30, 'u2', 'u2@com.com', '$2y$10$h6uNDmcub.mCHEPVdNk3DuaD/vev3CIzRxzRGdTrkoWXsAuMPEqCa', 'img/avatar/thumbnails/cultist.png', 'vjdNngv08O69q3hcIrOvxRYdy8Lyb0vQoWUtqEKKQjHs2IFEclWf0AwKF7ME', '2016-06-06 04:37:13', '2016-06-06 04:41:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
