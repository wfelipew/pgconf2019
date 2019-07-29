FROM php:7.2-apache
RUN apt-get update && apt-get install -y \
zlib1g-dev \
libpq-dev \
wait-for-it \
&& docker-php-ext-install -j$(nproc) zip \
&& docker-php-ext-install -j$(nproc) pdo_pgsql 
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" ; \
php composer-setup.php --install-dir=/bin ; \
php -r "unlink('composer-setup.php');"; \
ln -s /bin/composer.phar /bin/composer
RUN composer global require hirak/prestissimo
RUN a2enmod rewrite
COPY src/ /var/www/html/
COPY app-entrypoint.sh /usr/local/bin/
COPY migrations-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/app-entrypoint.sh
RUN chmod +x /usr/local/bin/migrations-entrypoint.sh
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN composer install  --no-dev --prefer-dist
