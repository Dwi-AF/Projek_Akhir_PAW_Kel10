SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog`;

CREATE TABLE `comments` (
  `post_id` int(11) NOT NULL,
  `id_sheet` int(11) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `time` varchar(1000) NOT NULL,
  `commentor_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comments` (`post_id`, `id_sheet`, `comment`, `time`, `commentor_id`) VALUES
(19, 11, 'Test saja', '14-06-2022 (Tue) 10:42:32', 99),
(20, 11, 'Bisa dicoba', '14-06-2022 (Tue) 10:43:28', 99);

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `time` varchar(1000) NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `forum` (`forum_id`, `question`, `description`, `time`, `author_id`) VALUES
(11, 'Definisi Monoton dalam Drama', 'Diskusi santai tapi serius untuk menyikapi bagaimana sebuah drama dapat dianggap monoton atau tida', '14-06-2022 (Tue) 12:12:09', 99);

CREATE TABLE `movies` (
  `movie_id` int(11) UNSIGNED NOT NULL,
  `movie_name` varchar(255) NOT NULL DEFAULT '',
  `movie_year` int(4) NOT NULL,
  `movie_genre` varchar(20) DEFAULT NULL,
  `movie_origin` varchar(2) NOT NULL DEFAULT '',
  `movie_duration` varchar(20) DEFAULT NULL,
  `movie_rev` varchar(2048) DEFAULT NULL,
  `movie_img` varchar(200) NOT NULL,
  `movie_trailer` varchar(200) DEFAULT NULL,
  `page_code` int(1) UNSIGNED NOT NULL,
  `featured_code` int(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_year`, `movie_genre`, `movie_origin`, `movie_duration`, `movie_rev`, `movie_img`, `movie_trailer`, `page_code`, `featured_code`) VALUES
(1, 'CRUELLA\r\n', 2021, 'Comedy, Crime', 'US', '2h 14m', 'Estella adalah grifter muda dan pintar yang bertekad untuk membuat nama untuk dirinya sendiri di dunia mode. Dia segera bertemu dengan sepasang pencuri yang menghargai seleranya akan kenakalan, dan bersama-sama mereka membangun kehidupan untuk diri mereka sendiri di jalanan London. Namun, ketika Estella berteman dengan legenda mode Baroness von Hellman, dia merangkul sisi jahatnya untuk menjadi Cruella yang parau dan suka balas dendam.', 'images/cruella-1-720x480.jpg', 'https://www.youtube.com/watch?v=gmRKv7n2If8', 1, 0),
(2, 'Our Beloved Summer', 2021, 'Romance, Comedy', 'KR', '16 eps', 'Choi Ung dan Kook Yeon-Su putus 5 tahun lalu. Sebuah film dokumenter yang mereka  rekam selama masa sekolah menjadi populer. Mereka tidak mau, tetapi mereka harus berdiri di depan kamera. Choi Ung tampak naif dan berjiwa bebas, tapi dia ingin memiliki sesuatu untuk pertama kalinya dalam hidupnya. Untuk itu, dia menunjukkan apa yang ada dalam pikirannya. Kook Yeon-Su bertujuan untuk menjadi siswa top di sekolahnya, tetapi dia sekarang menjadi orang dewasa yang hidup dengan keras, beradaptasi dengan kenyataan.\r\n', 'images/2-our-beloved-summer.jpeg', 'https://www.youtube.com/watch?v=p_dDoDQ8u94&vl=en', 2, 0),
(3, 'ENCANTO', 2021, 'Family, Musical', 'US', '1h 49m', 'The Madrigals adalah keluarga luar biasa yang hidup tersembunyi di pegunungan Kolombia di tempat yang mempesona yang disebut Encanto. Keajaiban Encanto telah memberkati setiap anak dalam keluarga dengan hadiah unik -- setiap anak kecuali Mirabel. Namun, dia akan segera menjadi harapan terakhir Madrigal ketika dia menemukan bahwa sihir yang mengelilingi Encanto sekarang dalam bahaya.', 'images/encanto-3-720x480.jpg', 'https://www.youtube.com/watch?v=CaimKeDcudo', 1, 0),
(4, 'Youth of May', 2021, 'Romance, Historical', 'KR', '12 eps', 'Seorang mahasiswa kedokteran idealis menikah dengan seorang perawat setelah bertemu dengannya atas desakan ayahnya. Belakangan, nasib mereka saling terkait dengan Pemberontakan Gwangju 1980.', 'images/4-Youth-of-May.jpeg', 'https://www.youtube.com/watch?v=afW9W0FI5vc', 2, 0),
(5, 'LA LA LAND', 2016, 'Musical, Romance', 'US', '2h 8m', 'Ketika Sebastian, seorang pianis, dan Mia, seorang aktris, mengikuti hasrat mereka dan mencapai kesuksesan di bidangnya masing-masing, mereka menemukan diri mereka terpecah antara cinta satu sama lain dan karier mereka.', 'images/la la land-5-720x480.jpg', 'https://www.youtube.com/watch?v=0pdqf4P9MB8', 1, 0),
(6, 'Jirisan', 2021, 'Mystery, Fantasy', 'KR', '16 eps', 'Penjaga hutan bekerja untuk menyelamatkan orang-orang di Taman Nasional Gunung Jiri. Seo Yi-Gang adalah penjaga hutan terbaik di Taman Nasional Gunung Jiri. Dia tahu hampir segalanya tentang daerah itu, termasuk di mana mendaki gunung. Kang Hyun-Jo adalah ranger pemula di Taman Nasional Gunung Jiri. Dia lulus dari akademi militer dan pernah menjadi kapten tentara. Dia memiliki rahasia yang tidak bisa dia ceritakan kepada siapa pun.Kedua orang ini menjadi mitra dan mereka bekerja untuk menyelamatkan orang-orang di sekitar Taman Nasional Gunung Jiri.', 'images/6-jirisan.jpg', 'https://www.youtube.com/watch?v=rZhQ-iMZhpI', 2, 0),
(7, 'Fullmetal Alchemist: Brotherhood', 2009, 'Drama, Magic', 'JP', '64 eps', 'Saudara Edward dan Alphonse Elric mencari Batu Bertuah, berharap untuk memulihkan tubuh mereka, yang hilang ketika mereka mencoba menggunakan keterampilan alkimia mereka untuk membangkitkan yang memberinya kebebasan untuk melanjutkan pencarian saat ia mencoba memulihkan saudaranya, yang jiwanya ditambatkan ke bumi oleh baju zirah. Namun, Edward dan Alphonse bukan satu-satunya yang mencari batu kuat itu. Dan saat mereka mencari, mereka mengetahui rencana untuk mengubah seluruh negeri karena alasan yang tidak dapat mereka pahami.', 'images/a1-fullmetal.jpg', 'https://www.youtube.com/watch?v=dqDB6gQLbPM&feature=emb_imp_woyt', 3, 0),
(8, 'Attack on Titan', 2013, 'Military, Drama', 'JP', 'Ongoing', 'Ketika Titans pemakan manusia pertama kali muncul 100 tahun yang lalu, manusia menemukan keselamatan di balik tembok besar yang menghentikan raksasa di jalur mereka. Tapi keamanan yang mereka miliki begitu lama terancam ketika Titan kolosal menerobos penghalang, menyebabkan banjir raksasa ke zona aman manusia. Selama pembantaian berikutnya, tentara Eren Jaeger melihat salah satu makhluk melahap ibunya, yang membuatnya bersumpah bahwa dia akan membunuh setiap Titan. Dia meminta beberapa teman yang selamat untuk membantunya, dan kelompok itu adalah harapan terakhir umat manusia untuk menghindari kepunahan di tangan monster.', 'images/a2-Attack on Titan.jpg', 'https://youtu.be/MGRm4IzK1SQ', 3, 0),
(9, 'One Piece', 1999, 'Action, Comedy', 'JP', 'Ongoing', 'Mengisahkan petualangan Monkey D. Luffy, seorang anak laki-laki yang memiliki kemampuan ubuh elastis seperti karet setelah memakan Buah Iblis secara tidak disengaja. Dengan kru bajak lautnya, yang dinamakan Bajak Laut Topi Jerami, Luffy menjelajahi Grand Line untuk mencari harta karun terbesar di dunia yang dikenal sebagai \"One Piece\" dalam rangka untuk menjadi Raja Bajak Laut yang berikutnya.', 'images/a4-One Piece.jpg', 'https://youtu.be/S8_YwFLCh4U', 3, 0),
(10, 'Naruto', 2002, 'Fantasy, Action', 'JP', '720 eps', 'Naruto adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage, pemimpin dan ninja terkuat di desanya.', 'images/naruto-5-720x480.jpg', 'https://www.youtube.com/watch?v=yeUpnIKt6k4', 3, 1),
(11, 'SPY x Family', 2022, 'Action, Comedy', 'JP', '12 eps', 'Mata-mata, pembunuh, dan ahli telepati menyamar bersama sebagai satu keluarga. Mereka masing-masing punya alasan sendiri dan menutupi identitas asli dari satu sama lain.', 'images/Spy x family-6-720x480.jpg', 'https://www.bilibili.tv/id/play/1048837', 3, 1),
(12, 'Gintama', 2006, 'Comedy, Sci-fi', 'JP', '201 eps', 'Dua puluh tahun yang lalu, Jepang periode Edo mengalami kejutan budaya yang hebat. alien bernama Amanto menyerbu Bumi, mengalahkan pemerintah negara, dan melarang membawa pedang oleh samurai yang dulu bangga. Selain itu, alien mengambil pekerjaan rakyat dan saat ini menjalankan Jepang sebagai sweatshop menggunakan penduduk asli sebagai buruh. Di era baru yang aneh ini adalah Gintoki Sakata, seorang samurai eksentrik yang ciri khas pribadinya adalah rambut peraknya yang dikeriting secara alami, kecintaannya pada sesuatu yang manis, dan kecanduannya pada Shonen Jump; Shinpachi Shimura, pewaris remaja gaya Kakido-Ryu; dan Kagura, gadis alien yang sangat kuat dari klan Yato yang kuat. Ketiganya adalah wiraswasta di sebuah toko pekerjaan sambilan bernama Yoruzuya Gin-chan, yang menawarkan untuk melakukan hampir semua hal dengan harga tertentu, mulai dari menemukan anak kucing yang hilang hingga menyelamatkan dunia. Sayangnya, pekerjaan jarang berjalan sesuai rencana, atau membayar cukup untuk menutupi rasa sakit dan penderitaan yang dihadapi karyawan—tidak peduli gaji mereka.', 'images/a5-Gintama.jpg', 'https://youtu.be/YQC3ot0IjiA', 3, 0),
(13, 'OUR TIMES', 2015, 'Romance, Comedy', 'TW', '2h 14m', 'Pekerja kantor Truly Lin melakukan perjalanan melalui ingatannya. Berkedip kembali 20 tahun ke waktunya di sekolah menengah, dia mengenang tentang bekerja sama dengan seorang teman untuk mengalahkan saingan mereka.', 'images/our-times-13-720x480.jpg', 'https://www.bilibili.tv/en/video/2007103406', 1, 0),
(21, 'KKN DI DESA PENARI', 2022, 'Horor', 'ID', '2h 10m', 'KKN Di Desa Penari diadaptasi dari salah satu cerita horror yang telah viral di tahun 2019 melalui Twitter, menurut sang penulis, cerita ini diambil dari sebuah kisah nyata sekelompok mahasiswa yang tengah melakukan program KKN (Kuliah Kerja Nyata) di Desa Penari. Tak berjalan mulus, serentetan pengalaman horror pun menghantui mereka hingga program KKN tersebut berakhir tragis', 'images/KKN-1-720x480.jpg', 'https://www.youtube.com/watch?v=jtDRXPTZT-M', 1, 1),
(22, 'SPIDERMAN : NO WAY HOME', 2022, 'Superhero', 'US', '2h 28m', 'Identitas Spider-Man sekarang sudah terungkap, dan Peter meminta bantuan Doctor Strange. Namun sebuah kesalahan terjadi, dan itu justru mengundang musuh berbahaya dari dunia lain, mereka mulai bermunculan. Hal itu memaksa Peter mencari apa makna sebenarnya menjadi Spider-Man.', 'images/spiderman-2-720x480.jpg', 'https://www.youtube.com/watch?v=JfVOs4VSpmA', 1, 1),
(23, 'The World of the Married', 2020, 'Drama', 'KR', '16 eps', 'Tepat ketika Sun-woo berpikir segala sesuatu di sekitarnya sesempurna mungkin, dia menemukan bahwa suaminya dan teman-temannya diam-diam telah menipu dia selama ini', 'images/7-twotml.jpg', 'https://www.youtube.com/watch?v=e4LUxKEJ9uQ', 2, 0),
(24, 'Our Blues', 2022, 'Drama', 'KR', '12 eps', 'Our Blues adalah seri televisi Korea Selatan yang akan datang yang disutradarai oleh Kim Kyu-tae dan ditulis oleh Noh Hee-kyung. Seri ini dibintangi oleh Lee Byung-hun, Shin Min-a and Cha Seung-won, seri ini berkisah tentang kehidupan manis dan pahit orang-orang yang berdiri di akhir, klimaks, atau awal kehidupan, dan menggambarkan kisah mereka dalam format omnibus dengan latar belakang Pulau Jeju.', 'images/our blues-3-720x480.jpg', 'https://www.netflix.com/id/title/81568842', 2, 1),
(26, 'Reply 1998', 2015, 'Comedy, Romance', 'KR', '20 eps', 'Reply 1988 adalah serial televisi Korea Selatan tahun 2015 yang dibintangi oleh Lee Hye-ri, Park Bo-gum, Go Kyung-pyo, Ryu Jun-yeol dan Lee Dong-hwi.[1][2] Drama ini adalah drama yang menghangatkan hati yang berlatar belakang tahun 1988, tentang lima keluarga yang hidup di lingkungan yang sama di Distrik Dobong, Korea Selatan.', 'images/Reply 1998-4-720x480.jpg', 'https://www.netflix.com/id/title/81568842', 2, 1);

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `user_full_name` varchar(150) NOT NULL DEFAULT '',
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL DEFAULT '',
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `user_name`, `user_full_name`, `user_email`, `user_password`, `user_role`) VALUES
(38, 'admin', 'Admin 1', 'admin@admin.com', 'admin', 2),
(39, 'test', 'Test', 'test@test.com', 'test', 0),
(99, 'anon', 'anonim', 'anon@anonimail.com', 'anonpass', 1),
(104, 'mogul amanai', '', 'mamai@gmail.com', '$2y$10$JHpnNmKaNVX0n6H4Gwu5U.DSIKzk4HOLu1Hbq2J6ASPdxmFwSGPt6', 1),
(105, 'magai', '', 'mimi@gmail.com', '$2y$10$Z7RWoYShSuAqSfiI1FZMBOfCla6.UCNY3cZ.qxn0w.vMtZdjN3qle', 0);


ALTER TABLE `comments`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_comment` (`commentor_id`),
  ADD KEY `fk_forum` (`id_sheet`);

ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `fk_author` (`author_id`);

ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `comments`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `movies`
  MODIFY `movie_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;


ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment` FOREIGN KEY (`commentor_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_forum` FOREIGN KEY (`id_sheet`) REFERENCES `forum` (`forum_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `forum`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
