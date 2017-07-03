FROM ubuntu
MAINTAINER Ivan Buetler <ivan.buetler@gmail.com>

ENV DEBIAN_FRONTEND noninteractive

# built-in packages
RUN apt-get update
RUN apt-get -y upgrade
RUN apt-get install -y --no-install-recommends --allow-unauthenticated \
	curl \
        supervisor \
        openssh-server \
	pwgen sudo vim-tiny \
        net-tools \
        lxde x11vnc xvfb \
        firefox \
        nginx \
	openjdk-8-jre \
	wget \
	git \
        python-pip python-dev build-essential \
        dbus-x11 x11-utils 

RUN apt-get autoclean
RUN apt-get autoremove
RUN rm -rf /var/lib/apt/lists/*

# ZAP
#RUN mkdir -p /opt/applic/
#RUN wget https://github.com/zaproxy/zaproxy/releases/download/2.6.0/ZAP_2.6.0_Linux.tar.gz -P /opt/applic/
#RUN tar -xvzf /opt/applic/ZAP_2.6.0_Linux.tar.gz -C /opt/applic/
#RUN rm /opt/applic/ZAP_2.6.0_Linux.tar.gz

# tini for subreap                                   
ENV TINI_VERSION v0.9.0
ADD https://github.com/krallin/tini/releases/download/${TINI_VERSION}/tini /bin/tini
RUN chmod +x /bin/tini


ADD image /
RUN pip install --upgrade pip
RUN pip install setuptools wheel
RUN pip install -r /usr/lib/web/requirements.txt

# HACKER HOME
RUN useradd --shell /bin/bash --user-group hacker


EXPOSE 80
WORKDIR /root
ENV HOME=/home/hacker \
    SHELL=/bin/bash

ENTRYPOINT ["/startup.sh"]
