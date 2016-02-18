-- Client: localhost
-- Généré le: Jeu 18 Février 2016 à 05:10
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

----------------------------------------------------------
--
--
-- Base de données: `groupe_sio2`
--

-- --------------------------------------------------------

--
-- Structure de la table `className`
--

CREATE TABLE IF NOT EXISTS `className` (
  `id_class` int(11) NOT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `class_option` varchar(50) DEFAULT NULL,
  `class_year` smallint(6) DEFAULT NULL,
  `dt_create` date NOT NULL,
  `dt_update` date NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `className`
--

INSERT INTO `className` (`id_class`, `class_name`, `class_option`, `class_year`, `dt_create`, `dt_update`) VALUES
(1, 'SIO', NULL, 2014, '2016-02-13', '2016-02-13');

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

CREATE TABLE IF NOT EXISTS `discipline` (
  `id_discipline` int(11) NOT NULL AUTO_INCREMENT,
  `name_discipline` varchar(50) NOT NULL,
  `dt_create` date NOT NULL,
  `dt_update` date NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  PRIMARY KEY (`id_discipline`),
  KEY `discipline_fk_1` (`id_evaluation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `discipline`
--

INSERT INTO `discipline` (`id_discipline`, `name_discipline`, `dt_create`, `dt_update`, `id_evaluation`) VALUES
(1, 'Mathématiques', '2016-02-14', '2016-02-14', 1),
(2, 'Français', '2016-02-16', '2016-02-16', 1);

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
  `grade_student` int(11) NOT NULL,
  `judgement` varchar(200) DEFAULT NULL,
  `coef_discipline` int(11) NOT NULL,
  `dt_create` date NOT NULL,
  `dt_update` date NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_discipline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluation`),
  KEY `evaluation___fk` (`id_student`),
  KEY `evaluation_fk` (`id_discipline`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`id_evaluation`, `grade_student`, `judgement`, `coef_discipline`, `dt_create`, `dt_update`, `id_student`, `id_discipline`) VALUES
(1, 10, 'pas content', 2, '2016-02-14', '2016-02-14', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(25) DEFAULT NULL,
  `student_firstname` varchar(50) DEFAULT NULL,
  `student_birthday` date DEFAULT NULL,
  `student_address` varchar(50) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `dt_create` date NOT NULL,
  `dt_update` date NOT NULL,
  `id_evaluation` int(11) DEFAULT NULL,
  `student_tel` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id_student`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `student`
--

INSERT INTO `student` (`id_student`, `student_name`, `student_firstname`, `student_birthday`, `student_address`, `student_email`, `dt_create`, `dt_update`, `id_evaluation`, `student_tel`) VALUES
(1, 'unNom', 'unPrenom', '2016-02-01', 'adresse de l etudiant', 'email@deletudiant.fr', '2016-02-11', '2016-02-11', NULL, '0493785110');

-- --------------------------------------------------------

--
-- Structure de la table `studentToClass`
--

CREATE TABLE IF NOT EXISTS `studentToClass` (
  `id_class` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  KEY `id_class` (`id_class`),
  KEY `id_student` (`id_student`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `roles` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` date NOT NULL,
  `dt_update` date NOT NULL,
  `id_discipline` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id_users`),
  KEY `id_discipline` (`id_discipline`),
  KEY `id_class` (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `discipline`
--
ALTER TABLE `discipline`
  ADD CONSTRAINT `discipline_fk_1` FOREIGN KEY (`id_evaluation`) REFERENCES `evaluation` (`id_evaluation`);

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
  ADD CONSTRAINT `evaluation___fk` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Contraintes pour la table `studentToClass`
--
ALTER TABLE `studentToClass`
  ADD CONSTRAINT `studentToClass_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `className` (`id_class`),
  ADD CONSTRAINT `studentToClass_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`id_discipline`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `className` (`id_class`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
