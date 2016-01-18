CREATE TABLE IF NOT EXISTS `satanbarbara`.`performances` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `act_id` INT(11) NOT NULL,
    `event_id` INT(11) NOT NULL,
	
    `position` SMALLINT NOT NULL DEFAULT -1,
    `slot` TIMESTAMP NOT NULL DEFAULT 0,
	
    `privilege_level` SMALLINT NOT NULL DEFAULT 1,
	`role` SMALLINT NOT NULL DEFAULT 1,
	`type` SMALLINT NOT NULL DEFAULT 1,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`act_id`, `event_id`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`act_id`) REFERENCES `acts`(`id`),
	-- FOREIGN KEY (`event_id`) REFERENCES `events`(`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;