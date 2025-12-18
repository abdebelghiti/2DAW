FROM php:8.1.31-cli-alpine3.20

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

COPY src/ .

ENV DB_SERVIDOR=localhost \
    DB_USUARIO=root \
    DB_PASSWORD=root \
    DB_NAME=testdb

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000"]