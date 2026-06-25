FROM php:8.3-cli-bookworm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    default-mysql-client \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Configura e instala extensões do PHP necessárias para o Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Copia a versão mais recente do Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala o Node.js 20 e o NPM
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos de dependência primeiro (para aproveitar cache de camadas)
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader --prefer-dist

COPY package.json package-lock.json ./
RUN npm ci

# Copia o restante do projeto
COPY . .

# Finaliza a instalação do Composer (autoloader + scripts)
RUN composer dump-autoload --optimize

# Garante permissões corretas para storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expõe as portas do servidor do Laravel e do Vite HMR
EXPOSE 8000 5173

# Comando padrão: inicia o servidor Laravel e o Vite
CMD ["composer", "dev"]
