#!/bin/bash
echo "--- starting corona_app_v2 ---"
service mysql start
mysql -u root < /usr/src/app/database/corona_app_v2.sql
service php7.3-fpm start
/usr/sbin/nginx -g "daemon off;"
cat
