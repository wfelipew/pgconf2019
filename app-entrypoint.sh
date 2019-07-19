#!/bin/bash

set -e


if [ "$APP_ENV" = "localdev" ] || [ "$APP_ENV" = "dev" ]; then

	echo "Enabling dev environment"
	#Habilitar xdebug
	
	echo "Running composer"
        composer install  --no-dev --prefer-dist 
fi

chown -R www-data. /var/www/html/storage/

exec apache2-foreground "$@"
