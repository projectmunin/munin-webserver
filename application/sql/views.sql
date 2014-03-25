CREATE VIEW lecture_note_insertion
	AS SELECT 
		lecture_notes.image AS image,
		lecture_notes.time AS time,
		lecture_notes.camera_unit_name AS camera_unit_name,
		lectures.finished AS lecture_finished,
		lectures.time AS lecture_time,
		courses.name AS course_name,
		courses.period AS course_period,
		courses.code AS course_code
		FROM lecture_notes
			LEFT OUTER JOIN lectures ON lecture_notes.lecture_id = lectures.id
			LEFT OUTER JOIN courses ON lectures.course_code = courses.code AND lectures.course_period = courses.period
;

CREATE VIEW camera_unit_insertion
	AS SELECT
		camera_units.name AS name,
		camera_units.ip_address AS ip_address,
		camera_units.password AS password,
		lecture_halls.name AS lecture_hall_name
		FROM camera_units
			LEFT OUTER JOIN lecture_halls ON camera_units.lecture_hall_name = lecture_halls.name
;

CREATE VIEW camera_unit_insertion AS SELECT 1 as dummy;