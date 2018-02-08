<?php 

require __DIR__ . "/vender/System/Application.php";
require __DIR__ . "/vender/System/File.php";

use System\Application;
use System\File;

$file = new File(__DIR__);

$app = new Application($file);

//new System\test;
