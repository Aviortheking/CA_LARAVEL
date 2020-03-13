# source
FROM php:fpm-alpine

# +-----------------------------+
# |        Pre requises         |
# +-----------------------------+

# Get the build arg
ARG dev

# Project home directory
WORKDIR /project

# allow www-data to freely use the working directory
RUN chown www-data:www-data /project

# Install nginx
RUN apk --update add --no-cache nginx libmcrypt-dev

# Fix errsor #161
RUN chmod -R 777 /var/lib/nginx/

# Install build-deps
# nginx is the php handler
# yarn is the frontend installer
# composer is is teh backend installer
# libzip-dev is a deps for the command docker-php-ext-install
RUN apk --update add --no-cache --virtual build-deps yarn composer libzip-dev $PHPIZE_DEPS

# Setup PHP extensions
# pdo mysqli pdo_mysql are for database connexions
RUN pecl install mcrypt
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install zip pdo mysqli pdo_mysql

# Setup nginx and PHP
COPY ./docker/ /

# Change user to www-data for datas
USER www-data

# +-----------------------------+
# |          Install            |
# +-----------------------------+


# Send the project
COPY --chown=www-data:www-data . .

# install composer deps && env
RUN export COMPOSER_CACHE_DIR="/dev/null"; composer install --no-progress
#&& composer dump-env prod

# Install frontend deps and build frontend
RUN yarn \
&& yarn build

# change user back to the root user to finish building
USER root

# Purge build deps if system is not in dev mode
RUN echo x$dev; if [ "x$dev" == "x" ]; then apk del build-deps; fi

# Expose http port
EXPOSE 80

# command to launch `launch.sh` on start
CMD "/startup.sh"
