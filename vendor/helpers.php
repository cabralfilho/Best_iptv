<?php 

use System\Application;

if(! function_exists('pre')) 
{
    /**
    * Visualize the given variable in borwser
    *
    * @param mixed $var
    * @return void
    */
    function pre($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


if (! function_exists('array_get'))
{
    /*
    * Get the value from the given array for the given key if found
    * otherwise get the default value
    *
    * @param array $array
    * @param string|int $key
    * @param mixed $default
    */
    
    function array_get($array, $key, $default)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}


if (! function_exists('_e'))
{
    /*
    * Escape the given value
    *
    * @param string $value
    * @return string
    */
    
    function _e($value)
    {
        return htmlspecialchars($value);
    }
    
}
    
if (! function_exists('assets'))
{
    /*
    * Generate full path for the given path in public directory
    *
    * @param string $value
    * @return string
    */
    
    function assests($path)
    {
        
        $app = Application::getInstance();
        
        return $app->url->link('public/' . $path);
    }
}


if (! function_exists('url'))
{
    /*
    * Generate full path for the given path 
    *
    * @param string $value
    * @return string
    */
    
    function url($path)
    {
        $app = Application::getInstance();
        
        return $app->url->link($path);
    }
}