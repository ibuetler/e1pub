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

RUN apt-get -yqq install cmake g++ pkg-config git vim-common libwebsockets-dev libjson-c-dev libssl-dev net-tools nmap socat &&\
    git clone https://github.com/tsl0922/ttyd.git &&\
    cd ttyd && mkdir build && cd build &&\
    cmake .. && make && make install

# add our user and group first to make sure their IDs get assigned consistently, regardless of whatever dependencies get added
RUN groupadd -r hacker && useradd -r -m -g hacker hacker -s /bin/bash &&\
    chown -R hacker:hacker /home/hacker &&\
    adduser hacker sudo &&\
    echo 'hacker:compass' | chpasswd

EXPOSE 7681
#WORKDIR "/"
ENTRYPOINT ["ttyd"]
CMD ["bash"]
