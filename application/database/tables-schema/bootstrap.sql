-- Set fields as unsigned

CREATE DATABASE lawrenceorion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON lawrenceorion.* TO 'user'@'localhost';

USE lawrenceorion;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
	id tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
	email varchar(128) NOT NULL,
	password varchar(128) NOT NULL,

	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
	id smallint UNSIGNED NOT NULL AUTO_INCREMENT,
	name varchar(128) NOT NULL,

	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS products;
CREATE TABLE products (
	id int UNSIGNED NOT NULL AUTO_INCREMENT,
	name varchar(128) NOT NULL,
	category_Id smallint UNSIGNED NOT NULL,
	image_path varchar(256),
	old_price int,
	price int Not NULL,
	jumia_product_url text,
	short_description varchar(256),
	custom_fields text,
	-- featured_products tinyint DEFAULT 0,

	PRIMARY KEY (id),
	FOREIGN KEY (category_Id) REFERENCES categories(id)
);

/* DROP TABLE IF EXISTS featured_products;
CREATE TABLE featured_products (
	product_id int NOT NULL,

	UNIQUE KEY(product_id),
	FOREIGN KEY(product_id) REFERENCES products(id)
); */
