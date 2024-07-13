## Run simple container for php development:

- docker run -d -p 80:80 --name my-apache-php-app -v "${pwd}:/var/www/html" php:7.2-apache