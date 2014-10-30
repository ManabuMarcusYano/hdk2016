#!/bin/bash

# $1 development, staging, production
# $2 up, down

if [ $1 != "production" -a $1 != "staging" -a $1 != "development" ]; then
	echo "Illegal envirnment setting!!"
	exit 0
fi

if [ $2 != "up" -a $2 != "down" ]; then
	echo "Illegal envirnment setting!!"
	exit 0
fi

hostname="mockstore.apb-shd-402.a4c.jp"
username="root"
dir="~/../home/cj0054/www/$1"

echo "$1 サーバーに対しphp artisan $2します"

ssh -l $username $hostname "pwd; cd $dir; php artisan $2; exit;"