FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# copy local files
COPY root/ /


# install packages
RUN \
apk add --no-cache \
        curl \
	nginx \
        expect \
	openssl \
	shadow \
	php7-common \
	php7 \
	php7-fileinfo \
	php7-fpm \
	php7-json \
	php7-mbstring \
	php7-openssl \
	php7-session \
	php7-simplexml \
	php7-xml \
	php7-xmlwriter \
	php7-mysqli \
	php7-zlib \
	php7-ldap \
	php7-zip 

# MySQL
WORKDIR /app
VOLUME /app
# COPY startup.sh /startup.sh

RUN apk add --update mysql mysql-client && rm -f /var/cache/apk/*
# COPY my.cnf /etc/mysql/my.cnf


# ports and volumes
EXPOSE 80
VOLUME /config

ENTRYPOINT ["/init"]
CMD ["/startup.sh"]

