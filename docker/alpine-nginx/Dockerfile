FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Install nginx
RUN echo "http://dl-4.alpinelinux.org/alpine/v3.6/main/" >> /etc/apk/repositories && \
    apk add --update nginx=1.12.1-r0 && \
    rm -rf /var/cache/apk/* && \
    chown -R nginx:www-data /var/lib/nginx

# Add the files
ADD root /

# Expose the ports for nginx
EXPOSE 80
