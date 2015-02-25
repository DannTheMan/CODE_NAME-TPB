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

DROP TABLE IF EXISTS peers;
CREATE TABLE `peers` (
    `id` INT(20) PRIMARY KEY AUTO_INCREMENT NOT NULL,    
    `info_hash` BINARY(20) NOT NULL, 
    `ip` INT(11) NOT NULL, `port` INT(5) NOT NULL, 
    `peer_id` BINARY(20) NOT NULL, 
    `uploaded` INT(20) NOT NULL DEFAULT 0, 
    `downloaded` INT(20) NOT NULL DEFAULT 0, 
    `remaining` INT(20) NOT NULL DEFAULT 0, 
    `update_time` INT NOT NULL, 
    `expire_time` INT NOT NULL,
    UNIQUE KEY info_hash (info_hash)
);

CREATE TABLE torrents
(
	id int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	file mediumblob NOT NULL,
	info_hash BINARY(20) NOT NULL,
	description text NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (info_hash) REFERENCES peers(info_hash)
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