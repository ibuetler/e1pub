FROM hackinglab/alpine-nginx

MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com> 

RUN apk update
RUN apk upgrade
RUN apk --update add nginx bash && mkdir /run/nginx && rm -rf /var/cache/apk/*

COPY starter/battlecity /usr/html

EXPOSE 80

