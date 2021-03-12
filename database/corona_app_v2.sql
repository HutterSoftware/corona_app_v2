-- MySQL Script generated by MySQL Workbench
-- Fri 12 Mar 2021 05:36:55 PM CET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema corona_app_v2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema corona_app_v2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `corona_app_v2` DEFAULT CHARACTER SET utf8 ;
USE `corona_app_v2` ;

CREATE USER corona_app_v2@localhost IDENTIFIED BY "a;wiofh;aerg";
GRANT ALL PRIVILEGES ON corona_app_v2.* to corona_app_v2@localhost;

-- -----------------------------------------------------
-- Table `corona_app_v2`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corona_app_v2`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corona_app_v2`.`doc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corona_app_v2`.`doc` (
  `iddoc` INT NOT NULL AUTO_INCREMENT,
  `iduser` INT NULL,
  PRIMARY KEY (`iddoc`),
  INDEX `fk_doc_1_idx` (`iduser` ASC) VISIBLE,
  CONSTRAINT `fk_doc_1`
    FOREIGN KEY (`iduser`)
    REFERENCES `corona_app_v2`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corona_app_v2`.`health_department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corona_app_v2`.`health_department` (
  `idhealth_department` INT NOT NULL AUTO_INCREMENT,
  `iduser` INT NULL,
  PRIMARY KEY (`idhealth_department`),
  INDEX `fk_health_department_1_idx` (`iduser` ASC) VISIBLE,
  CONSTRAINT `fk_health_department_1`
    FOREIGN KEY (`iduser`)
    REFERENCES `corona_app_v2`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corona_app_v2`.`ill_people`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corona_app_v2`.`ill_people` (
  `idill_people` INT NOT NULL AUTO_INCREMENT,
  `iduser` INT NULL,
  `reporting_day` DATETIME NULL,
  PRIMARY KEY (`idill_people`),
  INDEX `fk_ill_people_1_idx` (`iduser` ASC) VISIBLE,
  CONSTRAINT `fk_ill_people_1`
    FOREIGN KEY (`iduser`)
    REFERENCES `corona_app_v2`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `corona_app_v2`.`tracking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `corona_app_v2`.`tracking` (
  `idtracking` INT NOT NULL AUTO_INCREMENT,
  `iduser` INT NOT NULL,
  `longitude` DOUBLE NOT NULL,
  `latitude` DOUBLE NOT NULL,
  `sample_time` DATETIME NOT NULL,
  PRIMARY KEY (`idtracking`),
  CONSTRAINT `fk_tracking_1`
    FOREIGN KEY ()
    REFERENCES `corona_app_v2`.`user` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;