FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

ENV NODE_VERSION=v8.15.0 NPM_VERSION=6

RUN addgroup node && \
    adduser -D -g "" -s /bin/sh -G node node && \
    apk upgrade --update && \
    apk add --update git curl make gcc g++ python linux-headers libgcc libstdc++ && \
    curl -sSL https://nodejs.org/dist/${NODE_VERSION}/node-${NODE_VERSION}.tar.gz | tar -xz && \
    cd /node-${NODE_VERSION} && \
    ./configure --prefix=/usr --without-snapshot && \
    make -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    make install && \
    cd / && \
    npm install -g npm@${NPM_VERSION}

# Compile tty.js
RUN mkdir /app
RUN cd /app; npm update; npm install tty.js
RUN find / -name tty.js 
RUN find / -name tty.js -exec md5sum {} \;
COPY tty.js /app/

# Cleanup Tasks
RUN apk add sudo && \
    apk del gcc g++ linux-headers && \
    rm -rf /etc/ssl /node-${NODE_VERSION} /usr/include \
    /usr/share/man /tmp/* /var/cache/apk/* /root/.npm /root/.node-gyp \
    /usr/lib/node_modules/npm/man /usr/lib/node_modules/npm/doc /usr/lib/node_modules/npm/html

# Add the files
ADD root /

