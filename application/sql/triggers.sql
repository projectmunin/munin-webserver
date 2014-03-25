DELIMITER $$
CREATE TRIGGER camera_unit_insertion_trigger
BEFORE INSERT ON camera_unit_insertion
FOR EACH ROW
BEGIN

INSERT INTO camera_units (name,lecture_hall_name,ip_address,password)
VALUES
(
	'cam2',
	'EF',
	'192.168.0.2',
	'1234567890+0'
)

END$$
DELIMITER;