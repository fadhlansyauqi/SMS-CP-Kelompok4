## How to setup

### 1. Clone Project
git clone https://github.com/fadhlansyauqi/SMS-CP-Kelompok4.git

### 2. Install Dependencie
composer install

### 3. Setup .env

A. Clone .env.example using this command:
cp .env.example .env

B. create new db on your phpmyadmin and named it:
sms-cp-kelompok4

C. Then generate app key by running:
php artisan key:generate

### 4. Migrate DB

php artisan migrate:refresh --seed

### 5. Serve Your Web

php artisan serve

### 5. Default account:
Admin:
admin@mail.com (email),
password (password)

Teacher:
teacher@mail.com (email),
password (password)

student:
student@mail.com (email),
password (password)
