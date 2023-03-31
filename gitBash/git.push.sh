#!/bin/bash

# Prompt the user for a commit message
read -p "Enter EMOTIONAL commit message: " message

# Add all changes to the staging area
git add -A

# Commit the changes with the provided commit message
git commit -m "$message"

# Attempt to push the changes to the remote repository
if git push -u origin dict; then
  echo "Push successful."
else
  # If the push failed, perform a git pull to update the local repository
  echo "Push failed. Performing a git pull to update the local repository..."
  git pull origin dict

  # Attempt to push the changes to the remote repository again
  if git push -u origin dict; then
    echo "Push successful after resolving conflicts."
  else
    echo "Push failed. Please resolve conflicts manually."
  fi
fi
