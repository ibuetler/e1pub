#!/bin/bash

mkdir -p /var/run/sshd

echo "hacker:compass" | chpasswd
echo "root:toor" | chpasswd
chown -R root:root /root
chown -R hacker:hacker /home/hacker

#rm /usr/lib/noVNC/vnc_auto.html 
#sudo -u hacker vncserver -SecurityTypes None,TLSNone
#sudo -u hacker vncserver -kill :1
#sed -i -e 's/twm/startlxde/g' /home/hacker/.vnc/xstartup

#sudo -u hacker vncserver -SecurityTypes None,TLSNone
sudo -u hacker vncserver

cd /usr/lib/web && ./run.py > /var/log/web.log 2>&1 &
nginx -c /etc/nginx/nginx.conf

exec /bin/tini -- /usr/bin/supervisord -n
