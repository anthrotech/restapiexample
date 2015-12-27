CREATE DATABASE IF NOT EXISTS wiw;

USE wiw;

CREATE TABLE IF NOT EXISTS wiw.users
(id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255),
role VARCHAR(255),
email VARCHAR(255),
password BINARY(16),
phone VARCHAR(255),
created_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
updated_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (id)) 
ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS wiw.shift
(id INT NOT NULL AUTO_INCREMENT,
manager_id INT,
employee_id INT,
break FLOAT,
start_time TIMESTAMP,
end_time TIMESTAMP,
created_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
updated_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (id),
CONSTRAINT fk_ManagerID  FOREIGN KEY (manager_id) REFERENCES users(id),
CONSTRAINT fk_EmployeeID FOREIGN KEY (employee_id) REFERENCES users(id)) 
ENGINE=InnoDB;

INSERT INTO users (name,role,email,password,phone,created_at,updated_at) VALUES ('Jane Smith','manager','janesmith@wiw.com',MD5('test123'),'612-455-5566',NOW(),NOW());
INSERT INTO users (name,role,email,password,phone,created_at,updated_at) VALUES ('John Doe','employee','johndoe@wiw.com',MD5('test123'),'612-455-5566',NOW(),NOW());