FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Install nginx
RUN apk upgrade --available

RUN echo "http://dl-4.alpinelinux.org/alpine/v3.7/main" >> /etc/apk/repositories 
#RUN apk add --update nginx=1.8.1-r1
RUN apk add --update nginx=1.12.2-r3
RUN rm -rf /var/cache/apk/* && chown -R nginx:www-data /var/lib/nginx

# Add the files
ADD root /

# Expose the ports for nginx
EXPOSE 80
