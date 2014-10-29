#!/bin/bash

# $1 development, staging, production

if [ $1 != "production" -a $1 != "staging" -a $1 != "development" ]; then
	echo "Illegal envirnment setting!!"
	exit 0
fi


DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd "${DIR}"
PROJ_ROOT="$DIR/../../"
cd $DIR/../config/
cp -f database_$1.php database.php

cd $PROJ_ROOT
BRANCH=$(git rev-parse --abbrev-ref HEAD)
LOG=$(git log -n 1)
LOG_PATH=$DIR/git_status.txt

# ログ生成
rm -f $LOG_PATH
echo "Commit : "$LOG >> $LOG_PATH
echo "Branch : "$BRANCH >> $LOG_PATH

hostname="mockstore.apb-shd-402.a4c.jp"
username="root"
hostdir="~/../home/cj0054/www/$1"

# サーバー転送
echo "$1 サーバーに対し $BRANCH からデプロイします"
rsync -auvz --exclude='.DS_Store' --exclude='public/image_mock/' --exclude='app/utilities/*.sh' --exclude='.git' . $username@$hostname:$hostdir

echo "リモートへ転送しました。パーミッションの設定を行います。"

# sshへのコマンド
COMMAND="
pwd;
cd $hostdir;
chmod 777 -R app/storage;
chmod 705 -R public/img;
chmod 705 -R public/js;
chmod 705 -R public/lib;
chmod 705 -R public/css; 
php composer.phar dump-autoload;
cd ../;
chown -R apache:apache $1/;
"
ssh -l $username $hostname $COMMAND