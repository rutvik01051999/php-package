<?php

use Vendor\DemoPackage\DemoPackage;
use PHPUnit\Framework\TestCase;

class DemoPackageTest extends TestCase {
    public function testGreet() {
        $package = new DemoPackage();
        $this->assertEquals("Hello, John!", $package->greet("John"));
    }
}
