-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2023 a las 15:21:16
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
(28, 'Administrator Logged in', '1', '127.0.0.1', '2023-02-09 14:18:12', '2023-02-09 14:18:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `serie` varchar(5) NOT NULL,
  `correlativo` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 'factura', 'Factura', 'fa fa-dollar', 'Action', '/factura', '1', 0, 1, '2023-02-01 20:34:57', '2023-02-01 20:34:57'),
(10, 'cadena_custodia', 'Cadena de custodia', 'fa fa-book fa-fw', 'Action', '/cadena_custodia', '1', 0, 1, '2023-02-09 13:43:52', '2023-02-09 13:43:52');

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
(21, 'factura_list', 'factura_list'),
(22, 'factura_add', 'factura_add'),
(23, 'factura_edit', 'factura_edit'),
(24, 'factura_delete', 'factura_delete'),
(25, 'factura_view', 'factura_view'),
(26, 'factura_detalle_list', 'factura_detalle_list'),
(27, 'factura_detalle_add', 'factura_detalle_add'),
(28, 'factura_detalle_edit', 'factura_detalle_edit'),
(29, 'factura_detalle_delete', 'factura_detalle_delete'),
(30, 'factura_detalle_view', 'factura_detalle_view'),
(31, 'obra_list', 'obra_list'),
(32, 'obra_add', 'obra_add'),
(33, 'obra_edit', 'obra_edit'),
(34, 'obra_delete', 'obra_delete'),
(35, 'obra_view', 'obra_view');

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
(10, 1, 'factura'),
(11, 1, 'cadena_custodia');

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
(21, 1, 'factura_list'),
(22, 1, 'factura_add'),
(23, 1, 'factura_edit'),
(24, 1, 'factura_delete'),
(25, 1, 'factura_view'),
(26, 1, 'factura_detalle_list'),
(27, 1, 'factura_detalle_add'),
(28, 1, 'factura_detalle_edit'),
(29, 1, 'factura_detalle_delete'),
(30, 1, 'factura_detalle_view'),
(31, 1, 'obra_list'),
(32, 1, 'obra_add'),
(33, 1, 'obra_edit'),
(34, 1, 'obra_delete'),
(35, 1, 'obra_view');

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
(3, 'timezone', 'Asia/Kolkata', '2018-07-16 00:54:17');

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
(1, 'Administrator', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '2023-02-10 00:02:48', 1, '', '2018-06-27 23:30:16', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
