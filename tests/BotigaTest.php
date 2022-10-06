<?php declare(strict_types=1);
# thanks to https://jakobbr.eu/2020/10/24/adventures-with-phpunit-geckodriver-and-selenium/

namespace Facebook\WebDriver;

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Exception\UnknownErrorException;

final class BotigaTest extends TestCase
{
    protected static $driver;

    public static function setUpBeforeClass(): void 
    {
        $host = 'http://localhost:4444';

        $capabilities = DesiredCapabilities::firefox();
        #$capabilities->setCapability('moz:firefoxOptions', ['args' => ['-headless']]);
        $capabilities->setPlatform(WebDriverPlatform::LINUX);

        self::$driver = RemoteWebDriver::create($host, $capabilities);
    }
    
    public static function tearDownAfterClass(): void
    {
        self::$driver->quit();
    }

    public function testSuccessfulSelecionOfProduct()
    {
        # open the web site with the automated browser
        self::$driver->get('http://localhost:8000');

        # Select a product
        $productName = "Cacauets";
        $element = self::$driver->findElement(WebDriverBy::cssSelector("input[value='$productName']"));
        $element->click();

        # Submit form
        $element = self::$driver->findElement(WebDriverBy::id('submit'));
        $element->click();

        # Check that the product appears in the list
        $elements = self::$driver->findElements(WebDriverBy::cssSelector('li'));
        $found = false;
        foreach ($elements as $element) {
            if( $element->getText()==$productName )
                $found = true;
        }

        $this->assertEquals($found,true);

        //$this->assertEquals('Acceptance test title', self::$driver->findElement(WebDriverBy::id('title'))->getAttribute('value'));
    }

}
