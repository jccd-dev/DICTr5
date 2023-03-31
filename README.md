# Installing Composer and Yarn on Windows 11

## Installing Composer on Windows 11

1. First, download and install PHP on your system. You can download the latest version of PHP for Windows from the [official website](https://windows.php.net/download/).

2. Next, download the Composer setup file from the [official website](https://getcomposer.org/download/).

3. Run the downloaded setup file and follow the instructions to complete the installation.

4. Once installed, open the Command Prompt and navigate to the directory where you want to install your PHP project.

5. Type the following command to install Composer globally on your system: php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"


6. Then type: php composer-setup.php


7. This will install Composer in the current directory. To install it globally, move the `composer.phar` file to a directory that is included in your system's PATH environment variable.

8. To verify that Composer is installed, run the following command in the Command Prompt: composer --version


## Installing Yarn on Windows 11

1. First, download and install Node.js on your system. You can download the latest version of Node.js for Windows from the [official website](https://nodejs.org/en/download/).

2. Next, open the Command Prompt and type the following command to install Yarn globally on your system: npm install -g yarn


3. This will install Yarn on your system. To verify that Yarn is installed, run the following command in the Command Prompt: yarn --version


That's it! You have successfully installed Composer and Yarn on your Windows 11 system.
