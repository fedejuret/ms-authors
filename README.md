# Author Microservice

## Instructions

- Clone this repository
- Install composer dependencies
- Copy .env.example in .env
- Change database connection config
- Execute ``` php artisan migrate ``` to run database migrations
- Generate random API key you can use <http://www.unit-conversion.info/texttools/random-string-generator/> and set it in
.env > ACCEPTED_SECRETS
- Then run ``` php -S localhost:8000 -t ./public ```
