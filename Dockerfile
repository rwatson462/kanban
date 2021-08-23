FROM php:8-apache

# Install required plugins
RUN pecl install redis && \
    pecl install xdebug && \
    docker-php-ext-install pdo pdo_mysql mysqli && \
    docker-php-ext-enable redis

# Run apache as the same user as WSL so we can easily edit files between containers and the host
RUN adduser --no-create-home --uid 1000 --shell /sbin/nologin --quiet robwatson
ENV APACHE_RUN_USER robwatson
ENV APACHE_RUN_GROUP robwatson

# Configure Apache (need to stop the service first, apply config, then restart)
RUN service apache2 stop
RUN a2enmod rewrite
RUN service apache2 start
