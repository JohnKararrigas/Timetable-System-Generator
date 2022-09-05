-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 19 Ιαν 2020 στις 16:12:55
-- Έκδοση διακομιστή: 10.4.8-MariaDB
-- Έκδοση PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `ttms`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', 'pass123');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `classrooms`
--

CREATE TABLE `classrooms` (
  `name` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `classrooms`
--

INSERT INTO `classrooms` (`name`, `status`) VALUES
('ML04', 4),
('Class1', 2),
('Class2', 3);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `semester3`
--

CREATE TABLE `semester3` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `semester3`
--

INSERT INTO `semester3` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'CO002<br>AX', 'CO001<br>JX', 'CO003<br>', '-<br>-', '-<br>-', 'CO004<br>AD'),
('tuesday', 'CO002<br>AX', 'CO001<br>JX', '-<br>-', '-<br>-', '-<br>-', 'CO004<br>AD'),
('wednesday', 'CO005<br>JK', 'CO002<br>AX', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('thursday', 'CO003<br>', 'CO005<br>JK', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('friday', 'CO001<br>JX', 'CO003<br>', 'CO005<br>JK', '-<br>-', '-<br>-', '-<br>-');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `semester5`
--

CREATE TABLE `semester5` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `semester5`
--

INSERT INTO `semester5` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('tuesday', 'CO006<br>', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('wednesday', 'CO006<br>', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('thursday', 'CO006<br>', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('friday', 'CO006<br>', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `semester7`
--

CREATE TABLE `semester7` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `semester7`
--

INSERT INTO `semester7` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'CO007<br>AM', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('tuesday', '-<br>-', 'CO007<br>AM', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('wednesday', '-<br>-', 'CO007<br>AM', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('thursday', '-<br>-', 'CO007<br>AM', '-<br>-', '-<br>-', '-<br>-', '-<br>-'),
('friday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `course_type` varchar(15) NOT NULL,
  `semester` int(1) NOT NULL,
  `department` varchar(50) NOT NULL,
  `isAlloted` int(1) NOT NULL,
  `allotedto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `subjects`
--

INSERT INTO `subjects` (`subject_code`, `subject_name`, `course_type`, `semester`, `department`, `isAlloted`, `allotedto`) VALUES
('CO007', 'Embedded Systems', 'THEORY', 7, 'Mechanical Engg.', 1, 'T008'),
('CO006', 'Operating Systems', 'THEORY', 5, 'Computer Engg.', 0, ''),
('CO004', 'VHDL', 'LAB', 3, 'Computer Engg.', 1, 'T002'),
('CO005', 'Java', 'THEORY', 3, 'Computer Engg.', 1, 'T007'),
('CO003', 'Compilers', 'THEORY', 3, 'Computer Engg.', 0, ''),
('CO001', 'Mathematics1', 'THEORY', 3, 'Computer Engg.', 1, 'T001'),
('CO002', 'Computer Networks', 'THEORY', 3, 'Computer Engg.', 1, 'T003');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `t001`
--

CREATE TABLE `t001` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `t002`
--

CREATE TABLE `t002` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `t003`
--

CREATE TABLE `t003` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `t007`
--

CREATE TABLE `t007` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `t008`
--

CREATE TABLE `t008` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `teachers`
--

CREATE TABLE `teachers` (
  `faculty_number` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `alias` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `teachers`
--

INSERT INTO `teachers` (`faculty_number`, `name`, `alias`) VALUES
('T001', 'John Xatzaras ', 'JX'),
('T002', 'Antonis Dadaliarhs', 'AD'),
('T003', 'Apostolis Xenakis', 'AX'),
('T007', 'John Kwnstantinou', 'JK'),
('T008', 'Ahmed Mahdi', 'AM');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`name`);

--
-- Ευρετήρια για πίνακα `semester3`
--
ALTER TABLE `semester3`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `semester5`
--
ALTER TABLE `semester5`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `semester7`
--
ALTER TABLE `semester7`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Ευρετήρια για πίνακα `t001`
--
ALTER TABLE `t001`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `t002`
--
ALTER TABLE `t002`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `t003`
--
ALTER TABLE `t003`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `t007`
--
ALTER TABLE `t007`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `t008`
--
ALTER TABLE `t008`
  ADD PRIMARY KEY (`day`);

--
-- Ευρετήρια για πίνακα `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`faculty_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
