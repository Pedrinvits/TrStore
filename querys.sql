CREATE DATABASE Crud

CREATE TABLE sellers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seller_name VARCHAR(100) NOT NULL,
    seller_email VARCHAR(100) NOT NULL,
    updated_at DATE,
    created_at DATE
);

CREATE TABLE sales (
    sales_id INT AUTO_INCREMENT PRIMARY KEY,
    seller_id INT NOT NULL,
    sale_value DECIMAL(10, 2) NOT NULL,
    sale_commission DECIMAL(10, 2) NOT NULL,
	updated_at DATE,
    created_at DATE,
    FOREIGN KEY (seller_id) REFERENCES sellers(id)
);