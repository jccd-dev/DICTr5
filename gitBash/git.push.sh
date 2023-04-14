#!/bin/bash
RED=$(tput setaf 1)
GREEN=$(tput setaf 2)
RESET=$(tput sgr0)


# Add all changes to the staging area
git add -A
echo " "
# Prompt the user for a commit message
# shellcheck disable=SC2162
read -p "Enter ${GREEN}EMOTIONAL${RESET} commit message${RED}:${RESET} " message
# Commit the changes with the provided commit message
git commit -m "$message"


# Attempt to push the changes to the remote repository
if git push -u origin dict; then
  echo " "
  echo "${GREEN}----------------------------${RESET}"
  echo "Push successful."
  echo "${GREEN}----------------------------${RESET}"
  echo " "
else
  # If the push failed, perform a git pull to update the local repository
  echo " "
  echo "${RED}--------------------------------------------------------------------${RESET}"
  echo "Push failed. Performing a git pull to update the local repository..."
  echo "${RED}--------------------------------------------------------------------${RESET}"
  echo " "

  git pull origin dict
  echo " "
    echo "${GREEN}--------------------------------------------------------------------${RESET}"
    echo "Pull success, Begin to install other dependencies"
    echo "${GREEN}--------------------------------------------------------------------${RESET}"
    echo " "
  echo " "
  yarn install
  echo " "
      echo "${GREEN}--------------------------------------------------------------------${RESET}"
      echo "yarn dependencies installed"
      echo "${GREEN}--------------------------------------------------------------------${RESET}"
  echo " "
  composer install
  echo " "
      echo "${GREEN}--------------------------------------------------------------------${RESET}"
      echo "composer dependencies installed"
      echo "${GREEN}--------------------------------------------------------------------${RESET}"
  echo " "
  # Attempt to push the changes to the remote repository again
  if git push -u origin dict; then
    echo "${GREEN}------------------------------------------${RESET}"
    echo "Push successful after resolving conflicts."
    echo "${GREEN}------------------------------------------${RESET}"
  else
    echo "${RED}-----------------------------------------------${RESET}"
    echo "Push failed. Please resolve conflicts manually."
    echo "${RED}-----------------------------------------------${RESET}"
  fi
fi
