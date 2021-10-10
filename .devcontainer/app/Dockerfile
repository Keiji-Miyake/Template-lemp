FROM php:8.0-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]
 
# メタ情報の付与
LABEL maintainer="k.miyake01+dev@gmail.com"
LABEL version="1.0"
LABEL description="PHP Template app"

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer
 
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# PHP で必要なライブラリをインストール
RUN apt-get update && apt-get install -y \
    git \
    tzdata \
    zip unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
  && docker-php-ext-install intl pdo_mysql zip bcmath mbstring \
  && pecl install xdebug \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* 

ENV TZ=Asia/Tokyo

# composer のインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# ファイルのコピー
COPY ./app/php.ini /usr/local/etc/php/php.ini
COPY ./app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www