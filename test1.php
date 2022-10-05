<?php

# References:
# https://github.com/php-webdriver/php-webdriver
# https://github.com/php-webdriver/php-webdriver/blob/main/example.php
# https://github.com/php-webdriver/php-webdriver/wiki/Example-command-reference


namespace Facebook\WebDriver;
#use Facebook\WebDriver\WebDriverBy;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Firefox\FirefoxOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;

require_once('vendor/autoload.php');

echo "Testing...\n";


# SETUP

# geckodriver (or other) listening port
$serverUrl = 'http://localhost:4444';

# config
$desiredCapabilities = DesiredCapabilities::firefox();
// Disable accepting SSL certificates
$desiredCapabilities->setCapability('acceptSslCerts', false);
// Add arguments via FirefoxOptions to start headless firefox
$firefoxOptions = new FirefoxOptions();
#$firefoxOptions->addArguments(['-headless']);
$desiredCapabilities->setCapability(FirefoxOptions::CAPABILITY, $firefoxOptions);

# create driver
$driver = RemoteWebDriver::create($serverUrl, $desiredCapabilities);



# TEST 1

# open the web site with the automated browser
$driver->get('http://localhost:8000');

# select a product from the checkboxes
$productName = "Cacauets";
$element = $driver->findElement(WebDriverBy::cssSelector("input[value='$productName']"));
$element->click();

# send form
$element = $driver->findElement(WebDriverBy::cssSelector('#submit'));
$element->click();

# check that the product appears in the list
$elements = $driver->findElements(WebDriverBy::cssSelector('li'));

$found = false;
foreach ($elements as $element) {
	if( $element->getText()==$productName )
		$found = true;
}

# Final check and asserts
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 1);
assert($found==true,"Selected $productName product not found in list.");

# close the automated browser
sleep(3);
$driver->quit();

