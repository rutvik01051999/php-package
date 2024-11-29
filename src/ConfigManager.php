<?php
// src/ConfigManager.php

namespace CustomConfig;

class ConfigManager
{
    // private $config = [];
    // private $configFilePath;

    // public function __construct($filePath = 'config/config.php')
    // {
    //     $this->configFilePath = $filePath;

    //     // Load existing config if the file exists
    //     if (file_exists($this->configFilePath)) {
    //         $this->config = require $this->configFilePath;
    //     }
    // }

    // public function set($key, $value)
    // {
    //     $keys = explode('.', $key);
    //     $config =& $this->config;

    //     foreach ($keys as $k) {
    //         if (!isset($config[$k])) {
    //             $config[$k] = [];
    //         }
    //         $config =& $config[$k];
    //     }

    //     $config = $value;
    // }

    // public function save()
    // {   

    //     $data = ['name' => 'Alice', 'age' => 25,'mobile' => 25];
    //     $configContent = "<?php\n\nreturn " . var_export($data, true) . ";\n";
    //     file_put_contents($this->configFilePath, $configContent);
    //     echo "Configuration file saved at {$this->configFilePath}\n";
    // }

    public static function handleCLI()
    {
        // global $argv;

        // if (count($argv) < 4) {
        //     echo "Usage: php {$argv[0]} <config-file-path> <key> <value>\n";
        //     exit(1);
        // }

        // $filePath = $argv[1];
        // $key = $argv[2];
        // $value = $argv[3];

        // $configManager = new self($filePath);
        // $configManager->set($key, $value);
        // $configManager->save();

        try {
            $data = ['app_url' => '', 'cake_post' => '','ckm_campaign_id' => '','ckm_key' => '','ckm_offer_id' => ''];
            $configFilePath = './config/appkey.php';
            $configContent = "<?php\n\nreturn " . var_export($data, true) . ";\n";
            file_put_contents($configFilePath, $configContent);
            echo "Configuration file saved at {$configFilePath}\n";
        } catch (Exception $e) {
            // Handle the exception
            echo "Caught exception: " . $e->getMessage();
        }
    }
}
