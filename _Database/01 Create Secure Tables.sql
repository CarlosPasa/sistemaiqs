SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `user` text NOT NULL,
  `ip_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `code` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(15, 'Company Settings', 'company_settings');

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'Admin');

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(15, 1, 'company_settings');

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`) VALUES
(1, 'company_name', 'Company Name', '2018-06-21 17:37:59'),
(2, 'company_email', 'testcompany@gmail.com', '2018-07-11 11:09:58'),
(3, 'timezone', 'Asia/Kolkata', '2018-07-15 19:54:17');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `address` longtext NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` int(11) NOT NULL,
  `reset_token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phone`, `address`, `last_login`, `role`, `reset_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '2018-07-12 16:37:54', 1, '', '2018-06-27 18:30:16', '0000-00-00 00:00:00');


ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2; 

  
CREATE TABLE `menu` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `title` VARCHAR(100) NULL,
  `icon` VARCHAR(20) NULL,
  `type_object` VARCHAR(20) NULL,
  `object` VARCHAR(100) NULL,
  `order` VARCHAR(10) NULL,
  `menu_padre_id` INT NULL,
  `estado` TINYINT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

INSERT INTO menu (name,title,icon,type_object,`object`,`order`,menu_padre_id,estado,created_at,updated_at)
VALUES 
('dashboard','Dashboard','fa fa-dashboard','Action','/dashboard','1',0,1,'2020-04-09 10:37:42.0','2020-04-09 10:42:42.0')
,('security','Security','fa fa-lock','Menu','-','2',0,1,'2020-04-09 10:38:52.0',NULL)
,('activity_logs','Activity Logs','fa fa-history','Action','activity_logs','2.1',2,1,'2020-04-09 10:39:34.0',NULL)
,('users','Users','fa fa-user','Action','users','2.2',2,1,'2020-04-19 00:00:00.0',NULL)
,('roles','Manage Roles','fa fa-lock','Action','roles','2.3',2,1,'2020-04-20 00:00:00.0',NULL)
,('permissions','Manage Permissions','fa fa-lock','Action','permissions','2.4',2,1,'2020-04-20 00:00:00.0',NULL)
,('settings','Settings','fa fa-cog','Menu','-','3',0,1,'2020-04-20 00:00:00.0',NULL)
,('company','Company Settings','fa fa-circle-o','Action','settings/company','3.1',7,1,'2020-04-20 00:00:00.0',NULL)
;

CREATE TABLE `role_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  `menu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO role_menus (`role`,menu) VALUES 
(1,'dashboard')
,(1,'security')
,(1,'activity_logs')
,(1,'users')
,(1,'roles')
,(1,'permissions')
,(1,'settings')
,(1,'company')
;

INSERT INTO permissions (title, code) values
('menu_list', 'menu_list'),
('menu_add', 'menu_add'),
('menu_edit', 'menu_edit'),
('menu_delete', 'menu_delete'),
('menu_view', 'menu_view');

INSERT INTO `role_permissions` (`role`, `permission`) VALUES
(1, 'menu_list'),
(1, 'menu_add'),
(1, 'menu_edit'),
(1, 'menu_delete'),
(1, 'menu_view');