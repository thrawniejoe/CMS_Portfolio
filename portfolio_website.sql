-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 01:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE portfolio_Website;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `projectpictures`
--

CREATE TABLE `projectpictures` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectpictures`
--

INSERT INTO `projectpictures` (`id`, `project_id`, `image_file`) VALUES
(11, 7, '../images/projects/Score/QualityLogon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `projectName` varchar(100) DEFAULT NULL,
  `description` text,
  `github_Link` varchar(100) DEFAULT NULL,
  `sampleSite_Link` varchar(100) DEFAULT NULL,
  `display_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `description`, `github_Link`, `sampleSite_Link`, `display_picture`) VALUES
(6, 'The Cake Emporium  ', 'A store front site where you can buy, manage and maintaine cakes. It has a fully enabled backend so administrators can add new products, modify products, see customer information and customer orders. You can also manage speical deals for your products. ', 'https://github.com/thrawniejoe/TheCakeEmporium', 'http://rayscomputer.com/web1/', '../images/projects/The Cake Emporium  /cakeEmp_tn.PNG'),
(7, 'Score Tracking Database  ', 'This is an Access front end hooked up to a SQL Server that allows users to Score and track the quality of Calls taken by Employees from customers. It has a back end that allows supervisors to track and manage users of the system. Everything is written in SQL and VBA. There is no link for this project. ', '', '', '../images/projects/Score Tracking Database  /Qualitydb.jpg'),
(8, 'ConnectFour  ', 'This is a C# ConnectFour Game, fairly basic but fully functional. ', 'https://github.com/thrawniejoe/ConnectFour', '', '../images/projects/ConnectFour  /connectFour.jpg'),
(9, 'Pizza Emporium  ', 'A C# cash register for ordering pizza''s that is connected to a database that can track orders and product information. ', 'https://github.com/thrawniejoe/PizzaEmporium', '', '../images/projects/Pizza Emporium  /pizzaEmporium.jpg'),
(10, 'Css and HTML5 web Site  ', 'A Fairly basic Gaming Web Site build on just HTML5 and CSS. Bootstrap was not used ', '', 'http://intrepidcrossing.joevelasquez.net/', '../images/projects/Css and HTML5 web Site  /ircSite.png'),
(11, 'Sales Tracker  ', 'Another Access front end hooked to a SQL server that allows users to track and manage employee sales. It is all written in SQL and VBA ', '', '', '../images/projects/Sales Tracker  /RepSales.jpg'),
(12, 'Help Desk ', 'An Access front end connected to a SQL Server designed to allow users to submit and take care of supprt tickets. It is written in VBA and SQL. ', '', '', '../images/projects/Help Desk /helpdesk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projectskilllist`
--

CREATE TABLE `projectskilllist` (
  `id` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectskilllist`
--

INSERT INTO `projectskilllist` (`id`, `projectID`, `skill_id`) VALUES
(7, 6, 7),
(8, 6, 14),
(9, 6, 16),
(10, 6, 17),
(11, 6, 19),
(12, 6, 12),
(13, 7, 19),
(14, 7, 14),
(15, 7, 20),
(16, 8, 7),
(17, 9, 7),
(18, 10, 8),
(19, 10, 16),
(20, 11, 20),
(21, 11, 19),
(22, 11, 14),
(23, 12, 14),
(24, 12, 20),
(25, 12, 19);

-- --------------------------------------------------------

--
-- Table structure for table `siteinformation`
--

CREATE TABLE `siteinformation` (
  `id` int(11) NOT NULL,
  `HomePage_Header` varchar(255) DEFAULT NULL,
  `HomePage_Username` varchar(255) DEFAULT NULL,
  `HomePage_Paragraph_1` text,
  `HomePage_Paragraph_2` text,
  `ResumeFile` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteinformation`
--

INSERT INTO `siteinformation` (`id`, `HomePage_Header`, `HomePage_Username`, `HomePage_Paragraph_1`, `HomePage_Paragraph_2`, `ResumeFile`) VALUES
(1, 'Web Developer | Software Developer | Database Developer', 'Joe Velasquez', 'Hi, my name is Joe, I am a software developer and technology enthusiast from Lincoln NE who enjoys writing software and building websites. Here you will find information about the skills I possess as well as past and current projects im working on.', 'If your a business who is looking for a dedicated developer or systems administrator then, please feel free to contact me.', '../resume/JoeVResume.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_name` varchar(100) DEFAULT NULL,
  `description` text,
  `skill_picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill_name`, `description`, `skill_picture`) VALUES
(7, 1, 'C#', 'programming language', '../images/skills/cs_128.png'),
(8, 1, 'HTML', 'programming language', '../images/skills/html_128.png'),
(10, 1, 'Java', 'programming language', '../images/skills/java_128.png'),
(12, 1, 'ASP.NET', 'programming language', '../images/skills/asp_128.png'),
(13, 1, 'MySQL', 'Database Language', '../images/skills/mysql_128.png'),
(14, 1, 'MS SQL', 'Database Language', '../images/skills/mssql_128.png'),
(15, 1, 'JavaScript', 'programming language', '../images/skills/js_128.png'),
(16, 1, 'CSS', 'programming language', '../images/skills/css_128.png'),
(17, 1, 'Photoshop', 'Image Editing Software', '../images/skills/ps_128.png'),
(18, 1, 'Adobe Captivate', 'eLearning Creation Software', '../images/skills/ac_128.png'),
(19, 1, 'SQL', 'Database Language', '../images/skills/sql_128.png'),
(20, 1, 'VBA', 'Crappy Programming Language', '../images/skills/vba_128.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `accountType` varchar(25) DEFAULT NULL,
  `mainSite_Account` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `phone`, `picture`, `password`, `accountType`, `mainSite_Account`) VALUES
(1, 'Joe', 'Velasquez', 'thrawniejoe', 'thrawniejoe@gmail.com', '402-875-1274', NULL, '$2y$10$sIn5NUSiFphY68ktflBCW.ZIdDyBws7vlVnNSCqjdgCof2hA2JNai', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projectpictures`
--
ALTER TABLE `projectpictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectskilllist`
--
ALTER TABLE `projectskilllist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteinformation`
--
ALTER TABLE `siteinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projectpictures`
--
ALTER TABLE `projectpictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `projectskilllist`
--
ALTER TABLE `projectskilllist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `siteinformation`
--
ALTER TABLE `siteinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `projectpictures`
--
ALTER TABLE `projectpictures`
  ADD CONSTRAINT `projectpictures_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
