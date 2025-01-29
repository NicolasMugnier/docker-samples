FROM php:8.4.3-fpm-bullseye

RUN apt-get update && apt-get install -y \
    libpq-dev \
    zlib1g-dev \
    git \
    && docker-php-ext-install pdo_pgsql pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /tmp
RUN git clone https://github.com/NoiseByNorthwest/php-spx.git \
    && cd php-spx \
    && git checkout release/latest \
    && phpize \
    && ./configure \
    && make \
    && make install

RUN echo 'extension=spx.so' >> 	/usr/local/etc/php/conf.d/docker-fpm.ini
RUN echo 'spx.http_enabled=1 \n\
spx.http_ip_whitelist="*" \n\
spx.http_key="dev" \n\' >> /usr/local/etc/php/conf.d/docker-fpm.ini
