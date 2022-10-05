<?php
/*
 * Selenium Tests
 *
 * References:
 * https://github.com/php-webdriver/php-webdriver
 * https://github.com/php-webdriver/php-webdriver/blob/main/example.php
 * https://github.com/php-webdriver/php-webdriver/wiki/Example-command-reference
*/
function fatal_handler() {
    /*$errfile = "unknown file";
    $errstr  = "shutdown";
    $errno   = E_CORE_ERROR;
    $errline = 0;
    $error = error_get_last();
    if($error !== NULL) {
        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];
        echo "FATAL ERROR: $errno, $errstr, $errfile, $errline";
    }*/
    # close the browser as the last thing to do before quitting
    global $driver;
    $driver->quit();
}


namespace Facebook\WebDriver;
#use Facebook\WebDriver\WebDriverBy;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Firefox\FirefoxOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;

require_once('vendor/autoload.php');

echo "Testing...\n";

# SETUP 0: catch fatal errors for proper browser showtdown
#########
register_shutdown_function( 'fatal_handler' );


# SETUP DRIVER
##############

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
########

try {
	# open the web site with the automated browser
	$driver->get('http://localhost:8000');

	# select a product from the checkboxes
	$productName = "Cacauets";
	#$element = $driver->findElement(WebDriverBy::cssSelector("input[value='$productName']"));
	$element->click();

	# send form
	sleep(1); # for visual sake
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
	assert($found==true, new \Exception("Selected $productName product not found in list."));
}
catch (\Exception $e) {
    echo 'Test ERROR: ',  $e->getMessage(), "\n";
}

# close the automated browser
sleep(1); # for visual sake
$driver->quit();

