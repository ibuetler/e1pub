FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Add the files (static web and node app)
ADD root /


# ===================================================================
# Install nginx
RUN echo "http://dl-4.alpinelinux.org/alpine/v3.6/main/" >> /etc/apk/repositories && \
    apk add --update nginx=1.12.1-r0 && \
    rm -rf /var/cache/apk/* && \
    chown -R nginx:www-data /var/lib/nginx

# ===================================================================
# Install node
ENV NODE_VERSION=v6.11.2 NPM_VERSION=3

RUN apk upgrade --update && \
    apk add --update git curl sudo make gcc g++ python linux-headers libgcc libstdc++ && \
    curl -sSL https://nodejs.org/dist/${NODE_VERSION}/node-${NODE_VERSION}.tar.gz | tar -xz && \
    cd /node-${NODE_VERSION} && \
    ./configure --prefix=/usr --without-snapshot && \
    make -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    make install && \
    cd / && \
    npm install -g npm@${NPM_VERSION}

WORKDIR /usr/node
RUN npm install -g pm2 http url path

# ===================================================================


# Expose the ports for nginx
EXPOSE 80
