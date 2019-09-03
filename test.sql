-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 03 sep. 2019 à 10:51
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 2, 'Mathieu', 'Preum\'s', '2017-09-24 17:12:30'),
(2, 2, 'Sam', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2017-09-24 17:21:34'),
(8, 1, 'Jojo', 'C\'est moi !', '2017-09-28 19:50:14'),
(9, 2, 'Mathieu', 'Retest\r\nEncore', '2017-10-27 11:46:50'),
(10, 2, 'Sam', 'tu testes quoi ?', '2017-10-27 15:44:14'),
(11, 2, 'KONE', 'blablab', '2019-08-08 11:02:19'),
(12, 7, 'Moi', 'commzejqnskcK,SC,X', '2019-08-18 13:01:58'),
(13, 20, 'blabla', '<p>vjqskeor</p>', '2019-08-30 16:18:25');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(19, 'L\'art d\'atteindre vos buts plus facilement', '<p>Voluptatem sunt quos voluptates odit cum. Fuga ea ut rem expedita sint esse voluptatibus. Ipsa sint enim eos et.Impedit atque quo hic ea. Aspernatur iusto hic sint deserunt ea quas. Consequuntur impedit aut quibusdam est deleniti dolores.Qui debitis voluptas quo. Eius qui nisi et minima labore qui officia. Assumenda ullam voluptate magnam repellendus.Animi qui expedita et distinctio ut unde. Commodi fugit et molestias. Ut soluta quod quaerat. Quia facilis nemo aut voluptas ut.Doloremque autem quos aut sapiente assumenda. At iure at aspernatur neque. Rerum eum assumenda quaerat culpa incidunt repellat atque.</p>', '2019-08-21 12:15:02'),
(20, 'Le pouvoir d\'innover à l\'état pur', '<p>Qui enim nihil dolor temporibus impedit alias. Suscipit sit autem sapiente tempora.Omnis sunt sapiente quia et dolorum omnis. Quasi neque deserunt quasi officia dolorem. Ducimus incidunt aut voluptatem nihil quas qui beatae. Possimus doloremque dolorem in veniam sunt maiores voluptatem.Veniam labore aut sint suscipit inventore. Non iure fugit distinctio adipisci cupiditate. Voluptatum unde perspiciatis nihil accusantium nostrum.At rem vel fugit numquam ut. Eos odit sint quae architecto. Illo atque ducimus excepturi ea adipisci et nesciunt.Earum tenetur quo ut quasi dolorem. Et impedit officiis vitae accusamus. Dolores eius distinctio sunt cumque exercitationem nesciunt.</p>', '2019-08-21 12:18:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
