# Dockerfile for HL Packages
# http://repo.hacking-lab.com
# Debian with KALI repo using libssl1.0.2

FROM debian:latest

ENV REVERSEPROXY=webmailhsr.idocker.hacking-lab.com
ENV BACKEND=webmail.hsr.ch

MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

RUN apt-get update
RUN apt-get -y upgrade
RUN apt-get -y install gnupg2

RUN echo "deb [arch=amd64] http://repo.hacking-lab.com/ kookarai main" > /etc/apt/sources.list.d/hl.list
RUN echo "deb http://http.kali.org/kali kali-rolling main non-free contrib" > /etc/apt/sources.list.d/kali.list
RUN mkdir -p /opt/applic/
ADD hl.key /opt/applic/
ADD kali.key /opt/applic/
RUN apt-key add /opt/applic/hl.key
RUN apt-key add /opt/applic/kali.key
ADD arch /var/lib/dpkg/arch

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y libexpat1 libexpat1-dev openssl net-tools hl-apache-docker libphp7.0-embed

EXPOSE 80

ADD files/entrypoint.sh /

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache"]
