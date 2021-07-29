
DROP TABLE IF EXISTS `noticies`;
CREATE TABLE `noticies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text(255) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
