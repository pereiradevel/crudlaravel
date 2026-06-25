FROM php:8.3-cli-bookworm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Limpa o cache do apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões do PHP necessárias para o Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Copia a versão mais recente do Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala o Node.js 20 e o NPM
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Define o diretório de trabalho
WORKDIR /var/www/html

# Expõe as portas do servidor do Laravel e do Vite HMR
EXPOSE 8000 5173
