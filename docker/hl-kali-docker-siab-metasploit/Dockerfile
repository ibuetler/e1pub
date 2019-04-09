FROM hackinglab/hl-kali-docker-base

#######################################################################################
RUN echo "deb http://http.kali.org/kali kali-rolling main contrib non-free" > /etc/apt/sources.list && \
    echo "deb-src http://http.kali.org/kali kali-rolling main contrib non-free" >> /etc/apt/sources.list

RUN apt-get -y install apt-transport-https ca-certificates curl gnupg2 sudo &&\
    apt-key adv --fetch-keys https://kookarai.hacking-lab.com/kookarai.gpg  &&\
    echo "deb [arch=amd64] https://kookarai.hacking-lab.com/ kookarai main" >> /etc/apt/sources.list.d/kookarai.list

ENV DEBIAN_FRONTEND noninteractive
RUN set -x \
    && apt-get -yqq update \
    && apt-get -yqq upgrade \
    && apt-get -yqq dist-upgrade \
    && apt-get clean

#######################################################################################
ADD files /

# add our user and group first to make sure their IDs get assigned consistently, regardless of whatever dependencies get added
RUN groupadd -r shellinabox && useradd -r -g shellinabox shellinabox &&\
    groupadd -r hacker && useradd -r -m -g hacker hacker -s /bin/bash &&\
    chown -R shellinabox:shellinabox /siab &&\
    chown -R hacker:hacker /home/hacker &&\
    adduser hacker sudo &&\
    apt-get update && DEBIAN_FRONTEND=noninteractive apt-get -y install shellinabox ssh sudo nmap socat netcat tshark net-tools strace metasploit-framework &&\
    chmod 600 /siab/shellinabox_services &&\
    chmod +x /siab/docker-entrypoint.sh /siab/docker-command.sh &&\
    echo 'hacker:compass' | chpasswd

EXPOSE 4200
WORKDIR "/siab"
ENTRYPOINT ["/siab/docker-entrypoint.sh"]
#CMD ["bash"]
CMD ["/siab/docker-command.sh"]
