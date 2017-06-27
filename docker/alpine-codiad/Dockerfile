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
	php7 \
	php7-fpm \
	expect \
	php7-ldap \
	php7-zip \
	shadow

# copy local files
COPY root/ /

RUN mkdir /workspace

# ports and volumes
EXPOSE 80
VOLUME /config

