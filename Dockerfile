
# Use official PHP + Apache
FROM php:8.2-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install common PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files
COPY ./ /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 80