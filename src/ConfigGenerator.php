<?php
namespace MyVendor\MyPackage;

class ConfigGenerator
{
    protected $configPath;

    public function __construct($configPath)
    {
        $this->configPath = $configPath;
    }

    /**
     * Automatically generate the configuration file if it doesn't exist.
     *
     * @return void
     */
    public function autoGenerateConfig()
    {
        $sourceFile = __DIR__ . '/../config/DemoPackage.php';  // Default config file in the package
        $destinationFile = $this->configPath . '/DemoPackage.php';  // Destination path in the user's project

        // Check if the config file already exists
        if (file_exists($destinationFile)) {
            return; // Exit if the config file exists
        }

        // Copy the default config file to the user's project
        if (copy($sourceFile, $destinationFile)) {
            echo "Config file created at {$destinationFile}.\n";
        } else {
            echo "Failed to create the config file at {$destinationFile}.\n";
        }
    }
}
