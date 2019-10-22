-- convert Laravel migrations to raw SQL scripts --

-- migration:2014_10_12_000000_create_users_table --
create table `users` (
  `id` bigint unsigned not null auto_increment primary key, 
  `name` varchar(255) not null, 
  `email` varchar(255) not null, 
  `email_verified_at` timestamp null, 
  `password` varchar(255) not null, 
  `admin` tinyint(1) not null default '0', 
  `remember_token` varchar(100) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `users` 
add 
  unique `users_email_unique`(`email`);

-- migration:2014_10_12_100000_create_password_resets_table --
create table `password_resets` (
  `email` varchar(255) not null, 
  `token` varchar(255) not null, 
  `created_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `password_resets` 
add 
  index `password_resets_email_index`(`email`);

-- migration:2019_08_19_000000_create_failed_jobs_table --
create table `failed_jobs` (
  `id` bigint unsigned not null auto_increment primary key, 
  `connection` text not null, `queue` text not null, 
  `payload` longtext not null, `exception` longtext not null, 
  `failed_at` timestamp default CURRENT_TIMESTAMP not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_10_20_165021_create_produtos --
create table `produtos` (
  `id` varchar(255) not null, 
  `nome` varchar(255) not null, 
  `descricao` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `produtos` 
add 
  primary key `produtos_id_primary`(`id`);

-- migration:2019_10_20_212118_create_pedido --
create table `pedido` (
  `id` bigint unsigned not null auto_increment primary key, 
  `id_produto` varchar(255) not null, 
  `email_comprador` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `pedido` 
add 
  constraint `pedido_email_comprador_foreign` foreign key (`email_comprador`) references `users` (`email`) on delete cascade;
alter table 
  `pedido` 
add 
  constraint `pedido_id_produto_foreign` foreign key (`id_produto`) references `produtos` (`id`) on delete cascade;
