# Teletubbies

This is a web application for finnish citizens to easily find out about visa information when travelling to differnet countries all around the world.

## Usecase
You choose your destination country and it will display valuable information about the destination country with the visa information along with necessary processes that need to do before your arrival.

## Local setup
### Prerequisites
- A web server (eg. apache2)
- php 8.2
- Composer
- mariadb

#### Clone github repository
```sh
git clone https://github.com/Secret198/Balls.git
```

#### Install dependecies
```sh
composer install
```

#### Set up database connection
Duplicate the .env.example file and rename it to .env. In that file update the database crendentials
```
APP_NAME="Laravel App"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### Generate application key
```sh
php artisan key:generate
```

#### Run database migrations
```sh
php aritsan migrate
```


#### Run database seeders
```sh
php aritsan db:seed
```

#### Start the server
```sh
php artisan serve
```