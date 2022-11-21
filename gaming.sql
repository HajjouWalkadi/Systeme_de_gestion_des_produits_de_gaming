-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 nov. 2022 à 16:26
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
(36, 'lygujal', 'wazen@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3');

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
  `image` varchar(225)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `title`, `quantity`, `category`, `price`) VALUES
(61, 'Beatae quis ', 54, 2, 567),
(62, 'ADD', 33, 3, 401),
(64, 'JBL', 120, 5, 1250),
(65, 'Enim doloribus sapie', 658, 2, 862),
(73, 'Dicta qui volu TT', 133, 1, 851);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
