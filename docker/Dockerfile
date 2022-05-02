FROM php:8.1.0-fpm

ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="10000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="192" \
    PHP_OPCACHE_MAX_WASTED_PERCENTAGE="10"

RUN apt-get update && apt-get -y --allow-unauthenticated install \
    libicu-dev \
    git \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev

RUN docker-php-ext-install pdo mysqli pdo_mysql intl zip opcache
RUN apt-get install -y default-mysql-client
RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet
# zlib1g zlib1g-dev libpng-dev, gd - requred for phpoffice/phpspreadsheet
RUN apt-get install -y libzip-dev libpng-dev
RUN docker-php-ext-install gd

RUN pecl install redis-5.3.7 \
	&& docker-php-ext-enable redis

RUN pecl install igbinary \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable igbinary

COPY php/opcache.ini "$PHP_INI_DIR/conf.d/opcache.ini"
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
