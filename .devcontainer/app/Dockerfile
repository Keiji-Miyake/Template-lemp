FROM php:8-apache

# メタ情報の付与
LABEL maintainer="k.miyake01+dev@gmail.com"
LABEL version="1.0"
LABEL description="PHP Template"

WORKDIR /var/www/html

# PHP で必要なライブラリをインストール
RUN apt-get update && apt-get install -y \
    tzdata \
    libpq-dev \
  && docker-php-ext-install pdo_pgsql \
  && pecl install xdebug \
  && rm -rf /var/lib/apt/lists/*

ENV TZ=Asia/Tokyo

# composer のインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# ファイルのコピー
COPY ./src /var/www/html
COPY ./.devcontainer/app/php.ini /usr/local/etc/php/php.ini
COPY ./.devcontainer/app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
