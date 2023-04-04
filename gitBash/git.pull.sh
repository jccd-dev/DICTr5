#!/bin/bash

RED=$(tput setaf 1)
GREEN=$(tput setaf 2)
RESET=$(tput sgr0)

# make a Pull request to the remote repository
git pull origin dict

# Install dependencies packages using composer
composer install
# Notify that Composer installation is complete
echo " "
echo "${GREEN}-------------------------------------------${RESET}"
echo "Composer packages installation is complete."
echo "${GREEN}-------------------------------------------${RESET}"

# Install Yarn packages
yarn install
# Notify that Composer installation is complete
echo " "
echo "${GREEN}---------------------------------------${RESET}"
echo "Yarn packages installation is complete."
echo "${GREEN}---------------------------------------${RESET}"
