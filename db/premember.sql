DROP TABLE IF EXISTS premember;

CREATE TABLE premember (
	id MEDIUMINT UNSIGNeED NOT NULL AUTO_INCREMENT,
	username VARCHAR(50),
	password VARCHAR(128),
	last_name VARCHAR(50),
	first_name VARCHAR(50),
	birth_day CHAR(8),
	prefecture SMALLINT,
	reg_date DATETIME,
	cancel DATETIME,
	PRIMARY KEY (id)
);