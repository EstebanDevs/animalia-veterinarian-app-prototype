-- Add proof roles
INSERT INTO roles(name) VALUES("Admin"),
							  ("Vet"),
							  ("User");


-- Add proof credentials
INSERT INTO user_accounts(Email, Password, Rol_ID_FK) VALUES('pepitoexample@example.com', '1234', 2),
															('danielcossin@example.com', '1234', 2),
															('andrewexaus@example.com', '1234', 3),
															('chrisandromiu@example.com', '1234', 3);


-- Add proof users
INSERT INTO users(RUT, Name, Surname, User_account_ID_FK) VALUES(238923984, 'Andrew', 'Exaus', 3),
                        										(273988239, 'Chris', 'Andromiu', 4);

-- Add proof vets
INSERT INTO vets(RUT, Name, Surname, Vet_account_ID_FK) VALUES(246691378, 'Pepito', 'Example', 1),
					   										  (234356781, 'Daniela', 'Cossin', 2);

-- Add proofs species
INSERT INTO species(Specie) VALUES('Canis'),
								  ('Felidae');
        
-- Add proofs races
INSERT INTO breeds(Breed, Specie_ID_FK) VALUES('Kai Ken', 1),
											('Australian Mist', 2),
											('Husky', 1),
											('Bengali', 2);

-- Add proof pets
INSERT INTO pets(Name, Sex, Age, Breed_ID_FK) VALUES('Tony', 'Macho', 2, 1),
													 ('Martha', 'Hembra', 1, 4),
													 ('Masha', 'Hembra', 4, 1),
													 ('Princess', 'Hembra', 2, 3);

-- Add proof status
INSERT INTO status(Status) VALUES('On hold'),
								 ('In consult'),
								 ('Treated');


-- Add proofs attention records
INSERT INTO attention_records(Pet_ID_FK, Vet_RUT_FK, Status_ID_FK, Diagnosis, Treatment, Note, Visit_date) VALUES(1, 246691378, 1, 'Cancer', 'No treatment', 'Offer euthanasia and guide the owner to attend a support group', '2023-10-06'),
																												 (2, 234356781, 3, 'Diarrea Viral Bovina', 'Provide electrolytes orally or intravenously and implement a metaphylaxis program with antibiotics', null, '2022-09-18'),
																												 (3, 246691378, 2, 'Equinococosis', 'Perform surgery to remove the cyst and instillation of a scolicidal agent', null, '2023-12-30'),
																												 (4, 234356781, 1, 'canine hepatitis', 'Provide treatment for diarrhea, vomiting, liver failure, or blood clotting problems.', null, '2022-10-31');

-- Add proofs users pets
INSERT INTO users_pets(User_RUT_FK, Pet_ID_FK) VALUES(238923984, 1),
													 (273988239, 2),
													 (238923984, 3),
													 (273988239, 4);
                
SELECT tb.User_RUT_FK, ta.Pet_ID, ta.Name, ta.Sex, ta.Age, tc.Breed FROM pets AS ta INNER JOIN users_pets AS tb ON ta.Pet_ID = tb.Pet_ID_FK INNER JOIN breeds AS tc ON ta.Breed_ID_FK = tc.Breed_ID WHERE tb.User_RUT_FK = 238923984;
DESCRIBE pets;

SELECT ta.Email, ta.Password, tb.Name'Rol' FROM user_accounts AS ta INNER JOIN roles AS tb ON ta.Rol_ID_FK = tb.Rol_ID; 

SELECT * FROM users WHERE User_account_ID_FK = 3;

SELECT * FROM User_accounts;

DESCRIBE pets;

SELECT * FROM pets;

SELECT * FROM users_pets;