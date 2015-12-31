CREATE DATABASE IF NOT EXISTS wiw;

USE wiw;

CREATE TABLE IF NOT EXISTS wiw.users
(id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255),
role VARCHAR(255),
email VARCHAR(255),
password VARCHAR(32),
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

CREATE TABLE IF NOT EXISTS wiw.api_keys (
id INT(11) NOT NULL AUTO_INCREMENT,
`key` VARCHAR(40) NOT NULL,
level INT(2) NOT NULL,
ignore_limits TINYINT(1) NOT NULL DEFAULT '0',
date_created INT(11) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO users (name,role,email,password,phone,created_at,updated_at) VALUES ('Jane Smith','manager','janesmith@wiw.com',MD5('test123'),'612-455-5566',NOW(),NOW());
INSERT INTO users (name,role,email,password,phone,created_at,updated_at) VALUES ('Derek Note','manager','dereknote@wiw.com',MD5('test123'),'612-455-5566',NOW(),NOW());
INSERT INTO users (name,role,email,password,phone,created_at,updated_at) VALUES ('John Doe','employee','johndoe@wiw.com',MD5('test123'),'612-455-5566',NOW(),NOW());
INSERT INTO users (name,role,email,password,phone,created_at,updated_at) VALUES ('Stan Rest','employee','stanrest@wiw.com',MD5('test123'),'612-455-5566',NOW(),NOW());
INSERT INTO users (name,role,email,password,phone,created_at,updated_at) VALUES ('Shirley Mo','employee','shirleymo@wiw.com',MD5('test123'),'612-455-5566',NOW(),NOW());

INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2015-12-27 05:00:00','2015-12-27 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2015-12-28 05:00:00','2015-12-28 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2015-12-29 05:00:00','2015-12-29 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2015-12-30 05:00:00','2015-12-30 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-01 05:00:00','2016-01-01 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-02 05:00:00','2016-01-02 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-03 05:00:00','2016-01-03 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-04 05:00:00','2016-01-04 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-05 05:00:00','2016-01-05 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-06 05:00:00','2016-01-06 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-07 05:00:00','2016-01-07 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-08 05:00:00','2016-01-08 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-09 05:00:00','2016-01-09 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-10 05:00:00','2016-01-10 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-11 05:00:00','2016-01-11 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-12 05:00:00','2016-01-12 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-13 05:00:00','2016-01-13 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-14 05:00:00','2016-01-14 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-15 05:00:00','2016-01-15 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-16 05:00:00','2016-01-16 12:00:00',NOW(),NOW());
INSERT INTO shift (manager_id,employee_id,start_time,end_time,created_at,updated_at) VALUES (1,3,'2016-01-17 05:00:00','2016-01-17 12:00:00',NOW(),NOW());