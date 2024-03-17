-- Création de la base de données "carshopdb"
CREATE DATABASE IF NOT EXISTS carshopdb;
USE carshopdb;

-- Table pour les voitures
CREATE TABLE IF NOT EXISTS car (
    id_car INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    car_year INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    short_description TEXT,
    long_description TEXT,
    quantite INT NOT NULL
);

-- Table pour les clients
CREATE TABLE IF NOT EXISTS user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    mot_de_passe TEXT,
    date_naissance DATE,
    id_role INT NOT NULL
);

-- Table pour les adresses
CREATE TABLE IF NOT EXISTS adresse (
    id_adresse INT AUTO_INCREMENT PRIMARY KEY,
    rue VARCHAR(100) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    province VARCHAR(100) NOT NULL,
    defaut INT
);

-- Table pour les rôles
CREATE TABLE IF NOT EXISTS role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100) NOT NULL
);

-- Table pour les images
CREATE TABLE IF NOT EXISTS image (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_car INT,
    chemin_image TEXT,
    FOREIGN KEY (id_car) REFERENCES car(id_car) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table pour les commandes de voitures
CREATE TABLE IF NOT EXISTS car_commande (
    id_car INT,
    id_commande INT,
    quantite INT,
    FOREIGN KEY (id_car) REFERENCES car(id_car),
    FOREIGN KEY (id_commande) REFERENCES orders(id_order)
);

-- Table pour les commandes
CREATE TABLE IF NOT EXISTS commande (
    id_commande INT AUTO_INCREMENT PRIMARY KEY,
    quantite INT,
    prix VARCHAR(10),
    statut VARCHAR(50),
    date_creation DATE,
    id_user INT,
    mode_paiement VARCHAR(50)
);

-- Relations
ALTER TABLE `users` DROP FOREIGN KEY `fk_role_user`; 
ALTER TABLE `users` ADD CONSTRAINT `fk_role_user` 
FOREIGN KEY (`id_role`) REFERENCES `role`(`id_role`) 
ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE users
    ADD CONSTRAINT fk_role_user FOREIGN KEY (id_role) 
    REFERENCES role (id_role);

ALTER TABLE `commande` ADD CONSTRAINT `fk_id_user` 
FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`) 
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `car_commande` DROP FOREIGN KEY `fk_car_commande`; ALTER TABLE `car_commande` ADD CONSTRAINT `fk_car_commande` FOREIGN KEY (`id_car`) REFERENCES `car`(`id_car`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `car_commande` DROP FOREIGN KEY `fk_commande_car`; ALTER TABLE `car_commande` ADD CONSTRAINT `fk_commande_car` FOREIGN KEY (`id_commande`) REFERENCES `commande`(`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Insertion des rôles
INSERT INTO role(description) VALUES ('admin'), ('client');
