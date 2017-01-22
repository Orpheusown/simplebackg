-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2017 at 08:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cnta`
--

-- --------------------------------------------------------

--
-- Table structure for table `cnta_admin`
--

CREATE TABLE IF NOT EXISTS `cnta_admin` (
  `adID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adName` varchar(20) NOT NULL,
  `adPassword` varchar(50) NOT NULL,
  PRIMARY KEY (`adID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cnta_admin`
--

INSERT INTO `cnta_admin` (`adID`, `adName`, `adPassword`) VALUES
(1, 'orphe', 'admin'),
(2, 'mdzz', 'mdzz');

-- --------------------------------------------------------

--
-- Table structure for table `cnta_news`
--

CREATE TABLE IF NOT EXISTS `cnta_news` (
  `ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `releaseTime` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `cnta_news`
--

INSERT INTO `cnta_news` (`ID`, `title`, `author`, `releaseTime`, `content`) VALUES
(1, 'wtf?', 'admin', '2017-01-08 00:00:00', 'how can i '),
(2, 'FBI agent who interrogated Sad', ' Curt Anderson', '2017-01-03 00:00:00', 'FILE- In this Jan. 7, 2017 file photo, George Piro, special agent in charge of the FBI''s Miami Division speaks during a news conference at Fort Lauderdale-Hollywood International Airport Terminal, in Fort Lauderdale, Fla. Piro was the FBI agent who interrogated Saddam Hussein alone for months after the former Iraqi leader''s capture, is now leading the investigation into the Florida airport shooting rampage blamed on an Iraq war veteran. (Roberto Koltun/Miami Herald via AP, File)'),
(3, 'Best News of the Day', 'KRISTEN WELKER', '2017-01-10 00:00:00', 'Kushner will resign from his company, divest "substantial assets," and recuse himself from matters that would impact his financial interests, Gorelick said. His remaining assets will be purchased by a trust.'),
(4, 'Airport shooting suspect may have planned to visit half-brother in Naples, family says', 'Paula McMahon', '2016-12-06 00:00:00', 'Bryan Santiago said he does not know why his brother chose Fort Lauderdale to shoot passengers awaiting their luggage at an airport baggage carousel on Friday, as federal agents allege. Authorities have said he planned the attack that killed five people, buying a one-way ticket from Anchorage and checking only his 9mm semiautomatic handgun.'),
(5, 'one', 'orphe', '2017-01-10 00:00:00', 'The AP reported that Esteban Santiago, after the incident at the FBI office, had been held for four days for treatment then released without medication or follow-up therapy.\r\n\r\nLike Florida, Alaska permits people to be held for up to 72 hours for a mental health evaluation. They can be committed longer with court approval.\r\n\r\nTen days after the visit to the FBI, on November 17, police sent Santiago a letter asking him to pick up his gun and an appointment was set for Nov. 30. When he showed up, however, the gun was not returned to him. Tolley did not say why. The firearm was finally released to him Dec. 8, Tolley said.\r\n\r\nFour weeks later, on Thursday night, Santiago boarded a Delta flight in Anchorage. Once in Fort Lauderdale, he recovered the gun at baggage claim, went into a bathroom, loaded the weapon and came out firing at people, police said.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
