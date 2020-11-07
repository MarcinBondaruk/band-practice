FROM php:7.4-fpm-alpine as base
RUN apk update \
    && apk add composer

COPY ./app/composer.json /var/www
COPY ./app/composer.lock /var/www
WORKDIR /var/www
RUN composer install

FROM php:7.4-fpm-alpine as production
RUN apk update \
    && docker-php-ext-install pcntl pdo pdo_mysql \
    && apk add nginx \
    && apk add supervisor
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY ./app /var/www
COPY --from=base /var/www/vendor /var/www/vendor
COPY --from=base /var/www/var /var/www/var
WORKDIR /var/www
EXPOSE 1805
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
