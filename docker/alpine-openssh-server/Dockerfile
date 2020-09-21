FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Install openssh server
RUN echo "http://dl-4.alpinelinux.org/alpine/v3.12/main/" >> /etc/apk/repositories && \
    apk add --update openssl openssh-server && \
    rm -rf /var/cache/apk/*

# Add the files
ADD root /

# Expose the ports for nginx
EXPOSE 7681
