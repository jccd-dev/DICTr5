#!/bin/bash

# Prompt the user for a commit message
read -p "Enter EMOTIONAL commit message: " message

# Add all changes to the staging area
git add -A

# Commit the changes with the provided commit message
git commit -m "$message"

# Attempt to push the changes to the remote repository
if git push -u origin dict; then
  echo " "
  echo "----------------------------"
  echo "Push successful."
  echo "----------------------------"
  echo " "
else
  # If the push failed, perform a git pull to update the local repository
  echo " "
  echo "--------------------------------------------------------------------"
  echo "Push failed. Performing a git pull to update the local repository..."
  echo "--------------------------------------------------------------------"
  echo " "
  git pull origin dict

  echo " "
  # Attempt to push the changes to the remote repository again
  if git push -u origin dict; then
    echo "------------------------------------------"
    echo "Push successful after resolving conflicts."
    echo "------------------------------------------"
  else
    echo "-----------------------------------------------"
    echo "Push failed. Please resolve conflicts manually."
    echo "-----------------------------------------------"
  fi
fi
