CREATE TABLE IF NOT EXISTS `satanbarbara`.`genres` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    `act_id` INT(11) NOT NULL,
    `tag_id` INT(11) NOT NULL,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
	
    UNIQUE INDEX `uid` (`act_id`, `tag_id`),

    PRIMARY KEY (`id`)
	
	-- FOREIGN KEY (`act_id`) REFERENCES `acts`(`id`),
	-- FOREIGN KEY (`tag_id`) REFERENCES `tags`(`id`)
	
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;