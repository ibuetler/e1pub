#!/bin/bash

set -e

echo "Preparing container .."
COMMAND="/opt/applic/httpd/bin/apachectl -k start -D FOREGROUND"

if [ "$REVERSEPROXY" != "none" ]; then
	set +e
	grep ServerName /opt/applic/httpd/conf/httpd.conf
	perl -p -i -e "s/#ServerName landingpage:80/ServerName $REVERSEPROXY:80/g" /opt/applic/httpd/conf/httpd.conf
	perl -p -i -e "s/REVERSEPROXY/$REVERSEPROXY/g" /opt/applic/httpd/conf/httpd.conf
	grep ServerName /opt/applic/httpd/conf/httpd.conf
	set -e
fi

if [ "$BACKEND" != "none" ]; then
        set +e
        grep ServerName /opt/applic/httpd/conf/httpd.conf
        perl -p -i -e "s/BACKEND/$BACKEND/g" /opt/applic/httpd/conf/httpd.conf
        grep ServerName /opt/applic/httpd/conf/httpd.conf
        set -e
fi



echo "Starting container .."
if [ "$@" = "apache" ]; then
	echo "Executing: ${COMMAND}"
	exec ${COMMAND}
else
	echo "Not executing: ${COMMAND}"
	echo "Executing: ${@}"
	exec $@
fi

echo "Remove PID to make it restart-able afterwards .."
rm /opt/applic/httpd/var/80.pid


