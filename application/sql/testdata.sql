INSERT INTO courses
VALUES
(
	'Databases',
	'VT14',
	'DIT620'
);

INSERT INTO courses
VALUES
(
	'Databases',
	'VT13',
	'DIT620'
);

INSERT INTO lecture_halls
VALUES
(
	'EF'
);

INSERT INTO lecture_halls
VALUES
(
	'HB1'
);

INSERT INTO lectures
VALUES
(
	'1',
	'2014-02-24 13:15:01',
	'2014-02-24 15:00:00',
	'DIT620',
	'VT14',
	'EF',
	NULL
);

INSERT INTO lectures
VALUES
(
	'1',
	'2013-02-24 13:15:01',
	'2013-02-24 15:00:00',
	'DIT620',
	'VT13',
	'HB1',
	NULL
);

INSERT INTO camera_units
VALUES
(
	'cam1',
	'EF',
	'192.168.0.1',
	'1234567890+0'
);

INSERT INTO camera_units
VALUES
(
	'cam2',
	'HB1',
	'192.168.0.2',
	'1234567890+1'
);

INSERT INTO lecture_notes
VALUES
(
	'DIT620/VT14/2014/02/24/1.jpg',
	'2014-02-24 13:15:02',
	'1',
	'1',
	'cam1',
	NULL
);

INSERT INTO lecture_notes
VALUES
(
	'DIT620/VT14/2014/02/24/2.jpg',
	'2014-02-24 13:15:05',
	'1',
	'1',
	'cam1',
	NULL
);

INSERT INTO lecture_notes
VALUES
(
	'DIT620/VT14/2014/02/24/2.jpg',
	'2013-02-24 13:15:05',
	'1',
	'2',
	'cam1',
	NULL
);
