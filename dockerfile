# Usar una imagen base con PHP y Apache
FROM php:8.1-apache

# Establecer el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copiar los archivos del proyecto en el contenedor
COPY . /var/www/html/

# Habilitar mod_rewrite (opcional, si tu aplicación lo requiere)
RUN a2enmod rewrite

# Configurar el ServerName para evitar la advertencia
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Configurar Apache para escuchar en el puerto definido en la variable de entorno PORT
# y exponer el puerto de la aplicación
ENV PORT 9000
EXPOSE 9000

# Iniciar el servidor Apache cuando el contenedor se ejecute
CMD ["apache2-foreground"]
