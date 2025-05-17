#!/bin/bash

set -e

deploydir=$(realpath "$1")
cwd=$(pwd)

echo "FIND"
find $deploydir

helpanddie() {
	echo "$0: ./deploy.sh <some_empty_directory>"
	exit 1;
}

if [ ! -d $deploydir ]; then
	echo "no directory specified"
	helpanddie
fi

if  [ "$( ls -A $deploydir )" ]; then
	echo "directory not empty"
	helpanddie
fi


# Install CGI
mkdir "$deploydir/cgi-bin"
cd "$cwd/src"
make
cp mehinfo "$deploydir/cgi-bin"

cd "$cwd"


# Install Other
cp -r index.html index.js main.css device.js img vendor "$deploydir"

# Download vendor CSS and fonts
cd "$deploydir/vendor"
./getfonts.sh
rm getfonts.sh

echo "Should be good to go."


