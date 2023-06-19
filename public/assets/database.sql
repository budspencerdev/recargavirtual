-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dbrecargavirtual
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbrecargavirtual
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbrecargavirtual` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `dbrecargavirtual` ;

-- -----------------------------------------------------
-- Table `dbrecargavirtual`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbrecargavirtual`.`admin` ;

CREATE TABLE IF NOT EXISTS `dbrecargavirtual`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(100) NULL DEFAULT NULL,
  `username` VARCHAR(50) NULL DEFAULT NULL,
  `password` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbrecargavirtual`.`movimientos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbrecargavirtual`.`movimientos` ;

CREATE TABLE IF NOT EXISTS `dbrecargavirtual`.`movimientos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NULL DEFAULT NULL,
  `tipo` ENUM('carga', 'consumo') NULL DEFAULT NULL,
  `fecha` TIMESTAMP NULL DEFAULT NULL,
  `monto` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbrecargavirtual`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbrecargavirtual`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `dbrecargavirtual`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(100) NULL DEFAULT NULL,
  `dni` VARCHAR(10) NULL DEFAULT NULL,
  `correo` VARCHAR(100) NULL DEFAULT NULL,
  `saldo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
