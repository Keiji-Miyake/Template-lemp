FROM nginx:1.20-alpine

# メタ情報の付与
LABEL maintainer="k.miyake01+dev@gmail.com"
LABEL version="1.0"
LABEL description="Template LEMP in Nginx"

ENV TZ=Asia/Tokyo

RUN apk update && \
  apk add --update --no-cache --virtual=.build-dependencies g++

# nginx config file
COPY ./nginx/*.conf /etc/nginx/conf.d/

WORKDIR /var/www