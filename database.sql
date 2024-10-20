-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 02:35 PM
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
-- Table structure for table `aplications`
--

CREATE TABLE `aplications` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `post_code` text NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `post_code`, `region_id`) VALUES
(1, 'Velenje', '3320', 1),
(2, 'Cambridge', '', 2),
(3, 'Ljubljana', '1000', 3),
(4, 'Celje', '', 1);

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `website` text DEFAULT NULL,
  `logo_path` text DEFAULT NULL,
  `banner_path` text DEFAULT NULL,
  `details_page_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `school_id`, `website`, `logo_path`, `banner_path`, `details_page_content`) VALUES
(5, 'Tehnik Računalništva', 5, NULL, NULL, NULL, NULL),
(6, 'Gimnazijski maturant', 6, NULL, NULL, NULL, NULL),
(8, 'Harvard Business Analytics Program', 7, 'https://online.hbs.edu/courses/business-analytics/', NULL, NULL, 'The Harvard Business Analytics Program equips professionals with cutting-edge data analytics and business skills.'),
(9, 'Harvard Law School Program', 7, 'https://hls.harvard.edu/', NULL, NULL, 'The Harvard Law School offers a wide range of law degrees, preparing students to excel in legal practice.'),
(10, 'Harvard Medical School Program', 7, 'https://meded.hms.harvard.edu/', NULL, NULL, 'Harvard Medical School provides comprehensive medical education, preparing future doctors and medical researchers.'),
(11, 'Harvard Computer Science Program', 7, 'https://www.seas.harvard.edu/computer-science', NULL, NULL, 'The Harvard Computer Science program focuses on software development, algorithms, and data structures.'),
(12, 'Harvard Executive Education Program', 7, 'https://www.exed.hbs.edu/', NULL, NULL, 'Harvard Business School’s Executive Education Program helps leaders refine their strategic thinking and management skills.'),
(13, 'Harvard Graduate School of Education', 7, 'https://www.gse.harvard.edu/', NULL, NULL, 'Harvard Graduate School of Education prepares education leaders, policymakers, and researchers to transform the educational landscape.'),
(14, 'Harvard Kennedy School of Government', 7, 'https://www.hks.harvard.edu/', NULL, NULL, 'Harvard Kennedy School trains future government and nonprofit leaders to address global policy challenges.'),
(15, 'Harvard Extension School', 7, 'https://www.extension.harvard.edu/', NULL, NULL, 'Harvard Extension School offers flexible online and on-campus courses and degrees for adult learners.'),
(16, 'Harvard Divinity School', 7, 'https://hds.harvard.edu/', NULL, NULL, 'Harvard Divinity School educates scholars and leaders in the study of religion, ministry, and theology.'),
(17, 'Harvard Graduate School of Design', 7, 'https://www.gsd.harvard.edu/', NULL, NULL, 'The Graduate School of Design offers courses in architecture, landscape architecture, and urban planning.'),
(18, 'Harvard School of Engineering and Applied Sciences', 7, 'https://www.seas.harvard.edu/', NULL, NULL, 'Harvard SEAS focuses on advancing knowledge in engineering, applied sciences, and technology.'),
(19, 'Harvard T.H. Chan School of Public Health', 7, 'https://www.hsph.harvard.edu/', NULL, NULL, 'The Harvard T.H. Chan School of Public Health aims to educate future leaders in public health and global health issues.'),
(20, 'Harvard Graduate School of Arts and Sciences', 7, 'https://gsas.harvard.edu/', NULL, NULL, 'Harvard GSAS offers PhD and master’s programs in various disciplines, fostering scholarly research.'),
(21, 'Harvard Institute of Politics', 7, 'https://iop.harvard.edu/', NULL, NULL, 'The Harvard Institute of Politics engages students in political discourse, leadership, and public service.'),
(22, 'Harvard Summer School', 7, 'https://summer.harvard.edu/', NULL, NULL, 'Harvard Summer School offers students opportunities to take summer courses on campus and online.');

-- --------------------------------------------------------

--
-- Table structure for table `endings`
--

CREATE TABLE `endings` (
  `id` tinyint(4) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `no_regions` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `country_id`, `no_regions`) VALUES
(1, 'Štajarska', 187, 1),
(2, 'Massachusetts', 219, 1),
(3, 'Ljubljana', 187, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(4) NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Owner', NULL),
(2, 'Admin', NULL),
(3, 'Mod', NULL),
(4, 'Applicationist', NULL),
(5, 'Teacher', NULL);

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
  `email` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `principal_user_id` int(11) DEFAULT NULL,
  `logo_path` text DEFAULT NULL,
  `banner_path` text DEFAULT NULL,
  `details_page_content` text NOT NULL,
  `type_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `adress`, `city_id`, `website`, `email`, `phone_number`, `principal_user_id`, `logo_path`, `banner_path`, `details_page_content`, `type_id`) VALUES
(5, 'Šolski center Velenje, Elektro in Računalniška Šola', 'Trg mladosti 3', 1, 'https://ers.scv.si/', 'ers@scv.si', '03 89 60 600', 4, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwFukw35-gwnUAUUF8P5s4GhyjdMhx5b4pLA&s', 'https://ers.scv.si/wp-content/uploads/sites/9/2019/01/%C5%A0D_ER%C5%A0-1.jpg', 'Elektro in računalniška šola Velenje (ERŠ Velenje) je ena vodilnih strokovnih in tehniških šol v Sloveniji, specializirana za izobraževanje na področjih elektrotehnike, računalništva in sorodnih tehnologij. Šola je ustanovljena z namenom zagotavljanja praktičnega in teoretičnega znanja, ki dijake pripravi tako za neposredno vključitev v delovno okolje kot za nadaljnje študije na tehničnih fakultetah.  ERŠ Velenje se nahaja v Velenju in je poznana po poudarku na praktičnem usposabljanju, ki ga dopolnjuje temeljita teoretična izobrazba. Šola ponuja različne programe, vključno z elektrotehniko, računalništvom, telekomunikacijami in mehatroniko. Ti programi dijakom omogočajo pridobitev znanj, potrebnih za uspeh v hitro razvijajočih se tehnoloških panogah.  ERŠ Velenje ima tesne stike z lokalnimi in mednarodnimi podjetji, kar omogoča dijakom, da skozi prakso pridobijo dragocene izkušnje. To partnerstvo med šolo in industrijo zagotavlja, da so programi usklajeni s potrebami delodajalcev, kar povečuje zaposljivost dijakov po zaključku šolanja.  Šola je opremljena z najsodobnejšimi laboratoriji in delavnicami, kjer dijaki delajo z najnovejšimi napravami in tehnologijo. ERŠ Velenje spodbuja inovativnost in kreativnost svojih dijakov z udeležbo na nacionalnih in mednarodnih tekmovanjih, kot so tekmovanja iz robotike in programiranja, kjer redno dosegajo odlične rezultate.  Poleg akademskih dejavnosti šola ponuja številne obšolske dejavnosti, vključno s športnimi ekipami, kulturnimi dogodki in različnimi klubi. ERŠ Velenje goji vrednote odgovornosti, sodelovanja in vseživljenjskega učenja ter spodbuja dijake k aktivnemu in odgovornemu življenju v družbi.', 1),
(6, 'Šolski center Velenje, Gimnazija Velenje', 'Trg mladosti 3', 1, 'https://gimnazija.scv.si/', 'gimnazija@scv.si', '03 89 60 600', 8, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhm467-eaLpb7gsgfvH7e6GtyrUvXXFdO2Ng&s', 'https://evropskasredstva.si/app/uploads/2024/07/Solski-center-Velenje-gimnazija.jpg', 'Gimnazija Velenje je ena najuglednejših srednjih šol v Sloveniji, ki nudi visoko kakovostno izobrazbo in dijake pripravlja na nadaljnje izobraževanje ter spodbuja njihovo radovednost, kritično razmišljanje in globalno zavedanje. S svojo dolgoletno tradicijo odličnosti Gimnazija Velenje izstopa kot vodilna institucija na področju splošnega in strokovnega izobraževanja, namenjena celostnemu razvoju dijakov na akademskem, kulturnem in osebnem področju.  Šola ponuja široko paleto izobraževalnih programov, vključno s splošno gimnazijo, kjer se dijaki izobražujejo v naravoslovnih, družboslovnih, jezikovnih in humanističnih vedah. Ta uravnotežen učni načrt dijakom nudi trdne temelje za uspešno nadaljevanje študija na univerzah in kasnejšo kariero, bodisi v Sloveniji bodisi v tujini.  Poleg splošne gimnazije Gimnazija Velenje ponuja tudi specializirane programe, kot so umetniški in športni oddelki, ki omogočajo dijakom, da sledijo svojim interesom in razvijajo svoje talente na najvišji ravni. Šola je znana po živahnem obšolskem življenju, kjer dijaki lahko sodelujejo v kulturnih dejavnostih, šolskih publikacijah, klubih ter se udeležujejo tekmovanj na lokalni in državni ravni.  Pedagoški kader Gimnazije Velenje sestavljajo izkušeni učitelji, ki so predani uspehu svojih dijakov, tako akademsko kot osebnostno. Poudarjajo razvoj kritičnega mišljenja, ustvarjalnosti in samostojnega učenja, hkrati pa zagotavljajo podporno in sodelovalno okolje, kjer dijaki lahko izražajo svoja mnenja in ideje.  Gimnazija Velenje vzdržuje tudi močne mednarodne povezave, kar dijakom omogoča sodelovanje v izmenjavah in projektih s šolami iz Evrope. S tem pridobijo vpogled v druge kulture in perspektive, kar jim omogoča boljše razumevanje sveta ter pripravo na globalne izzive, ki jih čakajo v prihodnosti.  Gimnazija Velenje ni le kraj za pridobivanje znanja, ampak je tudi skupnost, kjer dijaki odkrivajo svoje interese, razvijajo talente in se pripravljajo na odgovorno življenje v sodobni družbi.', 1),
(7, 'Harvard Univeristy', 'Massachusetts Hall', 2, 'https://www.harvard.edu/', NULL, '617-495-1000', 7, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Harvard_University_coat_of_arms.svg/800px-Harvard_University_coat_of_arms.svg.png', 'https://2u.com/static/84f4025b19c2bf44a1c9b049994c1eff/ee8ba/baker-library-harvard-university_OPxWuDn.max-2880x1800.jpg', 'Harvard University, established in 1636, is the oldest institution of higher education in the United States and one of the most prestigious universities in the world. Located in Cambridge, Massachusetts, Harvard is known for its deep commitment to academic excellence, groundbreaking research, and global influence. The university is comprised of 13 schools and institutes, including Harvard College, Harvard Law School, Harvard Business School, Harvard Medical School, and the Harvard Graduate School of Education, among others.  Harvard\'s faculty includes distinguished scholars, Nobel laureates, Pulitzer Prize winners, and leaders in various fields. The university is renowned for producing prominent figures in politics, business, science, and the arts, including eight U.S. presidents, numerous foreign heads of state, and countless leaders in every sector of society.  With over 21,000 students enrolled, including undergraduates, graduate students, and professional students, Harvard offers a diverse and vibrant academic environment. Its expansive library system, with more than 20 million volumes, is one of the largest in the world. Harvard is also home to cutting-edge research centers, museums, and institutes that contribute to advances in fields ranging from medicine and public health to business, law, and the humanities.  Harvard\'s mission is to advance new ideas and promote intellectual discovery. The university fosters a commitment to lifelong learning, leadership, and service, shaping future generations to tackle complex global challenges. Through its world-class faculty, diverse student body, and comprehensive resources, Harvard continues to lead the world in education and research.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` tinyint(4) NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'High School', NULL),
(2, 'Collidge', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `role_id` tinyint(4) DEFAULT NULL,
  `profile_picture_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `role_id`, `profile_picture_path`) VALUES
(1, 'tom.kliner@scv.si', '2d3da40131ea13e9a7abdd87c293094d22293b68', 'Tom', 'Kliner', 1, NULL),
(4, 'simov.konecnik@test.si', '2d3da40131ea13e9a7abdd87c293094d22293b68', 'Simon', 'Konečnik', 5, NULL),
(5, 'jadrank.golcer@test.si', '2d3da40131ea13e9a7abdd87c293094d22293b68', 'Jadranka', 'Golčer', 5, NULL),
(6, 'simona.diklic@test.si', '2d3da40131ea13e9a7abdd87c293094d22293b68', 'Simona', 'Diklič', 5, NULL),
(7, 'alan.garber@test.si', '2d3da40131ea13e9a7abdd87c293094d22293b68', 'Alan', 'Garber', NULL, NULL),
(8, 'gabrijela.fidler@test.si', '2d3da40131ea13e9a7abdd87c293094d22293b68', 'Gabrijela', 'Fidler', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_courses`
--

CREATE TABLE `users_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` timestamp NOT NULL DEFAULT current_timestamp(),
  `untill` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ending_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_schools`
--

CREATE TABLE `users_schools` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` timestamp NOT NULL DEFAULT current_timestamp(),
  `untill` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ending_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users_schools`
--

INSERT INTO `users_schools` (`id`, `school_id`, `user_id`, `from`, `untill`, `ending_id`) VALUES
(7, 5, 5, '2024-10-20 12:00:46', '0000-00-00 00:00:00', NULL),
(8, 5, 4, '2024-10-20 12:01:22', '0000-00-00 00:00:00', NULL),
(9, 5, 6, '2024-10-20 12:01:32', '0000-00-00 00:00:00', NULL),
(10, 7, 7, '2024-10-20 12:02:04', '0000-00-00 00:00:00', NULL),
(12, 6, 8, '2024-10-20 12:02:48', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplications`
--
ALTER TABLE `aplications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_ibfk_1` (`school_id`);

--
-- Indexes for table `endings`
--
ALTER TABLE `endings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_user_id` (`to_user_id`),
  ADD KEY `from_user_id` (`from_user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `from_user_id` (`from_user_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_ibfk_1` (`city_id`),
  ADD KEY `principal_user_id` (`principal_user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_courses_ibfk_1` (`user_id`),
  ADD KEY `users_courses_ibfk_2` (`course_id`),
  ADD KEY `ending_id` (`ending_id`);

--
-- Indexes for table `users_schools`
--
ALTER TABLE `users_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_schools_ibfk_1` (`user_id`),
  ADD KEY `users_schools_ibfk_2` (`school_id`),
  ADD KEY `ending_id` (`ending_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplications`
--
ALTER TABLE `aplications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_courses`
--
ALTER TABLE `users_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_schools`
--
ALTER TABLE `users_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplications`
--
ALTER TABLE `aplications`
  ADD CONSTRAINT `aplications_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `aplications_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `aplications_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `schools_ibfk_2` FOREIGN KEY (`principal_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `schools_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD CONSTRAINT `users_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `users_courses_ibfk_3` FOREIGN KEY (`ending_id`) REFERENCES `endings` (`id`);

--
-- Constraints for table `users_schools`
--
ALTER TABLE `users_schools`
  ADD CONSTRAINT `users_schools_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_schools_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `users_schools_ibfk_3` FOREIGN KEY (`ending_id`) REFERENCES `endings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
