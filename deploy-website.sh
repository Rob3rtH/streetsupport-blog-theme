#!/bin/bash

# If there are any errors, fail Travis
set -e

echo "*** Beginning Deployment ***"

# gulp deploy

mkdir _dist

echo "- copying php files"
for f in *.php
do
  cp $f _dist/{$f}
done

echo "- copying css files"
for f in *.css
do
  cp $f _dist/{$f}
done

echo "- copying required directories"
declare -A REQ_DIRS
REQ_DIRS[0]="images"
REQ_DIRS[1]="inc"
REQ_DIRS[2]="js"
REQ_DIRS[3]="languages"
REQ_DIRS[4]="layouts"
REQ_DIRS[5]="template-parts"

for dir in "${REQ_DIRS[@]}"
do
  cp -r $dir _dist
done

echo "- uploading files"
cd _dist 

curl --ftp-create-dirs -T ./style.css -u $FTP_USER:$FTP_PASS $FTP_HOST/opt/bitnami/apps/wordpress/htdocs/wp-content/themes/ssnblog/$f

echo "*** Finished Deployment ***"