CREATE DATABASE IF NOT EXISTS eventfinal;

-- Switch to the eventf database
USE eventfinal;

-- Drop the registration table if it exists
DROP TABLE IF EXISTS registrations;


CREATE TABLE registrations (
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    confirm_password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
     event_date DATE NOT NULL,
      timing TIME NOT NULL,
    event_type VARCHAR(255) NOT NULL,
    hall_type VARCHAR(255) NOT NULL,
    hall_capacity INT NOT NULL,
   
    contact_number VARCHAR(255) NOT NULL,
    PRIMARY KEY (email)
);



CREATE TABLE event (
    event_code INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    event_type VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    capacity_of_hall INT NOT NULL,
    hall_type VARCHAR(255) NOT NULL,
    event_timing TIME NOT NULL,
    number_of_suppliers INT NOT NULL,
    supplier_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (event_code)
);

CREATE TABLE order_table (
    order_number INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    event_code INT NOT NULL,
    PRIMARY KEY (order_number)
);


CREATE TABLE bill (
    bill_number INT NOT NULL AUTO_INCREMENT,
    order_number INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    amount INT NOT NULL,
    tax INT NOT NULL,
    final_amount INT NOT NULL,
    bill_date DATE NOT NULL,
    PRIMARY KEY (bill_number)
);



CREATE TABLE feedback (
    email VARCHAR(255) NOT NULL,
    feedback VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    PRIMARY KEY (email)
);