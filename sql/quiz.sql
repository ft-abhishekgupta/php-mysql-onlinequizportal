-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2019 at 12:13 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `dropdown`
--

CREATE TABLE `dropdown` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropdown`
--

INSERT INTO `dropdown` (`id`, `question`, `options`, `answer`) VALUES
(1, 'Caterpillars turn into butterfly ? ', 'True , False', 1),
(2, 'There are 30 days in May.', 'True , False', 2),
(3, 'Capital of UP ?', 'Kanpur , Banaras , Gonda , Lucknow , Gorakhpur', 4),
(4, 'Select the odd one out from the list :', 'Medicine , Injection , Ointment , Laptop', 4),
(5, 'Select the odd one out from the list :', 'Brinjal , Chocolate , Potatoes , Cabbage , Spinach', 2),
(6, 'What type of tree do dates grow on ?', 'Coconut , Pine , Palm , Birch', 3),
(7, 'What is the 15th letter of English Alphabet ?', 'F , I , M , O , U , G , H', 4),
(8, 'Convection , Frontal and Relief are the three main types of :', 'Clouds , Rainfall , Wind', 2),
(9, 'Which layer of Earth is made of tectonics plates :', 'Inner Core , Outer  Core , Mantle , Crust', 4),
(10, 'Players in a Basket Ball Team ?', '2 , 3 , 4 , 5 , 6 , 7 , 8', 5);

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

CREATE TABLE `essay` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `essay`
--

INSERT INTO `essay` (`id`, `question`) VALUES
(1, 'Review on the latest movie you watched ?'),
(2, 'Discuss the importance of sun ?'),
(3, 'Discuss the importance of water ?'),
(4, 'Discuss the importance of air ?'),
(5, 'Write your opinion about indian government ?'),
(6, 'Differentiate between windows and linux ?'),
(7, 'Compare android and ios as a mobile operating system .'),
(8, 'Time is money. Explain.'),
(9, 'Explain the bully algorithm .'),
(10, 'Explain the Chandy Lamport Clock ?');

-- --------------------------------------------------------

--
-- Table structure for table `fillintheblanks`
--

CREATE TABLE `fillintheblanks` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fillintheblanks`
--

INSERT INTO `fillintheblanks` (`id`, `question`, `answer`) VALUES
(1, 'Thomas Edison invented _______ .', 'bulb'),
(2, '_________ is another word for a "lexicon" .', 'dictionary'),
(3, 'Closest star to earth is _______ .', 'sun'),
(4, '________ discovered cuba .', 'columbus'),
(5, '_________ is used to measure current in the circuit.', 'ammeter'),
(6, '_______ is the hardest substance on earth.', 'diamond'),
(7, 'Longest bone in human body is ________ .', 'femur'),
(8, '_____________ is known as laughing gas.', 'nitrous oxide'),
(9, '_________ is the purest form of iron.', 'wrought iron'),
(10, '___________ is the tube that connects the middle ear with the throat.', 'eustachian');

-- --------------------------------------------------------

--
-- Table structure for table `instructorinfo`
--

CREATE TABLE `instructorinfo` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructorinfo`
--

INSERT INTO `instructorinfo` (`name`, `email`, `password`) VALUES
('Abhishek', 'instructor@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `mcqdb`
--

CREATE TABLE `mcqdb` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `optiona` varchar(255) NOT NULL,
  `optionb` varchar(255) NOT NULL,
  `optionc` varchar(255) NOT NULL,
  `optiond` varchar(255) NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcqdb`
--

INSERT INTO `mcqdb` (`id`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `answer`) VALUES
(1, 'Capital of India?', 'Kanpur', 'Lucknow', 'Delhi', 'Chennai', 'C'),
(2, 'Letter comes after F?', 'A', 'G', 'Z', 'X', 'B'),
(3, 'Who is A.R. Rehman?', 'Singer', 'Dancer', 'Cricketer', 'Musician', 'D'),
(4, 'Sun rises in the ?', 'North', 'South', 'East', 'West', 'C'),
(5, 'Which number comes after 6?', '2', '4', '0', '7', 'D'),
(6, 'What is the baby frog called?', 'Tadpole', 'Calf', 'Puppy', 'Cub', 'A'),
(7, 'Which animal is known as ship of the desert?', 'Crab', 'Whale', 'Dog', 'Camel', 'D'),
(8, 'Which is not a metal?', 'Gold', 'Raisin', 'Copper', 'Zinc', 'B'),
(9, 'Which country does volleyball originated from ?', 'USA', 'India', 'China', 'Europe', 'A'),
(10, 'What color is a Himalayan Poppy ?', 'Yellow', 'Blue', 'Red', 'Black', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `numericaldb`
--

CREATE TABLE `numericaldb` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numericaldb`
--

INSERT INTO `numericaldb` (`id`, `question`, `answer`) VALUES
(1, 'Number of colours in the rainbow?', 7),
(2, 'Number of month in a year?', 12),
(3, 'Number of characters in english alphabet?', 26),
(4, 'Square Root of 144 ?', 12),
(5, 'What is 3/5th of 50 ?', 30),
(6, 'During which year WW1 begin?', 1914),
(7, 'Number of players in ice hokey team ?', 6),
(8, 'Number of edges in a cube ?', 12),
(9, 'Number of card in complete pack of cards ?', 52),
(10, 'Cube of 3 ?', 27);

-- --------------------------------------------------------

--
-- Table structure for table `quizconfig`
--

CREATE TABLE `quizconfig` (
  `quiznumber` int(11) NOT NULL,
  `starttime` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `maxmarks` int(11) NOT NULL,
  `typea` int(11) NOT NULL,
  `typeamarks` int(11) NOT NULL,
  `typeb` int(11) NOT NULL,
  `typebmarks` int(11) NOT NULL,
  `typec` int(11) NOT NULL,
  `typecmarks` int(11) NOT NULL,
  `typed` int(11) NOT NULL,
  `typedmarks` int(11) NOT NULL,
  `typee` int(11) NOT NULL,
  `typeemarks` int(11) NOT NULL,
  `typef` int(11) NOT NULL,
  `typefmarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizconfig`
--

INSERT INTO `quizconfig` (`quiznumber`, `starttime`, `duration`, `maxmarks`, `typea`, `typeamarks`, `typeb`, `typebmarks`, `typec`, `typecmarks`, `typed`, `typedmarks`, `typee`, `typeemarks`, `typef`, `typefmarks`) VALUES
(1, '01/01/2018 12:00 AM', '10', 100, 5, 5, 5, 2, 5, 5, 5, 5, 5, 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quizrecord`
--

CREATE TABLE `quizrecord` (
  `quiznumber` int(11) NOT NULL,
  `rollnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `serialnumber` int(11) NOT NULL,
  `rollnumber` int(11) NOT NULL,
  `quiznumber` int(11) NOT NULL,
  `quesid` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `ans` text,
  `quesmarks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rollnumber` int(11) NOT NULL,
  `quiznumber` int(11) NOT NULL,
  `totalmarks` int(11) NOT NULL DEFAULT '0',
  `submit` int(2) NOT NULL DEFAULT '0',
  `maxmarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shortanswer`
--

CREATE TABLE `shortanswer` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortanswer`
--

INSERT INTO `shortanswer` (`id`, `question`) VALUES
(1, 'Name the seven dwarfs of Snow White?'),
(2, 'Place these shapes in increasing order of sides : Square , Triangle , Octagon , Hexagon.'),
(3, 'What is Zumba?'),
(4, 'What does the term "piano" means ?'),
(5, 'Write a short note on sun ?'),
(6, 'Write a short note on moon ?'),
(7, 'Write a short note on phone ?'),
(8, 'Write a short note on birds ?'),
(9, 'Write a short note on laptop ?'),
(10, 'Write a short note on mother ?');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `name` varchar(30) NOT NULL,
  `rollnumber` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `program` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`name`, `rollnumber`, `department`, `program`, `password`, `email`) VALUES
('Student', 123, 'cse', 'mtech', '123', '123@123.com'),
('Abhishek', 18111001, 'cse', 'mtech', 'pass', 'ftabhi@iitk.ac.in'),
('Kapil', 18111029, 'cse', 'mtech', 'pass', 'kapilkr@iitk.ac.in'),
('Pranjal', 18111050, 'cse', 'mtech', 'pass', 'pranjalj@iitk.ac.in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dropdown`
--
ALTER TABLE `dropdown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `essay`
--
ALTER TABLE `essay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fillintheblanks`
--
ALTER TABLE `fillintheblanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructorinfo`
--
ALTER TABLE `instructorinfo`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `mcqdb`
--
ALTER TABLE `mcqdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numericaldb`
--
ALTER TABLE `numericaldb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizconfig`
--
ALTER TABLE `quizconfig`
  ADD PRIMARY KEY (`quiznumber`);

--
-- Indexes for table `quizrecord`
--
ALTER TABLE `quizrecord`
  ADD PRIMARY KEY (`quiznumber`,`rollnumber`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`serialnumber`,`rollnumber`,`quiznumber`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`quiznumber`,`rollnumber`);

--
-- Indexes for table `shortanswer`
--
ALTER TABLE `shortanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`rollnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dropdown`
--
ALTER TABLE `dropdown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `essay`
--
ALTER TABLE `essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fillintheblanks`
--
ALTER TABLE `fillintheblanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mcqdb`
--
ALTER TABLE `mcqdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `numericaldb`
--
ALTER TABLE `numericaldb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quizconfig`
--
ALTER TABLE `quizconfig`
  MODIFY `quiznumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shortanswer`
--
ALTER TABLE `shortanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
