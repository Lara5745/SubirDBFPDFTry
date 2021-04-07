
CREATE DATABASE IF NOT EXISTS fpdf CHARACTER SET utf8 COLLATE utf8_spanish_ci;


CREATE TABLE `documentos` ( `ID` INT NOT NULL AUTO_INCREMENT ,
                                  `titulo` VARCHAR(40) NOT NULL ,
                                  `contenido` TEXT NOT NULL ,
                                   PRIMARY KEY (`ID`)) ENGINE = MyISAM;
