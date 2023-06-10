# `laravel_sample`

Laravel sample project.

## Usage

## Requirements

- PHP 7.4.33
- Laravel version	8.83.27
- laravel-admin 1.8.17

## Installation

Install laradock.

```bash
mkdir -p ~/workspace
cd ~/workspace
git clone https://github.com/Laradock/laradock.git
cd laradock
```

Launch laradock.

```bash
cp .env.example .env

docker compose up -d workspace
docker compose exec --user=laradock workspace bash
```

Enter workspace instance.

```bash
composer create-project laravel/laravel laravel_sample
exit
```

Change `.env`

```bash
vim .env
# edit...
diff -U0 .env.example .env
```

```diff
+++ .env        2023-06-10 08:57:53.209693000 +0900
@@ -8 +9 @@
-APP_CODE_PATH_HOST=../
+APP_CODE_PATH_HOST=../laravel_sample
@@ -223 +224,2 @@
-PHP_FPM_INSTALL_MYSQLI=true
+PHP_FPM_INSTALL_MYSQLI=falsae
@@ -253 +255,2 @@
-PHP_FPM_INSTALL_PGSQL=false
+PHP_FPM_INSTALL_PGSQL=true
```

Relaunch.

```bash
docker compose down
docker compose up -d nginx postgres redis workspace
```

Install laravel-admin.

```bash
docker compose exec --user=laradock workspace bash
composer require encore/laravel-admin
```

```bash
vim .env
# edit...

diff -U0 .env.example .env
```

```diff
--- .env.example        2022-04-12 13:37:49.000000000 +0000
+++ .env        2023-06-10 06:05:09.914937000 +0000
@@ -3 +3 @@
-APP_KEY=
+APP_KEY=xxxxxxxxxxxxxxxxxxxxxxxxx
@@ -11,6 +11,6 @@
-DB_CONNECTION=mysql
-DB_HOST=127.0.0.1
-DB_PORT=3306
-DB_DATABASE=laravel
-DB_USERNAME=root
-DB_PASSWORD=
+DB_CONNECTION=pgsql
+DB_HOST=postgres
+DB_PORT=5432
+DB_DATABASE=default
+DB_USERNAME=default
+DB_PASSWORD=secret
```


```bash
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan admin:install
```

Next.

- See http://localhost
- Login laravel-admin http://localhost/admin/auth/login
  - ID: admin
  - PW: admin



# Memo

Fix config.

```bash
vim config/filesystems.php
```

commit.

```txt
warning: CRLF will be replaced by LF in public/vendor/laravel-admin/bootstrap-fileinput/css/fileinput.min.css.
The file will have its original line endings in your working directory
```
