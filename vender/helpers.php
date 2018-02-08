<?php 

if(! function_exists('pre')) 
{
    /**
    * Visualize the given variable in borwser
    *
    * @param mixed $var
    * @return void
    */
    public function pre($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}