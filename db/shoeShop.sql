-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2025 at 07:32 AM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Shoe-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `prenom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `prenom`, `nom`, `mail`, `identifiant`, `mdp`) VALUES
(1, 'Jean', 'Dupont', 'j.dupont@hotmail.fr', 'j.dupont', 'jean123'),
(2, 'Paul', 'Durant', 'p.durant@hotmail.fr', 'p.durant', 'paul123'),
(5, 'Theoman', 'Turan', 'theoman.turan@gmail.com', 'theoman.turan', '$2y$10$Nd0eP2WISsmJwN6yWUIW4.ROliuNOP16vr4qjqkvUyFSjLagXOqKW');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `prenom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `prenom`, `nom`, `identifiant`, `mdp`) VALUES
(1, 'Jean ', 'Dufour', 'j.dufour', '1234'),
(2, 'admin', 'admin', 'theoman.admin', '$2y$10$9ngA/9k3Vy8YSQl3mIfSR./XrhXmudoYahGua1RFF/XTB1V9WiIcC');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `id` int NOT NULL,
  `nom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `marque` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille` int NOT NULL,
  `descript` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `nom`, `prix`, `marque`, `taille`, `descript`, `genre`, `image`) VALUES
(1, 'Retro High OG SP Union LA Chicago Shadow', 440, 'Air Jordan 1', 45, 'Collaboration devenue iconique, Air Jordan et la boutique iconique de Los Angeles Union remettent le couvert sur une nouvelle Air Jordan 1 High.\r\n\r\nLa Air Jordan 1 Retro High OG SP Union LA Chicago Shadow se pare d\'une empeigne en cuir blanc, accompagnée du traditionnel rouge Chicago. Des accents Grey Shadow sur le col ainsi que des éléments noirs comme le Swoosh, le logo Jordan Wings viennent parfaire le tout.', 'Homme', 'jordan-1.webp'),
(2, 'Mid Light Smoke Grey Anthracite', 175, 'Air Jordan 1', 38, 'Après le succès des précédentes versions, Jordan réitère avec un nouveau coloris Light Smoke Grey, retravaillé dans une disposition différente des coloris de 2021.\r\n\r\nLa Air Jordan 1 Mid Light Smoke Grey (2022) présente une base classique en cuir lisse. La palette de couleur est composée de noir, gris et blanc, pour la juste dose de contraste. Les éléments de branding ajoutent la touche finale pour un style éclatant.\r\n\r\nAvec un line-up sneakers fraichement dévoilé pour 2022, c\'est sans nul doute que l\'on peut affirmer que cette année sera à nouveau placée sous le signe de la Air Jordan 1 !', 'Enfant', 'jordan-2.webp'),
(3, 'High Chicago Lost And Found', 750, 'Air Jordan 1', 44, 'Ça y est, c\'est officiel, le modèle le plus iconique de l\'histoire de la sneakers est bel et bien de retour ! Pour l\'occasion, les équipes créatives de Jordan Brand lui ont offert un traitement vintage inédit.\r\n\r\nLa Air Jordan 1 High Chicago Lost And Found (Reimagined) arbore une base en cuir blanc à la finition craquelée que l\'on retrouve également sur le col en cuir noir. Toute la structure affiche des superpositions de cuir rouge au look rappelant le code couleur emblématique de l\'équipe des Chicago Bulls. Une languette blanc cassé à l\'effet vieilli, s\'accorde à la semelle intermédiaire et offre un aspect rétro. Accompagnée d\'un duo de lacets, blanc et noir, elle repose sur une outsole rouge marquée par le temps, à la manière des modèles originaux de 1985.\r\n\r\nVéritable must-have de la collection, cette (presque) nouvelle version de la Air Jordan 1 High porte déjà le prestigieux titre de sneaker de l\'année 2022 ! ', 'Homme', 'jordan-4.webp'),
(4, 'Mid Pink Suede', 120, 'Air Jordan 1', 32, 'La collection Air Jordan 1 Mid s\'enrichit d\'un nouveau modèle qui capte l\'attention avec sa douce élégance.\r\n\r\nCette Air Jordan 1 Mid Pink Suede présente une combinaison séduisante de cuir lisse blanc et de daim rose pâle, offrant une touche de féminité et de raffinement. Le contraste délicat avec les accents blancs et la semelle extérieure en caoutchouc naturel souligne la silhouette emblématique de ce modèle. Idéal pour une utilisation quotidienne, ce sneaker allie style distinctif et confort durable.', 'Femme', 'jordan-3.webp'),
(5, 'High Dior', 15000, 'Air Jordan 1', 48, 'C’est la sortie la plus attendue de l’année ! En effet, la collaboration entre Air Jordan et Dior a fait l’effet d’une bombe sur la planète sneakers… Imaginée par Kim Jones, cette paire bénéficiant d’une réalisation « Made in Italy » trouve l’équilibre parfait entre luxe et héritage sportif.\r\n\r\nLa Air Jordan 1 High Dior présente une tige en cuir de veau premium, et des couleurs majoritairement blanches et grises. Le monogramme Dior est apposé sur le Swoosh, un détail qui se place telle une signature de cette collaboration. Aussi, on note un Wings inédit « Air Dior » et une outsole translucide brandée, apportant la touche finale au design.\r\n\r\nCette édition ne cesse de faire du bruit au sein de la sphère sneakers et à juste titre ! Entre histoire, savoir-faire et association de marques, la AJ1 High Dior a tout pour conquérir le cœur du public…', 'Homme', 'jordan-5.webp'),
(6, 'Retro Metallic Red', 900, 'Air Jordan 4', 39, 'Dans le cadre d’un pack Region Exclusive réunissant quatre versions de Air Jordan 4, la marque au Jumpman est d’humeur nostalgique puisqu’elle s’inspire des itérations du passé. Avec son design proche de la Air Jordan 4 Classic Green sortie en 2004, et un coloris issu de la Air Jordan 1 OG Metallic Red de 1996, on découvre la Air Jordan 4 Retro Metallic Red.\r\n\r\nLa Air Jordan 4 Retro Metallic Red est dotée d’une empeigne en cuir premium pleine fleur blanc et d’un empiècement en mesh quadrillé sur les quarter panel, sublimés par quelques accents de rouge metallic. On retrouve ces derniers sur les oeillets, sur la doublure de la languette et au niveau des deux Jumpman qui composent les éléments de branding. Enfin, une semelle blanche accordée à la base finalise le design en toute sobriété.', 'Homme', 'jordan-6.webp'),
(7, 'Retro Union Guava Ice', 810, 'Air Jordan 4', 39, 'Le célèbre store de Los Angeles Union poursuit sa collaboration avec la Jordan Brand aux travers d\'une toute nouvelle Air Jordan 4 exclusive.\r\n\r\nLa Air Jordan 4 Retro Union Guava Ice réinvente la silhouette avec un coloris rose pastel et bleu UNC. On retrouve le tag Union apposé sous des Wings translucides ainsi qu’une languette raccourcie pouvant être décousue pour laisser place à la languette OG. Enfin la cage, la sole et la outsole jaunies complètent le design avec un aspect vintage contrastant parfaitement avec les couleurs pour un résultat unique.', 'Femme', 'jordan-7.webp'),
(8, 'Military Black', 500, 'Air Jordan 4', 36, 'Le modèle classique de Jordan Brand s\'offre un traitement bicolore qui risque de devenir l\'un des incontournables de l\'année 2022 !\r\n\r\nLa Air Jordan 4 Military Black reprend la structure du coloris Military Blue OG de 1989 et remplace les empiècements traditionnellement bleus par du noir sur les oeillets et le heel tab emblématique de la Jordan 4. La tige se pare d\'une empeigne en cuir blanc aux détails gris sur le mudguard et les wings qui ornent les panels. Une semelle blanche aux superpositions de noir et de gris vient parachever la silhouette désignée par Tinker Hatfield.', 'Enfant', 'jordan-8.webp'),
(9, 'Retro University Blue', 450, 'Air Jordan 4', 35, 'Après la Air Jordan 4 High Retro University Blue, la marque au Jumpman annonce la sortie de la Air Jordan 4 Retro University Blue confectionnée avec des matériaux de qualité, une paire incontournable pour les beaux jours.\r\n\r\nLa Air Jordan 4 Retro University Blue a un upper en daim bleu ciel, accompagné d’un filet en TPE et de lacets assortis. Le design est complété par l’incontournable motif Cement Print sur les Wings, le talon et une bonne partie de la midsole. Un nouveau tag tricolore sur la languette apporte la touche finale.', 'Enfant', 'jordan-9.webp'),
(10, 'Seafoam', 300, 'Air Jordan 4', 38, 'Jordan Brand va réjouir les fans de la Air Jordan 4 en début d\'année 2023 avec la sortie d\'un nouveau coloris épuré.\r\n\r\nLa Air Jordan 4 Seafoam affiche une empeigne en cuir blanc accompagnée de détails noirs comme les rabats et le heeltab. La cage en TPU est bien présente sur le panneau latéral dans une teinte blanche. Quelques touches de vert clair sont parsemées sur la midsole, les oeillets en TPU, les brandings et la doublure. ', 'Femme', 'jordan-10.webp'),
(11, 'Low \'07 Triple White', 105, 'Nike Air Force 1', 34, 'Sans aucun doute la silhouette la plus emblématique de chez Nike : la Air Force 1. Créée par Bruce Kilgore en 1982, la première paire dotée de la technologie Nike AIR ne cesse d’être rééditée dans une multitude de coloris chaque saison.\r\n\r\nLa Nike Air Force 1 Low ’07 Triple White se pare d’une empeigne monochrome en cuir pleine fleur à laquelle tous les éléments sont accordés tel que les lacets, le swoosh et la semelle. La semelle intermédiaire en mousse et le renfort au niveau de la cheville garantissent un confort sans faille, pendant que l’incontournable deubré métallisé affiche l’inscription « AF-1 » pour finaliser le design.\r\n\r\nProbablement LA paire à avoir dans sa collection sneakers la Air Force 1 Low ’07 peut s\'accorder avec les outfits, des plus simples aux plus travaillés.', 'Enfant', 'nike-1.webp'),
(12, 'Low Black Supreme', 205, 'Nike Air Force 1', 42, 'Après de longues semaines d’attente et plusieurs teasing, Nike et Supreme dévoilent une nouvelle collaboration sneakers sur un modèle emblématique : la Air Force 1.\r\n\r\nLa Nike Air Force 1 Low Black Supreme présente une empeigne des plus simples, entièrement recouverte de cuir noir, assortie avec les autres éléments à l’instar des lacets, de la semelle et du swoosh qui est apposé ton-sur-ton. Le box logo Supreme rouge sur l’arrière de la semelle apporte la touche finale.', 'Homme', 'nike-2.webp'),
(13, 'Low NOCTA Drake Foam Pink', 205, 'Nike Air Force 1', 36, 'Après le succès de la première édition de la AF1 Drake dans une version White, Nike et NOCTA remettent le couvert avec un coloris Pink Foam.\r\n\r\nLa Nike Air Force 1 Low NOCTA Drake Foam Pink se pare d\'une base en cuir rose, accompagnée d\'éléments ton-sur-ton comme le Swoosh, les oeillets, les lacets. Une midsole translucide rosée vient sublimer l\'ensemble.', 'Femme', 'nike-3.webp'),
(14, 'Low Valentine\'s Day', 195, 'Nike Air Force 1', 40, 'Cette année pour la Saint-Valentin, Nike voit les choses en grand avec une nouvelle version glamour de la lowtop tendance ! \r\n\r\nLa Nike Air Force 1 Low Valentine\'s Day (2023) affiche une base en cuir blanc qui laisse apparaître des superpositions de cuir rouge brillant. Sur les côtés, un swoosh rose doté de petits coeurs gravés, apporte une touche colorée à l\'ensemble. Le tout se laisse sublimer par une semelle crème à l\'outsole assortie qui finalise le design.\r\n\r\nDévoilée aux côtés d\'une Uptempo, l\'édition spéciale de la Air Force 1 saura en faire chavirer plus d\'un(e) ! ', 'Femme', 'nike-4.webp'),
(15, 'Low Off-White \"The Ten\"', 3800, 'Nike Air Force 1', 35, 'Élaborée en 1982 à destination du Basketball, la Nike Air Force 1, est selon certaines sources, la chaussure la plus vendue de l’histoire de Nike. Ce qui est sûr, c’est qu’avec près de 1 700 corlorway différents depuis 1982, la Nike Air Force 1 est l’une des silhouettes les plus emblématiques de Nike.\r\n\r\nEncore une fois, Virgil a su respecter l’histoire, tout en apportant son regard novateur. On retrouve sur cette Nike Air Force One x Off-White le fameux « AIR » sur une semelle translucide, tandis que l’upper est réalisé en toile et mailles. Ce modèle est probablement l’une des plus grandes réussites de la collection « Ghosting » sortie en novembre 2017.', 'Enfant', 'nike-5.webp'),
(16, 'FWOGGY WOGGY SAYS HI CHUNKY TRAINERS', 119.95, 'Koi Footwear', 37, 'Plus tendance que jamais, les baskets à plateforme sont un incontournable de toute garde-robe. Chez Koi, nous vous proposons la meilleure gamme de baskets à plateforme véganes. Elles vous permettront de vous démarquer (littéralement) tout en restant au top de votre style, sans vous ruiner.\r\n\r\nDes baskets à plateforme pour toutes les occasions', 'Femme', 'Fwoggy Woggy.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
