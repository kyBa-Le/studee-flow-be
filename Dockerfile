# Base image có sẵn Apache
FROM php:8.2-apache

# Cài extension Laravel cần
RUN apt-get update && apt-get install -y \
    libzip-dev unzip zip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Cài composer từ container chính thức
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set thư mục làm việc
WORKDIR /var/www/html

# Copy toàn bộ project Laravel vào container
COPY . .

# Cấp quyền thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Chạy composer install nếu cần (tùy chọn nếu bạn đã cài rồi)
# RUN composer install --no-dev --optimize-autoloader

# Expose port 80 (Apache mặc định)
EXPOSE 80
