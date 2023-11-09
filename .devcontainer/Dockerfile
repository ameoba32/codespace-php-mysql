FROM mcr.microsoft.com/devcontainers/php:dev-8.1-bullseye

# Install MariaDB client
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y mariadb-client telnet iputils-ping \ 
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# Install php  extensions
RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev libyaml-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install zip
RUN docker-php-ext-install calendar
RUN apt-get update && apt-get install -y libicu-dev && docker-php-ext-install intl
COPY php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Adminer
RUN curl -fsSLk https://www.adminer.org/latest-mysql-en.php -o /var/www/html/adminer.php

# copy the apache config and enable the site
ADD apache.conf /etc/apache2/sites-available/000-default.conf

# enable apache rewrite module
RUN a2enmod rewrite setenvif headers

EXPOSE 80


