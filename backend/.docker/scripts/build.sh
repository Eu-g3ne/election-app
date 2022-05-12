#!/usr/bin/env bash

echo "Composer: Update"
composer update

php artisan cache:clear
php artisan storage:link
chown -R www-data ./storage
php artisan clear-compiled
echo "Composer: Dump Autoload"
composer dump-autoload

php artisan optimize

echo "Laravel: Generating encryption key"
php artisan key:generate

echo "Laravel: Running migrations and seeder"
php artisan migrate:fresh --seed --force

echo "PHP: Starting PHP-FPM"
php-fpm