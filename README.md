# Selenium tests with PHP

## Installation

You need to have installed:
  * PHP >= 7.4
  * php-zip
  * php-curl
  * composer: https://getcomposer.org/download/
  * geckodriver: https://github.com/mozilla/geckodriver/releases

References:
  * Selenium PHP Driver: https://github.com/php-webdriver/php-webdriver
  * Example: https://github.com/php-webdriver/php-webdriver/blob/main/example.php
  * Doc: https://github.com/php-webdriver/php-webdriver/wiki/Example-command-reference

## General procedure

Clone repo and download packages:

    $ git clone https://github.com/emieza/selenium-php
    $ cd selenium-php
    $ composer install

Start webapp in port 8000 in an independent shell:

    $ cd src
    $ php -S 0.0.0.0:8000

Start geckodriver (by default listens in port 4444) in another shell:

    $ geckodriver

Start Selenium tests (in a 3rd shell):

    $ php test1.php


## Troubleshooting

If the test errors do not appear, open your php.ini file (usually ``/etc/php/X.Y/cli/php.ini``) and check the variable ``zend.assertions = 1``.

## Exercises

  1. Install and execute the first test.
  2. Modify ``test1.php`` so that you add a name in the user field. Check the [documentation](https://github.com/php-webdriver/php-webdriver/wiki/Example-command-reference) for that.
  3. Put a random name in the user field (create a hardcoded list of possible names).
  4. Check that the introduced name is present in the last line in the ``comanda.txt`` file
  5. Choose a product of the ``products.txt`` file insted of a fixed one.
  6. Choose 3 products of the ``products.txt`` file (and check all of them).

