CREATE TABLE course
(
	name VARCHAR(255) NOT NULL,
	period VARCHAR(255) NOT NULL,
	code VARCHAR(255) NOT NULL,
	PRIMARY KEY(code,period)
);

CREATE TABLE lecture_hall
(
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY(name)
);

CREATE TABLE lecture
(
	finished BOOLEAN NOT NULL,
	time DATETIME NOT NULL,
	course_code VARCHAR(255) NOT NULL,
	course_period VARCHAR(255) NOT NULL,
	lecture_hall_name VARCHAR(255) NOT NULL,
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	FOREIGN KEY(course_code,course_period) REFERENCES course(code,period),
	FOREIGN KEY(lecture_hall_name) REFERENCES lecture_hall(name)
);

CREATE TABLE camera_unit
(
	name VARCHAR(255) NOT NULL,
	lecture_hall_name VARCHAR(255) NOT NULL,
	PRIMARY KEY(name),
	FOREIGN KEY(lecture_hall_name) REFERENCES lecture_hall(name)
);

CREATE TABLE lecture_note
(
	image VARCHAR(255) NOT NULL,
	time DATETIME NOT NULL,
	processed BOOLEAN NOT NULL,
	lecture_id INT  NOT NULL,
	camera_unit_name VARCHAR(255) NOT NULL,
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	FOREIGN KEY(camera_unit_name) REFERENCES camera_unit(name),
	FOREIGN KEY(lecture_id) REFERENCES lecture(id)
);
