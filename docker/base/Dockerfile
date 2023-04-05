FROM php:8.0.3-apache-buster as bundles-base

RUN apt-get -y update && apt-get -y upgrade && apt-get -y install git bash libpq-dev
RUN docker-php-ext-install pdo pdo_pgsql
RUN groupadd --gid 1000 bundles \
  && useradd --uid 1000 --gid bundles --shell /bin/bash --create-home bundles

RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

WORKDIR /home/bundles

EXPOSE 80