#!/bin/bash

read -p "Enter name used in github: " name
read -p "Enter email used in github: " email

git --global user.name "$name"
git --global user.email "$email"

git clone https://github.com/konnichiwaJCCD/DICTr5.git

composer install

yarn install

