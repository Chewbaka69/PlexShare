FROM webdevops/php-nginx:7.4-alpine

WORKDIR /app

COPY ./ /app

RUN composer install