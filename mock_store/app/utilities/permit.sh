#!/bin/bash

chmod 777 -R app/storage
chmod 705 -R public/img
chmod 705 -R public/js
chmod 705 -R public/lib
chmod 705 -R public/css
php composer.phar dump-autoload