<?php

define("MAX_LIMIT", 100, true);

class Battery {
    public $status;

    public function __construct(){
        $this->status = MAX_LIMIT;
    }

}
