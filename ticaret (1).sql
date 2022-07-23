-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Tem 2022, 23:35:48
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ust_id` int(11) DEFAULT NULL,
  `kategori_adi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategoris`
--

INSERT INTO `kategoris` (`id`, `ust_id`, `kategori_adi`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Elektronik', 'elektronik', NULL, NULL, NULL),
(2, 1, 'Teknoloji', 'teknoloji', NULL, NULL, NULL),
(3, 1, 'Ev', 'ev', NULL, NULL, NULL),
(4, 1, 'Spor', 'spor', NULL, NULL, NULL),
(5, NULL, 'Kamp Malzemeleri', 'kamp-malzemeleri', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori_uruns`
--

CREATE TABLE `kategori_uruns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urun_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategori_uruns`
--

INSERT INTO `kategori_uruns` (`id`, `urun_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(26, 26, 1, NULL, NULL),
(27, 27, 1, NULL, NULL),
(28, 28, 1, NULL, NULL),
(29, 29, 1, NULL, NULL),
(30, 30, 1, NULL, NULL),
(31, 1, 2, NULL, NULL),
(32, 2, 2, NULL, NULL),
(33, 3, 2, NULL, NULL),
(34, 4, 2, NULL, NULL),
(35, 5, 2, NULL, NULL),
(36, 6, 2, NULL, NULL),
(37, 7, 2, NULL, NULL),
(38, 8, 2, NULL, NULL),
(39, 9, 2, NULL, NULL),
(40, 10, 2, NULL, NULL),
(41, 11, 2, NULL, NULL),
(42, 12, 2, NULL, NULL),
(43, 13, 2, NULL, NULL),
(44, 14, 2, NULL, NULL),
(45, 15, 2, NULL, NULL),
(46, 16, 2, NULL, NULL),
(47, 17, 2, NULL, NULL),
(48, 18, 2, NULL, NULL),
(49, 19, 2, NULL, NULL),
(50, 20, 2, NULL, NULL),
(51, 21, 2, NULL, NULL),
(52, 22, 2, NULL, NULL),
(53, 23, 2, NULL, NULL),
(54, 24, 2, NULL, NULL),
(55, 25, 2, NULL, NULL),
(56, 26, 2, NULL, NULL),
(57, 27, 2, NULL, NULL),
(58, 28, 2, NULL, NULL),
(59, 29, 2, NULL, NULL),
(60, 30, 2, NULL, NULL),
(61, 1, 3, NULL, NULL),
(62, 2, 3, NULL, NULL),
(63, 3, 3, NULL, NULL),
(64, 4, 3, NULL, NULL),
(65, 5, 3, NULL, NULL),
(66, 6, 3, NULL, NULL),
(67, 7, 3, NULL, NULL),
(68, 8, 3, NULL, NULL),
(69, 9, 3, NULL, NULL),
(70, 10, 3, NULL, NULL),
(71, 11, 3, NULL, NULL),
(72, 12, 3, NULL, NULL),
(73, 13, 3, NULL, NULL),
(74, 14, 3, NULL, NULL),
(75, 15, 3, NULL, NULL),
(76, 16, 3, NULL, NULL),
(77, 17, 3, NULL, NULL),
(78, 18, 3, NULL, NULL),
(79, 19, 3, NULL, NULL),
(80, 20, 3, NULL, NULL),
(81, 21, 3, NULL, NULL),
(82, 22, 3, NULL, NULL),
(83, 23, 3, NULL, NULL),
(84, 24, 3, NULL, NULL),
(85, 25, 3, NULL, NULL),
(86, 26, 3, NULL, NULL),
(87, 27, 3, NULL, NULL),
(88, 28, 3, NULL, NULL),
(89, 29, 3, NULL, NULL),
(90, 30, 3, NULL, NULL),
(91, 1, 4, NULL, NULL),
(92, 2, 4, NULL, NULL),
(93, 3, 4, NULL, NULL),
(94, 4, 4, NULL, NULL),
(95, 5, 4, NULL, NULL),
(96, 6, 4, NULL, NULL),
(97, 7, 4, NULL, NULL),
(98, 8, 4, NULL, NULL),
(99, 9, 4, NULL, NULL),
(100, 10, 4, NULL, NULL),
(101, 11, 4, NULL, NULL),
(102, 12, 4, NULL, NULL),
(103, 13, 4, NULL, NULL),
(104, 14, 4, NULL, NULL),
(105, 15, 4, NULL, NULL),
(106, 16, 4, NULL, NULL),
(107, 17, 4, NULL, NULL),
(108, 18, 4, NULL, NULL),
(109, 19, 4, NULL, NULL),
(110, 20, 4, NULL, NULL),
(111, 21, 4, NULL, NULL),
(112, 22, 4, NULL, NULL),
(113, 23, 4, NULL, NULL),
(114, 24, 4, NULL, NULL),
(115, 25, 4, NULL, NULL),
(116, 26, 4, NULL, NULL),
(117, 27, 4, NULL, NULL),
(118, 28, 4, NULL, NULL),
(119, 29, 4, NULL, NULL),
(120, 30, 4, NULL, NULL),
(121, 1, 5, NULL, NULL),
(122, 2, 5, NULL, NULL),
(123, 3, 5, NULL, NULL),
(124, 4, 5, NULL, NULL),
(125, 5, 5, NULL, NULL),
(126, 6, 5, NULL, NULL),
(127, 7, 5, NULL, NULL),
(128, 8, 5, NULL, NULL),
(129, 9, 5, NULL, NULL),
(130, 10, 5, NULL, NULL),
(131, 11, 5, NULL, NULL),
(132, 12, 5, NULL, NULL),
(133, 13, 5, NULL, NULL),
(134, 14, 5, NULL, NULL),
(135, 15, 5, NULL, NULL),
(136, 16, 5, NULL, NULL),
(137, 17, 5, NULL, NULL),
(138, 18, 5, NULL, NULL),
(139, 19, 5, NULL, NULL),
(140, 20, 5, NULL, NULL),
(141, 21, 5, NULL, NULL),
(142, 22, 5, NULL, NULL),
(143, 23, 5, NULL, NULL),
(144, 24, 5, NULL, NULL),
(145, 25, 5, NULL, NULL),
(146, 26, 5, NULL, NULL),
(147, 27, 5, NULL, NULL),
(148, 28, 5, NULL, NULL),
(149, 29, 5, NULL, NULL),
(150, 30, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicis`
--

CREATE TABLE `kullanicis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adsoyad` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivasyon_anahtari` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif_mi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kullanicis`
--

INSERT INTO `kullanicis` (`id`, `adsoyad`, `email`, `sifre`, `aktivasyon_anahtari`, `aktif_mi`, `created_at`, `updated_at`) VALUES
(1, 'Fatih AVCI', '66fatihavci21@test.com', '$2y$10$cZI0wHnXqqNq0NJz5J0viuPVcCFPfq4j24FcJi8fFHSrb9rUbRwJW', 'x2Z9n0QS15S22emSMfpiBzSFeLJEDRzEhT6rWaHEtB9TtJBGah4XqxufifWn', 0, '2022-07-12 05:37:25', '2022-07-12 05:37:25'),
(2, 'Hüseyin CC', 'huseyin@test.com', '$2y$10$4zhF8kmQmy5hJdioB/G1EuPZQS0TZT7rTvTv39aTVqMGgwr1/f6ke', '1qij5yVFvDvgGvZOcp8q3UsJYi4rmFYOZMMt3GaJ8rgJPMhf6N7uTtOR8J3O', 0, '2022-07-12 05:47:36', '2022-07-12 05:47:36'),
(3, 'Hüseyin CC', 'huseyin2@test.com', '$2y$10$35YFlIePZ.GbSI6TVNiBDud2RK0dQxODeCjKmyDixTSGnqrN.WE5a', 'pUpQ9DRhSowlCzGA2TpZktWmQNbVom6bS1O2WNFg1MsAWPWZUN5I8OMCLgNG', 0, '2022-07-12 05:49:51', '2022-07-12 05:49:51'),
(5, 'Hacı Mahmut', 'test@test.com', '$2y$10$ae/38d/flk2of5MmmQxvDePU/8TsUyh.VUeOseUCghMxqMHlRTXg2', NULL, 1, '2022-07-12 07:51:39', '2022-07-12 07:58:02'),
(6, 'Fatih AVCI', '21@test.com', '$2y$10$pLUq/pawJ3vjRyipGhdYnODpq6cKeVXklCCzdyvxIg2iCAAp2.rEu', NULL, 1, '2022-07-12 07:58:19', '2022-07-12 07:58:47'),
(7, 'soıfj', '66@td.c', '$2y$10$GHNhFvIhlScG51mMPw5bGuoeuqJygfCjQSYwxNCFfMoODK/vR7K7e', 'SanHXy94i7Bux0LW6MXNuvJYdJB5kO9hj85b26zLwSZQqZ5W0kUxG3SjpA7L', 0, '2022-07-12 08:02:48', '2022-07-12 08:02:48'),
(8, 'Esmanur Avcı', 'e62@test.com', '$2y$10$01hWVy3t00J78igp60c9Suqa/jiergv2oqKDrsQS//xKljtbvAHhO', 'J6u3LjDPmoK8WD2lMBrrkEssNbU78aKjSQimcgx4CRPLN04c0rRpTfYGhfsA', 0, '2022-07-12 08:08:18', '2022-07-12 08:08:18'),
(9, 'Fatih AVCI', '312@test.com', '$2y$10$DM8sMg8Isk4MBjCSsV2iY.21idL4pd70Zaa6TQUqQIQnHpPI4v9Aq', NULL, 1, '2022-07-12 08:09:11', '2022-07-12 08:09:48'),
(10, '13131', '66fatihavci21w@test.com', '$2y$10$jOR2Tbag9bNXL7VuAnLwIutUKRzeg2NOd9882T1kLE4/LPUicbBBK', NULL, 1, '2022-07-12 08:20:41', '2022-07-12 08:20:50'),
(11, 'sfsfs', 'sfsfsfsfs@t.c', '$2y$10$88lhBZ1r7Ijbc/Bb2k.6U.ysJ7R73v8aTdZgySShbumcj2dOoSSQ6', NULL, 1, '2022-07-12 08:27:27', '2022-07-12 08:27:35'),
(12, '2132343', '66fatihavc222i21@test.com', '$2y$10$xk0D9h6kNS5a.ZqEohlQVuQNU24sPiZFmNRcNm7CKB2cnYOHQ9veG', NULL, 1, '2022-07-12 08:28:25', '2022-07-12 08:28:37'),
(13, '13131', '66fatihav3ci21@test.com', '$2y$10$97CBT1mwPzePuULJCgv2Uu577j/IiL7I9p0Nz73/.q.dPHKHqd.Nm', NULL, 1, '2022-07-12 08:31:16', '2022-07-12 08:31:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2022_06_24_073437_create_kategoris_table', 1),
(20, '2022_06_26_111135_create_uruns_table', 1),
(21, '2022_06_27_094808_create_kategori_uruns_table', 1),
(22, '2022_06_29_080113_create_urun_detays_table', 2),
(24, '2022_07_06_120015_create_kullanicis_table', 3),
(26, '2022_07_12_190120_add_aktivation_code_to_users_table', 4),
(27, '2022_07_16_080330_create_sepets_table', 5),
(28, '2022_07_16_085606_create_sepet_uruns_table', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepets`
--

CREATE TABLE `sepets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kullanici_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet_uruns`
--

CREATE TABLE `sepet_uruns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sepet_id` int(10) UNSIGNED NOT NULL,
  `urun_id` int(10) UNSIGNED NOT NULL,
  `adet` int(11) NOT NULL,
  `tutar` decimal(5,2) NOT NULL,
  `durum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uruns`
--

CREATE TABLE `uruns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urun_adi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aciklama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiyat` decimal(6,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `uruns`
--

INSERT INTO `uruns` (`id`, `slug`, `urun_adi`, `aciklama`, `fiyat`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'cecile-coves', 'Cecile Coves', 'Omnis fugit nemo in provident cupiditate recusandae eum odio. In dolorem quaerat fuga ducimus qui vitae sint. Ipsam sed qui nam quibusdam minima nostrum deleniti ut. Debitis blanditiis aut impedit natus qui at quis voluptas. Sed et dolores omnis reprehenderit accusamus. Error natus molestiae maxime vel non vero ratione. Temporibus saepe reiciendis porro et delectus. Enim aut facilis ipsa autem. Cupiditate ad non illum ratione. Voluptatem voluptatibus qui quaerat autem omnis voluptates quia. Odit cupiditate cumque eum ut qui. Quis harum consequatur omnis modi nihil accusantium dolores. Voluptatem eius sint voluptatum consequuntur eum. Sed facilis a autem dolor explicabo consequatur qui quis. Omnis ut laudantium ipsa eligendi nihil consequatur id quia. Et accusamus velit vel porro repellendus tempore. Minima ea odit expedita blanditiis quia suscipit officia. Laudantium quam accusantium voluptas. Sed sit et rerum in laboriosam sed. Esse quis ab cumque alias reprehenderit.', '3.38', NULL, '2022-07-03 06:30:11', '2022-07-03 06:30:11'),
(2, 'naomi-crest', 'Naomi Crest', 'Molestias nulla amet sapiente ex cum. Laborum sed eaque magni itaque qui ipsam quod. Quaerat aut dolorem accusantium eius quia. Ex nobis possimus ea consequatur autem quasi. Accusantium et dolores laudantium. Rerum enim at ut voluptatibus eum animi aut. Labore molestias ipsam eaque rerum voluptates voluptatem. Sit et ad iure aspernatur dolor qui. Pariatur voluptate qui error cum vitae quod. Corporis ipsa et assumenda sed maxime. Quas laboriosam est ut et inventore maiores. Possimus magni eos hic qui dolor qui et officiis. Id eius non est eaque est voluptatem at. Omnis suscipit ad recusandae ab perferendis. Amet eos magnam fuga sequi sunt enim.', '13.46', NULL, '2022-07-03 06:30:11', '2022-07-03 06:30:11'),
(3, 'joshuah-avenue', 'Joshuah Avenue', 'Repudiandae magnam ea dolore excepturi. Aut excepturi voluptas consequuntur eos quas neque rerum. Id voluptatibus est in. Explicabo autem magnam doloribus aut aut eos nemo. Qui est aliquam quia sequi dignissimos voluptas expedita. Laudantium rem non itaque quae sit non maxime culpa. Unde similique et iste sint quidem. Repudiandae autem soluta quia. Soluta qui ratione eaque et soluta ipsam. Iusto possimus enim tenetur perspiciatis. Ad repudiandae aperiam aut maiores. Aut sunt voluptatem qui harum rem et iusto. Voluptas repellat quos doloribus atque ut. Eius quo quo dolorum accusamus totam culpa et. Veniam veritatis numquam fugit. Natus reiciendis est debitis sint. Expedita autem molestiae est qui sit dolor voluptas. Nisi libero tenetur ea rerum nobis voluptatum. Voluptatem numquam sapiente fugiat voluptatum nobis. Sint aut non repudiandae vero provident architecto corporis. Aliquam harum natus et rerum enim explicabo accusantium. Necessitatibus cupiditate veritatis magnam pariatur. Corrupti et excepturi qui atque perferendis. Mollitia nostrum a qui est et qui.', '1.76', NULL, '2022-07-03 06:30:11', '2022-07-03 06:30:11'),
(4, 'tommie-lodge', 'Tommie Lodge', 'Ullam eius est quo ut doloremque. Nesciunt inventore vero molestiae mollitia laboriosam. Est quae dignissimos velit et quia atque. Illo quam quia in hic amet. Quos vitae dolores aspernatur libero iste omnis quod. Architecto aut dolor incidunt veniam voluptatem adipisci. Rerum est eum praesentium vel est. Corporis nihil deleniti ab nostrum sint. Sint cupiditate quos ratione unde molestias doloribus. Dolorem doloribus id ex iste beatae iste. Magni id voluptatem autem vitae quas et. Animi ipsa est qui. Sit deleniti eum voluptates autem neque. Asperiores nostrum sunt aliquid dicta optio. Nostrum doloribus odio in illum beatae impedit. Doloremque magni labore ipsa debitis. Qui voluptatem porro ad possimus. Non voluptatum optio ut sapiente incidunt. Qui recusandae iure laborum eaque minima fugit. Nihil et voluptatem fugiat. Fugiat adipisci rem consequatur nihil voluptatem quo maxime eaque. Totam commodi iure non maxime blanditiis non ea. Qui et inventore inventore autem. Assumenda consequatur voluptatem illum maiores facilis laboriosam. Commodi perspiciatis est eligendi nobis dicta. Possimus qui magnam dicta quo debitis. Eum dolores molestiae eveniet et architecto corrupti fuga consequatur.', '15.76', NULL, '2022-07-03 06:30:11', '2022-07-03 06:30:11'),
(5, 'ortiz-centers', 'Ortiz Centers', 'Aliquam quidem expedita et dolore ut recusandae reiciendis fugiat. Asperiores nihil aut ut quis a assumenda sit praesentium. Facere esse est commodi voluptates nostrum aut. Et architecto architecto quaerat dolores recusandae fuga. Nemo consequatur laudantium sit aspernatur totam aliquam ut assumenda. Hic quod ut dolores illo provident. Maxime aliquid praesentium et. Aut animi ipsum rem voluptatem qui. Ratione debitis dolorum et dolorum. Autem aut quae possimus laudantium non recusandae sed. Accusantium sed quisquam sed repellendus incidunt sed. Ea deserunt facere doloribus tempore sed non. Omnis nihil rerum et. Officiis voluptas qui repudiandae voluptate mollitia optio dolorem molestias. Fugit repellendus aut est explicabo. Officia nostrum ut ipsum velit nulla soluta voluptatibus. Nostrum aperiam ipsa ratione magnam accusamus saepe voluptates. Vero est possimus sit dolorum ea. Est error dolorem dolorem at minus. Magnam atque quia est quis eum. Assumenda dolor et aperiam ex iure. Corporis id sed sit repellat. Quo omnis voluptatum odio quis consequatur quo amet. Ullam ea nostrum consequatur omnis. Vel ea eius autem dicta eos adipisci. Non necessitatibus atque ex aut voluptates et. Quis soluta tempora aut soluta impedit beatae. Ipsa vero nisi ratione temporibus et. Et odio laudantium velit adipisci ad repellat corrupti.', '12.91', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(6, 'lloyd-harbors', 'Lloyd Harbors', 'Minima recusandae officia necessitatibus velit laboriosam necessitatibus voluptatem quod. Fugit ducimus dolor officia et. Molestiae voluptatem quia rerum possimus aliquam explicabo id et. Ut necessitatibus eius tenetur vero culpa autem eius. Est ut consequatur quis sed illum consectetur perspiciatis sunt. Perferendis vel ipsum illum sed necessitatibus illo. Magni aut voluptate amet ea. Laudantium quo ad ad laudantium ut rerum. Quaerat cumque necessitatibus numquam similique ut illo quis. Voluptatum dolores perferendis doloremque molestias. Cum iste eligendi vel voluptas incidunt voluptatibus tempora. Eum sit similique et temporibus pariatur qui molestiae. Sint et ipsam ipsum porro. Consectetur laborum voluptatem dolores recusandae accusantium autem qui velit. Qui aut et molestiae debitis laudantium veritatis nisi. Sit error delectus temporibus laboriosam hic sint. Adipisci ex nemo eveniet illum voluptatem. Minus praesentium sit officiis quod iste at quae. Tempora sunt nihil animi inventore. Tenetur recusandae officia quidem aperiam in. Laborum eum deserunt atque voluptas. Temporibus dolores odit omnis itaque deserunt. Voluptatem dolore qui at est. Enim vero nam commodi quis dolorum alias. Eius non rem molestiae consectetur officiis vel voluptatem. Libero dicta voluptatibus fugiat laboriosam officiis possimus. Veniam quod voluptate quia ut et qui. Consectetur quisquam rerum cum accusamus.', '6.28', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(7, 'jakubowski-groves', 'Jakubowski Groves', 'Sunt et autem culpa saepe. Enim qui maiores odio vitae. Voluptas ut porro odio minima. Facilis labore voluptatem alias laudantium ut. Consequatur et tempora fuga officiis mollitia non. Consequuntur voluptas quia ea qui. Voluptatem porro quo in rem ea non voluptatem illum. Animi laudantium temporibus at laudantium. Consectetur corrupti ea ut cumque ad. Reprehenderit recusandae odio dignissimos. Commodi rem eligendi officia. Vero dignissimos libero qui deserunt sint repellendus eligendi fugit. Et dolorem modi sit voluptatem consequatur nobis. Ut voluptas quos dicta reprehenderit. Quaerat labore et repudiandae iusto laboriosam. Voluptatum explicabo labore iure sit. Dolorem dolores delectus voluptas repudiandae assumenda repellat. Quo dolor ut dignissimos autem molestias. Minus vitae soluta itaque inventore facilis fugiat optio. Officia qui modi minima eveniet. Ducimus commodi inventore ut deserunt. Odio temporibus quo harum. Consectetur possimus excepturi delectus dicta animi. Illum amet et rem nam velit esse. Et omnis aut cum suscipit enim ducimus. Ullam veniam rerum veniam commodi laborum deserunt laudantium. Sunt corporis ducimus id earum dignissimos dignissimos sint.', '8.42', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(8, 'brigitte-squares', 'Brigitte Squares', 'Sunt enim alias tempora deserunt. Et nihil ab et repudiandae. Quam laborum ab quod repellendus nihil iure quo ipsa. Illo incidunt quo nihil quisquam impedit. Harum quis sit molestiae repellat porro. Fugit iusto magnam minus recusandae eligendi rerum odio molestiae. Consequatur inventore provident porro neque corporis nihil. Quibusdam sit voluptatem voluptas incidunt dolorem voluptas voluptatem. Architecto quaerat deleniti aut debitis. Praesentium veritatis temporibus inventore atque. Sint voluptatem maxime est tenetur. Quis rerum autem ullam incidunt aut blanditiis at unde. Sunt asperiores asperiores harum nulla. Quaerat dolores et omnis atque et. Porro architecto et doloremque dolorum maiores odio et.', '9.49', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(9, 'turner-trail', 'Turner Trail', 'Quas commodi repudiandae assumenda perspiciatis eius porro velit. Quo voluptates dolores sed tempora facere. Doloribus omnis et consequatur deserunt et doloremque qui. Consequuntur odit ipsum quisquam deleniti eveniet voluptatem ipsam. Unde hic voluptatem nesciunt illum earum et praesentium praesentium. Dolores culpa voluptatum repellat id pariatur dolor delectus. Placeat quam alias magni sit. Minus qui soluta ducimus quam qui dicta. Dolores aspernatur eum ipsa nihil eveniet beatae. Nesciunt id eveniet sed excepturi facilis voluptatem tempora. Illum reprehenderit sint suscipit velit. Et enim id deserunt. Nobis neque dolor est. Nam omnis ad iure et qui sequi. Quibusdam ex qui nesciunt corporis corporis qui. Et praesentium ea autem aut eaque quis quis cum. Doloribus accusantium mollitia error est. Molestias nihil qui autem omnis est. Quia autem provident ut sit optio consequatur iusto.', '4.95', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(10, 'orie-isle', 'Orie Isle', 'Voluptas et natus dicta amet nostrum assumenda est officiis. Aliquid atque quibusdam optio et ea voluptatum ex. Aliquid optio ex cupiditate aut possimus vitae laudantium. Error labore animi debitis. Et nihil consectetur et. Tenetur ipsam itaque eum eum. Id perferendis quidem eum iusto. Eos mollitia qui corporis voluptatem distinctio eum. Laborum sit illum asperiores laudantium magnam eos similique voluptatum. Atque minima iure dolore dolor. Omnis provident rerum expedita corporis dolorum temporibus. Facere perspiciatis non minima qui. Repellat pariatur quae nobis dolor. Quis quas vitae et. Pariatur dolorum animi molestiae repellendus ipsum mollitia. Incidunt cumque dolor nam id fugiat. Ut autem ut voluptatem consectetur tempore aut eum. Placeat enim illum vitae quidem vitae assumenda ut. Harum unde dolorum dolores aut debitis. Cupiditate sint exercitationem et consequatur quia. Quia ut iste similique. Non explicabo in rerum adipisci facere ducimus ipsa. Possimus laboriosam quis accusantium nisi ut eum odit suscipit. Et earum autem nobis aliquid sint doloribus in voluptas. Magnam optio ullam architecto tenetur voluptas perspiciatis distinctio illo.', '1.21', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(11, 'west-throughway', 'West Throughway', 'Atque culpa ab voluptatem officia. Laborum in nulla beatae in aperiam cum. Provident perspiciatis tempore porro totam beatae totam quaerat. Omnis quidem totam est at optio repellat excepturi. Est cumque optio quo pariatur a. Vitae voluptatibus voluptas consequatur aut. Amet magnam unde in voluptas id. Tenetur facilis accusantium eos a ut. Possimus libero eum eius placeat odio soluta nulla. Animi expedita labore corrupti dolor non. Omnis molestias consectetur et sapiente iste. Tempore possimus hic quia eum fuga quia ut. In eos eos aut sed culpa. Eos atque omnis ut rerum itaque ea. Distinctio porro eius dicta ipsa. Labore molestiae quia ipsam eum repudiandae iusto reprehenderit. Et iusto ut rerum. Earum quisquam molestiae at itaque doloribus delectus ut. Aut animi veritatis qui impedit nam. Et eius ipsa vel eligendi quae aliquid sed explicabo. Eveniet nihil fugit ut illum quam in. Sed eligendi sapiente reprehenderit enim. Quibusdam repellendus velit laudantium et. Sequi consequuntur architecto rerum et. Eum dignissimos quis illum in. Laborum quaerat optio corrupti eius. Accusamus voluptatibus labore aut magnam illo. Eius qui dolorem voluptates nam dignissimos. Cupiditate praesentium accusantium provident sunt laborum excepturi aperiam.', '11.89', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(12, 'bruen-garden', 'Bruen Garden', 'Doloribus fugiat aut alias voluptas eius debitis omnis ducimus. Rerum voluptatem voluptas dolore animi fuga quia qui quis. Dolor occaecati sunt aut assumenda sapiente molestias delectus. Ut ipsum illum fuga repudiandae amet non laborum. Vero sit harum consequatur voluptatem dolorem animi. Deleniti in ipsam nisi natus delectus reiciendis. Aliquam enim reprehenderit occaecati odio ducimus. Quasi qui ex qui laudantium ut. Accusantium perferendis perspiciatis nam quisquam quia velit. Veniam porro amet voluptatibus excepturi voluptas totam. Nesciunt aspernatur dignissimos ducimus maiores rem optio voluptatem. Maiores maiores numquam dicta quo. Doloribus id rerum aut iusto. Temporibus qui minima voluptates nostrum et quas maxime maiores. Odio minima quis possimus nobis in. Rerum voluptas cumque repellendus eligendi ut et. Eligendi vel ullam in quo.', '16.38', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(13, 'destin-highway', 'Destin Highway', 'Alias eos tenetur doloremque aperiam porro delectus possimus. Optio neque eos aut labore illo. Reiciendis quod delectus exercitationem hic soluta. In atque quis occaecati aut culpa nesciunt modi. Error aliquid qui nulla amet. Hic laudantium quo laborum qui. Consequatur omnis nihil nisi quo omnis minima. Ut enim quo non reiciendis corrupti. Dolores facere tempora fugit natus assumenda quisquam. Voluptatibus laudantium autem architecto asperiores ipsa. Numquam perferendis deleniti quod quibusdam ipsa cum. Et et dolore sequi voluptatem laudantium assumenda sit. Qui voluptatem cupiditate dolores distinctio quo suscipit. Natus labore voluptas dicta quas ab sunt. Quae occaecati quo harum. Aut modi ad et cupiditate repellat corrupti et doloremque. Fugiat quibusdam magni officiis voluptatum possimus. Iste dolor consequatur voluptas placeat quod. Nulla enim quia repudiandae eveniet. Ut eligendi dolor quia voluptatum in rerum. Minima est ipsam ipsum voluptates quisquam cum incidunt. Nesciunt accusamus consequatur enim. Alias voluptatibus vero ut pariatur qui qui quidem. Optio corporis quo nihil vel dolor. Doloribus ut illo ipsum ratione.', '3.69', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(14, 'adolfo-fall', 'Adolfo Fall', 'Saepe officiis eveniet voluptatem sed deserunt officia. Eaque impedit asperiores in consequuntur unde similique ipsa et. Repellat et consequatur similique numquam minima. Provident magni eligendi autem aliquid fugit sunt incidunt. Est consequuntur ullam et reprehenderit et. Odio sit facere velit est iusto. Molestias velit dolorem libero autem commodi laborum. Ratione sapiente facilis nulla modi voluptatem eos. Quo sit quia deleniti laborum. Delectus exercitationem iure ut labore officia praesentium et. Rerum beatae hic voluptas perspiciatis tempora quo. Temporibus dolorem ut corrupti nesciunt. Voluptas maiores et fuga nobis totam nobis. Qui odio tempore laboriosam pariatur iste sint vel. Aliquid cum delectus repellendus. Quidem et harum ipsum dolores asperiores earum pariatur.', '18.08', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(15, 'colin-cove', 'Colin Cove', 'Voluptatem enim beatae itaque consequatur numquam. Accusamus eum consectetur ex atque. Sit cumque id ea qui laborum id. Ut laboriosam amet natus modi qui est qui. Ut sapiente aut voluptas et quia. Qui quo et est similique. Et aut assumenda non necessitatibus nobis. Sed nam omnis ex dignissimos similique et. Et aperiam quis voluptatem voluptatibus ad. Similique atque sint eligendi distinctio vel placeat voluptas non. Architecto eaque repudiandae ut et modi vitae repellendus. Sit expedita harum architecto. Eum beatae iusto voluptatem totam. Vero placeat officiis rem enim et inventore sit. Mollitia cumque quia exercitationem qui eveniet id sed. Aperiam sequi et omnis vero. Qui accusamus adipisci vero accusamus. Molestiae qui voluptatem odio dolorum dolorem. Quidem ipsa veniam fugit enim. Non animi assumenda ipsum molestias nemo. Voluptatem earum repellendus odio maiores eos ducimus id. Praesentium quo hic ducimus voluptates voluptatum et distinctio. Et at sit et quia possimus est delectus. Voluptatem vero ullam voluptatem itaque. Nemo facilis quis distinctio odio autem minima. Eum illum alias ipsam at quam est.', '5.86', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(16, 'mathias-spurs', 'Mathias Spurs', 'Nulla rerum laboriosam nulla tenetur et dicta. Illum blanditiis repellendus quam minima. Est consequatur et voluptas velit officiis fugit. Iste ea ut veniam quae aspernatur. Fugiat ad voluptas consequatur cum inventore. Mollitia sit amet dolores labore laboriosam. Debitis aut velit labore hic et dolorem eveniet. Et fugiat voluptatum mollitia voluptatibus totam expedita. Tempora voluptas ipsum molestiae omnis nihil. Sint et repellendus tempore dolor alias qui. Minima est odio repellat corporis omnis. Quia omnis eligendi ut eveniet et sed et. Illo est minus consequatur laudantium et animi qui. Quidem aut culpa assumenda quasi excepturi quos. Delectus libero veritatis velit expedita. Quaerat iste recusandae temporibus ab reprehenderit officia. Libero ut inventore iusto autem unde. Ab quisquam et aliquam id nulla. Exercitationem ut voluptas ipsam commodi. Dolores repellat odio dolorem asperiores aspernatur delectus et. Dolorem et sint omnis dolore distinctio architecto. Aut ducimus provident eos provident aut animi est. Repellendus dolores voluptas alias rerum. Sed animi autem aut autem. Earum dolor non sapiente similique est architecto voluptatem. Ut dolorem quasi quaerat dolorem qui non facilis. Expedita quidem earum iste nostrum quod excepturi in. Sint cupiditate eaque necessitatibus. Reiciendis consequatur porro ut eius culpa voluptas dolores quas.', '15.87', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(17, 'cartwright-motorway', 'Cartwright Motorway', 'Facilis facere deserunt magni fugiat at. Quisquam deleniti neque placeat perspiciatis. Minima id quam laborum corporis aliquam. Animi exercitationem ducimus dolor inventore quo totam eligendi. Vel nemo et aut laudantium. Ipsa ut reprehenderit repellendus veritatis explicabo tenetur dolores. Quasi totam a fugit asperiores. Qui aut atque eos dolores mollitia in. Et unde quas omnis aut vitae. Nesciunt nisi occaecati non sint praesentium nulla quo voluptatum. Repellendus totam eum deleniti illo ut labore et. Et iste quae officiis nobis. Minima eveniet aspernatur adipisci est. Consequatur voluptas nobis iusto nisi ut reiciendis molestiae. Est vitae qui nihil quia unde. Iure dolorem delectus voluptas doloremque architecto. Voluptatem eaque in quae voluptas nihil reprehenderit. Et tempora autem nemo et libero tempora. Itaque aliquam sapiente perspiciatis animi. Exercitationem et facilis corporis maxime temporibus similique quia.', '10.54', NULL, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(18, 'hoeger-ways', 'Hoeger Ways', 'Consectetur rem est ab et ratione voluptates libero. Accusamus distinctio ea dolorem adipisci nisi sit minus. Fugiat nihil debitis dolorem rem ullam. Nam rerum maiores voluptatem consequuntur nesciunt. Reiciendis laudantium tempora assumenda et ut hic est. Ullam est et qui quis voluptatem. Magni ut quidem laborum fuga cumque reprehenderit voluptas. Quia minus ea laudantium iste. Officia necessitatibus nesciunt et voluptatum neque corrupti quibusdam. Cupiditate porro atque illum aliquid dolorum omnis. Nam ut vitae exercitationem iste provident officiis. Tenetur odit cumque aperiam porro inventore dolores non. Dolorem ullam sint ea quam nemo. Ducimus ut a amet sed id hic. Aut nobis consectetur quo id ex ratione at sequi. Ipsum et et nam praesentium odit laborum voluptas asperiores. Debitis cum nam in quam ea aperiam. Et voluptatem et distinctio enim sit ut odit consequuntur. In error harum iste tenetur veniam. Quidem unde autem possimus culpa.', '7.53', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(19, 'mallory-garden', 'Mallory Garden', 'Velit sit in architecto blanditiis. Iure ex eligendi omnis eos. Nulla eveniet facilis quod accusantium iusto quam aut. Recusandae inventore eum iusto aut distinctio voluptas dolorem. Et accusantium et facere vel ratione. Libero tenetur et distinctio qui molestiae fugiat. Accusantium laboriosam dolor ipsa eum totam sit dolor inventore. Qui placeat aliquid et et quo. Voluptate ipsa aut incidunt soluta. Illo consectetur quaerat quam aut. Impedit consequatur mollitia eaque facere sed corporis non neque. Hic eaque officia omnis fugit. Voluptatum laboriosam qui dolorem aliquid dolores quia. Perspiciatis laboriosam asperiores rerum natus ut voluptatem.', '15.19', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(20, 'terrill-key', 'Terrill Key', 'Assumenda repellat quia suscipit porro et qui. Vel omnis aliquam odit molestias dolores. Aut voluptatibus velit dolores eos facere. Aut rerum et harum quia nam et ipsum. Optio nemo quod omnis excepturi aliquam. Est officia quia voluptatum eum nihil inventore veritatis sequi. Est blanditiis dolor qui ut. Quia quis similique consequatur praesentium aut. Et repudiandae omnis ea vero labore totam. Maxime sed perferendis facilis assumenda velit sapiente sit. Qui nihil quo asperiores aperiam modi aut vel. Alias quae ea libero perspiciatis quia aut. Architecto et dolor consequuntur soluta dolore quia nihil. Nihil ab error libero quam aliquid voluptas neque. Numquam suscipit consequatur quia ut culpa optio quasi. Nostrum ratione inventore aperiam saepe fugiat nobis. Itaque et alias eius quaerat nulla natus dolore. Rem error enim maxime reiciendis reiciendis. Eum nostrum temporibus non accusantium. Voluptatem non consequuntur sapiente quibusdam autem excepturi. Enim harum ut repellat ut reiciendis ipsam. Reprehenderit vitae omnis ut. Quia autem sequi impedit repellendus repellat optio sed.', '5.07', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(21, 'sharon-hill', 'Sharon Hill', 'Nesciunt laudantium eligendi temporibus exercitationem quibusdam. Assumenda iusto dolor eos soluta. Aliquam ab sint similique maxime aspernatur amet ut voluptas. Minus delectus ipsam eos beatae neque. Ut iusto delectus quo quisquam. Tenetur enim necessitatibus dolor iure quibusdam veniam eaque. Quae praesentium sit distinctio non et. Similique delectus iure nesciunt voluptatem voluptatibus. Enim atque repellendus et assumenda atque consequatur culpa. Earum nulla aut soluta sit necessitatibus. Expedita corporis possimus id est voluptas quis. Fugit fugit repudiandae maxime nam deserunt aut minima voluptas. Consequatur consequatur alias hic autem est qui cum. Autem quasi odit non odit nam. Assumenda temporibus minima nostrum. Velit eum qui ipsam quas iusto harum. Amet magni ipsum reprehenderit. Dolor aut iure ut illo quas. Debitis et magnam similique voluptatibus a. Ea animi distinctio est vel unde praesentium. Voluptatem magni optio doloremque omnis ipsam sunt eius. Dicta quod consectetur quis qui. Animi dolore quisquam aut est. Maxime harum ab quia ut voluptas voluptas aut.', '14.77', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(22, 'tremblay-run', 'Tremblay Run', 'Omnis enim atque quia. Soluta quos harum consequatur sint. Quibusdam similique suscipit perferendis officiis. Ut facere at expedita. Illum molestias ipsa facere voluptatem velit laudantium. Consectetur et soluta qui a eius quia. Quas dolores nam eos quis. Illum aliquam totam fugiat eveniet et nemo. Temporibus eveniet illo a amet quaerat. Alias aut tempore qui. Accusamus ut soluta voluptates nulla. Ratione aut unde aut saepe neque accusamus blanditiis amet. Sunt unde vel quia quod omnis ipsam tempora. Voluptatum explicabo voluptatem repellat quia eum. Iure blanditiis similique ut eum maxime aspernatur voluptates consequuntur. Consequuntur sunt dolorem aut omnis consequatur.', '16.54', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(23, 'kessler-rest', 'Kessler Rest', 'Dicta doloribus voluptatem neque nobis ipsa. Omnis sint doloribus qui iure omnis autem recusandae. Non cumque labore eum facilis quia qui. Molestias aut reprehenderit ratione possimus ut. Libero magnam mollitia sed provident architecto. Numquam possimus dignissimos dolorem mollitia quasi dolore. Consequatur adipisci et est voluptatem rerum ut id. Dolores quae praesentium reprehenderit ut accusamus laboriosam. Provident mollitia eos et illum. Veniam qui hic vero veritatis voluptas. Ducimus tempore facilis ut quis eos non enim. Eaque voluptatem et soluta deserunt deserunt rerum animi. Tempore natus maiores aliquam illo vel quo. Accusamus iure repudiandae est dolorem qui occaecati. Eum totam beatae laboriosam repudiandae ullam neque necessitatibus dolor. Accusantium laudantium corporis ipsum ducimus et rem laboriosam. Praesentium fugit quo corporis minima. Quia et et molestiae dicta dignissimos cupiditate deserunt. Sit et ut molestiae eum a quod.', '4.84', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(24, 'jade-ferry', 'Jade Ferry', 'Quo quo amet quod quis adipisci rerum. Aut voluptatibus temporibus id dolorum. Quod est repellendus ratione blanditiis similique vitae voluptas dolorem. Nesciunt id nesciunt iste velit. Mollitia et nobis aperiam aut non assumenda sunt nihil. Veritatis sapiente illum expedita enim sit itaque veniam ratione. Eligendi quidem quae id similique. Dolores aut aut adipisci aut enim rem ducimus ea. Beatae eligendi hic est quisquam culpa tenetur. Fuga culpa suscipit a alias. Quas magni aut soluta voluptates aspernatur. Illo impedit qui magni inventore deserunt ut. Quod recusandae perferendis hic non deleniti quia. Dolore eos sint est perspiciatis consequuntur harum. Et aperiam eius velit quia ipsam sit similique. Pariatur esse ut ratione modi tempora voluptatem. Nulla dignissimos soluta adipisci facilis et minima. Quisquam ratione dolores non at sint et. Consequatur et ea error et cum iusto. Autem voluptatem et excepturi in. Aut perferendis debitis dolorem. Voluptas incidunt illo maiores voluptatibus labore quam. Deserunt vitae quas nesciunt asperiores. Repellat laborum cupiditate amet reiciendis consequatur eos quia. Veniam nobis iusto quasi cumque earum consequatur. Molestias voluptatem debitis sit tenetur et aliquam. Ratione qui cupiditate facere eligendi. Ut adipisci recusandae iure mollitia enim.', '18.95', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(25, 'lebsack-underpass', 'Lebsack Underpass', 'Vero ullam consequatur vel eligendi et explicabo. Aliquam porro eum ullam. Praesentium omnis sit odit. Qui recusandae possimus illum quibusdam rerum rerum ut. Cupiditate adipisci aperiam sint id similique blanditiis. Fugiat mollitia facilis ipsa quaerat. Odio saepe qui distinctio odit consequuntur. Qui ut exercitationem enim aut impedit voluptas accusantium. Alias quam commodi voluptate corporis ad libero. Porro commodi dolor error. Et voluptatibus voluptatem quis aliquid in. Dolore officiis voluptates qui modi minus. Architecto quibusdam minus nemo unde impedit. Velit veniam vitae laudantium atque voluptatem soluta. Et eligendi eos consequatur nisi ab. Ut aut sint dolorem asperiores sit. Id expedita sit adipisci delectus qui. Debitis quis quod voluptatem consequuntur nam libero. Provident hic error consequatur ab eum. Molestiae culpa ut explicabo dolor expedita aliquid eius. Nobis officia eos illo quisquam corporis. Sed nulla sed est temporibus ducimus. Velit laborum dolores eligendi nemo. Et nulla fugiat inventore corrupti. Sunt dolores est dolor sequi ut tenetur perferendis.', '11.70', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(26, 'ricardo-circles', 'Ricardo Circles', 'Consequatur aut est nesciunt pariatur consequatur. Explicabo consequuntur voluptatem consequatur dolorem. Maxime porro ut aliquam rerum. Aut et delectus voluptas unde et optio vel. Facere ab vel sit est velit. Quo nesciunt molestiae et aut eligendi sunt velit. Libero explicabo id soluta. Voluptate eius velit nulla et est provident et. Earum et ad molestiae corporis placeat sed deleniti consectetur. Quam beatae quia omnis ullam. Aspernatur deleniti quo sint magni. Repellendus nihil non et sed rerum et consequuntur. Voluptate temporibus ea id voluptatem. Alias natus molestiae sit possimus voluptas et. Asperiores velit nulla consectetur sed sit. Perspiciatis molestias quas accusantium molestias dicta blanditiis vitae. Sit ut totam delectus assumenda et cumque sunt. Minima fugit deserunt cum cum adipisci sint eos. Porro incidunt commodi ea eius qui. Vel quod sunt fugiat similique praesentium. Voluptatem consequatur perspiciatis officia tenetur illo et. Soluta et dolorum id sunt. Exercitationem fugiat vitae libero qui soluta. Magnam quis in repellat explicabo deleniti aspernatur quam. Nulla esse dignissimos error delectus quos illo non sed.', '18.92', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(27, 'gleichner-expressway', 'Gleichner Expressway', 'Soluta omnis sunt qui blanditiis hic fugiat nam. Doloremque minus qui eos culpa saepe ea. Similique eaque incidunt vel qui labore iusto praesentium. Non eligendi ut aut ad aut sint assumenda. Et vel accusamus fugiat consequatur dignissimos. Officia eos id minus maxime sunt numquam. Velit qui omnis sint saepe sit dolorem. Quo a consequatur odit. Adipisci voluptatem voluptas eligendi et ad sed. Voluptatem dignissimos ut et placeat occaecati. Mollitia nulla harum earum totam laudantium autem amet. Id explicabo tempore et magni tempora et sunt. Natus nobis quibusdam deserunt non. Ipsum sunt totam vero eum explicabo id perspiciatis quia. Ut doloribus et eos quisquam tempora aspernatur dicta. Et aperiam eaque sit deleniti voluptatem esse. Corporis aut in commodi distinctio voluptas. Iste vel qui sunt explicabo blanditiis. Voluptas nemo suscipit exercitationem repellat. Non magnam consequuntur ullam nihil ipsa illo mollitia. Temporibus non animi quia. Fuga molestias ut facilis error qui voluptatem deleniti.', '8.14', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(28, 'arianna-junctions', 'Arianna Junctions', 'Porro quis dolor commodi esse fugit. Voluptates eum cum laboriosam. Non maxime cum minima aut voluptas accusamus laboriosam sapiente. Atque sunt in beatae. Fugit ipsum impedit sit accusamus. Eaque sit illum blanditiis iure. Rerum doloremque quis possimus voluptas. Provident soluta illo quo ab non optio. Et totam beatae numquam itaque. Vel quo temporibus quas consequatur necessitatibus. Quia qui suscipit modi dolorem omnis recusandae. Ut nesciunt voluptatem id sunt itaque architecto. Aut ullam est ut consequatur et. Soluta officia aliquam voluptatem neque dolores. Nisi facilis asperiores nihil tempore. Quas porro doloremque repellendus quod nihil at. Vero quod rerum consequatur veritatis. Aspernatur expedita ea corporis velit qui quo. Quia voluptas assumenda aut. Eos et quod tenetur et eaque deserunt iusto. Laudantium impedit maxime suscipit voluptate porro blanditiis repellendus. Recusandae dignissimos nihil velit alias a labore. At perferendis sequi mollitia adipisci ex. Necessitatibus numquam labore eum repudiandae aut sunt placeat. Numquam voluptatum nam et odio impedit beatae aut quasi. Vitae quod eaque rem quia unde.', '6.78', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(29, 'henry-mall', 'Henry Mall', 'Sint voluptatem illum numquam possimus consequatur perspiciatis exercitationem molestiae. Voluptatem asperiores fugit ut a in dolores. Cum voluptas et optio ut suscipit. Dolor quidem et quas eaque. Dolorum aut nisi vitae aliquid voluptatibus aut alias. Molestiae aut provident corporis. Perspiciatis numquam nemo et dolores qui eveniet ad sit. Vel natus dicta laborum consequatur fuga possimus omnis repellendus. Sint voluptatem assumenda accusamus amet. Quis accusamus sed aut aut voluptate deleniti. At itaque ea id voluptatum recusandae non. Ipsam dolore sed sequi cupiditate. Sit accusantium doloremque et enim. Qui reiciendis voluptas sapiente et vel est architecto provident. Id nisi error voluptatem fugiat at aliquam. Mollitia ea facilis nobis nobis. Ut consequatur reprehenderit magnam quae harum ut. Non ad ex vitae voluptate cumque. Sint ea libero eligendi et consequatur. Excepturi quia repellendus fugit. Quibusdam facilis voluptatem quidem ipsam voluptatem aut et. Et iste quia doloremque qui et repellendus animi dolor. Eum veritatis debitis facilis. Et est ad et sunt omnis officiis. Autem libero laboriosam est porro quia accusamus. Qui ipsum quas in deserunt cumque.', '3.44', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(30, 'okuneva-fords', 'Okuneva Fords', 'Est voluptatem quis et exercitationem. Quia eveniet voluptatem dicta nobis aut. Dicta eius velit ut. Voluptatibus maxime voluptates officiis similique ratione autem nihil. Non officiis est architecto. Consequuntur aperiam aut quis corporis. Omnis illo impedit placeat eum suscipit. Ut non doloremque facilis praesentium et magnam tempora eius. Eum ipsa ex dicta pariatur consequuntur sunt ipsam. Aut qui quae qui voluptates amet facilis eligendi deleniti. Vel hic officia ea quos consequatur nihil dicta. Voluptate cumque quo sunt deserunt nostrum quis. Omnis et accusantium ipsum itaque. Nesciunt sequi rem delectus corporis commodi quasi reiciendis. Dolores eveniet qui eos quibusdam ullam delectus exercitationem tenetur. Vero in architecto voluptates rem voluptas voluptas. Cupiditate non amet voluptatum sit aspernatur eius libero. Incidunt aut modi culpa debitis voluptas. Tempora qui sint nihil eaque veritatis quia. Aliquid fugit eligendi placeat similique. Dolor maiores praesentium est sequi eum. Non et nulla est blanditiis est iusto. Repellendus molestiae sit at ut quis consequatur harum. Nobis veritatis qui autem beatae nisi. Veniam eos ut possimus voluptatibus et aut. Quia ut magni corporis minus voluptas sit quaerat.', '13.81', NULL, '2022-07-03 06:30:13', '2022-07-03 06:30:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_detays`
--

CREATE TABLE `urun_detays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urun_id` bigint(20) UNSIGNED NOT NULL,
  `goster_slider` tinyint(1) NOT NULL DEFAULT 0,
  `goster_gunun_firsati` tinyint(1) NOT NULL DEFAULT 0,
  `goster_one_cikan` tinyint(1) NOT NULL DEFAULT 0,
  `goster_cok_satan` tinyint(1) NOT NULL DEFAULT 0,
  `goster_indirimli` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urun_detays`
--

INSERT INTO `urun_detays` (`id`, `urun_id`, `goster_slider`, `goster_gunun_firsati`, `goster_one_cikan`, `goster_cok_satan`, `goster_indirimli`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, 1, 0, '2022-07-03 06:30:11', '2022-07-03 06:30:11'),
(2, 2, 1, 1, 1, 1, 1, '2022-07-03 06:30:11', '2022-07-03 06:30:11'),
(3, 3, 0, 0, 0, 0, 1, '2022-07-03 06:30:11', '2022-07-03 06:30:11'),
(4, 4, 0, 0, 1, 1, 1, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(5, 5, 0, 1, 0, 1, 1, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(6, 6, 1, 0, 0, 0, 1, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(7, 7, 1, 1, 0, 1, 0, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(8, 8, 0, 1, 0, 0, 0, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(9, 9, 0, 1, 0, 0, 0, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(10, 10, 0, 0, 1, 0, 1, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(11, 11, 0, 0, 0, 1, 1, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(12, 12, 0, 1, 0, 0, 0, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(13, 13, 1, 0, 1, 0, 0, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(14, 14, 0, 0, 1, 1, 0, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(15, 15, 0, 0, 0, 0, 1, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(16, 16, 1, 1, 0, 1, 0, '2022-07-03 06:30:12', '2022-07-03 06:30:12'),
(17, 17, 1, 1, 1, 1, 1, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(18, 18, 0, 0, 0, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(19, 19, 1, 0, 0, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(20, 20, 0, 0, 0, 1, 1, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(21, 21, 1, 1, 1, 0, 1, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(22, 22, 1, 1, 0, 1, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(23, 23, 1, 0, 1, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(24, 24, 1, 0, 0, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(25, 25, 1, 1, 0, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(26, 26, 0, 0, 1, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(27, 27, 0, 1, 0, 1, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(28, 28, 0, 1, 0, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(29, 29, 0, 1, 0, 0, 0, '2022-07-03 06:30:13', '2022-07-03 06:30:13'),
(30, 30, 1, 1, 0, 1, 1, '2022-07-03 06:30:13', '2022-07-03 06:30:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAktive` tinyint(1) NOT NULL DEFAULT 0,
  `aktivation_code` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `isAktive`, `aktivation_code`, `created_at`, `updated_at`) VALUES
(1, 'Fatih AVCI', '66fatihavci@gmail.com', NULL, '$2y$10$TKuUHYvJQJG2adPfPyiaA.0JF5ORW8JLsy/UhCoeMpzi7HPz4vApG', NULL, 0, NULL, '2022-07-12 15:30:36', '2022-07-12 15:30:36'),
(4, 'Esmanur Avcı', 'Esma@test.com', NULL, '$2y$10$niFKTzTFzdjezQLVUJ6H8eqC34gi/nGV9MoBAgBJ32ql4KLERb9im', NULL, 0, NULL, '2022-07-12 15:44:18', '2022-07-12 15:44:18'),
(14, 'Fatih AVCI', '232w222@test.co', NULL, '$2y$10$QKz0kCGliypycXxIsuoEM.aOJgeCepH9LPG0LSgEQl1cC5elFJRgC', NULL, 0, NULL, '2022-07-12 16:22:32', '2022-07-12 16:22:32'),
(15, 'Fatih AVCI', '232w3222@test.co', NULL, '$2y$10$FA6D.RnOGdGdrMmLtTS2s.QvZkOAX058c2w91yYw5tdOCw60X7VOS', NULL, 0, NULL, '2022-07-12 16:22:41', '2022-07-12 16:22:41'),
(16, 'Fatih AVCI', '232sw3222@test.co', NULL, '$2y$10$NqUZT.lAzOMyNwZgjwmJ3uo.74QSWoo7dJHi9rS19vKG8SFvsGrRK', NULL, 0, '3lbRo9cszOZKBh2Ig2N8tZNgDDAJeqIyTsW87wrlMcL7SXdKoL8GNfFqTyDC', '2022-07-12 16:26:04', '2022-07-12 16:26:04'),
(17, 'Fatih AVCI', '12331@test.co', NULL, '$2y$10$HgHHaVekapO56xJfX9W5F.KYUp./q8gyNVtb13SpiyJ/4D6rAYKFe', NULL, 0, 'VxrLIrpFHzRBEPVDYIgE0wJE5vUu3uj6lH083UxUUaGmtfMsunJ6i3Is7TJY', '2022-07-12 16:30:35', '2022-07-12 16:30:35'),
(18, 'Fatih AVCI', '123131131@test.com', NULL, '$2y$10$6QAqfw7TB.PfUKrQpxJks.ims.tk0tkcnLcioFn7umbdAl2dCiMSK', NULL, 1, NULL, '2022-07-12 16:32:09', '2022-07-12 16:33:40'),
(19, 'Fatih AVCI', '123456@t.c', NULL, '$2y$10$1FrBc0K5bYtcjsmGKyRcaOuulH/SROhHtJ17CmBODQL5rr7i8KERi', NULL, 1, NULL, '2022-07-12 16:36:15', '2022-07-12 16:36:25'),
(20, '13131', 'esma2@test.com', NULL, '$2y$10$RRF5UN8SViHMDPumWiSwcOQZSOg6bcN5uJe5QrCT4bW72BAYXxKTa', NULL, 0, 'zBREmgLotHA4jENIo6yxGSRi8LERYLT3JVvVHrU3g4YfhfoqBpyF5X8LobSD', '2022-07-17 09:40:23', '2022-07-17 09:40:23');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori_uruns`
--
ALTER TABLE `kategori_uruns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_uruns_urun_id_foreign` (`urun_id`),
  ADD KEY `kategori_uruns_kategori_id_foreign` (`kategori_id`);

--
-- Tablo için indeksler `kullanicis`
--
ALTER TABLE `kullanicis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanicis_email_unique` (`email`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `sepets`
--
ALTER TABLE `sepets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sepets_kullanici_id_foreign` (`kullanici_id`);

--
-- Tablo için indeksler `sepet_uruns`
--
ALTER TABLE `sepet_uruns`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uruns`
--
ALTER TABLE `uruns`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_detays`
--
ALTER TABLE `urun_detays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `urun_detays_urun_id_foreign` (`urun_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kategori_uruns`
--
ALTER TABLE `kategori_uruns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicis`
--
ALTER TABLE `kullanicis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sepets`
--
ALTER TABLE `sepets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sepet_uruns`
--
ALTER TABLE `sepet_uruns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uruns`
--
ALTER TABLE `uruns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `urun_detays`
--
ALTER TABLE `urun_detays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kategori_uruns`
--
ALTER TABLE `kategori_uruns`
  ADD CONSTRAINT `kategori_uruns_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_uruns_urun_id_foreign` FOREIGN KEY (`urun_id`) REFERENCES `uruns` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `sepets`
--
ALTER TABLE `sepets`
  ADD CONSTRAINT `sepets_kullanici_id_foreign` FOREIGN KEY (`kullanici_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `urun_detays`
--
ALTER TABLE `urun_detays`
  ADD CONSTRAINT `urun_detays_urun_id_foreign` FOREIGN KEY (`urun_id`) REFERENCES `uruns` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
