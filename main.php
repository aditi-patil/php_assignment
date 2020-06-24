<?php
require "vendor/autoload.php";

define("ACTION", 'clean');
define("HARD", "hard");
define("CARPET", "carpet");


try {
    if (count($argv) <= 3) {
        echo "Some of the arguments is not passed. Expected args list [action, floor, area]" . PHP_EOL;
        exit();
    }
    $action = $argv[1];
    $floor = explode("=", $argv[2])[1];
    $area = explode("=", $argv[3])[1];
    
    if ($action != ACTION) {
        echo "Invalid action provided." . PHP_EOL;
        exit();
    }
        
    $battery = new Battery();
    $robot = new Robot($action, $battery);
    // $val = getopt(null, ["floor:", "area:"]);
    
    if ($floor == 'carpet') {
        $carpet = new Carpet($area, $robot);
        $carpet->calculateCleanUpArea();
    } elseif($floor == 'hard') {
        $hard = new Hard($area, $robot);
        $hard->calculateCleanUpArea();
    } else {
        echo "Invalid value for floor" . PHP_EOL;
    }
}
catch(Exception $e) {
    echo "Command is not valid" . PHP_EOL;
}


