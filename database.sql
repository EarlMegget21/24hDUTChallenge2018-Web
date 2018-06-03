SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `localisation` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `hash` varchar(64) NOT NULL,
  `loginCreateur` varchar(32) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `loginCreateur` (`loginCreateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `titre`, `description`, `localisation`, `date`, `heure`, `hash`, `loginCreateur`, `public`) VALUES
(1, 'zfe', 'zef', 'zf', '2018-06-10', '00:00:10', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'test', 1),
(2, 'test', '', 'test', '2018-06-13', '00:00:00', 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `nom` varchar(32) CHARACTER SET utf8 NOT NULL,
  `idEvent` int(11) NOT NULL,
  `isPresent` tinyint(1) NOT NULL DEFAULT '0',
  `message` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`nom`,`idEvent`),
  KEY `fk_id` (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(32) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `email` varchar(32) NOT NULL,
  `nonce` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `mdp`, `nom`, `prenom`, `isAdmin`, `email`, `nonce`) VALUES
('test', '943eb4ff58956e1ce208fbf1752ff0622a974361aec1938c135c539f840fa015', 'firstname', 'lastname', 0, 'test@yopmail.com', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`loginCreateur`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;