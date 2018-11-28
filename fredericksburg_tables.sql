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