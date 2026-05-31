-- =====================================================
-- Modul 11 - PHP Database (CRUD)
-- Database Setup Script
-- =====================================================

-- Buat database
CREATE DATABASE IF NOT EXISTS akademik;
USE akademik;

-- =====================================================
-- Tabel tbl_dosen
-- =====================================================
CREATE TABLE IF NOT EXISTS tbl_dosen (
    idDosen INT AUTO_INCREMENT PRIMARY KEY,
    namaDosen VARCHAR(50),
    noHP VARCHAR(25)
);

-- =====================================================
-- Tabel tbl_mahasiswa
-- =====================================================
CREATE TABLE IF NOT EXISTS tbl_mahasiswa (
    npm INT PRIMARY KEY,
    namaMhs VARCHAR(50),
    prodi VARCHAR(25),
    alamat VARCHAR(70),
    noHP VARCHAR(25)
);

-- =====================================================
-- Tabel tbl_matakuliah
-- =====================================================
CREATE TABLE IF NOT EXISTS tbl_matakuliah (
    kodeMK INT PRIMARY KEY,
    namaMK VARCHAR(70),
    sks INT,
    jam INT
);

-- =====================================================
-- Data contoh (optional)
-- =====================================================
INSERT INTO tbl_dosen (namaDosen, noHP) VALUES
('Dr. Ahmed Yusuf, M.Sc', '081222333444'),
('Jarwo Slamet Joyo, Ph.D', '081444333555');

INSERT INTO tbl_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES
(253307051, 'Deta Aprilka Dario Karnavaro', 'Teknik Informatika', 'Jl. Merdeka No. 10, Jakarta', '081234567890'),
(253307047, 'Habibi Zakly Khairullah', 'Sistem Informasi', 'Jl. Pahlawan No. 25, Surabaya', '082345678901'),
(253307045, 'Bagus Dananjaya', 'Teknik Informatika', 'Jl. Sudirman No. 5, Bandung', '083456789012');

INSERT INTO tbl_matakuliah (kodeMK, namaMK, sks, jam) VALUES
(101, 'Pemrograman Web', 3, 4),
(102, 'Basis Data', 3, 4),
(103, 'Algoritma dan Pemrograman', 4, 6);