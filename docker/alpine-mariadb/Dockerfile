FROM hackinglab/alpine-base:latest

RUN apk add --no-cache mariadb mariadb-client mariadb-server-utils pwgen && \
    rm -f /var/cache/apk/*

ADD root /

EXPOSE 3306
