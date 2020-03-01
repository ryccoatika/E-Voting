-- MySQL Script generated by MySQL Workbench
-- Mon Mar  2 00:04:50 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`participants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`participants` (
  `nis` INT NOT NULL,
  `name` VARCHAR(30) NOT NULL,
  `class` VARCHAR(10) NOT NULL,
  `state` INT NOT NULL DEFAULT 0,
  `tgl` DATE NOT NULL,
  PRIMARY KEY (`nis`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`admin` (
  `idadmin` INT NOT NULL,
  `username` VARCHAR(30) NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idadmin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`candidates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`candidates` (
  `no_urut` INT NOT NULL,
  `nis` VARCHAR(10) NOT NULL,
  `photo` VARCHAR(100) NOT NULL,
  `name` VARCHAR(30) NOT NULL,
  `class` VARCHAR(10) NOT NULL,
  `motto` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`no_urut`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;