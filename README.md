# Overview
This is a portfolio Laravel application which allows users to register and create tasks with 
info such as title, comment, date and time spent. Users can generate and download reports 
with task filtered by date.
# Installation
This app depends on wkhtmltopdf package. Please update config/snappy.php to point to correct binaries. 
By default it is set to "C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf" for windows.

* Clone this repository
* Run `composer install`
* Create a database and update **.env** file
* Run `php artisan key:generate`
* Run `php artisan migrate`
* **Optionally** run `php artisan db:seed` to seed the database with dummy users and tasks.
* Run `npm run dev` or `npm run prod`
* Run `php artisan serve`

*Generated users emails are 'user[1-10]@test.com', passwords '00000000'*

Tests can be run using this command: `vendor/bin/phpunit`
