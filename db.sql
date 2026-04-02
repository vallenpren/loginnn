-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS login_system;
USE login_system;

-- Buat tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user', 'vip') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tambahkan data contoh (Password: [role]123)
-- Admin: admin@gmail.com / admin123
-- User: user@gmail.com / user123
-- VIP: vip@gmail.com / vip123
INSERT INTO users (username, email, password, role) VALUES 
('Administrator', 'admin@gmail.com', 'admin123', 'admin'),
('Regular User', 'user@gmail.com', 'user123', 'user'),
('VIP Member', 'vip@gmail.com', 'vip123', 'vip');
