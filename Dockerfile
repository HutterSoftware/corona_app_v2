FROM nginx:stable-perl as corona_app_v2
MAINTAINER "Benedikt Hutter<benedikt.hutter5@gmail.com>"
EXPOSE 80
RUN mkdir /usr/src/app
WORKDIR /usr/src/app

# Install software
RUN apt update
RUN apt upgrade -y
RUN apt install php7.3-fpm -y
RUN apt install php7.3-xml -y
RUN apt install php-mysql -y
RUN apt install vim -y

RUN mkdir /etc/nginx/snippets/

# Set mounting point
RUN mkdir /data
VOLUME /data

# Update PHP configuration files
COPY server-configuration/www.conf /etc/php/7.3/fpm/pool.d/
COPY server-configuration/fastcgi.conf /etc/nginx/
COPY server-configuration/fastcgi-php.conf /etc/nginx/snippets
COPY server-configuration/default.conf /etc/nginx/conf.d/
COPY server-configuration/php.ini /etc/php/7.3/fpm/

COPY . .
RUN chmod +x docker-entrypoint.sh
ENTRYPOINT ["./docker-entrypoint.sh"]
