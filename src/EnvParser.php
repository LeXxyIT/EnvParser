<?php

declare(strict_types=1);

namespace LeXxyIT\EnvParser;

use Exception;

/**
 * Parse the .env file to add new variables to the global environment.
 */
class EnvParser {

    /**
     * @param string $path
     * @throws Exception
     */
    public function load(string $path)
    {
        if (!empty($path) && is_file($path)) {
            $settings = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($settings as $setting) {
                $setting = trim($setting);
                if (!empty($setting)) {
                    $setting = explode('=', $setting, 2);
                    if (!array_key_exists($setting[0], $_ENV)) {
                        $_ENV[$setting[0]] = $setting[1];
                    }
                }
            }
        } else {
            throw new Exception('Add correct path to .env file');
        }
    }

}
