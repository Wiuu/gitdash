#!/bin/sh

/usr/bin/mongod --smallfiles && /etc/init.d/mongodb start & /etc/init.d/php7.0-fpm start

/etc/init.d/nginx start

/etc/init.d/php7.0-fpm restart

/var/www/html/bin/composer.phar install