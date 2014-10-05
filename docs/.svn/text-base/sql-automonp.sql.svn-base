SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `automonp`.`USR_USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`USR_USER` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`USR_USER` (
  `usr_id` INT NOT NULL AUTO_INCREMENT ,
  `usr_nom` VARCHAR(45) NULL ,
  `usr_prenom` VARCHAR(45) NULL ,
  `usr_login` VARCHAR(45) NULL ,
  `usr_password` VARCHAR(45) NULL ,
  `usr_email` VARCHAR(45) NULL ,
  PRIMARY KEY (`usr_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_MARQUE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_MARQUE` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_MARQUE` (
  `code_marque` VARCHAR(45) NOT NULL ,
  `nom_marque` VARCHAR(45) NULL ,
  `pays_marque` VARCHAR(45) NULL ,
  `logo_marque` VARCHAR(45) NULL ,
  PRIMARY KEY (`code_marque`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_MODELE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_MODELE` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_MODELE` (
  `code_modele` VARCHAR(45) NOT NULL ,
  `code_marque` VARCHAR(45) NOT NULL ,
  `nom_modele` VARCHAR(45) NULL ,
  PRIMARY KEY (`code_modele`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_ENERGIE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_ENERGIE` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_ENERGIE` (
  `id_energie` INT NOT NULL AUTO_INCREMENT ,
  `lib_energie` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_energie`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_TRANSMISSION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_TRANSMISSION` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_TRANSMISSION` (
  `id_trans` INT NOT NULL AUTO_INCREMENT ,
  `lib_trans` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_trans`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_TYPE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_TYPE` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_TYPE` (
  `id_type` INT NOT NULL AUTO_INCREMENT ,
  `lib_type` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_type`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_OCCASION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_OCCASION` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_OCCASION` (
  `id_occasion` INT NOT NULL AUTO_INCREMENT ,
  `code_marque` VARCHAR(45) NOT NULL ,
  `code_modele` VARCHAR(45) NOT NULL ,
  `id_energie` INT NOT NULL ,
  `id_trans` INT NOT NULL ,
  `id_type` INT NOT NULL ,
  `id_porte` INT NOT NULL ,
  `version` VARCHAR(255) NULL ,
  `annee` INT NULL ,
  `prix` FLOAT NULL ,
  `kilometrage` INT NULL ,
  `equipements` LONGTEXT NULL ,
  `description` LONGTEXT NULL ,
  `puissance` INT NULL ,
  `main_photo` VARCHAR(100) NULL ,
  `photo_2` VARCHAR(100) NULL ,
  `photo_3` VARCHAR(100) NULL ,
  `photo_4` VARCHAR(100) NULL ,
  PRIMARY KEY (`id_occasion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_PORTE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_PORTE` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_PORTE` (
  `id_porte` INT NOT NULL AUTO_INCREMENT ,
  `lib_porte` VARCHAR(100) NULL ,
  PRIMARY KEY (`id_porte`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`MEM_CONTACT`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`MEM_CONTACT` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`MEM_CONTACT` (
  `id_contact` INT NOT NULL AUTO_INCREMENT ,
  `sujet` VARCHAR(45) NULL ,
  `message` VARCHAR(255) NULL ,
  `email_contact` VARCHAR(45) NULL ,
  `telephone_contact` VARCHAR(45) NULL ,
  `date_contact` DATETIME NULL ,
  `is_view` TINYINT NULL DEFAULT 0 ,
  PRIMARY KEY (`id_contact`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`MEM_RENDEZVOUS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`MEM_RENDEZVOUS` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`MEM_RENDEZVOUS` (
  `id_rendezvous` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NULL ,
  `prenom` VARCHAR(45) NULL ,
  `telephone` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `date_rendezvous` DATETIME NULL ,
  `date_souhaitee` DATETIME NULL ,
  `horaire_souhaite` VARCHAR(45) NULL ,
  `type_intervention` VARCHAR(255) NULL ,
  `desc_vehicule` VARCHAR(100) NULL ,
  `immatriculation` VARCHAR(45) NULL ,
  `is_view` TINYINT NULL ,
  PRIMARY KEY (`id_rendezvous`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `automonp`.`VEH_NEUF`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `automonp`.`VEH_NEUF` ;

CREATE  TABLE IF NOT EXISTS `automonp`.`VEH_NEUF` (
  `id_neuf` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NOT NULL ,
  `prenom` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telephone` VARCHAR(45) NOT NULL ,
  `id_type` INT NOT NULL ,
  `id_trans` INT NOT NULL ,
  `id_energie` INT NOT NULL ,
  `id_porte` INT NOT NULL ,
  `code_marque` VARCHAR(45) NOT NULL ,
  `code_modele` VARCHAR(45) NOT NULL ,
  `commentaires` VARCHAR(45) NULL ,
  `date_commande` DATETIME NULL ,
  PRIMARY KEY (`id_neuf`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `automonp`.`USR_USER`
-- -----------------------------------------------------
START TRANSACTION;
USE `automonp`;
INSERT INTO `automonp`.`USR_USER` (`usr_id`, `usr_nom`, `usr_prenom`, `usr_login`, `usr_password`, `usr_email`) VALUES (NULL, 'toure', 'ibou', 'admin', 'admin', 'ib.toure@gmail.com');

COMMIT;

-- -----------------------------------------------------
-- Data for table `automonp`.`VEH_ENERGIE`
-- -----------------------------------------------------
START TRANSACTION;
USE `automonp`;
INSERT INTO `automonp`.`VEH_ENERGIE` (`id_energie`, `lib_energie`) VALUES (NULL, 'Gazole');
INSERT INTO `automonp`.`VEH_ENERGIE` (`id_energie`, `lib_energie`) VALUES (NULL, 'Essence');
INSERT INTO `automonp`.`VEH_ENERGIE` (`id_energie`, `lib_energie`) VALUES (NULL, 'Electrique');
INSERT INTO `automonp`.`VEH_ENERGIE` (`id_energie`, `lib_energie`) VALUES (NULL, 'GPL');
INSERT INTO `automonp`.`VEH_ENERGIE` (`id_energie`, `lib_energie`) VALUES (NULL, 'Hybride');
INSERT INTO `automonp`.`VEH_ENERGIE` (`id_energie`, `lib_energie`) VALUES (NULL, 'Autres');

COMMIT;

-- -----------------------------------------------------
-- Data for table `automonp`.`VEH_TRANSMISSION`
-- -----------------------------------------------------
START TRANSACTION;
USE `automonp`;
INSERT INTO `automonp`.`VEH_TRANSMISSION` (`id_trans`, `lib_trans`) VALUES (NULL, 'Manuelle');
INSERT INTO `automonp`.`VEH_TRANSMISSION` (`id_trans`, `lib_trans`) VALUES (NULL, 'Automatique');
INSERT INTO `automonp`.`VEH_TRANSMISSION` (`id_trans`, `lib_trans`) VALUES (NULL, 'Semi Automatique');
INSERT INTO `automonp`.`VEH_TRANSMISSION` (`id_trans`, `lib_trans`) VALUES (NULL, 'Autres');

COMMIT;

-- -----------------------------------------------------
-- Data for table `automonp`.`VEH_TYPE`
-- -----------------------------------------------------
START TRANSACTION;
USE `automonp`;
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, 'Berline');
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, '4x4 - SUV');
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, 'Break');
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, 'Cabriolet');
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, 'Coupé');
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, 'Monospace');
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, 'Vehicule de Société');
INSERT INTO `automonp`.`VEH_TYPE` (`id_type`, `lib_type`) VALUES (NULL, 'Pick-Up');

COMMIT;

-- -----------------------------------------------------
-- Data for table `automonp`.`VEH_PORTE`
-- -----------------------------------------------------
START TRANSACTION;
USE `automonp`;
INSERT INTO `automonp`.`VEH_PORTE` (`id_porte`, `lib_porte`) VALUES (NULL, '2 portes');
INSERT INTO `automonp`.`VEH_PORTE` (`id_porte`, `lib_porte`) VALUES (NULL, '3 portes');
INSERT INTO `automonp`.`VEH_PORTE` (`id_porte`, `lib_porte`) VALUES (NULL, '5 portes');

COMMIT;
