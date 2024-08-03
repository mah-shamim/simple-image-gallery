CREATE TABLE IF NOT EXISTS `images` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `file_name` varchar(255) NOT NULL,
    `uploaded_on` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
