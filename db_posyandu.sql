-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2022 pada 01.36
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `isi_artikel` text NOT NULL,
  `view` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `created_by` varchar(225) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi_artikel`, `view`, `foto`, `id_kategori`, `created_by`, `created_date`) VALUES
(1, 'Cara Menjaga Berat Badan Bayi Tetap Ideal dan Sehat', 'Cara menjaga berat badan sehat bayi\r\n\r\nMeski sebagian orang tua senang melihat anaknya memiliki tubuh gemuk, namun penting diingat bahwa perlu menjaga si kecil tidak mengalami obesitas atau kelebihan berat badan. Melansir dari Harvard Health Publishing, berikut beberapa cara yang dapat Bunda lakukan untuk menjaga supaya berat badan bayi yang ideal dan sehat:\r\n\r\n1. Menyusui\r\nBeberapa ibu mungkin tak dapat menyusui bayi dengan ASI hingga waktu yang lama. Namun apabila memungkinkan, menyusui menjadi cara yang bagus untuk memulai menjaga berat ideal bayi. ASI memang jadi makanan yang dirancang sempurna untuk memenuhi kebutuhan nutrisi bayi. Meski menyusu banyak, namun hampir tidak mungkin bayi menyusu secara berlebihan. Bahkan apabila bayi tetap bertahan di payudara ibu menyusui untuk waktu yang lama, ini hanya dilakukan karena merasa nyaman dalam pelukan ibunya.\r\n\r\n2. Jangan menanggapi setiap tangisan dengan memberi makan\r\nBayi dapat menangis karena berbagai alasan, Bunda. Bukan hanya karena lapar, tangisnya juga bisa muncul karena merasa lelah, takut, kewalahan, bosan, tidak nyaman, atau hanya ingin digendong. Jika tangisnya muncul hanya dalam waktu singkat sejak disusui, Bunda harus coba beberapa hal lain untuk menenangkannya sebelum memberi susu. Cobalah untuk mengganti popok, memegang, menenangkan, atau mengajaknya berbicara dan bermain. Ini sangat penting untuk dibiasakan sejak awal, Bunda. Karena bila setiap kali bayi menangis dan diberi makan, maka ia akan menganggap menyusui adalah apa yang mereka butuhkan ketika bosan, lelah, atau kesal, sehingga menciptakan asosiasi yang tidak sehat dengan makan atau menyusu terus-menerus.\r\n\r\n3. Jangan memberi makan berlebihan\r\nWajar jika Bunda menginginkan si kecil menghabiskan susu dalam botol atau makanan dalam mangkuk makannya. Namun bila pada suatu ketika anak tak menghabiskannya, maka Bunda tak bisa memaksakannya. Namun, beda cerita bila dokter memang mengatakan si kecil kekurangan berat badan dan perlu makan lebih banyak, maka Bunda dapat berusaha untuk membuatnya menghabiskan makanan dan susunya. \"Tetapi jika bayi Anda sehat, saat dia bilang sudah, artinya sudah selesai. Biarkan dia mendengarkan isyarat lapar karena itu penting,\" kata dokter anak di Rumah Sakit Boston, Claire McCarthy, MD.\r\n\r\n4. Berikan MPASI sehat\r\nSaat bayi siap diberi buah, sayuran, biji-bijian, kacang-kacangan, ikan, dan daging tanpa lemak, maka dia akan mencoba apapun yang ada. Gunakan waktu ini untuk membangun selera makan makanan sehat seperti sayuran, sebelum ia menjadi picky eater atau pemilih makanan. Meskipun memberikan sereal khusus bayi yang diperkaya zat besi bisa menyehatkan baginya, namun jangan berlebihan, ya.\r\n\r\n5. Mulailah dengan makan bersama keluarga\r\nSegera setelah bayi bisa duduk di kursi, bawa dia ke meja untuk makan bersama anggota keluarga, Bunda. Anak-anak yang makan bersama orang tuanya cenderung tidak mengalami kelebihan berat badan, Bunda. Selain itu, makan bersama keluarga juga dapat membantu membangun hubungan yang kuat dan membantu anak-anak berhasil di sekolahnya.\r\n\r\n6. Buat bayi terus bergerak\r\nLatihan, bergerak, atau berolahraga dapat dimulai sejak dini, Bunda. Cobalah untuk menempatkannya di lantai, lakukan tummy time dengan gerakan dorongan.\r\n\r\nCara lainnya, Bunda bisa membawanya ke tempat yang aman untuk merangkak dan belajar berjalan dan berlari. Jika Bunda berhasil menjadikan permainan aktif dan olahraga keluarga sebagai bagian aktivitas normal setiap hari, itu tidak hanya membantu bayi mencapai dan mempertahankan berat badan yang sehat, tetapi juga membuatnya lebih aktif.', 0, 'Bayi_Normal.jpg', 'Berat badan normal', 'Dahlia1', '2021-07-05'),
(2, '6 Cara Merawat Bayi dengan Berat Badan Rendah', 'Ada berbagai faktor yang bisa menyebabkan kondisi ini. Mulai dari lahir prematur, masalah kesehatan yang dialami ibu selama hamil, infeksi kehamilan, atau pula kehamilan kembar. Lantas, bagaimana sih cara merawat bayi dengan berat badan rendah agar mereka selalu sehat dan perkembangannya berjalan optimal?\r\n\r\n1.Terus Berikan Asupan ASI\r\nPada dasarnya tidak ada makanan lain selain ASI yang paling baik bagi bayi, khususnya selama enam bulan pertama kehidupannya. Menurut Ikatan Dokter Anak Indonesia (IDAI), ASI mengandung komponen makro dan mikro nutrien yang dibutuhkan bayi dalam tumbuh kembangnya. Makronutrien contohnya seperti karbohidrat, protein dan lemak, sedangkan mikronutrien adalah berbagai vitamin dan mineral penting yang dibutuhkan tubuhnya. Nah, salah satu cara merawat bayi dengan berat badan lahir rendah adalah terus memberikan asupan ASI pada dirinya. Ingat, jangan sekali-kali memberikan asupan lain selain ASI atau susu formula pada bayi di bawah 6 bulan. Untuk bayi dengan berat badan rendah, berikan ASI tiap tiga jam atau dua jam sekali. \r\n\r\n2.Ikuti Pedoman Tidur yang Aman\r\nCo-sleeping atau tidur bersama dengan bayi memiliki banyak kelebihan dan mempermudah ibu menyusui di malam hari. Ibu juga dapat menikmati kedekatan dengan berbagi tempat tidur dengan bayi.  Perlu diingat, bayi yang berusia tiga bulan atau lebih muda, lahir lebih awal (prematur), atau memiliki berat badan lahir rendah paling rentan terhadap sindrom kematian bayi mendadak (sudden infant death syndrome/SIDS) saat tidur bersama.\r\nUntungnya, SIDS adalah kasus yang jarang terjadi. Di samping itu, menurut penelitian bayi dari orangtua di wilayah Asia Selatan memiliki tingkat kematian SIDS yang relatif lebih rendah. Hal yang perlu diingat, cobalah jangan tidur di ranjang yang sama dengan bayi. Sebagai gantinya, ibu dapat menggunakan boks bayi, buaian, atau ranjang bayi di samping tempat tidur ibu. Terakhir, selalu posisikan bayi untuk tidur telentang, bukannya tengkurap atau miring.\r\n\r\n3.Kontak Antar Kulit\r\nBayi yang baru lahir dengan berat badan rendah memiliki lapisan lemak yang tipis. Kondisi inilah yang membuat mereka sulit mempertahankan suhu tubuh. Makanya jangan heran bila mereka cenderung memiliki suhu dingin. Waspada, kondisi ini bisa saja menyebabkan hipotermia.  Nah, cara merawat bayi dengan berat badan rendah di kondisi ini bisa dengan memperbanyak kontak antar kulit atau yang dikenal dengan metode kangaroo care. Metode kangaroo care memiliki berbagai manfaat, antara lain: \r\n- Membantu menambah berat badannya.\r\n- Menjaga kehangatan tubuhnya\r\n- Mengatur detak jantung dan pernapasannya\r\n- Membantu tidurnya lebih nyenyak, lama, dan berkualitas.\r\n- Memberikan kesempatan menyusui yang lebih baik.\r\n- Nembantunya menghabiskan lebih banyak waktu untuk diam dan waspada, serta lebih sedikit waktu menangis\r\n\r\nNah, ibu disarankan untuk melakukan kontak sesering mungkin dengan bayi. Caranya dengan menggendong bayi dengan menggunakan kain yang membentuk seperti kantung kangguru. Hal ini bisa memudahkan ibu untuk mengawasi bayi saat memberikan ASI. \r\n\r\n4.Habiskan Lebih Banyak Waktu di Suasana Kondusif\r\nBayi yang lahir dengan berat badan rendah semestinya harus selalu berada dalam kondisi lingkungan yang nyaman. Tujuannya agar mereka bisa tumbuh dengan berkembang dengan baik. Di samping itu, ibu perlu meluangkan banyak waktu dengan dirinya. Ibu bisa menghabiskan waktu dengan menggendong atau mengajaknya bermain. \r\n\r\n5.Imunisasi Bayi\r\nBayi yang terlahir dengan berat badan rendah cenderung rentan terserang penyakit infeksi. Mulai dari flu, diare, bahan hingga pneumonia. Kok bisa? Pasalnya, bayi dengan kondisi ini cenderung memiliki sistem imun yang lemah. Nah, untuk melindungi bayi dari berbagai penyakit, pastikan jadwal imunisasi sudah tepat, dan pemberiannya sesuai dengan saran yang dianjurkan dokter. \r\n\r\n6.Pantau Pertumbuhan dan Perkembangannya \r\nCara merawat bayi dengan berat badan rendah lainnya adalah dengan selalu memantau pertumbuhan dan perkembangannya. Ingat, terdapat keluhan kesehatan atau komplikasi yang bisa menghantui bayi dengan berat badan rendah. Contohnya, gangguan perkembangan paru-paru, masalah neurologis, hingga masalah pernapasan.\r\nOleh sebab itu, ibu harus selalu memantau pertumbuhan dan perkembangannya dengan cermat. Misalnya, membawa bayi ke dokter anak secara teratur agar dokter bisa memonitor kondisi kesehatan bayi. ', 0, 'BB_Sangat_kurang2.jpg', 'Berat badan sangat kurang', 'Dahlia1', '2021-07-05'),
(3, 'Anak Kelebihan Berat Badan (Overweight) Itu Tidak Sehat, Begini Cara Menanganinya', 'Bagaimana cara menangani overweight pada anak?\r\nPenanganan kelebihan berat badan pada anak sejak dini dapat membantu lebih mengendalikan kondisinya, atau bahkan mengembalikan ke berat badan normal. Alhasil, risiko buruk yang mengintai kesehatan pun bisa dihindari. Sebab jika tidak segera dikenalikan, overweight pada anak bisa berkembang menjadi obesitas di kemudian hari. Berikut beberapa cara yang bisa dilakukan untuk mengendallikan overweight pada anak:\r\n\r\n1. Bantu anak untuk menjalani gaya hidup yang lebih sehat\r\nMulailah dengan melakukan perubahan-perubahan kecil pada pola makan dan gaya hidup anak. Misalnya dengan menyediakan pilihan makanan sehat terdiri dari beragam zat gizi, makan sesuai kebutuhan, dan perbanyak aktivitas fisik. Alangkah lebih baik untuk mendiskusikan dengan dokter atau ahli gizi anak, guna mendapatkan aturan atau panduan tepat dalam pengendalikan berat badan.\r\n\r\n2. Berikan porsi makan secukupnya\r\nHindari memberikan anak makanan utama dengan porsi yang terlalu besar. Biasanya, dokter dah ahli gizi akan membantu memandu Anda untuk membatasi porsi makan harian anak. Di sisi lain, sebisa mungkin hindari menggunakan piring yang berukuram besar. Pasalnya, anak kemungkinan tertarik untuk mengambil porsi makan yang lebih banyak, karena melihat masih ada sisa tempat di piringnya.\r\n\r\n3. Makan di meja makan\r\nJika anak selama ini terbiasa makan di depan TV, kini ajak ia untuk makan bersama di meja makan setiap hari. Ketimbang makan sambil menonton TV, makan di meja makan membantu anak untuk lebih teratur mengatur porsi dan waktu makannya. Dengan begitu, porsi makan anak biasanya menjadi lebih terkontrol, serta waktu makan yang lebih terbatas sehingga tidak menambah porsi makannya.\r\n\r\n4. Berikan sumber makanan sehat\r\nMakanan olahan, junk food, serta gorengan merupakan beberapa contoh makanan yang sebaiknya tidak sering dimakan anak overweight. Selain itu, batasi juga makanan dengan kandungan gula dan lemak yang tinggi.\r\nMisalnya permen, kue, biskuit, sereal manis, serta minuman bersoda. Pasalnya, jenis makanan dan minuman tersebut mengandung sejumlah kalori yang tinggi tapi rendah nutrisi. Sebagai gantinya, sajikan makanan harian yang mencakup kebutuhan zat gizi makro dan mikro anak. Meliputi karbohidrat, protein, sedikit lemak, serat, vitamin, dan mineral.\r\n\r\n5. Perbanyak aktivitas fisik harian anak\r\nSecara perlahan, tingkatkan aktivitas fisik anak setidaknya minimal selama satu jam setiap hari. Mudahnya, biarkan anak aktif secara fisik, entah itu dengan bermain atau berolahraga. Jika perlu, ketimbang menggunakan mobil atau motor, Anda bisa ajak anak berjalan kaki atau bersepeda saat hendak mengunjungi tempat dengan jarak dekat. Cara ini membantu tubuh anak untuk membakar kalori berlebih yang didapat dari makanan harian. Dengan begitu, asupan kalori yang masuk setara dengan yang dikeluarkan, sehingga overweight pada anak bisa dikendalikan.\r\n\r\n6. Jadi contoh yang baik untuk anak\r\nSalah satu cara untuk mulai menanamkan kebiasaan baik pada anak adalah dengan berusaha mnunjukkan contoh yang baik padanya. Kebanyakan anak umumnya akan meniru semua perilaku orangtuanya, dan tanpa sadar menjadikannya sebagai panutan dalam hidup. Itu sebabnya, ketika Anda meminta anak untuk melakukan berbagai perubahan demi mengatasi kondisi overweightnya, bisa saja anak menolak. Mengapa? Karena melihat orangtuanya tidak menerapkan hal yang sama.', 0, 'Bayi_Gemuk3.jpg', 'Berat badan lebih', 'Dahlia1', '2021-07-05'),
(4, 'Dampak Berat Badan Kurang Terhadap Perkembangan Anak', 'Pada usia tumbuh kembang, berat badan menjadi salah satu indikator penting kesehatan dan perkembangan anak, apakah berjalan normal atau tidak. Anak yang sehat biasanya memiliki berat badan ideal. Berat badan ideal bisa dicapai tentunya dengan gizi yang baik.\r\n\r\nAnak dianggap mendapatkan gizi yang baik dan pertumbuhan normal jika pertambahan umur diikuti dengan pertambahan berat badan sesuai standar internasional yang ditetapkan badan kesehatan dunia, WHO. \r\nBerat badan kurang pada anak perlu mendapat perhatian serius. Ketika berat badan anak di bawah ideal atau stagnan dalam jangka waktu lama, segera konsultasikan pada dokter anak atau dokter anak sub spesialis tumbuh kembang anak. Pasalnya, kekurangan berat badan berisiko mengalami berbagai masalah kesehatan dan gangguan pertumbuhan, di antaranya :\r\n\r\n1. Gampang sakit atau terkena Infeksi\r\nStudi menemukan hubungan antara peningkatan infeksi dan kekurangan berat badan. Malnutrisi dapat menyebabkan penurunan fungsi kekebalan tubuh dan juga menyebabkan anak menjadi kurus.\r\n\r\n2. Meningkatnya risiko infeksi tentu berpengaruh terhadap kesehatan anak. \r\nAnak akan jadi gampang sakit dan kesembuhannya kemungkinan lebih lama dibandingkan anak yang memiliki berat badan ideal. Karena itu tidak mengherankan jika WHO menyebutkan bahwa anak yang malnutrisi seperti yang tercermin dari berat badan yang kurang, dapat meningkatkan risiko kematian.\r\n\r\n3. Perkembangan terlambat\r\nKeterlambatan perkembangan dapat dilihat pada anak-anak yang kurus, terutama anak-anak di bawah usia 3 tahun di mana pada usia itu otak berkembang dengan cepat. Otak membutuhkan nutrisi untuk berkembang dengan baik. Anak-anak yang kurus mungkin kehilangan nutrisi penting karena kekurangan gizi dan malabsorpsi.Itu dapat memengaruhi perkembangan otak dan menyebabkan penundaan dalam fase perkembangan. \r\n\r\n4. Memengaruhi kognitif dan prestasi akademik\r\nBerdasarkan penelitian, anak-anak dengan berat badan kurang, memiliki tingkat kognitif dan skor prestasi akademik yang lebih rendah pada usia sekolah, dibandingkan anak-anak dengan berat badan normal. ³\r\n\r\n5. Pertumbuhan fisik terhambat\r\nPada penelitian yang sama juga terlihat bahwa anak yang mengalami masalah kekurangan berat badan, menunjukkan ukuran fisik yang lebih rendah dibandingkan anak dengan berat badan ideal.\r\n\r\nUntuk meningkatkan berat badan anak, Anda perlu memperbaiki asupan nutrisinya dengan menerapkan pola makan bergizi seimbang. Bila perlu,  Anda bisa memberikan formula padat nutrisi yang menyediakan energi 1.5 kkal/ml untuk meningkatkan berat badan anak dan status gizinya. Hasil uji klinis membuktikan asupan formula padat nutrisi dapat meningkatkan berat badan anak dalam 4 minggu.', 0, 'BB_kurang.jpg', 'Berat badan kurang', 'Dahlia1', '2021-07-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataakun`
--

CREATE TABLE `dataakun` (
  `id_akun` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kode_posyandu` varchar(80) NOT NULL,
  `password` varchar(256) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `image` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataakun`
--

INSERT INTO `dataakun` (`id_akun`, `nik`, `nama`, `email`, `kode_posyandu`, `password`, `alamat`, `no_telepon`, `jabatan`, `role`, `pendidikan_terakhir`, `tempat_lahir`, `tanggal_lahir`, `image`, `created_at`) VALUES
(1, '3173183710387', 'Admin', 'admin@gmail.com', '', '123', 'Jl. Pertukangan Medan', '', 'Admin', 0, '', 'Jakarta', '2019-09-09', 'default.jpg', '2020-06-22'),
(5, '1231234567', 'agung', 'agung28031999@gmail.com', 'Mawar1', 'Pandiangan', 'jalan bakti pramuka', '082111111111', 'Bendahara', 1, 'sma', 'jakarta', '1994-06-15', 'default.jpg', '2021-08-03'),
(9, '31730183012808', 'Maryani', 'rizkiawaludin323@gmail.com', 'Mawar1', 'Pandiangan', 'Jl. ciledug raya', '088137812121', 'Bendahara', 1, 'D3', 'Ciledug', '1985-02-17', 'default.jpg', '2021-05-29'),
(11, '724687391809', 'Agus', 'Agus@gmail.com', 'Mawar1', 'Pandiangan', 'Jl. Ciledug 5', '09873812342', 'Sektekaris', 1, 'SMP', 'Medan', '2012-10-31', 'default.jpg', '2021-06-04'),
(17, '12345', 'asdas', 'asd@qwe.cv', 'Mawar1', 'Pandiangan', '123456', '12345', 'Bendahara', 1, 'geg', 'jakarta', '2021-08-12', 'default.jpg', '2021-08-04'),
(19, '1271055705040002', 'ogoh', 'ogoh@gmail.com', 'Mawar1', 'Pandiangan', 'jl almamater', '081263166807', 'ketua', 1, 'sma', 'Denpasar', '2022-12-09', 'default.jpg', '2022-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataanak`
--

CREATE TABLE `dataanak` (
  `nik` char(20) NOT NULL,
  `kode_posyandu` varchar(20) NOT NULL,
  `id_kms` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(30) NOT NULL,
  `golongan_darah` varchar(3) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `nik_wali` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataanak`
--

INSERT INTO `dataanak` (`nik`, `kode_posyandu`, `id_kms`, `nama`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `jk`, `golongan_darah`, `alamat`, `anak_ke`, `nik_wali`, `nama_wali`, `status`, `created_at`) VALUES
('1271055705040016', 'Mawar1', '00004', 'meissi@gmail.com', '', '12345', 'medan', '2022-08-09', 'Perempuan', 'o', 'jl almamater', '1', '3176576543545', 'Anisa', '1', '2022-12-09'),
('3134576879809', 'Mawar1', '00001', 'Tyo ', '0', '12345', 'Medan', '2021-04-29', 'Laki-Laki', 'B', 'Jl. Pertukangan Selatan', '1', '3176576543545', 'Anisa', '1', '2021-05-29'),
('3178798103987319', 'Mawar1', '00002', 'Joni', '0', '12345', 'Medan', '2021-04-05', 'Laki-Laki', 'A', 'Jl. Dahlia 2', '1', '2376879423423', 'Siti', '1', '2021-06-05'),
('346576867564', 'Mawar1', '00003', 'Bunga', '0', '12345', 'Medan', '2021-03-05', 'Perempuan', 'O', 'Jl. Meruya Utama', '1', '3546789067890', 'Tina', '1', '2021-06-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataibu`
--

CREATE TABLE `dataibu` (
  `nik` char(20) NOT NULL,
  `kode_posyandu` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `golongan_darah` varchar(3) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telepon` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataibu`
--

INSERT INTO `dataibu` (`nik`, `kode_posyandu`, `nama`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `alamat`, `no_telepon`, `created_at`) VALUES
('2376879423423', 'Mawar1', 'Siti', 'Medan', '1990-09-10', 'B', 'Jl. Dahlia 2', '085673189012', '2021-06-05'),
('3176576543545', 'Mawar1', 'Anisa', 'Medan', '1984-09-11', 'B', 'Jl. Pertukangan Selatan ', '087564635546', '2021-05-29'),
('3546789067890', 'Mawar1', 'Tina', 'Medan', '1988-05-12', 'A', 'Jl. Meruya Utama', '0835465768798', '2021-06-05'),
('9876544122', 'Mawar1', 'putri', 'Medan', '1995-03-08', 'O', 'jalan petukangan 4', '0987654376543', '2021-06-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataimunisasi`
--

CREATE TABLE `dataimunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `kode_posyandu` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_imunisasi` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `jenis_imunisasi` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataimunisasi`
--

INSERT INTO `dataimunisasi` (`id_imunisasi`, `nik`, `kode_posyandu`, `nama`, `tanggal_lahir`, `tanggal_imunisasi`, `bulan`, `jenis_imunisasi`, `status`) VALUES
(1, '1271055705040016', 'Mawar1', 'Meissi', '2022-11-09', '2022-11-09', 'November', 'BCG', 1),
(5, '3134576879809', 'Mawar1', 'Tyo ', '2022-04-29', '2022-05-13', 'May', 'POLIO I', 1),
(9, '3134576879809', 'Mawar1', 'Tyo ', '2022-04-29', '2022-05-19', 'May', 'POLIO II', 1),
(10, '3134576879809', 'Mawar1', 'Tyo ', '2022-04-29', '2022-05-20', 'May', 'POLIO III', 1),
(11, '3134576879809', 'Mawar1', 'Tyo ', '2022-04-29', '2022-05-26', 'May', 'POLIO IV', 1),
(12, '3134576879809', 'Mawar1', 'Tyo ', '2022-04-29', '2022-06-05', 'June', 'CAMPAK', 1),
(14, '3134576879809', 'Mawar1', 'Tyo ', '2022-04-29', '2022-06-05', 'June', 'BCG', 1),
(15, '346576867564', 'Mawar1', 'Bunga', '2022-03-05', '2022-06-05', 'June', 'BCG', 1),
(16, '346576867564', 'Mawar1', 'Bunga', '2022-03-05', '2022-05-05', 'May', 'CAMPAK', 1),
(17, '346576867564', 'Mawar1', 'Bunga', '2022-03-05', '2022-06-05', 'June', 'POLIO I', 1),
(18, '346576867564', 'Mawar1', 'Bunga', '2022-03-05', '2022-05-05', 'May', 'POLIO II', 1),
(19, '346576867564', 'Mawar1', 'Bunga', '2022-03-05', '2022-06-05', 'June', 'POLIO III', 1),
(20, '346576867564', 'Mawar1', 'Bunga', '2022-03-05', '2022-05-05', 'May', 'POLIO IV', 1),
(21, '3178798103987319', 'Mawar1', 'Joni', '2022-04-05', '2022-06-05', 'June', 'BCG', 1),
(27, '3178798103987319', 'Mawar1', 'Joni', '2022-04-05', '2022-05-05', 'May', 'CAMPAK', 1),
(28, '3178798103987319', 'Mawar1', 'Joni', '2022-04-05', '2022-06-05', 'June', 'POLIO I', 1),
(30, '3178798103987319', 'Mawar1', 'Joni', '2022-04-05', '2022-06-05', 'June', 'POLIO II', 1),
(31, '3178798103987319', 'Mawar1', 'Joni', '2022-04-05', '2022-05-05', 'May', 'POLIO III', 1),
(32, '3178798103987319', 'Mawar1', 'Joni', '2022-04-05', '2022-06-05', 'June', 'POLIO IV', 1),
(33, '3134576879809', 'Mawar1', 'Tyo ', '2022-04-29', '2022-02-06', 'February', 'CAMPAK', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakegiatan`
--

CREATE TABLE `datakegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kode_posyandu` varchar(100) NOT NULL,
  `kegiatan` varchar(225) NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `waktu` date NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakegiatan`
--

INSERT INTO `datakegiatan` (`id_kegiatan`, `kode_posyandu`, `kegiatan`, `isi_kegiatan`, `waktu`, `foto`) VALUES
(12, 'Mawar1', ' Program kesehatan ibu hamil', 'Pelayanan yang diberikan posyandu kepada ibu hamil mencakup pemeriksaan kehamilan dan pemantauan gizi. Tak hanya pemeriksaan, ibu hamil juga dapat melakukan konsultasi terkait persiapan persalinan dan pemberian ASI.  Agar kondisi kehamilan tetap terjaga, ibu hamil juga bisa mendapatkan vaksin TT untuk mencegah penyakit tetanus yang masih umum terjadi di negara berkembang, seperti Indonesia.  Setelah melahirkan, ibu juga bisa mendapatkan suplemen vitamin A, vitamin B, dan zat besi yang baik dikonsumsi selama masa menyusui, serta pemasangan alat kontrasepsi (KB) di posyandu.', '2021-06-15', 'hamil.jpg'),
(13, 'Mawar1', 'Program kesehatan anak', 'Salah satu program utama posyandu adalah menyelenggarakan pemeriksaan bayi dan balita secara rutin. Hal ini penting dilakukan untuk memantau tumbuh kembang anak dan mendeteksi sejak dini bila anak mengalami gangguan tumbuh kembang.  Jenis pelayanan yang diselenggarakan posyandu untuk balita mencakup penimbangan berat badan, pengukuran tinggi badan dan lingkar kepala anak, evaluasi tumbuh kembang, serta penyuluhan dan konseling tumbuh kembang. Hasil pemeriksaan tersebut kemudian dicatat di dalam buku KIA atau KMS.', '2021-06-04', 'download.jpg'),
(14, 'Mawar1', ' Imunisasi', 'Imunisasi wajib merupakan salah satu program pemerintah yang mengharuskan setiap anak usia di bawah 1 tahun untuk melakukan vaksinasi. Kementerian Kesehatan Republik Indonesia telah menetapkan ada 5 jenis imunisasi yang wajib diberikan, yaitu imunisasi hepatitis B, polio, BCG, campak, dan DPT-HB-HiB.  Dalam hal ini, posyandu menjadi salah satu pihak yang berhak menyelenggarakan program imunisasi tersebut. Tak hanya anak, ibu hamil pun juga dapat melakukan vaksinasi di posyandu, misalnya vaksinasi tetanus, hepatitis, dan pneumokokus.', '2021-06-25', 'download_(1).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakms`
--

CREATE TABLE `datakms` (
  `id_pa` int(11) NOT NULL,
  `id_kms` varchar(20) NOT NULL,
  `kode_posyandu` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `tinggi_badan` varchar(3) NOT NULL,
  `berat_badan` double NOT NULL,
  `umur` varchar(10) NOT NULL,
  `status_gizi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakms`
--

INSERT INTO `datakms` (`id_pa`, `id_kms`, `kode_posyandu`, `jk`, `tanggal_periksa`, `bulan`, `tahun`, `tinggi_badan`, `berat_badan`, `umur`, `status_gizi`) VALUES
(0, 'Dahlia1', 'Mawar1', 'P', '2022-11-09', 'November', '2022', '80', 60.6, '1', 'Berat badan lebih'),
(6, '00001', 'Mawar1', 'L', '2022-05-29', 'May', '2022', '70', 4.6, '1', 'Berat badan normal'),
(16, '00003', 'Mawar1', 'P', '2022-06-05', 'June', '2022', '70', 7.3, '3', 'Berat badan lebih'),
(17, '00002', 'Mawar1', 'L', '2022-06-05', 'June', '2022', '60', 5.2, '2', 'Berat badan normal'),
(19, '00002', 'Mawar1', 'L', '2022-01-01', 'January', '2022', '100', 100.1, '2', 'Berat badan lebih'),
(20, '00001', 'Mawar1', 'L', '2022-12-06', 'December', '2022', '70', 7.2, '1', 'Berat badan lebih'),
(21, '00001', 'Mawar1', 'L', '2022-06-01', 'June', '2022', '100', 10.1, '1', 'Berat badan lebih'),
(22, '00001', 'Mawar1', 'L', '2022-06-01', 'June', '2022', '40', 10.1, '1', 'Berat badan lebih'),
(23, '00001', 'Mawar1', 'L', '2022-06-16', 'June', '2022', '10', 1.1, '1', 'Berat badan sangat kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataposyandu`
--

CREATE TABLE `dataposyandu` (
  `id_posyandu` int(11) NOT NULL,
  `nama_posyandu` varchar(80) NOT NULL,
  `kode_posyandu` varchar(15) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jumlah_kader` varchar(10) NOT NULL,
  `jumlah_wus` varchar(10) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `lng` varchar(128) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataposyandu`
--

INSERT INTO `dataposyandu` (`id_posyandu`, `nama_posyandu`, `kode_posyandu`, `alamat`, `jumlah_kader`, `jumlah_wus`, `keterangan`, `lng`, `lat`, `created_date`) VALUES
(1, 'Mawar 1 Sei Agul', 'Mawar1', 'Jl Danau Singkarak Gg Saudara Sei Agul, Medan Barat. 20117', '25', '20', 'Posyandu aktif setiap 1 bulan sekali', '106.75652', '-6.24174', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_posyandu`
--

CREATE TABLE `jadwal_posyandu` (
  `id_jadwal` int(11) NOT NULL,
  `kode_posyandu` varchar(225) NOT NULL,
  `hari` date NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_posyandu`
--

INSERT INTO `jadwal_posyandu` (`id_jadwal`, `kode_posyandu`, `hari`, `jam_buka`, `jam_tutup`) VALUES
(1, 'Mawar1', '2022-06-08', '09:00:00', '14:00:00'),
(2, 'Mawar1', '2022-06-21', '08:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(225) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `dataakun`
--
ALTER TABLE `dataakun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `dataanak`
--
ALTER TABLE `dataanak`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `dataibu`
--
ALTER TABLE `dataibu`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `dataimunisasi`
--
ALTER TABLE `dataimunisasi`
  ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indeks untuk tabel `datakegiatan`
--
ALTER TABLE `datakegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `datakms`
--
ALTER TABLE `datakms`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indeks untuk tabel `dataposyandu`
--
ALTER TABLE `dataposyandu`
  ADD PRIMARY KEY (`id_posyandu`);

--
-- Indeks untuk tabel `jadwal_posyandu`
--
ALTER TABLE `jadwal_posyandu`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dataakun`
--
ALTER TABLE `dataakun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
