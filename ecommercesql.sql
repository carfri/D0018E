-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema carfri5db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema carfri5db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `carfri5db` DEFAULT CHARACTER SET utf8 ;
USE `carfri5db` ;

-- -----------------------------------------------------
-- Table `carfri5db`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carfri5db`.`customers` (
  `id` INT(8) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `password` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `firstname` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `lastname` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `shipment_address` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `shipment_city` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `isAdmin` INT(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_swedish_ci;


-- -----------------------------------------------------
-- Table `carfri5db`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carfri5db`.`products` (
  `id` INT(8) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `price` INT(10) NOT NULL,
  `ininventory` INT(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_swedish_ci;


-- -----------------------------------------------------
-- Table `carfri5db`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carfri5db`.`comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `rating` INT(2) NOT NULL,
  `customerID` INT(8) NOT NULL,
  `productID` INT(8) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `productID_idx` (`productID` ASC),
  INDEX `customerID_idx` (`customerID` ASC),
  CONSTRAINT `customerID`
    FOREIGN KEY (`customerID`)
    REFERENCES `carfri5db`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `productID`
    FOREIGN KEY (`productID`)
    REFERENCES `carfri5db`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_swedish_ci;


-- -----------------------------------------------------
-- Table `carfri5db`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carfri5db`.`orders` (
  `id` INT(8) NOT NULL AUTO_INCREMENT,
  `customerID` INT(8) NOT NULL,
  `productID` INT(8) NOT NULL,
  `ammountOrdered` INT(4) NOT NULL,
  `price` INT(10) NOT NULL,
  `statusATM` ENUM('cart', 'bought', 'shiped') CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_1_idx` (`customerID` ASC),
  INDEX `customer_id` USING BTREE (`customerID` ASC),
  INDEX `product_id` USING BTREE (`productID` ASC),
  CONSTRAINT `fk_orders_1`
    FOREIGN KEY (`customerID`)
    REFERENCES `carfri5db`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_2`
    FOREIGN KEY (`productID`)
    REFERENCES `carfri5db`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 96
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_swedish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
