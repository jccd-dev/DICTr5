#!/bin/bash

# make a Pull request to the remote repository
git pull origin dict

# Install dependencies packages using composer
composer install
# Notify that Composer installation is complete
echo " "
echo "-------------------------------------------"
echo "Composer packages installation is complete."
echo "-------------------------------------------"

# Install Yarn packages
yarn install
# Notify that Composer installation is complete
echo " "
echo "---------------------------------------"
echo "Yarn packages installation is complete."
echo "---------------------------------------"
