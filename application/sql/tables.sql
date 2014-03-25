CREATE TABLE courses
(
	name VARCHAR(255) NOT NULL,
	period VARCHAR(255) NOT NULL,
	code VARCHAR(255) NOT NULL,
	PRIMARY KEY(code,period)
);

CREATE TABLE lecture_halls
(
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY(name)
);

CREATE TABLE lectures
(
	finished BOOLEAN NOT NULL,
	startTime DATETIME NOT NULL,
	endTime DATETIME NOT NULL,
	course_code VARCHAR(255) NOT NULL,
	course_period VARCHAR(255) NOT NULL,
	lecture_hall_name VARCHAR(255) NOT NULL,
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	FOREIGN KEY(course_code,course_period) REFERENCES courses(code,period),
	FOREIGN KEY(lecture_hall_name) REFERENCES lecture_halls(name)
);

CREATE TABLE camera_units
(
	name VARCHAR(255) NOT NULL,
	lecture_hall_name VARCHAR(255) NOT NULL,
	ip_address VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY(name),
	FOREIGN KEY(lecture_hall_name) REFERENCES lecture_halls(name)
);

CREATE TABLE lecture_notes
(
	image VARCHAR(255) NOT NULL,
	time DATETIME NOT NULL,
	processed BOOLEAN NOT NULL,
	lecture_id INT  NOT NULL,
	camera_unit_name VARCHAR(255) NOT NULL,
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	FOREIGN KEY(camera_unit_name) REFERENCES camera_units(name),
	FOREIGN KEY(lecture_id) REFERENCES lectures(id)
);


CREATE TABLE camera_units_insertion
(
	name VARCHAR(255) NOT NULL,
	lecture_hall_name VARCHAR(255) NOT NULL,
	ip_address VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,

);
