FROM php:8.3-cli

WORKDIR /app

# Установка unzip для Composer
RUN apt-get update && apt-get install -y unzip git && rm -rf /var/lib/apt/lists/*

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копирование файлов сервиса
COPY services/svc2 /app

# Установка зависимостей
RUN composer update --no-dev --no-scripts --no-progress --prefer-dist --ignore-platform-reqs && rm -f composer.lock

# Переменная окружения по умолчанию
ENV APP_VERSION=v1

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
