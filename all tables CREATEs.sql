CREATE DATABASE pitomchiki;

USE pitomchiki;

DROP TABLE pet;

CREATE TABLE pet
(
	nickname VARCHAR(40) PRIMARY KEY REFERENCES user (login),
    name VARCHAR(50) NOT NULL DEFAULT 'Безымянный',
    kind VARCHAR(30) NOT NULL DEFAULT 'Неизвестный',
	year_of_birth INT,
	month_of_birth INT ,
	day_of_birth INT,
	main_picture BLOB, # FK to other_pictures idk how to implement it
    # hard code smallest here for default
	length_id INT NOT NULL DEFAULT 1, # '<10см', '11-30см', '31-50см', '51-99см', '1-3м', '4-5м', '6-10м', '11-20м', '21м+'
	weight_id INT NOT NULL DEFAULT 1, #'<100г', '101-500г', '501-999г', '1-3кг', '4-5кг', '6-10кг', '11-20кг', '21-40кг', '41-70кг', '71-100кг', '101-200кг', '201-500кг', '500кг+'
    CONSTRAINT fk_length FOREIGN KEY (length_id) REFERENCES length (id),
    CONSTRAINT fk_weight FOREIGN KEY (weight_id) REFERENCES weight (id)
);

CREATE TABLE length (
	id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(7)
);

INSERT INTO length (category) VALUES
('<10см'),
('11-30см'),
('31-50см'),
('51-99см'),
('1-3м'),
('4-5м'),
('6-10м'),
('11-20м'),
('21м+');

#DROP TABLE weight;
CREATE TABLE weight(
	id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(9));
    
INSERT INTO weight (category) VALUES
('<101г'),
('101-500г'),
('501-999г'),
('1-3кг'),
('4-5кг'),
('6-10кг'),
('11-20кг'),
('21-40кг'),
('41-70кг'),
('71-100кг'),
('101-200кг'),
('201-500кг'),
('501кг+');

CREATE TABLE behavior_patterns (
	pet_nickname VARCHAR(50) NOT NULL REFERENCES pet (nickname),
	behavior_pattern VARCHAR(70) NOT NULL,
    CONSTRAINT pk_bp PRIMARY KEY (pet_nickname, behavior_pattern)
);

CREATE TABLE other_pictures (
	pet_nickname VARCHAR(50) NOT NULL REFERENCES pet (nickname),
	picture BLOB NOT NULL,
    uploading_date DATETIME NOT NULL # TODO AUTO-GENERATED 
);

CREATE TABLE special_appearance_features (
	pet_nickname INT NOT NULL REFERENCES pet (nickname),
	special_appearance_feature VARCHAR(30) NOT NULL,
    CONSTRAINT pk_saf PRIMARY KEY (pet_nickname, special_appearance_feature)
);

CREATE TABLE review (
	pet_nickname INT NOT NULL REFERENCES pet (nickname),
    id INT PRIMARY KEY,
    creation_date DATETIME NOT NULL, # TODO AUTO-GENERATED 
    author_name VARCHAR(30) NOT NULL,
    content TEXT NOT NULL,
    verified BOOL
);

CREATE TABLE user (
	login VARCHAR(30) PRIMARY KEY,
    password CHAR(60) NOT NULL
);

CREATE TABLE status (
	id INT NOT NULL PRIMARY KEY,
    category VARCHAR(20)
);

INSERT INTO status VALUES
(1, 'Живой'),
(2, 'Покойный'),
(3, 'Пропал без вести');