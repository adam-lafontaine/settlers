<?php

class HexTile{
    
    var $type;
    var $coord; // (xpos, ypos)
    var $number_tile; 
    
    function __construct($type, $coord, $num_tile){
        $this->type = $type;
        $this->coord = $coord;
        $this->number_tile = $num_tile;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getCoord(){
        return $this->coord;
    }
    
    public function getNumberTile(){
        return $this->number_tile;
    }
}