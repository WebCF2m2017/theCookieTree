-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Mai 2017 à 11:55
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thecookietree`
--

-- --------------------------------------------------------

--
-- Structure de la table `categ`
--

CREATE TABLE `categ` (
  `id` int(10) UNSIGNED NOT NULL,
  `types` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categ`
--

INSERT INTO `categ` (`id`, `types`) VALUES
(1, 'Gluten free'),
(2, 'Vegan');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission` int(10) UNSIGNED NOT NULL,
  `util_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

CREATE TABLE `img` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `produits_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `img`
--

INSERT INTO `img` (`id`, `url`, `produits_id`) VALUES
(2, 'https://scontent-amt2-1.xx.fbcdn.net/v/t1.0-9/17523371_1883794808545417_5979494171983979335_n.jpg?oh=7b47f34eaf37dd96d9716ba4dc441628&oe=59B9ACC0', 2),
(3, 'http://www.primrose-bakery.co.uk/shop/content/images/thumbs/0000362_chocolate-layer-cake.jpeg', 3),
(4, 'http://d2gk7xgygi98cy.cloudfront.net/6527-3-large.jpg', 4),
(5, 'https://www.bbcgoodfood.com/sites/default/files/styles/category_retina/public/chocolate-avocado-cake.jpg?itok=E2eWE_Dx', 2),
(6, 'https://www.bbcgoodfood.com/sites/default/files/styles/category_retina/public/recipe-collections/collection-image/2013/05/rosewater-raspberry-sponge-cake.jpg?itok=OVpUSQm9', 2),
(7, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe_images/recipe-image-legacy-id--364199_12.jpg?itok=SQT-JZQw', 3),
(8, 'https://www.bbcgoodfood.com/sites/default/files/styles/category_retina/public/cherrycake_0.jpg?itok=IwvfZchz', 3),
(9, 'https://i4.fnp.com/images/pr/l/truffle-cake-half-kg_1.jpg', 4),
(10, 'https://www.patisserie-valerie.co.uk/products/WedWhteCig.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(80) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `categ_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `categ_id`) VALUES
(2, 'Gateaux 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dicta fugiat modi fugit, ex, aspernatur ipsam! Odio, quidem odit ipsa porro nesciunt a! Voluptates ipsum, voluptas sit ea laudantium voluptate.', 1),
(3, 'Gateaux 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dicta fugiat modi fugit, ex, aspernatur ipsam! Odio, quidem odit ipsa porro nesciunt a! Voluptates ipsum, voluptas sit ea laudantium voluptate.', 2),
(4, 'Gateaux 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dicta fugiat modi fugit, ex, aspernatur ipsam! Odio, quidem odit ipsa porro nesciunt a! Voluptates ipsum, voluptas sit ea laudantium voluptate.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `util`
--

CREATE TABLE `util` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(60) NOT NULL,
  `mdp` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_droit_util_idx` (`util_id`);

--
-- Index pour la table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_img_Produits1_idx` (`produits_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Produits_categ1_idx` (`categ_id`);

--
-- Index pour la table `util`
--
ALTER TABLE `util`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categ`
--
ALTER TABLE `categ`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `util`
--
ALTER TABLE `util`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `droit`
--
ALTER TABLE `droit`
  ADD CONSTRAINT `fk_droit_util` FOREIGN KEY (`util_id`) REFERENCES `util` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `fk_img_Produits1` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_Produits_categ1` FOREIGN KEY (`categ_id`) REFERENCES `categ` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
