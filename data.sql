DROP TABLE IF EXISTS ci_sessions;
CREATE TABLE `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);

DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
    user VARCHAR(16),
    pass VARCHAR(32),

    PRIMARY KEY(user)
);

INSERT INTO admins(user, pass) value('admin', '662609908ab8e0f372d83dea3511370b');

DROP TABLE IF EXISTS articles;
CREATE TABLE `articles` (
    `id` int NOT NULL AUTO_INCREMENT,
    `publish_date` datetime,
    `title` varchar(256),
    `url` varchar(128) unique,
    `keywords` varchar(256),
    `description` varchar(256),
    `text` longtext,
    `image_url` varchar(256), 
    `is_published` int DEFAULT 0,
    `category_id` int,
    
    PRIMARY KEY(id),
    FOREIGN KEY(category_id) REFERENCES categories(category_id)
);

DROP TABLE IF EXISTS categories;
CREATE TABLE `categories` (
	`category_id` int NOT NULL AUTO_INCREMENT,
	`category_name` varchar(128),

	PRIMARY KEY(category_id)
	);