FROM hackinglab/alpine-base

ENV SIAB_USERCSS="Normal:+/etc/shellinabox/options-enabled/00_White-On-Black.css,Reverse:-/etc/shellinabox/options-enabled/00+Black-on-White.css;Colors:+/etc/shellinabox/options-enabled/01+Color-Terminal.css,Monochrome:-/etc/shellinabox/options-enabled/01_Monochrome.css" \
  SIAB_PORT=4200 \
  SIAB_ADDUSER=true \
  SIAB_USER=hacker \
  SIAB_USERID=1337 \
  SIAB_GROUP=hacker \
  SIAB_GROUPID=1337 \
  SIAB_PASSWORD=compass \
  SIAB_SHELL=/bin/bash \
  SIAB_HOME=/home/hacker \
  SIAB_SUDO=false \
  SIAB_SSL=true \
  SIAB_SERVICE=/:LOGIN \
  SIAB_PKGS=none \
  SIAB_SCRIPT=none

# ENV SIAB_USERCSS="Normal:+/etc/shellinabox/options-enabled/00+Black-on-White.css,Reverse:-/etc/shellinabox/options-enabled/00_White-On-Black.css;Colors:+/etc/shellinabox/options-enabled/01+Color-Terminal.css,Monochrome:-/etc/shellinabox/options-enabled/01_Monochrome.css"

ADD files/shellinabox.tar.gz /
ADD files/user-css.tar.gz /
COPY root/ /


RUN apk add --update bash openssl curl openssh-client sudo && rm -rf /var/cache/apk/* 
RUN adduser -D -H -h /home/shellinabox shellinabox 
RUN mkdir /var/lib/shellinabox

# RUN ln -sf '/etc/shellinabox/options-enabled/00+Black on White.css' /etc/shellinabox/options-enabled/00+Black-on-White.css
# RUN ln -sf '/etc/shellinabox/options-enabled/00_White On Black.css' /etc/shellinabox/options-enabled/00_White-On-Black.css 
# RUN ln -sf '/etc/shellinabox/options-enabled/01+Color Terminal.css' /etc/shellinabox/options-enabled/01+Color-Terminal.css


EXPOSE 4200

# VOLUME /etc/shellinabox /var/log/supervisor /home

ADD files/entrypoint.sh /

ENTRYPOINT ["/entrypoint.sh"]
CMD ["shellinabox"]


