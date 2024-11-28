<?php

namespace Demovendor\DemoPackage;

class ConfigGenerator
{
    protected $configPath;

    public function __construct($configPath)
    {
        $this->configPath = $configPath;
    }

    /**
     * Generate the configuration file if it does not exist.
     */
    public function generateConfig()
    {
        $sourceFile = __DIR__ . '/../config/DemoPackage.php';  // Path to the default config template
        $destinationFile = $this->configPath . '/mypackage.php';  // Path where the config should be created

        // Check if the config file already exists
        if (file_exists($destinationFile)) {
            echo "Config file already exists. Skipping creation.\n";
            return;
        }

        // Copy the default config to the target config directory
        if (copy($sourceFile, $destinationFile)) {
            echo "Config file created at {$destinationFile}.\n";
        } else {
            echo "Failed to create the config file at {$destinationFile}.\n";
        }
    }
}
