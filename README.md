# hackday2015
Project worked on at HackDay in 2015

Demo: [here](tldr.me/zwrzz3q)

# Screenshots

### Make a Survey
<img width="500" alt="screen shot 2015-10-14 at 2 45 29 am" src="https://cloud.githubusercontent.com/assets/6231440/10476707/50fc7f2a-721e-11e5-84fe-3c0702f2688f.png">

### View results (could contain pre existing results)
<img width="500" alt="screen shot 2015-10-14 at 2 46 50 am" src="https://cloud.githubusercontent.com/assets/6231440/10476712/52c90da0-721e-11e5-8dd4-776cd1f9d3a3.png">

### Ask people to vote
<img width="300" alt="screen shot 2015-10-14 at 2 47 04 am" src="https://cloud.githubusercontent.com/assets/6231440/10476717/543421f2-721e-11e5-819d-941cab06b865.png">

# database dump

```
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `twitter_surveys` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `twitter_surveys`;

CREATE TABLE `Options` (
`ID` int(15) NOT NULL,
  `Name` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SurveyID` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `Surveys` (
`SurveyID` int(15) NOT NULL,
  `SurveyTag` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `Options`
 ADD PRIMARY KEY (`ID`);

ALTER TABLE `Surveys`
 ADD PRIMARY KEY (`SurveyID`);

ALTER TABLE `Options`
MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

ALTER TABLE `Surveys`
MODIFY `SurveyID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
```
