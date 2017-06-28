#!/usr/bin/env bash

service ssh start
/usr/local/bin/update_and_run_gateone --log_file_prefix=/gateone/logs/gateone.log
tail -f /dev/null