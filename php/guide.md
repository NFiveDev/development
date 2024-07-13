## Run simple container for php development:

- docker run --rm -d -p 8080:80 -v "${PWD}:/var/www/html" php:apache