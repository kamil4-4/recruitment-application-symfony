FROM php:8.4-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libicu-dev \
    && docker-php-ext-install pdo pdo_mysql intl \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app

EXPOSE 8000

CMD ["sh", "-c", "composer install --no-interaction && php bin/console doctrine:migrations:migrate --no-interaction && php -S 0.0.0.0:8000 -t public"]
