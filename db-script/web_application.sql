-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2018 at 03:51 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Colleges and Universities'),
(2, 'Breaking News'),
(3, 'Current Events'),
(4, 'Magazines'),
(5, 'Newspapers'),
(6, 'Politics'),
(7, 'Sports'),
(8, 'Technology'),
(9, 'Weather'),
(10, 'Regional News');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date_posted` datetime NOT NULL,
  `News_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Comment_News1_idx` (`News_id`),
  KEY `fk_Comment_User1_idx` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `date_posted`, `News_id`, `User_id`) VALUES
(18, 'Comment 1', '2018-03-21 16:46:07', 12, 50),
(19, 'lorem ipsum dolor sit amet', '2018-03-21 16:46:27', 12, 50);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_posted` datetime NOT NULL,
  `User_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_News_User_idx` (`User_id`),
  KEY `fk_News_Category1_idx` (`Category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date_posted`, `User_id`, `Category_id`) VALUES
(9, 'A Winning Political Issue Hiding in Plain Sight', 'In Alabamaâ€™s recent special Senate election, the progressive group Priorities USA was looking for ways to lift African-American voter turnout. So Priorities tested several different advertisements, to see which ones made people want to vote.\r\n\r\nThere was no shortage of potential ad material in Alabama. Roy Moore, the Republican nominee, had a trail of bigoted statements and alleged sexual molestation. Doug Jones, the Democrat, had prosecuted Ku Klux Klansmen for murder. Priorities tested each of these themes and others, too: Mooreâ€™s ties to white supremacists; Mooreâ€™s closeness to President Trump; Jonesâ€™s endorsements from civil-rights leaders.\r\n\r\nYet none of these tested as well as a 15-second ad that never mentioned Moore.\r\n\r\nâ€œMy kids are going to do more than just survive the bigotry and hatred,â€ a female narrator says, as the video shows a Klan march and then a student at a desk. â€œTheyâ€™re going to get an education, start a business, earn a good living, make me proud. Education is my priority. Thatâ€™s why Iâ€™m voting for Doug Jones.â€\r\n\r\nThe test results surprised the leaders of Priorities, and no wonder: Weâ€™re supposed to be living in a time of education skepticism. The media regularly run stories suggesting education is overrated. K-12 schools are said to be in a never-ending crisis, and college debt has become a new crisis. A much-discussed Pew Research Center poll recently found a jump in the number of people saying colleges had a negative effect on the country.', '2018-03-21 16:33:25', 50, 1),
(10, 'Egyptian Court Convicts Three Al Jazeera Journalists', 'CAIRO â€” Secretary of State John Kerry came to Egypt this weekend to renew its â€œimportant partnershipâ€ with Washington and to offer its new president, Abdel Fattah el-Sisi, assurance of the swift restoration of military aid.\r\n\r\nLess than 24 hours after Mr. Kerryâ€™s visit, a judge on Monday convicted three journalists from Al Jazeeraâ€™s English-language network of conspiring with the Muslim Brotherhood to broadcast false reports. The judge sentenced each one to at least seven years in prison â€” all without making public any evidence and without a word from Mr. Sisi.\r\n\r\nThe verdict has set off an international backlash against the Egyptian governmentâ€™s crackdown on news media freedom and political dissent. But it has also put the White House in the awkward position of appearing to once again ally itself with an authoritarian leader just three years after President Obama backed the popular uprising against President Hosni Mubarak.\r\n\r\nMr. Kerry, on a visit to Baghdad on Monday, appeared stunned by the verdict and sentence, telling journalists that he had immediately called the Egyptian foreign minister to express â€œour serious displeasure.â€\r\n\r\nâ€œInjustices like these simply cannot stand,â€ Mr. Kerry said, for Egypt to move forward, as Mr. Sisi and his aides â€œtold me just yesterday that they aspire to see their country advance.â€ He called on the Egyptian government to â€œreview all the political sentences and verdicts pronounced during the last few years and consider all available remedies, including pardons.â€', '2018-03-21 16:35:18', 50, 2),
(11, 'At Least Briefly, the Mets Can Finally Field Their Big Five', 'WEST PALM BEACH, Fla. â€” â€œFab Fiveâ€ was already taken by the 1991 Michigan menâ€™s basketball team. As was â€œDream Team,â€ by the famed 1992 United States Olympic menâ€™s basketball team.\r\n\r\nBut that didnâ€™t stop the Mets ace Noah Syndergaard from jokingly testing out both nicknames when talking about the teamâ€™s much-ballyhooed but oft-injured group of starters. Because Jason Vargas is slated to have surgery on his hand Tuesday, Zack Wheeler is widely expected to take his spot in the rotation. The Mets, then, will begin the season finally deploying the core rotation of the five hard-throwers they once dreamed would lead them to the promised land: Jacob deGrom, Matt Harvey, Steven Matz, Syndergaard and Wheeler.\r\n\r\nâ€œWe need a cool nickname,â€ said Syndergaard, 25.\r\n\r\nMets General Manager Sandy Alderson would not predict how long the team would be without Vargas, who is expected to be part of the rotation once he recovers. After the broken hamate bone is removed from Vargasâ€™s non-throwing hand, he must wait until the wound has healed, the pain has subsided and his grip strength has returned before he can resume throwing.\r\n\r\nThe Mets estimated that would be about five days after Vargasâ€™s operation. The season begins March 29, and the soonest the Mets need a fifth starter is April 4. If the Mets are cautious, Vargas may miss only one or two starts. The most he has thrown in a spring training game is 60 pitches, while his fellow starters have reached 90.\r\n\r\nâ€œWhen youâ€™re talking about five days, youâ€™re not going to lose arm strength, especially with a guy like Vargas, who is going to rely on command,â€ Mets Manager Mickey Callaway said.\r\n\r\nContinue reading the main story\r\nRELATED COVERAGE\r\n\r\nSurgery May Keep Metsâ€™ Jason Vargas Off Opening-Day Roster MARCH 18, 2018\r\nADVERTISEMENT\r\n\r\nContinue reading the main story\r\n\r\nThough the operation is a slight setback for Vargas, it also could provide a fleeting but symbolic moment for the Mets.\r\n\r\nâ€œSomething that Iâ€™ve been thinking about and wanting to do for a while,â€ Wheeler, who was fighting to make the opening day roster, said of the five starters all pitching at once. â€œFans have, too.â€\r\n\r\nThe Mets did not initially plan to build around their five talented starters, all of whom have fastballs in excess of 94 miles per hour. While Harvey (in 2010) and Matz (in 2009) were drafted in the first and second rounds, the Mets traded for Wheeler in 2011 and for Syndergaard a year later.\r\n\r\nCatcher Travis dâ€™Arnaud, not Syndergaard, was the centerpiece of a 2012 trade with Toronto. DeGrom, a ninth-round pick, blossomed into a top prospect for the Mets after converting from shortstop to pitcher.\r\n\r\nBut once Syndergaard and Matz reached the major leagues in 2015, the Mets dreamed big. Harvey was having a dominant season. DeGrom had been named the National League Rookie of the Year the season before. The only one missing was Wheeler, who had debuted in 2013 and was still recovering from Tommy John surgery in 2015.', '2018-03-21 16:36:59', 50, 7),
(12, 'Hot Times in the Arctic', 'In late February, a large portion of the Arctic Ocean near the North Pole experienced an alarming string of extremely warm winter days, with the surface temperature exceeding 25 degrees Fahrenheit above normal.\r\n\r\nThese conditions capped nearly three months of unusually warm weather in a region that has seen temperatures rising over the past century as greenhouse gas concentrations (mostly carbon dioxide and methane) have increased in the atmosphere. At the same time, the extent of frozen seawater floating in the Arctic Ocean reached new lows in January and February in 40 years of satellite monitoring.\r\n\r\nIn recent years, the air at the Arctic Ocean surface during winter has warmed by over 5 degrees Fahrenheit above normal. So was this recent spate of warm weather linked to longer-term climate change, or was it, well, just the weather?\r\n\r\nWhat we can say is this: Weather patterns that generate extreme warm Arctic days are now occurring in combination with a warming climate, which makes extremes more likely and more severe. Whatâ€™s more, these extreme temperatures have had a profound influence on sea ice, which has become thinner and smaller in extent, enabling ships to venture more often and deeper into the Arctic.\r\n\r\nThis sea ice loss, in turn, has created a feedback loop. Thinner, receding ice allows the oceanâ€™s heat to escape more readily into the atmosphere, which the Arcticâ€™s highly stable lower atmosphere traps near the surface during the polar night. As a result, winter surface air temperatures have warmed more in the Arctic compared with the global average.', '2018-03-21 16:38:32', 50, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `rank` tinyint(1) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `rank`, `logged_in`) VALUES
(50, 'root', '7b24afc8bc80e548d66c4e7ff72171c5', 2, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_Comment_News1` FOREIGN KEY (`News_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_News_Category` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_News_User` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
