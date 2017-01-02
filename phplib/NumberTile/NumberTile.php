<?php

class NumberTile{
    
    var $number;
    var $alpha;
    var $prob;
    
    function __construct($num, $alpha, $prob){
        $this->number = $num;
        $this->alpha = $alpha;
        $this->prob = $prob;
    }
    
    //--------------------
    
    public function getNumber(){
        return $this->number;
    }
    
    public function getAlpha(){
        return $this->alpha;
    }
    
    public function getProb(){
        return $this->prob;
    }
    
}