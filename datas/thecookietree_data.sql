-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Juin 2017 à 12:18
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

--
-- Contenu de la table `categ`
--

INSERT INTO `categ` (`id`, `types`) VALUES
(1, 'Gluten free'),
(2, 'Vegan');

--
-- Contenu de la table `img`
--

INSERT INTO `img` (`id`, `url`, `Produits_id`) VALUES
(1, 'https://i2.wp.com/www.sippitysup.com/wp-content/uploads/drupal-images/plumtorteweb_0.jpg?fit=400%2C400&ssl=1', 1),
(2, 'https://irp-cdn.multiscreensite.com/3dd67886/dms3rep/multi/mobile/dolcetto-patisserie-and-cafe-tortes-and-gateaux-pic05-400x400.jpg', 1),
(3, 'https://irp-cdn.multiscreensite.com/3dd67886/dms3rep/multi/mobile/dolcetto-patisserie-and-cafe-tortes-and-gateaux-pic09-400x400.jpg', 1),
(4, 'http://www.auxdelicesdupalais.net/wp-content/uploads/2017/06/G%C3%A2teaux-Aid-2017-modernes-et-traditionnels.jpg', 2),
(5, 'https://cdn.shopify.com/s/files/1/0317/5261/products/pinata_large.png?v=1456870088', 2),
(6, 'https://www.metro.ca/userfiles/image/recipes/gateaux-miniatures-au-mascarpone-10254.jpg', 2),
(7, 'http://www.algerlablanche.com/cuisine/images/mchekla.jpg', 3),
(8, 'https://irp-cdn.multiscreensite.com/3dd67886/dms3rep/multi/mobile/dolcetto-patisserie-and-cafe-tortes-and-gateaux-pic12-400x400.jpg', 3),
(9, 'https://irp-cdn.multiscreensite.com/3dd67886/dms3rep/multi/mobile/dolcetto-patisserie-and-cafe-tortes-and-gateaux-pic03-400x400.jpg', 3),
(10, 'https://www.metro.ca/userfiles/image/recipes/Mini-gateaux-9.jpg', 4),
(11, 'http://www.lechefuniforms.com/galleria/img/w_Mini-gateaux-2.jpg', 4),
(12, 'https://www.metro.ca/userfiles/image/recipes/gateau-sans-farine-caramel-dattes-noisettes-lindt-6590.jpg', 4),
(13, 'http://www.lechefuniforms.com/galleria/img/w_Gateaux-Francaise.jpg', 5),
(14, 'http://www.algerlablanche.com/thematiques/images/cuisine/kefta.jpg', 5),
(15, 'https://www.metro.ca/userfiles/image/recipes/petits-gateaux-amandes-5267.jpg', 5);

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `categ_id`) VALUES
(1, 'Gateaux 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1),
(2, 'Gateaux 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 2),
(3, 'Gateaux 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1),
(4, 'Gateaux 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 2),
(5, 'Gateaux 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
