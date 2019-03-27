-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `clean_content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `show_in_menu` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `is_first_page` tinyint(1) NOT NULL DEFAULT '0',
  `lang_id` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE `dishes` (
  `dish_id` int(100) UNSIGNED NOT NULL,
  `dish_name` varchar(255) COLLATE latin7_estonian_cs NOT NULL,
  `dish_description` varchar(255) COLLATE latin7_estonian_cs NOT NULL,
  `dish_price` float(4,2) NOT NULL,
  `type_id` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_estonian_cs;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dish_id`, `dish_name`, `dish_description`, `dish_price`, `type_id`) VALUES
(2, 'Sealihapada ploomide ja aprikoosiga', 'sealihapada, lisand, salat, leib', 2.65, 1),
(3, 'Praetud kanakints', 'praetud kana, lisand, salat, leib', 2.50, 1),
(4, 'Hakklihakaste', 'hakklihakaste, lisand, salat, leib', 2.45, 1),
(5, 'Kartul, kaste, salat, leib', '', 1.38, 1),
(6, 'Hakklihakaste 1/2', 'hakklihakaste, lisand, salat, leib', 1.30, 1),
(7, 'Rassolnik', 'supp, hapukoor, leib', 1.10, 2),
(8, 'Rosinakisell vahukoorega', '', 1.05, 3),
(9, 'Mahl', '', 0.60, 4),
(12, 'Morss', '', 0.25, 4),
(13, 'Piim', '', 0.30, 4),
(14, 'Keefir', '', 0.39, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dish_availability`
--

DROP TABLE IF EXISTS `dish_availability`;
CREATE TABLE `dish_availability` (
  `dish_id` int(100) UNSIGNED NOT NULL,
  `dish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish_availability`
--

INSERT INTO `dish_availability` (`dish_id`, `dish_date`) VALUES
(2, '2019-02-19'),
(3, '2019-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `dish_types`
--

DROP TABLE IF EXISTS `dish_types`;
CREATE TABLE `dish_types` (
  `type_id` int(100) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish_types`
--

INSERT INTO `dish_types` (`type_id`, `type_name`, `type_icon`) VALUES
(1, 'praed', 'fa-utensils'),
(2, 'supid', 'fa-utensil-spoon'),
(3, 'magustoidud', 'fa-cookie-bite'),
(4, 'joogid', 'fa-glass-whiskey');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `sid` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_data` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `svars` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sid`, `user_id`, `user_data`, `svars`, `created`, `changed`, `login_ip`) VALUES
('5f13b9b127426d19e4eb41b5f5e3727e', 0, 'a:3:{s:7:\"user_id\";i:0;s:7:\"role_id\";i:0;s:8:\"username\";s:9:\"Anonymous\";}', '', '2019-03-27 10:28:33', '2019-03-27 08:28:33', '193.40.62.14'),
('adfe904c5208098bd3706fae11b29246', 0, 'a:3:{s:7:\"user_id\";i:0;s:7:\"role_id\";i:0;s:8:\"username\";s:9:\"Anonymous\";}', '', '2019-03-27 10:27:22', '2019-03-27 08:27:22', '193.40.62.14'),
('9b46bc88ec955f3306814b04b7f3538a', 0, 'a:3:{s:7:\"user_id\";i:0;s:7:\"role_id\";i:0;s:8:\"username\";s:9:\"Anonymous\";}', 'a:0:{}', '2019-03-27 10:25:03', '2019-03-27 08:25:55', '193.40.62.14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `role_id` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `is_active`, `role_id`, `created`, `changed`) VALUES
(1, 'user', '7815696ecbf1c96e6894b779456d330e', 'Just', 'User', 'user@localhost', 1, 2, '2019-03-12 09:52:19', '2019-03-12 07:52:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`dish_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `dish_availability`
--
ALTER TABLE `dish_availability`
  ADD KEY `dish_id` (`dish_id`);

--
-- Indexes for table `dish_types`
--
ALTER TABLE `dish_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `dish_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dish_types`
--
ALTER TABLE `dish_types`
  MODIFY `type_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `dish_types` (`type_id`);

--
-- Constraints for table `dish_availability`
--
ALTER TABLE `dish_availability`
  ADD CONSTRAINT `dish_availability_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`dish_id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
