#!/bin/bash

mkdir -p /var/run/sshd

mkdir -p /home/hacker/Desktop
mkdir -p /home/hacker/Downloads
ln -s /home/hacker/Downloads /home/hacker/Desktop/Downloads

echo "hacker:compass" | chpasswd
echo "root:toor" | chpasswd
chown -R root:root /root
chown -R hacker:hacker /home/hacker

rm /usr/lib/noVNC/vnc_auto.html 

cd /usr/lib/web && ./run.py > /var/log/web.log 2>&1 &
nginx -c /etc/nginx/nginx.conf
exec /bin/tini -- /usr/bin/supervisord -n
