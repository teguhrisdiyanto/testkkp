-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2020 pada 06.27
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sumberbarokah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cicilan`
--

CREATE TABLE `cicilan` (
  `no_cicilan` int(11) NOT NULL,
  `tgl_cicilan` varchar(20) DEFAULT NULL,
  `nominal` varchar(100) DEFAULT NULL,
  `proyek_kd_proyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cicilan`
--

INSERT INTO `cicilan` (`no_cicilan`, `tgl_cicilan`, `nominal`, `proyek_kd_proyek`) VALUES
(1, '01/07/2020', '567567567', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `kd_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`kd_jenis`, `nm_jenis`) VALUES
(1, '+Cib8ONlTIR0O9afuHBIQ1wyk0YdaDfMQm4rHn5TgTw=j/6jkixRGV43cLSwiWM=');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `kd_lokasi` int(11) NOT NULL,
  `nm_lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`kd_lokasi`, `nm_lokasi`) VALUES
(1, '+Cib8ONlTIR0O9afuHBIQ1wyk0YdaDfMQm4rHn5TgTw=7/8mLjyAFV58hr4=');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `kd_proyek` int(11) NOT NULL,
  `tgl_proyek` varchar(250) NOT NULL,
  `nm_proyek` varchar(250) NOT NULL,
  `nilai_kontrak` varchar(250) NOT NULL,
  `nilai_dp` varchar(250) NOT NULL,
  `bayar` varchar(255) DEFAULT NULL,
  `lokasi_kd_lokasi` int(11) NOT NULL,
  `jenis_kd_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`kd_proyek`, `tgl_proyek`, `nm_proyek`, `nilai_kontrak`, `nilai_dp`, `bayar`, `lokasi_kd_lokasi`, `jenis_kd_jenis`) VALUES
(1, '01/08/2020', 'FDFGDFG', '45345', '34535', '-567556757', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kd_user` int(11) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `tglbuat_user` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kd_user`, `username_user`, `password_user`, `status_user`, `tglbuat_user`) VALUES
(1, 'budhi', '202cb962ac59075b964b07152d234b70', 'ADMIN', '2019-11-06'),
(2, 'danur', '202cb962ac59075b964b07152d234b70', 'ADMIN', '2019-11-07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`no_cicilan`,`proyek_kd_proyek`),
  ADD KEY `fk_cicilan_proyek_idx` (`proyek_kd_proyek`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`kd_lokasi`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`kd_proyek`,`lokasi_kd_lokasi`,`jenis_kd_jenis`),
  ADD KEY `fk_proyek_lokasi1_idx` (`lokasi_kd_lokasi`),
  ADD KEY `fk_proyek_jenis1_idx` (`jenis_kd_jenis`),
  ADD KEY `kd_proyek` (`kd_proyek`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  MODIFY `no_cicilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `kd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `kd_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `kd_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  ADD CONSTRAINT `fk_cicilan_proyek` FOREIGN KEY (`proyek_kd_proyek`) REFERENCES `proyek` (`kd_proyek`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `fk_proyek_jenis1` FOREIGN KEY (`jenis_kd_jenis`) REFERENCES `jenis` (`kd_jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyek_lokasi1` FOREIGN KEY (`lokasi_kd_lokasi`) REFERENCES `lokasi` (`kd_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
