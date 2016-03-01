-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 01 Mars 2016 à 03:03
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `groupe_sio2`
--

-- --------------------------------------------------------

--
-- Structure de la table `className`
--

CREATE TABLE IF NOT EXISTS `className` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) DEFAULT NULL,
  `class_type` varchar(55) DEFAULT NULL,
  `class_option` varchar(50) DEFAULT NULL,
  `class_year` varchar(10) DEFAULT NULL,
  `nombreEtudiant` int(11) DEFAULT NULL,
  `description` text,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

CREATE TABLE IF NOT EXISTS `discipline` (
  `id_discipline` int(11) NOT NULL AUTO_INCREMENT,
  `name_discipline` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  PRIMARY KEY (`id_discipline`),
  KEY `id_evaluation` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Structure de la table `disciplineToClass`
--

CREATE TABLE IF NOT EXISTS `disciplineToClass` (
  `id_class` int(11) NOT NULL,
  `id_discipline` int(11) NOT NULL,
  KEY `id_class` (`id_class`),
  KEY `id_discipline` (`id_discipline`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `id_evaluation` int(11) NOT NULL AUTO_INCREMENT,
  `grade_student` float NOT NULL,
  `judgement` varchar(200) DEFAULT NULL,
  `coef_discipline` int(11) DEFAULT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  `id_student` int(11) DEFAULT NULL,
  `id_discipline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluation`),
  KEY `id_student` (`id_student`),
  KEY `id_discipline` (`id_discipline`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `id_examen` int(11) NOT NULL AUTO_INCREMENT,
  `examen_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  PRIMARY KEY (`id_examen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(25) NOT NULL,
  `student_firstname` varchar(50) NOT NULL,
  `student_birthday` date DEFAULT NULL,
  `student_address` varchar(50) DEFAULT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_tel` varchar(10) DEFAULT '1',
  `student_statut` varchar(100) NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id_student`),
  KEY `id_class` (`id_class`),
  KEY `id_class_2` (`id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(88) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'décrit la fonction de l''utilisateur',
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  `id_discipline` int(11) NOT NULL,
  `id_class` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  KEY `id_discipline` (`id_discipline`),
  KEY `id_discipline_2` (`id_discipline`),
  KEY `id_discipline_3` (`id_discipline`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=117 ;

-- --------------------------------------------------------

--
-- Structure de la table `userToClass`
--

CREATE TABLE IF NOT EXISTS `userToClass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`id_class`),
  KEY `id_user_2` (`id_user`),
  KEY `id_class` (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `disciplineToClass`
--
ALTER TABLE `disciplineToClass`
  ADD CONSTRAINT `disciplineToClass_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `className` (`id_class`),
  ADD CONSTRAINT `disciplineToClass_ibfk_2` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`id_discipline`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_fk` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`id_discipline`),
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`),
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`id_discipline`),
  ADD CONSTRAINT `evaluation___fk` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `className` (`id_class`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`id_discipline`);

--
-- Contraintes pour la table `userToClass`
--
ALTER TABLE `userToClass`
  ADD CONSTRAINT `userToClass_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `className` (`id_class`),
  ADD CONSTRAINT `userToClass_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
