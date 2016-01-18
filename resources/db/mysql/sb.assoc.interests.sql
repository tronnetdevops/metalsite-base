CREATE TABLE IF NOT EXISTS `satanbarbara`.`interests` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `account_id` INT(11) NOT NULL,
    `tag_id` INT(11) NOT NULL,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`account_id`, `tag_id`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),
	-- FOREIGN KEY (`tag_id`) REFERENCES `tags`(`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;