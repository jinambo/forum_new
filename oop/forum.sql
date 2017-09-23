CREATE TABLE users (

	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	uid text not null,
	pwd text not null,
	em text not null
)

CREATE TABLE posts (

	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	title text not null,
	content text not null,
	op text not null,
	mid int(11) not null,
	date_posted TIMESTAMP not null
)

CREATE TABLE pms (

	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	content text not null,
	mid text not null,
	uid text not null
)
