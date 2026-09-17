<?php

require_once __DIR__ . "/User.php";

class Trainer extends User{
    public function leadClass()
    {
        return "$this->name is leading the fitness class.";
    }
}

?>
