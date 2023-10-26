DROP DATABASE IF EXISTS Animalia ;
CREATE DATABASE Animalia;
USE Animalia;

CREATE TABLE species(
    Specie_ID int(10) auto_increment not null,
    Specie varchar(50) not null,
    primary key(Specie_ID)
);

CREATE TABLE races(
    Race_ID int(10) auto_increment not null,
    Race varchar(50) not null,
    Specie_ID_FK int(10) not null,
    primary key(Race_ID),
    constraint races_species_FK 
    foreign key(Specie_ID_FK) references species(Specie_ID)
);

CREATE TABLE phones(
    Phone_ID int(10) auto_increment not null,
    Phone int(9) not null,
    primary key(Phone_ID)
);

CREATE TABLE addresses(
    Address_ID int(10) auto_increment not null,
    Address int(10) not null,
    primary key(Address_ID)
);

CREATE TABLE status(
    Status_ID int(10) auto_increment not null,
    Status varchar(50) not null,
    primary key(Status_ID)
);

CREATE TABLE vets(
    RUT int(9) not null,
    Name varchar(30) not null,
    Surname varchar(30) not null,
    primary key(RUT)
);


CREATE TABLE pets(
    Pet_ID int(10) auto_increment not null,
    Name varchar(30) not null,
    Genre varchar(30) not null,
    Age int(3) not null,
    Race_ID_FK int(10) not null,
    primary key(Pet_ID),
    constraint pet_race_fk 
    foreign key(Race_ID_FK) references races(Race_ID)
);

CREATE TABLE users(
    RUT int(9) not null,
    Name varchar(30) not null,
    Surname varchar(30),
    primary key(RUT)
);

CREATE TABLE users_pets(
    Users_pets_ID int(10) auto_increment not null,
    User_RUT_FK int(9) not null,
    Pet_ID_FK int(10) not null,
    Creation_date datetime not null default current_timestamp,
    primary key(Users_pets_ID),
    constraint user_RUT_pets_FK 
    foreign key(User_RUT_FK) references users(RUT),
    constraint pet_ID_user_FK
    foreign key(Pet_ID_FK) references pets(Pet_ID)
);

CREATE TABLE users_addresses(
    User_address_ID int(10) auto_increment not null,
    User_RUT_FK int(9) not null,
    Address_ID_FK int(10) not null,
    primary key(User_address_ID),
    constraint users_address_FK
    foreign key(User_RUT_FK) references users(RUT),
    constraint address_user_FK  
    foreign key(Address_ID_FK) references addresses(Address_ID)
);

CREATE TABLE users_phones(
    User_phones_ID int(10) auto_increment not null,
    User_RUT_FK int(9) not null,
    Phone_ID_FK int(9) not null,
    primary key(User_phones_ID),
    constraint users_phones_FK
    foreign key(User_RUT_FK) references users(RUT),
    constraint phone_user_FK  
    foreign key(Phone_ID_FK) references phones(Phone_ID)
);

CREATE TABLE vets_phones(
    Vet_phones_ID int(10) auto_increment not null,
    Vet_RUT_FK int(9) not null,
    Phone_ID_FK int(9) not null,
    primary key(Vet_phones_ID),
    constraint vets_phones_FK
    foreign key(Vet_RUT_FK) references vets(RUT),
    constraint phone_vets_FK  
    foreign key(Phone_ID_FK) references phones(Phone_ID)
);

CREATE TABLE vets_addresses(
    Vet_address_ID int(10) auto_increment not null,
    Vet_RUT_FK int(9) not null,
    Address_ID_FK int(10) not null,
    primary key(Vet_address_ID),
    constraint vets_address_FK
    foreign key(Vet_RUT_FK) references vets(RUT),
    constraint address_vet_FK  
    foreign key(Address_ID_FK) references addresses(Address_ID)
);

CREATE TABLE attention_records(
    Attention_record_ID int(10) auto_increment not null,
    Pet_ID_FK int(10) not null,
    Vet_RUT_FK int(9) not null,
    Status_ID_FK int(10) not null,
    Diagnosis varchar(255) not null,
    Treatment varchar(255),
    Note text,
    Visit_date date not null,
    Creation_date datetime not null default current_timestamp,
    primary key(Attention_record_ID),
    constraint pet_attention_records_FK 
    foreign key(Pet_ID_FK) references pets(Pet_ID),
    constraint vets_attention_records_FK
    foreign key(Vet_RUT_FK) references vets(RUT),
    constraint status_attention_records_FK
    foreign key(Status_ID_FK) references status(Status_ID)
);

CREATE TABLE sessions(
    Session_ID int(10) auto_increment not null,
    Email varchar(255) not null,
    Password varchar(80) not null,
    User_RUT_FK int(9),
    Vet_RUT_FK int(10),
    primary key(Session_ID),
    constraint user_session_FK
    foreign key(User_RUT_FK) references users(RUT), 
    constraint vet_session_FK
    foreign key(Vet_RUT_FK) references vets(RUT)
);

