-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 22 nov. 2022 à 17:31
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(18, 'noqilumis', 'bycipoxobe@mailinator.com', 'Pa$$w0rd!'),
(19, 'cicup', 'cufup@mailinator.com', 'Pa$$w0rd!'),
(20, 'pizona', 'xosywuruca@mailinator.com', 'Pa$$w0rd!'),
(21, 'qopewole', 'qymevada@mailinator.com', 'Pa$$w0rd!'),
(22, 'vanaruj', 'nigu@mailinator.com', 'Pa$$w0rd!'),
(23, 'qyzah', 'favatab@mailinator.com', 'Pa$$w0rd!'),
(30, 'rigizuq', 'zyculy@mailinator.com', 'azerty12'),
(31, 'admin', 'admin@gmail.com', 'admin123'),
(33, 'admin', 'admin1@gmail.com', '0192023a7bbd73250516f069df18b500'),
(34, 'jewasahude', 'vecixipix@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(36, 'lygujal', 'wazen@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(37, 'cozinu', 'kahyke@mailinator.com', '857f9f2a2da8b447f4c3e2ff1e99a624'),
(38, 'wregtyi', 'maliri@gmail.com', 'e13f9c43d4d498e9a9900468fcfc5444'),
(39, 'wicowyx', 'rafecon@mailinator.com', '25d55ad283aa400af464c76d713c07ad'),
(40, 'luxuvo', 'todehi@mailinator.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `category_name`) VALUES
(1, 'Laptop'),
(2, 'Keyboard'),
(3, 'Mouse'),
(4, 'Games'),
(5, 'HeadPhones');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `title`, `quantity`, `category`, `price`, `image`) VALUES
(105, 'Eligendi alias quos ', 40, 3, 287, 'kfa2-gaming-slider-03-souris.jpg'),
(110, 'Rerum quis quis quia', 984, 4, 983, 'games4.jpg'),
(121, 'Cupiditate optio cu', 34, 4, 904, 'IMG-637cd2502df968.42550452.jpg'),
(123, 'Ea tempora ea anim e', 400, 1, 272, 'IMG-637cde97320c00.61568421.jpg'),
(124, 'Itaque qui duis alia', 248, 4, 302, 'keyboard2.jpg'),
(125, 'Deserunt temporibus ', 592, 1, 182, 'IMG-637cdedfb05e24.11557121.jpg'),
(127, 'Delectus impedit e', 143, 4, 851, 'games3.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
