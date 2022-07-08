-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema control_escolar_g2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema control_escolar_g2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `control_escolar_g2` DEFAULT CHARACTER SET utf8 ;
USE `control_escolar_g2` ;

-- -----------------------------------------------------
-- Table `control_escolar_g2`.`escuela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`escuela` (
  `idescuela` INT NOT NULL AUTO_INCREMENT,
  `cct` VARCHAR(10) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(100) NULL,
  `telefono` VARCHAR(13) NULL,
  `correo` VARCHAR(45) NULL,
  PRIMARY KEY (`idescuela`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`personas` (
  `idpersonas` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `paterno` VARCHAR(45) NULL,
  `materno` VARCHAR(45) NULL,
  `genero` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NOT NULL,
  `curp` VARCHAR(45) NOT NULL,
  `rfc` VARCHAR(45) NULL,
  `escuela_idescuela` INT NOT NULL,
  PRIMARY KEY (`idpersonas`),
  INDEX `fk_personas_escuela1_idx` (`escuela_idescuela` ASC),
  CONSTRAINT `fk_personas_escuela1`
    FOREIGN KEY (`escuela_idescuela`)
    REFERENCES `control_escolar_g2`.`escuela` (`idescuela`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`carrera` (
  `idcarrera` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(12) NULL,
  `area` VARCHAR(45) NULL,
  `creditos` TINYINT(255) NULL,
  PRIMARY KEY (`idcarrera`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`maestros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`maestros` (
  `idmaestros` INT NOT NULL AUTO_INCREMENT,
  `cedula` VARCHAR(45) NULL,
  `grado_academico` VARCHAR(45) NULL,
  `personas_idpersonas` INT NOT NULL,
  PRIMARY KEY (`idmaestros`),
  INDEX `fk_maestros_personas1_idx` (`personas_idpersonas` ASC),
  CONSTRAINT `fk_maestros_personas1`
    FOREIGN KEY (`personas_idpersonas`)
    REFERENCES `control_escolar_g2`.`personas` (`idpersonas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`alumos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`alumos` (
  `idalumos` INT NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(45) NOT NULL,
  `personas_idpersonas` INT NOT NULL,
  PRIMARY KEY (`idalumos`),
  INDEX `fk_alumos_personas_idx` (`personas_idpersonas` ASC),
  CONSTRAINT `fk_alumos_personas`
    FOREIGN KEY (`personas_idpersonas`)
    REFERENCES `control_escolar_g2`.`personas` (`idpersonas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`grupo` (
  `idgrupo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `capacidad` INT NOT NULL,
  `turno` VARCHAR(1) NOT NULL,
  `carrera_idcarrera` INT NOT NULL,
  PRIMARY KEY (`idgrupo`, `carrera_idcarrera`),
  INDEX `fk_grupo_carrera1_idx` (`carrera_idcarrera` ASC),
  CONSTRAINT `fk_grupo_carrera1`
    FOREIGN KEY (`carrera_idcarrera`)
    REFERENCES `control_escolar_g2`.`carrera` (`idcarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`semestre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`semestre` (
  `idsemestre` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `periodo_escolar` VARCHAR(45) NOT NULL,
  `grupo_idgrupo` INT NOT NULL,
  `grupo_carrera_idcarrera` INT NOT NULL,
  PRIMARY KEY (`idsemestre`),
  INDEX `fk_semestre_grupo1_idx` (`grupo_idgrupo` ASC, `grupo_carrera_idcarrera` ASC),
  CONSTRAINT `fk_semestre_grupo1`
    FOREIGN KEY (`grupo_idgrupo` , `grupo_carrera_idcarrera`)
    REFERENCES `control_escolar_g2`.`grupo` (`idgrupo` , `carrera_idcarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`materias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`materias` (
  `idmaterias` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `creditos` TINYINT(255) NOT NULL,
  PRIMARY KEY (`idmaterias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`permisos` (
  `idpermisos` INT NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idpermisos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`empleados` (
  `idempleados` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(512) NOT NULL,
  `personas_idpersonas` INT NOT NULL,
  `permisos_idpermisos` INT NOT NULL,
  PRIMARY KEY (`idempleados`),
  INDEX `fk_empleados_personas1_idx` (`personas_idpersonas` ASC),
  INDEX `fk_empleados_permisos1_idx` (`permisos_idpermisos` ASC),
  CONSTRAINT `fk_empleados_personas1`
    FOREIGN KEY (`personas_idpersonas`)
    REFERENCES `control_escolar_g2`.`personas` (`idpersonas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleados_permisos1`
    FOREIGN KEY (`permisos_idpermisos`)
    REFERENCES `control_escolar_g2`.`permisos` (`idpermisos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`maestros_materias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`maestros_materias` (
  `maestros_idmaestros` INT NOT NULL,
  `materias_idmaterias` INT NOT NULL,
  PRIMARY KEY (`maestros_idmaestros`, `materias_idmaterias`),
  INDEX `fk_maestros_has_materias_materias1_idx` (`materias_idmaterias` ASC),
  INDEX `fk_maestros_has_materias_maestros1_idx` (`maestros_idmaestros` ASC),
  CONSTRAINT `fk_maestros_has_materias_maestros1`
    FOREIGN KEY (`maestros_idmaestros`)
    REFERENCES `control_escolar_g2`.`maestros` (`idmaestros`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_maestros_has_materias_materias1`
    FOREIGN KEY (`materias_idmaterias`)
    REFERENCES `control_escolar_g2`.`materias` (`idmaterias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`alumos_materias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`alumos_materias` (
  `alumos_idalumos` INT NOT NULL,
  `materias_idmaterias` INT NOT NULL,
  PRIMARY KEY (`alumos_idalumos`, `materias_idmaterias`),
  INDEX `fk_alumos_has_materias_materias1_idx` (`materias_idmaterias` ASC),
  INDEX `fk_alumos_has_materias_alumos1_idx` (`alumos_idalumos` ASC),
  CONSTRAINT `fk_alumos_has_materias_alumos1`
    FOREIGN KEY (`alumos_idalumos`)
    REFERENCES `control_escolar_g2`.`alumos` (`idalumos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumos_has_materias_materias1`
    FOREIGN KEY (`materias_idmaterias`)
    REFERENCES `control_escolar_g2`.`materias` (`idmaterias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_escolar_g2`.`materias_semestre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_escolar_g2`.`materias_semestre` (
  `materias_idmaterias` INT NOT NULL,
  `semestre_idsemestre` INT NOT NULL,
  PRIMARY KEY (`materias_idmaterias`, `semestre_idsemestre`),
  INDEX `fk_materias_has_semestre_semestre1_idx` (`semestre_idsemestre` ASC),
  INDEX `fk_materias_has_semestre_materias1_idx` (`materias_idmaterias` ASC),
  CONSTRAINT `fk_materias_has_semestre_materias1`
    FOREIGN KEY (`materias_idmaterias`)
    REFERENCES `control_escolar_g2`.`materias` (`idmaterias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materias_has_semestre_semestre1`
    FOREIGN KEY (`semestre_idsemestre`)
    REFERENCES `control_escolar_g2`.`semestre` (`idsemestre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
