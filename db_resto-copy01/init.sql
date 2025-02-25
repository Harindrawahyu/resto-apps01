-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS db_resto01;
USE db_resto01;

-- Buat tabel menu
CREATE TABLE IF NOT EXISTS menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

-- Buat tabel orders
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    item_id INT,
    quantity INT,
    total_price DECIMAL(10,2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES menu(id)
);

-- Tambahkan data contoh ke tabel menu (opsional)
INSERT INTO menu (name, price) VALUES
('Burger', 5.99),
('Pizza', 8.99),
('French Fries', 3.99),
('Soda', 1.99);