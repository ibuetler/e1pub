FROM php:7.2-fpm

RUN apt-get update \
	&& apt-get install -y \
		curl \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Change uid and gid to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www
ENV COMPOSER_HOME /var/www/docker/php/.composer
