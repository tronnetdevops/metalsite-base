CREATE TABLE IF NOT EXISTS `satanbarbara`.`roles` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `membership_id` INT(11) NOT NULL,
    `tag_id` INT(11) NOT NULL,
	
	`start` TIMESTAMP NOT NULL DEFAULT 0,
	`end` TIMESTAMP NOT NULL DEFAULT 0,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`membership_id`, `tag_id`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`membership_id`) REFERENCES `memberships`(`id`),
	-- FOREIGN KEY (`tag_id`) REFERENCES `tags`(`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;