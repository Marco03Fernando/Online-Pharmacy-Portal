
CREATE DATABASE supplier_db;

USE supplier_db;

CREATE TABLE applications (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      b_name VARCHAR(50) NOT NULL,
      f_name VARCHAR(20) NOT NULL,
      l_name VARCHAR(20) NOT NULL,
      email VARCHAR(50) NOT NULL UNIQUE,
      phone INT(10) NOT NULL UNIQUE,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

/* MAin crud */
CREATE DATABASE placed_orders_db;

USE placed_orders_db;

      CREATE TABLE orders (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(20) NOT NULL,
      quantity INT(10) NOT NULL,
      status CHAR(10) NOT NULL,
      date VARCHAR(15) NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);