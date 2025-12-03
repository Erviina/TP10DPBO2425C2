-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2025 pada 18.58
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_organiser`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `booked_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `event_id`, `client_id`, `booked_at`) VALUES
(3, 2, 4, '2025-04-15'),
(4, 4, 4, '2025-01-10'),
(8, 4, 5, '2025-02-11'),
(11, 4, 11, '2005-11-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`) VALUES
(1, 'PT Teknologi Bersama', '081234567890'),
(3, 'Eventindo Organizer', '081288990011'),
(4, 'PT Maju Jaya', '083812345679'),
(5, 'Amanda Manopo', '08214455361'),
(11, 'Disdukcapil Bandung', '08212279'),
(12, 'Ervina Anak Baik', '082122787819');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `location`) VALUES
(2, 'Tech Conference 2025', '2025-03-12', 'Hall A – Jakarta Convention Center'),
(3, 'Wedding Party - Budi & Sari', '2025-05-20', 'Hotel Mulia Ballroom'),
(4, 'Music Festival Summer Blast', '2025-07-10', 'Lapangan Asia Afrika'),
(5, 'Corporate Meeting PT Nusantara', '2025-01-18', 'Mandarin Oriental Meeting Room'),
(6, 'Birthday Party', '2026-12-12', 'Horison Hotel & Resto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`, `event_id`) VALUES
(1, 'Andi Wijaya', 'Event Manager', 2),
(2, 'Sinta Lestari', 'Lighting Technician', 3),
(3, 'Bagus Pratama', 'MC', 2),
(4, 'Rina Ardhana', 'Wedding Coordinator', 2),
(5, 'Dewi Cantika', 'Stage Crew', 3),
(6, 'Michael Hartono', 'Sound Engineer', 3),
(7, 'Tono Drajat', 'Technical Support', 4),
(8, 'Kevin Wijaya', 'Camera Operator', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
