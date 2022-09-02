-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 21. Jul 2021 um 07:16
-- Server-Version: 5.7.24
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `web`
--

DELIMITER $$
--
-- Funktionen
--
CREATE DEFINER=`root`@`localhost` FUNCTION `coronameter2021_kagan_lippold_RINT` () RETURNS INT(11) BEGIN
DECLARE random INT;
SET random = RAND() * 100000 + 100000;
label1: WHILE random in (SELECT qid from coronameter2021_kagan_lippold_questionables) DO
SET random = RAND() * 100000 + 100000;
END WHILE label1;
RETURN random;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coronameter2021_kagan_lippold_questionables`
--

CREATE TABLE `coronameter2021_kagan_lippold_questionables` (
  `qid` int(11) NOT NULL,
  `question_name` varchar(200) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `type` enum('single','multiple','wdw','collab') NOT NULL DEFAULT 'single',
  `status` enum('prepare','open','closed','public') NOT NULL DEFAULT 'prepare',
  `visual` enum('bars','donut') NOT NULL DEFAULT 'bars',
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `coronameter2021_kagan_lippold_questionables`
--

INSERT INTO `coronameter2021_kagan_lippold_questionables` (`qid`, `question_name`, `user_name`, `type`, `status`, `visual`, `code`) VALUES
(146226, 'What to do on Friday?', 'admin', 'single', 'prepare', 'bars', 149005),
(146227, 'Which Software for our meeting?', 'admin', 'single', 'open', 'bars', 124236),
(146228, 'Movie on Friday should be...', 'admin', 'multiple', 'open', 'donut', 141009),
(146232, 'Test', 'admin', 'single', 'open', 'donut', 117713);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coronameter2021_kagan_lippold_questionables_content`
--

CREATE TABLE `coronameter2021_kagan_lippold_questionables_content` (
  `qid` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `coronameter2021_kagan_lippold_questionables_content`
--

INSERT INTO `coronameter2021_kagan_lippold_questionables_content` (`qid`, `answer`) VALUES
(146226, 'Do nothing and get some sleep!'),
(146226, 'Play Video Games!'),
(146226, 'Watch a movie!'),
(146227, 'Skype'),
(146227, 'Teamspeak'),
(146227, 'Zoom'),
(146228, 'Apollo 13'),
(146228, 'Avatar'),
(146228, 'Oceans Eleven'),
(146232, 'Test1'),
(146232, 'Test2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coronameter2021_kagan_lippold_users`
--

CREATE TABLE `coronameter2021_kagan_lippold_users` (
  `name` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `coronameter2021_kagan_lippold_users`
--

INSERT INTO `coronameter2021_kagan_lippold_users` (`name`, `password`, `mail`) VALUES
('admin', '40acd2fde1d45860ee81ef9581607fe9c3c5e893cbb11343eaac1fd66d69209d', 'admin@admin.de'),
('root', '9f2da3c18ab446c0bd8d5fd1ef146530b8e664b89aee5f922989031f46fdd509', 'root@root.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coronameter2021_kagan_lippold_votes`
--

CREATE TABLE `coronameter2021_kagan_lippold_votes` (
  `vid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `refferer` varchar(32) NOT NULL,
  `mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `coronameter2021_kagan_lippold_votes`
--

INSERT INTO `coronameter2021_kagan_lippold_votes` (`vid`, `qid`, `refferer`, `mail`) VALUES
(11, 146226, 'c97c01bf0c0711dda8a94977401f76cd', 'admin@admin.de'),
(12, 146226, 'da5a3d2d8c4cbd7dd594ae1cf8a71cf9', NULL),
(13, 146226, 'df33c34f0e883dbeabcf427d0332289e', NULL),
(14, 146228, 'f4f87f5ddbaf42bb1a426eff1015d71d', NULL),
(15, 146226, 'f4f87f5ddbaf42bb1a426eff1015d71d', NULL),
(16, 146226, 'c72d3a6c6eb8370fca30b40e28101826', NULL),
(17, 146228, 'c72d3a6c6eb8370fca30b40e28101826', NULL),
(18, 146232, 'c72d3a6c6eb8370fca30b40e28101826', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coronameter2021_kagan_lippold_vote_content`
--

CREATE TABLE `coronameter2021_kagan_lippold_vote_content` (
  `vid` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `coronameter2021_kagan_lippold_vote_content`
--

INSERT INTO `coronameter2021_kagan_lippold_vote_content` (`vid`, `answer`) VALUES
(11, 'Watch a movie!'),
(12, 'Watch a movie!'),
(13, 'Play Video Games!'),
(14, 'Apollo 13'),
(14, 'Oceans Eleven'),
(15, 'Watch a movie!'),
(16, 'Do nothing and get some sleep!'),
(17, 'Apollo 13'),
(18, 'Test1');

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `coronameter2021_kagan_lippold_vote_view`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `coronameter2021_kagan_lippold_vote_view` (
`code` int(11)
,`question_name` varchar(200)
,`answer` varchar(200)
,`appearances` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur des Views `coronameter2021_kagan_lippold_vote_view`
--
DROP TABLE IF EXISTS `coronameter2021_kagan_lippold_vote_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coronameter2021_kagan_lippold_vote_view`  AS  select `q`.`code` AS `code`,`q`.`question_name` AS `question_name`,`vc`.`answer` AS `answer`,count(`vc`.`answer`) AS `appearances` from ((`coronameter2021_kagan_lippold_questionables` `q` join `coronameter2021_kagan_lippold_votes` `v`) join `coronameter2021_kagan_lippold_vote_content` `vc`) where ((`q`.`qid` = `v`.`qid`) and (`v`.`vid` = `vc`.`vid`)) group by `vc`.`answer`,`q`.`question_name`,`q`.`code` order by `appearances` desc ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `coronameter2021_kagan_lippold_questionables`
--
ALTER TABLE `coronameter2021_kagan_lippold_questionables`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `username` (`user_name`);

--
-- Indizes für die Tabelle `coronameter2021_kagan_lippold_questionables_content`
--
ALTER TABLE `coronameter2021_kagan_lippold_questionables_content`
  ADD PRIMARY KEY (`qid`,`answer`);

--
-- Indizes für die Tabelle `coronameter2021_kagan_lippold_users`
--
ALTER TABLE `coronameter2021_kagan_lippold_users`
  ADD PRIMARY KEY (`name`);

--
-- Indizes für die Tabelle `coronameter2021_kagan_lippold_votes`
--
ALTER TABLE `coronameter2021_kagan_lippold_votes`
  ADD PRIMARY KEY (`vid`) USING BTREE,
  ADD KEY `votes_ibfk_1` (`qid`);

--
-- Indizes für die Tabelle `coronameter2021_kagan_lippold_vote_content`
--
ALTER TABLE `coronameter2021_kagan_lippold_vote_content`
  ADD PRIMARY KEY (`vid`,`answer`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `coronameter2021_kagan_lippold_questionables`
--
ALTER TABLE `coronameter2021_kagan_lippold_questionables`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146235;

--
-- AUTO_INCREMENT für Tabelle `coronameter2021_kagan_lippold_votes`
--
ALTER TABLE `coronameter2021_kagan_lippold_votes`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `coronameter2021_kagan_lippold_questionables`
--
ALTER TABLE `coronameter2021_kagan_lippold_questionables`
  ADD CONSTRAINT `coronameter2021_kagan_lippold_questionables_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `coronameter2021_kagan_lippold_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `coronameter2021_kagan_lippold_questionables_content`
--
ALTER TABLE `coronameter2021_kagan_lippold_questionables_content`
  ADD CONSTRAINT `coronameter2021_kagan_lippold_questionables_content_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `coronameter2021_kagan_lippold_questionables` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `coronameter2021_kagan_lippold_votes`
--
ALTER TABLE `coronameter2021_kagan_lippold_votes`
  ADD CONSTRAINT `coronameter2021_kagan_lippold_votes_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `coronameter2021_kagan_lippold_questionables` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `coronameter2021_kagan_lippold_vote_content`
--
ALTER TABLE `coronameter2021_kagan_lippold_vote_content`
  ADD CONSTRAINT `coronameter2021_kagan_lippold_vote_content_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `coronameter2021_kagan_lippold_votes` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
