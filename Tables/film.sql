-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 08 déc. 2022 à 17:42
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phplogin`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `ID_Movie` int(11) NOT NULL,
  `Name_Movie` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Duree` int(11) NOT NULL,
  `Production` varchar(255) NOT NULL,
  `Date` int(11) DEFAULT NULL,
  `lien` text NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `realisation` varchar(255) DEFAULT NULL,
  `Acteurs_principaux` varchar(255) DEFAULT NULL,
  `musique` varchar(255) DEFAULT NULL,
  `scenario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`ID_Movie`, `Name_Movie`, `Genre`, `Duree`, `Production`, `Date`, `lien`, `prix`, `realisation`, `Acteurs_principaux`, `musique`, `scenario`) VALUES
(3, 'Star Wars - Épisode III : La Revanche des Sith', 'SF', 140, 'Lucasfilm Ltd', 2005, '<iframe src=\"https://www.youtube.com/embed/t1qtvKYwTV0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'George Lucas', 'Ewan McGregor <br>\r\nNatalie Portman <br>\r\nHayden Christensen <br>\r\nIan McDiarmid <br>\r\nSamuel L. Jackson', 'John Williams', 'George Lucas'),
(4, 'Solo - A Star Wars Story', 'SF', 135, 'Lucasfilm Ltd', 2018, '<iframe src=\"https://www.youtube.com/embed/YjEAoKX6mDw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'Ron Howard', 'Alden Ehrenreich <br>\r\nEmilia Clarke <br>\r\nDonald Glover <br>\r\nWoody Harrelson <br>', 'John Powell <br>\r\nJohn Williams', 'Lawrence Kasdan <br>\r\nJonathan Kasdan'),
(8, 'Avatar', 'SF', 162, '20th Century Fox', 2009, '<iframe src=\"https://www.youtube.com/embed/O1CzgULNRGs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'James Cameron', 'Sam Worthington <br>\r\nZoe Saldana <br>\r\nSigourney Weaver <br>\r\nStephen Lang <br>\r\nMichelle Rodríguez', 'James Horner', 'James Cameron'),
(9, 'AVATAR : LA VOIE DE L&#039;EAU', 'SF', 190, '20th Century Fox', 2022, '<iframe src=\"https://www.youtube.com/embed/STH90f4SHsc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'James Cameron', 'Sam Worthington <br>\r\nZoe Saldana <br>\r\nSigourney Weaver <br>\r\nStephen Lang <br>\r\nKate Winslet', 'Simon Franglen', 'James Cameron <br>\r\nJosh Friedman'),
(12, 'Scarface', 'gangsters', 170, 'Universal Pictures', 1983, '<iframe src=\"https://www.youtube.com/embed/3VNLz5pHq74\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'Brian De Palma', 'Al Pacino <br>\r\nSteven Bauer <br>\r\nMichelle Pfeiffer <br>\r\nMary Elizabeth Mastrantonio', 'Giorgio Moroder', 'Oliver Stone'),
(13, 'Fast and Furious 1', 'Action', 106, 'Universal Pictures', 2001, '<iframe  src=\"https://www.youtube.com/embed/b0EJzs6U9t8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'Rob Cohen', 'Vin Diesel <br>\r\nPaul Walker <br>\r\nMichelle Rodriguez <br>\r\nJordana Brewster', 'BT', 'Gary Scott Thompson <br>\r\nDavid Ayer <br>\r\nErik Bergquist'),
(14, 'Fast and Furious 2', 'Action', 107, 'Universal Pictures', 2003, '<iframe  src=\"https://www.youtube.com/embed/KUX6KI3-AjA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'John Singleton', 'Paul Walker <br>\r\nTyrese Gibson <br>\r\nEva Mendes <br>\r\nCole Hauser', 'David Arnold', 'Michael Brandt <br>\r\nDerek Haas <br>\r\nGary Scott Thompson'),
(17, 'Le Roi Lion', 'Animation', 89, 'Walt Disney Pictures', 1994, '<iframe  src=\"https://www.youtube.com/embed/-KfIYw-D4Iw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5, 'Roger Allers <br>\r\nRob Minkoff', 'NA', 'Hans Zimmer', 'Irene Mecchi <br>\r\nJonathan Roberts <br>\r\nLinda Woolverton <br>\r\nBrenda Chapman <br>\r\nLorna Cook <br>\r\nChris Sanders <br>\r\nJoseph Ranft <br>\r\nJim Capobianco <br>\r\nAndrew Gaskill <br>\r\nTom Sito <br>\r\nBurny Mattinson');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_Movie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `ID_Movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
