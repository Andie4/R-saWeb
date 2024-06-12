-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 12 juin 2024 à 21:15
-- Version du serveur : 10.6.18-MariaDB
-- Version de PHP : 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `caneval_resaweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `mail_client` varchar(255) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`mail_client`, `nom_client`, `prenom_client`) VALUES
('adama.daboh@yahoo.com', 'daboh', 'adama'),
('andrea.caneval.pro@gmail.com', 'Testun', 'TESTUN'),
('andreacaneval6@gmail.com', 'Eustass', 'captain kid'),
('andreacnl@icloud.com', 'Caneval', 'Andréa'),
('aserix@gmail.com', 'astérix', 'astérix'),
('azerty@gmail.com', 'azeerty', 'azeerty'),
('ballon@gmail.com', 'bluelock', 'bluelock'),
('beelzebub@bb.com', 'Oga', 'Tatsumi'),
('bleach@test.com', 'Kuchiki', 'Rukia'),
('chopper@gmail.com', 'chopper', 'chopper'),
('dell@gmail.com', 'Dell', 'Delllaptop'),
('derniertest@gmail.com', 'derniertest', 'derniertest'),
('emiie.desgranges78@gmail.com', 'Desgranges', 'Emilie'),
('gege@jjk.com', 'gege', 'akutami'),
('gomugomu@nomi.com', 'Monkey D', 'Luffy'),
('hxh@zoldik.com', 'Zoldik', 'Kirua'),
('jjk@sukuna.com', 'Itadori', 'Yuji'),
('krokmou@gmail.com', 'krokmou', 'krokmou'),
('lepresleludivine@gmail.com', 'lepresle', 'ludivine '),
('louanne.agesilas@gmail.com', 'Agesilas', 'Louanne'),
('louanneagesilas77400@gmail.com', 'Agesilas', 'Louanne'),
('maro77.sylla@gmail.com', 'Sylla', 'Maro'),
('onepiece@gmail.com', 'brook', 'brook'),
('pokemon@gmail.com', 'pokemon', 'sasha'),
('table@gmail.com', 'table', 'table'),
('test10@gmail.com', 'test10', 'test10'),
('test11@gmail.com', 'test11', 'test11'),
('test3@gmail.com', 'Test3', 'Test3'),
('test4@gmail.com', 'test4', 'test4'),
('test6@6gmail.com', 'test6', 'TEST6'),
('test7@gmail.com', 'test7', 'test7'),
('test8@gmail.com', 'test8', 'test8'),
('test9@gmail.com', 'Test9', 'test9'),
('test@deux.gmail.com', 'Testdeux', 'TESTDEUX'),
('testlocal@gmail.com', 'testlocal', 'testlocal'),
('yuji.itadori@jjk.fr', 'Itadori', 'yuji');

-- --------------------------------------------------------

--
-- Structure de la table `Excursion`
--

CREATE TABLE `Excursion` (
  `id_excursion` int(11) NOT NULL,
  `nom_excursion` varchar(30) NOT NULL,
  `prix_excursion` decimal(7,2) NOT NULL,
  `genre_excursion` varchar(255) NOT NULL,
  `url_excursion` varchar(255) NOT NULL,
  `chemin_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Excursion`
--

INSERT INTO `Excursion` (`id_excursion`, `nom_excursion`, `prix_excursion`, `genre_excursion`, `url_excursion`, `chemin_image`) VALUES
(1, 'Le champs de poissons', 50.00, 'bateau', 'LeChampsDesPoissons.php', 'images/pe-poissons.jpg'),
(2, 'Les terreurs des mers', 100.00, 'masque et tuba', 'lesTerreursDesMers.php', 'images/pe-requin.jpg'),
(3, 'Le monde caché', 150.00, 'plongée sous-marine', 'leMondeCache.php', 'images/pe-grotte.jpg'),
(4, 'Les oiseaux aquatiques', 50.00, 'bateau', 'lesOiseauxAquatiques.php', 'images/pe-raie.jpg'),
(5, 'La danse des méduses', 50.00, 'masque et tuba', 'laDanseDesMeduses.php', 'images/pe-img-meduse.jpg'),
(6, 'Exploration d\'épaves', 150.00, 'plongée sous-marine', 'explorationEpaves.php', 'images/pe-epave.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `id_reservation` int(11) NOT NULL,
  `excursion_id` int(11) NOT NULL,
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre_billets` int(11) NOT NULL,
  `horaire` int(2) NOT NULL,
  `mail_client_fk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Reservation`
--

INSERT INTO `Reservation` (`id_reservation`, `excursion_id`, `date_reservation`, `nombre_billets`, `horaire`, `mail_client_fk`) VALUES
(8, 2, '2024-06-04 22:00:00', 1, 15, 'jjk@sukuna.com'),
(9, 2, '2024-06-03 22:00:00', 3, 15, 'jjk@sukuna.com'),
(10, 2, '2024-06-03 22:00:00', 3, 15, 'jjk@sukuna.com'),
(11, 2, '2024-06-03 22:00:00', 3, 15, 'jjk@sukuna.com'),
(12, 3, '2024-06-30 22:00:00', 4, 15, 'jjk@sukuna.com'),
(13, 2, '2024-07-03 22:00:00', 5, 8, 'jjk@sukuna.com'),
(14, 3, '2024-07-05 22:00:00', 4, 13, 'andreacaneval6@gmail.com'),
(18, 2, '2024-05-29 22:00:00', 3, 15, 'andreacaneval6@gmail.com'),
(19, 2, '2024-05-29 22:00:00', 3, 15, 'andreacaneval6@gmail.com'),
(25, 3, '2024-06-02 22:00:00', 3, 13, 'andreacnl@icloud.com'),
(26, 1, '2024-06-30 22:00:00', 1, 8, 'jjk@sukuna.com'),
(27, 1, '2024-06-30 22:00:00', 1, 8, 'jjk@sukuna.com'),
(28, 1, '2024-06-30 22:00:00', 1, 8, 'jjk@sukuna.com'),
(29, 1, '2024-06-30 22:00:00', 1, 8, 'jjk@sukuna.com'),
(30, 1, '2024-07-01 22:00:00', 2, 10, 'jjk@sukuna.com'),
(31, 1, '2024-06-30 22:00:00', 1, 8, 'jjk@sukuna.com'),
(32, 1, '2024-07-03 22:00:00', 4, 15, 'andreacnl@icloud.com'),
(33, 6, '2024-07-05 22:00:00', 4, 13, 'andrea.caneval.pro@gmail.com'),
(34, 1, '2024-07-01 22:00:00', 5, 10, 'andrea.caneval.pro@gmail.com'),
(35, 6, '2024-06-30 22:00:00', 1, 8, 'andrea.caneval.pro@gmail.com'),
(36, 1, '2024-06-30 22:00:00', 1, 8, 'andreacaneval6@gmail.com'),
(37, 6, '2024-06-29 22:00:00', 3, 15, 'andreacnl@icloud.com'),
(38, 6, '2024-06-29 22:00:00', 3, 15, 'andrea.caneval.pro@gmail.com'),
(39, 1, '2024-06-29 22:00:00', 1, 8, 'andrea.caneval.pro@gmail.com'),
(40, 6, '2024-06-29 22:00:00', 3, 15, 'andrea.caneval.pro@gmail.com'),
(41, 6, '2024-06-29 22:00:00', 3, 15, 'andrea.caneval.pro@gmail.com'),
(42, 1, '2024-06-30 22:00:00', 1, 8, 'dell@gmail.com'),
(43, 1, '2024-06-30 22:00:00', 1, 8, 'test@deux.gmail.com'),
(44, 6, '2024-06-29 22:00:00', 3, 15, 'test3@gmail.com'),
(45, 6, '2024-06-29 22:00:00', 3, 15, 'test3@gmail.com'),
(46, 4, '2024-07-03 22:00:00', 4, 15, 'test4@gmail.com'),
(47, 3, '2024-07-02 22:00:00', 3, 13, 'gege@jjk.com'),
(48, 3, '2024-07-02 22:00:00', 3, 13, 'gege@jjk.com'),
(49, 3, '2024-07-02 22:00:00', 3, 13, 'gege@jjk.com'),
(50, 3, '2024-07-02 22:00:00', 3, 13, 'gege@jjk.com'),
(51, 6, '2024-06-05 22:00:00', 6, 15, 'test6@6gmail.com'),
(52, 6, '2024-07-06 22:00:00', 7, 15, 'test7@gmail.com'),
(53, 4, '2024-07-03 22:00:00', 4, 15, 'test8@gmail.com'),
(54, 4, '2024-07-03 22:00:00', 4, 15, 'test8@gmail.com'),
(55, 1, '2024-06-30 22:00:00', 1, 8, 'test9@gmail.com'),
(56, 1, '2024-06-30 22:00:00', 1, 8, 'test9@gmail.com'),
(57, 1, '2024-06-30 22:00:00', 1, 8, 'test9@gmail.com'),
(58, 1, '2024-06-30 22:00:00', 1, 8, 'test9@gmail.com'),
(59, 1, '2024-06-30 22:00:00', 1, 8, 'test9@gmail.com'),
(60, 6, '2024-07-05 22:00:00', 6, 15, 'andrea.caneval.pro@gmail.com'),
(61, 6, '2024-07-05 22:00:00', 6, 15, 'andrea.caneval.pro@gmail.com'),
(62, 6, '2024-07-05 22:00:00', 6, 15, 'andrea.caneval.pro@gmail.com'),
(63, 1, '2024-06-30 22:00:00', 2, 8, 'test10@gmail.com'),
(64, 1, '2024-06-30 22:00:00', 2, 8, 'test10@gmail.com'),
(65, 1, '2024-06-30 22:00:00', 2, 8, 'test10@gmail.com'),
(66, 1, '2024-06-30 22:00:00', 2, 8, 'test10@gmail.com'),
(67, 1, '2024-06-30 22:00:00', 2, 8, 'test10@gmail.com'),
(68, 1, '2024-06-30 22:00:00', 2, 8, 'test10@gmail.com'),
(69, 2, '2024-07-01 22:00:00', 2, 10, 'test11@gmail.com'),
(70, 1, '2024-06-06 22:00:00', 1, 15, 'azerty@gmail.com'),
(71, 3, '2024-06-26 22:00:00', 2, 10, 'krokmou@gmail.com'),
(72, 1, '2024-06-06 22:00:00', 1, 8, 'chopper@gmail.com'),
(73, 1, '2024-06-14 22:00:00', 2, 10, 'table@gmail.com'),
(74, 3, '2024-06-24 22:00:00', 2, 10, 'testlocal@gmail.com'),
(75, 5, '2024-06-05 22:00:00', 3, 15, 'andrea.caneval.pro@gmail.com'),
(76, 2, '2024-06-19 22:00:00', 4, 13, 'onepiece@gmail.com'),
(77, 1, '2024-06-18 22:00:00', 1, 8, 'andreacaneval6@gmail.com'),
(78, 4, '2024-06-19 22:00:00', 10, 10, 'ballon@gmail.com'),
(79, 6, '2024-07-04 22:00:00', 5, 15, 'andreacaneval6@gmail.com'),
(80, 6, '2024-07-04 22:00:00', 5, 15, 'andreacaneval6@gmail.com'),
(81, 3, '0000-00-00 00:00:00', 1, 10, 'louanneagesilas77400@gmail.com'),
(82, 0, '2024-06-10 22:00:00', 1, 8, 'louanne.agesilas@gmail.com'),
(83, 5, '2024-06-14 22:00:00', 3, 13, 'maro77.sylla@gmail.com'),
(84, 3, '2024-06-19 22:00:00', 1, 10, 'emiie.desgranges78@gmail.com'),
(85, 3, '2024-06-26 22:00:00', 4, 13, 'aserix@gmail.com'),
(86, 1, '2024-06-11 22:00:00', 1, 8, 'pokemon@gmail.com'),
(87, 2, '2024-06-26 22:00:00', 2, 10, 'andrea.caneval.pro@gmail.com'),
(88, 2, '2024-06-25 22:00:00', 3, 10, 'derniertest@gmail.com'),
(89, 6, '2024-06-19 22:00:00', 10, 13, 'adama.daboh@yahoo.com'),
(90, 2, '2024-06-11 22:00:00', 2, 15, 'lepresleludivine@gmail.com'),
(91, 2, '2024-06-11 22:00:00', 2, 15, 'lepresleludivine@gmail.com'),
(92, 4, '2024-06-27 22:00:00', 2, 13, 'andrea.caneval.pro@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`mail_client`);

--
-- Index pour la table `Excursion`
--
ALTER TABLE `Excursion`
  ADD PRIMARY KEY (`id_excursion`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_excursion` (`excursion_id`),
  ADD KEY `mail_client_fk` (`mail_client_fk`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Excursion`
--
ALTER TABLE `Excursion`
  MODIFY `id_excursion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
