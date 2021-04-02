FROM devilbox/php-fpm:7.4-prod-0.106

USER root
# Cài đặt composer để cài đặt package
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev

RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev

RUN pecl install -f mongodb && docker-php-ext-enable mongodb