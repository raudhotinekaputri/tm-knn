-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2023 pada 13.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `text_mining`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `training_data`
--

CREATE TABLE `training_data` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `document_text` text NOT NULL,
  `processed_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `training_data`
--

INSERT INTO `training_data` (`id`, `category`, `document_text`, `processed_text`) VALUES
(1, 'Anime', 'Anime merupakan seni visual yang memikat dengan karakter-karakter yang unik, cerita yang mendalam, dan animasi yang indah. Ia membawa kita ke dunia fantasi yang penuh dengan petualangan, emosi, dan makna hidup. Anime adalah bentuk hiburan yang dapat menginspirasi, menghibur, dan menyatukan orang-orang dari berbagai latar belakang. Mari merayakan keindahan dan keajaiban anime dalam segala bentuknya.\r\n', 'anime merupakan seni visual yang memikat dengan karakter karakter yang unik cerita yang mendalam dan animasi yang indah ia membawa kita ke dunia fantasi yang penuh dengan petualangan emosi dan makna hidup anime adalah bentuk hiburan yang dapat menginspirasi menghibur dan menyatukan orang orang dari berbagai latar belakang mari merayakan keindahan dan keajaiban anime dalam segala bentuknya'),
(2, 'Politik', 'Politik adalah panggung pertarungan ideologi dan kekuasaan. Ia melibatkan pengambilan keputusan yang memengaruhi masyarakat. Politik mencerminkan dinamika hubungan antarmanusia dan kepentingan kolektif. Penting bagi kita untuk terlibat aktif, berpikir kritis, dan memperjuangkan perubahan yang positif dalam sistem politik yang ada.', 'politik adalah panggung pertarungan ideologi dan kekuasaan ia melibatkan pengambilan keputusan yang memengaruhi masyarakat politik mencerminkan dinamika hubungan antarmanusia dan kepentingan kolektif penting bagi kita untuk terlibat aktif berpikir kritis dan memperjuangkan perubahan yang positif dalam sistem politik yang ada'),
(7, 'Olahraga', 'Olahraga adalah aktivitas fisik yang memiliki peran penting dalam menjaga kesehatan tubuh. Ini tidak hanya bermanfaat untuk tubuh, tetapi juga untuk pikiran dan jiwa. Berolahraga secara teratur membantu meningkatkan kebugaran fisik dan dapat membantu mencegah berbagai masalah kesehatan seperti obesitas, diabetes, dan penyakit jantung. Banyak orang merasa lebih bahagia dan berenergi setelah berolahraga, karena aktivitas fisik melepaskan endorfin, yang dikenal sebagai hormon kebahagiaan.', 'olahraga adalah aktivitas fisik yang memiliki peran penting dalam menjaga kesehatan tubuh ini tidak hanya bermanfaat untuk tubuh tetapi juga untuk pikiran dan jiwa berolahraga secara teratur membantu meningkatkan kebugaran fisik dan dapat membantu mencegah berbagai masalah kesehatan seperti obesitas diabetes dan penyakit jantung banyak orang merasa lebih bahagia dan berenergi setelah berolahraga karena aktivitas fisik melepaskan endorfin yang dikenal sebagai hormon kebahagiaan'),
(8, 'Makanan', 'Makanan adalah aspek integral dari kehidupan manusia, bukan hanya sebagai sumber nutrisi tetapi juga sebagai ekspresi budaya, cita rasa, dan kebahagiaan. Setiap wilayah di dunia ini memiliki warisan kuliner yang unik, mencerminkan sejarah, lingkungan, dan nilai-nilai sosial dari masyarakat setempat. Makanan adalah jendela yang membawa kita ke dalam peradaban dan kehidupan sehari-hari orang-orang di seluruh dunia.', 'makanan adalah aspek integral dari kehidupan manusia bukan hanya sebagai sumber nutrisi tetapi juga sebagai ekspresi budaya cita rasa dan kebahagiaan setiap wilayah di dunia ini memiliki warisan kuliner yang unik mencerminkan sejarah lingkungan dan nilai nilai sosial dari masyarakat setempat makanan adalah jendela yang membawa kita ke dalam peradaban dan kehidupan sehari hari orang orang di seluruh dunia'),
(9, 'Minuman', 'Minuman adalah komponen penting dalam kehidupan sehari-hari kita yang tidak hanya memuaskan dahaga, tetapi juga menghadirkan beragam kenikmatan dan manfaat kesehatan. Minuman memiliki peran yang tak terbantahkan dalam memenuhi kebutuhan cairan tubuh kita, yang sangat penting untuk menjaga hidrasi dan fungsi tubuh yang optimal. Namun, minuman lebih dari sekadar air; dunia minuman penuh dengan berbagai macam pilihan, masing-masing dengan karakteristik dan manfaatnya sendiri.', 'minuman adalah komponen penting dalam kehidupan sehari hari kita yang tidak hanya memuaskan dahaga tetapi juga menghadirkan beragam kenikmatan dan manfaat kesehatan minuman memiliki peran yang tak terbantahkan dalam memenuhi kebutuhan cairan tubuh kita yang sangat penting untuk menjaga hidrasi dan fungsi tubuh yang optimal namun minuman lebih dari sekadar air dunia minuman penuh dengan berbagai macam pilihan masing masing dengan karakteristik dan manfaatnya sendiri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `training_data`
--
ALTER TABLE `training_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `training_data`
--
ALTER TABLE `training_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
