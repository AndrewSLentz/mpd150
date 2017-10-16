FROM debian

# setup the apache server
RUN apt-get update
RUN apt-get install -y apache2 php7.0 php-pear php7.0-mysql
RUN a2enmod php7.0 && a2enmod rewrite
RUN service apache2 restart

# copy the site in
WORKDIR /var/www
RUN rm html -fR
ADD . /var/www/html 
