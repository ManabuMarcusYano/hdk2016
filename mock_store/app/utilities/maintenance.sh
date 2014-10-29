#!/bin/bash

# $1 development, staging, production
# $2 up, down

hostname="mockstore.apb-shd-402.a4c.jp"
username="root"
dir="~/../home/cj0054/www/$1"

echo "$1サーバーに対しphp artisan $2します"

ssh -l $username $hostname "pwd; cd $dir; php artisan $2; exit;"