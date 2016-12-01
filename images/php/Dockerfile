FROM php:7.0-fpm-alpine

MAINTAINER Benedikt Schmitz <benedikt.schmitz@avency.de>

ARG PHP_REDIS_VERION="3.0.0"
ARG PHP_YAML_VERION="2.0.0"

# Custom PHP requirements
RUN set -x \
    && mkdir -p /data \
    && apk --update add tar curl openssl sed libuuid postgresql-dev icu-dev gettext-dev curl-dev libxml2-dev openldap-dev libpng libjpeg-turbo libmcrypt-dev libxslt-dev bzip2-dev yaml libuuid \
    && apk add --virtual .phpize-deps $PHPIZE_DEPS imagemagick-dev libtool freetype-dev libpng-dev libjpeg-turbo-dev yaml-dev \
    && docker-php-ext-configure gd \
      --with-gd \
      --with-freetype-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install \
      gd \
      pdo \
      pdo_mysql \
      pdo_pgsql \
      mbstring \
      opcache \
      intl \
      exif \
      gettext \
      curl \
      json \
      bcmath \
      mcrypt \
      zip \
      bz2 \
      tokenizer \
      fileinfo \
      pcntl \
      xsl \
      xml \
      soap \
    && docker-php-ext-configure ldap --with-libdir=lib/ \
    && docker-php-ext-install ldap \
    && pecl install imagick redis-${PHP_REDIS_VERION} yaml-${PHP_YAML_VERION} uuid \
    && docker-php-ext-enable imagick \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable yaml \
    && docker-php-ext-enable uuid \
    && apk add --virtual .imagick-runtime-deps imagemagick \
    && apk del .phpize-deps postgresql-dev icu-dev gettext-dev curl-dev libxml2-dev openldap-dev libpng libjpeg-turbo libmcrypt-dev libxslt-dev bzip2-dev

# Configure PHP
RUN echo "date.timezone=${PHP_TIMEZONE:-UTC}" > $PHP_INI_DIR/conf.d/date_timezone.ini \
    && echo "memory_limit=${PHP_MEMORY_LIMIT:-512M}" > $PHP_INI_DIR/conf.d/memory_limit.ini \
    && echo "upload_max_filesize=${PHP_UPLOAD_MAX_FILESIZE:-256M}" > $PHP_INI_DIR/conf.d/upload_max_filesize.ini \
    && echo "post_max_size=${PHP_UPLOAD_MAX_FILESIZE:-256M}" > $PHP_INI_DIR/conf.d/post_max_size.ini \
    && echo "allow_url_include=${PHP_ALLOW_URL_INCLUDE:-1}" > $PHP_INI_DIR/conf.d/allow_url_include.ini \
    && echo "max_execution_time=${PHP_MAX_EXECUTION_TIME:-240}" > $PHP_INI_DIR/conf.d/max_execution_time.ini \
    && echo "max_input_vars=${PHP_MAX_INPUT_VARS:-1500}" > $PHP_INI_DIR/conf.d/max_input_vars.ini

# Expose volume
VOLUME /root/.caddy
VOLUME /data

# Define working directory
WORKDIR /data

# Expose port
EXPOSE 9000