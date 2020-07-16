-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 16 juil. 2020 à 16:51
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Jane doe', 'Superbe chapitre. on en veut encore.', '2020-07-14 10:38:16'),
(2, 1, 'John Doe', 'Bof moi ça me rappelle déjà un truc', '2020-07-14 10:38:41'),
(4, 1, 'Spamer01', '&lt;a href: &quot;www.bigcock.com&quot;&gt; Visit us &lt;/a&gt;', '2020-07-14 10:41:08'),
(7, 1, 'john doe', 'superbe génial.', '2020-07-16 14:06:27');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre 1', '<p>&Agrave; ce qu&rsquo;il parait, il faut toujours planter le d&eacute;cor.<br />Alors, plantons-le.<br />Je suis un quadra moyen, avec une vie moyenne. Mari&eacute;,<br />divorc&eacute;, pension alimentaire, sans grands dipl&ocirc;mes, juste<br />mon exp&eacute;rience, et mon exp&eacute;rience &ccedil;a vaut plus autant<br />qu&rsquo;avant sur le march&eacute; de l&rsquo;emploi.<br />Aujourd&rsquo;hui je postule dans un call center. Des<br />enfilades de postes les uns &agrave; c&ocirc;te des autres. Une tour vitr&eacute;e<br />enti&egrave;rement d&eacute;di&eacute;e &agrave; tout et &agrave; rien. Des prises de rendez-vous<br />pour des fen&ecirc;tres, des conseils fiscaux, des produits<br />bancaires, des mutuelles, des jeux, des salons, des canap&eacute;s,<br />du vin, de la charcuterie, de la voyance, du t&eacute;l&eacute;phone rose.<br />Tout ce qui a la place de passer par les orifices d&rsquo;un combin&eacute;<br />se trouve ici. Si vous poss&eacute;dez un t&eacute;l&eacute;phone ou une bo&icirc;te<br />mail, alors vous avez d&eacute;j&agrave; eu affaire &agrave; eux. C&rsquo;est comme &ccedil;a<br />que le gamin qui me re&ccedil;oit me vend les m&eacute;rites du groupe.<br />Je n&rsquo;&eacute;coute pas vraiment ce qu&rsquo;il me raconte. C&rsquo;est un amas<br />de pens&eacute;es pr&eacute;dig&eacute;r&eacute;es par sa hi&eacute;rarchie, c&rsquo;est lui qui a le<br />mieux appris sa le&ccedil;on, c&rsquo;est pour &ccedil;a qu&rsquo;il a cette place. Il est<br />fier de savoir son br&eacute;viaire par coeur, et il montre comme un<br />chien savant sa fid&eacute;lit&eacute;, c&rsquo;est lui qui a &eacute;t&eacute; choisi. Un jour,<br />il se r&eacute;veillera, un jour. Mais pour l&rsquo;instant, je regarde le<br />num&eacute;ro de cirque. Je sais que je vais signer un contrat dans<br />l&rsquo;heure. Pas n&eacute;cessaire d&rsquo;&ecirc;tre devin pour comprendre qu&rsquo;ils<br />ont besoin de chair &agrave; canon. Les gens ne restent jamais<br />longtemps, ils craquent tous &agrave; un moment.<br />Voil&agrave; mon contrat, un poste de t&eacute;l&eacute;conseiller. Je<br />tournerai sur plusieurs types de services. Les horaires,<br />variables. Je serai pay&eacute; le minimum syndical, plus primes si r&eacute;sultats. Mais je ne me fais pas d&rsquo;illusions, je ne verrai<br />s&ucirc;rement jamais une prime. Il me balade dans tout le<br />bureau. Sous pr&eacute;texte de me montrer les lieux, il m&rsquo;exhibe<br />comme un troph&eacute;e. Vous voyez, si vous n&rsquo;&ecirc;tes pas de bons<br />soldats, d&rsquo;autres viendront prendre votre place. Je suis un<br />nouveau consommable au milieu des consommables us&eacute;s.<br />Mon r&ocirc;le, faire en sorte que les plus faibles donnent toutes<br />leurs derni&egrave;res forces dans la bataille afin qu&rsquo;ils partent<br />bien vides. Mon tour de piste n&rsquo;a pas d&rsquo;autre utilit&eacute;.<br />Je pars avec la conviction que ce soir quelques-uns des<br />employ&eacute;s mod&egrave;les de cette &laquo; famille bienveillante &raquo;<br />rentreront chez eux avec la certitude qu&rsquo;ils ne garderont pas<br />leurs jobs. Par ma pr&eacute;sence, je participe &agrave; ce sentiment. Si<br />certains font des erreurs demain, je n&rsquo;y serai pas &eacute;tranger.<br />Si des portes se ferment, je sais que ce sera en partie &agrave; cause<br />de moi. Je le sais. Et je continue quand m&ecirc;me.<br />Certains disent qu&rsquo;&agrave; 40 ans on atteint la sagesse.<br />J&rsquo;ai 40 ans, et la sagesse c&rsquo;est d&rsquo;accepter l&rsquo;inacceptable.<br />Accepter la mort de ses parents, la perte de votre vie pass&eacute;e.<br />Voir son ex se pavaner avec votre pognon et son nouveau<br />mec. Comprendre que vos enfants n&rsquo;en veulent qu&rsquo;&agrave; votre<br />pognon et que vous n&rsquo;&ecirc;tes rien pour eux si &ccedil;a ne leur sert<br />pas. Accepter tout cela en bloc. Dire oui &agrave; tout ensuite,<br />c&rsquo;est simple comme bonjour. Avancer machinalement<br />pour ne pas tomber. Je ne pensais pas que l&rsquo;instinct de<br />survie &eacute;tait autant d&eacute;velopp&eacute;. &Ccedil;a doit &ecirc;tre &ccedil;a la sagesse.<br />Pouvoir m&rsquo;endormir tout en sachant que je suis une ordure<br />en puissance, un zombie au milieu des autres, une pute &agrave;<br />six sous, et que parfois j&rsquo;en redemande. Je me souhaite la<br />bonne nuit &agrave; d&eacute;faut de pouvoir me souhaiter autre chose.<br />Cette nuit va &ecirc;tre difficile.</p>', '2020-07-14 10:34:46');

-- --------------------------------------------------------

--
-- Structure de la table `reporting`
--

CREATE TABLE `reporting` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reporting_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_bin NOT NULL,
  `pass` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(33, 'ani', '$2y$10$MYQYiNAdujmAwUEvY4PWgefO9Gh4psrW0WDXmVG0ekqUhA8aUepo.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reporting`
--
ALTER TABLE `reporting`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `reporting`
--
ALTER TABLE `reporting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
