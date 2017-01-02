<?php

class HexTile{
    
    var $type;
    var $coord; // (xpos, ypos)
    var $num_alpha; // the number on the tile with its letter (num, alpha)
    
    function __construct($type, $coord, $num_alpha){
        $this->type = $type;
        $this->coord = $coord;
        $this->num_alpha = $num_alpha;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getCoord(){
        return $this->coord;
    }
    
    public function getNumAlpha(){
        return $this->num_alpha;
    }
}