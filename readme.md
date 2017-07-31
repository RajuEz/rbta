
# RBTA

Test Laravel REST api application with modules of Author & Articles


## Requirements
* PHP 5.6.10 or higher
* Nginx or Apache
* Composer

## Installing

```
git clone git@github.com:RajuEz/rbta.git
cd rbta
composer install
cp .env.example .env
php artisan key:generate
```
Edit .env file with Database credentials

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

```
php artisan migrate
```

## Documentation

Please read [APIDocumentation.md](https://github.com/RajuEz/rbta/blob/master/APIDocumentation.md) for API documentation.