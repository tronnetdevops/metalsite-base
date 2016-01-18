CREATE TABLE IF NOT EXISTS `satanbarbara`.`hosters` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `event_id` INT(11) NOT NULL,
    `venue_id` INT(11) NOT NULL,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`event_id`, `venue_id`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`event_id`) REFERENCES `venues`(`id`),
	-- FOREIGN KEY (`venue_id`) REFERENCES `venues`(`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;