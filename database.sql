CREATE TABLE Client (

    client_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100)  NOT NULL,
    phone VARCHAR(20),
    registration_date DATE 
)


