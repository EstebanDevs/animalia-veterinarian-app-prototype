DELIMITER ..
CREATE PROCEDURE SP_Insert_Pet(IN User_RUT INT, IN name varchar(50), sex varchar(50), IN age INT)
BEGIN
DECLARE new_id INT;
SELECT MAX(pet_id) + 1 INTO new_id FROM pets;
INSERT INTO pets VALUES (new_id, name, sex, age, 1);
INSERT INTO users_pets(User_RUT_FK, Pet_ID_FK) VALUES (User_RUT, new_id);
END ..
DELIMITER ;