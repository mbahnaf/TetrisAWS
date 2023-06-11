#!/bin/bash
if ! [ -x "$(command -v httpd)" ]; then 
yum install -y httpd >&2
fi # install apache if not already installed

yum install -y git php php-mysqlnd mariadb105 mariadb105-server