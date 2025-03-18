INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_02_111430_add_two_factor_columns_to_table', 1),
(6, '2022_11_02_113007_create_permission_tables', 1),
(7, '2022_11_02_124027_create_project_statuses_table', 1),
(8, '2022_11_02_124028_create_projects_table', 1),
(9, '2022_11_02_131753_create_project_users_table', 1),
(10, '2022_11_02_134510_create_media_table', 1),
(11, '2022_11_02_152359_create_project_favorites_table', 1),
(23, '2022_11_06_203702_add_status_type_to_project', 1),
(27, '2022_11_08_144611_create_notifications_table', 1),
(28, '2022_11_08_150309_create_jobs_table', 1),
(30, '2022_11_08_172846_create_settings_table', 1),
(31, '2022_11_08_173004_general_settings', 1),
(32, '2022_11_08_173852_create_general_settings', 1),
(33, '2022_11_09_085506_create_socialite_users_table', 1),
(34, '2022_11_09_085638_make_user_password_nullable', 1),
(35, '2022_11_09_110740_remove_unique_from_users', 1),
(36, '2022_11_09_110955_add_soft_deletes_to_users', 1),
(37, '2022_11_09_173852_add_social_login_to_general_settings', 1),
(40, '2022_11_12_134201_add_creation_token_to_users', 1),
(41, '2022_11_12_142644_create_pending_user_emails_table', 1),
(42, '2022_11_12_173852_add_site_language_to_general_settings', 1);

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'List permissions', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(2, 'View permission', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(3, 'Create permission', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(4, 'Update permission', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(5, 'Delete permission', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(6, 'List projects', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(7, 'View project', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(8, 'Create project', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(9, 'Update project', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(10, 'Delete project', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(11, 'List project statuses', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(12, 'View project status', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(13, 'Create project status', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(14, 'Update project status', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(15, 'Delete project status', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(16, 'List roles', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(17, 'View role', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(18, 'Create role', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(19, 'Update role', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(20, 'Delete role', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(41, 'List users', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(42, 'View user', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(43, 'Create user', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(44, 'Update user', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(45, 'Delete user', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56'),
(46, 'Manage general settings', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56');

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Default role', 'web', '2022-11-14 12:06:56', '2022-11-14 12:06:56');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `creation_token`) VALUES
(1, 'John DOE', 'john.doe@helper.app', '2022-11-14 12:06:56', '$2a$12$h/.Jq3QGHYoJBLBo8hw1mOtJOmtU.BVJFbBWFC7XAVXmE5gOjdXV.', NULL, NULL, NULL, NULL, '2022-11-14 12:06:56', '2022-11-14 12:06:56', NULL, '16a26769-e643-4570-b3d6-9b9604fe49bc');

INSERT INTO `settings` (`id`, `group`, `name`, `locked`, `payload`, `created_at`, `updated_at`) VALUES
(1, 'general', 'site_name', 0, '\"Project Management\"', '2022-11-14 18:11:50', '2022-11-14 18:11:50'),
(2, 'general', 'site_logo', 0, 'null', '2022-11-14 18:11:50', '2022-11-14 18:11:50'),
(3, 'general', 'enable_registration', 0, 'true', '2022-11-14 18:11:50', '2022-11-14 18:11:50'),
(4, 'general', 'enable_social_login', 0, 'true', '2022-11-14 18:11:50', '2022-11-14 18:11:50'),
(5, 'general', 'site_language', 0, 'en', '2022-11-14 18:11:50', '2022-11-14 18:11:50');

ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
