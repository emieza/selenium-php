# Selenium tests with PHP


## Installation

You need to have installed:
  * PHP >= 7.4
  * Extra PHP packages: php-zip, php-curl, php-dom, php-mbstring
  * composer: https://getcomposer.org/download/
  * geckodriver: https://github.com/mozilla/geckodriver/releases

References:
  * Selenium PHP Driver: https://github.com/php-webdriver/php-webdriver
  * Example: https://github.com/php-webdriver/php-webdriver/blob/main/example.php
  * Doc: https://github.com/php-webdriver/php-webdriver/wiki/Example-command-reference
  * PHPunit + selenium: https://jakobbr.eu/2020/10/24/adventures-with-phpunit-geckodriver-and-selenium/


## General procedure

Install dependencies:

    $ sudo apt install php-curl php-mbstring php-xml

Install composer from here: https://getcomposer.org/download/

Clone repo and download packages:

    $ git clone https://github.com/emieza/selenium-php
    $ cd selenium-php
    $ composer install

### Shell 1: web server
Start webapp in port 8000 in an independent shell:

    $ cd src
    $ php -S 0.0.0.0:8000

### Shell 2: start geckodriver
Start geckodriver (by default listens in port 4444) in another shell:

    $ geckodriver

### Shell 3: execute tests
Run the Selenium basic tests (in a 3rd shell):

    $ php test1.php

Or run all tests in ``tests`` folder (done with phpunit):

    $ vendor/bin/phpunit tests


## Troubleshooting

If the test errors do not appear, open your php.ini file (usually ``/etc/php/X.Y/cli/php.ini``) and check the variable ``zend.assertions = 1``.


## Exercises

  1. Install and execute the first test.
  2. Modify the first test so that you add a name in the user field. Check the [documentation](https://github.com/php-webdriver/php-webdriver/wiki/Example-command-reference) for that.
  3. Put a random name in the user field (create a hardcoded list of possible names).
  4. Check that the introduced name is present in the last line in the ``comanda.txt`` file
  5. Choose a product of the ``products.txt`` file insted of a fixed one.
  6. Choose 3 products of the ``products.txt`` file (and check all of them).

