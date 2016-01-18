CREATE TABLE IF NOT EXISTS `satanbarbara`.`activities` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `date` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `account_id` INT(11) NOT NULL DEFAULT 0,
    `act_id` INT(11) NOT NULL DEFAULT 0,
    `venue_id` INT(11) NOT NULL DEFAULT 0,
    `event_id` INT(11) NOT NULL DEFAULT 0,	
    `location_id` INT(11) NOT NULL DEFAULT 0,	
    `tag_id` INT(11) NOT NULL DEFAULT 0,	
	
	`type` VARCHAR(128) NOT NULL,
	`action` VARCHAR(255) NOT NULL,
	`data` TEXT NOT NULL,
	
    UNIQUE INDEX `uid` (`date`, `account_id`, `act_id`, `venue_id`, `event_id`, `location_id`, `tag_id`, `type`, `action`),
	
    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),
	-- FOREIGN KEY (`act_id`) REFERENCES `acts`(`id`),
	-- FOREIGN KEY (`venue_id`) REFERENCES `venues`(`id`),
	-- FOREIGN KEY (`event_id`) REFERENCES `events`(`id`),
	-- FOREIGN KEY (`location_id`) REFERENCES `locations`(`id`),
	-- FOREIGN KEY (`tag_id`) REFERENCES `tags`(`id`)
		
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;