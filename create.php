<?php
session_start();
/**
 * @author Dominik Ryńko <http://www.rynko.pl/>
 * @version 1.0.0
 * @license http://creativecommons.org/licenses/by-sa/3.0/pl/
 */

// Set default charset and document type
header('Content-Type: text/html; charset=utf-8');

// Check PHP version
if(version_compare(PHP_VERSION, '4.3.0') <= 0)
{
    exit('Script requires 4.3.0 or higher version of PHP. My version is: '.PHP_VERSION);
}

$className = 'Captcha.class.php';

if(file_exists($className) && filesize($className) !== 0)
{
    require $className;

   try {
    $config = array('font' => 'arial.ttf', 'dir' => 'font');
    $captcha = new Captcha\Captcha($config);
    $captcha -> CaptchaSecurityImages(120, 40, 4);
   }
   catch(Exception $e) {
    echo $e -> getMessage();
   }
}
else
{
    return 'File: '. $className.' does not exist. Cannot load module.';
}


?>