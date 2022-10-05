# Selenium tests with PHP

## Installation

You need to have installed:
  * PHP >= 7.4
  * php-zip
  * php-curl
  * composer: https://getcomposer.org/download/
  * geckodriver: https://github.com/mozilla/geckodriver/releases

Main reference is the website https://github.com/php-webdriver/php-webdriver

## General procedure

Start webapp in port 8000 in an independent shell:

    $ cd src
    $ php -S 0.0.0.0:8000

Start geckodriver (by default listens in port 4444) in another shell:

    $ geckodriver

Start Selenium tests (in a 3rd shell):

    $ php test1.php
