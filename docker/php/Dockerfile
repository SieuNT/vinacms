FROM php:7.0.17-apache
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install --no-install-recommends -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libxslt-dev \
        libicu-dev \
        libmagickwand-dev \
		libpq-dev \ 
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql pgsql mbstring intl xmlrpc xsl \
    && rm -r /var/lib/apt/lists/*
# Enable module
RUN a2enmod rewrite