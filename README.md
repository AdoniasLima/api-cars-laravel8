<p  align="center"><a  href="https://laravel.com"  target="_blank"><img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="400"></a></p>

# Laravel 8 Cars API

This is a **car api**, developed in laravel applying knowledge in model methods and relocations between models..

## Requirements

- PHP version 7.3 or lasted
- Composer

## Installation

    command: git clone https://github.com/AdoniasLima/api-cars-laravel8.git
    
    command: composer install
	
	*Rename .env.example to .env and provide your database details there.
	
	command: php artisan key:generate
	    
	command: php artisan migrate
	
	command: php artisan db:seed    

	command: php artisan serve

## Routes and parameters

### Brands


|            URL    |Method|Parameters|
|----------------|-------------------------------|-----------------------------|
|/brands|GET            |           |
|/brand/{id} |GET            |Brand id           |
|/add/brand|POST|{"brand": "Value"}|
|/update/brand/{id}|PUT|Brand id, {"brand": "Value"}|
|/delete/brand/{id}|DELETE|Brand id|

### Cars


|            URL    |Method|Parameters|
|----------------|-------------------------------|-----------------------------|
|/cars|GET            |           |
|/cars/all|GET            |           |
|/cars/{id} |GET            |Car id           |
|/add/car|POST|{"brand_id": "Value", "name": "Value", "horsepower": "Value", "fuel": "Value", "gearshift": "Value", "year": "Value"}|
|/update/car/{id}|PUT|Car id, {"brand_id": "Value", "name": "Value", "horsepower": "Value", "fuel": "Value", "gearshift": "Value", "year": "Value"}|
|/delete/car/{id}|DELETE|Car id|