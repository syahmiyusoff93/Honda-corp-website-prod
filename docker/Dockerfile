FROM alpine:edge

# Build argument for environment selection
ARG ENVIRONMENT=local
ENV ENVIRONMENT=${ENVIRONMENT}

# Multi-application Docker setup for Honda Corp Website
# Supports web (frontend), cms (backend), hcuc, and productrecall PHP applications
# - Web app served at root (/)
# - HCUC app served at /hcuc
# - ProductRecall app served at /productrecall
# - Environment: local, staging, or production

# Install Nginx, PHP 8.4, PHP-FPM, Supervisor, and common extensions for both web and cms apps
RUN apk add --no-cache \
    nginx \
    php84 \
    php84-fpm \
    php84-mbstring \
    php84-xml \
    php84-curl \
    php84-json \
    php84-zip \
    php84-pdo \
    php84-pdo_mysql \
    php84-openssl \
    php84-tokenizer \
    php84-fileinfo \
    php84-gd \
    php84-intl \
    php84-bcmath \
    php84-exif \
    php84-session \
    php84-dom \
    php84-ctype \
    php84-iconv \
    php84-simplexml \
    php84-phar \
    php84-posix \
    php84-sockets \
    php84-soap \
    php84-xmlwriter \
    php84-xmlreader \
    supervisor \
    curl \
    git \
    nodejs \
    npm \
    nano

# Install ImageMagick and build dependencies for PECL imagick
RUN apk add --no-cache imagemagick imagemagick-dev php84-pear php84-dev autoconf g++ make && \
    pecl install imagick && \
    echo "extension=imagick.so" > /etc/php84/conf.d/imagick.ini && \
    apk del php84-dev autoconf g++ make

# Copy configs
COPY docker/default.conf /etc/nginx/http.d/default.conf
COPY docker/php.ini /etc/php84/php.ini
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/php-fpm-www.conf /etc/php84/php-fpm.d/www.conf

# Copy SSL certs (if present)
COPY docker/ssl/cert.pem /etc/nginx/ssl/cert.pem
COPY docker/ssl/key.pem /etc/nginx/ssl/key.pem

# Copy Laravel web app into /var/www/web (do not copy host storage into image)
COPY web/ /var/www/web/

# Copy HCUC PHP app into /var/www/hcuc
COPY hcuc/ /var/www/hcuc/

# Copy ProductRecall PHP app into /var/www/productrecall
COPY productrecall/ /var/www/productrecall/

# Copy appropriate .env file based on ENVIRONMENT build argument
RUN if [ "$ENVIRONMENT" = "staging" ]; then \
        cp /var/www/web/.env.staging /var/www/web/.env && \
        cp /var/www/hcuc/.env.staging /var/www/hcuc/.env && \
        cp /var/www/productrecall/.env.staging /var/www/productrecall/.env; \
    elif [ "$ENVIRONMENT" = "production" ]; then \
        cp /var/www/web/.env.production /var/www/web/.env && \
        cp /var/www/hcuc/.env.production /var/www/hcuc/.env && \
        cp /var/www/productrecall/.env.production /var/www/productrecall/.env; \
    else \
        cp /var/www/web/.env.local /var/www/web/.env && \
        cp /var/www/hcuc/.env.local /var/www/hcuc/.env && \
        cp /var/www/productrecall/.env.local /var/www/productrecall/.env; \
    fi && \
    echo "Environment set to: $ENVIRONMENT"

# Create storage directories for all applications
RUN mkdir -p /var/www/web/storage/logs /var/www/web/storage/framework/views /var/www/web/storage/framework/sessions /var/www/web/storage/framework/cache && \
    mkdir -p /config && \
    mkdir -p /config/assets && \
    touch /var/www/web/storage/logs/laravel.log /var/www/cms/storage/logs/laravel.log || true

# Set permissions for all applications
RUN mkdir -p /var/www/web/bootstrap/cache && \
    chown -R nginx:nginx /var/www/web/bootstrap/cache && \
    chmod -R 775 /var/www/web/bootstrap/cache && \
    # Create storage link for web app if it doesn't exist
    cd /var/www/web && php84 artisan storage:link 2>/dev/null || true 

EXPOSE 80 443

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]