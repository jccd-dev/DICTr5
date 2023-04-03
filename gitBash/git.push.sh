#!/bin/bash

# Prompt the user for a commit message
read -p "Enter EMOTIONAL commit message: " message

# Commit the changes with the provided commit message
git commit -m "$message"

# Add all changes to the staging area
git add -A

# Attempt to push the changes to the remote repository
if git push -u origin dict; then
  echo " "
  echo "\e[31m----------------------------"
  echo "Push successful."
  echo "\e[31m----------------------------"
  echo " "
else
  # If the push failed, perform a git pull to update the local repository
  echo " "
  echo "\e[31m--------------------------------------------------------------------"
  echo "Push failed. Performing a git pull to update the local repository..."
  echo "\e[31m--------------------------------------------------------------------"
  echo " "
  git pull origin dict

  echo " "
  # Attempt to push the changes to the remote repository again
  if git push -u origin dict; then
    echo "\e[31m------------------------------------------"
    echo "Push successful after resolving conflicts."
    echo "------------------------------------------"
  else
    echo "\e[31m-----------------------------------------------"
    echo "Push failed. Please resolve conflicts manually."
    echo "-----------------------------------------------"
  fi
fi
