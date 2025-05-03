CREATE DATABASE IF NOT EXISTS ticketing_system;
USE ticketing_system;
CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelapor VARCHAR(100),
    departemen VARCHAR(100),
    judul VARCHAR(255),
    deskripsi TEXT,
    prioritas ENUM('Low', 'Medium', 'High'),
    status ENUM('Open', 'In Progress', 'Closed') DEFAULT 'Open',
    tanggal_lapor DATE
);