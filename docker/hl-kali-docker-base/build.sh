#!/bin/bash

# Install dependencies (debbootstrap)
sudo apt-get install -yqq debootstrap curl

# -----------------------------------------------------------------------------
# BUILD/LABEL VARIABLES
# -----------------------------------------------------------------------------
BUILD_DATE=$(date -u +"%Y-%m-%dT%H:%M:%SZ")
VERSION="latest"

# Fetch the latest Kali debootstrap script from git
sudo debootstrap kali-rolling ./hl-kali-root &&\
sed -i 's/kali-rolling/hl-kali-rolling/g' ./hl-kali-root/etc/debian_version &&\
sudo tar -C hl-kali-root -c . | sudo docker import - hackinglab/hl-kali-docker-base &&\
docker images &&\
TAG=$(sudo docker run -t -i hackinglab/hl-kali-docker-base awk '{print $NF}' /etc/debian_version | sed 's/\r$//' ) &&\
echo "Tagging Hacking-Lab kali with $TAG" &&\
sudo docker tag hackinglab/hl-kali-docker-base:$VERSION hackinglab/hl-kali-docker-base:$TAG &&\
docker images &&\
echo "Build OK" || echo "Build failed!"
rm -rf ./hl-kali-root
