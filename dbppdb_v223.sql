-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2023 pada 05.16
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbppdb_v223`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(10) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL,
  `keterangan_berkas` varchar(100) NOT NULL,
  `tipe_berkas` varchar(100) NOT NULL,
  `ukuran_berkas` float NOT NULL,
  `id_peserta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(5) NOT NULL,
  `nama_biaya` varchar(150) NOT NULL,
  `jumlah_biaya` varchar(7) DEFAULT NULL,
  `jenis_biaya` varchar(15) NOT NULL,
  `status_biaya` varchar(11) NOT NULL,
  `id_tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `nama_biaya`, `jumlah_biaya`, `jenis_biaya`, `status_biaya`, `id_tahun`) VALUES
(1, 'Pendaftaran', '100000', 'Pendaftaran', 'Tidak Wajib', 1),
(2, 'Seragam', '500000', 'Daftar ulang', 'Wajib', 1),
(3, 'SPP', '150000', 'Daftar ulang', 'Wajib', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(10) NOT NULL,
  `id_jalur` int(10) NOT NULL,
  `bobot_jarak` int(4) NOT NULL,
  `bobot_nilai` int(4) NOT NULL,
  `bobot_prestasi` int(4) NOT NULL,
  `bobot_tes` int(4) NOT NULL,
  `bobot_wawancara` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_jalur`, `bobot_jarak`, `bobot_nilai`, `bobot_prestasi`, `bobot_tes`, `bobot_wawancara`) VALUES
(1, 1, 100, 0, 0, 0, 0),
(2, 2, 100, 0, 0, 0, 0),
(3, 3, 100, 0, 0, 0, 0),
(4, 4, 0, 100, 100, 0, 0),
(9, 14, 0, 100, 100, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir`
--

CREATE TABLE `formulir` (
  `id_formulir` int(10) NOT NULL,
  `tahun_pelajaran` varchar(5) NOT NULL,
  `jalur_pendaftaran` varchar(5) NOT NULL,
  `nama_peserta` varchar(5) NOT NULL,
  `jenis_kelamin` varchar(5) NOT NULL,
  `nisn` varchar(5) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `no_kk` varchar(5) NOT NULL,
  `tempat_lahir` varchar(5) NOT NULL,
  `tanggal_lahir` varchar(5) NOT NULL,
  `no_registrasi_akta_lahir` varchar(5) NOT NULL,
  `agama` varchar(5) NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  `berkebutuhan_khusus` varchar(5) NOT NULL,
  `alamat` varchar(5) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `nama_dusun` varchar(5) NOT NULL,
  `nama_kelurahan` varchar(5) NOT NULL,
  `kecamatan` varchar(5) NOT NULL,
  `kabupaten` varchar(5) NOT NULL,
  `provinsi` varchar(5) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `latitude` varchar(5) NOT NULL,
  `longitude` varchar(5) NOT NULL,
  `tempat_tinggal` varchar(5) NOT NULL,
  `moda_transportasi` varchar(5) NOT NULL,
  `no_kks` varchar(5) NOT NULL,
  `anak_ke` varchar(5) NOT NULL,
  `penerima_kps_pkh` varchar(5) NOT NULL,
  `no_kps_pkh` varchar(5) NOT NULL,
  `penerima_kip` varchar(5) NOT NULL,
  `no_kip` varchar(5) NOT NULL,
  `nama_tertera_di_kip` varchar(5) NOT NULL,
  `terima_fisik_kartu_kip` varchar(5) NOT NULL,
  `nama_ayah` varchar(5) NOT NULL,
  `nik_ayah` varchar(5) NOT NULL,
  `tempat_lahir_ayah` varchar(5) NOT NULL,
  `tanggal_lahir_ayah` varchar(5) NOT NULL,
  `pendidikan_ayah` varchar(5) NOT NULL,
  `pekerjaan_ayah` varchar(5) NOT NULL,
  `penghasilan_bulanan_ayah` varchar(5) NOT NULL,
  `berkebutuhan_khusus_ayah` varchar(5) NOT NULL,
  `no_hp_ayah` varchar(5) NOT NULL,
  `nama_ibu` varchar(5) NOT NULL,
  `nik_ibu` varchar(5) NOT NULL,
  `tempat_lahir_ibu` varchar(5) NOT NULL,
  `tanggal_lahir_ibu` varchar(5) NOT NULL,
  `pendidikan_ibu` varchar(5) NOT NULL,
  `pekerjaan_ibu` varchar(5) NOT NULL,
  `penghasilan_bulanan_ibu` varchar(5) NOT NULL,
  `berkebutuhan_khusus_ibu` varchar(5) NOT NULL,
  `no_hp_ibu` varchar(5) NOT NULL,
  `nama_wali` varchar(5) NOT NULL,
  `nik_wali` varchar(5) NOT NULL,
  `tempat_lahir_wali` varchar(5) NOT NULL,
  `tanggal_lahir_wali` varchar(5) NOT NULL,
  `pendidikan_wali` varchar(5) NOT NULL,
  `pekerjaan_wali` varchar(5) NOT NULL,
  `penghasilan_bulanan_wali` varchar(5) NOT NULL,
  `no_hp_wali` varchar(5) NOT NULL,
  `no_telepon_rumah` varchar(5) NOT NULL,
  `nomor_hp` varchar(5) NOT NULL,
  `email` varchar(5) NOT NULL,
  `hobi` varchar(5) NOT NULL,
  `tinggi_badan` varchar(5) NOT NULL,
  `berat_badan` varchar(5) NOT NULL,
  `lingkar_kepala` varchar(5) NOT NULL,
  `jarak_ke_sekolah` varchar(5) NOT NULL,
  `waktu_tempuh` varchar(5) NOT NULL,
  `jumlah_saudara_kandung` varchar(5) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `asal_sekolah` varchar(5) NOT NULL,
  `akreditasi` varchar(5) NOT NULL,
  `no_peserta_ujian` varchar(5) NOT NULL,
  `no_seri_ijazah` varchar(5) NOT NULL,
  `no_seri_skhu` varchar(5) NOT NULL,
  `tahun_lulus` varchar(5) NOT NULL,
  `nilai_rapor` varchar(5) NOT NULL,
  `nilai_usbn` varchar(5) NOT NULL,
  `nilai_unbk_unkp` varchar(5) NOT NULL,
  `nilai_raporsemester` varchar(5) NOT NULL,
  `jml_mapel` int(3) DEFAULT NULL,
  `ketentuan` longtext NOT NULL,
  `foto` varchar(5) NOT NULL,
  `akte_kelahiran` varchar(5) NOT NULL,
  `kartu_keluarga` varchar(5) NOT NULL,
  `skl_skhu` varchar(5) NOT NULL,
  `skd` varchar(5) NOT NULL,
  `berkaslain` varchar(5) NOT NULL,
  `tipe` varchar(1) NOT NULL,
  `kode_daring` varchar(100) NOT NULL,
  `kode_luring` varchar(100) NOT NULL,
  `kode_formulir` varchar(5) NOT NULL,
  `foto_full` varchar(5) NOT NULL,
  `rapor` varchar(5) NOT NULL,
  `sktm` varchar(5) NOT NULL,
  `ktp_ortu` varchar(5) NOT NULL,
  `kartu_bantuan` varchar(5) NOT NULL,
  `sptjm` varchar(5) NOT NULL,
  `sp` varchar(5) NOT NULL,
  `prestasi_akademik_nonakademik` varchar(5) NOT NULL,
  `wawancara` varchar(5) NOT NULL,
  `pilihan_sekolah_lain` varchar(5) NOT NULL,
  `biaya` varchar(5) NOT NULL,
  `kartu_tes` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `formulir`
--

INSERT INTO `formulir` (`id_formulir`, `tahun_pelajaran`, `jalur_pendaftaran`, `nama_peserta`, `jenis_kelamin`, `nisn`, `nik`, `no_kk`, `tempat_lahir`, `tanggal_lahir`, `no_registrasi_akta_lahir`, `agama`, `kewarganegaraan`, `berkebutuhan_khusus`, `alamat`, `rt`, `rw`, `nama_dusun`, `nama_kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `latitude`, `longitude`, `tempat_tinggal`, `moda_transportasi`, `no_kks`, `anak_ke`, `penerima_kps_pkh`, `no_kps_pkh`, `penerima_kip`, `no_kip`, `nama_tertera_di_kip`, `terima_fisik_kartu_kip`, `nama_ayah`, `nik_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_bulanan_ayah`, `berkebutuhan_khusus_ayah`, `no_hp_ayah`, `nama_ibu`, `nik_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_bulanan_ibu`, `berkebutuhan_khusus_ibu`, `no_hp_ibu`, `nama_wali`, `nik_wali`, `tempat_lahir_wali`, `tanggal_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_bulanan_wali`, `no_hp_wali`, `no_telepon_rumah`, `nomor_hp`, `email`, `hobi`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `jarak_ke_sekolah`, `waktu_tempuh`, `jumlah_saudara_kandung`, `jurusan`, `asal_sekolah`, `akreditasi`, `no_peserta_ujian`, `no_seri_ijazah`, `no_seri_skhu`, `tahun_lulus`, `nilai_rapor`, `nilai_usbn`, `nilai_unbk_unkp`, `nilai_raporsemester`, `jml_mapel`, `ketentuan`, `foto`, `akte_kelahiran`, `kartu_keluarga`, `skl_skhu`, `skd`, `berkaslain`, `tipe`, `kode_daring`, `kode_luring`, `kode_formulir`, `foto_full`, `rapor`, `sktm`, `ktp_ortu`, `kartu_bantuan`, `sptjm`, `sp`, `prestasi_akademik_nonakademik`, `wawancara`, `pilihan_sekolah_lain`, `biaya`, `kartu_tes`) VALUES
(1, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '', '', 'Ya', 'Ya', '', 'Ya', '', '', 'Ya', '', '', '', '', '', '', '', '', 'Ya', 'Ya', '', '', '', '', 'Ya', 'Ya', 'Ya', 'Ya', '', '', 'Ya', '', '', '', '', '', '', '', '', 'Ya', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ya', 'Ya', '', '', '', '', 'Ya', '', '', '', 'Ya', '', '', '', '', '', '', '', '', '', 0, '<ol>\r\n <li>Setiap calon peserta didik wajib mengisi formulir pendaftaran dengan lengkap.</li>\r\n <li>Data-data yang diisikan pada formulir PPDB Online harus sesuai dengan data asli dan benar adanya.</li>\r\n <li>Calon peserta didik yang sudah mendaftar secara online wajib mencetak bukti pendaftaran sebanyak dua rangkap sebagai bukti pendaftaran dan dilampirkan dalam persyaratan yang diminta oleh Panitia PPDB.</li>\r\n <li>Calon peserta didik yang sudah mendaftarkan diri melalui PPDB Online wajib menyerahkan dokumen persyaratan yang sudah ditentukan oleh Panitia PPDB.</li>\r\n <li>Calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '', '', '', '', '', '', '3', '13-0002-', '13-0002-', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'Calon Peserta Didik'),
(3, 'panitia', 'Panitia PPDB'),
(10, 'bendahara', 'Bendahara PPDB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 109),
(3, 109),
(1, 114),
(3, 114),
(1, 110),
(3, 110),
(2, 122),
(2, 115),
(2, 112),
(1, 125),
(3, 125),
(1, 126),
(1, 43),
(1, 44),
(1, 105),
(1, 107),
(1, 113),
(1, 111),
(1, 127),
(1, 106),
(1, 104),
(1, 108),
(1, 132),
(1, 8),
(1, 131),
(3, 131),
(2, 136),
(1, 121),
(3, 121),
(1, 135),
(1, 138),
(3, 138),
(1, 137),
(3, 137),
(1, 140),
(1, 118),
(3, 118),
(1, 1),
(2, 1),
(3, 1),
(10, 1),
(1, 3),
(2, 3),
(3, 3),
(10, 3),
(1, 141),
(10, 141),
(2, 142),
(1, 139),
(3, 139),
(1, 116),
(1, 102),
(1, 103),
(1, 143),
(3, 143),
(1, 117);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `kode_sekolah` varchar(9) NOT NULL,
  `npsn` varchar(8) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kepala_sekolah` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `maptype` varchar(10) NOT NULL,
  `radius` int(10) NOT NULL,
  `gis` varchar(5) NOT NULL,
  `apikey` varchar(200) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `bglogin` varchar(50) NOT NULL,
  `status_pendaftaran` varchar(5) NOT NULL,
  `status_hasil` varchar(5) NOT NULL,
  `status_daftar_ulang` varchar(5) NOT NULL,
  `penomoran` varchar(10) NOT NULL,
  `stempel` varchar(50) NOT NULL,
  `ttd` varchar(50) NOT NULL,
  `header` varchar(50) NOT NULL,
  `hstempel` varchar(3) NOT NULL,
  `httd` varchar(3) NOT NULL,
  `sstempel` varchar(5) NOT NULL,
  `sttd` varchar(5) NOT NULL,
  `intergramid` varchar(50) NOT NULL,
  `maps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_sekolah`, `kode_sekolah`, `npsn`, `status`, `jenjang`, `alamat`, `kepala_sekolah`, `nip`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `no_telepon`, `website`, `email`, `latitude`, `longitude`, `maptype`, `radius`, `gis`, `apikey`, `logo`, `bglogin`, `status_pendaftaran`, `status_hasil`, `status_daftar_ulang`, `penomoran`, `stempel`, `ttd`, `header`, `hstempel`, `httd`, `sstempel`, `sttd`, `intergramid`, `maps`) VALUES
(1, 'SMP ISLAM TERPADU NURUL HUDA', '12130002', '69993153', 'SWASTA', 'SMP/MTs', 'Jl. Sukasari Ds. Margajaya RT 026 RW 011', 'Aam Masbihin, S.Ag.', '196508151986092003', 'Margajaya', 'Pamarican', 'Ciamis', 'Jawa Barat', '46382', '07257576180', 'https://ppdb.smpitnudapamarican.sch.id', 'smpit.nuda2017@gmail.com', '-4.6218115031750004', '105.10061681270601', 'ROADMAP', 3000, '', 'AIzaSyBchRI_21q70ikqLxY-SxgiRJUY6BWMav8', 'LOGO_SMPIT_PMC.png', 'background.png', 'Ya', 'Ya', 'Ya', 'otomatis', 'stempel.png', 'qrcode_kepsek.png', 'header.png', '110', '80', '', 'Ya', '926607136', 'OpenStreetMap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur`
--

CREATE TABLE `jalur` (
  `id_jalur` int(10) NOT NULL,
  `jalur` varchar(50) NOT NULL,
  `persentase` int(3) NOT NULL,
  `status_jalur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jalur`
--

INSERT INTO `jalur` (`id_jalur`, `jalur`, `persentase`, `status_jalur`) VALUES
(1, 'Zonasi', 60, 'Aktif'),
(2, 'Afirmasi', 15, 'Aktif'),
(3, 'Perpindahan', 5, 'Aktif'),
(4, 'Prestasi', 20, 'Aktif'),
(14, 'Reguler', 100, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jarak`
--

CREATE TABLE `jarak` (
  `id_jarak` int(10) NOT NULL,
  `jarak` varchar(50) NOT NULL,
  `skor_jarak` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jarak`
--

INSERT INTO `jarak` (`id_jarak`, `jarak`, `skor_jarak`) VALUES
(1, '0 - 250 meter', '500'),
(2, '251 - 500 meter', '490'),
(3, '501 - 750 meter', '480'),
(4, '751 - 1000 meter', '470'),
(5, '1001 - 1250 meter', '460'),
(6, '1251 - 1500 meter', '450'),
(7, '1501 - 1750 meter', '440'),
(8, '1751 - 2000 meter', '430'),
(9, '2001 - 2250 meter', '420'),
(10, '2251 - 2500 meter', '410'),
(11, '2501 - 2750 meter', '400'),
(12, '2751 - 3000 meter', '390'),
(13, '3001 - 3250 meter', '380'),
(14, '3251 - 3500 meter', '370'),
(15, '3501 - 3750 meter', '360'),
(16, '3751 - 4000 meter', '350'),
(17, '4001 - 4250 meter', '340'),
(18, '4251 - 4500 meter', '330'),
(19, '4501 - 4750 meter', '320'),
(20, '4751 - 5000 meter', '310'),
(21, '5001 - 5250 meter', '300'),
(22, '5251 - 5500 meter', '290'),
(23, '5501 - 5750 meter', '280'),
(24, '5751 - 6000 meter', '270'),
(25, '6001 - 6250 meter', '260'),
(26, '6251 - 6500 meter', '250'),
(27, '6501 - 6750 meter', '240'),
(28, '6751 - 7000 meter', '230'),
(29, '7001 - 7250 meter', '220'),
(30, '7251 - 7500 meter', '210'),
(31, '7501 - 7750 meter', '200'),
(32, '7751 - 8000 meter', '190'),
(33, '8001 - 8250 meter', '180'),
(34, '8251 - 8500 meter', '170'),
(35, '8501 - 8750 meter', '160'),
(36, '8751 - 9000 meter', '150'),
(37, '9001 - 9250 meter', '140'),
(38, '9251 - 9500 meter', '130'),
(39, '9501 - 9750 meter', '120'),
(40, '9751 - 10000 meter', '110'),
(41, 'Lebih dari 10000 meter', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_wawancara`
--

CREATE TABLE `jawaban_wawancara` (
  `id_jawaban` int(11) NOT NULL,
  `id_peserta` int(10) NOT NULL,
  `id_wawancara` int(5) NOT NULL,
  `jawaban` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(5) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `kuota_jurusan` varchar(3) NOT NULL,
  `status_jurusan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `bidang_keahlian`, `nama_jurusan`, `kuota_jurusan`, `status_jurusan`) VALUES
(1, 'Umum', 'Umum', '288', 'Tidak Aktif'),
(2, 'Teknik', 'Teknik Kendaraan Ringan Otomotif', '100', 'Aktif'),
(3, 'Teknik', 'Rekayasa Perangkat Lunak', '120', 'Aktif'),
(5, 'Teknik', 'Teknik Komputer dan Jaringan', '90', 'Tidak Aktif'),
(6, 'Unggulan', 'Tahfidzul Qur’an MIPA (Pondok)', '72', 'Tidak Aktif'),
(7, 'Unggulan', 'Riset MIPA (Pondok dan Non Pondok)', '72', 'Tidak Aktif'),
(8, 'Unggulan', 'Riset IPS (Non Pondok)', '36', 'Tidak Aktif'),
(9, 'Reguler', 'MIPA', '144', 'Tidak Aktif'),
(10, 'Reguler', 'IPS', '108', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_user` varchar(50) NOT NULL,
  `log_tipe` int(11) NOT NULL,
  `log_ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `log_time`, `log_user`, `log_tipe`, `log_ket`) VALUES
(1, '2023-03-26 12:09:06', 'admin', 4, 'Menghapus data tabel log'),
(2, '2023-03-26 12:09:09', 'admin', 4, 'Menghapus semua file'),
(3, '2023-03-26 12:09:52', 'admin', 1, 'Logout'),
(4, '2023-04-02 02:30:38', 'admin', 0, 'Login'),
(5, '2023-04-02 02:33:44', 'admin', 3, 'Update data pengaturan'),
(6, '2023-04-02 02:35:20', 'admin', 1, 'Logout'),
(7, '2023-04-02 02:46:07', 'admin', 0, 'Login'),
(8, '2023-04-02 02:47:04', 'admin', 0, 'Login'),
(9, '2023-04-02 03:14:39', 'admin', 1, 'Logout'),
(10, '2023-04-02 03:14:50', 'bendahara', 0, 'Login'),
(11, '2023-04-02 03:15:13', 'bendahara', 1, 'Logout'),
(12, '2023-04-02 03:15:26', 'panitia', 0, 'Login'),
(13, '2023-04-02 03:15:41', 'panitia', 1, 'Logout'),
(14, '2023-04-02 03:15:52', 'admin', 0, 'Login'),
(15, '2023-04-02 03:16:17', 'admin', 1, 'Logout');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail`
--

CREATE TABLE `mail` (
  `id_mail` int(5) NOT NULL,
  `host` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `smtpsecure` varchar(5) NOT NULL,
  `port` varchar(10) NOT NULL,
  `url_server` varchar(100) NOT NULL,
  `token_api` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mail`
--

INSERT INTO `mail` (`id_mail`, `host`, `username`, `password`, `smtpsecure`, `port`, `url_server`, `token_api`) VALUES
(1, 'smtp.gmail.com', 'ppdb.smpn2tubaba@gmail.com', 'bacapanduandibawah', 'ssl', '465', 'https://jogja.wablas.com/api/send-message', '5Yz5G40hXh1rYxuQ5Tpyp2ZtUL0cDEWHV7o4eWYLNr31Ih7mFfpZU2ZT7OB2aXvS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(8, 34, 3, 132, 'fas fa-angle-double-right', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(43, 35, 2, 1, 'fas fa-user-secret', 'Manajemen User', '#', '#', 1),
(44, 37, 3, 43, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(102, 11, 3, 103, 'fas fa-angle-double-right', 'Asal Sekolah', 'sekolah', '#', 1),
(103, 7, 2, 1, 'fas fa-server', 'Referensi', '#', '#', 1),
(104, 12, 3, 103, 'fas fa-angle-double-right', 'Jalur Pendaftaran', 'jalur', '#', 1),
(105, 10, 3, 103, 'fas fa-angle-double-right', 'Tahun Penerimaan', 'tahunpelajaran', '#', 1),
(106, 8, 3, 103, 'fas fa-angle-double-right', 'Formulir PPDB', 'formulir', '#', 1),
(107, 14, 3, 103, 'fas fa-angle-double-right', 'Poin Jarak', 'jarak', '#', 1),
(108, 13, 3, 103, 'fas fa-angle-double-right', 'Bobot Jalur', 'bobot', '#', 1),
(109, 18, 2, 1, 'fas fa-user-alt', 'Data Peserta', '#', '#', 1),
(110, 19, 3, 109, 'fas fa-angle-double-right', 'List Peserta', 'peserta', '#', 1),
(111, 16, 3, 103, 'fas fa-angle-double-right', 'Jurusan', 'jurusan', '#', 1),
(112, 2, 2, 1, 'fas fa-file', 'Formulir Pendaftaran', 'member/formcreate', '#', 1),
(113, 15, 3, 103, 'fas fa-angle-double-right', 'Poin Prestasi', 'prestasi', '#', 1),
(114, 20, 3, 109, 'fas fa-angle-double-right', 'Prestasi Peserta', 'prestasipeserta', '#', 1),
(115, 4, 2, 1, 'fas fa-user-graduate', 'Prestasi Peserta', 'member/prestasipeserta', '#', 1),
(116, 30, 2, 1, 'fas fa-bullhorn', 'Pengumuman', 'pengumuman', '#', 1),
(117, 33, 3, 132, 'fas fa-angle-double-right', 'Identitas', 'pengaturan', '#', 1),
(118, 29, 2, 1, 'fas fa-chart-bar', 'Statistik', 'statistik', '#', 1),
(121, 21, 3, 109, 'fas fa-angle-double-right', 'Berkas Peserta', 'berkas', '#', 1),
(122, 5, 2, 1, 'fas fa-copy', 'Berkas Pendukung', 'member/berkas', '#', 1),
(125, 26, 3, 139, 'fas fa-angle-double-right', 'Rekap Nilai', 'peserta/nilai_peserta', '#', 1),
(126, 36, 3, 43, 'fas fa-angle-double-right', 'List Users', 'users', '1', 1),
(127, 31, 2, 1, 'fas fa-history', 'Log Pengguna', 'log', '#', 1),
(131, 24, 3, 139, 'fas fa-angle-double-right', 'Nilai Rapor Semester', 'raporsemester', '#', 1),
(132, 32, 2, 1, 'fas fa-cog', 'Pengaturan', '#', '#', 1),
(135, 9, 3, 103, 'fas fa-angle-double-right', 'Formulir Wawancara', 'wawancara', '#', 1),
(136, 3, 2, 1, 'fas fa-clipboard-list', 'Formulir Wawancara', 'member/formwawancara', '#', 1),
(137, 22, 3, 109, 'fas fa-angle-double-right', 'Wawancara Peserta', 'jawaban_wawancara', '#', 1),
(138, 25, 3, 139, 'fas fa-angle-double-right', 'Nilai Tes dan Wawancara', 'tesdanwawancara', '#', 1),
(139, 23, 2, 1, 'fas fa-th-list', 'Data NIlai', '#', '#', 1),
(140, 17, 3, 103, 'fas fa-angle-double-right', 'Biaya', 'biaya', '#', 1),
(141, 27, 2, 1, 'fab fa-cc-mastercard', 'Pembayaran', 'pembayaran', '#', 1),
(142, 6, 2, 1, 'fab fa-cc-mastercard', 'Pembayaran', 'member/pembayaran', '#', 1),
(143, 28, 2, 1, 'fas fa-qrcode', 'Pindai QRCode', 'peserta/pindai', '#', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `id_users` int(11) NOT NULL,
  `pembayaran` varchar(150) NOT NULL,
  `jumlah_bayar` varchar(7) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `jenis_bayar` varchar(15) NOT NULL,
  `status_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `type`, `judul`, `text`, `date`) VALUES
(2, 'Member', 'Syarat Pendaftaran', '<ol>\r\n <li>Mengisi formulir yang telah disediakan melalui online <a href=\"https://ppdb.smpn2tulangbawangbarat.sch.id\">https://ppdb.smpn2tulangbawangbarat.sch.id</a>.</li>\r\n <li>Usia maksimal 15 tahun (1 Juli 2022).</li>\r\n <li>Fotocopy legalisir Surat Keterangan Lulus 2 lembar.</li>\r\n <li>Fotocopy Kartu Keluarga/Surat Keterangan Domisili (minimal sudah 1 tahun) legalisir 2 lembar.</li>\r\n <li>Fotocopy KTP Orangtua 2 lembar.</li>\r\n <li>Fotocopy Akta Kelahiran 2 lembar.</li>\r\n <li>Photo berwarna 3x4 sebanyak 4 lembar.</li>\r\n <li>Kartu bantuan sosial (PKH/KPS/KIP/SKTM) khusus untuk jalur afirmasi.</li>\r\n <li>Surat penugasan dari instansi, lembaga, kantor atau perusahaan yang mempekerjakan khusus untuk jalur perpindahan tugas orangtua.</li>\r\n <li>Bukti prestasi nilai rapor SD kelas 4, 5, dan 6 semester 1 atau hasil perlombaan akademik/non akademik tingkat Nasional/Provinsi/Kabupaten/Kecamatan/Sekolah/Hafiz Al Quran yang diterbitkan minimal 6 bulan dan maksimal 3 tahun khusus untuk jalur prestasi.</li>\r\n <li>Formulir Pendaftaran (2 rangkap) beserta syarat-syarat yang diminta dimasukkan ke dalam stofmap folio (forte/biola) 2 buah dan diserahkan ke sekolah.\r\n <ul>\r\n  <li>Laki-laki warna biru.</li>\r\n  <li>Perempuan warna merah.</li>\r\n </ul>\r\n </li>\r\n <li>Menunjukkan akta kelahiran, kartu tanda penduduk orangtua serta kartu keluarga asli calon peserta didik.</li>\r\n <li>Calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '2023-02-06 01:38:17'),
(3, 'FormulirPD', 'Catatan formulir pendaftaran', '<p>Catatan :</p>\r\n\r\n<ol>\r\n <li>Yang bertandatangan Orangtua/Wali atau Siswa bertanggung jawab secara hukum terhadap kebenaran data yang tercantum.</li>\r\n <li>Formulir Pendaftaran di cetak sebanyak dua rangkap.</li>\r\n <li>Calon Peserta Didik Baru <strong>Wajib</strong> mencantumkan <strong>Nomor Induk Siswa Nasional (NISN)</strong>.</li>\r\n <li>Pengumuman Calon Peserta Didik Baru yang dinyatakan diterima tanggal 04 Juli 2022.</li>\r\n <li>Daftar ulang bagi calon peserta didik baru yang diterima tanggal 05 s.d 06 Juli 2022 pukul 08.00 sd 12.00 WIB.</li>\r\n <li>Peserta yang tidak melakukan <strong>DAFTAR ULANG </strong>sesuai ketentuan dinyatakan <strong>MENGUNDURKAN DIRI</strong>.</li>\r\n <li>Calon Peserta Didik Baru yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '2023-02-26 15:26:45'),
(5, 'SKL', '420/     /421.3/TBB/2022', '<p>Ketentuan Daftar Ulang :</p>\r\n\r\n<ul>\r\n <li>Daftar ulang dilaksanakan tanggal 05 July 2022 s.d 06 July 2022.</li>\r\n <li>Waktu daftar ulang dimulai pukul 08.00 s.d 12.00 WIB.</li>\r\n <li>Peserta yang tidak melakukan <strong>DAFTAR ULANG</strong> sesuai ketentuan dinyatakan <strong>MENGUNDURKAN DIRI</strong>.</li>\r\n</ul>', '2023-02-26 15:25:53'),
(6, 'Publik', 'Alur PPDB Online', '<ol>\r\n <li>Buka alamat website <a href=\"https://ppdb.smpn2tulangbawangbarat.sch.id\">https://ppdb.smpn2tulangbawangbarat.sch.id</a>.</li>\r\n <li>Pilih buat akun, isikan nama peserta, No. HP/WA, NISN, serta kata sandi/password</li>\r\n <li>Login menggunakan NISN dan kata sandi/password yang telah dibuat sebelumnya</li>\r\n <li>Isi formulir pendaftaran secara lengkap</li>\r\n <li>Tambahkan prestasi akademik/non akademik khusus jalur prestasi</li>\r\n <li>Upload berkas persyaratan *</li>\r\n <li>Cetak bukti pendaftaran</li>\r\n <li>Proses verifikasi oleh panitia PPDB</li>\r\n <li>Pengumuman hasil seleksi secara online dapat dilihat di akun masing-masing peserta</li>\r\n <li>Peserta yang dinyatakan diterima dapat melakukan daftar ulang secara online melalui akun masing-masing peserta</li>\r\n <li>Calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun</li>\r\n</ol>', '2023-02-26 16:53:21'),
(8, 'Publik', 'Syarat Pendaftaran', '<ol>\r\n <li>Mengisi formulir yang telah disediakan melalui online <a href=\"https://ppdb.smpn2tulangbawangbarat.sch.id\">https://ppdb.smpn2tulangbawangbarat.sch.id</a>.</li>\r\n <li>Usia maksimal 15 tahun (1 Juli 2022).</li>\r\n <li>Fotocopy legalisir Surat Keterangan Lulus 2 lembar.</li>\r\n <li>Fotocopy Kartu Keluarga/Surat Keterangan Domisili (minimal sudah 1 tahun) legalisir 2 lembar.</li>\r\n <li>Fotocopy KTP Orangtua 2 lembar.</li>\r\n <li>Fotocopy Akta Kelahiran 2 lembar.</li>\r\n <li>Photo berwarna 3x4 sebanyak 4 lembar.</li>\r\n <li>Kartu bantuan sosial (PKH/KPS/KIP/SKTM) khusus untuk jalur afirmasi.</li>\r\n <li>Surat penugasan dari instansi, lembaga, kantor atau perusahaan yang mempekerjakan khusus untuk jalur perpindahan tugas orangtua.</li>\r\n <li>Bukti prestasi nilai rapor SD kelas 4, 5, dan 6 semester 1 atau hasil perlombaan akademik/non akademik tingkat Nasional/Provinsi/Kabupaten/Kecamatan/Sekolah/Hafiz Al Quran yang diterbitkan minimal 6 bulan dan maksimal 3 tahun khusus untuk jalur prestasi.</li>\r\n <li>Formulir Pendaftaran (2 rangkap) beserta syarat-syarat yang diminta dimasukkan ke dalam stofmap folio (forte/biola) 2 buah dan diserahkan ke sekolah.\r\n <ul>\r\n  <li>Laki-laki warna biru.</li>\r\n  <li>Perempuan warna merah.</li>\r\n </ul>\r\n </li>\r\n <li>Menunjukkan akta kelahiran, kartu tanda penduduk orangtua serta kartu keluarga asli calon peserta didik.</li>\r\n <li>Calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '2023-02-06 01:38:45'),
(10, 'Rapor', 'Nilai rapor mapel per semester yang diminta panitia', '<p>Petunjuk pengisian nilai rapor semester 1 sd 5 :</p>\r\n\r\n<ol>\r\n <li>Mata pelajaran yang wajib di isi nilai rapor per semesternya adalah :\r\n <ol>\r\n  <li>Matematika</li>\r\n  <li>Bahasa Indonesia</li>\r\n  <li>Ilmu Pengetahuan Alam</li>\r\n  <li>Bahasa Inggris</li>\r\n </ol>\r\n </li>\r\n <li>Pastikan semua nilai terisi dengan benar dan sesuai dengan nilai rapor yang dimiliki.</li>\r\n <li>Gunakan titik untuk nilai desimal, contoh : 80.45</li>\r\n</ol>', '2022-06-26 08:36:58'),
(11, 'FormulirDU', 'Catatan formulir daftar ulang', '<p>Catatan :</p>\r\n\r\n<ol>\r\n <li>Yang bertandatangan Orangtua/Wali atau Siswa bertanggung jawab secara hukum terhadap kebenaran data yang tercantum.</li>\r\n <li>Daftar ulang bagi calon peserta didik baru yang diterima tanggal 05 s.d 06 Juli 2022 pukul 08.00 sd 12.00 WIB.</li>\r\n <li>Peserta yang tidak melakukan <strong>DAFTAR ULANG </strong>sesuai ketentuan dinyatakan <strong>MENGUNDURKAN DIRI</strong>.</li>\r\n <li>Calon Peserta Didik Baru yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '2023-02-26 15:24:28'),
(12, 'FormulirW', 'Catatan formulir wawancara', '<p>Catatan :</p>\r\n\r\n<ol>\r\n <li>Yang bertandatangan Orangtua/Wali atau Siswa bertanggung jawab secara hukum terhadap kebenaran data yang tercantum.</li>\r\n <li>Calon Peserta Didik Baru yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '2023-02-26 15:24:01'),
(13, 'Pembayaran', 'Informasi Pembayaran', '<p>Silahkan melakukan proses pembayaran melalui transfer ke No. Rekening dibawah ini :</p>\r\n\r\n<p>No. Rekening BRI : 0000-0-000-0000-00</p>\r\n\r\n<p>an. SMPN2Tubaba</p>\r\n\r\n<p>Setelah melakukan proses pembayaran harap melakukan konfirmasi pembayaran di menu pembayaran, setelah itu akan dilakukan verifikasi oleh panitia PPDB.</p>', '2023-02-06 01:32:56'),
(15, 'Member', 'Alur PPDB Online', '<ol>\r\n <li>Buka alamat website <a href=\"https://ppdb.smpn2tulangbawangbarat.sch.id\">https://ppdb.smpn2tulangbawangbarat.sch.id</a>.</li>\r\n <li>Pilih buat akun, isikan nama peserta, No. HP/WA, NISN, serta kata sandi/password</li>\r\n <li>Login menggunakan NISN dan kata sandi/password yang telah dibuat sebelumnya</li>\r\n <li>Isi formulir pendaftaran secara lengkap</li>\r\n <li>Tambahkan prestasi akademik/non akademik khusus jalur prestasi</li>\r\n <li>Upload berkas persyaratan *</li>\r\n <li>Cetak bukti pendaftaran</li>\r\n <li>Proses verifikasi oleh panitia PPDB</li>\r\n <li>Pengumuman hasil seleksi secara online dapat dilihat di akun masing-masing peserta</li>\r\n <li>Peserta yang dinyatakan diterima dapat melakukan daftar ulang secara online melalui akun masing-masing peserta</li>\r\n <li>Calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun</li>\r\n</ol>', '2023-02-26 16:52:19'),
(16, 'KartuTes', 'Jadwal Ujian Tes PPDB', '<h1>Jadwal Ujian Tes PPDB</h1>\r\n\r\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td>Tanggal</td>\r\n   <td>Waktu</td>\r\n   <td>Mapel</td>\r\n   <td>Tempat</td>\r\n  </tr>\r\n  <tr>\r\n   <td>27 Maret 2023</td>\r\n   <td>08.00 sd 12.00</td>\r\n   <td>Umum</td>\r\n   <td>Gedung A</td>\r\n  </tr>\r\n  <tr>\r\n   <td>xxxx</td>\r\n   <td>xxxxx</td>\r\n   <td>xxxx</td>\r\n   <td>xxxxx</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p> </p>\r\n\r\n<p>Catatan :</p>\r\n\r\n<ul>\r\n <li>Selama ujian kartu peserta harus dibawa</li>\r\n</ul>', '2023-02-27 15:36:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(10) NOT NULL,
  `no_pendaftaran` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_tahun` int(4) NOT NULL,
  `id_jalur` int(10) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_registrasi_akta_lahir` varchar(25) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(16) NOT NULL,
  `berkebutuhan_khusus` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `nama_dusun` varchar(50) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `tempat_tinggal` varchar(25) NOT NULL,
  `moda_transportasi` varchar(50) NOT NULL,
  `no_kks` varchar(6) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `penerima_kps_pkh` varchar(5) NOT NULL,
  `no_kps_pkh` varchar(20) NOT NULL,
  `penerima_kip` varchar(5) NOT NULL,
  `no_kip` varchar(16) NOT NULL,
  `nama_tertera_di_kip` varchar(50) NOT NULL,
  `terima_fisik_kartu_kip` varchar(5) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `tempat_lahir_ayah` varchar(50) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `pendidikan_ayah` varchar(15) NOT NULL,
  `pekerjaan_ayah` varchar(15) NOT NULL,
  `penghasilan_bulanan_ayah` varchar(25) NOT NULL,
  `berkebutuhan_khusus_ayah` varchar(50) NOT NULL,
  `no_hp_ayah` varchar(12) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `tempat_lahir_ibu` varchar(50) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `pendidikan_ibu` varchar(15) NOT NULL,
  `pekerjaan_ibu` varchar(15) NOT NULL,
  `penghasilan_bulanan_ibu` varchar(25) NOT NULL,
  `berkebutuhan_khusus_ibu` varchar(50) NOT NULL,
  `no_hp_ibu` varchar(12) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `nik_wali` varchar(16) NOT NULL,
  `tempat_lahir_wali` varchar(50) NOT NULL,
  `tanggal_lahir_wali` date NOT NULL,
  `pendidikan_wali` varchar(15) NOT NULL,
  `pekerjaan_wali` varchar(15) NOT NULL,
  `penghasilan_bulanan_wali` varchar(25) NOT NULL,
  `no_hp_wali` varchar(12) NOT NULL,
  `no_telepon_rumah` varchar(10) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `tinggi_badan` varchar(3) NOT NULL,
  `berat_badan` varchar(3) NOT NULL,
  `lingkar_kepala` varchar(3) NOT NULL,
  `id_jarak` int(10) NOT NULL,
  `waktu_tempuh` varchar(20) NOT NULL,
  `jumlah_saudara_kandung` varchar(2) NOT NULL,
  `id_jurusan` int(5) NOT NULL,
  `pilihan_dua` varchar(100) NOT NULL,
  `id_sekolah` int(10) NOT NULL,
  `akreditasi` varchar(20) NOT NULL,
  `no_un` varchar(25) NOT NULL,
  `no_seri_ijazah` varchar(25) NOT NULL,
  `no_seri_skhu` varchar(25) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `nilai_rapor` varchar(5) DEFAULT NULL,
  `nilai_usbn` varchar(5) DEFAULT NULL,
  `nilai_unbk_unkp` varchar(5) DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `status_hasil` varchar(25) NOT NULL,
  `status_daftar_ulang` varchar(25) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qrcode` varchar(100) NOT NULL,
  `pilihan_sekolah_lain` varchar(100) NOT NULL,
  `catatan` longtext NOT NULL,
  `nilai_akhir` varchar(6) DEFAULT NULL,
  `tgl_daftar_ulang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(10) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `juara` varchar(2) NOT NULL,
  `skor_prestasi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `tingkat`, `kategori`, `juara`, `skor_prestasi`) VALUES
(12, 'Kecamatan', 'Beregu', '3', '70'),
(13, 'Kecamatan', 'Beregu', '2', '80'),
(14, 'Kecamatan', 'Beregu', '1', '90'),
(15, 'Kecamatan', 'Perorangan', '3', '100'),
(16, 'Kecamatan', 'Perorangan', '2', '110'),
(17, 'Kecamatan', 'Perorangan', '1', '120'),
(18, 'Kabupaten', 'Beregu', '3', '130'),
(19, 'Kabupaten', 'Beregu', '2', '140'),
(20, 'Kabupaten', 'Beregu', '1', '150'),
(21, 'Kabupaten', 'Perorangan', '3', '160'),
(22, 'Kabupaten', 'Perorangan', '2', '170'),
(23, 'Kabupaten', 'Perorangan', '1', '180'),
(24, 'Propinsi', 'Beregu', '3', '190'),
(25, 'Propinsi', 'Beregu', '2', '200'),
(26, 'Propinsi', 'Beregu', '1', '210'),
(27, 'Propinsi', 'Perorangan', '3', '220'),
(28, 'Propinsi', 'Perorangan', '2', '230'),
(29, 'Propinsi', 'Perorangan', '1', '240'),
(30, 'Nasional', 'Beregu', '3', '250'),
(31, 'Nasional', 'Beregu', '2', '260'),
(32, 'Nasional', 'Beregu', '1', '270'),
(33, 'Nasional', 'Perorangan', '3', '280'),
(34, 'Nasional', 'Perorangan', '2', '290'),
(35, 'Nasional', 'Perorangan', '1', '300'),
(36, 'Hafiz Al Quran', 'Beregu', '3', '130'),
(37, 'Hafiz Al Quran', 'Beregu', '2', '140'),
(38, 'Hafiz Al Quran', 'Beregu', '1', '150'),
(39, 'Hafiz Al Quran', 'Perorangan', '3', '160'),
(40, 'Hafiz Al Quran', 'Perorangan', '2', '170'),
(41, 'Hafiz Al Quran', 'Perorangan', '1', '180'),
(42, 'Sekolah', 'Beregu', '3', '10'),
(43, 'Sekolah', 'Beregu', '2', '20'),
(44, 'Sekolah', 'Beregu', '1', '30'),
(45, 'Sekolah', 'Perorangan', '3', '40'),
(46, 'Sekolah', 'Perorangan', '2', '50'),
(47, 'Sekolah', 'Perorangan', '1', '60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasipeserta`
--

CREATE TABLE `prestasipeserta` (
  `id_prestasipeserta` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `penyelenggara` varchar(150) NOT NULL,
  `id_peserta` int(10) NOT NULL,
  `id_prestasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raporsemester`
--

CREATE TABLE `raporsemester` (
  `id_raporsemester` int(10) NOT NULL,
  `id_peserta` int(6) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `satu` varchar(6) DEFAULT NULL,
  `dua` varchar(6) DEFAULT NULL,
  `tiga` varchar(6) DEFAULT NULL,
  `empat` varchar(6) DEFAULT NULL,
  `lima` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(10) NOT NULL,
  `npsn_sekolah` varchar(10) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `status_sekolah` varchar(10) NOT NULL,
  `kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `npsn_sekolah`, `asal_sekolah`, `alamat_sekolah`, `kelurahan`, `status_sekolah`, `kecamatan`) VALUES
(1, '60705951', 'MIS BUSTANUL ULUM', 'Jalan Poros Inhutani Tiyuh Sakti Jaya', 'Sakti Jaya', 'SWASTA', 'Batu Putih'),
(2, '69726140', 'MIS DARUL ULUM', 'Jalan Poros 2', 'Marga Sari', 'SWASTA', 'Batu Putih'),
(3, '60705952', 'MIS HIDAYATUL MUBTADIIN', 'Jalan Raden Intan RT 05/02', 'Margo Mulyo', 'SWASTA', 'Batu Putih'),
(4, '69854315', 'MIS SABILIL MUHTADIN', 'Jalan Poros 02', 'Toto Makmur', 'SWASTA', 'Batu Putih'),
(5, '10809616', 'SDN 10 Batu Putih', 'TIYUH SIDO MAKMUR', 'Sido Makmur', 'NEGERI', 'Batu Putih'),
(6, '10808680', 'SDN 9 Batu Putih', 'Panca Marga', 'Panca Marga', 'NEGERI', 'Batu Putih'),
(7, '10808032', 'SDN 8 Batu Putih', 'Margo Dadi', 'Margo Dadi', 'NEGERI', 'Batu Putih'),
(8, '69775301', 'SDN 7 Batu Putih', 'Margo Mulyo Kec.batu putih', 'Margo Mulyo', 'NEGERI', 'Batu Putih'),
(9, '10808136', 'SDN 6 Batu Putih', 'Jln. POROS 1 TIYUH TOTO MAKMUR', 'Toto Makmur', 'NEGERI', 'Batu Putih'),
(10, '10809635', 'SDN 5 Batu Putih', 'Jln. POROS TIYUH TOTO WONODADI', 'Toto Wonodadi', 'NEGERI', 'Batu Putih'),
(11, '10808744', 'SDN 4 Batu Putih', 'Toto Katon', 'Toto Katon', 'NEGERI', 'Batu Putih'),
(12, '10808033', 'SDN 3 Batu Putih', 'Mulyo Sari', 'Mulyo Sari', 'NEGERI', 'Batu Putih'),
(13, '10808648', 'SDN 2 Batu Putih', 'Jln. Marga Sari', 'Marga Sari', 'NEGERI', 'Batu Putih'),
(14, '10808700', 'SDN 1 Batu Putih', 'Sakti Jaya', 'Sakti Jaya', 'NEGERI', 'Batu Putih'),
(15, '10808212', 'SD S KASIH ABADI', 'Jl Poros Gang 3', 'Mulya Jaya', 'SWASTA', 'Gunung Agung'),
(16, '10808749', 'SDN 20 Gunung Agung', 'Jalan. Sri Wijaya', 'Tri Tunggal Jaya', 'NEGERI', 'Gunung Agung'),
(17, '10810376', 'SDN 19 Gunung Agung', 'Jaya Murni', 'Jaya Murni', 'NEGERI', 'Gunung Agung'),
(18, '10809668', 'SDN 18 Gunung Agung', 'Jalan Kumboyono', 'Suka Jaya', 'NEGERI', 'Gunung Agung'),
(19, '10809625', 'SDN 17 Gunung Agung', 'Jln. POROS TIYUH SUMBER REJEKI', 'Sumber Rejeki', 'NEGERI', 'Gunung Agung'),
(20, '10808715', 'SDN 16 Gunung Agung', 'Jln Poros Suka Jaya Indah 01', 'Suka Jaya', 'NEGERI', 'Gunung Agung'),
(21, '10808202', 'SDN 15 Gunung Agung', 'Jln. Poros Kampung Wonorejo', 'Wonorejo', 'NEGERI', 'Gunung Agung'),
(22, '10804016', 'SDN 14 Gunung Agung', 'Marga Jaya', 'Marga Jaya', 'NEGERI', 'Gunung Agung'),
(23, '69863229', 'SDN 13 Gunung Agung', 'Marga Jaya', 'Marga Jaya', 'NEGERI', 'Gunung Agung'),
(24, '10808072', 'SDN 12 Gunung Agung', 'Sumber Jaya', 'Sumber Jaya', 'NEGERI', 'Gunung Agung'),
(25, '10808723', 'SDN 11 Gunung Agung', 'Sumber Jaya', 'Sumber Jaya', 'NEGERI', 'Gunung Agung'),
(26, '10809658', 'SDN 10 Gunung Agung', 'TIYUH MULYA SARI', 'Mulya Sari', 'NEGERI', 'Gunung Agung'),
(27, '10809610', 'SDN 9 Gunung Agung ', 'Mulya Jaya', 'Mulya Jaya', 'NEGERI', 'Gunung Agung'),
(28, '10808669', 'SDN 8 Gunung Agung ', 'Kp. Mulya Jaya', 'Mulya Jaya', 'NEGERI', 'Gunung Agung'),
(29, '10809672', 'SDN 7 Gunung Agung ', 'Tiyuh Tunas Jaya', 'Tunas Jaya', 'NEGERI', 'Gunung Agung'),
(30, '10809636', 'SDN 6 Gunung Agung ', 'Jln. DWI KORA JAYA', 'Dwi Kora Jaya', 'NEGERI', 'Gunung Agung'),
(31, '10808750', 'SDN 5 Gunung Agung ', 'Tunas Jaya', 'Tunas Jaya', 'NEGERI', 'Gunung Agung'),
(32, '10808772', 'SDN 4 Gunung Agung ', 'Jl. Brawijaya', 'Bangun Jaya', 'NEGERI', 'Gunung Agung'),
(33, '10808564', 'SDN 3 Gunung Agung ', 'Bangun Jaya', 'Bangun Jaya', 'NEGERI', 'Gunung Agung'),
(34, '10808035', 'SDN 2 Gunung Agung ', 'MEKAR JAYA', 'Mekar Jaya', 'NEGERI', 'Gunung Agung'),
(35, '10808656', 'SDN 1 Gunung Agung ', 'JALAN POROS', 'Mekar Jaya', 'NEGERI', 'Gunung Agung'),
(36, '60705950', 'MIS AL HIDAYAH', 'Jalan Beringin No. 02', 'Setia Bumi', 'SWASTA', 'Gunung Terang'),
(37, '10808738', 'SD S TERANG AGUNG', 'Terang Agung', 'Terang Agung', 'SWASTA', 'Gunung Terang'),
(38, '10808005', 'SDN 12 Gunung Terang', 'Jln. POSOS 2 TIYUH TERANG BUMI AGUNG', 'Terang Bumi Agung', 'NEGERI', 'Gunung Terang'),
(39, '10808609', 'SDN 11 Gunung Terang', 'jln Ethanol Gunung Agung', 'Gunung Agung', 'NEGERI', 'Gunung Terang'),
(40, '10809671', 'SDN 10 Gunung Terang', 'Jln. POROS 1 TIYUH TOTO MULYO', 'Toto Mulyo', 'NEGERI', 'Gunung Terang'),
(41, '10808084', 'SDN 9 Gunung Terang ', 'Toto Mulyo', 'Toto Mulyo', 'NEGERI', 'Gunung Terang'),
(42, '10808743', 'SDN 8 Gunung Terang ', 'Jln. POROS 2 TIYUH MULYO JADI', 'Mulyo Jadi', 'NEGERI', 'Gunung Terang'),
(43, '10808147', 'SDN 7 Gunung Terang ', 'TERANG MULYA', 'Terang Mulya', 'NEGERI', 'Gunung Terang'),
(44, '10809648', 'SDN 6 Gunung Terang ', 'Jln. POROS TIYUH TERANG MAKMUR', 'Terang Makmur', 'NEGERI', 'Gunung Terang'),
(45, '10809597', 'SDN 5 Gunung Terang ', 'Gunung Terang', 'Gunung Terang', 'NEGERI', 'Gunung Terang'),
(46, '10808614', 'SDN 4 Gunung Terang ', 'Gunung Terang', 'Gunung Terang', 'NEGERI', 'Gunung Terang'),
(47, '10809664', 'SDN 3 Gunung Terang ', 'JLN Setia Bumi', 'Setia Bumi', 'NEGERI', 'Gunung Terang'),
(48, '10808062', 'SDN 2 Gunung Terang ', 'Setia Bumi', 'Setia Bumi', 'NEGERI', 'Gunung Terang'),
(49, '10808701', 'SDN 1 Gunung Terang ', 'Jln Poros Setia Bumi', 'Setia Bumi', 'NEGERI', 'Gunung Terang'),
(50, '69854313', 'MIS MAKARIMAL AKHLAK', 'Jalan Raya Blok J RT 013/04', 'Kibang Yekti Jaya', 'SWASTA', 'Lambu Kibang'),
(51, '10808675', 'SDN 14 Lambu Kibang', 'Pagar Jaya', 'Pagar Jaya', 'NEGERI', 'Lambu Kibang'),
(52, '10808657', 'SDN 13 Lambu Kibang', 'Jl. Raya Mekar Sari Jaya', 'Mekar Sari Jaya', 'NEGERI', 'Lambu Kibang'),
(53, '10808113', 'SDN 12 Lambu Kibang', 'KIBANG YEKTI JAYA', 'Kibang Yekti Jaya', 'NEGERI', 'Lambu Kibang'),
(54, '10809606', 'SDN 11 Lambu Kibang', 'Kibang Yekti Jaya', 'Kibang Yekti Jaya', 'NEGERI', 'Lambu Kibang'),
(55, '10808638', 'SDN 10 Lambu Kibang', 'Kibang Mulya Jaya', 'Kibang Mulya Jaya', 'NEGERI', 'Lambu Kibang'),
(56, '10808612', 'SDN 9 Lambu Kibang ', 'RT 007 RW 002', 'Gunung Sari', 'NEGERI', 'Lambu Kibang'),
(57, '10808725', 'SDN 8 Lambu Kibang ', 'Sumber Rejo', 'Sumber Rejo', 'NEGERI', 'Lambu Kibang'),
(58, '10809682', 'SDN 7 Lambu Kibang ', 'Kibang Budi Jaya', 'Kibang Budi Jaya', 'NEGERI', 'Lambu Kibang'),
(59, '10808112', 'SDN 6 Lambu Kibang ', 'Kibang Budi Jaya', 'Kibang Budi Jaya', 'NEGERI', 'Lambu Kibang'),
(60, '10809605', 'SDN 5 Lambu Kibang ', 'Lintas Unit 6', 'Kibang Budi Jaya', 'NEGERI', 'Lambu Kibang'),
(61, '10808636', 'SDN 4 Lambu Kibang ', 'Jl. Lintas Unit 6', 'Kibang Budi Jaya', 'NEGERI', 'Lambu Kibang'),
(62, '10808637', 'SDN 3 Lambu Kibang ', 'Jl.Ethanol No.100', 'Kibang Tri Jaya', 'NEGERI', 'Lambu Kibang'),
(63, '10809924', 'SDN 2 Lambu Kibang ', 'Jl. Plamboyan TIYUH GILANG TUNGGAL MAKARTA', 'Gilang Tunggal Makarta', 'NEGERI', 'Lambu Kibang'),
(64, '10808642', 'SDN 1 Lambu Kibang ', 'Jln Taruna Rt6 Rw 2', 'Lesung Bakti Jaya', 'NEGERI', 'Lambu Kibang'),
(65, '69754453', 'MIS AMANAH I', 'Jalan Putra Dewa', 'Bujung Sari Marga', 'SWASTA', 'Pagar Dewa'),
(66, '10812422', 'SDS Bujung Dewa', 'Bujung Dewa', 'Bujung Dewa', 'SWASTA', 'Pagar Dewa'),
(67, '69892758', 'SDN 4 Pagar Dewa', 'JL. PENDIDIKAN NO 156', 'Cahyou Randu', 'NEGERI', 'Pagar Dewa'),
(68, '10808558', 'SDN 3 Pagar Dewa', 'Bakem Suka Mulya Kec. Pagar Dewa Kab.Tulang Bawang Barat', 'Pagar Dewa Suka Mulya', 'NEGERI', 'Pagar Dewa'),
(69, '10809613', 'SDN 2 Pagar Dewa', 'Pagar Dewa', 'Pagar Dewa', 'NEGERI', 'Pagar Dewa'),
(70, '10808674', 'SDN 1 Pagar Dewa', 'Pagar Dewa', 'Pagar Dewa', 'NEGERI', 'Pagar Dewa'),
(71, '60705956', 'MIN 1 TULANG BAWANG BARAT', 'Jalan Dua Brebes RT 02 RW 07', 'Panaragan Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(72, '69726284', 'MIS AL FATAH PANARAGAN', 'Blok Muslimin', 'Panaragan', 'SWASTA', 'Tulang Bawang Tengah'),
(73, '69819484', 'MIS DARUL HASAN', 'Jl. Dua Panaragan Jaya RW 01, RT 02', 'Panaragan Jaya', 'SWASTA', 'Tulang Bawang Tengah'),
(74, '69854314', 'MIS DARUL ULUM', 'Jalan Gajah Mada No. 216', 'Panaragan Jaya', 'SWASTA', 'Tulang Bawang Tengah'),
(75, '60705957', 'MIS MATHOLIUL FALAH', 'Jalan Perintis No. 01', 'Candra Kencana', 'SWASTA', 'Tulang Bawang Tengah'),
(76, '60705958', 'MIS NURUL IMAN', 'Jalan Raya Pulung Kencana', 'Pulung Kencana', 'SWASTA', 'Tulang Bawang Tengah'),
(77, '69726139', 'MIS NURUL MUTTAQIN', 'Jalan Brawijaya No. 740 Suku IV/15', 'Penumangan Baru', 'SWASTA', 'Tulang Bawang Tengah'),
(78, '69831530', 'SD ISLAM TERPADU MADANI', 'Candra Mukti Rt 03, Rw 01', 'Candra Mukti', 'SWASTA', 'Tulang Bawang Tengah'),
(79, '10808224', 'SD MUHAMMADIYAH MULYA ASRI', 'Mulya Asri', 'Mulya Asri', 'SWASTA', 'Tulang Bawang Tengah'),
(80, '10808210', 'SD S ISLAM AL FURQON', 'Jl.pahlawan', 'Panaragan Jaya', 'SWASTA', 'Tulang Bawang Tengah'),
(81, '10808716', 'SDN 42 Tulang Bawang Tengah', 'Jl. Raya Sukamaju', 'Panaragan', 'NEGERI', 'Tulang Bawang Tengah'),
(82, '10808761', 'SDN 41 Tulang Bawang Tengah', 'Wonokerto', 'Wonokerto', 'NEGERI', 'Tulang Bawang Tengah'),
(83, '10809692', 'SDN 40 Tulang Bawang Tengah', 'Tiyuh Panaragan Jaya', 'Panaragan Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(84, '10809684', 'SDN 39 Tulang Bawang Tengah', 'Jln. PAHLAWAN RT 5 RW 2', 'Panaragan Jaya Indah', 'NEGERI', 'Tulang Bawang Tengah'),
(85, '10808124', 'SDN 38 Tulang Bawang Tengah', 'Jln. Arjuna 07 RT 03 RW 3', 'Panaragan Jaya Utama', 'NEGERI', 'Tulang Bawang Tengah'),
(86, '10809615', 'SDN 37 Tulang Bawang Tengah', 'Panaragan Jaya', 'Panaragan Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(87, '10808677', 'SDN 36 Tulang Bawang Tengah', 'JL.SILIWANGI RK 03 RT 03', 'Panaragan Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(88, '10809689', 'SDN 35 Tulang Bawang Tengah', 'Jln. NANGKA NO 2, Tiyuh Candra Jaya', 'Candra Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(89, '10809675', 'SDN 34 Tulang Bawang Tengah', 'Jln. Jendral Sudirman, Tiyuh Candra Mukti', 'Candra Mukti', 'NEGERI', 'Tulang Bawang Tengah'),
(90, '10809644', 'SDN 33 Tulang Bawang Tengah', 'Jln. Siliwangi Rt. 14 Rw. 04, Tiyuh Candra Jaya', 'Candra Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(91, '10808786', 'SDN 32 Tulang Bawang Tengah', 'RK 3 RT 15 Tiyuh Candra Mukti', 'Candra Mukti', 'NEGERI', 'Tulang Bawang Tengah'),
(92, '10808589', 'SDN 31 Tulang Bawang Tengah', 'Candra Kencana', 'Candra Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(93, '10809695', 'SDN 30 Tulang Bawang Tengah', 'Jln. Sindang Gayur, Tiyuh Tunas Asri', 'Tunas Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(94, '10808169', 'SDN 29 Tulang Bawang Tengah', 'Jln. Merdeka Timur No. 109, Tiyuh Mekar Asri', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(95, '10808164', 'SDN 28 Tulang Bawang Tengah', 'Jl. Raya Tiyuh Tunas Asri', 'Tunas Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(96, '10808153', 'SDN 27 Tulang Bawang Tengah', 'Jln. Peternakan, Tiyuh Marga Asri', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(97, '10808119', 'SDN 26 Tulang Bawang Tengah', 'Mulyo Asri', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(98, '10808041', 'SDN 25 Tulang Bawang Tengah', 'Jl. Sendang Gayur 96, Suku 3 Tiyuh Tunas Asri', 'Tunas Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(99, '10808668', 'SDN 24 Tulang Bawang Tengah', 'Jalan Merdeka Barat Gg. Kresna No.193', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(100, '10809694', 'SDN 23 Tulang Bawang Tengah', 'Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(101, '10809691', 'SDN 22 Tulang Bawang Tengah', 'Tiyuh Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(102, '10809683', 'SDN 21 Tulang Bawang Tengah', 'Mulya Jaya', 'Mulya Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(103, '10809659', 'SDN 20 Tulang Bawang Tengah', 'Jl. Diponegoro Tiyuh Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(104, '10809611', 'SDN 19 Tulang Bawang Tengah', 'TIYUH MULYA JAYA', 'Mulya Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(105, '10808670', 'SDN 18 Tulang Bawang Tengah', 'Jl. Diponegoro Desa Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(106, '10809693', 'SDN 17 Tulang Bawang Tengah', 'Tiyuh Tirta Makmur', 'Tirta Makmur', 'NEGERI', 'Tulang Bawang Tengah'),
(107, '10809687', 'SDN 16 Tulang Bawang Tengah', 'Tiyuh Tirta Kencana', 'Tirta Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(108, '10809670', 'SDN 15 Tulang Bawang Tengah', 'Tiyuh Tirta Kencana', 'Tirta Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(109, '10809633', 'SDN 14 Tulang Bawang Tengah', 'Tiyuh Tirta Makmur', 'Tirta Makmur', 'NEGERI', 'Tulang Bawang Tengah'),
(110, '10808739', 'SDN 13 Tulang Bawang Tengah', 'Tirta Kencana', 'Tirta Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(111, '10809685', 'SDN 12 Tulang Bawang Tengah', 'Pulung Kencana', 'Pulung Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(112, '10809662', 'SDN 11 Tulang Bawang Tengah', 'Pulung Kencana', 'Pulung Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(113, '10809619', 'SDN 10 Tulang Bawang Tengah', 'Pulung Kencana', 'Pulung Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(114, '10808695', 'SDN 9 Tulang Bawang Tengah ', 'Jln. Raya Pulung Kencana', 'Pulung Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(115, '10808126', 'SDN 8 Tulang Bawang Tengah ', 'Jln Brawijaya', 'Penumangan Baru', 'NEGERI', 'Tulang Bawang Tengah'),
(116, '10809618', 'SDN 7 Tulang Bawang Tengah ', 'Jl. Sriwijaya Penumangan Baru', 'Penumangan Baru', 'NEGERI', 'Tulang Bawang Tengah'),
(117, '10808694', 'SDN 6 Tulang Bawang Tengah ', 'Penumangan Baru', 'Penumangan Baru', 'NEGERI', 'Tulang Bawang Tengah'),
(118, '10808056', 'SDN 5 Tulang Bawang Tengah ', 'Penumangan', 'Penumangan', 'NEGERI', 'Tulang Bawang Tengah'),
(119, '10808693', 'SDN 4 Tulang Bawang Tengah', 'Penumangan', 'Penumangan', 'NEGERI', 'Tulang Bawang Tengah'),
(120, '10808660', 'SDN 3 Tulang Bawang  Tengah', 'Jl.SD Impres Menggala Mas', 'Menggala Mas', 'NEGERI', 'Tulang Bawang Tengah'),
(121, '10809614', 'SDN 2 Tulang Bawang  Tengah', 'Panaragan', 'Panaragan', 'NEGERI', 'Tulang Bawang Tengah'),
(122, '10808676', 'SDN 1 Tulang Bawang Tengah ', 'Panaragan', 'Panaragan', 'NEGERI', 'Tulang Bawang Tengah'),
(123, '10810635', 'SDN 22 Tulang Bawang Udik', 'Gunung Katun Tanjungan', 'Gunung Katun Tanjungan', 'NEGERI', 'Tulang Bawang Udik'),
(124, '10808610', 'SDN 21 Tulang Bawang Udik', 'Gunung Katun Malay', 'Gunung Katun Malay', 'NEGERI', 'Tulang Bawang Udik'),
(125, '10809653', 'SDN 20 Tulang Bawang Udik', 'Jl. Ratu Pengadilan No1', 'Karta Raharja', 'NEGERI', 'Tulang Bawang Udik'),
(126, '10809603', 'SDN 19 Tulang Bawang Udik', 'Jl.ratu Pengadilan', 'Karta Raharja', 'NEGERI', 'Tulang Bawang Udik'),
(127, '10808625', 'SDN 18 Tulang Bawang Udik', 'Karta Raharja', 'Karta Raharja', 'NEGERI', 'Tulang Bawang Udik'),
(128, '10809680', 'SDN 17 Tulang Bawang Udik', 'Kagungan Ratu RT 03 RW 05', 'Kagungan Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(129, '10809651', 'SDN 16 Tulang Bawang Udik', 'Suku III Tiyuh Kagungan Ratu Agung', 'Kagungan Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(130, '10809601', 'SDN 15 Tulang Bawang Udik', 'Kagungan Ratu', 'Kagungan Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(131, '10801363', 'SDN 14 Tulang Bawang Udik', 'Kagungan Ratu', 'Kagungan Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(132, '10809656', 'SDN 13 Tulang Bawang Udik', 'Jln. Gajah Mati, Tiyuh Gading Kencana', 'Marga Kencana', 'NEGERI', 'Tulang Bawang Udik'),
(133, '10810624', 'SDN 12 Tulang Bawang Udik', 'Marga Kencana', 'Marga Kencana', 'NEGERI', 'Tulang Bawang Udik'),
(134, '10808647', 'SDN 11 Tulang Bawang Udik', 'Marga Kencana', 'Marga Kencana', 'NEGERI', 'Tulang Bawang Udik'),
(135, '10809638', 'SDN 10 Tulang Bawang Udik', 'Jl. Raya Way Sido', 'Way Sido', 'NEGERI', 'Tulang Bawang Udik'),
(136, '10808755', 'SDN 9 Tulang Bawang Udik ', 'Way Sido', 'Way Sido', 'NEGERI', 'Tulang Bawang Udik'),
(137, '10808017', 'SDN 8 Tulang Bawang Udik ', 'Kartasari', 'Kartasari', 'NEGERI', 'Tulang Bawang Udik'),
(138, '10808626', 'SDN 7 Tulang Bawang Udik ', 'KARTA SARI', 'Karta Sari', 'NEGERI', 'Tulang Bawang Udik'),
(139, '10809681', 'SDN 6 Tulang Bawang Udik ', 'Karta', 'Karta', 'NEGERI', 'Tulang Bawang Udik'),
(140, '10809652', 'SDN 5 Tulang Bawang Udik ', 'Karta', 'Karta', 'NEGERI', 'Tulang Bawang Udik'),
(141, '10809602', 'SDN 4 Tulang Bawang Udik ', 'Karta', 'Karta', 'NEGERI', 'Tulang Bawang Udik'),
(142, '10808624', 'SDN 3 Tulang Bawang Udik ', 'Karta', 'Karta', 'NEGERI', 'Tulang Bawang Udik'),
(143, '10809594', 'SDN 2 Tulang Bawang Udik ', 'GEDUNG RATU', 'Gedung Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(144, '10808607', 'SDN 1 Tulang Bawang Udik ', 'Kampung Gedung Ratu', 'Gedung Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(145, '69975758', 'MI QUR`AN DAYAMURNI', 'KOMPLEK TELKOMSEL', 'Daya Asri', 'SWASTA', 'Tumijajar'),
(146, '69956124', 'MIS MIFTAHUL HUDA', 'Jalan Terusan Nunyai', 'Gunung Menanti', 'SWASTA', 'Tumijajar'),
(147, '69888432', 'SD ISLAM ASSUNIYAH', 'MURNI JAYA', 'Murni Jaya', 'SWASTA', 'Tumijajar'),
(148, '69964970', 'SD ISLAM UNGGULAN HIDAYATUL MUBTADIIN', 'RT 03 RW 01 TIYUH DAYA MURNI', 'Daya Murni', 'SWASTA', 'Tumijajar'),
(149, '69945993', 'SD IT AL-BAYAN', 'JL. RATU PENGADILAN, DAYA MURNI, RT 003/ RW 006', 'Daya Murni', 'SWASTA', 'Tumijajar'),
(150, '69990588', 'SDIT FAVORIT NUR ALIF', 'Daya Murni', 'Daya Murni', 'SWASTA', 'Tumijajar'),
(151, '10808179', 'SDN 27 Tumijajar', 'Jl. Way Terusan', 'Gunung Menanti', 'NEGERI', 'Tumijajar'),
(152, '10809627', 'SDN 26 Tumijajar', 'Sumber Rejo', 'Sumber Rejo', 'NEGERI', 'Tumijajar'),
(153, '69838554', 'SDN 25 Tumijajar', 'Sumber Rejo', 'Sumber Rejo', 'NEGERI', 'Tumijajar'),
(154, '10809677', 'SDN 24 Tumijajar', 'Daya Sakti', 'Daya Sakti', 'NEGERI', 'Tumijajar'),
(155, '10809646', 'SDN 23 Tumijajar', 'Tiyuh Daya Sakti', 'Daya Sakti', 'NEGERI', 'Tumijajar'),
(156, '10808792', 'SDN 22 Tumijajar', 'Jln. Raden Saleh, TIYUH GUNUNG TIMBUL', 'Gunung Timbul', 'NEGERI', 'Tumijajar'),
(157, '10808594', 'SDN 21 Tumijajar', 'Daya Sakti', 'Daya Sakti', 'NEGERI', 'Tumijajar'),
(158, '10809655', 'SDN 20 Tumijajar', 'Jl.Banyuwangi', 'Makarti', 'NEGERI', 'Tumijajar'),
(159, '10809608', 'SDN 19 Tumijajar', 'Makarti', 'Makarti', 'NEGERI', 'Tumijajar'),
(160, '10808643', 'SDN 18 Tumijajar', 'Makarti', 'Makarti', 'NEGERI', 'Tumijajar'),
(161, '10808152', 'SDN 17 Tumijajar', 'Margo Dadi', 'Margo Dadi', 'NEGERI', 'Tumijajar'),
(162, '10808117', 'SDN 16 Tumijajar', 'Margo Dadi', 'Margo Dadi', 'NEGERI', 'Tumijajar'),
(163, '10808030', 'SDN 15 Tumijajar', 'Margo Dadi', 'Margo Dadi', 'NEGERI', 'Tumijajar'),
(164, '10808649', 'SDN 14 Tumijajar', 'Jl. Margomulyo Rk.04 RT. 10 Margodadi', 'Margo Dadi', 'NEGERI', 'Tumijajar'),
(165, '10811579', 'SDN 13 Tumijajar', 'Margo Mulyo', 'Margo Mulyo', 'NEGERI', 'Tumijajar'),
(166, '10808031', 'SDN 12 Tumijajar', 'Margo Mulyo', 'Margo Mulyo', 'NEGERI', 'Tumijajar'),
(167, '10808651', 'SDN 11 Tumijajar', 'Margo Mulyo', 'Margo Mulyo', 'NEGERI', 'Tumijajar'),
(168, '10808790', 'SDN 10 Tumijajar', 'Jl. Jenderal Sudirman', 'Daya Asri', 'NEGERI', 'Tumijajar'),
(169, '10808592', 'SDN 9 Tumijajar', 'Jln. Jendral Sudirman Daya Asri', 'Daya Asri', 'NEGERI', 'Tumijajar'),
(170, '10810724', 'SDN 8 Tumijajar', 'Daya Murni', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(171, '10809676', 'SDN 7 Tumijajar', 'Daya Murni', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(172, '10809645', 'SDN 6 Tumijajar', 'Daya Murni Lk 4 Jl. Ratu Pengadilan', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(173, '10808791', 'SDN 5 Tumijajar', 'Jl. Ratu Pengadilan No. 290', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(174, '10808593', 'SDN 4 Tumijajar', 'Jl. Ratu Pengadilan Dayamurni Kec.Tumijajar', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(175, '10809660', 'SDN 3 Tumijajar', 'Jln Jendral Sudirman', 'Murni Jaya', 'NEGERI', 'Tumijajar'),
(176, '10809612', 'SDN 2 Tumijajar', 'Jl.raya Lk 4 Murni Jaya', 'Murni Jaya', 'NEGERI', 'Tumijajar'),
(177, '10808671', 'SDN 1 Tumijajar', 'Jalan Jendral Sudirman, Desa Murni Jaya', 'Murni Jaya', 'NEGERI', 'Tumijajar'),
(178, '69787517', 'SDN 13 Way Kenanga', 'Jln. Simpang Asahan', 'Indraloka Ii', 'NEGERI', 'Way Kenanga'),
(179, '10808620', 'SDN 12 Way Kenanga', 'Jalan Poros Indraloka I', 'Indraloka I', 'NEGERI', 'Way Kenanga'),
(180, '10809679', 'SDN 11 Way Kenanga', 'Jl. SImpang Sulawesi', 'Indraloka Mukti', 'NEGERI', 'Way Kenanga'),
(181, '10810701', 'SDN 10 Way Kenanga', 'Jln. Soekarno Hatta Gg. Jeruk', 'Indraloka Mukti', 'NEGERI', 'Way Kenanga'),
(182, '10808045', 'SDN 9 Way Kenanga ', 'Jl. Sulawesi', 'Indraloka Jaya', 'NEGERI', 'Way Kenanga'),
(183, '10808621', 'SDN 8 Way Kenanga ', 'Jl. Sulawesi', 'Indraloka Ii', 'NEGERI', 'Way Kenanga'),
(184, '10809643', 'SDN 7 Way Kenanga ', 'Jalan Poros Sidorejo', 'Agung Jaya', 'NEGERI', 'Way Kenanga'),
(185, '10808768', 'SDN 6 Way Kenanga ', 'Jalan Poros Agung Jaya', 'Agung Jaya', 'NEGERI', 'Way Kenanga'),
(186, '10804273', 'SDN 5 Way Kenanga ', 'Jalan Poros Tengah Agung Jaya', 'Agung Jaya', 'NEGERI', 'Way Kenanga'),
(187, '10808673', 'SDN 4 Way Kenanga ', 'Jl. Poros', 'Pagar Buana', 'NEGERI', 'Way Kenanga'),
(188, '10808661', 'SDN 3 Way Kenanga ', 'Jln. Poros Utama Kecamatan Way Kenanga', 'Mercu Buana', 'NEGERI', 'Way Kenanga'),
(189, '10808771', 'SDN 2 Way Kenanga ', 'Jalan Bumi Perkemahan', 'Balam Asri', 'NEGERI', 'Way Kenanga'),
(190, '10808562', 'SDN 1 Way Kenanga ', 'Jl. Poros', 'Balam Jaya', 'NEGERI', 'Way Kenanga'),
(191, '00000000', 'Tidak TK/PAUD', '', '', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunpelajaran`
--

CREATE TABLE `tahunpelajaran` (
  `id_tahun` int(4) NOT NULL,
  `tahun_pelajaran` varchar(4) DEFAULT NULL,
  `kuota` varchar(3) NOT NULL,
  `tanggal_mulai_pendaftaran` date NOT NULL,
  `tanggal_selesai_pendaftaran` date NOT NULL,
  `tanggal_mulai_seleksi` date NOT NULL,
  `tanggal_selesai_seleksi` date NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `tanggal_mulai_daftar_ulang` date NOT NULL,
  `tanggal_selesai_daftar_ulang` date NOT NULL,
  `status_tahun` varchar(15) NOT NULL,
  `ket` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tahunpelajaran`
--

INSERT INTO `tahunpelajaran` (`id_tahun`, `tahun_pelajaran`, `kuota`, `tanggal_mulai_pendaftaran`, `tanggal_selesai_pendaftaran`, `tanggal_mulai_seleksi`, `tanggal_selesai_seleksi`, `tanggal_pengumuman`, `tanggal_mulai_daftar_ulang`, `tanggal_selesai_daftar_ulang`, `status_tahun`, `ket`) VALUES
(1, '2022', '288', '2022-12-21', '2023-02-25', '2023-02-21', '2023-02-25', '2023-02-26', '2023-02-27', '2023-02-28', 'Aktif', 'Uji Coba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tesdanwawancara`
--

CREATE TABLE `tesdanwawancara` (
  `id_tesdanwawancara` int(10) NOT NULL,
  `id_peserta` int(10) NOT NULL,
  `nilai_tes` varchar(5) DEFAULT NULL,
  `nilai_wawancara` varchar(5) DEFAULT NULL,
  `kesimpulan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `full_name`, `company`, `phone`, `image`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$knz1f.h3DE9W/c2BRc07hezZl4ZBXxA29k8HqXL8J/ebjEOvcKTKO', '', 'ilung82@gmail.com', '', '5vfXw8AFBMJnY.DC95LkHO611d8355408aeba502', 1579613175, '1vAEb7BbUblDg8WwRJHt8e', 1268889823, 1680405352, 1, 'Administrator', 'nenemo project', '6282184032134', 'admin.jpg'),
(2, '::1', 'panitia', '$2y$08$/9gkMovxNTB7K9IkXZ116.vmkf57K53mYf53vYXSGPX/AegP5RyBu', NULL, 'panitia@gmail.com', NULL, NULL, NULL, NULL, 1677066496, 1680405326, 1, 'Panitia', '', '6282184032134', 'panitia.jpg'),
(3, '::1', 'bendahara', '$2y$08$UGq/sIe2yhHOXmfa.Hz1l.ZhD88fA0PZiEOwHW7McUeekTotwHstK', NULL, 'bendahara@gmail.com', NULL, NULL, NULL, NULL, 1677066570, 1680405290, 1, 'Bendahara', '', '6282184032134', 'bendahara.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(339, 1, 1),
(370, 2, 3),
(372, 3, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wawancara`
--

CREATE TABLE `wawancara` (
  `id_wawancara` int(5) NOT NULL,
  `pertanyaan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_formulir`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indeks untuk tabel `jarak`
--
ALTER TABLE `jarak`
  ADD PRIMARY KEY (`id_jarak`);

--
-- Indeks untuk tabel `jawaban_wawancara`
--
ALTER TABLE `jawaban_wawancara`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id_mail`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `prestasipeserta`
--
ALTER TABLE `prestasipeserta`
  ADD PRIMARY KEY (`id_prestasipeserta`);

--
-- Indeks untuk tabel `raporsemester`
--
ALTER TABLE `raporsemester`
  ADD PRIMARY KEY (`id_raporsemester`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `tahunpelajaran`
--
ALTER TABLE `tahunpelajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `tesdanwawancara`
--
ALTER TABLE `tesdanwawancara`
  ADD PRIMARY KEY (`id_tesdanwawancara`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indeks untuk tabel `wawancara`
--
ALTER TABLE `wawancara`
  ADD PRIMARY KEY (`id_wawancara`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_formulir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jalur`
--
ALTER TABLE `jalur`
  MODIFY `id_jalur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jarak`
--
ALTER TABLE `jarak`
  MODIFY `id_jarak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `jawaban_wawancara`
--
ALTER TABLE `jawaban_wawancara`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT untuk tabel `mail`
--
ALTER TABLE `mail`
  MODIFY `id_mail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `prestasipeserta`
--
ALTER TABLE `prestasipeserta`
  MODIFY `id_prestasipeserta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raporsemester`
--
ALTER TABLE `raporsemester`
  MODIFY `id_raporsemester` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT untuk tabel `tahunpelajaran`
--
ALTER TABLE `tahunpelajaran`
  MODIFY `id_tahun` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tesdanwawancara`
--
ALTER TABLE `tesdanwawancara`
  MODIFY `id_tesdanwawancara` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT untuk tabel `wawancara`
--
ALTER TABLE `wawancara`
  MODIFY `id_wawancara` int(5) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
