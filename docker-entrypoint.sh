#!/bin/bash
echo "--- starting corona_app_v2 ---"
service php7.3-fpm start
/usr/sbin/nginx -g "daemon off;"
cat