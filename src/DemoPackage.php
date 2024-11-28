<?php

namespace Demovendor\DemoPackage;


class DemoPackage { 

/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Initialize the package and automatically generate the configuration file
/******  979f017b-4f6f-4207-91a6-3fe11ce08e43  *******/
    public function __construct() 
    {
        $this->autoGenerateConfig();
    }
    public function greet($name) {
        $this->publishes([
            __DIR__ . '/../config/mypackage.php' => config_path('mypackage.php'),
        ], 'config');
        return "Hello good morning, $name!";
    }

    protected function autoGenerateConfig()
    {
        // Set the config path (this can be customized depending on your user's setup)
        $configPath = __DIR__ . '/../../../../config';  // Path to the config directory of the user's project

        // Create an instance of the ConfigGenerator and run the config generation
        $configGenerator = new ConfigGenerator($configPath);
        $configGenerator->autoGenerateConfig();
    }
}
