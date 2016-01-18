CREATE TABLE IF NOT EXISTS `satanbarbara`.`tags` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
	
	`slug` VARCHAR(255) NOT NULL,
	`title` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL DEFAULT "",

	-- If this tag is aliased to another tag, use tag_id
    `tag_id` INT(255) NOT NULL DEFAULT 0,
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
    `deleted` BOOLEAN NOT NULL DEFAULT 0,
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    UNIQUE INDEX `uid` (`slug`, `title`, `description`),
	
    UNIQUE INDEX `slug` (`slug`),
	
    UNIQUE INDEX `title` (`title`),
	
    PRIMARY KEY (`id`)

) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;