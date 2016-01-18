CREATE TABLE IF NOT EXISTS `satanbarbara`.`memberships` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `account_id` INT(11) NOT NULL,
    `act_id` INT(11) NOT NULL,
	
	`start` TIMESTAMP NOT NULL DEFAULT 0,
	`end` TIMESTAMP NOT NULL DEFAULT 0,
	
    `status` VARCHAR(255) NOT NULL DEFAULT "",
    `position` VARCHAR(255) NOT NULL DEFAULT "",

    `privilege_level` SMALLINT NOT NULL DEFAULT 1,
	`role` SMALLINT NOT NULL DEFAULT 1,
	`type` SMALLINT NOT NULL DEFAULT 1,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`account_id`, `act_id`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),
	-- FOREIGN KEY (`act_id`) REFERENCES `acts`(`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;