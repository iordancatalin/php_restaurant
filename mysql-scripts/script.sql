-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'comanda'
-- 
-- ---

DROP TABLE IF EXISTS `comanda`;
		
CREATE TABLE `comanda` (
  `id_comanda` INTEGER NOT NULL AUTO_INCREMENT,
  `data_comanda` DATETIME NOT NULL,
  `user_accout` INTEGER NOT NULL,
  PRIMARY KEY (`id_comanda`)
);

-- ---
-- Table 'comanda_preparat'
-- 
-- ---

DROP TABLE IF EXISTS `comanda_preparat`;
		
CREATE TABLE `comanda_preparat` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `id_comanda` INTEGER NOT NULL,
  `id_preparat` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'user_accout'
-- 
-- ---

DROP TABLE IF EXISTS `user_accout`;
		
CREATE TABLE `user_accout` (
  `id_account` INTEGER NOT NULL AUTO_INCREMENT,
  `nume` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `parola` VARCHAR(1000) NOT NULL,
  `adresa` VARCHAR(1000) NOT NULL,
  PRIMARY KEY (`id_account`)
);

-- ---
-- Table 'preparat'
-- 
-- ---

DROP TABLE IF EXISTS `preparat`;
		
CREATE TABLE `preparat` (
  `id_preparat` INTEGER NOT NULL AUTO_INCREMENT,
  `denumire` VARCHAR(100) NOT NULL,
  `imagine_path` VARCHAR(300) NOT NULL,
  `pret` DECIMAL NOT NULL,
  `categorie` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_preparat`)
);

-- ---
-- Table 'rezervare'
-- 
-- ---

DROP TABLE IF EXISTS `rezervare`;
		
CREATE TABLE `rezervare` (
  `id_rezervare` INTEGER NOT NULL AUTO_INCREMENT,
  `data_inceput` DATETIME NOT NULL,
  `data_final` DATETIME NOT NULL,
  `user_accout` INTEGER NOT NULL,
  PRIMARY KEY (`id_rezervare`)
);

-- ---
-- Table 'auth_tokens'
-- 
-- ---

DROP TABLE IF EXISTS `auth_tokens`;
		
CREATE TABLE `auth_tokens` (
  `id_token` INTEGER NOT NULL AUTO_INCREMENT,
  `selector` VARCHAR(12) NOT NULL,
  `hashedValidator` VARCHAR(64) NOT NULL,
  `data_expirare` DATETIME NOT NULL,
  `user_accout` INTEGER NOT NULL,
  PRIMARY KEY (`id_token`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `comanda` ADD FOREIGN KEY (user_accout) REFERENCES `user_accout` (`id_account`);
ALTER TABLE `comanda_preparat` ADD FOREIGN KEY (id_comanda) REFERENCES `comanda` (`id_comanda`);
ALTER TABLE `comanda_preparat` ADD FOREIGN KEY (id_preparat) REFERENCES `preparat` (`id_preparat`);
ALTER TABLE `rezervare` ADD FOREIGN KEY (user_accout) REFERENCES `user_accout` (`id_account`);
ALTER TABLE `auth_tokens` ADD FOREIGN KEY (user_accout) REFERENCES `user_accout` (`id_account`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `comanda` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `comanda_preparat` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_accout` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `preparat` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `rezervare` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `auth_tokens` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `comanda` (`id_comanda`,`data_comanda`,`user_accout`) VALUES
-- ('','','');
-- INSERT INTO `comanda_preparat` (`id`,`id_comanda`,`id_preparat`) VALUES
-- ('','','');
-- INSERT INTO `user_accout` (`id_account`,`nume`,`email`,`parola`,`adresa`) VALUES
-- ('','','','','');
-- INSERT INTO `preparat` (`id_preparat`,`denumire`,`imagine_path`,`pret`,`categorie`) VALUES
-- ('','','','','');
-- INSERT INTO `rezervare` (`id_rezervare`,`data_inceput`,`data_final`,`user_accout`) VALUES
-- ('','','','');
-- INSERT INTO `auth_tokens` (`id_token`,`selector`,`hashedValidator`,`data_expirare`,`user_accout`) VALUES
-- ('','','','','');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Coca cola', 5.00, 'images/preparate/coca-cola.jpg', 'Bauturi');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Fanta', 4.95, 'images/preparate/fanta.jpg', 'Bauturi');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Sprite', 5.50, 'images/preparate/sprite.png', 'Bauturi');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Pepsi', 3.55, 'images/preparate/pepsi.jpg', 'Bauturi');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Jack Daniels.jpeg', 120.00, 'images/preparate/jack-daniels.jpeg', 'Bauturi');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Pate de ficat de pui, reteta frantuzeasa', 35.00, 'images/preparate/pate-de-ficat-de-pui-reteta-frantuzeasca.jpg', 'Aperitive');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Check aperitiv multicolor by Ana', 15.00, 'images/preparate/chec-aperitiv-multicolor-by-ana.jpg', 'Aperitive');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Dovlecei crocanti la cuptor', 15.99, 'images/preparate/dovlecei-crocanti-la-cuptor.jpg', 'Aperitive');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Oua umplute', 22.00, 'images/preparate/oua-umplute-un-aperitiv-delicios-cu-36-de-umpluturi.jpg', 'Aperitive');

insert into preparat(denumire, pret, imagine_path, categorie)
values('Shakshuka', 40.00, 'images/preparate/shakshuka.jpg', 'Aperitive');

