CREATE TABLE IF NOT EXISTS `satanbarbara`.`accounts` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `username` VARCHAR(32) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `fname` VARCHAR(64) NOT NULL DEFAULT "", 
    `lname` VARCHAR(64) NOT NULL DEFAULT "",
    `nickname` VARCHAR(64) NOT NULL DEFAULT "",
    `tagline` VARCHAR(128) NOT NULL DEFAULT "",
    `email` VARCHAR(255) NOT NULL DEFAULT "",
	`bio` TEXT NOT NULL,
	
    `privilege_level` SMALLINT NOT NULL DEFAULT 1,
	`role` SMALLINT NOT NULL DEFAULT 1,
	`type` SMALLINT NOT NULL DEFAULT 1,
	
	`location_id` INT(11) NOT NULL DEFAULT 0,
	
    `anonymous` BOOLEAN NOT NULL DEFAULT 0,
    `activated` BOOLEAN NOT NULL DEFAULT 0,
    `suspended` BOOLEAN NOT NULL DEFAULT 0,
    `banned` BOOLEAN NOT NULL DEFAULT 0,
    `deleted` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `ucontact` (`email`),
    UNIQUE INDEX `uname` (`username`),
    UNIQUE INDEX `uid` (`email`, `username`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;