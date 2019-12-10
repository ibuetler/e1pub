FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Install nginx
# RUN echo "http://dl-4.alpinelinux.org/alpine/v3.9/main/" >> /etc/apk/repositories 

RUN apk add --update nginx && \
    rm -rf /var/cache/apk/* && \
    chown -R nginx:www-data /var/lib/nginx

# Add the files
ADD root /

# Expose the ports for nginx
EXPOSE 80
