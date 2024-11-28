<?php

namespace Demovendor\DemoPackage;

class DemoPackage { 

   
    // public function greet($name) {
    //     $this->publishes([
    //         __DIR__ . '/../config/mypackage.php' => config_path('mypackage.php'),
    //     ], 'config');
    //     return "Hello good morning, $name!";
    // }

    public static function generateConfig()
    {
        // Define the path to the config directory in the user's Laravel or PHP project
        $configPath = __DIR__ . '/../../../../config';  // Adjust according to your target directory

        // Create an instance of ConfigGenerator and run the config generation
        $configGenerator = new ConfigGenerator($configPath);
        $configGenerator->generateConfig();
    }
}
