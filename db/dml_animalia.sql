-- Add proof users
INSERT INTO users VALUES(238923984, 'Andrew', 'Exaus'),
                        (273988239, 'Chris', 'Andromiu');

-- Add proof vets
INSERT INTO vets VALUES(246691378, 'Pepito', 'Example'),
					   (234356781, 'Daniela', 'Cossin');

-- Add proofs species
INSERT INTO species(Specie) VALUES('Canis'),
								  ('Felidae');
        
-- Add proofs races
INSERT INTO races(Race, Specie_ID_FK) VALUES('Kai Ken', 1),
											('Australian Mist', 2),
											('Husky', 1),
											('Bengali', 2);

-- Add proof pets
INSERT INTO pets(Name, Genre, Age, Race_ID_FK) VALUES('Tony', 'Male', 2, 1),
													 ('Martha', 'Female', 1, 4),
													 ('Masha', 'Female', 4, 1),
													 ('Princess', 'Female', 2, 3);

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
                

-- Add proof credentials
INSERT INTO sessions(Email, Password, User_RUT_FK, Vet_RUT_FK) VALUES('pepitoexample@example.com', '1234', null, 246691378),
																     ('danielcossin@example.com', '1234', null, 234356781),
																     ('andrewexaus@example.com', '1234', 238923984, null),
																     ('chrisandromiu@example.com', '1234', 273988239, null);
