FROM httpd:2.4-alpine

RUN set -ex;
RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*
RUN apk update; \
    apk upgrade; 

# Copy apache vhost file to proxy php requests to php-fpm container
COPY pika.apache.conf /usr/local/apache2/conf/pika.apache.conf
RUN echo "Include /usr/local/apache2/conf/pika.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
