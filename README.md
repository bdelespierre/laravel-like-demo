# Simple Laravel Like System - Demo Project

Read [the article](https://dev.to/bdelespierre/how-to-implement-a-simple-like-system-with-laravel-lfe)

This repository is a demo project that demonstrates an implementation for a simple "Like" system with Laravel out of the box.

## Requirements

- [PHP 8.0](https://www.php.net/) (7.4 *should* work too)
- [Composer](https://getcomposer.org/)
- [Sqlite extension](https://www.php.net/manual/en/ref.pdo-sqlite.php) (`sudo apt install -y php8.0-sqlite3`)

## Get it to run

Very easy my friend, just hit bash and copy/paste this:

```bash
# clone the project
git clone https://github.com/bdelespierre/laravel-like-demo

# move into the project
cd laravel-like-demo

# install composer dependencies
composer install

# copy the .env
cp .env.example .env

# make a key
php artisan key:generate

# create an empty database
touch database/database.sqlite

# setup the database
php artisan migrate

# start the server (CTRL+C to stop)
php artisan serve
```

Then hit [http://localhost:8000](http://localhost:8000) and you're good to go :+1:

## Have a question?

[DM](https://dev.to/connect/@bdelespierre) or [Tweet](https://twitter.com/bdelespierre).
