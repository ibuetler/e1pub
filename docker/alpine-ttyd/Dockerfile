FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Install nginx
RUN echo "http://dl-4.alpinelinux.org/alpine/v3.10/main/" >> /etc/apk/repositories && \
    apk add --update openssl ttyd && \
    rm -rf /var/cache/apk/*

# Add the files
ADD root /

# Expose the ports for nginx
EXPOSE 7681
