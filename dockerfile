# Use the official PHP image with FPM
FROM php:8.2-fpm

# Set the working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install any necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
