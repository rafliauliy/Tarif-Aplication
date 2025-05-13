-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2025 pada 08.57
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarif`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `approval`
--

CREATE TABLE `approval` (
  `id_approval` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `muat` varchar(255) NOT NULL,
  `bongkar` varchar(255) NOT NULL,
  `jenis_cargo` varchar(255) NOT NULL,
  `tarif_tonase` varchar(255) NOT NULL,
  `tarif_tonase_persen` varchar(50) NOT NULL,
  `hasil_tonase` varchar(50) NOT NULL,
  `tarif_ritase` varchar(255) NOT NULL,
  `tarif_ritase_persen` varchar(50) NOT NULL,
  `hasil_ritase` varchar(50) NOT NULL,
  `jenis_transportasi` varchar(225) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `approval`
--

INSERT INTO `approval` (`id_approval`, `nama_vendor`, `muat`, `bongkar`, `jenis_cargo`, `tarif_tonase`, `tarif_tonase_persen`, `hasil_tonase`, `tarif_ritase`, `tarif_ritase_persen`, `hasil_ritase`, `jenis_transportasi`, `remark`) VALUES
(51, 'TJP', 'CIKANDE - ZINK POWER', 'KULON PROGO', 'PIPA', '', '0', '', 'Rp. 10.000.000/ritase', '0', '', 'TRAILER', ''),
(52, 'SEJAHTERA - SLA', 'HAMASA - CILEGON', 'SEAPI - LAMPUNG', 'COIL', '', '', '', 'Rp. 13.500.000/ritase', '3', 'Rp. 13.905.000/ritase', 'TRAILER', ''),
(53, 'SEJAHTERA - SLA', 'KOS - CILEGON', 'PRIOK - JAKARTA UTARA', 'BESI BETON , ANGLE BAR', 'Rp. 75.000/tonase', '', '', '', '', '', 'TRAILER', ''),
(54, 'SEJAHTERA - SLA', 'CBS - CIKANDE', 'PANGANDARAN - JABAR', 'BESI BETON', '', '', '', 'Rp. 13.000.000/ritase', '', '', 'TRAILER', ''),
(55, 'ADIL JAYA', 'KPI - CILEGON', 'PERTAMINA - DURI', 'PIPA', '', '', '', 'Rp. 39.000.000/ritase', '', '', 'TRAILER', ''),
(56, 'SEJAHTERA - SLA', 'CILEGON', 'NAGREK - BANDUNG', 'BESI BETON', '', '0', '', 'Rp. 7.000.000/ritase', '0', '', 'TRAILER', 'Cust CV . Mutiara'),
(57, 'SEJAHTERA - SLA', 'KOS - CILEGON', 'BANDUNG', 'BESI BETON', 'Rp. 190.000/tonase', '0', '', '', '0', '', 'TRAILER', ''),
(58, 'SIBA', 'TJAKRINDO - SURABAYA', 'JAMBI', 'TIANG PANJANG KOTAK', 'Rp. 670.000/tonase', '0', '', '', '0', '', 'TRAILER', ''),
(59, 'SEJAHTERA - SLA', 'KOS - CILEGON', 'PRIOK', 'BESI BETON', 'Rp. 93.000/tonase', '0', '', '', '0', '', 'TRAILER', 'Cust . Adhi Hutama'),
(60, 'IMM - INTI LINTAS MEGA MANDALA', 'KBK - CILEGON', 'BANDUNG', 'OVERVLOW', '', '0', '', 'Rp. 5.500.000/ritase', '0', '', 'TRONTON', ''),
(61, 'SEJAHTERA - SLA', 'KBK - CILEGON', 'KARAWANG', 'WF BEAM', 'Rp. 100.000/tonase', '10', 'Rp. 110.000/tonase', '', '0', '', 'TRAILER', ''),
(62, 'SEJAHTERA - SLA', 'CBS - CIKANDE', 'CILEGON', 'BESI BETON', 'Rp. 50.000/tonase', '0', 'Rp. 50.000/tonase', 'Rp. 2.500.000/ritase', '0', 'Rp. 2.500.000/ritase', 'TRAILER', ''),
(63, 'IMM', 'KBK - CILEGON', 'SEMARANG', 'WF BEAM', 'Rp. 190/tonase', '0', 'Rp. 190/tonase', '', '0', '', 'TRAILER', ''),
(64, 'IMM', 'KS - CILEGON', 'KENDAL', 'BATU BARA', 'Rp. 320/tonase', '0', '', '', '0', '', 'DUMTRUCK', 'CUST. BATU CITRA GROUP 370RB  TON'),
(66, 'SLA', 'BPS - CIKANDE', 'HAMASA STEEL - PRIOK', 'BESI BETON', 'Rp. 60.000/tonase', '0', '', '', '0', '', 'TRAILER', ''),
(68, 'KAL', 'CBS - CIKANDE', 'RSUD -  CILEGON', 'BESI BETON', '', '0', '', 'Rp. 3.500.000/ritase', '0', '', 'TRAILER', 'Ujo Tangerang \r\nQuester lama : 1.460.000\r\nQuester baru : 1.388.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `salesorder`
--

CREATE TABLE `salesorder` (
  `id_so` int(11) NOT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `tanggal_so` date DEFAULT NULL,
  `muat` varchar(255) DEFAULT NULL,
  `bongkar` varchar(255) DEFAULT NULL,
  `tonase` varchar(255) DEFAULT NULL,
  `jenis_cargo` varchar(255) DEFAULT NULL,
  `jenis_service` varchar(255) DEFAULT NULL,
  `tarif_ritase` varchar(255) DEFAULT NULL,
  `tarif_tonase` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `salesorder`
--

INSERT INTO `salesorder` (`id_so`, `order_no`, `customer`, `tanggal_so`, `muat`, `bongkar`, `tonase`, `jenis_cargo`, `jenis_service`, `tarif_ritase`, `tarif_tonase`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'CSBU-24090001', 'KAL', '2024-09-26', '2121', '2121', '2121', '22121', '2121', '2121', '12', '2121', '2024-09-26 01:14:53', '2024-09-26 01:14:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_wa` varchar(50) NOT NULL,
  `role` enum('employe','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_perusahaan`, `nama`, `alamat`, `username`, `email`, `no_telp`, `no_wa`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'PT Krakatau Argo Logistics', 'Muhamad Rafli Auliya', 'Cilegon', 'rafli', 'rafliauliya1@gmail.com', '081808685989', '0818099721211', 'admin', '$2y$10$eUxKL7T.faviiux1cXxwne1DPlL1R4ky0ZTITgQmEIddCn/m0kOru', 1705391070, '846029fb9a96ff6c09b8bfb92b19060f.jpg', 1),
(110, '', '', '', 'gawang', '', '', '', 'employe', '$2y$10$G3qsZYXiln2hh2MfBuvWfuKDQjjdpYIaoVqBgvANmvMwi/hL.CiHi', 1721203994, 'user.png', 0),
(113, '', 'aan', '', 'aan', '', '', '', 'admin', '$2y$10$2xyULWHd7ljgxnMGgbRJFeVq06QurjwhsoYANIKHWjU.6KHavu3YK', 1721206459, 'user.png', 1),
(114, '', 'wanda', '', 'wanda', '', '', '', 'admin', '$2y$10$Od7LmenrCmk.wSy89Xzqmu4jP3l3pQBNrcSAZ0sPPGVS6XK30IPWK', 1721206475, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indeks untuk tabel `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id_so`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `approval`
--
ALTER TABLE `approval`
  MODIFY `id_approval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id_so` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
