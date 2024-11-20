-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2024 pada 04.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectkrypto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(3) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Arya', 'arya', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'Arya Bhagaskara', 'bhagaskaraarya', '$2y$10$bGajdRqzlyExhvZ4idrA1OSj7Izj', 'user'),
(3, 'ppp', 'ppp', '$2y$10$fIza9anEG6Yf8/nnYeSWV.GIHpFl', 'user'),
(4, 'cihuy', 'yaha', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(6, 'Bhagas', 'aryabhagaskara', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
