#!/bin/sh

# run from <ezp5-root>

# pre-requisite:
#
# cd src
# git clone https://github.com/dfritschy/cjw-cookbook.git CjwNetwork

CURRENT_DIR=`pwd`
SRC_DIR="src/CjwNetwork"

# Test whether command-line argument is present (non-empty).
if [ -n "$1" ]
then
  step=$1
else
  echo "Enter Step v0.1 ... v1.0: "
  read step
fi

# checkout requested step (identified by tag)
cd ${SRC_DIR}
git checkout $step

# clear caches
cd ${CURRENT_DIR}
php ezpublish/console cache:clear





