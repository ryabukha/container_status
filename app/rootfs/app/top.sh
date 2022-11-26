#!/usr/bin/env bash

container_name=$1
sort_param=${2:-"cpu"}

sh -c "docker container top $container_name -aeo pid,comm,args --sort -%$sort_param | head -4"
