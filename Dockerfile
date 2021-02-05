FROM php:7.4-apache

WORKDIR /var/www/html

ENV APACHE_LOCK_DIR="/var/lock"
ENV APACHE_PID_FILE="/var/run/apache2.pid"
ENV APACHE_RUN_USER="www-data"
ENV APACHE_RUN_GROUP="www-data"
ENV APACHE_LOG_DIR="/var/log/apache2"

CMD chown -R www-data:www-data /var/www/html/ && chmod -R 777 /var/www/html/ && apachectl -D FOREGROUND