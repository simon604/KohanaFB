SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` bigint(20) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `ipaddress` varchar(45) DEFAULT NULL,
  `created` varchar(45) NOT NULL,
  `modified` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facebook_id` (`facebook_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;