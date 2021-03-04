CREATE DATABASE news_proyect;

USE news;

CREATE TABLE roles(
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    enabled BOOLEAN DEFAULT true,
    PRIMARY KEY(id)
);

CREATE TABLE categories(
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    enabled BOOLEAN DEFAULT true,
    PRIMARY KEY(id)
);

CREATE TABLE users(
    id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(250) NOT NULL,
    password VARCHAR(45) NOT NULL,
    first_name VARCHAR(40) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    enabled BOOLEAN DEFAULT true,
    id_role INT(11) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_role) REFERENCES roles(id)
);

CREATE TABLE news_sources(
    id INT(11) NOT NULL AUTO_INCREMENT,
    url VARCHAR(2000) NOT NULL,
    name VARCHAR(80) NOT NULL,
    enabled BOOLEAN DEFAULT true,
    id_category INT(11) NOT NULL,
    id_user INT(11) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_category) REFERENCES categories(id),
    FOREIGN KEY(id_user) REFERENCES users(id)
);

CREATE TABLE news(
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(40) NOT NULL,
    short_description VARCHAR(200) NOT NULL,
    permanlink VARCHAR(2000) NOT NULL,
    date TIMESTAMP NOT NULL,
    enabled BOOLEAN DEFAULT true,
    id_news_source INT(11) NOT NULL,
    id_user INT(11) NOT NULL,
    id_category INT(11) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_news_source) REFERENCES news_sources(id),
    FOREIGN KEY(id_user) REFERENCES users(id),
    FOREIGN KEY(id_category) REFERENCES categories(id)
);

