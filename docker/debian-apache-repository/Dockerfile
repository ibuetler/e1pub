FROM debian:stretch-slim

RUN apt-get update -y && apt-get upgrade -y

# BASE DEBIAN
RUN apt-get install -y --no-install-recommends \
		net-tools \
		lsof \
		curl \
		bash \
		procps 

# Add s6 overlay (https://github.com/just-containers/s6-overlay)
ADD https://github.com/just-containers/s6-overlay/releases/download/v1.21.8.0/s6-overlay-amd64.tar.gz /tmp/s6-overlay.tar.gz
RUN tar xvfz /tmp/s6-overlay.tar.gz -C /

# Apache and Debian Repo Software
RUN apt-get install -y apache2 \
		reprepro \
		&& rm -rf /var/lib/apt/lists/*

COPY root /

ENTRYPOINT ["/init"]
CMD []
