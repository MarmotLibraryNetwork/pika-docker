FROM httpd:2.4-alpine

RUN set -ex;
RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*
RUN apk update

# Copy apache vhost file to proxy php requests to php-fpm container
#COPY demo.apache.conf /usr/local/apache2/conf/demo.apache.conf
RUN echo "Include /usr/local/apache2/conf/vhosts.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
