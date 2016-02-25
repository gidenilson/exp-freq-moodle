<?php

class Contador {
    static function inc($file){
        $atual = file_get_contents($file);
        file_put_contents($file, ++$atual);
        return number_format($atual, 0, ',', '.');
    }
    static function get($file){
        $atual = file_get_contents($file);
        return number_format($atual, 0, ',', '.');
    }
}
