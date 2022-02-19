FROM node:16-buster as node
FROM php:8.0-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# メタ情報の付与
LABEL maintainer="k.miyake01+dev@gmail.com"
LABEL version="1.0"
LABEL description="Template LEMP in app"

# PHP で必要なライブラリをインストール
RUN apt-get update && apt-get install -y \
    git \
    tzdata \
    zip unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libpng-dev \
    libfreetype6-dev \
  && docker-php-ext-configure gd --with-freetype \
  && docker-php-ext-install gd intl mysqli pdo_mysql zip bcmath mbstring \
  && pecl install xdebug \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

ENV TZ=Asia/Tokyo

# install nodejs yarn
COPY --from=node /usr/local/bin/node /usr/local/bin/node
COPY --from=node /usr/local/include/node /usr/local/include/node
COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /opt/yarn* /opt/yarn
RUN ln -s /usr/local/bin/node /usr/local/bin/nodejs && \
  ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm && \
  ln -s /opt/yarn/bin/yarn /usr/local/bin/yarn && \
  ln -fs /opt/yarn/bin/yarnpkg /usr/local/bin/yarnpkg

# composer のインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

# ファイルのコピー
COPY ./app/php.ini /usr/local/etc/php/php.ini
COPY ./app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www