#!/bin/bash

# Prompt the user for a commit message
read -p "Enter commit message: " message

# Add all changes to the staging area
git add -A

# Commit the changes with the provided commit message
git commit -m "$message"

# Push the changes to the remote repository
git push -u origin
