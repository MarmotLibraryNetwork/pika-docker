# Pika Development Enviroment built with docker-compose

A basic development enviroment

Services:
* PHP 7.4 (alpine)
* Apache 2.4 (alpine)
* MariaDB 10.3 
* Memcached 1.5
* Solr 7

To obtain the IP address of a running Mariadb instance use this shell command:
`docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' mariadb`