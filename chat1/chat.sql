--Chat Table
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `chat_id` INT(11) NOT NULL AUTO_INCREMENT,
  `chat_name` VARCHAR(64) DEFAULT NULL,
  `start_time` DATETIME DEFAULT NULL,
  PRIMARY KEY  (`chat_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;
  
--Message Table
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` INT(11) NOT NULL AUTO_INCREMENT,
  `chat_id` INT(11) NOT NULL DEFAULT '0',
  `user_id` INT(11) NOT NULL DEFAULT '0',
  `user_name` VARCHAR(64) DEFAULT NULL,
  `message` TEXT,
  `post_time` DATETIME DEFAULT NULL,
  PRIMARY KEY  (`message_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--Users Table
CREATE TABLE `users` (   `id` int(11) NOT NULL AUTO_INCREMENT,  
`username` varchar(255) NOT NULL,   `email` varchar(255) NOT NULL,  
`password` varchar(255) NOT NULL, `activation` varchar(255) NOT NULL,   PRIMARY KEY (`id`) );

ALTER user AUTO_INCREMENT=1;

CREATE TABLE `loggedin` (   `id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL,   `logtime` DATETIME DEFAULT NULL,  PRIMARY KEY (`id`) );
