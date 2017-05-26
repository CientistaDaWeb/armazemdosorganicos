SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `armazemdosorganicos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `armazemdosorganicos` ;

-- -----------------------------------------------------
-- Table `armazemdosorganicos`.`produtos_categorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `armazemdosorganicos`.`produtos_categorias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `categoria` VARCHAR(255) NULL ,
  `imagem` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `armazemdosorganicos`.`produtos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `armazemdosorganicos`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `produtos_categorias_id` INT NOT NULL ,
  `nome` VARCHAR(255) NULL ,
  `descricao` LONGTEXT NULL ,
  `slug` VARCHAR(255) NULL ,
  `imagem` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `produtos_x_produtos_categorias` (`produtos_categorias_id` ASC) ,
  CONSTRAINT `produtos_x_produtos_categorias`
    FOREIGN KEY (`produtos_categorias_id` )
    REFERENCES `armazemdosorganicos`.`produtos_categorias` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `armazemdosorganicos`.`receitas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `armazemdosorganicos`.`receitas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(255) NULL ,
  `ingredientes` LONGTEXT NULL ,
  `modo_preparo` LONGTEXT NULL ,
  `rendimento` VARCHAR(255) NULL ,
  `data` DATE NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `armazemdosorganicos`.`produtos_receitas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `armazemdosorganicos`.`produtos_receitas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `produtos_id` INT NOT NULL ,
  `receitas_id` INT NOT NULL ,
  INDEX `produtos_receitas_x_produtos1` (`produtos_id` ASC) ,
  PRIMARY KEY (`id`) ,
  INDEX `produtos_receitas_x_receitas1` (`receitas_id` ASC) ,
  CONSTRAINT `produtos_receitas_x_produtos1`
    FOREIGN KEY (`produtos_id` )
    REFERENCES `armazemdosorganicos`.`produtos` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `produtos_receitas_x_receitas1`
    FOREIGN KEY (`receitas_id` )
    REFERENCES `armazemdosorganicos`.`receitas` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `armazemdosorganicos`.`noticias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `armazemdosorganicos`.`noticias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(255) NULL ,
  `descricao` LONGTEXT NULL ,
  `fonte` VARCHAR(45) NULL ,
  `data` DATE NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
