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