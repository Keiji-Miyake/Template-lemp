FROM php:8-apache

# メタ情報の付与
LABEL maintainer="k.miyake01+dev@gmail.com"
LABEL version="1.0"
LABEL description="PHP Template"

ENV TZ=Asia/Tokyo

WORKDIR /var/www/html

# PHP で必要なライブラリをインストール
RUN apt-get update \
    && apt-get install -y libonig-dev libzip-dev unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# composer のインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# ファイルのコピー
COPY ./src /var/www/html
COPY ./.devcontainer/app/php.ini /usr/local/etc/php/php.ini
COPY ./.devcontainer/app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
