# `laravel_sample`

Laravel sample project.

## Usage

```bash
mkdir workspace
cd workspace
git clone https://github.com/rmatttu/laravel_sample.git
git clone https://github.com/Laradock/laradock.git

cd laravel_sample
cp .env.example .env
cp laradock.env.example ../laradock/.env

cd ../laradock
docker compose up -d nginx postgres redis workspace
docker compose exec --user=laradock workspace bash

composer install
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan key:generate

exit
```


- See http://localhost
- Login laravel-admin http://localhost/admin/auth/login
  - ID: admin
  - PW: admin


## `.env` diff

### laradock

```diff
--- .env.example        2023-06-10 14:46:19.079972000 +0900
+++ .env        2023-10-22 15:34:46.932037000 +0900
@@ -8 +8 @@
-APP_CODE_PATH_HOST=../
+APP_CODE_PATH_HOST=../laravel_sample
@@ -17 +17 @@
-DATA_PATH_HOST=~/.laradock/data
+DATA_PATH_HOST=./laradock/data
@@ -223 +223 @@
-PHP_FPM_INSTALL_MYSQLI=true
+PHP_FPM_INSTALL_MYSQLI=false
@@ -253 +253 @@
-PHP_FPM_INSTALL_PGSQL=false
+PHP_FPM_INSTALL_PGSQL=true
```

### `laravel_sample`

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

## Requirements

- PHP 7.4.33
- Laravel version	8.83.27
- laravel-admin 1.8.17

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

## create model

```bash
# php artisan make:migration create_images_table
# php artisan make:seeder images_seeder

php artisan make:model Image --migration
php artisan admin:make ImageController --model='\App\Models\Image'

php artisan make:model Category --migration
php artisan admin:make CategoryController --model='\App\Models\Category'

php artisan make:model Tag --migration
php artisan admin:make TagController --model='\App\Models\Tag'

php artisan make:model ImageTag --migration
php artisan admin:make ImageTagController --model='\App\Models\ImageTag'

php artisan storage:link
```

## Database

```bash
php artisan migrate
php artisan migrate:rollback --step=1
```

## Crear cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```


## Image upload

- `config/filesystems.php`を確認、`public`にすれば良さそう
- `config/admin.php`を確認、`upload.disk`を`public`へ変更
- 画像をアップロードしてみる
