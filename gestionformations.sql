-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 fév. 2022 à 14:27
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionformations`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `prenom_admin` varchar(255) NOT NULL,
  `cin_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_login`, `nom_admin`, `prenom_admin`, `cin_admin`) VALUES
(1, 2, 'abidi', 'aziz', '1457978'),
(2, 3, 'saadi', 'mohamed ali', '12346555'),
(3, 5, 'admin', 'adminp', '1222222');

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `Numero_cycle` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `gouvernorat` varchar(255) NOT NULL,
  `numsalle` varchar(255) NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `debut_horaire` time(6) NOT NULL,
  `fin_horaire` time(6) NOT NULL,
  `debut_pause` time(6) NOT NULL,
  `fin_pause` time(6) NOT NULL,
  `image` text NOT NULL,
  `nomprenom_formateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`Numero_cycle`, `theme`, `modele`, `lieu`, `gouvernorat`, `numsalle`, `debut_periode`, `fin_periode`, `debut_horaire`, `fin_horaire`, `debut_pause`, `fin_pause`, `image`, `nomprenom_formateur`) VALUES
(111, 'Android', 'inter', 'CNI', 'Tunis', '03', '2022-03-01', '2022-04-05', '08:00:00.000000', '15:00:00.000000', '13:00:00.000000', '13:30:00.000000', 'android.jpg', 'saadimohamed ali'),
(112, 'loi de finance', 'inter', 'CNI', 'Tunis', '03', '2022-02-16', '2022-02-19', '09:00:00.000000', '17:00:00.000000', '13:00:00.000000', '13:30:00.000000', 'loi de finance.jpg', 'amrikhaled'),
(113, 'Soft skills', 'aaaa', 'CNI', 'Tunis', '03', '2022-03-01', '2022-04-02', '08:30:00.000000', '15:00:00.000000', '12:30:00.000000', '13:00:00.000000', 'soft_skills.jpg', 'saadimohamed ali'),
(114, 'PHP', 'inter', 'CNI', 'Tunis', '04', '2022-03-23', '2022-03-27', '08:00:00.000000', '12:00:00.000000', '10:20:00.000000', '10:30:00.000000', 'PHP.png', 'saadimohamed ali'),
(115, 'html&css', 'inter', 'CNI', 'Tunis', '01', '2022-02-01', '2022-02-04', '08:00:00.000000', '11:30:00.000000', '10:15:00.000000', '10:30:00.000000', 'HTML-CSS.jpg', 'amrikhaled');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `Numero_formateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `specialité` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`Numero_formateur`, `nom`, `prenom`, `service`, `specialité`) VALUES
(1, 'amri', 'khaled', 'developpement', 'developpeur web'),
(2, 'saadi', 'mohamed ali', 'informatique', 'gestion');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleuser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `roleuser`) VALUES
(1, 'yassminegalloub', '370b02ea58eb0ff34b3026dc1ac73060423fae6468907536fc5b8ff8612b5e283c69dbe6c16392ec808b0a1a3c09d70e1f6e9db1f617eab7b36dad769d986ec9', 'superadmin'),
(2, 'abidiaziz', '0b800588857ee88e73f850de83061d4d98c0877042f46384af460587570dc635005790581dcd8e1bc8de51d0a3115e51cbbc6d91da4e5c6408f4be571b4ead72', 'admin'),
(3, 'medali', 'b0ed849fbe3439e106f2cd7bfc66c3816bbe7990eef71e355e9239ac44ab1d9c81d493bf543d62c0294a2ea27bbc63463709bdefb3bd118b72b78a7516a73b4a', 'admin'),
(5, 'admin', '5cd9ac0dfb5012d597f7c21e569572c59bdd292bef8910bd6ebdc532328f61398dc722f6e2b9683b3c75ef53a6ae55c27febc74c3f5f0b5a60b6063d6ddba99a', 'admin'),
(6, 'sirine', '30e660e05ad115f30964f8e967cdfd10d713f832e7e421ec807801cd13884df37a5e8f51988abae41efddfd30bc4b22c9d5efdaf55711533ff0b8d5900189ece', 'client'),
(7, 'amani', 'b8a7d3c9f3c3e419ee6459ce29a7b31d9c17e582c68e49cfdbf04f17a6b398de7684be10af5ac2bf176a68cb75d06bc87a455e89291e837203f99f92dda28f5f', 'client'),
(8, 'mayssa', 'b41e7c7d45092c7d30faebde8e6c987f8aaa6fd921ea03fd7b112c4eafb7c61462eae6a4d9b22d9dd82d11366fadc813d587f373ed48cc7804b99a02a987d6cf', 'client'),
(9, 'hanine', '7b3c5bc76a49db218c1f880da192c6731102ba6aaea8dea9418f409dc0700eb9a8f60a81c8425ae7fbb1057290cfd2f2d1a0e8fd09861e746a36620aa62d1615', 'client');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `Numero_Participant` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `Nom_cycle` varchar(255) NOT NULL,
  `autre_cycle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`Numero_Participant`, `id_login`, `nom_prenom`, `cin`, `service`, `entreprise`, `Nom_cycle`, `autre_cycle`) VALUES
(1, 6, 'sirine galloub', '12364089', 'developpement', 'CNI', 'Android', NULL),
(2, 7, 'amdouni amani', '12335477', 'developpement', 'CNI', 'Android', NULL),
(5, 8, 'mayssa mantouch', '123465465', 'informatique', 'CNI', 'Soft skills', NULL),
(6, 9, 'hanine khemir', '09785465', 'informatique', 'CNI', 'html&css', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `superadmin`
--

CREATE TABLE `superadmin` (
  `id_superadmin` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nom_superadmin` varchar(255) NOT NULL,
  `prenom_superadmin` varchar(255) NOT NULL,
  `cin_superadmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `superadmin`
--

INSERT INTO `superadmin` (`id_superadmin`, `id_login`, `nom_superadmin`, `prenom_superadmin`, `cin_superadmin`) VALUES
(3, 1, 'Galloub', 'Yassmine', '14405079');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `admin` (`id_login`);

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`Numero_cycle`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`Numero_formateur`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`Numero_Participant`),
  ADD KEY `idlogin` (`id_login`);

--
-- Index pour la table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id_superadmin`),
  ADD KEY `superadmin` (`id_login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `Numero_formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `Numero_Participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin` FOREIGN KEY (`Id_login`) REFERENCES `login` (`id_login`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `idlogin` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`);

--
-- Contraintes pour la table `superadmin`
--
ALTER TABLE `superadmin`
  ADD CONSTRAINT `superadmin` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
