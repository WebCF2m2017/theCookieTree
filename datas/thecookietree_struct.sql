-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema theCookieTree
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema theCookieTree
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `theCookieTree` DEFAULT CHARACTER SET utf8 ;
USE `theCookieTree` ;

-- -----------------------------------------------------
-- Table `theCookieTree`.`categ`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theCookieTree`.`categ` ;

CREATE TABLE IF NOT EXISTS `theCookieTree`.`categ` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `types` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theCookieTree`.`Produits`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theCookieTree`.`Produits` ;

CREATE TABLE IF NOT EXISTS `theCookieTree`.`Produits` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(80) NOT NULL,
  `description` VARCHAR(120) NOT NULL,
  `categ_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Produits_categ1_idx` (`categ_id` ASC),
  CONSTRAINT `fk_Produits_categ1`
    FOREIGN KEY (`categ_id`)
    REFERENCES `theCookieTree`.`categ` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theCookieTree`.`img`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theCookieTree`.`img` ;

CREATE TABLE IF NOT EXISTS `theCookieTree`.`img` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(555) NOT NULL,
  `Produits_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_img_Produits1_idx` (`Produits_id` ASC),
  CONSTRAINT `fk_img_Produits1`
    FOREIGN KEY (`Produits_id`)
    REFERENCES `theCookieTree`.`Produits` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theCookieTree`.`droit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theCookieTree`.`droit` ;

CREATE TABLE IF NOT EXISTS `theCookieTree`.`droit` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theCookieTree`.`util`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theCookieTree`.`util` ;

CREATE TABLE IF NOT EXISTS `theCookieTree`.`util` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(60) NOT NULL,
  `mdp` CHAR(64) NOT NULL,
  `mail` VARCHAR(355) NOT NULL,
  `nom` VARCHAR(120) NOT NULL,
  `nomentreprise` VARCHAR(120) NOT NULL,
  `prenom` VARCHAR(120) NOT NULL,
  `droit_id` INT UNSIGNED NOT NULL,
  `newsletter` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  INDEX `fk_util_droit1_idx` (`droit_id` ASC),
  CONSTRAINT `fk_util_droit1`
    FOREIGN KEY (`droit_id`)
    REFERENCES `theCookieTree`.`droit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theCookieTree`.`Commande`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theCookieTree`.`Commande` ;

CREATE TABLE IF NOT EXISTS `theCookieTree`.`Commande` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `util` VARCHAR(355) NOT NULL,
  `mail` VARCHAR(355) NOT NULL,
  `produit` INT UNSIGNED NOT NULL,
  `quantite` INT UNSIGNED NOT NULL,
  `nomentreprise` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `theCookieTree`.`Commande_has_Produits`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `theCookieTree`.`Commande_has_Produits` ;

CREATE TABLE IF NOT EXISTS `theCookieTree`.`Commande_has_Produits` (
  `Commande_id` INT NOT NULL,
  `Produits_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Commande_id`, `Produits_id`),
  INDEX `fk_Commande_has_Produits_Produits1_idx` (`Produits_id` ASC),
  INDEX `fk_Commande_has_Produits_Commande1_idx` (`Commande_id` ASC),
  CONSTRAINT `fk_Commande_has_Produits_Commande1`
    FOREIGN KEY (`Commande_id`)
    REFERENCES `theCookieTree`.`Commande` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_has_Produits_Produits1`
    FOREIGN KEY (`Produits_id`)
    REFERENCES `theCookieTree`.`Produits` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
