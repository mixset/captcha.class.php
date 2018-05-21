<?php

use Captcha\Core\Captcha;
use Captcha\Exceptions\CaptchaException;

session_start();

/**
 * @author Dominik Ryńko <http://www.rynko.pl/>
 * @license http://creativecommons.org/licenses/by-sa/3.0/pl/
*/

// Set default charset and document type
header('Content-Type: text/html; charset=utf-8');

spl_autoload_register(function ($className) {

    # Usually I would just concatenate directly to $file variable below
    # this is just for easy viewing on Stack Overflow)
    $ds = DIRECTORY_SEPARATOR;

    // replace namespace separator with directory separator (prolly not required)
    $className = ucfirst(str_replace('\\', $ds, $className));

    // get full name of file containing the required class
    $file = "..{$ds}src/{$className}.php";

    // get file if it is readable
    if (is_readable($file)) {
        require_once $file;
    }
});

try {
    $config = require_once '../src/Captcha/config/config.php';

    $captcha = new Captcha(
        $config['directory'],
        $config['font'],
        $config['image']
    );
    $captcha->generateCaptcha();
} catch (CaptchaException $e) {
    error_log($e->getMessage());
}
