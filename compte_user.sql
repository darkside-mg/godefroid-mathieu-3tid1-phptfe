-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 09 Juin 2015 à 18:48
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `q-rbex`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte_user`
--

CREATE TABLE `compte_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_inscription` datetime NOT NULL,
  `nbre_encours` int(11) DEFAULT NULL,
  `nbre_historique` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compte_user`
--

INSERT INTO `compte_user` (`id`, `username`, `password`, `email`, `sexe`, `ville`, `website`, `description`, `date_inscription`, `nbre_encours`, `nbre_historique`) VALUES
(23, 'ds-mg', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'darkside-mg@hotmail.com', 'm', 'Bouge', 'http://mathieugodefroid.be', 'Etudiant en Web Design MultimÃ©dia, je pratique Ã©galement la photographie et le geocaching.', '2015-06-08 18:18:11', NULL, NULL),
(29, 'jurydwm', 'cb79e672a05a8c384b0bf854b6567f482c1f1fca', 'jurydwm@esiaj.be', '', '', '', '', '2015-06-09 18:47:27', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `compte_user`
--
ALTER TABLE `compte_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `compte_user`
--
ALTER TABLE `compte_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;