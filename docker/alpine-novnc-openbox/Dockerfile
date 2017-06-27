FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Set correct environment variables.
ENV HOME=/root
ENV PORT=8080
ENV DISPLAYSIZE=${XDISPLAY_WIDTH}"x"${XDISPLAY_WIDTH}"x"${XDISPLAY_DEPTH}
ENV DEBIAN_FRONTEND=noninteractive

ENV LC_ALL=en.UTF-8
ENV LANG=en.UTF-8
ENV LANGUAGE=${LANG}
ENV TZ=Europe/Zurich

RUN echo "http://dl-3.alpinelinux.org/alpine/edge/testing" >> /etc/apk/repositories 
RUN apk update
RUN apk upgrade
RUN apk --update add tzdata --no-cache && \
    cp /usr/share/zoneinfo/${TZ} /etc/localtime && echo $TZ > /etc/timezone && \
    apk del tzdata && \
    # Installing apps and clean up.
    PACKAGE="wget ca-certificates git bash python xvfb x11vnc firefox-esr dbus xvfb openbox xfce4-terminal net-tools socat supervisor xterm font-adobe-100dpi openjdk7-jre font-misc-misc font-dec-misc font-cronyx-cyrillic font-misc-cyrillic font-screen-cyrillic font-winitzki-cyrillic font-bh-lucidatypewriter-100dpi font-bh-lucidatypewriter-75dpi" && \
    apk update upgrade --no-cache && apk add --no-cache ${PACKAGE} && \
    # noVNC download
    git clone https://github.com/kanaka/noVNC.git /opt/noVNC && \
    git clone https://github.com/kanaka/websockify /opt/websockify && \
    ln -sf /opt/websockify /opt/noVNC/utils/websockify && \
    ln -s /opt/noVNC/vnc.html /opt/noVNC/index.html && \
    rm -rf /opt/noVNC/.git && \
    rm -rf /opt/websockify/.git

RUN addgroup alpine \
&& adduser  -G alpine -s /bin/sh -D alpine \
&& echo "alpine:alpine" | /usr/sbin/chpasswd \
&& rm -rf /apk /tmp/* /var/cache/apk/*

RUN mkdir /app
ADD etc /etc
ADD ZAP_2.6.0/ /app/
WORKDIR /home/alpine


# chromium browser
#RUN apt-get install -y chromium-browser
#RUN sed -i -- "s/ps -p/ps -o pid | grep/g" /opt/noVNC/utils/launch.sh

# Configure & run supervisor
EXPOSE ${PORT} 6000
COPY novnc.conf /etc/supervisor/conf.d/novnc.conf
ENTRYPOINT ["/init"]
#ENTRYPOINT ["render","/etc/supervisor/conf.d/novnc.conf","--","switch","shell=/bin/bash","--","/init"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/novnc.conf"]
