-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2018 pada 03.57
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `idmeja` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `nomor` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `menu_category_idmenu_category` int(11) NOT NULL,
  `penjual_idpenjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_category`
--

CREATE TABLE `menu_category` (
  `idmenu_category` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `is_food` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1540017895),
('m130524_201442_init', 1540017904);

-- --------------------------------------------------------

--
-- Struktur dari tabel `non_member`
--

CREATE TABLE `non_member` (
  `idnon_member` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `idorder` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `meja_idmeja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

CREATE TABLE `order_item` (
  `idorder_item` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `order_idorder` int(11) NOT NULL,
  `menu_idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `authKey` varchar(45) NOT NULL,
  `accessToken` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id`, `nama`, `username`, `password`, `authKey`, `accessToken`) VALUES
(1, 'Nasgor Enak', 'nasgor', '12345', 'nasgor12345', 'nasgor12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup_history`
--

CREATE TABLE `topup_history` (
  `idtopup_history` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `topup_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topup_history`
--

INSERT INTO `topup_history` (`idtopup_history`, `nominal`, `topup_time`, `user_id`) VALUES
(1, 100000, '2018-10-27 21:00:30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `kota`, `jenis_kelamin`, `telp`, `saldo`) VALUES
(1, 'kaharudin', 'kaharudin', 'Kaharudin', 'Sidoarjo', 0, '085730119990', 200000),
(5, 'triambudi', 'triambudi', 'Triambudi', 'Surabaya', 0, '083830082854', 100000),
(6, 'dewi', 'dewi', 'Dewi', 'Surabaya', 1, '081234567890', 90000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`idmeja`),
  ADD UNIQUE KEY `nomor_UNIQUE` (`nomor`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`,`menu_category_idmenu_category`,`penjual_idpenjual`),
  ADD KEY `fk_menu_menu_category1_idx` (`menu_category_idmenu_category`),
  ADD KEY `fk_menu_penjual1_idx` (`penjual_idpenjual`);

--
-- Indeks untuk tabel `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`idmenu_category`);

--
-- Indeks untuk tabel `non_member`
--
ALTER TABLE `non_member`
  ADD PRIMARY KEY (`idnon_member`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idorder`,`meja_idmeja`),
  ADD KEY `fk_order_meja1_idx` (`meja_idmeja`);

--
-- Indeks untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`idorder_item`,`order_idorder`,`menu_idmenu`),
  ADD KEY `fk_order_item_order1_idx` (`order_idorder`),
  ADD KEY `fk_order_item_menu1_idx` (`menu_idmenu`);

--
-- Indeks untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indeks untuk tabel `topup_history`
--
ALTER TABLE `topup_history`
  ADD PRIMARY KEY (`idtopup_history`,`user_id`),
  ADD KEY `fk_topup_history_user1_idx` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `idmeja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `idmenu_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `non_member`
--
ALTER TABLE `non_member`
  MODIFY `idnon_member` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_item`
--
ALTER TABLE `order_item`
  MODIFY `idorder_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `topup_history`
--
ALTER TABLE `topup_history`
  MODIFY `idtopup_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_menu_category1` FOREIGN KEY (`menu_category_idmenu_category`) REFERENCES `menu_category` (`idmenu_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_penjual1` FOREIGN KEY (`penjual_idpenjual`) REFERENCES `penjual` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_meja1` FOREIGN KEY (`meja_idmeja`) REFERENCES `meja` (`idmeja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_order_item_menu1` FOREIGN KEY (`menu_idmenu`) REFERENCES `menu` (`idmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_item_order1` FOREIGN KEY (`order_idorder`) REFERENCES `order` (`idorder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `topup_history`
--
ALTER TABLE `topup_history`
  ADD CONSTRAINT `fk_topup_history_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
