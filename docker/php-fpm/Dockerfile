FROM php:8.3.0-fpm-alpine

RUN apk add --no-cache \
    vim \
    curl \
    git \
    composer \
    build-base \
    zlib-dev \
    oniguruma-dev \
    autoconf bash

ARG PUID=1000
ARG PGID=1000
RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data
COPY ./docker/php-fpm/php-dop-ext.ini /usr/local/etc/php/conf.d/php-dop-ext.ini

RUN apk add --no-cache \
    php83-ctype \
    php83-xml \
    php83-dom \
    php83-tokenizer

WORKDIR /var/www

###>
RUN mkdir -p /etc/php-fpm.d
COPY ./docker/php-fpm/php-fpm.conf /etc/php-fpm.d/php-fpm.conf
###<

COPY . .

RUN apk add acl
RUN HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)

RUN rm -rf ./var
RUN php bin/console cache:clear
RUN php bin/console assets:install
RUN php bin/console sass:build

CMD php-fpm

EXPOSE 9000
