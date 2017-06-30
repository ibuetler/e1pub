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
        python-pip python-dev build-essential \
        mesa-utils libgl1-mesa-dri \
        dbus-x11 x11-utils 

RUN apt-get autoclean
RUN apt-get autoremove
RUN rm -rf /var/lib/apt/lists/*

# tini for subreap                                   
ENV TINI_VERSION v0.9.0
ADD https://github.com/krallin/tini/releases/download/${TINI_VERSION}/tini /bin/tini
RUN chmod +x /bin/tini


ADD image /
RUN pip install setuptools wheel && pip install -r /usr/lib/web/requirements.txt

EXPOSE 80
WORKDIR /root
ENV HOME=/home/hacker \
    SHELL=/bin/bash
ENTRYPOINT ["/startup.sh"]
