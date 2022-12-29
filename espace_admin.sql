-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 01:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espace_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `prix` int(5) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `prix`, `description`, `image`) VALUES
(25, 'PLAYSTATION®5', 3599, 'Sony PlayStation 5 Édition Standard<br />\r\nPS5 avec 1 Manette Sans Fil DualSense', '41vzVUbpp7S._AC_SX679_.jpg'),
(26, 'PLAYSTATION®5', 3499, 'Sony PlayStation 5 Digital Edition <br />\r\nPS5 avec 1 Manette Sans Fil DualSense', '610+69ZsKCL._AC_SX679_.jpg'),
(27, 'Manette Sony PS5 ', 300, 'Manette Sans Fil DualSense<br />\r\n Couleur : Blanche', 'dqd.jpg'),
(36, 'MANETTE SONY PS5', 300, 'Manette Sans Fil DualSense<br />\r\nCouleur : noir', 'dualsense-noir.jpg'),
(39, 'Jeux PS5 Spider-Man', 160, 'Genre: Action &amp; Aventure - Classification: +16 ans - Plateforme: PS5 ', 'jeux-ps5-sm.jpg'),
(40, 'JEU PS5 CALL OF DUTY VANGUARD', 180, 'Genre: Action  - Classification: +18 ans - Plateforme: PS5 ', 'jeu-ps5-call-of-duty-vanguard.webp'),
(41, 'JEU PS5 ASSASSIN&#039;S CREED VALHALLA', 200, 'un RPG en monde ouvert sur PS5 se déroulant pendant l&#039;âge des vikings.', 'jeu-ps5-assassin-s-creed-valhalla.webp'),
(42, 'PLAYSTATION®4', 1700, 'Sony PlayStation 4 Pro 1To<br />\r\nPS4 avec 1 Manette Sans Fil DualSense', 'aa.jpg'),
(43, 'PLAYSTATION®4', 990, 'Sony PlayStation 4 Pro 500Go<br />\r\nPS4 avec 1 Manette Sans Fil DualSense', 'PS4-slim-console-standing-with-dualshock4.webp'),
(44, 'PLAYSTATION®4', 1999, 'Sony PlayStation 4 Pro 1To<br />\r\nPS4 avec 1 Manette Sans Fil DualSense', 'Console-Sony-PS4-Pro-1-To-Blanc.jpg'),
(45, 'PLAYSTATION®4', 1200, 'Sony PlayStation 4 Pro 1To<br />\r\n1 Manette Sans Fil DualSense+ Marvel Spider-Ma', 'Console-Sony-PS4-Slim-1-To-Noir-Marvel-Spider-Man (1).jpg'),
(46, 'MANETTE SONY PS4', 130, 'Manette Sans Fil DualSense<br />\r\nCouleur : noir', 'manette-ps4-dualshock-4-0-v2-jet-black-playstati.webp'),
(47, 'JEU PS4 GRAND THEFT AUTO V', 90, 'Genre: Action &amp; Aventure - Classification: +18 ans - Plateforme: PS4', 'gta-5-jeux-ps4-tunisie-gta5-jeux-playstation-4.jpg'),
(48, 'JEU PS4 UNCHARTED 4 : A THIEF&#039;S END', 75, 'Genre: Action &amp; Aventure -Classification: +16 ans-Plateforme: PS4', 'ps4-jeu-uncharted-4-a-thief-s-end.jpg'),
(49, 'Call of duty warfare infinite ', 55, 'Genres : guerre , Jeu de tir à la première personne -Développeurs ', 'call-of-duty-warfare-infinite-jeu-ps4.jpg'),
(51, 'aaa', 52, 'aaa', '610+69ZsKCL._AC_SX679_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `tel` int(8) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `mdp`, `tel`, `image`, `address`) VALUES
(1, 'nizar chaouch', 'nizar@gmail.com', '123456789', 52641650, 'nizar.jpg', '08 tarek ben zied '),
(2, 'nidhal', 'nidhal@gmail.com', 'nidhal123', 28647659, '', 'tarek ben zied'),
(3, 'Delectus unde reici', 'sete@mailinator.com', 'Pa$$w0rd!', 99150654, '', 'Esse esse doloribu'),
(4, 'Iusto quam inventore', 'sivyvawa@mailinator.com', 'Pa$$w0rd!', 22456182, '', 'Cupidatat molestiae '),
(5, 'Proident aliquid ad', 'vifukomuk@mailinator.com', 'Pa$$w0rd!', 85784412, '', 'Consequat Et totam '),
(6, 'Sit aliquip ut enim', 'bubomus@mailinator.com', 'Pa$$w0rd!', 57641659, '', 'Atque ipsam sit sun'),
(7, 'Reprehenderit conse', 'vywazatijo@mailinator.com', 'Pa$$w0rd!', 94450658, '', 'Itaque impedit dolo'),
(8, 'Dolor velit quos sit', 'mixigokubo@mailinator.com', 'Pa$$w0rd!', 90450653, '', 'Fugit eum minus vol'),
(9, 'Necessitatibus ullam', 'xibo@mailinator.com', 'Pa$$w0rd!', 59020693, '', 'Aut incidunt blandi'),
(10, 'nizar', 'niza19@gmail.com', '123456', 52641659, '', 'aaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
