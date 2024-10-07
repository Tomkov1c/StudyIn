-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 05:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studyin`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `post_code` text NOT NULL,
  `county_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `calling_code` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `calling_code`) VALUES
(1, 'Afghanistan', NULL),
(2, 'Albania', NULL),
(3, 'Algeria', NULL),
(4, 'American Samoa', NULL),
(5, 'Andorra', NULL),
(6, 'Angola', NULL),
(7, 'Anguilla', NULL),
(8, 'Antarctica', NULL),
(9, 'Antigua and Barbuda', NULL),
(10, 'Argentina', NULL),
(11, 'Armenia', NULL),
(12, 'Aruba', NULL),
(13, 'Australia', NULL),
(14, 'Austria', NULL),
(15, 'Azerbaijan', NULL),
(16, 'Bahamas', NULL),
(17, 'Bahrain', NULL),
(18, 'Bangladesh', NULL),
(19, 'Barbados', NULL),
(20, 'Belarus', NULL),
(21, 'Belgium', NULL),
(22, 'Belize', NULL),
(23, 'Benin', NULL),
(24, 'Bermuda', NULL),
(25, 'Bhutan', NULL),
(26, 'Bosnia and Herzegovina', NULL),
(27, 'Botswana', NULL),
(28, 'Bouvet Island', NULL),
(29, 'Brazil', NULL),
(30, 'British Indian Ocean Territory', NULL),
(31, 'Brunei Darussalam', NULL),
(32, 'Bulgaria', NULL),
(33, 'Burkina Faso', NULL),
(34, 'Burundi', NULL),
(35, 'Cambodia', NULL),
(36, 'Cameroon', NULL),
(37, 'Canada', NULL),
(38, 'Cape Verde', NULL),
(39, 'Cayman Islands', NULL),
(40, 'Central African Republic', NULL),
(41, 'Chad', NULL),
(42, 'Chile', NULL),
(43, 'China', NULL),
(44, 'Christmas Island', NULL),
(45, 'Cocos (Keeling) Islands', NULL),
(46, 'Colombia', NULL),
(47, 'Comoros', NULL),
(48, 'Congo', NULL),
(49, 'Cook Islands', NULL),
(50, 'Costa Rica', NULL),
(51, 'Croatia', NULL),
(52, 'Cuba', NULL),
(53, 'Cyprus', NULL),
(54, 'Czech Republic', NULL),
(55, 'Denmark', NULL),
(56, 'Djibouti', NULL),
(57, 'Dominica', NULL),
(58, 'Dominican Republic', NULL),
(59, 'Ecuador', NULL),
(60, 'Egypt', NULL),
(61, 'El Salvador', NULL),
(62, 'Equatorial Guinea', NULL),
(63, 'Eritrea', NULL),
(64, 'Estonia', NULL),
(65, 'Ethiopia', NULL),
(66, 'Falkland Islands (Malvinas)', NULL),
(67, 'Faroe Islands', NULL),
(68, 'Fiji', NULL),
(69, 'Finland', NULL),
(70, 'France', NULL),
(71, 'French Guiana', NULL),
(72, 'French Polynesia', NULL),
(73, 'French Southern Territories', NULL),
(74, 'Gabon', NULL),
(75, 'Gambia', NULL),
(76, 'Georgia', NULL),
(77, 'Germany', NULL),
(78, 'Ghana', NULL),
(79, 'Gibraltar', NULL),
(80, 'Greece', NULL),
(81, 'Greenland', NULL),
(82, 'Grenada', NULL),
(83, 'Guadeloupe', NULL),
(84, 'Guam', NULL),
(85, 'Guatemala', NULL),
(86, 'Guernsey', NULL),
(87, 'Guinea', NULL),
(88, 'Guinea-Bissau', NULL),
(89, 'Guyana', NULL),
(90, 'Haiti', NULL),
(91, 'Heard Island and McDonald Islands', NULL),
(92, 'Holy See (Vatican City State)', NULL),
(93, 'Honduras', NULL),
(94, 'Hong Kong', NULL),
(95, 'Hungary', NULL),
(96, 'Iceland', NULL),
(97, 'India', NULL),
(98, 'Indonesia', NULL),
(99, 'Iran', NULL),
(100, 'Iraq', NULL),
(101, 'Ireland', NULL),
(102, 'Isle of Man', NULL),
(103, 'Israel', NULL),
(104, 'Italy', NULL),
(105, 'Jamaica', NULL),
(106, 'Japan', NULL),
(107, 'Jersey', NULL),
(108, 'Jordan', NULL),
(109, 'Kazakhstan', NULL),
(110, 'Kenya', NULL),
(111, 'Kiribati', NULL),
(112, 'Kuwait', NULL),
(113, 'Kyrgyzstan', NULL),
(114, 'Lao Peoples Democratic Republic', NULL),
(115, 'Latvia', NULL),
(116, 'Lebanon', NULL),
(117, 'Lesotho', NULL),
(118, 'Liberia', NULL),
(119, 'Libya', NULL),
(120, 'Liechtenstein', NULL),
(121, 'Lithuania', NULL),
(122, 'Luxembourg', NULL),
(123, 'Macao', NULL),
(124, 'Madagascar', NULL),
(125, 'Malawi', NULL),
(126, 'Malaysia', NULL),
(127, 'Maldives', NULL),
(128, 'Mali', NULL),
(129, 'Malta', NULL),
(130, 'Marshall Islands', NULL),
(131, 'Martinique', NULL),
(132, 'Mauritania', NULL),
(133, 'Mauritius', NULL),
(134, 'Mayotte', NULL),
(135, 'Mexico', NULL),
(136, 'Monaco', NULL),
(137, 'Mongolia', NULL),
(138, 'Montenegro', NULL),
(139, 'Montserrat', NULL),
(140, 'Morocco', NULL),
(141, 'Mozambique', NULL),
(142, 'Myanmar', NULL),
(143, 'Namibia', NULL),
(144, 'Nauru', NULL),
(145, 'Nepal', NULL),
(146, 'Netherlands', NULL),
(147, 'New Caledonia', NULL),
(148, 'New Zealand', NULL),
(149, 'Nicaragua', NULL),
(150, 'Niger', NULL),
(151, 'Nigeria', NULL),
(152, 'Niue', NULL),
(153, 'Norfolk Island', NULL),
(154, 'Northern Mariana Islands', NULL),
(155, 'Norway', NULL),
(156, 'Oman', NULL),
(157, 'Pakistan', NULL),
(158, 'Palau', NULL),
(159, 'Panama', NULL),
(160, 'Papua New Guinea', NULL),
(161, 'Paraguay', NULL),
(162, 'Peru', NULL),
(163, 'Philippines', NULL),
(164, 'Pitcairn', NULL),
(165, 'Poland', NULL),
(166, 'Portugal', NULL),
(167, 'Puerto Rico', NULL),
(168, 'Qatar', NULL),
(169, 'Romania', NULL),
(170, 'Russian Federation', NULL),
(171, 'Rwanda', NULL),
(172, 'Saint Kitts and Nevis', NULL),
(173, 'Saint Lucia', NULL),
(174, 'Saint Martin (French part)', NULL),
(175, 'Saint Pierre and Miquelon', NULL),
(176, 'Saint Vincent and the Grenadines', NULL),
(177, 'Samoa', NULL),
(178, 'San Marino', NULL),
(179, 'Sao Tome and Principe', NULL),
(180, 'Saudi Arabia', NULL),
(181, 'Senegal', NULL),
(182, 'Serbia', NULL),
(183, 'Seychelles', NULL),
(184, 'Sierra Leone', NULL),
(185, 'Singapore', NULL),
(186, 'Slovakia', NULL),
(187, 'Slovenia', NULL),
(188, 'Solomon Islands', NULL),
(189, 'Somalia', NULL),
(190, 'South Africa', NULL),
(191, 'South Georgia and the South Sandwich Islands', NULL),
(192, 'South Sudan', NULL),
(193, 'Spain', NULL),
(194, 'Sri Lanka', NULL),
(195, 'Sudan', NULL),
(196, 'Suriname', NULL),
(197, 'Swaziland', NULL),
(198, 'Sweden', NULL),
(199, 'Switzerland', NULL),
(200, 'Syrian Arab Republic', NULL),
(201, 'Taiwan', NULL),
(202, 'Tajikistan', NULL),
(203, 'Tanzania', NULL),
(204, 'Thailand', NULL),
(205, 'Timor-Leste', NULL),
(206, 'Togo', NULL),
(207, 'Tokelau', NULL),
(208, 'Tonga', NULL),
(209, 'Trinidad and Tobago', NULL),
(210, 'Tunisia', NULL),
(211, 'Turkey', NULL),
(212, 'Turkmenistan', NULL),
(213, 'Turks and Caicos Islands', NULL),
(214, 'Tuvalu', NULL),
(215, 'Uganda', NULL),
(216, 'Ukraine', NULL),
(217, 'United Arab Emirates', NULL),
(218, 'United Kingdom', NULL),
(219, 'United States', NULL),
(220, 'Uruguay', NULL),
(221, 'Uzbekistan', NULL),
(222, 'Vanuatu', NULL),
(223, 'Venezuela', NULL),
(224, 'Viet Nam', NULL),
(225, 'Western Sahara', NULL),
(226, 'Yemen', NULL),
(227, 'Zambia', NULL),
(228, 'Zimbabwe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `school_id` int(11) NOT NULL,
  `school_year` varchar(9) NOT NULL,
  `website` text DEFAULT NULL,
  `details_page_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `adress` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `website` text DEFAULT NULL,
  `custome` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `profile_picture_path` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_courses`
--

CREATE TABLE `users_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `untill` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_schools`
--

CREATE TABLE `users_schools` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `untill` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `county_id` (`county_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users_schools`
--
ALTER TABLE `users_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_courses`
--
ALTER TABLE `users_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_schools`
--
ALTER TABLE `users_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`county_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD CONSTRAINT `users_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `users_schools`
--
ALTER TABLE `users_schools`
  ADD CONSTRAINT `users_schools_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_schools_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
