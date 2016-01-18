CREATE TABLE IF NOT EXISTS `satanbarbara`.`attendees` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `account_id` INT(11) NOT NULL,
    `event_id` INT(11) NOT NULL,

    `state` INT(11) NOT NULL DEFAULT 0,
    `status` VARCHAR(255) NOT NULL DEFAULT "",
	
    `privilege_level` SMALLINT NOT NULL DEFAULT 1,
	`role` SMALLINT NOT NULL DEFAULT 1,
	`type` SMALLINT NOT NULL DEFAULT 1,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`account_id`, `event_id`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),
	-- FOREIGN KEY (`event_id`) REFERENCES `events`(`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;