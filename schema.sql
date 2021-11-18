CREATE DATABASE mymovie;
USE mymovie;

CREATE TABLE members(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(40) NOT NULL,
	firstname VARCHAR(40) NOT NULL,
	email VARCHAR(40) NOT NULL,
    street VARCHAR(40) NOT NULL,
    number VARCHAR(10) NOT NULL,
    plz INT(5) NOT NULL,
    village VARCHAR(40) NOT NULL  
);

INSERT INTO members (name, firstname, email, street, number, plz, village) VALUES ('Gut', 'Manuel', 'manuel.gut@stud.hslu.ch', 'Moosmattstrasse', '56', 6005, 'Luzern' );
