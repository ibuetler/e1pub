FROM hackinglab/alpine-nginx:latest

MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com> 

RUN apk update
RUN apk upgrade
RUN apk --update add nginx bash && mkdir /run/nginx && rm -rf /var/cache/apk/*

COPY starter/mario /usr/html

#EXPOSE 80

#CMD ["nginx", "-g", "daemon off;"]
