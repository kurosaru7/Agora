-- MySQL Script generated by MySQL Workbench
-- lun. 26 nov. 2018 15:18:58 CET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema agora
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema agora
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agora` DEFAULT CHARACTER SET utf8 ;
USE `agora` ;

-- -----------------------------------------------------
-- Table `agora`.`profil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`profil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `mail` VARCHAR(45) NULL,
  `nom` VARCHAR(45) NULL,
  `prenom` VARCHAR(45) NULL,
  `adresse` VARCHAR(100) NULL,
  `telephone` VARCHAR(45) NULL,
  `score` INT NULL,
  `avatar` VARCHAR(100) NULL,
  `statut` ENUM('admin', 'visiteur') NULL,
  `pseudo` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `datep` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`sujet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`sujet` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL,
  `dateS` DATETIME NULL,
  `statut` ENUM('ouvert', 'ferme') NULL,
  `profil` INT NOT NULL,
  `categorie` INT NOT NULL,
  `adresse` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sujet_profil1_idx` (`profil` ASC),
  INDEX `fk_sujet_categorie1_idx` (`categorie` ASC),
  CONSTRAINT `fk_sujet_profil1`
    FOREIGN KEY (`profil`)
    REFERENCES `agora`.`profil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sujet_categorie1`
    FOREIGN KEY (`categorie`)
    REFERENCES `agora`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`reponse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`reponse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `adresse` VARCHAR(45) NULL,
  `points` INT NULL,
  `datem` DATETIME NULL,
  `sujet` INT NOT NULL,
  `profil` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_sujet1_idx` (`sujet` ASC),
  INDEX `fk_reponse_profil1_idx` (`profil` ASC),
  CONSTRAINT `fk_message_sujet1`
    FOREIGN KEY (`sujet`)
    REFERENCES `agora`.`sujet` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reponse_profil1`
    FOREIGN KEY (`profil`)
    REFERENCES `agora`.`profil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`conversation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`conversation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sujet` VARCHAR(45) NULL,
  `dateC` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`courrier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`courrier` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `conversation` INT NOT NULL,
  `adresse` VARCHAR(100) NOT NULL,
  `datecou` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_courrier_correspondance1_idx` (`conversation` ASC),
  CONSTRAINT `fk_courrier_correspondance1`
    FOREIGN KEY (`conversation`)
    REFERENCES `agora`.`conversation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`commentaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`commentaire` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `points` INT NULL,
  `adresse` VARCHAR(100) NULL,
  `reponse` INT NOT NULL,
  `datecom` DATETIME NULL,
  `profil` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_commentaire_message1_idx` (`reponse` ASC),
  INDEX `fk_commentaire_profil1_idx` (`profil` ASC),
  CONSTRAINT `fk_commentaire_message1`
    FOREIGN KEY (`reponse`)
    REFERENCES `agora`.`reponse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_commentaire_profil1`
    FOREIGN KEY (`profil`)
    REFERENCES `agora`.`profil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`ticket` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sujet` VARCHAR(255) NULL,
  `dateT` DATE NULL,
  `profil` INT NOT NULL,
  `adresse` VARCHAR(100) NULL,
  `pieces_jointe` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ticket_profil1_idx` (`profil` ASC),
  CONSTRAINT `fk_ticket_profil1`
    FOREIGN KEY (`profil`)
    REFERENCES `agora`.`profil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`discuter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`discuter` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `conversation` INT NOT NULL,
  `profil` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_discuter_conversation1_idx` (`conversation` ASC),
  INDEX `fk_discuter_profil1_idx` (`profil` ASC),
  CONSTRAINT `fk_discuter_conversation1`
    FOREIGN KEY (`conversation`)
    REFERENCES `agora`.`conversation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_discuter_profil1`
    FOREIGN KEY (`profil`)
    REFERENCES `agora`.`profil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agora`.`signaler`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agora`.`signaler` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dateSi` DATETIME NULL,
  `type` ENUM('sujet', 'reponse', 'commentaire') NULL,
  `profil` INT NOT NULL,
  `id_contenu` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_signaler_profil1_idx` (`profil` ASC),
  CONSTRAINT `fk_signaler_profil1`
    FOREIGN KEY (`profil`)
    REFERENCES `agora`.`profil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;