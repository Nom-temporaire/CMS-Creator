-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : ven. 10 déc. 2021 à 15:52
-- Version du serveur : 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `idComment` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idComment`, `idUser`, `idPost`, `content`, `date`) VALUES
(22, 19, 39, 'Très intéressant ! 😁', '2021-12-10'),
(23, 18, 40, 'Merci pour ce retour ! ;D', '2021-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `idImage` int(11) NOT NULL,
  `idPost` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `chemin` longtext NOT NULL,
  `idCommentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`idImage`, `idPost`, `idUser`, `chemin`, `idCommentaire`) VALUES
(25, 39, 18, '290px-Charlemagne_and_Pope_Adrian_I.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `idUser`, `title`, `content`, `date`) VALUES
(39, 18, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at dignissim libero. Curabitur luctus neque id consequat lacinia. Integer auctor viverra tortor, eu commodo sapien accumsan a. Vestibulum maximus neque felis, sit amet efficitur leo consectetur in. Aenean egestas augue mollis, aliquet turpis at, venenatis orci. Sed id tellus vel ex egestas imperdiet. Cras est libero, mollis nec pellentesque commodo, ornare nec est. Donec vel tortor ullamcorper, placerat eros sit amet, malesuada purus.\r\n\r\nPhasellus auctor, eros vel aliquet consequat, nulla mi vulputate odio, ut interdum mi velit eu tortor. Suspendisse tempus posuere tempus. Maecenas pharetra, turpis non porttitor consequat, dolor ante tempor quam, faucibus fermentum ante diam nec ipsum. Fusce vitae tincidunt metus, in consequat risus. Mauris pretium turpis eget leo fringilla, sed blandit elit mollis. In porttitor, dolor sit amet sagittis fermentum, metus nisi condimentum tortor, id venenatis quam tellus feugiat lectus. Sed et magna nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed tincidunt ultrices sodales. Proin ac convallis elit, et mattis ante.\r\n\r\nIn sollicitudin, purus quis tristique ullamcorper, sapien lorem porta mauris, ut tempor nisl augue vitae tellus. Duis eget ex mollis turpis efficitur bibendum in quis justo. Nulla facilisi. Nunc ac augue ac quam egestas accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor lectus vel leo pharetra tristique. Aenean aliquet tellus nec vulputate bibendum. Quisque vel elementum felis, at congue leo. Pellentesque quis posuere eros.\r\n\r\nVestibulum non lorem et est ultrices ultrices ut eu nibh. Mauris euismod euismod tortor vitae tristique. Donec facilisis nibh quam, vel vestibulum metus dapibus vitae. Fusce posuere maximus egestas. Nam ornare, sapien ac pretium cursus, massa felis convallis sem, ut sollicitudin elit lacus pellentesque mi. Integer suscipit aliquet cursus. Curabitur aliquam gravida augue, sed lacinia nisl consectetur nec. Aliquam vulputate sapien ullamcorper elit malesuada, non volutpat neque egestas. Nam vitae dui id urna maximus pretium. Fusce condimentum gravida dolor, vel facilisis turpis volutpat quis. Aliquam pretium vehicula ipsum, a finibus sapien accumsan sed. Cras aliquam tellus vitae scelerisque feugiat. Cras elementum nisl in libero convallis gravida. Etiam suscipit lectus massa, non tincidunt diam commodo ut. Proin sodales tellus sed justo rhoncus maximus sit amet nec nulla. Nunc eu dolor nunc.\r\n\r\nSed id tortor ac nulla dictum efficitur. Nam id nisi eu orci convallis gravida. Integer vel diam hendrerit, imperdiet leo sed, suscipit justo. Phasellus lobortis pellentesque ligula sit amet dapibus. Suspendisse pulvinar molestie lobortis. Mauris in consequat neque, a ullamcorper odio. Aenean nunc mi, varius sed tristique sit amet, condimentum nec sem. Pellentesque sit amet ligula a orci sodales placerat. Vestibulum sed turpis sed nibh ornare porta. Cras mattis turpis ante, sed tempus leo varius quis. In vestibulum porta libero at laoreet. Curabitur vel eros nisi. Integer porta nunc in gravida dapibus. Pellentesque ornare massa ex, venenatis feugiat ex ullamcorper at.\r\n\r\nQuisque placerat est eget dui interdum, vitae placerat dui faucibus. Aenean odio ex, rutrum sed bibendum id, dapibus non eros. Nulla sed mauris tellus. Ut odio ante, sodales at arcu vel, semper porttitor leo. Vestibulum imperdiet nisl sed ullamcorper ultrices. Maecenas tortor dui, auctor ac accumsan sit amet, tincidunt sit amet felis. Duis gravida imperdiet elementum. Sed metus augue, dictum ut turpis pharetra, varius convallis enim.', '2021-12-10'),
(40, 19, 'Bonjour, ceci est mon post !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at dignissim libero. Curabitur luctus neque id consequat lacinia. Integer auctor viverra tortor, eu commodo sapien accumsan a. Vestibulum maximus neque felis, sit amet efficitur leo consectetur in. Aenean egestas augue mollis, aliquet turpis at, venenatis orci. Sed id tellus vel ex egestas imperdiet. Cras est libero, mollis nec pellentesque commodo, ornare nec est. Donec vel tortor ullamcorper, placerat eros sit amet, malesuada purus.\r\n\r\nPhasellus auctor, eros vel aliquet consequat, nulla mi vulputate odio, ut interdum mi velit eu tortor. Suspendisse tempus posuere tempus. Maecenas pharetra, turpis non porttitor consequat, dolor ante tempor quam, faucibus fermentum ante diam nec ipsum. Fusce vitae tincidunt metus, in consequat risus. Mauris pretium turpis eget leo fringilla, sed blandit elit mollis. In porttitor, dolor sit amet sagittis fermentum, metus nisi condimentum tortor, id venenatis quam tellus feugiat lectus. Sed et magna nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed tincidunt ultrices sodales. Proin ac convallis elit, et mattis ante.\r\n\r\nIn sollicitudin, purus quis tristique ullamcorper, sapien lorem porta mauris, ut tempor nisl augue vitae tellus. Duis eget ex mollis turpis efficitur bibendum in quis justo. Nulla facilisi. Nunc ac augue ac quam egestas accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor lectus vel leo pharetra tristique. Aenean aliquet tellus nec vulputate bibendum. Quisque vel elementum felis, at congue leo. Pellentesque quis posuere eros.', '2021-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `mail`, `isAdmin`, `date`) VALUES
(18, 'admin', '$2y$10$8FN2gf0lzfKTAdzC2vKn5u89/p0zHZsT0cu7VnjOceT0ZVU0GXz2q', 'admin@admin.ad', 1, '2021-12-10'),
(19, 'user', '$2y$10$oLRrEOlOdzdkV/Mffg7zAu33uIgUzBA0ZdpUEVfRXxyBphwS3yvWK', 'user@user.us', 0, '2021-12-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`idComment`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idImage`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
