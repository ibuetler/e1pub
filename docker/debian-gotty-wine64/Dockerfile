FROM debian:stretch-slim

RUN apt-get update && apt-get upgrade
RUN dpkg --add-architecture i386
RUN apt-get update && apt-get upgrade

RUN apt-get update \
	&& apt-get install -y --no-install-recommends \
		wine64 \
		wine32 \
		wine \
		net-tools \
		lsof \
		curl \
		bash \
&& rm -rf /var/lib/apt/lists/*

Add s6 overlay (https://github.com/just-containers/s6-overlay)
ADD https://github.com/just-containers/s6-overlay/releases/download/v1.14.0.0/s6-overlay-amd64.tar.gz /tmp/s6-overlay.tar.gz
RUN tar xvfz /tmp/s6-overlay.tar.gz -C /

# https://github.com/yudai/gotty/releases/download/v1.0.0/gotty_linux_amd64.tar.gz

RUN VERSION=v1.0.0 && \
    curl -sLk https://github.com/yudai/gotty/releases/download/$VERSION/gotty_linux_amd64.tar.gz \
    | tar xzC /usr/local/bin

ENTRYPOINT ["/usr/local/bin/gotty"]

# tar is being extracted automatically by docker
ADD wine.tar /

CMD ["--permit-write","--reconnect","/usr/bin/wine64", "cmd.exe"]


