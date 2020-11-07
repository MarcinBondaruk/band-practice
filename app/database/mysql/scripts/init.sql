CREATE DATABASE IF NOT EXISTS bandpractice;

USE bandpractice;

CREATE TABLE IF NOT EXISTS users
(
    id                 INT(11)          NOT NULL AUTO_INCREMENT,
    email              VARCHAR(254)     NOT NULL,
    password_hash      VARCHAR(60)      NOT NULL,
    firstname          VARCHAR(31)      NULL DEFAULT NULL,
    lastname           VARCHAR(31)      NULL DEFAULT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB CHARACTER SET=utf8mb4;
