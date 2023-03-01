-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2023 a las 22:21:05
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `user` text NOT NULL,
  `ip_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `title`, `user`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'User: Administrator Logged Out', '1', '::1', '2023-02-01 20:31:01', '2023-02-01 20:31:01'),
(2, 'Administrator Logged in', '1', '::1', '2023-02-01 20:31:05', '2023-02-01 20:31:05'),
(3, 'Role #1 Updated by User: #1', '1', '::1', '2023-02-01 20:31:36', '2023-02-01 20:31:36'),
(4, 'User: Administrator Logged Out', '1', '::1', '2023-02-01 20:36:32', '2023-02-01 20:36:32'),
(5, 'Administrator Logged in', '1', '::1', '2023-02-01 20:36:37', '2023-02-01 20:36:37'),
(6, 'Role #1 Updated by User: #1', '1', '::1', '2023-02-01 20:39:42', '2023-02-01 20:39:42'),
(7, 'User: Administrator Logged Out', '1', '::1', '2023-02-01 20:39:46', '2023-02-01 20:39:46'),
(8, 'Administrator Logged in', '1', '::1', '2023-02-01 20:39:50', '2023-02-01 20:39:50'),
(9, 'Role #1 Updated by User: #1', '1', '::1', '2023-02-01 20:39:59', '2023-02-01 20:39:59'),
(10, 'User: Administrator Logged Out', '1', '::1', '2023-02-01 20:40:03', '2023-02-01 20:40:03'),
(11, 'Administrator Logged in', '1', '::1', '2023-02-01 20:40:07', '2023-02-01 20:40:07'),
(12, 'User: Administrator Logged Out', '1', '::1', '2023-02-01 20:41:59', '2023-02-01 20:41:59'),
(13, 'Administrator Logged in', '1', '::1', '2023-02-01 20:42:04', '2023-02-01 20:42:04'),
(14, 'User: Administrator Logged Out', '1', '::1', '2023-02-01 20:49:41', '2023-02-01 20:49:41'),
(15, 'Administrator Logged in', '1', '::1', '2023-02-02 04:09:59', '2023-02-02 04:09:59'),
(16, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 13:37:24', '2023-02-09 13:37:24'),
(17, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 13:40:06', '2023-02-09 13:40:06'),
(18, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 13:40:12', '2023-02-09 13:40:12'),
(19, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 13:40:24', '2023-02-09 13:40:24'),
(20, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 13:40:28', '2023-02-09 13:40:28'),
(21, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 13:43:55', '2023-02-09 13:43:55'),
(22, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 13:44:06', '2023-02-09 13:44:06'),
(23, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 13:46:32', '2023-02-09 13:46:32'),
(24, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 13:46:36', '2023-02-09 13:46:36'),
(25, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 14:02:47', '2023-02-09 14:02:47'),
(26, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 14:02:50', '2023-02-09 14:02:50'),
(27, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 14:18:08', '2023-02-09 14:18:08'),
(28, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 14:18:12', '2023-02-09 14:18:12'),
(29, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 14:22:48', '2023-02-09 14:22:48'),
(30, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 14:22:52', '2023-02-09 14:22:52'),
(31, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 14:24:30', '2023-02-09 14:24:30'),
(32, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 14:24:33', '2023-02-09 14:24:33'),
(33, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-09 14:24:53', '2023-02-09 14:24:53'),
(34, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-10 01:41:34', '2023-02-10 01:41:34'),
(35, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-10 01:41:42', '2023-02-10 01:41:42'),
(36, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-10 01:41:47', '2023-02-10 01:41:47'),
(37, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-10 01:41:55', '2023-02-10 01:41:55'),
(38, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-10 01:42:01', '2023-02-10 01:42:01'),
(39, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-10 01:59:58', '2023-02-10 01:59:58'),
(40, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-10 02:00:02', '2023-02-10 02:00:02'),
(41, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-10 02:01:19', '2023-02-10 02:01:19'),
(42, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-10 02:01:23', '2023-02-10 02:01:23'),
(43, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-10 02:25:58', '2023-02-10 02:25:58'),
(44, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-10 02:26:02', '2023-02-10 02:26:02'),
(45, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-10 03:54:16', '2023-02-10 03:54:16'),
(46, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-13 13:02:16', '2023-02-13 13:02:16'),
(47, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-13 13:19:39', '2023-02-13 13:19:39'),
(48, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 14:52:40', '2023-02-15 14:52:40'),
(49, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 14:52:53', '2023-02-15 14:52:53'),
(50, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 14:53:46', '2023-02-15 14:53:46'),
(51, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 14:55:23', '2023-02-15 14:55:23'),
(52, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 14:55:28', '2023-02-15 14:55:28'),
(53, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:05:59', '2023-02-15 15:05:59'),
(54, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:06:08', '2023-02-15 15:06:08'),
(55, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:07:21', '2023-02-15 15:07:21'),
(56, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:07:27', '2023-02-15 15:07:27'),
(57, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:08:01', '2023-02-15 15:08:01'),
(58, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:08:07', '2023-02-15 15:08:07'),
(59, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:08:46', '2023-02-15 15:08:46'),
(60, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:08:51', '2023-02-15 15:08:51'),
(61, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:09:19', '2023-02-15 15:09:19'),
(62, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:09:24', '2023-02-15 15:09:24'),
(63, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:10:12', '2023-02-15 15:10:12'),
(64, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:11:13', '2023-02-15 15:11:13'),
(65, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:11:58', '2023-02-15 15:11:58'),
(66, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:18:38', '2023-02-15 15:18:38'),
(67, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:22:59', '2023-02-15 15:22:59'),
(68, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:23:04', '2023-02-15 15:23:04'),
(69, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:24:15', '2023-02-15 15:24:15'),
(70, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:24:20', '2023-02-15 15:24:20'),
(71, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:28:13', '2023-02-15 15:28:13'),
(72, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:28:19', '2023-02-15 15:28:19'),
(73, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:30:53', '2023-02-15 15:30:53'),
(74, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:30:58', '2023-02-15 15:30:58'),
(75, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:31:18', '2023-02-15 15:31:18'),
(76, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:31:24', '2023-02-15 15:31:24'),
(77, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:32:10', '2023-02-15 15:32:10'),
(78, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:32:16', '2023-02-15 15:32:16'),
(79, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:32:32', '2023-02-15 15:32:32'),
(80, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:32:37', '2023-02-15 15:32:37'),
(81, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:32:49', '2023-02-15 15:32:49'),
(82, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:32:54', '2023-02-15 15:32:54'),
(83, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:35:10', '2023-02-15 15:35:10'),
(84, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:35:15', '2023-02-15 15:35:15'),
(85, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:36:04', '2023-02-15 15:36:04'),
(86, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:36:09', '2023-02-15 15:36:09'),
(87, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:36:44', '2023-02-15 15:36:44'),
(88, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:36:49', '2023-02-15 15:36:49'),
(89, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:37:04', '2023-02-15 15:37:04'),
(90, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:37:08', '2023-02-15 15:37:08'),
(91, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:40:47', '2023-02-15 15:40:47'),
(92, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:40:52', '2023-02-15 15:40:52'),
(93, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:41:30', '2023-02-15 15:41:30'),
(94, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:41:34', '2023-02-15 15:41:34'),
(95, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:42:29', '2023-02-15 15:42:29'),
(96, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:42:34', '2023-02-15 15:42:34'),
(97, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:44:28', '2023-02-15 15:44:28'),
(98, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:47:24', '2023-02-15 15:47:24'),
(99, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:47:29', '2023-02-15 15:47:29'),
(100, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 15:47:59', '2023-02-15 15:47:59'),
(101, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:48:04', '2023-02-15 15:48:04'),
(102, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 15:52:21', '2023-02-15 15:52:21'),
(103, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 16:01:49', '2023-02-15 16:01:49'),
(104, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 16:13:12', '2023-02-15 16:13:12'),
(105, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 16:13:16', '2023-02-15 16:13:16'),
(106, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-15 16:20:45', '2023-02-15 16:20:45'),
(107, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-15 16:20:49', '2023-02-15 16:20:49'),
(108, 'Nuevo #Clientes creado por el usuario:Administrator', '1', '127.0.0.1', '2023-02-15 16:26:15', '2023-02-15 16:26:15'),
(109, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-16 03:00:42', '2023-02-16 03:00:42'),
(110, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-16 03:14:00', '2023-02-16 03:14:00'),
(111, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-16 03:40:34', '2023-02-16 03:40:34'),
(112, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-16 03:44:27', '2023-02-16 03:44:27'),
(113, 'Administrator Logged in', '1', '::1', '2023-02-23 19:50:07', '2023-02-23 19:50:07'),
(114, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-26 23:46:59', '2023-02-26 23:46:59'),
(115, 'Administrator Logged in', '1', '::1', '2023-02-26 23:48:19', '2023-02-26 23:48:19'),
(116, 'Company Settings Updated by User: #1', '1', '::1', '2023-02-27 00:02:36', '2023-02-27 00:02:36'),
(117, 'Role #1 Updated by User: #1', '1', '::1', '2023-02-27 00:04:12', '2023-02-27 00:04:12'),
(118, 'User: Administrator Logged Out', '1', '::1', '2023-02-27 00:04:19', '2023-02-27 00:04:19'),
(119, 'Administrator Logged in', '1', '::1', '2023-02-27 00:04:25', '2023-02-27 00:04:25'),
(120, 'Role #1 Updated by User: #1', '1', '::1', '2023-02-27 00:04:43', '2023-02-27 00:04:43'),
(121, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-27 22:29:27', '2023-02-27 22:29:27'),
(122, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-27 23:28:32', '2023-02-27 23:28:32'),
(123, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-27 23:28:37', '2023-02-27 23:28:37'),
(124, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-02-27 23:30:44', '2023-02-27 23:30:44'),
(125, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-27 23:30:47', '2023-02-27 23:30:47'),
(126, 'Nuevo #Empleados creado por el usuario:Administrator', '1', '127.0.0.1', '2023-02-27 23:33:27', '2023-02-27 23:33:27'),
(127, 'Administrator Logged in', '1', '127.0.0.1', '2023-03-01 00:59:57', '2023-03-01 00:59:57'),
(128, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-03-01 01:17:37', '2023-03-01 01:17:37'),
(129, 'Administrator Logged in', '1', '127.0.0.1', '2023-03-01 01:17:41', '2023-03-01 01:17:41'),
(130, 'Nuevo #Proyectos creado por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 01:20:43', '2023-03-01 01:20:43'),
(131, 'Nuevo #Proyectos creado por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 01:22:21', '2023-03-01 01:22:21'),
(132, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-03-01 01:30:37', '2023-03-01 01:30:37'),
(133, 'Administrator Logged in', '1', '127.0.0.1', '2023-03-01 01:30:43', '2023-03-01 01:30:43'),
(134, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-03-01 01:34:23', '2023-03-01 01:34:23'),
(135, 'Administrator Logged in', '1', '127.0.0.1', '2023-03-01 01:34:27', '2023-03-01 01:34:27'),
(136, 'Nuevo #Cadena de Custodia creado por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 02:51:17', '2023-03-01 02:51:17'),
(137, 'Nuevo #Cadena de Custodia creado por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 03:34:19', '2023-03-01 03:34:19'),
(138, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 03:34:33', '2023-03-01 03:34:33'),
(139, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 03:36:14', '2023-03-01 03:36:14'),
(140, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 03:44:42', '2023-03-01 03:44:42'),
(141, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 03:44:52', '2023-03-01 03:44:52'),
(142, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 03:52:53', '2023-03-01 03:52:53'),
(143, 'Nuevo #Cadena de Custodia creado por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 03:53:46', '2023-03-01 03:53:46'),
(144, 'Nuevo #Clientes creado por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 04:02:24', '2023-03-01 04:02:24'),
(145, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 04:02:34', '2023-03-01 04:02:34'),
(146, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 04:05:24', '2023-03-01 04:05:24'),
(147, 'Administrator Logged in', '1', '127.0.0.1', '2023-03-01 14:21:26', '2023-03-01 14:21:26'),
(148, 'Nuevo #Empleados creado por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 14:41:08', '2023-03-01 14:41:08'),
(149, 'User: Administrator Logged Out', '1', '127.0.0.1', '2023-03-01 14:46:15', '2023-03-01 14:46:15'),
(150, 'Administrator Logged in', '1', '127.0.0.1', '2023-03-01 19:58:03', '2023-03-01 19:58:03'),
(151, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 20:28:07', '2023-03-01 20:28:07'),
(152, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 20:35:34', '2023-03-01 20:35:34'),
(153, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 20:37:19', '2023-03-01 20:37:19'),
(154, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 20:37:45', '2023-03-01 20:37:45'),
(155, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:01:24', '2023-03-01 21:01:24'),
(156, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:04:21', '2023-03-01 21:04:21'),
(157, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:09:20', '2023-03-01 21:09:20'),
(158, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:09:34', '2023-03-01 21:09:34'),
(159, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:09:38', '2023-03-01 21:09:38'),
(160, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:09:42', '2023-03-01 21:09:42'),
(161, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:10:50', '2023-03-01 21:10:50'),
(162, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:11:02', '2023-03-01 21:11:02'),
(163, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:11:20', '2023-03-01 21:11:20'),
(164, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:12:30', '2023-03-01 21:12:30'),
(165, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:12:36', '2023-03-01 21:12:36'),
(166, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:16:55', '2023-03-01 21:16:55'),
(167, '#Cadena_custodia #2030201 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:17:00', '2023-03-01 21:17:00'),
(168, '#Cadena_custodia #20230200 creada por el usuario:Administrator', '1', '127.0.0.1', '2023-03-01 21:18:19', '2023-03-01 21:18:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cadena_custodia`
--

CREATE TABLE `cadena_custodia` (
  `id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `id_empleado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `distrito` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departamento` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` char(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cadena_custodia`
--

INSERT INTO `cadena_custodia` (`id`, `id_cliente`, `id_contacto`, `id_proyecto`, `id_empleado`, `direccion`, `distrito`, `provincia`, `departamento`, `celular`, `telefono`, `email`, `fecha`, `estado`, `created_at`, `updated_at`) VALUES
('20230200', 2, 1, 1, '1,2', 'Paitr', 'Paita', 'Talara', 'Piura', '', '987654321', 'hola@gmail.com', '2023-03-01 00:00:00', b'1', '2023-03-01 03:53:46', '2023-03-01 21:18:19'),
('2030201', 1, 1, 1, '1', 'Hola', 'Hola', 'Talara', 'Piura', '', '', '', '2023-02-28 00:00:00', b'1', '2023-03-01 03:34:19', '2023-03-01 21:17:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre_cliente`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Fiorella Eunice Ancajima Socola', b'1', '2023-02-15 16:26:15', '2023-02-27 23:14:17'),
(2, 'Carlos Pasache Ordinola', b'1', '2023-03-01 04:02:24', '2023-03-01 04:02:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre_empleado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre_empleado`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'Leandro Neira Chunga', '2023-02-27 23:33:27', '2023-02-27 23:33:35', b'1'),
(2, 'Anastacio Petronilo', '2023-03-01 14:41:08', '2023-03-01 14:41:10', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `id` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(18,2) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_object` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_padre_id` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `name`, `title`, `icon`, `type_object`, `object`, `order`, `menu_padre_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'Dashboard', 'fa fa-dashboard', 'Action', '/dashboard', '1', 0, 1, '2020-04-09 15:37:42', '2020-04-09 15:42:42'),
(2, 'security', 'Security', 'fa fa-lock', 'Menu', '-', '2', 0, 1, '2020-04-09 15:38:52', NULL),
(3, 'activity_logs', 'Activity Logs', 'fa fa-history', 'Action', 'activity_logs', '2.1', 2, 1, '2020-04-09 15:39:34', NULL),
(4, 'users', 'Users', 'fa fa-user', 'Action', 'users', '2.2', 2, 1, '2020-04-19 05:00:00', NULL),
(5, 'roles', 'Manage Roles', 'fa fa-lock', 'Action', 'roles', '2.3', 2, 1, '2020-04-20 05:00:00', NULL),
(6, 'permissions', 'Manage Permissions', 'fa fa-lock', 'Action', 'permissions', '2.4', 2, 1, '2020-04-20 05:00:00', NULL),
(7, 'settings', 'Settings', 'fa fa-cog', 'Menu', '-', '3', 0, 1, '2020-04-20 05:00:00', NULL),
(8, 'company', 'Company Settings', 'fa fa-circle-o', 'Action', 'settings/company', '3.1', 7, 1, '2020-04-20 05:00:00', NULL),
(9, 'cliente', 'Cliente', 'fa fa-users', 'Action', '/cliente', '1', 0, 1, '2023-02-01 20:34:57', '2023-02-01 20:34:57'),
(10, 'cadena_custodia', 'Cadena de custodia', 'fa fa-archive', 'Action', '/cadena_custodia', '1', 0, 1, '2023-02-09 13:43:52', '2023-02-09 13:43:52'),
(11, 'empleado', 'Empleado', 'fa fa-users', 'Action', '/empleado', '2', 0, 1, NULL, NULL),
(12, 'proyecto', 'Proyecto', 'fa fa-archive', 'Action', '/proyecto', '2', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `code`) VALUES
(1, 'Users List', 'users_list'),
(2, 'Add Users', 'users_add'),
(3, 'Edit Users', 'users_edit'),
(4, 'Delete Users', 'users_delete'),
(5, 'Users View', 'users_view'),
(6, 'Activity Logs List', 'activity_log_list'),
(7, 'Acivity Log View', 'activity_log_view'),
(8, 'Roles List', 'roles_list'),
(9, 'Add Roles', 'roles_add'),
(10, 'Edit Roles', 'roles_edit'),
(11, 'Permissions List', 'permissions_list'),
(12, 'Add Permissions', 'permissions_add'),
(13, 'Permissions Edit', 'permissions_edit'),
(14, 'Delete Permissions', 'permissions_delete'),
(15, 'Company Settings', 'company_settings'),
(16, 'menu_list', 'menu_list'),
(17, 'menu_add', 'menu_add'),
(18, 'menu_edit', 'menu_edit'),
(19, 'menu_delete', 'menu_delete'),
(20, 'menu_view', 'menu_view'),
(21, 'cliente_list', 'cliente_list'),
(22, 'cliente_add', 'cliente_add'),
(23, 'cliente_edit', 'cliente_edit'),
(24, 'cliente_delete', 'cliente_delete'),
(25, 'cliente_view', 'cliente_view'),
(26, 'proyecto_list', 'proyecto_list'),
(27, 'proyecto_add', 'proyecto_add'),
(28, 'proyecto_edit', 'proyecto_edit'),
(29, 'proyecto_delete', 'proyecto_delete'),
(30, 'proyecto_view', 'proyecto_view'),
(31, 'cadena_custodia_list', 'cadena_custodia_list'),
(32, 'cadena_custodia_add', 'cadena_custodia_add'),
(33, 'cadena_custodia_edit', 'cadena_custodia_edit'),
(34, 'cadena_custodia_delete', 'cadena_custodia_delete'),
(35, 'cadena_custodia_view', 'cadena_custodia_view'),
(36, 'empleado_list', 'empleado_list'),
(37, 'empleado_add', 'empleado_add'),
(38, 'empleado_edit', 'empleado_edit'),
(39, 'empleado_delete', 'empleado_delete'),
(40, 'empleado_view', 'view');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Libro', 1, '2023-02-01 20:33:21', '2023-02-01 20:33:21'),
(2, 'Cuaderno', 1, '2023-02-01 20:33:21', '2023-02-01 20:33:21'),
(3, 'Lapicero', 1, '2023-02-01 20:33:21', '2023-02-01 20:33:21'),
(4, 'Lapiz', 1, '2023-02-01 20:33:21', '2023-02-01 20:33:21'),
(5, 'Libro', 1, '2023-02-01 20:34:31', '2023-02-01 20:34:31'),
(6, 'Cuaderno', 1, '2023-02-01 20:34:31', '2023-02-01 20:34:31'),
(7, 'Lapicero', 1, '2023-02-01 20:34:31', '2023-02-01 20:34:31'),
(8, 'Lapiz', 1, '2023-02-01 20:34:31', '2023-02-01 20:34:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `nombre_proyecto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre_proyecto`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Monitore de calidad agua de inyeccion', b'1', '2023-03-01 01:22:21', '2023-03-01 01:22:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `q_obra`
--

CREATE TABLE `q_obra` (
  `id` smallint(6) NOT NULL,
  `o_nombre` varchar(250) DEFAULT NULL,
  `o_id_tseleccion` tinyint(4) DEFAULT NULL,
  `o_id_tcontratacion` tinyint(4) DEFAULT NULL,
  `o_nro_proceso` varchar(3) DEFAULT NULL,
  `o_monto` decimal(10,0) DEFAULT NULL,
  `o_monto_contractual` decimal(10,0) DEFAULT NULL,
  `o_fecha_inicio` date DEFAULT NULL,
  `o_contracto` varchar(30) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `o_alias` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_menus`
--

CREATE TABLE `role_menus` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role_menus`
--

INSERT INTO `role_menus` (`id`, `role`, `menu`) VALUES
(1, 1, 'dashboard'),
(2, 1, 'security'),
(3, 1, 'activity_logs'),
(4, 1, 'users'),
(5, 1, 'roles'),
(6, 1, 'permissions'),
(7, 1, 'settings'),
(8, 1, 'company'),
(11, 1, 'cadena_custodia'),
(12, 1, 'cliente'),
(13, 1, 'empleado'),
(14, 1, 'proyecto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role`, `permission`) VALUES
(1, 1, 'users_list'),
(2, 1, 'users_add'),
(3, 1, 'users_edit'),
(4, 1, 'users_delete'),
(5, 1, 'users_view'),
(6, 1, 'activity_log_list'),
(7, 1, 'activity_log_view'),
(8, 1, 'roles_list'),
(9, 1, 'roles_add'),
(10, 1, 'roles_edit'),
(11, 1, 'permissions_list'),
(12, 1, 'permissions_add'),
(13, 1, 'permissions_edit'),
(14, 1, 'permissions_delete'),
(15, 1, 'company_settings'),
(16, 1, 'menu_list'),
(17, 1, 'menu_add'),
(18, 1, 'menu_edit'),
(19, 1, 'menu_delete'),
(20, 1, 'menu_view'),
(21, 1, 'cliente_list'),
(22, 1, 'cliente_add'),
(23, 1, 'cliente_edit'),
(24, 1, 'cliente_delete'),
(25, 1, 'cliente_view'),
(26, 1, 'empleado_list'),
(27, 1, 'empleado_add'),
(28, 1, 'empleado_edit'),
(29, 1, 'empleado_delete'),
(30, 1, 'empleado_view'),
(31, 1, 'proyecto_list'),
(32, 1, 'proyecto_add'),
(33, 1, 'proyecto_edit'),
(34, 1, 'proyecto_delete'),
(35, 1, 'proyecto_view'),
(36, 1, 'cadena_custodia_list'),
(37, 1, 'cadena_custodia_add'),
(38, 1, 'cadena_custodia_edit'),
(39, 1, 'cadena_custodia_delete'),
(40, 1, 'cadena_custodia_view');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`) VALUES
(1, 'company_name', 'Company Name', '2018-06-21 22:37:59'),
(2, 'company_email', 'testcompany@gmail.com', '2018-07-11 16:09:58'),
(3, 'timezone', 'America/Lima', '2018-07-16 00:54:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `address` longtext NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` int(11) NOT NULL,
  `reset_token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phone`, `address`, `last_login`, `role`, `reset_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '2023-03-01 19:03:58', 1, '', '2018-06-27 23:30:16', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cadena_custodia`
--
ALTER TABLE `cadena_custodia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `q_obra`
--
ALTER TABLE `q_obra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_menus`
--
ALTER TABLE `role_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `q_obra`
--
ALTER TABLE `q_obra`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role_menus`
--
ALTER TABLE `role_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
