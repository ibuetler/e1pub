FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

ENV LANG="en_US.UTF-8" \
    LC_ALL="en_US.UTF-8" \
    LANGUAGE="en_US.UTF-8" \
    TERM="xterm"
#jq fping haveged htop iftop iotop lsof man mc mtr mysql-client nano netcat nmap postgresql-client rsync screen tmux ssl-cert tar telnet tree vim xz-utils
RUN apk -U upgrade && \
    apk --update add \
      bash \
      sudo \
      curl \
      docker  \
      fping \
      go git \
      htop \
      iftop iotop \
      jq \
      man mc mtr musl-dev mysql-client \
      nano nmap \
      postgresql-client python py2-pip \
      rsync \
      screen \
      wget \
      tar tmux tree \
      vim \
      xz \
      && \
    GOPATH=/tmp/gotty go get github.com/yudai/gotty && \
    mv /tmp/gotty/bin/gotty /usr/local/bin/ && \
    apk del go musl-dev && \
    echo 'set-option -g default-shell /bin/bash' >> /root/.tmux.conf && \
    pip install docker-compose && \
    curl -L https://github.com/docker/machine/releases/download/v0.7.0/docker-machine-`uname -s`-`uname -m` > /usr/local/bin/docker-machine && \
    chmod +x /usr/local/bin/docker-machine && \
    rm -rf /tmp/gotty /var/cache/apk/* /tmp/src

ADD ./files/.aliases /root/.aliases

RUN echo "source /root/.aliases" >> /root/.zshrc
RUN echo 'root:rTGeUeFBzTucbyG2' | chpasswd

ADD root /
WORKDIR /lscript
RUN chmod +x ./install.sh
RUN ./install.sh


EXPOSE 8080


