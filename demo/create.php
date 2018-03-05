<?php
session_start();

/**
 * @author Dominik Ryńko <http://www.rynko.pl/>
 * @version 1.0.0
 * @license http://creativecommons.org/licenses/by-sa/3.0/pl/
 */

// Set default charset and document type
header('Content-Type: text/html; charset=utf-8');

function __autoload($className)
{
    $className = explode('\\', $className);
    $className = array_pop($className);

    $path = '../src/' . $className . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
}

try {
    $config = require_once '../src/config.php';

    $captcha = new Captcha\Captcha($config['directory'], $config['font'], $config['image']);
    $captcha->generateCaptcha();
} catch (CaptchaException $e) {
    error_log($e->getMessage());
}
