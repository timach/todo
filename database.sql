CREATE TABLE IF NOT EXISTS `todo` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `user_name` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(255) NOT NULL ,
    `task_text` VARCHAR(1000) NOT NULL ,
    `status` TINYINT NOT NULL ,
    PRIMARY KEY (`id`), 
    INDEX (`status`), 
    INDEX (`email`), 
    INDEX (`user_name`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;