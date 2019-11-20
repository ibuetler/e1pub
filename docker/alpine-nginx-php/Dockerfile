FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# install packages
RUN \
apk add --no-cache \
        vim \
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
	php7-zlib \
	php7-ldap \
	php7-zip 

# copy local files
ADD root/ /

# ports and volumes
EXPOSE 80
