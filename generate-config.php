<?php
// generate-config.php

require 'src/ConfigManager.php';

use CustomConfig\ConfigManager;

// Handle CLI commands
ConfigManager::handleCLI();
