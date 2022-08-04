FROM islamicnetwork/php:8.1-apache-dev

# Copy files
COPY . /var/www/
COPY etc/apache2/mods-enabled/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf

# Run Composer
RUN cd /var/www && composer install --no-dev

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/

# The correct environment variables are set in the docker-compose file