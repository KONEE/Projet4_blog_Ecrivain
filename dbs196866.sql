-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: db5000201876.hosting-data.io
-- Generation Time: Jan 07, 2020 at 02:49 PM
-- Server version: 5.7.28-log
-- PHP Version: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs196866`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `tag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `tag`) VALUES
(38, 83, '\"test\" test \'', 'test test \'test\' & test', '2019-12-30 18:30:33', 0),
(39, 83, 'autre testé', 'commentaire terminé !!', '2019-12-30 18:33:56', 0),
(40, 83, 'Test-auteur', 'Test commmentaires...', '2020-01-05 13:27:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membresAdmin`
--

CREATE TABLE `membresAdmin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membresAdmin`
--

INSERT INTO `membresAdmin` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'titi', '$2y$10$wycNRCFwOWM4j5pNCWOaF.WPBWFpahO0TEk9jtfVCfuD.GWOrIpcO', 'titi@gmail.com', '2020-01-05'),
(5, 'root', '$2y$10$CJvxmMebYKhaXFWZuN/2wOjWtmtWJvSU6gAZ5n.8bZAJWucH5XzCO', 'saadokone@gmail.com', '2019-09-25'),
(6, 'admin', '$2y$10$ma.8Jp2hxuNx14oxv/b7t.5i48zxKKldm2Z0jqnzhRV.2K16GPz0a', 'admin@gmail.com', '2020-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(74, 'La Préférence nationale', 'De son Île natale au sol français, de ses premiers émois à ses récentes déceptions, c\'est à un voyage géographique social et mental, que nous convie la narratrice de ce recueil. Usant d\'une langue incisive et colorée, la jeune romancière et poétesse sénégalaise y dépéint tant la brutalité des sociétés traditionnelles que la calme violence de nos sociétés d\'exclusion. Sombre tableau que vient animer l\'allégresse féroce du style, et tempérer la douce nostalgie des premières années villageoises.', '2019-11-11 16:34:55'),
(76, 'Celles qui attendent ', 'Arame et Bougna, mères de deux fils partis clandestinement pour l\'Europe, ne comptaient plus leurs printemps ; chacune était la sentinelle vouée et dévouée à la sauvegarde des siens, le pilier qui tenait la demeure sur les galeries creusées par l\'absence. Coumba et Daba, les jeunes épouses, humaient leurs premières roses : assoiffées d\'amour, d\'avenir et de modernité, elles s\'étaient lancées, sans réserve, sur une piste du bonheur devenue peu à peu leur chemin de croix. La vie n\'attend pas les absents : les autours varient, les secrets de famille affleurent, les petites et grandes trahisons alimentent la chronique sociale et déterminent la nature des retrouvailles. Le visage qu\'on retrouve n\'est pas forcément celui qu\'on attendait...', '2019-11-11 16:40:01'),
(77, 'Inassouvies, nos vies', 'Betty passe son temps à observer l\'immeuble d\'en face.\r\nSon attention se focalise sur une vieille dame ; à son air joyeux, elle la baptise Félicité et se prend d\'affection pour elle.\r\nLorsque Félicité est envoyée contre son gré dans une maison de retraite, Betty remue ciel et terre pour la retrouver.\r\nUne véritable amitié va les lier.\r\nUne nouvelle va plonger Félicité dans le mutisme. Impuissante, Betty prend du recul et part quelques jours. À son retour, Félicité n\'est plus.\r\nBetty sombre dans la mélancolie. Une rencontre la sort du spleen : l\'Ami, qu\'elle va aimer comme on aime un homme qu\'on ne touchera jamais, car le voir suffit. Mais la vie fait ses trous de dentelle ; au vide de trop, c\'est le déclic : Betty largue les amarres, disparaît, on ne sait où. Chez elle, seule la musique, la kora, répond aux questions : inassouvie, la vie, puisqu\'il y a toujours un vide à combler.', '2019-11-11 16:42:59'),
(78, 'Impossible de grandir ', 'Salie est invitée à dîner chez des amis. Une invitation apparemment anodine mais qui la plonge dans la plus grande angoisse. Pourquoi est-ce si « impossible » pour elle d\'aller chez les autres, de répondre aux questions sur sa vie, sur ses parents ? Pour le savoir, Salie doit affronter ses souvenirs. Poussée par la Petite, son double enfant, elle entreprend un voyage intérieur, revisite son passé : la vie à Niodior, les grands-parents maternels, tuteurs tant aimés, mais aussi la difficulté d\'être une enfant dite illégitime, le combat pour tenir debout face au jugement des autres et l\'impossibilité de faire confiance aux adultes. À partir de souvenirs personnels, intimes, Fatou Diome nous raconte, tantôt avec rage, tantôt avec douceur et humour, l\'histoire d\'une enfant qui a grandi trop vite et peine à s\'ajuster au monde des adultes. Mais n\'est-ce pas en apprivoisant ses vieux démons qu\'on s\'en libère ? « Oser se retourner et faire face aux loups », c\'est dompter l\'enfance, enfin.', '2019-11-11 16:45:14'),
(79, 'Une tempête ', 'Un navire sombre dans les eaux furieuses d\'une tempête infernale. Depuis l\'île où il a été exilé à la suite d\'un funeste complot, le duc et magicien Prospero contemple le naufrage. et voit débarquer ses ennemis d\'autrefois. La vengeance est proche ! Mais son esclave Caliban se révolte, et rien ne sera plus comme avant.\r\nAdaptant pour un théâtre nègre \"La Tempête de Shakespeare\", Césaire démystifie le merveilleux pour mieux faire surgir le chant de la liberté.', '2019-11-11 16:47:14'),
(80, 'La tragédie du roi Christophe ', 'Précédée par \"Et les chiens se taisaient\" (1946, \" arrangé \" pour le théâtre en 1956) et suivie de \"Une saison au Cong\"o (1967), \"La tragédie du roi Christophe\" constitue la pièce maîtresse de ces \" tragédies de la décolonisation \" écrites par Aimé Césaire pour témoigner - remarquablement - d\'un acte politique majeur de notre temps.\r\n\"La tragédie du roi Christophe\", est une ouvre barbare (au sens noble du terme) lyrique et nécessaire. Affirmant que la politique est la force moderne du destin et l\'histoire la politique vécue, Aimé Césaire donne à voir l\'invention du futur, d\'un futur enraciné. L\'aventure haïtienne de Christophe évoque le destin collectif du peuple africain d\'aujourd\'hui. A la phase de la révolte aiguë a succédé celle de la re-connaissance, de la constitution d\'un patrimoine authentique et librement assumé.\r\nCette entreprise doit être celle d\'un bâtisseur, d\'un architecte : Aimé Césaire a su créer un personnage d\'une grande et haute stature avec une vigueur et une invention poétique exceptionnelles. Christophe (qu\'habita, si puissamment, le comédien Douta Seck) est un homme d\'Afrique. Il est le Muntu, l\'homme qui participe à la force vitale (le n\'golo) et l\'homme du verbe (le nommo). Le texte initial de la pièce a fait l\'objet de révisions multiples.', '2019-11-11 16:50:30'),
(81, 'C\'est aujourd\'hui toujours ', '«Le message codé nommé \"poème\" s\'adresse à la solitaire sans bague / au solitaire en tous : il révèle à la loupe les contradictions internes du sujet, ses élans, ses volontés, ses besoins, ses exigences, jusqu\'à plus soif. Écrire sur le dos d\'une seule main le télégramme général (enragé) où l\'on fait part de sa théorie provisoire, tel me semble en tout cas le maximum de liberté perceptible à la lecture. Qu\'on l\'envoie par lettre, par livre ou par bulletin hebdomadaire, peu importe : l\'inscription accélérée fait mouche quand elle ne répète aucune parole déjà dite. La liberté consiste à former pour la première fois un sens multiple : syntagme, geste, silence, décision. En avançant dans l\'espace ouvert par les jambes désirées, on assiste à la concentration spontanée de tous les signes du dedans qui se préparent au rut. Les hésitations fondent. Mais le feu dont on dit tant de bien par lyrisme ne se présente plus sous forme de flammes, mais de mots-clés.»Alain Jouffroy.', '2019-11-11 16:53:50'),
(82, 'La Vie réinventée ', 'Reconquête et anamnèse des six années qui ont succédé à la Première Guerre mondiale, où Paris est devenu le foyer explosif de la modernité - Dada et le surréalisme, la libération des moeurs, la libération des femmes, la révolution des techniques d\'expression -, cette réédition de La Vie réinventée réinjecte dans notre temps de nihilisme le sang de la liberté. De Modigliani, Soutine, Kiki de Montparnasse à Tzara, Picabia, Breton, Aragon, Soupault et Man Ray, tous les acteurs de cette révolution revivent et évoluent presque sous nos yeux. Écrit par Alain Jouffroy pendant les années 70, après l\'enquête qu\'il a menée auprès des derniers survivants de cette époque, ce livre est devenu un ouvrage de référence. Vingt-deux ans après sa première publication chez Robert Laffont, il a été entièrement revu par l\'auteur, qui y a découvert les fondements d\'une philosophie de l\'existence, où l\'individu est le seul acteur susceptible de changer la société. On y retrouve le souffle et la passion qui traversent les romans et les poèmes de cet écrivain révolutionnaire qu\'est Alain Jouffroy.', '2019-11-11 16:57:16'),
(83, 'Paris, de la belle époque aux années folles ', 'Dans notre imaginaire, le Paris de la Belle Époque aux années Trente est synonyme, malgré les guerres et les violents conflits sociaux, de faste, de gaieté, d\'essor financier, industriel, économique, de foisonnement intellectuel et artistique.<br /><br />C\'est le Moulin Rouge de la Goulue et de Toulouse-Lautrec, les premiers bains de mer, les premières automobiles, les premiers pas de l\'aviation, les longues nattes de l\'écrivain Colette, le théâtre de Feydeau. C\'est aussi le Dôme, la Coupole ou encore la Closerie des Lilas, où se croisent artistes et écrivains, les salons mondains que fréquentait entre autres Marcel Proust. Paris, c\'est aussi Guimard et ses entrées de métro, les grandes Expositions universelles, Kiki de Montparnasse, Joséphine Baker...et les Américains de Paris.\r\nMontmartre et Montparnasse ont été au centre des avant-gardes qui ont façonné les arts de ce début de xxe siècle. Aux yeux des contemporains cependant, la capitale bénéficiait avant tout d\'un rayonnement culturel séculaire dont l\'académisme, en peinture, sculpture et architecture, était l\'héritier le plus achevé.\r\nAussi cet ouvrage donne-t-il à voir, grâce à plus de cinq cent reproductions d\'œuvres disséminées dans le monde entier, la richesse contradictoire des écoles et chapelles, mouvements et tendances présents dans la capitale durant ces décennies fécondes.', '2019-11-11 16:59:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `membresAdmin`
--
ALTER TABLE `membresAdmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`,`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `membresAdmin`
--
ALTER TABLE `membresAdmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;