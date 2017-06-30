FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# set version label
ARG BUILD_DATE
ARG VERSION
LABEL build_version="Linuxserver.io version:- ${VERSION} Build-date:- ${BUILD_DATE}"

# install packages
RUN \
apk add --no-cache \
        git \
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
COPY root/ /

RUN mkdir /workspace

# ports and volumes
EXPOSE 80
VOLUME /config

