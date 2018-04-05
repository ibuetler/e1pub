FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Install apache
# RUN apk add --no-cache apache2=2.4.23-r1 apache2-utils=2.4.23-r1
RUN apk add --no-cache apache2 apache2-utils

RUN mkdir -p /run/apache2/

# Add the files
ADD root /

# Expose the ports for apache
EXPOSE 80 443
