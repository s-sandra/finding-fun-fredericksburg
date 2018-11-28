CREATE TABLE location (
    location_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    street_address VARCHAR(100) NOT NULL,
    zip_code VARCHAR(5) NOT NULL
);

CREATE TABLE category (
    category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(10)
);

CREATE TABLE location_category (
    location_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (location_id, category_id),
    CONSTRAINT location_id_fk
    FOREIGN KEY (location_id)
    REFERENCES location (location_id),
    CONSTRAINT category_id_fk
    FOREIGN KEY (category_id)
    REFERENCES category (category_id)
);

CREATE TABLE security_question (
    question_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(30)
);

CREATE TABLE user (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sec_question_id INT NOT NULL,
    sec_answer VARCHAR(50) NOT NULL,
    name VARCHAR(50),
    username VARCHAR(25) NOT NULL
    password VARCHAR(128) NOT NULL,
    CONSTRAINT sec_q_fk
    FOREIGN KEY sec_question_id
    REFERENCES security_question (question_id)
);

CREATE TABLE review (
    
);