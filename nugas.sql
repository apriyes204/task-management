-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 06:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('1b6453892473a467d07372d45eb05abc2031647a', 'i:2;', 1731341352),
('1b6453892473a467d07372d45eb05abc2031647a:timer', 'i:1731341352;', 1731341352),
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1731307449),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1731307449;', 1731307449),
('6bda1a63899fbb12db9d08e6a57b8ed3', 'i:1;', 1731309244),
('6bda1a63899fbb12db9d08e6a57b8ed3:timer', 'i:1731309244;', 1731309244),
('d36a924f721831cf7945e476e9460e0c', 'i:1;', 1731341024),
('d36a924f721831cf7945e476e9460e0c:timer', 'i:1731341024;', 1731341024);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_04_092359_create_tasks_table', 1),
(5, '2024_11_04_132908_add_two_factor_columns_to_users_table', 1),
(6, '2024_11_09_024324_add_soft_deletes_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('WUVhYxLLu6L1C1yBnXRL7oByH2d0L25NUDNf8er8', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia3pBbmFTdldFcFlqUVRkVzluTU8yclhDVHFKZkQxdHdYcFRBUDk0NiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1731341301);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `description` longtext NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `description`, `image_path`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nesciunt facere quas quidem aut.', 'pending', 'Porro voluptates voluptatum et autem odio voluptatem nobis. Quam ut aliquid totam dolorem facilis aliquam. Deserunt qui asperiores est veritatis quo provident temporibus.', 'assets/gallery/a6106e3ef72e329b70a8b6d94e71bc0d.png', 1, NULL, '2024-11-08 20:09:02', '2024-11-08 20:09:02'),
(2, 'Beatae debitis ex pariatur quasi dolorem laboriosam eaque.', 'pending', 'Et qui voluptas nulla mollitia assumenda. Consequatur pariatur possimus aut itaque corrupti enim repellat. Quam nihil sunt sed consequuntur.', 'assets/gallery/5050be50a1d11340d8251c66fc723df6.png', 1, NULL, '2024-11-08 20:09:02', '2024-11-10 06:18:08'),
(3, 'Id dolorem eligendi cum eaque eius quisquam.', 'completed', 'Provident asperiores dolore harum quidem architecto. Recusandae quibusdam vitae et. Qui qui adipisci iste incidunt similique veniam.', 'assets/gallery/e7cc8921801ab9ae6eb2e3075518094f.png', 1, NULL, '2024-11-08 20:09:02', '2024-11-10 02:56:03'),
(4, 'Iste natus ratione in in corrupti ullam.', 'pending', 'Iste non magnam id aut debitis consectetur autem. Distinctio voluptatem sunt ex animi. Consequuntur laudantium non distinctio doloremque aliquam quae minima et. Voluptas repudiandae velit rem nulla.', 'assets/gallery/a868830bd1f58cc98ae6d62560ebae56.png', 1, NULL, '2024-11-08 20:09:02', '2024-11-08 20:09:02'),
(5, 'Est ab quo repudiandae.', 'completed', 'Quo dolor velit laudantium optio corrupti velit. Et qui saepe autem ut ipsam est ut similique. Maxime vel sed aut dolore blanditiis consequatur quos. Totam nemo natus maxime molestias.', 'assets/gallery/04fb038081fb0131b4c7c1bc1f37f353.png', 1, NULL, '2024-11-08 20:09:02', '2024-11-08 20:09:02'),
(6, 'Est officia dolorem consequuntur odio enim.', 'pending', 'Rerum dolores rerum atque praesentium. Fugiat et sequi accusamus expedita temporibus quia in. Voluptatem ut veritatis voluptatibus nam.', 'assets/gallery/0b4d41987eb2b2a73b276672bcc9a3b6.png', 2, NULL, '2024-11-08 20:09:09', '2024-11-08 20:09:09'),
(7, 'Omnis laboriosam ratione saepe illum quasi.', 'completed', 'Veritatis ut totam non voluptas quibusdam expedita. Quasi eveniet pariatur laudantium id ut. Voluptas quisquam voluptatem qui eligendi neque. Voluptatem dolorem qui et ut dolorem est.', 'assets/gallery/785dcbab81f378935399fcae680913ff.png', 2, NULL, '2024-11-08 20:09:09', '2024-11-08 20:09:09'),
(8, 'Dignissimos excepturi et impedit consequatur magni ut aperiam ut.', 'pending', 'Expedita occaecati accusamus eos culpa odit. Repudiandae velit et velit et voluptas minus. Provident qui quidem accusamus quia. Cupiditate magni dolore aut officiis et dolorem.', 'assets/gallery/7f61380fd3e292d0bee759274f9b38e0.png', 2, NULL, '2024-11-08 20:09:09', '2024-11-08 20:09:09'),
(9, 'Iste possimus explicabo et molestiae repellat dolores.', 'pending', 'Pariatur velit maiores architecto voluptatem magnam. Occaecati reiciendis quis velit. Et culpa aut et laudantium quisquam reprehenderit sed. Omnis inventore veniam quo blanditiis.', 'assets/gallery/1f20fd555c392b691bae1aaf33c86c8f.png', 2, NULL, '2024-11-08 20:09:09', '2024-11-10 02:52:20'),
(10, 'Voluptatem repellat ex ad dolor autem ex autem autem.', 'pending', 'Recusandae iure dolores nihil rerum eum rem. Corporis consectetur totam voluptatem reiciendis. Et enim repellat accusantium ut in quo qui illo.', 'assets/gallery/4b48306a8e840397421b1d7fe8c0f0d1.png', 2, NULL, '2024-11-08 20:09:09', '2024-11-08 20:09:09'),
(11, 'Voluptas distinctio ipsum magnam quod ratione.', 'completed', 'Dicta ad sunt aut consequatur veniam eius. Deleniti autem et sit velit quia. Quaerat hic aut quia sint. Natus eius nulla quo corrupti.', 'assets/gallery/d5be29e2c411eb8b0d7830dab85a2a67.png', 3, NULL, '2024-11-08 20:09:16', '2024-11-10 17:50:47'),
(12, 'Odit quas quia molestiae natus.', 'completed', 'Cum et sunt ullam alias nostrum et. Corrupti facere quasi nulla sit. Ad velit vel pariatur ipsa.', 'assets/gallery/53efd14079e256ecc7190a7e004bd1cf.png', 3, NULL, '2024-11-08 20:09:16', '2024-11-09 19:54:46'),
(13, 'Est cumque ad sed.', 'completed', 'Eos a fugiat illum rerum quod tenetur libero iste. Molestias cum ut laborum a quas adipisci excepturi. Reiciendis quas excepturi rerum ipsa veritatis veniam velit est.', 'assets/gallery/cb348078057177814214f76b41cf51a9.png', 3, NULL, '2024-11-08 20:09:16', '2024-11-10 02:52:44'),
(14, 'Maxime consequuntur sed sed eum officiis impedit.', 'pending', 'Repellat laboriosam architecto molestias consectetur expedita vel ullam. Qui eius eos quam aliquid eveniet non. Quod iste temporibus quis iusto molestiae soluta neque.', 'assets/gallery/ced6d6dcb13ada25d282275ed662587d.png', 3, NULL, '2024-11-08 20:09:16', '2024-11-10 02:52:12'),
(15, 'Unde nisi blanditiis et consectetur accusamus iste sed quo.', 'pending', 'Sequi odit magnam ea. Incidunt sunt quis sunt voluptatem omnis id. Mollitia quod optio qui vitae enim alias nobis vel.', 'assets/gallery/0518b4dcb96e6eefdd7a8944f70ccf89.png', 3, NULL, '2024-11-08 20:09:16', '2024-11-10 02:52:16'),
(16, 'Ipsam magni consequatur quis ut voluptatem quia quo quasi.', 'completed', 'Consequatur optio autem exercitationem. Quibusdam facilis in et iusto quia expedita. Aut dolores voluptatem eaque aspernatur et id ea. Aut et consectetur ut assumenda ut.', 'assets/gallery/6592fb0e751b9eac8a2cae3532658375.png', 4, NULL, '2024-11-08 20:09:23', '2024-11-10 09:16:54'),
(17, 'Provident aut debitis consequuntur earum cum.', 'completed', 'Cum rerum fugit vel ut explicabo voluptatem necessitatibus. Libero autem quo enim pariatur labore. Quaerat modi hic voluptatem perspiciatis libero.', 'assets/gallery/877cb4b406b01548a44d4c84fb8b7b79.png', 4, NULL, '2024-11-08 20:09:23', '2024-11-10 09:16:54'),
(18, 'Non est dolorum doloremque illum sunt.', 'pending', 'Ea ut velit laboriosam aut cumque. Odio et incidunt cumque minima est dolores qui. Impedit magnam pariatur id praesentium.', 'assets/gallery/442e3429d0f92cfc62e57455a9bbdea3.png', 4, NULL, '2024-11-08 20:09:23', '2024-11-10 09:16:54'),
(19, 'Est accusantium enim repellendus ipsa aut enim.', 'completed', 'Nihil praesentium nesciunt nobis aut autem porro non impedit. Enim sequi impedit omnis eum laboriosam aliquid id. Nisi quis laborum sit similique hic quas sed. Quae sapiente consequuntur dolor.', 'assets/gallery/01fc87ced719a9afd67022bca83a7a90.png', 4, NULL, '2024-11-08 20:09:23', '2024-11-10 09:16:54'),
(20, 'Nostrum quo vero ab dolor omnis rerum reiciendis vel.', 'completed', 'Unde exercitationem aut possimus in at. Esse dolor illo occaecati assumenda quibusdam soluta at ut. Consectetur est repudiandae minima. Voluptatem dignissimos possimus minima.', 'assets/gallery/dff5f3fa56ba7a7bb705ce1e35d41d95.png', 4, NULL, '2024-11-08 20:09:23', '2024-11-10 09:16:54'),
(21, 'Veniam', 'pending', 'Quidem adipisci a distinctio voluptas dolorum enim autem. Est autem non quo soluta officiis. Quod ut est soluta temporibus commodi neque reprehenderit. Quia minus est eveniet.', 'assets/gallery/d91fa441d1882e45c90524832a123b43.png', 5, NULL, '2024-11-08 20:09:29', '2024-11-09 11:08:45'),
(22, 'Autem.', 'completed', 'Nostrum tempore ipsam neque rem corporis excepturi. Odit modi autem illum. Et voluptatibus eaque ut qui voluptatum perferendis. Occaecati sint qui a laudantium provident alias et.', 'assets/gallery/1731206973_67301f3d50991.png', 5, NULL, '2024-11-08 20:09:29', '2024-11-10 01:15:12'),
(23, 'Illum', 'pending', 'Fugit eos corporis eius ut ipsum. Et ut alias consequatur error. Facilis in et est minus.', 'assets/gallery/1731231622_67307f86e4fa6.png', 5, NULL, '2024-11-08 20:09:29', '2024-11-10 06:18:12'),
(24, 'Ex nam voluptatum tenetur hic aliquam quia ea.', 'completed', 'Quis deserunt a a inventore nam sunt. Delectus sit id ullam corporis fugiat consequatur enim.', 'assets/gallery/1b6a1f0a3009067f27be20d947d4420e.png', 5, NULL, '2024-11-08 20:09:29', '2024-11-10 02:52:29'),
(25, 'Suscipit qui excepturi at est inventore enim.', 'pending', 'Rerum molestias quasi veniam assumenda autem et. Expedita odio vitae laudantium nemo dolor. Fugiat omnis quasi provident quam.', 'assets/gallery/7f2a660d4975fee798ab817e07c1b21e.png', 5, NULL, '2024-11-08 20:09:30', '2024-11-10 17:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Karelle Kuvalis', 'orempel@example.net', '2024-11-11 06:43:35', '$2y$12$MQc.Z.BQrceQoTKuc9yJyOvcspo9oT4jVeCtLepXOQ8sRd1aVTwbq', NULL, NULL, NULL, '04ulxqavI8AI8KOjPYAXI0FgNDZEu3dqoUJvY40P8SeqKSaBqLnbHJyzzJWE', '2024-11-08 20:08:54', '2024-11-11 06:43:35', NULL),
(2, 'Mrs. Idell Friesen DDS', 'conn.lulu@example.com', '2024-11-08 20:08:54', '$2y$12$0f1ooKG19BUJC9jZk8cnw./B5dYqAL3kr8W4Hz1pFGE5wfkXkRsYu', NULL, NULL, NULL, 'Gl6Lviaori4eR58HYZxgYiA1em2eeqvOCPYd971YJCWsKookctMqrVCQ3eqD', '2024-11-08 20:08:54', '2024-11-08 21:14:39', NULL),
(3, 'Prof. Sebastian Adams III', 'gay78@example.com', '2024-11-10 06:50:54', '$2y$12$a9cQ3cMwd4YhTsz2jIsLmOi80mCYYc/HPluB9GSOzaMLHLrpuGXfq', NULL, NULL, NULL, 'v0HTAHWyFBpd7yRBBCeBf6jyRfutJBCMzxBqto1lB0DKgtT4eEg9nbIxyQNc', '2024-11-08 20:08:54', '2024-11-10 06:50:54', NULL),
(4, 'Dr. Zachariah Mraz', 'zachariah@mail.com', '2024-11-11 16:08:18', '$2y$12$BuIyVvXO/AJCZqK3jUuVluYm2kPA53wGLyggkD3hdn/LfnWIwEh.K', NULL, NULL, NULL, '9e1zIJc29MZTneecgjh11EhQyYvnSdYMUHI9ObzUkO1fMP4Wmm27V39wpMMR', '2024-11-08 20:08:54', '2024-11-11 16:08:18', NULL),
(5, 'Emmie Turner III', 'jakayla.wolff@example.net', '2024-11-08 20:08:54', '$2y$12$VfY3DNgcq5Z55cP8PuEseeJ3yqSi7pl6H/ywDXKrVGQqY0vXIHKpy', NULL, NULL, NULL, '0SfOpMNYNO', '2024-11-08 20:08:54', '2024-11-08 20:08:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
