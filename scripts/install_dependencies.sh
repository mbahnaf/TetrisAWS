#!/bin/bash
if ! [ -x "$(command -v httpd)" ]; then 
yum install -y httpd >&2
fi # install apache if not already installed
# install git php and mariadb
yum install -y git php php-mysqlnd mariadb105 mariadb105-server

# install codedeploy-agent
sudo yum install ruby wget
CODEDEPLOY_BIN="/opt/codedeploy-agent/bin/codedeploy-agent"
$CODEDEPLOY_BIN stop
yum erase codedeploy-agent -y
cd /home/ec2-user
wget https://aws-codedeploy-eu-west-3.s3.eu-west-3.amazonaws.com/latest/install
chmod +x ./install
sudo ./install auto
