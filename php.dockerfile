FROM devilbox/php-fpm:7.4-prod-0.106

USER root
# Cài đặt composer để cài đặt package
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

