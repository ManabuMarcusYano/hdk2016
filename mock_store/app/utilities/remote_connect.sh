#!/bin/bash

hostname="mockstore.apb-shd-402.a4c.jp"
username="root"
hostdir="~/../home/cj0054/www/$1"

# サーバー転送
echo "サーバーに接続します"

ssh -l $username $hostname