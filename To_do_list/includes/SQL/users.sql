CREATE TABLE users(
id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
user_names VARCHAR(50) NOT NULL,
email VARCHAR (50) NOT NULL UNIQUE,
pwd VARCHAR (50) NOT NULL
);