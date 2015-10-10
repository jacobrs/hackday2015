# hackday2015
Project worked on at HackDay in 2015

# database dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `twitter_surveys`
--
CREATE DATABASE IF NOT EXISTS `twitter_surveys` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `twitter_surveys`;

-- --------------------------------------------------------

--
-- Table structure for table `Options`
--

CREATE TABLE `Options` (
`ID` int(15) NOT NULL,
  `Name` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SurveyID` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Surveys`
--

CREATE TABLE `Surveys` (
`SurveyID` int(15) NOT NULL,
  `SurveyTag` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Options`
--
ALTER TABLE `Options`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Surveys`
--
ALTER TABLE `Surveys`
 ADD PRIMARY KEY (`SurveyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Options`
--
ALTER TABLE `Options`
MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Surveys`
--
ALTER TABLE `Surveys`
MODIFY `SurveyID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
