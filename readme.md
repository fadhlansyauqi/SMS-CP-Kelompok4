## Setup

### 1. Clone Project

#### Using Git

You can clone this repository & rename it to your project

````
git clone https://github.com/fadhlansyauqi/SMS-CP-Kelompok4.git
````


### 2. Install Dependencies

Change composer.json to your liking first (detail of your project). Make sure you have composer installed, then cd to the project folder and do the following

````
composer install
````

### 3. Setup .env

Clone .env.example or just rename it to .env then fill in the details & don't forget to setup your DB.

Then generate app key by running:

````
php artisan key:generate
````

### 4. Migrate DB

php artisan migrate
````

### 5. Serve Your Web

php artisan serve
````
