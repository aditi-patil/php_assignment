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

    if ($floor == CARPET) {
        $carpet = new Carpet($area);
        $robot = new Robot($action, $carpet);
        echo "Cleaning Carpet Floor area---" . PHP_EOL;
        $robot->process();
    } elseif ($floor == HARD) {
        $hard = new Hard($area);
        $robot = new Robot($action, $hard);
        echo "Cleaning Hard Floor area---" . PHP_EOL;
        $robot->process();
    } else {
        echo "Invalid value for floor" . PHP_EOL;
    }
    // $val = getopt(null, ["floor:", "area:"]);

}
catch(Exception $e) {
    echo "Command is not valid" . PHP_EOL;
}



