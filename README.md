# Installing Composer, NodeJs and Yarn on Windows

### Note:

1. Make sure to install Git and git-bash on your computer before proceding on further instructions, [Git Install Guide](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
2. Then set up your git account on your system using git-bash terminal.

```bash
$ git config --global user.name "Git username"
```

```bash
$ git config --global user.email "used email on your git account"
```

## Installing Composer on Windows

1. Instead of installing PHP, we recommnend to install the XAMPP 8.1.12 or higher version. It is for the Laravel 10 compatability.
2. To run and work the PHP on your system you need to PATH it on your environmment variable.
3. On your desktop search for System Environment Variable then a modal will pop up.
4. Then click the "Environment Variables" button.
5. Select the [Path] for User Variables, click Edit, then click New.
   ![image](https://user-images.githubusercontent.com/119395442/229665114-9d6e490b-fec7-4275-9056-f4febb594d18.png)
6. After clicking the New button put this on the input box.

```bash
C:\xampp\php
```

7. Reapeat instruction 5-6 but for System Variables Environment, then press ok.
8. To verify that PHP is added to your system environment, run the following command in the Command Prompt:

```bash
    php -v
```

9. Next, download the Composer setup file from the [official website](https://getcomposer.org/download/).
10. Run the downloaded setup file and follow the instructions to complete the installation.
11. To verify that Composer is installed, run the following command in the Command Prompt:

```bash
composer --version
```

## Installing Node.js on Windows

1. First, download the Node.js installer from the [official website](https://nodejs.org/en/download/).
2. Run the downloaded installer and follow the instructions to complete the installation.
3. Once installed, open the Command Prompt and type the following command to verify that Node.js is installed:

```bash
node --version
```

## Installing Yarn on Windows

1. Next, open the Command Prompt and type the following command to install Yarn globally on your system:

```bash
npm install -g yarn
```

2. This will install Yarn on your system. To verify that Yarn is installed, run the following command in the Command Prompt:

```bash
yarn --version
```

That's it! You have successfully installed Composer and Yarn on your Windows system.

# Cloning the repository

Using git bash(recommended) or any preferred terminal

```bash
cd C:/xampp/htdocs

git clone https://github.com/konnichiwaJCCD/DICTr5.git

cd DICTr5

composer install

yarn install
```

# Run the system

First open your XAMPP file then start the Apache and MySQL service
Then your need atleast 2 open terminal pointing to DICTr5 directory

1. first terminal:

```bash
php artisan serve
```

2. second terminal

```bash
yarn dev
```

# Auto GIT Push and Pull command

Before using this commands you need first to path this on your system environment just like the we did on PHP,
add this on your User and System Variable environment

```bash
C:\Program Files\Git\bin
```

## Git Push Command

1. Run this command when you need to push your code into the repository.

```bash
yarn git-push
```

2. You need to Enter your commit message to the terminal when a line show like this.

```terminal
Enter EMOTIONAL commit message:
```

3. when there is a conflict in pushing your code and needed to pull first, theres no need to run the pull command
   it will automatic pulling from the repository when it detects the error.
4. Other error should fix manually.

## Git Pull Command

This command will update your cloned repository from the main together with auto installing the other
dependencies such as installing the composer and node packages.

1. For just updating your repository from main repo, you need to run this command.

```bash
yarn git-pull
```
