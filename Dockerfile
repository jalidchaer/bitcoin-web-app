FROM php:7.4-apache

# Instala dependencias del sistema operativo
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# Configura el servidor Apache
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar las dependencias de Laravel
RUN cd /var/www/html && composer install --no-interaction

# Copiar el archivo de entorno de Laravel para pruebas
#COPY .env /var/www/html/.env

# Copiar el archivo de entorno de Laravel para pruebas
COPY .env.testing /var/www/html/.env.testing

# Configura el archivo de entorno de Laravel
#RUN php /var/www/html/artisan key:generate

# Expone el puerto 80
EXPOSE 80

# Ejecuta Apache en primer plano
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]