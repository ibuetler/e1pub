#!/bin/bash

if [ -z "$1" ]
  then
    echo "usage ./dockertag.sh <image>"
  else
    echo "searching tags for: $1"
    echo "======================"
    wget -q https://registry.hub.docker.com/v1/repositories/$1/tags -O -  | sed -e 's/[][]//g' -e 's/"//g' -e 's/ //g' | tr '}' '\n'  | awk -F: '{print $3}'
fi

