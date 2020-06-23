<?php
require "vendor/autoload.php";

$val = getopt('clean', ["floor:", "area:"]);
print_r($val);
if (isset($val['floor']) && isset($val['area'])){
    if ($val['floor'] == 'carpet') {
        $carpet = new Carpet($val['area']);
        $carpet->calculateCleanUpArea();
    } elseif($val['floor'] == 'hard') {
        $hard = new Hard($val[area]);
        $hard->calculateCleanUpArea();
    }
} elseif(isset($val['area']) == null && isset($val['floor']) == null){
    echo "Value for area and floor is not set" . PHP_EOL;
} elseif(isset($val['area']) == null) {
    echo "Value for area is not set" . PHP_EOL;
} else {
    echo "Value for floor is not set" . PHP_EOL;
}


