FROM php:8.3-fpm

WORKDIR /app

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка расширений PHP (минимальные для Symfony)
RUN apt-get update && apt-get install -y \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
