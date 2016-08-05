#!/usr/bin/env bash

#update and install all necessary programs

add-apt-repository ppa:ondrej/php
apt-get install -y language-pack-en-base
LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php

apt-get update
apt-get install -y apache2
apt-get install -y git-all

apt-get install -y php7.0
apt-get install -y php7.0-xml

ln -fs /vagrant /var/www/vfilesystem-demo

curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

exit