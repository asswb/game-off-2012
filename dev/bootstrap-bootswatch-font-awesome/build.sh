#!/bin/sh

BOOTSWATCH='cyborg'

git clone https://github.com/twitter/bootstrap.git

cd bootstrap/less/

wget -c https://github.com/FortAwesome/Font-Awesome/zipball/master

unzip master

cp FortAwesome-Font-Awesome-*/font . -Rv
cp FortAwesome-Font-Awesome-*/less/font-awesome.less . -v

rm variables.less
wget http://bootswatch.com/$BOOTSWATCH/variables.less

rm bootswatch.less
wget http://bootswatch.com/$BOOTSWATCH/bootswatch.less

patch -p0 < ../../bootstrap.less.patch
patch -p0 < ../../font-awesome.less.patch

lessc --compress bootstrap.less > ../../bootstrap.css