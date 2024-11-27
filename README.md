# Demo Package

This package provides a simple greeting functionality.

## Installation

Use Composer to install the package:

composer require demovendor/demo-package
 
## How To use 

```php

use Demovendor\DemoPackage\DemoPackage;

$package = new DemoPackage();
echo $package->greet("Rutvik");
 
