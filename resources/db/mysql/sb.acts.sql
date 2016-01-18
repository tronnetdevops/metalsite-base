CREATE TABLE IF NOT EXISTS `satanbarbara`.`acts` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255) NOT NULL DEFAULT "",
	`description` TEXT NOT NULL,
	
    `started` TIMESTAMP NOT NULL DEFAULT 0,

    `social` TEXT NOT NULL,
	
    `state` INT(11) NOT NULL DEFAULT 0,
    `status` VARCHAR(255) NOT NULL DEFAULT "",
		
	`location_id` INT(11) NOT NULL DEFAULT 0,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
    `suspended` BOOLEAN NOT NULL DEFAULT 0,
    `banned` BOOLEAN NOT NULL DEFAULT 0,
    `deleted` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`title`, `location_id`, `subtitle`),
	
    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;