# Usar una imagen base con PHP y Apache
FROM php:8.1-apache

# Establecer el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copiar los archivos del proyecto en el contenedor
COPY . /var/www/html/

# Habilitar mod_rewrite (opcional, si tu aplicación lo requiere)
RUN a2enmod rewrite

# Cambiar el puerto en el que Apache escucha a 9000
RUN sed -i 's/80/9000/' /etc/apache2/ports.conf
RUN sed -i 's/:80/:9000/' /etc/apache2/sites-available/000-default.conf

# Configurar el ServerName para evitar la advertencia
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Exponer el puerto 9000 para acceso HTTP
EXPOSE 9000

# Iniciar el servidor Apache cuando el contenedor se ejecute
CMD ["apache2-foreground"]
