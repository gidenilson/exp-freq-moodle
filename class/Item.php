<?php

class Item {

    private $id;
    private $freq;

    public function __construct($id, $freq) {
        $this->id = $id;
        $this->freq = $freq;
    }
    public function getId(){
        return $this->id;
    }
    public function getFreq(){
        return $this->freq;
    }

}