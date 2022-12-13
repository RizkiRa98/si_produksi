-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2022 pada 16.06
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_produksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alpha`
--

CREATE TABLE `alpha` (
  `id_alpha` varchar(20) NOT NULL,
  `nilai_alpha` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alpha`
--

INSERT INTO `alpha` (`id_alpha`, `nilai_alpha`) VALUES
('A1', '0.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` varchar(20) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`) VALUES
('B001', 'Rangka Jadi'),
('B002', 'Busa EB'),
('B003', 'Busa Gress'),
('B004', 'Busa BN'),
('B005', 'Kain Midily Coklat Muda'),
('B006', 'Kain Midily Coklat Tua'),
('B007', 'Floking'),
('B008', 'Pegas Keong'),
('B009', 'Kaki Menara'),
('B010', 'Paku'),
('B011', 'Benang'),
('B012', 'Sleting + Kepala Sleting'),
('B013', 'Silikon'),
('B014', 'Blacu'),
('B015', 'Karet'),
('B016', 'Karton'),
('B017', 'Staples 10/13'),
('B018', 'Lateks'),
('B019', 'Papan 2x15x200'),
('B020', 'Kaso 10x7x200'),
('B021', 'Paku 5,7,4'),
('B022', 'Busa 4cm'),
('B023', 'Busa 2cm'),
('B024', 'Busa 1cm'),
('B025', 'Kain Oscar'),
('B026', 'Reklining'),
('B027', 'Kaki Piala'),
('B028', 'Sekrup'),
('B029', 'Elastik'),
('B030', 'Dacron'),
('B031', 'Staples 10/10'),
('B032', 'Papan 2x20x200'),
('B033', 'Reklining Besar'),
('B034', 'Kaki Kotak'),
('B035', 'Pegas Kotak'),
('B036', 'Kaki Sofa Babi'),
('B037', 'Kaki Kubah'),
('B038', 'Kain Midily Abu'),
('B039', 'Kain Stacey Abu'),
('B040', 'Kaki Retro'),
('B041', 'Kaso 5x6x200'),
('B042', 'Paku 5,7'),
('B043', 'Cup Holder'),
('B044', 'Tali Kur'),
('B045', 'Papan 2x17x200'),
('B046', 'Papan 3x10x200'),
('B047', 'Reklening kecil'),
('B048', 'Kaki U'),
('B049', 'Webbing'),
('B050', 'Kaso'),
('B051', 'Rangka Jati'),
('B052', 'Kain Midily Coklat 613'),
('B053', 'Kain Pda 20'),
('B054', 'Kancing press'),
('B055', 'Paku antik'),
('B056', 'Kayu Jati'),
('B057', 'Kayu Alba'),
('B058', 'Lem Putih'),
('B059', 'Lem Epoxy'),
('B060', 'Woof Filler'),
('B061', 'Sanding kayu'),
('B062', 'Clear Doff'),
('B063', 'Clear Gloss'),
('B064', 'Warna'),
('B065', 'Amplas'),
('B066', 'Thinner'),
('B067', 'Kain Enzo 075'),
('B068', 'Kain Ferrari 16'),
('B069', 'Realto'),
('B070', 'Sumbu '),
('B071', 'Antik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`) VALUES
(1, 'Sofa L Putus 3 2 + Puff'),
(2, 'Sofa London 3 2 1'),
(3, 'Sofa Bed Lengko'),
(4, 'Sofa Bed Alcatraz'),
(5, 'Sofa London 3 1 1'),
(6, 'Sofa Astrid 2 1 + Puff'),
(7, 'Sofa Bed Dabi'),
(8, 'Sofa Bed Bombay'),
(9, 'Sofa Bed Dubai'),
(10, 'Kursi Turki 3 2 1 + Meja Tamu'),
(11, 'Kursi Flixy 3 2 1 + Meja Tamu'),
(12, 'Sofa Astrid 2 1 1'),
(13, 'Kursi Turki 3 1 + Meja Tamu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` varchar(20) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `bhn_qty1` varchar(100) NOT NULL,
  `bhn_qty2` varchar(100) NOT NULL,
  `bhn_qty3` varchar(100) NOT NULL,
  `bhn_qty4` varchar(100) NOT NULL,
  `bhn_qty5` varchar(100) NOT NULL,
  `bhn_qty6` varchar(100) NOT NULL,
  `bhn_qty7` varchar(100) NOT NULL,
  `bhn_qty8` varchar(100) NOT NULL,
  `bhn_qty9` varchar(100) NOT NULL,
  `bhn_qty10` varchar(100) NOT NULL,
  `bhn_qty11` varchar(100) NOT NULL,
  `bhn_qty12` varchar(100) NOT NULL,
  `bhn_qty13` varchar(100) NOT NULL,
  `bhn_qty14` varchar(100) NOT NULL,
  `bhn_qty15` varchar(100) NOT NULL,
  `bhn_qty16` varchar(100) NOT NULL,
  `bhn_qty17` varchar(100) NOT NULL,
  `bhn_qty18` varchar(100) NOT NULL,
  `bhn_qty19` varchar(100) NOT NULL,
  `bhn_qty20` varchar(100) NOT NULL,
  `bhn_qty21` varchar(100) NOT NULL,
  `bhn_qty22` varchar(100) NOT NULL,
  `bhn_qty23` varchar(100) NOT NULL,
  `bhn_qty24` varchar(100) NOT NULL,
  `bhn_qty25` varchar(100) NOT NULL,
  `bhn_qty26` varchar(100) NOT NULL,
  `bhn_qty27` varchar(100) NOT NULL,
  `bhn_qty28` varchar(100) NOT NULL,
  `bhn_qty29` varchar(100) NOT NULL,
  `bhn_qty30` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `id_produksi`, `id_barang`, `nama_konsumen`, `tgl_produksi`, `bhn_qty1`, `bhn_qty2`, `bhn_qty3`, `bhn_qty4`, `bhn_qty5`, `bhn_qty6`, `bhn_qty7`, `bhn_qty8`, `bhn_qty9`, `bhn_qty10`, `bhn_qty11`, `bhn_qty12`, `bhn_qty13`, `bhn_qty14`, `bhn_qty15`, `bhn_qty16`, `bhn_qty17`, `bhn_qty18`, `bhn_qty19`, `bhn_qty20`, `bhn_qty21`, `bhn_qty22`, `bhn_qty23`, `bhn_qty24`, `bhn_qty25`, `bhn_qty26`, `bhn_qty27`, `bhn_qty28`, `bhn_qty29`, `bhn_qty30`) VALUES
('F001', 105, 1, 'Toko Hasan', '2021-08-04', 'Rangka Jadi - 1 set', 'Busa EB - 5 kg', 'Busa Gress - 0.8 kg', 'Busa BN - 3.5 kg', 'Kain Midily Coklat Muda - 3.5 meter', 'Kain Midily Coklat Tua - 8 meter', 'Floking - 2.5 meter', 'Pegas Keong - 40 pcs', 'Kaki Menara - 8 pcs', 'Paku - 1/2 kg', 'Benang - 1 golongan', 'Sleting + Kepala Sleting - 2.5 meter', 'Silikon - 3.8 kg', 'Blacu - 3 meter', 'Karet - 2 ikat', 'Karton - 7 lembar', 'Staples 10/13 - 1 dus', 'Lateks - 1 kg', '', '', '', '', '', '', '', '', '', '', '', ''),
('F002', 107, 3, 'Toko Sakinah', '2021-08-04', 'Kaso 10x7x200 - 1 Batang', 'Paku 5,7,4 - 1 Kg', 'Busa 4cm - 2.5 lembar', 'Kain Oscar - 7 meter', 'Karet - 1 ikat', 'Karton - 3 lembar', 'Reklining - 1 pasang', 'Kaki Piala - 4 pcs', 'Sekrup - 1 gros', 'Paku - 1/2 kg', 'Benang - 1 golongan', 'Elastik - 1 meter', 'Dacron - 1.5 meter', 'Lateks - 1kg', 'Staples 10/10 - 1/2 dus', 'Staples 10/13 - 1/2 dus', 'Blacu - 2 meter', 'Papan 2x15x200 - 18 lembar', 'Busa 2cm - 2.5 lembar', 'Busa 1cm - 2.5 lembar', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_penjadwalan` varchar(20) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `nama_pelaksana` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `nama_konsumen`, `nama_pelaksana`, `id_barang`, `tgl_mulai`, `tgl_akhir`) VALUES
('J001', 'Toko Hasan', 'Pak Baden', 1, '2021-08-04', '2021-08-18'),
('J002', 'Toko Sakinah', 'Pak Eeng', 3, '2021-08-04', '2021-08-18'),
('J003', 'Toko Abdulah', 'Pak Baden', 1, '2021-08-04', '2021-08-18'),
('J004', 'Toko Prama', 'Pak Cucu', 10, '2021-08-04', '2021-08-16'),
('J005', 'Toko Albert', 'Pak Caca', 11, '2021-08-05', '2021-08-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `bln_thn` varchar(20) NOT NULL,
  `d_aktual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peramalan`
--

INSERT INTO `peramalan` (`id_peramalan`, `nama_barang`, `bln_thn`, `d_aktual`) VALUES
('D01', 'Sofa L Putus 3 2 + Puff', 'Agustus 2020', 17),
('D02', 'Sofa L Putus 3 2 + Puff', 'September 2020', 14),
('D03', 'Sofa L Putus 3 2 + Puff', 'Oktober 2020', 14),
('D04', 'Sofa L Putus 3 2 + Puff', 'November 2020', 12),
('D05', 'Sofa L Putus 3 2 + Puff', 'Desember 2020', 18),
('D06', 'Sofa L Putus 3 2 + Puff', 'Januari 2021', 19),
('D07', 'Sofa L Putus 3 2 + Puff', 'Februari 2021', 25),
('D08', 'Sofa L Putus 3 2 + Puff', 'Maret 2021', 29),
('D09', 'Sofa L Putus 3 2 + Puff', 'April 2021', 24),
('D10', 'Sofa L Putus 3 2 + Puff', 'Mei 2021', 12),
('D11', 'Sofa L Putus 3 2 + Puff', 'Juni 2021', 27),
('D12', 'Sofa L Putus 3 2 + Puff', 'Juli 2021', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perencanaan`
--

CREATE TABLE `perencanaan` (
  `id_perencanaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `bulan_tahun` varchar(50) NOT NULL,
  `minggu` varchar(50) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `bhn_qty1` varchar(100) NOT NULL,
  `bhn_qty2` varchar(100) NOT NULL,
  `bhn_qty3` varchar(100) NOT NULL,
  `bhn_qty4` varchar(100) NOT NULL,
  `bhn_qty5` varchar(100) NOT NULL,
  `bhn_qty6` varchar(100) NOT NULL,
  `bhn_qty7` varchar(100) NOT NULL,
  `bhn_qty8` varchar(100) NOT NULL,
  `bhn_qty9` varchar(100) NOT NULL,
  `bhn_qty10` varchar(100) NOT NULL,
  `bhn_qty11` varchar(100) NOT NULL,
  `bhn_qty12` varchar(100) NOT NULL,
  `bhn_qty13` varchar(100) NOT NULL,
  `bhn_qty14` varchar(100) NOT NULL,
  `bhn_qty15` varchar(100) NOT NULL,
  `bhn_qty16` varchar(100) NOT NULL,
  `bhn_qty17` varchar(100) NOT NULL,
  `bhn_qty18` varchar(100) NOT NULL,
  `bhn_qty19` varchar(100) NOT NULL,
  `bhn_qty20` varchar(100) NOT NULL,
  `bhn_qty21` varchar(100) NOT NULL,
  `bhn_qty22` varchar(100) NOT NULL,
  `bhn_qty23` varchar(100) NOT NULL,
  `bhn_qty24` varchar(100) NOT NULL,
  `bhn_qty25` varchar(100) NOT NULL,
  `bhn_qty26` varchar(100) NOT NULL,
  `bhn_qty27` varchar(100) NOT NULL,
  `bhn_qty28` varchar(100) NOT NULL,
  `bhn_qty29` varchar(100) NOT NULL,
  `bhn_qty30` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perencanaan`
--

INSERT INTO `perencanaan` (`id_perencanaan`, `id_barang`, `bulan_tahun`, `minggu`, `qty`, `bhn_qty1`, `bhn_qty2`, `bhn_qty3`, `bhn_qty4`, `bhn_qty5`, `bhn_qty6`, `bhn_qty7`, `bhn_qty8`, `bhn_qty9`, `bhn_qty10`, `bhn_qty11`, `bhn_qty12`, `bhn_qty13`, `bhn_qty14`, `bhn_qty15`, `bhn_qty16`, `bhn_qty17`, `bhn_qty18`, `bhn_qty19`, `bhn_qty20`, `bhn_qty21`, `bhn_qty22`, `bhn_qty23`, `bhn_qty24`, `bhn_qty25`, `bhn_qty26`, `bhn_qty27`, `bhn_qty28`, `bhn_qty29`, `bhn_qty30`) VALUES
(14, 1, 'Agustus 2021', 'Satu', '7', 'Rangka Jadi - 1 set', 'Busa EB - 5 kg', 'Busa Gress - 0.8 kg', 'Busa BN - 3.5 kg', 'Kain Midily Coklat Muda - 3.5 meter', 'Kain Midily Coklat Tua - 8 meter', 'Floking - 2.5 meter', 'Pegas Keong - 40 pcs', 'Kaki Menara - 8 pcs', 'Paku - 1/2 kg', 'Benang - 1 golongan', 'Sleting + Kepala Sleting - 2.5 meter', 'Silikon - 3.8 kg', 'Blacu - 3 meter', 'Karet - 2 ikat', 'Karton - 7 lembar', 'Staples 10/13 - 1 dus', 'Lateks - 1 kg', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 1, 'Agustus 2021', 'Dua', '6', 'Rangka Jadi - 1 set', 'Busa EB - 5 kg', 'Busa Gress - 0.8 kg', 'Busa BN - 3.5 kg', 'Kain Midily Coklat Muda - 3.5 meter', 'Kain Midily Coklat Tua - 8 meter', 'Floking - 2.5 meter', 'Pegas Keong - 40 pcs', 'Kaki Menara - 8 pcs', 'Paku - 1/2 kg', 'Benang - 1 golongan', 'Sleting + Kepala Sleting - 2.5 meter', 'Silikon - 3.8 kg', 'Blacu - 3 meter', 'Karet - 2 ikat', 'Karton - 7 lembar', 'Staples 10/13 - 1 dus', 'Lateks - 1 kg', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 2, 'Agustus 2021', 'Satu', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 1, 'September 2021', 'Satu', '4', 'Rangka Jadi - 1 set', 'Busa EB - 5 kg', 'Busa Gress - 0.8 kg', 'Busa BN - 3.5 kg', 'Kain Midily Coklat Muda - 3.5 meter', 'Kain Midily Coklat Tua - 8 meter', 'Floking - 2.5 meter', 'Pegas Keong - 40 pcs', 'Kaki Menara - 8 pcs', 'Paku - 1/2 kg', 'Benang - 1 golongan', 'Sleting + Kepala Sleting - 2.5 meter', 'Silikon - 3.8 kg', 'Blacu - 3 meter', 'Karet - 2 ikat', 'Karton - 7 lembar', 'Staples 10/13 - 1 dus', 'Lateks - 1 kg', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 2, 'Agustus 2021', 'Dua', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 3, 'Agustus 2021', 'Satu', '3', 'Kaso 10x7x200 - 1 Batang', 'Paku 5,7,4 - 1 Kg', 'Busa 4cm - 2.5 lembar', 'Kain Oscar - 7 meter', 'Karet - 1 ikat', 'Karton - 3 lembar', 'Reklining - 1 pasang', 'Kaki Piala - 4 pcs', 'Sekrup - 1 gros', 'Paku - 1/2 kg', 'Benang - 1 golongan', 'Elastik - 1 meter', 'Dacron - 1.5 meter', 'Lateks - 1kg', 'Staples 10/10 - 1/2 dus', 'Staples 10/13 - 1/2 dus', 'Blacu - 2 meter', 'Papan 2x15x200 - 18 lembar', 'Busa 2cm - 2.5 lembar', 'Busa 1cm - 2.5 lembar', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_bahan` varchar(20) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_barang`, `id_bahan`, `qty`) VALUES
(18, 1, 'B001', '1 set'),
(19, 1, 'B002', '5 kg'),
(20, 1, 'B003', '0.8 kg'),
(21, 1, 'B004', '3.5 kg'),
(22, 1, 'B005', '3.5 meter'),
(23, 1, 'B006', '8 meter'),
(24, 1, 'B007', '2.5 meter'),
(25, 1, 'B008', '40 pcs'),
(26, 1, 'B009', '8 pcs'),
(27, 1, 'B010', '1/2 kg'),
(28, 1, 'B011', '1 golongan'),
(29, 1, 'B012', '2.5 meter'),
(30, 1, 'B013', '3.8 kg'),
(31, 1, 'B014', '3 meter'),
(32, 1, 'B015', '2 ikat'),
(33, 1, 'B016', '7 lembar'),
(34, 1, 'B017', '1 dus'),
(35, 1, 'B018', '1 kg'),
(37, 3, 'B020', '1 Batang'),
(38, 3, 'B021', '1 Kg'),
(39, 3, 'B022', '2.5 lembar'),
(42, 3, 'B025', '7 meter'),
(43, 3, 'B015', '1 ikat'),
(44, 3, 'B016', '3 lembar'),
(45, 3, 'B026', '1 pasang'),
(46, 3, 'B027', '4 pcs'),
(47, 3, 'B028', '1 gros'),
(48, 3, 'B010', '1/2 kg'),
(49, 3, 'B011', '1 golongan'),
(50, 3, 'B029', '1 meter'),
(51, 3, 'B030', '1.5 meter'),
(52, 3, 'B018', '1kg'),
(53, 3, 'B031', '1/2 dus'),
(54, 3, 'B017', '1/2 dus'),
(55, 3, 'B014', '2 meter'),
(65, 3, 'B019', '18 lembar'),
(66, 3, 'B023', '2.5 lembar'),
(67, 3, 'B024', '2.5 lembar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_penjadwalan` varchar(20) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `nama_pelaksana` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `id_penjadwalan`, `nama_konsumen`, `nama_pelaksana`, `id_barang`, `tgl_mulai`, `tgl_akhir`, `status`, `catatan`) VALUES
(105, 'J001', 'Toko Hasan', 'Pak Baden', 1, '2021-08-04', '2021-08-18', 'Diproses', 'Belum ada catatan'),
(107, 'J002', 'Toko Sakinah', 'Pak Eeng', 3, '2021-08-04', '2021-08-18', 'Diproses', 'Belum ada catatan'),
(108, 'J003', 'Toko Abdulah', 'Pak Baden', 1, '2021-08-04', '2021-08-18', 'Diproses', 'Bahan Kain Diganti Ke Midily Biru Muda'),
(109, 'J004', 'Toko Prama', 'Pak Cucu', 10, '2021-08-04', '2021-08-16', 'Selesai', 'Tidak ada bahan sisa'),
(110, 'J005', 'Toko Albert', 'Pak Caca', 11, '2021-08-05', '2021-08-19', 'Menunggu', 'Belum ada catatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `jabatan`, `token`) VALUES
(1, 'Pak Han', 'rizkiramadhan350@gmail.com', '123456', 'kepalaproduksi', '9d5c68547e001b29da2b2840afe69a1b'),
(6, 'Pak Baden', 'rizkir19981101@gmail.com', '123456', 'ketuagrup', ''),
(7, 'Pak Reno', 'sim.renosafmebeul@gmail.com', '123456', 'pemimpin', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alpha`
--
ALTER TABLE `alpha`
  ADD PRIMARY KEY (`id_alpha`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`);

--
-- Indeks untuk tabel `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD PRIMARY KEY (`id_perencanaan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_penjadwalan` (`id_penjadwalan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `perencanaan`
--
ALTER TABLE `perencanaan`
  MODIFY `id_perencanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_produksi`) REFERENCES `produksi` (`id_produksi`);

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD CONSTRAINT `perencanaan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`);

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `produksi_ibfk_2` FOREIGN KEY (`id_penjadwalan`) REFERENCES `penjadwalan` (`id_penjadwalan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
