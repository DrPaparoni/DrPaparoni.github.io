/********************************************************************/
/*  Date	Name	Description                                 */
/*  --------------------------------------------------------------- */
/*                                                                  */
/*  1/17/2020  Eric Walter   Initial deployment of Project1 script.    */
/********************************************************************/

DROP DATABASE IF EXISTS photography;
CREATE DATABASE photography;
USE photography;

CREATE TABLE IF NOT EXISTS employee
(
	employeeID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS visitor
(
	visitorID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	visitorPhone INT NOT NULL,
	visitorName VARCHAR(255) NOT NULL,
	visitorEmail VARCHAR(255) NOT NULL,
	visitorNum TINYINT NOT NULL,
	visitorHours TINYINT NOT NULL,
	employeeID INT NOT NULL REFERENCES employee(employeeID)
);

INSERT INTO employee
	(firstName, lastName)
VALUES
	('John','Goodman'), ('John','Candy'), ('Mike','Row'), ('Lane','Chadwick'), ('Fox','McCloud'),
	('James','Hetfield'), ('Gordon','Ramsey'), ('Bob','Sagat'), ('Jean','Claude'), ('Bob','Marley'),
	('Son','Goku'), ('Kal','El'), ('Luigi','Mario'), ('Sandy','Cheeks'), ('Timmy','Turner'),
	('Bruce','Wayne'), ('Clark','Kent'), ('Steve','Rodgers'), ('Sonic','Hedgehog'), ('Mario','Mario');
	
INSERT INTO visitor
	(visitorName, visitorPhone, visitorEmail, visitorNum, visitorHours, employeeID)
VALUES
	('John Stamos','2085554432','stamos1@gmail.com','1','4','1'),
	('Bat Man','4735559731','batman@gmail.com','2','5','2'),
	('Mega Man','7075556423','megaman@gmail.com','3','4','3'),
	('Buster Bunny','5055556644','buster@me.com','3','10','4'),
	('Bugs Bunny','4045557790','bugs@me.com','2','5','5'),
	('Johnny Bosh','7965556612','JYB@me.com','1','1','6'),
	('Sam Bridges','5055556423','Bridges@me.com','2','4','7'),
	('John Plisqin','6065551325','Snake@me.com','1','5','8'),
	('Elsa','2025554382','elsa@me.com','2','8','9'),
	('Ash Ketchum','5055556425','Ash@me.com','1','7','10'),
	('John Madden','4625557852','Madden@me.com','2','10','11'),
	('Steve Rodgers','3585554239','Rodges1@me.com','1','2','12'),
	('Bob Jones','4655557828','jones@me.com','2','4','13'),
	('Bob Eiger','6545554235','eiger@me.com','1','1','14'),
	('Eric Walter','2084736542','ericwalter@my.cwi.edu','1','2','15'),
	('Steven Colbert','4525557821','colbert@me.com','2','5','16'),
	('Don Juan','6545557513','juan@me.com','3','6','17'),
	('John Grossman','5215556428','grossman@me.com','1','8','18'),
	('Barack Obama','1015551023','obama@me.com','2','6','19'),
	('Bernie Sanders','9095556412','Sanders@me.com','2','2','20');
	
	