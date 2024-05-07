# Use an official PHP runtime as a parent image with Apache
FROM php:8.0-apache

# Install any needed packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
  && docker-php-ext-install pdo pdo_mysql zip

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/
