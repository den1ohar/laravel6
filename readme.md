
## Installation
###### Please, read official documentation before the installation process 
https://laravel.com/docs/6.x/installation

#### 1. Clone the project
`git clone https://github.com/den1ohar`

#### 2. Install dependencies via Composer
`composer install`

#### 3. Create `.env` file and set the following credentials
```angular2html
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=mysql_user_name
DB_PASSWORD=mysql_password
```
###### Pay attention to `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

#### 4. Run the following command:
```angular2html
php artisan key:generate
php artisan migrate
php artisan db:seed
```