<?php

class HexTile{
    
    var $type;
    var $coord;
    
    function __construct($type, $coord){
        $this->type = $type;
        $this->coord = $coord;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getCoord(){
        return $this->coord;
    }
}