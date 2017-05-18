-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`categ`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`categ` ;

CREATE TABLE IF NOT EXISTS `mydb`.`categ` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `types` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Produits`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Produits` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Produits` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(80) NOT NULL,
  `description` VARCHAR(120) NOT NULL,
  `categ_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Produits_categ1_idx` (`categ_id` ASC),
  CONSTRAINT `fk_Produits_categ1`
    FOREIGN KEY (`categ_id`)
    REFERENCES `mydb`.`categ` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`img`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`img` ;

CREATE TABLE IF NOT EXISTS `mydb`.`img` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(120) NOT NULL,
  `Produits_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_img_Produits1_idx` (`Produits_id` ASC),
  CONSTRAINT `fk_img_Produits1`
    FOREIGN KEY (`Produits_id`)
    REFERENCES `mydb`.`Produits` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`util`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`util` ;

CREATE TABLE IF NOT EXISTS `mydb`.`util` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(60) NOT NULL,
  `mdp` CHAR(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`droit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`droit` ;

CREATE TABLE IF NOT EXISTS `mydb`.`droit` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission` INT UNSIGNED NOT NULL,
  `util_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_droit_util_idx` (`util_id` ASC),
  CONSTRAINT `fk_droit_util`
    FOREIGN KEY (`util_id`)
    REFERENCES `mydb`.`util` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
