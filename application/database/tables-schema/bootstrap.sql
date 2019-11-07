-- Set fields as unsigned

CREATE DATABASE website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON website.* TO 'user'@'localhost';

USE website;

DROP TABLE IF EXISTS admin
CREATE TABLE users (
	id tinyint NOT NULL AUTO_INCREMENT,
	email varchar(128) NOT NULL,
	password varchar(128) NOT NULL,

	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS categories
CREATE TABLE categories (
	id smallint NOT NULL AUTO_INCREMENT,
	name varchar(128) NOT NULL,

	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS products
CREATE TABLE products (
	id int NOT NULL AUTO_INCREMENT,
	name varchar(128) NOT NULL,
	category_Id smallint NOT NULL,
	image_path varchar(256),
	old_price int,
	price int Not NULL,
	jumia_product_url text,
	short_description varchar(128),
	custom_fields text,

	PRIMARY KEY (id),
	FOREIGN KEY (category_Id) REFERENCES categories(id)
);
