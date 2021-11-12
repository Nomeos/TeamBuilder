DROP TABLE IF EXISTS `teambuilder`.`status`;

CREATE TABLE IF NOT EXISTS `teambuilder`.`status`
(
 `id` INT NOT NULL AUTO_INCREMENT,
 `name` VARCHAR(10) NOT NULL, PRIMARY KEY (`id`), UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE
) ENGINE = InnoDB DEFAULT CHARACTER SET = UTF8MB4;

INSERT INTO `status` (`id`,`name`) VALUES (1, 'ACTIF'),
 (2, 'INACTIF'),
 (3, 'BANNI');
 
ALTER TABLE `members`
	ADD COLUMN `status_id` INT NOT NULL DEFAULT '1' AFTER `role_id`;
	
ALTER TABLE `members`
	ADD CONSTRAINT `FK_members_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION;