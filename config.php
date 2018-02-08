<?php

class namen  {
    public $zaid;
    public $aues;
    public $rand;
    public $abudy;
    
    const myName = "1234zeid";
    
    public function namen2() 
    {
        echo "hi from namen function" . $this->zaid . " " . self::myName;
    }
}

$geschwester = new namen();
$geschwester->zaid = "zizo";
$geschwester->namen2();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo namen::myName;
    

//echo "<pre>";
//var_dump($geschwester);
//echo "</pre>";
//
//$geschwester2 = new namen();
//
//
//$geschwester2->zaid = "zaid123123"; 
//echo "<pre>";
//var_dump($geschwester2);
//echo "</pre>";

