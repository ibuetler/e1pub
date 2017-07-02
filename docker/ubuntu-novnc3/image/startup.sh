#!/bin/bash

mkdir -p /var/run/sshd

echo "hacker:compass" | chpasswd
echo "root:toor" | chpasswd
chown -R root:root /root
chown -R hacker:hacker /home/hacker

#mkdir -p /root/.config/pcmanfm/LXDE/
#cp /usr/share/doro-lxde-wallpapers/desktop-items-0.conf /root/.config/pcmanfm/LXDE/

rm /usr/lib/noVNC/vnc_auto.html
cd /usr/lib/noVNC/
git pull

cd /usr/lib/web && ./run.py > /var/log/web.log 2>&1 &
nginx -c /etc/nginx/nginx.conf
exec /bin/tini -- /usr/bin/supervisord -n
