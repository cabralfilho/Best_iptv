<?php 

require __DIR__ . "/vendor/System/Application.php";
require __DIR__ . "/vendor/System/File.php";

use System\Application;
use System\File;

$app =  Application::getInstance(new File(__DIR__));

$app->run();

?>
