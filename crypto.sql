-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 03:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@mail.com', '$2y$10$dR.Fp4Zcu/8IUYMfkGWENuX');

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg_to_client`
--

CREATE TABLE `admin_msg_to_client` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg_to_emp`
--

CREATE TABLE `admin_msg_to_emp` (
  `e_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignclienttoemp`
--

CREATE TABLE `assignclienttoemp` (
  `as_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auditedfiles`
--

CREATE TABLE `auditedfiles` (
  `a_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `aufname` varchar(20) NOT NULL,
  `aud_file` varchar(250) NOT NULL,
  `fsize` varchar(11) NOT NULL,
  `stutus` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `cl_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(75) NOT NULL,
  `o_name` varchar(35) NOT NULL,
  `o_address` varchar(150) NOT NULL,
  `GSTno` varchar(35) NOT NULL,
  `ph` bigint(10) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_messages`
--

CREATE TABLE `client_messages` (
  `m_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `m_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cl_message_reply`
--

CREATE TABLE `cl_message_reply` (
  `mr_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `message_replay` varchar(500) NOT NULL,
  `mr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cl_to_do_list`
--

CREATE TABLE `cl_to_do_list` (
  `t_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `todo_name` varchar(35) NOT NULL,
  `to_do_desc` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email_id` varchar(35) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `date` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `pro_pic` varchar(200) NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_message`
--

CREATE TABLE `emp_message` (
  `em_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `message` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_message_reply`
--

CREATE TABLE `emp_message_reply` (
  `mr_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `message_replay` varchar(500) NOT NULL,
  `mr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_msg_to_client`
--

CREATE TABLE `emp_msg_to_client` (
  `c_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_to_do_list`
--

CREATE TABLE `emp_to_do_list` (
  `t_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `todo_name` varchar(35) NOT NULL,
  `to_do_desc` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `f_id` int(11) NOT NULL,
  `c_id` int(30) NOT NULL,
  `cl_id` int(30) NOT NULL,
  `fileName` varchar(150) NOT NULL,
  `file_size` varchar(30) NOT NULL,
  `file` varchar(250) NOT NULL,
  `stutus` varchar(15) NOT NULL,
  `fudate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_category`
--

CREATE TABLE `file_category` (
  `c_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_category`
--

INSERT INTO `file_category` (`c_id`, `cat_name`, `description`, `c_date`) VALUES
(12, 'balance sheet', 'balance sheet', '2023-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `roll` varchar(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `name`, `email`, `password`, `roll`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$dR.Fp4Zcu/8IUYMfkGWENuXUjO1Qk4hhYNVRaoashuTInGxB.l86G', 'a', '2021-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `msg_from_admin_to_emp`
--

CREATE TABLE `msg_from_admin_to_emp` (
  `ma_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `message` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `ammount` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `transaction_id` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `q_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replay`
--

CREATE TABLE `replay` (
  `r_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `message` varchar(2500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list`
--

CREATE TABLE `to_do_list` (
  `t_id` int(11) NOT NULL,
  `todo_name` varchar(35) NOT NULL,
  `to_do_desc` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignclienttoemp`
--
ALTER TABLE `assignclienttoemp`
  ADD PRIMARY KEY (`as_id`),
  ADD KEY `em_id` (`emp_id`);

--
-- Indexes for table `auditedfiles`
--
ALTER TABLE `auditedfiles`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `c_id` (`cat_id`),
  ADD KEY `cl_id` (`cl_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `client_messages`
--
ALTER TABLE `client_messages`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `cl_message_reply`
--
ALTER TABLE `cl_message_reply`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `cl_to_do_list`
--
ALTER TABLE `cl_to_do_list`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `emp_message`
--
ALTER TABLE `emp_message`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `emp_message_reply`
--
ALTER TABLE `emp_message_reply`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `emp_to_do_list`
--
ALTER TABLE `emp_to_do_list`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `clid` (`cl_id`),
  ADD KEY `catid` (`c_id`);

--
-- Indexes for table `file_category`
--
ALTER TABLE `file_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `msg_from_admin_to_emp`
--
ALTER TABLE `msg_from_admin_to_emp`
  ADD PRIMARY KEY (`ma_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `replay`
--
ALTER TABLE `replay`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignclienttoemp`
--
ALTER TABLE `assignclienttoemp`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auditedfiles`
--
ALTER TABLE `auditedfiles`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `client_messages`
--
ALTER TABLE `client_messages`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cl_message_reply`
--
ALTER TABLE `cl_message_reply`
  MODIFY `mr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cl_to_do_list`
--
ALTER TABLE `cl_to_do_list`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `emp_message`
--
ALTER TABLE `emp_message`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_message_reply`
--
ALTER TABLE `emp_message_reply`
  MODIFY `mr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp_to_do_list`
--
ALTER TABLE `emp_to_do_list`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `file_category`
--
ALTER TABLE `file_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `msg_from_admin_to_emp`
--
ALTER TABLE `msg_from_admin_to_emp`
  MODIFY `ma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `replay`
--
ALTER TABLE `replay`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
