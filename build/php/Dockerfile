FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y \
    # install dependices
    libxml2-dev \
    zlib1g-dev \
    libmemcached-dev \
    postgresql-server-dev-all \
    postgresql \    
    libbz2-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev 

# Enable pgsql, mysqli, soap
RUN docker-php-ext-install mysqli pdo_pgsql pgsql soap bz2
# Install xdebug, memcache, gd
RUN pecl install xdebug-2.8.0 memcached-3.1.5 \
    # solr-2.5.1 \
    && docker-php-ext-enable xdebug memcached \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install Composer
#RUN mkdir -p /usr/share/composer
#COPY composer.json /usr/share/composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Install Composer packages
#WORKDIR /usr/share/composer
#RUN composer install
