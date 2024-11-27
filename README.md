# Demo Package

This package provides a simple greeting functionality.

## Installation

Use Composer to install the package:

composer require demovendor/demo-package

## How To use 

```php
use MyVendor\MyAwesomePackage\MyAwesomePackage;

$package = new MyAwesomePackage();
echo $package->greet("John");

