FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

ENV NODE_VERSION=v6.10.0 NPM_VERSION=3

RUN apk upgrade --update && \
    apk add --update git curl sudo make gcc g++ python linux-headers libgcc libstdc++ && \
    curl -sSL https://nodejs.org/dist/${NODE_VERSION}/node-${NODE_VERSION}.tar.gz | tar -xz && \
    cd /node-${NODE_VERSION} && \
    ./configure --prefix=/usr --without-snapshot && \
    make -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    make install && \
    cd / && \
    npm install -g npm@${NPM_VERSION} 

#    rm -rf /etc/ssl /node-${NODE_VERSION} /usr/include \
#    /usr/share/man /tmp/* /var/cache/apk/* /root/.npm /root/.node-gyp \
#    /usr/lib/node_modules/npm/man /usr/lib/node_modules/npm/doc /usr/lib/node_modules/npm/html


ADD root /
RUN cd /app/; npm update; npm install tty.js
COPY tty.js /app/


# cd /tty.js && node ./tty-me.js --daemonize
