CREATE DATABASE cntpb;
USE cntpb;

CREATE TABLE users 
(
	id int NOT NULL AUTO_INCREMENT,
	username varchar(255) NOT NULL,
	hash varchar(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY username (username)
);

CREATE TABLE torrents
(
	id int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	file mediumblob NOT NULL,
	description text NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE user_torents
(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	torrent_id int NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (torrent_id) REFERENCES torrents(id)
);

CREATE TABLE comments
(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	torrent_id int NOT NULL,
	comment text NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (torrent_id) REFERENCES torrents(id)
);

CREATE FUNCTION saltedHash(username VARCHAR(255), password VARCHAR(255))
RETURNS BINARY(20) DETERMINISTIC
RETURN UNHEX(SHA1(CONCAT(username, password)));