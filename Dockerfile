# Usa l'ultima versione di PHP
FROM php:8.2-apache

# Copia i file sorgente nell'immagine Docker
COPY . /var/www/html

# Imposta la directory di lavoro
WORKDIR /var/www/html

# Avvia il server PHP quando il contenitore viene eseguito
CMD [ "php", "-S", "0.0.0.0:80" ]