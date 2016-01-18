CREATE TABLE IF NOT EXISTS `satanbarbara`.`locations` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
	
    `address` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL DEFAULT "",
	`state` VARCHAR(255) NOT NULL DEFAULT "",
	`country` VARCHAR(64) NOT NULL DEFAULT "",
	`postal` VARCHAR(32) NOT NULL DEFAULT "",
	
    `activated` BOOLEAN NOT NULL DEFAULT 0,
    `deleted` BOOLEAN NOT NULL DEFAULT 0,
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
	
    UNIQUE INDEX `uid` (`address`, `city`, `state`, `country`, `postal`),
	
    PRIMARY KEY (`id`)

) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci`  AUTO_INCREMENT=1;