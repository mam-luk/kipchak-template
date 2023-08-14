FROM islamicnetwork/php:8.2-unit

# Copy files
COPY . /var/www/
COPY etc/unit/.unit.conf.json /docker-entrypoint.d/.unit.conf.json

# Run Composer
RUN cd /var/www && composer install --no-dev

# Delete stuff we do not need
RUN rm -rf /var/www/.git
RUN rm -rf /var/www/.gitignore


# The correct environment variables are set in the docker-compose file. Set any other ones here.

###############################################################################################################
## If you are using Doctrine ORM, comment out the next 3 lines to generate proxies at container startup time. ##
# COPY bin/doctrine/proxies.sh /usr/local/bin/doctrine-proxies.sh
# RUN chmod -R 777 /tmp && chmod 755 /usr/local/bin/doctrine-proxies.sh
# CMD ["/usr/local/bin/doctrine-proxies.sh"]
###################################### Doctrine Proxies end ###################################################
