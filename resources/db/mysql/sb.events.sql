CREATE TABLE IF NOT EXISTS `satanbarbara`.`events` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255) NOT NULL DEFAULT "",
	`description` TEXT NOT NULL,

	`instructions` TEXT NOT NULL,
	`price` VARCHAR(20) NOT NULL DEFAULT "Free",
	`age` INT(2) NOT NULL DEFAULT 0,
	`start` TIMESTAMP NOT NULL,
	`end` TIMESTAMP NOT NULL,
	`ticket_url` VARCHAR(255) NOT NULL DEFAULT "http://",
		
    `activated` BOOLEAN NOT NULL DEFAULT 0,
    `suspended` BOOLEAN NOT NULL DEFAULT 0,
    `banned` BOOLEAN NOT NULL DEFAULT 0,
    `deleted` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`title`, `start`, `end`),
	
    PRIMARY KEY (`id`)
		
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;