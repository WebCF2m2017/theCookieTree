-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Juin 2017 à 12:33
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
(1, 'https://www.cbdcakes.com.au/files/2016/04/CBD_CaramelTorte.jpg', 1),
(2, 'http://us2guntur.com/images//10005img/CAKCON246_B_010314.jpg', 1),
(3, 'https://www.cbdcakes.com.au/files/2016/04/cbdcakes_traditionalmud.jpg', 1),
(4, 'https://www.cbdcakes.com.au/files/2016/04/CBD_MousseCakesBW.jpg', 2),
(5, 'http://www.thevelvetcakeco.com/wp-content/uploads/2016/04/Carrot-800x800-Naked-400x400.jpg', 2),
(6, 'https://www.cheesecake.com.au/media/catalog/product/cache/1/small_image/9df78eab33525d08d6e5fb8d27136e95/_/2/_2097_20Web_400_SCR_CheeseburgerCake.png', 2),
(7, 'https://www.landolakes.com/RecipeManagementSystem/media/Recipe-Media-Files/Recipes/Retail/DesktopImages/7862.jpg?ext=.jpg', 3),
(8, 'http://hangoutcakes.com/image/cache/data/wedding-cream/84-wtc-cc-5kg-cakes-400x400.jpg', 3),
(9, 'http://www.floraindia.com/pictures/99a.png', 3),
(10, 'https://d24pyncn3hxs0c.cloudfront.net/sites/default/files/styles/uc_product_full/public/Strawberry-Cake-Half-Kg-Floweraura.jpg?itok=qdX54EcX', 4),
(11, 'https://financierpatisserie.com/files/919f544c02480d460ed89a97a4c48baa_thumbnail_square.jpg', 4),
(12, 'https://www.meals.com/imagesrecipes/30066x400.jpg', 4),
(13, 'http://www.thevelvetcakeco.com/wp-content/uploads/2016/04/Hummingbird-800x800-Naked-400x400.jpg', 5),
(14, 'http://cinottisbakery.com/wp-content/uploads/2015/11/Baby-Shower-Cake-Baby-butt-mommy-to-be-Pastel-pink-blue-Cinottis-Bakery-buttercream-icing-fondant-400x400.jpg', 5),
(15, 'https://d1xs5fw35mbn8b.cloudfront.net/p/m/p-round-black-forest-cake-half-kg--13461-m.jpg?v=1497662497000', 5);

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `categ_id`) VALUES
(1, 'gateaux 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 1),
(2, 'gateaux 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 1),
(3, 'gateaux 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 1),
(4, 'gateaux 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 2),
(5, 'gateaux 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
