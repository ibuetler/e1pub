FROM debian:testing
MAINTAINER Cheewai Lai <clai@csir.co.za>

#
# Not using nginx because addon modules requires compilation from source
#
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update \
 && apt-get -y upgrade \
 && apt-get -y dist-upgrade \
 && apt-get -y install libxml2 apache2 apache2-utils curl net-tools socat \
 && a2enmod proxy proxy_html proxy_http xml2enc ssl headers rewrite \
 && a2dissite 000-default \
 && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

EXPOSE 80