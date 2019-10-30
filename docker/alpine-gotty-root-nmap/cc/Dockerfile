FROM alpine:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Add s6-overlay
ENV S6_OVERLAY_VERSION=v1.21.4.0 \
    GO_DNSMASQ_VERSION=1.0.7 \
    LC_ALL="en_US.UTF-8" \
    LANGUAGE="en_US.UTF-8" \
    TERM="xterm"

# ALPINE BASE
RUN apk add --update --no-cache bind-tools curl libcap bash net-tools 
RUN apk upgrade --available
RUN curl -sSL https://github.com/just-containers/s6-overlay/releases/download/${S6_OVERLAY_VERSION}/s6-overlay-amd64.tar.gz | tar xfz - -C / 
RUN echo "========="
RUN curl -sSL https://github.com/janeczku/go-dnsmasq/releases/download/${GO_DNSMASQ_VERSION}/go-dnsmasq-min_linux-amd64 -o /bin/go-dnsmasq && \
    chmod +x /bin/go-dnsmasq && \
    apk del curl && \
    # create user and give binary permissions to bind to lower port
    addgroup go-dnsmasq && \
    adduser -D -g "" -s /bin/sh -G go-dnsmasq go-dnsmasq && \
    setcap CAP_NET_BIND_SERVICE=+eip /bin/go-dnsmasq

# ALPINE APP
RUN apk -U upgrade && \
    apk --update add \
      bash \
      sudo \
      curl \
      fping \
      go git \
      htop \
      iftop iotop \
      jq \
      man mc mtr musl-dev \
      nano nmap \
      python py2-pip \
      rsync \
      screen \
      wget \
      tar tmux tree \
      vim \
      xz \
      zsh \
      && \
    GOPATH=/tmp/gotty go get github.com/yudai/gotty && \
    mv /tmp/gotty/bin/gotty /usr/local/bin/ && \
    apk del go musl-dev && \
    git clone git://github.com/robbyrussell/oh-my-zsh.git ~/.oh-my-zsh && \
    cp ~/.oh-my-zsh/templates/zshrc.zsh-template ~/.zshrc && \
    sed -E -i \
      -e 's/plugins\=.+/plugins=(colored-man-pages colorize cp docker docker-compose)/' \
      -e 's/ZSH_THEME\=.+/ZSH_THEME="timhaak"/' \
      /root/.zshrc && \
    echo 'set-option -g default-shell /bin/zsh' >> /root/.tmux.conf && \
    rm -rf /tmp/gotty /var/cache/apk/* /tmp/src

ADD ./files/timhaak.zsh-theme /root/.oh-my-zsh/themes/timhaak.zsh-theme
ADD ./files/.aliases /root/.aliases

RUN echo "source /root/.aliases" >> /root/.zshrc
RUN echo 'root:GSXSlQ8QTfuhc.hzp' | chpasswd

ADD root /


EXPOSE 8080

ENTRYPOINT ["/init"]
CMD []

