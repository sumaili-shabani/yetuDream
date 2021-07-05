-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 juil. 2021 à 16:49
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kase`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `idc` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(300) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_priceTotal` int(11) DEFAULT NULL,
  `product_image` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`idc`, `product_id`, `product_name`, `quantity`, `product_priceTotal`, `product_image`, `user_id`, `product_price`) VALUES
(88, 51, 'bic coco', 1, 2, '1678487290.png', 11, 2),
(89, 39, 'Rame 4GO', 4, 32, '1178653809.jfif', 11, 8),
(98, 15, 'Iphone 6', 1, 120, '2058948256.jfif', 14, 120),
(99, 56, 'Radio casette', 1, 50, '606640221.jfif', 14, 50),
(113, 15, 'Iphone 6', 1, 120, '2058948256.jfif', 15, 120),
(114, 15, 'Iphone 6', 1, 120, '2058948256.jfif', 15, 120),
(115, 21, 'Samsing galaxy', 2, 260, '1646935833.jpg', 15, 130),
(116, 1, 'veste home', 1, 60, '1353395525.jpg', 12, 60),
(117, 53, 'stylo obama', 2, 2, '201181483.jfif', 12, 1),
(118, 56, 'Radio casette', 1, 50, '606640221.jfif', 11, 50),
(123, 43, 'appareil  professionel', 1, 200, '194996568.png', 17, 200);

-- --------------------------------------------------------

--
-- Structure de la table `cart2`
--

CREATE TABLE `cart2` (
  `idc` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(300) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_priceTotal` int(11) DEFAULT NULL,
  `product_image` varchar(300) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart2`
--

INSERT INTO `cart2` (`idc`, `product_id`, `product_name`, `quantity`, `product_priceTotal`, `product_image`, `product_price`) VALUES
(44, 21, 'Samsing galaxy', 1, 130, '1646935833.jpg', 130),
(46, 62, 'bukare', 1, 40, '623062056.jfif', 40),
(47, 61, 'Suppra', 1, 200, '1368837355.jpg', 200);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idcat` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcat`, `nom`, `created_at`) VALUES
(1, 'Appareil électronique ', '2021-04-12 16:03:04'),
(2, 'téléphone android', '2021-04-12 16:03:16'),
(3, 'téléphone mobile', '2021-04-12 16:03:23'),
(4, 'vêtement', '2021-04-12 16:03:33'),
(5, 'Appareil électromagnétique', '2021-04-12 15:44:45'),
(8, 'Souliers', '2021-04-14 20:31:10');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `sujet` varchar(700) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `fichier` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `sujet`, `message`, `fichier`, `created_at`) VALUES
(5, 'yuma kayanda françois', 'yuma@gmail.com', 'savoir plus sur vous le sport', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '721465673.JPG', '2020-09-07 19:39:30'),
(7, 'kasumba kipindula bertin', 'kasumba@gmail.com', 'information personnele sur le podcast', 'bonjour le doyen! ', '851559741.jpg', '2021-02-07 17:28:00'),
(8, 'pataule', 'pataule@gmail.com', 'savoir plus sur vous le produit', 'je voudrais savoir les informations sur le cacao', NULL, '2021-05-15 20:18:13'),
(9, 'king lebon', 'king@gmail.com', 'on est en pleine guerre de mode', 'coucou', '1928290491.png', '2021-05-15 20:19:39'),
(10, 'sifa abeli', 'mikah@gmail.com', 'j\'aimerai savoir les informations sur...', 'coucou', NULL, '2021-05-15 20:20:04'),
(11, 'lula seguobe', 'lula@gmail.com', 'my life it never goes swolly', 'Je voudrai avoir un style de fashion', '1459638729.jpg', '2021-05-22 11:45:12'),
(12, 'sumaili shabani', 'info.devtech@gmail.com', 'information personnele sur le podcast', 'cool', NULL, '2021-05-22 11:46:03'),
(13, 'pacifique molo', 'molo@gmail.com', 'demande d\'information', 'bonjour', '1685355886.jpg', '2021-06-12 10:45:19');

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE `entree` (
  `ide` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `QteEntree` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`ide`, `product_id`, `QteEntree`, `created_at`) VALUES
(2, 65, 5, '2021-04-21 21:13:49'),
(3, 64, 42, '2021-04-21 21:15:53'),
(4, 62, 80, '2021-04-21 21:16:45'),
(5, 61, 5, '2021-04-27 14:09:55'),
(6, 48, 10, '2021-04-27 14:10:11'),
(7, 51, 2, '2021-04-29 18:40:12'),
(8, 48, 5, '2021-05-24 15:33:49'),
(9, 63, 5, '2021-07-05 07:58:52'),
(10, 63, 1, '2021-07-05 07:59:33');

-- --------------------------------------------------------

--
-- Structure de la table `favories`
--

CREATE TABLE `favories` (
  `idfovorie` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favories`
--

INSERT INTO `favories` (`idfovorie`, `id_user`, `product_id`, `created_at`) VALUES
(3, 12, 62, '2021-05-03 10:21:18'),
(5, 12, 60, '2021-05-04 10:47:15'),
(6, 12, 51, '2021-05-04 10:51:27'),
(7, 12, 65, '2021-05-05 10:37:10'),
(8, 12, 61, '2021-05-05 17:38:28'),
(10, 11, 16, '2021-05-12 17:52:07'),
(11, 11, 62, '2021-05-12 17:52:20'),
(12, 11, 17, '2021-05-12 17:52:27'),
(13, 11, 6, '2021-05-12 17:52:49'),
(14, 14, 15, '2021-05-20 16:00:35'),
(15, 14, 14, '2021-05-20 16:00:42'),
(16, 14, 5, '2021-05-20 16:01:00'),
(17, 14, 35, '2021-05-20 16:01:06');

-- --------------------------------------------------------

--
-- Structure de la table `favories2`
--

CREATE TABLE `favories2` (
  `idfovorie` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favories2`
--

INSERT INTO `favories2` (`idfovorie`, `product_id`, `created_at`) VALUES
(18, 61, '2021-07-05 07:17:39'),
(19, 62, '2021-07-05 07:17:42');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `fiche_de_stock`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `fiche_de_stock` (
`product_id` int(11)
,`product_name` varchar(300)
,`qte_stock` int(11)
,`pu_stock` int(11)
,`pt_stock` bigint(21)
,`qte_E` int(11)
,`pu_E` int(11)
,`pt_E` bigint(21)
,`qte_s` int(11)
,`pu_s` int(11)
,`pt_s` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure de la table `galery`
--

CREATE TABLE `galery` (
  `idgalery` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `photos` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `galery`
--

INSERT INTO `galery` (`idgalery`, `product_id`, `photos`) VALUES
(1, 60, '1188433174.jfif'),
(2, 60, '403086821.jfif'),
(3, 60, '1834373461.jfif'),
(4, 60, '554317879.jfif'),
(5, 61, '1626738481.jfif'),
(6, 61, '1285398564.jfif'),
(7, 64, '2097686706.jfif'),
(8, 65, '515768983.png'),
(9, 65, '606711057.png'),
(10, 65, '2053483349.png'),
(11, 65, '1623537440.png'),
(13, 48, '2145399589.png'),
(14, 48, '347149671.png'),
(15, 48, '752162190.png');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` varchar(800) DEFAULT NULL,
  `url` varchar(800) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `icone` varchar(300) DEFAULT NULL,
  `titre` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `message`, `url`, `id_user`, `created_at`, `icone`, `titre`) VALUES
(2, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/385427116-233545gtr2w', 8, '2021-05-19 12:18:29', 'fa fa-money', 'Tentative de paiement'),
(3, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/385427116-233545gtr2w', 9, '2021-05-19 12:18:29', 'fa fa-money', 'Tentative de paiement'),
(5, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1875025167-12345678', 8, '2021-05-19 12:19:03', 'fa fa-money', 'Tentative de paiement'),
(6, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1875025167-12345678', 9, '2021-05-19 12:19:03', 'fa fa-money', 'Tentative de paiement'),
(9, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/679748893-234df', 8, '2021-05-20 15:20:20', 'fa fa-money', 'Tentative de paiement'),
(10, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/679748893-234df', 9, '2021-05-20 15:20:20', 'fa fa-money', 'Tentative de paiement'),
(12, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/805226059-Gty234', 8, '2021-05-20 15:21:43', 'fa fa-money', 'Tentative de paiement'),
(13, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/805226059-Gty234', 9, '2021-05-20 15:21:43', 'fa fa-money', 'Tentative de paiement'),
(15, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'admin/paiement_pading/769849969-Gty234', 8, '2021-05-20 15:24:38', 'fa fa-money', 'Tentative de paiement'),
(16, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/769849969-Gty234', 9, '2021-05-20 15:24:38', 'fa fa-money', 'Tentative de paiement'),
(18, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1922795748-541et4', 8, '2021-05-20 15:26:00', 'fa fa-money', 'Tentative de paiement'),
(19, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1922795748-541et4', 9, '2021-05-20 15:26:00', 'fa fa-money', 'Tentative de paiement'),
(21, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1036290997-234df', 8, '2021-05-20 15:27:04', 'fa fa-money', 'Tentative de paiement'),
(22, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1036290997-234df', 9, '2021-05-20 15:27:04', 'fa fa-money', 'Tentative de paiement'),
(23, 'Bonjour yuma kayanda votre paiement a été validé avec succès ????', 'user/facturePaiement/1922795748-541et4', 11, '2021-05-20 15:29:51', 'fa fa-check', 'Félicitation! votre paiement a été approuvé'),
(26, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1291076274-34der2', 8, '2021-05-20 15:32:43', 'fa fa-money', 'Tentative de paiement'),
(27, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1291076274-34der2', 9, '2021-05-20 15:32:43', 'fa fa-money', 'Tentative de paiement'),
(29, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1845569789-12345678', 8, '2021-05-20 15:34:27', 'fa fa-money', 'Tentative de paiement'),
(30, 'Nouvelle tentative de paiement yuma kayanda vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1845569789-12345678', 9, '2021-05-20 15:34:27', 'fa fa-money', 'Tentative de paiement'),
(32, 'kakese pandamiti Vient de rejoindre la plateforme ', 'admin/users', 8, '2021-05-20 15:36:56', 'fa fa-user', 'Nouvelle inscription'),
(34, 'Nouvelle tentative de paiement kakese pandamiti vient de tenter de confirmer  son paiement', 'admin/paiement_pading/450104471-RE18HB1', 8, '2021-05-20 15:40:36', 'fa fa-money', 'Tentative de paiement'),
(35, 'Nouvelle tentative de paiement kakese pandamiti vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/450104471-RE18HB1', 9, '2021-05-20 15:40:36', 'fa fa-money', 'Tentative de paiement'),
(37, 'Nouvelle tentative de paiement kakese pandamiti vient de tenter de confirmer  son paiement', 'admin/paiement_pading/871793921-Gty234', 8, '2021-05-20 15:42:11', 'fa fa-money', 'Tentative de paiement'),
(38, 'Nouvelle tentative de paiement kakese pandamiti vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/871793921-Gty234', 9, '2021-05-20 15:42:11', 'fa fa-money', 'Tentative de paiement'),
(39, 'Bonjour kakese pandamiti votre paiement a été validé avec succès ????', 'user/facturePaiement/450104471-RE18HB1', 14, '2021-05-20 15:59:27', 'fa fa-check', 'Félicitation d\'avance!!!'),
(41, 'Nouvelle tentative de paiement kakese pandamiti vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1058693437-rtv4qw', 8, '2021-05-20 16:11:06', 'fa fa-money', 'Tentative de paiement'),
(42, 'Nouvelle tentative de paiement kakese pandamiti vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1058693437-rtv4qw', 9, '2021-05-20 16:11:06', 'fa fa-money', 'Tentative de paiement'),
(45, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/1875025167-12345678', 12, '2021-05-20 17:43:11', 'fa fa-check', 'Félicitation d\'avance!!!'),
(46, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/1875025167-12345678', 12, '2021-05-20 17:43:41', 'fa fa-check', 'Félicitation d\'avance!!!'),
(51, 'Bonjour kakese pandamiti votre paiement a été validé avec succès ????', 'user/facturePaiement/450104471-RE18HB1', 14, '2021-05-21 08:16:58', 'fa fa-check', 'Félicitation d\'avance!!!'),
(53, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/158192831-fgr43', 8, '2021-05-21 08:29:08', 'fa fa-money', 'Tentative de paiement'),
(54, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/158192831-fgr43', 9, '2021-05-21 08:29:08', 'fa fa-money', 'Tentative de paiement'),
(57, 'Bonjour yuma kayanda votre paiement a été validé avec succès ????', 'user/facturePaiement/1922795748-541et4', 11, '2021-05-21 08:41:56', 'fa fa-check', 'Félicitation d\'avance!!!'),
(58, 'Bonjour yuma kayanda votre paiement a été validé avec succès ????', 'user/facturePaiement/1036290997-234df', 11, '2021-05-21 08:42:41', 'fa fa-check', 'Félicitation d\'avance!!!'),
(59, 'Bonjour yuma kayanda votre paiement a été validé avec succès ????', 'user/facturePaiement/1291076274-34der2', 11, '2021-05-22 12:58:58', 'fa fa-check', 'Félicitation d\'avance!!!'),
(60, 'Bonjour yuma kayanda votre paiement a été validé avec succès ????', 'user/facturePaiement/1291076274-34der2', 11, '2021-05-22 13:00:20', 'fa fa-check', 'Félicitation d\'avance!!!'),
(61, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/565885790-Gty234', 7, '2021-05-24 15:19:06', 'fa fa-money', 'Tentative de paiement'),
(62, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/565885790-Gty234', 8, '2021-05-24 15:19:06', 'fa fa-money', 'Tentative de paiement'),
(63, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/565885790-Gty234', 9, '2021-05-24 15:19:06', 'fa fa-money', 'Tentative de paiement'),
(64, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/565885790-Gty234', 12, '2021-05-24 15:42:45', 'fa fa-check', 'Félicitation d\'avance!!!'),
(65, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1205131417-5666rt6', 7, '2021-06-12 10:49:18', 'fa fa-money', 'Tentative de paiement'),
(66, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1205131417-5666rt6', 8, '2021-06-12 10:49:18', 'fa fa-money', 'Tentative de paiement'),
(67, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1205131417-5666rt6', 9, '2021-06-12 10:49:18', 'fa fa-money', 'Tentative de paiement'),
(68, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/1205131417-5666rt6', 12, '2021-06-12 10:52:30', 'fa fa-check', 'Félicitation d\'avance!!!'),
(69, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/1205131417-5666rt6', 12, '2021-06-12 10:53:24', 'fa fa-check', 'Félicitation d\'avance!!!'),
(70, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/1205131417-5666rt6', 12, '2021-06-12 10:55:45', 'fa fa-check', 'Félicitation d\'avance!!!'),
(72, 'patrice lufimbo Vient de rejoindre la plateforme ', 'admin/users', 7, '2021-06-12 12:32:00', 'fa fa-user', 'Nouvelle inscription'),
(73, 'patrice lufimbo Vient de rejoindre la plateforme ', 'admin/users', 8, '2021-06-12 12:32:00', 'fa fa-user', 'Nouvelle inscription'),
(74, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1066446620-56web1001', 7, '2021-06-12 13:02:31', 'fa fa-money', 'Tentative de paiement'),
(75, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1066446620-56web1001', 8, '2021-06-12 13:02:31', 'fa fa-money', 'Tentative de paiement'),
(76, 'Nouvelle tentative de paiement kasumba kipundula vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1066446620-56web1001', 9, '2021-06-12 13:02:32', 'fa fa-money', 'Tentative de paiement'),
(77, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/1066446620-56web1001', 12, '2021-06-12 13:05:13', 'fa fa-check', 'Félicitation d\'avance!!!'),
(78, 'Bonjour kasumba kipundula votre paiement a été validé avec succès ????', 'user/facturePaiement/679748893-234df', 12, '2021-07-05 07:21:34', 'fa fa-check', 'Félicitation d\'avance!!!'),
(79, 'Bonjour yuma kayanda votre paiement a été validé avec succès ????', 'user/facturePaiement/1036290997-234df', 11, '2021-07-05 07:23:18', 'fa fa-check', 'Félicitation d\'avance!!!'),
(80, 'Bonjour kasumba kipundula votre paiement a été invalidé pour une raison valable. pour plus d\'information contacter l\'administration pour une explication valable', 'user/achat', 12, '2021-07-05 07:23:58', 'fa fa-check', 'Désolé  kasumba kipundula'),
(81, 'mikah kalume Vient de rejoindre la plateforme ', 'admin/users', 7, '2021-07-05 07:43:12', 'fa fa-user', 'Nouvelle inscription'),
(82, 'mikah kalume Vient de rejoindre la plateforme ', 'admin/users', 8, '2021-07-05 07:43:12', 'fa fa-user', 'Nouvelle inscription'),
(83, 'Nouvelle tentative de paiement mikah kalume vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1646859514-56fe2', 7, '2021-07-05 07:48:02', 'fa fa-money', 'Tentative de paiement'),
(84, 'Nouvelle tentative de paiement mikah kalume vient de tenter de confirmer  son paiement', 'admin/paiement_pading/1646859514-56fe2', 8, '2021-07-05 07:48:02', 'fa fa-money', 'Tentative de paiement'),
(85, 'Nouvelle tentative de paiement mikah kalume vient de tenter de confirmer  son paiement', 'entreprise/paiement_pading/1646859514-56fe2', 9, '2021-07-05 07:48:02', 'fa fa-money', 'Tentative de paiement');

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pading_vente`
--

CREATE TABLE `pading_vente` (
  `idv` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(300) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_priceTotal` int(11) DEFAULT NULL,
  `product_image` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(300) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `etat_vente` int(11) DEFAULT 0,
  `token` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pading_vente`
--

INSERT INTO `pading_vente` (`idv`, `product_id`, `product_name`, `quantity`, `product_price`, `product_priceTotal`, `product_image`, `user_id`, `code`, `created_at`, `etat_vente`, `token`) VALUES
(6, 29, 'Ordinateur lenovo', 2, 230, 460, '618456468.jfif', 12, '1875025167-12345678', '2021-05-19 12:19:02', 1, '12345678'),
(7, 50, 'bic v2', 1, 1, 1, '1231307858.png', 12, '1875025167-12345678', '2021-05-19 12:19:02', 1, '12345678'),
(8, 52, 'stylo bic', 4, 1, 4, '1868878333.png', 12, '679748893-234df', '2021-05-20 15:20:19', 1, '234df'),
(9, 31, 'batterie hp ', 1, 15, 15, '429482960.jpg', 12, '679748893-234df', '2021-05-20 15:20:20', 1, '234df'),
(13, 56, 'Radio casette', 1, 50, 50, '606640221.jfif', 11, '769849969-Gty234', '2021-05-20 15:24:38', 0, 'Gty234'),
(14, 27, 'Ordinateur Hp elitebook', 1, 200, 200, '771999033.jfif', 11, '769849969-Gty234', '2021-05-20 15:24:38', 0, 'Gty234'),
(17, 55, 'my radio v1', 1, 10, 10, '259426821.jfif', 11, '1036290997-234df', '2021-05-20 15:27:03', 1, '234df'),
(18, 54, 'stylo de luxe', 23, 1, 23, '970405610.jfif', 11, '1036290997-234df', '2021-05-20 15:27:03', 1, '234df'),
(19, 38, 'rame 2GO', 1, 5, 5, '1046108500.jfif', 11, '1291076274-34der2', '2021-05-20 15:32:42', 1, '34der2'),
(20, 33, 'batterie makitosh', 1, 150, 150, '462337587.jpg', 11, '1291076274-34der2', '2021-05-20 15:32:43', 1, '34der2'),
(24, 9, 'robe', 1, 30, 30, '1794647316.jfif', 14, '450104471-RE18HB1', '2021-05-20 15:40:36', 1, 'RE18HB1'),
(25, 49, 'stylo meilleur', 12, 3, 36, '1200937382.png', 14, '450104471-RE18HB1', '2021-05-20 15:40:36', 1, 'RE18HB1'),
(26, 15, 'Iphone 6', 1, 120, 120, '2058948256.jfif', 14, '871793921-Gty234', '2021-05-20 15:42:11', 0, 'Gty234'),
(27, 43, 'appareil  professionel', 12, 200, 2400, '194996568.png', 14, '871793921-Gty234', '2021-05-20 15:42:11', 0, 'Gty234'),
(39, 48, 'githard qbase', 1, 100, 100, '1518292916.png', 12, '1205131417-5666rt6', '2021-06-12 10:49:17', 1, '5666rt6'),
(40, 56, 'Radio casette', 1, 50, 50, '606640221.jfif', 12, '1205131417-5666rt6', '2021-06-12 10:49:17', 1, '5666rt6'),
(41, 13, 'Iphone v2', 1, 140, 140, '33367744.jfif', 12, '1066446620-56web1001', '2021-06-12 13:02:31', 0, '56web1001'),
(42, 21, 'Samsing galaxy', 1, 130, 130, '1646935833.jpg', 17, '1646859514-56fe2', '2021-07-05 07:48:01', 0, '56fe2'),
(43, 62, 'bukare', 1, 40, 40, '623062056.jfif', 17, '1646859514-56fe2', '2021-07-05 07:48:02', 0, '56fe2'),
(44, 61, 'Suppra', 1, 200, 200, '1368837355.jpg', 17, '1646859514-56fe2', '2021-07-05 07:48:02', 0, '56fe2');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `idp` int(11) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `telephone` varchar(300) DEFAULT NULL,
  `adresse1` varchar(300) DEFAULT NULL,
  `adresse2` varchar(300) DEFAULT NULL,
  `idpersonne` int(11) DEFAULT NULL,
  `date_paie` date DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `motif` text DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `etat_paiement` int(11) DEFAULT 0,
  `code` varchar(300) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`idp`, `first_name`, `last_name`, `email`, `telephone`, `adresse1`, `adresse2`, `idpersonne`, `date_paie`, `montant`, `motif`, `token`, `etat_paiement`, `code`, `year`, `month`, `created_at`) VALUES
(2, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-19', 461, 'airtel money', '12345678', 1, '1875025167-12345678', '2021', 'May', '2021-05-20 15:16:26'),
(3, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'katoyi', 11, '2021-05-20', 220, 'airtel money', '541et4', 1, '1922795748-541et4', '2021', 'May', '2021-05-20 15:29:51'),
(5, 'kakese pandamiti', 'Patrick', 'kakese@gmail.com', '0816532574', 'Bdgl goma', 'ERCW2', 14, '2021-05-20', 66, 'airtel money', 'RE18HB1', 1, '450104471-RE18HB1', '2021', 'May', '2021-05-20 15:59:27'),
(7, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'katoyi', 11, '2021-05-20', 33, 'airtel money', '234df', 1, '1036290997-234df', '2021', 'May', '2021-05-21 08:42:41'),
(8, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'katoyi', 11, '2021-05-20', 155, 'm-pesa', '34der2', 1, '1291076274-34der2', '2021', 'May', '2021-05-22 12:58:58'),
(9, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-24', 64, 'airtel money', 'Gty234', 0, '565885790-Gty234', '2021', 'May', '2021-05-24 15:42:45'),
(10, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere papirus', 12, '2021-06-12', 150, 'airtel money', '5666rt6', 1, '1205131417-5666rt6', '2021', 'June', '2021-06-12 10:52:30'),
(12, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-20', 19, 'airtel money', '234df', 0, '679748893-234df', '2021', 'July', '2021-07-05 07:21:34');

-- --------------------------------------------------------

--
-- Structure de la table `paiement_pading`
--

CREATE TABLE `paiement_pading` (
  `idp` int(11) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `telephone` varchar(300) DEFAULT NULL,
  `adresse1` varchar(300) DEFAULT NULL,
  `adresse2` varchar(300) DEFAULT NULL,
  `idpersonne` int(11) DEFAULT NULL,
  `date_paie` date DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `motif` text DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `code` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement_pading`
--

INSERT INTO `paiement_pading` (`idp`, `first_name`, `last_name`, `email`, `telephone`, `adresse1`, `adresse2`, `idpersonne`, `date_paie`, `montant`, `motif`, `token`, `created_at`, `code`) VALUES
(1, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-19', 1120, 'm-pesa', '233545gtr2w', '2021-05-19 12:18:28', '385427116-233545gtr2w'),
(2, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-19', 461, 'airtel money', '12345678', '2021-05-19 12:19:02', '1875025167-12345678'),
(3, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-20', 19, 'airtel money', '234df', '2021-05-20 15:20:19', '679748893-234df'),
(4, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-20', 26, 'm-pesa', 'Gty234', '2021-05-20 15:21:42', '805226059-Gty234'),
(5, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'birere', 11, '2021-05-20', 250, 'm-pesa', 'Gty234', '2021-05-20 15:24:37', '769849969-Gty234'),
(6, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'katoyi', 11, '2021-05-20', 220, 'airtel money', '541et4', '2021-05-20 15:25:59', '1922795748-541et4'),
(7, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'katoyi', 11, '2021-05-20', 220, 'airtel money', '541et4', '2021-05-20 15:26:00', '1165727900-541et4'),
(8, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'katoyi', 11, '2021-05-20', 33, 'airtel money', '234df', '2021-05-20 15:27:03', '1036290997-234df'),
(9, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', 'katoyi', 11, '2021-05-20', 155, 'm-pesa', '34der2', '2021-05-20 15:32:42', '1291076274-34der2'),
(10, 'yuma kayanda', 'françois', 'yuma@gmail.com', '+243823187085', 'katoyi goma', '1fWE12', 11, '2021-05-20', 308, 'm-pesa', '12345678', '2021-05-20 15:34:26', '1845569789-12345678'),
(11, 'kakese pandamiti', 'Patrick', 'kakese@gmail.com', '0816532574', 'Bdgl goma', 'ERCW2', 14, '2021-05-20', 66, 'airtel money', 'RE18HB1', '2021-05-20 15:40:35', '450104471-RE18HB1'),
(12, 'kakese pandamiti', 'Patrick', 'kakese@gmail.com', '0816532574', 'Bdgl goma', 'bdgl', 14, '2021-05-20', 2520, 'airtel money', 'Gty234', '2021-05-20 15:42:11', '871793921-Gty234'),
(13, 'kakese pandamiti', 'Patrick', 'kakese@gmail.com', '0816532574', 'Bdgl goma', 'birere', 14, '2021-05-20', 1970, 'm-pesa', 'rtv4qw', '2021-05-20 16:11:05', '1058693437-rtv4qw'),
(14, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-21', 561, 'm-pesa', 'fgr43', '2021-05-21 08:29:08', '158192831-fgr43'),
(15, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere', 12, '2021-05-24', 64, 'airtel money', 'Gty234', '2021-05-24 15:19:06', '565885790-Gty234'),
(16, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'birere papirus', 12, '2021-06-12', 150, 'airtel money', '5666rt6', '2021-06-12 10:49:17', '1205131417-5666rt6'),
(17, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '+243810409151', 'Quartier birere', 'Quartier birere papiris', 12, '2021-06-12', 140, 'm-pesa', '56web1001', '2021-06-12 13:02:31', '1066446620-56web1001'),
(18, 'mikah kalume', 'kitoko', 'mikah@gmail.com', '+243810409151', '3 lampes Goma', '3 lampes Goma', 17, '2021-07-05', 370, 'm-pesa', '56fe2', '2021-07-05 07:48:01', '1646859514-56fe2');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(300) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_image` varchar(300) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `Qte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_image`, `id_user`, `Qte`) VALUES
(1, 4, 'veste home', 60, '1353395525.jpg', 7, 120),
(2, 4, 'veste home v2', 40, '307172483.jfif', 7, 120),
(3, 4, 'veste home v3', 50, '868937702.jfif', 7, 120),
(4, 4, 'veste top', 70, '1816464444.jfif', 7, 120),
(5, 4, 'veste top v1', 90, '1104489618.jfif', 7, 120),
(6, 4, 'vesto', 15, '1626671099.jfif', 7, 120),
(7, 4, 'vesto class', 60, '209993326.jfif', 7, 120),
(8, 4, 'robe de luxe v2', 36, '428123424.jfif', 7, 120),
(9, 4, 'robe', 30, '1794647316.jfif', 7, 120),
(10, 4, 'robe de luxe', 26, '906852663.jfif', 7, 120),
(11, 4, 'robe v2', 40, '156543730.jfif', 7, 120),
(12, 4, 'my robe', 12, '2033612508.jfif', 7, 120),
(13, 3, 'Iphone v2', 140, '33367744.jfif', 7, 120),
(14, 3, 'Iphone v1', 320, '516404981.jfif', 7, 120),
(15, 3, 'Iphone 6', 120, '2058948256.jfif', 7, 120),
(16, 3, 'houwei v2', 200, '1130133432.jfif', 7, 120),
(17, 3, 'Iphone', 230, '546785424.jfif', 7, 120),
(18, 2, 'Techno W4', 75, '105065606.jfif', 7, 120),
(19, 2, 'houwei v2', 140, '464168104.jfif', 7, 120),
(20, 2, 'houwei', 170, '748438850.jfif', 7, 120),
(21, 2, 'Samsing galaxy', 130, '1646935833.jpg', 7, 120),
(22, 2, 'techno camon c-x', 80, '1424125097.jpg', 7, 120),
(23, 1, 'Ordinateur desktop', 120, '1237559373.png', 7, 120),
(24, 1, 'Ordinateur Hp desktop pro', 140, '1835430508.jfif', 7, 120),
(25, 1, 'desktop', 150, '47356023.jfif', 7, 120),
(26, 1, 'desktop', 230, '323801495.jfif', 7, 120),
(27, 1, 'Ordinateur Hp elitebook', 200, '771999033.jfif', 7, 120),
(28, 1, 'Ordinateur hp pro', 230, '636771957.jfif', 7, 120),
(29, 1, 'Ordinateur lenovo', 230, '618456468.jfif', 7, 120),
(30, 1, 'Ordinateur lenovo v3', 340, '876404532.jfif', 7, 120),
(31, 1, 'batterie hp ', 15, '429482960.jpg', 7, 120),
(32, 1, 'batterie hp elitebook', 25, '863521851.jpg', 7, 120),
(33, 1, 'batterie makitosh', 150, '462337587.jpg', 7, 120),
(34, 1, 'batterie toshiba', 30, '1450295124.jfif', 7, 120),
(35, 1, 'batterie lenovo', 30, '1224830932.jfif', 7, 120),
(36, 1, 'rame ', 12, '169239317.jfif', 7, 120),
(37, 1, 'Rame 16GO', 20, '1971264672.jfif', 7, 120),
(38, 1, 'rame 2GO', 5, '1046108500.jfif', 7, 120),
(39, 1, 'Rame 4GO', 8, '1178653809.jfif', 7, 120),
(40, 1, 'Rame 8 GO', 10, '763941158.jfif', 7, 120),
(41, 1, 'camera de surveillance', 230, '1663019788.png', 7, 120),
(42, 1, 'appareil nice model', 120, '1270947417.png', 7, 120),
(43, 1, 'appareil  professionel', 200, '194996568.png', 7, 120),
(44, 1, 'appareil camon x-pro', 250, '314169640.png', 7, 120),
(45, 1, 'appareil camon pro', 180, '246589297.png', 7, 120),
(46, 5, 'githard', 50, '326101141.png', 7, 120),
(47, 1, 'githard v2', 123, '1122758006.png', 7, 120),
(48, 1, 'githard qbase', 100, '1518292916.png', 7, 135),
(49, 5, 'stylo meilleur', 3, '1200937382.png', 7, 120),
(50, 5, 'bic v2', 1, '1231307858.png', 7, 120),
(51, 5, 'bic coco', 2, '1678487290.png', 7, 122),
(52, 5, 'stylo bic', 1, '1868878333.png', 7, 119),
(53, 5, 'stylo obama', 1, '201181483.jfif', 7, 120),
(54, 5, 'stylo de luxe', 1, '970405610.jfif', 7, 70),
(55, 5, 'my radio v1', 10, '259426821.jfif', 7, 119),
(56, 5, 'Radio casette', 50, '606640221.jfif', 7, 120),
(57, 5, 'Radio sonitec v2', 15, '2028979866.jfif', 7, 120),
(58, 5, 'Radio sonitec', 20, '1045375077.jfif', 7, 119),
(59, 5, 'Radio simba', 18, '222704386.webp', 7, 229),
(60, 8, 'Bousta', 20, '1679966288.jfif', 7, 35),
(61, 8, 'Suppra', 200, '1368837355.jpg', 7, 35),
(62, 8, 'bukare', 40, '623062056.jfif', 7, 80),
(63, 8, 'Basket nike', 30, '1464607598.jpg', 7, 45),
(64, 8, 'Basket nike', 30, '1312790067.jpg', 7, 41),
(65, 1, 'pianeau', 1500, '267091551.png', 7, 30);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_entree_stock`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_entree_stock` (
`ide` int(11)
,`product_id` int(11)
,`QteEntree` int(11)
,`created_at` datetime
,`product_name` varchar(300)
,`product_price` int(11)
,`product_image` varchar(300)
,`Qte` int(11)
,`nom` varchar(300)
,`idcat` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_favory`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_favory` (
`idfovorie` int(11)
,`id_user` int(11)
,`product_id` int(11)
,`created_at` datetime
,`product_name` varchar(300)
,`product_image` varchar(300)
,`product_price` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_favory2`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_favory2` (
`idfovorie` int(11)
,`product_id` int(11)
,`created_at` datetime
,`product_name` varchar(300)
,`product_image` varchar(300)
,`product_price` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_galery`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_galery` (
`idgalery` int(11)
,`product_id` int(11)
,`photos` varchar(300)
,`product_name` varchar(300)
,`product_price` int(11)
,`Qte` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_padding_vente`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_padding_vente` (
`idv` int(11)
,`product_id` int(11)
,`product_name` varchar(300)
,`quantity` int(11)
,`product_price` int(11)
,`product_priceTotal` int(11)
,`product_image` varchar(300)
,`user_id` int(11)
,`created_at` datetime
,`first_name` varchar(300)
,`last_name` varchar(300)
,`telephone` varchar(300)
,`image` varchar(300)
,`motif` text
,`montant` float
,`code` varchar(300)
,`token` varchar(300)
,`etat_vente` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_paiement`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_paiement` (
`idp` int(11)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`email` varchar(300)
,`telephone` varchar(300)
,`adresse1` varchar(300)
,`adresse2` varchar(300)
,`date_paie` date
,`montant` float
,`motif` text
,`token` varchar(300)
,`code` varchar(300)
,`etat_paiement` int(11)
,`year` varchar(50)
,`month` varchar(50)
,`created_at` datetime
,`idpersonne` int(11)
,`image` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_product`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_product` (
`product_id` int(11)
,`category_id` int(11)
,`product_name` varchar(300)
,`product_price` int(11)
,`product_image` varchar(300)
,`id_user` int(11)
,`nom` varchar(300)
,`first_name` varchar(300)
,`image` varchar(300)
,`Qte` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_sortie_stock`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_sortie_stock` (
`ids` int(11)
,`product_id` int(11)
,`QteEntree` int(11)
,`created_at` datetime
,`product_name` varchar(300)
,`product_price` int(11)
,`product_image` varchar(300)
,`Qte` int(11)
,`nom` varchar(300)
,`idcat` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la table `recupere`
--

CREATE TABLE `recupere` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verification_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recupere`
--

INSERT INTO `recupere` (`id`, `email`, `verification_key`) VALUES
(1, 'kasumba@gmail.com', '1bcf07c1158a471386a5c84f9bc01b98'),
(2, 'kasumba@gmail.com', 'fb5cad6b5f2439d1c2b2a4510de9fceb'),
(3, 'kasumba@gmail.com', '9892cccf80fbb34eebc257346730e489');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `nom`, `created_at`) VALUES
(1, 'admin', '2021-04-12 16:10:38'),
(2, 'user', '2021-04-12 16:12:38'),
(3, 'boutiquier', '2021-04-12 13:54:16');

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE `sortie` (
  `ids` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `QteEntree` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`ids`, `product_id`, `QteEntree`, `created_at`) VALUES
(1, 65, 1, '2021-04-27 16:01:44'),
(2, 65, 2, '2021-04-27 16:02:57'),
(4, 63, 1, '2021-04-27 16:09:42'),
(7, 58, 1, '2021-04-29 18:18:51'),
(8, 52, 1, '2021-04-29 18:19:04');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `idinfo` int(11) NOT NULL,
  `nom_site` varchar(300) DEFAULT NULL,
  `icone` varchar(300) DEFAULT NULL,
  `tel1` varchar(300) DEFAULT NULL,
  `tel2` varchar(300) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `facebook` varchar(600) DEFAULT NULL,
  `twitter` varchar(600) DEFAULT NULL,
  `linkedin` varchar(600) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `termes` text DEFAULT NULL,
  `confidentialite` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `objectif` text DEFAULT NULL,
  `blog` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_info`
--

INSERT INTO `tbl_info` (`idinfo`, `nom_site`, `icone`, `tel1`, `tel2`, `adresse`, `facebook`, `twitter`, `linkedin`, `email`, `termes`, `confidentialite`, `description`, `mission`, `objectif`, `blog`) VALUES
(1, 'Ets yetu', '1683521440.png', '+243817883541', '+243970524665', 'RDC Nord-kivu goma quartier  1 km temoin', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'info.etsyetu@gmail.com', 'Notre Politique de protection des données personnelles décrit la manière dont #devtech traite les données à caractère personnel des visiteurs et des utilisateurs (ci- après les « Utilisateurs ») lors de leur navigation sur notre site. La Politique de protection des données personnelles fait partie intégrante des Conditions Générales d\'Utilisation du Site.\r\n#devtech accorde en permanence une attention aux données de nos Utilisateurs. Nous pouvons ainsi être amenés à modifier, compléter ou mettre à jour périodiquement la Politique de protection des données personnelles. Nous pourrons aussi apporter des modifications nécessaires afin de respecter les changements de la législation et règlementation en vigueur. Dans la mesure du possible, nous vous notifierons tout changement important. Nous vous encourageons toutefois à consulter régulièrement la dernière version en vigueur, accessible sur notre Site.\r\n', 'Conditions Générales d\'Utilisation\r\nDéfinitions\r\nLes Parties conviennent et acceptent que les termes suivants utilisés avec une majuscule, au singulier et/ou au pluriel, auront, dans le cadre des présentes Conditions Générales d\'Utilisation, la signification définie ci-après :\r\n•	« Contrat » : désigne les présentes Conditions Générales d\'Utilisation ainsi que la Politique de protection des données personnelles ;\r\n•	« Membre » : désigne indifféremment le Membre Freemium et le Membre Premium ;\r\n•	« Membre Freemium » désigne le membre ayant un compte sur notre Plateforme pour accéder aux fonctionnalités gratuites de notre Plateforme ;\r\n•	« Membre Premium » désigne le membre ayant un compte sur notre Plateforme pour accéder aux services Premium Solo ou Plus ;\r\n•	« Plateforme » : plateforme numérique de type site Web et/ou application mobile permettant l\'accès au Service ainsi que son utilisation ;\r\n•	« Utilisateur » : désigne toute personne qui utilise la Plateforme, qu\'elle soit un Visiteur ou un Membre ;\r\n•	« Visiteur » : désigne toute personne, internaute, naviguant sur la Plateforme sans création de compte associé.\r\nLes présentes Conditions Générales d\'Utilisation (ci-après les \"CGU\") régissent nos rapports avec vous, personne accédant à la Plateforme, applicables durant votre utilisation de la Plateforme et, si vous êtes un Membre jusqu\'à désactivation de votre compte. Si vous n\'êtes pas d\'accord avec les termes des CGU il vous est vivement recommandé de ne pas utiliser notre Plateforme et nos services.\r\nEn naviguant sur la Plateforme, si vous êtes un Visiteur, vous reconnaissez avoir pris connaissance et accepté l\'intégralité des présentes CGU et notre Politique de protection des données personnelles.\r\nEn créant un compte en cliquant sur le bouton « S\'inscrire avec Facebook » ou « Inscription avec un email » ou « S\'inscrire avec Google » pour devenir Membre, vous êtes invité à lire et accepter les présentes CGU et la Politique de protection des données personnelles, en cochant la case prévue à cet effet.\r\nNous vous encourageons à consulter les « Conditions Générales d\'Utilisation et la Politique de protection des données personnelles » avant votre première utilisation de notre Plateforme et régulièrement lors de leurs mises à jour. Nous pouvons en effet être amenés à modifier les présentes CGU. Si des modifications sont apportées, nous vous informerons par email ou via notre Plateforme pour vous permettre d\'examiner les modifications avant qu\'elles ne prennent effet. Si vous continuez à utiliser notre Plateforme après la publication ou l\'envoi d\'un avis concernant les modifications apportées aux présentes conditions, cela signifie que vous acceptez les mises à jour. Les CGU qui vous seront opposables seront celles en vigueur lors de votre utilisation de la Plateforme.\r\nArticle 1. Inscription au service\r\n1.1 Conditions d\'inscription à la Plateforme\r\nCertaines fonctionnalités de la Plateforme nécessitent d\'être inscrit et d\'obtenir un compte. Avant de pouvoir vous inscrire sur la Plateforme vous devez avoir lu et accepté les présentes CGU et la Politique de protection des données personnelles.\r\nVous déclarez avoir la capacité d\'accepter les présentes conditions générales d\'utilisation, c\'est-à-dire avoir plus de 16 ans et ne pas faire l\'objet d\'une mesure de protection juridique des majeurs (mise sous sauvegarde de justice, sous tutelle ou sous curatelle).\r\nAvant d\'accéder à notre Plateforme, le consentement des mineurs de moins de 16 ans doit être donné par le titulaire de l\'autorité parentale.\r\nNotre Plateforme ne prévoit aucunement l\'inscription, la collecte ou le stockage de renseignement relatifs à toute personne âgée de 15 ans ou moins.\r\n1.2 Création de compte\r\nVous pourrez créer un compte des deux manières suivantes :\r\n•	Soit remplir manuellement, sur notre Plateforme, les champs obligatoires figurant sur le formulaire d\'inscription, à l\'aide d\'informations complètes et exactes. ', 'Développeurs des technologies(#devtech) est une startup qui vise à promouvoir l\'intégrité de la jeunesse en appliquant la technologie afin de permettre  l\'émergence  de la société.', 'la startup devetech vise à apporter des solutions efficaces grâce à la nouvelle  technologie pour palier contre les différents  problèmes que rencontre la société  suite au manquement d\'une meilleure technologie adaptée à leur besoin.', 'Réduire le taux des difficultés que rencontre  la société suite au manquement d\'une  meilleure solution technologique appropriée à leur problématique au pourcentage le plus bas possible jamais atteint!', 'Devetech est une  startup qui vise à promouvoir  l\'intégrité des jeunes en appliquant la technologie  pour permettre l\'avancement de la société.\r\nNotre contribution dans la société est le faite de voir comment la jeunesse progresse  mieux  en contribuant  aux différents aspects qui aident la société  à s\'en sortir dans le Cao.\r\nLa technologie dont nous parlons fera en sorte de contribuer  à l\'émergence de toute la jeunesse et la société en particulier.\r\nNous devons considérer la technologie actuelle comme une arme  efficace pour changer le monde.\r\n \r\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `telephone` varchar(300) DEFAULT NULL,
  `full_adresse` text DEFAULT NULL,
  `biographie` text DEFAULT NULL,
  `date_nais` date DEFAULT NULL,
  `passwords` varchar(300) DEFAULT NULL,
  `idrole` int(11) NOT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `facebook` varchar(900) DEFAULT NULL,
  `linkedin` varchar(900) DEFAULT NULL,
  `twitter` varchar(900) DEFAULT NULL,
  `idposte` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `image`, `telephone`, `full_adresse`, `biographie`, `date_nais`, `passwords`, `idrole`, `sexe`, `facebook`, `linkedin`, `twitter`, `idposte`) VALUES
(7, 'sumaili shabani', 'roger patrona', 'sumailiroger681@gmail.com', '1959189535.jpg', '+243817883541', 'tmk goma avenue mushanganya n°59', '<b>                  	                  	Développeur</b> et <b>entrepreneur</b> en temps plein!                                    ', '1998-08-12', '9db09d6ae665e42340ef0b1ef1eb95b4', 1, 'M', 'https://www.facebook.com/patronat.shabanisumaili.9/', 'https://www.linkedin.com/in/sumaili-shabani-roger-patr%C3%B4na-7426a71a1/', 'https://twitter.com/RogerPatrona', 1),
(8, 'wilson vulembere', 'cedrickson', 'admin@gmail.com', 'icone-user.png', '', '', NULL, '2021-04-21', 'e10adc3949ba59abbe56e057f20f883e', 1, 'M', '', '', '', 1),
(9, 'alpha blonde', 'cubaka', 'alpha@gmail.com', '475946374.jpg', '0998765432', 'Nord-kivu goma', 'Le gars de la planète', '1997-04-13', 'e10adc3949ba59abbe56e057f20f883e', 3, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(11, 'yuma kayanda', 'françois', 'yuma@gmail.com', '774701247.JPG', '+243823187085', 'katoyi goma', '                  	Informaticien sans frontière!                  ', '1995-05-12', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(12, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '1661384914.JPG', '+243810409151', 'Quartier birere', 'Apple est mon préféré!', '1999-04-13', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(13, 'madeleine stephanie', 'sefu', 'madeleine@gmail.com', 'icone-user.png', '+243810409151', 'quartier katoyi avenue konde', NULL, '2021-04-13', 'e10adc3949ba59abbe56e057f20f883e', 2, 'F', '', '', '', 1),
(14, 'kakese pandamiti', 'Patrick', 'kakese@gmail.com', '9686898.png', '0816532574', 'Bdgl goma', 'Kind-Empure', '2021-05-20', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', '', '', '', 1),
(15, 'patrice lufimbo', 'ali', 'patrice@gmail.com', 'icone-user.png', '+243817883541', 'tmk goma avenue mushanganya n°59', 'commerçant détaillant!', '2021-06-12', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(16, 'pascovic', 'kaluzi', 'pascovich@gmail.com', 'icone-user.png', '+243810409151', 'ok boss', NULL, '2001-07-05', NULL, 2, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(17, 'mikah kalume', 'kitoko', 'mikah@gmail.com', '567170401.jpg', '+243810409151', '3 lampes Goma', 'devtech developer', '1997-07-05', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1);

-- --------------------------------------------------------

--
-- Structure de la vue `fiche_de_stock`
--
DROP TABLE IF EXISTS `fiche_de_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fiche_de_stock`  AS SELECT `product`.`product_id` AS `product_id`, `product`.`product_name` AS `product_name`, `product`.`Qte` AS `qte_stock`, `product`.`product_price` AS `pu_stock`, (select `product`.`Qte` * `product`.`product_price`) AS `pt_stock`, `entree`.`QteEntree` AS `qte_E`, `product`.`product_price` AS `pu_E`, (select `entree`.`QteEntree` * `product`.`product_price`) AS `pt_E`, `sortie`.`QteEntree` AS `qte_s`, `product`.`product_price` AS `pu_s`, (select `sortie`.`QteEntree` * `product`.`product_price`) AS `pt_s` FROM ((`product` join `entree` on(`product`.`product_id` = `entree`.`product_id`)) join `sortie` on(`product`.`product_id` = `sortie`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_entree_stock`
--
DROP TABLE IF EXISTS `profile_entree_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_entree_stock`  AS SELECT `entree`.`ide` AS `ide`, `entree`.`product_id` AS `product_id`, `entree`.`QteEntree` AS `QteEntree`, `entree`.`created_at` AS `created_at`, `product`.`product_name` AS `product_name`, `product`.`product_price` AS `product_price`, `product`.`product_image` AS `product_image`, `product`.`Qte` AS `Qte`, `category`.`nom` AS `nom`, `category`.`idcat` AS `idcat` FROM ((`entree` join `product` on(`entree`.`product_id` = `product`.`product_id`)) join `category` on(`product`.`category_id` = `category`.`idcat`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_favory`
--
DROP TABLE IF EXISTS `profile_favory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_favory`  AS SELECT `favories`.`idfovorie` AS `idfovorie`, `favories`.`id_user` AS `id_user`, `favories`.`product_id` AS `product_id`, `favories`.`created_at` AS `created_at`, `product`.`product_name` AS `product_name`, `product`.`product_image` AS `product_image`, `product`.`product_price` AS `product_price` FROM (`favories` join `product` on(`favories`.`product_id` = `product`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_favory2`
--
DROP TABLE IF EXISTS `profile_favory2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_favory2`  AS SELECT `favories2`.`idfovorie` AS `idfovorie`, `favories2`.`product_id` AS `product_id`, `favories2`.`created_at` AS `created_at`, `product`.`product_name` AS `product_name`, `product`.`product_image` AS `product_image`, `product`.`product_price` AS `product_price` FROM (`favories2` join `product` on(`favories2`.`product_id` = `product`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_galery`
--
DROP TABLE IF EXISTS `profile_galery`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_galery`  AS SELECT `galery`.`idgalery` AS `idgalery`, `galery`.`product_id` AS `product_id`, `galery`.`photos` AS `photos`, `product`.`product_name` AS `product_name`, `product`.`product_price` AS `product_price`, `product`.`Qte` AS `Qte` FROM (`galery` join `product` on(`galery`.`product_id` = `product`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_padding_vente`
--
DROP TABLE IF EXISTS `profile_padding_vente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_padding_vente`  AS SELECT `pading_vente`.`idv` AS `idv`, `pading_vente`.`product_id` AS `product_id`, `pading_vente`.`product_name` AS `product_name`, `pading_vente`.`quantity` AS `quantity`, `pading_vente`.`product_price` AS `product_price`, `pading_vente`.`product_priceTotal` AS `product_priceTotal`, `pading_vente`.`product_image` AS `product_image`, `pading_vente`.`user_id` AS `user_id`, `pading_vente`.`created_at` AS `created_at`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`telephone` AS `telephone`, `users`.`image` AS `image`, `paiement_pading`.`motif` AS `motif`, `paiement_pading`.`montant` AS `montant`, `pading_vente`.`code` AS `code`, `pading_vente`.`token` AS `token`, `pading_vente`.`etat_vente` AS `etat_vente` FROM ((`pading_vente` join `users` on(`pading_vente`.`user_id` = `users`.`id`)) join `paiement_pading` on(`paiement_pading`.`code` = `pading_vente`.`code`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_paiement`
--
DROP TABLE IF EXISTS `profile_paiement`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_paiement`  AS SELECT `paiement`.`idp` AS `idp`, `paiement`.`first_name` AS `first_name`, `paiement`.`last_name` AS `last_name`, `paiement`.`email` AS `email`, `paiement`.`telephone` AS `telephone`, `paiement`.`adresse1` AS `adresse1`, `paiement`.`adresse2` AS `adresse2`, `paiement`.`date_paie` AS `date_paie`, `paiement`.`montant` AS `montant`, `paiement`.`motif` AS `motif`, `paiement`.`token` AS `token`, `paiement`.`code` AS `code`, `paiement`.`etat_paiement` AS `etat_paiement`, `paiement`.`year` AS `year`, `paiement`.`month` AS `month`, `paiement`.`created_at` AS `created_at`, `paiement`.`idpersonne` AS `idpersonne`, `users`.`image` AS `image` FROM (`paiement` join `users` on(`paiement`.`idpersonne` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_product`
--
DROP TABLE IF EXISTS `profile_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_product`  AS SELECT `product`.`product_id` AS `product_id`, `product`.`category_id` AS `category_id`, `product`.`product_name` AS `product_name`, `product`.`product_price` AS `product_price`, `product`.`product_image` AS `product_image`, `product`.`id_user` AS `id_user`, `category`.`nom` AS `nom`, `users`.`first_name` AS `first_name`, `users`.`image` AS `image`, `product`.`Qte` AS `Qte` FROM ((`product` join `users` on(`users`.`id` = `product`.`id_user`)) join `category` on(`category`.`idcat` = `product`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_sortie_stock`
--
DROP TABLE IF EXISTS `profile_sortie_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_sortie_stock`  AS SELECT `sortie`.`ids` AS `ids`, `sortie`.`product_id` AS `product_id`, `sortie`.`QteEntree` AS `QteEntree`, `sortie`.`created_at` AS `created_at`, `product`.`product_name` AS `product_name`, `product`.`product_price` AS `product_price`, `product`.`product_image` AS `product_image`, `product`.`Qte` AS `Qte`, `category`.`nom` AS `nom`, `category`.`idcat` AS `idcat` FROM ((`sortie` join `product` on(`sortie`.`product_id` = `product`.`product_id`)) join `category` on(`product`.`category_id` = `category`.`idcat`)) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `cart2`
--
ALTER TABLE `cart2`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`ide`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `favories`
--
ALTER TABLE `favories`
  ADD PRIMARY KEY (`idfovorie`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `favories2`
--
ALTER TABLE `favories2`
  ADD PRIMARY KEY (`idfovorie`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`idgalery`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `pading_vente`
--
ALTER TABLE `pading_vente`
  ADD PRIMARY KEY (`idv`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idpersonne` (`idpersonne`);

--
-- Index pour la table `paiement_pading`
--
ALTER TABLE `paiement_pading`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idpersonne` (`idpersonne`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `recupere`
--
ALTER TABLE `recupere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`ids`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`idinfo`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrole` (`idrole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `cart2`
--
ALTER TABLE `cart2`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `favories`
--
ALTER TABLE `favories`
  MODIFY `idfovorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `favories2`
--
ALTER TABLE `favories2`
  MODIFY `idfovorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `galery`
--
ALTER TABLE `galery`
  MODIFY `idgalery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `pading_vente`
--
ALTER TABLE `pading_vente`
  MODIFY `idv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `paiement_pading`
--
ALTER TABLE `paiement_pading`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `recupere`
--
ALTER TABLE `recupere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sortie`
--
ALTER TABLE `sortie`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `idinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cart2`
--
ALTER TABLE `cart2`
  ADD CONSTRAINT `cart2_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `entree`
--
ALTER TABLE `entree`
  ADD CONSTRAINT `entree_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `favories`
--
ALTER TABLE `favories`
  ADD CONSTRAINT `favories_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favories_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `favories2`
--
ALTER TABLE `favories2`
  ADD CONSTRAINT `favories2_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `online`
--
ALTER TABLE `online`
  ADD CONSTRAINT `online_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pading_vente`
--
ALTER TABLE `pading_vente`
  ADD CONSTRAINT `pading_vente_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pading_vente_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`idpersonne`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement_pading`
--
ALTER TABLE `paiement_pading`
  ADD CONSTRAINT `paiement_pading_ibfk_1` FOREIGN KEY (`idpersonne`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD CONSTRAINT `sortie_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
