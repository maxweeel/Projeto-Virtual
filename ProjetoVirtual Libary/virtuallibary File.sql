-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema virtuallibary
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema virtuallibary
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `virtuallibary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `virtuallibary` ;

-- -----------------------------------------------------
-- Table `virtuallibary`.`registerbooks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtuallibary`.`registerbooks` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_books` VARCHAR(50) NOT NULL,
  `gender` VARCHAR(20) NOT NULL,
  `chapters` INT NULL DEFAULT NULL,
  `author` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `virtuallibary`.`books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtuallibary`.`books` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_books` VARCHAR(50) NOT NULL,
  `gender` VARCHAR(20) NOT NULL,
  `chapters` INT NULL DEFAULT NULL,
  `author` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  `registerbooks_id` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_books_registerbooks1_idx` (`registerbooks_id` ASC) VISIBLE,
  CONSTRAINT `fk_books_registerbooks1`
    FOREIGN KEY (`registerbooks_id`)
    REFERENCES `virtuallibary`.`registerbooks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
