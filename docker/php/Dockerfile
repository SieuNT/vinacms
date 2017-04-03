FROM php:7.1.3-apache
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
# Install XSL
RUN apt-get install -y libxslt-dev
RUN docker-php-ext-install xsl
# Install xmlrpc
RUN docker-php-ext-install xmlrpc
# Install intl
RUN apt-get install -y libicu-dev
RUN pecl install intl
RUN docker-php-ext-install intl
# Install mbstring
RUN docker-php-ext-install mbstring
# Enable module
RUN a2enmod rewrite