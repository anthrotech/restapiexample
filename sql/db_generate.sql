CREATE DATABASE IF NOT EXISTS wiw;

USE wiw;

CREATE TABLE IF NOT EXISTS wiw.users
(id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255),
role VARCHAR(255),
email VARCHAR(255),
phone VARCHAR(255),
created_at DATETIME,
updated_at DATETIME,
PRIMARY KEY (id)) 
ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS wiw.shift
(id INT NOT NULL AUTO_INCREMENT,
manager_id INT,
employee_id INT,
break FLOAT,
start_time DATETIME,
end_time DATETIME,
created_at DATETIME,
updated_at DATETIME,
PRIMARY KEY (id),
CONSTRAINT fk_ManagerID  FOREIGN KEY (manager_id) REFERENCES users(id),
CONSTRAINT fk_EmployeeID FOREIGN KEY (employee_id) REFERENCES users(id)) 
ENGINE=InnoDB;