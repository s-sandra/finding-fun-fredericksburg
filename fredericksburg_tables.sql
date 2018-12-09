USE Team_350_Fall18_Gold

CREATE TABLE location (
    location_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    street_address VARCHAR(100) NOT NULL,
    zip_code VARCHAR(5) NOT NULL,
    description VARCHAR(250) NOT NULL
);

CREATE TABLE category (
    category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(15)
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

CREATE TABLE registered_user (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sec_question_id INT NOT NULL,
    sec_answer VARCHAR(50) NOT NULL,
    name VARCHAR(50),
    username VARCHAR(25) NOT NULL,
    password VARCHAR(128) NOT NULL,
    CONSTRAINT sec_q_fk
    FOREIGN KEY (sec_question_id)
    REFERENCES security_question (question_id)
);

CREATE TABLE review (
    review_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    user_id INT NOT NULL,
    date DATE NOT NULL,
    rating INT NOT NULL,
    review VARCHAR(300),
    CONSTRAINT review_loc_id_fk
    FOREIGN KEY (location_id)
    REFERENCES location (location_id),
    CONSTRAINT review_user_id_fk
    FOREIGN KEY (user_id)
    REFERENCES registered_user (user_id)
);

INSERT INTO category (name) VALUES ("food");
INSERT INTO category (name) VALUES ("entertainment");
INSERT INTO category (name) VALUES ("shopping");

INSERT INTO location (name, street_address, zip_code, description) VALUES ("Joey's Pizza Parlor", "102 Smith Lane", "22445", "A pizza parlor that serves pizza and italian subs.");
INSERT INTO location (name, street_address, zip_code, description) VALUES ("Bob's Grill", "48 Tyson Road", "22446", "A gourmet restaurant that serves burgers, steaks, fries and beer.");
INSERT INTO location (name, street_address, zip_code, description) VALUES ("The Lion", "1400 Merlyborne Blvd", "22445", "A family-friendly, dine-in movie theater. Serves soups and sandwiches.");
INSERT INTO location (name, street_address, zip_code, description) VALUES ("LazerZone", "413 Redstone Plaza", "22445", "An arcade, offering lazar tag. Serves pizza and burgers.");
INSERT INTO location (name, street_address, zip_code, description) VALUES ("Jane's Antiques", "102 Silverstone Street", "22445", "An antiques shop selling old jewelry, toys and furniture.");
INSERT INTO location (name, street_address, zip_code, description) VALUES ("Music Shack", "100 Magnolia Plaza", "22445", "A music store selling guitars, drums, piano and equipment.");

INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "Joey's Pizza Parlor"),
                                                                (SELECT category_id FROM category WHERE name = "food"));
INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "Bob's Grill"),
                                                                (SELECT category_id FROM category WHERE name = "food"));
INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "The Lion"),
                                                                (SELECT category_id FROM category WHERE name = "food"));
INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "The Lion"),
                                                                (SELECT category_id FROM category WHERE name = "entertainment"));
INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "LazerZone"),
                                                                (SELECT category_id FROM category WHERE name = "entertainment")); 
INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "LazerZone"),
                                                                (SELECT category_id FROM category WHERE name = "food"));
INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "Jane's Antiques"),
                                                                (SELECT category_id FROM category WHERE name = "shopping"));  
INSERT INTO location_category (location_id, category_id) VALUES ((SELECT location_id FROM location WHERE name = "Music Shack"),
                                                                (SELECT category_id FROM category WHERE name = "shopping"));                                                                

INSERT INTO security_question (question) VALUES ("What is your favorite song?");
INSERT INTO security_question (question) VALUES ("Where were you born?");


INSERT INTO registered_user (sec_question_id, sec_answer, name, username, password) VALUES (1, "Happy Birthday", "Lily James", "ljames", "c31v3rp455w0rd");
INSERT INTO registered_user (sec_question_id, sec_answer, name, username, password) VALUES (1, "Feliz Navidad", "Bob Smith", "bobby", "12345");
INSERT INTO registered_user (sec_question_id, sec_answer, name, username, password) VALUES (2, "Germany", "Joe Schmo", "cupojoe", "45678");

INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "Joey's Pizza Parlor"), 
                                                                        (SELECT user_id FROM registered_user WHERE username = "ljames"), 
                                                                        "18/2/2", 5,
                                                                        "I like that all their pizza crust is stuffed with cheese.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "Joey's Pizza Parlor"), 
                                                                        (SELECT user_id FROM registered_user WHERE username = "bobby"), 
                                                                        "18/1/19", 1,
                                                                        "The tomato sauce is awful. The location is also iffy.");
INSERT INTO review (location_id, user_id, date, rating) VALUES ((SELECT location_id FROM location WHERE name = "Joey's Pizza Parlor"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "cupojoe"), 
                                                                "18/1/17", 3);
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "Bob's Grill"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "ljames"), "18/12/2", 5,
                                                                "Delicious steaks for a great price! Highly recommend!");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "Bob's Grill"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "cupojoe"), "18/10/29", 5,
                                                                "I go here every year for my birthday. It's a family owned business and always has excellent service.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "The Lion"), 
                                                                        (SELECT user_id FROM registered_user WHERE username = "ljames"), 
                                                                        "18/11/2", 5,
                                                                        "A real jem! My kids love it!");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "The Lion"), 
                                                                        (SELECT user_id FROM registered_user WHERE username = "bobby"), 
                                                                        "18/10/9", 4,
                                                                        "The staff is very friendly and the movies are not overpriced.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "LazerZone"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "cupojoe"), 
                                                                "18/5/1", 3, "It's always very messy and the food is too salty.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "LazerZone"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "bobby"), "18/3/12", 3,
                                                                "Great lazar tag facilities, but the staff is very slow, especially when there's birthday parties. I recommend coming on Monday, when it's not too busy.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "Music Shack"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "cupojoe"), "18/9/28", 5,
                                                                "They have a very good selection of guitars and great discounts.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "Music Shack"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "bobby"), 
                                                                "17/3/12", 4, "Great place. Offers private music lessons for oboe and flute.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "Jane's Antiques"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "ljames"), "18/11/12", 5,
                                                                "It recently opened and the owner is wonderful! She tells the historical background of all her merchandise.");
INSERT INTO review (location_id, user_id, date, rating, review) VALUES ((SELECT location_id FROM location WHERE name = "LazerZone"), 
                                                                (SELECT user_id FROM registered_user WHERE username = "ljames"), "18/9/4", 2,
                                                                "The food is not very tasty and is too overpriced. Some of the games are broken.");
