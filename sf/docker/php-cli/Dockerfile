FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libicu-dev \
    && docker-php-ext-install pdo_pgsql pgsql intl opcache \
    && docker-php-ext-enable intl opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY php.ini /usr/local/etc/php/php.ini

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN apt-get update && apt-get install -y zlib1g-dev git \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /tmp
RUN git clone https://github.com/NoiseByNorthwest/php-spx.git \
    && cd php-spx \
    && git checkout release/latest \
    && phpize \
    && ./configure \
    && make \
    && make install

RUN echo 'extension=spx.so' >> 	/usr/local/etc/php/conf.d/docker-cli.ini
RUN echo 'spx.http_enabled=1 \n\
spx.http_ip_whitelist="*" \n\
spx.http_key="dev" \n' >> /usr/local/etc/php/conf.d/docker-cli.ini