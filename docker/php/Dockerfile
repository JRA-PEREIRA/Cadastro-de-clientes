FROM php:8.2-fpm

# Adicione estas linhas ANTES do WORKDIR
ARG USER_ID=1000
ARG GROUP_ID=1000

# Configura usuário/grupo para match com o host
RUN usermod -u ${USER_ID} www-data && \
    groupmod -g ${GROUP_ID} www-data && \
    mkdir -p /var/www/html && \
    chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html

# Instala dependências
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ajusta dono dos arquivos (mantém compatibilidade com host e container)
COPY --chown=www-data:www-data . .

# Instala dependências do Laravel (produção)
USER www-data
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Ajusta permissões
RUN chmod -R 775 storage bootstrap/cache