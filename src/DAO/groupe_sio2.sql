-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 05 Mars 2016 à 08:55
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
  `class_year` varchar(10) DEFAULT NULL COMMENT 'Date de passage d''examen final',
  `nombreEtudiant` int(11) DEFAULT NULL,
  `description` text,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `className`
--

INSERT INTO `className` (`id_class`, `class_name`, `class_type`, `class_option`, `class_year`, `nombreEtudiant`, `description`, `dt_create`, `dt_update`) VALUES
(1, 'Classe de test', NULL, '', '2015-2016', 10, 'Classe de test !!!', '2016-02-27 00:00:00', '2016-02-27 00:00:00'),
(2, 'SIO', NULL, 'SLAM', '2014', 25, 'Du texte pour tester', '2016-02-18 00:00:00', '2016-02-19 00:00:00'),
(3, 'MUC', NULL, NULL, '2016', NULL, NULL, '2016-02-26 00:00:00', '2016-02-26 00:00:00'),
(4, 'NOMCLASSE', NULL, 'OPTION', '2000', 0, 'DESCRIPTION', '2016-02-27 00:00:00', '2016-02-27 00:00:00'),
(5, 're', NULL, 're', '34567', 12, 're', '2016-02-27 00:00:00', '2016-02-27 00:00:00'),
(6, 'rdffgrfgrggr', NULL, '', '2015-2016', 0, 'drvgdfgrgffgrgvrfgv', '2016-02-28 00:00:00', '2016-02-28 00:00:00'),
(7, 'coucou', NULL, '', '2015-2016', 20, 'dkezrhferifrgr', '2016-02-28 04:37:45', '2016-02-28 04:37:45'),
(8, 'coucou', NULL, '', '2015-2016', 20, 'cxbffghbhggthbtgt', '2016-02-28 04:38:41', '2016-02-28 04:38:41'),
(9, 'AG', NULL, '', '2015-2016', 20, 'zesfcerfgrg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'glou', NULL, '', '2015-2016', 102, '', '2016-02-28 04:47:42', '2016-02-28 04:47:42'),
(11, 'Classe de test 2', NULL, '', '2015-2016', 20, '', '2016-02-28 04:49:44', '2016-02-28 04:49:44'),
(12, 'test', NULL, 'xdcbcnb', 'jhgfds', 0, 'xcvbxcvnbvcn', '2016-02-28 05:15:46', '2016-02-28 05:15:46'),
(13, 'Classe de test 2', NULL, '', '2015-2016', 201, '', '2016-02-28 05:26:32', '2016-02-28 05:26:32'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, '2016-02-29 18:42:01', '2016-02-29 18:42:01'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, '2016-02-29 18:46:47', '2016-02-29 18:46:47'),
(16, 'luez-vers-une-architecture-php-professionnellere', NULL, 're', 're', 0, 're', '2016-02-29 18:48:52', '2016-02-29 18:48:52'),
(17, 'luez-vers-une-architecture-php-professionnellere', NULL, 're', 're', 0, 're', '2016-02-29 18:51:07', '2016-02-29 18:51:07'),
(18, 'luez-vers-une-architecture-php-professionnelle', NULL, 're', 're', 0, 're', '2016-02-29 19:03:00', '2016-02-29 19:03:00'),
(19, 're', NULL, 're', 're', 0, 're', '2016-02-29 19:11:20', '2016-02-29 19:11:20'),
(20, 'dsd', 'dss', 'ds', 'ds', 0, 'ds', '2016-02-29 22:09:11', '2016-02-29 22:09:11'),
(21, 'kjhb', 'kjhb', '', 'kjbv', 0, '', '2016-03-01 06:46:33', '2016-03-01 06:46:33'),
(22, 'kjhb', 'kjhb', '', 'kjbv', 0, '', '2016-03-01 06:47:40', '2016-03-01 06:47:40'),
(23, 'kjhb', 'kjhb', '', 'kjbv', 0, '', '2016-03-01 06:47:41', '2016-03-01 06:47:41'),
(24, 'ALLEZ', 'fdgfd', '', '', 0, '', '2016-03-01 06:51:07', '2016-03-01 06:51:07');

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

--
-- Contenu de la table `discipline`
--

INSERT INTO `discipline` (`id_discipline`, `name_discipline`, `description`, `dt_create`, `dt_update`) VALUES
(1, 'Mathématiques', 'c''est des maths', '2016-02-14 00:00:00', '2016-02-14 00:00:00'),
(2, 'Français', 'Rien n''est vrai tout est permis', '2016-02-16 00:00:00', '2016-02-16 00:00:00'),
(3, 'Anglais', 'English classroom guys, be aware! ', '2016-02-23 00:00:00', '0000-00-00 00:00:00'),
(4, 'Droit', 'a droit', '2016-02-27 00:00:00', '2016-02-27 00:00:00'),
(5, 'Economie / Management', 'Deep in the space invader', '2016-02-27 00:00:00', '2016-02-27 00:00:00'),
(6, 're', 're', '2016-02-27 00:00:00', '2016-02-27 00:00:00'),
(7, 'Matière', 'salut', '2016-02-27 00:00:00', '2016-02-27 00:00:00'),
(8, 'Matière', 'salut', '2016-02-28 00:00:00', '2016-02-28 00:00:00'),
(9, 'dsicipline', 'description', '2016-02-29 16:14:40', '2016-02-29 16:14:40'),
(10, 'Matièrere', 'rere', '2016-02-29 16:41:46', '2016-02-29 16:41:46'),
(11, 'MAtier', 're', '2016-02-29 17:16:13', '2016-02-29 17:16:13'),
(12, 'dhfdgjhjg', 'gfhhdgjhg', '2016-02-29 22:30:52', '2016-02-29 22:30:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`id_evaluation`, `grade_student`, `judgement`, `coef_discipline`, `dt_create`, `dt_update`, `id_student`, `id_discipline`) VALUES
(1, 2, 'salut tutti quanti', 2, '2016-02-26 00:00:00', '2016-02-26 00:00:00', 1, 3),
(23, 19, '', 2, '2016-02-26 00:00:00', '2016-02-26 00:00:00', 1, 1),
(24, 18, '', 2, '2016-02-26 00:00:00', '2016-02-26 00:00:00', 1, 3),
(48, 0, 're', 0, '2016-03-01 00:00:05', '2016-03-01 00:00:05', 10, 3),
(49, 111113000, '111113333', 111113333, '2016-03-01 00:00:25', '2016-03-01 00:00:25', 17, 3),
(50, 111113000, '111113333', 111113333, '2016-03-01 00:02:44', '2016-03-01 00:02:44', 17, 3),
(51, 111113000, '111113333', 111113333, '2016-03-01 00:03:10', '2016-03-01 00:03:10', 17, 3),
(52, 12, '14', 12, '2016-03-01 00:05:06', '2016-03-01 00:05:06', 4, 3),
(53, 12, '14', 12, '2016-03-01 00:05:13', '2016-03-01 00:05:13', 4, 3),
(54, 12, '12', 1, '2016-03-01 00:05:26', '2016-03-01 00:05:26', 5, 3),
(55, 2, 're', 12, '2016-03-01 00:08:16', '2016-03-01 00:08:16', 6, 3),
(56, 0, '''"', 0, '2016-03-01 00:22:04', '2016-03-01 00:22:04', 14, 3),
(57, 12, 'é&', 0, '2016-03-01 03:01:56', '2016-03-01 03:01:56', 3, 3),
(58, 0, 're', 0, '2016-03-01 04:23:07', '2016-03-01 04:23:07', 17, 3),
(59, 0, '', 0, '2016-03-01 06:48:21', '2016-03-01 06:48:21', 9, 3),
(60, 222, '', 0, '2016-03-01 06:53:13', '2016-03-01 06:53:13', 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `evaluationNew`
--

CREATE TABLE IF NOT EXISTS `evaluationNew` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
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
  `id_class` int(11) NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  PRIMARY KEY (`id_examen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `examen`
--

INSERT INTO `examen` (`id_examen`, `examen_name`, `date`, `description`, `id_class`, `dt_create`, `dt_update`) VALUES
(1, 'BTS Blanc', '2016-02-28', 'BTS Blanc d''anglais', 0, '2016-02-28 08:23:09', '2016-02-28 08:23:09'),
(3, 'BTS Blanc', '2016-02-27', 'zefefezfcezfc', 0, '2016-02-28 08:28:24', '2016-02-28 08:28:24'),
(4, 'Slngu', '2016-03-01', 'zfczefcefce', 0, '2016-02-28 08:29:02', '2016-02-28 08:29:02'),
(5, 'tr', '0000-00-00', 'tr', 0, '2016-02-29 22:50:14', '2016-02-29 22:50:14'),
(6, 'dfg', '0000-00-00', 'gfdgdf', 0, '2016-02-29 23:12:06', '2016-02-29 23:12:06'),
(7, 'dfg', '0000-00-00', 'gfdgdf', 0, '2016-02-29 23:17:38', '2016-02-29 23:17:38'),
(8, 'hf', '0000-00-00', 'gbb', 0, '2016-02-29 23:19:05', '2016-02-29 23:19:05'),
(9, 'hf', '0000-00-00', 'gbb', 0, '2016-02-29 23:21:53', '2016-02-29 23:21:53'),
(10, 'hf', '0000-00-00', 'gbb', 0, '2016-02-29 23:22:04', '2016-02-29 23:22:04'),
(11, 'sds', '0000-00-00', 'dsd', 0, '2016-02-29 23:28:48', '2016-02-29 23:28:48'),
(12, 'gfg', '0000-00-00', 'gdgdg', 0, '2016-02-29 23:29:37', '2016-02-29 23:29:37'),
(13, 'yty', '0000-00-00', 'tyty', 0, '2016-02-29 23:32:59', '2016-02-29 23:32:59'),
(14, 'ds', '0000-00-00', 'sds', 0, '2016-02-29 23:37:17', '2016-02-29 23:37:17'),
(15, 'yty', '0000-00-00', 'tyty', 0, '2016-02-29 23:38:00', '2016-02-29 23:38:00'),
(16, 're', '0000-00-00', 're', 0, '2016-02-29 23:38:52', '2016-02-29 23:38:52'),
(17, 're', '0000-00-00', 're', 0, '2016-02-29 23:43:45', '2016-02-29 23:43:45'),
(18, 'te', '0000-00-00', 're', 0, '2016-02-29 23:48:21', '2016-02-29 23:48:21'),
(19, 'te', '0000-00-00', 're', 0, '2016-02-29 23:51:55', '2016-02-29 23:51:55'),
(20, 're', '0000-00-00', 're', 0, '2016-02-29 23:57:13', '2016-02-29 23:57:13'),
(21, '222', '0000-00-00', '', 0, '2016-03-01 06:53:38', '2016-03-01 06:53:38');

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `id_parent` int(55) NOT NULL AUTO_INCREMENT,
  `adresse_parent` int(11) DEFAULT NULL,
  `id_student1` int(11) DEFAULT NULL,
  `id_student2` int(11) DEFAULT NULL,
  `id_student3` int(11) DEFAULT NULL,
  `id_student4` int(11) DEFAULT NULL,
  `dt_create` date NOT NULL,
  `dt_update` int(11) NOT NULL,
  PRIMARY KEY (`id_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `statutStudent`
--

CREATE TABLE IF NOT EXISTS `statutStudent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_student` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Représente la table pour les différents statuts des étudiants (alternant, PTFQ)' AUTO_INCREMENT=1 ;

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
  `id_evaluation` int(11) NOT NULL,
  PRIMARY KEY (`id_student`),
  KEY `id_class` (`id_class`),
  KEY `id_class_2` (`id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `student`
--

INSERT INTO `student` (`id_student`, `student_name`, `student_firstname`, `student_birthday`, `student_address`, `student_email`, `student_tel`, `student_statut`, `dt_create`, `dt_update`, `id_class`, `id_evaluation`) VALUES
(1, 'toto', 'Jean-Jacque', '2016-02-01', 'adresse de l etudiant', 'email@deletudiant.fr', '0493785110', '1', '2016-02-11 00:00:00', '2016-02-11 00:00:00', 2, 0),
(3, 'Karena', 'Emma', '2016-02-09', NULL, 'e.karena@etudiant.ufip', '1', '1', '2016-02-26 00:00:00', '2016-02-26 00:00:00', 2, 0),
(4, 'Bueno', 'Kinder', '0000-00-00', '95, route de valentin', 'k.bueno@etudiant.ufip', '0662520141', '', '2016-02-26 00:00:00', '2016-02-26 00:00:00', 3, 0),
(5, 'NOMETUDIANT', 'PRENOMETUDIANT', '0000-00-00', 'ADRESSETUDIANT', 'mail@mail.fr', '0909090909', '', '2016-02-27 00:00:00', '2016-02-27 00:00:00', 4, 0),
(6, 'NOMETUDIANT', 'PRENOMETUDIANT', '0000-00-00', '', 'mail@mail.fr', '0909090909', '', '2016-02-27 00:00:00', '2016-02-27 00:00:00', 4, 0),
(7, 'NOMETUDIANT', 'PRENOMETUDIANT', '0000-00-00', '', '', '0909090909', '', '2016-02-27 00:00:00', '2016-02-27 00:00:00', 4, 0),
(8, 'NOMETUDIANT', 'PRENOMETUDIANT', '0000-00-00', '', '', '0909090909', '', '2016-02-27 00:00:00', '2016-02-27 00:00:00', 4, 0),
(11, 'Toto', 'Titi', '2016-02-28', 'une adresse de test', 'adresse_mail@mail.fr', '0625362510', '', '2016-02-28 00:00:00', '2016-02-28 00:00:00', 1, 0),
(13, 're', 're', '0000-00-00', 're', 're@re.dr', 're', '', '2016-02-29 16:11:30', '2016-02-29 16:11:30', 9, 0),
(15, 're', 're', '0000-00-00', 're', 're@re.dr', 're', '', '2016-02-29 18:57:12', '2016-02-29 18:57:12', 5, 0),
(16, 're', 're', '0000-00-00', 're', 're@re.dr', 're', '', '2016-02-29 19:02:34', '2016-02-29 19:02:34', 5, 0),
(17, 'cx', 'xc', '0000-00-00', 'xc', 'xcx@dss.de', 'xc', '', '2016-02-29 22:09:59', '2016-02-29 22:09:59', 13, 0),
(18, 'Bueno', 'Marcuse', '0000-00-00', '666 route du diable', 'M.bueno@etudiant.ufip', '', '', '2016-03-02 09:35:16', '2016-03-02 09:35:16', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_firstname` varchar(50) DEFAULT NULL,
  `teacher_mail` varchar(100) DEFAULT NULL,
  `id_discipline` int(11) NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `id_discipline` int(11) DEFAULT NULL,
  `id_class` int(11) DEFAULT NULL,
  `id_parent` int(55) DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  KEY `id_discipline` (`id_discipline`),
  KEY `id_discipline_2` (`id_discipline`),
  KEY `id_discipline_3` (`id_discipline`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=119 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `name`, `firstname`, `password`, `salt`, `role`, `status`, `user_mail`, `description`, `dt_create`, `dt_update`, `id_discipline`, `id_class`, `id_parent`) VALUES
(1, '', NULL, NULL, '', 'YcM=A$nsYzkyeDVjEUa7W9K', '', 0, '', NULL, '0000-00-00 00:00:00', '2016-03-03 07:21:45', 0, NULL, NULL),
(118, '', NULL, NULL, '', 'saltparent', '', 1, '', NULL, '0000-00-00 00:00:00', '2016-03-03 08:30:35', NULL, NULL, NULL);

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
-- Contraintes pour la table `userToClass`
--
ALTER TABLE `userToClass`
  ADD CONSTRAINT `userToClass_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `className` (`id_class`),
  ADD CONSTRAINT `userToClass_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
