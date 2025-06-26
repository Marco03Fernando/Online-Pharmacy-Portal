
CREATE DATABASE pharma_db;

USE pharma_db;

CREATE TABLE regimens (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      m_name VARCHAR(50) NOT NULL,
      dosage VARCHAR(20) NOT NULL,
      frequency VARCHAR(20) NOT NULL,
      duration VARCHAR(20) NOT NULL,
      note CHAR(100) NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);