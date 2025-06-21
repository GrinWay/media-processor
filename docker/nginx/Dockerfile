FROM nginx:1.28.0-alpine

RUN apk add --no-cache \
    bash \
    vim
RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0; exit 1

WORKDIR /var/www/

COPY ./docker/nginx/nginx.conf /etc/nginx
COPY ./docker/nginx/default.conf /etc/nginx/conf.d

ARG APP_PHP_FPM_CONTAINER_NAME
ARG PHP_UPSTREAM_PORT="9000"

###> AUTOINSERTS ###
RUN echo "${APP_PHP_FPM_CONTAINER_NAME}:${PHP_UPSTREAM_PORT};" | xargs -I{} \
    sed -i '/###> AUTOINSERT FASTCGI ###/a\
    fastcgi_pass {}' /etc/nginx/conf.d/default.conf
###< AUTOINSERTS ###

COPY . .

RUN apk add acl
RUN HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)

#RUN echo "upstream php-upstream { server ${APP_CONTAINER_NAME}:${PHP_UPSTREAM_PORT}; keepalive 16; }" > /etc/nginx/conf.d/upstream.conf

EXPOSE 80
EXPOSE 443
