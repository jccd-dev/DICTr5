#!/bin/bash
RED=$(tput setaf 1)
GREEN=$(tput setaf 2)
RESET=$(tput sgr0)


# Add all changes to the staging area
git add -A
echo " "
# Prompt the user for a commit message
# shellcheck disable=SC2162
read -pe "Enter ${GREEN}MEANINGFUL${RESET} commit message${RED}:${RESET} " message
# Commit the changes with the provided commit message
git commit -m "$message"



